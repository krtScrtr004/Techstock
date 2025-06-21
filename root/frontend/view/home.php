<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Techstock | Home</title>

    <base href="/Techstock/root/frontend/">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'root.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'utility.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'component.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'header.css' ?>">

    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'home.css' ?>">
</head>

<body class="home flex-col">
    <?php include_once COMPONENT_PATH . 'header.php'; ?>

    <main class="dark-white-bg">
        <section class="banner-section white-bg">
            <div class="slide-show-wrapper relative">
                <img class="slide-show fade" src="<?php echo htmlspecialchars(IMAGE_PATH . 'console-1.jpg'); ?>" alt="Slideshow" title="Slideshow" height="300" loading="lazy">

                <div class="change-button previous center-child absolute white-bg">
                    <img src="<?php echo htmlspecialchars(ICON_PATH . 'next.svg'); ?>" alt="Previous button" title="Previous button" height="20" width="20">
                </div>

                <div class="change-button next center-child absolute white-bg">
                    <img src="<?php echo htmlspecialchars(ICON_PATH . 'next.svg'); ?>" alt="Next button" title="Next button" height="20" width="20">
                </div>

                <span class="absolute flex-row">
                    <div class="dot-tab active circle white-bg"></div>
                    <div class="dot-tab circle white-bg"></div>
                    <div class="dot-tab circle white-bg"></div>
                    <div class="dot-tab circle white-bg"></div>
                    <div class="dot-tab circle white-bg"></div>
                </span>
            </div>


        </section>
    </main>

    <script src="<?php echo htmlspecialchars(EVENT_PATH . 'slideshow.js'); ?>" defer></script>
</body>

</html>