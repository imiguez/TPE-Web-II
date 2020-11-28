<?php

require_once 'libs/smarty/Smarty.class.php';


    class ViewUser{

        private $title;
        private $smarty;


        function __construct() {
            $this->title = "Login";
            $this->smarty = new Smarty();
        }


        function login($msj = "") {
            $this->title = "Login";
            $this->smarty->assign("title", $this->title);
            $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
            if (isset($_SESSION['permiso'])) {
                $this->smarty->assign("hasPermission", $_SESSION['permiso']);
              } else {
                $this->smarty->assign("hasPermission", false);
              }
            $this->smarty->assign("msj", $msj);
            $this->smarty->display("templates/login.tpl");
        }

        function register($msj = "") {
            $this->title = "Registro";
            $this->smarty->assign("title", $this->title);
            $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
            if (isset($_SESSION['permiso'])) {
                $this->smarty->assign("hasPermission", $_SESSION['permiso']);
              } else {
                $this->smarty->assign("hasPermission", false);
              }
            $this->smarty->assign("msj", $msj);
            $this->smarty->display("templates/register.tpl");
        }

        function userList($users) {
            $this->title = "Lista de Usuarios";
            $this->smarty->assign("title", $this->title);
            $this->smarty->assign("isLogged", isset($_SESSION['usuario']));
            $this->smarty->assign("hasPermission", $_SESSION['permiso']);
            $this->smarty->assign("users", $users);
            $this->smarty->display("templates/userList.tpl");
        }

    }

?>