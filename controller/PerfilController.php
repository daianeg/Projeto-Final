<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login_view.php");
    exit();
}

// Inclui o modelo
include('../model/conexão.php');
include('../model/UsuarioModel.php');

// Obtenha o ID do usuário da sessão
$user_id = $_SESSION['user_id'];

// Crie uma instância do modelo
$userModel = new UsuarioModel($conn);

// Obtenha os dados do usuário
$user = $userModel->getUserData($conn, $user_id);

// Inclua a visualização
include('../view/perfil_view.php');
?>
