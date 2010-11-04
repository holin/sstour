<?php
$giz = !ereg('gzip',$_SERVER['HTTP_ACCEPT_ENCODING']) || $_GET['read'] == '1'? 0:1;
$giz == 1 ? ob_start("ob_gzhandler"):ob_start();
include_once "./include/config.php";
$config['session'] = 1;
$config['getpost'] = 0;
$config['html'] = 0;
set_magic_quotes_runtime(0);
foreach ($_POST AS $k=>$v)
{
	$P[$k] = $v;
}
include_once "./global.php";
include_once R_P."include/sql_config.php";
include_once GetLang('cache');//调用缓存

header("Content-type:text/html; charset={$ODBC['charset']}");

$action = $_GET['action']?$_GET['action']:'index';
$option = $_GET['option']?$_GET['option']:"index";
$id = $_GET['id']?$_GET['id']:"";
$nPage = $_GET['page']?$_GET['page']:"";
$Industry = $_GET['Industry']?$_GET['Industry']:"";
$type = $_GET['type']?$_GET['type']:"";
$Keyword = $_GET['Keyword']?$_GET['Keyword']:$_POST['Keyword'];
$userop = "action={$action}&id={$id}&option={$option}&Keyword={$Keyword}&type={$type}&page={$nPage}&Industry={$Industry}";

include_once(R_P.'Smarty/Smarty.class.php');//Smarty模板
$smarty = new Smarty;
$smarty->template_dir = R_P."template/admin/";
$smarty->compile_dir = R_P.'templates_a/';
$smarty->config_dir = R_P.'configs/';
$smarty->cache_dir = R_P.'cache/';
$smarty->left_delimiter = '<-{';
$smarty->right_delimiter = '}->';
$smarty->assign('boardurl',$boardurl);
$smarty->assign('charset',$ODBC['charset']);
$smarty->assign('POPlv',$config['copy']);
$smarty->assign('attach',$config['attach']);
$smarty->assign('action',$action);
$smarty->assign('option',$option);
$smarty->assign('id',$id);
$smarty->assign('nPage',$nPage);
$smarty->assign('Industry',$Industry);
$smarty->assign('type',$type);
$smarty->assign('Keyword',$Keyword);
$smarty->assign('userop',$userop);

include_once Getincludefun("all");//常用函数

$c_sid = $_SESSION['cdb_sid'];//判断会员登陆
$c_auth = $_SESSION['cdb_auth'];//判断会员登陆
list($userpw, $uname, $uid) = isset($c_auth) ? explode("\t", authcode($c_auth, 'DECODE')) : array('', '', 0);

include_once Getincludefun("odbc");//调用数据库操作
$GETSQL = new Codbc();
if($uid<'1' || $c_auth=='')
{
	Cookie("cdb_sid",'');
	Cookie("cdb_auth",'');
	$action = "login";
}else{
	Cookie("cdb_sid",$c_sid);
	Cookie("cdb_auth",$c_auth);
	$sql_pop = $GETSQL->fSql("a.*,b.username","`{$ODBC['tablepre']}group` a,`{$ODBC['tablepre']}members` b","`group_id`=b.`groupid` AND b.`uid`='{$uid}'","","","","U_B");
	if($sql_pop['group_admin']!='1' && $sql_pop['group_system']!='administrator' && $sql_pop['group_authority']!='all')
	{
		Cookie("cdb_sid",'');
		Cookie("cdb_auth",'');
		$action = "login";
		if($_GET['read'] == '1')
		die(gb2utf8("你没有后台权限"));
		Showmsg("你没有后台权限",1,"admin.php");
	}
	$actionall = explode(",",$sql_pop['group_authority']);
	if(!in_array($action,$actionall) && $action!='index' && $action!='login' && $sql_pop['group_system']!='administrator' && $sql_pop['group_authority']!='all')
	{
		$action = "login";
		if($_GET['read'] == '1')
		die(gb2utf8("你没有功能管理权限"));
		Showmsg("你没有后台权限",1,"admin.php");
	}
	$smarty->assign('actionall',$actionall);
	$smarty->assign('uid',$uid);
	$smarty->assign('uname',$uname=$sql_pop['username']);
	$smarty->assign('groupname',$sql_pop['group_name']);
	$smarty->assign('groupsystem',$sql_pop['group_system']);
}
fstatistics(1);
include_once fRequire($action,"admin");//调用模块

if($_GET['read'] == '1')
{
	if($html_data == '')
	$html_data = ob_get_contents();
	ob_end_clean();
	$mess = gb2utf8($html_data);
	die($mess);
}
//$giz == 1 ? ob_end_flush("ob_gzhandler"):ob_end_flush();
ob_end_flush();
?>