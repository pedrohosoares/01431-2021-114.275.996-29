-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.33-0ubuntu0.18.04.1 - (Ubuntu)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para ist
CREATE DATABASE IF NOT EXISTS `ist` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `ist`;

-- Copiando estrutura para tabela ist.contas
CREATE TABLE IF NOT EXISTS `contas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero_conta` varchar(10) DEFAULT NULL,
  `pessoas_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contas_pessoas1_idx` (`pessoas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela ist.contas: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `contas` DISABLE KEYS */;
INSERT INTO `contas` (`id`, `numero_conta`, `pessoas_id`) VALUES
	(1, '43234656', 4);
/*!40000 ALTER TABLE `contas` ENABLE KEYS */;

-- Copiando estrutura para tabela ist.movimentacoes
CREATE TABLE IF NOT EXISTS `movimentacoes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `criado_em` datetime DEFAULT NULL,
  `contas_id` int(10) unsigned NOT NULL,
  `valor` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_movimentacoes_contas1_idx` (`contas_id`),
  CONSTRAINT `fk_movimentacoes_contas1` FOREIGN KEY (`contas_id`) REFERENCES `contas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela ist.movimentacoes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `movimentacoes` DISABLE KEYS */;
INSERT INTO `movimentacoes` (`id`, `criado_em`, `contas_id`, `valor`) VALUES
	(2, '2021-08-01 22:28:53', 1, 200.00),
	(3, '2021-08-01 22:28:59', 1, 200.00);
/*!40000 ALTER TABLE `movimentacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela ist.pessoas
CREATE TABLE IF NOT EXISTS `pessoas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `endereco` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;


INSERT INTO `pessoas` (`id`, `nome`, `cpf`, `endereco`)
VALUES
 (1, 'Marcelo Ramos', '48349778032', 'Rua Luiz Demo, n 120, Bairro Passagem, Tubarão/SC'),
 (2, 'Renato Silva', '76537136024', 'Rua Alexandre de Sá, n 98, Bairro Dehon, Tubarão/SC'),
 (3, 'Maria Cordeiro', '01054804010', 'Rua Júlio Pozza, n 450, Bairro São João, Tubarão/SC');

/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
