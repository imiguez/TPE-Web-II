<?php

    class ViewCategories{

        private $title;
        private $smarty;


        function __construct() {
            $this->smarty = new Smarty();
        }


        function category($category, $bikes) {
            $category = $category[0];
            $this->title = $category->categoria;
            $this->smarty->assign("title", $this->title);
            $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
            $this->smarty->assign("hasPermission", $_SESSION['permiso']);
            $this->smarty->assign("category", $category);
            $this->smarty->assign("bikes", $bikes);
            $this->smarty->display('templates/category.tpl');
      
        }      

        function categories($categories) {
            session_start();
            $this->title = "Categorías";
            $this->smarty->assign("title", $this->title);
            $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
            $this->smarty->assign("hasPermission", $_SESSION['permiso']);
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

    }
?>