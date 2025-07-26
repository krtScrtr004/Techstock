<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techstock | Shopping Cart</title>

    <base href="/Techstock/root/frontend/">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'root.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'utility.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'component.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'header.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'footer.css' ?>">

    <link rel="stylesheet" href="<?= STYLE_PATH . 'shopping-cart.css' ?>">
</head>

<body class="shopping-cart">
    <header class="simple-header flex-row relative">
        <div class="header-w-back">
            <div class="flex-row flex-child-end-h">
                <a href="<?= REDIRECT_PATH . 'home'; ?> ">
                    <img
                        src="<?= LOGO_PATH . 'logo_complete_ver.svg'; ?>"
                        alt="Techstock logo"
                        title="Techstock logo"
                        height="45" />
                </a>

                <h3 class="black-text">Shopping Cart</h3>
            </div>

            <button type="button" class="back-button unset-button">
                <img src="<?= ICON_PATH . 'back.svg' ?>" alt="Back" title="Back" height="24" width="24">
            </button>
        </div>

    </header>

    <main>

    </main>

    <?php require_once COMPONENT_PATH . 'footer.php' ?>

    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'back-button.js'); ?>" defer></script>
</body>

</html>