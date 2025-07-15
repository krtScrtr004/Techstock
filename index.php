<?php
require_once 'root/backend/config/config.php';
require_once ENUM_PATH . 'currency.php';

$defaultCurrency = Currency::fromCountry($session->get('countryCode')) ?? Currency::Philippines;
define('DEFAULT_CURRENCY', $defaultCurrency);
define('DEFAULT_CURRENCY_SYMBOL', $defaultCurrency->symbol());

require_once ROUTER_PATH . 'pages.php';
// Remove this
include_once DUMP_PATH . 'dumps.php';
