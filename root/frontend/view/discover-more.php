<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Techstock | Discover More</title>

    <base href="/Techstock/root/frontend/">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'root.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'utility.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'component.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'header.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'footer.css' ?>">

    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'discover-more.css' ?>">

</head>

<body class="discover-more">
    <?php require_once COMPONENT_PATH . 'header.php'; ?>

    <main class="dark-white-bg flex-col">
        <section class="heading center-child">
            <div class="relative">
                <hr class="heading-line black-text">

                <h1 class="absolute center-text black-bg white-text">Discover More</h1>

            </div>
        </section>

        <section class="product-grid-wrapper flex-col">
            <?php include_once COMPONENT_PATH . 'product-list.php'; ?>
        </section>
    </main>

    <?php require_once COMPONENT_PATH . 'footer.php'; ?>
</body>

</html>