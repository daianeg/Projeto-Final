<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - SP Medical Group</title>
  <link rel="stylesheet" href="../css/Design Login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> 
  <link rel="shortcut icon" href="../imagens/sp_sem_fundo_joao.png" type="image/x-icon" />
</head>

<body>
  <section class="forms-section">
    <div class="forms">
      <div class="form-wrapper is-active">
        <form action="../controller/RegisterController.php" method="POST" class="form form-signup">
          <fieldset>
            <div class="input-block">
              <label for="signup-nome">Nome</label>
              <input id="signup-nome" name="nome" type="text" required>
            </div>
            <div class="input-block">
              <label for="signup-email">E-mail</label>
              <input id="signup-email" name="email" type="email" required>
            </div>
            <div class="input-block">
              <label for="signup-cpf">CPF</label>
              <input id="signup-cpf" name="cpf" type="text" required>
            </div>
            <div class="input-block">
              <label for="signup-nascimento">Data de Nascimento</label>
              <input id="signup-nascimento" name="data_nascimento" type="date" required>
            </div>
            <div class="input-block">
              <label for="signup-endereco">Endereço</label>
              <input id="signup-endereco" name="endereco" type="text" required>
            </div>
            <div class="input-block">
              <label for="signup-telefone">Telefone</label>
              <input id="signup-telefone" name="telefone" type="text" required>
            </div>
            <div class="input-block">
              <label for="signup-password">Senha</label>
              <input id="signup-password" name="password" type="password" required>
            </div>
            <div class="input-block">
              <label for="signup-password-confirm">Confirmar senha</label>
              <input id="signup-password-confirm" name="confirm_password" type="password" required>
            </div>
          </fieldset>
          <button type="submit" class="btn-signup">Cadastrar</button>
          <p>Já tem uma conta? <a href="../views/login_view.php">Faça login aqui</a></p>
        </form>
      </div>
    </div>
  </section>
  <div class="p-5 bg-custom text-white text-center">
    <p>Sp <span>Medical</span> Group</p>
  </div>
</body>
</html>
