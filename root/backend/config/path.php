<?php

define('ABS_PATH', dirname(__DIR__, 2) . '/');
define('REL_PATH', '');
define('REDIRECT_PATH', 'http://localhost/Techstock/');

// Absolute paths
define('VIEW_PATH', ABS_PATH . 'frontend/view/');
define('COMPONENT_PATH', ABS_PATH . 'frontend/component/');

// Relative paths
define('SCRIPT_PATH', REL_PATH . 'script/');
define('STYLE_PATH', REL_PATH . 'style/');
define('UTILITY_PATH', REL_PATH . 'utility/');

define('EVENT_PATH', SCRIPT_PATH . 'event/');
define('SCRIPT_UTILITY_PATH', SCRIPT_PATH . 'utility/');

define('ASSET_PATH', REL_PATH . 'asset/');
define('IMAGE_PATH', ASSET_PATH . 'image/');
define('LOGO_PATH', IMAGE_PATH . 'logo/');
define('ICON_PATH', IMAGE_PATH . 'icon/');