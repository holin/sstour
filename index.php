<?php
$giz = !ereg('gzip',$_SERVER['HTTP_ACCEPT_ENCODING']) || $_GET['read'] == '1'? 0:1;
$giz == 1 ? ob_start("ob_gzhandler"):ob_start();
include_once "./include/config.php";
include_once "./global.php";


if($config['webclose'] == '0')
Showmsg("为了更好的服务我们的系统正在升级中...<BR>请稍后在访问，期间给您带来不便请原谅",0,'');
include_once R_P."include/sql_config.php";
include_once GetLang('cache');//调用缓存

header("Content-type:text/html; charset={$ODBC['charset']}");

if($_SERVER['QUERY_STRING']=='' && $config['main'] == '1')
include_once fRequire("main","cache");
//include_once fRequire("cache_css","cache");

$action = $_GET['action']?$_GET['action']:'index';
$option = $_GET['option']?$_GET['option']:"index";
$id = $_GET['id']?$_GET['id']:"";
$nPage = $_GET['page']?$_GET['page']:"";
$Industry = $_GET['Industry']?$_GET['Industry']:"";
$type = $_GET['type']?$_GET['type']:"";
$Keyword = $_GET['Keyword']?$_GET['Keyword']:$_POST['Keyword'];
$PHPSESSID = $_COOKIE['PHPSESSID']?$_COOKIE['PHPSESSID']:$_SESSION['PHPSESSID'];
$userop = "action=$action&id=$id&option=$option&Keyword={$Keyword}&type={$type}&page=$nPage";

$morefile = $option;
if($id!='')
$morefile .= "_I_".$id;
if($type!='')
$morefile .= "_T_".$type;
if ($Keyword!='')
$morefile .= "_Keyword_".$Keyword;
if($nPage!='')
$morefile .= "_P_".$nPage;
if ($Industry!='')
$morefile .= "_Y_".$Industry;

include_once(R_P.'Smarty/Smarty.class.php');//Smarty模板
$smarty = new Smarty;
$smarty->template_dir = R_P."template/{$config['dir']}/";
$smarty->compile_dir = R_P.'templates_c/';
$smarty->config_dir = R_P.'configs/';
$smarty->cache_dir = R_P.'cache/';
$smarty->left_delimiter = '<-{';
$smarty->right_delimiter = '}->';
$smarty->assign('boardurl',$boardurl);
$smarty->assign('configwebname',$config['webname']);
$smarty->assign('configwebmail',$config['mail']);
$smarty->assign('attach',$config['attach']);
$smarty->assign('charset',$ODBC['charset']);
$smarty->assign('POPlv',$config['copy']."<BR>".$config['live']." &nbsp; 备案：<a href='http://www.miibeian.gov.cn/' target='_blank'>".$config['icp']."</a>");
$smarty->assign('action',$action);
$smarty->assign('option',$option);
$smarty->assign('id',$id);
$smarty->assign('nPage',$nPage);
$smarty->assign('Industry',$Industry);
$smarty->assign('type',$type);
$smarty->assign('Keyword',$Keyword);
$smarty->assign('userop',$userop);
$smarty->assign('stylesheet',$cache_config['stylesheet']?$cache_config['stylesheet']:"lang/css.css");
$smarty->assign('PHPSESSID',$PHPSESSID);

if($_GET['read'] == '1')//ajax读取时不转换静态
$cache_config['htmlteml'] = '0';
include_once Getincludefun("all");//常用函数

$discuz_auth_key = md5($config['HTMLcode'].$_SERVER['HTTP_USER_AGENT']);
$c_sid = $_COOKIE['sgX_sid']?$_COOKIE['sgX_sid']:$_SESSION['sgX_sid'];//判断会员登陆
$c_auth = $_COOKIE['sgX_auth']?$_COOKIE['sgX_auth']:$_SESSION['sgX_auth'];//判断会员登陆
list($userpw, $uname, $uid) = isset($c_auth) ? explode("\t", authcode($c_auth, 'DECODE')) : array('', '', 0);
$smarty->assign('uid',$uid);
Cookie("sgX_sid",$c_sid);
Cookie("sgX_auth",$c_auth);

include_once Getincludefun("odbc");//调用数据库操作
$GETSQL = new Codbc();
$NoHtmlUrl = array('login','help','pmsg','weather','rss');
if(!in_array($action,$NoHtmlUrl))
{
	if($uid>0 && $c_auth!='')
	{
		$sql_pop = $GETSQL->fSql("a.group_action,a.group_authority,a.group_option,b.uid,b.username,b.`categories`,b.`cpid`","`{$ODBC['tablepre']}group` a,`{$ODBC['tablepre']}members` b","a.`group_id`=b.`groupid` AND b.`uid`='{$uid}'","","","","U_B");
		$smarty->assign('uname',$uname=$sql_pop['username']);
		$actionall = explode(",",$sql_pop['group_action']);
		if(!in_array($action,$actionall) && $sql_pop['group_action']!='all')
		{
			if($_GET['read'] == '1')
			die(gb2utf8("error {$action}你没有足够的权限访问本页面<BR>请联系网站管理员<a href='mailto:{$config['mail']}'>{$config['mail']}</a>"));
			Showmsg("你没有足够的权限访问本页面<BR>请联系网站管理员<a href='mailto:{$config['mail']}'>{$config['mail']}</a>",0,$_COOKIE['lasturl']?$_COOKIE['lasturl']:"index.php");
		}
	}else{
		$sql_pop = $GETSQL->fSql("group_action,group_authority,group_option","`{$ODBC['tablepre']}group`","`group_id`='1'","","","","U_B");
		$actionall = explode(",",$sql_pop['group_action']);
		if(!in_array($action,$actionall))
		{
			if($_GET['read'] == '1')
			die(gb2utf8("error 你只是游客不能访问本页面<BR>请联系网站管理员<a href='mailto:{$config['mail']}'>{$config['mail']}</a>"));
			Showmsg("你只是游客不能访问本页面<BR>请联系网站管理员<a href='mailto:{$config['mail']}'>{$config['mail']}</a>",0,$_COOKIE['lasturl']?$_COOKIE['lasturl']:"index.php");
		}
	}
}
include_once fRequire($action);//调用模块
//$GETSQL->fClos();//关闭数据库连接
fstatistics(0);

if($html_update == "yes")
{
	$html_data = ob_get_contents();
	fhtml($html_data,"html/{$action}/{$morefile}.htm",$action,"",$cahehtm);
	Cookie("lasturl",$boardurl.$_SERVER['REQUEST_URI']);
}

if($_GET['read'] == '1')
{
	if($html_data == '')
	$html_data = ob_get_contents();
	ob_end_clean();
	$mess = gb2utf8($html_data);
	die($mess);
}
//if($uid!='' && $c_auth!='' && $_GET['read'] != '1' && !in_array($action,$NoHtmlUrl) && $html_update != "yes")
//include_once fRequire("pmsg","include");
//$giz == 1 ? ob_end_flush("ob_gzhandler"):ob_end_flush();
ob_end_flush();
?>