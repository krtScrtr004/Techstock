<!-- TODO -->
<?php if (!$session->isSet()): ?>
    <!-- Header for non-logged in pages -->
    <header class="outside-header flex-row flex-child-end-h relative">
        <a href="<?= REDIRECT_PATH . 'login'; ?> ">
            <img 
                src="<?= LOGO_PATH . 'logo_complete_ver.svg'; ?>" 
                alt="Techstock logo" 
                title="Techstock logo" 
                height="45" />
        </a>

        <h3><?= ($page === 'signup') ? "Sign Up" : "Log In"; ?></h3>
    </header>

<?php else: ?>
    <!-- Header for logged in pages -->
    <header class="inside-header flex-col black-bg relative">

        <!-- Top Links -->
        <section class="top-link-section flex-row white-text">
            <section class="left-side flex-row">
                <a class="white-text" href="#">Start Selling</a>

                <span class="link-w-icon flex-row">
                    <p>Follow us on</p>
                    <a href="#">
                        <img 
                            src="<?= ICON_PATH . 'facebook_w.svg'; ?>" 
                            alt="Facebook link" 
                            title="Facebook link" 
                            height="16" 
                            width="16" />
                    </a>
                    <a href="#">
                        <img 
                        src="<?= ICON_PATH . 'instagram_w.svg'; ?>" 
                        alt="Instagram link" 
                        title="Instagram link" 
                        height="16"
                        width="16" />
                    </a>
                    <a href="#">
                        <img 
                        src="<?= ICON_PATH . 'tiktok_w.svg'; ?>" 
                        alt="Tiktok link" 
                        title="Tiktok link" 
                        height="16" 
                        width="16" />
                    </a>
                </span>
            </section>

            <section class="right-side flex-row flex-child-end-v">
                <a class="link-w-icon flex-row" href="#">
                    <img 
                    src="<?= ICON_PATH . 'notification.svg'; ?>" 
                    alt="Notification" 
                    title="Notification" 
                    height="16" 
                    width="16" />

                    <p class="white-text">Notification</p>
                </a>

                <a class="link-w-icon flex-row" href="#">
                    <img 
                    src="<?= ICON_PATH . 'help.svg'; ?>" 
                    alt="Help" 
                    title="Help" 
                    height="16" 
                    width="16" />

                    <p class="white-text">Help</p>
                </a>

                <a class="link-w-icon flex-row" href="#">
                    <img 
                    src="<?= ICON_PATH . 'user-profile_w.svg'; ?>" 
                    alt="User profile" 
                    title="User profile" 
                    height="16" 
                    width="16" />

                    <p class="white-text">Username-123</p>
                </a>
            </section>
        </section>

        <section class="lower-header-body flex-row">

            <span class="inline">
                <a href="<?= REDIRECT_PATH . 'home'; ?>">
                    <img 
                    src="<?= LOGO_PATH . 'logo_complete_ver.svg'; ?>" 
                    alt="Techstock logo" 
                    title="Techstack logo" 
                    height="57" />
                </a>
            </span>

            <section class="search-section flex-child-center-h">
                <form class="flex-row" action="" method="GET">
                    <input 
                        type="text" 
                        id="search_input" 
                        name="search_input" 
                        autocomplete="on" 
                        min="1" 
                        max="255" 
                        required />

                    <button class="search-button black-bg center-child" type="submit">
                        <img 
                        src="<?= ICON_PATH . 'search.svg'; ?>" 
                        alt="Search button" 
                        title="Search button" 
                        height="16" />
                    </button>
                </form>
            </section>

            <span class="icon-section flex-row flex-child-center-h">
                <!-- Cart -->
                <div class="icon-w-badge">
                    <p class="cart-count">3</p>

                    <a href="#">
                        <img 
                        src="<?= ICON_PATH . 'cart.svg'; ?>" 
                        alt="Shoppingcart" 
                        title="Shoppingcart" 
                        height="32" />
                    </a>
                </div>

                <!-- Chat -->
                <div class="icon-w-badge">
                    <p class="cart-count">99</p>

                    <a href="#">
                        <img 
                        src="<?= ICON_PATH . 'chat_w.svg'; ?>" 
                        alt="Chat" 
                        title="Chat" 
                        height="32" />
                    </a>
                </div>
            </span>
        </section>
    </header>
<?php endif ?>