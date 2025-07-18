<?php
function productCard(Product $product): mixed
{
    ob_start();
    $name       =   htmlspecialchars($product->getName());
    $image      =   htmlspecialchars($product->getImage(0));
    $soldCount  =   htmlspecialchars($product->getSoldCount());
    $price      =   DEFAULT_CURRENCY_SYMBOL . ' ' . htmlspecialchars(formatNumber($product->getPrice()));
    $redirect   =   REDIRECT_PATH . 'product' . DS . htmlspecialchars(createSlug($product->getName())) . '-i.' . htmlspecialchars($product->getId()) . '.' . htmlspecialchars($product->getStore()->getId());
?>
    <a href="<?= $redirect ?>">
        <div class="product-card" data-id="<?= htmlspecialchars($product->getId()) ?>">
            <img
                src="<?= $image ?>"
                alt="<?= $name ?>"
                title="<?= $name ?>"
                loading="lazy"
                height="180" />

            <h3 class="product-name multi-line-ellipsis" title="<?= $name ?>">
                <?= $name ?>
            </h3>

            <span>
                <p><?= $price ?></p>
                <p><?= $soldCount ?> Sold</p>
            </span>
        </div>
    </a>
<?php
    return ob_get_clean();
} ?>