<?php

define('APP_START',   microtime(true));
define('PUBLIC_PATH', __DIR__ . '/');
define('ROOT_PATH',   dirname(__DIR__) . '/');
define('LIB_PATH',    ROOT_PATH. '/lib/');
define('CLASS_PATH',  ROOT_PATH. '/lib/Class/');
define('CLASS_EXT',   '.class.php');

// if (file_exists(ROOT_PATH . 'vendor/autoload.php')) {
//     require_once ROOT_PATH . 'vendor/autoload.php';
// }

require_once LIB_PATH . 'helpers.php';