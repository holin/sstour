<?php
/**
*
*  Copyright (c) 2003-06  oi77.com All rights reserved.
*  trexwb : http://www.oi77.com
*  This software is the proprietary information of oi77.com.
*
*/
if(!empty($HTTP_SERVER_VARS['REQUEST_URI']) && (strstr($HTTP_SERVER_VARS['REQUEST_URI'], "html_fun.php")))
{
	die("您没权限浏览本页<BR>如果您需要查看本页<a href='http://www.oi77.com'>请与管理员联系</a>");
}
$html_update = "";
$html_data = "";
include_once fRequire("cache_{$action}",$dir="cache",$EXE="php");
if($cache_config['cache'] == '1')
{
	$HTMLtime = abs($nowtime - filemtime(R_P."html/{$action}/{$morefile}.htm"));
	if($HTMLtime > $cache_config['cachetime'] * 60)
	$html_update = "yes";
	else{
		$cahehtm = file_exists(R_P."html/{$action}/{$morefile}.htm");
		if($cache_config['htmlteml'] == '1')
		{
			if($cahehtm && $_GET['read'] != '1'){
				$rulto = preg_replace("/%/si","%25","{$config['url']}html/{$action}/{$morefile}.htm");
				header("Location: $rulto");
				$html_update = "no";
			}elseif($cahehtm && $_GET['read'] == '1')
			$html_update = "no";
			else
			$html_update = "yes";
		}elseif($cahehtm)
		$html_update == "no";
	}
}elseif($cache_config['htmlteml'] == '1'){
	if($cahehtm = file_exists(R_P."html/{$action}/{$morefile}.htm") && $_GET['read'] != '1'){
		$rulto = preg_replace("/%/si","%25","{$config['url']}html/{$action}/{$morefile}.htm");
		header("Location: $rulto");
	}elseif($_GET['read'] == '1')
	$html_update == "no";
	else
	$html_update = "yes";
}
if($html_update == "no"){
	include_once R_P."html/{$action}/{$morefile}.htm";
	$option = "";
}

/************fhtml************/
//函数：fhtml()
//功能：生成静态页面
//日期：2005.10.08
//更改日期：2006.05.15
//使用说明：fhtml($txt,$html);
//作者：trexwb
/*****************************/
function fhtml($txt,$html,$dir="",$mu = "",$cahehtm)
{
	//$txt = file_get_contents($file);
	if($dir!='')
	{
		$newdir = explode("/",$dir);
		$listdir = "";
		foreach ($newdir AS $value)
		{
			$listdir .= "/$value";
			if(!is_dir(R_P."html$listdir"))
			mkdir(R_P."html$listdir",0777);
		}
	}
	if($mu != '')
	{
		$patterns = array("/(=)('|\"{0,1})(lang|image|attach|\.)(\/)(\W?)(.*?)(\W?)( |'|\"|>{1,2})/is");
		$replace = array("\\1\\2{$mu}\\3\\4\\5\\6\\7\\8");
		$txt = preg_replace($patterns,$replace,$txt);
	}
	if($cahehtm)
	P_unlink(R_P.$html);

	$fp = fopen(R_P.$html,"w");
	flock($fp,LOCK_EX);
	fwrite ($fp,$txt);
	fclose ($fp); //关闭指针
	if(is_dir($mu) !== TRUE){mkdir($mu,0777);}
	chmod(R_P.$html,0777);
}
?>