-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-01-07 14:04:30
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_d07_04`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `diet_table`
--

CREATE TABLE `diet_table` (
  `id` int(12) NOT NULL,
  `weight` int(12) NOT NULL,
  `snack` int(1) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `diet_table`
--

INSERT INTO `diet_table` (`id`, `weight`, `snack`, `created_at`, `updated_at`) VALUES
(43, 50, 1, '2021-01-05', '2021-01-05 15:06:59'),
(44, 55, 1, '2021-01-05', '2021-01-05 15:07:04'),
(45, 70, 1, '2021-01-05', '2021-01-05 15:07:09'),
(46, 44, 1, '2021-01-05', '2021-01-05 15:07:13'),
(47, 56, 1, '2021-01-05', '2021-01-05 15:07:18'),
(48, 80, 1, '2021-01-05', '2021-01-05 15:07:22'),
(49, 55, 0, '2021-01-06', '2021-01-06 00:39:23'),
(50, 44, 0, '2021-01-07', '2021-01-07 10:16:03'),
(51, 70, 1, '2021-01-07', '2021-01-07 12:51:16'),
(52, 80, 1, '2021-01-07', '2021-01-07 12:52:32'),
(53, 50, 0, '2021-01-07', '2021-01-07 21:54:41');

-- --------------------------------------------------------

--
-- テーブルの構造 `kellogg_table`
--

CREATE TABLE `kellogg_table` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `cal` int(11) DEFAULT NULL,
  `fe` int(11) DEFAULT NULL,
  `vit_a` int(11) DEFAULT NULL,
  `vit_b1` int(11) DEFAULT NULL,
  `vit_b2` int(11) DEFAULT NULL,
  `niacin` int(11) DEFAULT NULL,
  `vit_c` int(11) DEFAULT NULL,
  `vit_d` int(11) DEFAULT NULL,
  `color` varchar(11) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `kellogg_table`
--

INSERT INTO `kellogg_table` (`id`, `name`, `cal`, `fe`, `vit_a`, `vit_b1`, `vit_b2`, `niacin`, `vit_c`, `vit_d`, `color`) VALUES
(1, '一般的なパンの朝食', 45, 99, 65, 45, 75, 40, 68, 70, '153,229,255'),
(2, 'コーンフレーク', 155, 180, 140, 135, 225, 100, 155, 205, '255,255,0'),
(3, 'コーンフロスティ', 150, 130, 115, 220, 350, 150, 130, 170, '255,204,255');

-- --------------------------------------------------------

--
-- テーブルの構造 `todo_table`
--

CREATE TABLE `todo_table` (
  `id` int(12) NOT NULL,
  `todo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `todo_table`
--

INSERT INTO `todo_table` (`id`, `todo`, `deadline`, `created_at`, `updated_at`) VALUES
(1, '掃除', '0000-00-00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '掃除', '2020-12-19', '2020-12-19 16:03:43', '2020-12-19 16:03:43'),
(4, 'uuuuu', '2021-01-02', '2020-12-19 17:47:23', '2020-12-19 17:47:23'),
(5, 'aaaaa', '2020-12-20', '2020-12-20 13:40:03', '2020-12-20 13:40:03'),
(6, 'bbbbbbb', '2020-12-20', '2020-12-20 13:41:44', '2020-12-20 13:41:44'),
(7, 'qqqqq', '2020-12-13', '2020-12-20 13:50:25', '2020-12-20 13:50:25'),
(8, 'ppp', '2020-12-21', '2020-12-21 01:02:03', '2020-12-21 01:02:03'),
(9, 'testだよ', '2020-12-21', '2020-12-21 02:03:43', '2020-12-21 02:03:43'),
(10, 'qqqq', '2020-12-01', '2020-12-21 10:53:12', '2020-12-21 10:53:12'),
(11, 'aaaa', '2020-12-01', '2020-12-21 11:01:09', '2020-12-21 11:01:09'),
(12, 'がんばれ', '2020-12-22', '2020-12-21 11:49:16', '2020-12-21 11:49:16'),
(13, 'www', '2020-12-23', '2020-12-23 00:19:12', '2020-12-23 00:19:12'),
(14, 'ttt', '2020-12-24', '2020-12-23 00:19:22', '2020-12-23 00:19:22'),
(15, 'qqq', '2020-12-25', '2020-12-23 00:21:21', '2020-12-23 00:21:21'),
(16, '元旦', '2021-01-01', '2021-01-01 13:39:11', '2021-01-01 13:39:11'),
(17, '元旦', '2021-01-01', '2021-01-01 13:39:38', '2021-01-01 13:39:38');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(12) NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(3, 'erina', 'aaa', 0, 0, '2021-01-02 00:56:52', '2021-01-02 00:56:52'),
(4, '飯澤', 'aaa', 1, 1, '2021-01-05 23:09:48', '2021-01-05 23:09:48');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `diet_table`
--
ALTER TABLE `diet_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `kellogg_table`
--
ALTER TABLE `kellogg_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `todo_table`
--
ALTER TABLE `todo_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `diet_table`
--
ALTER TABLE `diet_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- テーブルの AUTO_INCREMENT `kellogg_table`
--
ALTER TABLE `kellogg_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `todo_table`
--
ALTER TABLE `todo_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
