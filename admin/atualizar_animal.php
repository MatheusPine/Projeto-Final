<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id = intval($_POST['id']);
  $nome = $_POST['nome'];
  $especie = $_POST['especie'];
  $raca = $_POST['raca'];
  $data_nascimento = $_POST['data_nascimento'];
  $peso = $_POST['peso'];
  $identificacao = $_POST['identificacao'];

  $sql = "UPDATE gado SET nome=?, especie=?, raca=?, data_nascimento=?, peso=?, identificacao=? WHERE id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssssi", $nome, $especie, $raca, $data_nascimento, $peso, $identificacao, $id);

  if ($stmt->execute()) {
    header("Location: ver_animais.php");
    exit;
  } else {
    echo "Erro ao atualizar: " . $stmt->error;
  }

  $stmt->close();
  $conn->close();
} else {
  echo "Requisição inválida.";
}
?>
