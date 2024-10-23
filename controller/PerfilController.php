<?php
include('../model/conexão.php');
include('../model/UsuarioModel.php');

session_start(); // Certifique-se de que a sessão está ativa para acessar o ID do usuário
if (isset($_SESSION['user_id'])) {
    $usuarioModel = new UsuarioModel($conn);
    $user = $usuarioModel->buscarUsuarioPorId($_SESSION['user_id']);

    if ($user) {
        // Aqui, você já tem os dados do usuário no array $user e pode exibir no perfil
    } else {
        echo "Usuário não encontrado!";
    }
} else {
    echo "Usuário não logado!";
}
?>
