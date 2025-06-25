<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Techstock | Search</title>

    <base href="/Techstock/root/frontend/">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'root.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'utility.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'component.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'header.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'footer.css' ?>">

    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'search.css' ?>">
</head>

<body class="search">

    <?php require_once COMPONENT_PATH . 'header.php' ?>

    <main class="flex-row dark-white-bg">
        <aside class="flex-col white-bg">
            <div class="text-w-icon flex-child-start-v">
                <img src="<?php echo htmlspecialchars(ICON_PATH . 'filter.svg') ?>" alt="Search filter" title="Search filter" height="24" width="24">
                <h1>
                    Search Filter
                </h1>
            </div>

            <section class="category-filter">
                <h3 class="black-text">By Category</h3>

                <form class="category-form" action="" method="GET">
                    <div class="flex-row-reverse">
                        <label for="<?php echo Category::sna->value ?>">Smartphone and Accessories</label>

                        <input type="checkbox" name="<?php echo Category::sna->value ?>" id="<?php echo Category::sna->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?php echo Category::cnl->value ?>">Computers and Laptops</label>

                        <input type="checkbox" name="<?php echo Category::cnl->value ?>" id="<?php echo Category::cnl->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?php echo Category::cnpp->value ?>">Components and PC Parts</label>

                        <input type="checkbox" name="<?php echo Category::cnpp->value ?>" id="<?php echo Category::cnpp->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?php echo Category::gm->value ?>">Gaming</label>

                        <input type="checkbox" name="<?php echo Category::gm->value ?>" id="<?php echo Category::gm->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?php echo Category::nnsh->value ?>">Networking and Smart Home</label>

                        <input type="checkbox" name="<?php echo Category::nnsh->value ?>" id="<?php echo Category::nnsh->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?php echo Category::anm->value ?>">Audio and Music</label>

                        <input type="checkbox" name="<?php echo Category::anm->value ?>" id="<?php echo Category::anm->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?php echo Category::wnht->value ?>">Wearables and Health Tech</label>

                        <input type="checkbox" name="<?php echo Category::wnht->value ?>" id="<?php echo Category::wnht->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?php echo Category::onp->value ?>">Office and Productivity</label>

                        <input type="checkbox" name="<?php echo Category::onp->value ?>" id="<?php echo Category::onp->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?php echo Category::dnc->value ?>">Drones and Cameras</label>

                        <input type="checkbox" name="<?php echo Category::dnc->value ?>" id="<?php echo Category::dnc->value ?>">
                    </div>

                    <div class="flex-row-reverse">
                        <label for="<?php echo Category::tfe->value ?>">Tech for Education</label>

                        <input type="checkbox" name="<?php echo Category::tfe->value ?>" id="<?php echo Category::tfe->value ?>">
                    </div>
                </form>
            </section>
        </aside>

        <section class="result-grid">

        </section>
    </main>

</body>

</html>