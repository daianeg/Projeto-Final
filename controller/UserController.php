<?php

require_once '../model/UsuarioModel.php';



class UserController {

    public function showForm() {
        
        require_once '../views/Register_view.php';
    }

  

    public function saveUser() {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $cpf = $_POST['cpf'];
        $endereco = $_POST['endereco'];
        $senha = $_POST['senha'];

        
        $user = new Users();
        $user->id = $id;
        $user->nome = $nome;
        $user->email = $email;
        $user->cpf = $cpf;
        $user->endereco = $endereco;
        $user->senha = $senha;

       
        if ($user->save()) {
           
            header('Location: /Projeto-Final/public/Home');
        } else {
            echo "Erro ao cadastrar!";
        }
    }

    public function HomePage() {
        $user = new Users();
        $user = $user->getAll();
        // Exibe a lista de livros
        require_once '../views/homepage.php';
    }

    /*public function Users(){
        $user = new Users();
        $user = $user->getAll();
        require_once '../views/usuarios.php';
    }*/

   
    public function showProfile($id) {
        
        $user = new Users();
        $user = $user->getUserById($id);
    
       
        require_once '../views/Perfil_view.php';
    }

    public function showUpdateForm($id) {
        $user = new Users();
        $user = $user->getUserById($id);

        require_once '../views/editar.php'; 
    
    }

    public function deleteUser($id) {
        $userModel = new Users();
        if ($userModel->deleteById($id)) {
            header('Location: /Projeto-Final/public/Users');
        } else {
            echo "Erro ao excluir o usuário.";
        }
    }

    public function listUsers() {
      
        $userModel = new Users(); 
        $users = $userModel->getAll(); 
        include '../views/usuarios.php';
    }
    
    /*
    public function editUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new Users();
            $id = $_POST['id'];
            $userModel->nome = $_POST['nome'];
            $userModel->email = $_POST['email'];
            $userModel->cpf = $_POST['cpf'];
            $userModel->endereco = $_POST['endereco'];
    
            if ($userModel->update($id)) {
                header('Location: ../Projeto-Final/public/editar');
            } else {
                echo "Erro ao atualizar o usuário.";
            }
        }
    }*/

    public function showEditForm($id) {
        $user = new Users();
        $user = $user->getUserById($id);
        
        // Certifique-se de passar o usuário encontrado para a view
        require_once '../views/editar.php'; 
    }
    
    public function updateUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new Users();
            
            // Atribua os dados do formulário
            $user->id = $_POST['id'];
            $user->nome = $_POST['nome'];
            $user->email = $_POST['email'];
            $user->senha = $_POST['senha'];
            $user->endereco = $_POST['endereco'];
            $user->cpf = $_POST['cpf'];
    
            // Verifique se as senhas correspondem
            if ($_POST['senha'] === $_POST['confirmar_senha']) {
                if ($user->update()) {
                    header('Location: /Projeto-Final/public/Users');
                } else {
                    echo "Erro ao atualizar as informações!";
                }
            } else {
                echo "As senhas não coincidem!";
            }
        }
    }
    
    



    

}
