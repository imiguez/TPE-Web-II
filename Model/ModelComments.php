<?php 

class ModelComments{

    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=bicicleteria;charset=utf8', 'root', '');
    }

    function getComments($bike) {
        $sentencia = $this->db->prepare("SELECT * FROM comentario WHERE id_bicicleta=?");
        $sentencia->execute(array($bike));
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function getComment($comment) {
        $sentencia = $this->db->prepare("SELECT * FROM comentario WHERE id_comentario=?");
        $sentencia->execute(array($comment));
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    function insertComment($id_user, $id_bike, $punctuation, $title, $description) {
        $sentencia = $this->db->prepare("INSERT INTO comentario(id_usuario, id_bicicleta, puntuacion, titulo, descripcion) VALUE (?,?,?,?,?)");
        $sentencia->execute(array($id_user, $id_bike, $punctuation, $title, $description));
        return $this->db->lastInsertId();
    }

    function deleteComment($id_comment) {
        $sentencia = $this->db->prepare("DELETE FROM comentario WHERE id_comentario=?");
        $sentencia->execute(array($id_comment));
    }

    function editComment($id_comment, $id_user, $id_bike, $punctuation, $title, $description) {
        $sentencia = $this->db->prepare("UPDATE comentario SET id_usuario=?, id_bicicleta=?, puntuacion=?, titulo=?, descripcion=? WHERE id_comentario=?");
        $sentencia->execute(array($id_user, $id_bike, $punctuation, $title, $description, $id_comment));
    }
}