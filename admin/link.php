<?php
if($option == 'index')
{
	if($_POST['update'] == 'update')
	{
		fgetposttoupdatd($_POST,$ODBC['charset']);
		if($_POST['addsubject'] != '')
		{
			$cQuery = array("`link_id`","`link_subject`", "`link_url`", "`link_info`", "`link_logo`","`link_sp`","`link_pass`");
			$cData = array($nowtime,$_POST['addsubject'],$_POST['addurl'],$_POST['addinfo'],$_POST['addlogo'],$_POST['addsp'],$_POST['addpass']);
			$GETSQL->fInsert("`{$ODBC['tablepre']}link`",$cQuery,$cData);
		}
		if(is_array($_POST['link_id']))
		{
			foreach ($_POST['link_id'] AS $k=>$v)
			{
				//$sql_config = $GETSQL->fSql("*","`{$ODBC['tablepre']}main`","`main_subject`='{$k}'","","","","U_B");
				$GETSQL->fUpdate("`{$ODBC['tablepre']}link`","`link_subject`='{$_POST['link_subject'][$v]}',
			`link_url`='{$_POST['link_url'][$v]}',
			`link_info`='{$_POST['link_info'][$v]}',
			`link_logo`='{$_POST['link_logo'][$v]}',
			`link_sp`='{$_POST['link_sp'][$v]}',
			`link_pass`='{$_POST['link_pass'][$v]}'","`link_id`='{$v}'");
			}
		}
		die(gb2utf8("友情连接修改成功"));
	}
	$nCount = $cache_config['numser']?$cache_config['numser']:"10";
	$cParameter = "action={$action}&option={$option}";
	include_once Getincludefun("page");
	$nNums = $GETSQL->fNumrows("SELECT link_id FROM `{$ODBC['tablepre']}link`");
	$sql_link = $GETSQL->fSql("*","`{$ODBC['tablepre']}link`","","ORDER BY `link_sp`,`link_id` DESC",$nPage*$nCount,$nCount);
	if($nNums > 0)
	{
		$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showtable",1);
		$smarty->assign('sql_link',$sql_link);
		$smarty->assign('fpageup',$fpageup);
	}
	$smarty->display("link.htm");
}
if($option == 'del')
{
	$GETSQL->fDelete("`{$ODBC['tablepre']}link`","`link_id`='{$id}'","1");
	die(gb2utf8("友情连接删除成功"));
}
if($option == 'pass')
{
	$GETSQL->fUpdate("`{$ODBC['tablepre']}link`","`link_pass`='{$type}'","`link_id`='{$id}'");
	die(gb2utf8("友情连接操作成功"));
}
?>