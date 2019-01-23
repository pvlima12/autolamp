-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Jan-2019 às 15:46
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autolamp2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cod_porta` int(11) NOT NULL,
  `cod_equipamento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`id`, `nome`, `cod_porta`, `cod_equipamento`) VALUES
(3, 'Lampada frontal', 4, '2'),
(4, 'Data show', 2, '1'),
(5, 'Lampada Lateral', 3, '2'),
(6, 'Ventilador', 5, '1'),
(8, 'PC02', 6, '4'),
(10, 'PC03', 7, '3'),
(12, 'Ar condicionado', 8, '4'),
(14, 'Data show', 9, '5'),
(17, 'PC02', 10, '2'),
(19, 'Caixa de som', 11, '1'),
(20, 'Ar condicionado', 12, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `porta`
--

CREATE TABLE `porta` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `porta`
--

INSERT INTO `porta` (`id`, `nome`, `estado`) VALUES
(2, '02', 'inativo'),
(3, '03', 'Ativo'),
(4, '01', 'ativo'),
(5, '001', 'ativo'),
(6, '002', 'ativo'),
(7, '003', 'ativo'),
(8, '004', 'ativo'),
(9, '007', 'ativo'),
(10, '008', 'ativo'),
(11, '0010', 'ativo'),
(12, '10', 'ativo'),
(13, '11', 'ativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `nome` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`id`, `nome`) VALUES
(1, 'sala01'),
(2, 'sala02'),
(3, 'sala05'),
(4, 'sala03'),
(5, 'sala04'),
(6, 'sala06'),
(7, 'sala07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_adm`
--

CREATE TABLE `usuario_adm` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `num_identificacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario_adm`
--

INSERT INTO `usuario_adm` (`id`, `nome`, `num_identificacao`) VALUES
(1, 'paulo', 'adcd7048512e64b48da55b027577886ee5a36350'),
(3, 'Paulolima', '1234'),
(4, 'PAULO VITOR BEZERRA DE LIMA', '123'),
(5, 'MatemÃ¡tica', '0012'),
(6, 'lima', '091');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_professor`
--

CREATE TABLE `usuario_professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `num_mat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario_professor`
--

INSERT INTO `usuario_professor` (`id`, `nome`, `estado`, `num_mat`) VALUES
(8, 'PAULO VITOR BEZERRA DE LIMA', 'Inativo', '005'),
(9, 'PauloLima', 'Ativo', '0012'),
(10, 'paulo2', 'Ativo', '092'),
(12, 'Alice', 'Ativo', '0012'),
(15, 'PauloLima', 'ativo', '1234'),
(19, 'AntÃ´nia', 'ativo', '091'),
(26, 'PAULO VITOR BEZERRA DE LIMA', 'ativo', '1234'),
(29, 'PAULO VITOR BEZERRA DE LIMA', 'ativo', '0012'),
(31, 'PAULO VITOR BEZERRA DE LIMA', 'ativo', '091'),
(32, 'PAULO VITOR BEZERRA DE LIMA', 'ativo', '001'),
(33, 'PAULO VITOR BEZERRA DE LIMA', 'ativo', '1000'),
(34, 'pv', 'ativo', '001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cod_porta_UNIQUE` (`cod_porta`),
  ADD KEY `fk_equipamento_porta1_idx` (`cod_porta`);

--
-- Indexes for table `porta`
--
ALTER TABLE `porta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario_adm`
--
ALTER TABLE `usuario_adm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario_professor`
--
ALTER TABLE `usuario_professor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `porta`
--
ALTER TABLE `porta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuario_adm`
--
ALTER TABLE `usuario_adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuario_professor`
--
ALTER TABLE `usuario_professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD CONSTRAINT `fk_equipamento_porta1` FOREIGN KEY (`cod_porta`) REFERENCES `porta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
