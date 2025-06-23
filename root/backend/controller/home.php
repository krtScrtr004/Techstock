<?php
function home(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $products = [
        new Product(
            123, 
            'Product 1',
            'This is product 1.',
            18.99,
            123
        ),
        new Product(
            321, 
            'Product 2',
            'This is product 2.',
            99.23,
            321
        )
    ];

    require_once VIEW_PATH . 'home.php';

    errorOccuredDialog();
}