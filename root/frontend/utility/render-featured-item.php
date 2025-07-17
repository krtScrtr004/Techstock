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
                <img src="<?= ICON_PATH . 'next.svg' ?>" alt="Previous" title="Previous" height="20">
            </button>

            <button type="button" class="tracker right unset-button">
                <img src="<?= ICON_PATH . 'next.svg' ?>" alt="Next" title="Next" height="20">
            </button>
        </section>
    </section>
<?php
}
