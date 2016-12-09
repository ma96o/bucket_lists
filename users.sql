-- phpMyAdmin SQL Dump
-- version 3.3.10.5
-- http://www.phpmyadmin.net
--
-- ホスト: mysql607.db.sakura.ne.jp
-- 生成時間: 2016 年 12 月 10 日 03:00
-- サーバのバージョン: 5.5.53
-- PHP のバージョン: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `bucket-list_1`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'FK',
  `nick_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL COMMENT 'FK',
  `password` varchar(255) NOT NULL,
  `picture_path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- テーブルのデータをダンプしています `users`
--

INSERT INTO `users` (`user_id`, `nick_name`, `email`, `password`, `picture_path`, `description`, `created`, `modified`) VALUES
(12, 'ryota1026', 'tajima1026@gmail.com', '03044791ae5906b6c59c99f385d05f1354940787', '', '', '2016-12-09 22:48:36', '2016-12-09 22:48:36'),
(14, 'umaibomentaiaji', 'umaibomentaiaji@gmail.com', '734503228ce9a13bb0f60d34f0ac370eb9b7b902', '', '', '2016-12-09 23:41:54', '2016-12-09 23:41:54'),
(15, 'michy', 'sonofelice0@gmail.com', '7f8280a1f84571c602fb9ff05f8bde8f26f5a913', '', '', '2016-12-09 23:48:13', '2016-12-09 23:48:13'),
(16, 'masaaki1915', 'masaaki1915@gmail.com', 'fbb58995031992a3b411d3be9576cf15f40ebb4a', '', '', '2016-12-10 00:18:13', '2016-12-10 00:18:13'),
(17, 'macky666', 'bondbinmachy@gmail.com ', '6e67f74b7fe0b38cf201570297957876022dae4f', '', '', '2016-12-10 00:21:42', '2016-12-10 00:21:42');
