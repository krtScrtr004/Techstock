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
        <!-- Banner Section -->
        <section class="banner-section white-bg">
            <!-- Slideshow -->
            <section class="slide-show-wrapper relative">
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
            </section>

            <!-- Category Selection -->
            <section class="category-section flex-row flex-space-evenly">
                <a href="">
                    <div class="category-card flex-col flex-child-center-v">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'phone_b.svg') ?>" alt="Smartphone & Accessories category" title="Smartphone & Accessories category" height="57">
                        <h3 class="center-text black-text">Smartphone & Accessories</h3>
                    </div>
                </a>

                <a href="">
                    <div class="category-card flex-col flex-child-center-v">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'pc_b.svg') ?>" alt="Computers & Laptops category" title="Computers & Laptops category" height="57">
                        <h3 class="center-text black-text">Computers & Laptops</h3>
                    </div>
                </a>

                <a href="">
                    <div class="category-card flex-col flex-child-center-v">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'pc-parts_b.svg') ?>" alt="Components & PC Parts category" title="Components & PC Parts category" height="57">
                        <h3 class="center-text black-text">Components & PC Parts</h3>
                    </div>
                </a>

                <a href="">
                    <div class="category-card flex-col flex-child-center-v">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'console_b.svg') ?>" alt="Gaming category" title="Gaming category" height="57">
                        <h3 class="center-text black-text">Gaming</h3>
                    </div>
                </a>

                <a href="">
                    <div class="category-card flex-col flex-child-center-v">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'router_b.svg') ?>" alt="Network & Smarthome category" title="Network & Smarthome category" height="57">
                        <h3 class="center-text black-text">Network & Smarthome</h3>
                    </div>
                </a>

                <a href="">
                    <div class="category-card flex-col flex-child-center-v">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'headphone_b.svg') ?>" alt="Audio & Music category" title="Audio & Music category" height="57">
                        <h3 class="center-text black-text">Audio & Music</h3>
                    </div>
                </a>

                <a href="">
                    <div class="category-card flex-col flex-child-center-v">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'smartwatch_b.svg') ?>" alt="Wearables & Health  Tech category" title="Wearables & Health  Tech category" height="57">
                        <h3 class="center-text black-text">Wearables & Health Tech</h3>
                    </div>
                </a>

                <a href="">
                    <div class="category-card flex-col flex-child-center-v">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'printer_b.svg') ?>" alt="Office & Productivity category" title="Office & Productivity category" height="57">
                        <h3 class="center-text black-text">Office & Productivity</h3>
                    </div>
                </a>

                <a href="">
                    <div class="category-card flex-col flex-child-center-v">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'camera_b.svg') ?>" alt="Drone & Cameras category" title="Drone & Cameras category" height="57">
                        <h3 class="center-text black-text">Drone & Cameras</h3>
                    </div>
                </a>

                <a href="">
                    <div class="category-card flex-col flex-child-center-v">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'arduino_b.svg') ?>" alt="Tech For Education category" title="Tech For Education category" height="57">
                        <h3 class="center-text black-text">Tech For Education</h3>
                    </div>
                </a>

            </section>
        </section>

        <section class="top-product-section featured-item">
            <section class="carousel-wrapper">
                <h1>Top Products</h1>

                <section class="carousel">
                    <?php
                    for ($i = 0, $n = 10; $i < $n; $i++) {
                    ?>
                        <div class="product-card">
                            <img src="<?php echo htmlspecialchars(IMAGE_PATH . 'laptop-1.jpg') ?>" alt="Product image" title="Product image" height="200">

                            <h3 class="multi-line-ellipsis">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, est.
                            </h3>

                            <span>
                                <p>&#x20B1;50 999</p>
                                <p>1.3k Sold</p>
                            </span>
                        </div>
                    <?php } ?>
                </section>

                <div class="tracker left">
                    <img src="<?php echo htmlspecialchars(ICON_PATH . 'next.svg') ?>" alt="Next button" title="Next button" height="20">
                </div>

                <div class="tracker right">
                    <img src="<?php echo htmlspecialchars(ICON_PATH . 'next.svg') ?>" alt="Next button" title="Next button" height="20">
                </div>
            </section>
        </section>
    </main>

    <script src="<?php echo htmlspecialchars(EVENT_PATH . 'slideshow.js'); ?>" defer></script>
    <script src="<?php echo htmlspecialchars(EVENT_PATH . 'break-text-fallback.js'); ?>" defer></script>
    <script src="<?php echo htmlspecialchars(EVENT_PATH . 'carousel-tracker.js'); ?>" defer></script>
</body>

</html>