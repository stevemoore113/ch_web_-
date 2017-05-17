-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-04-05 16:56:42
-- 伺服器版本: 10.1.19-MariaDB
-- PHP 版本： 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ccei`
--

-- --------------------------------------------------------

--
-- 資料表結構 `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `s_username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `s_sex` enum('男','女') COLLATE utf8_unicode_ci NOT NULL,
  `s_birthday` date NOT NULL,
  `s_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `s_phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `s_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `s_high` float NOT NULL,
  `s_weight` float NOT NULL,
  `s_teacher` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `s_statue` enum('in','out') COLLATE utf8_unicode_ci NOT NULL,
  `s_school` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `s_grade` enum('一','二','三') COLLATE utf8_unicode_ci NOT NULL,
  `s_class` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `s_obstacle` set('智能障礙','視覺障礙','聽覺障礙','身體病弱','嚴重情緒障礙','學習障礙') COLLATE utf8_unicode_ci NOT NULL,
  `s_text` text COLLATE utf8_unicode_ci NOT NULL,
  `s_jointime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
