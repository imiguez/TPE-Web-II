<?php

    require_once './Model/ModelBikes.php';
    require_once './View/ViewBikes.php';

    class ControllerBikes{
        private $view;
        private $model;


        function __construct() {
            $this->model = new ModelBikes();
            $this->view = new ViewBikes();
        }

        function showHome() {
            $this->view->showHome();
        }

        function showBikes() {
            $bikes = $this->model->getBikes();
            $categories = $this->model->getCategories();
            $this->view->bikes($bikes, $categories);
        }

        function showBike($params = null){
            $id_bicicleta = $params[':ID'];
            $bicicleta = $this->model->getBike($id_bicicleta);
            $categories = $this->model->getCategories();
            $this->view->bike($bicicleta, $categories);
        }

        function showCategories() {
            $categories = $this->model->getCategories();
            $bikes = $this->model->getBikes();
            $this->view->categories($categories, $bikes);
        }

    }





?>