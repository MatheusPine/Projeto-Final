-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/06/2025 às 15:49
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bov`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `gado`
--

CREATE TABLE `gado` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `especie` varchar(100) NOT NULL,
  `raca` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `peso` varchar(50) NOT NULL,
  `identificacao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `gado`
--

INSERT INTO `gado` (`id`, `nome`, `especie`, `raca`, `data_nascimento`, `peso`, `identificacao`) VALUES
(1, 'Vaca', 'Bovino', 'Angus', '2005-02-14', '550', '001'),
(2, 'Vaca', 'Bovino', 'Angus', '2019-07-25', '526', '002'),
(4, 'Vaca', 'Bovino', 'Jersey', '2018-05-14', '400', '003'),
(5, 'Vaca', 'Bovino', 'Angus', '2021-06-25', '480', '005');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vacinas`
--

CREATE TABLE `vacinas` (
  `id` int(11) NOT NULL,
  `id_gado` int(11) NOT NULL,
  `nome_vacina` varchar(100) NOT NULL,
  `data_aplicacao` date NOT NULL,
  `data_validade` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `gado`
--
ALTER TABLE `gado`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `vacinas`
--
ALTER TABLE `vacinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gado` (`id_gado`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `gado`
--
ALTER TABLE `gado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `vacinas`
--
ALTER TABLE `vacinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `vacinas`
--
ALTER TABLE `vacinas`
  ADD CONSTRAINT `vacinas_ibfk_1` FOREIGN KEY (`id_gado`) REFERENCES `gado` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
