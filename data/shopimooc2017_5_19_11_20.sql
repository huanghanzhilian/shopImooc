/*
Navicat MySQL Data Transfer

Source Server         : web
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : shopimooc

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-05-19 11:16:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for imooc_admin
-- ----------------------------
DROP TABLE IF EXISTS `imooc_admin`;
CREATE TABLE `imooc_admin` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of imooc_admin
-- ----------------------------
INSERT INTO `imooc_admin` VALUES ('3', 'admin', '202cb962ac59075b964b07152d234b70', 'admin@qq.com');
INSERT INTO `imooc_admin` VALUES ('4', '黄继超', '202cb962ac59075b964b07152d234b70', 'admin1@qq.com');
INSERT INTO `imooc_admin` VALUES ('16', '黄继鹏', '202cb962ac59075b964b07152d234b70', '1319639755@qq.com');
INSERT INTO `imooc_admin` VALUES ('17', '李晗傻瓜', '202cb962ac59075b964b07152d234b70', 'lihan@qq.com');
INSERT INTO `imooc_admin` VALUES ('18', '黄武阳', '202cb962ac59075b964b07152d234b70', '13989401579@qq.com');
INSERT INTO `imooc_admin` VALUES ('19', '黄宝珠', '202cb962ac59075b964b07152d234b70', '13882726@qq.com');

-- ----------------------------
-- Table structure for imooc_album
-- ----------------------------
DROP TABLE IF EXISTS `imooc_album`;
CREATE TABLE `imooc_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Pid` int(10) unsigned NOT NULL,
  `albumPath` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of imooc_album
-- ----------------------------
INSERT INTO `imooc_album` VALUES ('3', '3', 'e6c199337ec97b043c67207714c3ac13.jpg');
INSERT INTO `imooc_album` VALUES ('4', '3', '7e3311283e3636c4f27c26876db307b7.jpg');
INSERT INTO `imooc_album` VALUES ('5', '4', '4f815a2a64401658965457057fdef60f.jpg');
INSERT INTO `imooc_album` VALUES ('6', '4', '000f00c545e34a6eff52ac7c5e116745.jpg');
INSERT INTO `imooc_album` VALUES ('7', '5', '3b75ab91d73ffdcad68785b206377c50.jpg');
INSERT INTO `imooc_album` VALUES ('8', '6', 'aeb64bf24ab92bf1647a7937edeef055.jpg');
INSERT INTO `imooc_album` VALUES ('9', '7', '2e42173d7fff78dcd171fed54234da91.jpg');

-- ----------------------------
-- Table structure for imooc_cate
-- ----------------------------
DROP TABLE IF EXISTS `imooc_cate`;
CREATE TABLE `imooc_cate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cName` varchar(30) CHARACTER SET utf8 COLLATE utf8_icelandic_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cName` (`cName`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of imooc_cate
-- ----------------------------
INSERT INTO `imooc_cate` VALUES ('31', '家用电器');
INSERT INTO `imooc_cate` VALUES ('32', '精品服装');
INSERT INTO `imooc_cate` VALUES ('33', '舌尖美食');

-- ----------------------------
-- Table structure for imooc_pro
-- ----------------------------
DROP TABLE IF EXISTS `imooc_pro`;
CREATE TABLE `imooc_pro` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `pName` varchar(50) NOT NULL,
  `pSn` varchar(50) NOT NULL,
  `pNum` int(10) unsigned NOT NULL DEFAULT '1',
  `mPrice` decimal(10,0) NOT NULL,
  `iPrice` decimal(10,0) NOT NULL,
  `pDesc` text,
  `pubTime` int(10) unsigned NOT NULL,
  `isShow` tinyint(4) NOT NULL DEFAULT '1',
  `isHot` tinyint(4) NOT NULL DEFAULT '0',
  `cId` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of imooc_pro
-- ----------------------------
INSERT INTO `imooc_pro` VALUES ('3', '电放费', '432432', '400', '100', '88', '很好', '1495157677', '1', '0', '31');
INSERT INTO `imooc_pro` VALUES ('4', '手机', '565', '56', '2000', '1888', '很好', '1495157759', '1', '0', '31');
INSERT INTO `imooc_pro` VALUES ('5', '仍然人托人', '45435', '333', '333', '222', '222', '1495157816', '1', '0', '31');
INSERT INTO `imooc_pro` VALUES ('6', '申达股份', '333324', '222', '222', '111', '34 如果', '1495157837', '1', '0', '31');
INSERT INTO `imooc_pro` VALUES ('7', '一会，好', 't67657', '565', '444', '333', '突然有人提', '1495157870', '1', '0', '32');

-- ----------------------------
-- Table structure for imooc_user
-- ----------------------------
DROP TABLE IF EXISTS `imooc_user`;
CREATE TABLE `imooc_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `sex` enum('保密','女','男') NOT NULL DEFAULT '保密',
  `email` varchar(50) NOT NULL,
  `face` varchar(50) NOT NULL,
  `regTime` int(10) unsigned NOT NULL,
  `activeFlag` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of imooc_user
-- ----------------------------
INSERT INTO `imooc_user` VALUES ('4', '黄很好', '202cb962ac59075b964b07152d234b70', '保密', '1319639755@qq.com', '44f7d436fb41bfa818547f6aae7e680a.jpg', '1495160540', '0');
INSERT INTO `imooc_user` VALUES ('5', 'king', '202cb962ac59075b964b07152d234b70', '保密', '1319639755@qq.com', '215ee51b2bc90d228e851631e4672b7d.jpg', '1495162371', '0');
