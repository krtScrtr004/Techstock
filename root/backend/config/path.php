<?php

define('ABS_PATH', dirname(__DIR__, 2) . '/');
define('REL_PATH', '');
define('REDIRECT_PATH', 'http://localhost/Techstock/');

// Absolute paths
define('BACKEND_PATH', ABS_PATH . 'backend' . DS);
define('FRONTEND_PATH', ABS_PATH . 'frontend' . DS);

define('VIEW_PATH', FRONTEND_PATH . 'view' . DS);
define('COMPONENT_PATH', FRONTEND_PATH . 'component' . DS);

define('DIALOG_PATH', COMPONENT_PATH . 'dialog' . DS);

define('CORE_PATH', BACKEND_PATH . 'core' . DS);
define('CONTROLLER_PATH', BACKEND_PATH . 'controller' . DS);
define('DATA_PATH', BACKEND_PATH . 'data' . DS);
define('ROUTER_PATH', BACKEND_PATH . 'router' . DS);
define('MODEL_PATH', BACKEND_PATH . 'model' . DS);

define('BE_UTILITY_PATH', BACKEND_PATH . 'utility' . DS);
define('FE_UTILITY_PATH', FRONTEND_PATH . 'utility' . DS);

// Relative paths

define('SCRIPT_PATH', REL_PATH . 'script' . DS);
define('STYLE_PATH', REL_PATH . 'style' . DS);

define('EVENT_PATH', SCRIPT_PATH . 'event' . DS);
define('SCRIPT_UTILITY_PATH', SCRIPT_PATH . 'utility' . DS);

define('ASSET_PATH', REL_PATH . 'asset' . DS);
define('IMAGE_PATH', ASSET_PATH . 'image' . DS);
define('LOGO_PATH', IMAGE_PATH . 'logo' . DS);
define('ICON_PATH', IMAGE_PATH . 'icon' . DS);