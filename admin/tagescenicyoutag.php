<?php
if($option == 'index')
{
	include_once Getincludefun("page");
	$cParameter = "action=member&Keyword={$Keyword}";
	$nCount = 10;
	if($Keyword!='')
	{
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$where = "`tag_subject` LIKE '%{$Keyword}%'";
		$smarty->assign('Keyword',$Keyword);
	}else{
		$where = "1";
	}
	$nNums = $GETSQL->fNumrows("SELECT tag_id FROM `{$ODBC['tablepre']}scenicyoutag` WHERE {$where}");
	if($nNums > 0)
	{
		$sql_comtag = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicyoutag`","{$where}","ORDER BY `tag_num` DESC,`tag_id` DESC",$nPage*$nCount,$nCount);
		$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
		$smarty->assign('sql_comtag',$sql_comtag);
		$smarty->assign('fpageup',$fpageup);
	}
	$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showtable",1);
	$smarty->assign('fpageup',$fpageup);
	$smarty->display("tages.htm");
}
if($option == 'del')
{
	include_once Getincludefun("image");
	foreach ($_POST['tagid'] AS $key=>$value)
	{
		$GETSQL->fDelete("`{$ODBC['tablepre']}scenicyoutag`","`tag_id`='{$_POST['del'][$key]}'");
	}
	die(gb2utf8("É¾³ý³É¹¦"));
}
?>