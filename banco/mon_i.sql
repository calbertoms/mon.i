-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Out-2017 às 15:39
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
-- Estrutura da tabela `monitorinteligente`
--

CREATE TABLE `monitorinteligente` (
  `idMonitor` int(11) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `sensor` int(11) NOT NULL,
  `dataCalibracao` date NOT NULL,
  `nivelAlarme` int(11) NOT NULL,
  `tempoColeta` int(11) NOT NULL,
  `mac` varchar(20) NOT NULL
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
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipo` tinyint(4) NOT NULL COMMENT '1 = Cliente, 2 = Administrador'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuariosys`
--

CREATE TABLE `usuariosys` (
  `idUsuariosys` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `monitorinteligente`
--
ALTER TABLE `monitorinteligente`
  ADD PRIMARY KEY (`idMonitor`);

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
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indexes for table `usuariosys`
--
ALTER TABLE `usuariosys`
  ADD PRIMARY KEY (`idUsuariosys`);

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
-- AUTO_INCREMENT for table `monitorinteligente`
--
ALTER TABLE `monitorinteligente`
  MODIFY `idMonitor` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `usuariosys`
--
ALTER TABLE `usuariosys`
  MODIFY `idUsuariosys` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
