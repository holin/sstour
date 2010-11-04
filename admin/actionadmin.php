<?php
if($option == 'index')
{
	if($_POST['update'] == 'update')
	{
		fgetposttoupdatd($_POST,$ODBC['charset']);
		if($_POST['addaction'] != '')
		{
			$cQuery = array("`action_action`","`action_subject`");
			$cData = array($_POST['addaction'],$_POST['addsubject']);
			$GETSQL->fInsert("`{$ODBC['tablepre']}action`",$cQuery,$cData);
		}
		foreach ($_POST['action'] AS $k=>$v)
		{
			$GETSQL->fUpdate("`{$ODBC['tablepre']}action`","`action_action`='{$_POST['action_action'][$v]}',
			`action_subject`='{$_POST['action_subject'][$v]}'","`action_action`='{$v}'");
		}
		die(gb2utf8("插件设置修改成功"));
	}
	$sql_config = $GETSQL->fSql("*","`{$ODBC['tablepre']}action`","","");
	$smarty->assign('sql_config',$sql_config);
	$smarty->display("actionadmin.htm");
}
if($option == 'del')
{
	$GETSQL->fDelete("`{$ODBC['tablepre']}action`","`action_action`='{$id}'","1");
	die(gb2utf8("删除成功"));
}
?>