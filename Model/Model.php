<?php


    class Model {

        protected $db;

        public function __construct() {
            $this->db = new PDO('mysql:host=mysqldb;'.'dbname=bicicleteria;charset=utf8', 'root', 'imiguez');
        }

    }