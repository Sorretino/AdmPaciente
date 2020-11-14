-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Nov-2020 às 01:19
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `om30fernando`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(350) NOT NULL,
  `cpf` varchar(250) NOT NULL,
  `rg` varchar(250) NOT NULL,
  `nasc` varchar(50) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `numero` varchar(250) NOT NULL,
  `bairro` varchar(250) NOT NULL,
  `cidade` varchar(250) NOT NULL,
  `cep` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `estado` varchar(250) NOT NULL,
  `created` date NOT NULL,
  `telefone` varchar(220) NOT NULL,
  `celular` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cpf`, `rg`, `nasc`, `endereco`, `numero`, `bairro`, `cidade`, `cep`, `email`, `estado`, `created`, `telefone`, `celular`) VALUES
(106, 'Alexandre', '213213213277777', '', '', 'Rua Alice Pires da Silva Carrocini', '', '', 'Araras', '13605-286', 'gamer@hotmail.com', 'Escolha o Estado...', '2018-07-24', '', ''),
(107, 'Fernando Jose Sorrentino ', '27585458658', '36555854-9', '', 'alice Augusto', '', 'centro', 'Araras', '1366558999', 'fernandosorrentino26@gmail.com', 'Escolha o Estado...', '2018-07-24', '19997313515', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `inscritos`
--

CREATE TABLE `inscritos` (
  `id` int(11) NOT NULL,
  `nome` varchar(155) NOT NULL,
  `email` varchar(155) NOT NULL,
  `telefone` varchar(155) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `valor` varchar(155) NOT NULL,
  `qtd` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `inscritos`
--

INSERT INTO `inscritos` (`id`, `nome`, `email`, `telefone`, `tipo`, `created`, `valor`, `qtd`) VALUES
(1, 'Matheus Gomes', 'matheus@gmail.com', '(19)3542-2020', 'Exames Hemograma', '2020-11-13', '200', '1'),
(2, 'Rafael Gomes', 'rafael@bol.com', '(19)3542-2020', 'TSH e T4 livre', '2020-11-13', '200', '0'),
(3, 'Alexandre Sorrentino', 'alexandre@bol.com', '(19)3542-2020', 'Eletrocardiograma', '2020-11-13', '600', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `nivel_acessos`
--

CREATE TABLE `nivel_acessos` (
  `id` int(11) NOT NULL,
  `nome_nivel` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `nivel_acessos`
--

INSERT INTO `nivel_acessos` (`id`, `nome_nivel`, `created`, `modified`) VALUES
(1, 'Administrador', '2015-09-19 00:00:00', NULL),
(2, 'UsuÃ¡rio', '2015-09-27 17:30:26', '2015-09-27 17:34:37');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pasciente`
--

CREATE TABLE `pasciente` (
  `id` int(11) NOT NULL,
  `nomecompleto` varchar(255) NOT NULL,
  `nomemae` varchar(255) NOT NULL,
  `nascimento` date NOT NULL,
  `cpf` varchar(155) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `cns` varchar(155) NOT NULL,
  `telefone` varchar(55) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `numero` int(15) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `descricao_longa` varchar(255) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pasciente`
--

INSERT INTO `pasciente` (`id`, `nomecompleto`, `nomemae`, `nascimento`, `cpf`, `rg`, `cns`, `telefone`, `cep`, `celular`, `endereco`, `numero`, `bairro`, `cidade`, `estado`, `descricao_longa`, `imagem`, `created`) VALUES
(13, 'Alexandre Marques', 'alexandra', '2020-11-18', '121.212.121-21', '12.121.212-1', '22222', '(12)2222-2222', '13605-286', '(22)22222-2222', 'Tiradentes', 0, 'Santa Eliza', 'Araras', 'São Paulo', '<p>sdsad</p>\r\n', 'bgLogin.jpg', '2020-11-13'),
(15, 'Fernando Sorrentino', 'Maria Sorrentino', '1982-03-04', '009.999.999-99', '09.909.000-0', '9898989898989898', '(98)9898-9898', '13605-286', '(98)98989-8989', 'Rua Alice Pires da Silva Carrocini', 0, 'Jardim Terras de Santa Elisa', 'Araras', 'SP', '<p>Pasciente Novato</p>\r\n', 'user-avatar.jpg', '2020-11-13'),
(16, 'Debora Silva', 'Maria Rosa', '1995-10-12', '900.000.000-00', '00.000.000-0', '8787897897897897897', '(90)0000-0000', '13609-442', '(09)09090-9090', 'Rua Alcides Vicentin', 0, 'Jardim Esplanada', 'Araras', 'SP', '<p>Paciente entrou em estado de colica!</p>\r\n\r\n<p>Foi atendida imediatamente.</p>\r\n', 'icon-feminino.png', '2020-11-13'),
(17, 'Matheus Junior', 'Mariana Silva', '1980-12-20', '999.999.999-99', '22.222.222-2', '232323232323232323', '(22)2222-2222', '13605-286', '(22)22222-2222', 'Rua Alice Pires da Silva Carrocini', 0, 'Jardim Terras de Santa Elisa', 'Araras', 'SP', '<p>deu entrada</p>\r\n', 'user-avatar.jpg', '2020-11-13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  `qtd` varchar(250) NOT NULL,
  `total` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_produto`, `qtd`, `total`) VALUES
(1, 12, '23', '3'),
(2, 1, '1', '1800,00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `created`, `modified`) VALUES
(15, 'Alexandre Programador', 'alexandre@gmail.com', '202cb962ac59075b964b07152d234b70', '2018-07-24', NULL),
(16, 'Fernando Sorrentino', 'fernando@gmail.com', '202cb962ac59075b964b07152d234b70', '2018-07-24', '2018-07-23');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `inscritos`
--
ALTER TABLE `inscritos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pasciente`
--
ALTER TABLE `pasciente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de tabela `pasciente`
--
ALTER TABLE `pasciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
