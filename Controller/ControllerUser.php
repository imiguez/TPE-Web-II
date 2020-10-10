<?php

require_once './Model/ModelCategories.php';

require_once './Model/ModelUser.php';
require_once './View/ViewUser.php';
require_once './View/ViewBikes.php';


    class ControllerUser{

        private $model;
        private $modelCategories;
        private $view;
        private $viewBikes;


        function __construct() {
            $this->modelCategories = new ModelCategories();
            $this->model = new ModelUser();
            $this->view = new ViewUser();
            $this->viewBikes = new ViewBikes();
        }

        function showLogin() {
            $this->view->login();
        }

        function showRegister() {
            $this->view->register();
        }


        function showLogout(){
            session_start();
            session_destroy();
            header("Location: ". LOGIN);
        }

        function verifyUserLogin() {
            //$email = $_POST['email'];
            $user = $_POST['user'];
            $password = $_POST['password'];

            if (isset($user)) {
                $userDB = $this->model->getUser($user);

                if ($userDB) {
                    $userDB = $userDB[0];
                    if (password_verify($password, $userDB->contraseña)) {
                        session_start();
                        $_SESSION['id_usuario'] = $userDB->id_usuario;
                        $_SESSION['usuario'] = $user;
                        $_SESSION['password'] = $password;
                        $_SESSION['email'] = $userDB->email;
                        if ($userDB->permiso == 0) {
                            $_SESSION['permiso'] = false;
                        } else {
                            $_SESSION['permiso'] = true;
                        }
                        header("Location: ".BASE_URL);
                    } else {
                        $this->view->login("La contraseña es incorrecta.");
                    }
                } else {
                    $this->view->login("El usuario no existe.");
                }
            }

        }

        function verifyUserRegister() {
            $email = $_POST['email'];
            $user = $_POST['user'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if (isset($user)&&isset($email)&&isset($password)) {
                $userDB = $this->model->getUser($user);
                $userDBemail = $this->model->getUserFromEmail($email);

                if ($userDBemail) {
                    $this->view->login("El email ya fue registrado.");
                } else if ($userDB) {
                    $this->view->login("El nombre de usuario ya fue registrado.");
                } else {
                    $this->model->insertUser($email, $user, $password);
                    header("Location: ".BASE_URL."home");
                }
            } else {
                $this->view->login("Le falto completar algún campo.");
            }
        }



    }

?>