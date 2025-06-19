<?php

require_once __DIR__ . '/path.php';

require_once COMPONENT_PATH . 'dialog.php';
require_once UTILITY_PATH . 'utility.php';

foreach (glob(CONTROLLER_PATH . '*.php') as $fileName) {
    require_once $fileName;
}

spl_autoload_register(function ($class) {
    $paths = [ROUTER_PATH];
    foreach ($paths as $path) {
        // Turn camel case to kebab case
        $class = strtolower($class);

        $file = $path . '/' . str_replace('\\', '/', $class) . '.php';
        if (file_exists($file))
            require_once $file;
    }
});
