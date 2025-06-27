<?php

class SingleFormController implements Controller
{
    private static array $components = [
        'setSignupPassword' => [
            'title' => 'Set Signup Password',
            'description' => 'Set your password to complete your signup.',
            'form' => 'change-password-form.php'
        ],
        'changePassword' => [
            'title' => 'Set Your Password',
            'description' => 'Create a new password.',
            'form' => 'change-password-form.php'
        ],
        'forgetPassword' => [
            'title' => 'Reset Password',
            'description' => '',
            'form' => 'forget-password-form.php'
        ]
    ];

    private function __construct() {}

    public static function index(): void
    {
        global $session;
        if (isset($session)) $session->destroy();

        $page = kebabToCamelCase(explode('/', $_SERVER['REQUEST_URI'])[2]) ?? 'forgetPassword';
        $component = self::$components[$page];

        require_once VIEW_PATH . 'single-form.php';

        changePasswordDialog(true);
        changePasswordDialog(false);
        errorOccurredDialog();
    }
}
