<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Informações - SP Medical Group</title>
    <link rel="stylesheet" href="../views/usuarios.css">
</head>
<body>
    <header class="header">
        <h1>Editar Informações</h1>
    </header>

    <main class="container">
    <form method="POST" action="/Projeto-Final/public/update-user">
    

            <div class="input-group">
                <img src="imagens/image 6.png" alt="Ícone de usuário" class="icon user-icon">
                <input type="text" name="nome" value="<?= $user['nome']; ?>" placeholder="Nome completo" required>
            </div>

            <div class="input-group">
                <img src="imagens/image 6.png" alt="Ícone de usuário" class="icon user-icon">
                <input type="email" name="email" value="<?= $user['email']; ?>" placeholder="Email" required>
            </div>

            <div class="input-group">
                <img src="imagens/image 7.png" alt="Ícone de chave" class="icon key-icon">
                <input type="password" name="senha" placeholder="Nova senha" required>
            </div>

            <div class="input-group">
                <img src="imagens/image 7.png" alt="Ícone de chave" class="icon key-icon">
                <input type="password" name="confirmar_senha" placeholder="Confirmar nova senha" required>
            </div>

            <div class="input-group">
                <img src="imagens/pin-7697709_1280.webp" alt="Ícone de endereço" class="icon user-icon">
                <input type="text" name="endereco" value="<?= $user['endereco']; ?>" placeholder="Endereço" required>
            </div>

            <div class="input-group">
                <img src="imagens/5782919.png" alt="Ícone de CPF" class="icon user-icon">
                <input type="text" name="cpf" value="<?= $user['cpf']; ?>" placeholder="CPF" required>
            </div>

            <button type="submit" class="botao">Salvar Alterações</button>
        </form>
    </main>
</body>
</html>
