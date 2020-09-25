<?php 

    class MainModel{

        private $db;

        funtcion __construct() {
            this->db = new PDO('mysql:host=localhost;'.'dbname=bicilceteria;charset=utf8', 'root', '');
        }

        function getBikes() {
            $sentencia = $db->prepare("SELECT * FROM bicicletas");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }



    }
?>