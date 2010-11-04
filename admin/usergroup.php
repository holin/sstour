<?php
if($option == 'index')
{
	/*
	include_once Getincludefun("page");
	if($type!='1')
	$type = 0;
	$cParameter = "action=ordering&type=$type";
	$nCount = 10;
	$nNums = $GETSQL->fNumrows("SELECT ord_id FROM `{$ODBC['tablepre']}ordering` WHERE `ord_pass`='{$type}'");
	$sql_ordering = $GETSQL->fSql("ord_id,ord_subject,ord_company,ord_type,ord_date,ord_pass","`{$ODBC['tablepre']}ordering`","`ord_pass`='{$type}'","ORDER BY `ord_date` DESC,`ord_id` DESC",$nPage*$nCount,$nCount);
	$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showtable",1);
	$smarty->assign('sql_ordering',$sql_ordering);
	$smarty->assign('fpageup',$fpageup);
	*/
	if($_POST['update'] == 'update')
	{
		if($_POST['newpwd'] == $_POST['repwd'] && $_POST['newpwd']!='')
		{
			$sql_members = $GETSQL->fSql("userpwd","`{$ODBC['tablepre']}members`","`uid`='$uid'","","","","U_B");
			if($sql_members['userpwd'] == md5($_POST['oldpwd']))
			{
				$newpwd = md5($_POST['newpwd']);
				$GETSQL->fUpdate("`{$ODBC['tablepre']}members`","`userpwd`='{$newpwd}'","`uid`='$uid'");
				die(gb2utf8("OK修改密码成功"));
			}
			die(gb2utf8("旧密码不符合"));
		}
		die(gb2utf8("两次密码不匹配"));
	}
	$smarty->display("usergroup.htm");
}
?>