<?php
const HOME_PATH = '/1751707';
//const HOME_PATH = '/MVC';
const BD =  new \PDO('mysql:dbname=n46jolinfocegepl_1751707;host=localhost',
    'n46jolinfocegepl_1751707', '<3RickAstley');
/*const BD = new \PDO('mysql:dbname=test;host=host.docker.internal;port=3306',
            'root', 'root');*/


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function($className) {
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);
    if(file_exists(__DIR__ .'/' .  $className . '.php'))
        include_once __DIR__ .'/' .  $className . '.php';
});

header('Content-Security-Policy: frame-ancestors none');

session_start();

$user= new \Controllers\UserController();
$user->createTable();
$god = new \Controllers\GameController();
$god->createTable();

$uri = $_SERVER['REQUEST_URI'];
$uri = substr($uri, 1);
$parts = explode('/', $uri);
$uri = array_shift($parts);

$controllerName = $parts[0] ?? 'Home';

if (class_exists('\Controllers\\' . $controllerName . 'Controller')){
    $controllerName = '\Controllers\\' . $controllerName . 'Controller';
    $controller = new $controllerName();

    $actionName = $parts[1] ?? 'index';

    if (method_exists($controller, $actionName)) {
        $controller->$actionName();
    }
    else{
        $controller = new \Controllers\HomeController();
        $controller->index();
    }
}
else{
    $controller = new \Controllers\HomeController();
    $controller->index();
}

