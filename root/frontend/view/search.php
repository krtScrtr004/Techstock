<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Techstock | Search</title>

    <base href="/Techstock/root/frontend/">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'root.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'utility.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'component.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'header.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'footer.css' ?>">

    <link rel="stylesheet" href="<?= STYLE_PATH . 'search.css' ?>">
</head>

<body class="search">

    <?php require_once COMPONENT_PATH . 'header.php' ?>

    <main class="flex-row dark-white-bg">
        <aside class="flex-col white-bg">
            <div class="text-w-icon flex-child-start-v">
                <img src="<?= ICON_PATH . 'filter.svg' ?>" alt="Search filter" title="Search filter" height="24" width="24">
                <h1>
                    Search Filter
                </h1>
            </div>

            <section class="category-filter">
                <h3 class="black-text">By Category</h3>

                <form class="category-form" action="" method="GET">
                    <div class="flex-row-reverse">
                        <label for="<?= Category::sna->value ?>">Smartphone and Accessories</label>

                        <input type="checkbox" name="<?= Category::sna->value ?>" id="<?= Category::sna->value ?>" value="<?= Category::sna->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= Category::cnl->value ?>">Computers and Laptops</label>

                        <input type="checkbox" name="<?= Category::cnl->value ?>" id="<?= Category::cnl->value ?>" value="<?= Category::cnl->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= Category::cnpp->value ?>">Components and PC Parts</label>

                        <input type="checkbox" name="<?= Category::cnpp->value ?>" id="<?= Category::cnpp->value ?>" value="<?= Category::cnpp->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= Category::gm->value ?>">Gaming</label>

                        <input type="checkbox" name="<?= Category::gm->value ?>" id="<?= Category::gm->value ?>" value="<?= Category::gm->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= Category::nnsh->value ?>">Networking and Smart Home</label>

                        <input type="checkbox" name="<?= Category::nnsh->value ?>" id="<?= Category::nnsh->value ?>" value="<?= Category::nnsh->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= Category::anm->value ?>">Audio and Music</label>

                        <input type="checkbox" name="<?= Category::anm->value ?>" id="<?= Category::anm->value ?>" value="<?= Category::anm->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= Category::wnht->value ?>">Wearables and Health Tech</label>

                        <input type="checkbox" name="<?= Category::wnht->value ?>" id="<?= Category::wnht->value ?>" value="<?= Category::wnht->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= Category::onp->value ?>">Office and Productivity</label>

                        <input type="checkbox" name="<?= Category::onp->value ?>" id="<?= Category::onp->value ?>" value="<?= Category::onp->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= Category::dnc->value ?>">Drones and Cameras</label>

                        <input type="checkbox" name="<?= Category::dnc->value ?>" id="<?= Category::dnc->value ?>" value="<?= Category::dnc->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= Category::tfe->value ?>">Tech for Education</label>

                        <input type="checkbox" name="<?= Category::tfe->value ?>" id="<?= Category::tfe->value ?>" value="<?= Category::tfe->value ?>">
                    </div>
                </form>
            </section>

            <section class="rating-filter">
                <h3>By Rating</h3>

                <!-- 5 Star Rating -->
                <button data-rate="5">
                    <div class="flex-row">
                        <?php
                        for ($i = 0; $i < 5; ++$i) {
                            echo '<div class="inline yellow-text">&#9733;</div>';
                        }
                        ?>
                    </div>
                </button>

                <!-- 4 Star Rating -->
                <button data-rate="4">
                    <div class="flex-row">
                        <?php
                        for ($i = 0; $i < 5; ++$i) {
                            echo '<div class="inline ' . (($i < 4) ? 'yellow-text' : 'black-text') . '">&#9733;</div>';
                        }
                        ?>
                        <p class="black-text">& Up</p>
                    </div>
                </button>

                <!-- 3 Star Rating -->
                <button data-rate="3">
                    <div class="flex-row">
                        <?php
                        for ($i = 0; $i < 5; ++$i) {
                            echo '<div class="inline ' . (($i < 3) ? 'yellow-text' : 'black-text') . '">&#9733;</div>';
                        }
                        ?>
                        <p class="black-text">& Up</p>
                    </div>
                </button>

                <!-- 2 Star Rating -->
                <button data-rate="2">
                    <div class="flex-row">
                        <?php
                        for ($i = 0; $i < 5; ++$i) {
                            echo '<div class="inline ' . (($i < 2) ? 'yellow-text' : 'black-text') . '">&#9733;</div>';
                        }
                        ?>
                        <p class="black-text">& Up</p>
                    </div>
                </button>

                <!-- 1 Star Rating -->
                <button data-rate="1">
                    <div class="flex-row">
                        <?php
                        for ($i = 0; $i < 5; ++$i) {
                            echo '<div class="inline ' . (($i < 1) ? 'yellow-text' : 'black-text') . '">&#9733;</div>';
                        }
                        ?>
                        <p class="black-text">& Up</p>
                    </div>
                </button>

            </section>

            <section class="price-filter">
                <h3>Price Range</h3>

                <form class="center-child" action="" method="GET">
                    <input class="min dark-white-bg" type="number" id="min_price" name="min_price" placeholder="MIN" min="0" max="99999">

                    <p class="">&#8212;</p>

                    <input class="max dark-white-bg" type="number" id="max_price" name="max_price" placeholder="MAX" min="0" max="99999">
                </form>
            </section>

            <div class="filter-button flex-row">
                <button class="clear red-bg white-text" type="submit">
                    CLEAR
                </button>

                <button class="apply black-bg white-text" type="submit">
                    APPLY
                </button>
            </div>
        </aside>

        <section class="result-grid flex-col">
            <!-- TODO: Add relavant store result here -->

            <?php 
            include_once COMPONENT_PATH . 'product-list.php'; 
            ?>

            <div class="page-tab center-child"></div>
        </section>
    </main>

    <?php
    require_once COMPONENT_PATH . 'footer.php';

    errorOccurredDialog(); 
    ?>

    <script src="<?= htmlspecialchars(EVENT_PATH . 'page-tab.js'); ?>" type="module" defer></script>
    <script src="<?= htmlspecialchars(EVENT_PATH . 'search-filter.js'); ?>" type="module" defer></script>

</body>

</html>