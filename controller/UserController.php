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
        $user = new Users();
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
            header('Location: /Projeto-Final/public/Home');
        } else {
            echo "Erro ao cadastrar!";
        }
    }

    public function HomePage() {
        // Pega todos os livros do banco de dados
        $user = new Users();
        $user = $user->getAll();
        // Exibe a lista de livros
        require_once '../views/paciente/html/homepaciente.html';
    }

    public function HomePage_med() {
        // Pega todos os livros do banco de dados
        $user = new Users();
        $user = $user->getAll();
        // Exibe a lista de livros
        require_once '../views/medicos/html/Homepage-M.html';
    }

    public function showProfile($id) {
        // Busca os dados do usuário pelo ID
        $user = new Users();
        $user = $user->getUserById($id);
    
        // Exibe a view do perfil
        require_once '../views/Perfil_view.php';
    }

    public function showUpdateForm($id) {
        $user = new Users();
        $user = $user->getUserById($id);
        include '../views/update_book_form.php'; // Inclua o arquivo do formulário de atualização
    
    }

    public function updateUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new Users();
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $cpf = $_POST['cpf'];
            $data_nascimento = $_POST['data_nascimento'];
            $endereco = $_POST['endereco'];
            $telefone = $_POST['telefone'];

            if ($user->update()) {
                header('Location: /Projeto-Final/public/profile');
            } else {
                echo "Erro ao atualizar o perfil.";
            }
        }
    }

    public function deleteUserByName() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new Users();
            $user->nome = $_POST['nome'];

            if ($user->deleteByName()) {
                header('Location: /Projeto-Final/public/profile');
            } else {
                echo "Erro ao excluir o livro.";
            }
        }
    }

    

}
