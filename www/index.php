<?php
// Set headers to enable cross domain origin requests
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Load in required dependencies
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../lib/coinmarket_cap';
//require_once __DIR__ . '/../lib/market_data.php';

// Load the application config
$appConfig = parse_ini_file( __DIR__ . '/../config/config.ini' );

define('DB_NAME', $appConfig['dbname']);
define('DB_USER', $appConfig['dbuser']);
define('DB_PASS', $appConfig['dbpwd']);
define('DB_HOST', $appConfig['dbhost']);

$klein = new \Klein\Klein();

// Include the Klien application route definitions
require_once __DIR__ . '/../lib/application_routes.php';

$klein->dispatch();