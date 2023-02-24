-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Fev-2023 às 20:28
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crudci_games_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_boletins`
--

CREATE TABLE `tb_boletins` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `texto` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo_aviso` enum('Urgente','Noticias','Atividades','Duvidas') COLLATE utf8_unicode_ci NOT NULL,
  `nivel_permissao` enum('Geral','Funcionarios','Diretoria') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_boletins`
--

INSERT INTO `tb_boletins` (`id`, `titulo`, `texto`, `tipo_aviso`, `nivel_permissao`) VALUES
(2, 'Testando', 'oi', 'Urgente', 'Geral'),
(4, 'Boletim de Avisos', 'Testes', 'Urgente', 'Geral'),
(5, 'tes direto', 'eee', 'Urgente', 'Diretoria'),
(6, '2 test', 'eee', 'Urgente', 'Diretoria'),
(8, 'boletim de Funcionarios 1', 'test', 'Noticias', 'Funcionarios'),
(9, 'boletim de Funcionarios 2', 'Test', 'Urgente', 'Funcionarios');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`id`, `name`, `email`, `password`, `country`) VALUES
(1, 'Jhonatha', 'jhonatha@gmail', '202cb962ac59075b964b07152d234b70', 'Brasil');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_boletins`
--
ALTER TABLE `tb_boletins`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_boletins`
--
ALTER TABLE `tb_boletins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
