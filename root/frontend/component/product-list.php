<section class="product-list">
    <?php
    foreach ($products as $product) {
        renderProductCard($product);
    } ?>
</section>

<div class="page-tab center-child">
    <img class="previous center-child" src="<?php echo htmlspecialchars(ICON_PATH . 'next.svg') ?>" alt="Previous button" title="Previous button" height="28">

    <?php
    for ($i = 0; $i < 10; ++$i)
        echo '<p>' . $i + 1 . '</p>';
    ?>

    <img class="next center-child" src="<?php echo htmlspecialchars(ICON_PATH . 'next.svg') ?>" alt="Next button" title="Next button" height="28">
</div>