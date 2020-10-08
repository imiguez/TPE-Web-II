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
            $this->smarty->assign("msj", $msj);
            $this->smarty->display("templates/login.tpl");
        }

        function register($msj = "") {
            $this->title = "Registracion";
            $this->smarty->assign("title", $this->title);
            $this->smarty->assign("msj", $msj);
            $this->smarty->display("templates/register.tpl");
        }






    }

?>