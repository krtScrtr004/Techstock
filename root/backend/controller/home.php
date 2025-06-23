<?php
function home(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once VIEW_PATH . 'home.php';

    errorOccuredDialog();
}