<?php


    class ModelUser{

        private $db;
        private $title;


        function __construct() {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=bicicleteria;charset=utf8', 'root', '');

        }

        function getUser($user) {
            $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE usuario=?");
            $sentencia->execute(array($user));
            return $sentencia->fetch(PDO::FETCH_OBJ);
        }

        function getUserFromEmail($email) {
            $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE email=?");
            $sentencia->execute(array($email));
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        function insertUser($email, $name, $password) {
            $sentencia = $this->db->prepare("INSERT INTO usuario(usuario, email, contraseña, permiso) VALUES(?, ?, ?, ?)");
            $sentencia->execute(array($name, $email, $password, false));
            return $this->db->lastInsertId();
        }

        function getUsers() {
            $sentencia = $this->db->prepare("SELECT * FROM usuario");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }
        
        function deleteUser($id) {
            $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id_usuario=?");
            $sentencia->execute(array($id));
        }

        function getUserPermission($id) {
            $sentencia = $this->db->prepare("SELECT permiso FROM usuario WHERE id_usuario=?");
            $sentencia->execute(array($id));
            return $sentencia->fetch(PDO::FETCH_OBJ);
        }

        function editUserPermission($id, $newPermission) {
            $sentencia = $this->db->prepare("UPDATE usuario SET permiso=? WHERE id_usuario=?");
            $sentencia->execute(array($newPermission, $id));
        }
    }
?>