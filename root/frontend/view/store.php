<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Techstock | <?= htmlspecialchars($store->getName()) ?></title>

    <base href="/Techstock/root/frontend/">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'utility.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'component.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'header.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'footer.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'root.css' ?>">

    <link rel="stylesheet" href="<?= STYLE_PATH . 'home.css' ?>">
</head>

<body class="store">
    <?php require_once COMPONENT_PATH . 'header.php' ?>

    <main>

    </main>

    <?php
    require_once COMPONENT_PATH . 'footer.php';

    // Hidden Modals
    errorOccurredDialog();
    ?>
</body>

</html>