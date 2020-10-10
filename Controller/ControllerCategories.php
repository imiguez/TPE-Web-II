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


        private function checkUserSession() {
            session_start();
            if (!isset($_SESSION['usuario'])) {
                header("Location: ".LOGIN);
                die();
            }
        }

        function showCategory($params = null) {
            $this->checkUserSession();
            $id_categoria = $params[':ID'];
            $category = $this->modelCategories->getCategory($id_categoria);
            $bikes = $this->modelBikes->getBikes();
            $this->view->category($category, $bikes);
        }

        function showCategories() {
            $categories = $this->modelCategories->getCategories();
            $this->view->categories($categories);
        }

        function showCategoriesAndBikes() {
            $this->checkUserSession();
            $categories = $this->modelCategories->getCategories();
            $bikes = $this->modelBikes->getBikes();
            $this->view->categoriesAndBikes($categories, $bikes);
        }

    }

?>