-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.10-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela compet.achievements
CREATE TABLE IF NOT EXISTS `achievements` (
  `id` int(11) NOT NULL,
  `total_points` int(11) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `description` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_achievements_users1_idx` (`user_id`),
  CONSTRAINT `fk_achievements_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compet.achievements: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `achievements` DISABLE KEYS */;
/*!40000 ALTER TABLE `achievements` ENABLE KEYS */;


-- Copiando estrutura para tabela compet.areas
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela compet.areas: ~22 rows (aproximadamente)
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
	(12, NULL, 0, 'Areas', 'Ãreas', 'add', 'Criar Nova', ''),
	(13, NULL, 1, 'Questions', 'QuestÃµes', 'index', 'todas', 'fa fa-question'),
	(14, NULL, 0, 'Questions', 'QuestÃµes', 'add', 'Adicionar', ''),
	(15, NULL, 0, 'Questions', 'QuestÃµes', 'edit', 'Editar', ''),
	(16, NULL, 0, 'Questions', 'QuestÃµes', 'delete', 'Deletar', ''),
	(17, NULL, 1, 'Categories', 'Categorias', 'index', 'Todos', ''),
	(18, NULL, 0, 'Categories', 'Categorias', 'add', 'Adicionar', ''),
	(19, NULL, 0, 'Categories', 'Categorias', 'delete', 'Remover', ''),
	(20, NULL, 0, 'Categories', 'Categorias', 'edit', 'Editar', ''),
	(21, NULL, 1, 'Fase', 'Fase', 'index', 'Todas', ''),
	(22, NULL, 0, 'Fase', 'Fase', 'add', 'Criar Nova', '');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;


-- Copiando estrutura para tabela compet.areas_profiles
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
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela compet.areas_profiles: ~32 rows (aproximadamente)
/*!40000 ALTER TABLE `areas_profiles` DISABLE KEYS */;
INSERT INTO `areas_profiles` (`id`, `area_id`, `profile_id`) VALUES
	(242, 1, 1),
	(30, 1, 2),
	(243, 2, 1),
	(31, 2, 2),
	(244, 3, 1),
	(32, 3, 2),
	(245, 4, 1),
	(33, 4, 2),
	(247, 5, 1),
	(35, 5, 2),
	(248, 6, 1),
	(36, 6, 2),
	(249, 7, 1),
	(37, 7, 2),
	(250, 8, 1),
	(38, 8, 2),
	(251, 9, 1),
	(39, 9, 2),
	(246, 10, 1),
	(34, 10, 2),
	(252, 11, 1),
	(253, 12, 1),
	(254, 13, 1),
	(255, 14, 1),
	(256, 15, 1),
	(257, 16, 1),
	(258, 17, 1),
	(259, 18, 1),
	(260, 19, 1),
	(261, 20, 1),
	(262, 21, 1),
	(263, 22, 1);
/*!40000 ALTER TABLE `areas_profiles` ENABLE KEYS */;


-- Copiando estrutura para tabela compet.attempts
CREATE TABLE IF NOT EXISTS `attempts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `time_finished` time NOT NULL,
  `points_earned` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_attempts_users1_idx` (`user_id`),
  CONSTRAINT `fk_attempts_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compet.attempts: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `attempts` ENABLE KEYS */;


-- Copiando estrutura para tabela compet.attempts_questions
CREATE TABLE IF NOT EXISTS `attempts_questions` (
  `attempt_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `status` enum('CA','NA','WA') NOT NULL,
  `levels_id` int(11) NOT NULL,
  PRIMARY KEY (`attempt_id`,`question_id`,`levels_id`),
  KEY `fk_questions_has_attempts_attempts1_idx` (`attempt_id`),
  KEY `fk_questions_has_attempts_questions1_idx` (`question_id`),
  KEY `fk_attempts_questions_levels1_idx` (`levels_id`),
  CONSTRAINT `fk_attempts_questions_levels1` FOREIGN KEY (`levels_id`) REFERENCES `levels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_questions_has_attempts_attempts1` FOREIGN KEY (`attempt_id`) REFERENCES `attempts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_questions_has_attempts_questions1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compet.attempts_questions: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `attempts_questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `attempts_questions` ENABLE KEYS */;


-- Copiando estrutura para tabela compet.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compet.categories: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`) VALUES
	(1, 'Testerino'),
	(2, 'LP'),
	(3, 'ED'),
	(4, 'MTM');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Copiando estrutura para tabela compet.categories_questions
CREATE TABLE IF NOT EXISTS `categories_questions` (
  `category_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`category_id`,`question_id`),
  KEY `fk_categories_has_questions_questions1_idx` (`question_id`),
  KEY `fk_categories_has_questions_categories1_idx` (`category_id`),
  CONSTRAINT `fk_categories_has_questions_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_categories_has_questions_questions1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compet.categories_questions: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `categories_questions` DISABLE KEYS */;
INSERT INTO `categories_questions` (`category_id`, `question_id`) VALUES
	(1, 6),
	(1, 7),
	(1, 8),
	(1, 10);
/*!40000 ALTER TABLE `categories_questions` ENABLE KEYS */;


-- Copiando estrutura para tabela compet.fases
CREATE TABLE IF NOT EXISTS `fases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `category_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`category_id`,`level_id`),
  KEY `fk_Fase_categories1_idx` (`category_id`),
  KEY `fk_Fase_levels1_idx` (`level_id`),
  CONSTRAINT `fk_Fase_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Fase_levels1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compet.fases: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `fases` DISABLE KEYS */;
INSERT INTO `fases` (`id`, `title`, `category_id`, `level_id`, `description`) VALUES
	(19, 'testerino', 4, 5, 'um teste bem bacana'),
	(20, 'testerino123', 2, 3, 'um teste bem bacana123'),
	(21, 'oi oioioioioi', 3, 2, 'sdasafasfas'),
	(22, 'oi oioioioioi', 3, 2, 'sdasafasfas'),
	(23, 'oi oioioioioi', 3, 2, 'sdasafasfas'),
	(24, 'oi oioioioioi', 3, 2, 'sdasafasfas'),
	(26, '123', 1, 3, '123'),
	(27, '123', 1, 3, '123'),
	(28, '123', 1, 3, '123'),
	(29, '123', 1, 3, '123'),
	(30, '123', 1, 3, '123'),
	(31, 'testerino', 1, 4, 'um novo testerino'),
	(32, '123', 1, 1, '123');
/*!40000 ALTER TABLE `fases` ENABLE KEYS */;


-- Copiando estrutura para tabela compet.levels
CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `points` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compet.levels: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` (`id`, `name`, `points`) VALUES
	(1, 'FÃ¡cil', '5'),
	(2, 'Mediana', '10'),
	(3, 'DifÃ­cil', '15'),
	(4, 'Bem Dificil', '20'),
	(5, 'Dark Souls', '30');
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;


-- Copiando estrutura para tabela compet.profiles
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela compet.profiles: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` (`id`, `name`, `created`, `modified`) VALUES
	(1, 'Admin', '0000-00-00 00:00:00', '2016-02-24 15:30:17'),
	(2, 'Perfil Teste', '2012-03-25 00:21:45', '2016-01-31 22:01:12');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;


-- Copiando estrutura para tabela compet.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` mediumtext NOT NULL,
  `level_id` int(11) NOT NULL,
  `option_1` varchar(50) NOT NULL,
  `option_2` varchar(50) NOT NULL,
  `option_3` varchar(50) DEFAULT NULL,
  `option_4` varchar(50) DEFAULT NULL,
  `option_5` varchar(50) DEFAULT NULL,
  `answer` enum('1','2','3','4','5') NOT NULL,
  `explanation` mediumtext NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questions_levels1_idx` (`level_id`),
  CONSTRAINT `fk_questions_levels1` FOREIGN KEY (`level_id`) REFERENCES `levels` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compet.questions: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `description`, `level_id`, `option_1`, `option_2`, `option_3`, `option_4`, `option_5`, `answer`, `explanation`, `created`, `modified`) VALUES
	(5, 'qwetre', 1, 'certa', 'errada', 'errada', 'errada', 'errada', '1', 'asdxzc', '2016-02-17 14:36:35', '2016-02-17 14:36:35'),
	(6, 'qweretegarhfg', 3, 'qewrt', 'ertyui', 'iop', 'afdsgfh', 'asdgffh', '1', 'asdasfdgvdbdsjykf', '2016-02-17 15:12:39', '2016-02-18 14:11:24'),
	(7, 'um teste que testara o teste', 1, 'certa', 'errada', 'errada', 'errada', 'errada', '1', 'um teste', '2016-02-18 12:23:39', '2016-02-18 15:14:57'),
	(8, 'unicornios com asas sao da onde?\r\n', 4, 'asdasdas', 'da', 'asdasfa', 'sfasafa', 'certa', '5', 'mitologia neeerd', '2016-02-18 15:15:29', '2016-02-18 15:21:01'),
	(10, 'uma pergunta com uma resposta', 4, 'errada', 'errada', 'certa', 'errada', 'errada', '3', 'escolha C', '2016-02-18 15:23:42', '2016-02-25 13:35:36');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;


-- Copiando estrutura para tabela compet.tips
CREATE TABLE IF NOT EXISTS `tips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` mediumtext NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tips_questions1_idx` (`question_id`),
  CONSTRAINT `fk_tips_questions1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela compet.tips: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tips` DISABLE KEYS */;
INSERT INTO `tips` (`id`, `description`, `question_id`) VALUES
	(1, 'esta e uma dica', 10);
/*!40000 ALTER TABLE `tips` ENABLE KEYS */;


-- Copiando estrutura para tabela compet.users
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

-- Copiando dados para a tabela compet.users: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `profile_id`, `password`, `name`, `email`, `last_login`, `pass_switched`, `created`, `modified`) VALUES
	(1, 1, 'a78f76a37a7f699f39b324ba58b2aad5', 'Administrador', 'admin', '2016-02-26 04:32:27', 1, '0000-00-00 00:00:00', '2016-02-26 04:32:27'),
	(3, 1, '9bc5f2b8fb63d9ec807dc1d6e35ebf6e', 'Teste', 'teste@teste.com', '2016-02-01 00:34:34', 1, '2016-02-01 00:26:03', '2016-02-01 00:34:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
