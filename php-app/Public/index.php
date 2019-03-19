<?php
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
require ROOT . 'Core/Config.php';
require ROOT . 'Core/Autoload.php';
use VS\Core\Router;

$route = new Router();

$route->set404(function() {
    echo "There is nothing here...";
});

$route->setNamespace('VS\App\Controllers');
$route->get('/', 'Home@index');

$route->get('/test', function(){
  echo "this is a test- clean";
});

$route->get('/test/page/(\d+)', function($page){
  echo "This is a test with pages, and the current is " . $page;
});

$route->run();
