<?php
if($actionhtml = GetCache($action))
{
	include_once $actionhtml;
	include_once Getincludefun("html");
	$smarty->assign('cache_config',$cache_config);
}
if($option == 'index')
{
	$smarty->assign('config',array(
	'title' => "{$cache_config['subject']}",
	'keywords' =>$config['keywords']."_{$cache_config['subject']}",
	'description' => $config['description']."_{$cache_config['subject']}"));

	$nCount = $cache_config['numser']?$cache_config['numser']:"20";
	$cParameter = "action=$action&option=$option&id=$id&Industry=$Industry&Keyword={$Keyword}";
	include_once Getincludefun("page");

	if($Keyword)
	{
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$where = "`sc_subject` LIKE '%{$Keyword}%' AND `sc_pass`='1'";
	}else{
		$where = "`sc_pass`='1'";
	}

	$nNums = $GETSQL->fNumrows("SELECT sc_id FROM `{$ODBC['tablepre']}scenic` WHERE {$where}");
	if($nNums > 0)
	{
		$sql_scenic = $GETSQL->fSql("sc_id,sc_subject,sc_logo,sc_info","`{$ODBC['tablepre']}scenic`","{$where}","ORDER BY `sc_sp` DESC,`sc_date` DESC,`sc_id` DESC",$nPage*$nCount,$nCount);
		foreach ($sql_scenic AS $key => $value)
		{
			$sql_scenic[$key]['sc_info'] = fconurt($value['sc_info']);
		}
		if($nNums > $nCount)
		{
			$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
			$smarty->assign('fpageup',$fpageup);
		}
	}
	$smarty->assign('sql_scenic',$sql_scenic);

	$smarty->assign('rentime',fmicrotime());
	$smarty->display("scenics.htm");
}
if($option == 'single')
{
	$sql_scenic = $GETSQL->fSql("sc_id,sc_uid,sc_subject,sc_start,sc_pass","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	if($sql_scenic['sc_pass'] != '1')
	Showmsg('景区还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_see`=`sc_see`+1","`sc_id`='{$id}'");
	
	if($Keyword!='')
	{
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$hotelimagewhere = "`hi_hid`='{$id}' AND `hi_subject` LIKE '%{$Keyword}%'";
		$hotelroomwhere = "`attr_hid`='{$id}' AND `attr_subject` LIKE '%{$Keyword}%'";
		$hotelthreadwhere = "`thr_hid`='{$id}' AND `thr_subject` LIKE '%{$Keyword}%'";
		$hotelyouwhere = "`thr_hid`='{$id}' AND `thr_subject` LIKE '%{$Keyword}%'";
	}else{
		$hotelimagewhere = "`hi_hid`='{$id}'";
		$hotelroomwhere = "`attr_hid`='{$id}'";
		$hotelthreadwhere = "`thr_hid`='{$id}'";
		$hotelyouwhere = "`thr_hid`='{$id}'";
	}
	
	include_once GetLang('image');
	include_once Getincludefun("image");
	$sql_hotelimage = $GETSQL->fSql("hi_id,hi_hid,hi_subject,hi_src","`{$ODBC['tablepre']}scenicimage`","{$hotelimagewhere}","ORDER BY `hi_date` DESC,`hi_id` DESC",0,8);
	foreach ($sql_hotelimage AS $key=>$value)
	{
		$sql_hotelimage[$key]['hi_src'] = fimgsrc($value['hi_src'],'simll/');
	}	
	$smarty->assign('sql_hotelimage',$sql_hotelimage);
	
	$sql_hotelroom = $GETSQL->fSql("attr_id,attr_hid,attr_subject","`{$ODBC['tablepre']}scenicattr`","{$hotelroomwhere}","ORDER BY `attr_date` DESC,`attr_id` DESC",0,12);
	$smarty->assign('sql_hotelroom',$sql_hotelroom);
	
	$sql_hotelthread = $GETSQL->fSql("thr_id,thr_hid,thr_subject","`{$ODBC['tablepre']}scenicthread`","{$hotelthreadwhere}","ORDER BY `thr_date` DESC,`thr_id` DESC",0,12);
	$smarty->assign('sql_hotelthread',$sql_hotelthread);
	
	$sql_hotelyou = $GETSQL->fSql("thr_id,thr_hid,thr_subject","`{$ODBC['tablepre']}scenicyou`","$hotelyouwhere","ORDER BY `thr_date` DESC,`thr_id` DESC",0,12);
	$smarty->assign('sql_hotelyou',$sql_hotelyou);
	
	$smarty->assign('config',array(
	'title' => "{$sql_scenic['sc_subject']}",
	'keywords' =>$config['keywords']."{$sql_scenic['sc_subject']}_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_scenic['sc_subject']}_{$cache_config['subject']}"));

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_scenic',$sql_scenic);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("scenic.htm");
}
if($option == 'scenicattrs')
{
	$sql_scenic = $GETSQL->fSql("sc_id,sc_uid,sc_subject,sc_start,sc_pass","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	if($sql_scenic['sc_pass'] != '1')
	Showmsg('景区还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_see`=`sc_see`+1","`sc_id`='{$id}'");

	$nCount = $cache_config['numser']?$cache_config['numser']:"10";
	$cParameter = "action=$action&option=$option&id=$id";
	include_once Getincludefun("page");
	$nNums = $GETSQL->fNumrows("SELECT attr_id FROM `{$ODBC['tablepre']}scenicattr` WHERE `attr_hid`='{$id}'");
	if($nNums > 0)
	{
		$sql_scenicattr = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicattr`","`attr_hid`='{$id}'","ORDER BY `attr_date` DESC,`attr_id` DESC",$nPage*$nCount,$nCount);
		if($nNums > $nCount)
		{
			$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
			$smarty->assign('fpageup',$fpageup);
		}
		$smarty->assign('sql_scenicattr',$sql_scenicattr);
	}

	$smarty->assign('config',array(
	'title' => "{$sql_scenic['sc_subject']}_景点",
	'keywords' =>$config['keywords']."{$sql_scenic['sc_subject']}_景点_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_scenic['sc_subject']}_景点_{$cache_config['subject']}"));

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_scenic',$sql_scenic);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("scenicattrs.htm");
}
if($option == 'scenicattr')
{
	$sql_scenic = $GETSQL->fSql("sc_id,sc_uid,sc_subject,sc_start,sc_pass","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	if($sql_scenic['sc_pass'] != '1')
	Showmsg('景区还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_see`=`sc_see`+1","`sc_id`='{$id}'");

	$sql_hotelthread = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicattr`","`attr_hid`='{$id}' AND `attr_id`='{$Industry}'","","","","U_B");
	$smarty->assign('sql_hotelthread',$sql_hotelthread);
	
	$smarty->assign('config',array(
	'title' => "{$sql_scenic['sc_subject']}_景点",
	'keywords' =>$config['keywords']."{$sql_scenic['sc_subject']}_景点_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_scenic['sc_subject']}_景点_{$cache_config['subject']}"));

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_scenic',$sql_scenic);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("scenicattr.htm");
}
if($option == 'showscenicattrword')
{
	$nCount = $cache_config['numser']?$cache_config['numser']:"10";
	$cParameter = "action={$action}&option={$option}&id={$id}&Industry={$Industry}";
	include_once Getincludefun("page");

	$nNums = $GETSQL->fNumrows("SELECT word_id FROM `{$ODBC['tablepre']}scenicattrword` WHERE `word_hid`='{$id}'");
	if($nNums > 0)
	{
		$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicattrword`","`word_hid`='{$id}' AND `word_tid`='{$Industry}'","ORDER BY `word_date`,`word_id`",$nPage*$nCount,$nCount);
		foreach ($sql_hotelword AS $key => $value)
		{
			$wordip = explode(".",$value['word_ip']);
			$sql_hotelword[$key]['word_ip'] = "{$wordip[0]}.{$wordip[1]}.{$wordip[2]}.*";
		}
		if($nNums > $nCount)
		{
			$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showscenicattrword",1);
			$smarty->assign('fpageup',$fpageup);
		}
		$smarty->assign('sql_hotelword',$sql_hotelword);
	}

	$smarty->display("scenicattrword.htm");
}
if($option == 'showscenicphoto')
{
	include_once GetLang('image');
	include_once Getincludefun("image");
	$sql_hotelimage = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicimage`","`hi_hid`='{$id}' AND `hi_pass`='1'","ORDER BY `hi_date` DESC,`hi_id` DESC",0,6);
	foreach ($sql_hotelimage AS $value)
	{
		echo "<li class='xspace-avatarlist xspace-imgstyle'><a href='{$boardurl}index.php?action=scenic&option=scenicphoto&id={$value['hi_hid']}&Industry={$value['hi_id']}' target='_blank'><img src='".fimgsrc($value['hi_src'],'simll/')."' alt='{$value['hi_subject']}' /></a></li>";
	}
}
if($option == 'showscenicinfo')
{
	$sql_hotel = $GETSQL->fSql("sc_info","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	echo $sql_hotel['sc_info'];
}
if($option == 'showscenictraffic')
{
	$sql_hotel = $GETSQL->fSql("sc_traffic","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	echo $sql_hotel['sc_traffic'];
}
if($option == 'showsceniclist')
{
	$sql_hotel = $GETSQL->fSql("sc_article,sc_album,sc_room,sc_date,sc_see","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	$hotdate = explode(" ",$sql_hotel['sc_date']);
	echo "<li>访问量: {$sql_hotel['sc_see']}</li>
	<li>资讯数: {$sql_hotel['sc_article']}</li>
	<li>相册数: {$sql_hotel['sc_album']}</li>
	<li>景点数: {$sql_hotel['sc_room']}</li>
	<li>建立时间: {$hotdate[0]}</li>";
}
if($option == 'article')
{
	$sql_scenic = $GETSQL->fSql("sc_id,sc_uid,sc_subject,sc_start,sc_pass","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	if($sql_scenic['sc_pass'] != '1')
	Showmsg('景区还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_see`=`sc_see`+1","`sc_id`='{$id}'");

	$nCount = $cache_config['numser']?$cache_config['numser']:"10";
	$cParameter = "action=$action&option=$option&id=$id";
	include_once Getincludefun("page");
	$nNums = $GETSQL->fNumrows("SELECT thr_id FROM `{$ODBC['tablepre']}scenicthread` WHERE `thr_hid`='{$id}'");
	if($nNums > 0)
	{
		$sql_hotelthread = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicthread`","`thr_hid`='{$id}'","ORDER BY `thr_date` DESC,`thr_id` DESC",$nPage*$nCount,$nCount);
		if($nNums > $nCount)
		{
			$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
			$smarty->assign('fpageup',$fpageup);
		}
		$smarty->assign('sql_hotelthread',$sql_hotelthread);
	}

	$smarty->assign('config',array(
	'title' => "{$sql_scenic['sc_subject']}",
	'keywords' =>$config['keywords']."{$sql_scenic['sc_subject']}_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_scenic['sc_subject']}_{$cache_config['subject']}"));

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_scenic',$sql_scenic);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("scenicarticle.htm");
}
if($option == 'thread')
{
	$sql_scenic = $GETSQL->fSql("sc_id,sc_uid,sc_subject,sc_start,sc_pass","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	if($sql_scenic['sc_pass'] != '1')
	Showmsg('景区还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_see`=`sc_see`+1","`sc_id`='{$id}'");

	$sql_hotelthread = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicthread`","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'","","","","U_B");
	$smarty->assign('sql_hotelthread',$sql_hotelthread);

	$GETSQL->fUpdate("`{$ODBC['tablepre']}scenicthread`","`thr_views`=`thr_views`+1","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'");

	$smarty->assign('config',array(
	'title' => "{$sql_scenic['sc_subject']}",
	'keywords' =>$config['keywords']."{$sql_scenic['sc_subject']}_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_scenic['sc_subject']}_{$cache_config['subject']}"));

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_scenic',$sql_scenic);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("scenicthread.htm");
}
if($option == 'showthreadword')
{
	$nCount = $cache_config['numser']?$cache_config['numser']:"10";
	$cParameter = "action={$action}&option={$option}&id={$id}&Industry={$Industry}";
	include_once Getincludefun("page");

	$nNums = $GETSQL->fNumrows("SELECT word_id FROM `{$ODBC['tablepre']}scenicthreadword` WHERE `word_hid`='{$id}'");
	if($nNums > 0)
	{
		$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicthreadword`","`word_hid`='{$id}' AND `word_tid`='{$Industry}'","ORDER BY `word_date`,`word_id`",$nPage*$nCount,$nCount);
		foreach ($sql_hotelword AS $key => $value)
		{
			$wordip = explode(".",$value['word_ip']);
			$sql_hotelword[$key]['word_ip'] = "{$wordip[0]}.{$wordip[1]}.{$wordip[2]}.*";
		}
		if($nNums > $nCount)
		{
			$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showthreadword",1);
			$smarty->assign('fpageup',$fpageup);
		}
		$smarty->assign('sql_hotelword',$sql_hotelword);
	}

	$smarty->display("scenicthreadword.htm");
}
if($option == 'scenicyou')
{
	$sql_scenic = $GETSQL->fSql("sc_id,sc_uid,sc_subject,sc_start,sc_pass","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	if($sql_scenic['sc_pass'] != '1')
	Showmsg('景区还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_see`=`sc_see`+1","`sc_id`='{$id}'");

	$nCount = $cache_config['numser']?$cache_config['numser']:"10";
	$cParameter = "action=$action&option=$option&id=$id";
	include_once Getincludefun("page");
	$nNums = $GETSQL->fNumrows("SELECT thr_id FROM `{$ODBC['tablepre']}scenicyou` WHERE `thr_hid`='{$id}'");
	if($nNums > 0)
	{
		$sql_hotelthread = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicyou`","`thr_hid`='{$id}'","ORDER BY `thr_date` DESC,`thr_id` DESC",$nPage*$nCount,$nCount);
		if($nNums > $nCount)
		{
			$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
			$smarty->assign('fpageup',$fpageup);
		}
		$smarty->assign('sql_hotelthread',$sql_hotelthread);
	}

	$smarty->assign('config',array(
	'title' => "{$sql_scenic['sc_subject']}",
	'keywords' =>$config['keywords']."{$sql_scenic['sc_subject']}_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_scenic['sc_subject']}_{$cache_config['subject']}"));

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_scenic',$sql_scenic);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("scenicyou.htm");
}
if($option == 'scenicyouthread')
{
	$sql_scenic = $GETSQL->fSql("sc_id,sc_uid,sc_subject,sc_start,sc_pass","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	if($sql_scenic['sc_pass'] != '1')
	Showmsg('景区还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_see`=`sc_see`+1","`sc_id`='{$id}'");

	$sql_hotelthread = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicyou`","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'","","","","U_B");
	$smarty->assign('sql_hotelthread',$sql_hotelthread);

	$GETSQL->fUpdate("`{$ODBC['tablepre']}scenicyou`","`thr_views`=`thr_views`+1","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'");

	$smarty->assign('config',array(
	'title' => "{$sql_scenic['sc_subject']}",
	'keywords' =>$config['keywords']."{$sql_scenic['sc_subject']}_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_scenic['sc_subject']}_{$cache_config['subject']}"));

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_scenic',$sql_scenic);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("scenicyouthread.htm");
}
if($option == 'showyouword')
{
	$nCount = $cache_config['numser']?$cache_config['numser']:"10";
	$cParameter = "action={$action}&option={$option}&id={$id}&Industry={$Industry}";
	include_once Getincludefun("page");

	$nNums = $GETSQL->fNumrows("SELECT word_id FROM `{$ODBC['tablepre']}scenicyouword` WHERE `word_hid`='{$id}'");
	if($nNums > 0)
	{
		$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicyouword`","`word_hid`='{$id}' AND `word_tid`='{$Industry}'","ORDER BY `word_date`,`word_id`",$nPage*$nCount,$nCount);
		foreach ($sql_hotelword AS $key => $value)
		{
			$wordip = explode(".",$value['word_ip']);
			$sql_hotelword[$key]['word_ip'] = "{$wordip[0]}.{$wordip[1]}.{$wordip[2]}.*";
		}
		if($nNums > $nCount)
		{
			$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showyouword",1);
			$smarty->assign('fpageup',$fpageup);
		}
		$smarty->assign('sql_hotelword',$sql_hotelword);
	}

	$smarty->assign('sql_hotel',$sql_hotel);
	$smarty->display("scenicyouword.htm");
}
if($option == 'showscenictage')
{
	$sql_hotel = $GETSQL->fSql("sc_tages","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	$hot_tages = explode(",",$sql_hotel['sc_tages']);
	foreach ($hot_tages AS $value)
	{
		$showtages .= " <a href='javascript:;' title='{$value}' onclick=\"showtextcontent('index.php?action=scenic&option=showtage&Keyword='+escape('{$value}'))\">{$value}</a> ";
	}
	echo $showtages;
}
if($option == 'showscenicattr')
{
	include_once GetLang('image');
	include_once Getincludefun("image");
	$sql_hotelroom = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicattr`","`attr_hid`='{$id}'","ORDER BY `attr_date` DESC,`attr_id` DESC",0,6);
	foreach ($sql_hotelroom AS $value)
	{
		echo "<li><a href='{$boardurl}index.php?action=scenic&option=scenicattr&id={$value['attr_hid']}&Industry={$value['attr_id']}' target='_blank'>".fCharlen($value['attr_subject'],0,20)."</a></li>";
	}
}
if($option == 'showhotlogo')
{
	$sql_hotel = $GETSQL->fSql("sc_id,sc_subject,sc_logo,sc_contact,sc_phone","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	if($sql_hotel['sc_logo']!='')
	{
		echo "<img src='{$sql_hotel['sc_logo']}' alt='{$sql_hotel['sc_subject']}' class='xspace-imgstyle' />";
	}else{
		echo "<img src='image/lvyou/image.gif' alt='{$sql_hotel['sc_subject']}' class='xspace-imgstyle' />";
	}
	echo "<p align=left style='padding-left:10px'>联系人：{$sql_hotel['sc_contact']}<BR>电话：{$sql_hotel['sc_phone']}</p>";
}
if($option == 'scenicphoto')
{
	$sql_scenic = $GETSQL->fSql("sc_id,sc_uid,sc_subject,sc_start,sc_pass","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	if($sql_scenic['sc_pass'] != '1')
	Showmsg('景区还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_see`=`sc_see`+1","`sc_id`='{$id}'");

	include_once GetLang('image');
	include_once Getincludefun("image");
	if($Industry != '')
	{
		$sql_hotelimage = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicimage`","`hi_hid`='{$id}' AND `hi_id`='{$Industry}'","","","","U_B");
		$smarty->assign('sql_hotelimage',$sql_hotelimage);
	}else{
		$nCount = "20";
		$cParameter = "action=$action&option=$option&id=$id";
		include_once Getincludefun("page");
		$nNums = $GETSQL->fNumrows("SELECT hi_id FROM `{$ODBC['tablepre']}scenicimage` WHERE `hi_hid`='{$id}'");
		if($nNums > 0)
		{
			$sql_hotelimage = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicimage`","`hi_hid`='{$id}'","ORDER BY `hi_date` DESC,`hi_id` DESC",$nPage*$nCount,$nCount);
			foreach ($sql_hotelimage AS $key => $value)
			{
				$sql_hotelimage[$key]['hi_src'] = fimgsrc($value['hi_src'],'simll/');
			}
			if($nNums > $nCount)
			{
				$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
				$smarty->assign('fpageup',$fpageup);
			}
			$smarty->assign('sql_hotelimage',$sql_hotelimage);
		}
	}

	$smarty->assign('config',array(
	'title' => "{$sql_scenic['sc_subject']}",
	'keywords' =>$config['keywords']."{$sql_scenic['sc_subject']}_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_scenic['sc_subject']}_{$cache_config['subject']}"));

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_scenic',$sql_scenic);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("scenicphoto.htm");
}
if($option == 'scenicword')
{
	$sql_scenic = $GETSQL->fSql("sc_id,sc_uid,sc_subject,sc_start,sc_pass","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	if($sql_scenic['sc_pass'] != '1')
	Showmsg('酒店还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_see`=`hot_see`+1","`sc_id`='{$id}'");

	$smarty->assign('config',array(
	'title' => "{$sql_hotel['sc_subject']}_留言",
	'keywords' =>$config['keywords']."{$sql_hotel['sc_subject']}_留言_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_hotel['sc_subject']}_留言_{$cache_config['subject']}"));

	$nCount = $cache_config['numser']?$cache_config['numser']:"10";
	$cParameter = "action={$action}&option={$option}&id={$id}&Industry={$Industry}&type={$type}&Keyword={$Keyword}";
	include_once Getincludefun("page");

	$nNums = $GETSQL->fNumrows("SELECT word_id FROM `{$ODBC['tablepre']}scenicword` WHERE `word_hid`='{$id}'");
	if($nNums > 0)
	{
		$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicword`","`word_hid`='{$id}'","ORDER BY `word_date` DESC,`word_id` DESC",$nPage*$nCount,$nCount);
		foreach ($sql_hotelword AS $key => $value)
		{
			$wordip = explode(".",$value['word_ip']);
			$sql_hotelword[$key]['word_ip'] = "{$wordip[0]}.{$wordip[1]}.{$wordip[2]}.*";
		}
		if($nNums > $nCount)
		{
			$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
			$smarty->assign('fpageup',$fpageup);
		}
		$smarty->assign('sql_hotelword',$sql_hotelword);
	}

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_scenic',$sql_scenic);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("scenicword.htm");
}

if($option == 'showtage')
{
	if($Keyword!='')
	{
		$morekey = $Keyword;
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$sql_company = $GETSQL->fSql("sc_id,sc_subject","`{$ODBC['tablepre']}scenic`","`sc_tages` LIKE '%{$Keyword}%' AND `sc_pass`='1'","",0,10);
		foreach ($sql_company AS $value)
		{
			echo "<div style='border-bottom:1px solid #02884D;'><a target='_blank' href='{$boardurl}index.php?action=scenic&option=single&id={$value['sc_id']}'>{$value['sc_subject']}</a></div>";
		}
		echo "<div align=right><a href='{$boardurl}index.php?action=tages&option=scenic&Keyword={$morekey}'>更多</a></div>";
	}else{
		$sql_company = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}scenictag`","","ORDER BY `tag_num` DESC",0,20);
		foreach ($sql_company AS $value)
		{
			echo " <a onclick=\"ftexttageshtml('{$value['tag_subject']}')\">{$value['tag_subject']}</a> ";
		}
	}
}
if($option == 'showattrtag')
{
	if($Keyword!='')
	{
		$morekey = $Keyword;
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$sql_company = $GETSQL->fSql("attr_id,attr_hid,attr_subject","`{$ODBC['tablepre']}scenicattr`","`attr_tages` LIKE '%{$Keyword}%'","",0,10);
		foreach ($sql_company AS $value)
		{
			echo "<div style='border-bottom:1px solid #02884D;'><a target='_blank' href='{$boardurl}index.php?action=scenic&option=scenicattr&id={$value['attr_hid']}&Industry={$value['attr_id']}'>{$value['attr_subject']}</a></div>";
		}
		echo "<div align=right><a href='{$boardurl}index.php?action=tages&option=scenicattr&Keyword={$morekey}'>更多</a></div>";
	}else{
		$sql_company = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}scenicattrtag`","","ORDER BY `tag_num` DESC",0,20);
		foreach ($sql_company AS $value)
		{
			echo " <a onclick=\"ftexttageshtml('{$value['tag_subject']}')\">{$value['tag_subject']}</a> ";
		}
	}
}
if($option == 'showthreadtage')
{
	if($Keyword!='')
	{
		$morekey = $Keyword;
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$sql_company = $GETSQL->fSql("thr_id,thr_hid,thr_subject","`{$ODBC['tablepre']}scenicthread`","`thr_tages` LIKE '%{$Keyword}%'","",0,10);
		foreach ($sql_company AS $value)
		{
			echo "<div style='border-bottom:1px solid #02884D;'><a target='_blank' href='{$boardurl}index.php?action=scenic&option=thread&id={$value['thr_hid']}&Industry={$value['thr_id']}'>{$value['thr_subject']}</a></div>";
		}
		echo "<div align=right><a href='{$boardurl}index.php?action=tages&option=scenicthread&Keyword={$morekey}'>更多</a></div>";
	}else{
		$sql_company = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}scenicthreadtag`","","ORDER BY `tag_num` DESC",0,20);
		foreach ($sql_company AS $value)
		{
			echo " <a onclick=\"ftexttageshtml('{$value['tag_subject']}')\">{$value['tag_subject']}</a> ";
		}
	}
}
if($option == 'showyoutage')
{
	if($Keyword!='')
	{
		$morekey = $Keyword;
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$sql_company = $GETSQL->fSql("thr_id,thr_hid,thr_subject","`{$ODBC['tablepre']}scenicyou`","`thr_tages` LIKE '%{$Keyword}%'","",0,10);
		foreach ($sql_company AS $value)
		{
			echo "<div style='border-bottom:1px solid #02884D;'><a target='_blank' href='{$boardurl}index.php?action=scenic&option=scenicthread&id={$value['thr_hid']}&Industry={$value['thr_id']}'>{$value['thr_subject']}</a></div>";
		}
		echo "<div align=right><a href='{$boardurl}index.php?action=tages&option=scenicyou&Keyword={$morekey}'>更多</a></div>";
	}else{
		$sql_company = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}scenicyoutag`","","ORDER BY `tag_num` DESC",0,20);
		foreach ($sql_company AS $value)
		{
			echo " <a onclick=\"ftexttageshtml('{$value['tag_subject']}')\">{$value['tag_subject']}</a> ";
		}
	}
}
?>