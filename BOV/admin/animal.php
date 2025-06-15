<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'conexao.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $especie = $_POST['especie'] ?? '';
    $raca = $_POST['raca'] ?? '';
    $data_nascimento = $_POST['data_nascimento'] ?? '';
    $peso = $_POST['peso'] ?? '';
    $identificacao = $_POST['identificacao'] ?? '';

    // Validação simples
    if ($nome && $especie && $raca && $data_nascimento && $peso && $identificacao) {
        $sql = "INSERT INTO gado (nome, especie, raca, data_nascimento, peso, identificacao)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            die("Erro ao preparar a query: " . $conn->error);
        }

        $stmt->bind_param("ssssss", $nome, $especie, $raca, $data_nascimento, $peso, $identificacao);

        if ($stmt->execute()) {
            echo "<script>alert('Gado cadastrado com sucesso!'); window.location.href='index.html';</script>";
        } else {
            echo "Erro ao salvar: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "<script>alert('Por favor, preencha todos os campos.'); history.back();</script>";
    }

    $conn->close();
} else {
    echo "Requisição inválida.";
}
if ($stmt->execute()) {
    echo "<h3 style='color: green;'>Gado cadastrado com sucesso!</h3>";
    echo "<a href='../index.html'><button style='padding: 10px 20px; margin-top: 20px;'>Voltar para o Cadastro</button></a>";
} else {
    echo "<h3 style='color: red;'>Erro ao cadastrar: " . $stmt->error . "</h3>";
    echo "<a href='../index.html'><button style='padding: 10px 20px; margin-top: 20px;'>Tentar Novamente</button></a>";
}
?>
