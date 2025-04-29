-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 29/04/2025 às 11:06
-- Versão do servidor: 10.11.10-MariaDB
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u134451290_bd_xoxo`
--
CREATE DATABASE IF NOT EXISTS `u134451290_bd_xoxo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `u134451290_bd_xoxo`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cupom`
--

CREATE TABLE `tb_cupom` (
  `id_tb_cupom` int(11) NOT NULL,
  `prefixo_tb_cupom` varchar(45) NOT NULL,
  `status_tb_cupom` enum('0','1') DEFAULT '1',
  `desconto_tb_cupom` int(11) NOT NULL,
  `data_cadastro_tb_cupom` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_cupom`
--

INSERT INTO `tb_cupom` (`id_tb_cupom`, `prefixo_tb_cupom`, `status_tb_cupom`, `desconto_tb_cupom`, `data_cadastro_tb_cupom`) VALUES
(1, 'XOXO', '1', 10, '2024-06-27 02:12:28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_departamento`
--

CREATE TABLE `tb_departamento` (
  `id_tb_departamento` int(11) NOT NULL,
  `nome_tb_departamento` varchar(100) NOT NULL,
  `descricao_tb_departamento` varchar(255) NOT NULL,
  `data_cadastro_tb_departamento` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `tb_departamento`
--

INSERT INTO `tb_departamento` (`id_tb_departamento`, `nome_tb_departamento`, `descricao_tb_departamento`, `data_cadastro_tb_departamento`) VALUES
(13, 'T-shirt', 'T-shirt nas mais variadas estampas, modelos e tamanhos, confira agora!', '2024-06-27 02:13:44'),
(14, 'Short', 'Shorts Jeans/Tecidos, confira agora nossas variedades!', '2024-06-27 02:51:03'),
(15, 'Cropped', 'Variedades em croppeds e semi cropped, confira agora!', '2024-06-30 23:06:29'),
(16, 'Conjuntos', 'Confira nossa variedade de conjuntos, para os mais diversos momentos.', '2024-07-10 21:28:11'),
(17, 'Vestidos', 'Confira nossa variedade de vestidos, para os mais variados momentos.', '2024-07-10 21:28:27');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `id_tb_endereco` int(11) NOT NULL,
  `rua_tb_endereco` varchar(255) NOT NULL,
  `num_tb_endereco` varchar(20) NOT NULL,
  `bai_tb_endereco` varchar(45) NOT NULL,
  `cid_tb_endereco` varchar(45) NOT NULL,
  `est_tb_endereco` varchar(45) NOT NULL,
  `id_usuario_tb_endereco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_endereco`
--

INSERT INTO `tb_endereco` (`id_tb_endereco`, `rua_tb_endereco`, `num_tb_endereco`, `bai_tb_endereco`, `cid_tb_endereco`, `est_tb_endereco`, `id_usuario_tb_endereco`) VALUES
(6, 'Francisco Justa de Araujo', '1954', 'Santa Luzia', 'Canindé ', 'Ceará ', 41),
(7, 'Rua barros dos Santos', '1353', 'Santa Clara ', 'Canindé ', 'Ceara ', 44),
(8, 'Augusto Facundo ', '1113', 'Santa luzia ', 'Canindé ', 'Ceará ', 45),
(9, 'Ercílio Martins ', '837', 'Campinas', 'Canindé ', 'Ceara', 46),
(10, '.', '2563', 'Monte', 'Canindé', 'Ceará ', 40),
(11, 'Rua José Karam', '1109', 'Santa Luzia', 'Canindé', 'Ceará', 39),
(12, 'Rua Euclides Barroso', '635', 'Centro ', 'Canindé ', 'Ceará ', 42),
(13, 'Raimunda faustino brasil ', '118', 'Alto Guaramiranga ', 'Canindé ', 'CE ', 49),
(14, 'Rua José Karan ', '1109', 'Santa Luzia', 'Canindé ', 'Ceará ', 61),
(15, 'Rua Luís Vieira', '596', 'Palestina', 'Canindé', 'Ceará', 60),
(16, 'Rua professor Raimundo Martins ', '85999824165', 'Can', 'Canindé', 'Ceará ', 63),
(17, 'Avenida do caic', '492', 'Palestina', 'Canindé', 'Ceará', 66),
(19, 'Av. Visconde do Rio Branco', '2844', 'Fátima', 'Fortaleza', 'Ceará', 80);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_grade`
--

CREATE TABLE `tb_grade` (
  `id_tb_grade` int(11) NOT NULL,
  `tipo_tb_grade` enum('1','2') NOT NULL,
  `pp_tb_grade` int(11) DEFAULT 0,
  `p_tb_grade` int(11) DEFAULT 0,
  `m_tb_grade` int(11) DEFAULT 0,
  `g_tb_grade` int(11) DEFAULT 0,
  `gg_tb_grade` int(11) DEFAULT 0,
  `34_tb_grade` int(11) DEFAULT 0,
  `36_tb_grade` int(11) DEFAULT 0,
  `38_tb_grade` int(11) DEFAULT 0,
  `40_tb_grade` int(11) DEFAULT 0,
  `42_tb_grade` int(11) DEFAULT 0,
  `44_tb_grade` int(11) DEFAULT 0,
  `46_tb_grade` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `tb_grade`
--

INSERT INTO `tb_grade` (`id_tb_grade`, `tipo_tb_grade`, `pp_tb_grade`, `p_tb_grade`, `m_tb_grade`, `g_tb_grade`, `gg_tb_grade`, `34_tb_grade`, `36_tb_grade`, `38_tb_grade`, `40_tb_grade`, `42_tb_grade`, `44_tb_grade`, `46_tb_grade`) VALUES
(8, '1', 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, '1', 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, '1', 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, '1', 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, '1', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(19, '1', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(20, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, '1', 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, '1', 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, '1', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(28, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, '1', 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(31, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, '1', 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(34, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(41, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44, '1', 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(45, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, '1', 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(49, '1', 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50, '1', 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(51, '1', 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(52, '1', 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(53, '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(55, '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(56, '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(57, '2', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_item_cupom`
--

CREATE TABLE `tb_item_cupom` (
  `id_tb_item_cupom` int(11) NOT NULL,
  `status_tb_item_cupom` enum('0','1') DEFAULT '1',
  `id_cupom_tb_item_cupom` int(11) NOT NULL,
  `id_usuario_tb_item_cupom` int(11) NOT NULL,
  `data_cadastro_tb_item_cupom` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_item_cupom`
--

INSERT INTO `tb_item_cupom` (`id_tb_item_cupom`, `status_tb_item_cupom`, `id_cupom_tb_item_cupom`, `id_usuario_tb_item_cupom`, `data_cadastro_tb_item_cupom`) VALUES
(8, '0', 1, 41, '2024-07-01 00:12:49'),
(9, '1', 1, 44, '2024-07-01 00:56:41'),
(10, '0', 1, 45, '2024-07-01 01:20:17'),
(11, '1', 1, 46, '2024-07-01 01:21:58'),
(12, '1', 1, 40, '2024-07-01 02:05:56'),
(14, '0', 1, 42, '2024-07-01 13:23:23'),
(15, '0', 1, 49, '2024-07-02 00:21:11'),
(16, '0', 1, 61, '2024-07-02 18:38:38'),
(17, '0', 1, 60, '2024-07-02 18:51:50'),
(18, '1', 1, 63, '2024-07-02 19:28:14'),
(19, '0', 1, 66, '2024-07-02 22:49:17'),
(21, '0', 1, 39, '2024-07-07 15:40:32'),
(22, '1', 1, 80, '2024-12-20 03:15:59');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `id_tb_produto` int(11) NOT NULL,
  `nome_tb_produto` varchar(100) NOT NULL,
  `descricao_tb_produto` varchar(255) NOT NULL,
  `custo_tb_produto` float NOT NULL,
  `varejo_tb_produto` float NOT NULL,
  `atacado_tb_produto` float NOT NULL,
  `grade_tb_produto` enum('1','2') NOT NULL DEFAULT '1',
  `id_departamento_tb_produto` int(11) NOT NULL,
  `tb_grade_id_tb_grade` int(11) NOT NULL,
  `img1_tb_produto` varchar(255) NOT NULL,
  `img2_tb_produto` varchar(255) NOT NULL,
  `img3_tb_produto` varchar(255) NOT NULL,
  `premium_tb_produto` enum('0','1') NOT NULL,
  `visualizar_tb_produto` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `tb_produto`
--

INSERT INTO `tb_produto` (`id_tb_produto`, `nome_tb_produto`, `descricao_tb_produto`, `custo_tb_produto`, `varejo_tb_produto`, `atacado_tb_produto`, `grade_tb_produto`, `id_departamento_tb_produto`, `tb_grade_id_tb_grade`, `img1_tb_produto`, `img2_tb_produto`, `img3_tb_produto`, `premium_tb_produto`, `visualizar_tb_produto`) VALUES
(10, 'Camiseta Canelada (Azul)', 'Camiseta, tecido canelado, tamanho único (veste 38/40/42)', 9.99, 19.99, 14.99, '1', 13, 8, 'Photoroom_20240701_111041.jpeg', 'Photoroom_20240701_111144.jpeg', 'Photoroom_20240701_111524.jpeg', '0', '1'),
(11, 'Camiseta Canelada (Vermelho)', 'Camiseta, tecido canelado, tamanho único (veste 38/40/42)', 9.99, 19.99, 14.99, '1', 13, 9, 'Photoroom_20240701_112142.jpeg', 'Photoroom_20240701_112334.jpeg', 'Photoroom_20240701_111524.jpeg', '0', '1'),
(12, 'Camiseta Canelada (Preto)', 'Camiseta, tecido canelado, tamanho único (veste 38/40/42)', 9.99, 19.99, 14.99, '1', 13, 10, 'Photoroom_20240701_112226.jpeg', 'Photoroom_20240701_112257.jpeg', 'Photoroom_20240701_111524.jpeg', '0', '1'),
(13, 'Camiseta Marilia Linhas (Preto)', 'Camiseta em canelado. Tamanho único, veste 36/38/40.', 9.99, 19.99, 14.99, '1', 13, 11, 'Photoroom_20240701_113434.jpeg', 'Photoroom_20240701_113543.jpeg', '', '0', '1'),
(14, 'Camiseta Marilia Linhas (Marrom)', 'Camiseta em canelado. Tamanho único, veste 36/38/40.', 9.99, 19.99, 14.99, '1', 13, 12, 'Photoroom_20240701_113413.jpeg', 'Photoroom_20240701_113543.jpeg', '', '0', '1'),
(15, 'Camiseta Marilia Linhas (Verde)', 'Camiseta em canelado. Tamanho único, veste 36/38/40.', 9.99, 19.99, 14.99, '1', 13, 13, 'Photoroom_20240701_113342.jpeg', 'Photoroom_20240701_113543.jpeg', '', '0', '1'),
(16, 'Tee Kamila (Rosa)', 'T-shirt em linhas, infinitas composições, tecido premium e gola média. Tamanho único: 38/40/42.', 16, 34.99, 24.99, '1', 13, 14, 'Photoroom_20240701_114702.jpeg', 'Photoroom_20240701_091037.jpeg', '', '1', '1'),
(17, 'Tee Kamila (Verde Bebê)', 'T-shirt em linhas, infinitas composições, tecido premium e gola média. Tamanho único: 38/40/42.', 15.99, 34.99, 24.99, '1', 13, 15, 'Photoroom_20240701_085924.jpeg', 'Photoroom_20240701_085950.jpeg', 'Photoroom_20240701_090014.jpeg', '1', '1'),
(18, 'Tee Kamila (Preto)', 'T-shirt em linhas, infinitas composições, tecido premium e gola média. Tamanho único: 38/40/42.', 15.99, 34.99, 24.99, '1', 13, 16, 'Photoroom_20240701_090329.jpeg', 'Photoroom_20240701_090356.jpeg', '', '1', '1'),
(19, 'Ter Kamila (Azul)', 'T-shirt em linhas, infinitas composições, tecido premium e gola média. Tamanho único: 38/40/42.', 15.99, 34.99, 24.99, '1', 13, 17, 'Photoroom_20240701_091009.jpeg', '', '', '1', '1'),
(20, 'T-shirt Kindness Bordado (Preto)', 'T-shirt bordada, tamanho G (veste 40/42/44). Tecido excelente e confortável para compor diversos looks!', 15.99, 34.99, 29.99, '1', 13, 18, 'Photoroom_20240702_095519.jpeg', 'Photoroom_20240702_095013.jpeg', 'Photoroom_20240702_094949.jpeg', '1', '1'),
(21, 'T-shirt Kindness Bordado (Off)', 'T-shirt bordada, tamanho G (veste 40/42/44). Tecido excelente e confortável para compor diversos looks!', 15.99, 34.99, 29.99, '1', 13, 19, 'Photoroom_20240702_095419.jpeg', 'Photoroom_20240702_095042.jpeg', 'Photoroom_20240702_094949.jpeg', '1', '1'),
(22, 'T-shirt Kindness Bordado (Pink)', 'T-shirt bordada, tamanho G (veste 40/42/44). Tecido excelente e confortável para compor diversos looks!', 15.99, 34.99, 29.99, '1', 13, 20, 'Photoroom_20240702_095401.jpeg', 'Photoroom_20240702_095108.jpeg', 'Photoroom_20240702_094949.jpeg', '1', '1'),
(23, 'T-shirt Sunshine (Off)', 'T-shirt em algodão premium super leve e confortável, tamanho M (38/40)', 15.99, 34.99, 29.99, '1', 13, 21, 'Photoroom_20240702_100512.jpeg', 'Photoroom_20240702_100531.jpeg', 'Photoroom_20240702_100603.jpeg', '1', '1'),
(25, 'Semi Cropped Malha (Azul Marinho)', 'Semi cropprd em malha fria, manga média, linhas em azul marinho. Tamanho Único (40/42)', 9.99, 19.99, 17.99, '1', 13, 23, 'Photoroom_20240702_105138.jpeg', 'Photoroom_20240702_105249.jpeg', '', '0', '1'),
(26, 'Semi Cropped Malha (Azul Bebê)', 'Semi cropped em malha fria, manga média, linhas em azul bebe. Tamanho Único (40/42)', 9.99, 19.99, 14.99, '1', 13, 24, 'Photoroom_20240702_105107.jpeg', 'Photoroom_20240702_105249.jpeg', '', '0', '1'),
(27, 'Semi Cropped Malha (Rosa Seco)', 'Semi cropped em malha fria, manga média, linhas em rosa seco. Tamanho Único (40/42)', 9.99, 19.99, 14.99, '1', 13, 25, 'Photoroom_20240702_105045.jpeg', 'Photoroom_20240702_105249.jpeg', '', '0', '1'),
(28, 'Semi Cropped Malha (Amarelo)', 'Semi cropped em malha fria, manga média, linhas em amarelo. Tamanho Único (40/42)', 9.99, 19.99, 14.99, '1', 13, 26, 'Photoroom_20240702_110024.jpeg', 'Photoroom_20240702_105249.jpeg', '', '0', '1'),
(29, 'T-shirt Bordada Gratidão', 'T-shirt com detalhes bordados, tamanho G (40/42).', 14.99, 29.99, 24.99, '1', 13, 27, 'Photoroom_20240702_183453.jpeg', 'Photoroom_20240702_183508.jpeg', '', '1', '1'),
(30, 'T-shirt Bordada Amada por Deus', 'T-shirt com detalhes bordados, tamanho M (38/40)', 14.99, 29.99, 24.99, '1', 13, 28, 'Photoroom_20240702_183400.jpeg', 'Photoroom_20240702_183416.jpeg', '', '0', '1'),
(31, 'T-shirt Bordada Não Tenha Medo', 'T-shirt com detalhes bordados, tamanho G (42/44).', 14.99, 29.99, 24.99, '1', 13, 29, 'Photoroom_20240702_183321.jpeg', 'Photoroom_20240702_183336.jpeg', '', '1', '1'),
(32, 'T-shirt Girassol (Lavanda)', 'T-shirt em algodão com detalhes bordado. Tamanho G (42/44)', 14.99, 29.99, 24.99, '1', 13, 30, 'Photoroom_20240702_182959.jpeg', 'Photoroom_20240702_182930.jpeg', '', '1', '1'),
(33, 'T-shirt Girassol (Azul)', 'T-shirt em algodão com detalhes bordado. Tamanho M (38/40)', 14.99, 29.99, 24.99, '1', 13, 31, 'Photoroom_20240702_183027.jpeg', 'Photoroom_20240702_182930.jpeg', '', '1', '1'),
(34, 'T-shirt Girassol (Amarelo)', 'T-shirt em algodão com detalhes bordado. Tamanho M (38/40)', 14.99, 29.99, 24.99, '1', 13, 32, 'Photoroom_20240702_183208.jpeg', 'Photoroom_20240702_182930.jpeg', '', '1', '1'),
(35, 'T-shirt Girassol (Preto)', 'T-shirt em algodão com detalhes bordado. Tamanho G (42/44)', 14.99, 29.99, 24.99, '1', 13, 33, 'Photoroom_20240702_183118.jpeg', 'Photoroom_20240702_182930.jpeg', '', '1', '1'),
(36, 'Semi Cropped Lilás', 'Semi cropped com gola premium, tamanho único (38/40/42).', 14.99, 29.99, 24.99, '1', 15, 34, 'Photoroom_20240708_112954.jpeg', 'Photoroom_20240708_113119.jpeg', 'Photoroom_20240708_113136.jpeg', '1', '1'),
(37, 'Semi Cropped Pink', 'Semi cropped com gola premium, tamanho único (38/40/42).', 14.99, 29.99, 24.99, '1', 15, 35, 'Photoroom_20240708_113014.jpeg', 'Photoroom_20240708_113119.jpeg', 'Photoroom_20240708_113136.jpeg', '1', '1'),
(38, 'Semi Cropped Cereja', 'Semi cropped com gola premium, tamanho único (38/40/42).', 14.99, 29.99, 24.99, '1', 15, 36, 'Photoroom_20240708_113049.jpeg', 'Photoroom_20240708_113119.jpeg', 'Photoroom_20240708_113136.jpeg', '1', '1'),
(40, 'Short Alfaiataria', 'Short alfaiaria estampado com amarração lateral. Tamanho M (38/40)', 19.99, 44.99, 39.99, '1', 14, 38, 'Photoroom_20240709_144136.jpeg', 'Photoroom_20240709_144202.jpeg', '', '1', '1'),
(41, 'Short Alfaiataria', 'Short alfaiaria estampado com amarração lateral. Tamanho M (38/40)', 19.99, 44.99, 39.99, '1', 14, 39, 'Photoroom_20240709_144242.jpeg', 'Photoroom_20240709_144308.jpeg', '', '1', '1'),
(42, 'Short Alfaiataria', 'Short alfaiaria estampado com amarração lateral. Tamanho M (38/40)', 19.99, 44.99, 39.99, '1', 14, 40, 'Photoroom_20240709_144332.jpeg', 'Photoroom_20240709_144459.jpeg', '', '1', '1'),
(43, 'Short Alfaiataria', 'Short alfaiaria estampado com amarração lateral. Tamanho M (38/40)', 19.99, 44.99, 39.99, '1', 14, 41, 'Photoroom_20240709_144407.jpeg', 'Photoroom_20240709_144436.jpeg', '', '1', '1'),
(44, 'Cropped liso c/ babados (Telha)', 'Cropped em malha, tamanho único (38/40).', 14.99, 29.99, 24.99, '1', 15, 42, 'IMG_2917.jpeg', '', '', '1', '1'),
(45, 'Cropped liso c/ babados (Verde)', 'Cropped em malha, tamanho único (38/40).', 14.99, 29.99, 24.99, '1', 15, 42, 'IMG_2917.jpeg', '', '', '1', '1'),
(46, 'Cropped liso c/ babados (Preto)', 'Cropped em malha, tamanho único (38/40).', 14.99, 29.99, 24.99, '1', 15, 42, 'IMG_2917.jpeg', '', '', '1', '1'),
(51, 'Vestido Késia All Black', 'Vestido em crepe dior, não possui zíper, sobreposição por toda extensão do look. Tamanho Único (38/40)', 43.99, 79.99, 0, '1', 17, 47, 'mod12.jpeg', 'mod13.jpeg', 'mod11.jpeg', '1', '1'),
(52, 'Vestido Virgínia All Black', 'Produzido no crepe dior com aplicações em ponto de luz. Tamanho Único (38/40/42).', 43.99, 84.99, 0, '1', 17, 48, 'mod22.jpeg', 'mod23.jpeg', 'mod21.jpeg', '1', '1'),
(53, 'Conjunto Teka All Black', 'Conjunto acompanha 3 (três) peças, produzido no tule com crepe dior. Tamanho único (38/40/42).', 48.99, 84.99, 0, '1', 16, 49, 'mod31.jpeg', 'mod32.jpeg', 'mod33.jpeg', '1', '1'),
(54, 'Vestido Lua All Black', 'Vestido produzido no tule premium c/ forro. Tamanho único (38/40).', 51.99, 89.99, 0, '1', 17, 50, 'mod42.jpeg', 'mod43.jpeg', 'mod41.jpeg', '1', '1'),
(55, 'Vestido Manuella All Black', 'Produzido no tule com crepe dior, busto e saia forrada. Tamanho único (38/40).', 53.99, 94.99, 0, '1', 17, 51, 'mod53.jpeg', 'mod52.jpeg', 'mod51.jpeg', '1', '1'),
(56, 'Conjunto Watusi All Black', 'Produzido no suede c/ ponto de luz, singela fenda inferior. Tamanho único (38/40).', 34.99, 59.99, 0, '1', 16, 52, 'mod63.jpeg', 'mod62.jpeg', 'mod61.jpeg', '1', '1'),
(57, '1', '1', 0, 0, 0, '1', 13, 53, 'LOGO_COD-7982260550_arquivo_288.jpg', '', '', '0', '1'),
(58, '33', '33', 1, 1, 10, '1', 13, 54, 'web2.php', '', '', '0', '1'),
(59, 'Camiseta Canelada (Azul)', 'Camiseta Canelada (Azul)', 1, 1, 1, '1', 13, 55, 'web21.php', '', '', '0', '1'),
(60, 'Camiseta Canelada (Azul)', 'Camiseta Canelada (Azul)', 1, 1, 1, '1', 13, 56, '65705c9fc0d19g.jpg', '', '', '0', '1'),
(61, 'Camiseta Canelada (Azul)', 'Camiseta Canelada (Azul)', 0, 0, 0, '1', 13, 57, '65705c9fc0d19g.jpg', '', '', '0', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_produto_venda`
--

CREATE TABLE `tb_produto_venda` (
  `id_tb_produto_venda` int(11) NOT NULL,
  `id_venda_tb_produto_venda` int(11) NOT NULL,
  `id_produto_tb_produto_venda` int(11) NOT NULL,
  `quantidade_tb_produto_venda` int(11) NOT NULL,
  `grade_tb_produto_venda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_produto_venda`
--

INSERT INTO `tb_produto_venda` (`id_tb_produto_venda`, `id_venda_tb_produto_venda`, `id_produto_tb_produto_venda`, `quantidade_tb_produto_venda`, `grade_tb_produto_venda`) VALUES
(6, 9, 13, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(7, 9, 16, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(8, 10, 14, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(9, 11, 13, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(10, 12, 22, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";i:0;s:1:\"G\";s:1:\"1\";s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(11, 13, 15, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(12, 14, 15, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(13, 15, 15, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(14, 16, 15, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(15, 17, 15, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(16, 18, 14, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(17, 19, 25, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(18, 20, 19, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(19, 20, 34, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(20, 21, 12, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(21, 22, 27, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(22, 23, 33, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(23, 23, 16, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(24, 24, 11, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(25, 24, 18, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(26, 26, 26, 0, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";i:0;s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(27, 27, 23, 15, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:2:\"15\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(29, 29, 10, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(30, 30, 11, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(31, 31, 38, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(32, 32, 12, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(33, 33, 31, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";i:0;s:1:\"G\";s:1:\"1\";s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(35, 35, 31, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(36, 35, 18, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(37, 36, 51, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(38, 37, 16, 2, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";i:2;s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(39, 39, 10, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(40, 40, 33, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(41, 41, 53, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(42, 42, 51, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(43, 42, 52, 1, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"1\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(44, 43, 55, 3, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"3\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}'),
(45, 44, 56, 2, 'a:12:{s:2:\"PP\";i:0;s:1:\"P\";i:0;s:1:\"M\";s:1:\"2\";s:1:\"G\";i:0;s:2:\"GG\";i:0;i:34;i:0;i:36;i:0;i:38;i:0;i:40;i:0;i:42;i:0;i:44;i:0;i:46;i:0;}');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_tb_usuario` int(11) NOT NULL,
  `cpf_tb_usuario` varchar(11) DEFAULT NULL,
  `nome_tb_usuario` varchar(255) NOT NULL,
  `email_tb_usuario` varchar(255) NOT NULL,
  `contato_tb_usuario` varchar(20) NOT NULL COMMENT '(00) 00000-0000',
  `senha_tb_usuario` varchar(45) NOT NULL,
  `data_cadastro_tb_usuario` timestamp NULL DEFAULT current_timestamp(),
  `data_nascimento_tb_usuario` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Despejando dados para a tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_tb_usuario`, `cpf_tb_usuario`, `nome_tb_usuario`, `email_tb_usuario`, `contato_tb_usuario`, `senha_tb_usuario`, `data_cadastro_tb_usuario`, `data_nascimento_tb_usuario`) VALUES
(39, '070.314.863', 'Paulo Cesar Costa Cardoso', 'paulo.cardoso2408@gmail.com', '(85) 9 8997-6085', '123', '2024-06-30 23:49:06', '1997-08-24'),
(40, '107.463.873', 'Antonio Leandro Chagas Lima', 'leandro.c.lima789@gmail.com', '(85) 9 8524-4057', '94104954', '2024-06-30 23:55:00', '2005-01-11'),
(41, '076.073.373', 'Amanda Vitória ', 'amandavitoriacontas@live.com', '(85) 9 9250-9713', '2811', '2024-07-01 00:11:55', '1999-03-23'),
(42, '058.146.793', 'Auzimara Barroso Sampaio', 'auzimarabarroso@gmail.com', '(85) 9 9949-2150', 'Jose123', '2024-07-01 00:21:45', '1994-05-06'),
(44, '075.555.643', 'Vitória Ellen Pereira de Castro ', 'eeellen.vitoria@gmail.com', '(85) 9 9244-608', '140472Abc.', '2024-07-01 00:52:24', '1998-10-29'),
(45, '067.298.583', 'Mony viana ', 'Vianamony.2@gmail.com', '(85) 9 9845-0830', 'mony7238', '2024-07-01 01:08:31', '1998-01-22'),
(46, '059.442.653', 'Francisca Luana Pereira dos Santos ', 'luanapsantos0226@gmail.com', '(85) 9 9972-8254', '1234', '2024-07-01 01:18:34', '1996-10-02'),
(47, NULL, 'Maria Rosana Silva Pereira', 'rs4020649@gmail.com', '85994028855', '060113', '2024-07-01 09:36:57', NULL),
(48, NULL, 'Karla Vitoria Lopes Cardoso ', 'Karlalc140222@gmail.com', '85981481216', 'Raelravi1425', '2024-07-01 11:51:35', NULL),
(49, '087.465.953', 'Francisca Gabrielly Silva de sousa', 'gabriellysilvamont@gmail.com', '(85) 9 9704-5519', 'gaby1729', '2024-07-01 22:43:26', '2001-06-19'),
(50, NULL, 'Fernanda Alves Rocha Lima', 'fernandaalimma2@gmail.com', '85987049102', 'Fana1406', '2024-07-01 22:51:30', NULL),
(51, NULL, 'Charmila Freitas ', 'charmila_mila@hotmail.com', '85981573678', 'C242769t', '2024-07-01 23:12:46', NULL),
(52, NULL, 'Luzia Amanda Paula Pinto', 'luzya.amanda@hotmail.com', '85998189711', '13121994', '2024-07-01 23:14:53', NULL),
(53, NULL, 'Francisco Thiago melo Miranda ', 'thiagodomlk@gmail.com', '85988512656', 'Maria.01', '2024-07-02 00:03:08', NULL),
(54, NULL, 'Marcia Vanessa s', 'vsvanessavs89@gmail.com', '85992873248', '123456', '2024-07-02 00:55:24', NULL),
(55, NULL, 'Thayane Mara Almeida de Sousa ', 'thayannemara2018@gmail.com', '19997467545', 'yasminth@y1', '2024-07-02 13:25:44', NULL),
(56, NULL, 'Adélia Pereira Castelo ', 'adeliacastelo99@gmail.com', '85986587483', '99113303', '2024-07-02 16:56:14', NULL),
(57, NULL, 'Leomara Gomes Araújo ', 'leomara_ag@hotmail.com', '85996716395', 'leo251093', '2024-07-02 17:16:11', NULL),
(58, NULL, 'Maria Dara Araújo Sousa', 'Mdaraaraujo22@gmail.com ', '85986979815', 'ds1995', '2024-07-02 17:52:29', NULL),
(59, NULL, 'Rick', 'rick12@gmail.com', '85989976085', '123', '2024-07-02 18:19:39', NULL),
(60, '070.023.513', 'Antônia Amanda da Silva Daniel ', 'amandasil634@gmail.com', '(85) 9 9199-4300', 'amandadaniel', '2024-07-02 18:24:49', '2002-12-08'),
(61, '086.087.933', 'Paulo Ricardo Costa Cardoso ', 'ricardo.costah555@gmail.com', '(85) 9 8744-0118', 'ricardo123456', '2024-07-02 18:36:37', '2008-11-21'),
(62, NULL, 'Eulália Lobo', 'eulalialobobezerra@gmail.com', '85986891237', 'eulalia1818', '2024-07-02 19:08:39', NULL),
(63, '070.098.683', 'Jefferson Alves Saraiva', 'jeffersonalves410@gmail.com', '(85) 9 9982-4165', 'asdf1234mt', '2024-07-02 19:26:45', '1998-03-21'),
(64, NULL, 'Deise', 'Deisevarela69@gmail.com', '85991769883', 'enzoliz1', '2024-07-02 19:31:25', NULL),
(65, NULL, 'Elinete Ferreira da Silva', 'elinetesilva41@gmail.com', '85996991483', 'ferreira', '2024-07-02 21:45:44', NULL),
(66, '072.052.813', 'Adriana Oliveira de Lima', 'adriana20143117@gmail.com', '(85) 9 8418-5582', '99059943@', '2024-07-02 22:45:24', '1997-09-14'),
(67, NULL, 'Marta', 'martaabreuf@hotmail.com', '85994378580', 'marta', '2024-07-04 14:44:51', NULL),
(68, NULL, 'Antonia Vitória Moreno Santos ', 'vitoriamorenosz12@gmail.com', '85992277574', '12345', '2024-07-04 15:47:06', NULL),
(69, NULL, 'Liliana dias tavares', 'lilitavares07lk@gmail.com', '85996949066', 'L96949066l*', '2024-07-05 01:21:35', NULL),
(70, NULL, 'Liana Maria Rodrigues Mesquita Barbosa ', 'lia.mesquita@hotmail.com', '85997438104', '060886', '2024-07-06 20:16:17', NULL),
(71, NULL, 'Francisco Orleando Rodrigues Coelho', 'orleando_coelho@icloud.com', '85999891867', 'rita2808', '2024-07-06 21:51:28', NULL),
(72, NULL, 'Michelenajila@gmail.com', 'michelenajila@gmail.com', '85991615862', '162123Kmm', '2024-07-07 13:43:26', NULL),
(74, NULL, 'Francisca Edna Lima Teixeira ', 'ednat47@gmail.com', '85997222203', 'a849b71984', '2024-07-08 01:43:00', NULL),
(75, NULL, 'Patricia Costa Cardoso', 'pati', '85991006536', '123', '2024-07-09 00:38:42', NULL),
(76, NULL, 'Sara Ellem ', 'sarahelencar@icloud.com ', '85986990534', 'Jesus12', '2024-07-09 12:29:20', NULL),
(77, NULL, 'Gediel Dornelles ', 'gediel.dornelles@gmail.com', '5597050101', 'Gediel321.', '2024-07-13 19:35:21', NULL),
(78, NULL, 'Teste', 'Teste@hshsj', '28388383883883838338', '123', '2024-07-13 23:32:52', NULL),
(79, NULL, 'fsfsdfs', 'sfsfd', '123', '123', '2024-07-22 13:54:46', NULL),
(80, '070.314.863', 'Paulo', 'paulo.cardoso@gmail.com', '(85) 9 8997-6085', 'paulo', '2024-12-20 03:13:59', '1997-08-24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_venda`
--

CREATE TABLE `tb_venda` (
  `id_tb_venda` int(11) NOT NULL,
  `entrega_tb_venda` enum('0','1') NOT NULL COMMENT '0 = Não\n1 = Sim',
  `tx_entrega_tb_venda` float DEFAULT NULL,
  `pagamento_entrega_tb_venda` enum('0','1','2') NOT NULL COMMENT '0 = Pix\n1 = Espécie\n2 = Crédito/Débito',
  `status_tb_venda` enum('0','1','2','3','4','5') NOT NULL COMMENT '0 = Aguardando\n1 = Separado\n2 = Em rota\n3 = Entregue/Finalizado\n4 = Cancelado pelo Vendedor\n5 = Cancelado pelo Comprador',
  `data_cadastro_tb_venda` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario_tb_venda` int(11) NOT NULL,
  `endereco_entrega_tb_venda` varchar(255) DEFAULT NULL,
  `cancelamento_tb_venda` varchar(255) DEFAULT NULL,
  `taxa_desconto_tb_venda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tb_venda`
--

INSERT INTO `tb_venda` (`id_tb_venda`, `entrega_tb_venda`, `tx_entrega_tb_venda`, `pagamento_entrega_tb_venda`, `status_tb_venda`, `data_cadastro_tb_venda`, `id_usuario_tb_venda`, `endereco_entrega_tb_venda`, `cancelamento_tb_venda`, `taxa_desconto_tb_venda`) VALUES
(9, '0', 0, '2', '1', '2024-07-01 18:39:45', 42, '0', NULL, 10),
(10, '0', 0, '0', '1', '2024-07-01 23:26:55', 52, '0', NULL, NULL),
(11, '0', 0, '0', '1', '2024-07-02 00:26:21', 49, '0', NULL, 10),
(12, '0', 0, '0', '1', '2024-07-02 13:37:00', 41, '0', NULL, 10),
(13, '1', 2, '0', '1', '2024-07-02 17:17:07', 39, 'Rua Tv. 3, Nº 283, João Paulo II, (Sem) - Canindé - CE', NULL, NULL),
(14, '0', 0, '0', '4', '2024-07-02 18:48:13', 61, '0', 'Cancelado', NULL),
(15, '0', 0, '0', '4', '2024-07-02 18:48:21', 61, '0', 'Cancelado', NULL),
(16, '0', 0, '0', '4', '2024-07-02 18:48:31', 61, '0', 'Cancelado', 10),
(17, '1', 2, '1', '1', '2024-07-02 18:56:18', 60, 'Rua Rua Luís Vieira, Nº 596, Palestina, Canindé - Ceará', NULL, 10),
(18, '0', 0, '0', '1', '2024-07-02 19:09:41', 61, '0', NULL, 10),
(19, '0', 0, '0', '1', '2024-07-02 20:15:41', 39, '0', NULL, NULL),
(20, '0', 0, '2', '1', '2024-07-02 23:04:01', 66, '0', NULL, 10),
(21, '1', 2, '1', '1', '2024-07-03 17:52:35', 39, 'Rua Rua Ontoni Magalhães, Nº 982, Santa Luzia, (Por trás do posto Santa Luzia) - Canindé - CE', NULL, NULL),
(22, '0', 0, '0', '1', '2024-07-04 14:56:39', 67, '0', NULL, NULL),
(23, '0', 0, '1', '4', '2024-07-05 19:17:24', 39, '0', '', NULL),
(24, '0', 0, '0', '1', '2024-07-06 20:23:10', 70, '0', NULL, NULL),
(25, '0', 0, '0', '4', '2024-07-06 20:22:39', 70, '0', 'Pedido duplicado, cancelado!', NULL),
(26, '0', 0, '0', '1', '2024-07-06 22:44:43', 71, '0', NULL, NULL),
(27, '0', 0, '0', '4', '2024-07-07 13:23:34', 61, '0', 'Cancelado', NULL),
(29, '1', 2, '0', '5', '2024-07-07 15:44:48', 39, 'Rua Rua José Karam, Nº 1109, Santa Luzia, Canindé - Ceará', '', 10),
(30, '0', 0, '1', '5', '2024-07-08 00:36:18', 39, '0', '', NULL),
(31, '0', 0, '0', '1', '2024-07-08 17:49:40', 39, '0', NULL, NULL),
(32, '1', 2, '0', '1', '2024-07-09 14:11:31', 39, 'Rua Rua Odilom Macambira, Nº 1335, Can, () - Canindé - CE', NULL, NULL),
(33, '0', 0, '1', '5', '2024-07-10 18:51:18', 39, '0', 'Cancelar pedido', NULL),
(35, '1', 2, '0', '1', '2024-07-13 12:44:22', 39, 'Rua Rua B - Lot. Juazeiro, Nº 1008, Bela Vista, () - Canindé - CE', NULL, NULL),
(36, '0', 0, '0', '1', '2024-07-13 20:58:42', 39, '0', NULL, NULL),
(37, '0', 0, '0', '4', '2024-07-13 21:09:58', 77, '0', 'Cancelado', NULL),
(38, '0', 0, '0', '4', '2024-07-13 21:10:07', 77, '0', 'Cancelado', NULL),
(39, '0', 0, '0', '4', '2024-07-13 21:10:25', 77, '0', 'Cancelado', NULL),
(40, '0', 0, '0', '1', '2024-07-13 21:11:35', 45, '0', NULL, 10),
(41, '0', 0, '2', '4', '2024-07-19 16:44:58', 39, '0', '', NULL),
(42, '0', 0, '0', '1', '2024-07-19 16:45:31', 39, '0', NULL, NULL),
(43, '0', 0, '1', '0', '2024-07-22 16:01:57', 39, '0', NULL, NULL),
(44, '0', 0, '0', '0', '2024-09-30 23:11:42', 39, '0', NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_cupom`
--
ALTER TABLE `tb_cupom`
  ADD PRIMARY KEY (`id_tb_cupom`);

--
-- Índices de tabela `tb_departamento`
--
ALTER TABLE `tb_departamento`
  ADD PRIMARY KEY (`id_tb_departamento`);

--
-- Índices de tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD PRIMARY KEY (`id_tb_endereco`),
  ADD KEY `fk_tb_endereco_tb_usuario1_idx` (`id_usuario_tb_endereco`);

--
-- Índices de tabela `tb_grade`
--
ALTER TABLE `tb_grade`
  ADD PRIMARY KEY (`id_tb_grade`);

--
-- Índices de tabela `tb_item_cupom`
--
ALTER TABLE `tb_item_cupom`
  ADD PRIMARY KEY (`id_tb_item_cupom`),
  ADD KEY `fk_tb_item_cupom_tb_cupom1_idx` (`id_cupom_tb_item_cupom`),
  ADD KEY `fk_tb_item_cupom_tb_usuario1_idx` (`id_usuario_tb_item_cupom`);

--
-- Índices de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`id_tb_produto`),
  ADD KEY `fk_tb_produto_1_idx1` (`id_departamento_tb_produto`),
  ADD KEY `fk_tb_produto_tb_grade1_idx` (`tb_grade_id_tb_grade`);

--
-- Índices de tabela `tb_produto_venda`
--
ALTER TABLE `tb_produto_venda`
  ADD PRIMARY KEY (`id_tb_produto_venda`),
  ADD KEY `fk_tb_produto_venda_tb_venda1_idx` (`id_venda_tb_produto_venda`),
  ADD KEY `fk_tb_produto_venda_tb_produto1_idx` (`id_produto_tb_produto_venda`);

--
-- Índices de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_tb_usuario`);

--
-- Índices de tabela `tb_venda`
--
ALTER TABLE `tb_venda`
  ADD PRIMARY KEY (`id_tb_venda`),
  ADD KEY `fk_tb_venda_tb_usuario1_idx` (`id_usuario_tb_venda`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_cupom`
--
ALTER TABLE `tb_cupom`
  MODIFY `id_tb_cupom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_departamento`
--
ALTER TABLE `tb_departamento`
  MODIFY `id_tb_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  MODIFY `id_tb_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tb_grade`
--
ALTER TABLE `tb_grade`
  MODIFY `id_tb_grade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de tabela `tb_item_cupom`
--
ALTER TABLE `tb_item_cupom`
  MODIFY `id_tb_item_cupom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `id_tb_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `tb_produto_venda`
--
ALTER TABLE `tb_produto_venda`
  MODIFY `id_tb_produto_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_tb_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de tabela `tb_venda`
--
ALTER TABLE `tb_venda`
  MODIFY `id_tb_venda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD CONSTRAINT `fk_tb_endereco_tb_usuario1` FOREIGN KEY (`id_usuario_tb_endereco`) REFERENCES `tb_usuario` (`id_tb_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_item_cupom`
--
ALTER TABLE `tb_item_cupom`
  ADD CONSTRAINT `fk_tb_item_cupom_tb_cupom1` FOREIGN KEY (`id_cupom_tb_item_cupom`) REFERENCES `tb_cupom` (`id_tb_cupom`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_item_cupom_tb_usuario1` FOREIGN KEY (`id_usuario_tb_item_cupom`) REFERENCES `tb_usuario` (`id_tb_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD CONSTRAINT `fk_tb_produto_1` FOREIGN KEY (`id_departamento_tb_produto`) REFERENCES `tb_departamento` (`id_tb_departamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_produto_tb_grade1` FOREIGN KEY (`tb_grade_id_tb_grade`) REFERENCES `tb_grade` (`id_tb_grade`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_produto_venda`
--
ALTER TABLE `tb_produto_venda`
  ADD CONSTRAINT `fk_tb_produto_venda_tb_produto1` FOREIGN KEY (`id_produto_tb_produto_venda`) REFERENCES `tb_produto` (`id_tb_produto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tb_produto_venda_tb_venda1` FOREIGN KEY (`id_venda_tb_produto_venda`) REFERENCES `tb_venda` (`id_tb_venda`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_venda`
--
ALTER TABLE `tb_venda`
  ADD CONSTRAINT `fk_tb_venda_tb_usuario1` FOREIGN KEY (`id_usuario_tb_venda`) REFERENCES `tb_usuario` (`id_tb_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
