<?php
if($option == 'index')
{
	include_once Getincludefun("page");
	$cParameter = "action=images&Keyword={$Keyword}";
	$nCount = 10;
	if($Keyword!='')
	{
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$where = "`img_uid` LIKE '%{$Keyword}%'";
		$smarty->assign('Keyword',$Keyword);
	}else{
		$where = "1";
	}
	$nNums = $GETSQL->fNumrows("SELECT img_picid FROM `{$ODBC['tablepre']}images` WHERE {$where}");
	if($nNums > 0)
	{
		$sql_images = $GETSQL->fSql("*","`{$ODBC['tablepre']}images`","{$where}","ORDER BY `img_filg` DESC,`img_picid` DESC",$nPage*$nCount,$nCount);
		$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
		$smarty->assign('sql_images',$sql_images);
		$smarty->assign('fpageup',$fpageup);
	}
	$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showtable",1);
	$smarty->assign('fpageup',$fpageup);
	$smarty->display("images.htm");
}
if($option == 'del')
{
	include_once Getincludefun("image");
	foreach ($_POST['picid'] AS $key=>$value)
	{
		if($_POST['del'][$key] == $value)
		{
			$sql_images = $GETSQL->fSql("img_picid,img_picsrc","`{$ODBC['tablepre']}images`","`img_picid`='{$_POST['del'][$key]}'","","","","U_B");
			P_unlink(R_P.$sql_images['img_picsrc']);
			P_unlink(R_P.fimgsrc($sql_images['img_picsrc'],'simll/'));
			$GETSQL->fDelete("`{$ODBC['tablepre']}images`","`img_picid`='{$_POST['del'][$key]}'");	
		}
	}
	die(gb2utf8("É¾³ý³É¹¦"));
}
?>