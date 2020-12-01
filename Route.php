<?php
    require_once 'Controller/ControllerBikes.php';
    require_once 'Controller/ControllerUser.php';
    require_once 'Controller/ControllerCategories.php';
    require_once 'RouterClass.php';
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');
    define("LOGIN", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/login');

    $r = new Router();

    // rutas
    // HOME
    $r->addRoute("home", "GET", "ControllerBikes", "showHome");
    // BIKES
    $r->addRoute("bikes/:ID", "GET", "ControllerBikes", "showBikes");
    // CATEGORIES
    $r->addRoute("categories", "GET", "ControllerCategories", "showCategories");
    // CATEGORIES AND BIKES
    $r->addRoute("categoriesAndBikes", "GET", "ControllerCategories", "showCategoriesAndBikes");
    // BIKE
    $r->addRoute("bike/:ID", "GET", "ControllerBikes", "showBike");
    // CATEGORIE
    $r->addRoute("category/:ID", "GET", "ControllerCategories", "showCategory");
    // LOGIN
    $r->addRoute("login", "GET", "ControllerUser", "showLogin");
    $r->addRoute("verifyUserLogin", "POST", "ControllerUser", "verifyUserLogin");
    // REGISTER
    $r->addRoute("register", "GET", "ControllerUser", "showRegister");
    $r->addRoute("verifyUserRegister", "POST", "ControllerUser", "verifyUserRegister");
    // LOGOUT
    $r->addRoute("logout", "GET", "ControllerUser", "showLogout");


    //                       ADMIN

    // INSERT
    $r->addRoute("showInsertBike", "GET", "ControllerBikes", "showInsertBike");
    $r->addRoute("insertBike", "POST", "ControllerBikes", "insertBike");

    $r->addRoute("showInsertCategory", "GET", "ControllerCategories", "showInsertCategory");
    $r->addRoute("insertCategory", "POST", "ControllerCategories", "insertCategory");

    // EDIT
    $r->addRoute("editBike/:ID", "POST", "ControllerBikes", "editBike");
    $r->addRoute("editCategory/:ID", "POST", "ControllerCategories", "editCategory");

    // DELETE
    $r->addRoute("deleteBike/:ID", "GET", "ControllerBikes", "deleteBike");
    $r->addRoute("deleteCategory/:ID", "GET", "ControllerCategories", "deleteCategory");


    //                      GESTION DE USUARIOS

    $r->addRoute("showUserList", "GET", "ControllerUser", "showUserList");

    // DELETE USUARIO
    $r->addRoute("deleteUser/:ID", "GET", "ControllerUser", "deleteUser");

    // EDIT PERMISO DE USUARIO
    $r->addRoute("editUserPermission/:ID", "GET", "ControllerUser", "editUserPermission");


    //Ruta por defecto.
    $r->setDefaultRoute("ControllerBikes", "showHome");

    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
?>