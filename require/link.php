<?php
if($actionhtml = GetCache($action) && $_POST['update'] != 'update')
{
	include_once $actionhtml;
	include_once Getincludefun("html");
	$smarty->assign('cache_config',$cache_config);
}
if($option == 'index')
{
	$smarty->assign('config',array(
	'title' => "{$cache_config['subject']}",
	'keywords' =>$config['keywords']."_{$cache_config['subject']}",
	'description' => $config['description']."_{$cache_config['subject']}"));
	
	if($_POST['update'] == 'update')
	{
		fgetposttoupdatd($_POST,$ODBC['charset']);
		if($_POST['addsubject'] != '' && $_POST['addurl']!='')
		{
			$cQuery = array("`link_id`","`link_subject`", "`link_url`", "`link_info`", "`link_logo`");
			$cData = array($nowtime,$_POST['addsubject'],$_POST['addurl'],$_POST['addinfo'],$_POST['addlogo']);
			$GETSQL->fInsert("`{$ODBC['tablepre']}link`",$cQuery,$cData);
			die(gb2utf8("友情连接申请成功等待管理员通过"));
		}
		die(gb2utf8("友情连接申请失败"));
	}

	$nCount = $cache_config['numser']?$cache_config['numser']:"20";
	$cParameter = "action=$action&option=$option";
	
	$nNums = $GETSQL->fNumrows("SELECT link_id FROM `{$ODBC['tablepre']}link` WHERE `link_pass`>0");
	if($nNums > 0)
	{
		$sql_link = $GETSQL->fSql("*","`{$ODBC['tablepre']}link`","`link_pass`>0","ORDER BY `link_pass` DESC,`link_sp` DESC,`link_id` DESC",$nPage*$nCount,$nCount);
		if($nNums > $nCount)
		{
			$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
			$smarty->assign('fpageup',$fpageup);
		}
	}
	$smarty->assign('sql_link',$sql_link);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("link.htm");
}
if($option == 'about')
{
	$sql_about = $GETSQL->fSql("*","`{$ODBC['tablepre']}about`","`about_id`='{$id}'","","","","U_B");	
	$smarty->assign('config',array(
	'title' => "{$sql_about['about_subject']}",
	'keywords' =>$config['keywords']."_{$sql_about['about_subject']}",
	'description' => $config['description']."_{$sql_about['about_subject']}"));
	$smarty->assign('sql_about',$sql_about);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("aboutifo.htm");
}
?>