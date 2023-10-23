-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql311.infinityfree.com
-- Tiempo de generación: 23-10-2023 a las 14:44:17
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `if0_35191603_crm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `customer_id`, `description`, `appointment_date`, `created_at`, `updated_at`, `deleted_at`, `team_id`) VALUES
(1, 2, 1, 'Descripción de prueba 1', '2023-10-20 14:00:00', '2023-10-20 07:02:04', '2023-10-20 07:02:04', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `county` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_renter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `income` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `main_address`, `secondary_address`, `city`, `state`, `zip_code`, `county`, `phone_number`, `owner_renter`, `credit_rating`, `home_value`, `income`, `age`, `birth_month`, `status`, `foto`, `created_at`, `updated_at`, `deleted_at`, `team_id`, `user_id`) VALUES
(1, 'FELIX', 'SANDOVAL', '11444 N 47TH AVE', NULL, 'GLENDALE', 'AZ', '85304', 'MARICOPA', '6236804327', 'Home Owner', '650-699', '$400,000 - $449,999', '$60,000 - $64,999', '64', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 2),
(2, 'MARIA', 'ARIZMENDEZ', '6229 W JONES AVE', NULL, 'PHOENIX', 'AZ', '85043', 'MARICOPA', '6023706307', 'Home Owner', '650-699', '$350,000 - $399,999', '$75,000 - $99,999', '44', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 2),
(3, 'MIGUEL', 'GODINEZ', '5454 W WILSHIRE DR', NULL, 'PHOENIX', 'AZ', '85035', 'MARICOPA', '6025416723', 'Home Owner', '650-699', '$50,000 - $74,999', '$50,000 - $54,999', '59', '9', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 2),
(4, 'MARLEN', 'SANTOYA', '6425 W MISSOURI AVE', NULL, 'GLENDALE', 'AZ', '85301', 'MARICOPA', '6233265565', 'Home Owner', '650-699', 'Unknown', '$65,000 - $74,999', '50', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 2),
(5, 'LUIS', 'PEREZ', '8332 E GRANADA RD', NULL, 'SCOTTSDALE', 'AZ', '85257', 'MARICOPA', '9284867077', 'Home Owner', '650-699', '$500,000 - $749,999', '$75,000 - $99,999', '52', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 2),
(6, 'DEISY', 'LUNA', '2630 N 64TH DR', NULL, 'PHOENIX', 'AZ', '85035', 'MARICOPA', '3182882927', 'Home Owner', '700-749', '$275,000 - $299,999', '$50,000 - $54,999', '25', '2', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 2),
(7, 'AMADO', 'VALENCIA', '1430 W MULBERRY DR', NULL, 'CHANDLER', 'AZ', '85286', 'MARICOPA', '9282659373', 'Home Owner', '700-749', '$350,000 - $399,999', '$175,000 - $199,999', '50', '2', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 2),
(8, 'PATRICIO', 'DELOSSANTOS', '2414 S CLARK DR', NULL, 'TEMPE', 'AZ', '85282', 'MARICOPA', '6028408637', 'Home Owner', '700-749', '$125,000 - $149,999', '$175,000 - $199,999', '60', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 2),
(9, 'GRISELDA', 'RIVAS', '3925 W MYRTLE AVE', NULL, 'PHOENIX', 'AZ', '85051', 'MARICOPA', '6029107414', 'Home Owner', '650-699', '$350,000 - $399,999', '$75,000 - $99,999', '46', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 2),
(10, 'EDGAR', 'FLORES', '3108 W GRANADA RD', NULL, 'PHOENIX', 'AZ', '85009', 'MARICOPA', '6023847241', 'Home Owner', '700-749', '$300,000 - $349,999', '$45,000 - $49,999', '29', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 2),
(11, 'BRIGEDA', 'MASCARENAS', '1002 N SEA HAVEN CT', NULL, 'GILBERT', 'AZ', '85234', 'MARICOPA', '4803104576', 'Home Owner', '700-749', '$500,000 - $749,999', '$100,000 - $149,999', '53', '11', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 3),
(12, 'FABIO', 'SANCHEZ', '1022 E LINDA LN', NULL, 'GILBERT', 'AZ', '85234', 'MARICOPA', '9176890576', 'Home Owner', '700-749', 'Unknown', '$100,000 - $149,999', '29', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 3),
(13, 'TERESITA', 'VALDEZ', '1021 W CANTEBRIA DR', NULL, 'GILBERT', 'AZ', '85233', 'MARICOPA', '6232490068', 'Home Owner', '700-749', '$450,000 - $499,999', '$35,000 - $39,999', '60', '11', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 3),
(14, 'JAVIER', 'BENITES', '1161 W KELLY LN', NULL, 'TEMPE', 'AZ', '85284', 'MARICOPA', '4802922561', 'Home Owner', '700-749', '$400,000 - $449,999', '$100,000 - $149,999', '31', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 3),
(15, 'GERARDO', 'PENA', '18044 W TURQUOISE AVE', NULL, 'WADDELL', 'AZ', '85355', 'MARICOPA', '6233998954', 'Home Owner', '650-699', '$500,000 - $749,999', '$100,000 - $149,999', '35', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 3),
(16, 'LORENA', 'ORTIZ', '12621 W ROANOKE AVE', NULL, 'AVONDALE', 'AZ', '85392', 'MARICOPA', '6024215209', 'Home Owner', '650-699', '$300,000 - $349,999', '$100,000 - $149,999', '50', '12', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 3),
(17, 'MARIA', 'VALLE', '2208 W HARTFORD AVE', NULL, 'PHOENIX', 'AZ', '85023', 'MARICOPA', '4439042039', 'Home Owner', '650-699', '$300,000 - $349,999', '$45,000 - $49,999', '38', '7', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 3),
(18, 'MARK', 'SANCHEZ', 'PO BOX 366', NULL, 'CASHION', 'AZ', '85329', 'MARICOPA', '6028840646', 'Home Owner', '650-699', '$75,000 - $99,999', '$25,000 - $29,999', '53', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 3),
(19, 'GABRIELA', 'GONZALEZ', '4915 W INDIANOLA AVE', NULL, 'PHOENIX', 'AZ', '85031', 'MARICOPA', '4804557917', 'Home Owner', '650-699', '$300,000 - $349,999', '$50,000 - $54,999', '54', '3', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 3),
(20, 'CESAR', 'SANCHEZ', '1251 W GAIL DR', NULL, 'CHANDLER', 'AZ', '85224', 'MARICOPA', '9152571259', 'Home Owner', '650-699', '$400,000 - $449,999', '$75,000 - $99,999', '39', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 3),
(21, 'IRVING', 'LOPEZ', '10953 W PIERSON ST', NULL, 'PHOENIX', 'AZ', '85037', 'MARICOPA', '6239860619', 'Home Owner', '700-749', '$300,000 - $349,999', '$65,000 - $74,999', '43', '12', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 4),
(22, 'ROSARIO', 'CASTILLO', '9135 N 70TH ST', NULL, 'PARADISE VALLEY', 'AZ', '85253', 'MARICOPA', '6022958837', 'Home Owner', '650-699', 'Unknown', '$200,000 - $249,999', '61', '4', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 4),
(23, 'MATTHEW', 'PACHECO', '8631 N 50TH LN', NULL, 'GLENDALE', 'AZ', '85302', 'MARICOPA', '6232060747', 'Home Owner', '650-699', '$100,000 - $124,999', '$35,000 - $39,999', '60', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 4),
(24, 'VICTOR', 'NUNEZ', '6041 S 13TH ST', NULL, 'PHOENIX', 'AZ', '85042', 'MARICOPA', '6025501528', 'Home Owner', '650-699', '$200,000 - $224,999', '$30,000 - $34,999', '46', '7', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 4),
(25, 'NIKKI', 'PUIG', '7616 N 33RD AVE', NULL, 'PHOENIX', 'AZ', '85051', 'MARICOPA', '4802660268', 'Home Owner', '650-699', '$75,000 - $99,999', '$30,000 - $34,999', '63', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 4),
(26, 'DANIEL', 'SOTO', '7621 W HIGHLAND AVE', NULL, 'PHOENIX', 'AZ', '85033', 'MARICOPA', '6233831846', 'Home Owner', '650-699', '$350,000 - $399,999', '$45,000 - $49,999', '39', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 4),
(27, 'DANIEL', 'MARTINEZ', '12343 W ORANGE DR', NULL, 'LITCHFIELD PARK', 'AZ', '85340', 'MARICOPA', '6232104278', 'Home Owner', '650-699', '$350,000 - $399,999', '$60,000 - $64,999', '34', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 4),
(28, 'SANTANA', 'VAZQUEZ', '7736 W VERMONT AVE', NULL, 'GLENDALE', 'AZ', '85303', 'MARICOPA', '4804598925', 'Home Owner', '700-749', '$275,000 - $299,999', '$25,000 - $29,999', '44', '6', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 4),
(29, 'KAREN', 'ORTEGA', '5514 S DOVE VLY', NULL, 'BUCKEYE', 'AZ', '85326', 'MARICOPA', '6029077652', 'Home Owner', '700-749', '$300,000 - $349,999', 'Unknown', '27', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 4),
(30, 'EDISON', 'FIERRO', '17440 N 85TH DR', NULL, 'PEORIA', 'AZ', '85382', 'MARICOPA', '6027966813', 'Home Owner', '700-749', '$400,000 - $449,999', '$55,000 - $59,999', '63', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 4),
(31, 'XCIOMARA', 'FLORES', '6309 W RIVA RD', NULL, 'PHOENIX', 'AZ', '85043', 'MARICOPA', '6028106177', 'Home Owner', '700-749', '$225,000 - $249,999', '$60,000 - $64,999', '51', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 5),
(32, 'CHAD', 'SALINAS', '4360 E HUBBELL ST', NULL, 'PHOENIX', 'AZ', '85008', 'MARICOPA', '6023262594', 'Home Owner', '700-749', '$100,000 - $124,999', '$45,000 - $49,999', '57', '4', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 5),
(33, 'JOSE', 'CHAVEZ', '7019 W BERKELEY RD', NULL, 'PHOENIX', 'AZ', '85035', 'MARICOPA', '6024518378', 'Home Owner', '700-749', '$200,000 - $224,999', '$50,000 - $54,999', '54', '6', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 5),
(34, 'CHRISTINA', 'ORTIZ', '3627 W EL CAMINITO DR', NULL, 'PHOENIX', 'AZ', '85051', 'MARICOPA', '6239866681', 'Home Owner', '700-749', '$300,000 - $349,999', '$65,000 - $74,999', '36', '12', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 5),
(35, 'SANDRA', 'CUEVAS', '6628 W MULBERRY DR', NULL, 'PHOENIX', 'AZ', '85033', 'MARICOPA', '6234636607', 'Home Owner', '650-699', '$225,000 - $249,999', '$35,000 - $39,999', '59', '11', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 5),
(36, 'MONICA', 'VELAZQUEZ', '11603 S AIRPORT RD', NULL, 'BUCKEYE', 'AZ', '85326', 'MARICOPA', '6236940728', 'Home Owner', '700-749', '$150,000 - $174,999', '$60,000 - $64,999', '61', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 5),
(37, 'OCTAVIO', 'CASTILLO', '4947 W CHEERY LYNN RD', NULL, 'PHOENIX', 'AZ', '85031', 'MARICOPA', '6024516125', 'Home Owner', '650-699', '$250,000 - $274,999', '$45,000 - $49,999', '64', '5', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 5),
(38, 'CHRISTINA', 'PAEZ', '8741 W MONTEREY WAY', NULL, 'PHOENIX', 'AZ', '85037', 'MARICOPA', '6233968008', 'Home Owner', '700-749', '$300,000 - $349,999', '$40,000 - $44,999', '56', '6', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 5),
(39, 'RUBEN', 'ARMENTA', '1136 S 72ND ST', NULL, 'MESA', 'AZ', '85208', 'MARICOPA', '4807199130', 'Home Owner', '700-749', '$350,000 - $399,999', '$65,000 - $74,999', '54', '3', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 5),
(40, 'RITA', 'RASCON', '2812 E MONROE ST', NULL, 'PHOENIX', 'AZ', '85034', 'MARICOPA', '6023548143', 'Home Owner', '700-749', '$75,000 - $99,999', '$25,000 - $29,999', '48', '11', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 5),
(41, 'JUANA', 'SERRATO', '19 E SOUTHGATE AVE', NULL, 'PHOENIX', 'AZ', '85040', 'MARICOPA', '6023732513', 'Home Owner', '650-699', '$300,000 - $349,999', '$10,000 - $14,999', '62', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 6),
(42, 'RAMONA', 'ALCANTAR', '2208 E ELMWOOD ST', NULL, 'MESA', 'AZ', '85213', 'MARICOPA', '4802590049', 'Home Owner', '650-699', 'Unknown', '$50,000 - $54,999', '64', '8', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 6),
(43, 'IRMA', 'GARNICA', '2027 W RANCHO DR', NULL, 'PHOENIX', 'AZ', '85015', 'MARICOPA', '6023496386', 'Home Owner', '650-699', '$350,000 - $399,999', '$40,000 - $44,999', '58', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 6),
(44, 'IVAN', 'CARO', '701 E PALOMINO DR', NULL, 'GILBERT', 'AZ', '85296', 'MARICOPA', '4807095963', 'Home Owner', '700-749', '$500,000 - $749,999', '$100,000 - $149,999', '40', '4', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 6),
(45, 'ANDREW', 'RAEL', '501 E FRYE RD', NULL, 'CHANDLER', 'AZ', '85225', 'MARICOPA', '4804330839', 'Home Owner', '650-699', '$450,000 - $499,999', '$35,000 - $39,999', '39', '7', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 6),
(46, 'QUINTINA', 'VENTURA', '15152 N VERBENA ST', NULL, 'EL MIRAGE', 'AZ', '85335', 'MARICOPA', '6023237910', 'Home Owner', '650-699', '$200,000 - $224,999', '$30,000 - $34,999', '63', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 6),
(47, 'RAFAEL', 'VASQUEZ', '1627 W CHERYL DR', NULL, 'PHOENIX', 'AZ', '85021', 'MARICOPA', '6027491359', 'Home Owner', '650-699', '$275,000 - $299,999', '$35,000 - $39,999', '27', '5', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 6),
(48, 'YSABEL', 'ROMERO', '806 S 3RD ST', NULL, 'AVONDALE', 'AZ', '85323', 'MARICOPA', '6023616435', 'Home Owner', '650-699', 'Unknown', '$25,000 - $29,999', '40', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 6),
(49, 'PAUL', 'GONZALES', '7633 S 41ST ST', NULL, 'PHOENIX', 'AZ', '85042', 'MARICOPA', '6022440612', 'Home Owner', '700-749', '$400,000 - $449,999', '$75,000 - $99,999', '40', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 6),
(50, 'MARIO', 'VINCITORIO', '1204 N CAMBRIDGE CIR', NULL, 'CHANDLER', 'AZ', '85225', 'MARICOPA', '4802421973', 'Home Owner', '650-699', '$500,000 - $749,999', '$75,000 - $99,999', '62', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 1, 6),
(51, 'JOSE', 'PARRA', '8037 W HEATHERBRAE DR', NULL, 'PHOENIX', 'AZ', '85033', 'MARICOPA', '6027107890', 'Home Owner', '650-699', '$100,000 - $124,999', '$40,000 - $44,999', '52', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 7),
(52, 'DANIEL', 'JARAMILLO', '10622 W BUTLER DR', NULL, 'PEORIA', 'AZ', '85345', 'MARICOPA', '6022459068', 'Home Owner', '700-749', '$225,000 - $249,999', '$65,000 - $74,999', '42', '3', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 7),
(53, 'TIMOTHY', 'CRUZ', '2333 E CLARENDON AVE', NULL, 'PHOENIX', 'AZ', '85016', 'MARICOPA', '6026885402', 'Home Owner', '700-749', '$100,000 - $124,999', '$40,000 - $44,999', '54', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 7),
(54, 'CARLOS', 'RIVERO', '2440 S 71ST DR', NULL, 'PHOENIX', 'AZ', '85043', 'MARICOPA', '6025762572', 'Home Owner', '650-699', '$350,000 - $399,999', '$55,000 - $59,999', '42', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 7),
(55, 'MARIA', 'PINEDA', '10009 W WINSLOW AVE', NULL, 'TOLLESON', 'AZ', '85353', 'MARICOPA', '5202501097', 'Home Owner', '650-699', '$300,000 - $349,999', '$35,000 - $39,999', '47', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 7),
(56, 'CARLOS', 'MEJIA', '7824 S 73RD LN', NULL, 'LAVEEN', 'AZ', '85339', 'MARICOPA', '6029199014', 'Home Owner', '650-699', '$300,000 - $349,999', '$45,000 - $49,999', '44', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 7),
(57, 'MARIA', 'FIGUEROA', '172 W KESLER LN', NULL, 'CHANDLER', 'AZ', '85225', 'MARICOPA', '5202932069', 'Home Owner', '700-749', '$200,000 - $224,999', '$50,000 - $54,999', '55', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 7),
(58, 'ESMERALDA', 'FLORES', '4041 W ALTA VISTA RD', NULL, 'PHOENIX', 'AZ', '85041', 'MARICOPA', '6026724671', 'Home Owner', '650-699', '$250,000 - $274,999', '$15,000 - $19,999', '33', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 7),
(59, 'TELIA', 'SANCHEZ', '5902 W HAZELWOOD ST', NULL, 'PHOENIX', 'AZ', '85033', 'MARICOPA', '6238489486', 'Home Owner', '650-699', '$250,000 - $274,999', '$55,000 - $59,999', '62', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 7),
(60, 'FRANCESCA', 'SANCHEZ', '8922 N 18TH AVE', NULL, 'PHOENIX', 'AZ', '85021', 'MARICOPA', '6028617057', 'Home Owner', '650-699', '$350,000 - $399,999', '$65,000 - $74,999', '48', '6', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 7),
(61, 'SUZANNE', 'MENDOZA', '8814 W BROWN ST', NULL, 'PEORIA', 'AZ', '85345', 'MARICOPA', '4803190467', 'Home Owner', '650-699', '$350,000 - $399,999', '$45,000 - $49,999', '54', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(62, 'SANTIAGO', 'CONTRERAS', '8636 S 5TH DR', NULL, 'PHOENIX', 'AZ', '85041', 'MARICOPA', '6023172789', 'Home Owner', '700-749', '$300,000 - $349,999', '$45,000 - $49,999', '58', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(63, 'RICHARD', 'SEDILLO', '15032 N 22ND ST', NULL, 'PHOENIX', 'AZ', '85022', 'MARICOPA', '6024514127', 'Home Owner', '650-699', '$350,000 - $399,999', '$75,000 - $99,999', '61', '7', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(64, 'YVONNE', 'GONZALEZ', '3162 E CHISUM LN', NULL, 'GILBERT', 'AZ', '85297', 'MARICOPA', '5864825667', 'Home Owner', '700-749', 'Unknown', '$65,000 - $74,999', '53', '8', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(65, 'MARISSA', 'JIMENEZ', '8537 E LAREDO LN', NULL, 'SCOTTSDALE', 'AZ', '85250', 'MARICOPA', '4809676870', 'Home Owner', '700-749', '$750,000 - $999,999', '$200,000 - $249,999', '38', '3', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(66, 'CHRISTOPHER', 'VALENCIA', '732 E 8TH ST', NULL, 'MESA', 'AZ', '85203', 'MARICOPA', '6023274400', 'Home Owner', '650-699', '$400,000 - $449,999', '$75,000 - $99,999', '47', '8', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(67, 'JOSE', 'MARTINEZ', '6920 W CYPRESS ST', NULL, 'PHOENIX', 'AZ', '85035', 'MARICOPA', '6025036130', 'Home Owner', '650-699', '$150,000 - $174,999', '$35,000 - $39,999', '37', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(68, 'BENJAMIN', 'RAMOS', '1726 W 6TH AVE', NULL, 'MESA', 'AZ', '85202', 'MARICOPA', '4804061203', 'Home Owner', '700-749', '$300,000 - $349,999', '$55,000 - $59,999', '53', '3', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(69, 'JAIRO', 'VILLAGRANA', '10219 S 46TH WAY', NULL, 'PHOENIX', 'AZ', '85044', 'MARICOPA', '6024340598', 'Home Owner', '650-699', '$500,000 - $749,999', '$100,000 - $149,999', '31', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(70, 'ALEJANDRA', 'ROBLEDO', '6716 W CAMPBELL AVE', NULL, 'PHOENIX', 'AZ', '85033', 'MARICOPA', '6239996075', 'Home Owner', '650-699', '$300,000 - $349,999', '$35,000 - $39,999', '31', '8', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(71, 'MARITZA', 'LOPEZ', '6770 N 77TH LN', NULL, 'GLENDALE', 'AZ', '85303', 'MARICOPA', '6023692248', 'Home Owner', '700-749', '$350,000 - $399,999', '$55,000 - $59,999', '42', '10', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(72, 'HORACIO', 'DELGADO', '6402 W GARFIELD ST', NULL, 'PHOENIX', 'AZ', '85043', 'MARICOPA', '6023145623', 'Home Owner', '700-749', 'Unknown', '$45,000 - $49,999', '60', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(73, 'TATIANA', 'MARQUEZ', '8938 W MAUI LN', NULL, 'PEORIA', 'AZ', '85381', 'MARICOPA', '6232439565', 'Home Owner', '700-749', '$150,000 - $174,999', '$100,000 - $149,999', '23', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(74, 'EUGENIA', 'LOPEZ', '207 N PIMA RD', NULL, 'BUCKEYE', 'AZ', '85326', 'MARICOPA', '6233856311', 'Home Owner', '650-699', '$25,000 - $49,999', '$10,000 - $14,999', '45', '3', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(75, 'RODOLFO', 'SIERRA', '4157 W HAYWARD AVE', NULL, 'PHOENIX', 'AZ', '85051', 'MARICOPA', '6233493093', 'Home Owner', '650-699', '$450,000 - $499,999', '$65,000 - $74,999', '52', '11', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(76, 'RANJINI', 'ESCALANTE', '8343 W SIERRA VISTA DR', NULL, 'GLENDALE', 'AZ', '85305', 'MARICOPA', '6027140236', 'Home Owner', '650-699', '$350,000 - $399,999', '$65,000 - $74,999', '40', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(77, 'GREGORIO', 'PEREZ', '24841 W HACIENDA AVE', NULL, 'BUCKEYE', 'AZ', '85326', 'MARICOPA', '6237553699', 'Home Owner', '700-749', '$300,000 - $349,999', '$75,000 - $99,999', '63', '10', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(78, 'PASCUAL', 'RAMIREZ-CRUZ', '15150 W EVENING STAR TRL', NULL, 'SURPRISE', 'AZ', '85374', 'MARICOPA', '6023677758', 'Home Owner', '650-699', 'Unknown', '$55,000 - $59,999', '57', '6', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(79, 'MARTIN', 'AVILA', '7108 W ALMERIA RD', NULL, 'PHOENIX', 'AZ', '85035', 'MARICOPA', '6234283032', 'Home Owner', '700-749', '$200,000 - $224,999', '$45,000 - $49,999', '61', '3', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(80, 'NATALIE', 'CASTELO', '6444 N 77TH DR', NULL, 'GLENDALE', 'AZ', '85303', 'MARICOPA', '6025658344', 'Home Owner', '650-699', '$400,000 - $449,999', '$60,000 - $64,999', '31', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(81, 'JOSE', 'ZELAYA', '22195 W LASSO LN', NULL, 'BUCKEYE', 'AZ', '85326', 'MARICOPA', '6236969232', 'Home Owner', '700-749', '$300,000 - $349,999', '$55,000 - $59,999', '56', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(82, 'GUADALUPE', 'GONZALES', '6534 W LARIAT LN', NULL, 'PHOENIX', 'AZ', '85083', 'MARICOPA', '6233308158', 'Home Owner', '700-749', '$450,000 - $499,999', '$75,000 - $99,999', '63', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(83, 'MELISSA', 'MARTINEZ', '760 E HARRISON ST', NULL, 'CHANDLER', 'AZ', '85225', 'MARICOPA', '4803599509', 'Home Owner', '650-699', '$125,000 - $149,999', '$60,000 - $64,999', '46', '8', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(84, 'JOSE', 'MEJIA', '4640 W HUBBELL ST', NULL, 'PHOENIX', 'AZ', '85035', 'MARICOPA', '6022725361', 'Home Owner', '650-699', '$275,000 - $299,999', 'Under $10,000', '61', '12', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(85, 'ANTONIO', 'FABELA', '8729 W VALE DR', NULL, 'PHOENIX', 'AZ', '85037', 'MARICOPA', '6232364770', 'Home Owner', '650-699', '$350,000 - $399,999', '$55,000 - $59,999', '55', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(86, 'GEORGE', 'MORENO', '3426 S 121ST DR', NULL, 'TOLLESON', 'AZ', '85353', 'MARICOPA', '6028591238', 'Home Owner', '650-699', '$300,000 - $349,999', '$45,000 - $49,999', '61', '3', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(87, 'CIRCE', 'RODRIGUEZ', '8649 W AVALON DR', NULL, 'PHOENIX', 'AZ', '85037', 'MARICOPA', '6024510764', 'Home Owner', '650-699', 'Unknown', '$35,000 - $39,999', '37', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(88, 'NOEL', 'SIERRA', '10127 W PARKWAY DR', NULL, 'TOLLESON', 'AZ', '85353', 'MARICOPA', '9286071139', 'Home Owner', '700-749', '$350,000 - $399,999', '$75,000 - $99,999', '39', '7', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(89, 'RENEE', 'VILLEGES', '6108 N 9TH ST', NULL, 'PHOENIX', 'AZ', '85014', 'MARICOPA', '6024133648', 'Home Owner', '700-749', '$400,000 - $449,999', '$60,000 - $64,999', '58', '5', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(90, 'LARA', 'RODRIGUEZ', '2602 N 40TH AVE', NULL, 'PHOENIX', 'AZ', '85009', 'MARICOPA', '9282799879', 'Home Owner', '650-699', '$300,000 - $349,999', '$45,000 - $49,999', '55', '11', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(91, 'MARIBEL', 'MENCHACA', '3914 S 100TH GLN', NULL, 'TOLLESON', 'AZ', '85353', 'MARICOPA', '6029198926', 'Home Owner', '650-699', '$300,000 - $349,999', '$45,000 - $49,999', '31', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(92, 'RAMON', 'ALVAREZ', '3408 W SIERRA VISTA DR', NULL, 'PHOENIX', 'AZ', '85017', 'MARICOPA', '6022461176', 'Home Owner', '700-749', '$300,000 - $349,999', '$55,000 - $59,999', '56', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(93, 'JOSE', 'PEREZ', '4451 E OLNEY DR', NULL, 'PHOENIX', 'AZ', '85044', 'MARICOPA', '4802971596', 'Home Owner', '700-749', '$250,000 - $274,999', '$100,000 - $149,999', '56', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(94, 'JENNIFER', 'GURULE', '1737 W CARSON RD', NULL, 'PHOENIX', 'AZ', '85041', 'MARICOPA', '6027400543', 'Home Owner', '700-749', 'Unknown', '$20,000 - $24,999', '39', '9', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(95, 'LIDIA', 'CONTRERAS', '3017 S MESITA', NULL, 'MESA', 'AZ', '85212', 'MARICOPA', '6028298274', 'Home Owner', '650-699', '$500,000 - $749,999', '$100,000 - $149,999', '56', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(96, 'ASHLEY', 'TORRES', '817 N NEBRASKA ST', NULL, 'CHANDLER', 'AZ', '85225', 'MARICOPA', '6025413095', 'Home Owner', '650-699', '$350,000 - $399,999', '$45,000 - $49,999', '26', '10', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(97, 'DOLSA', 'CRUZ', '1505 S WHITING', NULL, 'MESA', 'AZ', '85204', 'MARICOPA', '4804306028', 'Home Owner', '700-749', '$100,000 - $124,999', '$75,000 - $99,999', '44', '0', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(98, 'ERICA', 'GARCIA', '3927 W KALER DR', NULL, 'PHOENIX', 'AZ', '85051', 'MARICOPA', '6023326838', 'Home Owner', '650-699', '$350,000 - $399,999', '$50,000 - $54,999', '40', '1', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(99, 'OLGA', 'TORREZ', '11325 E RENATA CIR', NULL, 'MESA', 'AZ', '85212', 'MARICOPA', '4809848123', 'Home Owner', '650-699', '$500,000 - $749,999', '$100,000 - $149,999', '60', '3', 'pending', NULL, '2023-10-18 04:01:36', '2023-10-18 04:01:36', NULL, 2, 8),
(100, 'JON', 'BONNER', '3709 E POTTER DR', NULL, 'PHOENIX', 'AZ', '85050', 'MARICOPA', '4803324016', 'Home Owner', '650-699', '$500,000 - $749,999', '$175,000 - $199,999', '47', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(101, 'JIMMY', 'GARCIA', '4608 W LANDIS LN', NULL, 'GLENDALE', 'AZ', '85306', 'MARICOPA', '2088919501', 'Home Owner', '650-699', '$400,000 - $449,999', '$65,000 - $74,999', '35', '2', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(102, 'JANET', 'KENNEY', '2867 E PALO VERDE CT', NULL, 'GILBERT', 'AZ', '85296', 'MARICOPA', '4802862125', 'Home Owner', '700-749', 'Unknown', '$200,000 - $249,999', '55', '10', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(103, 'TERRY', 'VARGA', '5211 N 85TH AVE', NULL, 'GLENDALE', 'AZ', '85305', 'MARICOPA', '6023290773', 'Home Owner', '650-699', '$450,000 - $499,999', '$65,000 - $74,999', '63', '10', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(104, 'KIMBERLY', 'FOREMAN', '8207 E PLATA AVE', NULL, 'MESA', 'AZ', '85212', 'MARICOPA', '4803537042', 'Home Owner', '700-749', '$450,000 - $499,999', '$100,000 - $149,999', '59', '2', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(105, 'GARY', 'FRENDAHL', '2109 E MARQUETTE DR', NULL, 'GILBERT', 'AZ', '85234', 'MARICOPA', '6027575332', 'Home Owner', '700-749', '$200,000 - $224,999', '$100,000 - $149,999', '62', '2', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(106, 'JASON', 'ZUCKERMAN', '10433 E CINNABAR AVE', NULL, 'SCOTTSDALE', 'AZ', '85258', 'MARICOPA', '4802145164', 'Home Owner', '700-749', '$500,000 - $749,999', '$250,000 Plus', '46', '3', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(107, 'ROBIN', 'MORAN', 'PO BOX 309', NULL, 'LAVEEN', 'AZ', '85339', 'MARICOPA', '6024185443', 'Home Owner', '650-699', '$100,000 - $124,999', '$35,000 - $39,999', '56', '12', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(108, 'REAJUL', 'LASKER', '881 W FOLLEY ST', NULL, 'CHANDLER', 'AZ', '85225', 'MARICOPA', '6023762846', 'Home Owner', '700-749', '$750,000 - $999,999', '$175,000 - $199,999', '37', '3', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(109, 'ROB', 'WEBB', '836 E JUNE ST', NULL, 'MESA', 'AZ', '85203', 'MARICOPA', '4804640052', 'Home Owner', '700-749', '$500,000 - $749,999', '$75,000 - $99,999', '61', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(110, 'MICHEL', 'MCDOUGALL', '1755 W MARIPOSA CT', NULL, 'CHANDLER', 'AZ', '85224', 'MARICOPA', '4802437198', 'Home Owner', '650-699', '$400,000 - $449,999', '$40,000 - $44,999', '57', '3', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(111, 'BRIDGET', 'MURPHY', '3817 E MARCONI AVE', NULL, 'PHOENIX', 'AZ', '85032', 'MARICOPA', '6026288471', 'Home Owner', '650-699', '$150,000 - $174,999', '$20,000 - $24,999', '52', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(112, 'MATTIE', 'LARUE', '3660 S HOLLYHOCK PL', NULL, 'CHANDLER', 'AZ', '85248', 'MARICOPA', '4805933267', 'Home Owner', '650-699', '$500,000 - $749,999', '$100,000 - $149,999', '33', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(113, 'ABIGAIL', 'WEIGELE', '1416 E KRAMER ST', NULL, 'MESA', 'AZ', '85203', 'MARICOPA', '4803302928', 'Home Owner', '700-749', '$450,000 - $499,999', '$100,000 - $149,999', '42', '4', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(114, 'STEVEN', 'COHN', '513 E WESLEYAN DR', NULL, 'TEMPE', 'AZ', '85282', 'MARICOPA', '9014822498', 'Home Owner', '650-699', '$200,000 - $224,999', '$30,000 - $34,999', '43', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(115, 'BRYAN', 'BOUCHARD', '10344 E PINE VALLEY DR', NULL, 'SCOTTSDALE', 'AZ', '85255', 'MARICOPA', '4807171006', 'Home Owner', '650-699', '$750,000 - $999,999', '$175,000 - $199,999', '46', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(116, 'DAVID', 'JOHNSON', '7209 W LARKSPUR DR', NULL, 'PEORIA', 'AZ', '85381', 'MARICOPA', '6099471685', 'Home Owner', '650-699', 'Unknown', '$100,000 - $149,999', '48', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(117, 'LAURA', 'GONZALEZ', '3282 E STANFORD AVE', NULL, 'GILBERT', 'AZ', '85234', 'MARICOPA', '4807071033', 'Home Owner', '650-699', '$450,000 - $499,999', '$75,000 - $99,999', '47', '0', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(118, 'LAURA', 'KNOWLES', '10020 W MONTECITO AVE', NULL, 'PHOENIX', 'AZ', '85037', 'MARICOPA', '6024756789', 'Home Owner', '700-749', '$300,000 - $349,999', '$55,000 - $59,999', '42', '0', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(119, 'SAMUEL', 'CHAFE', '2266 E EGRET CT', NULL, 'GILBERT', 'AZ', '85234', 'MARICOPA', '5098453155', 'Home Owner', '700-749', '$500,000 - $749,999', '$100,000 - $149,999', '34', '10', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(120, 'TROY', 'SCHMIDT-HERGERT', '11129 W LEWIS AVE', NULL, 'AVONDALE', 'AZ', '85392', 'MARICOPA', '6026638111', 'Home Owner', '700-749', '$500,000 - $749,999', '$65,000 - $74,999', '26', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(121, 'MELISSA', 'VALENCIA', '1516 N MARKDALE', NULL, 'MESA', 'AZ', '85201', 'MARICOPA', '4802966195', 'Home Owner', '650-699', '$500,000 - $749,999', '$35,000 - $39,999', '28', '9', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(122, 'MICHAEL', 'LUPNACCA', '3612 W PHELPS RD', NULL, 'PHOENIX', 'AZ', '85053', 'MARICOPA', '6028663714', 'Home Owner', '650-699', '$350,000 - $399,999', '$75,000 - $99,999', '58', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(123, 'MICHAEL', 'KIES', '730 E CORONADO RD', NULL, 'PHOENIX', 'AZ', '85006', 'MARICOPA', '6026179114', 'Home Owner', '700-749', '$1,000,000 Plus', '$60,000 - $64,999', '57', '6', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(124, 'TAYLOR', 'BROOKS', '8644 W RUTH AVE', NULL, 'PEORIA', 'AZ', '85345', 'MARICOPA', '6238109045', 'Home Owner', '650-699', '$400,000 - $449,999', '$75,000 - $99,999', '26', '7', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(125, 'LUISITA', 'LOVELY', '1734 E DEL RIO ST', NULL, 'GILBERT', 'AZ', '85295', 'MARICOPA', '4806211117', 'Home Owner', '700-749', 'Unknown', '$75,000 - $99,999', '57', '10', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(126, 'ROSSIE', 'SCHARFMAN', '2431 W LONG SHADOW RD', NULL, 'PHOENIX', 'AZ', '85085', 'MARICOPA', '4802802724', 'Home Owner', '700-749', '$450,000 - $499,999', '$100,000 - $149,999', '55', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(127, 'TANYA', 'HOSMER', '6813 W BERKELEY RD', NULL, 'PHOENIX', 'AZ', '85035', 'MARICOPA', '6233995246', 'Home Owner', '650-699', 'Unknown', '$10,000 - $14,999', '46', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(128, 'CAROL', 'ELLIS', '3816 W BETTY ELYSE LN', NULL, 'PHOENIX', 'AZ', '85053', 'MARICOPA', '6025794514', 'Home Owner', '700-749', '$400,000 - $449,999', 'Unknown', '62', '0', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(129, 'CORY', 'HULTZ', '1204 E KRAMER CIR', NULL, 'MESA', 'AZ', '85203', 'MARICOPA', '4802446086', 'Home Owner', '650-699', '$750,000 - $999,999', '$10,000 - $14,999', '50', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(130, 'MICHELE', 'DOUGHER', '4811 S HUDSON PL', NULL, 'CHANDLER', 'AZ', '85249', 'MARICOPA', '5712132101', 'Home Owner', '700-749', '$750,000 - $999,999', '$250,000 Plus', '53', '9', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(131, 'ASHLEY', 'LAING', '15113 W TURNEY AVE', NULL, 'GOODYEAR', 'AZ', '85395', 'MARICOPA', '6238452770', 'Home Owner', '700-749', '$500,000 - $749,999', '$100,000 - $149,999', '36', '3', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(132, 'JEFFREY', 'MEILE', '6913 E MENLO ST', NULL, 'MESA', 'AZ', '85207', 'MARICOPA', '6024898768', 'Home Owner', '650-699', '$500,000 - $749,999', '$75,000 - $99,999', '57', '9', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(133, 'JANICE', 'FRENCH', '7341 W CANTERBURY DR', NULL, 'PEORIA', 'AZ', '85345', 'MARICOPA', '6025011442', 'Home Owner', '700-749', '$400,000 - $449,999', '$100,000 - $149,999', '52', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(134, 'DEREK', 'TAYLOR', '2151 W SHAWNEE DR', NULL, 'CHANDLER', 'AZ', '85224', 'MARICOPA', '4808572005', 'Home Owner', '650-699', '$1,000,000 Plus', '$175,000 - $199,999', '24', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(135, 'BRYAN', 'LINES', '12124 E ORIOLE WAY', NULL, 'CHANDLER', 'AZ', '85286', 'MARICOPA', '6023204867', 'Home Owner', '700-749', '$750,000 - $999,999', '$100,000 - $149,999', '48', '11', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(136, 'JOHN', 'ROBERSON', '741 E EAGLE LN', NULL, 'GILBERT', 'AZ', '85296', 'MARICOPA', '4803307818', 'Home Owner', '700-749', '$450,000 - $499,999', '$25,000 - $29,999', '45', '2', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(137, 'NICOLE', 'MOEN', '9071 W CUSTER LN', NULL, 'PEORIA', 'AZ', '85381', 'MARICOPA', '6025181727', 'Home Owner', '650-699', 'Unknown', '$75,000 - $99,999', '42', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(138, 'KAYLA', 'HOUSEHOLDER', '1704 E HACKAMORE ST', NULL, 'MESA', 'AZ', '85203', 'MARICOPA', '6029082365', 'Home Owner', '700-749', '$500,000 - $749,999', '$45,000 - $49,999', '35', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(139, 'CRISTINA', 'VALENTINE', '2702 E WESSON DR', NULL, 'CHANDLER', 'AZ', '85286', 'MARICOPA', '4806560150', 'Home Owner', '650-699', '$275,000 - $299,999', '$65,000 - $74,999', '47', '12', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(140, 'DANIEL', 'SCHAFFER', '4756 E GREENWAY ST', NULL, 'MESA', 'AZ', '85205', 'MARICOPA', '7087493416', 'Home Owner', '700-749', '$300,000 - $349,999', '$60,000 - $64,999', '26', '4', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(141, 'TANNER', 'LEAVITT', '723 N ORANGE CIR', NULL, 'MESA', 'AZ', '85201', 'MARICOPA', '4803230973', 'Home Owner', '650-699', '$350,000 - $399,999', '$100,000 - $149,999', '25', '3', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(142, 'GLORIA', 'VALENZUELA', '3338 S PARKSIDE DR', NULL, 'TEMPE', 'AZ', '85282', 'MARICOPA', '4809219696', 'Home Owner', '650-699', '$300,000 - $349,999', '$65,000 - $74,999', '61', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(143, 'TAMMY', 'SLETTEN', '17856 N 31ST AVE', NULL, 'PHOENIX', 'AZ', '85053', 'MARICOPA', '6028678556', 'Home Owner', '700-749', 'Unknown', '$65,000 - $74,999', '53', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(144, 'JOSSEAN', 'HERNANDEZ', '7429 E THOMAS RD', NULL, 'SCOTTSDALE', 'AZ', '85251', 'MARICOPA', '4803434859', 'Home Owner', '650-699', '$1,000 - $24,999', '$100,000 - $149,999', '32', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(145, 'DORIS', 'LAIDLAW', '1167 E KNIGHT LN', NULL, 'TEMPE', 'AZ', '85284', 'MARICOPA', '6027628481', 'Home Owner', '700-749', '$500,000 - $749,999', '$175,000 - $199,999', '58', '7', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(146, 'JOHN', 'DIMIG', '235 N AZTEC TRL', NULL, 'WICKENBURG', 'AZ', '85390', 'MARICOPA', '7128800569', 'Home Owner', '700-749', '$400,000 - $449,999', '$40,000 - $44,999', '62', '2', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(147, 'YULING', 'LANGFORD', '15302 E HILLSIDE DR', NULL, 'FOUNTAIN HILLS', 'AZ', '85268', 'MARICOPA', '5207058064', 'Home Owner', '700-749', '$500,000 - $749,999', '$150,000 - $174,999', '62', '0', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(148, 'WILL', 'OTALUKA', '1747 E WINDSONG DR', NULL, 'PHOENIX', 'AZ', '85048', 'MARICOPA', '4809615949', 'Home Owner', '700-749', '$450,000 - $499,999', '$75,000 - $99,999', '58', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(149, 'JESSICA', 'MARSHALL', '1546 W SAINT KATERI DR', NULL, 'PHOENIX', 'AZ', '85041', 'MARICOPA', '8506741893', 'Home Owner', '700-749', '$400,000 - $449,999', '$55,000 - $59,999', '46', '1', 'pending', NULL, '2023-10-19 04:38:23', '2023-10-19 04:38:23', NULL, 2, 11),
(150, 'SERGIO', 'REYES P', '8313 W PAPAGO ST', NULL, 'TOLLESON', 'AZ', '85353', 'MARICOPA', '6025317567', 'Home Owner', '700-749', '$300,000 - $349,999', '$65,000 - $74,999', '63', '0', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:47:04', NULL, 5, 13),
(151, 'LUCIA', 'DORADO', '2322 W FREMONT DR', NULL, 'TEMPE', 'AZ', '85282', 'MARICOPA', '3052062361', 'Home Owner', '650-699', '$275,000 - $299,999', '$75,000 - $99,999', '64', '0', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(152, 'MARIBEL', 'LOPEZ', '1617 N 127TH AVE', NULL, 'AVONDALE', 'AZ', '85392', 'MARICOPA', '6236916787', 'Home Owner', '650-699', 'Unknown', '$60,000 - $64,999', '50', '0', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(153, 'ALICIA', 'GONZALEZ', '54 E 8TH AVE', NULL, 'MESA', 'AZ', '85210', 'MARICOPA', '4807581726', 'Home Owner', '650-699', '$300,000 - $349,999', '$75,000 - $99,999', '49', '10', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(154, 'KIMBERLY', 'REYES ARROYO', '4707 E MINTON ST', NULL, 'PHOENIX', 'AZ', '85042', 'MARICOPA', '4804301616', 'Home Owner', '650-699', '$175,000 - $199,999', '$65,000 - $74,999', '28', '11', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(155, 'LUZ', 'MOLINAR', '6371 N 78TH DR', NULL, 'GLENDALE', 'AZ', '85303', 'MARICOPA', '6023589002', 'Home Owner', '700-749', '$400,000 - $449,999', '$75,000 - $99,999', '59', '11', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(156, 'RAMIRO', 'TAMAYO', '7169 W GLENN DR', NULL, 'GLENDALE', 'AZ', '85303', 'MARICOPA', '6239865930', 'Home Owner', '650-699', '$400,000 - $449,999', '$50,000 - $54,999', '29', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(157, 'MARLEN', 'TORRES', '746 S ASHLAND CIR', NULL, 'MESA', 'AZ', '85204', 'MARICOPA', '4802776821', 'Home Owner', '650-699', '$275,000 - $299,999', 'Unknown', '31', '4', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(158, 'NIDIA', 'LUNA', '815 E CINNABAR AVE', NULL, 'PHOENIX', 'AZ', '85020', 'MARICOPA', '4806289556', 'Home Owner', '650-699', '$350,000 - $399,999', '$35,000 - $39,999', '57', '0', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(159, 'JOSE', 'YEPIZ', '7014 W WOLF ST', NULL, 'PHOENIX', 'AZ', '85033', 'MARICOPA', '6024511547', 'Home Owner', '700-749', '$300,000 - $349,999', '$20,000 - $24,999', '60', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(160, 'MARTINA', 'LOPEZ', '5733 W CATALINA DR', NULL, 'PHOENIX', 'AZ', '85031', 'MARICOPA', '4803598369', 'Home Owner', '650-699', '$300,000 - $349,999', '$10,000 - $14,999', '48', '7', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(161, 'MELISSA', 'SANTACRUZ', '561 W MANOR ST', NULL, 'CHANDLER', 'AZ', '85225', 'MARICOPA', '4802669072', 'Home Owner', '700-749', '$400,000 - $449,999', '$60,000 - $64,999', '31', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(162, 'BURNELL', 'FLORES', '6515 E CALLE WOI', NULL, 'TEMPE', 'AZ', '85283', 'MARICOPA', '6025851987', 'Home Owner', '650-699', '$125,000 - $149,999', '$15,000 - $19,999', '38', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(163, 'ANGELICA', 'HERNANDEZ', '3412 N MANSFIELD DR', NULL, 'LITCHFIELD PARK', 'AZ', '85340', 'MARICOPA', '6028599465', 'Home Owner', '700-749', '$750,000 - $999,999', '$100,000 - $149,999', '36', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(164, 'ANTHONY', 'ROCHA', '15192 W POLK ST', NULL, 'GOODYEAR', 'AZ', '85338', 'MARICOPA', '6022905605', 'Home Owner', '650-699', '$400,000 - $449,999', '$20,000 - $24,999', '43', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(165, 'ISAC', 'LECHUGA', '4546 N 56TH AVE', NULL, 'PHOENIX', 'AZ', '85031', 'MARICOPA', '6233028168', 'Home Owner', '650-699', 'Unknown', '$30,000 - $34,999', '29', '9', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(166, 'GINA', 'CUELLAR', '7932 W DAHLIA DR', NULL, 'PEORIA', 'AZ', '85381', 'MARICOPA', '5204870068', 'Home Owner', '650-699', 'Unknown', '$50,000 - $54,999', '55', '0', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(167, 'JOSE', 'CAMPOS', '3608 W GRANADA RD', NULL, 'PHOENIX', 'AZ', '85009', 'MARICOPA', '6027540431', 'Home Owner', '700-749', '$300,000 - $349,999', 'Unknown', '28', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(168, 'LISA', 'MARTINEZ', '229 S 123RD DR', NULL, 'AVONDALE', 'AZ', '85323', 'MARICOPA', '6029199097', 'Home Owner', '650-699', '$400,000 - $449,999', '$65,000 - $74,999', '34', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(169, 'ERYKA', 'DEMELO', '601 W MORROW DR', NULL, 'PHOENIX', 'AZ', '85027', 'MARICOPA', '6023834554', 'Home Owner', '650-699', '$350,000 - $399,999', '$75,000 - $99,999', '29', '9', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(170, 'CLAUDIA', 'VASQUEZ', '1827 S 105TH DR', NULL, 'TOLLESON', 'AZ', '85353', 'MARICOPA', '6235709521', 'Home Owner', '650-699', '$400,000 - $449,999', '$55,000 - $59,999', '52', '5', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(171, 'MONICA', 'CABRAL', '19429 W SELLS DR', NULL, 'LITCHFIELD PARK', 'AZ', '85340', 'MARICOPA', '6027486783', 'Home Owner', '650-699', '$200,000 - $224,999', '$100,000 - $149,999', '48', '0', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(172, 'PERLA', 'HERNANDEZ', '2219 W GLENN DR', NULL, 'PHOENIX', 'AZ', '85021', 'MARICOPA', '6028857238', 'Home Owner', '700-749', '$300,000 - $349,999', '$45,000 - $49,999', '38', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(173, 'MIGUEL', 'PERLATA', '1125 E HARVARD AVE', NULL, 'GILBERT', 'AZ', '85234', 'MARICOPA', '4802020492', 'Home Owner', '700-749', '$350,000 - $399,999', '$65,000 - $74,999', '40', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(174, 'ALETHIA', 'MORALES', '4191 S 247TH DR', NULL, 'BUCKEYE', 'AZ', '85326', 'MARICOPA', '6234147248', 'Home Owner', '650-699', '$350,000 - $399,999', '$75,000 - $99,999', '42', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(175, 'DENIA', 'RAMIREZ', '6401 W NORTH LN', NULL, 'GLENDALE', 'AZ', '85302', 'MARICOPA', '6238476520', 'Home Owner', '650-699', '$400,000 - $449,999', '$65,000 - $74,999', '48', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(176, 'EMMANUEL', 'BARRERA', '10009 W WOOD ST', NULL, 'TOLLESON', 'AZ', '85353', 'MARICOPA', '6236439493', 'Home Owner', '650-699', '$350,000 - $399,999', '$40,000 - $44,999', '27', '11', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(177, 'RENE', 'MADRIGAL', '327 N 1ST ST', NULL, 'AVONDALE', 'AZ', '85323', 'MARICOPA', '6237039247', 'Home Owner', '700-749', '$400,000 - $449,999', '$20,000 - $24,999', '61', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(178, 'MARCUS', 'BARRAZA', '7320 N 70TH DR', NULL, 'GLENDALE', 'AZ', '85303', 'MARICOPA', '6233026386', 'Home Owner', '650-699', '$300,000 - $349,999', '$55,000 - $59,999', '31', '0', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(179, 'TERESA', 'JAIMES', '2815 W SAN MIGUEL AVE', NULL, 'PHOENIX', 'AZ', '85017', 'MARICOPA', '7735674924', 'Home Owner', '700-749', '$275,000 - $299,999', '$55,000 - $59,999', '36', '9', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(180, 'JUAN', 'CAUICH', '12301 W DREYFUS DR', NULL, 'EL MIRAGE', 'AZ', '85335', 'MARICOPA', '6233264896', 'Home Owner', '650-699', 'Unknown', '$65,000 - $74,999', '50', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(181, 'RAMONA', 'OROZCO', '11576 W RIO VISTA LN', NULL, 'AVONDALE', 'AZ', '85323', 'MARICOPA', '6238062247', 'Home Owner', '700-749', '$300,000 - $349,999', '$100,000 - $149,999', '47', '12', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(182, 'ESMERALDA', 'BALLES', '1029 N 25TH ST', NULL, 'PHOENIX', 'AZ', '85008', 'MARICOPA', '4803718583', 'Home Owner', '650-699', '$350,000 - $399,999', '$35,000 - $39,999', '34', '12', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(183, 'CANDELARIA', 'CUEVAS', '2209 N 27TH PL', NULL, 'PHOENIX', 'AZ', '85008', 'MARICOPA', '6025151280', 'Home Owner', '650-699', '$125,000 - $149,999', '$45,000 - $49,999', '58', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(184, 'MANUEL', 'NUNEZ', '9347 W LOS GATOS DR', NULL, 'PEORIA', 'AZ', '85383', 'MARICOPA', '6235947189', 'Home Owner', '650-699', '$750,000 - $999,999', '$175,000 - $199,999', '47', '11', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(185, 'ILDEFONSO', 'WENCES', '5244 S 18TH AVE', NULL, 'PHOENIX', 'AZ', '85041', 'MARICOPA', '4804388682', 'Home Owner', '700-749', '$275,000 - $299,999', '$60,000 - $64,999', '60', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(186, 'VERONICA', 'ACOSTA', '2473 E MAGNOLIA DR', NULL, 'GILBERT', 'AZ', '85298', 'MARICOPA', '4803305250', 'Home Owner', '650-699', '$500,000 - $749,999', '$200,000 - $249,999', '43', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(187, 'MARK', 'MENDOZA', '7414 W GREER AVE', NULL, 'PEORIA', 'AZ', '85345', 'MARICOPA', '6235520252', 'Home Owner', '650-699', '$300,000 - $349,999', '$35,000 - $39,999', '63', '6', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(188, 'ANA', 'JAIMES', '2060 S LUTHER', NULL, 'MESA', 'AZ', '85209', 'MARICOPA', '4806295023', 'Home Owner', '700-749', '$350,000 - $399,999', '$100,000 - $149,999', '61', '3', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(189, 'BERENICE', 'OLIVAS', '8301 S 45TH LN', NULL, 'LAVEEN', 'AZ', '85339', 'MARICOPA', '6028149601', 'Home Owner', '650-699', 'Unknown', '$45,000 - $49,999', '28', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(190, 'DULCE', 'HERMOSILLO', '5829 N 62ND DR', NULL, 'GLENDALE', 'AZ', '85301', 'MARICOPA', '6027079537', 'Home Owner', '650-699', '$125,000 - $149,999', '$30,000 - $34,999', '32', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(191, 'MARIA', 'GARCIA', '4707 N 53RD DR', NULL, 'PHOENIX', 'AZ', '85031', 'MARICOPA', '6233125012', 'Home Owner', '700-749', '$150,000 - $174,999', '$35,000 - $39,999', '41', '0', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(192, 'YOLANDA', 'PACHECO', '8839 W PALO VERDE AVE', NULL, 'PEORIA', 'AZ', '85345', 'MARICOPA', '6232717343', 'Home Owner', '700-749', '$300,000 - $349,999', '$55,000 - $59,999', '60', '5', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13);
INSERT INTO `customers` (`id`, `first_name`, `last_name`, `main_address`, `secondary_address`, `city`, `state`, `zip_code`, `county`, `phone_number`, `owner_renter`, `credit_rating`, `home_value`, `income`, `age`, `birth_month`, `status`, `foto`, `created_at`, `updated_at`, `deleted_at`, `team_id`, `user_id`) VALUES
(193, 'LYDIA', 'PEREZ', '6737 W MISSOURI AVE', NULL, 'GLENDALE', 'AZ', '85303', 'MARICOPA', '6233086683', 'Home Owner', '700-749', '$300,000 - $349,999', '$25,000 - $29,999', '56', '7', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(194, 'ALBERTO', 'RAMIREZ', '19723 E INDIANA AVE', NULL, 'QUEEN CREEK', 'AZ', '85142', 'MARICOPA', '4809875477', 'Home Owner', '650-699', '$125,000 - $149,999', '$60,000 - $64,999', '38', '0', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(195, 'ELAINE', 'VALDEZ', '12225 W WASHINGTON ST', NULL, 'AVONDALE', 'AZ', '85323', 'MARICOPA', '7206859726', 'Home Owner', '650-699', '$450,000 - $499,999', '$65,000 - $74,999', '58', '5', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(196, 'YVETTE', 'MORQUECHO', '15073 W DESERT HILLS DR', NULL, 'SURPRISE', 'AZ', '85379', 'MARICOPA', '6026220602', 'Home Owner', '650-699', '$300,000 - $349,999', '$65,000 - $74,999', '55', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(197, 'JESUS', 'MACIAS', '203 W ALTA VISTA RD', NULL, 'PHOENIX', 'AZ', '85041', 'MARICOPA', '6027707227', 'Home Owner', '650-699', '$250,000 - $274,999', '$50,000 - $54,999', '48', '0', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(198, 'JOSE', 'SANTIAGO', '7302 W SHANGRI LA RD', NULL, 'PEORIA', 'AZ', '85345', 'MARICOPA', '6023359885', 'Home Owner', '700-749', '$125,000 - $149,999', '$50,000 - $54,999', '41', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(199, 'RICARDO', 'PASILLAS', '12474 N 142ND LN', NULL, 'SURPRISE', 'AZ', '85379', 'MARICOPA', '6024023708', 'Home Owner', '650-699', '$400,000 - $449,999', '$75,000 - $99,999', '63', '1', 'pending', NULL, '2023-10-21 20:42:46', '2023-10-21 20:42:46', NULL, 5, 13),
(200, 'GILBERT', 'TELLEZ', '7814 S 20TH DR', NULL, 'PHOENIX', 'AZ', '85041', 'MARICOPA', '6232215579', 'Home Owner', '700-749', '$400,000 - $449,999', '$35,000 - $39,999', '40', '1', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(201, 'JORGE', 'LOPEZ ROMERO', '6230 W CITRUS WAY', NULL, 'GLENDALE', 'AZ', '85301', 'MARICOPA', '6025007728', 'Home Owner', '650-699', '$225,000 - $249,999', '$50,000 - $54,999', '24', '1', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(202, 'DESIDERIO', 'MEDINA', '2711 E SOUTHGATE AVE', NULL, 'PHOENIX', 'AZ', '85040', 'MARICOPA', '6026439810', 'Home Owner', '650-699', '$300,000 - $349,999', '$25,000 - $29,999', '62', '2', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(203, 'ANGELINA', 'DE LA TORRE', '12822 S 45TH PL', NULL, 'PHOENIX', 'AZ', '85044', 'MARICOPA', '5629642811', 'Home Owner', '700-749', '$450,000 - $499,999', '$100,000 - $149,999', '29', '1', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(204, 'ELVIA', 'NEVAREZ', '12333 W SWEETWATER AVE', NULL, 'EL MIRAGE', 'AZ', '85335', 'MARICOPA', '6025414886', 'Home Owner', '650-699', 'Unknown', '$50,000 - $54,999', '41', '1', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(205, 'DENISE', 'TEJADA', '8834 N 68TH LN', NULL, 'PEORIA', 'AZ', '85345', 'MARICOPA', '6028964099', 'Home Owner', '700-749', '$500,000 - $749,999', '$40,000 - $44,999', '56', '5', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(206, 'ADOLFO', 'VALENZUELA', '13432 N 36TH PL', NULL, 'PHOENIX', 'AZ', '85032', 'MARICOPA', '6028679676', 'Home Owner', '650-699', '$150,000 - $174,999', '$65,000 - $74,999', '54', '4', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(207, 'NOE', 'MORFIN', '5201 W GRANADA RD', NULL, 'PHOENIX', 'AZ', '85035', 'MARICOPA', '6024151693', 'Home Owner', '650-699', '$300,000 - $349,999', '$35,000 - $39,999', '49', '6', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(208, 'CATHERINE', 'BARRAGAN', '18063 W LAS CRUCES DR', NULL, 'GOODYEAR', 'AZ', '85338', 'MARICOPA', '6233295495', 'Home Owner', '650-699', '$500,000 - $749,999', '$175,000 - $199,999', '44', '6', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(209, 'JORGE', 'VILLAFANA', '3366 S COLE DR', NULL, 'GILBERT', 'AZ', '85297', 'MARICOPA', '4804341591', 'Home Owner', '700-749', '$300,000 - $349,999', '$100,000 - $149,999', '49', '1', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(210, 'AUTURO', 'RUIZ', '8326 W ALICE AVE', NULL, 'PEORIA', 'AZ', '85345', 'MARICOPA', '6028214350', 'Home Owner', '650-699', 'Unknown', '$55,000 - $59,999', '49', '0', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(211, 'ORACIO', 'GARCIA', '4039 W ROSE LN', NULL, 'PHOENIX', 'AZ', '85019', 'MARICOPA', '6023340131', 'Home Owner', '650-699', '$300,000 - $349,999', '$35,000 - $39,999', '58', '0', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(212, 'FRANCISCO', 'QUIROZ', '7240 W GLENROSA AVE', NULL, 'PHOENIX', 'AZ', '85033', 'MARICOPA', '6238483606', 'Home Owner', '700-749', '$300,000 - $349,999', '$45,000 - $49,999', '61', '1', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(213, 'FELIPE', 'MANDURRAGA', '6514 W SONORA ST', NULL, 'PHOENIX', 'AZ', '85043', 'MARICOPA', '6235652582', 'Home Owner', '700-749', 'Unknown', '$50,000 - $54,999', '55', '0', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(214, 'ROBERTO', 'ROMO', '1110 W ALTA VISTA RD', NULL, 'PHOENIX', 'AZ', '85041', 'MARICOPA', '9096297744', 'Home Owner', '650-699', '$350,000 - $399,999', '$15,000 - $19,999', '30', '0', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(215, 'OMAR', 'CARDONA MUNOZ', '3030 W SILVER FOX WAY', NULL, 'PHOENIX', 'AZ', '85045', 'MARICOPA', '7875193139', 'Home Owner', '650-699', '$350,000 - $399,999', '$100,000 - $149,999', '33', '1', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(216, 'MARIA', 'VALDIVIEZO', '1813 E BRILL ST', NULL, 'PHOENIX', 'AZ', '85006', 'MARICOPA', '6233406395', 'Home Owner', '700-749', '$300,000 - $349,999', '$15,000 - $19,999', '58', '0', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(217, 'MART', 'VALENZUELA', '2423 E JUANITA AVE', NULL, 'MESA', 'AZ', '85204', 'MARICOPA', '4806369587', 'Home Owner', '650-699', '$450,000 - $499,999', '$75,000 - $99,999', '26', '0', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(218, 'LUIS', 'MONTENEGRO', '501 W DETROIT ST', NULL, 'CHANDLER', 'AZ', '85225', 'MARICOPA', '4808579505', 'Home Owner', '700-749', '$175,000 - $199,999', '$50,000 - $54,999', '53', '9', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(219, 'ISABEL', 'RODRIGUEZ', '6105 W COCHISE DR', NULL, 'GLENDALE', 'AZ', '85302', 'MARICOPA', '6232363171', 'Home Owner', '650-699', '$400,000 - $449,999', '$55,000 - $59,999', '49', '4', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(220, 'MICHELLE', 'SALAZAR', '9435 W IRONWOOD DR', NULL, 'PEORIA', 'AZ', '85345', 'MARICOPA', '6238064312', 'Home Owner', '700-749', '$450,000 - $499,999', '$50,000 - $54,999', '44', '0', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(221, 'BLADIMIR', 'ZARAGOZA', '11033 E FLOWER AVE', NULL, 'MESA', 'AZ', '85208', 'MARICOPA', '4802469813', 'Home Owner', '650-699', '$400,000 - $449,999', '$100,000 - $149,999', '64', '11', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(222, 'LEYNA', 'NEGRON', '502 S 107TH ST', NULL, 'MESA', 'AZ', '85208', 'MARICOPA', '4802177617', 'Home Owner', '650-699', '$75,000 - $99,999', '$45,000 - $49,999', '42', '11', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(223, 'VERA', 'MUNOZ', '4831 N 88TH DR', NULL, 'PHOENIX', 'AZ', '85037', 'MARICOPA', '6024609827', 'Home Owner', '650-699', '$300,000 - $349,999', '$60,000 - $64,999', '60', '4', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(224, 'MARIA', 'ESTRADA', '3150 W LAS PALMARITAS DR', NULL, 'PHOENIX', 'AZ', '85051', 'MARICOPA', '6028418295', 'Home Owner', '650-699', '$300,000 - $349,999', '$60,000 - $64,999', '61', '9', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(225, 'LUIS', 'CAZARES', '11129 W COTTONWOOD LN', NULL, 'AVONDALE', 'AZ', '85392', 'MARICOPA', '6237920384', 'Home Owner', '650-699', '$400,000 - $449,999', '$100,000 - $149,999', '45', '10', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(226, 'MARIA', 'DAVILA', '10540 W POMO ST', NULL, 'TOLLESON', 'AZ', '85353', 'MARICOPA', '6026176484', 'Home Owner', '700-749', 'Unknown', '$75,000 - $99,999', '56', '9', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(227, 'EUSTOLIA', 'ALVAREZ', '3210 W REDFIELD RD', NULL, 'PHOENIX', 'AZ', '85053', 'MARICOPA', '6029424006', 'Home Owner', '650-699', '$350,000 - $399,999', '$45,000 - $49,999', '64', '12', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(228, 'MARIANA', 'HIDALGO', '1710 E MCLELLAN RD', NULL, 'MESA', 'AZ', '85203', 'MARICOPA', '4802330447', 'Home Owner', '650-699', '$400,000 - $449,999', '$75,000 - $99,999', '33', '2', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(229, 'ROBERT', 'GALAVIZ', '7009 S GOLFSIDE LN', NULL, 'PHOENIX', 'AZ', '85042', 'MARICOPA', '6025125938', 'Home Owner', '650-699', '$400,000 - $449,999', '$75,000 - $99,999', '43', '6', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(230, 'MARIO', 'LEON', '19214 W COLTER ST', NULL, 'LITCHFIELD PARK', 'AZ', '85340', 'MARICOPA', '6238751385', 'Home Owner', '650-699', '$250,000 - $274,999', '$100,000 - $149,999', '50', '5', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(231, 'FRANCISCO', 'ORTIZ', '1409 W RENEE DR', NULL, 'PHOENIX', 'AZ', '85027', 'MARICOPA', '6025109896', 'Home Owner', '700-749', '$400,000 - $449,999', '$75,000 - $99,999', '48', '8', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(232, 'VANESSA', 'ARREDONDO', '7533 E PALM LN', NULL, 'SCOTTSDALE', 'AZ', '85257', 'MARICOPA', '4805326932', 'Home Owner', '650-699', '$500,000 - $749,999', '$75,000 - $99,999', '31', '0', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(233, 'HECTOR', 'LEGARRETA', '8789 W FRIER DR', NULL, 'GLENDALE', 'AZ', '85305', 'MARICOPA', '7758709850', 'Home Owner', '650-699', '$500,000 - $749,999', '$50,000 - $54,999', '33', '10', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(234, 'LUIS', 'CRUZ', '2645 N 118TH AVE', NULL, 'AVONDALE', 'AZ', '85392', 'MARICOPA', '6024346760', 'Home Owner', '700-749', '$350,000 - $399,999', '$75,000 - $99,999', '51', '0', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(235, 'JAVIER', 'TOSCANO', '17166 W LUNDBERG ST', NULL, 'SURPRISE', 'AZ', '85388', 'MARICOPA', '6237036271', 'Home Owner', '650-699', '$350,000 - $399,999', '$15,000 - $19,999', '41', '0', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(236, 'JUAN', 'FLORES', '3607 W CATALINA DR', NULL, 'PHOENIX', 'AZ', '85019', 'MARICOPA', '6023391428', 'Home Owner', '650-699', '$300,000 - $349,999', '$65,000 - $74,999', '33', '6', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(237, 'JASON', 'DEMAYO', '3210 S 86TH AVE', NULL, 'TOLLESON', 'AZ', '85353', 'MARICOPA', '8318699413', 'Home Owner', '700-749', '$400,000 - $449,999', '$35,000 - $39,999', '41', '0', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(238, 'BEATRIZ', 'ANAYA', '1 W KRISTAL WAY', NULL, 'PHOENIX', 'AZ', '85027', 'MARICOPA', '6238699513', 'Home Owner', '700-749', '$350,000 - $399,999', '$45,000 - $49,999', '64', '1', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(239, 'JUVELINA', 'RODRIGUEZ', '2801 E POLK ST', NULL, 'PHOENIX', 'AZ', '85008', 'MARICOPA', '6022319075', 'Home Owner', '700-749', '$250,000 - $274,999', '$35,000 - $39,999', '55', '0', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(240, 'JOANNA', 'RUBIO', '5130 W BERKELEY RD', NULL, 'PHOENIX', 'AZ', '85035', 'MARICOPA', '6024479948', 'Home Owner', '650-699', 'Unknown', '$50,000 - $54,999', '34', '0', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(241, 'JESSE', 'RENTERIA', '1618 W 6TH AVE', NULL, 'MESA', 'AZ', '85202', 'MARICOPA', '4803430140', 'Home Owner', '650-699', '$350,000 - $399,999', '$35,000 - $39,999', '58', '0', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(242, 'MARGARITO', 'MADRIGAL', '6231 W STELLA LN', NULL, 'GLENDALE', 'AZ', '85301', 'MARICOPA', '6236983835', 'Home Owner', '650-699', '$275,000 - $299,999', '$55,000 - $59,999', '54', '4', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(243, 'JESICKA', 'AGUILAR', '1616 E 1ST ST', NULL, 'MESA', 'AZ', '85203', 'MARICOPA', '4807330566', 'Home Owner', '700-749', 'Unknown', '$65,000 - $74,999', '35', '1', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(244, 'REGINA', 'DELVALLE', '15014 W DESERT HILLS DR', NULL, 'SURPRISE', 'AZ', '85379', 'MARICOPA', '6026142605', 'Home Owner', '650-699', '$450,000 - $499,999', '$100,000 - $149,999', '54', '3', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(245, 'MAKAYLA', 'PALMA', '5831 W SUNNYSLOPE LN', NULL, 'GLENDALE', 'AZ', '85302', 'MARICOPA', '6024464370', 'Home Owner', '700-749', '$350,000 - $399,999', '$45,000 - $49,999', '33', '3', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(246, 'GLORIA', 'MOLINA', '3516 E FILLMORE ST', NULL, 'PHOENIX', 'AZ', '85008', 'MARICOPA', '6023540841', 'Home Owner', '650-699', '$275,000 - $299,999', '$55,000 - $59,999', '58', '5', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(247, 'SALVADOR', 'REYES', '73 N 235TH DR', NULL, 'BUCKEYE', 'AZ', '85396', 'MARICOPA', '6233270109', 'Home Owner', '650-699', '$100,000 - $124,999', '$65,000 - $74,999', '56', '0', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(248, 'OLGA', 'MONTOYA', '4222 E INDIANOLA AVE', NULL, 'PHOENIX', 'AZ', '85018', 'MARICOPA', '4802337226', 'Home Owner', '700-749', '$500,000 - $749,999', '$100,000 - $149,999', '56', '1', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12),
(249, 'IRWING', 'VALENTIN', '4321 N 59TH AVE', NULL, 'PHOENIX', 'AZ', '85033', 'MARICOPA', '6022840155', 'Home Owner', '650-699', '$350,000 - $399,999', '$45,000 - $49,999', '28', '2', 'pending', NULL, '2023-10-21 20:57:14', '2023-10-21 20:57:14', NULL, 4, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_04_203202_add_soft_deletes_to_users_table', 1),
(6, '2023_10_04_203247_create_customers_table', 1),
(7, '2023_10_06_195309_create_appointments_table', 1),
(8, '2023_10_06_200600_create_teams_table', 1),
(9, '2023_10_06_202127_create_team_user_table', 1),
(10, '2023_10_13_145757_create_permission_tables', 1),
(11, '2023_10_13_152059_add_current_role_id_to_users_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 13),
(4, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 2),
(4, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5),
(4, 'App\\Models\\User', 6),
(4, 'App\\Models\\User', 7),
(5, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 1),
(6, 'App\\Models\\User', 8),
(6, 'App\\Models\\User', 11),
(6, 'App\\Models\\User', 12),
(6, 'App\\Models\\User', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-10-16 13:22:29', '2023-10-16 13:22:29'),
(2, 'Main Salesman', 'web', '2023-10-16 13:22:29', '2023-10-16 13:22:29'),
(3, 'Salesmen', 'web', '2023-10-16 13:22:29', '2023-10-16 13:22:29'),
(4, 'Independiente', 'web', '2023-10-16 13:22:29', '2023-10-16 13:22:29'),
(5, 'Team Supervisor', 'web', '2023-10-16 13:22:29', '2023-10-16 13:22:29'),
(6, 'Team Collaborator', 'web', '2023-10-16 13:22:29', '2023-10-16 13:22:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `teams`
--

INSERT INTO `teams` (`id`, `name`, `manager_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Indepentiente', 9, '2023-10-16 13:22:30', '2023-10-16 13:22:30', NULL),
(2, 'Alfredo\'s Team', 10, '2023-10-16 13:22:30', '2023-10-19 20:34:22', NULL),
(4, 'Mariana\'s team', 12, '2023-10-20 06:45:58', '2023-10-21 01:27:07', NULL),
(5, 'Hoorving\'s team', 13, '2023-10-21 02:35:00', '2023-10-21 02:35:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_user`
--

CREATE TABLE `team_user` (
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'collaborator',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `team_user`
--

INSERT INTO `team_user` (`team_id`, `user_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 2, 'independant', '2023-10-16 13:22:30', '2023-10-16 13:22:30'),
(1, 3, 'independant', '2023-10-16 13:22:30', '2023-10-16 13:22:30'),
(1, 4, 'independant', '2023-10-16 13:22:30', '2023-10-16 13:22:30'),
(1, 5, 'independant', '2023-10-16 13:22:30', '2023-10-16 13:22:30'),
(1, 6, 'independant', '2023-10-16 13:22:30', '2023-10-16 13:22:30'),
(2, 7, 'collaborator', '2023-10-19 20:34:22', '2023-10-19 20:34:22'),
(2, 8, 'collaborator', '2023-10-19 20:34:22', '2023-10-19 20:34:22'),
(2, 11, 'collaborator', '2023-10-19 20:34:22', '2023-10-19 20:34:22'),
(4, 12, 'collaborator', '2023-10-21 01:27:07', '2023-10-21 01:27:07'),
(5, 13, 'collaborator', '2023-10-21 02:35:00', '2023-10-21 02:35:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `current_role_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `current_team_id`, `current_role_id`) VALUES
(1, 'Administrador', 'admin@admin.com', '2023-10-16 13:22:29', '$2y$10$SJy..JlaiqjjglhTzFYNJuVWfPIVe.vaBjIGkHC.cpMnDkpvLYWO.', 'MHcCjjTozN9vKgKVmO3UTV5ZFUCjxyK3WXY55MP0eOJj6fvX9m1wrBl7zbxt', '2023-10-16 13:22:29', '2023-10-21 00:26:12', NULL, NULL, 1),
(2, 'William Icaza', 'william@gmail.com', NULL, '$2y$10$VRy6kCfTENT.QdPfl1qRL.qYTU6M.Mr0sE6FRSCrP/MB89pYXnAfm', NULL, '2023-10-16 13:22:29', '2023-10-16 13:22:30', NULL, 1, 4),
(3, 'Maria de los Angeles', 'maria@gmail.com', NULL, '$2y$10$OHs/vrz27eza1zidG.sACOKbL5y.FqNKc3cfR2UWZphC3bTgiKXW.', NULL, '2023-10-16 13:22:29', '2023-10-16 13:22:30', NULL, 1, 4),
(4, 'Kevin', 'kevin@gmail.com', NULL, '$2y$10$koKn3DI8fwUE301u1kIN6ekp4j38WOLnrGQx.KSH0uv4I8Y6/6v.a', NULL, '2023-10-16 13:22:30', '2023-10-16 13:22:30', NULL, 1, 4),
(5, 'Byron Quintanilla', 'byron@gmail.com', NULL, '$2y$10$CBw7kI1tm9md671F/UgYduLVrgqflo/F1eZkahfbSglgLeTsqtCBW', '5tpYcCAJofr4XcJqkQVk7PrgIRzT36gBvvosCGLnLLAnJDUPZbscqHYiU4Ac', '2023-10-16 13:22:30', '2023-10-16 13:22:30', NULL, 1, 4),
(6, 'Vanessa', 'vanessa@gmail.com', NULL, '$2y$10$EAnYSbN/dlXMgDluYg1l3e5/gdq7dzS9vznNr9kqcmK4m/Xo7hKy6', 'xYVCVQ8NHuzuWhX3102BwWCptvKLF2PnGie2mkIHrBJFl2OCWxHBVW6ymMoo', '2023-10-16 13:22:30', '2023-10-16 13:22:30', NULL, 1, 4),
(7, 'Alfredo Monjaret', 'alfredo@gmail.com', NULL, '$2y$10$bPCVbVKyKnqm4bNPm5be2O3WyQ7P8L.tRXGjMHcVhCA6GgacYNgOK', NULL, '2023-10-16 13:22:30', '2023-10-16 13:22:30', NULL, 2, 6),
(8, 'Tony Car', 'tony@gmail.com', NULL, '$2y$10$agpix4qRQICRHzD8FV7FFezzSlB/E.PQwWOut6OAuxai1Jxuxk.OO', NULL, '2023-10-16 13:22:30', '2023-10-16 13:22:30', NULL, 2, 6),
(9, 'EZ Solar', 'ezsolar@gmail.com', NULL, '$2y$10$dHDcKVtRDerXsIwaoI7T7ebyfXcbDKPY8GHsoczgV70nc7NxIdG.W', '3q9oexCYc8zGPcngKfmEqC53chMPVJ12txlxC0QJVLdfAWUJT6GG0jA8M4F5', '2023-10-16 13:22:30', '2023-10-16 13:22:30', NULL, NULL, 3),
(10, 'EZ solar 2', 'ezsolar2@gmail.com', NULL, '$2y$10$f24XiSnkHRiaz9xSWEdF7e5KlDx20rrXeiv.55a72I2pvkjuTQZBC', '0vqhQxgzs49pcQ5LI5RR3yc8m99gzWsT2Y3E5cSQcXNhUMxg9MNh8VfrnXVI', '2023-10-16 18:37:28', '2023-10-16 18:37:28', NULL, NULL, 3),
(11, 'Tony Inglés', 'tony_ingles@gmail.com', NULL, '$2y$10$RS./tQxu1DkIMKGagbIEEegu7XLIhy5l0Lr6AIrl2TH4n9KNLhSSO', NULL, '2023-10-19 04:30:39', '2023-10-19 20:30:50', NULL, 2, 6),
(12, 'Mariana', 'mariana@gmail.com', NULL, '$2y$10$MOPwUiNjNxRINui.0/fa2eDaXFZgLuFeFdJDIan2yeJkyZQiSWw36', NULL, '2023-10-20 06:13:44', '2023-10-20 07:15:30', NULL, 4, 3),
(13, 'Hoorving Altamirano', 'hoorving@gmail.com', NULL, '$2y$10$C.CJuZW4lUoCDblQIQuZBebffRzByUb9dLyRktZS4jVDTDboVCaqe', NULL, '2023-10-21 02:34:17', '2023-10-21 02:35:00', NULL, 5, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_customer_id_foreign` (`customer_id`),
  ADD KEY `appointments_team_id_foreign` (`team_id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_team_id_foreign` (`team_id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

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
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_manager_id_foreign` (`manager_id`);

--
-- Indices de la tabla `team_user`
--
ALTER TABLE `team_user`
  ADD KEY `team_user_team_id_foreign` (`team_id`),
  ADD KEY `team_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_current_team_id_foreign` (`current_team_id`),
  ADD KEY `users_current_role_id_foreign` (`current_role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `appointments_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `team_user`
--
ALTER TABLE `team_user`
  ADD CONSTRAINT `team_user_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`),
  ADD CONSTRAINT `team_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_current_role_id_foreign` FOREIGN KEY (`current_role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_current_team_id_foreign` FOREIGN KEY (`current_team_id`) REFERENCES `teams` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
