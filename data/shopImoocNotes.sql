--创建数据库
CREATE DATABASE IF NOT EXISTS `shopimoocs`;
--打开数据库
USE `shopimoocs`;
--创建管理员表
DROP TABLE IF EXISTS `imooc_admin`;
--创建表imooc_admin
CREATE TABLE `imooc_admin`(
`id` tinyint unsigned auto_increment key,
`username` varchar(20) not null unique,
`password` char(32) not null,
`email` varchar(50) not null
);
--创建分类表
DROP TABLE IF EXISTS `imooc_cate`;
CREATE TABALE `imooc_cate`(
`id` smallint unsigned auto_increment key,
`cName` varchar(50) unique
);
--创建商品表
DROP TABLE IF EXISTS `imooc_pro`;
CREATE TABALE `imooc_pro`(
`id` int unsigned auto_increment key,
`pName` varchar(50) not null unique,
`pSn` varchar(50) not null,
`pNum` int unsigned default 1,
`mPrice` decimal(10,2) not null,
`iPrice` decimal(10,2) not null,
`pDesc` test,
`pImg` varchar(50) not null,
`pubTime` int unsigned not null,
`isShow` tinyint(1) default 1,
`isHot` tinyint(1) default 0,
`cId` smallint unsigned not null
);
--用户表
DROP TABLE IF EXISTS `imooc_user`;
CREATE TABALE `imooc_user`(
`id` int unsigned auto_increment key,
`username` varchar(20) not null unique,
`password` char(32) not null,
`sex` enum("男","女","保密") not null default "保密",
`email` varchar(50) not null,
`face` varchar(50) not null,
`regTime` int unsigned not null
);
--相册表
DROP TABLE IF EXISTS `imooc_album`;
CREATE TABALE `imooc_album`(
`id` int unsigned auto_increment key,
`Pid` int unsigned not null,
`albumPath` varchar(50) not null
);