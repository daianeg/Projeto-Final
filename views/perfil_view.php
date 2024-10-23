<?php
session_start();

// Verifique se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login_view.php");
    exit();
}

// Conecte-se ao banco de dados
include('../model/conexão.php');

// Pegue o ID do usuário da sessão
$user_id = $_SESSION['user_id'];

// Consulte o banco de dados para obter as informações do usuário
$query = "SELECT  nome, email, cpf, data_nascimento, endereco, telefone FROM pacientes WHERE id = ?";
$stmt = $conn->prepare($query);

if ($stmt === false) {
    die('Erro na preparação da consulta SQL: ' . $conn->error);
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil - SP Medical Group</title>
  <link rel="stylesheet" href="../css/Design Login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="shortcut icon" href="../imagens/sp_sem_fundo_joao.png" type="image/x-icon" />
</head>
<body>
  <section class="p-5 text-center bg-light">
    <div class="container">
      <h1 class="display-4">Perfil do Usuário</h1>
      <p class="lead">Aqui estão suas informações:</p>
      <div class="card mx-auto" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Informações de Perfil</h5>
          <p class="card-text"><strong>Nome:</strong> <?php echo isset($user['nome']) ? htmlspecialchars($user['nome']) : 'N/A'; ?></p>
          <p class="card-text"><strong>E-mail:</strong> <?php echo isset($user['email']) ? htmlspecialchars($user['email']) : 'N/A'; ?></p>
          <p class="card-text"><strong>CPF:</strong> <?php echo isset($user['cpf']) ? htmlspecialchars($user['cpf']) : 'N/A'; ?></p>
          <p class="card-text"><strong>Data de Nascimento:</strong> <?php echo isset($user['data_nascimento']) ? htmlspecialchars($user['data_nascimento']) : 'N/A'; ?></p>
          <p class="card-text"><strong>Endereço:</strong> <?php echo isset($user['endereco']) ? htmlspecialchars($user['endereco']) : 'N/A'; ?></p>
          <p class="card-text"><strong>Telefone:</strong> <?php echo isset($user['telefone']) ? htmlspecialchars($user['telefone']) : 'N/A'; ?></p>


          
          <!-- Se houver mais campos no cadastro, eles podem ser adicionados aqui -->
          <a href="logout.php" class="btn btn-danger">Sair</a>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
