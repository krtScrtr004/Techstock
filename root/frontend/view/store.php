<?php
$name          =   htmlspecialchars($store->getName());
$logo          =   htmlspecialchars($store->getLogo());
$followerCount =   htmlspecialchars(formatNumber($store->getFollowerCount()));
$productCount  =   htmlspecialchars(formatNumber($store->getProductCount()));
$contact       =   htmlspecialchars($store->getContact()) ?? 'No contact detail';
$email         =   htmlspecialchars($store->getEmail()) ?? 'No email address';
$address       =   htmlspecialchars($store->getAddress());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Techstock | <?= $name ?></title>

    <base href="/Techstock/root/frontend/">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'utility.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'component.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'header.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'footer.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'root.css' ?>">

    <link rel="stylesheet" href="<?= STYLE_PATH . 'store.css' ?>">
</head>

<body class="store relative">
    <?php require_once COMPONENT_PATH . 'header.php' ?>

    <main>
        <section class="heading flex-row white-bg">
            <section class="store-info flex-row flex-child-center-h">
                <!-- Store Logo -->
                <img class="circle fit-contain" src="<?= $logo ?>" alt="<?= $name ?>" title="<?= $name ?>" height="150">

                <!--  -->
                <div class="flex-col">
                    <h1 class="store-name black-text bold-text wrap-text"><?= $name ?></h1>
                    <span class="misc-info block">
                        <p class="inline black-text"><?= $followerCount ?> Followers</p>
                        <!-- <p class="inline black-text">99% Positive Ratings</p> -->
                    </span>
                    <div class="buttons flex-row">
                        <button class="unset-button" type="button">
                            <div class="text-w-icon">
                                <img src="<?= ICON_PATH . 'chat_b.svg' ?>" alt="Chat now" title="Chat now" height="16">

                                <h3 class="black-text">Chat Now</h3>
                            </div>
                        </button>

                        <button class="unset-button" type="button">
                            <div class="text-w-icon">
                                <img src="<?= ICON_PATH . 'store_b.svg' ?>" alt="Chat now" title="Chat now" height="16">

                                <h3 class="black-text">Follow</h3>
                            </div>
                        </button>
                    </div>
                </div>
            </section>

            <section class="additional-info flex-col">
                <form class="search-store-form" action="" method="GET">
                    <div class="transparent-bg relative">
                        <input type="text" name="search_store" id="search_store" placeholder="Search in <?= $name ?>" min="1" max="255" autocomplete="on" required>

                        <button class="search-store-button unset-button">
                            <img src="<?= ICON_PATH . 'search_b.svg' ?>" alt="Search in store" title="Search in store" height="24">
                        </button>
                    </div>
                </form>

                <div class="info-grid grid">
                    <!-- Product Count -->
                    <p class="key black-text">Products</p>
                    <h3 class="value black-text bold-text"><?= $productCount ?></h3>

                    <!-- Contact -->
                    <p class="key black-text">Contact</p>
                    <h3 class="value black-text bold-text"><?= $contact ?></h3>

                    <!-- Email -->
                    <p class="key black-text">Email</p>
                    <h3 class="value black-text bold-text"><?= $email ?></h3>

                    <!-- Address -->
                    <p class="key black-text">Address</p>
                    <h3 class="value black-text bold-text"><?= $address ?></h3>
                </div>
            </section>
        </section>

        <section class="content flex-col dark-white-bg">
            <?php

            // Recommended Products
            featuredItem(
                [$controllerInstance, 'featuredProductsCallback'],
                $products,
                'Recommended For You'
            );

            // Top Sellers
            featuredItem(
                [$controllerInstance, 'featuredProductsCallback'],
                $products,
                'Top Sellers'
            );

            // New Arrival
            featuredItem(
                [$controllerInstance, 'featuredProductsCallback'],
                $products,
                'New Arrival'
            );
            ?>

            <section class="infinite-list flex-row">
                <!-- Collections Filter -->
                <aside class="sticky white-bg">
                    <div class="text-w-icon flex-child-start-v">
                        <img src="<?= ICON_PATH . 'filter.svg' ?>" alt="Search filter" title="Search filter" height="24" width="24">
                        <h1 class="black-text">
                            Collections Filter
                        </h1>
                    </div>

                    <form class="collection-form flex-col" action="" method="POST">
                        <input 
                            type="hidden" 
                            id="collection_name"
                            name="collection_name" />

                        <button class="collection-button active unset-button">
                            All Products
                        </button>

                        <?php
                        $collections = $store->getCollection()->toArray();
                        foreach ($collections as $collection):
                            $collection = htmlspecialchars($collection);
                        ?>
                            <button class="collection-button unset-button">
                                <?= $collection ?>
                            </button>
                        <?php endforeach; ?>
                    </form>
                </aside>

                <section class="result-grid">
                    <?php include_once COMPONENT_PATH . 'product-list.php' ?>

                    <div class="sentinel"></div>

                    <span class="no-more-products">
                        <p class="black-text center-text">No more products to load <span class=green-text>&check;</span></p>
                    </span>
                </section>
            </section>
        </section>
    </main>

    <?php
    include_once COMPONENT_PATH . 'back-to-top.php';

    require_once COMPONENT_PATH . 'footer.php';

    // Hidden Modals
    errorOccurredDialog();
    ?>

    <script src="<?= htmlspecialchars(EVENT_PATH . 'carousel-tracker.js'); ?>" defer></script>
    <script src="<?= htmlspecialchars(EVENT_PATH . 'back-to-top.js'); ?>" defer></script>

    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'store/filter-product.js'); ?>" defer></script>
    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'store/scroll-product.js'); ?>" defer></script>
</body>

</html>