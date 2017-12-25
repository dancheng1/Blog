/*
SQLyog 企业版 - MySQL GUI v8.14 
MySQL - 5.5.24-log : Database - iblog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`iblog` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `iblog`;

/*Table structure for table `tp_admin` */

DROP TABLE IF EXISTS `tp_admin`;

CREATE TABLE `tp_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL COMMENT '管理员名称',
  `password` char(32) DEFAULT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `tp_admin` */

insert  into `tp_admin`(`id`,`username`,`password`) values (1,'dancheng1','e10adc3949ba59abbe56e057f20f883e'),(2,'dancheng','e10adc3949ba59abbe56e057f20f883e'),(3,'lisi','e10adc3949ba59abbe56e057f20f883e'),(5,'dancheng2','e10adc3949ba59abbe56e057f20f883e'),(6,'dancheng3','e10adc3949ba59abbe56e057f20f883e'),(7,'first','e10adc3949ba59abbe56e057f20f883e');

/*Table structure for table `tp_article` */

DROP TABLE IF EXISTS `tp_article`;

CREATE TABLE `tp_article` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(60) DEFAULT NULL COMMENT '文章标题',
  `author` varchar(30) DEFAULT NULL COMMENT '文章作者',
  `desc` varchar(255) DEFAULT NULL COMMENT '文章简介',
  `keywords` varchar(255) DEFAULT NULL COMMENT '文章关键词',
  `content` text COMMENT '文章内容',
  `pic` varchar(100) DEFAULT NULL COMMENT '缩略图',
  `click` int(10) DEFAULT '0' COMMENT '点击数',
  `state` tinyint(1) DEFAULT '0' COMMENT '1:推荐 0：不推荐',
  `time` int(10) DEFAULT NULL COMMENT '发布时间',
  `cateid` mediumint(9) DEFAULT NULL COMMENT '所属栏目',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tp_article` */

insert  into `tp_article`(`id`,`title`,`author`,`desc`,`keywords`,`content`,`pic`,`click`,`state`,`time`,`cateid`) values (1,'1','23','4','3','<p>1<br/></p>',NULL,4,0,1514040390,2),(2,'12132','21312','3123123','312312','<p><img src=\"/ueditor/php/upload/image/20171223/1514040519849232.png\" title=\"1514040519849232.png\" alt=\"数据库设计.png\"/></p>','/uploads/20171224\\7a0aa9c1fdbdeff930b0f17090be661a.gif',10,0,1514040539,3),(4,'第一篇文章','dancheng','哈哈','dancheng','<p>哈哈哈哈哈啊</p><pre class=\"brush:diff;toolbar:false\">谁打的去</pre><p><br/></p>','/uploads/20171224\\cba426f10c6c78d5e565ce8ffa36ea88.png',9,0,1514042156,2),(5,'数据结构于算法','dancheng','数据结构于算法','数据结构,算法','<p>大大大大</p><pre class=\"brush:cpp;toolbar:false\">#include&nbsp;&lt;stdio.h&gt;\r\nint&nbsp;main(){\r\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;0;\r\n}</pre><p><br/></p>','/uploads/20171224\\b84d9137a7fc12004e65ecf9a2db1d0f.png',10,1,1514098763,2),(6,'数据库设计','dancheng','数据库设计','数据库,设计','<p>sada</p><pre class=\"brush:sql;toolbar:false\">selece&nbsp;*&nbsp;from&nbsp;where&nbsp;id&nbsp;=&nbsp;1;</pre><p><br/></p>','/uploads/20171224\\ebf7ee2cff4f6aa5cadcee1ee2ced44e.png',5,0,1514098817,2);

/*Table structure for table `tp_cate` */

DROP TABLE IF EXISTS `tp_cate`;

CREATE TABLE `tp_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `catename` varchar(30) DEFAULT NULL COMMENT '栏目名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `tp_cate` */

insert  into `tp_cate`(`id`,`catename`) values (1,'java'),(2,'php'),(3,'算法'),(4,'aaaa'),(6,'cccc'),(7,'dddd');

/*Table structure for table `tp_links` */

DROP TABLE IF EXISTS `tp_links`;

CREATE TABLE `tp_links` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '链接id',
  `title` varchar(30) DEFAULT NULL COMMENT '链接标题',
  `url` varchar(60) DEFAULT NULL COMMENT '链接地址',
  `desc` varchar(255) DEFAULT NULL COMMENT '链接说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tp_links` */

insert  into `tp_links`(`id`,`title`,`url`,`desc`) values (1,'百度','http://www.baidu.com','百度'),(2,'搜狐','http://www.souhu.com','搜狐'),(5,'dancheng','http://www.dancheng1.com','博主自己的\r\n                                                                ');

/*Table structure for table `tp_tags` */

DROP TABLE IF EXISTS `tp_tags`;

CREATE TABLE `tp_tags` (
  `id` mediumint(9) DEFAULT NULL COMMENT 'tag标签id',
  `tagname` varchar(30) DEFAULT NULL COMMENT 'tag标签名称'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tp_tags` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
