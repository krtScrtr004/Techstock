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

    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'page-info.css' ?>">
</head>

<body class="page-info">
    <?php require_once COMPONENT_PATH . 'header.php' ?>

    <main class="dark-white-bg">
        <section class="purchase-info flex-row white-bg">
            <!-- Images Section -->
            <section class="images-section flex-col">
                <img class="featured-image" src="<?php echo htmlspecialchars(IMAGE_PATH . 'controller-1.jpg') ?>" alt="<?php echo htmlspecialchars($product->getName()) ?>" title="<?php echo htmlspecialchars($product->getName()) ?>" height="400">

                <section class="image-collection carousel-wrapper">
                    <section class="carousel">
                        <?php for ($i = 0; $i < 6; ++$i): ?>
                            <img class="featured-image" src="<?php echo htmlspecialchars(IMAGE_PATH . 'controller-1.jpg') ?>" alt="<?php echo htmlspecialchars($product->getName()) ?>" title="<?php echo htmlspecialchars($product->getName()) ?>" height="400">
                        <?php endfor; ?>
                    </section>

                    <button type="button" class="tracker left">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'next.svg') ?>" alt="Next button" title="Next button" height="20">
                    </button>

                    <button type="button" class="tracker right">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'next.svg') ?>" alt="Next button" title="Next button" height="20">
                    </button>
                </section>

                <section class="misc_section flex-row flex-child-center-h">
                    <div class="flex-row">
                        <p class="black-text">Share</p>
                        
                        <a href="">
                            <img src="<?php echo htmlspecialchars(ICON_PATH . 'facebook.svg') ?>" alt="Share to Facebook" title="Share to Facebook" height="24" width="24">
                        </a>

                        <button class="copy-link">
                            <img src="<?php echo htmlspecialchars(ICON_PATH . 'copy.svg') ?>" alt="Copy link" title="Copy link" height="24" width="24">
                        </button>
                    </div>

                    <button type="button" class="text-w-icon">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'heart_empty.svg')?>" alt="" width="24" height="24">
                        
                        <p class="black-text">Favorite</p>
                    </button>
                </section>
            </section>
        </section>
    </main>

    <script src="<?php echo htmlspecialchars(EVENT_PATH . 'carousel-tracker.js'); ?>" defer></script>
</body>

</html>