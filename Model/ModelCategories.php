<?php 

    class ModelCategories{

        private $db;


        function __construct() {
            $this->db = new PDO('mysql:host=us-cdbr-east-04.cleardb.com;'.'dbname=heroku_6eed6b941a6ba00;charset=utf8', 'b44bbe1fe42c96', '7f4137d0');
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
