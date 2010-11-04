<?php
if($option == 'index')
{
	include_once Getincludefun("page");
	$cParameter = "action=members&type={$type}&Industry={$Industry}&Keyword={$Keyword}";
	$nCount = 20;
	if($Keyword!='')
	{
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$whered = "a.`username` LIKE '%{$Keyword}%'";
		$smarty->assign('Keyword',$Keyword);
	}else{
		$whered = "1";
	}
	
	$nNums = $GETSQL->fNumrows("SELECT a.uid FROM `{$ODBC['tablepre']}members` a WHERE {$whered}");
	$sql_news = $GETSQL->fSql("a.*,b.group_name",
	"`{$ODBC['tablepre']}members` a LEFT JOIN `{$ODBC['tablepre']}group` b ON a.`groupid`=b.`group_id`",
	$whered,"ORDER BY a.`uid`",
	$nPage*$nCount,$nCount);
	$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showtable",1);
	$smarty->assign('sql_news',$sql_news);
	$smarty->assign('fpageup',$fpageup);
	$smarty->display("members.htm");
}
if($option == 'newsedit')
{
	if($_POST['update'] == 'update')
	{
		fgetposttoupdatd($_POST,$ODBC['charset']);
		if($_POST['uid']!=''){
			$sql_news = $GETSQL->fSql("uid,groupid","`{$ODBC['tablepre']}members`","`uid`='{$id}'","","","","U_B");
			if($sql_news['groupid']==8 && $uid!=$sql_news['uid'])
			die(gb2utf8("error 你没有权限修改超级用户"));
			if($_POST['userpwd']!='')
			{
				$userpwd = md5($_POST['userpwd']);
				$GETSQL->fUpdate("`{$ODBC['tablepre']}members`",
				"`username`='{$_POST['username']}',
				`userpwd`='{$userpwd}',
				`groupid`='{$_POST['groupid']}',
				`useremail`='{$_POST['useremail']}'","`uid`='{$_POST['uid']}'");
			}else{
				$GETSQL->fUpdate("`{$ODBC['tablepre']}members`",
				"`username`='{$_POST['username']}',
				`groupid`='{$_POST['groupid']}',
				`useremail`='{$_POST['useremail']}'","`uid`='{$_POST['uid']}'");
			}
			die(gb2utf8("修改用户{$_POST['username']}成功"));
		}
		die(gb2utf8("error 修改用户失败"));
	}
	if($id!='')
	{
		$sql_news = $GETSQL->fSql("uid,username,useremail,groupid","`{$ODBC['tablepre']}members`","`uid`='{$id}'","","","","U_B");
		$sql_newsclass = $GETSQL->fSql("*","`{$ODBC['tablepre']}group`","","ORDER BY `group_id` DESC");
		foreach ($sql_newsclass AS $value)
		{
			if($sql_news['groupid'] == $value['group_id'])
			$showoption .= "<option value='{$value['group_id']}' selected>{$value['group_name']}</option>";
			else
			$showoption .= "<option value='{$value['group_id']}'>{$value['group_name']}</option>";
		}
		$smarty->assign('sql_news',$sql_news);
		$smarty->assign('showoption',$showoption);
		$smarty->display("members.htm");
	}
}
if($option == 'del')
{
	$sql_news = $GETSQL->fSql("uid,groupid","`{$ODBC['tablepre']}members`","`uid`='{$id}'","","","","U_B");
	if($sql_news['groupid']==8 && $uid!=$sql_news['uid'])
	die(gb2utf8("error 你没有权限修改超级用户"));
	$GETSQL->fDelete("`{$ODBC['tablepre']}members`","`uid`='{$id}' && `groupid`!='8'","1");
	die(gb2utf8("删除成功"));
}
?>