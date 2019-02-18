-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-02-2019 a las 16:55:22
-- Versión del servidor: 10.3.12-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturero_vinixcode`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cash_receipts`
--

CREATE TABLE `cash_receipts` (
  `id` int(10) UNSIGNED NOT NULL,
  `box_number` int(11) NOT NULL,
  `we_received` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_number` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `value_in_letters` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresses`
--

CREATE TABLE `egresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `exit_number` int(11) NOT NULL,
  `turned` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_number` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` int(11) NOT NULL,
  `value_in_letters` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `expiration_date` date NOT NULL,
  `document_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cellphone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_number`, `company_origin`, `client`, `date`, `expiration_date`, `document_type`, `document_number`, `cellphone`, `address`, `currency`, `state`, `notes`, `sub_total`, `discount`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, '1', 'Vinix Code S.A.S', 'Juan', '2019-02-18', '2019-02-28', 'Cedula', '1036659423', '3506213585', 'Calatrava', 'USD', 'Paga', 'Hola Mundo', '150000', '0', '150000', '2019-02-18 21:00:16', '2019-02-18 21:43:56'),
(2, '2', 'Vinix Code S.A.S', 'Juan Pablo', '2019-02-18', '2019-02-16', 'Cedula', '1036659423', '3506213585', 'Calatrava', 'COP', 'Paga', 'Hola Mundo', '140000', '0', '140000', '2019-02-18 21:53:55', '2019-02-18 21:53:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice_products`
--

CREATE TABLE `invoice_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(8,0) NOT NULL,
  `total` decimal(8,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `invoice_products`
--

INSERT INTO `invoice_products` (`id`, `invoice_id`, `name`, `qty`, `price`, `total`, `created_at`, `updated_at`) VALUES
(3, 1, 'Uno', 20, '2000', '40000', '2019-02-18 21:43:56', '2019-02-18 21:43:56'),
(4, 1, 'Dos', 10, '2000', '20000', '2019-02-18 21:43:56', '2019-02-18 21:43:56'),
(5, 1, 'Tres', 30, '3000', '90000', '2019-02-18 21:43:56', '2019-02-18 21:43:56'),
(6, 2, 'Uno', 10, '1000', '10000', '2019-02-18 21:53:55', '2019-02-18 21:53:55'),
(7, 2, 'Dos', 20, '2000', '40000', '2019-02-18 21:53:55', '2019-02-18 21:53:55'),
(8, 2, 'Tres', 30, '3000', '90000', '2019-02-18 21:53:55', '2019-02-18 21:53:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2019_01_28_181726_create_cash_receipt_table', 1),
(7, '2019_02_11_200012_create_egress_table', 3),
(8, '2019_02_13_203903_create_egresses_table', 4),
(9, '2019_02_14_154057_create_expenses_table', 5),
(10, '2019_02_14_154503_create_expenses_table', 6),
(11, '2019_02_15_182325_create_egresses_table', 7),
(13, '2014_10_12_000000_create_users_table', 8),
(14, '2014_10_12_100000_create_password_resets_table', 8),
(15, '2018_11_26_202216_create_invoices_table', 8),
(16, '2018_11_26_203036_create_invoice_products_table', 8),
(17, '2019_01_28_184604_create_cash_receipts_table', 8),
(18, '2019_02_15_183028_create_egresses_table', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cash_receipts`
--
ALTER TABLE `cash_receipts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cash_receipts_box_number_unique` (`box_number`);

--
-- Indices de la tabla `egresses`
--
ALTER TABLE `egresses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoices_invoice_number_unique` (`invoice_number`);

--
-- Indices de la tabla `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cash_receipts`
--
ALTER TABLE `cash_receipts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `egresses`
--
ALTER TABLE `egresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `invoice_products`
--
ALTER TABLE `invoice_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
