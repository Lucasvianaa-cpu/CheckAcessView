-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql304.infinityfree.com
-- Tempo de geração: 19/05/2024 às 12:02
-- Versão do servidor: 10.4.17-MariaDB
-- Versão do PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `if0_35730712_checkacessview`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`, `descricao`, `categoria_id`, `empresa_id`) VALUES
(6, 'Admin', 'Administrador', 1, 1),
(7, 'Gerente de RH', 'Gerente de RH', 5, 1),
(8, 'Auxiliar de RH', 'Auxiliar de RH', 5, 1),
(9, 'Gerente Financeiro', 'Gerente Financeiro', 6, 1),
(10, 'Auxiliar Financeiro', 'Auxiliar Financeiro', 6, 1),
(11, 'Supervisor', 'Supervisor de Suporte', 7, 1),
(12, 'Suporte Nível 1', 'Suporte Nível 1', 7, 1),
(13, 'Suporte Nível 2', 'Suporte Nível 2', 7, 1),
(14, 'Suporte Nível 3', 'Suporte Nível 3', 7, 1),
(15, 'Gerente Administrativo', 'Gerente Administrativo', 8, 1),
(16, 'Auxiliar Administrativo', 'Auxiliar Administrativo', 8, 1),
(17, 'CEO', 'CEO', 9, 1),
(19, 'Supervisor de Marketing', 'Supervisor de Marketing', 11, 1),
(20, 'Design', 'Design', 11, 1),
(21, 'Gestor de Tráfegos', 'Gestor de Tráfegos', 11, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `is_trash` tinyint(4) DEFAULT 0,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `descricao`, `is_active`, `is_trash`, `empresa_id`) VALUES
(1, 'Admin', 'Administrador', 1, 0, 1),
(5, 'Recursos Humanos', 'RH', 1, 0, 1),
(6, 'Financeiro', 'Financeiro', 1, 0, 1),
(7, 'Suporte', 'Suporte', 1, 0, 1),
(8, 'Administrativo', 'Administração', 1, 0, 1),
(9, 'Direção', 'Direção', 1, 0, 1),
(10, 'Limpeza', 'Limpeza', 1, 0, 1),
(11, 'Marketing', 'Marketing', 1, 0, 1),
(12, 'Adminssss', 'adddddd', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `cod_ibge` int(11) NOT NULL,
  `estado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cidades`
--

INSERT INTO `cidades` (`id`, `nome`, `cod_ibge`, `estado_id`) VALUES
(1, 'Birigui', 3506508, 1),
(4, 'Araçatuba', 3502804, 1),
(5, 'Itanhaém', 3522109, 1),
(6, 'Cuiabá', 5103403, 12),
(7, 'Rio de Janeiro', 3300605, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `razao_social` varchar(200) NOT NULL,
  `nome_fantasia` varchar(200) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `ie` varchar(15) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `numero` varchar(8) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `qtd_funcionarios` int(11) NOT NULL,
  `desc_empresa` varchar(200) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) DEFAULT 1,
  `caminho_foto` varchar(245) DEFAULT NULL,
  `is_trash` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id`, `razao_social`, `nome_fantasia`, `cnpj`, `ie`, `cep`, `endereco`, `bairro`, `numero`, `telefone`, `qtd_funcionarios`, `desc_empresa`, `created`, `is_active`, `caminho_foto`, `is_trash`) VALUES
(1, 'CheckAcessView LTDA', 'Sistema de Ponto Eletrônico CheckAcessView', '14.743.109/0001-30', '387.089.109.425', '16200-397', 'Rua João de Souza Vilaça', 'Bosque da Saúde', '100', '(18) 2843-4129', 10, 'Empresa Focada na solução rápida para sua empresa com seu ponto eletrônico automatizado e prático.', '2023-08-01 19:28:13', 1, 'fotos/CheckAcessView LTDA-1292875367-perfil.png', 0),
(4, 'Ghelt Componentes de Software Ltda', 'Ghelt', '10.202.993/0001', 'isento', '16.015-303', 'Rua Minas Gerais', 'Jardim Sumaré', '995', '(18) 99125-0603', 2, 'Desenvolvimento e licenciamento de computador', '2024-01-08 21:56:54', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL,
  `rua` varchar(200) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `numero` varchar(8) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `cidade_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `rua`, `bairro`, `numero`, `cep`, `cidade_id`, `user_id`) VALUES
(11, 'Rua São Benedito', 'Jardim Klayton', '1270', '16203039', 1, 33),
(12, 'Tamoio', 'Vila Xavier', '261', '16203-014', 1, 38),
(14, 'Rua Sao Benedito', 'Jardim Klayton', '10', '16203039', 1, 2),
(20, 'Rua Sao Benedito', 'Jardim Klayton', '10', '16203039', 1, 2),
(21, 'Rua Minas Gerais', 'Jardim Sumaré', '995', '16.015-303', 4, 64),
(22, 'Rua Manoel Vieira da Silva', 'Jd. São Cristóvão', '1377', '16200346', 1, 34),
(23, 'Rua Tamoio', 'Vila Xavier', '261', '16203014', 1, 71);

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `id` int(11) NOT NULL,
  `num_patrimonio` varchar(45) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `created` date NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  `is_trash` tinyint(4) DEFAULT 0,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `equipamentos`
--

INSERT INTO `equipamentos` (`id`, `num_patrimonio`, `descricao`, `is_active`, `created`, `funcionario_id`, `is_trash`, `empresa_id`) VALUES
(33, '1111', 'Notebook Acer Gaming', 1, '2023-10-30', 22, 0, 1),
(34, '22222', 'Monitor Samsung', 1, '2023-10-31', 22, 0, 1),
(36, '2125252', 'TV', 1, '2023-11-02', 22, 0, 1),
(37, '515151', 'TV', 1, '2023-12-14', 21, 0, 1),
(38, '55659', 'Teclado', 1, '2024-01-05', 22, 0, 1),
(39, '0001', 'Notebook Dell ffdfd', 0, '2024-01-08', 21, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `sigla` char(2) NOT NULL,
  `nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `estados`
--

INSERT INTO `estados` (`id`, `sigla`, `nome`) VALUES
(1, 'SP', 'São Paulo'),
(2, 'RJ', 'Rio de Janeiro'),
(8, 'MG', 'Minas Gerais'),
(9, 'AL', 'Alagoas'),
(10, 'SC', 'Santa Catarina'),
(11, 'DF', 'Distrito Federal'),
(12, 'MT', 'Mato Grosso'),
(13, 'MS', 'Mato Grosso do Sul'),
(14, 'PR', 'Paraná'),
(15, 'TO', 'Tocantins'),
(16, 'AM', 'Amazônia'),
(17, 'RS', 'Rio Grande do Sul'),
(18, 'RN', 'Rio Grande do Norte'),
(19, 'ES', 'Espiríto Santo'),
(20, 'GO', 'Goiás'),
(21, 'PE', 'Pernambuco'),
(22, 'BA', 'Bahia'),
(23, 'AC', 'Acre'),
(24, 'AP', 'Amapá'),
(25, 'CE', 'Ceará'),
(26, 'MA', 'Maranhão'),
(27, 'PB', 'Paraíba'),
(28, 'PA', 'Pará'),
(29, 'PI', 'Piauí'),
(30, 'RO', 'Rondônia'),
(31, 'RR', 'Roraíma'),
(32, 'SE', 'Sergipe');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `salario` decimal(12,2) NOT NULL,
  `cargo_id` int(11) NOT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `plano_saude_id` int(11) DEFAULT NULL,
  `empresa_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_trash` tinyint(4) DEFAULT 0,
  `admissao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `salario`, `cargo_id`, `is_active`, `created`, `plano_saude_id`, `empresa_id`, `user_id`, `is_trash`, `admissao`) VALUES
(1, '1000.00', 6, 1, '2023-10-20 19:40:46', 1, 1, 1, 0, '2023-10-20 00:00:00'),
(2, '4000.00', 7, 1, '2023-03-01 00:00:00', 1, 1, 2, 0, '2023-10-01 00:00:00'),
(21, '2000.00', 15, 1, '2023-10-27 12:54:42', 3, 1, 34, 0, '2023-01-01 00:00:00'),
(22, '2000.00', 15, 1, '2023-10-27 12:54:58', 3, 1, 33, 0, '2023-01-01 00:00:00'),
(23, '1800.00', 12, 1, '2023-10-27 12:55:23', 4, 1, 32, 0, '2023-01-27 00:00:00'),
(24, '1000.00', 21, 1, '2023-10-27 14:59:15', 1, 1, 37, 0, '2023-01-27 00:00:00'),
(25, '1259.00', 12, 1, '2023-12-30 12:43:53', 1, 1, 38, 0, '2023-11-10 00:00:00'),
(26, '1259.00', 11, 1, '2023-12-30 12:46:05', 1, 1, 39, 0, '2023-12-01 00:00:00'),
(27, '5000.00', 10, 1, '2024-01-08 20:19:54', 5, 4, 64, 0, '2024-01-08 00:00:00'),
(29, '1000.00', 8, 1, '2024-01-25 14:35:08', 1, 4, 66, 0, '2024-01-25 00:00:00'),
(30, '1000.00', 17, 1, '2024-01-29 18:12:52', 1, 1, 65, 0, '2024-01-29 00:00:00'),
(31, '5000.00', 11, 1, '2024-04-12 16:46:51', 3, 1, 69, 0, '2024-04-12 00:00:00'),
(32, '1000.00', 11, 1, '2024-05-19 12:15:54', 1, 1, 71, 0, '2024-05-19 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios_plantoes`
--

CREATE TABLE `funcionarios_plantoes` (
  `id` int(11) NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  `plantao_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `historicos_pontos`
--

CREATE TABLE `historicos_pontos` (
  `id` int(11) NOT NULL,
  `created` varchar(45) NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
  `funcionario_id` int(11) NOT NULL,
  `pontos_horas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `historicos_pontos`
--

INSERT INTO `historicos_pontos` (`id`, `created`, `funcionario_id`, `pontos_horas_id`) VALUES
(118, '2023-10-27 13:15:00', 2, 138),
(119, '2023-10-27 13:17:00', 2, 139),
(120, '2023-10-27 13:18:00', 2, 140),
(121, '2023-10-27 13:18:00', 2, 141),
(122, '2023-10-27 13:20:00', 22, 142),
(123, '2023-10-27 13:20:00', 22, 143),
(124, '2023-10-27 13:20:00', 22, 144),
(125, '2023-10-27 13:20:00', 22, 145),
(130, '2023-10-27 15:33:00', 21, 150),
(131, '2023-10-27 15:33:00', 21, 151),
(132, '2023-10-27 15:34:00', 21, 152),
(133, '2023-10-27 15:43:00', 21, 153),
(134, '2023-10-28 17:06:00', 21, 154),
(135, '2023-10-28 17:07:00', 22, 155),
(136, '2023-10-29 17:23:00', 22, 156),
(137, '2023-10-29 17:26:00', 22, 157),
(138, '2023-10-29 17:28:00', 22, 158),
(139, '2023-10-29 17:56:00', 22, 159),
(140, '2023-10-29 17:56:00', 21, 160),
(141, '2023-10-29 18:02:00', 21, 161),
(145, '2023-10-31 07:51:00', 22, 165),
(146, '2023-10-31 08:19:00', 22, 166),
(147, '2023-10-31 10:54:00', 22, 167),
(151, '2023-10-31 15:52:00', 22, 171),
(152, '2023-11-01 08:26:00', 22, 172),
(153, '2023-11-01 08:27:00', 22, 173),
(154, '2023-11-01 16:10:00', 22, 174),
(155, '2023-11-01 16:13:00', 22, 175),
(162, '2023-11-02 19:01:00', 22, 182),
(163, '2023-11-02 19:01:00', 22, 183),
(164, '2023-11-02 19:04:00', 22, 184),
(166, '2023-11-02 20:24:00', 22, 186),
(167, '2023-11-03 08:43:00', 22, 187),
(171, '2023-11-03 18:08:00', 22, 191),
(172, '2023-11-03 18:09:00', 22, 192),
(173, '2023-11-03 18:10:00', 22, 193),
(174, '2023-11-03 18:10:00', 21, 194),
(175, '2023-11-04 08:49:00', 22, 195),
(176, '2023-11-04 08:53:00', 22, 196),
(177, '2023-11-06 09:00:00', 22, 197),
(178, '2023-11-06 12:52:00', 22, 198),
(179, '2023-11-06 17:45:00', 22, 199),
(180, '2023-11-06 17:45:00', 22, 200),
(181, '2023-11-07 08:06:00', 22, 201),
(182, '2023-11-07 12:34:00', 22, 202),
(183, '2023-11-07 13:07:00', 22, 203),
(184, '2023-11-07 15:49:00', 22, 204),
(185, '2023-11-30 08:55:00', 22, 205),
(186, '2023-12-14 16:16:00', 22, 206),
(187, '2023-12-14 16:51:00', 22, 207),
(188, '2023-12-14 16:54:00', 22, 208),
(190, '2023-12-14 20:17:00', 22, 210),
(191, '2023-12-17 13:58:00', 22, 211),
(192, '2023-12-26 10:30:00', 22, 212),
(193, '1/5/24, 8:21 PM', 22, 216),
(194, '1/5/24, 8:21 PM', 22, 217),
(195, '1/5/24, 8:22 PM', 22, 218),
(196, '1/5/24, 8:23 PM', 22, 219),
(197, '1/7/24, 8:08 PM', 22, 220),
(198, '1/7/24, 8:10 PM', 22, 221),
(199, '1/29/24, 3:11 PM', 22, 222),
(200, '1/29/24, 3:12 PM', 22, 223),
(201, '1/29/24, 8:37 PM', 22, 224),
(202, '1/29/24, 8:42 PM', 22, 225),
(203, '2/8/24, 9:40 AM', 22, 226),
(204, '4/7/24, 2:45 PM', 21, 227),
(205, '4/10/24, 7:28 PM', 2, 228),
(206, '4/10/24, 7:29 PM', 21, 229),
(207, '4/10/24, 7:29 PM', 22, 230),
(208, '4/10/24, 7:29 PM', 21, 231),
(209, '4/10/24, 7:33 PM', 21, 232),
(210, '4/10/24, 7:34 PM', 22, 233),
(211, '4/10/24, 7:47 PM', 21, 234),
(212, '4/15/24, 6:48 PM', 22, 235),
(213, '4/15/24, 6:52 PM', 22, 236),
(214, '4/15/24, 7:08 PM', 22, 237),
(215, '5/12/24, 11:32 AM', 22, 238),
(216, '5/19/24, 1:19 PM', 32, 239);

-- --------------------------------------------------------

--
-- Estrutura para tabela `holerites`
--

CREATE TABLE `holerites` (
  `id` int(11) NOT NULL,
  `data_holerite` date NOT NULL,
  `mes` varchar(45) NOT NULL,
  `salario_base` decimal(12,2) NOT NULL,
  `base_fgts` decimal(12,2) NOT NULL,
  `base_inss` decimal(12,2) DEFAULT NULL,
  `fgts` decimal(12,2) DEFAULT NULL,
  `ir` decimal(12,2) DEFAULT NULL,
  `total_descontos` decimal(12,2) NOT NULL,
  `total_vencimentos` decimal(12,2) NOT NULL,
  `liquido` decimal(12,2) NOT NULL,
  `created` date NOT NULL,
  `funcionario_id` int(11) NOT NULL,
  `salario_checkbox` tinyint(4) DEFAULT NULL,
  `dsr_checkbox` tinyint(4) DEFAULT NULL,
  `adc_sobre_checkbox` tinyint(4) DEFAULT NULL,
  `hr50_checkbox` tinyint(4) DEFAULT NULL,
  `hr80_checkbox` tinyint(4) DEFAULT NULL,
  `hr100_checkbox` tinyint(4) DEFAULT NULL,
  `ferias_checkbox` tinyint(4) DEFAULT NULL,
  `vale_alimentacao_checkbox` tinyint(4) DEFAULT NULL,
  `adiantamento_checkbox` tinyint(4) DEFAULT NULL,
  `salario_codigo` varchar(45) DEFAULT NULL,
  `salario_descricao` varchar(45) DEFAULT NULL,
  `salario_referencia` varchar(45) DEFAULT NULL,
  `salario_vencimento` decimal(12,2) DEFAULT NULL,
  `salario_desconto` decimal(12,2) DEFAULT NULL,
  `inss_checkbox` tinyint(4) DEFAULT NULL,
  `dsr_codigo` varchar(45) DEFAULT NULL,
  `dsr_descricao` varchar(45) DEFAULT NULL,
  `dsr_referencia` varchar(45) DEFAULT NULL,
  `dsr_vencimento` decimal(12,2) DEFAULT NULL,
  `dsr_desconto` decimal(12,2) DEFAULT NULL,
  `adc_sobre_codigo` varchar(45) DEFAULT NULL,
  `adc_sobre_descricao` varchar(45) DEFAULT NULL,
  `adc_sobre_referencia` varchar(45) DEFAULT NULL,
  `adc_sobre_vencimento` decimal(12,2) DEFAULT NULL,
  `adc_sobre_desconto` decimal(12,2) DEFAULT NULL,
  `hr50_codigo` varchar(45) DEFAULT NULL,
  `hr50_descricao` varchar(45) DEFAULT NULL,
  `hr50_referencia` varchar(45) DEFAULT NULL,
  `hr50_vencimento` decimal(12,2) DEFAULT NULL,
  `hr50_desconto` decimal(12,2) DEFAULT NULL,
  `hr80_codigo` varchar(45) DEFAULT NULL,
  `hr80_descricao` varchar(45) DEFAULT NULL,
  `hr80_referencia` varchar(45) DEFAULT NULL,
  `hr80_vencimento` decimal(12,2) DEFAULT NULL,
  `hr80_desconto` decimal(12,2) DEFAULT NULL,
  `hr100_codigo` varchar(45) DEFAULT NULL,
  `hr100_descricao` varchar(45) DEFAULT NULL,
  `hr100_referencia` varchar(45) DEFAULT NULL,
  `hr100_vencimento` varchar(45) DEFAULT NULL,
  `hr100_desconto` varchar(45) DEFAULT NULL,
  `ferias_codigo` varchar(45) DEFAULT NULL,
  `ferias_descricao` varchar(45) DEFAULT NULL,
  `ferias_referencia` varchar(45) DEFAULT NULL,
  `ferias_vencimento` decimal(12,2) DEFAULT NULL,
  `ferias_desconto` decimal(12,2) DEFAULT NULL,
  `vale_alimentacao_codigo` varchar(45) DEFAULT NULL,
  `vale_alimentacao_descricao` varchar(45) DEFAULT NULL,
  `vale_alimentacao_referencia` varchar(45) DEFAULT NULL,
  `vale_alimentacao_vencimento` decimal(12,2) DEFAULT NULL,
  `vale_alimentacao_desconto` decimal(12,2) DEFAULT NULL,
  `adiantamento_codigo` varchar(45) DEFAULT NULL,
  `adiantamento_descricao` varchar(45) DEFAULT NULL,
  `adiantamento_referencia` varchar(45) DEFAULT NULL,
  `adiantamento_vencimento` decimal(12,2) DEFAULT NULL,
  `adiantamento_desconto` decimal(12,2) DEFAULT NULL,
  `inss_codigo` varchar(45) DEFAULT NULL,
  `inss_descricao` varchar(45) DEFAULT NULL,
  `inss_referencia` varchar(45) DEFAULT NULL,
  `inss_vencimento` decimal(12,2) DEFAULT NULL,
  `inss_desconto` decimal(12,2) DEFAULT NULL,
  `ano` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `holerites`
--

INSERT INTO `holerites` (`id`, `data_holerite`, `mes`, `salario_base`, `base_fgts`, `base_inss`, `fgts`, `ir`, `total_descontos`, `total_vencimentos`, `liquido`, `created`, `funcionario_id`, `salario_checkbox`, `dsr_checkbox`, `adc_sobre_checkbox`, `hr50_checkbox`, `hr80_checkbox`, `hr100_checkbox`, `ferias_checkbox`, `vale_alimentacao_checkbox`, `adiantamento_checkbox`, `salario_codigo`, `salario_descricao`, `salario_referencia`, `salario_vencimento`, `salario_desconto`, `inss_checkbox`, `dsr_codigo`, `dsr_descricao`, `dsr_referencia`, `dsr_vencimento`, `dsr_desconto`, `adc_sobre_codigo`, `adc_sobre_descricao`, `adc_sobre_referencia`, `adc_sobre_vencimento`, `adc_sobre_desconto`, `hr50_codigo`, `hr50_descricao`, `hr50_referencia`, `hr50_vencimento`, `hr50_desconto`, `hr80_codigo`, `hr80_descricao`, `hr80_referencia`, `hr80_vencimento`, `hr80_desconto`, `hr100_codigo`, `hr100_descricao`, `hr100_referencia`, `hr100_vencimento`, `hr100_desconto`, `ferias_codigo`, `ferias_descricao`, `ferias_referencia`, `ferias_vencimento`, `ferias_desconto`, `vale_alimentacao_codigo`, `vale_alimentacao_descricao`, `vale_alimentacao_referencia`, `vale_alimentacao_vencimento`, `vale_alimentacao_desconto`, `adiantamento_codigo`, `adiantamento_descricao`, `adiantamento_referencia`, `adiantamento_vencimento`, `adiantamento_desconto`, `inss_codigo`, `inss_descricao`, `inss_referencia`, `inss_vencimento`, `inss_desconto`, `ano`) VALUES
(20, '2023-11-01', 'Outubro', '2000.00', '2000.00', '2000.00', '200.00', '0.00', '200.00', '3010.00', '2860.00', '2023-10-30', 22, 1, 1, 1, 1, 0, 1, 0, NULL, NULL, '1', 'Salário do Mês', '48:00', '2000.00', '0.00', 1, '250', 'Reflexo DSR', '0:00', '10.00', '0.00', '370', 'Adicional de Sobreaviso', '4:00', '200.00', '0.00', '204', 'Hora Extra 50%', '5:00', '150.00', '0.00', '', '', '', NULL, NULL, '544', 'Hora Extra 100%', '2:00', '150.00', '0', '', '', '', NULL, NULL, '100', 'Vale Alimentação', '48:00', '500.00', '0.00', '', '', '', NULL, NULL, '998', 'I.N.S.S', '7:88', '0.00', '150.00', 2023),
(21, '2024-01-05', 'Janeiro', '2000.00', '2000.00', '2000.00', '2000.00', '2000.00', '10.00', '2000.00', '2000.00', '2024-01-05', 22, 1, 0, 0, 0, 0, 0, 0, NULL, NULL, '1', 'Salário', '48:00', '2000.00', '0.00', 0, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, '', '', '', NULL, NULL, 2024);

-- --------------------------------------------------------

--
-- Estrutura para tabela `planos_saudes`
--

CREATE TABLE `planos_saudes` (
  `id` int(11) NOT NULL,
  `registro` varchar(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) DEFAULT 1,
  `is_trash` tinyint(4) DEFAULT 0,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `planos_saudes`
--

INSERT INTO `planos_saudes` (`id`, `registro`, `nome`, `descricao`, `telefone`, `celular`, `created`, `is_active`, `is_trash`, `empresa_id`) VALUES
(1, '11111', 'Sem Plano', 'Sem convênio com Plano', '(11)1111-1111', '(11)1111-1111', '2023-10-20 10:44:05', 0, 0, 1),
(3, '12345', 'Plano Unimed', 'Unimed', '(18) 2873-3153', '(18) 97281-3849', '2023-10-22 12:20:17', 1, 0, 1),
(4, '5426', 'Santa Casa Clínica', 'Santa Casa Clínica', '(12) 2457-8002', '(12) 97214-4128', '2023-10-22 12:20:52', 1, 0, 1),
(5, '545345345', 'Santa Casa Saúde', 'Plano Familiar Santa Casa', '12646', '2121212', '2024-01-08 21:43:01', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `plantoes`
--

CREATE TABLE `plantoes` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_termino` time DEFAULT NULL,
  `hora_total` time DEFAULT NULL,
  `funcionario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `plantoes`
--

INSERT INTO `plantoes` (`id`, `data`, `hora_inicio`, `hora_termino`, `hora_total`, `funcionario_id`) VALUES
(27, '2023-10-31', '12:31:00', '12:32:00', '00:01:00', 23),
(28, '2023-10-31', '12:33:00', '19:15:00', '06:42:00', 23),
(29, '2023-10-31', '12:56:00', '12:57:00', '00:01:00', 22),
(30, '2023-11-01', '16:13:00', '16:19:00', '00:06:00', 22),
(31, '2023-11-02', '12:07:00', '12:10:00', '00:03:00', 22),
(32, '2023-11-02', '17:41:00', '17:42:00', '00:01:00', 22),
(33, '2023-11-03', '18:06:00', '18:07:00', '00:01:00', 22),
(34, '2023-11-04', '15:31:00', '15:33:00', '00:02:00', 22),
(35, '2023-11-04', '20:27:00', '13:11:00', '07:16:00', 22),
(36, '2023-11-05', '17:17:00', '17:18:00', '00:01:00', 22),
(37, '2023-11-07', '09:06:00', '09:07:00', '00:01:00', 22),
(38, '2023-11-08', '16:00:00', '16:25:00', '00:25:00', 22),
(39, '2023-11-13', '19:15:00', '19:16:00', '00:01:00', 23),
(64, '2024-01-02', '11:03:00', '11:04:00', '00:01:00', 22),
(65, '2024-01-05', '11:58:00', '12:00:00', '00:02:00', 22),
(66, '2024-01-05', '14:16:00', '14:17:00', '00:01:00', 22),
(67, '2024-01-05', '19:23:00', '19:10:00', '00:13:00', 22);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pontos_horas`
--

CREATE TABLE `pontos_horas` (
  `id` int(11) NOT NULL,
  `data_ponto` date NOT NULL,
  `hora` time NOT NULL,
  `funcionario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `pontos_horas`
--

INSERT INTO `pontos_horas` (`id`, `data_ponto`, `hora`, `funcionario_id`) VALUES
(138, '2023-12-14', '08:05:00', 2),
(139, '2023-10-27', '11:30:00', 2),
(140, '2023-10-27', '13:00:00', 2),
(141, '2023-10-27', '18:00:00', 2),
(142, '2023-10-27', '08:30:00', 22),
(143, '2023-10-27', '12:30:19', 22),
(144, '2023-10-27', '14:30:00', 22),
(145, '2023-10-27', '19:01:27', 22),
(150, '2023-10-27', '15:33:16', 21),
(151, '2023-10-27', '15:33:58', 21),
(152, '2023-10-27', '15:34:39', 21),
(153, '2023-10-27', '15:43:56', 21),
(154, '2023-10-28', '17:06:52', 21),
(155, '2023-10-28', '17:07:02', 22),
(156, '2023-10-29', '17:23:05', 22),
(157, '2023-10-29', '17:26:00', 22),
(158, '2023-10-29', '17:28:33', 22),
(159, '2023-10-29', '17:56:23', 22),
(160, '2023-10-29', '17:56:35', 21),
(161, '2023-10-29', '18:02:16', 21),
(165, '2023-10-31', '07:51:58', 22),
(166, '2023-10-31', '08:19:53', 22),
(167, '2023-10-31', '10:54:13', 22),
(168, '2023-10-31', '11:38:36', 23),
(171, '2023-10-31', '15:52:15', 22),
(172, '2023-11-01', '08:26:02', 22),
(173, '2023-11-01', '08:27:03', 22),
(174, '2023-11-01', '16:10:25', 22),
(175, '2023-11-01', '16:13:26', 22),
(182, '2023-11-02', '19:01:11', 22),
(183, '2023-11-02', '19:01:18', 22),
(184, '2023-11-02', '19:04:57', 22),
(186, '2023-11-02', '20:24:37', 22),
(187, '2023-11-03', '08:43:22', 22),
(191, '2023-11-03', '18:08:01', 22),
(192, '2023-11-03', '18:09:58', 22),
(193, '2023-11-03', '18:10:26', 22),
(194, '2023-11-03', '18:10:45', 21),
(195, '2023-11-04', '08:49:32', 22),
(196, '2023-11-04', '08:53:49', 22),
(197, '2023-11-06', '09:00:28', 22),
(198, '2023-11-06', '12:52:49', 22),
(199, '2023-11-06', '17:45:04', 22),
(200, '2023-11-06', '17:45:26', 22),
(201, '2023-11-07', '08:06:21', 22),
(202, '2023-11-07', '12:34:04', 22),
(203, '2023-11-07', '13:07:54', 22),
(204, '2023-11-07', '15:49:13', 22),
(205, '2023-11-30', '08:55:46', 22),
(206, '2023-12-14', '16:16:26', 22),
(207, '2023-12-14', '16:51:19', 22),
(208, '2023-12-14', '16:54:39', 22),
(210, '2023-12-14', '20:17:46', 22),
(211, '2023-12-17', '13:58:40', 22),
(212, '2023-12-26', '10:30:28', 22),
(213, '2023-12-30', '12:40:31', 21),
(214, '2023-12-30', '13:13:55', 25),
(215, '2024-01-02', '09:28:12', 22),
(216, '2024-01-05', '19:21:18', 22),
(217, '2024-01-05', '19:21:33', 22),
(218, '2024-01-05', '19:22:06', 22),
(219, '2024-01-05', '19:30:00', 22),
(220, '2024-01-07', '19:08:29', 22),
(221, '2024-01-07', '19:10:35', 22),
(222, '2024-01-29', '14:11:38', 22),
(223, '2024-01-29', '14:12:30', 22),
(224, '2024-01-29', '19:37:13', 22),
(225, '2024-01-29', '19:42:36', 22),
(226, '2024-02-08', '08:40:24', 22),
(227, '2024-04-07', '14:45:30', 21),
(228, '2024-04-10', '19:28:53', 2),
(229, '2024-04-10', '19:29:14', 21),
(230, '2024-04-10', '19:29:23', 22),
(231, '2024-04-10', '19:29:59', 21),
(232, '2024-04-10', '19:33:54', 21),
(233, '2024-04-10', '19:34:52', 22),
(234, '2024-04-10', '19:47:48', 21),
(235, '2024-04-15', '18:48:14', 22),
(236, '2024-04-15', '18:52:47', 22),
(237, '2024-04-15', '19:08:40', 22),
(238, '2024-05-12', '11:32:11', 22),
(239, '2024-05-19', '13:19:01', 32);

-- --------------------------------------------------------

--
-- Estrutura para tabela `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `descricao` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `roles`
--

INSERT INTO `roles` (`id`, `is_active`, `created`, `descricao`) VALUES
(1, 1, '2023-07-12 01:25:50', 'Admin'),
(2, 1, '2023-07-12 01:26:57', 'RH'),
(3, 1, '2023-07-12 21:35:39', 'Funcionário'),
(4, 1, '2023-07-12 21:35:39', 'Convidado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `nome` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `email` varchar(120) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `tipo_sanguineo` char(3) DEFAULT NULL,
  `exp_profissional` varchar(250) DEFAULT NULL,
  `agencia` varchar(8) DEFAULT NULL,
  `conta` varchar(25) DEFAULT NULL,
  `codigo_banco` varchar(5) DEFAULT NULL,
  `pix` varchar(120) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `uid_rfid` varchar(255) DEFAULT NULL,
  `email_empresarial` varchar(120) DEFAULT NULL,
  `n_carteira_trabalho` varchar(45) NOT NULL,
  `realiza_plantao` tinyint(4) DEFAULT NULL,
  `caminho_foto` varchar(256) DEFAULT NULL,
  `is_trash` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `is_active`, `created`, `nome`, `password`, `sobrenome`, `cpf`, `rg`, `email`, `telefone`, `data_nascimento`, `tipo_sanguineo`, `exp_profissional`, `agencia`, `conta`, `codigo_banco`, `pix`, `role_id`, `uid_rfid`, `email_empresarial`, `n_carteira_trabalho`, `realiza_plantao`, `caminho_foto`, `is_trash`) VALUES
(1, 1, '2023-08-10 20:08:05', 'Admin', '$2y$10$B99.THkKuD8s34WSJOvQWejG6USKibD5t9XvLLNF6Fdrzh9vcjwwi', 'Empresa', NULL, NULL, 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '', NULL, NULL, 0),
(2, 1, '2023-08-10 20:08:30', 'Gerente', '$2y$10$yerdRGxP/Fl5UWj5rRWcie8v.Fi69x2MNCPUbLHjZrdXPy8bW0O/K', 'RH', '159.940.480-03', '2052100125', 'rh@rh.com', '02236203', '2001-08-07', 'O', 'aa', 'aa', 'a', 'a', 'aa', 2, '0009903871', 'rh@rh.com', 'aaa', 0, 'fotos/-30442767.jpeg', 0),
(32, 1, '2023-10-24 18:38:08', 'Funcionário', '$2y$10$fGl0hOm8TkRdPokgeVuqHeE3s1IMcvimlnEv4hJ88DZaz587RHn4G', 'Teste', NULL, NULL, 'funcionario@funcionario.com', NULL, '2002-04-10', NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, '', 1, NULL, 0),
(33, 1, '2023-10-25 08:51:09', 'Lucas Viana', '$2y$10$SXvgn1fmbCqrJvQC4LP3Au3SJzGOF/YF5BPIvZrOfY9yJ1m3mdx3W', 'Rodrigues', '463.837.838-23', '52.121.827-5', 'lucas1042@live.com', '(18) 99666-6724', '2001-08-07', 'O+', 'Fundador e Desenvolvedor Web nesta empresa', '0174', '00001235-6', '041', '46383783823', 3, '0009329173', 'lucas1042@live.com', '11111111', 1, 'fotos/-1925966782.jpg', 0),
(34, 1, '2023-10-25 08:59:51', 'Jaine', '$2y$10$USX0/fSY6NqzTamcrHLlUOA/gn/opNay19i9p.TLQPWzTJY0v6PWi', 'O Juacy', '431.566.678-54', '54.284.154-x', 'jaine.ojuacy@gmail.com', '18998222766', '2002-04-10', 'O+', 'Vendedora, Suporte Técnico, Dev Júnior', '1', '1', '1', '18998222766', 3, '0009903656', 'jaine.ojuacy@gmail.com', '123', 1, 'fotos/-1071608930.png', 0),
(64, 1, '2024-01-08 13:43:56', 'Helen', '$2y$10$LVqHYAZIGqahbtbNUBnteuPh2KuBvLdj7Ump0NjUDvKHigun5RzGe', 'de Freitas Santos', '595.416.016-33', '9.341.641-6', 'helen@ifsp.edu.br', '(18) 99125-0603', '2064-03-21', 'O+', 'Professora desde 1998', '7084-X', '12.139-8', '0001', '18991250603', 2, 'aaaa', 'helen@ifsp.edu.br', 'aaaaa', 0, 'fotos/-1325578792.jpg', 0),
(65, 1, '2024-01-10 18:29:34', 'TesteSistema', '$2y$10$x7AHDRVXhsaypyf2pSPW.uBWNNY9DxBQ8l9nmZSvBB2Xb/WyUJkde', 'TesteSistema', NULL, NULL, 't@t.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, '', NULL, NULL, 0),
(69, 1, '2024-04-12 17:45:32', 'Danilo', '$2y$10$jyyPzahYlsL36NJubL3HTu85HJ/k8VCq83pX2LhvoPs3L4pww5Wby', 'Teste', NULL, NULL, 'cardoso.1007@hotmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, '', NULL, NULL, 0),
(70, 1, '2024-05-19 12:38:00', 'Convidado', '$2y$10$lyGRfTZY1goS7IDHl7XpGeFaaLRH5ec5uRw1OMnZfwCf91nXJ7xHu', 'Teste', NULL, NULL, 'convidado@convidado.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, '', NULL, NULL, 0),
(71, 1, '2024-05-19 13:14:14', 'Teste', '$2y$10$XaelP5vWShgEKJqIkBwR4ONEnAoMi6TZA5qi1oW3PfpMCblRb4oVm', 'Apresentação', '357.748.460-83', '', 'suporteadm.pontoeletronico@gmail.com', '', '2002-04-10', '', '', '', '', '', '', 3, '0009324807', '', '121354', 1, 'fotos/-86341143.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `cor` varchar(45) NOT NULL,
  `veiculoscol` varchar(45) DEFAULT NULL,
  `created` varchar(45) NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
  `is_active` tinyint(4) DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `is_trash` tinyint(4) DEFAULT 0,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `placa`, `modelo`, `cor`, `veiculoscol`, `created`, `is_active`, `user_id`, `is_trash`, `empresa_id`) VALUES
(3, 'EXJ-2180', 'Kicks', 'Prata', NULL, '1/8/24, 3:39 PM', 1, 64, 0, 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Categorias_Cargo_idx` (`categoria_id`),
  ADD KEY `fk_empresa` (`empresa_id`);

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`),
  ADD KEY `fk_empresa` (`empresa_id`);

--
-- Índices de tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `cod_ibge` (`cod_ibge`),
  ADD UNIQUE KEY `nome_estado_unique_idx` (`nome`,`estado_id`),
  ADD KEY `estado_cidade_idx` (`estado_id`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cnpj` (`cnpj`);

--
-- Índices de tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cidade_endereço_idx` (`cidade_id`),
  ADD KEY `endereco_user_idx` (`user_id`);

--
-- Índices de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `num_patrimonio` (`num_patrimonio`),
  ADD KEY `equipamento_funcionario_idx` (`funcionario_id`),
  ADD KEY `fk_empresa` (`empresa_id`);

--
-- Índices de tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sigla` (`sigla`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_user_id` (`user_id`),
  ADD KEY `funcionario_cargo_idx` (`cargo_id`),
  ADD KEY `funcionario_plano_idx` (`plano_saude_id`),
  ADD KEY `funcionarios_empresa_idx` (`empresa_id`),
  ADD KEY `funcionarios_id_idx` (`user_id`);

--
-- Índices de tabela `funcionarios_plantoes`
--
ALTER TABLE `funcionarios_plantoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionario_plantao_idx` (`funcionario_id`),
  ADD KEY `funcionario_plantao_1_idx` (`plantao_id`);

--
-- Índices de tabela `historicos_pontos`
--
ALTER TABLE `historicos_pontos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pontos_funcionarios_idx` (`funcionario_id`),
  ADD KEY `historico_pontos_idx` (`pontos_horas_id`);

--
-- Índices de tabela `holerites`
--
ALTER TABLE `holerites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `holerite_funcionario_idx` (`funcionario_id`);

--
-- Índices de tabela `planos_saudes`
--
ALTER TABLE `planos_saudes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- Índices de tabela `plantoes`
--
ALTER TABLE `plantoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plantao_funcionario_idx` (`funcionario_id`);

--
-- Índices de tabela `pontos_horas`
--
ALTER TABLE `pontos_horas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pontos_funcionarios_idx` (`funcionario_id`);

--
-- Índices de tabela `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `uid_rfid_UNIQUE` (`uid_rfid`),
  ADD KEY `role_user_idx` (`role_id`);

--
-- Índices de tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_veiculo_idx` (`user_id`),
  ADD KEY `fk_empresa` (`empresa_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `funcionarios_plantoes`
--
ALTER TABLE `funcionarios_plantoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `historicos_pontos`
--
ALTER TABLE `historicos_pontos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT de tabela `holerites`
--
ALTER TABLE `holerites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `planos_saudes`
--
ALTER TABLE `planos_saudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `plantoes`
--
ALTER TABLE `plantoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de tabela `pontos_horas`
--
ALTER TABLE `pontos_horas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT de tabela `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `cargos`
--
ALTER TABLE `cargos`
  ADD CONSTRAINT `categoria_cargo` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Restrições para tabelas `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `cidade_estado` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`);

--
-- Restrições para tabelas `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `endereco_cidade` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`),
  ADD CONSTRAINT `endereco_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD CONSTRAINT `equipamento_funcionario` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`);

--
-- Restrições para tabelas `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `funcionario_cargo` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`),
  ADD CONSTRAINT `funcionarios_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`),
  ADD CONSTRAINT `funcionarios_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `funcionarios_plano` FOREIGN KEY (`plano_saude_id`) REFERENCES `planos_saudes` (`id`);

--
-- Restrições para tabelas `funcionarios_plantoes`
--
ALTER TABLE `funcionarios_plantoes`
  ADD CONSTRAINT `funcionario_plantao` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `plantao_plantao` FOREIGN KEY (`plantao_id`) REFERENCES `plantoes` (`id`);

--
-- Restrições para tabelas `historicos_pontos`
--
ALTER TABLE `historicos_pontos`
  ADD CONSTRAINT `historico_funcionarios` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`),
  ADD CONSTRAINT `historico_pontos` FOREIGN KEY (`pontos_horas_id`) REFERENCES `pontos_horas` (`id`);

--
-- Restrições para tabelas `holerites`
--
ALTER TABLE `holerites`
  ADD CONSTRAINT `holerite_funcionario` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`);

--
-- Restrições para tabelas `plantoes`
--
ALTER TABLE `plantoes`
  ADD CONSTRAINT `funcionario_plantoes` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`);

--
-- Restrições para tabelas `pontos_horas`
--
ALTER TABLE `pontos_horas`
  ADD CONSTRAINT `pontos_funcionarios` FOREIGN KEY (`funcionario_id`) REFERENCES `funcionarios` (`id`);

--
-- Restrições para tabelas `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Restrições para tabelas `veiculos`
--
ALTER TABLE `veiculos`
  ADD CONSTRAINT `veiculo_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
