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

        function getPaginationBikes($desde) {
            $desde = (int) $desde;
            $sql = "SELECT * FROM bicicleta LIMIT ".($desde*3).",3";
            $sentencia = $this->db->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        function insertBike($marca, $modelo, $id_categoria, $condicion, $precio) {
            $sentencia = $this->db->prepare("INSERT INTO bicicleta(marca, modelo, id_categoria, condicion, precio) VALUE(?, ?, ?, ?, ?)");
            $sentencia->execute(array($marca, $modelo, $id_categoria, $condicion, $precio));
        }

        function deleteBike($id_bike) {
            $sentencia= $this->db->prepare("DELETE FROM bicicleta WHERE id_bicicleta=?");
            $sentencia->execute(array($id_bike));
        }

        function editBike($marca, $modelo, $id_categoria, $condicion, $precio, $id_bike) {
            $sentencia = $this->db->prepare("UPDATE bicicleta SET marca=?, modelo=?, id_categoria=?, condicion=?, precio=? WHERE id_bicicleta=?");
            $sentencia->execute(array($marca, $modelo, $id_categoria, $condicion, $precio, $id_bike));
        }

    }
?>