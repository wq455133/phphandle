<?php

define('APP_START', microtime(true));

define('ROOT_PATH', dirname(__DIR__));

define('PUBLIC_PATH', ROOT_PATH. '/public');

require_once PUBLIC_PATH . '/helpers.php';
require_once PUBLIC_PATH . '/classes.php';

$page = new Page(200, 10, 2);

print_r($page->slice());die;