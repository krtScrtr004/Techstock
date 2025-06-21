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
<header class="inside-header black-bg">

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
            <span class="link-w-icon flex-row">
                <img src="<?php echo htmlspecialchars(ICON_PATH . 'notification.svg'); ?>" alt="Bell icon" title="Bell icon" height="16" width="16">
                <p>Notification</p>
            </span>

            <span class="link-w-icon flex-row">
                <img src="<?php echo htmlspecialchars(ICON_PATH . 'help.svg'); ?>" alt="Question mark icon" title="Question mark icon" height="16" width="16">
                <p>Help</p>
            </span>

            <span class="link-w-icon flex-row">
                <img src="<?php echo htmlspecialchars(ICON_PATH . 'user-profile.svg'); ?>" alt="User profile icon" title="User profile icon" height="16" width="16">
                <p>Username-123</p>
            </span>
        </section>
    </section>
</header>
<?php else: ?>

<?php endif ?>