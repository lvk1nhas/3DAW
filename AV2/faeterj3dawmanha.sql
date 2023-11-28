-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 28/11/2023 às 16:00
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
-- Banco de dados: `faeterj3dawmanha`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Candidato`
--

CREATE TABLE `Candidato` (
  `nome` varchar(50) NOT NULL,
  `cpf` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `Candidato`
--

INSERT INTO `Candidato` (`nome`, `cpf`, `id`, `email`, `cargo`, `sala`) VALUES
('Pato', 5678, 1001, 'pato@gmail.com', 'Jogador', 15),
('Ronaldo', 1236, 5670, 'ronaldo@gmail.com', 'Jogador', 13),
('Lucas', 1234, 5678, 'lucas@gmail.com', 'Jogador', 13),
('Maria', 1235, 5679, 'maria@gmail.com', 'Jogadora', 13),
('Paticia', 3123281, 10013, 'patricia@gmail.com', 'Jogadora', 15),
('Vitória', 12345, 123456, 'vitoria@gmail.com', 'Modelo', 7),
('Zico', 123456, 1234568, 'zico@gmail.com', 'Jogador', 17),
('Gabigol', 1232441, 234567890, 'gabigol@gmail.com', 'Artilheiro', 13);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Fiscal`
--

CREATE TABLE `Fiscal` (
  `nome` varchar(50) NOT NULL,
  `cpf` int(11) NOT NULL,
  `sala` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `Fiscal`
--

INSERT INTO `Fiscal` (`nome`, `cpf`, `sala`) VALUES
('pato', 123, 20),
('Dimba', 192, 13),
('Caio', 321421, 13);

-- --------------------------------------------------------

--
-- Estrutura para tabela `Produtos`
--

CREATE TABLE `Produtos` (
  `id` int(11) NOT NULL,
  `upc` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `Candidato`
--
ALTER TABLE `Candidato`
  ADD PRIMARY KEY (`id`,`cpf`);

--
-- Índices de tabela `Fiscal`
--
ALTER TABLE `Fiscal`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `Produtos`
--
ALTER TABLE `Produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Fiscal`
--
ALTER TABLE `Fiscal`
  MODIFY `cpf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3212143;

--
-- AUTO_INCREMENT de tabela `Produtos`
--
ALTER TABLE `Produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
