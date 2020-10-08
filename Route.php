<?php
    require_once 'Controller/ControllerBikes.php';
    require_once 'Controller/ControllerUser.php';
    require_once 'Controller/ControllerCategories.php';
    //require_once 'Controller/TasksAdvanceController.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');

    $r = new Router();

    // rutas
    // HOME
    $r->addRoute("home", "GET", "ControllerBikes", "showHome");
    // BIKES
    $r->addRoute("bikes", "GET", "ControllerBikes", "showBikes");
    // CATEGORIES
    $r->addRoute("categories", "GET", "ControllerCategories", "showCategories");
    // CATEGORIES AND BIKES
    $r->addRoute("categoriesAndBikes", "GET", "ControllerCategories", "showCategoriesAndBikes");
    // BIKE
    $r->addRoute("bike/:ID", "GET", "ControllerBikes", "showBike");
    // CATEGORIE
    $r->addRoute("categorie/:ID", "GET", "ControllerCategories", "showCategorie");
    // LOGIN
    $r->addRoute("login", "GET", "ControllerUser", "showLogin");
    $r->addRoute("verifyUserLogin", "POST", "ControllerUser", "verifyUserLogin");
    $r->addRoute("register", "GET", "ControllerUser", "showRegister");
    $r->addRoute("verifyUserRegister", "POST", "ControllerUser", "verifyUserRegister");


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