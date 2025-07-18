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
                <img 
                    src="<?= ICON_PATH . 'filter.svg' ?>" 
                    alt="Search filter" 
                    title="Search filter" 
                    height="24" 
                    width="24" />

                <h1>
                    Search Filter
                </h1>
            </div>

            <section class="category-filter">
                <h3 class="black-text">By Category</h3>

                <?php
                $sna    =   Category::sna->value;
                $cnl    =   Category::cnl->value;
                $cnpp   =   Category::cnpp->value;
                $gm     =   Category::gm->value;
                $nnsh   =   Category::nnsh->value;
                $anm    =   Category::anm->value;
                $wnht   =   Category::wnht->value;
                $onp    =   Category::onp->value;
                $dnc    =   Category::dnc->value;
                $tfe    =   Category::tfe->value;
                ?>
                <form class="category-form" action="" method="GET">
                    <div class="flex-row-reverse">
                        <label for="<?= $sna ?>">Smartphone and Accessories</label>
                        <input type="checkbox" name="<?= $sna ?>" id="<?= $sna ?>" value="<?= $sna ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= $cnl ?>">Computers and Laptops</label>
                        <input type="checkbox" name="<?= $cnl ?>" id="<?= $cnl ?>" value="<?= $cnl ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= $cnpp ?>">Components and PC Parts</label>
                        <input type="checkbox" name="<?= $cnpp ?>" id="<?= $cnpp ?>" value="<?= $cnpp ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= $gm ?>">Gaming</label>
                        <input type="checkbox" name="<?= $gm ?>" id="<?= $gm ?>" value="<?= $gm ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= $nnsh ?>">Networking and Smart Home</label>
                        <input type="checkbox" name="<?= $nnsh ?>" id="<?= $nnsh ?>" value="<?= $nnsh ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= $anm ?>">Audio and Music</label>
                        <input type="checkbox" name="<?= $anm ?>" id="<?= $anm ?>" value="<?= $anm ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= $wnht ?>">Wearables and Health Tech</label>
                        <input type="checkbox" name="<?= $wnht ?>" id="<?= $wnht ?>" value="<?= $wnht ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= $onp ?>">Office and Productivity</label>
                        <input type="checkbox" name="<?= $onp ?>" id="<?= $onp ?>" value="<?= $onp ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= $dnc ?>">Drones and Cameras</label>
                        <input type="checkbox" name="<?= $dnc ?>" id="<?= $dnc ?>" value="<?= $dnc ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?= $tfe ?>">Tech for Education</label>
                        <input type="checkbox" name="<?= $tfe ?>" id="<?= $tfe ?>" value="<?= $tfe ?>">
                    </div>
                </form>
            </section>

            <section class="rating-filter">
                <h3>By Rating</h3>

                <!-- 5 Star Rating -->
                <button data-rate="5">
                    <div class="flex-row">
                        <?php ratingStars(5) ?>
                    </div>
                </button>

                <!-- 4 Star Rating -->
                <button data-rate="4">
                    <div class="flex-row">
                        <?php ratingStars(4) ?>
                        <p class="black-text">& Up</p>
                    </div>
                </button>

                <!-- 3 Star Rating -->
                <button data-rate="3">
                    <div class="flex-row">
                        <?php ratingStars(3) ?>
                        <p class="black-text">& Up</p>
                    </div>
                </button>

                <!-- 2 Star Rating -->
                <button data-rate="2">
                    <div class="flex-row">
                        <?php ratingStars(2) ?>
                        <p class="black-text">& Up</p>
                    </div>
                </button>

                <!-- 1 Star Rating -->
                <button data-rate="1">
                    <div class="flex-row">
                        <?php ratingStars(1) ?>
                        <p class="black-text">& Up</p>
                    </div>
                </button>

            </section>

            <section class="price-filter">
                <h3>Price Range</h3>

                <form class="center-child" action="" method="GET">
                    <input 
                        class="min dark-white-bg" 
                        type="number" 
                        id="min_price" 
                        name="min_price" 
                        placeholder="MIN" 
                        min="0" 
                        max="99999" />

                    <p class="">&#8212;</p>

                    <input 
                        class="max dark-white-bg" 
                        type="number" 
                        id="max_price" 
                        name="max_price" 
                        placeholder="MAX" 
                        min="0" 
                        max="99999" />
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

            <?php include_once COMPONENT_PATH . 'product-list.php' ?>

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