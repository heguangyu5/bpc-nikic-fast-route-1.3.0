<?php

if (defined('__BPC__')) {
    require_once 'FastRoute/functions.php';
    spl_autoload_register(function ($class) {
        if (strpos($class, 'FastRoute\\') === 0) {
            if (strcasecmp(substr($class, -4), 'Test') == 0) {
                $name = substr($class, strlen('FastRoute'));
                require __DIR__ . '/' . strtr($name, '\\', DIRECTORY_SEPARATOR) . '.php';
            } else {
                require strtr($class, '\\', DIRECTORY_SEPARATOR) . '.php';
            }
        }
    });
} else {
require_once __DIR__ . '/../src/functions.php';

spl_autoload_register(function ($class) {
    if (strpos($class, 'FastRoute\\') === 0) {
        $dir = strcasecmp(substr($class, -4), 'Test') ? 'src/' : 'test/';
        $name = substr($class, strlen('FastRoute'));
        require __DIR__ . '/../' . $dir . strtr($name, '\\', DIRECTORY_SEPARATOR) . '.php';
    }
});
}
