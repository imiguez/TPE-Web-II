<?php

    require_once './Model/ModelBikes.php';
    require_once './Model/ModelCategories.php';
    require_once './View/ViewBikes.php';

    class ControllerBikes{
        private $view;
        private $model;


        function __construct() {
            $this->modelBikes = new ModelBikes();
            $this->modelCategories = new ModelCategories();
            $this->view = new ViewBikes();
        }


        private function checkUserSesion() {
            session_start();
            if (!isset($_SESSION['usuario'])) {
                header("Location: ".LOGIN);
                die();
            }
        }

        function showHome() {
            session_start();
            $this->view->showHome(isset($_SESSION['usuario']));
        }

        function showBikes() {
            //$this->checkUserSesion();
            $bikes = $this->modelBikes->getBikes();
            $categories = $this->modelCategories->getCategories();
            $this->view->bikes($bikes, $categories);
        }

        function showBike($params = null){
            $this->checkUserSesion();
            $id_bicicleta = $params[':ID'];
            $bike = $this->modelBikes->getBike($id_bicicleta);
            $categories = $this->modelCategories->getCategories();
            $this->view->bike($bike, $categories);
        }

    }

?>