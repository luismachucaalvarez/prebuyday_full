-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for prebuyday
/*CREATE DATABASE IF NOT EXISTS `prebuyday` /*!40100 DEFAULT CHARACTER SET latin1 ;*/
/*USE `prebuyday`;*/

-- Dumping structure for table prebuyday.cargos
CREATE TABLE IF NOT EXISTS `cargos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prebuyday.cargos: ~3 rows (approximately)
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` (`id`, `nombre`) VALUES
	(1, 'Gerente'),
	(2, 'Marketing'),
	(3, 'Otro');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;

-- Dumping structure for table prebuyday.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prebuyday.categorias: ~40 rows (approximately)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `descripcion`) VALUES
	(1, 'Cámaras y Fotográficas'),
	(2, 'Telefonía móvil y fija'),
	(3, 'Computación'),
	(4, 'Libros y revistas'),
	(5, 'Accesorios de TV, audio y video'),
	(6, 'Consolas y videojuegos'),
	(7, 'Audio, Video'),
	(8, 'Automotriz'),
	(9, 'Electrodomésticos y línea blanca'),
	(10, 'Instrumentos musicales'),
	(11, 'Motos y Automóviles'),
	(12, 'Movilidad eléctrica'),
	(13, 'Herramientas Eléctricas e inalámbricas'),
	(14, 'Accesorios cámaras y fotografía'),
	(15, 'Comida y pañales para bebé'),
	(16, 'Ferretería y herramientas manuales'),
	(17, 'Supermercado'),
	(18, 'Vinos y licores'),
	(19, 'Accesorios telefonía móvil y fija'),
	(20, 'Accesorios computación'),
	(21, 'Colchones'),
	(22, 'Música y películas'),
	(23, 'Perfumes y fragancias'),
	(24, 'Mundo Mascotas y accesorios'),
	(25, 'Muebles'),
	(26, 'Juguetería niños y bebés'),
	(27, 'Hobby y entretención'),
	(28, 'Relojes y lentes'),
	(29, 'Alimento de mascotas'),
	(30, 'Salud y cuidado personal'),
	(31, 'Tienda del Fan (Fanshop)'),
	(32, 'Alimentación especial'),
	(33, 'Deportes, accesorios y Máquinas de ejercicio'),
	(34, 'Artículos casa y jardín'),
	(35, 'Mochilas, bolsos y malatería'),
	(36, 'Alimentos Gourmet y seleccionados'),
	(37, 'Oficina y papelería'),
	(38, 'Ropa deportiva'),
	(39, 'Moda, Ropa y Accesorios'),
	(40, 'Otras');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Dumping structure for table prebuyday.categorias_contacto
CREATE TABLE IF NOT EXISTS `categorias_contacto` (
  `contacto_id` int(10) unsigned NOT NULL,
  `categoria_id` int(10) unsigned NOT NULL,
  KEY `categorias_contacto_contacto_id_foreign` (`contacto_id`),
  KEY `categorias_contacto_categoria_id_foreign` (`categoria_id`),
  CONSTRAINT `categorias_contacto_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `categorias_contacto_contacto_id_foreign` FOREIGN KEY (`contacto_id`) REFERENCES `contactos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prebuyday.categorias_contacto: ~0 rows (approximately)
/*!40000 ALTER TABLE `categorias_contacto` DISABLE KEYS */;
INSERT INTO `categorias_contacto` (`contacto_id`, `categoria_id`) VALUES
	(1, 3),
	(2, 3),
	(3, 3),
	(3, 4),
	(3, 2),
	(4, 3),
	(4, 5),
	(5, 3),
	(5, 5),
	(6, 4),
	(7, 4),
	(8, 5),
	(9, 4),
	(10, 4),
	(11, 3),
	(11, 6),
	(11, 7),
	(12, 5),
	(13, 5),
	(14, 5),
	(15, 4),
	(16, 4),
	(17, 5),
	(18, 3),
	(19, 2),
	(20, 3),
	(21, 4),
	(22, 4);
/*!40000 ALTER TABLE `categorias_contacto` ENABLE KEYS */;

-- Dumping structure for table prebuyday.comercios
CREATE TABLE IF NOT EXISTS `comercios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto_id` int(11) NOT NULL,
  `cargo_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prebuyday.comercios: ~0 rows (approximately)
/*!40000 ALTER TABLE `comercios` DISABLE KEYS */;
INSERT INTO `comercios` (`id`, `rut`, `razon_social`, `contacto_id`, `cargo_id`, `created_at`, `updated_at`) VALUES
	(1, '12.665.667-1', 'SSSSSSSSSSSS', 2, 2, NULL, NULL),
	(2, '12.665.667-1', 'SSSSSSSSSSSS', 3, 2, NULL, NULL),
	(3, '12.665.667-1', 'Sociedad Comercial FactorDigital SpA', 5, 2, NULL, NULL),
	(4, '15.887.888-7', 'JC Ingenieria SpA', 9, 1, NULL, NULL),
	(5, '15.918.214-2', 'El Oso SpA', 11, 2, NULL, NULL);
/*!40000 ALTER TABLE `comercios` ENABLE KEYS */;

-- Dumping structure for table prebuyday.contactos
CREATE TABLE IF NOT EXISTS `contactos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_fantasia_comercio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iniciacion_realizada` tinyint(1) NOT NULL,
  `fecha_alta` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prebuyday.contactos: ~0 rows (approximately)
/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
INSERT INTO `contactos` (`id`, `nombre_completo`, `telefono`, `email`, `nombre_fantasia_comercio`, `iniciacion_realizada`, `fecha_alta`, `created_at`, `updated_at`) VALUES
	(1, 'Andrea Zúñiga Jimenez', '889988878', 'dedededw@de.com', 'dded edede', 0, '2020-10-21', '2020-10-21 21:54:16', '2020-10-21 21:54:16'),
	(2, 'Miguel Angel Lobos', '889988878', 'irvin@ejemplo.com', 'El Oso', 1, '2020-10-22', '2020-10-22 02:18:14', '2020-10-22 02:18:14'),
	(3, 'Fabian Berrios', '889988878', 'luis.machuca@buyday.cl', 'El Oso', 1, '2020-10-22', '2020-10-22 02:31:21', '2020-10-22 02:31:21'),
	(4, 'Luis Machuca Alvarez', '778884778', 'mmatus@prueba.com', NULL, 0, '2020-10-26', '2020-10-26 23:41:01', '2020-10-26 23:41:01'),
	(5, 'Luis Machuca Alvarezw', '778884778', 'mmatus@prueba.com', NULL, 0, '2020-10-26', '2020-10-26 23:45:10', '2020-10-26 23:45:10'),
	(6, 'Irvin Pierre Rivas', '956795449', 'irvin@ejemplo.com', 'Robinson y Andrea', 0, '2020-10-26', '2020-10-26 23:45:58', '2020-10-26 23:45:58'),
	(7, 'Luis Machuca', '323232323', 'fabian@ejemplo.com', NULL, 0, '2020-10-26', '2020-10-26 23:55:55', '2020-10-26 23:55:55'),
	(8, 'Miguel Angel Lobos', '956795449', 'luis.machuca@buyday.cl', 'ddddedede', 0, '2020-10-26', '2020-10-26 23:56:21', '2020-10-26 23:56:21'),
	(9, 'Irvin Pierre Rivas', '488789983', 'andreazuniga@prueba.com', NULL, 1, '2020-10-26', '2020-10-26 23:57:03', '2020-10-26 23:57:03'),
	(10, 'María Jesus Machuca Alvarez', '323232323', 'de@de.com', NULL, 0, '2020-10-26', '2020-10-26 23:57:34', '2020-10-26 23:57:34'),
	(11, 'Bryan Suazo', '488789983', 'dedededw@de.com', 'El Oso', 1, '2020-10-26', '2020-10-26 23:58:26', '2020-10-26 23:58:26'),
	(12, 'dedede', '488789983', 'dedededw@de.com', 'dedee', 0, '2020-10-27', '2020-10-27 00:18:22', '2020-10-27 00:18:22'),
	(13, 'Miguel Angel Lobos', '889988878', 'fabian@ejemplo.com', NULL, 0, '2020-10-27', '2020-10-27 00:56:50', '2020-10-27 00:56:50'),
	(14, 'Miguel Angel Lobos', '889988878', 'fabian@ejemplo.com', NULL, 0, '2020-10-27', '2020-10-27 00:56:58', '2020-10-27 00:56:58'),
	(15, 'Irvin Pierre Rivas', '956795449', 'andreazuniga@prueba.com', NULL, 0, '2020-10-27', '2020-10-27 00:59:10', '2020-10-27 00:59:10'),
	(16, 'Luis Machuca', '956795449', 'de@de.com', 'dded edede', 0, '2020-10-27', '2020-10-27 01:06:36', '2020-10-27 01:06:36'),
	(17, 'Irvin Pierre Rivas', '956795449', 'de@de.com', 'Robinson y Andrea', 0, '2020-10-27', '2020-10-27 01:07:45', '2020-10-27 01:07:45'),
	(18, 'Luis Machuca', '323232323', 'de@de.com', NULL, 0, '2020-10-27', '2020-10-27 01:09:24', '2020-10-27 01:09:24'),
	(19, 'Andrea Zúñiga Jimenez', '323232323', 'de@de.com', NULL, 0, '2020-10-27', '2020-10-27 01:09:55', '2020-10-27 01:09:55'),
	(20, 'Irvin Pierre Rivas', '956795449', 'de@de.com', NULL, 0, '2020-10-27', '2020-10-27 01:10:38', '2020-10-27 01:10:38'),
	(21, 'Andrea Zúñiga Jimenez', '323232323', 'de@de.com', NULL, 0, '2020-10-27', '2020-10-27 01:12:45', '2020-10-27 01:12:45'),
	(22, 'Miguel Angel Lobos', '956795449', 'fabian@ejemplo.com', NULL, 0, '2020-10-27', '2020-10-27 01:15:02', '2020-10-27 01:15:02');
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;

-- Dumping structure for table prebuyday.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prebuyday.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table prebuyday.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prebuyday.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2020_09_19_023518_create_contactos_table', 1),
	(5, '2020_09_19_023724_create_comercios_table', 1),
	(6, '2020_09_21_012627_create_categorias_table', 1),
	(7, '2020_09_21_164650_create_categorias_contacto_table', 1),
	(8, '2020_09_23_053150_create_cargos_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table prebuyday.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prebuyday.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table prebuyday.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table prebuyday.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'administracion@buyday.cl', NULL, '$2y$10$mrf8ty6fqRwopKSf4hAPaOnNukwVkImbsJSEv3LmyAUAONutSkaca', NULL, '2020-10-21 22:00:10', '2020-10-21 22:00:10'),
	(2, 'Luis Machuca', 'luis.machuca@buyday.cl', NULL, '$2y$10$doCL1mI4JVgZ2tNkZ1khvuoQ1QTX.snWTCBcVI8A2XUGzZIx.zdXe', NULL, '2020-10-27 15:57:52', '2020-10-27 15:57:52'),
	(3, 'Sergio Villena', 'sergio.villena@buyday.cl', NULL, '$2y$10$uhiJEyuOigrRBwLYCX.XruPtjrjh85jTCkTMu/b0tLhNScZRU878S', NULL, '2020-10-27 15:58:49', '2020-10-27 15:58:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
