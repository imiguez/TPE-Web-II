<?php 

    class ModelBikes{

        private $db;

        function __construct() {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=bicicleteria;charset=utf8', 'root', '');
        }


        function getBike($id_bike) {
            $sentencia = $this->db->prepare("SELECT * FROM bicicleta WHERE id_bicicleta=?");
            $sentencia->execute(array($id_bike));
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        function getBikes() {
            $sentencia = $this->db->prepare("SELECT * FROM bicicleta");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }


        function insertBike($marca, $model, $id_categorie, $condition, $price) {
            $sentencia = $this->db->prepare("INSERT INTO bicicleta(marca, modelo, id_categoria, condicion, precio) VALUE(?, ?, ?, ?, ?)");
            $sentencia->execute(array($marca, $model, $id_categorie, $condition, $price));
        }

        function deleteBike($id_bike) {
            $sentencia= $this->db->prepare("DELETE FROM bicicleta WHERE id_bicicleta=?");
            $sentencia->execute(array($id_bike));
        }


    }
?>