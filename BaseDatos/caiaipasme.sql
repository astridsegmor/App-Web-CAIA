-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2024 a las 06:54:23
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `caiaipasme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliado`
--

CREATE TABLE `afiliado` (
  `id` int(3) NOT NULL,
  `PriApellido` varchar(15) DEFAULT NULL,
  `SegApellido` varchar(15) DEFAULT NULL,
  `PriNombre` varchar(15) DEFAULT NULL,
  `SegNombre` varchar(15) DEFAULT NULL,
  `CedulaA` varchar(12) DEFAULT NULL,
  `SexoA` varchar(10) DEFAULT NULL,
  `FecNacA` date DEFAULT NULL,
  `EdoCivil` varchar(14) DEFAULT NULL,
  `DirHab` varchar(90) DEFAULT NULL,
  `DirTra` varchar(90) NOT NULL,
  `Estado` varchar(25) DEFAULT NULL,
  `Municipio` varchar(25) DEFAULT NULL,
  `Parroquia` varchar(25) DEFAULT NULL,
  `Ciudad` varchar(25) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `TlfCel` varchar(13) DEFAULT NULL,
  `TlfHab` varchar(13) DEFAULT '  ',
  `TlfTrab` varchar(13) DEFAULT '  ',
  `OrgDepende` varchar(36) DEFAULT NULL,
  `TipoCargo` varchar(14) DEFAULT NULL,
  `CondEmpleo` varchar(10) DEFAULT NULL,
  `fecIngA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `afiliado`
--

INSERT INTO `afiliado` (`id`, `PriApellido`, `SegApellido`, `PriNombre`, `SegNombre`, `CedulaA`, `SexoA`, `FecNacA`, `EdoCivil`, `DirHab`, `DirTra`, `Estado`, `Municipio`, `Parroquia`, `Ciudad`, `Email`, `TlfCel`, `TlfHab`, `TlfTrab`, `OrgDepende`, `TipoCargo`, `CondEmpleo`, `fecIngA`) VALUES
(16, 'SEGOVIA', 'PEÑA', 'LEONARDO', 'JOSE', 'V-05.792.181', 'Masculino', '1968-08-27', 'Soltero(a)', 'CARMONA AV. MEDINA ANGARITA  SECTOR CARMONA', 'UPTT MBI, NUCLEO TRUJILLO', 'TRUJILLO', 'TRUJILLO', 'CHIQUINQUIRA', 'TRUJILLO', 'leosegov@gmail.com', '0414-5169441', '0272-1234545', '', 'IPASME', 'Docente', 'Activo', '1995-10-20'),
(17, 'MORENO ', 'CORONADO', 'LUZ', 'MARINA', 'V-07.256.668', 'Femenino', '1968-08-05', 'Soltero(a)', 'CARMONA AV. MEDINA ANGARITA ', '', 'TRUJILLO', 'TRUJILLO', 'CHIQUINQUIRA', 'TRUJILLO', 'LUZMORECOR@GMAIL.COM', '0424-7175591', '0212-2362345', '', 'IPASME', 'Administrativo', 'Activo', '2022-08-03'),
(18, 'CEPEDA', 'PEÑA', 'ALEXANDER', '', 'V-15.565.832', 'Masculino', '1979-03-15', 'Casado(a)', 'URB. EL RECREO SECTOR 3, VEREDA 12, CASA NRO 6 ', '', 'TRUJILLO', 'TRUJILLO', 'MATRIZ', 'TRUJILLO', 'ALEXCEPE@GMAIL.COM', '0123-1234567', '0212-2368888', '', 'IPASME', 'Docente', 'Activo', '2022-08-03'),
(20, 'QUINTERO', 'DE CEPEDA', 'MARIA', 'DE LOS ANGELES', 'V-11.133.769', 'Femenino', '1973-07-24', 'Casado(a)', 'URB. EL RECREO SECTOR 3, VEREDA 12, CASA NRO 6 ', '', 'TRUJILLO', 'TRUJILLO', 'MATRIZ', 'TRUJILLO', 'QUINTERODELGADO6@GMAIL.COM', '0102-1231234', '1234-2364567', '', 'ALCALDÍA', 'Administrativo', 'Contratado', '2022-08-03'),
(21, 'SEGOVIA', 'DE RODRIGUEZ', 'AURA', 'MARINA', 'V-23.254.718', 'Femenino', '1995-03-03', 'Casado(a)', 'CARMONA AV. MEDINA ANGARITA ', '', 'TRUJILLO', 'TRUJILLO', 'CHIQUINQUIRA', 'TRUJILLO', 'AURASEGMOR@GMAIL.COM', '0412-6767671', '4567-2365656', '', 'IPASME', 'Docente', 'Activo', '2022-08-03'),
(22, 'PEREZ', 'RAMIREZ', 'FABIO', 'ANDRE', 'V-29.456.789', 'Masculino', '2001-02-11', 'Soltero(a)', 'CARMONA AV. MEDINA ANGARITA ', '', 'TRUJILLO', 'TRUJILLO', 'CHIQUINQUIRA', 'TRUJILLO', 'FABIPERE@GMAIL.COM', '0412-1234567', '0272-2364567', '', 'IPASME', 'Docente', 'Activo', '2022-07-13'),
(23, 'QUINTERO', 'DE SUAREZ ', 'YADIRA', 'DEL VALLE', 'V-11.125.122', 'Femenino', '1972-05-09', 'Soltero(a)', 'URB. EL RECREO SECTOR 3, VEREDA 12, CASA NRO 6 ', '', 'TRUJILLO', 'TRUJILLO', 'CHIQUINQUIRA', 'TRUJILLO', 'YADQUI@GMAIL.COM', '0414-1234567', '0234-1234589', '', 'M.P.P.E', 'Docente', 'Activo', '2022-08-03'),
(24, 'QUINTERO', 'DELGADO', 'MARIA', 'DE LA COROMOTO', 'V-11.613.618', 'Femenino', '1975-06-25', 'Soltero(a)', 'URB. EL RECREO SECTOR 3, VEREDA 12, CASA NRO 6 ', '', 'TRUJILLO', 'TRUJILLO', 'CHIQUINQUIRA', 'TRUJILLO', 'QUIDEMA@GMAIL.COM', '0426-4324321', '6789-1212345', '', 'M.P.P.E', 'Docente', 'Contratado', '2022-08-03'),
(25, 'DELGADO', 'TERAN', 'MARIA', 'JOSE', 'V-28.438.933', 'Femenino', '2001-07-12', 'Soltero(a)', 'URB. CARMONA, QTA. LISLEOLUIS', '', 'TRUJILLO', 'TRUJILLO', 'CHIQUINQUIRA', 'TRUJILLO', 'MAJODEL@GMAIL.COM', '0424-7234512', '0987-1235656', '', 'IPASME', 'Docente', 'Activo', '2022-08-03'),
(26, 'SEGOVIA', 'QUINTERO', 'ASTRID', 'ALEJANDRA', 'V-05.792.183', 'Femenino', '1999-02-04', 'Soltero(a)', 'URB. CARMONA, QTA. LISLEOLUIS', '', 'TRUJILLO', 'TRUJILLO', 'CHIQUINQUIRA', 'TRUJILLO', 'aurasegmor@gmail.com', '0412-1750249', '0272-1750249', '', 'IPASME', 'Asistencial', 'Contratado', '2022-08-04'),
(47, 'SEGOVIA', 'MORENO', 'GABRIEL', 'TUNKI', 'V-33.333.333', 'Femenino', '2005-04-06', 'Soltero(a)', 'AV. MEDINA ANGARITA, QTA LISLEOLUIS, SECTOR CARMONA', '', 'TRUJILLO', 'TRUJILLO', 'CHIQUINQUIRA', 'TRUJILLO', '', '0414-5169441', '0272-2367247', '', 'IPASME', 'Administrativo', 'Activo', '2024-04-28'),
(48, 'BRICEÑO', 'PEREZ', 'MARIA', 'JOSE', 'V-12.345.678', 'Femenino', '2006-06-01', 'Soltero(a)', 'AV. MEDINA ANGARITA, QTA LISLEOLUIS, SECTOR CARMONA', '', 'TRUJILLO', 'TRUJILLO', 'CHIQUINQUIRA', 'TRUJILLO', 'jose@gmail.com', '0414-5169441', '0272-2367247', '0272-2362626', 'ALCALDÍA', 'Administrativo', 'Activo', '2024-06-01'),
(49, 'BRICEÑO', 'MARQUEZ', 'SILVIA', 'MARIA', 'V-78.945.612', 'Femenino', '2006-06-01', 'Soltero(a)', 'AV. MEDINA ANGARITA, QTA LISLEOLUIS, SECTOR CARMONA', '', 'TRUJILLO', 'TRUJILLO', 'CHIQUINQUIRA', 'TRUJILLO', 'silvia@gmail.com', '0414-5169441', '0272-2367247', '0272-2362626', 'IPASME', 'Docente', 'Activo', '2024-06-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiarios`
--

CREATE TABLE `beneficiarios` (
  `Apellidos_Nombres` varchar(60) DEFAULT NULL,
  `CedulaB` varchar(12) DEFAULT NULL,
  `FecNacB` date DEFAULT NULL,
  `SexoB` char(10) DEFAULT NULL,
  `EdoCivilB` char(14) DEFAULT NULL,
  `Parentesco` char(10) DEFAULT NULL,
  `Cedula_A` varchar(12) DEFAULT NULL,
  `idBenef` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `beneficiarios`
--

INSERT INTO `beneficiarios` (`Apellidos_Nombres`, `CedulaB`, `FecNacB`, `SexoB`, `EdoCivilB`, `Parentesco`, `Cedula_A`, `idBenef`) VALUES
('SEGOVIA MORENO ASTRID ESTEFANIA ', 'V-29.718.968', '2002-11-05', 'Femenino', 'Soltero(a)', 'Hijo(a)', 'V-07.256.668', 1),
('SEGOVIA MORENO AURA MARINA', 'V-23.254.718', '1995-03-06', 'Femenino', 'Soltero(a)', 'Hijo(a)', 'V-07.256.668', 2),
('SEGOVIA MORENO JULIO JOSE ', 'V-26.345.789', '1999-01-08', 'Masculino', 'Soltero(a)', 'Hijo(a)', 'V-07.256.668', 3),
('SEGOVIA MORENO ASTRID ESTEFANIA ', 'V-29.718.968', '2002-11-05', 'Femenino', 'Soltero(a)', 'Hijo(a)', 'V-05.792.181', 4),
('SEGOVIA MORENO AURA MARINA', 'V-23.254.718', '1995-03-06', 'Femenino', 'Soltero(a)', 'Hijo(a)', 'V-05.792.181', 5),
('SEGOVIA MORENO JULIO JOSE ', 'V-26.345.789', '1999-01-08', 'Masculino', 'Soltero(a)', 'Hijo(a)', 'V-05.792.181', 6),
('SEGOVIA MORENO ODIN ALEJANDRO', 'V-77.777.777', '2015-07-07', 'Masculino', 'Soltero(a)', 'Hijo(a)', 'V-05.792.181', 8),
('SEGOVIA MORENO GABRIEL', 'V-33.333.333', '2019-07-23', 'Masculino', 'Soltero(a)', 'Hijo(a)', 'V-05.792.181', 9),
('JOSE BRICEÑO', 'V-90.123.456', '0000-00-00', 'Femenino', 'Soltero(a)', 'Madre', 'V-78.945.612', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configsis`
--

CREATE TABLE `configsis` (
  `Cargo` tinyint(1) NOT NULL,
  `DescripCargo` varchar(40) DEFAULT NULL,
  `Nombre` varchar(40) DEFAULT NULL,
  `Nivel` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configsis`
--

INSERT INTO `configsis` (`Cargo`, `DescripCargo`, `Nombre`, `Nivel`) VALUES
(1, 'DIRECTOR ADMINISTRATIVO', 'LIC. PEDRO RODRIGUEZ D.', 1),
(2, 'Coordinador(a) Financiero(a)', 'Lic. Luz Marina Moreno C.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credint`
--

CREATE TABLE `credint` (
  `NroRegistro` varchar(7) NOT NULL,
  `CodUnidad` varchar(8) DEFAULT NULL,
  `FecSolic` date DEFAULT NULL,
  `Credito` char(1) DEFAULT NULL,
  `TipoCreditoH` varchar(30) DEFAULT NULL,
  `TipoCreditoI` varchar(30) DEFAULT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `MontoSolic` float DEFAULT NULL,
  `PlazoFinanc` tinyint(4) DEFAULT NULL,
  `CedulaA` varchar(12) NOT NULL,
  `DenomCargo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `credint`
--

INSERT INTO `credint` (`NroRegistro`, `CodUnidad`, `FecSolic`, `Credito`, `TipoCreditoH`, `TipoCreditoI`, `Descripcion`, `MontoSolic`, `PlazoFinanc`, `CedulaA`, `DenomCargo`) VALUES
('1010101', '302', '2024-06-09', '1', NULL, 'Personal', 'TELEFONO ', NULL, NULL, 'V-33.333.333', 'PROFESOR'),
('2020202', '302', '2024-06-09', '1', 'Construcción de Vivienda', NULL, NULL, 10200.5, 10, 'V-05.792.181', NULL),
('2020202', '302', '2024-06-09', '1', NULL, 'Vehículos', 'CHERY ARAUCA', NULL, NULL, 'V-33.333.333', 'PROFESOR'),
('3335555', '222', '2023-06-17', '1', NULL, 'Computador', 'COMPUTADORA DELL', NULL, NULL, 'V-05.792.181', 'Padre'),
('3336666', '222', '2024-05-25', '1', NULL, 'Personal', 'TELEFONO ', NULL, NULL, 'V-05.792.181', 'AAA'),
('5050505', '333', '2024-05-25', '1', NULL, 'Personal', 'CARRO', NULL, NULL, 'V-05.792.181', 'PROFESOR'),
('7894561', '8585', '2024-06-01', '1', NULL, 'Vehículos', 'CHERY ARAUCA', NULL, NULL, 'V-78.945.612', 'PROFESOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credpersonal`
--

CREATE TABLE `credpersonal` (
  `MontoSolic` float DEFAULT NULL,
  `PlazoFinanc` tinyint(4) DEFAULT NULL,
  `NroRegistro` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Estructura de tabla para la tabla `requisitos`
--

CREATE TABLE `requisitos` (
  `CedAfil` varchar(12) NOT NULL,
  `CedulaA` varchar(1) NOT NULL,
  `RecPagoA` varchar(1) NOT NULL,
  `ConstTrabA` varchar(1) NOT NULL,
  `CedConyA` varchar(1) NOT NULL,
  `ActMatrimA` varchar(1) NOT NULL,
  `CedConcubA` varchar(1) NOT NULL,
  `ConstConcubA` varchar(1) NOT NULL,
  `CedHijosA` varchar(1) NOT NULL,
  `PartNacHA` varchar(1) NOT NULL,
  `ConstSoltHA` varchar(1) NOT NULL,
  `ConstEstHA` varchar(1) NOT NULL,
  `ConstExpHA` varchar(1) NOT NULL,
  `CedPadresA` varchar(1) NOT NULL,
  `PartNacA` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `requisitos`
--

INSERT INTO `requisitos` (`CedAfil`, `CedulaA`, `RecPagoA`, `ConstTrabA`, `CedConyA`, `ActMatrimA`, `CedConcubA`, `ConstConcubA`, `CedHijosA`, `PartNacHA`, `ConstSoltHA`, `ConstEstHA`, `ConstExpHA`, `CedPadresA`, `PartNacA`) VALUES
('V-05.792.181', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
('V-12.345.678', '1', '1', '1', '1', '1', '0', '0', '0', '0', '1', '0', '0', '0', '1'),
('V-33.333.333', '1', '1', '1', '0', '0', '0', '0', '0', '0', '1', '0', '0', '1', '1'),
('V-78.945.612', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Astrid', 'astridsegmor@gmail.com', NULL, '$2y$10$3QRT0xkB6gC4Wl6n6R7uB.e5iBjdmAAvbRmTIlEYRRu1Zfb2B3k4m', NULL, '2024-04-20 14:57:17', '2024-04-20 14:57:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Usuario` varchar(15) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Usuario`, `Password`) VALUES
('DepaCaia', 'DepaCaia8300'),
('Leo', 'Leo1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliado`
--
ALTER TABLE `afiliado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  ADD PRIMARY KEY (`idBenef`);

--
-- Indices de la tabla `configsis`
--
ALTER TABLE `configsis`
  ADD PRIMARY KEY (`Cargo`);

--
-- Indices de la tabla `credint`
--
ALTER TABLE `credint`
  ADD PRIMARY KEY (`NroRegistro`,`CedulaA`);

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
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `requisitos`
--
ALTER TABLE `requisitos`
  ADD PRIMARY KEY (`CedAfil`);

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
-- AUTO_INCREMENT de la tabla `afiliado`
--
ALTER TABLE `afiliado`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `beneficiarios`
--
ALTER TABLE `beneficiarios`
  MODIFY `idBenef` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
