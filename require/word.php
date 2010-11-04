<?php
if($option == 'hotelword')
{
	$sql_hotel = $GETSQL->fSql("hot_id","`{$ODBC['tablepre']}hotel`","`hot_id`='{$_POST['hid']}'","","","","U_B");
	if($sql_hotel['hot_id']=='')
	die(gb2utf8("酒店不存在不能留言"));
	if($_POST['gdcode'] != '' && $_POST['message'] != '' && $_POST['hid']!='')
	{
		$upauth = $_COOKIE['authnum']?$_COOKIE['authnum']:$_SESSION['authnum'];
		Cookie("authnum",'');
		if($_POST['gdcode'] == $upauth)
		{
			fgetposttoupdatd($_POST,$ODBC['charset']);
			$cQuery = array("`word_id`","`word_hid`", "`word_uid`", "`word_username`", "`word_content`","`word_ip`","`word_date`");
			$cData = array($nowtime,$_POST['hid'],$uid,$_POST['nickname'],$_POST['message'],$onlineip,fgetdate());
			$GETSQL->fInsert("`{$ODBC['tablepre']}hotelword`",$cQuery,$cData);
			if($actionhtml = GetCache('hotel'))
			{
				include_once $actionhtml;
				if($cache_config['cache'] == '1')
				{
					P_unlink(R_P."html/hotel/hotelword_I_{$_POST['hid']}.htm");
					ffile("{$boardurl}index.php?action=hotel&option=hotelword&id={$_POST['hid']}",'',"r");
				}
			}
			die(gb2utf8("留言成功"));
		}
		die(gb2utf8("认证码出错"));
	}
	die(gb2utf8("留言失败"));
}
if($option == 'hotelthreadword')
{
	$sql_hotel = $GETSQL->fSql("hot_id","`{$ODBC['tablepre']}hotel`","`hot_id`='{$_POST['hid']}'","","","","U_B");
	if($sql_hotel['hot_id']=='')
	die(gb2utf8("酒店不存在不能留言"));
	if($_POST['gdcode'] != '' && $_POST['message'] != '' && $_POST['hid']!='')
	{
		$upauth = $_COOKIE['authnum']?$_COOKIE['authnum']:$_SESSION['authnum'];
		Cookie("authnum",'');
		if($_POST['gdcode'] == $upauth)
		{
			fgetposttoupdatd($_POST,$ODBC['charset']);
			$cQuery = array("`word_id`","`word_hid`","`word_tid`","`word_uid`", "`word_username`", "`word_content`","`word_ip`","`word_date`");
			$cData = array($nowtime,$_POST['hid'],$_POST['tid'],$uid,$_POST['nickname'],$_POST['message'],$onlineip,fgetdate());
			$GETSQL->fInsert("`{$ODBC['tablepre']}hotelthreadword`",$cQuery,$cData);
			if($actionhtml = GetCache('hotel'))
			{
				include_once $actionhtml;
				if($cache_config['cache'] == '1')
				{
					P_unlink(R_P."html/hotel/showthreadword_I_{$_POST['hid']}_Y_{$_POST['tid']}.htm");
					ffile("{$boardurl}index.php?action=hotel&option=showthreadword&id={$_POST['hid']}&Industry={$_POST['tid']}",'',"r");
				}
			}
			die(gb2utf8("留言成功"));
		}
		die(gb2utf8("认证码出错"));
	}
	die(gb2utf8("留言失败"));
}
if($option == 'hotelyouword')
{
	$sql_hotel = $GETSQL->fSql("hot_id","`{$ODBC['tablepre']}hotel`","`hot_id`='{$_POST['hid']}'","","","","U_B");
	if($sql_hotel['hot_id']=='')
	die(gb2utf8("酒店不存在不能留言"));
	if($_POST['gdcode'] != '' && $_POST['message'] != '' && $_POST['hid']!='')
	{
		$upauth = $_COOKIE['authnum']?$_COOKIE['authnum']:$_SESSION['authnum'];
		Cookie("authnum",'');
		if($_POST['gdcode'] == $upauth)
		{
			fgetposttoupdatd($_POST,$ODBC['charset']);
			$cQuery = array("`word_id`","`word_hid`","`word_tid`","`word_uid`", "`word_username`", "`word_content`","`word_ip`","`word_date`");
			$cData = array($nowtime,$_POST['hid'],$_POST['tid'],$uid,$_POST['nickname'],$_POST['message'],$onlineip,fgetdate());
			$GETSQL->fInsert("`{$ODBC['tablepre']}hotelyouword`",$cQuery,$cData);
			if($actionhtml = GetCache('hotel'))
			{
				include_once $actionhtml;
				if($cache_config['cache'] == '1')
				{
					P_unlink(R_P."html/hotel/showyouword_I_{$_POST['hid']}_Y_{$_POST['tid']}.htm");
					ffile("{$boardurl}index.php?action=hotel&option=showyouword&id={$_POST['hid']}&Industry={$_POST['tid']}",'',"r");
				}
			}
			die(gb2utf8("留言成功"));
		}
		die(gb2utf8("认证码出错"));
	}
	die(gb2utf8("留言失败"));
}
if($option == 'scenicattrword')
{
	$sql_hotel = $GETSQL->fSql("sc_id","`{$ODBC['tablepre']}scenic`","`sc_id`='{$_POST['hid']}'","","","","U_B");
	if($sql_hotel['sc_id']=='')
	die(gb2utf8("景区不存在不能留言"));
	if($_POST['gdcode'] != '' && $_POST['message'] != '' && $_POST['hid']!='')
	{
		$upauth = $_COOKIE['authnum']?$_COOKIE['authnum']:$_SESSION['authnum'];
		Cookie("authnum",'');
		if($_POST['gdcode'] == $upauth)
		{
			fgetposttoupdatd($_POST,$ODBC['charset']);
			$cQuery = array("`word_id`","`word_hid`","`word_tid`","`word_uid`", "`word_username`", "`word_content`","`word_ip`","`word_date`");
			$cData = array($nowtime,$_POST['hid'],$_POST['tid'],$uid,$_POST['nickname'],$_POST['message'],$onlineip,fgetdate());
			$GETSQL->fInsert("`{$ODBC['tablepre']}scenicattrword`",$cQuery,$cData);
			if($actionhtml = GetCache('scenic'))
			{
				include_once $actionhtml;
				if($cache_config['cache'] == '1')
				{
					P_unlink(R_P."html/scenic/showscenicattrword_I_{$_POST['hid']}Y_{$_POST['tid']}.htm");
					ffile("{$boardurl}index.php?action=scenic&option=showscenicattrword&id={$_POST['hid']}&Industry={$_POST['tid']}",'',"r");
				}
			}
			die(gb2utf8("留言成功"));
		}
		die(gb2utf8("认证码出错"));
	}
	die(gb2utf8("留言失败"));
}
if($option == 'scenicthreadword')
{
	$sql_hotel = $GETSQL->fSql("sc_id","`{$ODBC['tablepre']}scenic`","`sc_id`='{$_POST['hid']}'","","","","U_B");
	if($sql_hotel['sc_id']=='')
	die(gb2utf8("景区不存在不能留言"));
	if($_POST['gdcode'] != '' && $_POST['message'] != '' && $_POST['hid']!='')
	{
		$upauth = $_COOKIE['authnum']?$_COOKIE['authnum']:$_SESSION['authnum'];
		Cookie("authnum",'');
		if($_POST['gdcode'] == $upauth)
		{
			fgetposttoupdatd($_POST,$ODBC['charset']);
			$cQuery = array("`word_id`","`word_hid`","`word_tid`","`word_uid`", "`word_username`", "`word_content`","`word_ip`","`word_date`");
			$cData = array($nowtime,$_POST['hid'],$_POST['tid'],$uid,$_POST['nickname'],$_POST['message'],$onlineip,fgetdate());
			$GETSQL->fInsert("`{$ODBC['tablepre']}scenicthreadword`",$cQuery,$cData);
			if($actionhtml = GetCache('scenic'))
			{
				include_once $actionhtml;
				if($cache_config['cache'] == '1')
				{
					P_unlink(R_P."html/scenic/showthreadword_I_{$_POST['hid']}Y_{$_POST['tid']}.htm");
					ffile("{$boardurl}index.php?action=scenic&option=showthreadword&id={$_POST['hid']}&Industry={$_POST['tid']}",'',"r");
				}
			}
			die(gb2utf8("留言成功"));
		}
		die(gb2utf8("认证码出错"));
	}
	die(gb2utf8("留言失败"));
}
if($option == 'scenicyouword')
{
	$sql_hotel = $GETSQL->fSql("sc_id","`{$ODBC['tablepre']}scenic`","`sc_id`='{$_POST['hid']}'","","","","U_B");
	if($sql_hotel['sc_id']=='')
	die(gb2utf8("景区不存在不能留言"));
	if($_POST['gdcode'] != '' && $_POST['message'] != '' && $_POST['hid']!='')
	{
		$upauth = $_COOKIE['authnum']?$_COOKIE['authnum']:$_SESSION['authnum'];
		Cookie("authnum",'');
		if($_POST['gdcode'] == $upauth)
		{
			fgetposttoupdatd($_POST,$ODBC['charset']);
			$cQuery = array("`word_id`","`word_hid`","`word_tid`","`word_uid`", "`word_username`", "`word_content`","`word_ip`","`word_date`");
			$cData = array($nowtime,$_POST['hid'],$_POST['tid'],$uid,$_POST['nickname'],$_POST['message'],$onlineip,fgetdate());
			$GETSQL->fInsert("`{$ODBC['tablepre']}scenicyouword`",$cQuery,$cData);
			if($actionhtml = GetCache('scenic'))
			{
				include_once $actionhtml;
				if($cache_config['cache'] == '1')
				{
					P_unlink(R_P."html/scenic/showyouword_I_{$_POST['hid']}Y_{$_POST['tid']}.htm");
					ffile("{$boardurl}index.php?action=scenic&option=showyouword&id={$_POST['hid']}&Industry={$_POST['tid']}",'',"r");
				}
			}
			die(gb2utf8("留言成功"));
		}
		die(gb2utf8("认证码出错"));
	}
	die(gb2utf8("留言失败"));
}
if($option == 'scenicword')
{
	$sql_hotel = $GETSQL->fSql("sc_id","`{$ODBC['tablepre']}scenic`","`sc_id`='{$_POST['hid']}'","","","","U_B");
	if($sql_hotel['sc_id']=='')
	die(gb2utf8("酒店不存在不能留言"));
	if($_POST['gdcode'] != '' && $_POST['message'] != '' && $_POST['hid']!='')
	{
		$upauth = $_COOKIE['authnum']?$_COOKIE['authnum']:$_SESSION['authnum'];
		Cookie("authnum",'');
		if($_POST['gdcode'] == $upauth)
		{
			fgetposttoupdatd($_POST,$ODBC['charset']);
			$cQuery = array("`word_id`","`word_hid`", "`word_uid`", "`word_username`", "`word_content`","`word_ip`","`word_date`");
			$cData = array($nowtime,$_POST['hid'],$uid,$_POST['nickname'],$_POST['message'],$onlineip,fgetdate());
			$GETSQL->fInsert("`{$ODBC['tablepre']}scenicword`",$cQuery,$cData);
			if($actionhtml = GetCache('scenic'))
			{
				include_once $actionhtml;
				if($cache_config['cache'] == '1')
				{
					P_unlink(R_P."html/scenic/hotelword_I_{$_POST['hid']}.htm");
					ffile("{$boardurl}index.php?action=scenic&option=scenicword&id={$_POST['hid']}",'',"r");
				}
			}
			die(gb2utf8("留言成功"));
		}
		die(gb2utf8("认证码出错"));
	}
	die(gb2utf8("留言失败"));
}
if($option == 'travelthreadword')
{
	$sql_hotel = $GETSQL->fSql("sc_id","`{$ODBC['tablepre']}travel`","`sc_id`='{$_POST['hid']}'","","","","U_B");
	if($sql_hotel['sc_id']=='')
	die(gb2utf8("景区不存在不能留言"));
	if($_POST['gdcode'] != '' && $_POST['message'] != '' && $_POST['hid']!='')
	{
		$upauth = $_COOKIE['authnum']?$_COOKIE['authnum']:$_SESSION['authnum'];
		Cookie("authnum",'');
		if($_POST['gdcode'] == $upauth)
		{
			fgetposttoupdatd($_POST,$ODBC['charset']);
			$cQuery = array("`word_id`","`word_hid`","`word_tid`","`word_uid`", "`word_username`", "`word_content`","`word_ip`","`word_date`");
			$cData = array($nowtime,$_POST['hid'],$_POST['tid'],$uid,$_POST['nickname'],$_POST['message'],$onlineip,fgetdate());
			$GETSQL->fInsert("`{$ODBC['tablepre']}travelthreadword`",$cQuery,$cData);
			if($actionhtml = GetCache('travel'))
			{
				include_once $actionhtml;
				if($cache_config['cache'] == '1')
				{
					P_unlink(R_P."html/travel/showthreadword_I_{$_POST['hid']}Y_{$_POST['tid']}.htm");
					ffile("{$boardurl}index.php?action=travel&option=showthreadword&id={$_POST['hid']}&Industry={$_POST['tid']}",'',"r");
				}
			}
			die(gb2utf8("留言成功"));
		}
		die(gb2utf8("认证码出错"));
	}
	die(gb2utf8("留言失败"));
}
if($option == 'travelyouword')
{
	$sql_hotel = $GETSQL->fSql("sc_id","`{$ODBC['tablepre']}travel`","`sc_id`='{$_POST['hid']}'","","","","U_B");
	if($sql_hotel['sc_id']=='')
	die(gb2utf8("景区不存在不能留言"));
	if($_POST['gdcode'] != '' && $_POST['message'] != '' && $_POST['hid']!='')
	{
		$upauth = $_COOKIE['authnum']?$_COOKIE['authnum']:$_SESSION['authnum'];
		Cookie("authnum",'');
		if($_POST['gdcode'] == $upauth)
		{
			fgetposttoupdatd($_POST,$ODBC['charset']);
			$cQuery = array("`word_id`","`word_hid`","`word_tid`","`word_uid`", "`word_username`", "`word_content`","`word_ip`","`word_date`");
			$cData = array($nowtime,$_POST['hid'],$_POST['tid'],$uid,$_POST['nickname'],$_POST['message'],$onlineip,fgetdate());
			$GETSQL->fInsert("`{$ODBC['tablepre']}travelyouword`",$cQuery,$cData);
			if($actionhtml = GetCache('travel'))
			{
				include_once $actionhtml;
				if($cache_config['cache'] == '1')
				{
					P_unlink(R_P."html/travel/showyouword_I_{$_POST['hid']}Y_{$_POST['tid']}.htm");
					ffile("{$boardurl}index.php?action=travel&option=showyouword&id={$_POST['hid']}&Industry={$_POST['tid']}",'',"r");
				}
			}
			die(gb2utf8("留言成功"));
		}
		die(gb2utf8("认证码出错"));
	}
	die(gb2utf8("留言失败"));
}
if($option == 'travelattrword')
{
	$sql_hotel = $GETSQL->fSql("sc_id","`{$ODBC['tablepre']}travel`","`sc_id`='{$_POST['hid']}'","","","","U_B");
	if($sql_hotel['sc_id']=='')
	die(gb2utf8("景区不存在不能留言"));
	if($_POST['gdcode'] != '' && $_POST['message'] != '' && $_POST['hid']!='')
	{
		$upauth = $_COOKIE['authnum']?$_COOKIE['authnum']:$_SESSION['authnum'];
		Cookie("authnum",'');
		if($_POST['gdcode'] == $upauth)
		{
			fgetposttoupdatd($_POST,$ODBC['charset']);
			$cQuery = array("`word_id`","`word_hid`","`word_tid`","`word_uid`", "`word_username`", "`word_content`","`word_ip`","`word_date`");
			$cData = array($nowtime,$_POST['hid'],$_POST['tid'],$uid,$_POST['nickname'],$_POST['message'],$onlineip,fgetdate());
			$GETSQL->fInsert("`{$ODBC['tablepre']}travelattrword`",$cQuery,$cData);
			if($actionhtml = GetCache('travel'))
			{
				include_once $actionhtml;
				if($cache_config['cache'] == '1')
				{
					P_unlink(R_P."html/travel/showtravelattrword_I_{$_POST['hid']}Y_{$_POST['tid']}.htm");
					ffile("{$boardurl}index.php?action=travel&option=showtravelattrword&id={$_POST['hid']}&Industry={$_POST['tid']}",'',"r");
				}
			}
			die(gb2utf8("留言成功"));
		}
		die(gb2utf8("认证码出错"));
	}
	die(gb2utf8("留言失败"));
}
if($option == 'travelword')
{
	$sql_hotel = $GETSQL->fSql("sc_id","`{$ODBC['tablepre']}travel`","`sc_id`='{$_POST['hid']}'","","","","U_B");
	if($sql_hotel['sc_id']=='')
	die(gb2utf8("酒店不存在不能留言"));
	if($_POST['gdcode'] != '' && $_POST['message'] != '' && $_POST['hid']!='')
	{
		$upauth = $_COOKIE['authnum']?$_COOKIE['authnum']:$_SESSION['authnum'];
		Cookie("authnum",'');
		if($_POST['gdcode'] == $upauth)
		{
			fgetposttoupdatd($_POST,$ODBC['charset']);
			$cQuery = array("`word_id`","`word_hid`", "`word_uid`", "`word_username`", "`word_content`","`word_ip`","`word_date`");
			$cData = array($nowtime,$_POST['hid'],$uid,$_POST['nickname'],$_POST['message'],$onlineip,fgetdate());
			$GETSQL->fInsert("`{$ODBC['tablepre']}travelword`",$cQuery,$cData);
			if($actionhtml = GetCache('travel'))
			{
				include_once $actionhtml;
				if($cache_config['cache'] == '1')
				{
					P_unlink(R_P."html/travel/hotelword_I_{$_POST['hid']}.htm");
					ffile("{$boardurl}index.php?action=travel&option=travelword&id={$_POST['hid']}",'',"r");
				}
			}
			die(gb2utf8("留言成功"));
		}
		die(gb2utf8("认证码出错"));
	}
	die(gb2utf8("留言失败"));
}
?>