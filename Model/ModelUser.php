<?php


    class ModelUser{

        private $db;
        private $title;


        function __construct() {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=bicicleteria;charset=utf8', 'root', '');

        }

        //LOGIN

        function getUser($user) {
            $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE usuario=?");
            $sentencia->execute(array($user));
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        function getUserFromEmail($email) {
            $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE email=?");
            $sentencia->execute(array($email));
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        function insertUser($email, $name, $password) {
            $sentencia = $this->db->prepare("INSERT INTO usuario(usuario, email, contraseña, permiso) VALUES(?, ?, ?, ?)");
            $sentencia->execute(array($name, $email, $password, false));
        }

        
    }


?>