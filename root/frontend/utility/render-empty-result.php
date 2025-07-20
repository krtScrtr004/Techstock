<?php

function emptyResult(string $iconName, string $title, ?string $subTitle): void
{
?>
    <div class="empty-result flex-col center-child transparent-bg full-body-content">
        <img
            src="<?= ICON_PATH . $iconName ?>"
            alt="<?= $title ?>"
            title="<?= $title ?>"
            height="45" />

        <h3 class="black-text"><?= $title ?></h3>
        <?php if ($subTitle): ?>
            <p class="light-black-text"><?= $subTitle ?></p>
        <?php endif; ?>
    </div>
<?php
}

function emptyGridResult(): void
{
    emptyResult(
        'empty-list_b.svg',
        'No Items Found!',
        'Try different or more generic keywords'
    );
}

function emptyFeaturedItem(): void
{
    emptyResult(
        'empty-list_b.svg',
        'No Featured Items!',
        null
    );
}
