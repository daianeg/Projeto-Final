<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas - SP Medical Group</title>
    <link rel="stylesheet" href="../views/usuarios.css">
</head>
<body>
    <header class="header">
        <h1>Consultas Agendadas</h1>
    </header>

    <main class="container">
        <table class="consulta-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>CPF</th>
                    <th>Endereço</th>
                    <th>Ações</th>
                </tr>
            </thead>
       
                <tbody>
    <?php if (isset($users) && is_array($users)): ?>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['nome']); ?></td>
                <td><?= htmlspecialchars($user['email']); ?></td>
                <td><?= htmlspecialchars($user['cpf']); ?></td>
                <td><?= htmlspecialchars($user['endereco']); ?></td>
                <td>
                    <form action="/Projeto-Final/public/update-user/<?= $user['id']; ?>" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <button class="btn editar">Editar</button>
                    </form>
                    <a href="/Projeto-Final/public/delete-user/<?= $user['id']; ?>" class="btn cancelar">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7">Nenhum usuário encontrado.</td>
        </tr>
    <?php endif; ?>
</tbody>

        </table>
    </main>
</body>
</html>
