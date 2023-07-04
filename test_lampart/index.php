<?php
include 'System/AutoLoad.php';
$action = strtolower($_GET['action'] ?? 'index');
$controllerName = strtolower(($_GET['controller'] ?? 'product') . 'controller');
if (class_exists($controllerName)) {

    $controller = new $controllerName();
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        $controller->_404();
    }
} else {

    $controller = new Controller();
    $controller->_404();
}
