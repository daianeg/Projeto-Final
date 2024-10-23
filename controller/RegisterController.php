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
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $cpf = $_POST['cpf'];
            $data_nascimento = $_POST['data_nascimento'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            // Verifica se as senhas coincidem
            if ($password !== $confirm_password) {
                echo "As senhas não coincidem!";
                return;
            }

            // Verifica se o e-mail já está registrado
            if ($this->model->verificarUsuario($email)->num_rows > 0) {
                echo "E-mail já registrado!";
                return;
            }

            // Hash da senha
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insere o novo usuário no banco de dados
            if ($this->model->cadastrarUsuario($nome, $email, $cpf, $data_nascimento, $endereco, $telefone, $hashed_password)) {
                header("Location: ../views/login_view.php");
                exit();
            } else {
                echo "Erro ao cadastrar o usuário!";
            }
        }
    }
}

$registerController = new RegisterController($conn);
$registerController->register();
?>
