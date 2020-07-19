/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : db_rest_api

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2020-04-24 10:00:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for kontak
-- ----------------------------
DROP TABLE IF EXISTS `kontak`;
CREATE TABLE `kontak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nomor` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kontak
-- ----------------------------
INSERT INTO `kontak` VALUES ('3', 'yanti lho', '123456');
INSERT INTO `kontak` VALUES ('4', 'Siska wulandari', '01254125623');
INSERT INTO `kontak` VALUES ('5', 'Shulhan', '083871467022');
INSERT INTO `kontak` VALUES ('18', 'paijo', '8989');
INSERT INTO `kontak` VALUES ('19', 'kakek teguh sugiono', '15125');
SET FOREIGN_KEY_CHECKS=1;
