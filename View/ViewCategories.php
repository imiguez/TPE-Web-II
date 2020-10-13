<?php

require_once './Controller/ControllerSessionHelper.php';

    class ViewCategories{

        private $title;
        private $smarty;
        private $sessionHelper;


        function __construct() {
            $this->smarty = new Smarty();
            $this->sessionHelper = new SessionHelper();
        }


        function category($category, $bikes, $msj = "") {
            $category = $category[0];
            $this->title = $category->categoria;
            $this->smarty->assign("title", $this->title);
            $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
            $this->smarty->assign("hasPermission", $_SESSION['permiso']);
            $this->smarty->assign("category", $category);
            $this->smarty->assign("bikes", $bikes);
            $this->smarty->assign("msj", $msj);
            $this->smarty->display('templates/category.tpl');
      
        }      

        function categories($categories) {
            //$this->sessionHelper->checkUserSession();
            $this->title = "Categorías";
            $this->smarty->assign("title", $this->title);
            $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
            if (isset($_SESSION['permiso'])) {
                $this->smarty->assign("hasPermission", $_SESSION['permiso']);
              } else {
                $this->smarty->assign("hasPermission", false);
              }
            $this->smarty->assign("categories", $categories);
            $this->smarty->display('templates/categories.tpl');
      
        }

        function categoriesAndBikes($categories, $bikes) {
            //$this->smarty = new Smarty();
            $this->title = "Categorías y Bicicletas";
            $this->smarty->assign("title", $this->title);
            $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
            $this->smarty->assign("hasPermission", $_SESSION['permiso']);
            $this->smarty->assign("categories", $categories);
            $this->smarty->assign("bikes", $bikes);
            $this->smarty->display('templates/categoriesAndBikes.tpl');
        }

        function insertCategory($msj = "") {
            $this->title = "Agregar una Categoría";
            $this->smarty->assign("title", $this->title);
            $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
            $this->smarty->assign("hasPermission", $_SESSION['permiso']);
            $this->smarty->assign("msj", $msj);
            $this->smarty->display("templates/insertCategory.tpl");
        }


    }
?>