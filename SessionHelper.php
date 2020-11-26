<?php


    class SessionHelper{


        function __construct() {

        }

                
        function checkUserSession() {
            $this->startSessionFixed();
            if (!isset($_SESSION['usuario'])) {
                header("Location: ".LOGIN);
                die();
            }
        }

        function checkUserPermission() {
            $this->startSessionFixed();
            if (!$_SESSION['permiso']) {
                header("Location: ".BASE_URL);
                die();
            }
        }

        function startSessionFixed() {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
        }
    }



?>