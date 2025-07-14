<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Techstock | <?= htmlspecialchars($product->getName()) ?>
    </title>

    <base href="/Techstock/root/frontend/">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'root.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'utility.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'component.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'header.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'footer.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'confirm-order.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'report-modal.css' ?>">

    <link rel="stylesheet" href="<?= STYLE_PATH . 'product-info.css' ?>">
</head>

<body class="page-info">
    <?php require_once COMPONENT_PATH . 'header.php' ?>

    <main class="dark-white-bg flex-col">
        <?=
        copyLinkNotification(true);
        copyLinkNotification(false);

        renderCategoryChain($product->getCategory(), $product->getName());
        ?>

        <!-- Product Purchase Info Section -->
        <section class="purchase-info major-section flex-row white-bg">
            <!-- Images Section -->
            <section class="images-section flex-col">
                <img class="featured-image" src="<?= htmlspecialchars($product->getImage(0)) ?>" alt="<?= htmlspecialchars($product->getName()) ?>" title="<?= htmlspecialchars($product->getName()) ?>" loading="lazy" height="400">

                <section class="image-collection carousel-wrapper">
                    <section class="carousel">
                        <?php foreach ($product->getImages() as $image): ?>
                            <img class="featured-image" src="<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($product->getName()) ?>" title="<?= htmlspecialchars($product->getName()) ?>" loading="lazy" height="400">
                        <?php endforeach; ?>
                    </section>

                    <button type="button" class="tracker left unset-button">
                        <img src="<?= ICON_PATH . 'next.svg' ?>" alt="Previous" title="Previous" height="20">
                    </button>

                    <button type="button" class="tracker right unset-button">
                        <img src="<?= ICON_PATH . 'next.svg' ?>" alt="Next" title="Next" height="20">
                    </button>
                </section>

                <section class="misc_section flex-row flex-child-center-h">
                    <div class="flex-row">
                        <p class="black-text">Share</p>

                        <a href="">
                            <img src="<?= ICON_PATH . 'facebook.svg' ?>" alt="Share to Facebook" title="Share to Facebook" height="24" width="24">
                        </a>

                        <button class="copy-link unset-button">
                            <img src="<?= ICON_PATH . 'copy.svg' ?>" alt="Copy link" title="Copy link" height="24" width="24">
                        </button>
                    </div>

                    <button type="button" class="favorite text-w-icon unset-button">
                        <img src="<?= ICON_PATH . 'heart_empty.svg' ?>" alt="" width="24" height="24">

                        <p class="black-text">Favorite</p>
                    </button>
                </section>
            </section>

            <!-- Info Section -->
            <section class="info-section">
                <section class="info-heading">
                    <h1 class="product-name black-text">
                        <?= htmlspecialchars($product->getName()) ?>
                    </h1>

                    <section class="misc-info flex-row">
                        <a href="" class="flex-row black-text">
                            <?php
                            $averageRating = $product->getAverageRating();

                            echo number_format($averageRating, 1);
                            renderRatingStars($averageRating);
                            ?>
                        </a>

                        <p class="black-text"><?= htmlspecialchars($ratingCount) ?> Ratings</p>
                        <p class="black-text"><?= htmlspecialchars($product->getSoldCount()) ?> Sold</p>

                        <div class="flex-row-reverse">
                            <button type="button" class="report-button unset-button">
                                <p class="black-text">Report</p>
                            </button>
                        </div>
                    </section>
                </section>

                <!-- Price Section -->
                <section class="product-price dark-white-bg">
                    <h3 class="black-text">
                        <?= $product->getCurrency() . htmlspecialchars(formatNumber($product->getPrice())) ?>
                    </h3>
                </section>

                <!-- Shipping Section -->
                <section class="shipping-section grid">
                    <p class="title">Shipping</p>

                    <div class="icon center-child">
                        <img src="<?= ICON_PATH . 'shipping.svg' ?>" alt="Ship to" title="Ship to" height="24" width="24">
                    </div>

                    <p class="sub-title upper ">Shipping To</p>
                    <form class="form" action="" method="POST">
                        <input class="dark-white-bg" type="text" name="address" id="address" value="<?= htmlspecialchars($user->getAddress()) ?>" placeholder="Shipping address" min="8" max="255" required>
                    </form>

                    <p class="sub-title lower ">Shipping Fee</p>
                    <p class="fee ">54</p>
                </section>

                <!-- Options / Variants Section -->
                <?php foreach ($product->getOptions() as $key => $value): ?>
                    <section class="option-section grid">
                        <p class="title"> <?= htmlspecialchars(ucwords($key)) ?> </p>

                        <!-- Options / Variants Selection Buttons -->
                        <div class="buttons flex-row flex-wrap">
                            <form class="option-form flex-row" action="" method="POST">
                                <?php for ($i = 0, $n = count($value); $i < $n; ++$i):
                                    $currentValue = htmlspecialchars($value[$i]);
                                ?>

                                    <div class="hidden-wrapper">
                                        <input type="checkbox" name="<?= $currentValue ?>" id="<?= $currentValue ?>" value="<?= $currentValue ?>">

                                        <button type="button" class="unset-button"><?= $currentValue ?></button>
                                    </div>
                                <?php endfor; ?>
                            </form>
                        </div>
                    </section>
                <?php endforeach; ?>

                <!-- Quantity Section -->
                <section class="quantity-section grid">
                    <p class="title">Quantity</p>

                    <div class="flex-row">
                        <form action="" method="POST">
                            <input class="dark-white-bg" type="number" name="quantity" id="quantity" value="1" min="0" max="<?= htmlspecialchars($product->getStock()) ?>" required>
                        </form>

                        <p class="center-child"><?= htmlspecialchars($product->getStock()) ?> Stocks available</p>
                    </div>
                </section>

                <!-- Button Section -->
                <section class="button-section flex-row flex-child-center-h">
                    <button class="add-to-cart-button thin-button inline blue-text">
                        <div class="text-w-icon center-child">
                            <img src="<?= ICON_PATH . 'cart_b.svg' ?>" alt="Add to cart" title="Add to cart" height="16" width="16">

                            <p>Add To Cart</p>
                        </div>
                    </button>

                    <button class="thin-button inline black-bg white-text">
                        Buy Now
                    </button>
                </section>
            </section>
        </section>

        <!-- Product Store Info Section -->
        <section class="store-info major-section flex-row white-bg">
            <!-- Store Logo Section -->
            <section class="store-logo center-child">
                <img src="<?= htmlspecialchars($store->getLogo()) ?>" alt="<?= htmlspecialchars($store->getName()) ?>" title="<?= htmlspecialchars($store->getName()) ?>" height="100">
            </section>

            <!-- Store Chains Section -->
            <section class="chains flex-col flex-child-center-v">
                <h3 class="store-name black-text"><?= htmlspecialchars($store->getName()) ?></h3>

                <div class="buttons flex-row">
                    <button type="button" class="chat-button thin-button">
                        <div class="text-w-icon center-child">
                            <img src="<?= ICON_PATH . 'chat_bl.svg' ?>" alt="Chat now" title="Chat now" height="20" width="20">

                            <p class="blue-text">Chat Now</p>
                        </div>
                    </button>

                    <button type="button" class="white-bg thin-button">
                        View Store
                    </button>
                </div>
            </section>

            <!-- Store Detail Section -->
            <section class="store-details grid">
                <section class="first-col flex-row flex-space-between">
                    <p class="">Contact</p>
                    <h3 class="end-text"><?= htmlspecialchars($store->getContact()) ?></h3>
                </section>

                <section class="first-col flex-row flex-space-between">
                    <p class="">Email</p>
                    <h3 class="end-text"><?= htmlspecialchars($store->getEmail()) ?></h3>
                </section>

                <section class="second-col flex-row flex-space-between">
                    <p class="">Products</p>
                    <h3 class="end-text"><?= htmlspecialchars(formatNumber($store->getProductCount())) ?></h3>
                </section>

                <section class="second-col flex-row flex-space-between">
                    <p class="">Followers</p>
                    <h3 class="end-text"><?= htmlspecialchars(formatNumber($store->getFollowerCount())) ?></h3>
                </section>

                <section class="first-col flex-row flex-space-between">
                    <p class="">Location</p>
                    <h3 class="end-text"><?= htmlspecialchars($store->getLocation()) ?></h3>
                </section>
            </section>
        </section>

        <!-- Product Description Info Section -->
        <section class="description-info major-section white-bg">
            <!-- Specification Section -->
            <section class="specification-section">
                <h3 class="dark-white-bg section-title black-text">
                    Product Specification
                </h3>

                <section class="content flex-col">
                    <div class="specification flex-row">
                        <p class="black-text">Category</p>
                        <?= renderCategoryChain($product->getCategory(), $product->getName()) ?>
                    </div>

                    <?php foreach ($product->getSpecifications() as $key => $value): ?>
                        <div class="specification flex-row">
                            <p class="black-text"><?= htmlspecialchars(ucwords($key)) ?></p>
                            <p class="black-text"><?= htmlspecialchars($value) ?></p>
                        </div>
                    <?php endforeach; ?>
                </section>
            </section>

            <!-- Description Section -->
            <section class="description-section">
                <h3 class="dark-white-bg section-title black-text">
                    Product Description
                </h3>

                <section class="content flex-col">
                    <?= purifyHtml($product->getDescription()) ?>
                </section>
            </section>
        </section>

        <!-- Rating Section -->
        <section id="ratings" class="rating-list-wrapper major-section flex-col white-bg">
            <h3 class="black-text">Product Rating <span class="rating-count">(<?= $product->getTotalRatingCount() ?>)</span></h3>

            <!-- Heading -->
            <section class="heading flex-row">
                <!-- Rating Overview -->
                <section class="rating-overview flex-col flex-child-center-v">
                    <h1 class="average-rating black-text"><?= $product->getAverageRating() ?><span class="out-of-rating"> out of 5</span></h1>

                    <?= renderRatingStars($product->getAverageRating(), 20) ?>
                </section>

                <!-- Star Filter Buttons -->
                <?php if ($product->getTotalRatingCount() > 0): ?>
                    <section class="star-filter-buttons">
                        <form class="flex-row flex-child-start-h flex-wrap" action="" method="POST">
                            <div class="hidden-wrapper center-child">
                                <input type="checkbox" name="all_star" id="all_star" value="all">

                                <button class="active unset-button">
                                    All (<?= htmlspecialchars($product->getTotalRatingCount()) ?>)
                                </button>
                            </div>

                            <div class="hidden-wrapper center-child">
                                <input type="checkbox" name="five_star" id="five_star" value="5">

                                <button class="unset-button">
                                    5 Stars (<?= $product->getFiveRatingCount() ?>)
                                </button>
                            </div>

                            <div class="hidden-wrapper center-child">
                                <input type="checkbox" name="four_star" id="four_star" value="4">

                                <button class="unset-button">
                                    4 Stars (<?= htmlspecialchars($product->getFourRatingCount()) ?>)
                                </button>
                            </div>

                            <div class="hidden-wrapper center-child">
                                <input type="checkbox" name="three_star" id="three_star" value="3">

                                <button class="unset-button">
                                    3 Stars (<?= $product->getThreeRatingCount() ?>)
                                </button>
                            </div>

                            <div class="hidden-wrapper center-child">
                                <input type="checkbox" name="two_star" id="two_star" value="2">

                                <button class="unset-button">
                                    2 Stars (<?= htmlspecialchars($product->getTwoRatingCount()) ?>)
                                </button>
                            </div>

                            <div class="hidden-wrapper center-child">
                                <input type="checkbox" name="one_star" id="one_star" value="1">

                                <button class="unset-button">
                                    1 Stars (<?= htmlspecialchars($product->getOneRatingCount()) ?>)
                                </button>
                            </div>

                        </form>
                    </section>
                <?php endif; ?>
            </section>

            <?php if ($product->getTotalRatingCount() > 0): ?>
                <section class="rating-list flex-col">
                    <section class="list flex-col">
                        <?php foreach ($ratings as $rating) {
                            echo renderRatingCard($rating);
                        } ?>
                    </section>

                    <div class="page-tab center-child"></div>
                </section>
            <?php endif; ?>

        </section>

        <!-- Recommended Products -->
        <section class="recommended-products">
            <h1 class="black-text">Recommended Products</h1>

            <?php include_once COMPONENT_PATH . 'product-list.php' ?>
        </section>
    </main>

    <?php
    require_once COMPONENT_PATH . 'footer.php';

    // Hidden Modals
    reportReasonModal();
    reportDescriptionModal();
    errorOccurredDialog();
    ?>

    <script src="<?= htmlspecialchars(EVENT_PATH . 'carousel-tracker.js'); ?>" defer></script>
    <script src="<?= htmlspecialchars(EVENT_PATH . 'show-click-image.js'); ?>" defer></script>
    <script src="<?= htmlspecialchars(EVENT_PATH . 'copy-link.js'); ?>" defer></script>
    <script src="<?= htmlspecialchars(EVENT_PATH . 'favorite.js'); ?>" defer></script>
    <script src="<?= htmlspecialchars(EVENT_PATH . 'hide-modal.js'); ?>" defer></script>
    <script src="<?= htmlspecialchars(EVENT_PATH . 'report-product.js'); ?>" defer></script>
    <script src="<?= htmlspecialchars(EVENT_PATH . 'select-product-option.js'); ?>" defer></script>
    <script src="<?= htmlspecialchars(EVENT_PATH . 'break-text-fallback.js'); ?>" defer></script>
    <script src="<?= htmlspecialchars(EVENT_PATH . 'filter-ratings.js'); ?>" type="module" defer></script>
    <script src="<?= htmlspecialchars(EVENT_PATH . 'filter-page-tab.js'); ?>" type="module" defer></script>

</body>

</html>