-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2023 a las 06:13:22
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventacomputo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idc` int(10) UNSIGNED NOT NULL,
  `nombreC` varchar(60) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idc`, `nombreC`, `descripcion`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Articulos de Limpieza', 'artículos de limpieza de compu', NULL, NULL, NULL),
(2, 'Monitores de computo', 'pantallas para computadoras', NULL, NULL, NULL),
(3, 'Laptops', 'computadoras portatiles', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idcli` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `rfc` varchar(10) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcli`, `nombre`, `rfc`, `telefono`, `direccion`, `created_at`, `updated_at`) VALUES
(1, 'Joaquin', 'joa123', '2225364897', 'Puebla # 2013', NULL, NULL),
(2, 'Carla ', 'car123', '2225684972', 'La paz #25A', NULL, NULL),
(3, 'Monica', 'mon123', '2223015480', 'Santa maria #546', NULL, NULL),
(4, 'Fernando', 'fer123', '2223658691', 'Angelopolis #54', NULL, NULL),
(5, 'Ana', 'ana123', '2223654873', 'Puebla #1', NULL, NULL),
(6, 'Eduardo', 'edu123', '2223654188', 'cholula #03', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_07_190130_create_vendedores_table', 1),
(6, '2023_04_07_190216_create_tipos_table', 1),
(7, '2023_04_07_190254_create_categorias_table', 1),
(8, '2023_04_07_190331_create_productos_table', 1),
(9, '2023_04_10_211659_create_ventas_table', 2),
(10, '2023_04_10_213015_create_ventadetalles_table', 3),
(11, '2023_04_10_214836_create_ventas_table', 4),
(12, '2023_04_10_221444_create_ventadetalles_table', 5),
(13, '2014_10_12_100000_create_password_resets_table', 6),
(14, '2014_10_12_200000_add_two_factor_columns_to_users_table', 7),
(15, '2020_05_21_100000_create_teams_table', 7),
(16, '2020_05_21_200000_create_team_user_table', 7),
(17, '2020_05_21_300000_create_team_invitations_table', 7),
(18, '2023_04_17_223103_create_sessions_table', 7),
(19, '2023_04_18_174529_create_clientes_table', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idp` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `cantidad` float NOT NULL,
  `costo` decimal(11,0) NOT NULL,
  `idc` int(10) UNSIGNED NOT NULL,
  `idt` int(10) UNSIGNED NOT NULL,
  `ruta` varchar(300) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idp`, `nombre`, `cantidad`, `costo`, `idc`, `idt`, `ruta`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kit Limpiador para Pantallas', 89, '99', 1, 1, 'limpiador.png', NULL, NULL, '2023-04-24 10:10:01'),
(2, 'Removedor De Polvo', 95, '199', 1, 1, 'removedor.png', NULL, NULL, '2023-04-24 09:22:29'),
(7, 'Monitor ThinkVision S22e-20', 76, '3749', 2, 1, 'pantalla2.png\r\n', NULL, NULL, '2023-04-24 06:08:39'),
(8, 'Monitor HP M22f FHD', 97, '3995', 2, 1, 'pantalla1.png', NULL, NULL, '2023-04-24 06:13:46'),
(9, ' Apple Macbook Air De 13 Chip M2 256 Gb Ssd - Plata', 99, '29629', 3, 1, 'laptop2.png', NULL, NULL, '2023-04-24 06:07:19'),
(10, 'Laptop Gamer Lenovo IdeaPad Gaming 3', 100, '22519', 3, 1, 'laptop1.png', NULL, NULL, '2023-04-23 01:16:52'),
(11, 'MacBook Air Apple MGN93LA/A M1 ', 99, '17999', 3, 3, 'laptop3.png', NULL, NULL, '2023-04-24 06:15:29'),
(12, 'Lenovo ThinkBook 15 Premium Business Laptop', 100, '13828', 3, 3, 'laptop4.png', NULL, NULL, '2023-04-20 23:41:23'),
(13, 'Samsung Notebook 9 Pro 2 en 1 13.3\"', 99, '29050', 3, 2, 'laptop6.png', NULL, NULL, '2023-04-24 06:14:47'),
(14, 'HP - Laptop de 15.6 pulgadas Full HD con pantalla táctil', 99, '14754', 3, 2, 'laptop5.png', NULL, NULL, '2023-04-24 06:10:20'),
(15, 'Plumero De Aire Limpiador Kit para Computadora', 99, '799', 1, 1, 'plumero.png', NULL, NULL, '2023-04-24 06:15:41'),
(16, 'Toallitas para Limpieza de Computadoras', 98, '528', 1, 1, 'toallitas.png', NULL, NULL, '2023-04-24 06:10:48'),
(17, 'Cepillo Antiestático para Limpieza pc, 16 Piezas', 96, '229', 1, 1, 'cepillo.png', NULL, NULL, '2023-04-24 06:14:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('L4QcOHjLGTxLRFrLsnxivOml5HsiY6Z8ypGV3bIu', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic1A5dkNXVDJJRXBMZW1sS3lWd056eFVsRUhuNzJFWUpuRGczc3NoeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly9sb2NhbGhvc3QvVmVudGFDb21wdXRvL3B1YmxpYy9yZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1681772247);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `idt` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`idt`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Nuevo', NULL, NULL),
(2, 'Seminuevo', NULL, NULL),
(3, 'Reacondicionado', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jimena', 'jimena.lg@gmail.com', NULL, '$2y$10$ms4VCVYW3rKv1rBuZRicVedUEaPJgSC2CENrqXGKqDcKabKD7YBQW', NULL, NULL, NULL, NULL, '2023-04-13 02:16:23', '2023-04-13 02:16:23'),
(2, 'jimena', 'jimena@gmail.com', NULL, '$2y$10$Pf2DraYLSRWr2APc9zcrquKI8zapQZNwJWdvtHLh6e6rEyqazCt26', NULL, NULL, NULL, NULL, '2023-04-18 08:43:15', '2023-04-18 08:43:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `idv` int(10) UNSIGNED NOT NULL,
  `nombreV` varchar(60) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `ruta` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`idv`, `nombreV`, `telefono`, `direccion`, `ruta`, `created_at`, `updated_at`) VALUES
(1, 'Lucia PS', '2224587901', 'Cholula #3208', 'm1.png', NULL, NULL),
(2, 'Martha SL', '2224587955', 'Tepontla #55A', 'm2.png', NULL, NULL),
(3, 'Samuel MA', '2224587946', 'Puebla #26', 'h1.png', NULL, NULL),
(4, 'Luis Alberto SZ', '2224587966', 'La paz #36C ', 'h2.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventadetalles`
--

CREATE TABLE `ventadetalles` (
  `idvd` int(10) UNSIGNED NOT NULL,
  `idve` int(11) NOT NULL,
  `idv` int(11) NOT NULL,
  `idcli` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `costo` double NOT NULL,
  `promocion` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventadetalles`
--

INSERT INTO `ventadetalles` (`idvd`, `idve`, `idv`, `idcli`, `idp`, `cantidad`, `precio`, `costo`, `promocion`, `created_at`, `updated_at`) VALUES
(209, 3, 3, 2, 17, 1, 229, 206.1, 10, '2023-04-24 06:11:27', '2023-04-24 06:11:27'),
(210, 4, 4, 3, 8, 1, 3995, 3595.5, 10, '2023-04-24 06:12:08', '2023-04-24 06:12:08'),
(212, 5, 1, 2, 2, 1, 199, 139.3, 30, '2023-04-24 06:13:15', '2023-04-24 06:13:15'),
(214, 6, 2, 5, 17, 1, 229, 206.1, 10, '2023-04-24 06:14:11', '2023-04-24 06:14:11'),
(215, 7, 3, 6, 13, 1, 29050, 29050, 0, '2023-04-24 06:14:47', '2023-04-24 06:14:47'),
(216, 8, 4, 4, 11, 1, 17999, 17999, 0, '2023-04-24 06:15:28', '2023-04-24 06:15:28'),
(217, 8, 4, 4, 15, 1, 799, 799, 0, '2023-04-24 06:15:41', '2023-04-24 06:15:41'),
(218, 9, 3, 4, 2, 1, 199, 139.3, 30, '2023-04-24 09:22:29', '2023-04-24 09:22:29'),
(219, 10, 1, 2, 1, 1, 99, 99, 0, '2023-04-24 10:10:01', '2023-04-24 10:10:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idve` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cliente` varchar(100) NOT NULL,
  `vendedor` varchar(60) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`idve`, `fecha`, `cliente`, `vendedor`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '2023-04-21', '2', '1', NULL, '2023-04-24 06:07:09', '2023-04-24 06:07:09'),
(2, '2023-04-21', '1', '2', NULL, '2023-04-24 06:08:38', '2023-04-24 06:08:38'),
(3, '2023-04-21', '2', '3', NULL, '2023-04-24 06:10:20', '2023-04-24 06:10:20'),
(4, '2023-04-22', '3', '4', NULL, '2023-04-24 06:12:08', '2023-04-24 06:12:08'),
(5, '2023-04-22', '2', '1', NULL, '2023-04-24 06:13:15', '2023-04-24 06:13:15'),
(6, '2023-04-22', '5', '2', NULL, '2023-04-24 06:13:46', '2023-04-24 06:13:46'),
(7, '2023-04-22', '6', '3', NULL, '2023-04-24 06:14:47', '2023-04-24 06:14:47'),
(8, '2023-04-22', '4', '4', NULL, '2023-04-24 06:15:28', '2023-04-24 06:15:28'),
(9, '2023-04-23', '4', '3', NULL, '2023-04-24 09:22:29', '2023-04-24 09:22:29'),
(10, '2023-04-24', '2', '1', NULL, '2023-04-24 10:10:01', '2023-04-24 10:10:01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idc`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcli`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `productos_idc_foreign` (`idc`),
  ADD KEY `productos_idt_foreign` (`idt`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indices de la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indices de la tabla `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`idt`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`idv`);

--
-- Indices de la tabla `ventadetalles`
--
ALTER TABLE `ventadetalles`
  ADD PRIMARY KEY (`idvd`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idcli` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `idt` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `idv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ventadetalles`
--
ALTER TABLE `ventadetalles`
  MODIFY `idvd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_idc_foreign` FOREIGN KEY (`idc`) REFERENCES `categorias` (`idc`),
  ADD CONSTRAINT `productos_idt_foreign` FOREIGN KEY (`idt`) REFERENCES `tipos` (`idt`);

--
-- Filtros para la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
