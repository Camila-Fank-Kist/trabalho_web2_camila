-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_trabalho_web2_camila
CREATE DATABASE IF NOT EXISTS `db_trabalho_web2_camila` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_trabalho_web2_camila`;

-- Copiando estrutura para tabela db_trabalho_web2_camila.avaliacao
CREATE TABLE IF NOT EXISTS `avaliacao` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sabor_id` bigint unsigned NOT NULL,
  `filial_id` bigint unsigned DEFAULT NULL,
  `nota_id` bigint unsigned NOT NULL,
  `descricao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `avaliacao_sabor_id_foreign` (`sabor_id`),
  KEY `avaliacao_filial_id_foreign` (`filial_id`),
  KEY `avaliacao_nota_id_foreign` (`nota_id`),
  CONSTRAINT `avaliacao_filial_id_foreign` FOREIGN KEY (`filial_id`) REFERENCES `filial` (`id`) ON DELETE SET NULL,
  CONSTRAINT `avaliacao_nota_id_foreign` FOREIGN KEY (`nota_id`) REFERENCES `nota` (`id`),
  CONSTRAINT `avaliacao_sabor_id_foreign` FOREIGN KEY (`sabor_id`) REFERENCES `sabor` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabalho_web2_camila.avaliacao: ~10 rows (aproximadamente)
INSERT INTO `avaliacao` (`id`, `sabor_id`, `filial_id`, `nota_id`, `descricao`, `created_at`, `updated_at`) VALUES
	(1, 3, 7, 6, 'Deserunt iusto dolores porro facilis neque.', NULL, NULL),
	(2, 4, 1, 2, 'Eum quis voluptatibus qui quod accusantium.', NULL, NULL),
	(3, 1, 9, 5, 'Optio quis eveniet qui.', NULL, NULL),
	(4, 2, 8, 4, 'Vel vel culpa voluptatibus architecto est.', NULL, NULL),
	(5, 5, 9, 6, 'Voluptas velit modi perferendis quis.', NULL, NULL),
	(6, 1, 8, 9, 'Omnis doloremque saepe odio velit.', NULL, NULL),
	(7, 2, 3, 2, 'Ratione sit sint id explicabo.', NULL, NULL),
	(8, 8, 9, 10, 'Cumque natus et reprehenderit molestias libero.', NULL, NULL),
	(9, 6, 8, 2, 'Aut earum necessitatibus.', NULL, NULL),
	(10, 4, 9, 10, 'Nostrum culpa eaque et qui.', NULL, NULL);

-- Copiando estrutura para tabela db_trabalho_web2_camila.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabalho_web2_camila.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabalho_web2_camila.filial
CREATE TABLE IF NOT EXISTS `filial` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cidade` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabalho_web2_camila.filial: ~10 rows (aproximadamente)
INSERT INTO `filial` (`id`, `cidade`, `cep`, `created_at`, `updated_at`) VALUES
	(1, 'Vila Raissa', 99298095, NULL, NULL),
	(2, 'Porto Micaela do Leste', 72510834, NULL, NULL),
	(3, 'Porto Téo do Norte', 85413429, NULL, NULL),
	(4, 'Porto Gabrielly', 78278698, NULL, NULL),
	(5, 'de Souza do Sul', 29829103, NULL, NULL),
	(6, 'Fonseca do Leste', 48252387, NULL, NULL),
	(7, 'Beltrão d\'Oeste', 93127853, NULL, NULL),
	(8, 'Adriele do Sul', 88576646, NULL, NULL),
	(9, 'Rezende d\'Oeste', 78215152, NULL, NULL),
	(10, 'de Oliveira do Sul', 27278111, NULL, NULL);

-- Copiando estrutura para tabela db_trabalho_web2_camila.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabalho_web2_camila.migrations: ~11 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_08_26_174945_create_sabors_table', 1),
	(6, '2023_08_26_183328_create_filials_table', 1),
	(7, '2023_08_26_190046_create_pagamentos_table', 1),
	(8, '2023_08_26_190330_create_retiradas_table', 1),
	(9, '2023_08_26_190619_create_notas_table', 1),
	(10, '2023_08_28_122544_create_pedidos_table', 1),
	(11, '2023_08_28_132424_create_avaliacaos_table', 1);

-- Copiando estrutura para tabela db_trabalho_web2_camila.nota
CREATE TABLE IF NOT EXISTS `nota` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nota` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabalho_web2_camila.nota: ~10 rows (aproximadamente)
INSERT INTO `nota` (`id`, `nota`, `created_at`, `updated_at`) VALUES
	(1, 5, NULL, NULL),
	(2, 2, NULL, NULL),
	(3, 6, NULL, NULL),
	(4, 10, NULL, NULL),
	(5, 9, NULL, NULL),
	(6, 3, NULL, NULL),
	(7, 5, NULL, NULL),
	(8, 5, NULL, NULL),
	(9, 1, NULL, NULL),
	(10, 3, NULL, NULL);

-- Copiando estrutura para tabela db_trabalho_web2_camila.pagamento
CREATE TABLE IF NOT EXISTS `pagamento` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabalho_web2_camila.pagamento: ~5 rows (aproximadamente)
INSERT INTO `pagamento` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Elo', NULL, NULL),
	(2, 'Elo', NULL, NULL),
	(3, 'Diners', NULL, NULL),
	(4, 'Visa', NULL, NULL),
	(5, 'Visa', NULL, NULL);

-- Copiando estrutura para tabela db_trabalho_web2_camila.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabalho_web2_camila.password_reset_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabalho_web2_camila.pedido
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sabor_id` bigint unsigned NOT NULL,
  `quantidade` int NOT NULL,
  `filial_id` bigint unsigned NOT NULL,
  `retirada_id` bigint unsigned DEFAULT NULL,
  `pagamento_id` bigint unsigned DEFAULT NULL,
  `observacao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedido_sabor_id_foreign` (`sabor_id`),
  KEY `pedido_filial_id_foreign` (`filial_id`),
  KEY `pedido_retirada_id_foreign` (`retirada_id`),
  KEY `pedido_pagamento_id_foreign` (`pagamento_id`),
  CONSTRAINT `pedido_filial_id_foreign` FOREIGN KEY (`filial_id`) REFERENCES `filial` (`id`) ON DELETE CASCADE,
  CONSTRAINT `pedido_pagamento_id_foreign` FOREIGN KEY (`pagamento_id`) REFERENCES `pagamento` (`id`) ON DELETE SET NULL,
  CONSTRAINT `pedido_retirada_id_foreign` FOREIGN KEY (`retirada_id`) REFERENCES `retirada` (`id`) ON DELETE SET NULL,
  CONSTRAINT `pedido_sabor_id_foreign` FOREIGN KEY (`sabor_id`) REFERENCES `sabor` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabalho_web2_camila.pedido: ~10 rows (aproximadamente)
INSERT INTO `pedido` (`id`, `sabor_id`, `quantidade`, `filial_id`, `retirada_id`, `pagamento_id`, `observacao`, `created_at`, `updated_at`) VALUES
	(1, 1, 5, 1, 3, 4, 'Sed quas quia.', NULL, NULL),
	(2, 7, 2, 3, 4, 4, 'Hic illum voluptatem.', NULL, NULL),
	(3, 7, 9, 8, 1, 4, 'Optio totam minima.', NULL, NULL),
	(4, 1, 9, 10, 4, 3, 'Illo repudiandae vitae iusto.', NULL, NULL),
	(5, 5, 8, 10, 4, 3, 'Enim maxime nulla iusto quisquam.', NULL, NULL),
	(6, 3, 1, 9, 5, 2, 'Quia consequatur.', NULL, NULL),
	(7, 1, 3, 8, 3, 1, 'Ex ut accusantium vel.', NULL, NULL),
	(8, 4, 5, 4, 4, 1, 'Eius maiores.', NULL, NULL),
	(9, 7, 6, 7, 4, 2, 'Debitis qui.', NULL, NULL),
	(10, 2, 1, 8, 1, 5, 'Blanditiis accusantium.', NULL, NULL);

-- Copiando estrutura para tabela db_trabalho_web2_camila.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabalho_web2_camila.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_trabalho_web2_camila.retirada
CREATE TABLE IF NOT EXISTS `retirada` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabalho_web2_camila.retirada: ~5 rows (aproximadamente)
INSERT INTO `retirada` (`id`, `nome`, `created_at`, `updated_at`) VALUES
	(1, 'Retirar', NULL, NULL),
	(2, 'Entregar', NULL, NULL),
	(3, 'Retirar', NULL, NULL),
	(4, 'Retirar', NULL, NULL),
	(5, 'Retirar', NULL, NULL);

-- Copiando estrutura para tabela db_trabalho_web2_camila.sabor
CREATE TABLE IF NOT EXISTS `sabor` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nome` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredientes` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precoBRL` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabalho_web2_camila.sabor: ~10 rows (aproximadamente)
INSERT INTO `sabor` (`id`, `imagem`, `nome`, `ingredientes`, `precoBRL`, `created_at`, `updated_at`) VALUES
	(1, 'imagem/sabor\\6e66549d1ff59642d3a4ba032a1b4d8f.png', 'rerum', 'Voluptas nemo quod provident accusantium.', 35, NULL, NULL),
	(2, 'imagem/sabor\\579d57b3f3fcdf4e543ddce4a003478e.png', 'quia', 'Aut odio aut tenetur.', 40, NULL, NULL),
	(3, 'imagem/sabor\\2c529d68b09615d2ec013a42d19c66a3.png', 'ipsam', 'In natus voluptatem esse.', 28, NULL, NULL),
	(4, 'imagem/sabor\\ddba3cb8bf876d001c4f41a071df0cce.png', 'qui', 'Dolor cum aut excepturi.', 48, NULL, NULL),
	(5, 'imagem/sabor\\c91f03b992babd30c8fe7c649634b242.png', 'omnis', 'Placeat modi beatae quisquam.', 50, NULL, NULL),
	(6, 'imagem/sabor\\e0c7d28be12eb0a3d6a97dd78164d9cc.png', 'id', 'Omnis rerum quod est.', 33, NULL, NULL),
	(7, 'imagem/sabor\\6ac6fc4390827f682b8aeb8557401f5c.png', 'ut', 'Minima quis quis.', 25, NULL, NULL),
	(8, 'imagem/sabor\\54a022a0aa6c3dcd5b934aad6cbe6d35.png', 'sunt', 'Autem quia rerum.', 37, NULL, NULL),
	(9, 'imagem/sabor\\6b98040cd21465930a2915280f08b1cd.png', 'eaque', 'Dicta blanditiis.', 30, NULL, NULL),
	(10, 'imagem/sabor\\f593c2675a481e14315b80bb42540070.png', 'ducimus', 'Voluptatibus nihil ad delectus.', 32, NULL, NULL);

-- Copiando estrutura para tabela db_trabalho_web2_camila.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_trabalho_web2_camila.users: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
