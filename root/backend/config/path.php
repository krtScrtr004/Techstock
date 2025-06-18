<?php

define('ABS_PATH', dirname(__DIR__, 2) . '/');
define('REL_PATH', '');
define('REDIRECT_PATH', 'http://localhost/Techstock/');

// Absolute paths
define('ABS_VIEW_PATH', ABS_PATH . 'frontend/view/');
define('ABS_COMPONENT_PATH', ABS_PATH . 'frontend/component/');

// Relative paths
define('REL_SCRIPT_PATH', REL_PATH . 'script/');
define('REL_STYLE_PATH', REL_PATH . 'style/');
define('REL_UTILITY_PATH', REL_PATH . 'utility/');

define('REL_EVENT_PATH', REL_SCRIPT_PATH . 'event/');
define('REL_SCRIPT_UTILITY_PATH', REL_SCRIPT_PATH . 'utility/');

define('REL_ASSET_PATH', REL_PATH . 'asset/');
define('REL_IMAGE_PATH', REL_ASSET_PATH . 'image/');
define('REL_LOGO_PATH', REL_IMAGE_PATH . 'logo/');
define('REL_ICON_PATH', REL_IMAGE_PATH . 'icon/');