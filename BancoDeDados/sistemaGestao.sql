-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 11/05/2025 às 20:18
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemaGestao`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ordens`
--

CREATE TABLE `ordens` (
  `id` int(11) NOT NULL,
  `cliente` varchar(100) DEFAULT NULL,
  `servico` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pendente',
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `valor_total` decimal(10,2) DEFAULT NULL,
  `valor_entrada` decimal(10,2) DEFAULT NULL,
  `valor_receber` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ordens`
--

INSERT INTO `ordens` (`id`, `cliente`, `servico`, `descricao`, `status`, `data_criacao`, `valor_total`, `valor_entrada`, `valor_receber`) VALUES
(4, 'a', 's', 's', 'concluído', '2025-05-10 23:39:29', NULL, NULL, NULL),
(5, 'Ester Mendonca', 'Banner', '120x80cm', 'concluído', '2025-05-10 23:52:09', NULL, NULL, NULL),
(6, 'Carlos', 'Carao de Visita', '1000', 'em produção', '2025-05-10 23:55:27', NULL, NULL, NULL),
(7, 'Carlos', 'Carao de Visita 4x4', '1000', 'em produção', '2025-05-10 23:55:32', NULL, NULL, NULL),
(8, 'Ester Mendonca', 'Canecas', '5', 'em produção', '2025-05-10 23:55:47', NULL, NULL, NULL),
(9, 'Ester Mendonca', 'banner', '120x80', 'concluído', '2025-05-10 23:56:02', NULL, NULL, NULL),
(10, 'Crysstal', 'banner', '80x40cm', 'concluído', '2025-05-10 23:56:17', NULL, NULL, NULL),
(11, 'Ester Mendonca', 'Banner', '120x90', 'pendente', '2025-05-11 05:11:40', 180.00, 90.00, 90.00),
(12, NULL, NULL, NULL, 'pendente', '2025-05-11 05:16:14', NULL, NULL, NULL),
(13, 'Dona Fernanda', 'Banner', '120x60', 'concluído', '2025-05-11 05:27:56', 140.00, 100.00, 40.00),
(14, 'Eduardo ', 'Camisa ', 'Camisa da Lady Gaga', 'pendente', '2025-05-11 05:41:28', 55.00, 55.00, 0.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `ordens`
--
ALTER TABLE `ordens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ordens`
--
ALTER TABLE `ordens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
