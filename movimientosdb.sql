/*
Navicat MySQL Data Transfer

Source Server         : MYSQL_localhost
Source Server Version : 100208
Source Host           : localhost:3306
Source Database       : movimientosdb

Target Server Type    : MYSQL
Target Server Version : 100208
File Encoding         : 65001

Date: 2017-09-23 20:22:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for equipment
-- ----------------------------
DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ns` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ni` int(11) NOT NULL,
  `movement_id` int(11) DEFAULT NULL,
  `create_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D338D583C54C8C93` (`type_id`),
  KEY `IDX_D338D5837975B7E7` (`model_id`),
  KEY `IDX_D338D583229E70A7` (`movement_id`),
  CONSTRAINT `FK_D338D583229E70A7` FOREIGN KEY (`movement_id`) REFERENCES `movement` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_D338D5837975B7E7` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_D338D583C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of equipment
-- ----------------------------
INSERT INTO `equipment` VALUES ('26', '1', '2', 'Laptop GDM W950LU 4545 FDFDFDF', 'FDFDFDF', '4545', '8', '2017-09-23 12:48:28');
INSERT INTO `equipment` VALUES ('27', '2', '1', 'Impresora HP Laserjet M227 5487742 DFDFDDFDF', 'DFDFDDFDF', '5487742', null, '2017-09-23 19:29:57');
INSERT INTO `equipment` VALUES ('28', '2', '1', 'Impresora HP Laserjet M227 4575224 FDRW3DFDF', 'FDRW3DFDF', '4575224', null, '2017-09-23 19:30:54');
INSERT INTO `equipment` VALUES ('29', '1', '2', 'Laptop GDM W950LU 5477852 DFHJHQ', 'DFHJHQ', '5477852', null, '2017-09-23 19:31:17');
INSERT INTO `equipment` VALUES ('30', '2', '2', 'Laptop HP Laserjet M227 58541 5D4FDRER', '5D4FDRER', '58541', null, '2017-09-23 19:31:41');

-- ----------------------------
-- Table structure for intalation
-- ----------------------------
DROP TABLE IF EXISTS `intalation`;
CREATE TABLE `intalation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `territoty_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6F52A84E5E237E06` (`name`),
  KEY `IDX_6F52A84EFCB7BF74` (`territoty_id`),
  CONSTRAINT `FK_6F52A84EFCB7BF74` FOREIGN KEY (`territoty_id`) REFERENCES `territory` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of intalation
-- ----------------------------
INSERT INTO `intalation` VALUES ('1', 'Hotel Tuxpan', '5');
INSERT INTO `intalation` VALUES ('2', 'Hotel Bella Costa', '5');
INSERT INTO `intalation` VALUES ('3', 'Hotel Melia Las Antillas', '5');
INSERT INTO `intalation` VALUES ('4', 'Hotel Iberostar Mojito', '10');
INSERT INTO `intalation` VALUES ('5', 'Hotel Casa Granda', '15');
INSERT INTO `intalation` VALUES ('6', 'Hotel Versalles', '15');
INSERT INTO `intalation` VALUES ('7', 'Hotel Punta Gorda', '15');
INSERT INTO `intalation` VALUES ('11', 'Melia Varadero', '5');
INSERT INTO `intalation` VALUES ('12', 'Melia Santiago', '15');

-- ----------------------------
-- Table structure for mark
-- ----------------------------
DROP TABLE IF EXISTS `mark`;
CREATE TABLE `mark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6674F2715E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mark
-- ----------------------------
INSERT INTO `mark` VALUES ('10', 'DELL');
INSERT INTO `mark` VALUES ('2', 'GDM');
INSERT INTO `mark` VALUES ('1', 'HP');
INSERT INTO `mark` VALUES ('9', 'MITEL');
INSERT INTO `mark` VALUES ('8', 'SAMSUNG');
INSERT INTO `mark` VALUES ('7', 'THTF');

-- ----------------------------
-- Table structure for model
-- ----------------------------
DROP TABLE IF EXISTS `model`;
CREATE TABLE `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mark_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D79572D94290F12B` (`mark_id`),
  CONSTRAINT `FK_D79572D94290F12B` FOREIGN KEY (`mark_id`) REFERENCES `mark` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of model
-- ----------------------------
INSERT INTO `model` VALUES ('1', '2', 'W950LU');
INSERT INTO `model` VALUES ('2', '1', 'Laserjet M227');
INSERT INTO `model` VALUES ('4', '1', 'Laserjet Pro 400');
INSERT INTO `model` VALUES ('5', '9', '5207 IP Phone');

-- ----------------------------
-- Table structure for movement
-- ----------------------------
DROP TABLE IF EXISTS `movement`;
CREATE TABLE `movement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F4DD95F7A76ED395` (`user_id`),
  KEY `IDX_F4DD95F7217BBB47` (`person_id`),
  CONSTRAINT `FK_F4DD95F7217BBB47` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  CONSTRAINT `FK_F4DD95F7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of movement
-- ----------------------------
INSERT INTO `movement` VALUES ('8', '2012-01-01', null, '2', '1');

-- ----------------------------
-- Table structure for person
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CI` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instalation_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_34DCD176EC7EC6CA` (`instalation_id`),
  CONSTRAINT `FK_34DCD176EC7EC6CA` FOREIGN KEY (`instalation_id`) REFERENCES `intalation` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of person
-- ----------------------------
INSERT INTO `person` VALUES ('1', 'Daine Sanchez Victoria', 'Asesora Juridica', '88101734099', '2');
INSERT INTO `person` VALUES ('2', 'Lisandra Nieto Basnueva', 'Directora Comercial', '94050755555', '4');
INSERT INTO `person` VALUES ('3', 'Belkis Basnueva Cantillo', 'Directora de Calidad', '45478421321', '12');
INSERT INTO `person` VALUES ('4', 'Pedro Enio Nieto Sanchez', 'J\' Compra', '85156454875', '11');
INSERT INTO `person` VALUES ('5', 'Juan Martinez', 'Esp. Economico', '78421234575', '5');
INSERT INTO `person` VALUES ('6', 'Yasley Gonzalez', 'Directora General', '54572121247', '6');
INSERT INTO `person` VALUES ('7', 'Leopoldo Valdez', 'Subdirector Economico', '78522456366', '7');

-- ----------------------------
-- Table structure for territory
-- ----------------------------
DROP TABLE IF EXISTS `territory`;
CREATE TABLE `territory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of territory
-- ----------------------------
INSERT INTO `territory` VALUES ('1', 'Pinar del Rio');
INSERT INTO `territory` VALUES ('2', 'Mayabeque');
INSERT INTO `territory` VALUES ('3', 'Artimisa');
INSERT INTO `territory` VALUES ('4', 'La Habana');
INSERT INTO `territory` VALUES ('5', 'Varadero');
INSERT INTO `territory` VALUES ('6', 'Peninsula de Zapata');
INSERT INTO `territory` VALUES ('7', 'Villla Clara');
INSERT INTO `territory` VALUES ('8', 'Remedios');
INSERT INTO `territory` VALUES ('9', 'Sancti Spiritus');
INSERT INTO `territory` VALUES ('10', 'Ciego de Avila');
INSERT INTO `territory` VALUES ('11', 'Camagüey');
INSERT INTO `territory` VALUES ('12', 'Las Tunas');
INSERT INTO `territory` VALUES ('13', 'Granma');
INSERT INTO `territory` VALUES ('14', 'Holguín');
INSERT INTO `territory` VALUES ('15', 'Santiago de Cuba');

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8CDE57295E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', 'Impresora');
INSERT INTO `type` VALUES ('2', 'Laptop');
INSERT INTO `type` VALUES ('5', 'Monitor');
INSERT INTO `type` VALUES ('9', 'Mouse');
INSERT INTO `type` VALUES ('12', 'PC POST');
INSERT INTO `type` VALUES ('11', 'Scaner de pasaporte');
INSERT INTO `type` VALUES ('8', 'Teclado');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `occupation` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'javiernieto1989@gmail.com', 'javier', 'javier', 'Enio Javier Nieto Basnueva', 'Especialista Informatico');
INSERT INTO `user` VALUES ('2', 'informatico1@cubanacan.tur.cu', 'andy', 'andy', 'Andy Garcia Mirabal', 'Especialista Informatico');
