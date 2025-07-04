<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo htmlspecialchars($product->getName()) ?>
    </title>

    <base href="/Techstock/root/frontend/">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'root.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'utility.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'component.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'header.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'footer.css' ?>">

    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'product-info.css' ?>">
</head>

<body class="page-info">
    <?php require_once COMPONENT_PATH . 'header.php' ?>

    <main class="dark-white-bg">
        <section class="purchase-info flex-row white-bg">
            <!-- Images Section -->
            <section class="images-section flex-col">
                <img class="featured-image" src="<?php echo htmlspecialchars($product->getImage(0)) ?>" alt="<?php echo htmlspecialchars($product->getName()) ?>" title="<?php echo htmlspecialchars($product->getName()) ?>" loading="lazy" height="400">

                <section class="image-collection carousel-wrapper">
                    <section class="carousel">
                        <?php foreach ($product->getImages() as $image): ?>
                            <img class="featured-image" src="<?php echo htmlspecialchars($image) ?>" alt="<?php echo htmlspecialchars($product->getName()) ?>" title="<?php echo htmlspecialchars($product->getName()) ?>" loading="lazy" height="400">
                        <?php endforeach; ?>
                    </section>

                    <button type="button" class="tracker left unset-button">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'next.svg') ?>" alt="Next button" title="Next button" height="20">
                    </button>

                    <button type="button" class="tracker right unset-button">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'next.svg') ?>" alt="Next button" title="Next button" height="20">
                    </button>
                </section>

                <section class="misc_section flex-row flex-child-center-h">
                    <div class="flex-row">
                        <p class="black-text">Share</p>

                        <a href="">
                            <img src="<?php echo htmlspecialchars(ICON_PATH . 'facebook.svg') ?>" alt="Share to Facebook" title="Share to Facebook" height="24" width="24">
                        </a>

                        <button class="copy-link unset-button">
                            <img src="<?php echo htmlspecialchars(ICON_PATH . 'copy.svg') ?>" alt="Copy link" title="Copy link" height="24" width="24">
                        </button>
                    </div>

                    <button type="button" class="text-w-icon unset-button">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'heart_empty.svg') ?>" alt="" width="24" height="24">

                        <p class="black-text">Favorite</p>
                    </button>
                </section>
            </section>

            <!-- Info Section -->
            <section class="info-section">
                <section class="info-heading">
                    <h1 class="product-name black-text">
                        <?php echo htmlspecialchars($product->getName()) ?>
                    </h1>

                    <section class="misc-info flex-row">
                        <a href="" class="flex-row black-text">
                            <?php
                            $rating = $product->getRating();

                            echo number_format($rating, 1);
                            renderRatingStars($rating);
                            ?>
                        </a>

                        <p class="black-text"><?php echo htmlspecialchars($ratingCount) ?> Ratings</p>
                        <p class="black-text"><?php echo htmlspecialchars($product->getSoldCount()) ?> Sold</p>

                        <div class="flex-row-reverse">
                            <button type="button" class="unset-button">
                                <p class="black-text">Report</p>
                            </button>
                        </div>
                    </section>
                </section>

                <!-- Price Section -->
                <section class="product-price dark-white-bg">
                    <h3 class="black-text">
                        <?php echo $product->getCurrency() . htmlspecialchars($product->getPrice()) ?>
                    </h3>
                </section>

                <!-- Shipping Section -->
                <section class="shipping-section grid">
                    <p class="title">Shipping</p>

                    <div class="icon center-child">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'shipping.svg') ?>" alt="" height="24" width="24">
                    </div>

                    <p class="sub-title upper ">Shipping To</p>
                    <form class="form" action="" method="POST">
                        <input class="dark-white-bg" type="text" name="address" id="address" placeholder="Shipping address" min="8" max="255" required>
                    </form>

                    <p class="sub-title lower ">Shipping Fee</p>
                    <p class="fee ">54</p>
                </section>

                <!-- Options / Variants Section -->
                <?php foreach ($product->getOptions() as $key => $value): ?>
                    <section class="option-section grid">
                        <p class="title"> <?php echo htmlspecialchars(ucwords($key)) ?> </p>

                        <!-- Options / Variants Selection Buttons -->
                        <div class="buttons flex-row">
                            <?php for ($i = 0, $n = count($value); $i < $n; ++$i): ?>
                                <button type="button" class="unset-button"><?php echo htmlspecialchars($value[$i]) ?></button>
                            <?php endfor; ?>
                        </div>
                    </section>
                <?php endforeach; ?>

                <!-- Quantity Section -->
                <section class="quantity-section grid">
                    <p class="title">Quantity</p>

                    <div class="flex-row">
                        <form action="" method="POST">
                            <input class="dark-white-bg" type="number" name="quantity" id="quantity" value="1" min="0" max="<?php echo htmlspecialchars($product->getStock()) ?>" required>
                        </form>

                        <p class="center-child"><?php echo htmlspecialchars($product->getStock()) ?> Stocks available</p>
                    </div>
                </section>

                <!-- Button Section -->
                <section class="button-section flex-row flex-child-center-h">
                    <button class="add-to-cart inline blue-text">
                        <div class="text-w-icon center-child">
                            <img src="<?php echo htmlspecialchars(ICON_PATH . 'cart_b.svg') ?>" alt="Add to cart" title="Add to cart" height="16" width="16">

                            <p>Add To Cart</p>
                        </div>
                    </button>

                    <button class="inline black-bg white-text">
                        Buy Now
                    </button>
                </section>
            </section>
        </section>
        </section>

    </main>

    <script src="<?php echo htmlspecialchars(EVENT_PATH . 'carousel-tracker.js'); ?>" defer></script>
    <script src="<?php echo htmlspecialchars(EVENT_PATH . 'show-click-image.js'); ?>" defer></script>
</body>

</html>