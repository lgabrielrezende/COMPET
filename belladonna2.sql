-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.9-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para belladonna2
CREATE DATABASE IF NOT EXISTS `belladonna2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `belladonna2`;


-- Copiando estrutura para tabela belladonna2.areas
CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `appear` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `controller` varchar(25) NOT NULL,
  `controller_label` varchar(50) DEFAULT NULL,
  `action` varchar(25) NOT NULL,
  `action_label` varchar(50) NOT NULL DEFAULT '',
  `icon_menu` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appear` (`appear`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;
areasareasareas_profilescompet
-- Copiando dados para a tabela belladonna2.areas: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` (`id`, `parent_id`, `appear`, `controller`, `controller_label`, `action`, `action_label`, `icon_menu`) VALUES
	(1, NULL, 1, 'Users', 'Usu&aacute;rios', 'index', 'Todos', 'fa fa-user'),
	(2, NULL, 0, 'Users', 'Usu&aacute;rios', 'add', 'Criar Novo', NULL),
	(3, NULL, 0, 'Users', 'Usu&aacute;rios', 'edit', 'Editar', NULL),
	(4, NULL, 0, 'Users', 'Usu&aacute;rios', 'delete', 'Excluir', NULL),
	(5, 1, 1, 'Profiles', 'Perf&iacute;s de Usu&aacute;rio', 'index', 'Todos', NULL),
	(6, NULL, 0, 'Profiles', 'Perf&iacute;s de Usu&aacute;rio', 'add', 'Criar Novo', NULL),
	(7, NULL, 0, 'Profiles', 'Perf&iacute;s de Usu&aacute;rio', 'edit', 'Editar', NULL),
	(8, NULL, 0, 'Profiles', 'Perf&iacute;s de Usu&aacute;rio', 'delete', 'Excluir', NULL),
	(9, NULL, 0, 'Profiles', 'Perf&iacute;s de Usu&aacute;rio', 'view', 'Visualizar', NULL),
	(10, NULL, 0, 'Users', 'Usu&aacute;rios', 'view', 'Visualizar', NULL),
	(11, NULL, 1, 'Areas', 'Ãreas', 'index', 'Todos', 'fa fa-list-alt'),
	(12, NULL, 0, 'Areas', 'Ãreas', 'add', 'Criar Nova', '');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;


-- Copiando estrutura para tabela belladonna2.areas_profiles
CREATE TABLE IF NOT EXISTS `areas_profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `area_id` int(11) unsigned NOT NULL,
  `profile_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `area_profile` (`area_id`,`profile_id`),
  KEY `profile_id_idx` (`profile_id`),
  KEY `area_id_idx` (`area_id`),
  CONSTRAINT `area_id` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `profile_id` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela belladonna2.areas_profiles: ~22 rows (aproximadamente)
/*!40000 ALTER TABLE `areas_profiles` DISABLE KEYS */;
INSERT INTO `areas_profiles` (`id`, `area_id`, `profile_id`) VALUES
	(51, 1, 1),
	(30, 1, 2),
	(52, 2, 1),
	(31, 2, 2),
	(53, 3, 1),
	(32, 3, 2),
	(54, 4, 1),
	(33, 4, 2),
	(56, 5, 1),
	(35, 5, 2),
	(57, 6, 1),
	(36, 6, 2),
	(58, 7, 1),
	(37, 7, 2),
	(59, 8, 1),
	(38, 8, 2),
	(60, 9, 1),
	(39, 9, 2),
	(55, 10, 1),
	(34, 10, 2),
	(61, 11, 1),
	(62, 12, 1);
/*!40000 ALTER TABLE `areas_profiles` ENABLE KEYS */;


-- Copiando estrutura para tabela belladonna2.profiles
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela belladonna2.profiles: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` (`id`, `name`, `created`, `modified`) VALUES
	(1, 'Admin', '0000-00-00 00:00:00', '2016-02-01 00:25:24'),
	(2, 'Perfil Teste', '2012-03-25 00:21:45', '2016-01-31 22:01:12');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;


-- Copiando estrutura para tabela belladonna2.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) unsigned NOT NULL,
  `password` char(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `pass_switched` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `profile_id` (`profile_id`),
  KEY `profile_id_user_idx` (`profile_id`),
  CONSTRAINT `profile_id_user` FOREIGN KEY (`profile_id`) REFERENCES `profiles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela belladonna2.users: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `profile_id`, `password`, `name`, `email`, `last_login`, `pass_switched`, `created`, `modified`) VALUES
	(1, 1, 'a78f76a37a7f699f39b324ba58b2aad5', 'Administrador', 'admin', '2016-02-01 00:34:48', 1, '0000-00-00 00:00:00', '2016-02-01 00:34:48'),
	(3, 1, '9bc5f2b8fb63d9ec807dc1d6e35ebf6e', 'Teste', 'teste@teste.com', '2016-02-01 00:34:34', 1, '2016-02-01 00:26:03', '2016-02-01 00:34:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
