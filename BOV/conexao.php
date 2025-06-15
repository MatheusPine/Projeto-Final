<?php
// Configurações via variáveis de ambiente
$host = getenv('DB_HOST') ?: 'db';
$usuario = getenv('DB_USER') ?: 'root';
$senha = getenv('DB_PASS') ?: 'root';
$banco = getenv('DB_NAME') ?: 'bovdb';
$porta = 3306;

try {
    $conn = new mysqli($host, $usuario, $senha, '', $porta);
    
    if ($conn->connect_error) {
        throw new Exception("Erro de conexão: " . $conn->connect_error);
    }

    // Cria banco se não existir
    if (!$conn->select_db($banco)) {
        $conn->query("CREATE DATABASE IF NOT EXISTS `$banco` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        $conn->select_db($banco);
        
        // Cria tabelas básicas
        $conn->multi_query(file_get_contents('db_init/schema.sql'));
        while ($conn->next_result()) {} // Esvazia resultados múltiplos
    }

    $conn->set_charset("utf8mb4");
    
} catch(Exception $e) {
    error_log("[".date('Y-m-d H:i:s')."] ".$e->getMessage());
    header('HTTP/1.1 503 Service Unavailable');
    die(json_encode(['error' => 'Serviço temporariamente indisponível']));
}

// Função auxiliar para debug (remova em produção)
function debug_db($conn) {
    if ($_SERVER['REMOTE_ADDR'] === '127.0.0.1') {
        echo '<div style="background:#f0f0f0;padding:15px;margin:10px;border-radius:5px;">';
        echo '<h4>Debug de Banco de Dados</h4>';
        echo '<pre>Versão MySQL: '.$conn->server_version.'</pre>';
        echo '<pre>Status: '.$conn->stat().'</pre>';
        echo '</div>';
    }
}
?>