-- phpMyAdmin SQL Dump
-- version 3.3.10.5
-- http://www.phpmyadmin.net
--
-- ホスト: mysql607.db.sakura.ne.jp
-- 生成時間: 2016 年 12 月 10 日 03:04
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
-- テーブルの構造 `pre_users`
--

CREATE TABLE IF NOT EXISTS `pre_users` (
  `url_token` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL COMMENT 'FK',
  `reg_flag` tinyint(4) DEFAULT '0' COMMENT '仮登録=>0,登録完了=>1',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータをダンプしています `pre_users`
--

INSERT INTO `pre_users` (`url_token`, `email`, `reg_flag`, `created`) VALUES
('9c24b1f1b4ba07a9abad1294125b67908de0f93dc63c14a006b6a47a3a8fec61', 'tajima1026@gmail.com', 1, '2016-12-09 22:47:41'),
('9d29850be85bee594fd74d49fe03fd335cb5ad2ab77add0f676a12b16e1198ac', 'umaibomentaiaji@gmail.com', 1, '2016-12-09 22:53:36'),
('2592961e575352967393630790d8fe0195be26c95204add5927076b9881f72ec', 'sonofelice0@gmail.com', 1, '2016-12-09 23:43:52'),
('44d8e40db49c872c32542dd625d1c7ff1f2c2f57452d0eb294c4830024d9b852', 'masaaki1915@gmail.com', 1, '2016-12-10 00:16:13'),
('e6d1d08ff26efcc5a3fdc294aa1afe3a9229f13377008876a967d8cce3876bfe', 'bondbinmachy@gmail.com ', 1, '2016-12-10 00:19:39');
