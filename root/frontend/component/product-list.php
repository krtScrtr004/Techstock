<section class="product-list">
    <?php
    foreach ($products as $product) {
        renderProductCard($product);
    } ?>
</section>

<div class="page-tab center-child">
    <button class="previous center-child">&lt;</button>
    <button class="next center-child">&gt;</button>
</div>