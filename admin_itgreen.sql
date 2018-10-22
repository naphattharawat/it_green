/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : admin_itgreen

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2018-10-17 00:42:38
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for manual
-- ----------------------------
DROP TABLE IF EXISTS `manual`;
CREATE TABLE `manual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nameServer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('ARUBA','HCI') COLLATE utf8_unicode_ci NOT NULL,
  `is_delete` enum('N','Y') COLLATE utf8_unicode_ci DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of manual
-- ----------------------------
INSERT INTO `manual` VALUES ('1', 'ทดสอบพนักงานราชการ', '/???', 'ทดสอบ,111', '', 'ARUBA', 'N');
INSERT INTO `manual` VALUES ('2', 'หนังสือเรียนเกี่ยวกับเรื่องปลาโลมา', '่รหกดร', 'sdfsdf,sdfsdfd', '', 'ARUBA', 'N');
INSERT INTO `manual` VALUES ('3', '1234', 'jisjdifj', 'jijsdifj', 'jijsdfsdf', 'ARUBA', 'N');
INSERT INTO `manual` VALUES ('4', '12', 'koskfok', 'kosdjfo', 'josdf', 'ARUBA', 'N');
INSERT INTO `manual` VALUES ('5', 'สมัครพนักงาน.pdf', '1539621088.pdf', './upload/1539621088.pdf', '1', 'HCI', 'N');
INSERT INTO `manual` VALUES ('6', 'สมัครพนักงาน', '1539621311.pdf', './upload/1539621311.pdf', '1', 'HCI', 'N');
INSERT INTO `manual` VALUES ('7', 'test', '1539700096.pdf', './upload/1539700096.pdf', '', 'HCI', 'N');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'nutoan', '000000');
