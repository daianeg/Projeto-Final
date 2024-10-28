<?php

require_once '../model/UsuarioModel.php';

class UserController {

    public function showForm() {
        
        require_once '../views/Register_view.php';
    }

    public function saveUser() {
        // Recebe dados do formulário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $data_nascimento = $_POST['data_nascimento'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];

        // Cria um novo livro
        $user = new users();
        $user->nome = $nome;
        $user->email = $email;
        $user->cpf = $cpf;
        $user->data_nascimento = $data_nascimento;
        $user->endereco = $endereco;
        $user->telefone = $telefone;
        $user->senha = $senha;

        // Salva no banco de dados
        if ($user->save()) {
            // Redireciona para a página de listagem
            header('Location: /Projeto-Final/public/list-users');
        } else {
            echo "Erro ao cadastrar!";
        }
    }

    public function listUsers() {
        // Pega todos os livros do banco de dados
        $user = new users();
        $user = $user->getAll();

        // Exibe a lista de livros
        require_once '../views/paciente/html/homepaciente.html';
    }
}
