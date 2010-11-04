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
		$where = "`hot_subject` LIKE '%{$Keyword}%' AND `hot_pass`='1'";
	}else{
		$where = "`hot_pass`='1'";
	}

	$nNums = $GETSQL->fNumrows("SELECT hot_id FROM `{$ODBC['tablepre']}hotel` WHERE {$where}");
	if($nNums > 0)
	{
		$sql_hotel = $GETSQL->fSql("hot_id,hot_subject,hot_logo,hot_info","`{$ODBC['tablepre']}hotel`","{$where}","ORDER BY `hot_sp` DESC,`hot_date` DESC,`hot_id` DESC",$nPage*$nCount,$nCount);
		foreach ($sql_hotel AS $key => $value)
		{
			$sql_hotel[$key]['hot_info'] = fconurt($value['hot_info']);
		}
		if($nNums > $nCount)
		{
			$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
			$smarty->assign('fpageup',$fpageup);
		}
	}
	$smarty->assign('sql_hotel',$sql_hotel);

	$smarty->assign('rentime',fmicrotime());
	$smarty->display("hotels.htm");
}
if($option == 'single')
{
	$sql_hotel = $GETSQL->fSql("hot_id,hot_uid,hot_subject,hot_start,hot_pass","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	if($sql_hotel['hot_pass'] != '1')
	Showmsg('酒店还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_see`=`hot_see`+1","`hot_id`='{$id}'");

	if($Keyword!='')
	{
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$hotelimagewhere = "`hi_hid`='{$id}' AND `hi_subject` LIKE '%{$Keyword}%'";
		$hotelroomwhere = "`room_hid`='{$id}' AND `room_subject` LIKE '%{$Keyword}%'";
		$hotelthreadwhere = "`thr_hid`='{$id}' AND `thr_subject` LIKE '%{$Keyword}%'";
		$hotelyouwhere = "`thr_hid`='{$id}' AND `thr_subject` LIKE '%{$Keyword}%'";
	}else{
		$hotelimagewhere = "`hi_hid`='{$id}'";
		$hotelroomwhere = "`room_hid`='{$id}'";
		$hotelthreadwhere = "`thr_hid`='{$id}'";
		$hotelyouwhere = "`thr_hid`='{$id}'";
	}

	include_once GetLang('image');
	include_once Getincludefun("image");
	$sql_hotelimage = $GETSQL->fSql("hi_id,hi_hid,hi_subject,hi_src","`{$ODBC['tablepre']}hotelimage`","{$hotelimagewhere}","ORDER BY `hi_date` DESC,`hi_id` DESC",0,8);
	foreach ($sql_hotelimage AS $key=>$value)
	{
		$sql_hotelimage[$key]['hi_src'] = fimgsrc($value['hi_src'],'simll/');
	}
	$smarty->assign('sql_hotelimage',$sql_hotelimage);

	$sql_hotelroom = $GETSQL->fSql("room_id,room_hid,room_subject,room_image","`{$ODBC['tablepre']}hotelroom`","{$hotelroomwhere}","ORDER BY `room_date` DESC,`room_id` DESC",0,8);
	$smarty->assign('sql_hotelroom',$sql_hotelroom);

	$sql_hotelthread = $GETSQL->fSql("thr_id,thr_hid,thr_subject","`{$ODBC['tablepre']}hotelthread`","{$hotelthreadwhere}","ORDER BY `thr_date` DESC,`thr_id` DESC",0,12);
	$smarty->assign('sql_hotelthread',$sql_hotelthread);

	$sql_hotelyou = $GETSQL->fSql("thr_id,thr_hid,thr_subject","`{$ODBC['tablepre']}hotelyou`","$hotelyouwhere","ORDER BY `thr_date` DESC,`thr_id` DESC",0,12);
	$smarty->assign('sql_hotelyou',$sql_hotelyou);

	$smarty->assign('config',array(
	'title' => "{$sql_hotel['hot_subject']}",
	'keywords' =>$config['keywords']."{$sql_hotel['hot_subject']}_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_hotel['hot_subject']}_{$cache_config['subject']}"));

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_hotel',$sql_hotel);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("hotel.htm");
}
if($option == 'showhottage')
{
	$sql_hotel = $GETSQL->fSql("hot_tages","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	$hot_tages = explode(",",$sql_hotel['hot_tages']);
	foreach ($hot_tages AS $value)
	{
		$showtages .= " <a href='javascript:;' title='{$value}' onclick=\"showtextcontent('index.php?action=hotel&option=showtage&Keyword='+escape('{$value}'))\">{$value}</a> ";
	}
	echo $showtages;
}
if($option == 'showhotlogo')
{
	$sql_hotel = $GETSQL->fSql("hot_id,hot_subject,hot_logo,hot_contact,hot_phone","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	if($sql_hotel['hot_logo']!='')
	{
		echo "<img src='{$sql_hotel['hot_logo']}' alt='{$sql_hotel['hot_subject']}' class='xspace-imgstyle' />";
	}else{
		echo "<img src='image/lvyou/image.gif' alt='{$sql_hotel['hot_subject']}' class='xspace-imgstyle' />";
	}
	echo "<p align=left style='padding-left:10px'>联系人：{$sql_hotel['hot_contact']}<BR>电话：{$sql_hotel['hot_phone']}</p>";
}
if($option == 'showhotroom')
{
	include_once GetLang('image');
	include_once Getincludefun("image");
	$sql_hotelroom = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelroom`","`room_hid`='{$id}' AND `room_pass`='1'","ORDER BY `room_date` DESC,`room_id` DESC",0,6);
	foreach ($sql_hotelroom AS $value)
	{
		echo "<li class='xspace-avatarlist xspace-imgstyle'><a href='{$boardurl}index.php?action=hotel&option=hotelroom&id={$value['room_hid']}&Industry={$value['room_id']}' target='_blank'><img src='{$value['room_image']}' alt='{$value['room_subject']}' /></a></li>";
	}
}
if($option == 'showhotphoto')
{
	include_once GetLang('image');
	include_once Getincludefun("image");
	$sql_hotelimage = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelimage`","`hi_hid`='{$id}' AND `hi_pass`='1'","ORDER BY `hi_date` DESC,`hi_id` DESC",0,6);
	foreach ($sql_hotelimage AS $value)
	{
		echo "<li class='xspace-avatarlist xspace-imgstyle'><a href='{$boardurl}index.php?action=hotel&option=hotelphoto&id={$value['hi_hid']}&Industry={$value['hi_id']}' target='_blank'><img src='".fimgsrc($value['hi_src'],'simll/')."' alt='{$value['hi_subject']}' /></a></li>";
	}
}
if($option == 'showhotinfo')
{
	$sql_hotel = $GETSQL->fSql("hot_info","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	echo $sql_hotel['hot_info'];
}
if($option == 'showhottraffic')
{
	$sql_hotel = $GETSQL->fSql("hot_traffic","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	echo $sql_hotel['hot_traffic'];
}
if($option == 'showhotlist')
{
	$sql_hotel = $GETSQL->fSql("hot_article,hot_album,hot_room,hot_date,hot_see","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	$hotdate = explode(" ",$sql_hotel['hot_date']);
	echo "<li>访问量: {$sql_hotel['hot_see']}</li>
	<li>资讯数: {$sql_hotel['hot_article']}</li>
	<li>相册数: {$sql_hotel['hot_album']}</li>
	<li>房间数: {$sql_hotel['hot_room']}</li>
	<li>建立时间: {$hotdate[0]}</li>";
}
if($option == 'hotelarticle')
{
	$sql_hotel = $GETSQL->fSql("hot_id,hot_uid,hot_subject,hot_start,hot_pass","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	if($sql_hotel['hot_pass'] != '1')
	Showmsg('酒店还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_see`=`hot_see`+1","`hot_id`='{$id}'");

	$nCount = $cache_config['numser']?$cache_config['numser']:"10";
	$cParameter = "action=$action&option=$option&id=$id";
	include_once Getincludefun("page");
	$nNums = $GETSQL->fNumrows("SELECT thr_id FROM `{$ODBC['tablepre']}hotelthread` WHERE `thr_hid`='{$id}'");
	if($nNums > 0)
	{
		$sql_hotelthread = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelthread`","`thr_hid`='{$id}'","ORDER BY `thr_date` DESC,`thr_id` DESC",$nPage*$nCount,$nCount);
		if($nNums > $nCount)
		{
			$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
			$smarty->assign('fpageup',$fpageup);
		}
		$smarty->assign('sql_hotelthread',$sql_hotelthread);
	}

	$smarty->assign('config',array(
	'title' => "{$sql_hotel['hot_subject']}",
	'keywords' =>$config['keywords']."{$sql_hotel['hot_subject']}_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_hotel['hot_subject']}_{$cache_config['subject']}"));

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_hotel',$sql_hotel);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("hotelarticle.htm");
}
if($option == 'hotelthread')
{
	$sql_hotel = $GETSQL->fSql("hot_id,hot_uid,hot_subject,hot_start,hot_pass","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	if($sql_hotel['hot_pass'] != '1')
	Showmsg('酒店还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_see`=`hot_see`+1","`hot_id`='{$id}'");

	$sql_hotelthread = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelthread`","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'","","","","U_B");
	$smarty->assign('sql_hotelthread',$sql_hotelthread);

	$GETSQL->fUpdate("`{$ODBC['tablepre']}hotelthread`","`thr_views`=`thr_views`+1","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'");

	$smarty->assign('config',array(
	'title' => "{$sql_hotel['hot_subject']}",
	'keywords' =>$config['keywords']."{$sql_hotel['hot_subject']}_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_hotel['hot_subject']}_{$cache_config['subject']}"));

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_hotel',$sql_hotel);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("hotelthread.htm");
}
if($option == 'showthreadword')
{
	$nCount = $cache_config['numser']?$cache_config['numser']:"10";
	$cParameter = "action={$action}&option={$option}&id={$id}&Industry={$Industry}";
	include_once Getincludefun("page");

	$nNums = $GETSQL->fNumrows("SELECT word_id FROM `{$ODBC['tablepre']}hotelthreadword` WHERE `word_hid`='{$id}'");
	if($nNums > 0)
	{
		$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelthreadword`","`word_hid`='{$id}' AND `word_tid`='{$Industry}'","ORDER BY `word_date`,`word_id`",$nPage*$nCount,$nCount);
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

	$smarty->assign('sql_hotel',$sql_hotel);
	$smarty->display("hotelthreadword.htm");
}
if($option == 'hotelyou')
{
	$sql_hotel = $GETSQL->fSql("hot_id,hot_uid,hot_subject,hot_start,hot_pass","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	if($sql_hotel['hot_pass'] != '1')
	Showmsg('酒店还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_see`=`hot_see`+1","`hot_id`='{$id}'");

	$nCount = $cache_config['numser']?$cache_config['numser']:"10";
	$cParameter = "action=$action&option=$option&id=$id";
	include_once Getincludefun("page");
	$nNums = $GETSQL->fNumrows("SELECT thr_id FROM `{$ODBC['tablepre']}hotelyou` WHERE `thr_hid`='{$id}'");
	if($nNums > 0)
	{
		$sql_hotelthread = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelyou`","`thr_hid`='{$id}'","ORDER BY `thr_date` DESC,`thr_id` DESC",$nPage*$nCount,$nCount);
		if($nNums > $nCount)
		{
			$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
			$smarty->assign('fpageup',$fpageup);
		}
		$smarty->assign('sql_hotelthread',$sql_hotelthread);
	}

	$smarty->assign('config',array(
	'title' => "{$sql_hotel['hot_subject']}",
	'keywords' =>$config['keywords']."{$sql_hotel['hot_subject']}_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_hotel['hot_subject']}_{$cache_config['subject']}"));

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_hotel',$sql_hotel);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("hotelyou.htm");
}
if($option == 'hotelyouthread')
{
	$sql_hotel = $GETSQL->fSql("hot_id,hot_uid,hot_subject,hot_start,hot_pass","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	if($sql_hotel['hot_pass'] != '1')
	Showmsg('酒店还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_see`=`hot_see`+1","`hot_id`='{$id}'");

	$sql_hotelthread = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelyou`","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'","","","","U_B");
	$smarty->assign('sql_hotelthread',$sql_hotelthread);

	$GETSQL->fUpdate("`{$ODBC['tablepre']}hotelyou`","`thr_views`=`thr_views`+1","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'");

	$smarty->assign('config',array(
	'title' => "{$sql_hotel['hot_subject']}",
	'keywords' =>$config['keywords']."{$sql_hotel['hot_subject']}_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_hotel['hot_subject']}_{$cache_config['subject']}"));

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_hotel',$sql_hotel);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("hotelyouthread.htm");
}
if($option == 'showyouword')
{
	$nCount = $cache_config['numser']?$cache_config['numser']:"10";
	$cParameter = "action={$action}&option={$option}&id={$id}&Industry={$Industry}";
	include_once Getincludefun("page");

	$nNums = $GETSQL->fNumrows("SELECT word_id FROM `{$ODBC['tablepre']}hotelyouword` WHERE `word_hid`='{$id}'");
	if($nNums > 0)
	{
		$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelyouword`","`word_hid`='{$id}' AND `word_tid`='{$Industry}'","ORDER BY `word_date`,`word_id`",$nPage*$nCount,$nCount);
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
	$smarty->display("hotelyouword.htm");
}
if($option == 'hotelphoto')
{
	$sql_hotel = $GETSQL->fSql("hot_id,hot_uid,hot_subject,hot_start,hot_pass","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	if($sql_hotel['hot_pass'] != '1')
	Showmsg('酒店还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_see`=`hot_see`+1","`hot_id`='{$id}'");

	$smarty->assign('config',array(
	'title' => "{$sql_hotel['hot_subject']}_相册",
	'keywords' =>$config['keywords']."{$sql_hotel['hot_subject']}_相册_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_hotel['hot_subject']}_相册_{$cache_config['subject']}"));

	include_once GetLang('image');
	include_once Getincludefun("image");
	if($Industry != '')
	{
		$sql_hotelimage = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelimage`","`hi_hid`='{$id}' AND `hi_id`='{$Industry}'","","","","U_B");
		$smarty->assign('sql_hotelimage',$sql_hotelimage);
	}else{
		$nCount = "20";
		$cParameter = "action=$action&option=$option&id=$id";
		include_once Getincludefun("page");
		$nNums = $GETSQL->fNumrows("SELECT hi_id FROM `{$ODBC['tablepre']}hotelimage` WHERE `hi_hid`='{$id}'");
		if($nNums > 0)
		{
			$sql_hotelimage = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelimage`","`hi_hid`='{$id}'","ORDER BY `hi_date` DESC,`hi_id` DESC",$nPage*$nCount,$nCount);
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

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_hotel',$sql_hotel);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("hotelphoto.htm");
}
if($option == 'hotelroom')
{
	$sql_hotel = $GETSQL->fSql("hot_id,hot_uid,hot_subject,hot_start,hot_pass","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	if($sql_hotel['hot_pass'] != '1')
	Showmsg('酒店还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_see`=`hot_see`+1","`hot_id`='{$id}'");

	$smarty->assign('config',array(
	'title' => "{$sql_hotel['hot_subject']}_房间",
	'keywords' =>$config['keywords']."{$sql_hotel['hot_subject']}_房间_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_hotel['hot_subject']}_房间_{$cache_config['subject']}"));

	$nCount = $cache_config['numser']?$cache_config['numser']:"10";
	$cParameter = "action={$action}&option={$option}&id={$id}&Industry={$Industry}&type={$type}&Keyword={$Keyword}";
	include_once Getincludefun("page");
	if($Industry!='')
	{
		$wheres[] = "`room_id`='{$Industry}'";
	}
	if($type == 't' && $Keyword!='')
	{
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$wheres[] = "`room_tages` LIKE '%{$Keyword}%'";
	}
	if($type == 's' && $Keyword!='')
	{
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$wheres[] = "`room_subject` LIKE '%{$Keyword}%'";
	}
	if(is_array($wheres))
	{
		$wheres[] = "`room_hid`='{$id}'";
		$where = implode(" AND ",$wheres);
	}else
	$where = "`room_hid`='{$id}'";
	$nNums = $GETSQL->fNumrows("SELECT room_id FROM `{$ODBC['tablepre']}hotelroom` WHERE {$where}");
	if($nNums > 0)
	{
		$sql_hotelroom = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelroom`","{$where}","ORDER BY `room_pass` DESC,`room_date` DESC,`room_id` DESC",$nPage*$nCount,$nCount);
		foreach ($sql_hotelroom AS $key => $value)
		{
			$showprtages = "";
			$room_tages = explode(",",$value['room_tages']);
			foreach ($room_tages AS $va)
			{
				$showprtages .= " <a href='javascript:;' title='{$va}' onclick=\"showtextcontent('index.php?action=hotel&option=showroomtage&Keyword='+escape('{$va}'))\">{$va}</a> ";
			}
			$sql_hotelroom[$key]['room_tages'] = $showprtages;
		}
		if($nNums > $nCount)
		{
			$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
			$smarty->assign('fpageup',$fpageup);
		}
		$smarty->assign('sql_hotelroom',$sql_hotelroom);
	}

	$smarty->assign('REQUEST_URI',$_SERVER['REQUEST_URI']);

	$smarty->assign('sql_hotel',$sql_hotel);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("hotelroom.htm");
}
if($option == 'hotelword')
{
	$sql_hotel = $GETSQL->fSql("hot_id,hot_uid,hot_subject,hot_start,hot_pass","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	if($sql_hotel['hot_pass'] != '1')
	Showmsg('酒店还没通过管理员审核');

	$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_see`=`hot_see`+1","`hot_id`='{$id}'");

	$smarty->assign('config',array(
	'title' => "{$sql_hotel['hot_subject']}_留言",
	'keywords' =>$config['keywords']."{$sql_hotel['hot_subject']}_留言_{$cache_config['subject']}",
	'description' => $config['description']."{$sql_hotel['hot_subject']}_留言_{$cache_config['subject']}"));

	$nCount = $cache_config['numser']?$cache_config['numser']:"10";
	$cParameter = "action={$action}&option={$option}&id={$id}&Industry={$Industry}&type={$type}&Keyword={$Keyword}";
	include_once Getincludefun("page");

	$nNums = $GETSQL->fNumrows("SELECT word_id FROM `{$ODBC['tablepre']}hotelword` WHERE `word_hid`='{$id}'");
	if($nNums > 0)
	{
		$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelword`","`word_hid`='{$id}'","ORDER BY `word_date` DESC,`word_id` DESC",$nPage*$nCount,$nCount);
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

	$smarty->assign('sql_hotel',$sql_hotel);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("hotelword.htm");
}
if($option == 'showtage')
{
	if($Keyword!='')
	{
		$morekey = $Keyword;
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$sql_company = $GETSQL->fSql("hot_id,hot_subject","`{$ODBC['tablepre']}hotel`","`hot_tages` LIKE '%{$Keyword}%' AND `hot_pass`='1'","",0,10);
		foreach ($sql_company AS $value)
		{
			echo "<div style='border-bottom:1px solid #02884D;'><a target='_blank' href='{$boardurl}index.php?action=hotel&option=single&id={$value['hot_id']}'>{$value['hot_subject']}</a></div>";
		}
		echo "<div align=right><a href='{$boardurl}index.php?action=tages&option=hotel&Keyword={$morekey}'>更多</a></div>";
	}else{
		$sql_company = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}hoteltag`","","ORDER BY `tag_num` DESC",0,20);
		foreach ($sql_company AS $value)
		{
			echo " <a onclick=\"ftexttageshtml('{$value['tag_subject']}')\">{$value['tag_subject']}</a> ";
		}
	}
}
if($option == 'showroomtage')
{
	if($Keyword!='')
	{
		$morekey = $Keyword;
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$sql_company = $GETSQL->fSql("room_id,room_hid,room_subject","`{$ODBC['tablepre']}hotelroom`","`room_tages` LIKE '%{$Keyword}%'","",0,10);
		foreach ($sql_company AS $value)
		{
			echo "<div style='border-bottom:1px solid #02884D;'><a target='_blank' href='{$boardurl}index.php?action=hotel&option=hotelroom&id={$value['room_hid']}&Industry={$value['room_id']}'>{$value['room_subject']}</a></div>";
		}
		echo "<div align=right><a href='{$boardurl}index.php?action=tages&option=hotelroom&Keyword={$morekey}'>更多</a></div>";
	}else{
		$sql_company = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}roomtag`","","ORDER BY `tag_num` DESC",0,20);
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
		$sql_company = $GETSQL->fSql("thr_id,thr_hid,thr_subject","`{$ODBC['tablepre']}hotelthread`","`thr_tages` LIKE '%{$Keyword}%'","",0,10);
		foreach ($sql_company AS $value)
		{
			echo "<div style='border-bottom:1px solid #02884D;'><a target='_blank' href='{$boardurl}index.php?action=hotel&option=hotelthread&id={$value['thr_hid']}&Industry={$value['thr_id']}'>{$value['thr_subject']}</a></div>";
		}
		echo "<div align=right><a href='{$boardurl}index.php?action=tages&option=hotelthread&Keyword={$morekey}'>更多</a></div>";
	}else{
		$sql_company = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}hotelthreadtag`","","ORDER BY `tag_num` DESC",0,20);
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
		$sql_company = $GETSQL->fSql("thr_id,thr_hid,thr_subject","`{$ODBC['tablepre']}hotelyou`","`thr_tages` LIKE '%{$Keyword}%'","",0,10);
		foreach ($sql_company AS $value)
		{
			echo "<div style='border-bottom:1px solid #02884D;'><a target='_blank' href='{$boardurl}index.php?action=hotel&option=hotelthread&id={$value['thr_hid']}&Industry={$value['thr_id']}'>{$value['thr_subject']}</a></div>";
		}
		echo "<div align=right><a href='{$boardurl}index.php?action=tages&option=hotelyou&Keyword={$morekey}'>更多</a></div>";
	}else{
		$sql_company = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}hotelyoutag`","","ORDER BY `tag_num` DESC",0,20);
		foreach ($sql_company AS $value)
		{
			echo " <a onclick=\"ftexttageshtml('{$value['tag_subject']}')\">{$value['tag_subject']}</a> ";
		}
	}
}
?>