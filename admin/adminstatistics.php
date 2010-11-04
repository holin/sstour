<?php
if($option == 'index')
{
	if($_POST['update'] == 'update')
	{
		$GETSQL->fDelete("`{$ODBC['tablepre']}statistics`","`st_admin`='1' AND TO_DAYS(`st_date`)<=TO_DAYS(NOW())-7");
		die(gb2utf8("É¾³ý³É¹¦"));
	}
	include_once Getincludefun("page");
	$cParameter = "action=adminstatistics&Keyword={$Keyword}&id={$id}&type={$type}&Industry={$Industry}";
	$nCount = 20;
	if($Keyword!='')
	{
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		if($id == "")
		$where = " AND (`st_hackname` LIKE '%{$Keyword}%' OR `st_action` LIKE '%{$Keyword}%' OR `st_option` LIKE '%{$Keyword}%' OR `st_url` LIKE '%{$Keyword}%' OR `st_ip` LIKE '%{$Keyword}%' OR `st_username` LIKE '%{$Keyword}%')";
		else if($id == "1")
		$where = " AND `st_hackname`";
		else if($id == "2")
		$where = " AND `st_action` LIKE '%{$Keyword}%'";
		else if($id == "3")
		$where = " AND `st_option` LIKE '%{$Keyword}%'";
		else if($id == "4")
		$where = " AND `st_url` LIKE '%{$Keyword}%'";
		else if($id == "5")
		$where = " AND `st_ip` LIKE '%{$Keyword}%'";
		else if($id == "6")
		$where = " AND `st_username` LIKE '%{$Keyword}%'";
		$smarty->assign('Keyword',$Keyword);
	}
	if($type!='')
	$where .= " AND TO_DAYS(`st_date`)>=TO_DAYS('{$type}')";
	if($Industry!='')
	$where .= " AND TO_DAYS(`st_date`)<=TO_DAYS('{$Industry}')";
	
	$nNums = $GETSQL->fNumrows("SELECT st_id FROM `{$ODBC['tablepre']}statistics` WHERE `st_admin`='1'{$where}");	
	$sql_statistics = $GETSQL->fSql("*","`{$ODBC['tablepre']}statistics`","`st_admin`='1'{$where}","ORDER BY `st_date` DESC,`st_id` DESC",$nPage*$nCount,$nCount);
	$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showtable",1);
	$smarty->assign('fpageup',$fpageup);
	$smarty->assign("sql_statistics",$sql_statistics);
	$smarty->display("statistics.htm");
}
?>