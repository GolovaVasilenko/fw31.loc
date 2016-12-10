<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);

$query = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

use vendor\core\AppController;

define("PUBLIC", __DIR__);

define("CORE", dirname(__DIR__) . "/vendor/core");

define("LIBS", dirname(__DIR__) . "/vendor/libs");

define("ROOT", dirname(__DIR__));

define("APP", dirname(__DIR__) . "/app");

require_once dirname(__DIR__) . "/config/db.php";

require_once dirname(__DIR__) . "/vendor/libs/functions.php";

require_once dirname(__DIR__) . "/vendor/autoload.php";

require_once dirname(__DIR__) . "/config/autoload.php";

require_once dirname(__DIR__) . "/config/bootstrap.php";



try{
    AppController::start($query);
}
catch(\vendor\core\Errors $error){
    $error->index();
}