/*
Navicat MySQL Data Transfer

Source Server         : MySQL-mcs
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : p12

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-01-18 23:21:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for administratori
-- ----------------------------
DROP TABLE IF EXISTS `administratori`;
CREATE TABLE `administratori` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `ime` varchar(100) DEFAULT NULL,
  `prezime` varchar(100) DEFAULT NULL,
  `korisnicko_ime` varchar(100) DEFAULT NULL,
  `lozinka` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of administratori
-- ----------------------------
INSERT INTO `administratori` VALUES ('1', 'Pero', 'Perić', 'pero', 'pero');

-- ----------------------------
-- Table structure for albumi
-- ----------------------------
DROP TABLE IF EXISTS `albumi`;
CREATE TABLE `albumi` (
  `id_albuma` int(11) NOT NULL AUTO_INCREMENT,
  `naslov_albuma` varchar(255) DEFAULT NULL,
  `izvodjac` int(11) DEFAULT NULL,
  `izdavac` int(11) DEFAULT NULL,
  `godina_izdanja` int(11) DEFAULT NULL,
  `omot` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_albuma`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of albumi
-- ----------------------------
INSERT INTO `albumi` VALUES ('1', 'Master of Puppets', '1', '2', '1986', 'album_1.jpg');
INSERT INTO `albumi` VALUES ('2', 'The Number of the Beast', '2', '3', '1982', 'album_2.jpg');
INSERT INTO `albumi` VALUES ('3', '...And justice for al', '1', '3', '1988', 'album_3.jpg');
INSERT INTO `albumi` VALUES ('4', 'Fear of the Dark', '2', '1', '1992', 'album_4.jpg');
INSERT INTO `albumi` VALUES ('5', 'Black Album', '1', '1', '1991', 'album_5.jpg');
INSERT INTO `albumi` VALUES ('6', 'Sally Can\'t Dance', '3', '5', '1974', 'album_6.jpg');

-- ----------------------------
-- Table structure for izdavaci
-- ----------------------------
DROP TABLE IF EXISTS `izdavaci`;
CREATE TABLE `izdavaci` (
  `id_izdavaca` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) DEFAULT NULL,
  `sjediste` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_izdavaca`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of izdavaci
-- ----------------------------
INSERT INTO `izdavaci` VALUES ('1', 'Nuclear Blast', 'New York');
INSERT INTO `izdavaci` VALUES ('2', 'Music Record', 'Frankfurt');
INSERT INTO `izdavaci` VALUES ('3', 'Croatia Records', 'Zagreb');
INSERT INTO `izdavaci` VALUES ('4', 'England', 'London');
INSERT INTO `izdavaci` VALUES ('5', 'RCA Records', 'New York');

-- ----------------------------
-- Table structure for izvodjaci
-- ----------------------------
DROP TABLE IF EXISTS `izvodjaci`;
CREATE TABLE `izvodjaci` (
  `id_izvodjaca` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) DEFAULT NULL,
  `vrsta_izvodjaca` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_izvodjaca`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of izvodjaci
-- ----------------------------
INSERT INTO `izvodjaci` VALUES ('1', 'Metallica', 'grupa');
INSERT INTO `izvodjaci` VALUES ('2', 'Iron Maiden', 'grupa');
INSERT INTO `izvodjaci` VALUES ('3', 'Lou Reed', 'solo');

-- ----------------------------
-- Table structure for pjesme
-- ----------------------------
DROP TABLE IF EXISTS `pjesme`;
CREATE TABLE `pjesme` (
  `id_pjesme` int(11) NOT NULL AUTO_INCREMENT,
  `naslov` varchar(255) DEFAULT NULL,
  `duljina_trajanja` varchar(255) DEFAULT NULL,
  `album` int(11) DEFAULT NULL,
  `broj_pjesme` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pjesme`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pjesme
-- ----------------------------
INSERT INTO `pjesme` VALUES ('1', 'Master of Puppets', '8:36', '1', '2');
INSERT INTO `pjesme` VALUES ('2', 'Hallowed be thy name', '8:48', '2', '8');
INSERT INTO `pjesme` VALUES ('3', 'The Unforgiven', '6:22', '5', '4');
INSERT INTO `pjesme` VALUES ('4', 'Battery', '5:13', '1', '1');
INSERT INTO `pjesme` VALUES ('5', 'The Thing That Should Not Be', '6:37', '1', '3');
INSERT INTO `pjesme` VALUES ('6', 'Welcome Home (Sanitarium)', '6:28', '1', '4');
INSERT INTO `pjesme` VALUES ('7', 'Disposable Heroes', '8:17', '1', '5');
INSERT INTO `pjesme` VALUES ('8', 'Leper Messiah', '5:41', '1', '6');
INSERT INTO `pjesme` VALUES ('9', 'Orion', '8:28', '1', '7');
INSERT INTO `pjesme` VALUES ('10', 'Damage, Inc.', '5:30', '1', '8');
INSERT INTO `pjesme` VALUES ('11', 'Blackened', '8:48', '3', '1');
INSERT INTO `pjesme` VALUES ('12', '…And Justice for All', '6:22', '3', '2');
INSERT INTO `pjesme` VALUES ('13', 'Eye of the Beholder', '5:13', '3', '3');
INSERT INTO `pjesme` VALUES ('14', 'One', '6:37', '3', '4');
INSERT INTO `pjesme` VALUES ('15', 'The Shortest Straw', '6:28', '3', '5');
INSERT INTO `pjesme` VALUES ('16', 'Harvester of Sorrow', '8:17', '3', '6');
INSERT INTO `pjesme` VALUES ('17', 'The Frayed Ends of Sanity', '5:41', '3', '7');
INSERT INTO `pjesme` VALUES ('18', 'To Live Is to Die', '8:28', '3', '8');
INSERT INTO `pjesme` VALUES ('19', 'Dyers Eve', '5:30', '3', '9');
INSERT INTO `pjesme` VALUES ('20', 'Invaders', '6:22', '2', '1');
INSERT INTO `pjesme` VALUES ('21', 'Children of the Damned', '5:13', '2', '2');
INSERT INTO `pjesme` VALUES ('22', 'The Prisoner', '6:37', '2', '3');
INSERT INTO `pjesme` VALUES ('23', '22 Acacia Avenue', '6:28', '2', '4');
INSERT INTO `pjesme` VALUES ('24', 'The Number of the Beast', '8:17', '2', '5');
INSERT INTO `pjesme` VALUES ('25', 'Run to the Hills', '5:41', '2', '6');
INSERT INTO `pjesme` VALUES ('26', 'Gangland', '8:28', '2', '7');
INSERT INTO `pjesme` VALUES ('27', 'Hallowed Be Thy Name', '5:30', '2', '8');
INSERT INTO `pjesme` VALUES ('28', 'Ride Sally Ride', '4:05', '6', '1');
INSERT INTO `pjesme` VALUES ('29', 'Animal Language', '3:03', '6', '2');
INSERT INTO `pjesme` VALUES ('30', 'Baby Face', '5:02', '6', '3');
INSERT INTO `pjesme` VALUES ('31', 'N. Y. Stars', '4:00', '6', '4');
INSERT INTO `pjesme` VALUES ('32', 'Kill Your Sons', '3:41', '6', '5');
INSERT INTO `pjesme` VALUES ('33', 'Ennui', '2:54', '6', '6');
INSERT INTO `pjesme` VALUES ('34', 'Sally Can\'t Dance', '3:40', '6', '7');
INSERT INTO `pjesme` VALUES ('35', 'Billy', '5:06', '6', '8');
INSERT INTO `pjesme` VALUES ('36', 'Be Quick or Be Dead', '3:21', '4', '1');
INSERT INTO `pjesme` VALUES ('37', 'From Here to Eternity', '3:35', '4', '2');
INSERT INTO `pjesme` VALUES ('38', 'Fear Is the Key', '5:30', '4', '4');
INSERT INTO `pjesme` VALUES ('39', 'Childhood\'s End', '4:37', '4', '5');
INSERT INTO `pjesme` VALUES ('40', 'From Here to Eternity', '6:52', '4', '3');
