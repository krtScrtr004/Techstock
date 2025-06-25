<?php

enum Category: string {
    case sna    = 'smartphone-and-accessories';
    case cnl    = 'computers-and-laptops';
    case cnpp   = 'components-and-pc-parts';
    case gm     = 'gaming';
    case nnsh   = 'networking-and-smart-home';
    case anm    = 'audio-and-music';
    case wnht   = 'wearable-and=home-tech';
    case onp    = 'office-and-productivity';
    case dnc    = 'drone-and-cameras';
    case tfe    = 'tech-for-education';
};

function search(): void {
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
       ),
       new Product(
          111,
          'Product 11',
          'This is product 11.',
          29.99,
          111
       ),
       new Product(
          222,
          'Product 12',
          'This is product 12.',
          59.95,
          222
       ),
       new Product(
          333,
          'Product 13',
          'This is product 13.',
          75.00,
          333
       ),
       new Product(
          444,
          'Product 14',
          'This is product 14.',
          19.99,
          444
       ),
       new Product(
          555,
          'Product 15',
          'This is product 15.',
          210.00,
          555
       ),
       new Product(
          666,
          'Product 16',
          'This is product 16.',
          13.49,
          666
       ),
       new Product(
          777,
          'Product 17',
          'This is product 17.',
          89.99,
          777
       ),
       new Product(
          888,
          'Product 18',
          'This is product 18.',
          44.50,
          888
       ),
       new Product(
          999,
          'Product 19',
          'This is product 19.',
          99.99,
          999
       ),
       new Product(
          1010,
          'Product 20',
          'This is product 20.',
          17.25,
          1010
       )
    ];
    
    require_once VIEW_PATH . 'search.php';
}