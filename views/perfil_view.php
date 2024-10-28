<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - SP Medical Group</title>
  <link rel="stylesheet" href="../css/Design Login.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> 
  <link rel="shortcut icon" href="../imagens/sp_sem_fundo_joao.png" type="image/x-icon" />
</head>

<body>
  <section class="forms-section">
    <div class="forms">
      <div class="form-wrapper is-active">
        <form action="/login/submit" method="POST" class="form form-login">
          <fieldset>
            <div class="input-block">
              <label for="login-email">E-mail</label>
              <input id="login-email" name="email" type="email" required>
            </div>
            <div class="input-block">
              <label for="login-password">Senha</label>
              <input id="login-password" name="password" type="password" required>
            </div>
          </fieldset>
          <button type="submit" class="btn-login">Login</button>
          <p>Não tem uma conta? <a href="/views/register_view.php">Cadastre-se aqui</a></p>
        </form>
      </div>
    </div>
  </section>
  <div class="p-5 bg-custom text-white text-center">
    <p>Sp <span>Medical</span> Group</p>
  </div>
</body>
</html>
