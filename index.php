<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . "/config.const.php";

if (!APP_DEBUG) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

if(file_exists(__DIR__.'/routes/web.php')) {
    require_once __DIR__.'/configs/app.php';
    require_once __DIR__.'/routes/web.php';
} else {
    die('system updating ...');
}