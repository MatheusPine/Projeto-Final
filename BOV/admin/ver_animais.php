<?php
require_once 'conexao.php';


// Consulta para buscar todos os registros da tabela "gado"
$sql = "SELECT * FROM gado ORDER BY id DESC";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Animais Cadastrados - BOV+</title>
  <link rel="stylesheet" href="admin.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
    }

    h2 {
      color: #4a7c2d;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #4a7c2d;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    .sem-registros {
      color: #888;
    }
  </style>
</head>
<body>
  <h2>Lista de Animais Cadastrados</h2>

  <?php if ($resultado && $resultado->num_rows > 0): ?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Espécie</th>
          <th>Raça</th>
          <th>Data de Nascimento</th>
          <th>Peso (kg)</th>
          <th>Identificação</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
  <?php while ($row = $resultado->fetch_assoc()): ?>
    <tr>
      <td><?= htmlspecialchars($row['id']) ?></td>
      <td><?= htmlspecialchars($row['nome']) ?></td>
      <td><?= htmlspecialchars($row['especie']) ?></td>
      <td><?= htmlspecialchars($row['raca']) ?></td>
      <td><?= htmlspecialchars($row['data_nascimento']) ?></td>
      <td><?= htmlspecialchars($row['peso']) ?></td>
      <td><?= htmlspecialchars($row['identificacao']) ?></td>
      <td>
        <a href="editar_animal.php?id=<?= $row['id'] ?>">
          <button style="padding:5px 10px;">Editar</button>
        </a>
        <form action="excluir_animal.php" method="POST" style="display:inline;" onsubmit="return confirm('Deseja realmente excluir?');">
          <input type="hidden" name="id" value="<?= $row['id'] ?>">
          <button type="submit" style="padding:5px 10px; background-color:red; color:white;">Excluir</button>
        </form>
      </td>
    </tr>
  <?php endwhile; ?>
</tbody>

    </table>
  <?php else: ?>
    <p class="sem-registros">Nenhum animal cadastrado.</p>
  <?php endif; ?>

  <?php $conn->close(); ?>
  <a href="index.html">
  <button style="margin-top: 30px; padding: 10px 20px;">Voltar para o Cadastro</button>
</a>

</body>
</html>
