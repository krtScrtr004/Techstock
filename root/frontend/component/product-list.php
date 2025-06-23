<section class="product-list">
    <?php
    foreach ($products as $product) {
        renderProductCard($product);
    } ?>
</section>

<div class="page-tab center-child">
    <img class="previous center-child" src="<?php echo htmlspecialchars(ICON_PATH . 'next.svg') ?>" alt="Previous button" title="Previous button" height="24">

    <p class="active">1</p>
    <p>2</p>
    <p>3</p>
    <p>4</p>
    <p>5</p>
    <p>...</p>

    <img class="next center-child" src="<?php echo htmlspecialchars(ICON_PATH . 'next.svg') ?>" alt="Next button" title="Next button" height="24">
</div>