/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100122
Source Host           : localhost:3306
Source Database       : movimientosdb

Target Server Type    : MYSQL
Target Server Version : 100122
File Encoding         : 65001

Date: 2017-09-23 11:40:31
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of equipment
-- ----------------------------
INSERT INTO `equipment` VALUES ('20', '1', '2', 'Laptop GDM W950LU 548793 GDMDFJKKDJKFMMJDJ', 'GDMDFJKKDJKFMMJDJ', '548793', '4', '2017-09-22 21:27:50');
INSERT INTO `equipment` VALUES ('23', '2', '2', 'dhfjdjfhj', 'fgjfhgjfh', '588544', '5', '2017-09-22 00:00:00');

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
  `instalation_id` int(11) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F4DD95F7A76ED395` (`user_id`),
  KEY `IDX_F4DD95F7EC7EC6CA` (`instalation_id`),
  KEY `IDX_F4DD95F7217BBB47` (`person_id`),
  CONSTRAINT `FK_F4DD95F7217BBB47` FOREIGN KEY (`person_id`) REFERENCES `person` (`id`),
  CONSTRAINT `FK_F4DD95F7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_F4DD95F7EC7EC6CA` FOREIGN KEY (`instalation_id`) REFERENCES `intalation` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of movement
-- ----------------------------
INSERT INTO `movement` VALUES ('2', '2012-01-01', null, '3', null);
INSERT INTO `movement` VALUES ('3', '2012-01-01', null, '1', null);
INSERT INTO `movement` VALUES ('4', '2012-01-01', null, '2', null);
INSERT INTO `movement` VALUES ('5', '2012-01-01', null, '2', null);

-- ----------------------------
-- Table structure for person
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CI` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of person
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', 'Impresora');
INSERT INTO `type` VALUES ('2', 'Laptop');
INSERT INTO `type` VALUES ('5', 'Monitor');
INSERT INTO `type` VALUES ('9', 'Mouse');
INSERT INTO `type` VALUES ('8', 'Teclado');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
