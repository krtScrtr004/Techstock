<?php

// TODO: Change this
$ip = file_get_contents('https://api.ipify.org');
$response = decodeData("http://ip-api.com/json/$ip");
if (!isset($response) || $response['status'] !== 'success') {
    exit();
}

if (!isset($session)) 
    $session = Session::create();

// Set Session Locations
$session->set('ip', $ip);
$session->set('country', $response['country']);
$session->set('countryCode', $response['countryCode']);
$session->set('region', $response['region']);
$session->set('regionName', $response['regionName']);
$session->set('city', $response['city']);
$session->set('zip', $response['zip']);
$session->set('timezone', $response['timezone']);


