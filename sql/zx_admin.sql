-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2016-06-18 18:48:10
-- 服务器版本： 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zx_admin`
--

-- --------------------------------------------------------

--
-- 表的结构 `zx_admin`
--

CREATE TABLE `zx_admin` (
  `id` mediumint(6) UNSIGNED NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `realname` varchar(50) NOT NULL DEFAULT '',
  `ip` varchar(15) DEFAULT NULL,
  `add_time` int(10) DEFAULT NULL,
  `last_time` int(10) UNSIGNED DEFAULT '0',
  `roleid` smallint(5) DEFAULT '0',
  `disabled` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `zx_admin`
--

INSERT INTO `zx_admin` (`id`, `username`, `password`, `email`, `realname`, `ip`, `add_time`, `last_time`, `roleid`, `disabled`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '5552123@qq.com', '杜振训', '127.0.0.1', 1466236420, 1466245552, 1, 0),
(2, 'test', '05a671c66aefea124cc08b76ea6d30bb', 'test@test.com', '测试用户', '111.161.31.138', 1421030094, 1423040868, 2, 0);

-- --------------------------------------------------------

--
-- 表的结构 `zx_admin_log`
--

CREATE TABLE `zx_admin_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` varchar(20) NOT NULL,
  `action` varchar(20) NOT NULL,
  `data` mediumtext NOT NULL,
  `uid` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `ip` varchar(15) NOT NULL,
  `add_time` int(10) DEFAULT NULL,
  `querystring` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `zx_admin_log`
--

INSERT INTO `zx_admin_log` (`id`, `file`, `action`, `data`, `uid`, `ip`, `add_time`, `querystring`) VALUES
(1, 'Admin', 'admin_log', '', 1, '127.0.0.1', 1466237865, '/git/zxAdmin/admin.php?m=Admin&a=admin_log'),
(2, 'Cache', 'clear_file', '', 1, '127.0.0.1', 1466237980, '/git/zxAdmin/admin.php?m=Cache&a=clear_file'),
(3, 'Cache', 'clear_file', '', 1, '127.0.0.1', 1466238010, '/git/zxAdmin/admin.php?m=Cache&a=clear_file'),
(4, 'Cache', 'clear_file', '', 1, '127.0.0.1', 1466238017, '/git/zxAdmin/admin.php?m=Cache&a=clear_file'),
(5, 'Node', 'index', '', 1, '127.0.0.1', 1466238024, '/git/zxAdmin/admin.php?m=Node&a=index'),
(6, 'Node', 'index', '', 1, '127.0.0.1', 1466238024, '/git/zxAdmin/admin.php?m=Node&a=index'),
(7, 'System', 'index', '', 1, '127.0.0.1', 1466238028, '/git/zxAdmin/admin.php?m=System&a=index'),
(8, 'Node', 'index', '', 1, '127.0.0.1', 1466238216, '/git/zxAdmin/admin.php?m=Node&a=index'),
(9, 'Cache', 'clear_file', '', 1, '127.0.0.1', 1466238219, '/git/zxAdmin/admin.php?m=Cache&a=clear_file'),
(10, 'Cache', 'list_mem', '', 1, '127.0.0.1', 1466238226, '/git/zxAdmin/admin.php?m=Cache&a=list_mem'),
(11, 'Admin', 'admin_log', '', 1, '127.0.0.1', 1466238226, '/git/zxAdmin/admin.php?m=Admin&a=admin_log'),
(12, 'Cache', 'list_mem', '', 1, '127.0.0.1', 1466238230, '/git/zxAdmin/admin.php?m=Cache&a=list_mem'),
(13, 'System', 'index', '', 1, '127.0.0.1', 1466238234, '/git/zxAdmin/admin.php?m=System&a=index'),
(14, 'System', 'index', '', 1, '127.0.0.1', 1466238294, '/git/zxAdmin/admin.php?m=System&a=index'),
(15, 'Admin', 'public_edit_info', '', 1, '127.0.0.1', 1466245716, '/git/zxAdmin/admin.php?m=Admin&a=public_edit_info'),
(16, 'Admin', 'public_edit_pwd', '', 1, '127.0.0.1', 1466245717, '/git/zxAdmin/admin.php?m=Admin&a=public_edit_pwd'),
(17, 'Admin', 'index', '', 1, '127.0.0.1', 1466245726, '/git/zxAdmin/admin.php?m=Admin&a=index'),
(18, 'Role', 'index', '', 1, '127.0.0.1', 1466245727, '/git/zxAdmin/admin.php?m=Role&a=index'),
(19, 'Node', 'index', '', 1, '127.0.0.1', 1466245729, '/git/zxAdmin/admin.php?m=Node&a=index'),
(20, 'Node', 'del', '&id=54', 1, '127.0.0.1', 1466245740, '/git/zxAdmin/admin.php?m=Node&a=del&id=54'),
(21, 'Node', 'index', '', 1, '127.0.0.1', 1466245741, '/git/zxAdmin/admin.php?m=Node&a=index'),
(22, 'Node', 'del', '&id=6', 1, '127.0.0.1', 1466245747, '/git/zxAdmin/admin.php?m=Node&a=del&id=6'),
(23, 'Node', 'index', '', 1, '127.0.0.1', 1466245748, '/git/zxAdmin/admin.php?m=Node&a=index'),
(24, 'Node', 'index', '', 1, '127.0.0.1', 1466245750, '/git/zxAdmin/admin.php?m=Node&a=index'),
(25, 'Admin', 'admin_log', '', 1, '127.0.0.1', 1466245751, '/git/zxAdmin/admin.php?m=Admin&a=admin_log'),
(26, 'System', 'index', '', 1, '127.0.0.1', 1466245752, '/git/zxAdmin/admin.php?m=System&a=index'),
(27, 'System', 'index', '', 1, '127.0.0.1', 1466245787, '/git/zxAdmin/admin.php?m=System&a=index'),
(28, 'System', 'index', '', 1, '127.0.0.1', 1466245788, '/git/zxAdmin/admin.php?m=System'),
(29, 'Admin', 'admin_log', '', 1, '127.0.0.1', 1466245799, '/git/zxAdmin/admin.php?m=Admin&a=admin_log'),
(30, 'Node', 'index', '', 1, '127.0.0.1', 1466245800, '/git/zxAdmin/admin.php?m=Node&a=index'),
(31, 'Admin', 'admin_log', '', 1, '127.0.0.1', 1466245809, '/git/zxAdmin/admin.php?m=Admin&a=admin_log'),
(32, 'Node', 'index', '', 1, '127.0.0.1', 1466245813, '/git/zxAdmin/admin.php?m=Node&a=index'),
(33, 'Admin', 'index', '', 1, '127.0.0.1', 1466245815, '/git/zxAdmin/admin.php?m=Admin&a=index'),
(34, 'Role', 'index', '', 1, '127.0.0.1', 1466245817, '/git/zxAdmin/admin.php?m=Role&a=index'),
(35, 'Role', 'add', '&id=2', 1, '127.0.0.1', 1466245819, '/git/zxAdmin/admin.php?m=Role&a=add&id=2'),
(36, 'Admin', 'public_edit_info', '', 1, '127.0.0.1', 1466245827, '/git/zxAdmin/admin.php?m=Admin&a=public_edit_info'),
(37, 'Admin', 'public_edit_pwd', '', 1, '127.0.0.1', 1466245827, '/git/zxAdmin/admin.php?m=Admin&a=public_edit_pwd'),
(38, 'Node', 'index', '', 1, '127.0.0.1', 1466245832, '/git/zxAdmin/admin.php?m=Node&a=index'),
(39, 'Node', 'add', '', 1, '127.0.0.1', 1466245835, '/git/zxAdmin/admin.php?m=Node&a=add'),
(40, 'Node', 'add', '', 1, '127.0.0.1', 1466245915, '/git/zxAdmin/admin.php?m=Node&a=add'),
(41, 'Node', 'index', '', 1, '127.0.0.1', 1466246451, '/git/zxAdmin/admin.php?m=Node&a=index'),
(42, 'Admin', 'admin_log', '', 1, '127.0.0.1', 1466246452, '/git/zxAdmin/admin.php?m=Admin&a=admin_log'),
(43, 'System', 'index', '', 1, '127.0.0.1', 1466246454, '/git/zxAdmin/admin.php?m=System&a=index'),
(44, 'System', 'index', '', 1, '127.0.0.1', 1466246455, '/git/zxAdmin/admin.php?m=System&a=index'),
(45, 'System', 'index', '', 1, '127.0.0.1', 1466246456, '/git/zxAdmin/admin.php?m=System'),
(46, 'Admin', 'public_edit_info', '', 1, '127.0.0.1', 1466246458, '/git/zxAdmin/admin.php?m=Admin&a=public_edit_info'),
(47, 'Admin', 'public_edit_pwd', '', 1, '127.0.0.1', 1466246459, '/git/zxAdmin/admin.php?m=Admin&a=public_edit_pwd'),
(48, 'Admin', 'index', '', 1, '127.0.0.1', 1466246463, '/git/zxAdmin/admin.php?m=Admin&a=index'),
(49, 'Role', 'index', '', 1, '127.0.0.1', 1466246464, '/git/zxAdmin/admin.php?m=Role&a=index'),
(50, 'Role', 'index', '', 1, '127.0.0.1', 1466246464, '/git/zxAdmin/admin.php?m=Role&a=index'),
(51, 'Node', 'index', '', 1, '127.0.0.1', 1466246466, '/git/zxAdmin/admin.php?m=Node&a=index'),
(52, 'Node', 'add', '', 1, '127.0.0.1', 1466246468, '/git/zxAdmin/admin.php?m=Node&a=add'),
(53, 'Node', 'add', '', 1, '127.0.0.1', 1466246473, '/git/zxAdmin/admin.php?m=Node&a=add'),
(54, 'Node', 'index', '', 1, '127.0.0.1', 1466246474, '/git/zxAdmin/admin.php?m=Node'),
(55, 'Node', 'add', '&pid=84', 1, '127.0.0.1', 1466246477, '/git/zxAdmin/admin.php?m=Node&a=add&pid=84'),
(56, 'Node', 'add', '&id=84&pid=0', 1, '127.0.0.1', 1466246481, '/git/zxAdmin/admin.php?m=Node&a=add&id=84&pid=0'),
(57, 'Node', 'add', '&id=84&pid=0', 1, '127.0.0.1', 1466246483, '/git/zxAdmin/admin.php?m=Node&a=add&id=84&pid=0'),
(58, 'Node', 'index', '', 1, '127.0.0.1', 1466246484, '/git/zxAdmin/admin.php?m=Node'),
(59, 'Node', 'del', '&id=84', 1, '127.0.0.1', 1466246493, '/git/zxAdmin/admin.php?m=Node&a=del&id=84'),
(60, 'Node', 'index', '', 1, '127.0.0.1', 1466246494, '/git/zxAdmin/admin.php?m=Node'),
(61, 'Node', 'index', '', 1, '127.0.0.1', 1466246815, '/git/zxAdmin/admin.php?m=Node'),
(62, 'Node', 'index', '', 1, '127.0.0.1', 1466246824, '/git/zxAdmin/admin.php?m=Node&a=index');

-- --------------------------------------------------------

--
-- 表的结构 `zx_help`
--

CREATE TABLE `zx_help` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `msg` text,
  `add_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `zx_help`
--

INSERT INTO `zx_help` (`id`, `title`, `msg`, `add_time`) VALUES
(10, '1.怎样修改个人资料？', '登录后切到“更多”界面，点击“个人资料”项进入编辑界面进行编辑。', 1387441903),
(11, '2.怎样修改密码？', '登录后切到“更多”界面，点击“个人资料”项进入编辑界面，点击界面下方的“修改密码”按钮。', 1387441933),
(12, '3.运动状况界面的圆环进度条中的运动数据结果包括什么？', '数据包括所有专项健身运动的运动结果总和，加上非专项运动情况下的运动片段值。', 1387442008),
(13, '4.专项健身运动怎样添加？需注意哪些？', '在运动状况界面，切到今天，点击下方的“+”图片，进入专项运动设置界面；开始新的运动需开启GPS。', 1387442131),
(14, '5.专项健身运动都记录些什么？', '记录包括：运动时间，运动轨迹，步数，热量消耗，速度等，中途可上传照片，录像和录音。', 1387442225),
(15, '6.怎样查看专项健身记录？', '在运动状况界面下方，专项健身运动栏下点击图标即可进入对应的记录详情界面查看。', 1387442248),
(16, '7.运动记录保存在哪里？', '所有的运动数据都会保存本地，同时在有网络的情况下上传至服务器。', 1387442296),
(17, '8.如果专项健身运动没有上传成功怎么办？', '对于没有上传成功的专项健身记录，可以在记录详情界面，点击左上第二个上传按钮进行再次上传。', 1387442317),
(18, '9.运动结果可以分享吗？', '运动结果可以分享到新浪微博，腾讯微博和微信，分享操作可进入记录详情界面，点击右上第一个按钮。', 1387442344),
(19, '10.上传的照片，录像和录音如何查看？', '进入专项运动记录详情界面，点击地图上的图标即可进入查看界面，左右滑动可查看其他内容。', 1387442363),
(20, '11.约跑功能是什么？', '约跑通过定位当前位置去查找附近使用运动+的人，可以通过私信方式约对方一起运动。', 1387442392);

-- --------------------------------------------------------

--
-- 表的结构 `zx_node`
--

CREATE TABLE `zx_node` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `name` char(40) NOT NULL DEFAULT '',
  `pid` smallint(6) NOT NULL DEFAULT '0',
  `mod` char(20) NOT NULL DEFAULT '',
  `act` char(20) NOT NULL DEFAULT '',
  `data` char(100) NOT NULL DEFAULT '',
  `icon` char(100) NOT NULL DEFAULT '',
  `listorder` smallint(6) UNSIGNED NOT NULL DEFAULT '999',
  `status` enum('1','2') NOT NULL DEFAULT '2',
  `project1` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `project2` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `zx_node`
--

INSERT INTO `zx_node` (`id`, `name`, `pid`, `mod`, `act`, `data`, `icon`, `listorder`, `status`, `project1`, `project2`) VALUES
(1, '个人资料', 0, 'Admin', 'public_index', '', 'fa-list', 2, '1', 1, 1),
(2, '修改资料', 1, 'Admin', 'public_edit_info', '', '', 999, '1', 1, 1),
(3, '修改密码', 1, 'Admin', 'public_edit_pwd', '', '', 999, '1', 1, 1),
(8, '权限管理', 0, 'Admin', 'admin', '', 'fa-male', 999, '1', 1, 1),
(9, '管理员管理', 8, 'Admin', 'index', '', '', 999, '1', 1, 1),
(10, '角色管理', 8, 'Role', 'index', '', '', 999, '1', 1, 1),
(11, '菜单管理', 17, 'Node', 'index', '', '', 999, '1', 1, 1),
(17, '系统管理', 0, 'Sys', 'sys', '', 'fa-desktop', 999, '1', 1, 1),
(20, '添加角色', 10, 'Role', 'add', '', '', 999, '2', 1, 1),
(21, '添加管理员', 9, 'Admin', 'add', '', '', 999, '2', 1, 1),
(22, '控制台', 0, 'Index', 'index', '', 'fa-tachometer', 1, '1', 1, 1),
(29, '权限分配', 10, 'Role', 'role_node', '', '', 999, '2', 1, 1),
(31, '添加菜单', 11, 'Node', 'add', '', '', 999, '2', 1, 1),
(37, '添加消息', 6, 'Sysmsg', 'add', '', '', 999, '2', 1, 1),
(38, '删除消息', 6, 'Sysmsg', 'del', '', '', 999, '2', 1, 1),
(39, '删除角色', 10, 'Role', 'del', '', '', 999, '2', 1, 1),
(40, '删除管理员', 9, 'Admin', 'del', '', '', 999, '2', 1, 1),
(41, '日志管理', 17, 'Admin', 'admin_log', '', '', 999, '1', 1, 1),
(42, '基本设置', 17, 'System', 'index', '', '', 999, '1', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `zx_role`
--

CREATE TABLE `zx_role` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `rolename` varchar(50) NOT NULL,
  `pid` smallint(6) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `listorder` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `nodes` varchar(500) DEFAULT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `zx_role`
--

INSERT INTO `zx_role` (`id`, `rolename`, `pid`, `description`, `listorder`, `nodes`, `status`) VALUES
(1, '超级管理员', 0, '最高级别', 0, '1,2,3,4,5,8,9,10,16,20,21,22,29,35,36,39,40,54', 1),
(2, '普通管理', 0, '只有基本的管理权限', 0, '1,2,4,16,22,58', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `zx_admin`
--
ALTER TABLE `zx_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- Indexes for table `zx_admin_log`
--
ALTER TABLE `zx_admin_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file` (`file`,`action`);

--
-- Indexes for table `zx_help`
--
ALTER TABLE `zx_help`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zx_node`
--
ALTER TABLE `zx_node`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listorder` (`listorder`),
  ADD KEY `pid` (`pid`),
  ADD KEY `module` (`mod`,`act`);

--
-- Indexes for table `zx_role`
--
ALTER TABLE `zx_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `listorder` (`listorder`),
  ADD KEY `status` (`status`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `zx_admin`
--
ALTER TABLE `zx_admin`
  MODIFY `id` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `zx_admin_log`
--
ALTER TABLE `zx_admin_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- 使用表AUTO_INCREMENT `zx_help`
--
ALTER TABLE `zx_help`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `zx_node`
--
ALTER TABLE `zx_node`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- 使用表AUTO_INCREMENT `zx_role`
--
ALTER TABLE `zx_role`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
