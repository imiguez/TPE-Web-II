<?php

require_once './Model/ModelCategories.php';
require_once './SessionHelper.php';
require_once './Model/ModelUser.php';
require_once './View/ViewUser.php';
require_once './View/ViewBikes.php';


    class ControllerUser{

        private $model;
        private $modelCategories;
        private $view;
        private $viewBikes;
        private $sessionHelper;


        function __construct() {
            $this->modelCategories = new ModelCategories();
            $this->model = new ModelUser();
            $this->view = new ViewUser();
            $this->viewBikes = new ViewBikes();
            $this->sessionHelper = new SessionHelper();
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
            $user = $_POST['user'];
            $password = $_POST['password'];

            if (isset($user)) {
                $userDB = $this->model->getUser($user);

                if ($userDB) {
                    $userDB = $userDB;
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

            if (!empty($user) && !empty($email) && !empty($_POST['password'])) {
                $userDB = $this->model->getUser($user);
                $userDBemail = $this->model->getUserFromEmail($email);

                if ($userDBemail) {
                    $this->view->register("El email ya fue registrado.");
                } else if ($userDB) {
                    $this->view->register("El nombre de usuario ya fue registrado.");
                } else {
                    $id = $this->model->insertUser($email, $user, $password);
                    session_start();
                    $_SESSION['id_usuario'] = $id;
                    $_SESSION['usuario'] = $user;
                    $_SESSION['password'] = $password;
                    $_SESSION['email'] = $email;
                    $_SESSION['permiso'] = false;
                    header("Location: ".BASE_URL."home");
                }
            } else {
                $this->view->register("Le falto completar algún campo.");
            }
        }

        function showUserList() {
            $this->sessionHelper->checkUserSession();
            $this->sessionHelper->checkUserPermission();
            $users = $this->model->getUsers();
            $this->view->userList($users);
        }

        function deleteUser($params = null) {
            $this->sessionHelper->checkUserSession();
            $this->sessionHelper->checkUserPermission();
            $id = $params[':ID'];
            $this->model->deleteUser($id);
            if ($id == $_SESSION['id_usuario']) {
                $_SESSION = [];
            }
            header("Location: ".BASE_URL."showUserList");
        }

        function editUserPermission($params = null) {
            $this->sessionHelper->checkUserSession();
            $this->sessionHelper->checkUserPermission();
            $id = $params[':ID'];
            $userPermission = $this->model->getUserPermission($id);
            if ($userPermission->permiso == 0) {
                $this->model->editUserPermission($id, 1);
                if ($id == $_SESSION['id_usuario']) 
                    $_SESSION['permiso'] = true;
            } else {
                $this->model->editUserPermission($id, 0);
                if ($id == $_SESSION['id_usuario']) 
                    $_SESSION['permiso'] = false;
            }
            header("Location: ".BASE_URL."showUserList");
        }
    }

?>