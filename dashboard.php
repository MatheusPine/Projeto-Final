<?php
session_start();

// Verificar se o usuário está logado
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - BOV+</title>
</head>
<body>
    <h1>Bem-vindo, <?php echo htmlspecialchars($user['email']); ?></h1>
    <p>Você está logado como <?php echo htmlspecialchars($user['role']); ?></p>
    
    <a href="logout.php">Sair</a>
</body>
</html>