-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jul-2019 às 23:50
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto-ultimo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`idCargo`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Cozinheiro'),
(3, 'Garçom');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `cargo_idCargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `login`, `senha`, `cargo_idCargo`) VALUES
(1, 'Edu', 'edu', '1234', 1),
(2, 'Cozinheira', 'cozinha', '123', 2),
(3, 'Garçom', 'garçom', '123', 3),
(7, 'a', 'a', 'a', 2),
(8, 'b', 'b', 'b', 3),
(9, 'caio', 'caioo', 'eueu', 1),
(10, 'jp', 'jp', 'jp', 3),
(11, 'pugue', 'pugue', '1234', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `item_pedido`
--

CREATE TABLE `item_pedido` (
  `id` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  `prato_id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `item_pedido`
--

INSERT INTO `item_pedido` (`id`, `qtd`, `prato_id`, `pedido_id`) VALUES
(1, 1, 8, 2),
(2, 1, 8, 3),
(3, 2, 8, 4),
(4, 4, 9, 4),
(5, 3, 8, 5),
(6, 2, 8, 6),
(7, 3, 9, 6),
(8, 1, 8, 7),
(9, 2, 9, 8),
(10, 1, 8, 9),
(11, 1, 8, 10),
(12, 5, 17, 10),
(13, 5, 8, 11),
(14, 2, 9, 11),
(15, 1, 8, 12),
(16, 5, 10, 12),
(17, 10, 8, 13),
(18, 1, 8, 14),
(19, 55, 9, 14),
(20, 1, 8, 15),
(21, 1, 9, 15),
(22, 1, 10, 15),
(23, 1, 17, 15),
(24, 1, 8, 16),
(25, 1, 8, 17),
(26, 1, 9, 17),
(27, 1, 10, 17),
(28, 1, 17, 17),
(29, 1, 19, 17),
(30, 2, 17, 18),
(31, 4, 8, 19),
(32, 1, 19, 19),
(33, 4, 8, 20),
(34, 5, 19, 20),
(35, 1, 8, 21),
(36, 5, 19, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `dataPedido` date NOT NULL DEFAULT current_timestamp(),
  `funcionarios_id` int(11) NOT NULL,
  `status_idStatus` int(11) NOT NULL DEFAULT 1,
  `idCozinheiro` int(11) DEFAULT NULL,
  `dataFinalizado` date DEFAULT NULL,
  `dataEntrega` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `dataPedido`, `funcionarios_id`, `status_idStatus`, `idCozinheiro`, `dataFinalizado`, `dataEntrega`) VALUES
(2, '2019-06-01', 2, 3, 1, NULL, NULL),
(3, '2019-07-02', 1, 3, NULL, NULL, NULL),
(4, '2019-07-02', 1, 3, NULL, NULL, NULL),
(5, '2019-07-04', 1, 4, 1, '2019-07-04', NULL),
(6, '2019-07-04', 1, 4, 1, '2019-07-04', NULL),
(7, '2019-07-04', 1, 4, 1, NULL, NULL),
(8, '2019-07-04', 1, 4, 1, '2019-07-04', NULL),
(9, '2019-07-04', 1, 3, 1, '2019-07-04', NULL),
(10, '2019-07-04', 1, 3, 1, '2019-07-04', NULL),
(11, '2019-07-04', 3, 3, 3, '2019-07-04', NULL),
(12, '2019-07-04', 3, 4, 1, NULL, NULL),
(13, '2019-07-04', 1, 3, 1, NULL, NULL),
(14, '2019-07-04', 1, 3, 1, NULL, NULL),
(15, '2019-07-04', 1, 3, 1, NULL, NULL),
(16, '2019-07-04', 1, 3, 11, NULL, NULL),
(17, '2019-07-04', 8, 4, 7, NULL, NULL),
(18, '2019-07-04', 11, 2, 11, NULL, NULL),
(19, '2019-07-04', 10, 3, 11, NULL, NULL),
(20, '2019-07-04', 10, 1, NULL, NULL, NULL),
(21, '2019-07-04', 10, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pratos`
--

CREATE TABLE `pratos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `ingredientes` varchar(255) NOT NULL,
  `preco` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pratos`
--

INSERT INTO `pratos` (`id`, `nome`, `ingredientes`, `preco`) VALUES
(8, 'x-Salada', 'Pão, hamburguer, queijo, alface, tomate', 11.5),
(9, 'x-Burguer', 'Pão, hamburguer, queijo', 9.75),
(10, 'x-Egg', 'Pão, hamburguer, ovo, queijo, alface, tomate', 8.4),
(17, 'Lasanha', 'Massa, presunto, queijo', 20.99),
(19, 'c', 'c', 1.1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `idStatus` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`idStatus`, `descricao`) VALUES
(1, 'Recebido'),
(2, 'Em Preparo'),
(3, 'Finalizado'),
(4, 'Entregue');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_funcionarios_cargo1` (`cargo_idCargo`);

--
-- Índices para tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_pedido_ibfk_1` (`prato_id`),
  ADD KEY `item_pedido_ibfk_2` (`pedido_id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_ibfk_1` (`funcionarios_id`),
  ADD KEY `fk_pedidos_status1` (`status_idStatus`);

--
-- Índices para tabela `pratos`
--
ALTER TABLE `pratos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idStatus`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `pratos`
--
ALTER TABLE `pratos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `fk_funcionarios_cargo1` FOREIGN KEY (`cargo_idCargo`) REFERENCES `cargo` (`idCargo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `item_pedido`
--
ALTER TABLE `item_pedido`
  ADD CONSTRAINT `item_pedido_ibfk_1` FOREIGN KEY (`prato_id`) REFERENCES `pratos` (`id`),
  ADD CONSTRAINT `item_pedido_ibfk_2` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`);

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_status1` FOREIGN KEY (`status_idStatus`) REFERENCES `status` (`idStatus`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`funcionarios_id`) REFERENCES `funcionarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
