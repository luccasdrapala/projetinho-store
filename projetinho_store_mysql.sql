-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 14/02/2023 às 08:41
-- Versão do servidor: 5.7.23-23
-- Versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetinho_store`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `type_product_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(11,4) DEFAULT '0.0000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `product`
--

INSERT INTO `product` (`id`, `type_product_id`, `description`, `price`) VALUES
(13, 28, 'Harry Potter - A Pedra Filosofal', '49.9900'),
(15, 30, 'T-Shirt New Balance', '199.9900'),
(17, 28, 'New Product', '823.0000'),
(18, 28, '234', '23.0000'),
(19, 48, 'Xbox 360', '789.5000'),
(20, 49, 'RTX 4090', '23600.0000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_tax` decimal(11,4) DEFAULT '0.0000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `product_type`
--

INSERT INTO `product_type` (`id`, `product_description`, `product_tax`) VALUES
(28, 'Books', '1.5000'),
(30, 'Clothes', '12.5000'),
(31, 'Television', '11.5000'),
(32, 'Instrument', '1.5000'),
(43, 'Esse é bom', '1.5000'),
(46, 'Programador Sênior em 6 meses', '4.0000'),
(47, '8', '4.0000'),
(48, 'Video Games', '12.0000'),
(49, 'PCzismo', '1.5000'),
(50, '44444', '999.9900');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `total_price` decimal(11,4) DEFAULT '0.0000',
  `total_tax` decimal(11,4) DEFAULT '0.0000',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `sales`
--

INSERT INTO `sales` (`id`, `total_price`, `total_tax`, `created_at`, `updated_at`) VALUES
(4, '224.9900', '25.0000', '2023-02-13 21:26:34', NULL),
(6, '275.7300', '25.7500', '2023-02-13 21:27:16', NULL),
(7, '833.8700', '34.0000', '2023-02-13 21:27:43', NULL),
(8, '101.4800', '1.5000', '2023-02-14 08:19:08', NULL),
(11, '47908.0000', '708.0000', '2023-02-14 08:40:49', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `sales_item`
--

CREATE TABLE `sales_item` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(11,4) DEFAULT '0.0000',
  `price` decimal(11,4) DEFAULT '0.0000',
  `tax` decimal(11,4) DEFAULT '0.0000',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `sales_item`
--

INSERT INTO `sales_item` (`id`, `sale_id`, `product_id`, `quantity`, `price`, `tax`, `created_at`, `updated_at`) VALUES
(4, 4, 15, '1.0000', '199.9900', '25.0000', '2023-02-13 21:26:34', NULL),
(7, 6, 13, '1.0000', '49.9900', '0.7500', '2023-02-13 21:27:16', NULL),
(8, 6, 15, '1.0000', '199.9900', '25.0000', '2023-02-13 21:27:16', NULL),
(9, 7, 13, '12.0000', '49.9900', '9.0000', '2023-02-13 21:27:43', NULL),
(10, 7, 15, '1.0000', '199.9900', '25.0000', '2023-02-13 21:27:43', NULL),
(11, 8, 13, '2.0000', '49.9900', '1.5000', '2023-02-14 08:19:08', NULL),
(14, 11, 20, '2.0000', '23600.0000', '708.0000', '2023-02-14 08:40:49', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_product_id` (`type_product_id`);

--
-- Índices de tabela `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `sales_item`
--
ALTER TABLE `sales_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_id` (`sale_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `sales_item`
--
ALTER TABLE `sales_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type_product_id`) REFERENCES `product_type` (`id`);

--
-- Restrições para tabelas `sales_item`
--
ALTER TABLE `sales_item`
  ADD CONSTRAINT `sales_item_ibfk_1` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
