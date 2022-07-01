-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jul-2022 às 14:20
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vendas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricantes`
--

CREATE TABLE `fabricantes` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fabricantes`
--

INSERT INTO `fabricantes` (`id`, `nome`) VALUES
(1, 'Asus Brasil'),
(2, 'Dell'),
(3, 'Apple'),
(5, 'Samsung'),
(6, 'Brastemp'),
(7, 'Positivo'),
(8, 'Microsoft Brasil'),
(28, 'HP'),
(36, 'Logitech');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `quantidade` tinyint(4) NOT NULL,
  `fabricante_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `quantidade`, `fabricante_id`) VALUES
(1, 'Ultrabook', 'Intel Ultrabook Asus com processador Intel cORE i12, memória RAM de 16GB e Windows 11', '6500.99', 15, 1),
(2, 'Tablet Android', 'Tablet comum versão 12 do sistema operacional da google. Possui tela de 10 polegadas e armazenamento de 64GB', '4999.00', 4, 5),
(3, 'Geladeira', 'Refrigerador frost-free com acesso à internet das coisas e bla bla bla', '1500.00', 10, 6),
(4, 'iPhone 13 Pro Max', 'Alta durabilidade, processador Bionic 14 memória de 128GB de rmazenamento e 6GB de RAM e caro pra caramba', '6999.99', 15, 3),
(5, 'iPad Mini', 'Tablet apple com tela retina display de 4k e memória interna de 64GB e acesso gratuito ao iCloud', '5000.00', 9, 3),
(6, 'Xbox', 'Console de últma geração com acesso aos melhores jogos e bla bla bla', '2500.00', 6, 8),
(7, 'Ultrabook', 'Equipamento com processador AMD Ryzen5 12GB de RAM, placa de vídeo RTX', '4500.00', 12, 7),
(8, 'Teclado gamer', 'Teclado de última geração com teclas quanticas e mecânicas ótimo tempo de resposta e blá blá blá. Ah, e LED embutido!', '380.00', 8, 8),
(9, 'placa-mãe', 'placa com diversos slots de memória RAM DDR6, suporte a processdores intel linha core i5, i7 e etc.', '1250.00', 15, 1),
(10, 'laptop xuxa', 'Laptop ultima geração, processador celeron, ddr2, 2gb Ram', '4500.00', 10, 28);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produtos_fabricantes` (`fabricante_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `fabricantes`
--
ALTER TABLE `fabricantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_produtos_fabricantes` FOREIGN KEY (`fabricante_id`) REFERENCES `fabricantes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
