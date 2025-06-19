<?php

function index()
{
    $components = [
        'login' => [
            'Log In',
            'login-form.php'
        ],
        'signup' => [
            'Sign Up',
            'signup-form.php'
        ]
    ];

    $page = kebabToCamelCase(explode('/', $_SERVER['REQUEST_URI'])[2]) ?? 'login';
    require_once VIEW_PATH . 'index.php';
    
    tooManyAttemptDialog();
    errorOccuredDialog();
}
