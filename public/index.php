<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once '../controller/UserController.php';

$controller = new UserController();

$request = $_SERVER['REQUEST_URI'];

// Roteamento com base na URL
switch (true) {
    case ($request === '/Projeto-Final/public/'):
        $controller->showForm();
        break;
    
    case ($request === '/Projeto-Final/public/save-users'):
        $controller->saveUser();
        break;
    
    case ($request === '/Projeto-Final/public/Home'):
        $controller->HomePage();
        break;
    
    case ($request === '/Projeto-Final/public/Users'):
        $controller->listUsers();
        break;

    // Rota de atualização de usuário (dinâmica)
    case preg_match('/\/Projeto-Final\/public\/update-user\/(\d+)/', $request, $matches) ? true : false:
        $id = $matches[1];
        $controller->showUpdateForm($id);
        break;

        case ('/Projeto-Final/public/update-user'):
            $controllerr = new UserController();
            $controller->updateUser();
            break;

    // Rota de exclusão de usuário (dinâmica)
    case preg_match('/\/Projeto-Final\/public\/delete-user\/(\d+)/', $request, $matches) ? true : false:
        $id = $matches[1];
        $controller->deleteUser($id);
        break;

    

    default:
        http_response_code(404);
        echo "Página não encontrada.";
        break;

}*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Requerendo os arquivos necessários
require_once '../config/conexao.php';
require_once '../controller/UserController.php';

$request = $_SERVER['REQUEST_URI'];  // Captura a URL solicitada

$controller = new UserController();

// Roteamento com base na URL
switch (true) {
    case ($request === '/Projeto-Final/public/'):
        // Página inicial (formulário de cadastro ou login)
        $controller->showForm();
        break;
    
    case ($request === '/Projeto-Final/public/save-users'):
        // Salvar usuário após o cadastro
        $controller->saveUser();
        break;
    
    case ($request === '/Projeto-Final/public/Home'):
        // Página inicial após login
        $controller->HomePage();
        break;
    
    case ($request === '/Projeto-Final/public/Users'):
        // Listagem de usuários
        $controller->listUsers();
        break;

    // Rota de atualização de usuário (dinâmica) - exibe o formulário de edição
    case preg_match('/^\/Projeto-Final\/public\/update-user\/(\d+)$/', $request, $matches):
        $id = $matches[1];  // Captura o ID do usuário da URL
        $controller->showUpdateForm($id);  // Exibe o formulário de edição
        break;

    // Rota para realizar a atualização do usuário (POST)
    case ($request === '/Projeto-Final/public/update-user'):
        $controller->updateUser();  // Chama o método que atualiza o usuário
        break;

    // Rota de exclusão de usuário (dinâmica) - excluir usuário
    case preg_match('/^\/Projeto-Final\/public\/delete-user\/(\d+)$/', $request, $matches):
        $id = $matches[1];  // Captura o ID do usuário da URL
        $controller->deleteUser($id);  // Exclui o usuário
        break;

    default:
        // Caso não encontre nenhuma rota válida, exibe um erro 404
        http_response_code(404);
        echo "Página não encontrada.";
        break;
}

