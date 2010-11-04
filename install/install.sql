DROP TABLE IF EXISTS `eb_about`;
CREATE TABLE `eb_about` (
  `about_id` int(10) unsigned NOT NULL auto_increment,
  `about_subject` varchar(40) NOT NULL,
  `about_content` mediumtext NOT NULL,
  PRIMARY KEY  (`about_id`)
) ENGINE=MyISAM ;

DROP TABLE IF EXISTS `eb_admin`;
CREATE TABLE `eb_admin` (
  `type_id` int(10) unsigned NOT NULL auto_increment,
  `type_subject` varchar(40) NOT NULL,
  `type_live` int(10) unsigned NOT NULL default '0',
  `type_sp` varchar(40) NOT NULL,
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM ;

INSERT INTO `eb_admin` VALUES (1, '基本信息维护', 0, 'basicall');
INSERT INTO `eb_admin` VALUES (2, '服务器基本信息', 1, 'main');
INSERT INTO `eb_admin` VALUES (3, '基本设置', 1, 'basic');
INSERT INTO `eb_admin` VALUES (4, '引导设置', 1, 'setmain');
INSERT INTO `eb_admin` VALUES (5, '安全设置', 1, 'setself');
INSERT INTO `eb_admin` VALUES (6, '系统工具管理', 0, 'systemlist');
INSERT INTO `eb_admin` VALUES (7, '修改个人密码', 6, 'usergroup');
INSERT INTO `eb_admin` VALUES (8, '插件设置', 6, 'hack');
INSERT INTO `eb_admin` VALUES (9, '后台组件', 6, 'admin');
INSERT INTO `eb_admin` VALUES (10, '广告管理', 6, 'advertising');
INSERT INTO `eb_admin` VALUES (11, '用户组管理', 6, 'popgroup');
INSERT INTO `eb_admin` VALUES (12, '用户管理', 6, 'members');
INSERT INTO `eb_admin` VALUES (13, '数据备份', 6, 'sqladmin');
INSERT INTO `eb_admin` VALUES (14, '数据恢复', 6, 'sqlbck');
INSERT INTO `eb_admin` VALUES (15, '流量统计', 6, 'statistics');
INSERT INTO `eb_admin` VALUES (16, '管理统计', 6, 'adminstatistics');
INSERT INTO `eb_admin` VALUES (17, '操作权限', 6, 'actionadmin');
INSERT INTO `eb_admin` VALUES (18, '企业信息管理', 0, 'companyall');
INSERT INTO `eb_admin` VALUES (19, '信息分类', 18, 'classification');
INSERT INTO `eb_admin` VALUES (20, '城市管理', 18, 'town');


DROP TABLE IF EXISTS `eb_config`;
CREATE TABLE `eb_config` (
  `config_subject` varchar(40) NOT NULL,
  `config_content` text NOT NULL,
  PRIMARY KEY  (`config_subject`)
) ENGINE=MyISAM;

INSERT INTO `eb_config` VALUES ('webclose', '1');
INSERT INTO `eb_config` VALUES ('webname', '网站名称');
INSERT INTO `eb_config` VALUES ('title', '网站标题');
INSERT INTO `eb_config` VALUES ('icp', 'ICP 备案信息');
INSERT INTO `eb_config` VALUES ('keywords', '关键字，有利于搜索引擎搜录');
INSERT INTO `eb_config` VALUES ('description', '网站描述，有利于搜索引擎搜录');
INSERT INTO `eb_config` VALUES ('main', '0');
INSERT INTO `eb_config` VALUES ('mail', '企业邮箱');
INSERT INTO `eb_config` VALUES ('error', '1');
INSERT INTO `eb_config` VALUES ('cookiedomain', '');
INSERT INTO `eb_config` VALUES ('cookiepath', '/');
INSERT INTO `eb_config` VALUES ('session', '0');
INSERT INTO `eb_config` VALUES ('sessionpath', 'tmp');
INSERT INTO `eb_config` VALUES ('online', '36000');
INSERT INTO `eb_config` VALUES ('getpost', '0');
INSERT INTO `eb_config` VALUES ('html', '0');
INSERT INTO `eb_config` VALUES ('HTMLcode', '');
INSERT INTO `eb_config` VALUES ('live', 'v1.0.0 Best');
INSERT INTO `eb_config` VALUES ('copy', 'Powered by <a href=''http://www.ioime.com'' target=_blank> <b>IOIme Live</b> </a>&nbsp;&copy; 2006-07,<b style=''color: #FF9900''>ioime.com</b>\r\n<a href=''http://www.oi77.com'' target=_blank><b>trexwb</b></a>');
INSERT INTO `eb_config` VALUES ('attach', 'attach');
INSERT INTO `eb_config` VALUES ('self', '1');
INSERT INTO `eb_config` VALUES ('dir', 'default');
INSERT INTO `eb_config` VALUES ('time', '8');
INSERT INTO `eb_config` VALUES ('size', '2097152');
INSERT INTO `eb_config` VALUES ('bbs', '1');

DROP TABLE IF EXISTS `eb_group`;
CREATE TABLE `eb_group` (
  `group_id` int(10) unsigned NOT NULL auto_increment,
  `group_system` varchar(40) NOT NULL,
  `group_name` varchar(40) NOT NULL,
  `group_admin` int(2) unsigned NOT NULL default '0',
  `group_action` text NOT NULL,
  `group_authority` text NOT NULL,
  `group_option` text NOT NULL,
  PRIMARY KEY  (`group_id`)
) ENGINE=MyISAM;

INSERT INTO `eb_group` VALUES (1, 'private', '游客', 0, 'index,cookie,login', '', '');
INSERT INTO `eb_group` VALUES (2, 'private', '禁止会员', 0, 'index,cookie,login', '', '');
INSERT INTO `eb_group` VALUES (3, 'member', '普通会员', 0, 'index,update,building', '', '');
INSERT INTO `eb_group` VALUES (4, 'member', '企业助手', 0, 'index,update,building', '', '');
INSERT INTO `eb_group` VALUES (5, 'member', '企业管理员', 0, 'index,update,building', '', '');
INSERT INTO `eb_group` VALUES (6, 'member', '企业注册人', 0, 'index', '', '');
INSERT INTO `eb_group` VALUES (7, 'system', '管理员', 1, 'index,update,building', 'basicall,main,basic,setmain,setself,systemlist,usergroup,hack,admin,advertising,popgroup,members', 'about');
INSERT INTO `eb_group` VALUES (8, 'administrator', '超级管理员', 1, 'all', 'all', 'all');

DROP TABLE IF EXISTS `eb_hack`;
CREATE TABLE `eb_hack` (
  `hack_action` varchar(40) NOT NULL,
  `hack_subject` varchar(40) NOT NULL,
  `hack_cache` int(10) unsigned NOT NULL default '0',
  `hack_cachetime` int(10) unsigned NOT NULL default '0',
  `hack_htmlteml` int(10) unsigned NOT NULL default '0',
  `hack_numser` int(10) unsigned NOT NULL default '0',
  `hack_adhead` mediumtext NOT NULL,
  `hack_adbody` mediumtext NOT NULL,
  `hack_adfoot` mediumtext NOT NULL,
  PRIMARY KEY  (`hack_action`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `eb_main`;
CREATE TABLE `eb_main` (
  `main_subject` varchar(40) NOT NULL,
  `main_info` mediumtext NOT NULL,
  PRIMARY KEY  (`main_subject`)
) ENGINE=MyISAM;

INSERT INTO `eb_main` VALUES ('title', '');
INSERT INTO `eb_main` VALUES ('bgcolor', '');
INSERT INTO `eb_main` VALUES ('bgimage', '');
INSERT INTO `eb_main` VALUES ('transparent', '');
INSERT INTO `eb_main` VALUES ('info', '');
INSERT INTO `eb_main` VALUES ('nesting', '0');

DROP TABLE IF EXISTS `eb_members`;
CREATE TABLE `eb_members` (
  `uid` mediumint(10) unsigned NOT NULL,
  `username` varchar(40) NOT NULL,
  `userpwd` varchar(50) NOT NULL,
  `secques` varchar(40) NOT NULL,
  `gender` int(2) NOT NULL default '0',
  `birthdayyear` int(10) unsigned NOT NULL default '2006',
  `birthdaymonth` int(10) unsigned NOT NULL default '1',
  `birthdayday` int(10) unsigned NOT NULL default '1',
  `constellation` varchar(20) NOT NULL,
  `Ishideage` int(2) unsigned NOT NULL default '0',
  `useremail` varchar(100) NOT NULL,
  `telephone` varchar(40) NOT NULL,
  `groupid` int(10) unsigned NOT NULL default '1',
  `regdate` varchar(20) NOT NULL,
  `lastip` varchar(20) NOT NULL,
  `column` varchar(40) NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `eb_pms`;
CREATE TABLE `eb_pms` (
  `pmid` int(10) unsigned NOT NULL auto_increment,
  `msgfrom` varchar(15) NOT NULL default '',
  `msgfromid` mediumint(8) unsigned NOT NULL default '0',
  `msgtoid` mediumint(8) unsigned NOT NULL default '0',
  `folder` enum('inbox','outbox') NOT NULL default 'inbox',
  `new` tinyint(1) NOT NULL default '0',
  `subject` varchar(75) NOT NULL default '',
  `dateline` int(10) unsigned NOT NULL default '0',
  `message` text NOT NULL,
  PRIMARY KEY  (`pmid`),
  KEY `msgtoid` (`msgtoid`,`folder`,`dateline`),
  KEY `msgfromid` (`msgfromid`,`folder`,`dateline`)
) ENGINE=MyISAM;

CREATE TABLE `eb_action` (
  `action_action` varchar(40) NOT NULL,
  `action_subject` varchar(40) NOT NULL,
  PRIMARY KEY  (`action_action`)
) ENGINE=MyISAM;

INSERT INTO `eb_action` VALUES ('about', '联系方式');

DROP TABLE IF EXISTS `eb_town`;
CREATE TABLE `eb_town` (
  `type_id` int(10) unsigned NOT NULL auto_increment,
  `type_subject` varchar(40) NOT NULL,
  `type_live` int(10) unsigned NOT NULL default '0',
  `type_sp` varchar(40) NOT NULL,
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `eb_class`;
CREATE TABLE `eb_class` (
  `type_id` int(10) unsigned NOT NULL auto_increment,
  `type_subject` varchar(40) NOT NULL,
  `type_live` int(10) unsigned NOT NULL default '0',
  `type_sp` varchar(40) NOT NULL,
  PRIMARY KEY  (`type_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `eb_images`;
CREATE TABLE `eb_images` (
  `img_picid` int(10) NOT NULL default '0',
  `img_cid` int(10) unsigned NOT NULL default '0',
  `img_did` int(10) unsigned NOT NULL default '0',
  `img_picsrc` varchar(100) NOT NULL default '',
  `img_picsize` varchar(20) NOT NULL default '',
  `img_uid` smallint(8) unsigned NOT NULL default '0',
  `img_filg` int(2) unsigned NOT NULL default '0',
  PRIMARY KEY  (`img_picid`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `eb_comtag`;
CREATE TABLE `eb_comtag` (
  `tag_id` mediumint(10) NOT NULL auto_increment,
  `tag_subject` varchar(100) NOT NULL,
  `tag_num` int(10) NOT NULL default '1',
  PRIMARY KEY  (`tag_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `eb_company`;
CREATE TABLE `eb_company` (
  `com_id` int(10) unsigned NOT NULL,
  `com_uid` int(10) unsigned NOT NULL,
  `com_cid` int(10) unsigned NOT NULL,
  `com_ctid` int(10) unsigned NOT NULL,
  `com_clid` int(10) unsigned NOT NULL,
  `com_pid` int(10) unsigned NOT NULL,
  `com_tid` int(10) unsigned NOT NULL,
  `com_township` int(10) unsigned NOT NULL,
  `com_subject` varchar(100) NOT NULL,
  `com_tags` varchar(100) NOT NULL,
  `com_logo` varchar(100) NOT NULL,
  `com_content` mediumtext NOT NULL,
  `com_contact` varchar(100) NOT NULL,
  `com_phone` varchar(100) NOT NULL,
  `com_address` varchar(100) NOT NULL,
  `com_web` varchar(100) NOT NULL,
  `com_pass` int(2) unsigned NOT NULL default '0',
  `com_date` datetime NOT NULL,
  `com_admin` int(10) unsigned NOT NULL,
  `com_assistant` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`com_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `eb_lastcom`;
CREATE TABLE `eb_lastcom` (
  `last_id` int(10) unsigned NOT NULL,
  `last_uid` int(10) unsigned NOT NULL,
  `last_cid` mediumtext NOT NULL,
  `last_subject` text NOT NULL,
  PRIMARY KEY  (`last_id`)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS `eb_supply`;
CREATE TABLE `eb_supply` (
  `su_id` int(10) unsigned NOT NULL,
  `su_cid` int(10) unsigned NOT NULL,
  `su_ctid` int(10) unsigned NOT NULL,
  `su_clid` int(10) unsigned NOT NULL,
  `su_tage` mediumtext NOT NULL,
  `su_pid` int(10) unsigned NOT NULL,
  `su_tid` int(10) unsigned NOT NULL,
  `su_township` int(10) unsigned NOT NULL,
  `su_subject` varchar(100) NOT NULL,
  `su_company` int(10) NOT NULL,
  `su_logo` varchar(100) NOT NULL,
  `su_content` mediumtext NOT NULL,
  PRIMARY KEY  (`su_id`)
) ENGINE=MyISAM;