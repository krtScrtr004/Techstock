<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Techstock | Home</title>

    <base href="<?= PUBLIC_PATH ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'loader.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'utility.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'component.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'header.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'footer.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'root.css' ?>">

    <link rel="stylesheet" href="<?= STYLE_PATH . 'home.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'chat.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'location-permission-modal.css' ?>">
</head>

<body class="home flex-col">
    <?php 
    include_once COMPONENT_PATH . 'header.php';
    include_once COMPONENT_PATH . 'chat.php'; 
    ?>
    <main class="dark-white-bg relative">
        <!-- Banner Section -->
        <section class="banner-section white-bg">
            <!-- Slideshow -->
            <section class="slide-show-wrapper relative">
                <img
                    class="slide-show viewable-image fade"
                    src="<?= IMAGE_PATH . 'console-1.jpg'; ?>"
                    alt="Slideshow"
                    title="Slideshow"
                    height="300"
                    loading="lazy" />

                <button type="button" class="change-button previous unset-button">
                    <img src="<?= ICON_PATH . 'next.svg'; ?>" alt="Previous " title="Previous " height="20" width="20">
                </button>

                <button type="button" class="change-button next unset-button">
                    <img src="<?= ICON_PATH . 'next.svg'; ?>" alt="Next" title="Next" height="20" width="20">
                </button>

                <span class="absolute flex-row">
                    <div class="dot-tab active circle white-bg"></div>
                    <div class="dot-tab circle white-bg"></div>
                    <div class="dot-tab circle white-bg"></div>
                    <div class="dot-tab circle white-bg"></div>
                    <div class="dot-tab circle white-bg"></div>
                </span>
            </section>

            <!-- Category Selection -->
            <section class="category-section">
                <ul class=" flex-row flex-space-evenly">
                    <?php
                    $categories = [
                        'phone_b.svg'      => Category::sna->value,
                        'pc_b.svg'         => Category::cnl->value,
                        'pc-parts_b.svg'   => Category::cnpp->value,
                        'console_b.svg'    => Category::gm->value,
                        'router_b.svg'     => Category::nnsh->value,
                        'headphone_b.svg'  => Category::anm->value,
                        'smartwatch_b.svg' => Category::wnht->value,
                        'printer_b.svg'    => Category::onp->value,
                        'camera_b.svg'     => Category::dnc->value,
                        'arduino_b.svg'    => Category::tfe->value,
                    ];
                    foreach ($categories as $key => $value):
                        $sentenceValue = htmlspecialchars(ucwords(kebabToSentenceCase($value)));
                    ?>
                        <li>

                            <div class="category-card">
                                <a href="<?= REDIRECT_PATH . 'search?category=' . $value ?>" class="flex-col flex-child-center-v">
                                    <img
                                        src="<?= ICON_PATH . $key ?>"
                                        alt="<?= $sentenceValue ?>"
                                        title="<?= $sentenceValue ?>"
                                        height="57" />
                                    <h3 class="center-text black-text"><?= $sentenceValue ?></h3>
                                </a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </section>

        <?php
        // Top Products
        featuredItem(
            'featuredProductsCallback',
            $products,
            'Top Products'
        );

        // Top stores
        featuredItem(
            'featuredStoresCallback',
            $stores,
            'Top Stores'
        );
        ?>

        <!-- Discover More -->
        <section id="discover-more" class="discover-more-section">
            <h3 class="sticky black-text center-text">Discover More</h3>

            <?php productGrid($products) ?>

            <div class="page-tab center-child"></div>
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

    <?php require_once COMPONENT_PATH . 'footer.php' ?>

    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'break-text-fallback.js'); ?>" defer></script>
    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'carousel-tracker.js'); ?>" defer></script>
    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'location-permission.js'); ?>" defer></script>
    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'page-tab.js'); ?>" defer></script>
    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'chat' . DS . 'pick-media.js'); ?>" defer></script>

    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'chat' . DS . 'toggle-body.js'); ?>" defer></script>
    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'chat' . DS . 'search-session.js'); ?>" defer></script>
    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'chat' . DS . 'open-session.js'); ?>" defer></script>
    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'chat' . DS . 'react-to-message.js'); ?>" defer></script>
    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'chat' . DS . 'open-message-menu.js'); ?>" defer></script>
    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'chat' . DS . 'send.js'); ?>" defer></script>
    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'chat' . DS . 'auto-fetch-messages.js'); ?>" defer></script>

    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'home' . DS . 'slideshow.js'); ?>" defer></script>
</body>

</html>