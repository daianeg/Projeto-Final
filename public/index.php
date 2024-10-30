<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once '../controller/UserController.php';
require_once '../controller/AuthController.php';

$controller = new UserController();


$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/Projeto-Final/public/':
        $controller->showForm();
        break;
    case '/Projeto-Final/public/save-users':
        $controller->saveUser();
        break;
    case '/Projeto-Final/public/Home':
        $controller->HomePage();
        break;
    case '/Projeto-Final/public/Home-med':
        $controller->HomePage_med();
        break;
    case '/Projeto-Final/public/login':
        $controller = new AuthController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->loginUser();
        } else {
            $controller->showLoginForm();
        }
        break;

     case '/Projeto-Final/public/profile':
        $controller->showProfile($_SESSION['user_id']);
        break;

    case '/Projeto-Final/public/delete-user':
        $controller->deleteUserByName();
        break;

    case (preg_match('/\/Projeto-Final\/public\/update-user\/(\d+)/', $request, $matches) ? true : false):
        $id = $matches[1];
        $controller->showUpdateForm($id);
        break;

    case '/Projeto-Final/public/update-user':
        $controller->updateUser();
        break;

    

    default:
        http_response_code(404);
        echo "Página não encontrada.";
        break;
}
