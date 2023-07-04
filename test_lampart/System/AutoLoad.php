<?php
include 'Config/Config.php';
include 'System/Library/Funcs.php';
include 'Message/Product/ProductNotification.php';
//AUTOLOAD
spl_autoload_register(

    function ($classname) {

        $configPath = "Config/$classname.php";
        if (file_exists($configPath)) {
            include $configPath;
        }

        $controllerPath = "Controller/$classname.php";
        if (file_exists($controllerPath)) {
            include $controllerPath;
        }


        $systemDbPath = "System/Db/$classname.php";
        if (file_exists($systemDbPath)) {
            include $systemDbPath;
        }


        $systemLibraryPath = "System/library/$classname.php";
        if (file_exists($systemLibraryPath)) {
            include $systemLibraryPath;
        }


        $modelPath  = "Model/$classname.php";
        if (file_exists($modelPath)) {
            include $modelPath;
        }


        $productNotificationPath  = "Message/Product/$classname.php";
        if (file_exists($productNotificationPath)) {
            include $productNotificationPath;
        }
    }
);
