<?php

// Ativar exibição de erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../controller/UserController.php';

// Lógica de roteamento
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/Projeto-Final/public/':
        $controller = new UserController();
        $controller->showForm();
        break;
    case '/Projeto-Final/public/save-users':
        $controller = new UserController();
        $controller->saveUser();
        break;
    case '/Projeto-Final/public/list-users':
        $controller = new UserController();
        $controller->listUsers();
        break;
    default:
        http_response_code(404);
        echo "Página

 não encontrada.";
        break;
}
