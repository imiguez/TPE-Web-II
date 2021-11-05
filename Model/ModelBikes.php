<?php 

require_once './Model/Model.php';

    class ModelBikes extends Model {

        protected $db;

        public function __construct() {
            parent::__construct();
            // $this->db = new PDO('mysql:host=mysqldb;'.'dbname=bicicleteria;charset=utf8', 'root', 'imiguez');
            // $this->db = new PDO('mysql:host=us-cdbr-east-04.cleardb.com;'.'dbname=heroku_6eed6b941a6ba00;charset=utf8', 'b44bbe1fe42c96', '7f4137d0');
        }


        function getBike($id_bike) {
            $sentencia = $this->db->prepare("SELECT * FROM bicicleta WHERE id_bicicleta=?");
            $sentencia->execute(array($id_bike));
            return $sentencia->fetch(PDO::FETCH_OBJ);
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

        function insertBike($marca, $modelo, $id_categoria, $condicion, $precio, $imagen) {
            $sentencia = $this->db->prepare("INSERT INTO bicicleta(marca, modelo, id_categoria, condicion, precio, imagen) VALUE(?, ?, ?, ?, ?, ?)");
            $sentencia->execute(array($marca, $modelo, $id_categoria, $condicion, $precio, $imagen));
        }

        function deleteBike($id_bike) {
            $sentencia= $this->db->prepare("DELETE FROM bicicleta WHERE id_bicicleta=?");
            $sentencia->execute(array($id_bike));
        }

        function editBikeImage($id_bike, $image) {
            $sentencia= $this->db->prepare("UPDATE bicicleta SET imagen=? WHERE id_bicicleta=?");
            $sentencia->execute(array($image, $id_bike));
        }

        function editBike($marca, $modelo, $id_categoria, $condicion, $precio, $id_bike) {
            #$sql = "UPDATE bicicleta SET marca=".$marca.", modelo=".$modelo.", id_categoria=".$id_categoria.", condicion=".$condicion.", precio=".$precio.",  WHERE id_bicicleta=".$id_bicicleta."";
            $sentencia= $this->db->prepare("UPDATE bicicleta SET marca=?, modelo=?, id_categoria=?, condicion=?, precio=?  WHERE id_bicicleta=?");
            $sentencia->execute(array($marca, $modelo, $id_categoria, $condicion, $precio, $id_bike));
        }

    }
?>
