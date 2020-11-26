<?php 

    require_once './Model/ModelCategories.php';
    require_once './Model/ModelBikes.php';
    require_once './View/ViewCategories.php';
    require_once './SessionHelper.php';


    class ControllerCategories{

        private $modelCategories;
        private $modelBikes;
        private $view;
        private $sessionHelper;


        function __construct() {
            $this->modelCategories = new ModelCategories();
            $this->modelBikes = new ModelBikes();
            $this->view = new ViewCategories();
            $this->sessionHelper = new SessionHelper();
        }



        function showCategory($params = null, $msj = "") {
            $this->sessionHelper->checkUserSession();
            $id_categoria = $params[':ID'];
            $category = $this->modelCategories->getCategory($id_categoria);
            $bikes = $this->modelBikes->getBikes();
            $this->view->category($category, $bikes, $msj);
        }

        function showCategories() {
            $this->sessionHelper->startSessionFixed();
            $categories = $this->modelCategories->getCategories();
            $this->view->categories($categories);
        }

        function showCategoriesAndBikes() {
            $this->sessionHelper->checkUserSession();
            $categories = $this->modelCategories->getCategories();
            $bikes = $this->modelBikes->getBikes();
            $this->view->categoriesAndBikes($categories, $bikes);
        }

        function showInsertCategory() {
            $this->sessionHelper->checkUserSession();
            $this->sessionHelper->checkUserPermission();
            $this->view->insertCategory();
        }

        function insertCategory() {
            $this->sessionHelper->checkUserSession();
            $category = $_POST['categoria'];
            if (!empty($category)) {
                $this->modelCategories->insertCategory($category);
                $this->showCategories();
            } else {
                $this->view->insertCategory("No ha llenado el campo.");
            }
        }

        function deleteCategory($params = null) {
            $this->sessionHelper->checkUserSession();
            if ($_SESSION['permiso']) {
                $id = $params[':ID'];
                $this->modelCategories->deleteCategory($id);
                $this->showCategories();
            } else {
                header("Location: ".BASE_URL);
            }
        }

        function editCategory($params = null) {
            $this->sessionHelper->checkUserSession();
            $id = $params[':ID'];
            $category = $_POST['categoria'];
            if (!empty($category)) {
                $this->modelCategories->editCategory($id, $category);
                header("Location: ".BASE_URL."category/".$id);
            } else {
                $this->showCategory($params, "No se pudo editar la categoría, compruebe que no haya dejado el campo vacío.");
            }
            
        }
    }

?>