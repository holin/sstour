<?php


//echo "<script>window.location ='/index.htm';</script>";

session_save_path($config['sessionpath']);
//session_cache_limiter('private, must-revalidate');
session_cache_limiter();
session_start();
/**
*
*  Copyright (c) 2003-06  oi77.com All rights reserved.
*  trexwb : http://www.oi77.com
*  This software is the proprietary information of oi77.com.
*

if(!empty($HTTP_SERVER_VARS['REQUEST_URI']) && (strstr($HTTP_SERVER_VARS['REQUEST_URI'], "global.php")))
{
	die("您没权限浏览本页<BR>如果您需要查看本页<a href='http://www.oi77.com'>请与管理员联系</a>");
}
*/
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting($config['error']);
//@ini_set('register_globals',1);
set_magic_quotes_runtime(0);
set_time_limit(0);

$mtime = explode(' ', microtime());
$m_time = $mtime[1] + $mtime[0];
$nowtime = $_SERVER['REQUEST_TIME']?$_SERVER['REQUEST_TIME']:time();
//$nowtime = time();

$mb_convert_encoding = function_exists('mb_convert_encoding');
$iconv = function_exists('iconv');
define('R_P',__FILE__ ? getdirname(__FILE__).'/' : './');
define('ICONV', $iconv);
define('M_B', $mb_convert_encoding);

if($config['self'] == '1')
{
	$cooktime = $_COOKIE['lasttime']?$_COOKIE['lasttime']:$_SESSION['lasttime'];
	$time = $nowtime - $cooktime;
	Cookie("lasttime",$nowtime);
	if($_SERVER['HTTP_X_FORWARDED_FOR'] != '' && $time < 3)
	Showmsg("Refresh");
	elseif($time < 15 && $_COOKIE['self'] > 5){
		Showmsg("Refresh");
	}elseif($time < 15 && $_COOKIE['self'] < 5){
		$self = $_COOKIE['self'] + 1;
		Cookie("self",$self);
	}else
	Cookie("self",'0');
}

$PHP_SELF = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : getenv("SCRIPT_NAME");
$boardurl = 'http://'.$_SERVER['HTTP_HOST'].preg_replace("/\/+(api|archiver|wap)?\/*$/i", '', substr($PHP_SELF, 0, strrpos($PHP_SELF, '/'))).'/';

if(PHP_VERSION < '4.1.0') {
	$_GET = &$HTTP_GET_VARS;
	$_POST = &$HTTP_POST_VARS;
	$_COOKIE = &$HTTP_COOKIE_VARS;
	$_SERVER = &$HTTP_SERVER_VARS;
	$_ENV = &$HTTP_ENV_VARS;
	$_FILES = &$HTTP_POST_FILES;
}

$magic_quotes_gpc = get_magic_quotes_gpc();
//$register_globals = ini_get('register_globals');
if(!$_SESSION['admin'])
{
	if(!$magic_quotes_gpc)
	{
		Add_S($_POST);
		Add_S($_GET);
		Add_S($_COOKIE);
		Add_S($_FILES);
		Add_S($_SERVER);
	}else{
		Add_d($_POST);
		Add_d($_GET);
		Add_d($_COOKIE);
		Add_d($_FILES);
		Add_d($_SERVER);
	}
}

if(getenv('HTTP_CLIENT_IP') && strcasecmp(getenv('HTTP_CLIENT_IP'), 'unknown')) {
	$onlineip = getenv('HTTP_CLIENT_IP');
} elseif(getenv('HTTP_X_FORWARDED_FOR') && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), 'unknown')) {
	$onlineip = getenv('HTTP_X_FORWARDED_FOR');
} elseif(getenv('REMOTE_ADDR') && strcasecmp(getenv('REMOTE_ADDR'), 'unknown')) {
	$onlineip = getenv('REMOTE_ADDR');
} elseif(isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], 'unknown')) {
	$onlineip = $_SERVER['REMOTE_ADDR'];
}
$onlineip = preg_replace("/^([\d\.]+).*/", "\\1", $onlineip);

if($config['error'] == "1")
error_reporting(E_ALL ^ E_NOTICE);


/*
* 功能：函数库
* 作者：trexwb
*/

/************post_host************/
//函数：post_host()
//功能：检查提交数据的主机
//日期：2006.03.17
//更改日期：
//使用说明：post_host()
//作者：trexwb
/*****************************/
function post_host()
{
	preg_match("/^(http:\/\/)?([^\/]+)/i",$_SERVER['HTTP_REFERER'], $matches);
	if($matches[2]!=$_SERVER['HTTP_HOST'])
	die('防止站外提交已经开启，请不要使用防火墙或者从外部提交数据');
}
/************fCharchr************/
//函数：fCharchr()
//功能：过滤字符
//日期：2006.05.15
//更改日期：
//使用说明：fCharchr(字符)
//作者：trexwb
/*****************************/
function fCharchr($str)
{
	$str = trim(ltrim($str));
	$str = str_replace("\#","&123123",$str);
	$str = str_replace("`","\`",$str);
	$str = str_replace('&nbsp;',' ',$str);
	$str = str_replace('&amp;','&',$str);
	$str = str_replace('"','&quot;',$str);
	$str = str_replace("'",'&#39;',$str);
	$str = str_replace("<","&lt;",$str);
	$str = str_replace(">","&gt;",$str);
	$str = str_replace("\t"," &nbsp; &nbsp;",$str);
	$str = str_replace("\r","",$str);
	$str = str_replace("$","\$",$str);
	$str = str_replace("   "," &nbsp; ",$str);
	return $str;
}
/************fShowhtml************/
//函数：fShowhtml()
//功能：去掉标签显示纯文本
//日期：2006.05.15
//更改日期：
//使用说明：fShowhtml(整句)
//作者：trexwb
/*****************************/
function fShowhtml($cLong)
{
	global $config;
	$cLong = trim(ltrim($cLong));
	$var_regexp = "((\\\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)(\[[a-zA-Z0-9\-\.\[\]_\"\'\$\x7f-\xff]+\])*)";
	$const_regexp = "([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)";
	if($config['html'] == '1')
	{
		$search = array ("/<script[^>]*?>.*?<\/script>/si",  // 去掉 javascript
		"/<\?xml.*?>/si",  				// 去掉 xml
		"/<st1.*?>/si",
		"/<\/st1.*?>/si",
		"/<[\/\!]*?[^<>]*?>/si",           // 去掉 HTML 标记
		"/([\r\n])[\s]+/i",                 // 去掉空白字符
		"/&(quot|#34);/i",                 // 替换 HTML 实体
		"/&(amp|#38);/i",
		"/&(lt|#60);/i",
		"/&(gt|#62);/i",
		"/&(nbsp|#160);/i",
		"/&(iexcl|#161);/i",
		"/&(cent|#162);/i",
		"/&(pound|#163);/i",
		"/&(copy|#169);/i",
		"/&#(\d+);/e",
		"/<\?/si",
		"/\?>/si");                    // 作为 PHP 代码运行
		$replace = array ("","","","","","","","","","","","","","","","","&lt;?","?&gt;");
	}else{
		$search = array ("/<script[^>]*?>.*?<\/script>/si",  // 去掉 javascript
		"/<\?xml.*?>/si",  				// 去掉 xml
		"/<st1.*?>/si",
		"/<\/st1.*?>/si",
		"/([\r\n])[\s]+/i",                 // 去掉空白字符
		"/&#(\d+);/e",
		"/<\?/si",
		"/\?>/si");                    // 作为 PHP 代码运行
		$replace = array ("","","","","","","&lt;?","?&gt;");
	}
	$cLong = preg_replace($search,$replace,$cLong);
	return $cLong;
}
/************Add_S************/
//函数：Add_S()
//功能：GET/POST/COOKIE传递安全
//日期：2006.03.17
//更改日期：
//使用说明：取post值的时候只能取$P[key] fGetpost($_GET,$_POST,$_COOKIE,$P)
//作者：trexwb
/*****************************/
function Add_S(&$array)
{
	global $config;
	if(is_array($array))
	{
		foreach($array as $key=>$value){
			if(!is_array($value)){
				if($value == ' ')
				$array[$key]="";
				if($config['html'] == '1')
				$array[$key] = fCharchr($value);
				else{
					$value = fShowhtml($value);
					$array[$key]=addslashes(trim(ltrim($value)));
				}
			}else
			Add_S($array[$key]);
		}
	}else{
		if($array == ' ')
		$array="";
		if($config['html'] == '1')
		$array = fCharchr($array);
		else{
			$array = fShowhtml($array);
			$array=addslashes(trim(ltrim($array)));
		}
	}
}
/************Add_d************/
//函数：Add_d()
//功能：GET/POST/COOKIE传递安全
//日期：2006.03.17
//更改日期：
//使用说明：取post值的时候只能取$P[key] fGetpost($_GET,$_POST,$_COOKIE,$P)
//作者：trexwb
/*****************************/
function Add_d(&$array)
{
	global $config;
	if(is_array($array))
	{
		foreach($array as $key=>$value){
			if(!is_array($value)){
				if($value == ' ')
				$array[$key]="";
				if($config['html'] == '1')
				$array[$key] = fCharchr($value);
				else
				$array[$key] = fShowhtml(trim(ltrim($value)));
			}else{
				Add_d($array[$key]);
			}
		}
	}else{
		if($array == ' ')
		$array="";
		if($config['html'] == '1')
		$array = fCharchr($array);
		else
		$array = fShowhtml(trim(ltrim($array)));
	}
}
/************post_host************/
//函数：Cookie()
//功能：cookie和session
//日期：2006.03.17
//更改日期：
//使用说明：Cookie($ck_Var,$ck_Value,$ck_Time = 'F')
//作者：trexwb
/*****************************/
function Cookie($ck_Var,$ck_Value,$ck_Time = 'F'){
	global $config,$nowtime;
	if($config['session'] == '1')
	{
		if($ck_Time == '0' && $ck_Value == '')
		{
			session_destroy();
			session_unset();
		}elseif($ck_Time == 'F' && $ck_Value == ''){
			session_destroy($ck_Var);
			session_unregister($ck_Var);
		}else{
			if(!session_is_registered($ck_Var))
			session_register($ck_Var);
			$_SESSION[$ck_Var] = $ck_Value;
		}
	}else{
		//$ck_Time = $ck_Time == 'F' ? $nowtime + 31536000 : ($ck_Value == '' && $ck_Time == 0 ? $nowtime - 31536000 : $ck_Time);
		$ck_Time = $ck_Time == 'F' ? $nowtime + $config['online'] : ($ck_Value == '' && $ck_Time == 0 ? $nowtime - $config['online'] : $ck_Time);
		$S		 = $_SERVER['SERVER_PORT'] == '443' ? 1:0;
		!$config['cookiepath'] && $config['cookiepath'] = '/';
		setCookie($ck_Var,$ck_Value,$ck_Time,$config['cookiepath'],$config['cookiedomain'],$S);
	}
}
/************getdirname************/
//函数：getdirname()
//功能：取得当前目录地址
//日期：2006.05.15
//更改日期：
//使用说明：getdirname(当前路径)
//作者：trexwb
/*****************************/
function getdirname($path){
	if(strpos($path,'\\')!==false){
		return substr($path,0,strrpos($path,'\\'));
	}elseif(strpos($path,'/')!==false){
		return substr($path,0,strrpos($path,'/'));
	}else{
		return '/';
	}
}
/************Showmsg************/
//函数：Showmsg()
//功能：取得当前目录地址
//日期：2006.05.15
//更改日期：
//使用说明：Showmsg(当前路径)
//作者：trexwb
/*****************************/
function Showmsg($msg_info,$dejump=1,$URL="index.php"){
	global $config,$boardurl;
	include_once GetLang('msg');
	if($dejump=="1"){
		$showquit = "<meta http-equiv='refresh' content='1;url={$URL}'><a href='{$URL}'>如果您的浏览器没有自动跳转,请点击这里</a>";
	}elseif ($dejump=="2"){
		header("Location: $URL");
		exit;
	}else
	$showquit = "<a href='javascript:history.go(-1);'>返回继续操作</a>";
	$lang[$msg_info] && $msg_info=$lang[$msg_info];
	include_once PrintEot('quit');
	exit;
}

function GetLang($lang,$EXE="php"){
	$path=R_P."lang/lang_$lang.{$EXE}";
	!file_exists($path) && $path=R_P."lang/lang_$lang.{$EXE}";
	return $path;
}
function GetCache($cache,$EXE="php"){
	$path=R_P."cache/cache_$cache.{$EXE}";
	!file_exists($path) && $path="";
	return $path;
}
function PrintEot($template,$EXE="htm"){
	global $config;
	if(!$template) $template=N;
	$path=R_P."template/{$config['dir']}/{$template}.{$EXE}";
	!file_exists($path) && $path=R_P."template/default/index.{$EXE}";
	return $path;
}
function fRequire($template,$dir="require",$EXE="php")
{
	$path=R_P."$dir/{$template}.{$EXE}";
	!file_exists($path) && $path=R_P."require/index.{$EXE}";
	return $path;
}
function Getincludefun($lang,$EXE="php"){
	$path=R_P."include/{$lang}_fun.$EXT";
	!file_exists($path) && $path=R_P."include/{$lang}_fun.{$EXE}";
	return $path;
}

function fstatistics($admin=0)
{
	global $GETSQL,$ODBC,$nowtime,$action,$option,$_SERVER,$onlineip,$uid,$uname;
	$cQuery = array("`st_id`","`st_admin`","`st_action`","`st_option`","`st_url`","`st_ip`","`st_uid`","`st_username`","`st_date`");
	$cData = array($nowtime,$admin,$action,$option,$_SERVER['REQUEST_URI'],$onlineip,$uid,$uname,fgetdate());
	$GETSQL->fInsert("`{$ODBC['tablepre']}statistics`",$cQuery,$cData);
}
?>