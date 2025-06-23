<?php
function renderProductCard(): void
{
?>
    <a href="">
        <div class="product-card">
            <img src="<?php echo htmlspecialchars(IMAGE_PATH . 'laptop-1.jpg') ?>" alt="Product image" title="Product image" height="200">

            <h3 class="multi-line-ellipsis">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, est.
            </h3>

            <span>
                <p>&#x20B1;50 999</p>
                <p>1.3k Sold</p>
            </span>
        </div>
    </a>
<?php } ?>