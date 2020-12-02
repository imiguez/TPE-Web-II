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

        function showBikes($params = null) {
            $this->sessionHelper->startSessionFixed();
            $bikes = $this->modelBikes->getBikes();
            $desde = (int) $params[':ID'];
            $paginationBikes = $this->modelBikes->getPaginationBikes($desde-1);
            $categories = $this->modelCategories->getCategories();
            if ($paginationBikes) {
                $this->view->bikes($bikes, $categories, $paginationBikes, $desde);
            } else {
                header("Location: ".BASE_URL."home");
            }
        }

        function showBike($params = null) {
            $this->sessionHelper->startSessionFixed();
            $id_bicicleta = $params[':ID'];
            $bike = $this->modelBikes->getBike($id_bicicleta);
            if ($bike) {
                $image = base64_encode($bike->imagen);
                $categories = $this->modelCategories->getCategories();
                $this->view->bike($bike, $categories, $image);
            } else {
                header("Location: ". BASE_URL."home");
            }
        }

        function showInsertBike() {
            $this->sessionHelper->checkUserSession();
            $this->sessionHelper->checkUserPermission();
            $categories = $this->modelCategories->getCategories();
            $this->view->insertBike($categories);
        }

        function insertBike() {
            $this->sessionHelper->checkUserSession();
            $this->sessionHelper->checkUserPermission();
            if (!empty($_POST['marca']) && !empty($_POST['modelo']) && !empty($_POST['categoria']) && !empty($_POST['precio']) && isset($_POST['condicion'])) {
                if ($_FILES['file']['error'] == 0) {
                    $fileName= $_FILES['file']['name'];
                    $extAllowed = array('jpg', 'jpeg', 'png');
                    $fileExt = explode(".", $fileName);
                    $fileNewExt = strtolower(end($fileExt));
                    if (in_array($fileNewExt, $extAllowed)) {
                        $fileTmpName = file_get_contents($_FILES['file']['tmp_name']);
                        $marca = $_POST['marca'];
                        $modelo = $_POST['modelo'];
                        $categoria = $_POST['categoria'];
                        $precio = $_POST['precio'];
                        $condicion = $_POST['condicion'];
                        $this->modelBikes->insertBike($marca, $modelo, $categoria, $condicion, $precio, $fileTmpName);
                        header("Location: ".BASE_URL."bikes/1");
                    } else {
                        $categories = $this->modelCategories->getCategories();
                        $this->view->insertBike($categories,"El tipo de archivo que selecciono debe ser: jpg, jpeg o png.");
                    }
                } else {
                    $categories = $this->modelCategories->getCategories();
                    $this->view->insertBike($categories,"Hubo un error en la carga de la imagen, intente de nuevo.");
                }
            } else {
                $categories = $this->modelCategories->getCategories();
                $this->view->insertBike($categories, "Falta llenar campos.");
            }
            
        }

        function deleteBike($params = null) {
            $this->sessionHelper->checkUserSession();
            $this->sessionHelper->checkUserPermission();
            $id_bicicleta = $params[':ID'];
            $this->modelBikes->deleteBike($id_bicicleta);
            $this->showBikes();
        }

        function deleteBikeImage($params = null) {
            $this->sessionHelper->checkUserSession();
            $this->sessionHelper->checkUserPermission();
            $id_bicicleta = $params[':ID'];
            $this->modelBikes->editBikeImage($id_bicicleta, "");
            header("Location: ".BASE_URL."bike/".$id_bicicleta);
        }

        function showEditBikeImage($params = null) {
            $this->sessionHelper->checkUserSession();
            $this->sessionHelper->checkUserPermission();
            $this->view->editBikeImage($params[':ID']);
        }

        function editBikeImage($params = null) {
            $this->sessionHelper->checkUserSession();
            $this->sessionHelper->checkUserPermission();
            $id_bicicleta = $params[':ID'];
            if ($_FILES['file']['error'] == 0) {
                $fileName= $_FILES['file']['name'];
                $extAllowed = array('jpg', 'jpeg', 'png');
                $fileExt = explode(".", $fileName);
                $fileNewExt = strtolower(end($fileExt));
                if (in_array($fileNewExt, $extAllowed)) {
                    $fileTmpName = file_get_contents($_FILES['file']['tmp_name']);
                    $this->modelBikes->editBikeImage($id_bicicleta, $fileTmpName);
                    header("Location: ".BASE_URL."bike/".$id_bicicleta);
                } else {
                    $this->view->editBikeImage($id_bicicleta,"El tipo de archivo que selecciono debe ser: jpg, jpeg o png.");
                }
            } else {
                $this->view->editBikeImage($id_bicicleta,"Hubo un error en la carga de la imagen, intente de nuevo.");
            }
        }

        function editBike($params = null) {
            $this->sessionHelper->checkUserSession();
            $this->sessionHelper->checkUserPermission();
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $categoria = $_POST['categoria'];
            $precio = $_POST['precio'];
            $condicion = $_POST['condicion'];
            $id = $params[':ID'];
            $categories = $this->modelCategories->getCategories();
            $this->modelBikes->editBike($marca, $modelo, $categoria, $condicion, $precio, $id);
            // var_dump([$marca, $modelo, $categoria, $condicion, $precio, $id]);
            // var_dump(['precio' => $precio]);
                header("Location: ".BASE_URL."bike/".$id);
        }

    }

?>