<?php

function index()
{
    $page = explode('/', $_SERVER['REQUEST_URI'])[2] ?? 'login';
    require_once VIEW_PATH . 'index.php';
    
    tooManyAttemptDialog();
    errorOccuredDialog();
}
