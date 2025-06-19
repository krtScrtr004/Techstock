<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Set Password</title>

    <base href="/Techstock/root/frontend/">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'root.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'utility.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'component.css' ?>">
    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'header.css' ?>">

    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'set-signup-password.css' ?>">
</head>

<body>
    <main class="full-body-content center-child">
        <div class="set-signup-password form-wrapper flex-col">
            <div class="header-w-back">
                <h3>Set Your Password</h3>

                <img src="<?php echo htmlspecialchars(ICON_PATH . 'back.svg') ?>" alt="Back button" title="Back button" height="24" width="24">
            </div>

            <p class="center-text">Set you password to complete the sign up.</p>

            <article class="form-message error">
                Invalid password format.
            </article>

            <form action="" method="POST">
                <input type="text" name="s_password" id="s_password" placeholder="Enter your password here" min="8" max="255" requried>

                <!-- Password validator guide -->
                <ul class="flex-col password-list-validator">
                    <li id="lower_case">At least one lowercase character</li>
                    <li id="upper_case">At least one uppercase character</li>
                    <li id="count">8 to 255 chacrters</li>
                    <li id="characters">Only letters, numbers, and common punctuation (! @ ' . -) can be used</li>
                </ul>

                <button class="blue-bg white-text" type="submit">SIGN UP</button>
            </form>
        </div>
    </main>

    <script src="<?php echo htmlspecialchars(EVENT_PATH . 'password-list-validator.js'); ?>" defer></script>
</body>

</html>