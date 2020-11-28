<?php
    
    require_once 'RouterClass.php';
    require_once 'Api/ApiBikesController.php';

    $r2 = new Router();

    $r2->addRoute("comments/:IDBIKE", "GET", "ApiBikesController", "getComments");
    $r2->addRoute("comments/:ID", "GET", "ApiBikesController", "getComment");
    $r2->addRoute("comments", "POST", "ApiBikesController", "insertComment");
    $r2->addRoute("comments/:ID", "DELETE", "ApiBikesController", "deleteComment");
    $r2->addRoute("comments/:ID", "PUT", "ApiBikesController", "editComment");

    $r2->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 
