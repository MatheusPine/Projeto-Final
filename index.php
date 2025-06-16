<?php
session_start();

// Credenciais válidas (em um sistema real, isso viria de um banco de dados)
$users = [
    'admin@agro.com' => [
        'password' => 'Admin123#',
        'role' => 'admin'
    ],
    'vet@agro.com' => [
        'password' => 'Vet123#',
        'role' => 'vet'
    ]
];

// Processar formulário de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['senha'] ?? '';
    
    // Verificar credenciais
    if (isset($users[$email]) && $users[$email]['password'] === $password) {
        // Login bem-sucedido
        $_SESSION['user'] = [
            'email' => $email,
            'role' => $users[$email]['role']
        ];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'E-mail ou senha incorretos';
    }
}

// Se já estiver logado, redirecionar
if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - BOV+</title>
  <link rel="stylesheet" href="login.css">
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h1 class="logo">BOV<span>+</span></h1>
      <h2>Acesse sua conta</h2>

      <?php if (isset($error)): ?>
        <div class="error-message"><?php echo htmlspecialchars($error); ?></div>
      <?php endif; ?>

      <form id="loginForm" method="POST" action="index.php">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">

        <label for="senha">Senha</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit">Entrar</button>
        <a href="#" class="forgot-password">Esqueci minha senha</a>
      </form>

      <img src="assets/logo.png" alt="Logo do Site" class="site-logo">

      <div class="test-users">
        <p><strong>Usuários para teste:</strong></p>
        <p><strong>Administrador:</strong> admin@agro.com / Admin123#</p>
        <p><strong>Veterinário:</strong> vet@agro.com / Vet123#</p>
      </div>
    </div>
  </div>

  <footer>
    © 2025 BOV+
  </footer>
  
  <script src="login.js"></script>
</body>
</html>