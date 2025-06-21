<?php if (session_status() === PHP_SESSION_NONE): ?>
    <!-- Header for non-logged in pages -->
    <header class="outside-header flex-row flex-child-end-h">
        <a href="<?php echo htmlspecialchars(REDIRECT_PATH . 'login/'); ?> ">
            <img src="<?php echo htmlspecialchars(LOGO_PATH . 'logo_complete_ver.svg'); ?>" alt="Techstock Logo" title="Techstock Logo" height="45" />
        </a>

        <h3><?php echo ($page === 'signup') ? "Sign Up" : "Log In"; ?></h3>
    </header>

<?php elseif (session_status() === PHP_SESSION_ACTIVE): ?>
    <!-- Header for logged in pages -->
    <header class="inside-header flex-col black-bg">

        <!-- Top Links -->
        <section class="top-link-section flex-row white-text">
            <section class="left-side flex-row">
                <a class="white-text" href="#">Start Selling</a>

                <span class="link-w-icon flex-row">
                    <p>Follow us on</p>
                    <a href="#">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'facebook_w.svg'); ?>" alt="Facebook Icon" title="Facebook Icon" height="16" width="16">
                    </a>
                    <a href="#">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'instagram_w.svg'); ?>" alt="Instagram Icon" title="Instagram Icon" height="16" width="16">
                    </a>
                    <a href="#">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'tiktok_w.svg'); ?>" alt="Tiktok Icon" title="Tiktok Icon" height="16" width="16">
                    </a>
                </span>
            </section>

            <section class="right-side flex-row flex-child-end-v">
                <a class="link-w-icon flex-row" href="#">
                    <img src="<?php echo htmlspecialchars(ICON_PATH . 'notification.svg'); ?>" alt="Bell icon" title="Bell icon" height="16" width="16">
                    <p class="white-text">Notification</p>
                </a>

                <a class="link-w-icon flex-row" href="#">
                    <img src="<?php echo htmlspecialchars(ICON_PATH . 'help.svg'); ?>" alt="Question mark icon" title="Question mark icon" height="16" width="16">
                    <p class="white-text">Help</p>
                </a>

                <a class="link-w-icon flex-row" href="#">
                    <img src="<?php echo htmlspecialchars(ICON_PATH . 'user-profile.svg'); ?>" alt="User profile icon" title="User profile icon" height="16" width="16">
                    <p class="white-text">Username-123</p>
                </a>
            </section>
        </section>

        <section class="lower-header-body flex-row">

            <span class="inline">
                <a href="#">
                    <img src="<?php echo htmlspecialchars(LOGO_PATH . 'logo_complete_ver.svg'); ?>" alt="Techstock logo" title="Techstack logo" height="57">
                </a>
            </span>

            <section class="search-section flex-child-center-h">
                <form class="flex-row" action="" method="GET">
                    <input class="" type="text" id="search_input" name="search_input" autocomplete="on" min="1" max="255" required>

                    <button class="search-button black-bg center-child" type="submit">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'search.svg'); ?>" alt="Search icon" title="Search icon" height="16">
                    </button>
                </form>
            </section>

            <span class="icon-section flex-row flex-child-center-h">
                <!-- Cart -->
                <div class="icon-w-badge">
                    <p class="cart-count">3</p>

                    <a href="#">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'cart.svg'); ?>" alt="Shoppingcart icon" title="Shoppingcart icon" height="32">
                    </a>
                </div>

                <!-- Chat -->
                <div class="icon-w-badge">
                    <p class="cart-count">99</p>

                    <a href="#">
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'chat_w.svg'); ?>" alt="Message icon" title="Message icon" height="32">
                    </a>
                </div>
            </span>
        </section>
    </header>
<?php endif ?>