<?php require VIEW_PATH . 'layout/header.php'; ?>
<link rel="stylesheet" href="<?= asset('css/events.css') ?>">

<main class="ogw-events-page bg-white min-h-screen pb-24">

    <!-- Detail Hero -->
    <div class="ogw-detail-hero <?= $isEnded ? 'ogw-detail-hero--ended' : 'ogw-detail-hero--active' ?>">
        <?php if (!empty($event['image_url'])): ?>
            <img src="<?= asset('uploads/' . ltrim($event['image_url'], '/')) ?>"
                alt="<?= e($event['title']) ?>"
                class="ogw-detail-hero__bg-img">
            <div class="ogw-detail-hero__overlay"></div>
        <?php endif; ?>

        <div class="ogw-detail-hero__inner">
            <a href="<?= url('events') ?>" class="ogw-back-link">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"><path d="M10 12L6 8l4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                Back to Events
            </a>

            <div class="ogw-detail-hero__meta">
                <?php if ($isEnded): ?>
                    <span class="ogw-badge ogw-badge--ended">Event Ended</span>
                <?php else: ?>
                    <span class="ogw-badge ogw-badge--live">Ongoing</span>
                <?php endif; ?>
                <span class="ogw-detail-hero__period">
                    <?= date('d M Y', strtotime($event['start_date'])) ?>
                    &ndash;
                    <?= date('d M Y', strtotime($event['end_date'])) ?>
                </span>
            </div>

            <h1 class="ogw-detail-hero__title"><?= e($event['title']) ?></h1>

            <?php if (!empty($event['subtitle'])): ?>
                <p class="ogw-detail-hero__sub"><?= e($event['subtitle']) ?></p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Detail Body -->
    <div class="container mx-auto px-4 max-w-4xl ogw-detail-body <?= $isEnded ? 'ogw-detail-body--ended' : '' ?>">

        <?php if ($isEnded): ?>
            <div class="ogw-notice ogw-notice--ended">
                <svg width="20" height="20" fill="none" viewBox="0 0 20 20"><circle cx="10" cy="10" r="9" stroke="currentColor" stroke-width="1.5"/><path d="M10 6v4M10 14h.01" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>
                This event has ended. The information below is for reference only.
            </div>
        <?php endif; ?>

        <!-- Text Block: only shown if content_text is set -->
        <?php if (!empty($event['content_text'])): ?>
            <div class="ogw-detail-text">
                <?= nl2br(e($event['content_text'])) ?>
            </div>
        <?php endif; ?>

        <!-- Body Image: only shown if content_image is set -->
        <?php if (!empty($event['content_image'])): ?>
            <div class="ogw-detail-img-wrap">
                <img src="<?= asset('uploads/' . ltrim($event['content_image'], '/')) ?>"
                    alt="<?= e($event['title']) ?>"
                    class="ogw-detail-img">
            </div>
        <?php endif; ?>

        <!-- Fallback: if neither text nor image, show a simple message -->
        <?php if (empty($event['content_text']) && empty($event['content_image'])): ?>
            <p class="ogw-detail-empty">No additional details available for this event.</p>
        <?php endif; ?>

        <div class="ogw-detail-footer">
            <a href="<?= url('events') ?>" class="ogw-btn-back">
                &larr; Back to all events
            </a>
        </div>
    </div>

</main>

<?php require VIEW_PATH . 'layout/footer.php'; ?>
