<?php
include 'config/config.php';
include 'system/lib/funcs.php';
include 'message/product/productnotification.php';
//AUTOLOAD
spl_autoload_register(function ($classname) {
    $configpath = "config/$classname.php";
    if (file_exists($configpath))
        include $configpath;

    $controllerpath = "controller/$classname.php";
    if (file_exists($controllerpath))
        include $controllerpath;

    $systemdbpath = "system/db/$classname.php";
    if (file_exists($systemdbpath))
        include $systemdbpath;

    $systemlibpath = "system/lib/$classname.php";
    if (file_exists($systemlibpath))
        include $systemlibpath;

    $modelpath  = "model/$classname.php";
    if (file_exists($modelpath))
        include $modelpath;

    $productnotificationpath  = "message/product/$classname.php";
    if (file_exists($productnotificationpath))
        include $productnotificationpath;
});
