<?php

function convertCurrency(Currency $baseCurrency, float $amount) {
    global $session;
    if (!isset($session))
        $session = Session::create();

    if (!isset($baseCurrency)) {
        $baseCurrency = Currency::Philippines;
    } 

    // Get target currency code using user country
    $targetCurrency = DEFAULT_CURRENCY;
    if ($baseCurrency === $targetCurrency) {
        return $amount;
    }

    // Fetch to Free Currency API (https://api.freecurrencyapi.com/)
    $key = $_ENV['FREE_CURRENCY_API_KEY'];
    $url = "https://api.freecurrencyapi.com/v1/latest";
    $params = "?apikey=$key&base_currency=$baseCurrency->value&currencies=$targetCurrency->value";
    $response = Curl::GET($url . $params);
    if (!isset($response)) {
        return null;
    }

    // Get target rate exchange
    $exchangeRate = $response['data'][$targetCurrency->value];
    return $exchangeRate * $amount;
}