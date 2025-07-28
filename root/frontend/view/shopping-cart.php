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

    <main class="dark-white-bg">
        <!--  -->
        <form class="shopping-cart-form" action="" method="POST">
            <section class="table-header table-row unconnected-row grid white-bg">
                <div class="flex-row flex-child-center-h">
                    <input
                        type="checkbox"
                        name="select_all"
                        id="select_all"
                        value="select_all" />

                    <label for="select_all" class="black-text">
                        <h3>Products</h3>
                    </label>
                </div>

                <h3 class="center-text black-text">Unit Price</h3>
                <h3 class="center-text black-text">Quantity</h3>
                <h3 class="center-text black-text">Total Price</h3>
                <h3 class="center-text black-text">Actions</h3>
            </section>

            <section class="table-content">
                <?php
                foreach ($cart as $storeSlug => $items):
                    $storeName  =   htmlspecialchars(kebabToSentenceCase($storeSlug));
                    $slug       =   htmlspecialchars($storeSlug);
                ?>
                    <fieldset name="<?= $slug ?>">
                        <section class="item-grouped-list unconnected-row flex-col">
                            <!-- Store Info -->
                            <section class="store-info table-row flex-row flex-child-center-h white-bg">
                                <input
                                    type="checkbox"
                                    name="<?= $slug ?>"
                                    id="<?= $slug ?>" />

                                <label for="<?= $slug ?>">
                                    <div class="text-w-icon">
                                        <img
                                            src="<?= ICON_PATH . 'store_b.svg' ?>"
                                            alt="<?= $storeName ?>"
                                            title="<?= $storeName ?>"
                                            height="16" />

                                        <h3><?= $storeName ?></h3>
                                    </div>
                                </label>
                            </section>

                            <!-- Items -->
                            <?php
                            foreach ($items as $id => $item):
                                $id                 =   htmlspecialchars($id);
                                $productName        =   htmlspecialchars($item->getName());
                                $quantity           =   htmlspecialchars($item->getQuantity());
                                $image              =   htmlspecialchars($item->getImage(0));

                                $options            =   $item->getOptions();
                                $selectedOptions    =   $item->getSelectedOptions();

                                $unitPrice          =   DEFAULT_CURRENCY_SYMBOL . ' ' . htmlspecialchars(formatNumber($item->getPrice()));
                                $totalPrice         =   DEFAULT_CURRENCY_SYMBOL . ' ' . htmlspecialchars(formatNumber($item->getPrice() * $item->getQuantity()));
                            ?>

                                <!-- Product Info -->
                                <section class="item-info table-row grid white-bg">
                                    <section class="flex-row flex-child-center-h">
                                        <input
                                            type="checkbox"
                                            name="<?= $id ?>"
                                            id="<?= $id ?>" />

                                        <label for="<?= $id ?>">
                                            <div class="flex-row flex-child-center-h">
                                                <img
                                                    class="product-image"
                                                    src="<?= $image ?>"
                                                    alt="<?= $productName ?>"
                                                    title="<?= $productName ?>"
                                                    height="100"
                                                    width="150" />

                                                <div class="flex-col">
                                                    <h3 class="black-text"><?= $productName ?></h3>
                                                    <!-- Options Selected -->
                                                    <div>
                                                        <p class="light-black-text">Options:</p>

                                                        <?php
                                                        foreach ($options->getKeys() as $key):
                                                            $optionName = htmlspecialchars(ucwords($key));
                                                        ?>
                                                            <div class="option-selection-container">
                                                                <label for="<?= $key ?>" class="light-black-text">
                                                                    <?= $optionName ?>
                                                                </label>
                                                                <select name="options" id="<?= $key ?>">
                                                                    <?php foreach ($options->getValues($key) as $value) {
                                                                        $selectedValues = $selectedOptions->getValues($key);

                                                                        $isSelected = '';
                                                                        if (array_search($value, $selectedValues) !== false) {
                                                                            $isSelected = 'selected';
                                                                        }
                                                                        $value = htmlspecialchars(ucwords($value));

                                                                        echo "<option value=\"$value\" $isSelected>$value</option>";
                                                                    } ?>
                                                                </select>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                    </section>

                                    <!-- Unit Price -->
                                    <section class="center-child">
                                        <p class="black-text"><?= $unitPrice ?></p>
                                    </section>

                                    <!-- Quantity -->
                                    <section class="center-child">
                                        <input
                                            class="quantity-input black-text"
                                            type="number"
                                            name="quantity"
                                            value="<?= $quantity ?>" />
                                    </section>

                                    <!-- Total Price -->
                                    <section class="center-child">
                                        <p class="total-price black-text"><?= $totalPrice ?></p>
                                    </section>

                                    <!-- Actions -->
                                    <section class="center-child">
                                        <button class="delete-item-button unset-button" type="button">
                                            <p class="red-text" title="Delete this item">Delete</p>
                                        </button>
                                    </section>
                                </section>

                            <?php endforeach; ?>
                        </section>
                    </fieldset>
                <?php endforeach; ?>
            </section>

            <section class="proceed-checkout table-row flex-row sticky white-bg">
                <section class="flex-row flex-child-center-h">
                    <button class="remove-checked-button unset-button" type="button" title="Remove from my cart">
                        <p class="black-text">Remove From My Cart</p>
                    </button>
                </section>

                <section class="flex-row flex-child-end-v flex-child-center-h">
                    <p class="payment-summary">Total Orders (0): <span class="bold-text blue-text"><?= DEFAULT_CURRENCY_SYMBOL ?> 0</span></p>
                    <button class="checkout-cart-button black-bg white-text">
                        CHECKOUT
                    </button>
                </section>
            </section>
        </form>
    </main>

    <?php require_once COMPONENT_PATH . 'footer.php' ?>

    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'back-button.js'); ?>" defer></script>

    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'shopping-cart' . DS . 'select-checkbox.js'); ?>" defer></script>
    <script type="module" src="<?= htmlspecialchars(EVENT_PATH . 'shopping-cart' . DS . 'delete.js'); ?>" defer></script>
</body>

</html>