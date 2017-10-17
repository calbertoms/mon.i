-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17-Out-2017 às 16:59
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mon.i`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('cbjksilhp5ea2773q32serfopbosf5du', '::1', 1507732109, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373733323130393b),
('nfaq5e38fo99n27rrsabbrae9t4n806s', '::1', 1507732472, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373733323437323b),
('6m8kc5v9gk70nju0as3b4p41giut9isn', '::1', 1507732484, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530373733323437323b),
('emckr5bt3vuea353c0vjd3eeplrfga8c', '::1', 1508186374, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383138363337333b),
('11mb7a9f6u4ne099j5mne3b68d9tosv6', '::1', 1508240856, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383234303835363b),
('jd8iltrtm91jm8orolpbrq0hvba7pc70', '::1', 1508244800, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383234343830303b),
('v48vja4adkbtgppr9d38vpvrhfo8garv', '::1', 1508245281, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383234353238313b),
('6da3019sgerq7te79jisf9cjrbu8jh34', '::1', 1508245658, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383234353635383b),
('pntqlmuhl3eqb87ffe5e2vasckhj4lpe', '::1', 1508247260, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383234373236303b),
('usbgvrt2mfp3knohu4oqre3e67acgkhf', '::1', 1508247601, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383234373630313b),
('8pfjah10bui7nsjc5dbdf6mj3u0s6dq5', '::1', 1508247918, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383234373931383b),
('f42f4dfc3o8huiimobcd8ova34c1jeto', '::1', 1508248834, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383234383833343b),
('m9kllee7n7jsj7suu79bu53cqml3l32r', '::1', 1508249347, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383234393334373b),
('7njphu84qrvnk993ha3t27a6r38evvmj', '::1', 1508249722, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383234393732323b),
('s1435m7utq8kmej104s12cj18t5el2uu', '::1', 1508251254, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383235313235343b),
('rugobac631mtn85eklfvm8flr15o0e8l', '::1', 1508252167, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383235323136373b),
('1isbj4pbnbincofv6l8foo8pppjhgsfp', '::1', 1508257923, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383235373932333b),
('tlguprur49anksn1ralblot5h4qmqlfn', '::1', 1508258401, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383235383430313b),
('f8uim2vanu2rm6vfetslimg276fo1qua', '::1', 1508259317, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383235393331373b),
('lm695v3lenthjcmmdlvq4iaq8qn5ef5c', '::1', 1508260109, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236303130393b),
('uur5gtfschr5t3oosohi2rridm1v6rnf', '::1', 1508260546, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236303534363b),
('2h70edhkqo6e8oe89qgc5bcqksqg6t2l', '::1', 1508261521, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236313532313b),
('q4p1bgajd3bami3kd5gk7hk1knotprmn', '::1', 1508262765, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236323736353b),
('g5modji5iocngrgk0lofgishd0e83kjp', '::1', 1508264547, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236343534373b),
('uipbmolids8oq9kjh2maqfp5p2lij5if', '::1', 1508266139, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236363133393b),
('336jtc43ui52cmvnb3kh97soigl0h92s', '::1', 1508266166, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236363133393b),
('0ep1pjs517eirf38k00iarqipjsuq5i6', '192.168.254.207', 1508268148, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383134383b),
('3850egep79m1vjappq28t04s9oahjjcv', '192.168.254.119', 1508268042, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383034323b),
('79j39enq3rs30g70cu7bjt4d0cj12n1e', '192.168.254.119', 1508268047, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383034373b),
('rvprgrp56q31lbp4mu2a10a2hk2uui2a', '192.168.254.119', 1508268052, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383035323b),
('8okhe200n9k95pl2qc59p0s6n1g3pp75', '192.168.254.119', 1508268058, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383035373b),
('qblnats26njc8ocn0m56i39th9b8mk6e', '192.168.254.119', 1508268063, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383036333b),
('osao8h962ilbtgkhfd32vqj3fsddh2vs', '192.168.254.119', 1508268068, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383036383b),
('1ark6hnhmn483n8do129jguqg0bmbqq9', '192.168.254.119', 1508268073, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383037333b),
('mjojra97p82lnjteagqs85su2j52n0q8', '192.168.254.119', 1508268078, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383037383b),
('iq65cm8efp15tlbd3v76924pib3doobl', '192.168.254.119', 1508268084, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383038333b),
('jf797vfh6jbp9sl1u3al30ds37bohg9a', '192.168.254.119', 1508268089, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383038393b),
('odd4mqaoli3a1akhng12u1u4p4dvhehq', '192.168.254.119', 1508268094, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383039343b),
('jn1qnf508e2sr0hlrajifmlkte1ma663', '192.168.254.119', 1508268099, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383039393b),
('kvd3mc9cb9igjsn3fin7afc93vafth35', '192.168.254.119', 1508268104, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383130343b),
('5bhmth9nu1ivqqc6djd5bjt4oesrpn6t', '192.168.254.119', 1508268109, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383130393b),
('9ccase4o9adfu7spsckodhb15rfdskdl', '192.168.254.119', 1508268115, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383131343b),
('0jbat0pr1prqe0b9k98n96sm2fhe3iot', '192.168.254.119', 1508268120, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383132303b),
('78e3k63s9tsp9djvoea657470cr6veml', '192.168.254.119', 1508268125, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383132353b),
('sq5ss93amlv7p3bmoatmdv18qdps5pio', '192.168.254.119', 1508268131, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383133303b),
('14dv2nrb9dvt02kakcobl80k6ongev8k', '192.168.254.119', 1508268136, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383133363b),
('o3io3sd73smhl32p24n8pfhq1bsapivv', '192.168.254.119', 1508268142, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383134323b),
('fttujb1k3qrgq6apj46r2lj8lc924d8f', '192.168.254.119', 1508268148, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383134373b),
('unh1bmt2dlqs8avf4toaqcsjer5vk5ns', '192.168.254.207', 1508268850, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383835303b),
('6lvdsuknt3cl8v1dhdhhiu64c8438pve', '192.168.254.119', 1508268153, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383135333b),
('d27hlh0cdbnuomom5gcrkpdb39oik25o', '192.168.254.119', 1508268159, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383135393b),
('lb31oejlgki1079j0asubumkl8qjvm47', '192.168.254.119', 1508268164, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383136343b),
('9b7hu3p7goc1joph66lfk2uqfie7pc0o', '192.168.254.119', 1508268169, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383136393b),
('jg1l8nm19i4r8fbe2dbge7u68inutco1', '192.168.254.207', 1508268979, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383835303b),
('go1vetqee6251r62c7qpuikh8s9lkbl2', '192.168.254.119', 1508268860, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383836303b),
('d59ertr6lmatiikcfg4r6cvkta4lcm4g', '192.168.254.119', 1508268866, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383836363b),
('rr91mksbevmqtaal1deald1mrndg3ugk', '192.168.254.119', 1508268871, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236383837313b),
('tcaq97cr5c9qj5ofj8vs0boqpl0vmbhl', '192.168.254.119', 1508269122, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393132323b),
('5e1tmm8ecr189b7uq51adt9ardkbhhok', '192.168.254.119', 1508269127, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393132373b),
('c6p5ql21ab0ga904sd5s6snqfki1g622', '192.168.254.119', 1508269132, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393133323b),
('jk9spvnmrpsob2kntpu4m5v0uvvgvk2h', '192.168.254.119', 1508269137, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393133373b),
('07h5ac3q9sr7ubjanqsq6lj1se6konj1', '192.168.254.119', 1508269143, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393134333b),
('em7ha4qhob67q40aqqqd9o9tjimd8f6c', '192.168.254.119', 1508269148, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393134383b),
('kacn2pkb8dhu1spq850tq1ap5bhjblhi', '192.168.254.119', 1508269153, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393135333b),
('ft17d9jv7vqa3lfif6s3djv7dstosscq', '192.168.254.119', 1508269159, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393135393b),
('91g52r52ikjdmftcddihjan6jt7am3e3', '192.168.254.119', 1508269164, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393136343b),
('vp5a8mh9d9rod8csegikfulkvqmb0cdq', '192.168.254.119', 1508269169, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393136393b),
('eibleljs56hebnch4n4f43o9dvhu2e46', '192.168.254.119', 1508269174, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393137343b),
('uulh8cpejfdp7ho9j67qnd408c79uvdv', '192.168.254.119', 1508269177, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393137373b),
('p8ev3gogtonsnsiqrnhcapis4lnbmkj3', '192.168.254.119', 1508269179, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393137393b),
('q8scsr2lq1heeh6ts7an4qgq8kqpo037', '192.168.254.119', 1508269184, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393138343b),
('j2rd2g7uqn6983dr8ts2c0r11d1762tv', '192.168.254.119', 1508269190, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393139303b),
('7ibvfabcjmjcfg67qna44ltbk7cm47qu', '192.168.254.119', 1508269195, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393139353b),
('nipp9enauo0qq5dpd1hkd5hih6nkqui1', '192.168.254.119', 1508269200, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393230303b),
('0776vbsuelsn4j7fs8il2flpm66nadq8', '192.168.254.119', 1508269205, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393230353b),
('tckh3qh3k441efaie8d9dberjrt5gt0o', '192.168.254.119', 1508269353, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393335333b),
('4o980adnl7ftq68nojuek4cdhfehgh7l', '192.168.254.119', 1508269363, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393336333b),
('16k9gjcu8op2pg6he90q76tbdd7j3rne', '192.168.254.119', 1508269373, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393337333b),
('o93ignshaje04rdovasreupvra8mvtqc', '192.168.43.25', 1508269691, 0x5f5f63695f6c6173745f726567656e65726174657c693a313530383236393636333b);

-- --------------------------------------------------------

--
-- Estrutura da tabela `consumidor`
--

CREATE TABLE `consumidor` (
  `idConsumidor` int(11) NOT NULL,
  `idFabrica` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nomeFantasia` varchar(50) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `inscEstadual` varchar(20) NOT NULL,
  `contatoEmail` varchar(50) NOT NULL,
  `contatoNome` varchar(50) NOT NULL,
  `contatoTel` varchar(20) NOT NULL,
  `emailAlerta` varchar(50) NOT NULL,
  `contatoAlerta` varchar(50) NOT NULL,
  `contatoTelAlerta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL,
  `idFabrica` int(11) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `numero` int(10) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `pontoReferencia` varchar(50) NOT NULL,
  `cep` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabrica`
--

CREATE TABLE `fabrica` (
  `idFabrica` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `setor` varchar(50) NOT NULL,
  `capacidadeProdutiva` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fabrica_produto`
--

CREATE TABLE `fabrica_produto` (
  `idFabrica` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `idFornecedor` int(11) NOT NULL,
  `idFabrica` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nomeFantasia` varchar(50) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `inscEstadual` varchar(20) NOT NULL,
  `contatoEmail` varchar(50) NOT NULL,
  `contatoNome` varchar(50) NOT NULL,
  `contatoTel` varchar(20) NOT NULL,
  `emailAlerta` varchar(50) NOT NULL,
  `contatoAlerta` varchar(50) NOT NULL,
  `contatoTelAlerta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `leitura`
--

CREATE TABLE `leitura` (
  `idLeitura` int(11) NOT NULL,
  `idMonitor` int(11) NOT NULL,
  `nivel` decimal(9,2) NOT NULL,
  `dataHora` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `leitura`
--

INSERT INTO `leitura` (`idLeitura`, `idMonitor`, `nivel`, `dataHora`) VALUES
(1, 1, '70.00', '2017-10-17 14:12:46'),
(2, 1, '70.00', '2017-10-17 14:15:46'),
(3, 1, '70.00', '2017-10-17 14:16:12'),
(4, 1, '50.00', '2017-10-17 15:48:59'),
(5, 1, '63.00', '2017-10-17 16:20:42'),
(6, 1, '99.00', '2017-10-17 16:20:47'),
(7, 1, '66.00', '2017-10-17 16:20:52'),
(8, 1, '76.00', '2017-10-17 16:20:57'),
(9, 1, '66.00', '2017-10-17 16:21:03'),
(10, 1, '71.00', '2017-10-17 16:21:08'),
(11, 1, '72.00', '2017-10-17 16:21:13'),
(12, 1, '95.00', '2017-10-17 16:21:18'),
(13, 1, '66.00', '2017-10-17 16:21:23'),
(14, 1, '80.00', '2017-10-17 16:21:29'),
(15, 1, '65.00', '2017-10-17 16:21:34'),
(16, 1, '78.00', '2017-10-17 16:21:39'),
(17, 1, '74.00', '2017-10-17 16:21:44'),
(18, 1, '94.00', '2017-10-17 16:21:49'),
(19, 1, '93.00', '2017-10-17 16:21:54'),
(20, 1, '87.00', '2017-10-17 16:22:00'),
(21, 1, '89.00', '2017-10-17 16:22:05'),
(22, 1, '98.00', '2017-10-17 16:22:10'),
(23, 1, '78.00', '2017-10-17 16:22:16'),
(24, 1, '85.00', '2017-10-17 16:22:22'),
(25, 1, '86.00', '2017-10-17 16:22:27'),
(26, 1, '86.00', '2017-10-17 16:22:33'),
(27, 1, '77.00', '2017-10-17 16:22:39'),
(28, 1, '77.00', '2017-10-17 16:22:44'),
(29, 1, '82.00', '2017-10-17 16:22:49'),
(30, 1, '81.00', '2017-10-17 16:34:20'),
(31, 1, '65.00', '2017-10-17 16:34:26'),
(32, 1, '72.00', '2017-10-17 16:34:31'),
(33, 1, '84.00', '2017-10-17 16:38:42'),
(34, 1, '78.00', '2017-10-17 16:38:47'),
(35, 1, '72.00', '2017-10-17 16:38:52'),
(36, 1, '62.00', '2017-10-17 16:38:57'),
(37, 1, '88.00', '2017-10-17 16:39:03'),
(38, 1, '96.00', '2017-10-17 16:39:08'),
(39, 1, '99.00', '2017-10-17 16:39:13'),
(40, 1, '79.00', '2017-10-17 16:39:19'),
(41, 1, '97.00', '2017-10-17 16:39:24'),
(42, 1, '68.00', '2017-10-17 16:39:29'),
(43, 1, '91.00', '2017-10-17 16:39:34'),
(44, 1, '93.00', '2017-10-17 16:39:39'),
(45, 1, '64.00', '2017-10-17 16:39:44'),
(46, 1, '72.00', '2017-10-17 16:39:50'),
(47, 1, '68.00', '2017-10-17 16:39:55'),
(48, 1, '84.00', '2017-10-17 16:40:00'),
(49, 1, '71.00', '2017-10-17 16:40:05'),
(50, 1, '71.00', '2017-10-17 16:42:33'),
(51, 1, '81.00', '2017-10-17 16:42:43'),
(52, 1, '92.00', '2017-10-17 16:42:53');

-- --------------------------------------------------------

--
-- Estrutura da tabela `monitorinteligente`
--

CREATE TABLE `monitorinteligente` (
  `idMonitor` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo` tinyint(4) NOT NULL COMMENT '1=Líquido, 2=Sólido, 3=Gasoso',
  `unidade` varchar(10) NOT NULL,
  `dataCalibracao` date NOT NULL,
  `nivelAlarme` int(11) NOT NULL,
  `tempoColeta` int(11) NOT NULL,
  `mac` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `monitorinteligente`
--

INSERT INTO `monitorinteligente` (`idMonitor`, `nome`, `tipo`, `unidade`, `dataCalibracao`, `nivelAlarme`, `tempoColeta`, `mac`) VALUES
(1, 'Monitor 1', 1, 'L', '2017-10-17', 80, 30, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

CREATE TABLE `permissoes` (
  `idPermissao` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `permissoes` text,
  `situacao` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `unidade` varchar(20) NOT NULL,
  `tipoTransporte` tinyint(4) NOT NULL,
  `tipoArmazenagem` tinyint(4) NOT NULL,
  `validade` datetime NOT NULL,
  `temperatura` decimal(9,2) NOT NULL,
  `densidade` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `recarga`
--

CREATE TABLE `recarga` (
  `idRecarga` int(11) NOT NULL,
  `idMonitor` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rota`
--

CREATE TABLE `rota` (
  `idRota` int(11) NOT NULL,
  `idRecarga` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `idFornecedor` int(11) NOT NULL,
  `idConsumidor` int(11) NOT NULL,
  `distancia` decimal(9,2) NOT NULL,
  `tempoViagem` int(11) NOT NULL,
  `pedagio` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tanquegasoso`
--

CREATE TABLE `tanquegasoso` (
  `idTanqueGas` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `identificacao` varchar(20) NOT NULL,
  `dataFabricacao` date NOT NULL,
  `dataInspecao` date NOT NULL,
  `dataManutencao` date NOT NULL,
  `capacidade` decimal(9,2) NOT NULL,
  `pressao` decimal(9,2) NOT NULL,
  `temperatura` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tanqueliquido`
--

CREATE TABLE `tanqueliquido` (
  `idTanqueLiq` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `identificacao` varchar(20) NOT NULL,
  `dataFabricacao` date NOT NULL,
  `dataInspecao` date NOT NULL,
  `dataManutencao` date NOT NULL,
  `capacidade` decimal(9,2) NOT NULL,
  `nivel` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tanquesolido`
--

CREATE TABLE `tanquesolido` (
  `idTanqueSol` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `identificacao` varchar(20) NOT NULL,
  `dataFabricacao` date NOT NULL,
  `dataInspecao` date NOT NULL,
  `dataManutencao` date NOT NULL,
  `capacidade` decimal(9,2) NOT NULL,
  `peso` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transporte`
--

CREATE TABLE `transporte` (
  `idTransporte` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `antt` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `tara` decimal(9,2) NOT NULL,
  `bruto` decimal(9,2) NOT NULL,
  `dataManutencao` date NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transporte_recarga`
--

CREATE TABLE `transporte_recarga` (
  `idTransporte` int(11) NOT NULL,
  `idRecarga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `idPermissao` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipo` tinyint(4) NOT NULL COMMENT '0 = Super Administrador, 1 = Cliente, 2 = Administrador'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `consumidor`
--
ALTER TABLE `consumidor`
  ADD PRIMARY KEY (`idConsumidor`),
  ADD KEY `idFabrica` (`idFabrica`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`),
  ADD KEY `idFabrica` (`idFabrica`);

--
-- Indexes for table `fabrica`
--
ALTER TABLE `fabrica`
  ADD PRIMARY KEY (`idFabrica`);

--
-- Indexes for table `fabrica_produto`
--
ALTER TABLE `fabrica_produto`
  ADD KEY `idFabrica` (`idFabrica`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`idFornecedor`),
  ADD KEY `idFabrica` (`idFabrica`);

--
-- Indexes for table `leitura`
--
ALTER TABLE `leitura`
  ADD PRIMARY KEY (`idLeitura`),
  ADD KEY `idMonitor` (`idMonitor`),
  ADD KEY `dataHora` (`dataHora`);

--
-- Indexes for table `monitorinteligente`
--
ALTER TABLE `monitorinteligente`
  ADD PRIMARY KEY (`idMonitor`);

--
-- Indexes for table `permissoes`
--
ALTER TABLE `permissoes`
  ADD PRIMARY KEY (`idPermissao`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- Indexes for table `recarga`
--
ALTER TABLE `recarga`
  ADD PRIMARY KEY (`idRecarga`),
  ADD KEY `idMonitor` (`idMonitor`);

--
-- Indexes for table `rota`
--
ALTER TABLE `rota`
  ADD PRIMARY KEY (`idRota`),
  ADD KEY `idRecarga` (`idRecarga`),
  ADD KEY `idFornecedor` (`idFornecedor`),
  ADD KEY `idConsumidor` (`idConsumidor`);

--
-- Indexes for table `tanquegasoso`
--
ALTER TABLE `tanquegasoso`
  ADD PRIMARY KEY (`idTanqueGas`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `tanqueliquido`
--
ALTER TABLE `tanqueliquido`
  ADD PRIMARY KEY (`idTanqueLiq`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `tanquesolido`
--
ALTER TABLE `tanquesolido`
  ADD PRIMARY KEY (`idTanqueSol`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`idTransporte`);

--
-- Indexes for table `transporte_recarga`
--
ALTER TABLE `transporte_recarga`
  ADD KEY `idTransporte` (`idTransporte`),
  ADD KEY `idRecarga` (`idRecarga`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idPermissao` (`idPermissao`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consumidor`
--
ALTER TABLE `consumidor`
  MODIFY `idConsumidor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fabrica`
--
ALTER TABLE `fabrica`
  MODIFY `idFabrica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `idFornecedor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leitura`
--
ALTER TABLE `leitura`
  MODIFY `idLeitura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `monitorinteligente`
--
ALTER TABLE `monitorinteligente`
  MODIFY `idMonitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissoes`
--
ALTER TABLE `permissoes`
  MODIFY `idPermissao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recarga`
--
ALTER TABLE `recarga`
  MODIFY `idRecarga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rota`
--
ALTER TABLE `rota`
  MODIFY `idRota` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tanquegasoso`
--
ALTER TABLE `tanquegasoso`
  MODIFY `idTanqueGas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tanqueliquido`
--
ALTER TABLE `tanqueliquido`
  MODIFY `idTanqueLiq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tanquesolido`
--
ALTER TABLE `tanquesolido`
  MODIFY `idTanqueSol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transporte`
--
ALTER TABLE `transporte`
  MODIFY `idTransporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `consumidor`
--
ALTER TABLE `consumidor`
  ADD CONSTRAINT `fk_consumidor.idFabrica_fabrica.idFabrica` FOREIGN KEY (`idFabrica`) REFERENCES `fabrica` (`idFabrica`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_endereco.idFabrica_fabrica.idFabrica` FOREIGN KEY (`idFabrica`) REFERENCES `fabrica` (`idFabrica`);

--
-- Limitadores para a tabela `fabrica_produto`
--
ALTER TABLE `fabrica_produto`
  ADD CONSTRAINT `fk_fabrica_produto.idFabrica_fabrica.idFabrica` FOREIGN KEY (`idFabrica`) REFERENCES `fabrica` (`idFabrica`),
  ADD CONSTRAINT `fk_fabrica_produto.idProduto_produto.idProduto` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`);

--
-- Limitadores para a tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fk_fornecedor.idFabrica_fabrica.idFabrica` FOREIGN KEY (`idFabrica`) REFERENCES `fabrica` (`idFabrica`);

--
-- Limitadores para a tabela `leitura`
--
ALTER TABLE `leitura`
  ADD CONSTRAINT `fk_leitura.idMonitor_monitorInteligente.idMonitor` FOREIGN KEY (`idMonitor`) REFERENCES `monitorinteligente` (`idMonitor`);

--
-- Limitadores para a tabela `recarga`
--
ALTER TABLE `recarga`
  ADD CONSTRAINT `fk_recarga.idMonitor_monitorinteligente.idRecarga` FOREIGN KEY (`idMonitor`) REFERENCES `monitorinteligente` (`idMonitor`);

--
-- Limitadores para a tabela `rota`
--
ALTER TABLE `rota`
  ADD CONSTRAINT `fk_rota.idConsumidor_consumidor.idConsumidor` FOREIGN KEY (`idConsumidor`) REFERENCES `consumidor` (`idConsumidor`),
  ADD CONSTRAINT `fk_rota.idFornecedor_fornecedor.idFornecedor` FOREIGN KEY (`idFornecedor`) REFERENCES `fornecedor` (`idFornecedor`),
  ADD CONSTRAINT `fk_rota.idRecarga_recarga.idRecarga` FOREIGN KEY (`idRecarga`) REFERENCES `recarga` (`idRecarga`);

--
-- Limitadores para a tabela `tanquegasoso`
--
ALTER TABLE `tanquegasoso`
  ADD CONSTRAINT `fk_tanquegasoso.idProduto_produto.idProduto` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`);

--
-- Limitadores para a tabela `tanqueliquido`
--
ALTER TABLE `tanqueliquido`
  ADD CONSTRAINT `fk_tanqueliquido.idProduto_produto.idProduto` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`);

--
-- Limitadores para a tabela `tanquesolido`
--
ALTER TABLE `tanquesolido`
  ADD CONSTRAINT `fk_tanquesolido.idProduto_produto.idProduto` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`idProduto`);

--
-- Limitadores para a tabela `transporte_recarga`
--
ALTER TABLE `transporte_recarga`
  ADD CONSTRAINT `fk_transporte_recarga.idRecarga_recarga.idRecarga` FOREIGN KEY (`idRecarga`) REFERENCES `recarga` (`idRecarga`),
  ADD CONSTRAINT `fk_transporte_recarga.idTransporte_transporte.idTransporte` FOREIGN KEY (`idTransporte`) REFERENCES `transporte` (`idTransporte`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario.idPermissao_permissoes.idPermissao` FOREIGN KEY (`idPermissao`) REFERENCES `permissoes` (`idPermissao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
