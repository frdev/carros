
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 27/08/2017 às 18:21:48
-- Versão do Servidor: 10.1.24-MariaDB
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u322120177_ctc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluguel`
--

CREATE TABLE IF NOT EXISTS `aluguel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carro` varchar(255) NOT NULL,
  `usuario` int(11) NOT NULL,
  `projeto` int(11) NOT NULL,
  `origem` varchar(255) NOT NULL,
  `destino` varchar(255) NOT NULL,
  `dataaluguel` datetime NOT NULL,
  `datadevolucao` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_usuario` (`usuario`),
  KEY `fk_projeto` (`projeto`),
  KEY `fk_carro` (`carro`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE IF NOT EXISTS `carros` (
  `placa` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `cor` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`placa`, `modelo`, `cor`) VALUES
('PZP5342', 'Nissan March', 'Branco'),
('PYG5599', 'Ford KA', 'Cinza');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_acesso`
--

CREATE TABLE IF NOT EXISTS `nivel_acesso` (
  `id` int(11) NOT NULL,
  `nivel` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `nivel_acesso`
--

INSERT INTO `nivel_acesso` (`id`, `nivel`) VALUES
(1, 'Administrador'),
(2, 'Comum');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE IF NOT EXISTS `projetos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cr` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id`, `nome`, `cr`) VALUES
(1, 'BANCO SOFISA - INFRA', '1481001'),
(2, 'BIOLAB FARMACÊUTICA', '1474001'),
(3, 'CUMMINS', '1508001'),
(4, 'DC MATRIX', '1519001'),
(5, 'FGV INFRA', '85001'),
(6, 'HP - PROJETO ITAÚ', '63006'),
(7, 'HP - PROJETO VOTORANTIM', '63005'),
(8, 'JOHNSON & JOHNSON - PROJETOS', '29001'),
(9, 'KIMBERLY-CLARK', '1491001'),
(10, 'LIBBS FARMACÊUTICA', '1454001'),
(11, 'LIOTECNICA - INFRA', '1517001'),
(12, 'NATURA', '1477001'),
(13, 'PIERRE FABRE', '1484001'),
(14, 'RECOVERY', '1467001'),
(15, 'TAM', '1145001'),
(16, 'TAM - PROJETOS', '1145002'),
(17, 'TIVIT', '56001'),
(18, 'UOL DIVEO INFRA', '1236001'),
(19, 'JOHNSON', '29002'),
(20, 'PORTO SEGURO', '850001'),
(21, 'PORTO SEGURO - PROJETOS', '850002'),
(22, 'FÁBRICA DE PROJETOS - PRIVADO', '9000001'),
(23, 'CONTINENTAL', '1133001'),
(24, 'IISOLUTIONS', '1438001'),
(25, 'SITA', '1126001'),
(26, 'WALMART - INFRA', '1526001');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `criado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `level`, `email`, `usuario`, `senha`, `status`, `criado`, `modificado`) VALUES
(1, 1, 'felipe.ristow@connectcom.com.br', 'feliperistow', 'ebd6d2f5d60ff9afaeda1a81fc53e2d0', 'Ativo', '2017-08-15 22:30:28', NULL),
(2, 2, 'adilton.silva@connectcom.com.br', 'adiltonsilva', 'ebd6d2f5d60ff9afaeda1a81fc53e2d0', 'Ativo', '2017-08-15 22:40:21', NULL),
(3, 2, 'alexandre.cabral@portoseguro.com.br', 'alexandrecabral', 'ebd6d2f5d60ff9afaeda1a81fc53e2d0', 'Ativo', '2017-08-15 22:40:30', NULL),
(4, 2, 'anderson.freire@portoseguro.com.br', 'andersonfreire', 'ebd6d2f5d60ff9afaeda1a81fc53e2d0', 'Ativo', '2017-08-15 22:40:40', NULL),
(5, 2, 'fabio.lima@portoseguro.com.br', 'fabiolima', 'ebd6d2f5d60ff9afaeda1a81fc53e2d0', 'Ativo', '2017-08-15 22:40:52', NULL),
(6, 2, 'francisco.rsilva@connectcom.com.br', 'franciscosilva', 'ebd6d2f5d60ff9afaeda1a81fc53e2d0', 'Ativo', '2017-08-15 22:41:03', '2017-08-15 22:42:01'),
(7, 2, 'glauco.marsolla@connectcom.com.br', 'glaucomarsolla', 'ebd6d2f5d60ff9afaeda1a81fc53e2d0', 'Ativo', '2017-08-15 22:41:14', NULL),
(8, 2, 'guilherme.meira@portoseguro.com.br', 'guilhermemeira', '6aafc756c1256ec42d2602cad52f7696', 'Ativo', '2017-08-15 22:41:21', '2017-08-16 11:23:27'),
(9, 2, 'joao.chaves@portoseguro.com.br', 'joaochaves', 'ebd6d2f5d60ff9afaeda1a81fc53e2d0', 'Ativo', '2017-08-15 22:41:29', NULL),
(10, 2, 'rogerio.castro@portoseguro.com.br', 'rogeriocastro', 'ebd6d2f5d60ff9afaeda1a81fc53e2d0', 'Ativo', '2017-08-15 22:41:41', NULL),
(11, 2, 'jefferson.blopes@connectcom.com.br', 'jeffersonlopes', 'ebd6d2f5d60ff9afaeda1a81fc53e2d0', 'Ativo', '2017-08-15 22:41:54', '2017-08-24 13:07:31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
