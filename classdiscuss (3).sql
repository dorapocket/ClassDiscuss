-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-02-28 13:30:12
-- 服务器版本： 10.1.37-MariaDB
-- PHP 版本： 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `classdiscuss`
--

-- --------------------------------------------------------

--
-- 表的结构 `academy_list`
--

CREATE TABLE `academy_list` (
  `ID` tinyint(11) NOT NULL,
  `Academy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='定义学院表';

--
-- 转存表中的数据 `academy_list`
--

INSERT INTO `academy_list` (`ID`, `Academy`) VALUES
(1, '电子信息学院'),
(2, '自动化学院'),
(3, '通信工程学院'),
(4, '人文与法学院');

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE `class` (
  `ClassID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Code` varchar(20) NOT NULL,
  `ClassTime` varchar(50) NOT NULL,
  `Score` float NOT NULL,
  `Difficulty` float NOT NULL,
  `Gets` float NOT NULL,
  `GiveScore` float NOT NULL,
  `Homework` float NOT NULL,
  `Type` char(15) NOT NULL,
  `School` char(20) NOT NULL,
  `Point` tinyint(4) NOT NULL,
  `TeacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='课程存储数据表';

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`ClassID`, `Name`, `Code`, `ClassTime`, `Score`, `Difficulty`, `Gets`, `GiveScore`, `Homework`, `Type`, `School`, `Point`, `TeacherID`) VALUES
(1, '高等数学A1', 'A0000001', '周五1，2节', 7, 8, 6, 9, 9, '1', '1', 9, 1),
(2, '汽车维修', 'A000000214', '周五3，4节', 10, 2, 7, 4, 10, '2', '1', 8, 2),
(3, '高等数学A1', '1241', '周三5，6节', 6.66667, 6.66667, 6.66667, 6.66667, 6.66667, '2', '2', 2, 2),
(4, '汽车维修', '14134', '周一', 10, 8, 3, 6, 3, '1', '1', 9, 1),
(5, '测试课程1', 'A00000001', '周一1，2节', 4.66667, 5.33333, 5.33333, 5.33333, 5.33333, '1', '2', 7, 4),
(6, '测试课程2', 'A00000002', '周二1，2节', 2, 4, 6, 6, 6, '2', '1', 2, 4),
(7, '爱情社会学', 'x10086', '周四8，9节', 0, 0, 0, 0, 0, '1', '1', 10, 3),
(8, 'C  程序设计', 'A8213323', '周四10，11，12节', 0, 0, 0, 0, 0, '2', '4', 4, 3),
(10, 'C  程序设计', 'A8213323', '周四10，11，12节', 0, 0, 0, 0, 0, '2', '4', 4, 3);

-- --------------------------------------------------------

--
-- 表的结构 `class_ave_calc`
--

CREATE TABLE `class_ave_calc` (
  `ClassID` mediumint(9) NOT NULL,
  `AllScore` mediumint(9) NOT NULL,
  `AllDifficulty` mediumint(9) NOT NULL,
  `AllGets` mediumint(9) NOT NULL,
  `AllGiveScore` mediumint(9) NOT NULL,
  `AllHomework` mediumint(9) NOT NULL,
  `Num` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='汇总并计算课程综合分';

--
-- 转存表中的数据 `class_ave_calc`
--

INSERT INTO `class_ave_calc` (`ClassID`, `AllScore`, `AllDifficulty`, `AllGets`, `AllGiveScore`, `AllHomework`, `Num`) VALUES
(1, 14, 16, 12, 18, 16, 2),
(3, 20, 20, 20, 20, 20, 3),
(5, 14, 16, 16, 16, 16, 3),
(6, 2, 4, 6, 6, 6, 1);

-- --------------------------------------------------------

--
-- 表的结构 `class_commit`
--

CREATE TABLE `class_commit` (
  `CommitID` int(11) NOT NULL,
  `UserID` mediumint(9) NOT NULL,
  `ClassID` mediumint(9) NOT NULL,
  `Score` tinyint(4) NOT NULL,
  `Difficulty` tinyint(4) NOT NULL,
  `Gets` tinyint(4) NOT NULL,
  `GiveScore` tinyint(4) NOT NULL,
  `Homework` tinyint(4) NOT NULL,
  `Text` text NOT NULL,
  `Time` datetime NOT NULL,
  `UserName` char(50) NOT NULL,
  `Anonymous` tinyint(1) NOT NULL DEFAULT '0',
  `Hidden` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='课程评论数据存储';

--
-- 转存表中的数据 `class_commit`
--

INSERT INTO `class_commit` (`CommitID`, `UserID`, `ClassID`, `Score`, `Difficulty`, `Gets`, `GiveScore`, `Homework`, `Text`, `Time`, `UserName`, `Anonymous`, `Hidden`) VALUES
(24, 1, 3, 10, 10, 10, 10, 10, 'yey', '2019-02-21 09:51:13', 'lgy', 0, 0),
(25, 2, 3, 6, 6, 6, 6, 6, 'buzadi', '2019-02-21 09:52:10', 'classdiscuss', 1, 0),
(26, 4, 3, 4, 4, 4, 4, 4, 'dedew', '2019-02-21 09:55:17', 'lgy2', 0, 0),
(27, 2, 1, 4, 6, 2, 8, 6, '杨文宇太强了啊', '2019-02-24 17:29:45', 'classdiscuss', 0, 0),
(28, 5, 1, 10, 10, 10, 10, 10, '李国宇太强了‘', '2019-02-24 17:32:19', '李国宇太强了', 1, 1),
(30, 2, 5, 6, 6, 6, 6, 6, '99', '2019-02-27 21:45:04', 'classdiscuss', 0, 0),
(31, 1, 5, 2, 4, 4, 4, 4, '980', '2019-02-27 21:45:37', 'lgy', 0, 0),
(32, 1, 6, 2, 4, 6, 6, 6, '768', '2019-02-27 21:47:57', 'lgy', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `collection_table`
--

CREATE TABLE `collection_table` (
  `CID` int(11) NOT NULL,
  `UserID` mediumint(9) NOT NULL,
  `ClassID` mediumint(9) NOT NULL,
  `isSet` tinyint(1) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户收藏表';

-- --------------------------------------------------------

--
-- 表的结构 `dislike_table`
--

CREATE TABLE `dislike_table` (
  `DisLikeID` int(11) NOT NULL,
  `UserID` mediumint(9) NOT NULL,
  `ClassID` mediumint(9) NOT NULL,
  `isSet` tinyint(1) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `dislike_table`
--

INSERT INTO `dislike_table` (`DisLikeID`, `UserID`, `ClassID`, `isSet`, `Time`) VALUES
(2, 1, 2, 0, '2019-02-17 12:50:57');

-- --------------------------------------------------------

--
-- 表的结构 `emailverifycode`
--

CREATE TABLE `emailverifycode` (
  `Email` varchar(320) NOT NULL,
  `Code` mediumint(9) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isVerify` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用于验证注册邮箱';

--
-- 转存表中的数据 `emailverifycode`
--

INSERT INTO `emailverifycode` (`Email`, `Code`, `Time`, `isVerify`) VALUES
('787878@hfue.com', 100766, '2019-02-17 14:42:36', 0),
('993549790@qq.com', 349681, '2019-02-21 02:05:21', 0),
('nawmutoh@www.bccto.me', 405597, '2019-02-21 02:06:38', 0);

-- --------------------------------------------------------

--
-- 表的结构 `jb_table`
--

CREATE TABLE `jb_table` (
  `JBID` int(11) NOT NULL,
  `UserID` mediumint(9) NOT NULL,
  `CommitID` int(11) NOT NULL,
  `Time` datetime NOT NULL,
  `Deal` tinyint(1) NOT NULL DEFAULT '0',
  `DealTime` datetime NOT NULL,
  `DealReason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论被举报信息表';

--
-- 转存表中的数据 `jb_table`
--

INSERT INTO `jb_table` (`JBID`, `UserID`, `CommitID`, `Time`, `Deal`, `DealTime`, `DealReason`) VALUES
(1, 2, 1, '2019-02-15 19:38:35', 0, '0000-00-00 00:00:00', ''),
(2, 2, 2, '2019-02-15 19:39:13', 0, '0000-00-00 00:00:00', ''),
(3, 1, 11, '2019-02-17 13:47:38', 0, '0000-00-00 00:00:00', ''),
(4, 1, 14, '2019-02-17 22:37:47', 0, '0000-00-00 00:00:00', ''),
(5, 1, 32, '2019-02-27 22:01:57', 0, '0000-00-00 00:00:00', ''),
(6, 1, 31, '2019-02-27 22:02:05', 0, '0000-00-00 00:00:00', ''),
(7, 1, 30, '2019-02-27 22:02:08', 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- 表的结构 `like_table`
--

CREATE TABLE `like_table` (
  `LikeID` int(11) NOT NULL,
  `UserID` mediumint(9) NOT NULL,
  `ClassID` mediumint(9) NOT NULL,
  `isSet` tinyint(1) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户点赞表';

--
-- 转存表中的数据 `like_table`
--

INSERT INTO `like_table` (`LikeID`, `UserID`, `ClassID`, `isSet`, `Time`) VALUES
(1, 1, 2, 0, '2019-02-22 22:49:47'),
(2, 1, 1, 0, '2019-02-17 22:36:32'),
(3, 1, 3, 0, '2019-02-21 09:48:46'),
(4, 2, 1, 0, '2019-02-24 17:29:20');

-- --------------------------------------------------------

--
-- 表的结构 `teacher`
--

CREATE TABLE `teacher` (
  `TeacherID` int(11) NOT NULL,
  `TeacherName` varchar(5) NOT NULL,
  `TeacherSchool` tinyint(4) NOT NULL,
  `Score` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='教师信息总表';

--
-- 转存表中的数据 `teacher`
--

INSERT INTO `teacher` (`TeacherID`, `TeacherName`, `TeacherSchool`, `Score`) VALUES
(1, '李国宇', 1, 3.14159),
(2, '略略略', 3, 8.87542),
(3, '章天杰', 2, 10),
(4, '大神', 1, 3.33333);

-- --------------------------------------------------------

--
-- 表的结构 `teacher_ave_calc`
--

CREATE TABLE `teacher_ave_calc` (
  `TeacherID` mediumint(9) NOT NULL,
  `AllScore` int(11) NOT NULL,
  `Num` mediumint(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teacher_ave_calc`
--

INSERT INTO `teacher_ave_calc` (`TeacherID`, `AllScore`, `Num`) VALUES
(4, 10, 3);

-- --------------------------------------------------------

--
-- 表的结构 `type_list`
--

CREATE TABLE `type_list` (
  `ID` tinyint(4) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `type_list`
--

INSERT INTO `type_list` (`ID`, `Type`) VALUES
(1, '必修课'),
(2, '选修课');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `UserID` mediumint(9) NOT NULL,
  `UserName` char(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` char(200) NOT NULL,
  `Admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户数据表';

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`, `Email`, `Admin`) VALUES
(1, 'lgy', 'b7266de79b781f3a62115e522025b0f1', '993549790@qq.com', 0),
(2, 'classdiscuss', '858e9e1ba82ad32ca3437f325bd906e8', 'nawmutoh@www.bccto.me', 1),
(3, '哈哈哈', '11', '782176@qq.com', 0),
(4, 'lgy2', '3ad6a5553fda7daf605de2b8bcd59a3b', '993549790@qq.com', 0);

--
-- 转储表的索引
--

--
-- 表的索引 `academy_list`
--
ALTER TABLE `academy_list`
  ADD PRIMARY KEY (`ID`);

--
-- 表的索引 `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassID`),
  ADD KEY `Class_Teacher` (`TeacherID`);

--
-- 表的索引 `class_ave_calc`
--
ALTER TABLE `class_ave_calc`
  ADD PRIMARY KEY (`ClassID`);

--
-- 表的索引 `class_commit`
--
ALTER TABLE `class_commit`
  ADD PRIMARY KEY (`CommitID`);

--
-- 表的索引 `collection_table`
--
ALTER TABLE `collection_table`
  ADD PRIMARY KEY (`CID`);

--
-- 表的索引 `dislike_table`
--
ALTER TABLE `dislike_table`
  ADD PRIMARY KEY (`DisLikeID`);

--
-- 表的索引 `jb_table`
--
ALTER TABLE `jb_table`
  ADD PRIMARY KEY (`JBID`);

--
-- 表的索引 `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`LikeID`);

--
-- 表的索引 `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`TeacherID`);

--
-- 表的索引 `teacher_ave_calc`
--
ALTER TABLE `teacher_ave_calc`
  ADD PRIMARY KEY (`TeacherID`);

--
-- 表的索引 `type_list`
--
ALTER TABLE `type_list`
  ADD PRIMARY KEY (`ID`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `academy_list`
--
ALTER TABLE `academy_list`
  MODIFY `ID` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `class`
--
ALTER TABLE `class`
  MODIFY `ClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用表AUTO_INCREMENT `class_commit`
--
ALTER TABLE `class_commit`
  MODIFY `CommitID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- 使用表AUTO_INCREMENT `collection_table`
--
ALTER TABLE `collection_table`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `dislike_table`
--
ALTER TABLE `dislike_table`
  MODIFY `DisLikeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `jb_table`
--
ALTER TABLE `jb_table`
  MODIFY `JBID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `like_table`
--
ALTER TABLE `like_table`
  MODIFY `LikeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `teacher`
--
ALTER TABLE `teacher`
  MODIFY `TeacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `type_list`
--
ALTER TABLE `type_list`
  MODIFY `ID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `UserID` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
