<?php

class HomeController implements Controller
{
    private function __construct() {}

    public static function index(): void
    {
        global $session;

        $controllerInstance = new self();

        require_once ENUM_PATH . 'category.php';
        $categories = [
            'phone_b.svg'      => Category::sna->value,
            'pc_b.svg'         => Category::cnl->value,
            'pc-parts_b.svg'   => Category::cnpp->value,
            'console_b.svg'    => Category::gm->value,
            'router_b.svg'     => Category::nnsh->value,
            'headphone_b.svg'  => Category::anm->value,
            'smartwatch_b.svg' => Category::wnht->value,
            'printer_b.svg'    => Category::onp->value,
            'camera_b.svg'     => Category::dnc->value,
            'arduino_b.svg'    => Category::tfe->value,
        ];

        $products = Product::all();
        $stores = Store::all();

        require_once VIEW_PATH . 'home.php';
    }

    public function topProductCallback($products)
    {
        if (count($products) <= 0) {
            emptyFeaturedItem();
            return;
        }

        foreach ($products as $product) {
            echo productCard($product);
        }
    }

    public function topStoreCallback($stores): void
    {
        if (count($stores) <= 0) {
            emptyFeaturedItem();
            return;
        }

        foreach ($stores as $store) {
            $name = htmlspecialchars($store->getName());
            $logo = htmlspecialchars($store->getLogo());
            $slug = createSlug($name);

            echo '<a href="' . REDIRECT_PATH . 'store' . DS . $slug . '">';
            echo '<div class="store-card center-child white-bg">';
            echo '<img src="' . $logo . '" alt="' . $name . '" title="' . $name . '">';
            echo '</div>';
            echo '</a>';
        }
    }
}
