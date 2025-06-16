<?php
require_once 'conexao.php';

$sql = "SELECT v.*, g.nome AS nome_animal FROM vacinas v 
        JOIN gado g ON v.id_gado = g.id";

$result = $conn->query($sql);
$eventos = [];

while ($row = $result->fetch_assoc()) {
  $eventos[] = [
    'title' => "{$row['nome_animal']} - {$row['nome_vacina']}",
    'start' => $row['data_validade'],
    'color' => '#4a7c2d'
  ];
}

echo json_encode($eventos);
