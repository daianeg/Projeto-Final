<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - SP Medical Group</title>
    <link rel="stylesheet" href="../views/c1.css">
</head>
<body>
    <div class="container">
        <div class="left">
            <img src="imagens/SP Medical Group.png" alt="Logo SP Medical Group" class="logo">
        </div>
        <div class="right">
            <h1>Bem-Vindo</h1>
            <p>Faça o cadastro para continuar</p>
            <form method="post" action="/Projeto-Final/public/save-users">
                <div class="input-group">
                    <img src="imagens/image6.png" alt="Ícone de usuário" class="icon user-icon">
                    <input type="text" name="nome" placeholder="Nome completo" required>
                </div>
                <div class="input-group">
                    <img src="imagens/image6.png" alt="Ícone de email" class="icon user-icon">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <img src="imagens/image7.png" alt="Ícone de senha" class="icon key-icon">
                    <input type="password" name="senha" placeholder="Senha" required>
                </div>
                <div class="input-group">
                    <img src="imagens/pin-7697709_1280.webp" alt="Ícone de endereço" class="icon user-icon">
                    <input type="text" name="endereco" placeholder="Endereço" required>
                </div>
                <div class="input-group">
                    <img src="imagens/5782919.png" alt="Ícone de CPF" class="icon user-icon">
                    <input type="text" name="cpf" placeholder="CPF" required>
                </div>
                <button type="submit" class="botao">Continuar</button>
            </form>
        </div>
    </div>
</body>
</html>
