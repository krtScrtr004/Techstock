<?php

class IndexController implements Controller {
    private static array $components = [
        'login' => ['title' => 'Log In', 'form'  => 'login-form.php'],
        'signup' => ['title' => 'Sign Up', 'form'  => 'signup-form.php'],
    ];

    private function __construct() {}

    public static function index(): void
    {
        global $session;
        if (isset($session)) $session->destroy(); 

        // Dynamically display appropriate page (login / signup) based on URL
        $uris = explode('/', $_SERVER['REQUEST_URI']);
        $page = kebabToCamelCase(($uris[2] !== '') ? $uris[2] : 'login');
        $component = self::$components[$page] ?? null; 

        require_once VIEW_PATH . 'index.php';
    }
}
