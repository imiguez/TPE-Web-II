<?php

require_once './Model/ModelComments.php';
require_once './Api/ApiController.php';

class ApiBikesController extends ApiController{


    function __construct() {
        parent::__construct();
        $this->model = new ModelComments();
        $this->view = new ApiView();
    }

    public function getComments($params = null) {
        $id_bike = $params[':IDBIKE'];
        $comments = $this->model->getComments($id_bike);
        if ($comments) {
            $this->view->response($comments, 200);
        } else {
            $this->view->response("Error, la bicicleta con el id=".$id_bike." no existe.", 404);
        }
    }
    
    public function getComment($params = null) {
        $id_comment = $params[':ID'];
        $comment = $this->model->getComment($id_comment);
        if ($comment) {
            $this->view->response($comment, 200);
        } else {
            $this->view->response("Error, el comentario de la bicicleta con el id=$id_comment no existe.", 404);
        }
    }

    public function insertComment($params = null) {
        $body = $this->getData();
        $id_comment = $this->model->insertComment($body->id_usuario, $body->id_bicicleta, $body->puntuacion, $body->titulo, $body->descripcion);
        if ($id_comment) {
            $this->view->response($this->model->getComment($id_comment), 200);
        } else {
            $this->view->response("Error, no se pudo agregar el comentario.", 404);
        }
    }

    public function deleteComment($params = null) {
        $id_comment = $params[':ID'];
        $comment = $this->model->getComment($id_comment);
        if ($comment) {
            $this->model->deleteComment($id_comment);
            $this->view->response("Se elimino el comentario con exito.", 200);
        } else {
            $this->view->response("No se pudo eliminar el comentario.", 404);
        }
    }

    public function editComment($params = null) {
        $body = $this->getData();
        $id_comment = $params[':ID'];
        $before = $this->model->getComment($id_comment);
        $this->model->editComment($id_comment, $body->id_usuario, $body->id_bicicleta, $body->puntuacion, $body->titulo, $body->descripcion);
        $after = $this->model->getComment($id_comment);
        if ($before == $after) {
            $this->view->response("No se pudo editar el comentario.", 404);
        } else {
            $this->view->response("Se edito el comentario con exito.", 200);
        }
        
    }
}