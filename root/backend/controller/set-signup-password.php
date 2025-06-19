<?php

function singleForm()
{
    $components = [
        'setSignupPassword' => [
            'Set Signup Password', 
            'Set your password to complete your signup.', 
            'change-password-form.php'
        ],
        'changePassword' => [
            'Set Your Password', 
            'Create a new password.', 
            'change-password-form.php'
        ],
        'forgetPassword' => [
            'Reset Password',
            '',
            'forget-password-form.php'
        ]
    ];

    $page = kebabToCamelCase(explode('/', $_SERVER['REQUEST_URI'])[2]) ?? 'forgetPassword';

    require_once VIEW_PATH . 'single-form.php';

    changePasswordDialog(true);
    changePasswordDialog(false);
    errorOccuredDialog();
}
