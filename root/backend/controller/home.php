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
        ),
        new Product(
            456,
            'Product 3',
            'This is product 3.',
            45.50,
            456
        ),
        new Product(
            789,
            'Product 4',
            'This is product 4.',
            12.75,
            789
        ),
        new Product(
            654,
            'Product 5',
            'This is product 5.',
            67.00,
            654
        ),
        new Product(
            987,
            'Product 6',
            'This is product 6.',
            23.99,
            987
        ),
        new Product(
            159,
            'Product 7',
            'This is product 7.',
            150.00,
            159
        ),
        new Product(
            753,
            'Product 8',
            'This is product 8.',
            8.49,
            753
        ),
        new Product(
            852,
            'Product 9',
            'This is product 9.',
            34.99,
            852
        ),
        new Product(
            951,
            'Product 10',
            'This is product 10.',
            120.00,
            951
        )
    ];

    require_once VIEW_PATH . 'home.php';

    errorOccuredDialog();
}