<?php

function setSignupPassword()
{
    require_once VIEW_PATH . 'set-signup-password.php';

    changePasswordDialog(true);
    changePasswordDialog(false);
    errorOccuredDialog();
}
