<?php
    $storeName = htmlspecialchars($store->getName());
    $storeLogo = htmlspecialchars($store->getLogo());
    $storeFollowerCount = htmlspecialchars(formatNumber($store->getFollowerCount()));
    $storeProductCount = htmlspecialchars(formatNumber($store->getProductCount()));
    $storeContact = htmlspecialchars($store->getContact()) ?? 'No contact detail';
    $storeEmail = htmlspecialchars($store->getEmail()) ?? 'No email address';
    $storeAddress = htmlspecialchars($store->getAddress());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Techstock | <?= $storeName ?></title>

    <base href="/Techstock/root/frontend/">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'utility.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'component.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'header.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'footer.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'root.css' ?>">

    <link rel="stylesheet" href="<?= STYLE_PATH . 'store.css' ?>">
</head>

<body class="store">
    <?php require_once COMPONENT_PATH . 'header.php' ?>

    <main>
        <section class="heading flex-row white-bg">
            <section class="store-info flex-row flex-child-center-h">
                <!-- Store Logo -->
                <img class="circle fit-contain" src="<?= $storeLogo ?>" alt="<?= $storeName ?>" title="<?= $storeName ?>" height="150">

                <!--  -->
                <div class="flex-col">
                    <h1 class="store-name black-text bold-text wrap-text"><?= $storeName ?></h1>
                    <span class="misc-info block">
                        <p class="inline black-text"><?= $storeFollowerCount ?> Followers</p>
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
                        <input type="text" name="search_store" id="search_store" placeholder="Search in <?= $storeName ?>" min="1" max="255" autocomplete="on" required>

                        <button class="search-store-button unset-button">
                            <img src="<?= ICON_PATH . 'search_b.svg' ?>" alt="Search in store" title="Search in store" height="24">
                        </button>
                    </div>
                </form>

                <div class="info-grid grid">
                    <!-- Product Count -->
                    <p class="key black-text">Products</p>
                    <h3 class="value black-text bold-text"><?= $storeProductCount ?></h3>

                    <!-- Contact -->
                    <p class="key black-text">Contact</p>
                    <h3 class="value black-text bold-text"><?= $storeContact ?></h3>

                    <!-- Email -->
                    <p class="key black-text">Email</p>
                    <h3 class="value black-text bold-text"><?= $storeEmail ?></h3>

                    <!-- Address -->
                    <p class="key black-text">Address</p>
                    <h3 class="value black-text bold-text"><?= $storeAddress ?></h3>
                </div>
            </section>
        </section>

        <section class="content dark-white-bg">

        </section>
    </main>

    <?php
    require_once COMPONENT_PATH . 'footer.php';

    // Hidden Modals
    errorOccurredDialog();
    ?>
</body>

</html>