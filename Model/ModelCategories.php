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

        function getCategory($id_category) {
            $sentencia = $this->db->prepare("SELECT * FROM categoria WHERE id_categoria=?");
            $sentencia->execute(array($id_category));
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        function insertCategory($category) {
            $sentencia = $this->db->prepare("INSERT INTO categoria(categoria) VALUES(?)");
            $sentencia->execute(array($category));
        }

        function deleteCategory($id) {
            $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id_categoria=?");
            $sentencia->execute(array($id));
        }

        function editCategory($id, $category) {
            $sentencia = $this->db->prepare("UPDATE categoria SET categoria=? WHERE id_categoria=?");
            $sentencia->execute(array($category, $id));
        }

    }

?>