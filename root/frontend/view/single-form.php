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

    <link rel="stylesheet" href="<?php echo STYLE_PATH . 'single-form.css' ?>">
</head>

<body>
    <?php if (!isset($page)) $page = 'forgetPassword' ?>

    <main class="full-body-content center-child">
        <div class="single-form form-wrapper flex-col">
            <div class="header-w-back">
                <h3><?php echo $components[$page][0]; ?></h3>

                <img class="back-button" src="<?php echo htmlspecialchars(ICON_PATH . 'back.svg') ?>" alt="Back button" title="Back button" height="24" width="24">
            </div>

            <?php include_once COMPONENT_PATH . $components[$page][2]; ?>    
        
        </div>
    </main>

    <script src="<?php echo htmlspecialchars(EVENT_PATH . 'back-button.js'); ?>" defer></script>
    <script src="<?php echo htmlspecialchars(EVENT_PATH . 'password-list-validator.js'); ?>" defer></script>
    <script src="<?php echo htmlspecialchars(EVENT_PATH . 'hide-modal.js'); ?>" defer></script>
</body>

</html>