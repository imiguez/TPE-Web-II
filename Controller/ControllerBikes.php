<?php

    require_once './Model/ModelBikes.php';
    require_once './Model/ModelCategories.php';
    require_once './View/ViewBikes.php';

    class ControllerBikes{
        private $view;
        private $modelCategories;
        private $modelBikes;


        function __construct() {
            $this->modelBikes = new ModelBikes();
            $this->modelCategories = new ModelCategories();
            $this->view = new ViewBikes();
        }


        private function checkUserSession() {
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
            //$this->checkUserSession();
            $bikes = $this->modelBikes->getBikes();
            $categories = $this->modelCategories->getCategories();
            $this->view->bikes($bikes, $categories);
        }

        function showBike($params = null){
            $this->checkUserSession();
            $id_bicicleta = $params[':ID'];
            $bike = $this->modelBikes->getBike($id_bicicleta);
            $categories = $this->modelCategories->getCategories();
            $this->view->bike($bike, $categories);
        }

        function showInsertBike() {
            $this->checkUserSession();
            $categories = $this->modelCategories->getCategories();
            $this->view->insertBike($categories);
        }

        function insertBike($params = null) {
            $this->checkUserSession();
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $categoria = $_POST['categoria'];
            $precio = $_POST['precio'];
            $condicion = $_POST['condicion'];
            if (!isset($_POST['marca']) || !isset($_POST['modelo']) || !isset($_POST['categoria']) || !isset($_POST['precio']) || !isset($_POST['condicion'])) {
                $marca = $_POST['marca'];
                $modelo = $_POST['modelo'];
                $categoria = $_POST['categoria'];
                $precio = $_POST['precio'];
                $condicion = $_POST['condicion'];
                $this->modelBikes->insertBike($marca, $modelo, $categoria, $precio, $condicion);
                $categories = $this->modelCategories->getCategories();
                $this->view->insertBike($categories,"Se ha cargado con exito la nueva bicicleta.");
            } else {
                $categories = $this->modelCategories->getCategories();
                $this->view->insertBike($categories,"Faltan cargar campos.");
            }
            
        }

    }

?>