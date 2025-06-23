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
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'footer.css' ?>">

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

        <!-- Top Products -->
        <section class="top-product-section featured-item">
            <section class="carousel-wrapper">
                <h1 class="home-section-heading">Top Products</h1>

                <section class="carousel">
                    <?php
                    for ($i = 0, $n = 8; $i < $n; $i++) {
                    ?>
                        <a href="">
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
                        </a>
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

        <!-- Top Stores -->
        <section class="top-store-section featured-item">
            <section class="carousel-wrapper">
                <h1 class="home-section-heading">Top Stores</h1>

                <section class="carousel">
                    <?php
                    for ($i = 0, $n = 8; $i < $n; $i++) {
                    ?>
                        <a href="">
                            <div class="store-card center-child white-bg">
                                <img src="<?php echo htmlspecialchars(IMAGE_PATH . 'brand logo/hp.png') ?>" alt="Store logo image" title="Store logo image">
                            </div>
                        </a>
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

        <!-- Discover More -->
        <section class="discover-more-section ">
            <h3 class="home-section-heading center-text">Discover More</h3>

            <section class="product-list ">
                <?php
                for ($i = 0, $n = 10; $i < $n; $i++) {
                ?>
                    <a href="">
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
                    </a>
                <?php } ?>
            </section>

            <div class="page-tab center-child">
                <img class="previous center-child" src="<?php echo htmlspecialchars(ICON_PATH . 'next.svg') ?>" alt="Previous button" title="Previous button" height="24">

                <p class="active">1</p>
                <p>2</p>
                <p>3</p>
                <p>4</p>
                <p>5</p>
                <p>...</p>

                <img class="next center-child" src="<?php echo htmlspecialchars(ICON_PATH . 'next.svg') ?>" alt="Next button" title="Next button" height="24">
            </div>
        </section>

        <section class="article-list flex-col white-bg">
            <article class="article">
                <h3>Buy and Sell Electronics Online on Techstock </h3>
                <p>Techstock is your trusted, all-in-one online marketplace for electronics in the Philippines. Whether you're looking to buy the latest gadgets or sell your own tech products, Techstock makes it easy, secure, and exciting. Our platform supports both individual buyers and multi-seller stores, giving everyone the chance to be part of a growing tech-driven community.</p>
                <br>
                <p>From mobile phones, laptops, computer accessories, gaming gear, and home tech appliances, you’ll find great deals and quality items from sellers all over the country. With Techstock Buyer Protection, you can shop worry-free - get the item you ordered, or your money back!</p>
            </article>

            <article class="article">
                <h3>Empowering Sellers to Build Their Tech Empire</h3>
                <p>Techstock isn’t just for buyers - it’s a platform built for sellers too. We offer tools to create your own tech store, manage your listings, handle sales, and connect with customers all in one place. You can even collaborate with other sellers under one store, making Techstock a powerful solution for individuals and teams looking to grow their online business.</p>
                <br>
                <p>List your products with zero setup fees, manage orders easily, and enjoy visibility from a growing tech-focused customer base.</p>
            </article>

            <div class="flex-row">
                <article class="article">
                    <h3>Shop with Confidence and Ease</h3>

                    <p>Techstock makes buying simple and secure:</p>
                    <ul>
                        <li>Check product reviews and seller ratings before you buy.</li>
                        <li>Use Techstock Buyer Protection to secure your purchase - we’ll refund you if you don’t receive what you ordered.</li>
                        <li>Enjoy curated collections and trending tech products based on your interests and browsing history.</li>
                    </ul>

                    <br>

                    <p>Looking for inspiration? Browse categories like:</p>
                    <ul>
                        <li>Smartphones & Tablets – including fan favorites like iPhone, Samsung, Xiaomi, and Realme.</li>
                        <li>Laptops & Accessories – find gaming laptops, SSDs, RAM, and cooling pads.</li>
                        <li>Home Electronics – smart home devices, LED lighting, and speakers.</li>
                        <li>Gaming Gear – keyboards, headsets, controllers, and more.</li>
                        <li>Pet Tech & Wearables – yes, even your pets can get the latest gadgets!</li>
                    </ul>
                </article>

                <article class="article">
                    <h3>Discover the Best Tech Deals - All in One Place</h3>

                    <p>Stay updated with Techstock Trends to catch the latest tech waves like Piso WiFi systems, smartwatches, or even viral gadgets from YouTube and TikTok. Use our smart search, or browse through personalized recommendations to find what fits your needs and budget.</p>

                    <br>

                    <p>Enjoy perks like:</p>
                    <ul>
                        <li>Free shipping on select items</li>
                        <li>Discount vouchers from top store</li>
                        <li>Flash sales and limited-time deals</li>
                    </ul>
                </article>

            </div>

            <article class="article">
                <h3>Join the Techstock Community Today!</h3>

                <p>Whether you’re a tech enthusiast, a startup seller, or just looking for reliable electronics, Techstock is the place to be. So what are you waiting for? Start building your store or fill your cart today - only at Techstock Philippines.</p>
            </article>
        </section>
    </main>

    <?php require_once COMPONENT_PATH . 'footer.php'; ?>

    <script src="<?php echo htmlspecialchars(EVENT_PATH . 'slideshow.js'); ?>" defer></script>
    <script src="<?php echo htmlspecialchars(EVENT_PATH . 'break-text-fallback.js'); ?>" defer></script>
    <script src="<?php echo htmlspecialchars(EVENT_PATH . 'carousel-tracker.js'); ?>" defer></script>
    <script src="<?php echo htmlspecialchars(EVENT_PATH . 'hide-modal.js'); ?>" defer></script>
</body>

</html>