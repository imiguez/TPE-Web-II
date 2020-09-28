<?php


require_once 'libs/smarty/Smarty.class.php';

  class ViewBikes{
    private $title;
    //private $smarty;

    function __construct() {
      $this->title = "Bicicletería";
      $smarty = new Smarty();
    }

    function showHome() {
      $smarty = new Smarty();
      $this->title = "Home";
      $smarty->assign("title", $this->title);
      $smarty->display('templates/home.tpl');
    }



    function bikes($bikes, $categories) {
      $smarty = new Smarty();
      $this->title = "Bicicletas";
      $smarty->assign("title", $this->title);
      $smarty->assign("bikes", $bikes);
      $smarty->assign("categories", $categories);
      $smarty->display('templates/bikes.tpl');
    }

    function bike($bike, $categories) {
      $smarty = new Smarty();
      $bike = $bike[0];
      $this->title = $bike->modelo;
      $smarty->assign("title", $this->title);
      $smarty->assign("bike", $bike);
      $smarty->assign("categories", $categories);
      $smarty->display('templates/bike.tpl');
    }

    function categories($categories, $bikes) {
      $smarty = new Smarty();
      $this->title = "Categorías";
      $smarty->assign("title", $this->title);
      $smarty->assign("categories", $categories);
      $smarty->assign("bikes", $bikes);
      $smarty->display('templates/categories.tpl');
    }

  }

?>