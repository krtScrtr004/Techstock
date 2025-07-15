<?php

define('DS', DIRECTORY_SEPARATOR);

require_once __DIR__ . DS . 'path.php';

require_once VENDOR_PATH . 'autoload.php' ;

require_once __DIR__ . DS . 'env.php';

spl_autoload_register(function ($class) {
    $paths = [CLASS_PATH, CORE_PATH, DEPENDENT_PATH, DUMP_PATH, ROUTER_PATH, MODEL_PATH];
    foreach ($paths as $path) {
        // Turn camel case to kebab case
        $class = camelToKebabCase($class);

        $file = $path . DS . str_replace('\\', '/', $class) . '.php';
        if (file_exists($file))
            require_once $file;
    }
});

foreach (glob(BE_UTILITY_PATH . '*.php') as $fileName) {
    require_once $fileName;
}

foreach (glob(CONTROLLER_PATH . '*.php') as $fileName) {
    require_once $fileName;
}

foreach (glob(FE_UTILITY_PATH . '*.php') as $fileName) {
    include_once $fileName;
}

$session = Session::create();
if (!$session->has('ip')) {
    // TODO: Change this
    $session->set('ip', file_get_contents('https://api.ipify.org') ?? $_SERVER['REMOTE_ADDR']);
}

$router = Router::getRouter();