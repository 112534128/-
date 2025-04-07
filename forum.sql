-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-04-07 10:52:26
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `forum`
--

-- --------------------------------------------------------

--
-- 資料表結構 `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `text` text NOT NULL,
  `acc` varchar(20) NOT NULL,
  `is_announcement` tinyint(1) NOT NULL,
  `addtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `uptime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `text`, `acc`, `is_announcement`, `addtime`, `uptime`) VALUES
(1, '注意文章用詞', '近期XXXXXXXXXXXXXXXXX', '管理員', 1, '2025-04-03 04:21:46', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `acc` varchar(15) NOT NULL,
  `title` varchar(15) NOT NULL,
  `text` text NOT NULL,
  `img` text NOT NULL,
  `addtime` datetime NOT NULL,
  `uptime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `msg`
--

INSERT INTO `msg` (`id`, `acc`, `title`, `text`, `img`, `addtime`, `uptime`) VALUES
(3, 'u1', '0000', '222888', 'img/20240807_111915.jpg', '2025-03-17 15:39:59', '2025-04-03 14:19:59'),
(5, 'u3', 'abc', 'dfrffc', 'img/20240729_130615.jpg', '2025-03-17 16:00:04', NULL),
(8, 'u1', '12345', 'ghjjj', 'img/20240807_110054 (1).jpg', '2025-03-20 13:50:49', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `acc` varchar(15) NOT NULL,
  `pwd` varchar(15) NOT NULL,
  `type` varchar(2) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `acc`, `pwd`, `type`, `avatar`) VALUES
(1, 'u1', '1234', 'u', 'uploads/avatars/avatar_67f38ba4eea92.jpg'),
(2, 'u2', '1234', 'u', 'uploads/avatars/avatar_67f39201ab0ce.jpg'),
(4, 'u3', '1234', 'u', NULL),
(5, 'admin', '1234', 'a', NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
