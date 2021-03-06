-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Mar-2022 às 03:59
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
-- Banco de dados: `glic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `monitoramento`
--

CREATE TABLE `monitoramento` (
  `id` int(11) NOT NULL,
  `glicemia` float NOT NULL,
  `cafe` varchar(200) NOT NULL,
  `almoco` varchar(200) NOT NULL,
  `lanche` varchar(200) NOT NULL,
  `janta` varchar(200) NOT NULL,
  `exercicio` varchar(300) NOT NULL,
  `agua` int(11) NOT NULL,
  `peso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `monitoramento`
--

INSERT INTO `monitoramento` (`id`, `glicemia`, `cafe`, `almoco`, `lanche`, `janta`, `exercicio`, `agua`, `peso`) VALUES
(2, 2, 'a', 'a', 'a', 'a', 'a', 2, 2),
(18, 2222, 'sua mãe', 'sua tia', 'sua avó', 'sua irmã', 'comer a sua mãe', 22, 22),
(19, 0, '', '', '', '', '', 0, 0),
(20, 0, '', '', '', '', '', 0, 0),
(21, 0, '', '', '', '', '', 0, 0),
(22, 22, 'aa', 'aa', 'aaa', 'aa', 'aa', 22, 22),
(23, 22, 'aa', 'aa', 'aa', 'aa', 'aa', 22, 22),
(24, 22, 'aa', 'aa', 'aa', 'aa', 'aa', 22, 22),
(25, 22, 'aa', 'aaaa', 'aaa', 'aaa', 'aaaa', 22, 22);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `data_nascimento` datetime NOT NULL,
  `senha` int(11) NOT NULL,
  `tipo_diabete` int(11) DEFAULT NULL,
  `ativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `nickname`, `email`, `data_nascimento`, `senha`, `tipo_diabete`, `ativo`) VALUES
(1, 'Administrador', 'admin', 'admin@admin', '0000-00-00 00:00:00', 21232, 2, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `monitoramento`
--
ALTER TABLE `monitoramento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `monitoramento`
--
ALTER TABLE `monitoramento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
