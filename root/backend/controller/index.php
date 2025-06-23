<?php

function index()
{
    if (session_status() === PHP_SESSION_ACTIVE) {
        session_unset();
        session_abort();
    }

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

    $uris = explode('/', $_SERVER['REQUEST_URI']);
    $page = kebabToCamelCase(($uris[2] !== '') ? $uris[2] : 'login');
    require_once VIEW_PATH . 'index.php';
    
    tooManyAttemptDialog();
    errorOccuredDialog();
}
