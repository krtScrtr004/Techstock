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

    <main class="flex-col white-bg">
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

                $orderCount = count($order->getOrders());
                $shippingFeeTotal = $order->calculateShippingFeeTotal();
                $orderPriceTotal = $order->calculateOrderPriceTotal();
            ?>
                <section class="order flex-col">
                    <!-- Table -->
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
                                        <p class="end-text black-text"><?= DEFAULT_CURRENCY_SYMBOL . ' ' . htmlspecialchars(formatNumber($price)) ?></p>
                                    </td>

                                    <!-- Quantity -->
                                    <td>
                                        <p class="end-text black-text"><?= htmlspecialchars($quantity) ?></p>
                                    </td>

                                    <!-- Item Subtotal -->
                                    <td>
                                        <p class="end-text black-text"><?= DEFAULT_CURRENCY_SYMBOL . ' ' . htmlspecialchars(formatNumber($price * $quantity)) ?></p>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <section class="misc flex-row transparent-bg relative">
                        <section class="pin-message">
                            <form class="pin-message-form" action="" method="POST">
                                <label for="pin_message_textbox" class="black-text bold-text block">Pin Message to Seller</label>

                                <textarea class="inline transparent-bg black-text" name="pin_message_textbox" id="pin_message_textbox" maxlength="255"></textarea>
                            </form>
                        </section>

                        <section class="summary flex-col flex-child-end-h flex-child-end-v">
                            <div class="flex-row">
                                <div class="text-w-icon">
                                    <img src="<?= ICON_PATH . 'shipping.svg' ?>" alt="Shipping fee" title="Shipping fee" height="20">
                                    <p class="black-text">Shipping Fee</p>
                                </div>
                                <p class="black-text"><?= DEFAULT_CURRENCY_SYMBOL . ' ' . formatNumber($shippingFeeTotal) ?></p>
                            </div>

                            <div class="flex-row">
                                <p class="black-text">Order Total (<?= $orderCount ?> Items)</p>
                                <p class="blue-text"><?= DEFAULT_CURRENCY_SYMBOL . ' ' . formatNumber($orderPriceTotal) ?></p>
                            </div>
                        </section>
                    </section>

                </section>
            <?php endforeach; ?>

        </section>

        <!-- Payment Summary -->
        <section class="payment-summary section">
            <h3 class="title black-text">Payment Summary</h3>

            <section class="payments-total">
                <!-- Merchandise Subtotal -->
                <div class="flex-row flex-space-between">
                    <p class="black-text">Merchandise Subtotal</p>
                    <p class="black-text"><?= DEFAULT_CURRENCY_SYMBOL . ' ' . formatNumber($subTotals['merchandise']) ?></p>
                </div>

                <!-- Shipping Subtotal -->
                <div class="flex-row flex-space-between">
                    <p class="black-text">Shipping Subtotal</p>
                    <p class="black-text"><?= DEFAULT_CURRENCY_SYMBOL . ' ' . formatNumber($subTotals['shipping']) ?></p>
                </div>

                <!-- Total Payment -->
                <div class="total-payment flex-row flex-space-between">
                    <p class="black-text">Total Payment</p>
                    <p class="blue-text"><?= DEFAULT_CURRENCY_SYMBOL . ' ' . formatNumber($totalPayment) ?></p>
                </div>
            </section>
        </section>

        <!-- Button -->
        <section class="flex-row-reverse">
            <button class="proceed-button black-bg white-text">Proceed To Payment</button>
        </section>
    </main>
</body>

</html>