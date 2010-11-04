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
		$where = "`hot_username` LIKE '%{$Keyword}%'";
		else
		$where = "`hot_subject` LIKE '%{$Keyword}%'";
		$smarty->assign('Keyword',$Keyword);
	}else{
		$where = "1";
	}
	$nNums = $GETSQL->fNumrows("SELECT hot_id FROM `{$ODBC['tablepre']}hotel` WHERE {$where}");
	if($nNums > 0)
	{
		$sql_hotel = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotel`","{$where}","ORDER BY `hot_sp` DESC,`hot_pass` DESC,`hot_date` DESC,`hot_id` DESC",$nPage*$nCount,$nCount);
		$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showtable",1);;
		$smarty->assign('sql_hotel',$sql_hotel);
		$smarty->assign('fpageup',$fpageup);
	}	
	$smarty->display("hotel.htm");
}
if($option == 'pass')
{
	$sql_hotel = $GETSQL->fSql("hot_uid","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_pass`='1'","`hot_id`='{$id}'");
	$GETSQL->fUpdate("`{$ODBC['tablepre']}members`","`groupid`='6'","`uid`='{$sql_hotel['hot_uid']}' AND `groupid`='3'");
	die(gb2utf8("<a href=\"javascript:getNews('showfilg{$id}','admin.php?action={$action}&option=delpass&id={$id}');\">取消</a> <a href=\"javascript:_confirm_msg_show('确定删除酒店','getNews(\\\'showfilg{$id}\\\',\\\'admin.php?action={$action}&option=delhotel&id={$id}\\\');$(\\\'list{$id}\\\').parentNode.removeChild($(\\\'list{$id}\\\'))','','');\">删除</a>"));
}
if($option == 'actsp')
{
	$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_sp`='{$Industry}'","`hot_id`='{$id}'");
	die($Industry);
}
if($option == 'start')
{
	$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_start`='{$Industry}'","`hot_id`='{$id}'");
	die($Industry);
}
if($option == 'delpass')
{
	$sql_hotel = $GETSQL->fSql("hot_uid","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_pass`='0'","`hot_id`='{$id}'");
	$GETSQL->fUpdate("`{$ODBC['tablepre']}members`","`groupid`='3'","`uid`='{$sql_hotel['hot_uid']}' AND `groupid`='6'");
	die(gb2utf8("<a href=\"javascript:getNews('showfilg{$id}','admin.php?action={$action}&option=pass&id={$id}');\">通过</a> <a href=\"javascript:_confirm_msg_show('确定删除酒店','getNews(\\\'showfilg{$id}\\\',\\\'admin.php?action={$action}&option=delhotel&id={$id}\\\');$(\\\'list{$id}\\\').parentNode.removeChild($(\\\'list{$id}\\\'))','','');\">删除</a>"));
}
if($option == 'delhotel')
{
	include_once GetLang('image');
	include_once Getincludefun("image");
	$sql_hotel = $GETSQL->fSql("hot_id,hot_logo","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	P_unlink(R_P."{$config['attach']}/{$sql_hotel['hot_logo']}/{$sql_hotel['hot_logo']}");	
	$GETSQL->fDelete("`{$ODBC['tablepre']}hotelroom`","`room_hid`='{$sql_hotel['hot_id']}'");	
	$GETSQL->fDelete("`{$ODBC['tablepre']}hotelthread`","`thr_hid`='{$sql_hotel['hot_id']}'");
	$GETSQL->fDelete("`{$ODBC['tablepre']}hotelthreadword`","`word_hid`='{$sql_hotel['hot_id']}'");
	$GETSQL->fDelete("`{$ODBC['tablepre']}hotelword`","`word_hid`='{$sql_hotel['hot_id']}'");
	$GETSQL->fDelete("`{$ODBC['tablepre']}hotelyou`","`thr_hid`='{$sql_hotel['hot_id']}'");
	$GETSQL->fDelete("`{$ODBC['tablepre']}hotelyouword`","`word_hid`='{$sql_hotel['hot_id']}'");
	$GETSQL->fDelete("`{$ODBC['tablepre']}hotel`","`hot_id`='{$sql_hotel['hot_id']}'");
	$sql_hotelimage = $GETSQL->fSql("hi_src","`{$ODBC['tablepre']}hotelimage`","`hi_hid`='{$sql_hotel['hot_id']}'");	
	foreach ($sql_hotelimage AS $value)
	{
		P_unlink(R_P.$value['hi_src']);
		P_unlink(R_P.fimgsrc($value['hi_src'],'simll/'));
	}
	$GETSQL->fDelete("`{$ODBC['tablepre']}hotelimage`","`hi_hid`='{$sql_hotel['hot_id']}'");	
	die(gb2utf8("删除成功"));
}
?>