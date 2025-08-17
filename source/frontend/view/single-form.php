<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Set Password</title>

    <base href="<?= PUBLIC_PATH ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'root.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'utility.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'component.css' ?>">
    <link rel="stylesheet" href="<?= STYLE_PATH . 'header.css' ?>">

    <link rel="stylesheet" href="<?= STYLE_PATH . 'single-form.css' ?>">
</head>

<body>
    <main class="full-body-content center-child">
        <div class="single-form form-wrapper flex-col">
            <div class="header-w-back">
                <h3><?= $component['title']; ?></h3>

                <button type="button" class="back-button unset-button">
                    <img src="<?= ICON_PATH . 'back.svg' ?>" alt="Back" title="Back" height="24" width="24">
                </button>
            </div>

            <?php
            $callable = new ReflectionFunction($component['form']);
            if ($callable->getNumberOfRequiredParameters() > 0) {
                call_user_func($component['form'], $component);
            } else {
                call_user_func($component['form']);
            }
            ?>

        </div>
    </main>

    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'back-button.js'); ?>" defer></script>
    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'password-list-validator.js'); ?>" defer></script>
</body>

</html>