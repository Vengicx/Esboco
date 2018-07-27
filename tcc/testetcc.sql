-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Jul-2018 às 21:04
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testetcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiaprima`
--

CREATE TABLE `materiaprima` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `quantidade` float NOT NULL,
  `precoCompra` float NOT NULL,
  `precoVenda` float NOT NULL,
  `tipoProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materiaprima`
--

INSERT INTO `materiaprima` (`id`, `nome`, `quantidade`, `precoCompra`, `precoVenda`, `tipoProduto`) VALUES
(1, 'ds', 1, 2, 3, 1),
(8, 'ca', 10, 20, 40, 1),
(11, 'sddassd', 5, 10, 40, 1),
(12, 'Coca cola 250 eme eles', 50, 5, 10, 2),
(13, 'Sprite', 50, 5, 10, 1),
(14, 'Sprite', 50, 5, 10, 1),
(15, 'DASLFKDPSMFF´~S', 50, 5, 10, 1),
(16, 'DSSSSSSSSSSSSSSSSS', 50, 5, 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `sabor` varchar(50) NOT NULL,
  `tamanho` varchar(15) NOT NULL,
  `andamento` int(11) NOT NULL,
  `horaPedido` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `cliente`, `sabor`, `tamanho`, `andamento`, `horaPedido`) VALUES
(1, '21', 'Moda da Casa', 'medio', 3, NULL),
(2, '10', 'Frango', 'gigante', 3, NULL),
(3, '1', 'Moda da Casa', 'gigante', 3, NULL),
(4, '10', 'Moda da Casa', 'gigante', 3, NULL),
(5, '21', 'Moda da Casa', 'pequeno', 3, '09:05:25'),
(6, '20', 'Moda da Casa', 'grande', 3, '09:39:49'),
(7, '199', 'Peperoni', 'pequeno', 3, '09:40:14'),
(8, '2', 'Catupiry', 'gigante', 3, '13:58:17'),
(9, '20', 'Moda da Casa', 'pequeno', 3, '14:00:34'),
(10, '21', 'Catupiry', 'grande', 3, '14:03:53'),
(11, '2121', 'Catupiry', 'grande', 3, '14:04:38'),
(12, '12', 'Queijo', 'gigante', 3, '14:04:45'),
(13, '5', 'Queijo', 'pequeno', 3, '14:04:50'),
(14, '97', 'Peperoni', 'medio', 3, '14:04:57'),
(15, '963', 'Catupiry', 'grande', 3, '14:06:40'),
(16, '20', 'Queijo', 'medio', 3, '14:18:11'),
(17, '20', 'Peperoni', 'medio', 3, '14:31:40'),
(18, '999999999', 'Catupiry', 'gigante', 3, '15:45:03'),
(19, '200', 'Catupiry', 'medio', 3, '13:36:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `id` int(11) NOT NULL,
  `andamento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `situacao`
--

INSERT INTO `situacao` (`id`, `andamento`) VALUES
(1, 'Pedido Feito'),
(2, 'Em Produção'),
(3, 'Pronto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoproduto`
--

CREATE TABLE `tipoproduto` (
  `id` int(11) NOT NULL,
  `tipoMateria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipoproduto`
--

INSERT INTO `tipoproduto` (`id`, `tipoMateria`) VALUES
(1, 'Acompanhamento'),
(2, 'Materia Prima');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `materiaprima`
--
ALTER TABLE `materiaprima`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipoProduto` (`tipoProduto`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `andamento` (`andamento`);

--
-- Indexes for table `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipoproduto`
--
ALTER TABLE `tipoproduto`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `materiaprima`
--
ALTER TABLE `materiaprima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `situacao`
--
ALTER TABLE `situacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipoproduto`
--
ALTER TABLE `tipoproduto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `materiaprima`
--
ALTER TABLE `materiaprima`
  ADD CONSTRAINT `materiaprima_ibfk_1` FOREIGN KEY (`tipoProduto`) REFERENCES `tipoproduto` (`id`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`andamento`) REFERENCES `situacao` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
