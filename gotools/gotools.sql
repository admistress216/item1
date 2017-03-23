-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1:3306
-- 生成日期: 2009 年 10 月 07 日 10:38
-- 服务器版本: 5.1.28
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `gotools`
--

-- --------------------------------------------------------

--
-- 表的结构 `wit_admin`
--

CREATE TABLE IF NOT EXISTS `wit_admin` (
  `adm_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `userflag` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`adm_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=3 ;

--
-- 导出表中的数据 `wit_admin`
--

INSERT INTO `wit_admin` (`adm_id`, `username`, `password`, `userflag`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- 表的结构 `wit_article`
--

CREATE TABLE IF NOT EXISTS `wit_article` (
  `article_id` int(6) NOT NULL AUTO_INCREMENT COMMENT '内容id',
  `article_channel` int(6) NOT NULL DEFAULT '0' COMMENT '频道ID',
  `article_title` varchar(255) NOT NULL COMMENT '标题',
  `article_intro` varchar(255) DEFAULT NULL COMMENT '简介描述',
  `article_authors` varchar(255) DEFAULT NULL COMMENT '作者来源',
  `article_content` text COMMENT '详细内容',
  `article_date` datetime NOT NULL COMMENT '日期时间',
  `article_url` varchar(255) DEFAULT NULL COMMENT '地址链接',
  `article_imgurl` varchar(255) DEFAULT NULL COMMENT '图片链接',
  `article_keyword` varchar(255) DEFAULT NULL COMMENT '关键字',
  `article_click` int(6) NOT NULL DEFAULT '0' COMMENT '点击次数',
  `article_top` int(6) NOT NULL DEFAULT '0' COMMENT '推荐级别',
  `article_comment` int(6) NOT NULL DEFAULT '0' COMMENT '评论ID',
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='内容表' AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `wit_article`
--

INSERT INTO `wit_article` (`article_id`, `article_channel`, `article_title`, `article_intro`, `article_authors`, `article_content`, `article_date`, `article_url`, `article_imgurl`, `article_keyword`, `article_click`, `article_top`, `article_comment`) VALUES
(1, 18, 'alexa排名查询', 'alexa排名查询', NULL, '', '0000-00-00 00:00:00', 'http://www.laii.cn/tools/alexa/xx.php', 'tools-icons-1 tools-icon-51', '', 0, 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wit_channel`
--

CREATE TABLE IF NOT EXISTS `wit_channel` (
  `channel_id` int(6) NOT NULL AUTO_INCREMENT COMMENT '频道ID',
  `channel_name` varchar(255) NOT NULL COMMENT '频道名字',
  PRIMARY KEY (`channel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='频道表' AUTO_INCREMENT=19 ;

--
-- 导出表中的数据 `wit_channel`
--

INSERT INTO `wit_channel` (`channel_id`, `channel_name`) VALUES
(18, '站长工具');

-- --------------------------------------------------------

--
-- 表的结构 `wit_comment`
--

CREATE TABLE IF NOT EXISTS `wit_comment` (
  `comment_id` int(6) NOT NULL AUTO_INCREMENT COMMENT '评论ID',
  `comment_authors` varchar(255) DEFAULT NULL COMMENT '作者',
  `comment_content` varchar(255) DEFAULT NULL COMMENT '内容',
  `comment_time` datetime NOT NULL COMMENT '评论时间',
  `comment_ip` varchar(12) NOT NULL COMMENT '评论ip',
  `comment_articleid` int(6) NOT NULL COMMENT '匹配文章ID',
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `wit_comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `wit_system`
--

CREATE TABLE IF NOT EXISTS `wit_system` (
  `system_id` int(4) NOT NULL AUTO_INCREMENT COMMENT '系统ID',
  `system_web` varchar(255) NOT NULL COMMENT '网站名称',
  `system_url` varchar(255) NOT NULL COMMENT '网站地址',
  `system_key` varchar(255) NOT NULL COMMENT '关键字',
  `system_description` varchar(255) NOT NULL COMMENT '网站描述',
  `system_copyright` varchar(255) NOT NULL COMMENT '版权信息',
  `system_icp` varchar(255) NOT NULL COMMENT '备案编号',
  PRIMARY KEY (`system_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 导出表中的数据 `wit_system`
--

INSERT INTO `wit_system` (`system_id`, `system_web`, `system_url`, `system_key`, `system_description`, `system_copyright`, `system_icp`) VALUES
(1, 'GO在线工具箱', 'http://www.laii.cn', '', 'GO在线工具箱', 'Copyright © 2009 Go.com All Rights Reserved ', '京icp888888');
