CREATE DATABASE IF NOT EXISTS bovdb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE bovdb;

CREATE TABLE IF NOT EXISTS gado (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    especie VARCHAR(50) NOT NULL,
    raca VARCHAR(50) NOT NULL,
    data_nascimento DATE NOT NULL,
    peso DECIMAL(10,2) NOT NULL,
    identificacao VARCHAR(50) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS vacinas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_gado INT NOT NULL,
    nome_vacina VARCHAR(100) NOT NULL,
    data_aplicacao DATE NOT NULL,
    data_validade DATE NOT NULL,
    lote VARCHAR(50),
    veterinario VARCHAR(100),
    observacoes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_gado) REFERENCES gado(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(255) NOT NULL,
    tipo ENUM('admin','veterinario','fazendeiro') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Dados iniciais
INSERT IGNORE INTO usuarios (email, senha, tipo) VALUES
('admin@agro.com', SHA2('Admin123#', 256), 'admin'),
('vet@agro.com', SHA2('Vet123#', 256), 'veterinario');