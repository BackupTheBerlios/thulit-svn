-- phpMyAdmin SQL Dump
-- version 2.6.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Oct 04, 2005 at 01:24 PM
-- Server version: 4.1.12
-- PHP Version: 5.0.5-1ubuntu1
-- 
-- Database: `redakcia`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `auth`
-- 

CREATE TABLE `auth` (
`username` varchar(50) character set utf8 NOT NULL default '',
`PASSWORD` varchar(32) character set utf8 NOT NULL default '',
`user_node` int(11) default NULL,
`user_level` int(11) NOT NULL default '99',
PRIMARY KEY  (`username`),
KEY `PASSWORD` (`PASSWORD`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `auth`
-- 

INSERT INTO `auth` VALUES ('jay', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 0);
INSERT INTO `auth` VALUES ('shann', '0342c9a7b54450830e9727b98f8e3cb7', NULL, 0);
INSERT INTO `auth` VALUES ('guest', '084e0343a0486ff05530df6c705c8bb4', NULL, 99);

-- --------------------------------------------------------

-- 
-- Table structure for table `data`
-- 

CREATE TABLE `data` (
`id` int(11) NOT NULL auto_increment,
`name_id` varchar(255) NOT NULL default '',
`date_create` timestamp NULL default '0000-00-00 00:00:00',
`date_mod` timestamp NULL default '0000-00-00 00:00:00',
`owner` int(11) default NULL,
`data_type` varchar(255) default NULL,
`node_type` varchar(255) default NULL,
`node_name` varchar(255) default NULL,
`lang` varchar(100) default 'cz',
`tpl_name` varchar(255) default NULL,
`data_text` text character set utf8,
`data_varchar` varchar(255) default NULL,
`data_datetime` timestamp NULL default '0000-00-00 00:00:00',
`data_date` date default NULL,
`data_time` time default NULL,
`data_int` int(11) default NULL,
`class` varchar(255) default NULL,
`view_level` int(11) default '99',
`edit_level` int(11) default '98',
PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='main data table' AUTO_INCREMENT=178 ;

-- 
-- Dumping data for table `data`
-- 

INSERT INTO `data` VALUES (141, 'menu', '2005-06-24 15:52:16', '2005-07-11 08:59:57', 0, 'text', 'menu', 'menu', '', 'menu.tpl', '<h2>Home</h2>\r\n<p>As you can see this page under heavy developement.</p>\r\n<p>Come back later or you can every day follow it\\''s construction</p>\r\n', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 'menu', 99, 98);
INSERT INTO `data` VALUES (54, 'text.index.value', '2005-10-04 13:07:02', '2005-07-11 08:59:52', 0, 'text', 'value', 'text.value', '', '', '<ol>\r\n    <li>+Ä¾&scaron;ï¿½?Å¥Å¾&yacute;&aacute;&iacute;&eacute;=</li>\r\n    <li>+?ï¿½??ï¿½ï¿½ï¿½ï¿½ï¿½</li>\r\n    <li>asdfasdfawet</li>\r\n    <li>erjsgfhs</li>\r\n</ol>', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', 99, 98);
INSERT INTO `data` VALUES (78, 'text_kde-nakupovat', '2005-06-22 23:43:20', '2005-07-10 11:40:20', 0, 'text', 'text', 'text_kde-nakupovat', '', 'text.tpl', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 'text', 0, 98);
INSERT INTO `data` VALUES (56, 'templates', '2005-06-22 21:10:24', '2005-06-22 21:10:50', 0, 'text', 'node_shell', '', '', '', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 98);
INSERT INTO `data` VALUES (23, 'hlavicka', '2005-03-28 19:21:40', '2005-07-11 15:07:14', 0, 'text', 'text', '', 'cz', 'text.tpl', '&nbsp;toto je druheeeeee :)<br/>', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, 'head', 99, 98);
INSERT INTO `data` VALUES (49, 'menu.tpl', '2005-06-10 22:19:42', '2005-06-22 21:05:51', 0, 'text', 'template', 'menu', '', '', '<body>aaaaaaaaaaaaaaaaaaaaaaaaaa</body>', NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 98);
INSERT INTO `data` VALUES (50, 'page.tpl', '2005-06-13 23:33:03', '2005-06-13 23:31:50', NULL, NULL, 'template', 'page template', '', NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, 98);
INSERT INTO `data` VALUES (52, 'text.tpl', '2005-06-21 16:59:58', '2005-07-11 09:00:48', 0, 'text', 'template', 'text.tpl', '', '', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', 99, 98);
INSERT INTO `data` VALUES (53, 'text.tpl.value', '2005-06-21 16:58:54', '2005-10-04 12:12:30', 0, 'text', 'value', '', '', '', '{* Smarty *}\r\n<div class="{$prop.class}">\r\n{if $prop.edit_level ge $_user.user_level}\r\n<div class="edit-link"><a href="/{$lang}/edit/edit_id={$prop.id}/parent_id={$parent_prop.id}/return={$page}"> edit </a></div>\r\n{/if}\r\n{call_value obj=$obj}\r\n</div>', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', 99, 98);
INSERT INTO `data` VALUES (60, 'projects', '2005-06-22 23:09:45', '2005-06-26 23:04:35', 0, 'text', 'page', 'projects', '', 'page.tpl', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', 99, 98);
INSERT INTO `data` VALUES (24, 'text_index', '2005-04-17 20:41:22', '2005-07-11 08:59:46', 0, 'text', 'text', 'text_index', '', 'text.tpl', '', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, 'text', 99, 98);
INSERT INTO `data` VALUES (65, 'kontakt', '2005-06-22 23:11:48', '2005-06-22 23:14:02', 0, 'text', 'page', 'kontakt', '', 'page.tpl', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', NULL, 98);
INSERT INTO `data` VALUES (41, 'hlavicka.value', '2005-04-24 12:08:55', '2005-07-11 08:59:41', 0, 'text', 'value', 'hlavicka.value', '', '', '<a class="logo_jay_cz" href="index" title="jay.cz"></a><h1><a href="index" title="jay.cz">jay.cz</a> </h1>', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', 99, 98);
INSERT INTO `data` VALUES (39, 'index', '2005-04-24 12:08:50', '2005-07-11 09:02:51', 0, 'text', 'page', 'home', '', 'page.tpl', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', 99, 98);
INSERT INTO `data` VALUES (51, 'page.tpl.value', '2005-06-17 12:17:49', '2005-10-04 12:55:52', 0, 'text', 'value', 'page template value', '', '', '<!-- ?xml version=''1.0'' encoding=''utf-8''? -->\r\n<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">\r\n<html xmlns=''http://www.w3.org/1999/xhtml'' xml:lang=''cs'' lang=''cs''>\r\n   <head><!--Header default code taken from http://interval.cz/clanek.asp?article=3411-->\r\n      <meta http-equiv=''Content-Type'' content=''text/html; charset=utf-8'' />\r\n      <meta http-equiv=''Content-language'' content=''cs'' />\r\n      <!-- ROBOTS /-->\r\n      <meta name=''robots'' content=''index,follow'' />\r\n      <meta name=''googlebot'' content=''index,follow,snippet,archive'' />\r\n      <!-- meta name=''robots'' content=''noindex,nofollow'' /-->\r\n      <!-- meta name=''googlebot'' content=''noindex,nofollow,nosnippet,noarchive'' /-->\r\n      <!-- ROBOTS end /-->\r\n      <meta name=''design'' content=''All: Jan Kwaczek, e-mail: kwaczek(@)centrum.cz'' />\r\n      <meta name=''coder'' content=''All: Author Name, e-mail: jay(@)jay.cz'' />\r\n      <meta name=''webmaster'' content=''All: Webmaster Name, e-mail: jay(@)jay.cz'' />\r\n      <meta name=''copyright'' content=''?‚Â©2005 jay.cz, e-mail: jay(@)jay.cz'' />\r\n      <link rel=''shortcut icon'' type=''image/x-icon'' href=''favicon.ico'' />\r\n      <!--<link rel=''alternate'' type=''application/rss+xml'' title=''RSS Example.net'' href=''http://www.example.net/rss.xml'' />-->\r\n      <!-- CASCADING STYLE SHEETS /-->\r\n  <link rel="stylesheet" type="text/css" href="style" media="all" />\r\n<!--[if IE]>\r\n  <link rel="stylesheet" type="text/css" href="style-ie" media="all" />\r\n<![endif]-->\r\n	<title>jay.cz - {$prop.node_name}</title>\r\n\r\n  </head>\r\n  <body>\r\n<div class="page {$prop.class}">\r\n{call_content obj=$obj part=''body''}\r\n</div>\r\n  </body>\r\n</html>', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', 99, 98);
INSERT INTO `data` VALUES (55, 'menu.tpl.value', '2005-06-22 21:05:54', '2005-10-04 12:53:40', 0, 'text', 'value', '', '', '', '{* Smarty *}\r\n<div class="{$prop.class}">\r\n{call_content obj=$obj part=''link''}\r\n<ul>\r\n{section name=sec1 loop=$node_array}\r\n    <li><a class="{$prop.class}_{$smarty.section.sec1.index}" href="/{$lang}/{$node_array[sec1].name_id}">\r\n{$node_array[sec1].node_name}</a></li>\r\n{/section}\r\n</ul>\r\n\r\n</div>', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', 0, 98);
INSERT INTO `data` VALUES (79, 'text_kontakt', '2005-06-22 23:43:22', '2005-07-11 09:00:05', 0, 'text', 'text', 'text_kontakt', '', 'text.tpl', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 'text', 99, 98);
INSERT INTO `data` VALUES (82, 'text_projects', '2005-06-22 23:43:30', '2005-07-10 11:39:19', 0, 'text', 'text', 'text_projects', '', 'text.tpl', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 'text', 98, 98);
INSERT INTO `data` VALUES (84, 'text_kde-nakupovat.value', '2005-06-22 23:46:25', '2005-06-22 23:56:13', 0, 'text', 'value', '', '', '', 'kde nakupit', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', NULL, 98);
INSERT INTO `data` VALUES (85, 'text_kontakt.value', '2005-06-22 23:46:27', '2005-06-25 09:52:46', 0, 'text', 'value', '', '', '', '<h2>Kontakt</h2>\r\n<p>jayjayjaySD<br/>\r\nadlkeiidlkll;so</p>', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', NULL, 98);
INSERT INTO `data` VALUES (173, 'login', '2005-07-27 15:59:03', '2005-07-27 16:36:55', 0, 'text', 'page', 'login', '', 'page.tpl', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', 99, 98);
INSERT INTO `data` VALUES (174, 'login_text', '2005-07-27 15:59:07', '2005-07-27 16:39:14', 0, 'text', 'text', '', '', 'login.tpl', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 'text', 99, 98);
INSERT INTO `data` VALUES (175, 'login_text-value', '2005-07-27 15:59:09', '2005-07-27 16:07:41', 0, 'text', 'value', '', '', '', '<div class=''login_form''><form method="post" action="">\r\n<input type="text" name="username">\r\n<input type="password" name="password">\r\n<input type="submit">\r\n</form></div>', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', 99, 98);
INSERT INTO `data` VALUES (176, 'login.tpl', '2005-07-27 16:07:47', '2005-07-27 16:12:40', 0, 'text', 'template', '', '', '', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', 99, 98);
INSERT INTO `data` VALUES (177, 'login.tpl-value', '2005-07-27 16:10:50', '2005-07-27 16:40:25', 0, 'text', 'value', '', '', '', '<div class=''{$prop.class} login_form''><form method="post" action="/{$lang}/{$return}">\r\n<input type="text" name="username">\r\n<input type="password" name="password">\r\n<input type="submit">\r\n</form></div>', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', 99, 98);
INSERT INTO `data` VALUES (154, 'style-value', '2005-06-25 08:57:33', '2005-07-11 21:13:46', 0, 'text', 'value', '', '', '', 'body{  margin: 0px;  padding: 0px;  background: #9ECAFF;\r\n  color: #024186;  background-image: url(img/b_background.gif);\r\n  background-repeat : repeat-y;  background-position : left;}\r\n.page{  \r\nmargin: 0px;\r\npadding: 0px;\r\nheight: 154px;\r\nwidth: 100%;\r\nbackground-image: url(img/a_background.gif);\r\nbackground-repeat : repeat-x;\r\nbackground-position : top;\r\n}\r\n.head{  \r\nmargin: 0px;\r\npadding: 0px;\r\nheight: 154px;\r\nwidth: 704px;\r\nbackground-image: url(img/a_1.gif);\r\nbackground-repeat : no-repeat;\r\n}\r\n.logo_jay_cz{  position: absolute;  left:0px;  top:0px;  width: 265px;  height: 85px;}\r\n.head h1{  display: none;}\r\n.menu{\r\nposition:absolute;\r\nfont-weight: bold;\r\nfont-size: 0.9em;\r\nfont-family: Tahoma, Arial, Trebuchet, sans-serif;\r\ntop: 19px;\r\nleft: 310px;\r\n}\r\n.menu ul{\r\nmargin:0px;\r\npadding: 0px;\r\n}\r\n.menu li{\r\ndisplay: inline;\r\nfloat: left;\r\nmargin: 0px;\r\npadding: 0px;\r\nlist-style-type: none;\r\n}\r\n.menu li a{\r\ntext-decoration: none;\r\ncolor: #B0C5CA;\r\ndisplay: block;\r\npadding: 12px;\r\nmargin-left: 10px;\r\n}\r\n.menu li a:hover{\r\ncolor: #3281d8;\r\n}\r\n.text{\r\nmargin-left: 310px;\r\nmargin-right: 10%;\r\nmax-width: 800px;\r\ntext-align: justify;\r\nfont-size: 1em;\r\nfont-family: serif;\r\n}\r\n.menu-projects{\r\nposition:absolute;\r\nfont-weight: bold;\r\nfont-size: 0.9em;\r\nfont-family: Tahoma, Arial, Trebuchet, sans-serif;\r\ntop: 142px;\r\nleft: 3px;\r\n}\r\n.menu-projects ul{\r\nmargin: 0px;\r\npadding: 0px;\r\n}\r\n.menu-projects li{\r\nmargin: 0px;\r\npadding: 0px;\r\nlist-style-type: none;\r\n}\r\n.menu-projects li a{\r\ntext-decoration: none;\r\ncolor: #B0C5CA;\r\ndisplay: block;\r\nwidth: 235px;\r\npadding: 10px;\r\nborder: 1px solid #ddf;\r\nmargin-bottom: 10px;\r\n}\r\n.menu-projects li a:hover{\r\ncolor: #3281d8;\r\nborder: 1px solid #bbf;\r\n}\r\n.edit-text textarea{\r\nwidth: 100%;\r\nheight: 20em;\r\nfont-size: 1em;\r\nfont-family: serif;\r\n}\r\n.edit-link{\r\nwidth: 100%;\r\ndisplay: block;\r\ntext-align: right;\r\n}', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', 99, 98);
INSERT INTO `data` VALUES (88, 'text_produkty.value', '2005-06-22 23:46:34', '2005-06-25 09:52:57', 0, 'text', 'value', '', '', '', '<h2>Projects</h2>\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Sed enim lectus, ornare et, vulputate ac, tristique ac, sem. Pellentesque dignissim blandit nulla. Donec in ipsum vel ipsum dictum pellentesque. Proin vitae metus. Morbi luctus. Duis eleifend. Nam ligula. Cras et pede. Nulla erat felis, pretium non, sollicitudin vel, tincidunt eu, orci. Ut sed eros sit amet turpis luctus tincidunt. Nam facilisis laoreet sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum vehicula, wisi at posuere aliquet, lorem neque condimentum ligula, id interdum ante libero vitae magna. Aliquam leo. Mauris ac arcu. Nulla eget dolor ut wisi nonummy ullamcorper. Nulla eu purus.</p>\r\n<p>Aenean urna justo, ultricies sit amet, sagittis ut, viverra facilisis, nisl. Mauris sit amet quam nec augue elementum commodo. Fusce justo. Phasellus nec est. Integer nunc arcu, auctor in, sollicitudin in, vulputate eget, risus. Duis et lacus nec nisl tempor tincidunt. Aliquam erat volutpat. Aliquam mi. Vestibulum mauris nisl, congue at, feugiat nec, dictum ut, eros. Donec lacinia imperdiet magna. Sed ornare, nulla in vestibulum vulputate, diam felis posuere massa, condimentum lacinia nibh diam sed sem. Vivamus rhoncus diam vitae dolor. Fusce sapien. Aenean nec est eget orci hendrerit aliquam. Vivamus eleifend velit sit amet augue. Morbi lorem justo, suscipit ac, malesuada sed, aliquam ut, massa. Donec bibendum elit et metus. Phasellus sed nulla et arcu facilisis condimentum.</p>\r\n<p>Suspendisse a diam. Curabitur lectus est, tincidunt nec, vulputate at, interdum in, tellus. Vestibulum at libero eu nibh pharetra scelerisque. Curabitur et risus. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi sed wisi. Donec ut ligula. Mauris quis diam. Vivamus enim massa, mollis vitae, facilisis sit amet, rutrum id, augue. Aenean auctor lacus. Phasellus elementum nibh eget libero. Mauris ornare luctus dui. Mauris et orci. Duis cursus lorem id velit.</p>\r\n<p>Curabitur diam. Quisque sit amet elit non neque porta mattis. Cras vulputate tellus sit amet mauris. Nunc ullamcorper nisl quis odio. Aenean vel leo at sapien placerat posuere. Nunc quis neque at tortor interdum tincidunt. Nunc fringilla. Vivamus eu massa. Integer ac purus. Praesent non turpis. Morbi dignissim. Nulla porta urna a turpis. Donec erat. Phasellus commodo. Etiam consectetuer nisl. Aliquam urna. Nam eget pede. Ut mattis dolor nec neque. Vivamus sed nibh vel lorem placerat facilisis. Fusce viverra.</p>\r\n<p>Nulla tellus dolor, mollis elementum, interdum ac, accumsan nec, eros. Fusce pulvinar auctor diam. Etiam nonummy, sapien ac euismod posuere, nibh ante bibendum ipsum, sit amet accumsan pede odio id augue. Fusce leo. Vestibulum ornare, felis et dictum molestie, est augue aliquet nunc, non blandit lectus est sed metus. Vivamus vel odio. Praesent cursus, elit et ultricies ornare, orci wisi ultrices quam, in dictum est orci in risus. Suspendisse eu sem vel est accumsan feugiat. Praesent nec justo. Vestibulum lectus eros, suscipit non, eleifend et, venenatis eget, ipsum. Mauris nec tortor. Ut lacus orci, rhoncus id, interdum sit amet, hendrerit eget, felis.</p>', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', NULL, 98);
INSERT INTO `data` VALUES (148, 'style.tpl-value', '2005-06-24 18:15:24', '2005-10-04 12:28:41', 0, 'text', 'value', '', '', '', '{* Smarty *}\r\n{php}\r\nheader(''Content-type: text/css'');\r\n{/php}\r\n{call_value obj=$obj}', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', 0, 98);
INSERT INTO `data` VALUES (147, 'style.tpl', '2005-06-24 18:15:12', '2005-06-24 18:19:20', 0, 'text', 'template', '', '', '', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', NULL, 98);
INSERT INTO `data` VALUES (145, 'style', '2005-06-24 18:14:09', '2005-06-24 18:14:53', 0, 'text', 'page', '', '', 'style.tpl', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', NULL, 98);
INSERT INTO `data` VALUES (153, 'info.tpl-value', '2005-06-24 19:56:59', '2005-10-04 12:29:52', 0, 'text', 'value', '', '', '', '{* Smarty *}\r\n<div class="{$prop.class}" style="background-image: url(img/info_{$parent_prop.name_id}.jpg);">\r\n{call_value obj=$obj}\r\n</div>\r\n', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', 0, 98);
INSERT INTO `data` VALUES (152, 'info.tpl', '2005-06-24 19:56:54', '2005-06-24 19:57:16', 0, 'text', 'template', '', '', '', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', NULL, 98);
INSERT INTO `data` VALUES (155, 'menu-projects', '2005-06-25 14:17:21', '2005-06-27 11:05:51', 0, 'text', 'menu', '', '', 'menu.tpl', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 'menu-projects', 98, 98);
INSERT INTO `data` VALUES (156, 'actual', '2005-06-25 14:18:29', '2005-06-25 14:20:07', 0, 'text', 'page', 'Actual projects', '', 'page.tpl', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', NULL, 98);
INSERT INTO `data` VALUES (157, 'completed', '2005-06-25 14:20:50', '2005-06-25 14:21:48', 0, 'text', 'page', 'Completed projects', '', 'page.tpl', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', NULL, 98);
INSERT INTO `data` VALUES (158, 'edit', '2005-07-08 10:50:02', '2005-07-11 19:23:42', 0, 'text', 'page', '', '', 'edit.tpl', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', 99, 98);
INSERT INTO `data` VALUES (159, 'edit-text', '2005-07-08 10:53:22', '2005-07-11 21:15:52', 0, 'text', 'edit', '', '', 'edit-box.tpl', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, 'text edit-text', 99, 98);
INSERT INTO `data` VALUES (170, '_text_edit_1', '2005-07-11 20:10:05', '2005-07-11 20:10:51', 0, 'text', 'template', '', '', '', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', 99, 98);
INSERT INTO `data` VALUES (161, 'edit.tpl', '2005-07-08 11:00:27', '2005-07-08 11:02:06', 0, 'text', 'template', '', '', '', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', 99, 98);
INSERT INTO `data` VALUES (162, 'edit.tpl-value', '2005-07-08 11:00:37', '2005-10-04 12:43:52', 0, 'text', 'value', '', '', '', '<!-- ?xml version=''1.0'' encoding=''utf-8''? -->\r\n<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">\r\n<html xmlns=''http://www.w3.org/1999/xhtml'' xml:lang=''cs'' lang=''cs''>\r\n   <head><!--Header default code taken from http://interval.cz/clanek.asp?article=3411-->\r\n      <meta http-equiv=''Content-Type'' content=''text/html; charset=utf-8'' />\r\n      <meta http-equiv=''Content-language'' content=''cs'' />\r\n      <!-- ROBOTS /-->\r\n      <meta name=''robots'' content=''index,follow'' />\r\n      <meta name=''googlebot'' content=''index,follow,snippet,archive'' />\r\n      <!-- meta name=''robots'' content=''noindex,nofollow'' /-->\r\n      <!-- meta name=''googlebot'' content=''noindex,nofollow,nosnippet,noarchive'' /-->\r\n      <!-- ROBOTS end /-->\r\n      <meta name=''design'' content=''All: Jan Kwaczek, e-mail: kwaczek(@)centrum.cz'' />\r\n      <meta name=''coder'' content=''All: Author Name, e-mail: jay(@)jay.cz'' />\r\n      <meta name=''webmaster'' content=''All: Webmaster Name, e-mail: jay(@)jay.cz'' />\r\n      <meta name=''copyright'' content=''2005 jay.cz, e-mail: jay(@)jay.cz'' />\r\n      <link rel=''shortcut icon'' type=''image/x-icon'' href=''favicon.ico'' />\r\n      <!--<link rel=''alternate'' type=''application/rss+xml'' title=''RSS Example.net'' href=''http://www.example.net/rss.xml'' />-->\r\n      <!-- CASCADING STYLE SHEETS /-->\r\n  <link rel="stylesheet" type="text/css" href="/cz/style" media="all" />\r\n<!--[if IE]>\r\n  <link rel="stylesheet" type="text/css" href="style-ie" media="all" />\r\n<![endif]-->\r\n	<title>jay.cz - {$prop.node_name}</title>\r\n\r\n  </head>\r\n  <body>\r\n<div class="page {$prop.class}">\r\n{call_content obj=$obj part=''body''}\r\n</div>\r\n  </body>\r\n</html>', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', 99, 98);
INSERT INTO `data` VALUES (163, 'edit-box.tpl', '2005-07-08 11:08:31', '2005-07-08 11:09:09', 0, 'text', 'template', '', '', '', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', 99, 98);
INSERT INTO `data` VALUES (164, 'edit-box.tpl-value', '2005-07-08 11:08:41', '2005-10-04 12:30:47', 0, 'text', 'value', '', '', '', '{* Smarty *}\r\n<div class="{$prop.class}">\r\n<div class="edit-link"><a href="/{$lang}/{$return}"> return </a></div>\r\n{call_value obj=$obj}\r\n</div>', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', 99, 98);
INSERT INTO `data` VALUES (165, 'red', '2005-07-08 11:25:38', '2005-07-08 11:26:55', 0, 'text', 'site', '', 'en', '', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', 99, 98);
INSERT INTO `data` VALUES (167, 'redcz-redirect', '2005-07-08 11:27:47', '2005-07-08 11:31:39', 0, 'text', 'property', 'redirect', '', '', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', 99, 98);
INSERT INTO `data` VALUES (168, 'redcz-redirect-value', '2005-07-08 11:31:47', '2005-07-08 11:38:34', 0, 'text', 'value', '', '', '', 'red', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', 99, 98);
INSERT INTO `data` VALUES (169, 'redcz', '2005-07-08 11:33:29', '2005-07-08 11:33:44', 0, 'text', 'site', '', 'cz', '', NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, '', 99, 98);
INSERT INTO `data` VALUES (171, '_text_edit_1-value', '2005-07-11 20:11:26', '2005-07-30 11:02:07', 0, 'text', 'value', '', '', '', '<form action="/{$lang}/{$return}" method="post">\r\n{ oFCKeditor->Create }\r\n{*<textarea name="value">\r\n{$_edit_value|htmlentities}\r\n</textarea>*}\r\n<input type="hidden" name="node_type" value="{$_edit_prop.node_type}" />\r\n<input type="hidden" name="node_id" value="{$_edit_prop.id}" />\r\n<input type="submit" value="Save changes" name="edit" />\r\n</form>\r\n ', '', '0000-00-00 00:00:00', '0000-00-00', '00:00:00', 0, '', 99, 98);

-- --------------------------------------------------------

-- 
-- Table structure for table `relation`
-- 

CREATE TABLE `relation` (
`parent_id` int(11) NOT NULL default '0',
`parent_table` varchar(255) character set utf8 NOT NULL default 'data',
`child_id` int(11) NOT NULL default '0',
`child_table` varchar(255) character set utf8 NOT NULL default 'data',
`sort_order` int(11) default NULL,
`rel_type` varchar(255) character set utf8 default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Data relation table';

-- 
-- Dumping data for table `relation`
-- 

INSERT INTO `relation` VALUES (56, 'data', 52, 'data', 0, 'link');
INSERT INTO `relation` VALUES (60, 'data', 141, 'data', 1, 'body');
INSERT INTO `relation` VALUES (56, 'data', 49, 'data', 1, 'link');
INSERT INTO `relation` VALUES (56, 'data', 50, 'data', 2, 'link');
INSERT INTO `relation` VALUES (23, 'data', 41, 'data', 0, 'display');
INSERT INTO `relation` VALUES (46, 'data', 47, 'data', 0, 'property');
INSERT INTO `relation` VALUES (24, 'data', 54, 'data', 0, 'display');
INSERT INTO `relation` VALUES (0, 'data', 46, 'data', 1, 'display');
INSERT INTO `relation` VALUES (44, 'data', 45, 'data', 0, 'property');
INSERT INTO `relation` VALUES (50, 'data', 51, 'data', 0, 'display');
INSERT INTO `relation` VALUES (52, 'data', 53, 'data', 0, 'display');
INSERT INTO `relation` VALUES (49, 'data', 55, 'data', 0, 'display');
INSERT INTO `relation` VALUES (0, 'data', 44, 'data', 0, 'display');
INSERT INTO `relation` VALUES (157, 'data', 141, 'data', 1, 'body');
INSERT INTO `relation` VALUES (82, 'data', 88, 'data', 0, 'display');
INSERT INTO `relation` VALUES (156, 'data', 155, 'data', 2, 'body');
INSERT INTO `relation` VALUES (79, 'data', 85, 'data', 0, 'display');
INSERT INTO `relation` VALUES (39, 'data', 141, 'data', 4, 'body');
INSERT INTO `relation` VALUES (145, 'data', 154, 'data', 0, 'display');
INSERT INTO `relation` VALUES (39, 'data', 23, 'data', 0, 'body');
INSERT INTO `relation` VALUES (39, 'data', 24, 'data', 1, 'body');
INSERT INTO `relation` VALUES (78, 'data', 84, 'data', 0, 'display');
INSERT INTO `relation` VALUES (65, 'data', 23, 'data', 0, 'body');
INSERT INTO `relation` VALUES (65, 'data', 79, 'data', 1, 'body');
INSERT INTO `relation` VALUES (60, 'data', 23, 'data', 0, 'body');
INSERT INTO `relation` VALUES (156, 'data', 141, 'data', 1, 'body');
INSERT INTO `relation` VALUES (141, 'data', 65, 'data', 6, 'link');
INSERT INTO `relation` VALUES (60, 'data', 82, 'data', 2, 'body');
INSERT INTO `relation` VALUES (156, 'data', 23, 'data', 0, 'body');
INSERT INTO `relation` VALUES (157, 'data', 23, 'data', 0, 'body');
INSERT INTO `relation` VALUES (0, 'data', 155, 'data', 3, 'display');
INSERT INTO `relation` VALUES (155, 'data', 156, 'data', 0, 'link');
INSERT INTO `relation` VALUES (155, 'data', 157, 'data', 1, 'link');
INSERT INTO `relation` VALUES (60, 'data', 155, 'data', 3, 'body');
INSERT INTO `relation` VALUES (56, 'data', 161, 'data', 6, 'link');
INSERT INTO `relation` VALUES (174, 'data', 175, 'data', 0, 'display');
INSERT INTO `relation` VALUES (141, 'data', 60, 'data', 2, 'link');
INSERT INTO `relation` VALUES (141, 'data', 39, 'data', 0, 'link');
INSERT INTO `relation` VALUES (56, 'data', 147, 'data', 4, 'link');
INSERT INTO `relation` VALUES (152, 'data', 153, 'data', 0, 'display');
INSERT INTO `relation` VALUES (0, 'data', 141, 'data', 2, 'display');
INSERT INTO `relation` VALUES (56, 'data', 152, 'data', 5, 'link');
INSERT INTO `relation` VALUES (65, 'data', 141, 'data', 4, 'body');
INSERT INTO `relation` VALUES (147, 'data', 148, 'data', 0, 'display');
INSERT INTO `relation` VALUES (157, 'data', 155, 'data', 2, 'body');
INSERT INTO `relation` VALUES (0, 'data', 158, 'data', 4, 'display');
INSERT INTO `relation` VALUES (141, 'data', 173, 'data', 7, 'link');
INSERT INTO `relation` VALUES (158, 'data', 159, 'data', 2, 'body');
INSERT INTO `relation` VALUES (0, 'data', 169, 'data', 6, 'display');
INSERT INTO `relation` VALUES (161, 'data', 162, 'data', 0, 'display');
INSERT INTO `relation` VALUES (0, 'data', 165, 'data', 5, 'display');
INSERT INTO `relation` VALUES (163, 'data', 164, 'data', 0, 'display');
INSERT INTO `relation` VALUES (56, 'data', 163, 'data', 8, 'link');
INSERT INTO `relation` VALUES (158, 'data', 141, 'data', 1, 'body');
INSERT INTO `relation` VALUES (158, 'data', 23, 'data', 0, 'body');
INSERT INTO `relation` VALUES (169, 'data', 167, 'data', 0, 'property');
INSERT INTO `relation` VALUES (167, 'data', 168, 'data', 0, 'display');
INSERT INTO `relation` VALUES (170, 'data', 171, 'data', 0, 'display');
INSERT INTO `relation` VALUES (56, 'data', 170, 'data', 9, 'link');
INSERT INTO `relation` VALUES (173, 'data', 141, 'data', 2, 'body');
INSERT INTO `relation` VALUES (173, 'data', 23, 'data', 0, 'body');
INSERT INTO `relation` VALUES (173, 'data', 174, 'data', 1, 'body');
INSERT INTO `relation` VALUES (56, 'data', 176, 'data', 10, 'link');
INSERT INTO `relation` VALUES (176, 'data', 177, 'data', 0, 'display');
        