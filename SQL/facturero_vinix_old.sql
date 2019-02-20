-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2019 at 11:55 AM
-- Server version: 10.3.12-MariaDB-log
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facturero_vinix`
--

-- --------------------------------------------------------

--
-- Table structure for table `egresos`
--

CREATE TABLE `egresos` (
  `id` int(11) NOT NULL,
  `numero_egreso` text COLLATE ucs2_spanish2_ci NOT NULL,
  `girado` text COLLATE ucs2_spanish2_ci NOT NULL,
  `tipo_documento` text COLLATE ucs2_spanish2_ci NOT NULL,
  `numero_documento` text COLLATE ucs2_spanish2_ci NOT NULL,
  `fecha` text COLLATE ucs2_spanish2_ci NOT NULL,
  `valor` text COLLATE ucs2_spanish2_ci NOT NULL,
  `valor_letras` text COLLATE ucs2_spanish2_ci NOT NULL,
  `descripcion` text COLLATE ucs2_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Dumping data for table `egresos`
--

INSERT INTO `egresos` (`id`, `numero_egreso`, `girado`, `tipo_documento`, `numero_documento`, `fecha`, `valor`, `valor_letras`, `descripcion`) VALUES
(1, '1', 'Iglesia Pentecostal Unida de Colombia', 'NIT', '890102513', '2018-01-23', '1,000,000', 'Un millon de pesos', 'Voto pro-templo, mes de Enero.'),
(2, '2', 'Arconsa', 'NIT', '890904041', '2018-01-31', '79,000', 'Setenta y nueve mil pesos', 'Pago de agua y alcantarillado	.'),
(3, '3', 'AlcaldÃ­a La Estrella	', 'NIT', '890980782', '2018-01-23', '39,312', 'Treinta y nueve mil trecientos doce pesos', 'Pago impuesto industria y comercio	'),
(4, '4', 'Iglesia Pentecostal Unida de Colombia	', 'NIT', '890102513', '2018-01-28', '2,850,000', 'Dos millones ochocientos cincuenta mil pesos', 'Diezmo Enero	'),
(5, '5', 'Iglesia Pentecostal Unida de Colombia', 'NIT', '890102513', '2018-01-28', '1,000,000', 'Un millon de pesos', 'Voto pro-templo, mes de Febrero.'),
(6, '6', 'Juan Esteban Garcia Estrada', 'Cedula', '1017200231', '2018-01-11', '550,800', 'Quinientos cincuenta mil ochocientos pesos', 'DINERO PRESTADO A LA EMPRESA: Matricula en la Alianza Francesa (primer nivel). Pagado con tarjeta de crÃ©dito.'),
(7, '7', 'Jose Berrueta', 'Cedula', 'Venezolano', '2018-01-15', '289,444', 'Docientos ochenta y nueve mil cuatrocientos cuarenta y cuatro pesos', 'Pago por diseÃ±o de logo de Vinix Code S.A.S.'),
(8, '8', 'Juan Esteban Garcia Estrada', 'Cedula', '1017200231', '2018-01-01', '389,090', 'Trecientos ochenta y nueve mil noventa pesos', 'DINERO PRESTADO A LA EMPRESA: Viaje de negocios a Apartado (Transporte)'),
(9, '9', 'Juan Esteban Garcia Estrada', 'Cedula', '1017200231', '2018-01-01', '73,500', 'Setenta y tres mil quinientos pesos', 'DINERO PRESTADO A LA EMPRESA: Comida en viaje de negocios a Apartado.'),
(10, '10', 'Juan Esteban Garcia Estrada', 'Cedula', '1017200231', '2018-01-01', '314,646', 'Trecientos catorce mil seiscientos cuarenta y seis pesos', 'DINERO PRESTADO A LA EMPRESA: Hotel en viaje de negocios a Apartado.');

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `numero_factura` text COLLATE ucs2_spanish2_ci NOT NULL,
  `origen` text COLLATE ucs2_spanish2_ci NOT NULL,
  `destinatario` text COLLATE ucs2_spanish2_ci NOT NULL,
  `fecha` text COLLATE ucs2_spanish2_ci NOT NULL,
  `fecha_vencimiento` text COLLATE ucs2_spanish2_ci NOT NULL,
  `tipo_documento` text COLLATE ucs2_spanish2_ci NOT NULL,
  `numero_documento` text COLLATE ucs2_spanish2_ci NOT NULL,
  `telefono` text COLLATE ucs2_spanish2_ci NOT NULL,
  `direccion` text COLLATE ucs2_spanish2_ci NOT NULL,
  `iva` text COLLATE ucs2_spanish2_ci NOT NULL,
  `moneda` varchar(3) COLLATE ucs2_spanish2_ci NOT NULL,
  `estado` text COLLATE ucs2_spanish2_ci NOT NULL,
  `productos` text COLLATE ucs2_spanish2_ci NOT NULL,
  `total` text COLLATE ucs2_spanish2_ci NOT NULL,
  `descuento` text COLLATE ucs2_spanish2_ci NOT NULL,
  `total_pagar` text COLLATE ucs2_spanish2_ci NOT NULL,
  `notas` text COLLATE ucs2_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Dumping data for table `facturas`
--

INSERT INTO `facturas` (`id`, `numero_factura`, `origen`, `destinatario`, `fecha`, `fecha_vencimiento`, `tipo_documento`, `numero_documento`, `telefono`, `direccion`, `iva`, `moneda`, `estado`, `productos`, `total`, `descuento`, `total_pagar`, `notas`) VALUES
(1, '1', 'Vinix Code S.A.S.', 'Leviathan Technology Group', '2018-01-01', '2018-01-05', 'NIT', '', '', '4215 W 42nd Street.  Edina, MN, USA', '0%', 'USD', 'Paga', 'a:1:{i:0;a:3:{s:11:\"descripcion\";s:57:\"Desarrollo de sitio web BenefitsCheckUp (Dic 1 - 15 2017)\";s:8:\"cantidad\";s:1:\"1\";s:5:\"valor\";s:4:\"5000\";}}', '5000', '0', '5000', 'Todos los valores estÃ¡n en dÃ³lares americanos.\r\n\r\nMedio de pago: Transferencia Internacional\r\nCodigo SWIFT del Banco: COLOCOBM\r\nBanco: Bancolombia S.A\r\nNumero de Cuenta: 015 835 372 08\r\nTipo de Cuenta: Ahorros\r\nNombre: VINIX CODE S.A.S'),
(2, '2', 'Vinix Code S.A.S.', 'Leviathan Technology Group', '2018-01-01', '2018-01-31', 'NIT', '', '', '4215 W 42nd Street.  Edina, MN, USA', '0%', 'USD', 'Paga', 'a:1:{i:0;a:3:{s:11:\"descripcion\";s:58:\"Desarrollo de sitio web BenefitsCheckUp (Dic 16 - 31 2017)\";s:8:\"cantidad\";s:1:\"1\";s:5:\"valor\";s:4:\"5000\";}}', '5000', '0', '5000', 'Todos los valores estÃ¡n en dÃ³lares americanos.\r\nMedio de pago: Transferencia Internacional\r\nCodigo SWIFT del Banco: COLOCOBM\r\nBanco: Bancolombia S.A\r\nNumero de Cuenta: 015 835 372 08\r\nTipo de Cuenta: Ahorros\r\nNombre: VINIX CODE S.A.S'),
(3, '3', 'Vinix Code S.A.S.', 'Leviathan Technology Group', '2018-01-15', '2018-02-05', 'NIT', '', '', '4215 W 42nd Street.  Edina, MN, USA', '0%', 'USD', 'Paga', 'a:1:{i:0;a:3:{s:11:\"descripcion\";s:57:\"Desarrollo de sitio web BenefitsCheckUp (Ene 1 - 15 2018)\";s:8:\"cantidad\";s:1:\"1\";s:5:\"valor\";s:4:\"5000\";}}', '5000', '0', '5000', 'Todos los valores estÃ¡n en dÃ³lares americanos.\r\nMedio de pago: Transferencia Internacional\r\nCodigo SWIFT del Banco: COLOCOBM\r\nBanco: Bancolombia S.A\r\nNumero de Cuenta: 015 835 372 08\r\nTipo de Cuenta: Ahorros\r\nNombre: VINIX CODE S.A.S'),
(4, '4', 'Vinix Code S.A.S.', 'Leviathan Technology Group', '2018-01-31', '2018-02-20', 'NIT', '', '', '4215 W 42nd Street.  Edina, MN, USA', '0%', 'USD', 'Paga', 'a:1:{i:0;a:3:{s:11:\"descripcion\";s:58:\"Desarrollo de sitio web BenefitsCheckUp (Ene 16 - 31 2018)\";s:8:\"cantidad\";s:1:\"1\";s:5:\"valor\";s:4:\"5000\";}}', '5000', '0', '5000', 'Todos los valores estÃ¡n en dÃ³lares americanos.\r\nMedio de pago: Transferencia Internacional\r\nCodigo SWIFT del Banco: COLOCOBM\r\nBanco: Bancolombia S.A\r\nNumero de Cuenta: 015 835 372 08\r\nTipo de Cuenta: Ahorros\r\nNombre: VINIX CODE S.A.S'),
(6, '5', 'Vinix Code S.A.S.', 'Leviathan Technology Group', '2018-01-31', '2018-02-20', 'NIT', '', '', '4215 W 42nd Street.  Edina, MN, USA', '0%', 'USD', 'Paga', 'a:1:{i:0;a:3:{s:11:\"descripcion\";s:46:\"Bonificaciones (Nov, 2017, Dic 2017, Ene 2018)\";s:8:\"cantidad\";s:1:\"3\";s:5:\"valor\";s:4:\"2000\";}}', '6000', '0', '6000', 'Todos los valores estÃ¡n en dÃ³lares americanos.\r\nMedio de pago: Transferencia Internacional\r\nCodigo SWIFT del Banco: COLOCOBM\r\nBanco: Bancolombia S.A\r\nNumero de Cuenta: 015 835 372 08\r\nTipo de Cuenta: Ahorros\r\nNombre: VINIX CODE S.A.S'),
(7, '6', 'Vinix Code S.A.S.', 'Leviathan Technology Group', '2018-02-15', '2018-03-05', 'NIT', '', '', '4215 W 42nd Street.  Edina, MN, USA', '0%', 'USD', 'Paga', 'a:1:{i:0;a:3:{s:11:\"descripcion\";s:57:\"Desarrollo de sitio web BenefitsCheckUp (Feb 1 - 15 2018)\";s:8:\"cantidad\";s:1:\"1\";s:5:\"valor\";s:4:\"5000\";}}', '5000', '0', '5000', 'Todos los valores estÃ¡n en dÃ³lares americanos.\r\nMedio de pago: Transferencia Internacional\r\nCodigo SWIFT del Banco: COLOCOBM\r\nBanco: Bancolombia S.A\r\nNumero de Cuenta: 015 835 372 08\r\nTipo de Cuenta: Ahorros\r\nNombre: VINIX CODE S.A.S'),
(8, '7', 'Vinix Code S.A.S.', 'Leviathan Technology Group', '2018-02-28', '2018-02-20', 'NIT', '', '', '4215 W 42nd Street.  Edina, MN, USA', '0%', 'USD', 'Paga', 'a:1:{i:0;a:3:{s:11:\"descripcion\";s:58:\"Desarrollo de sitio web BenefitsCheckUp (Feb 16 - 28 2018)\";s:8:\"cantidad\";s:1:\"1\";s:5:\"valor\";s:4:\"5000\";}}', '5000', '0', '5000', 'Todos los valores estÃ¡n en dÃ³lares americanos.\r\nMedio de pago: Transferencia Internacional\r\nCodigo SWIFT del Banco: COLOCOBM\r\nBanco: Bancolombia S.A\r\nNumero de Cuenta: 015 835 372 08\r\nTipo de Cuenta: Ahorros\r\nNombre: VINIX CODE S.A.S'),
(9, '8', 'Vinix Code S.A.S.', 'KeDa Holdings, LLC', '2018-02-12', '2018-02-28', 'NIT', '', '', '1538 NE 17th Way. Fort Lauderdale, FL, USA', '0%', 'USD', 'Paga', 'a:1:{i:0;a:3:{s:11:\"descripcion\";s:66:\"Desarrollo web - Health Testing Centers (healthtestingcenters.com)\";s:8:\"cantidad\";s:2:\"67\";s:5:\"valor\";s:2:\"75\";}}', '5025', '25', '5000', 'Todos los valores estÃ¡n en dÃ³lares americanos.\r\nMedio de pago: Transferencia Internacional\r\nCodigo SWIFT del Banco: COLOCOBM\r\nBanco: Bancolombia S.A\r\nNumero de Cuenta: 015 835 372 08\r\nTipo de Cuenta: Ahorros\r\nNombre: VINIX CODE S.A.S'),
(11, '9', 'Vinix Code S.A.S.', 'Leviathan Technology Group', '2018-03-15', '2018-04-05', 'NIT', '', '', '4215 W 42nd Street.  Edina, MN, USA', '0%', 'USD', 'Paga', 'a:1:{i:0;a:3:{s:11:\"descripcion\";s:57:\"Desarrollo de sitio web BenefitsCheckUp (Mar 1 - 15 2018)\";s:8:\"cantidad\";s:1:\"1\";s:5:\"valor\";s:4:\"5000\";}}', '5000', '0', '5000', 'Todos los valores estÃ¡n en dÃ³lares americanos.\r\nMedio de pago: Transferencia Internacional\r\nCodigo SWIFT del Banco: COLOCOBM\r\nBanco: Bancolombia S.A\r\nNumero de Cuenta: 015 835 372 08\r\nTipo de Cuenta: Ahorros\r\nNombre: VINIX CODE S.A.S'),
(12, '10', 'Vinix Code S.A.S.', 'KeDa Holdings, LLC', '2018-03-26', '2018-03-31', 'NIT', '', '', '1538 NE 17th Way. Fort Lauderdale, FL, USA', '0%', 'USD', 'Paga', 'a:1:{i:0;a:3:{s:11:\"descripcion\";s:66:\"Desarrollo web - Health Testing Centers (healthtestingcenters.com)\";s:8:\"cantidad\";s:2:\"67\";s:5:\"valor\";s:2:\"75\";}}', '5025', '25', '5000', 'Todos los valores estÃ¡n en dÃ³lares americanos.\r\nMedio de pago: Transferencia Internacional\r\nCodigo SWIFT del Banco: COLOCOBM\r\nBanco: Bancolombia S.A\r\nNumero de Cuenta: 015 835 372 08\r\nTipo de Cuenta: Ahorros\r\nNombre: VINIX CODE S.A.S');

-- --------------------------------------------------------

--
-- Table structure for table `r_caja`
--

CREATE TABLE `r_caja` (
  `id` int(11) NOT NULL,
  `numero_caja` text COLLATE ucs2_spanish2_ci NOT NULL,
  `recibimos` text COLLATE ucs2_spanish2_ci NOT NULL,
  `direccion` text COLLATE ucs2_spanish2_ci NOT NULL,
  `ciudad` text COLLATE ucs2_spanish2_ci NOT NULL,
  `tipo_documento` text COLLATE ucs2_spanish2_ci NOT NULL,
  `numero_documento` text COLLATE ucs2_spanish2_ci NOT NULL,
  `fecha` text COLLATE ucs2_spanish2_ci NOT NULL,
  `valor` text COLLATE ucs2_spanish2_ci NOT NULL,
  `valor_letras` text COLLATE ucs2_spanish2_ci NOT NULL,
  `descripcion` text COLLATE ucs2_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Dumping data for table `r_caja`
--

INSERT INTO `r_caja` (`id`, `numero_caja`, `recibimos`, `direccion`, `ciudad`, `tipo_documento`, `numero_documento`, `fecha`, `valor`, `valor_letras`, `descripcion`) VALUES
(1, '1', 'Leviathan Technology Group', '4215 W 42nd Street', 'Edina, MN, USA', 'NIT', '', '2018-01-02', '14,652,000', 'Catorce millones seiscientos cincuenta y dos mil pesos.', 'Pago de factura #1.'),
(2, '2', 'Leviathan Technology Group', '4215 W 42nd Street', 'Edina, MN, USA', 'NIT', '', '2018-01-25', '13,822,300', 'Trece millones ochocientos veintidos mil trescientos pesos.', 'Pago de factura #2.'),
(3, '3', 'Leviathan Technology Group', '4215 W 42nd Street', 'Edina, MN, USA', 'NIT', '', '2018-02-19', '14,081,780', 'Catorce millones ochenta y un mil setecientos ochenta.', 'Pago de factura #3.'),
(4, '4', 'KeDa Holdings, LLC', '1538 NE 17th Way', 'Fort Lauderdale, FL, USA', 'NIT', '', '2018-02-19', '14,081,780', 'Catorce millones ochenta y un mil setecientos ochenta pesos.', 'Pago de factura #8.'),
(5, '5', 'Jaime Barranco', '', 'Itagui, Antioquia, Colombia', 'Cedula', '', '2018-02-13', '5,000,000', 'Cinco millones de pesos.', 'Pago de prÃ©stamo hecho el 2 de Febrero. Esta en paz.'),
(6, '6', 'Leviathan Technology Group', '4215 W 42nd Street', 'Edina, MN, USA', 'NIT', '', '2018-03-02', '31', 'Treinta y un millones seiscientos treinta y seis mil ochocientos pesos.', 'Pago de factura #4 y #5.\r\nFactura #4: $14.400.000\r\nFactura #5: $17.236.800'),
(7, '7', 'Leviathan Technology Group', '4215 W 42nd Street', 'Edina, MN, USA', 'NIT', '', '2018-03-20', '14,186,570', 'Catorce millones ciento ochenta y seis mil quinientos setenta pesos', 'Pago de factura #6.'),
(8, '8', 'Leviathan Technology Group', '4215 W 42nd Street', 'Edina, MN, USA', 'NIT', '', '2018-03-23', '14,171,600', 'Catorce millones ciento setenta y un mil seiscientos pesos.', 'Pago de factura #7.'),
(9, '9', 'KeDa Holdings, LLC', '1538 NE 17th Way', 'Fort Lauderdale, FL, USA', 'NIT', '', '2018-03-27', '13,822,300', 'Trece millones ochocientos veintidos mil trescientos pesos.', 'Pago de factura #10.'),
(10, '10', 'Juan Esteban Garcia Estrada', 'Calle 32 # 48-12', 'Itagui, Antioquia, Colombia', 'Cedula', '1017200231', '2018-03-26', '8,000,000', 'Ocho millones de pesos.', 'Dinero prestado por el sr. Juan Esteban para compra de automovil Mazda 2.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `r_caja`
--
ALTER TABLE `r_caja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `egresos`
--
ALTER TABLE `egresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `r_caja`
--
ALTER TABLE `r_caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
