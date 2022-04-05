-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Abr-2022 às 16:12
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `manyminds`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id` int(11) NOT NULL,
  `nomeColaborador` varchar(255) NOT NULL,
  `fornecedor` tinyint(1) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `colaboradores`
--

INSERT INTO `colaboradores` (`id`, `nomeColaborador`, `fornecedor`, `ativo`, `email`, `cidade`, `estado`, `telefone`) VALUES
(1, 'Coca-cola', 1, 0, 'teste', 'teste alterado', 'São paulo', '2452547755'),
(2, 'Açougue', 1, 0, 'sdfadas', 'dfss', 'sdads', '145786'),
(3, 'João', 1, 1, 'renansantoslima1998@outlook.com', 'TAUBATÉ', 'São Paulo', '12997102323'),
(4, 'Rodri', 0, 1, 'awdadwaw', 'awdwa', 'awd', '442545');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
