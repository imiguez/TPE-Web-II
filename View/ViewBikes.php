<?php


require_once 'libs/smarty/Smarty.class.php';

  class ViewBikes{
    private $title;
    private $smarty;

    function __construct() {
      $this->title = "Bicicletería";
      $this->smarty = new Smarty();
    }

    function showHome($isLogged = false) {
      //$this->smarty = new Smarty();

      $this->title = "Home";
      $this->smarty->assign("title", $this->title);
      $this->smarty->assign("isLogged", $isLogged);
      $this->smarty->display('templates/home.tpl');
    }



    function bikes($bikes, $categories) {
      //$this->smarty = new Smarty();
      session_start();
      $this->title = "Bicicletas";
      $this->smarty->assign("title", $this->title);
      $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
      $this->smarty->assign("bikes", $bikes);
      $this->smarty->assign("categories", $categories);
      $this->smarty->display('templates/bikes.tpl');
    }

    function bike($bike, $categories) {
      //$this->smarty = new Smarty();
      //session_start();
      $bike = $bike[0];
      $this->title = $bike->modelo;
      $this->smarty->assign("title", $this->title);
      $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
      $this->smarty->assign("bike", $bike);
      $this->smarty->assign("categories", $categories);
      $this->smarty->display('templates/bike.tpl');
    }


  }

?>