<?php
include('../model/conexão.php');
include('../model/UsuarioModel.php');

class RegisterController {
    private $model;

    public function __construct($conn) {
        $this->model = new UsuarioModel($conn);
    }

    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password !== $confirm_password) {
                echo "As senhas não coincidem!";
                return;
            }

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $result = $this->model->verificarUsuario($email);

            if ($result->num_rows == 0) {
                if ($this->model->registrarUsuario($email, $hashed_password)) {
                    echo "Cadastro realizado com sucesso!";
                    header("Location: /views/html/homepaciente.html");
                    exit();
                } else {
                    echo "Erro ao realizar o cadastro!";
                }
            } else {
                echo "E-mail já registrado!";
            }
        }
    }
}

$registerController = new RegisterController($conn);
$registerController->register();
?>
