<?php

require_once 'libs/smarty/Smarty.class.php';

    class ViewCategories{

        private $title;
        private $smarty;


        function __construct() {
            $this->smarty = new Smarty();
        }


        function category($category, $bikes, $msj = "") {
            $category = $category[0];
            $this->title = $category->categoria;
            $this->smarty->assign("title", $this->title);
            $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
            $this->smarty->assign("hasPermission", $_SESSION['permiso']);
            $this->smarty->assign("user", $_SESSION['usuario']);
            $this->smarty->assign("category", $category);
            $this->smarty->assign("bikes", $bikes);
            $this->smarty->assign("msj", $msj);
            $this->smarty->display('templates/category.tpl');
      
        }      

        function categories($categories) {
            $this->title = "Categorías";
            $this->smarty->assign("title", $this->title);
            $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
            if (isset($_SESSION['permiso'])) {
                $this->smarty->assign("hasPermission", $_SESSION['permiso']);
                $this->smarty->assign("user", $_SESSION['usuario']);
              } else {
                $this->smarty->assign("hasPermission", false);
              }
            $this->smarty->assign("categories", $categories);
            $this->smarty->display('templates/categories.tpl');
      
        }

        function categoriesAndBikes($categories, $bikes) {
            $this->title = "Categorías y Bicicletas";
            $this->smarty->assign("title", $this->title);
            $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
            $this->smarty->assign("hasPermission", $_SESSION['permiso']);
            $this->smarty->assign("user", $_SESSION['usuario']);
            $this->smarty->assign("categories", $categories);
            $this->smarty->assign("bikes", $bikes);
            $this->smarty->display('templates/categoriesAndBikes.tpl');
        }

        function insertCategory($msj = "") {
            $this->title = "Agregar una Categoría";
            $this->smarty->assign("title", $this->title);
            $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
            $this->smarty->assign("hasPermission", $_SESSION['permiso']);
            $this->smarty->assign("user", $_SESSION['usuario']);
            $this->smarty->assign("msj", $msj);
            $this->smarty->display("templates/insertCategory.tpl");
        }


    }
?>