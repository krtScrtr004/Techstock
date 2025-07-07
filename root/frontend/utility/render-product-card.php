<?php
function renderProductCard(Product $product): void
{
?>
    <a href="">
        <div class="product-card">
            <img src="<?= $product->getImage(0) ?>" alt="<?= htmlspecialchars($product->getName()) ?>" title="<?= htmlspecialchars($product->getName()) ?>" loading="lazy" height="200">

            <h3 class="multi-line-ellipsis" title="<?= htmlspecialchars($product->getName()); ?>">
                <?= htmlspecialchars($product->getName()); ?>
            </h3>

            <span>
                <p>
                    <?= $product->getCurrency() . htmlspecialchars($product->getPrice()); ?>
                </p>
                <p>1.3k Sold</p>
            </span>
        </div>
    </a>
<?php } ?>