<?php
require_once dirname(__DIR__, 1) . '/utility/definition.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'root.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'component.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'utility.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'login.css' ?>">
</head>

<body class="login flex-col">
    <header>
        <img class="inline" src="<?php echo htmlspecialchars(LOGO_PATH . 'logo_complete_ver.svg'); ?>" alt="Techstock Logo" title="Techstock Logo" height="45" width="" />

        <h1 class="inline">Log In</h1>
    </header>

    <main class="banner flex-row black-bg">
        <section class="right-pane flex-col center-child">
            <img src="<?php echo htmlspecialchars(LOGO_PATH . 'logo_complete_hor.svg'); ?>" alt="Techstock Logo" title="Techstock Logo" />

            <h3 class="blue-text">Tech You Want. Stock You Need.</h3>
        </section>

        <section class="left-pane center-child">
            <div class="form-wrapper flex-col white-bg">
                <form action="" method="POST">
                    <h3 class="black-text">Log In</h3>

                    <input type="email" name="l_email" id="l_email" placeholder="Please enter your email here" autocomplete="on" min="3" max="255" required>

                    <input type="password" name="l_password" id="l_password" placeholder="Please enter your password here" min="8" max="255" required>

                    <button class="blue-bg white-text" type="submit">LOG IN</button>
                </form>

                <a class="inline black-text" href="#">Forget Password</a>

                <div class="line-divider relative">
                    <hr>
                    <p class="white-bg absolute">OR</p>
                </div>

                <section class="oath-provider-link">
                    <div>
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'facebook.svg'); ?>" alt="Facebook Logo" title="Facebook Logo" width="45" height="45">

                        <h3>Facebook</h3>
                    </div>

                    <div>
                        <img src="<?php echo htmlspecialchars(ICON_PATH . 'google.svg'); ?>" alt="Google Logo" title="Google Logo" width="45" height="45">
                        
                        <h3>Google</h3>
                    </div>
                </section>

                <p class="block center-text">New to Techstock? <a class="blue-text" href="#">Sign Up</a></p>
            </div>
        </section>
    </main>
</body>

</html>