<section class="product-list">
    <?php
    if (count($products) > 0) {
        foreach ($products as $product) {
            echo productCard($product);
        }
    } else {
        emptyGridResult();
    }
    ?>
</section>