<?php


    class SessionHelper{


        function __construct() {

        }

                
        function checkUserSession() {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }
            if (!isset($_SESSION['usuario'])) {
                header("Location: ".LOGIN);
                die();
            }
        }




    }



?>