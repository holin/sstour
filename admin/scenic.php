<?php
if($option == 'index')
{
	include_once Getincludefun("page");
	$cParameter = "action=members&type={$type}&Industry={$Industry}&Keyword={$Keyword}";
	$nCount = 20;
	if($Keyword!='')
	{
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		if($type == '2')
		$where = "`sc_username` LIKE '%{$Keyword}%'";
		else
		$where = "`sc_subject` LIKE '%{$Keyword}%'";
		$smarty->assign('Keyword',$Keyword);
	}else{
		$where = "1";
	}
	$nNums = $GETSQL->fNumrows("SELECT sc_id FROM `{$ODBC['tablepre']}scenic` WHERE {$where}");
	if($nNums > 0)
	{
		$sql_hotel = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenic`","{$where}","ORDER BY `sc_sp` DESC,`sc_pass` DESC,`sc_date` DESC,`sc_id` DESC",$nPage*$nCount,$nCount);
		$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showtable",1);;
		$smarty->assign('sql_hotel',$sql_hotel);
		$smarty->assign('fpageup',$fpageup);
	}	
	$smarty->display("scenic.htm");
}
if($option == 'pass')
{
	$sql_hotel = $GETSQL->fSql("sc_uid","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_pass`='1'","`sc_id`='{$id}'");
	$GETSQL->fUpdate("`{$ODBC['tablepre']}members`","`groupid`='5'","`uid`='{$sql_hotel['sc_uid']}' AND `groupid`='3'");
	die(gb2utf8("<a href=\"javascript:getNews('showfilg{$id}','admin.php?action={$action}&option=delpass&id={$id}');\">取消</a> <a href=\"javascript:_confirm_msg_show('确定删除景区','getNews(\\\'showfilg{$id}\\\',\\\'admin.php?action={$action}&option=delhotel&id={$id}\\\');$(\\\'list{$id}\\\').parentNode.removeChild($(\\\'list{$id}\\\'))','','');\">删除</a>"));
}
if($option == 'actsp')
{
	$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_sp`='{$Industry}'","`sc_id`='{$id}'");
	die($Industry);
}
if($option == 'delpass')
{
	$sql_hotel = $GETSQL->fSql("sc_uid","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_pass`='0'","`sc_id`='{$id}'");
	$GETSQL->fUpdate("`{$ODBC['tablepre']}members`","`groupid`='3'","`uid`='{$sql_hotel['sc_uid']}' AND `groupid`='5'");
	die(gb2utf8("<a href=\"javascript:getNews('showfilg{$id}','admin.php?action={$action}&option=pass&id={$id}');\">通过</a> <a href=\"javascript:_confirm_msg_show('确定删除景区','getNews(\\\'showfilg{$id}\\\',\\\'admin.php?action={$action}&option=delhotel&id={$id}\\\');$(\\\'list{$id}\\\').parentNode.removeChild($(\\\'list{$id}\\\'))','','');\">删除</a>"));
}
if($option == 'delhotel')
{
	include_once GetLang('image');
	include_once Getincludefun("image");
	$sql_hotel = $GETSQL->fSql("sc_id,sc_logo","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	P_unlink(R_P."{$config['attach']}/{$sql_hotel['sc_logo']}/{$sql_hotel['sc_logo']}");
	$GETSQL->fDelete("`{$ODBC['tablepre']}scenicattr`","`attr_hid`='{$sql_hotel['sc_id']}'");	
	$GETSQL->fDelete("`{$ODBC['tablepre']}scenicthread`","`thr_hid`='{$sql_hotel['sc_id']}'");
	$GETSQL->fDelete("`{$ODBC['tablepre']}scenicthreadword`","`word_hid`='{$sql_hotel['sc_id']}'");
	$GETSQL->fDelete("`{$ODBC['tablepre']}scenicword`","`word_hid`='{$sql_hotel['sc_id']}'");
	$GETSQL->fDelete("`{$ODBC['tablepre']}scenicyou`","`thr_hid`='{$sql_hotel['sc_id']}'");
	$GETSQL->fDelete("`{$ODBC['tablepre']}scenicyouword`","`word_hid`='{$sql_hotel['sc_id']}'");
	$GETSQL->fDelete("`{$ODBC['tablepre']}scenic`","`sc_id`='{$sql_hotel['sc_id']}'");
	$sql_hotelimage = $GETSQL->fSql("hi_src","`{$ODBC['tablepre']}scenicimage`","`hi_hid`='{$sql_hotel['sc_id']}'");
	foreach ($sql_hotelimage AS $value)
	{
		P_unlink(R_P.$value['hi_src']);
		P_unlink(R_P.fimgsrc($value['hi_src'],'simll/'));
	}
	$GETSQL->fDelete("`{$ODBC['tablepre']}scenicimage`","`hi_hid`='{$sql_hotel['sc_id']}'");
	die(gb2utf8("删除成功"));
}
?>