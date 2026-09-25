<?php require VIEW_PATH . 'layout/header.php'; ?>
<link rel="stylesheet" href="<?= asset('css/events.css') ?>">

<main class="ogw-events-page bg-white min-h-screen pb-24">

    <div class="ogw-events-hero">
        <div class="ogw-events-hero__inner">
            <h1 class="ogw-events-hero__title">Events &amp; Promotions</h1>
            <p class="ogw-events-hero__sub">Discover the latest happenings, exclusive promotions, and special exhibitions.</p>
        </div>
    </div>

    <div class="container mx-auto px-4 max-w-7xl">

        <div class="ogw-tabs" id="event-tabs" role="tablist">
            <button class="ogw-tab ogw-tab--active" id="tab-ongoing"
                type="button" role="tab" aria-controls="ongoing"
                aria-selected="true" tabindex="0">
                <span class="ogw-tab__dot ogw-tab__dot--red"></span>
                Ongoing Events
            </button>
            <button class="ogw-tab" id="tab-ended"
                type="button" role="tab" aria-controls="ended"
                aria-selected="false" tabindex="-1">
                <span class="ogw-tab__dot ogw-tab__dot--gray"></span>
                Past Events
            </button>
        </div>

        <div id="event-tab-content">

            <!-- ONGOING -->
            <div id="ongoing" role="tabpanel" aria-labelledby="tab-ongoing">
                <?php if (!empty($ongoingEvents)): ?>
                    <div class="ogw-events-grid">
                        <?php foreach ($ongoingEvents as $event): ?>
                            <?php $href = url('events/' . (!empty($event['slug']) ? $event['slug'] : 'detail/' . $event['id'])); ?>
                            <a href="<?= $href ?>" class="ogw-card ogw-card--active">
                                <div class="ogw-card__img-wrap">
                                    <?php if (!empty($event['image_url'])): ?>
                                        <img src="<?= asset('uploads/' . ltrim($event['image_url'], '/')) ?>" alt="<?= e($event['title']) ?>" class="ogw-card__img">
                                    <?php else: ?>
                                        <div class="ogw-card__img-placeholder"><span>No&nbsp;Image</span></div>
                                    <?php endif; ?>
                                    <span class="ogw-badge ogw-badge--live">Ongoing</span>
                                </div>
                                <div class="ogw-card__body">
                                    <p class="ogw-card__date"><?= date('d M Y', strtotime($event['start_date'])) ?> &ndash; <?= date('d M Y', strtotime($event['end_date'])) ?></p>
                                    <h3 class="ogw-card__title"><?= e($event['title']) ?></h3>
                                    <?php if (!empty($event['subtitle'])): ?><p class="ogw-card__sub"><?= e($event['subtitle']) ?></p><?php endif; ?>
                                    <span class="ogw-card__cta">View Details &rarr;</span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="ogw-empty">
                        <div class="ogw-empty__icon">🗓</div>
                        <p class="ogw-empty__text">No ongoing events at the moment.</p>
                        <p class="ogw-empty__hint">Check back soon or browse past events below.</p>
                    </div>
                <?php endif; ?>
            </div>

            <!-- ENDED -->
            <div id="ended" role="tabpanel" aria-labelledby="tab-ended" style="display:none;">
                <?php if (!empty($endedEvents)): ?>
                    <div class="ogw-events-grid">
                        <?php foreach ($endedEvents as $event): ?>
                            <?php $href = url('events/' . (!empty($event['slug']) ? $event['slug'] : 'detail/' . $event['id'])); ?>
                            <a href="<?= $href ?>" class="ogw-card ogw-card--ended">
                                <div class="ogw-card__img-wrap">
                                    <?php if (!empty($event['image_url'])): ?>
                                        <img src="<?= asset('uploads/' . ltrim($event['image_url'], '/')) ?>" alt="<?= e($event['title']) ?>" class="ogw-card__img">
                                    <?php else: ?>
                                        <div class="ogw-card__img-placeholder"><span>No&nbsp;Image</span></div>
                                    <?php endif; ?>
                                    <span class="ogw-badge ogw-badge--ended">Ended</span>
                                </div>
                                <div class="ogw-card__body">
                                    <p class="ogw-card__date">Ended <?= date('d M Y', strtotime($event['end_date'])) ?></p>
                                    <h3 class="ogw-card__title"><?= e($event['title']) ?></h3>
                                    <?php if (!empty($event['subtitle'])): ?><p class="ogw-card__sub"><?= e($event['subtitle']) ?></p><?php endif; ?>
                                    <span class="ogw-card__cta ogw-card__cta--muted">View Details &rarr;</span>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="ogw-empty">
                        <div class="ogw-empty__icon">📭</div>
                        <p class="ogw-empty__text">No past events yet.</p>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var tabs  = document.querySelectorAll('#event-tabs .ogw-tab');
    var panes = document.querySelectorAll('#event-tab-content > div[role="tabpanel"]');

    tabs.forEach(function (btn, i) {
        btn.addEventListener('click', function () {
            tabs.forEach(function (b, j) {
                var active = (j === i);
                b.classList.toggle('ogw-tab--active', active);
                b.setAttribute('aria-selected', active ? 'true' : 'false');
                b.setAttribute('tabindex', active ? '0' : '-1');
                panes[j].style.display = active ? '' : 'none';
            });
        });
    });
});
</script>

<?php require VIEW_PATH . 'layout/footer.php'; ?>
