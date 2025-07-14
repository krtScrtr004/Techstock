<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Techstock | Checkout</title>
</head>

<base href="/Techstock/root/frontend/">
<link rel="stylesheet" href="<?= STYLE_PATH . 'root.css' ?>">
<link rel="stylesheet" href="<?= STYLE_PATH . 'utility.css' ?>">
<link rel="stylesheet" href="<?= STYLE_PATH . 'component.css' ?>">
<link rel="stylesheet" href="<?= STYLE_PATH . 'header.css' ?>">
<link rel="stylesheet" href="<?= STYLE_PATH . 'footer.css' ?>">
<link rel="stylesheet" href="<?= STYLE_PATH . 'report-modal.css' ?>">

<link rel="stylesheet" href="<?= STYLE_PATH . 'checkout.css' ?>">

<body class="checkout">
    <?php require_once COMPONENT_PATH . 'header.php' ?>

    <main class="flex-col">
        <section class="heading flex-row flex-space flex-space-between">
            <h3 class="black-text">Confirm Order</h3>
        </section>

        <!-- Delivery Address -->
        <section class="delivery-address section">
            <section class="text-w-icon">
                <img src="<?= ICON_PATH . 'locate_bl.svg' ?>" alt="Delivery address" title="Delivery address" height="20">

                <h3 class="title blue-text">Delivery Address</h3>
            </section>

            <section class="info flex-row">
                <p class="black-text">
                    <?= htmlspecialchars($buyer->getFirstName() . ' ' . $buyer->getLastName()) ?>
                </p>

                <p class="black-text">
                    <?= htmlspecialchars($buyer->getContact() ?? 'No Contact') ?>
                </p>

                <p class="black-text">
                    <?= htmlspecialchars($buyer->getAddress()) ?>
                </p>

                <a href="" class="blue-text">Change</a>
            </section>
        </section>

        <!-- Products Ordered -->
        <section class="products-ordered section">
            <h3 class="title black-text">Products Ordered</h3>

            <?php
            foreach ($orders as $order):
                $store = $order->getStore();
                $storeName = htmlspecialchars($store->getName());
                $storeId = htmlspecialchars($store->getId());
            ?>
                <table class="orders-table">
                    <thead>
                        <th class="flex-row start-text black-text">
                            <div class="text-w-icon">
                                <img src="<?= ICON_PATH . 'store_b.svg' ?>" alt="<?= $storeName ?>" title="<?= $storeName ?>" height="24">

                                <h3><?= $storeName ?></h3>
                            </div>

                            <p class="store-id center-child"><?= $storeId ?></p>
                        </th>

                        <th class="start-text black-text">Variation</th>
                        <th class="end-text black-text">Unit Price</th>
                        <th class="end-text black-text">Quantity</th>
                        <th class="end-text black-text">Item Subtotal</th>
                    </thead>

                    <tbody>
                        <?php
                        foreach ($order->getOrders() as $item):
                            $product = $item->getProduct();
                            $option = $item->getOption();
                            $currency = $product->getCurrency();
                            $price = $item->getPrice();
                            $quantity = $item->getQuantity();
                        ?>
                            <tr>
                                <!-- Product Image and Name -->
                                <td>
                                    <div class="product-info flex-row flex-child-center-h">
                                        <img src="<?= htmlspecialchars($product->getImage(0)) ?>" alt="<?= htmlspecialchars($product->getName()) ?>" title="<?= htmlspecialchars($product->getName()) ?>" width="150">

                                        <p class="black-text"><?= htmlspecialchars($product->getName()) ?></p>
                                    </div>
                                </td>

                                <!-- Variation -->
                                <td>
                                    <ul>
                                        <?php foreach ($option->getKeys() as $key): ?>
                                            <?php foreach ($option->getValues($key) as $value): ?>
                                                <li class="start-text"><?= htmlspecialchars(ucwords($key . ': ' . $value)) ?></li>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </td>

                                <!-- Unit Price -->
                                <td>
                                    <p class="end-text black-text"><?= $currency . ' ' . htmlspecialchars(formatNumber($price)) ?></p>
                                </td>

                                <!-- Quantity -->
                                <td>
                                    <p class="end-text black-text"><?= htmlspecialchars($quantity) ?></p>
                                </td>

                                <!-- Item Subtotal -->
                                <td>
                                    <p class="end-text black-text"><?= $currency . ' ' . htmlspecialchars(formatNumber($price * $quantity)) ?></p>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
        </section>

    </main>
</body>

</html>