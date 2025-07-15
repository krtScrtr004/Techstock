<?php
function renderProductCard(Product $product): void
{
    $redirect = REDIRECT_PATH . 'product' . DS . htmlspecialchars(createSlug($product->getName())) . '-i.' . htmlspecialchars($product->getId()) . '.' . htmlspecialchars($product->getStore()->getId());
?>
    <a href="<?= $redirect ?>">
        <div class="product-card" data-id="<?= htmlspecialchars($product->getId()) ?>">
            <img src="<?= htmlspecialchars($product->getImage(0)) ?>" alt="<?= htmlspecialchars($product->getName()) ?>" title="<?= htmlspecialchars($product->getName()) ?>" loading="lazy" height="200">

            <h3 class="product-name multi-line-ellipsis" title="<?= htmlspecialchars($product->getName()); ?>">
                <?= htmlspecialchars($product->getName()); ?>
            </h3>

            <span>
                <p>
                    <?= DEFAULT_CURRENCY_SYMBOL . ' ' . htmlspecialchars(formatNumber($product->getPrice())); ?>
                </p>
                <p><?= htmlspecialchars($product->getSoldCount()) ?> Sold</p>
            </span>
        </div>
    </a>
<?php } ?>