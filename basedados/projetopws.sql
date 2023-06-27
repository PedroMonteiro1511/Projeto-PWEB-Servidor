-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Jun-2023 às 21:25
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetopws`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `desigsocial` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` int(9) NOT NULL,
  `nif` int(9) NOT NULL,
  `morada` varchar(75) NOT NULL,
  `codpostal` varchar(9) NOT NULL,
  `localidade` varchar(25) NOT NULL,
  `capsocial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `desigsocial`, `email`, `telefone`, `nif`, `morada`, `codpostal`, `localidade`, `capsocial`) VALUES
(1, 'MundoDigital', 'mundodigital@mundodigital.pt', 910000343, 15444789, 'Torres Vedras, nº16', '2103-500', 'Torres Vedras', 10000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `folhas`
--

CREATE TABLE `folhas` (
  `id` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `valorTotal` float NOT NULL,
  `ivaTotal` float NOT NULL,
  `estado` enum('Em Lançamento','Emitida','Paga') NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `funcionario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `folhas`
--

INSERT INTO `folhas` (`id`, `data`, `valorTotal`, `ivaTotal`, `estado`, `cliente_id`, `funcionario_id`) VALUES
(33, '2023-06-26 20:11:19', 85, 104.55, 'Paga', 10, 11),
(34, '2023-06-26 20:08:12', 60, 73.8, 'Emitida', 13, 11),
(35, '2023-06-26 20:09:04', 110, 135.3, 'Emitida', 14, 15),
(36, '2023-06-26 20:14:27', 85, 104.55, 'Paga', 13, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `iva`
--

CREATE TABLE `iva` (
  `id` int(11) NOT NULL,
  `percentagem` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `emvigor` enum('sim','nao') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `iva`
--

INSERT INTO `iva` (`id`, `percentagem`, `descricao`, `emvigor`) VALUES
(10, 23, 'Iva Normal', 'sim'),
(11, 13, 'Iva Intermédio', 'sim'),
(12, 6, 'Iva Reduzido', 'sim'),
(13, 4, 'Iva Especial', 'nao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `linhas`
--

CREATE TABLE `linhas` (
  `id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` float NOT NULL,
  `valorIva` float NOT NULL,
  `folha_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `linhas`
--

INSERT INTO `linhas` (`id`, `quantidade`, `valor`, `valorIva`, `folha_id`, `service_id`) VALUES
(50, 1, 20, 24.6, 33, 29),
(51, 1, 15, 18.45, 33, 30),
(52, 2, 50, 61.5, 33, 33),
(53, 1, 25, 30.75, 34, 33),
(54, 1, 15, 18.45, 34, 31),
(55, 1, 20, 24.6, 34, 29),
(56, 1, 20, 24.6, 35, 29),
(57, 1, 15, 18.45, 35, 30),
(58, 3, 75, 92.25, 35, 33),
(59, 1, 15, 18.45, 36, 30),
(60, 1, 20, 24.6, 36, 29),
(61, 2, 50, 61.5, 36, 33);

-- --------------------------------------------------------

--
-- Estrutura da tabela `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `referencia` varchar(10) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `preco` decimal(10,0) NOT NULL,
  `iva_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `services`
--

INSERT INTO `services` (`id`, `referencia`, `descricao`, `preco`, `iva_id`) VALUES
(29, '1234567890', 'Software', '20', 10),
(30, '3490777777', 'Formatação', '15', 10),
(31, '1234567833', 'Limpeza de Computador', '15', 10),
(33, '1237777890', 'Instalação de Hardware', '25', 10),
(34, '1234565590', 'Montagem', '40', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` int(9) NOT NULL,
  `nif` int(9) NOT NULL,
  `morada` varchar(75) NOT NULL,
  `codpostal` varchar(9) NOT NULL,
  `localidade` varchar(25) NOT NULL,
  `role` enum('funcionario','cliente','administrador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `telefone`, `nif`, `morada`, `codpostal`, `localidade`, `role`) VALUES
(10, 'userteste', 'e4c18010c8fd8346c33be4327d264702', 'userteste@email.com', 910000000, 999999999, 'estrada de torres, nº10', '2000-100', 'Torres', 'cliente'),
(11, 'funcionario123', '551b50cd77c369891fa02b5dc73c03a7', 'funcionario@email.com', 920000000, 900900000, 'Rua dos casais, nº21', '2500-100', 'Torres Vedras', 'funcionario'),
(12, 'admin123', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com', 915005000, 542444443, 'Rua de torres, nº40', '2000-104', 'Torres', 'administrador'),
(13, 'userteste3', '0b56d5bdbfa73baec4a2671acb4dba59', 'userteste3@email.com', 910000999, 244444443, 'Rua das flores, nº32', '2300-100', 'Lisboa', 'cliente'),
(14, 'userteste2', '90bf3e05a5e469d83612bdb4913b6f96', 'userteste2@gmail.com', 910077777, 344343434, 'Rua do mar, nº22', '2000-100', 'Lisboa', 'cliente'),
(15, 'funcionario2', '279b850eb472b50751f7fe94195cabe8', 'funcionario2@gmail.com', 969753307, 920000112, 'Rua nova, nº40', '2300-300', 'Lisboa', 'funcionario');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `folhas`
--
ALTER TABLE `folhas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFuncionario` (`funcionario_id`),
  ADD KEY `idCliente` (`cliente_id`) USING BTREE;

--
-- Índices para tabela `iva`
--
ALTER TABLE `iva`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `linhas`
--
ALTER TABLE `linhas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idFolha` (`folha_id`),
  ADD KEY `idServico` (`service_id`);

--
-- Índices para tabela `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referencia` (`referencia`),
  ADD KEY `idIva` (`iva_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `folhas`
--
ALTER TABLE `folhas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `iva`
--
ALTER TABLE `iva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `linhas`
--
ALTER TABLE `linhas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `folhas`
--
ALTER TABLE `folhas`
  ADD CONSTRAINT `folhas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `folhas_ibfk_2` FOREIGN KEY (`funcionario_id`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `linhas`
--
ALTER TABLE `linhas`
  ADD CONSTRAINT `linhas_ibfk_1` FOREIGN KEY (`folha_id`) REFERENCES `folhas` (`id`),
  ADD CONSTRAINT `linhas_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Limitadores para a tabela `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`iva_id`) REFERENCES `iva` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
