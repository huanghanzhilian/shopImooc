/*
Navicat MySQL Data Transfer

Source Server         : wsm-win-mysq
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : shopimoocs

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-10-13 12:22:26
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of imooc_admin
-- ----------------------------
INSERT INTO `imooc_admin` VALUES ('1', 'admin', '202cb962ac59075b964b07152d234b70', '1319639755@qq.com');
INSERT INTO `imooc_admin` VALUES ('2', 'root', '202cb962ac59075b964b07152d234b70', '123@qq.com');

-- ----------------------------
-- Table structure for imooc_album
-- ----------------------------
DROP TABLE IF EXISTS `imooc_album`;
CREATE TABLE `imooc_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Pid` int(10) unsigned NOT NULL,
  `albumPath` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of imooc_album
-- ----------------------------

-- ----------------------------
-- Table structure for imooc_cate
-- ----------------------------
DROP TABLE IF EXISTS `imooc_cate`;
CREATE TABLE `imooc_cate` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `cName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cName` (`cName`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of imooc_cate
-- ----------------------------
INSERT INTO `imooc_cate` VALUES ('1', '电子产品');

-- ----------------------------
-- Table structure for imooc_pro
-- ----------------------------
DROP TABLE IF EXISTS `imooc_pro`;
CREATE TABLE `imooc_pro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pName` varchar(50) NOT NULL,
  `pSn` varchar(50) NOT NULL,
  `pNum` int(10) unsigned DEFAULT '1',
  `mPrice` decimal(10,2) NOT NULL,
  `iPrice` decimal(10,2) NOT NULL,
  `pDesc` text,
  `pImg` varchar(50) NOT NULL,
  `pubTime` int(10) unsigned NOT NULL,
  `isShow` tinyint(1) DEFAULT '1',
  `isHot` tinyint(1) DEFAULT '0',
  `cId` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pName` (`pName`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of imooc_pro
-- ----------------------------

-- ----------------------------
-- Table structure for imooc_user
-- ----------------------------
DROP TABLE IF EXISTS `imooc_user`;
CREATE TABLE `imooc_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `sex` enum('男','女','保密') NOT NULL DEFAULT '保密',
  `email` varchar(50) NOT NULL,
  `face` varchar(50) NOT NULL,
  `regTime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of imooc_user
-- ----------------------------
INSERT INTO `imooc_user` VALUES ('1', 'huangjipeng', '202cb962ac59075b964b07152d234b70', '男', '123@qq.com', '7aae487fef6dc44d3ca7f5db388dc377.png', '1507868303');
