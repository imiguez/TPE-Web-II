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
      $this->title = "Home";
      $this->smarty->assign("title", $this->title);
      $this->smarty->assign("isLogged", $isLogged);
      if (isset($_SESSION['permiso'])) {
        $this->smarty->assign("hasPermission", $_SESSION['permiso']);
      } else {
        $this->smarty->assign("hasPermission", false);
      }
      $this->smarty->display('templates/home.tpl');
    }



    function bikes($bikes, $categories) {
      $this->title = "Bicicletas";
      $this->smarty->assign("title", $this->title);
      $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
      if (isset($_SESSION['permiso'])) {
        $this->smarty->assign("hasPermission", $_SESSION['permiso']);
      } else {
        $this->smarty->assign("hasPermission", false);
      }
      $this->smarty->assign("bikes", $bikes);
      $this->smarty->assign("categories", $categories);
      $this->smarty->display('templates/bikes.tpl');
    }

    function bike($bike, $categories, $msj = "") {
      $bike = $bike[0];
      $this->title = $bike->modelo;
      $this->smarty->assign("title", $this->title);
      $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
      $this->smarty->assign("hasPermission", $_SESSION['permiso']);
      $this->smarty->assign("msj", $msj);
      $this->smarty->assign("bike", $bike);
      $this->smarty->assign("categories", $categories);
      $this->smarty->display('templates/bike.tpl');
    }


    function insertBike($categories, $msj = "") {
      $this->title = "Agregar bicicleta";
      $this->smarty->assign("title", $this->title);
      $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
      $this->smarty->assign("hasPermission", $_SESSION['permiso']);
      $this->smarty->assign("categories", $categories);
      $this->smarty->assign("msj", $msj);
      $this->smarty->display("templates/insertBike.tpl");
  }


  }

?>