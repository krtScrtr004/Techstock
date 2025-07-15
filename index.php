<?php
require_once 'root/backend/config/config.php';
require_once ENUM_PATH . 'currency.php';

$defaultCurrencySymbol = Currency::fromCountry($session->get('countryCode'))->symbol() ?? Currency::Philippines->symbol();
define('DEFAULT_CURRENCY', $defaultCurrencySymbol);

require_once ROUTER_PATH . 'pages.php';
// Remove this
include_once DUMP_PATH . 'dumps.php';
