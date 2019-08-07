-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 07-Ago-2019 às 17:31
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_molduraria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fundos`
--

DROP TABLE IF EXISTS `fundos`;
CREATE TABLE IF NOT EXISTS `fundos` (
  `id_fundo` int(4) NOT NULL AUTO_INCREMENT,
  `nome_fundo` varchar(250) NOT NULL,
  PRIMARY KEY (`id_fundo`)
) ENGINE=InnoDB AUTO_INCREMENT=129006 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fundos`
--

INSERT INTO `fundos` (`id_fundo`, `nome_fundo`) VALUES
(129001, 'FUNDO GRAVATA - 10X15'),
(129002, 'FUNDO GRAVATA - 15X21'),
(129003, 'FUNDO GRAVATA - 20X25'),
(129004, 'FUNDO GRAVATA - 20X30'),
(129005, 'FUNDO ALCATEX');

-- --------------------------------------------------------

--
-- Estrutura da tabela `impressao`
--

DROP TABLE IF EXISTS `impressao`;
CREATE TABLE IF NOT EXISTS `impressao` (
  `id_impressao` int(4) NOT NULL AUTO_INCREMENT,
  `nome_impressao` varchar(250) NOT NULL,
  PRIMARY KEY (`id_impressao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `impressao`
--

INSERT INTO `impressao` (`id_impressao`, `nome_impressao`) VALUES
(1, 'CANVAS'),
(2, 'PAPEL FOTOGRAFICO'),
(3, 'ADESIVO'),
(4, 'PAPEL FOTO HP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lojas`
--

DROP TABLE IF EXISTS `lojas`;
CREATE TABLE IF NOT EXISTS `lojas` (
  `id_loja` int(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  PRIMARY KEY (`id_loja`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lojas`
--

INSERT INTO `lojas` (`id_loja`, `nome`) VALUES
(1, 'JACOBINA'),
(2, 'JUAZEIRO'),
(3, 'PETROLINA (CENTRO)'),
(4, 'RIVER'),
(5, 'SENHOR DO BONFIM'),
(6, 'CAPIM GROSSO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `molduras`
--

DROP TABLE IF EXISTS `molduras`;
CREATE TABLE IF NOT EXISTS `molduras` (
  `id_moldura` int(4) NOT NULL AUTO_INCREMENT,
  `nome_moldura` varchar(250) NOT NULL,
  PRIMARY KEY (`id_moldura`)
) ENGINE=InnoDB AUTO_INCREMENT=129055 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `molduras`
--

INSERT INTO `molduras` (`id_moldura`, `nome_moldura`) VALUES
(129007, 'VARA F10'),
(129008, 'VARA F200'),
(129009, 'VARA F30'),
(129010, 'VARA F31'),
(129011, 'VARA F400'),
(129012, 'VARA F50'),
(129013, 'VARA F30'),
(129014, 'VARA F700'),
(129025, 'VARA MOLDURART  REF. 5071-9027'),
(129026, 'VARA MOLDURART  REF. 5071-01-49'),
(129027, 'VARA MOLDURART REF. 98-49'),
(129028, 'VARA MOLDURART  REF. 98-41'),
(129029, 'VARA MOLDURART REF. 2016-47'),
(129030, 'VARA MOLDURART  REF. 98-4'),
(129031, 'VARA MOLDURART   REF. 2016-9150'),
(129032, 'VARA MOLDURART  2016-9104'),
(129033, 'VARA MOLDURART   REF. 5033-8479'),
(129034, 'VARA MOLDURART   REF. 2043-8410'),
(129035, 'VARA MOLDURART  REF. 2233-PF'),
(129036, 'VARA MOLDURART  REF. 2233-01-41'),
(129037, 'VARA MOLDURART  REF. 81-9152'),
(129038, 'VARA MOLDURART . REF. 928-BF'),
(129039, 'VARA MOLDURART  REF. 149-500'),
(129040, 'VARA MOLDURART  REF. 5069-9027'),
(129041, 'VARA MOLDURART . REF. 5069-01-49'),
(129042, 'VARA MOLDURART . REF. 3079-9182'),
(129043, 'VARA MOLDURART . REF. KD-303-17'),
(129044, 'VARA MOLDURART . REF. 3068-9134'),
(129045, 'VARA MOLDURART . REF. 938-PV'),
(129046, 'VARA MOLDURART . REF. G7S-9138'),
(129047, 'VARA MOLDURART . REF. 329-41'),
(129048, 'VARA MOLDURART . REF. 3055-8995'),
(129049, 'VARA MOLDURART . REF. 3055-149'),
(129050, 'VARA MOLDURART . REF. 3055-141'),
(129051, 'VARA MOLDURART  REF. 5044-8637'),
(129052, 'VARA MOLDURART . REF. 5039-9013'),
(129053, 'VARA MOLDURART . REF. 3036-9179'),
(129054, 'VARA MOLDURART . REF. 3036-9178');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(4) NOT NULL AUTO_INCREMENT,
  `id_loja` int(4) NOT NULL,
  `os` varchar(30) NOT NULL,
  `cliente` varchar(250) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(250) NOT NULL,
  `valor` double(7,2) NOT NULL,
  `id_status` int(4) NOT NULL,
  `data_loja` varchar(50) NOT NULL,
  `data_cliente` varchar(50) NOT NULL,
  `id_moldura` int(4) NOT NULL,
  `tam_moldura` varchar(15) NOT NULL,
  `cor` varchar(100) NOT NULL,
  `quantidade` int(4) NOT NULL,
  `id_vidro` int(4) NOT NULL,
  `id_fundo` int(4) NOT NULL,
  `id_impressao` int(4) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `fk_fundo` (`id_fundo`),
  KEY `fk_impressao` (`id_impressao`),
  KEY `fk_lojas` (`id_loja`),
  KEY `fk_molduras` (`id_moldura`),
  KEY `fk_vidros` (`id_vidro`),
  KEY `fk_status` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_os`
--

DROP TABLE IF EXISTS `status_os`;
CREATE TABLE IF NOT EXISTS `status_os` (
  `id_status` int(4) NOT NULL AUTO_INCREMENT,
  `status_nome` varchar(150) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `status_os`
--

INSERT INTO `status_os` (`id_status`, `status_nome`) VALUES
(1, 'CAPTADO'),
(2, 'PRECIFICADO'),
(3, 'PAGO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(4) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(150) NOT NULL,
  `senha` varchar(150) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `senha`) VALUES
(1, 'fabio', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vidros`
--

DROP TABLE IF EXISTS `vidros`;
CREATE TABLE IF NOT EXISTS `vidros` (
  `id_vidro` int(4) NOT NULL AUTO_INCREMENT,
  `nome_vidro` varchar(250) NOT NULL,
  PRIMARY KEY (`id_vidro`)
) ENGINE=InnoDB AUTO_INCREMENT=129023 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `vidros`
--

INSERT INTO `vidros` (`id_vidro`, `nome_vidro`) VALUES
(129016, 'VIDRO INCOLOR 10X15'),
(129017, 'VIDRO INCOLOR 15X21'),
(129018, 'VIDRO INCOLOR 20X25'),
(129019, 'VIDRO INCOLOR 20X30'),
(129020, 'VIDRO INCOLOR 30X40'),
(129021, 'VIDRO INCOLOR 50X70\r\n'),
(129022, 'VIDRO INCOLOR M²');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_fundo` FOREIGN KEY (`id_fundo`) REFERENCES `fundos` (`id_fundo`),
  ADD CONSTRAINT `fk_impressao` FOREIGN KEY (`id_impressao`) REFERENCES `impressao` (`id_impressao`),
  ADD CONSTRAINT `fk_lojas` FOREIGN KEY (`id_loja`) REFERENCES `lojas` (`id_loja`),
  ADD CONSTRAINT `fk_molduras` FOREIGN KEY (`id_moldura`) REFERENCES `molduras` (`id_moldura`),
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`id_status`) REFERENCES `status_os` (`id_status`),
  ADD CONSTRAINT `fk_vidros` FOREIGN KEY (`id_vidro`) REFERENCES `vidros` (`id_vidro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
