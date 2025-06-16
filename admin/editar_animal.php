<?php
require_once 'conexao.php';

if (!isset($_GET['id'])) {
  die("ID não fornecido.");
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM gado WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$animal = $resultado->fetch_assoc();

if (!$animal) {
  die("Animal não encontrado.");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Animal</title>
  <link rel="stylesheet" href="admin.css">
</head>
<body>
  <h2>Editar Animal</h2>
  <form action="atualizar_animal.php" method="POST">
    <input type="hidden" name="id" value="<?= $animal['id'] ?>">
    <input type="text" name="nome" value="<?= $animal['nome'] ?>" required>
    <input type="text" name="especie" value="<?= $animal['especie'] ?>" required>
    <input type="text" name="raca" value="<?= $animal['raca'] ?>" required>
    <input type="date" name="data_nascimento" value="<?= $animal['data_nascimento'] ?>" required>
    <input type="text" name="peso" value="<?= $animal['peso'] ?>" required>
    <input type="text" name="identificacao" value="<?= $animal['identificacao'] ?>" required>
    <button type="submit">Atualizar</button>
  </form>
  <br>
  <a href="ver_animais.php"><button>Cancelar</button></a>
</body>
</html>
