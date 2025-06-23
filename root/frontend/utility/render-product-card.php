<?php
function renderProductCard(Product $product): void
{
?>
    <a href="">
        <div class="product-card">
            <!-- TODO: Change this to product's url -->
            <img src="<?php echo htmlspecialchars(IMAGE_PATH . 'laptop-1.jpg') ?>" alt="Product image" title="Product image" height="200">

            <h3 class="multi-line-ellipsis">
                <?php echo htmlspecialchars($product->getDescription()); ?>
            </h3>

            <span>
                <p>
                    <?php echo $product->getCurrency() . $product->getPrice()?>
                </p>
                <p>1.3k Sold</p>
            </span>
        </div>
    </a>
<?php } ?>