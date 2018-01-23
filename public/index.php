<?php

//display all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

define("APP_PATH", dirname(dirname(__FILE__)));

require("../framework/core.php");
Framework\Core::initialize();

$configuration = new Framework\Configuration(array(
    "type" => "ini"
));
Framework\Registry::set("configuration", $configuration->initialize());

//.4 load and initialize the Database class - does not connect
$database = new Framework\Database(array(
    "type" => "mysql"
));
Framework\Registry::set("database", $database->initialize());

//.5 load and initialize the Cache class - does not connect
$cache = new Framework\Cache(array(
    "type" => "memcached"
));
Framework\Registry::set("cache", $cache->initialize());

// 6. load and initialize the Session class
$session = new Framework\Session(array(
    "type" => "server"
));
Framework\Registry::set("session", $session->initialize());

// 7. load the Router class and provide the url + extension
$router = new Framework\Router(array(
    "url" => isset($_GET["url"]) ? $_GET["url"] : "index/index",
    "extension" => isset($_GET["url"]) ? $_GET["url"] : "html"
));
Framework\Registry::set("router", $router);

// 8. dispatch the current request
$router->dispatch();

// 9. dispatch the current request
unset($configuration);
unset($database);
unset($cache);
unset($session);
unset($router);










