<?php

function featuredItem(callable|array $callback, mixed $args, string $title = 'Featured Items'): void
{
    $title = htmlspecialchars($title);
?>
    <section class="featured-item">
        <h3 class="sticky"><?= $title ?></h3>

        <section class="carousel-wrapper">
            <section class="carousel">
                <?php
                if (is_callable($callback)) {
                    call_user_func($callback, $args);
                } else {
                    call_user_func_array($callback, [$args]);
                }
                ?>
            </section>

            <button type="button" class="tracker left unset-button">
                <img
                    src="<?= ICON_PATH . 'next.svg' ?>"
                    alt="Previous"
                    title="Previous"
                    height="20" />
            </button>

            <button type="button" class="tracker right unset-button">
                <img
                    src="<?= ICON_PATH . 'next.svg' ?>"
                    alt="Next"
                    title="Next"
                    height="20" />
            </button>
        </section>
    </section>
<?php
}

function featuredProductsCallback($products): void
{
    if (count($products) <= 0) {
        emptyFeaturedItem();
        return;
    }

    foreach ($products as $product) {
        echo productCard($product);
    }
}

function featuredStoresCallback($stores): void
{
    if (count($stores) <= 0) {
        emptyFeaturedItem();
        return;
    }

    foreach ($stores as $store) {
        $name = htmlspecialchars($store->getName());
        $logo = htmlspecialchars($store->getLogo());
        $slug = createSlug($name);

        echo '<a href="' . REDIRECT_PATH . 'store' . DS . $slug . '">';
        echo '<div class="store-card center-child white-bg">';
        echo '<img src="' . $logo . '" alt="' . $name . '" title="' . $name . '">';
        echo '</div>';
        echo '</a>';
    }
}
