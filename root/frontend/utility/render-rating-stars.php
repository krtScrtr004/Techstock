<?php

function ratingStars(float $rating, int $size = 16): void {
    if ($rating < 0 || $rating > 5) 
        $rating = abs($rating % 5);

    $whole = (int) $rating;
    $decimal = abs($rating - floor($rating));
?>
    <div class=" rating-stars center-child">
        <!-- Display full filled stars -->
        <?php for ($i = 0; $i < $whole; ++$i): ?>
            <img 
                src="<?= ICON_PATH . 'star_y.svg' ?>" 
                alt="Rating" 
                title="Rating" 
                width="<?= $size 
                ?>" height="<?= $size ?>" />
        <?php endfor; ?>

        <!-- Display half filled stars -->
        <?php if ($decimal > 0): ?>
            <img 
                src="<?= ICON_PATH . 'star_half_dw.svg' ?>" 
                alt="Rating" 
                title="Rating" 
                width="<?= $size ?>" 
                height="<?= $size ?>" />
        <?php endif; ?>

        <!-- Display empty stars -->
        <?php for ($i = ceil($rating); $i < 5; ++$i): ?>
            <img 
                src="<?= ICON_PATH . 'star_dw.svg' ?>" 
                alt="Rating" 
                title="Rating" 
                width="<?= $size ?>" 
                height="<?= $size ?>" />
        <?php endfor; ?>
    </div>
<?php
}