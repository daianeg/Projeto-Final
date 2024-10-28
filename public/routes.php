<?php

// Exemplo de sistema básico de roteamento

$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Função para carregar o controlador e a ação
function route($controller, $action, $params = []) {
    require_once "controller/{$controller}.php";
    $controllerInstance = new $controller();
    call_user_func_array([$controllerInstance, $action], $params);
}

// Rotas definidas pelo URI
switch ($request) {
    
    
    case '/login':
        route('LoginController', 'showLoginForm');
        break;
    case '/login/submit':
        if ($method == 'POST') {
            route('LoginController', 'login');
        }
        break;
    case '/logout':
        route('LoginController', 'logout');
        break;

    // Rotas da interface do "paciente"
    case '/paciente/perfil':
        route('PacienteController', 'mostrarPerfil');
        break;
    case '/paciente/agendar':
        if ($method == 'POST') {
            route('PacienteController', 'agendarConsulta');
        }
        break;
    
    // Rotas da interface do "medico"
    case '/medico/perfil':
        route('MedicoController', 'mostrarPerfil');
        break;
    case '/medico/consultas':
        route('MedicoController', 'listarConsultas');
        break;

    // Rotas da interface da "secretaria"
    case '/secretaria/agenda':
        route('SecretariaController', 'mostrarAgenda');
        break;
    case '/secretaria/agendar':
        if ($method == 'POST') {
            route('SecretariaController', 'agendarConsulta');
        }
        break;

    // Página inicial (ou rota não encontrada)
    case '/':
        route('HomeController', 'index');
        break;
    
    default:
        http_response_code(404);
        echo "404 - Página não encontrada";
        break;
}
?>
