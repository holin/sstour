<?php
if($option == 'index')
{
	$sql_about = $GETSQL->fSql("group_id,group_system,group_name,group_admin","`{$ODBC['tablepre']}group`","","ORDER BY`group_id` DESC");
	$smarty->assign('sql_about',$sql_about);
	$smarty->display("popgroup.htm");
}
if($option == 'edit')
{
	if($_POST['update'] == 'update')
	{
		fgetposttoupdatd($_POST,$ODBC['charset']);
		if(is_array($_POST['pop']))
		$authority = implode(",",$_POST['pop']);
		else
		$authority = "";
		if(is_array($_POST['act']))
		$autaction = implode(",",$_POST['act']);
		else
		$autaction = "";
		if(is_array($_POST['atts']))
		$attsaction = implode(",",$_POST['atts']);
		else
		$attsaction = "";
		if($_POST['group_id'] == '')
		{
			if($_POST['group_system'] == 'private' || $_POST['group_system'] == 'member' || $_POST['group_system'] == 'system')
			{
				$cQuery = array("`group_system`","`group_name`","`group_admin`","`group_action`","`group_authority`","`group_option`");
				$cData = array($_POST['group_system'],$_POST['group_name'],$_POST['group_admin'],$autaction,$authority,$attsaction);
				$GETSQL->fInsert("`{$ODBC['tablepre']}group`",$cQuery,$cData);
				die(gb2utf8("用户组操作完成"));
			}
		}
		if($_POST['group_id']!="")
		{
			if($_POST['group_system'] == 'private' || $_POST['group_system'] == 'member' || $_POST['group_system'] == 'system')
			{
				$GETSQL->fUpdate("`{$ODBC['tablepre']}group`",
				"`group_system`='{$_POST['group_system']}',
				`group_name`='{$_POST['group_name']}',
				`group_admin`='{$_POST['group_admin']}',
				`group_action`='{$autaction}',
				`group_authority`='{$authority}',
				`group_option`='{$attsaction}'","`group_id`='{$_POST['group_id']}'");
				die(gb2utf8("用户组操作完成"));
			}
		}
		die(gb2utf8("用户组操作失败"));
	}
	$sql_group = $GETSQL->fSql("*","`{$ODBC['tablepre']}group`","`group_id`='{$id}'","","","","U_B");
	$smarty->assign('sql_group',$sql_group);
	$sql_admin = $GETSQL->fSql("*","`{$ODBC['tablepre']}admin`","","ORDER BY`type_id`");
	$smarty->assign('authority',explode(",",$sql_group['group_authority']));
	$smarty->assign('sql_admin',$sql_admin);
	$sql_hack = $GETSQL->fSql("hack_action,hack_subject","`{$ODBC['tablepre']}hack`","","");
	$smarty->assign('groupaction',explode(",",$sql_group['group_action']));
	$smarty->assign('sql_hack',$sql_hack);
	$sql_action = $GETSQL->fSql("action_action,action_subject","`{$ODBC['tablepre']}action`","","");
	$smarty->assign('groupactionadmin',explode(",",$sql_group['group_option']));
	$smarty->assign('sql_action',$sql_action);
	$smarty->display("popgroup.htm");
}
if($option == 'del')
{
	$GETSQL->fDelete("`{$ODBC['tablepre']}group`","`group_id`='{$id}' AND `group_system`!='administrator'","1");
	die(gb2utf8("删除成功"));
}
?>