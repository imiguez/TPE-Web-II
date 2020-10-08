<?php 

    require_once './Model/ModelCategories.php';
    require_once './Model/ModelBikes.php';
    require_once './View/ViewCategories.php';

    class ControllerCategories{

        private $modelCategories;
        private $modelBikes;
        private $view;


        function __construct() {
            $this->modelCategories = new ModelCategories();
            $this->modelBikes = new ModelBikes();
            $this->view = new ViewCategories();
        }


        private function checkUserSesion() {
            session_start();
            if (!isset($_SESSION['usuario'])) {
                header("Location: ".LOGIN);
                die();
            }
        }

        function showCategorie($params = null) {
            $this->checkUserSesion();
            $id_categoria = $params[':ID'];
            $categorie = $this->modelCategories->getCategorie($id_categoria);
            $bikes = $this->modelBikes->getBikes();
            $this->view->categorie($categorie, $bikes);
        }

        function showCategories() {
            $categories = $this->modelCategories->getCategories();
            $this->view->categories($categories);
        }

        function showCategoriesAndBikes() {
            $this->checkUserSesion();
            $categories = $this->modelCategories->getCategories();
            $bikes = $this->modelBikes->getBikes();
            $this->view->categoriesAndBikes($categories, $bikes);
        }

    }

?>