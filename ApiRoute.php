<?php
    
    require_once 'RouterClass.php';
    require_once 'Api/ApiCommentsController.php';

    $r2 = new Router();

    $r2->addRoute("comments/:IDBIKE", "GET", "ApiCommentsController", "getComments");
    $r2->addRoute("comment/:ID", "GET", "ApiCommentsController", "getComment");
    $r2->addRoute("comment", "POST", "ApiCommentsController", "insertComment");
    $r2->addRoute("comment/:ID", "DELETE", "ApiCommentsController", "deleteComment");
    $r2->addRoute("comment/:ID", "PUT", "ApiCommentsController", "editComment");


    $r2->route($_GET['resource'], $_SERVER['REQUEST_METHOD']); 
