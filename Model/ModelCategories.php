<?php 

    class ModelCategories{

        private $db;


        function __construct() {
            $this->db =  new PDO('mysql:host=localhost;'.'dbname=bicicleteria;charset=utf8', 'root', '');
        }


        
        function getCategories() {
            $sentencia = $this->db->prepare("SELECT * FROM categoria");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        function getCategorie($id_categorie) {
            $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE id_categoria=?");
            $sentencia->execute(array($id_categorie));
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }


    }

?>