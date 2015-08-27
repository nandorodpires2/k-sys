-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.17 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para ksys
DROP DATABASE IF EXISTS `ksys`;
CREATE DATABASE IF NOT EXISTS `ksys` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ksys`;


-- Copiando estrutura para tabela ksys.cliente
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_nome` varchar(200) DEFAULT NULL,
  `cliente_site` varchar(200) DEFAULT NULL,
  `cliente_ativo` tinyint(1) DEFAULT '1',
  `cliente_desde` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela ksys.cliente: ~0 rows (aproximadamente)
DELETE FROM `cliente`;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`cliente_id`, `cliente_nome`, `cliente_site`, `cliente_ativo`, `cliente_desde`) VALUES
	(1, 'StyleSheets', 'http://stylesheets.com.br', 1, '2015-08-27 15:20:30');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


-- Copiando estrutura para tabela ksys.senha
DROP TABLE IF EXISTS `senha`;
CREATE TABLE IF NOT EXISTS `senha` (
  `senha_id` int(11) NOT NULL AUTO_INCREMENT,
  `senha_tipo_id` int(11) NOT NULL,
  `senha_host` varchar(200) DEFAULT NULL,
  `senha_usuario` varchar(200) DEFAULT NULL,
  `senha_senha` varchar(200) DEFAULT NULL,
  `senha_observacao` text,
  `senha_ativo` tinyint(1) DEFAULT '1',
  `cliente_id` int(11) NOT NULL,
  PRIMARY KEY (`senha_id`),
  KEY `fk_senha_senha_tipo_idx` (`senha_tipo_id`),
  KEY `fk_senha_cliente1_idx` (`cliente_id`),
  CONSTRAINT `fk_senha_senha_tipo` FOREIGN KEY (`senha_tipo_id`) REFERENCES `senha_tipo` (`senha_tipo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_senha_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela ksys.senha: ~0 rows (aproximadamente)
DELETE FROM `senha`;
/*!40000 ALTER TABLE `senha` DISABLE KEYS */;
INSERT INTO `senha` (`senha_id`, `senha_tipo_id`, `senha_host`, `senha_usuario`, `senha_senha`, `senha_observacao`, `senha_ativo`, `cliente_id`) VALUES
	(1, 1, 'http://webmail.stylesheets.com.br/roundcube/index.php?_user=orcamento@stylesheets.com.br', 'orcamento@stylesheets.com.br', 'nando@_310508', NULL, 1, 1);
/*!40000 ALTER TABLE `senha` ENABLE KEYS */;


-- Copiando estrutura para tabela ksys.senha_tipo
DROP TABLE IF EXISTS `senha_tipo`;
CREATE TABLE IF NOT EXISTS `senha_tipo` (
  `senha_tipo_id` int(11) NOT NULL AUTO_INCREMENT,
  `senha_tipo_nome` varchar(200) DEFAULT NULL,
  `senha_tipo_ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`senha_tipo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela ksys.senha_tipo: ~4 rows (aproximadamente)
DELETE FROM `senha_tipo`;
/*!40000 ALTER TABLE `senha_tipo` DISABLE KEYS */;
INSERT INTO `senha_tipo` (`senha_tipo_id`, `senha_tipo_nome`, `senha_tipo_ativo`) VALUES
	(1, 'E-mail', 1),
	(2, 'Wordpress', 1),
	(3, 'FTP', 1),
	(4, 'Painel de Controle', 1);
/*!40000 ALTER TABLE `senha_tipo` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
