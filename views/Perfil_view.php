<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário</title>
</head>
<body>
    <h1>Perfil do Usuário</h1>

    <?php if ($user): ?>
        <p><strong>Nome:</strong> <?php echo htmlspecialchars($user['nome']); ?></p>
        <p><strong>E-mail:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>CPF:</strong> <?php echo htmlspecialchars($user['cpf']); ?></p>
        <p><strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($user['data_nascimento']); ?></p>
        <p><strong>Endereço:</strong> <?php echo htmlspecialchars($user['endereco']); ?></p>
        <p><strong>Telefone:</strong> <?php echo htmlspecialchars($user['telefone']); ?></p>

    <?php else:?>
        <p>Usuário não encontrado.</p>

        

    <?php endif; ?>

    <a href="/Projeto-Final/public/Home">Voltar para home</a>
</body>
</html>
