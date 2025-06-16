<?php
$host = getenv('DB_HOST') ?: 'db';
$dbname = getenv('DB_NAME') ?: 'bovdb';
$user = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD') ?: 'root';

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname", 
        $user, 
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>