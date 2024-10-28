
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de usuários</title>
</head>
<body>
    <h1>Cadastro de Usuário</h1>
    <form action="/Projeto-Final/public/save-users" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">E-mail:</label>
        <input type="text" id="email" name="email" required><br><br>

        <label for="cpf">CPF:</label>
        <input type="number" id="cpf" name="cpf" required><br><br>

        <label for="data_nascimento">Data de nascimento</label>
        <input type="date" id="data_nascimento" name="data_nascimento"><br><br>

        <label for="endereco">Endereço:</label>
        <input type="text"  id="endereco" name="endereco" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="number"  id="telefone" name="telefone" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password"  id="senha" name="senha" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>
