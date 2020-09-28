<?php
    require_once 'Controller/ControllerBikes.php';
    //require_once 'Controller/TasksAdvanceController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    // rutas
    $r->addRoute("home", "GET", "ControllerBikes", "showHome");
    $r->addRoute("bikes", "GET", "ControllerBikes", "showBikes");
    $r->addRoute("categories", "GET", "ControllerBikes", "showCategories");
    $r->addRoute("bicicleta/:ID", "GET", "ControllerBikes", "showBike");


    //Esto lo veo en TasksView
    $r->addRoute("insert", "POST", "ControllerBikes", "InsertTask");

    $r->addRoute("delete/:ID", "GET", "ControllerBikes", "BorrarLaTaskQueVienePorParametro");
    $r->addRoute("used/:ID", "GET", "ControllerBikes", "MarkAsCompletedTask");
    $r->addRoute("edit/:ID", "GET", "ControllerBikes", "EditTask");

    //Ruta por defecto.
    $r->setDefaultRoute("ControllerBikes", "showHome");

    //Advance
    //$r->addRoute("autocompletar", "GET", "TasksAdvanceController", "AutoCompletar");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>