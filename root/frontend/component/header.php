<? if (session_status() === PHP_SESSION_NONE): ?>
<!-- Header for non-logged in pages -->
<header class="outside-header flex-row flex-child-end-h">
    <a href="<?php echo htmlspecialchars(REDIRECT_PATH . 'login/'); ?> ">
        <img src="<?php echo htmlspecialchars(LOGO_PATH . 'logo_complete_ver.svg'); ?>" alt="Techstock Logo" title="Techstock Logo" height="45" />
    </a>

    <h3><?php echo ($page === 'signup') ? "Sign Up" : "Log In"; ?></h3>
</header>

<? elseif (session_status() === PHP_SESSION_ACTIVE): ?>
<!-- Header for logged in pages -->

<? else: ?>

<? endif ?>