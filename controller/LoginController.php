<?php
include('../model/conexão.php');
include('../model/UsuarioModel.php');

class LoginController {
    private $model;

    public function __construct($conn) {
        $this->model = new UsuarioModel($conn);
    }

    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $result = $this->model->verificarUsuario($email);

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['senha'])) {
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    header("Location: /views/html/homepaciente.html");
                    exit();
                } else {
                    echo "Senha incorreta!";
                }
            } else {
                echo "Usuário não encontrado!";
            }
        }
    }
}

$loginController = new LoginController($conn);
$loginController->login();
?>
