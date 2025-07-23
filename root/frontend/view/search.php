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
                $categories = [
                    'Smartphone and Accessories'      => Category::sna->value,
                    'Computers and Laptops'           => Category::cnl->value,
                    'Components and PC Parts'         => Category::cnpp->value,
                    'Gaming'                          => Category::gm->value,
                    'Networking and Smart Home'       => Category::nnsh->value,
                    'Audio and Music'                 => Category::anm->value,
                    'Wearables and Health Tech'       => Category::wnht->value,
                    'Office and Productivity'         => Category::onp->value,
                    'Drones and Cameras'              => Category::dnc->value,
                    'Tech for Education'              => Category::tfe->value,
                ];
                ?>
                <form class="category-form" action="" method="GET">
                    <?php foreach ($categories as $key => $value): ?>
                        <div class="flex-row-reverse">
                            <label for="<?= $value ?>"><?= $key ?></label>
                            <input type="checkbox" name="<?= $value ?>" id="<?= $value ?>" value="<?= $value ?>">
                        </div>
                    <?php endforeach; ?>
                </form>
            </section>

            <section class="rating-filter">
                <h3>By Rating</h3>

                <?php for ($i = 5; $i > 0; --$i): ?>
                    <button data-rate="<?= $i ?>">
                        <div class="flex-row">
                            <?php
                            ratingStars($i);
                            if ($i < 5) {
                                echo '<p class="black-text">& Up</p>';
                            }
                            ?>
                        </div>
                    </button>
                <?php endfor; ?>
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
            <!-- TODO: Add relevant store result here -->

            <?php productGrid($products) ?>

            <div class="page-tab center-child"></div>
        </section>
    </main>

    <?php require_once COMPONENT_PATH . 'footer.php' ?>

    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'page-tab.js'); ?>" defer></script>

    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'search' . DS . 'filter.js'); ?>" defer></script>

</body>

</html>