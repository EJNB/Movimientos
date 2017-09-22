/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : movimientosdb

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-09-21 16:50:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `equipment`
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
  PRIMARY KEY (`id`),
  KEY `IDX_D338D583C54C8C93` (`type_id`),
  KEY `IDX_D338D5837975B7E7` (`model_id`),
  KEY `IDX_D338D583229E70A7` (`movement_id`),
  CONSTRAINT `FK_D338D583229E70A7` FOREIGN KEY (`movement_id`) REFERENCES `movement` (`id`),
  CONSTRAINT `FK_D338D5837975B7E7` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
  CONSTRAINT `FK_D338D583C54C8C93` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of equipment
-- ----------------------------
INSERT INTO `equipment` VALUES ('1', '2', '1', null, 'VNB3C30759', '547255', null);

-- ----------------------------
-- Table structure for `intalation`
-- ----------------------------
DROP TABLE IF EXISTS `intalation`;
CREATE TABLE `intalation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of intalation
-- ----------------------------
INSERT INTO `intalation` VALUES ('1', 'Hotel Tuxpan');
INSERT INTO `intalation` VALUES ('2', 'Hotel Bella Costa');
INSERT INTO `intalation` VALUES ('3', 'Hotel Melia Las Antillas');
INSERT INTO `intalation` VALUES ('4', 'Hotel Iberostar Mojito');
INSERT INTO `intalation` VALUES ('5', 'Hotel Casa Granda');
INSERT INTO `intalation` VALUES ('6', 'Hotel Versalles');
INSERT INTO `intalation` VALUES ('7', 'Hotel Punta Gorda');

-- ----------------------------
-- Table structure for `mark`
-- ----------------------------
DROP TABLE IF EXISTS `mark`;
CREATE TABLE `mark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mark
-- ----------------------------
INSERT INTO `mark` VALUES ('1', 'HP');
INSERT INTO `mark` VALUES ('2', 'GDM');

-- ----------------------------
-- Table structure for `model`
-- ----------------------------
DROP TABLE IF EXISTS `model`;
CREATE TABLE `model` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mark_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D79572D94290F12B` (`mark_id`),
  CONSTRAINT `FK_D79572D94290F12B` FOREIGN KEY (`mark_id`) REFERENCES `mark` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of model
-- ----------------------------
INSERT INTO `model` VALUES ('1', '2', 'W950LU');
INSERT INTO `model` VALUES ('2', '1', 'Laserjet M227');

-- ----------------------------
-- Table structure for `movement`
-- ----------------------------
DROP TABLE IF EXISTS `movement`;
CREATE TABLE `movement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `instalation_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F4DD95F7A76ED395` (`user_id`),
  KEY `IDX_F4DD95F7EC7EC6CA` (`instalation_id`),
  CONSTRAINT `FK_F4DD95F7A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_F4DD95F7EC7EC6CA` FOREIGN KEY (`instalation_id`) REFERENCES `intalation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of movement
-- ----------------------------

-- ----------------------------
-- Table structure for `person`
-- ----------------------------
DROP TABLE IF EXISTS `person`;
CREATE TABLE `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instalation_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `CI` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_34DCD176EC7EC6CA` (`instalation_id`),
  CONSTRAINT `FK_34DCD176EC7EC6CA` FOREIGN KEY (`instalation_id`) REFERENCES `intalation` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of person
-- ----------------------------

-- ----------------------------
-- Table structure for `type`
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8CDE57295E237E06` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', 'Impresora');
INSERT INTO `type` VALUES ('2', 'Laptop');
INSERT INTO `type` VALUES ('5', 'Monitor');
INSERT INTO `type` VALUES ('6', 'Mouse');
INSERT INTO `type` VALUES ('7', 'Teclado');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
