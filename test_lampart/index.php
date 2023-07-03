<?php
include 'system/autoload.php';
$action = strtolower($_GET['action'] ?? 'index');
$controllername = strtolower(($_GET['controller'] ?? 'system') . 'controller');
if (class_exists($controllername)) {

    $controller = new $controllername();
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        $controller->_404();
    }
} else {

    $controller = new controller();
    $controller->_404();
}
