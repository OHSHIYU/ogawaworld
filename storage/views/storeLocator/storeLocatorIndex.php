<link rel="stylesheet" href="<?= asset('css/store-locator.css') ?>">
<link rel="stylesheet" href="<?= asset('css/animate.css') ?>">

<section class="t-store" aria-labelledby="store-title">
  <div
    class="banner"
    style="background-image:url('<?= asset('img/hero/hero-d.webp') ?>');"
    data-reveal="fade-down"
  >
    <h1 class="t-store__title">Store Locator</h1>
  </div>

  <div class="container t-shell" data-reveal="fade-up" style="--reveal-delay: 80ms;">
    <?php if (!empty($states)): ?>
      <div
        class="t-store__filters"
        role="tablist"
        aria-label="Filter by state"
        data-reveal="fade-up"
        style="--reveal-delay: 140ms;"
      >
        <button class="pill btn-ghost is-active" data-state="">All</button>
        <?php foreach ($states as $s): ?>
          <button class="pill btn-ghost" data-state="<?= e($s) ?>"><?= e($s) ?></button>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <!-- Split layout (map left, list right) -->
    <div class="t-store__split t-swap">
      <aside
        class="t-store__mapwrap"
        aria-label="Map"
        data-reveal="fade-up"
        style="--reveal-delay: 200ms;"
      >
        <div id="store-map" class="t-store__map" role="region" aria-label="Store map"></div>
      </aside>

      <div
        class="t-store__listwrap"
        data-reveal="fade-up"
        style="--reveal-delay: 260ms;"
      >
        <div class="t-store__toolbar">
          <div class="t-store__count" id="store-count"></div>

          <button type="button" class="pill pill--locate btn-ghost" id="btn-use-location">
            📍 Use current location
          </button>
        </div>

        <div class="t-store__list" id="store-list" aria-live="polite"></div>
      </div>
    </div>
  </div>
</section>

<script>
  // ---------------- Data ----------------
  window.STORES = <?= json_encode($stores, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
  let stateFilter   = '';
  let currentItems  = [];
  let sortMode      = 'alpha'; // 'alpha' or 'distance'
  let userLocation  = null;    // { lat, lng } once we have it

  // ---------------- DOM refs ----------------
  const listEl    = document.getElementById('store-list');
  const countEl   = document.getElementById('store-count');
  const locateBtn = document.getElementById('btn-use-location');

  // ---------------- Card template ----------------
  function cardTemplate(s) {
    const img  = s.image ? `<img src="${s.image}" alt="${s.name}" loading="lazy">` : '';
    const meta = [s.city, s.state].filter(Boolean).join(', ') + (s.postcode ? ` (${s.postcode})` : '');

    const distance =
      typeof s.distanceKm === 'number'
        ? `<p class="store-card__distance">${s.distanceKm.toFixed(1)} km away</p>`
        : '';

    return `
      <article class="store-card" data-id="${s.id}" data-state="${(s.state||'').replace(/"/g,'&quot;')}">
        <div class="store-card__body">
          <div class="store-card__row">
            <h3 class="store-card__title">${s.name}</h3>
          </div>
          <p class="store-card__meta">${meta}</p>
          ${distance}
          <div class="store-card__addr">${(s.address || '').replace(/\n/g,'<br>')}</div>
          <div class="store-card__footer">
            <a class="btn-ghost" href="${s.gmaps}" target="_blank" rel="noopener" aria-label="Open in Google Maps">Location</a>
          </div>
        </div>
      </article>`;
  }

  function renderList() {
    let items = window.STORES.filter(s => !stateFilter || (s.state === stateFilter));

    // If we have user location and sortMode = distance, compute + sort
    if (sortMode === 'distance' && userLocation) {
      items.forEach(s => {
        if (typeof s.lat === 'number' && typeof s.lng === 'number' &&
            !isNaN(s.lat) && !isNaN(s.lng)) {
          s.distanceKm = distanceKm(userLocation.lat, userLocation.lng, s.lat, s.lng);
        } else {
          s.distanceKm = null;
        }
      });

      items.sort((a, b) => {
        if (a.distanceKm == null && b.distanceKm == null) return a.name.localeCompare(b.name);
        if (a.distanceKm == null) return 1;
        if (b.distanceKm == null) return -1;
        return a.distanceKm - b.distanceKm;
      });
    } else {
      // Default: alphabetical
      items.forEach(s => { s.distanceKm = null; });
      items.sort((a,b) => a.name.localeCompare(b.name));
    }

    const suffix = (sortMode === 'distance' && userLocation)
      ? ' · sorted by nearest to you'
      : '';

    countEl.textContent = items.length
      ? `${items.length} stores found${suffix}`
      : 'No stores found';

    listEl.innerHTML = items.length
      ? items.map(cardTemplate).join('')
      : '<p class="muted">No stores found.</p>';

    currentItems = items;
    renderMarkers(items);

    // Add reveal attributes to cards with gentle stagger
    const cards = listEl.querySelectorAll('.store-card');
    cards.forEach((card, idx) => {
      card.setAttribute('data-reveal', 'fade-up');
      card.style.setProperty('--reveal-delay', (120 + idx * 70) + 'ms'); // slow stagger
    });
    registerReveals(listEl);
  }

  // ---------------- Google Maps setup ----------------
  let map;
  let markers    = [];
  let markerById = new Map();
  let gBounds;
  let infoWindow;

  // Reuse your blue pin SVG
  const svg = `
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="48" viewBox="0 0 32 48">
      <path fill="#1f2a37" d="M16 0C7.2 0 0 7.2 0 16c0 11.2 16 32 16 32s16-20.8 16-32C32 7.2 24.8 0 16 0z"/>
      <circle cx="16" cy="16" r="6" fill="#fff"/>
    </svg>`.trim();

  function popupTemplate(s) {
    const meta   = [s.city, s.state].filter(Boolean).join(', ') + (s.postcode ? ` (${s.postcode})` : '');
    const phones = (s.phones || []).map(p => `<div>${p}</div>`).join('');
    const distance =
      typeof s.distanceKm === 'number'
        ? `<div class="pp-line"><strong>Distance:</strong> ${s.distanceKm.toFixed(1)} km</div>`
        : '';

    return `
      <div class="pp-card">
        <div class="pp-body">
          <div class="pp-title">${s.name}</div>
          <div class="pp-meta">${meta}</div>

          ${phones ? `<div class="pp-line"><strong>Phone:</strong> ${phones}</div>` : ''}
          ${distance}

          <a class="pp-cta" href="${s.gmaps}" target="_blank" rel="noopener">Open in Maps</a>
        </div>
      </div>`;
  }

  function renderMarkers(items) {
    if (!window.google || !map) return; // map not ready yet

    // Remove old markers
    markers.forEach(m => m.setMap(null));
    markers = [];
    markerById.clear();
    gBounds = new google.maps.LatLngBounds();

    items.forEach(s => {
      if (typeof s.lat === 'number' && typeof s.lng === 'number' &&
          !isNaN(s.lat) && !isNaN(s.lng)) {

        const pos = { lat: s.lat, lng: s.lng };

        const marker = new google.maps.Marker({
          position: pos,
          map,
          title: s.name,
          icon: {
            url: 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(svg),
            scaledSize: new google.maps.Size(32, 48),
            anchor: new google.maps.Point(16, 44),
          },
        });

        marker.storeData = s;

        marker.addListener('click', () => {
          infoWindow.setContent(popupTemplate(s));
          infoWindow.open({ map, anchor: marker });
          focusCard(s.id);
        });

        markers.push(marker);
        markerById.set(s.id, marker);
        gBounds.extend(pos);
      }
    });

    if (markers.length && !gBounds.isEmpty()) {
      map.fitBounds(gBounds, { padding: 40 });
    } else {
      map.setCenter({ lat: 4.2105, lng: 101.9758 }); // Malaysia approx
      map.setZoom(6);
    }
  }

  function focusMarker(id) {
    if (!window.google || !map) return;
    const marker = markerById.get(id);
    if (!marker) return;
    map.panTo(marker.getPosition());
    map.setZoom(Math.max(map.getZoom(), 14));
    infoWindow.setContent(popupTemplate(marker.storeData));
    infoWindow.open({ map, anchor: marker });
  }

  function focusCard(id) {
    const el = listEl.querySelector(`.store-card[data-id="${id}"]`);
    if (!el) return;
    listEl.querySelectorAll('.store-card.is-active').forEach(e => e.classList.remove('is-active'));
    el.classList.add('is-active');
    el.scrollIntoView({ behavior:'smooth', block:'center' });
  }

  // ---------------- Filters & interactions ----------------
  document.querySelectorAll('.t-store__filters .pill').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.t-store__filters .pill').forEach(b => b.classList.remove('is-active'));
      btn.classList.add('is-active');
      stateFilter = btn.dataset.state || '';
      renderList();
    });
  });

  listEl.addEventListener('click', e => {
    const card = e.target.closest('.store-card');
    if (!card) return;
    const id = Number(card.dataset.id);
    focusCard(id);
    focusMarker(id);
  });

  // ---------------- Distance helpers ----------------
  function toRad(v) { return v * Math.PI / 180; }

  function distanceKm(lat1, lng1, lat2, lng2) {
    const R = 6371; // km
    const dLat = toRad(lat2 - lat1);
    const dLng = toRad(lng2 - lng1);
    const a =
      Math.sin(dLat/2) * Math.sin(dLat/2) +
      Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
      Math.sin(dLng/2) * Math.sin(dLng/2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    return R * c;
  }

  // ---------------- Use current location ----------------
  if (locateBtn) {
    if (!('geolocation' in navigator)) {
      locateBtn.disabled = true;
      locateBtn.title = 'Geolocation is not supported in this browser.';
    } else {
      locateBtn.addEventListener('click', () => {
        locateBtn.disabled = true;
        const originalText = locateBtn.textContent;
        locateBtn.textContent = 'Locating…';

        navigator.geolocation.getCurrentPosition(
          pos => {
            locateBtn.disabled = false;
            locateBtn.textContent = originalText;

            userLocation = {
              lat: pos.coords.latitude,
              lng: pos.coords.longitude,
            };
            sortMode = 'distance';
            renderList();

            // Focus nearest store after re-render
            const nearest = currentItems[0];
            if (nearest) {
              focusCard(nearest.id);
              focusMarker(nearest.id);
            }
          },
          err => {
            console.error('Geolocation error:', err);
            locateBtn.disabled = false;
            locateBtn.textContent = originalText;
            alert(err.message || 'Unable to get your location. Please allow location access in your browser.');
          },
          { enableHighAccuracy: true, timeout: 10000 }
        );
      });
    }
  }

  // ---------------- Scroll reveal (using animate.css rules) ----------------
  let revealObserver = null;

  function initRevealObserver() {
    if (revealObserver || !('IntersectionObserver' in window)) return;

    revealObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          revealObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });
  }

  function registerReveals(root) {
    if (!('IntersectionObserver' in window)) return;
    if (!revealObserver) initRevealObserver();

    const scope = root || document;
    scope.querySelectorAll('[data-reveal]').forEach(el => {
      if (!el.classList.contains('is-visible')) {
        revealObserver.observe(el);
      }
    });
  }

  document.addEventListener('DOMContentLoaded', () => {
    registerReveals(document);
  });

  // ---------------- Init callback for Google Maps ----------------
  function initStoreMap() {
    map = new google.maps.Map(document.getElementById('store-map'), {
      center: { lat: 4.2105, lng: 101.9758 },
      zoom: 6,
      mapTypeControl: false,
      streetViewControl: false,
    });

    infoWindow = new google.maps.InfoWindow();

    // Keep map responsive
    new ResizeObserver(() => {
      google.maps.event.trigger(map, 'resize');
    }).observe(document.getElementById('store-map'));

    renderList();
  }

  // Expose callback for Google script
  window.initStoreMap = initStoreMap;
</script>

<!-- Google Maps JS -->
<script
  src="https://maps.googleapis.com/maps/api/js?key=<?= htmlspecialchars('AIzaSyAXTyz0Vq4w8TeiZ-TAdFt2EN5qVINzSzg', ENT_QUOTES) ?>&callback=initStoreMap"
  async defer></script>
