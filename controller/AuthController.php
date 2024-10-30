<?php

require_once '../model/AuthModel.php';

class AuthController {
    public function showLoginForm() {
        require_once '../views/Login_view.php';
    }

    public function loginUser() {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $auth = new AuthModel();
        if ($auth->login($email, $senha)) {
            header('Location: /Projeto-Final/public/Home');
        } else {
            echo "E-mail ou senha incorretos!";
        }
    }

    public function logoutUser() {
        session_start();
        session_destroy();
        header('Location: /Projeto-Final/public/login');
    }
}
