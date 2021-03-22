-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-03-22 01:13:11
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `atami`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `image`
--

CREATE TABLE `image` (
  `ID` int(11) NOT NULL,
  `ID_Restaurant` int(255) NOT NULL,
  `Image_Name` varchar(255) NOT NULL,
  `Image_Type` varchar(255) NOT NULL,
  `Image_Path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `image`
--

INSERT INTO `image` (`ID`, `ID_Restaurant`, `Image_Name`, `Image_Type`, `Image_Path`) VALUES
(135, 173, 'anime.jpg', 'image/jpeg', './uploads_image/anime.jpg'),
(136, 174, 'img_snowtops.jpg', 'image/jpeg', './uploads_image/img_snowtops.jpg'),
(137, 175, 'img_nature_wide.jpg', 'image/jpeg', './uploads_image/img_nature_wide.jpg'),
(138, 176, 'img_snowtops.jpg', 'image/jpeg', './uploads_image/img_snowtops.jpg'),
(139, 176, 'img_snowtops.jpg', 'image/jpeg', './uploads_image/img_snowtops.jpg'),
(140, 176, 'img_snowtops.jpg', 'image/jpeg', './uploads_image/img_snowtops.jpg'),
(141, 177, 'img_snowtops.jpg', 'image/jpeg', './uploads_image/img_snowtops.jpg'),
(142, 177, 'img_snowtops.jpg', 'image/jpeg', './uploads_image/img_snowtops.jpg'),
(143, 177, 'img_snowtops.jpg', 'image/jpeg', './uploads_image/img_snowtops.jpg'),
(144, 178, 'img_snowtops.jpg', 'image/jpeg', './uploads_image/img_snowtops.jpg'),
(145, 178, 'img_snowtops.jpg', 'image/jpeg', './uploads_image/img_snowtops.jpg');

-- --------------------------------------------------------

--
-- テーブルの構造 `qr_code`
--

CREATE TABLE `qr_code` (
  `ID` int(11) NOT NULL,
  `QR_Name` varchar(255) NOT NULL,
  `QR_Type` varchar(255) NOT NULL,
  `QR_Data` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `restaurant`
--

CREATE TABLE `restaurant` (
  `ID` int(11) NOT NULL,
  `Caterogy` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Introduce_cm` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Time_work` varchar(255) NOT NULL,
  `Tel` varchar(255) NOT NULL,
  `Text1` varchar(255) NOT NULL,
  `Text2` varchar(255) NOT NULL,
  `Text3` varchar(255) NOT NULL,
  `Text4` varchar(255) NOT NULL,
  `Text5` varchar(255) NOT NULL,
  `Image` tinyint(10) NOT NULL,
  `QR_1` varchar(255) NOT NULL,
  `QR_2` varchar(255) NOT NULL,
  `Lat` varchar(255) NOT NULL,
  `Log` varchar(255) NOT NULL,
  `Memory` varchar(255) NOT NULL,
  `Date_Memory` date NOT NULL,
  `Flag` varchar(255) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `restaurant`
--

INSERT INTO `restaurant` (`ID`, `Caterogy`, `Name`, `Introduce_cm`, `Address`, `Time_work`, `Tel`, `Text1`, `Text2`, `Text3`, `Text4`, `Text5`, `Image`, `QR_1`, `QR_2`, `Lat`, `Log`, `Memory`, `Date_Memory`, `Flag`, `Date`) VALUES
(175, 'asda', 'Thanh cong va chien thang ', 'dasd', 'asd', 'asd', 'asd', 'as', 'asd', 'asd', 'a', 'dasd', 0, 'dasd', 'dasd', 'd', 'asd', 'das', '2021-03-02', 'asd', '2021-03-20 11:19:13');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ID`);

--
-- テーブルのインデックス `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`ID`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `image`
--
ALTER TABLE `image`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- テーブルの AUTO_INCREMENT `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
