<?php

define('ABS_PATH', dirname(__DIR__, 2) . '/');
define('REL_PATH', '');
define('REDIRECT_PATH', 'http://localhost/Techstock/');

// Absolute paths
define('BACKEND_PATH', ABS_PATH . 'backend/');
define('FRONTEND_PATH', ABS_PATH . 'frontend/');

define('VIEW_PATH', FRONTEND_PATH . 'view/');
define('COMPONENT_PATH', FRONTEND_PATH . 'component/');

define('CONTROLLER_PATH', BACKEND_PATH . 'controller/');
define('ROUTER_PATH', BACKEND_PATH . 'router/');
define('UTILITY_PATH', BACKEND_PATH . 'utility/');

// Relative paths
define('SCRIPT_PATH', REL_PATH . 'script/');
define('STYLE_PATH', REL_PATH . 'style/');

define('EVENT_PATH', SCRIPT_PATH . 'event/');
define('SCRIPT_UTILITY_PATH', SCRIPT_PATH . 'utility/');

define('ASSET_PATH', REL_PATH . 'asset/');
define('IMAGE_PATH', ASSET_PATH . 'image/');
define('LOGO_PATH', IMAGE_PATH . 'logo/');
define('ICON_PATH', IMAGE_PATH . 'icon/');