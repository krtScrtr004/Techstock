<?php

function emptyResult(
    string $iconName, 
    string $title, 
    string $subTitle = '',
    string $size = 'big'): void
{
?>
    <div class="empty-result <?= $size ?> flex-col center-child transparent-bg full-body-content">
        <img
            src="<?= ICON_PATH . $iconName ?>"
            alt="<?= $title ?>"
            title="<?= $title ?>"
            height="45" />

        <h3 class="center-text black-text"><?= $title ?></h3>
        <?php if ($subTitle): ?>
            <p class="center-text light-black-text"><?= $subTitle ?></p>
        <?php endif; ?>
    </div>
<?php
}

function emptyGridResult(): void
{
    emptyResult(
        'empty-list_b.svg',
        'No Items Found!',
        'Try searching for different or more generic keywords'
    );
}

function emptyFeaturedItem(): void
{
    emptyResult(
        'empty-list_b.svg',
        'No Featured Items!'
    );
}

function emptyRating(): void
{
    emptyResult(
        'star_y.svg',
        'No Rating For This Product Yet!',
        '',
        'small'
    );
}
