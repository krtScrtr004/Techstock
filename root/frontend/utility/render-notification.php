<?php

function renderNotification(bool $status, string $message, int $duration = 5000): void {
?>
    <section class="notification-wrapper center-child absolute <?= ($status) ? 'success' : 'fail' ?>">
        <div class="sticky blue-bg" data-duration="<?= $duration ?>">
            <p class="white-text"><?= $message ?></p>
        </div>
    </section>
<?php
}

function copyLinkNotification(bool $status) {
    $duration = 3000;
    if ($status) 
        renderNotification(
            true,
            'Copied successfully!', 
            $duration
    );
    else 
        renderNotification(
            false,
            'There was an error occurred while copying link! Please try again later.', 
            $duration
        );
}