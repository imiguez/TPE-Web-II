<?php

    require_once './Model/ModelBikes.php';
    require_once './Model/ModelCategories.php';
    require_once './View/ViewBikes.php';
    require_once './SessionHelper.php';

    class ControllerBikes{
        private $view;
        private $modelCategories;
        private $modelBikes;
        private $sessionHelper;


        function __construct() {
            $this->modelBikes = new ModelBikes();
            $this->modelCategories = new ModelCategories();
            $this->view = new ViewBikes();
            $this->sessionHelper = new SessionHelper();
        }


        function showHome() {
            session_start();
            $this->view->showHome(isset($_SESSION['usuario']));
        }

        function showBikes() {
            $this->sessionHelper->startSessionFixed();
            $bikes = $this->modelBikes->getBikes();
            $categories = $this->modelCategories->getCategories();
            $this->view->bikes($bikes, $categories);
        }

        function showBike($params = null) {
            $this->sessionHelper->startSessionFixed();
            $id_bicicleta = $params[':ID'];
            $bike = $this->modelBikes->getBike($id_bicicleta);
            $categories = $this->modelCategories->getCategories();
            $this->view->bike($bike, $categories);
        }

        function showInsertBike() {
            $this->sessionHelper->checkUserSession();
            $this->sessionHelper->checkUserPermission();
            $categories = $this->modelCategories->getCategories();
            $this->view->insertBike($categories);
        }

        function insertBike() {
            $this->sessionHelper->checkUserSession();

            if (!empty($_POST['marca']) && !empty($_POST['modelo']) && !empty($_POST['categoria']) && !empty($_POST['precio']) && isset($_POST['condicion'])) {
                $marca = $_POST['marca'];
                $modelo = $_POST['modelo'];
                $categoria = $_POST['categoria'];
                $precio = $_POST['precio'];
                $condicion = $_POST['condicion'];
                $this->modelBikes->insertBike($marca, $modelo, $categoria, $condicion, $precio);
                $this->showBikes();
            } else {
                $categories = $this->modelCategories->getCategories();
                $this->view->insertBike($categories,"Faltan cargar campos.");
            }
            
        }

        function deleteBike($params = null) {
            $this->sessionHelper->checkUserSession();
            $this->sessionHelper->checkUserPermission();
                $id_bicicleta = $params[':ID'];
                $this->modelBikes->deleteBike($id_bicicleta);
                $this->showBikes();
        }

        function editBike($params = null) {
            $this->sessionHelper->checkUserSession();

            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $categoria = $_POST['categoria'];
            $precio = $_POST['precio'];
            $condicion = $_POST['condicion'];
            $id = $params[':ID'];
            $categories = $this->modelCategories->getCategories();
            if (!empty($marca) && !empty($modelo) && !empty($categoria) && !empty($precio)) {
                $this->modelBikes->editBike($marca, $modelo, $categoria, $condicion, $precio, $id);
                header("Location: ".BASE_URL."bike/".$id);
            } else {
                $bike = $this->modelBikes->getBike($id);
                $this->view->bike($bike, $categories, "No se pudo editar la bicicleta, fijese que todos los campos esten llenos.");
            }
        }

    }

?>