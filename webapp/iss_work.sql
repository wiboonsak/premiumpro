-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Sep 22, 2012 at 03:28 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `iss_work`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_admin_user`
-- 

CREATE TABLE `tbl_admin_user` (
  `id` int(5) NOT NULL auto_increment,
  `admin_name` varchar(30) collate tis620_bin NOT NULL default '',
  `username` varchar(30) collate tis620_bin NOT NULL default '',
  `password` varchar(30) collate tis620_bin NOT NULL default '',
  `adminType` enum('1','2') collate tis620_bin NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 COLLATE=tis620_bin AUTO_INCREMENT=16 ;

-- 
-- Dumping data for table `tbl_admin_user`
-- 

INSERT INTO `tbl_admin_user` VALUES (3, 0x61646d696e, 0x61646d696e, 0x31323334, 0x31);
INSERT INTO `tbl_admin_user` VALUES (12, 0x74657374, 0x74657374, 0x7465737431, 0x32);
INSERT INTO `tbl_admin_user` VALUES (13, 0x76766363, 0x616161616161, 0x616161616161, 0x32);
INSERT INTO `tbl_admin_user` VALUES (14, 0x746573743031, 0x746573743031, 0x31323334, 0x32);
INSERT INTO `tbl_admin_user` VALUES (15, 0x303037, 0x74657374, 0x31323334, 0x32);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_daily_report_detail`
-- 

CREATE TABLE `tbl_daily_report_detail` (
  `id` int(15) NOT NULL auto_increment,
  `headID` int(10) NOT NULL,
  `txtDetail` text NOT NULL,
  `eletric` int(5) NOT NULL,
  `color` int(5) NOT NULL,
  `wood` int(5) NOT NULL,
  `concreat` int(5) NOT NULL,
  `iron` int(5) NOT NULL,
  `worker` int(5) NOT NULL,
  `total` int(10) NOT NULL,
  `log_user_id` varchar(10) NOT NULL,
  `log_user_name` varchar(100) NOT NULL,
  `log_date_time` datetime NOT NULL,
  `log_dotype` varchar(2) NOT NULL COMMENT '1=insert , 2 update',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- 
-- Dumping data for table `tbl_daily_report_detail`
-- 

INSERT INTO `tbl_daily_report_detail` VALUES (6, 3, 'à¸Ÿà¸«à¸”à¸Ÿà¹„à¸³ à¸”à¸Ÿà¹„à¸³à¸” 999+<br>', 1, 0, 2, 3, 2, 1, 9, '2', 'à¸—à¸”à¸ªà¸­à¸š 001', '2012-09-21 17:07:26', '1');
INSERT INTO `tbl_daily_report_detail` VALUES (5, 3, 'Array à¸”à¸Ÿà¹„à¸³ à¸”à¸Ÿà¹„à¸”à¸³\r\n\r\nà¸Ÿ à¹„à¸³à¸”à¸Ÿà¹„à¸³à¸” à¸Ÿà¹„à¸³à¸”', 1, 1, 1, 0, 3, 4, 10, '2', 'à¸—à¸”à¸ªà¸­à¸š 001', '2012-09-21 17:06:38', '1');
INSERT INTO `tbl_daily_report_detail` VALUES (4, 3, '00111à¸Ÿà¸«à¸à¸” à¸Ÿà¸«à¸à¸”à¸Ÿà¸«à¸à¸” à¸Ÿà¸«à¸à¸”à¸Ÿà¸Ÿà¸«à¸” à¸Ÿà¸«<br>', 1, 3, 5, 0, 0, 0, 9, '2', 'à¸—à¸”à¸ªà¸­à¸š 001', '2012-09-21 17:06:09', '1');
INSERT INTO `tbl_daily_report_detail` VALUES (7, 3, '-safasfas dfas<br>', 0, 0, 0, 0, 3, 0, 0, '2', 'à¸—à¸”à¸ªà¸­à¸š 001', '2012-09-21 17:09:57', '1');
INSERT INTO `tbl_daily_report_detail` VALUES (8, 3, 'dsfgsdfgsdf gs<br>', 0, 0, 0, 5, 0, 0, 5, '2', 'à¸—à¸”à¸ªà¸­à¸š 001', '2012-09-21 17:10:24', '1');
INSERT INTO `tbl_daily_report_detail` VALUES (9, 3, '9999', 1, 2, 3, 0, 0, 0, 6, '2', 'à¸—à¸”à¸ªà¸­à¸š 001', '2012-09-21 17:12:34', '1');
INSERT INTO `tbl_daily_report_detail` VALUES (10, 3, 'sadfasdf<div>-asdfasdf as f</div><div>asdf asd fawef</div>', 2, 0, 0, 0, 0, 0, 2, '2', 'à¸—à¸”à¸ªà¸­à¸š 001', '2012-09-21 17:12:47', '1');
INSERT INTO `tbl_daily_report_detail` VALUES (12, 3, 'f adsfasfawef awe<br>', 0, 0, 0, 0, 2, 2, 2, '2', 'à¸—à¸”à¸ªà¸­à¸š 001', '2012-09-21 17:13:04', '1');
INSERT INTO `tbl_daily_report_detail` VALUES (13, 3, 'fawefawef', 0, 3, 0, 0, 0, 0, 3, '2', 'à¸—à¸”à¸ªà¸­à¸š 001', '2012-09-21 17:13:48', '1');
INSERT INTO `tbl_daily_report_detail` VALUES (16, 3, 'à¸«à¸Ÿà¸à¸”à¸Ÿà¸«à¸à¸”à¸Ÿà¸«', 12, 0, 0, 0, 0, 2, 14, '2', 'à¸—à¸”à¸ªà¸­à¸š 001', '2012-09-22 01:26:52', '1');
INSERT INTO `tbl_daily_report_detail` VALUES (17, 4, '-00122222a fasd<div>-asfawef awef aw</div>', 0, 0, 0, 4, 0, 0, 4, '2', 'à¸—à¸”à¸ªà¸­à¸š 001', '2012-09-22 01:32:47', '1');
INSERT INTO `tbl_daily_report_detail` VALUES (18, 4, '-055584444<span class="Apple-tab-span" style="white-space:pre">	</span>', 0, 0, 2, 3, 0, 6, 11, '2', 'à¸—à¸”à¸ªà¸­à¸š 001', '2012-09-22 01:33:00', '1');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_daily_report_head`
-- 

CREATE TABLE `tbl_daily_report_head` (
  `id` int(10) NOT NULL auto_increment,
  `projectID` int(10) NOT NULL,
  `report_date` date NOT NULL,
  `weather_clear_am` enum('0','1') NOT NULL,
  `weather_clear_pm` enum('0','1') NOT NULL,
  `weather_clearsun_am` enum('0','1') NOT NULL,
  `weather_clearsun_pm` enum('0','1') NOT NULL,
  `weather_rain_am` enum('0','1') NOT NULL,
  `weather_rain_pm` enum('0','1') NOT NULL,
  `weather_cloud_am` enum('0','1') NOT NULL,
  `weather_cloud_pm` enum('0','1') NOT NULL,
  `report_name` varchar(100) NOT NULL,
  `report_user_id` varchar(10) NOT NULL,
  `approve_name` varchar(100) NOT NULL,
  `approve_ID` varchar(10) NOT NULL,
  `total` int(5) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `tbl_daily_report_head`
-- 

INSERT INTO `tbl_daily_report_head` VALUES (3, 14, '2012-09-21', '1', '', '1', '1', '', '1', '', '1', 'à¸œà¸¹à¹‰à¸£à¸²à¸¢à¸‡à¸²à¸™à¹‚à¸„à¸£à¸‡à¸à¸²à¸£ 01', '2', 'à¸•à¸£à¸§à¸ˆà¸ªà¸­à¸š 1', 'approve_ID', 0);
INSERT INTO `tbl_daily_report_head` VALUES (4, 14, '2012-09-22', '1', '', '', '1', '', '', '1', '', '556', '2', '899', 'approve_ID', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_emp_user`
-- 

CREATE TABLE `tbl_emp_user` (
  `id` int(5) NOT NULL auto_increment,
  `admin_name` varchar(30) character set utf8 collate utf8_bin NOT NULL,
  `username` varchar(30) collate tis620_bin NOT NULL,
  `password` varchar(100) collate tis620_bin NOT NULL,
  `adminType` enum('1','2') collate tis620_bin NOT NULL default '1',
  `projectID` int(10) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=tis620 COLLATE=tis620_bin AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `tbl_emp_user`
-- 

INSERT INTO `tbl_emp_user` VALUES (2, 0xc3a0c2b8e28094c3a0c2b8e2809dc3a0c2b8c2aac3a0c2b8c2adc3a0c2b8c5a120303031, 0x6131313131, 0x6530373534623364306264313435303163383861393933623232333563333331, 0x32, 0);
INSERT INTO `tbl_emp_user` VALUES (3, 0xc3a0c2b8e28094c3a0c2b8e2809dc3a0c2b8c2aac3a0c2b8c2adc3a0c2b8c5a120303032, 0x6132323232, 0x3831646339626462353264303464633230303336646264383331336564303535, 0x32, 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_menu_user`
-- 

CREATE TABLE `tbl_menu_user` (
  `id` int(10) NOT NULL auto_increment,
  `userID` int(10) NOT NULL,
  `projectID` int(10) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userID` (`userID`,`projectID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- 
-- Dumping data for table `tbl_menu_user`
-- 

INSERT INTO `tbl_menu_user` VALUES (18, 2, 16);
INSERT INTO `tbl_menu_user` VALUES (6, 3, 5);
INSERT INTO `tbl_menu_user` VALUES (16, 2, 5);
INSERT INTO `tbl_menu_user` VALUES (17, 3, 16);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_product_cate`
-- 

CREATE TABLE `tbl_product_cate` (
  `id` int(10) NOT NULL auto_increment,
  `cate_name` text NOT NULL,
  `mainCateId` int(10) NOT NULL,
  `number` int(5) NOT NULL,
  `category_group` int(10) NOT NULL,
  `cate_img` varchar(25) NOT NULL,
  `cate_bg` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

-- 
-- Dumping data for table `tbl_product_cate`
-- 

INSERT INTO `tbl_product_cate` VALUES (14, 'à¹‚à¸„à¸£à¸‡à¸à¸²à¸£ 1', 0, 1, 1, '', '20111230163233.jpg');
INSERT INTO `tbl_product_cate` VALUES (50, 'à¹‚à¸„à¸£à¸‡à¸à¸²à¸£ 2', 0, 4, 1, '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_project_user`
-- 

CREATE TABLE `tbl_project_user` (
  `id` int(10) NOT NULL auto_increment,
  `userID` int(10) NOT NULL,
  `projectID` int(10) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userID` (`userID`,`projectID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Dumping data for table `tbl_project_user`
-- 

INSERT INTO `tbl_project_user` VALUES (4, 2, 14);
INSERT INTO `tbl_project_user` VALUES (7, 3, 50);
INSERT INTO `tbl_project_user` VALUES (8, 3, 14);

-- --------------------------------------------------------

-- 
-- Table structure for table `tbl_work_menu`
-- 

CREATE TABLE `tbl_work_menu` (
  `id` int(10) NOT NULL auto_increment,
  `txtGet` varchar(30) NOT NULL,
  `txtFilename` varchar(50) NOT NULL,
  `menuName` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- 
-- Dumping data for table `tbl_work_menu`
-- 

INSERT INTO `tbl_work_menu` VALUES (5, 'menu02', 'work_dailyreport.php', 'à¸šà¸±à¸™à¸—à¸¶à¸à¸›à¸£à¸°à¸ˆà¸³à¸§à¸±à¸™');
INSERT INTO `tbl_work_menu` VALUES (16, 'menu03', 'show_dailyreport.php', 'à¸£à¸²à¸¢à¸‡à¸²à¸™à¸šà¸±à¸™à¸—à¸¶à¸à¸›à¸£à¸°à¸ˆà¸³à¸§à¸±à¸™');
