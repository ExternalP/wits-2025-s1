<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
// if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
if (file_exists($maintenance = __DIR__.'/../repositories/wits-2025-s1/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
// require __DIR__.'/../vendor/autoload.php';
require __DIR__.'/../repositories/wits-2025-s1/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
// (require_once __DIR__.'/../bootstrap/app.php')
(require_once __DIR__.'/../repositories/wits-2025-s1/bootstrap/app.php')
    ->handleRequest(Request::capture());
