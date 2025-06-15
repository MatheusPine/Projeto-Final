<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id_gado = intval($_POST['id_gado']);
  $nome_vacina = $_POST['nome_vacina'];
  $data_aplicacao = $_POST['data_aplicacao'];
  $data_validade = $_POST['data_validade'];

  $sql = "INSERT INTO vacinas (id_gado, nome_vacina, data_aplicacao, data_validade)
          VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("isss", $id_gado, $nome_vacina, $data_aplicacao, $data_validade);

  if ($stmt->execute()) {
    echo "<script>alert('Vacina cadastrada com sucesso!'); window.location.href='../index.html';</script>";
  } else {
    echo "Erro: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
} else {
  echo "Requisição inválida.";
}
?>
