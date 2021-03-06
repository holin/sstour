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
	'title' => "",
	'keywords' =>$config['keywords']."_{$cache_config['subject']}",
	'description' => $config['description']."_{$cache_config['subject']}"));

	$sql_news = $GETSQL->fSql("new_id,new_subject,new_image","`{$ODBC['tablepre']}news`","`new_type`='1'","ORDER BY `new_date` DESC,`new_id` DESC",0,5);
	$smarty->assign('sql_news',$sql_news);

	include_once GetLang('image');
	include_once Getincludefun("image");
	$sql_scenicimage = $GETSQL->fSql("hi_id,hi_hid,hi_src,hi_subject","`{$ODBC['tablepre']}scenicimage`","","ORDER BY `hi_date` DESC,`hi_id` DESC",0,8);
	foreach ($sql_scenicimage AS $key => $value)
	{
		$sql_scenicimage[$key]['hi_src'] = fimgsrc($value['hi_src'],'simll/');
	}
	$smarty->assign('sql_scenicimage',$sql_scenicimage);

	$sql_scenic = $GETSQL->fSql("sc_id,sc_subject,sc_logo","`{$ODBC['tablepre']}scenic`","`sc_logo`!='' AND `sc_pass`='1'","ORDER BY `sc_sp` DESC, `sc_see` DESC,`sc_date` DESC,`sc_id` DESC",0,2);
	$smarty->assign('sql_scenic0',$sql_scenic[0]);
	$smarty->assign('sql_scenic1',$sql_scenic[1]);
	
	$sql_scenicattr = $GETSQL->fSql("attr_id,attr_hid,attr_subject","`{$ODBC['tablepre']}scenicattr`","","ORDER BY `attr_date` DESC,`attr_id` DESC",0,8);
	$i=0;
	foreach ($sql_scenicattr AS $key => $value)
	{
		$sql_scenicattr[$key]['attr_content'] = fconurt($value['attr_content']);
		if($i<4)
		$sql_scenicattr0[] = $sql_scenicattr[$key];
		else
		$sql_scenicattr1[] = $sql_scenicattr[$key];
		$i++;
	}
	$smarty->assign('sql_scenicattr0',$sql_scenicattr0);
	$smarty->assign('sql_scenicattr1',$sql_scenicattr1);

	$sql_novel = $GETSQL->fSql("new_id,new_subject,new_quote","`{$ODBC['tablepre']}info`","`new_quote`!='' AND `new_type`='7'","ORDER BY `new_date` DESC,`new_id` DESC",0,2);
	$smarty->assign('sql_novel0',$sql_novel[0]);
	$smarty->assign('sql_novel1',$sql_novel[1]);
	$sql_info = $GETSQL->fSql("new_id,new_subject","`{$ODBC['tablepre']}info`","`new_type`='7'","ORDER BY `new_date` DESC,`new_id` DESC",0,5);
	$smarty->assign('sql_info',$sql_info);
	
	$sql_scenicyou = $GETSQL->fSql("thr_id,thr_hid,thr_subject","`{$ODBC['tablepre']}scenicyou`","","ORDER BY `thr_date` DESC,`thr_id` DESC",0,4);
	$smarty->assign('sql_scenicyou',$sql_scenicyou);
	
	$sql_hotelroom = $GETSQL->fSql("hot_id,hot_subject,hot_logo","`{$ODBC['tablepre']}hotel`","`hot_pass`='1' AND `hot_logo`!=''","ORDER BY `hot_sp` DESC,`hot_date` DESC,`hot_id` DESC",0,2);
	$smarty->assign('sql_hotelroom1',$sql_hotelroom[0]);
	$smarty->assign('sql_hotelroom2',$sql_hotelroom[1]);
	
	$sql_hotelroom = $GETSQL->fSql("hot_id,hot_subject","`{$ODBC['tablepre']}hotel`","`hot_pass`='1' AND `hot_id`!='{$sql_hotelroom[0]['hot_id']}' AND `hot_id`!='{$sql_hotelroom[1]['hot_id']}'","ORDER BY `hot_sp` DESC,`hot_date` DESC,`hot_id` DESC",0,10);
	$smarty->assign('sql_hotelroom3',array($sql_hotelroom[0],$sql_hotelroom[2],$sql_hotelroom[4],$sql_hotelroom[6],$sql_hotelroom[8]));
	$smarty->assign('sql_hotelroom4',array($sql_hotelroom[1],$sql_hotelroom[3],$sql_hotelroom[5],$sql_hotelroom[7],$sql_hotelroom[9]));
	
	$sql_travelimage = $GETSQL->fSql("sc_id,sc_subject","`{$ODBC['tablepre']}travel`","","ORDER BY `sc_sp` DESC,`sc_see` DESC,`sc_date` DESC",0,16);
	$smarty->assign('sql_travelimage',$sql_travelimage);

	$sql_news11 = $GETSQL->fSql("new_id,new_subject,new_image","`{$ODBC['tablepre']}news`","`new_type`='11'","ORDER BY `new_date` DESC,`new_id` DESC",0,12);
	//$sql_news11[0]['new_image'] = fimgsrc($sql_news11[0]['new_image'],'simll/');
	//$sql_news11[1]['new_image'] = fimgsrc($sql_news11[1]['new_image'],'simll/');
	$smarty->assign('sql_news111',$sql_news11[0]);
	$smarty->assign('sql_news112',$sql_news11[1]);
	$smarty->assign('sql_news113',array($sql_news11[2],$sql_news11[3],$sql_news11[4],$sql_news11[5],$sql_news11[6]));
	$smarty->assign('sql_news114',array($sql_news11[7],$sql_news11[8],$sql_news11[9],$sql_news11[10],$sql_news11[11]));
	
	$sql_news12 = $GETSQL->fSql("new_id,new_subject,new_image","`{$ODBC['tablepre']}news`","`new_image`!='' AND `new_type`='12'","ORDER BY `new_date` DESC,`new_id` DESC",0,2);
	$smarty->assign('sql_news115',$sql_news12[0]);
	$smarty->assign('sql_news116',$sql_news12[1]);
	$sql_news12 = $GETSQL->fSql("new_id,new_subject","`{$ODBC['tablepre']}news`","`new_type`='12' AND `new_id`!='{$sql_news12[0]['new_id']}' AND `new_id`!='{$sql_news12[1]['new_id']}'","ORDER BY `new_date` DESC,`new_id` DESC",0,8);
	$smarty->assign('sql_news117',array($sql_news12[0],$sql_news12[2],$sql_news12[4],$sql_news12[6]));
	$smarty->assign('sql_news118',array($sql_news12[1],$sql_news12[3],$sql_news12[5],$sql_news12[7]));
	
	$sql_news13 = $GETSQL->fSql("new_id,new_subject,new_image","`{$ODBC['tablepre']}news`","`new_type`='13'","ORDER BY `new_date` DESC,`new_id` DESC",0,12);
	//$sql_news13[0]['new_image'] = fimgsrc($sql_news13[0]['new_image'],'simll/');
	//$sql_news13[1]['new_image'] = fimgsrc($sql_news13[1]['new_image'],'simll/');
	$smarty->assign('sql_news119',$sql_news13[0]);
	$smarty->assign('sql_news120',$sql_news13[1]);
	$smarty->assign('sql_news121',array($sql_news13[2],$sql_news13[3],$sql_news13[4],$sql_news13[5],$sql_news13[6]));
	$smarty->assign('sql_news122',array($sql_news13[7],$sql_news13[8],$sql_news13[9],$sql_news13[10],$sql_news13[11]));

	//$sql_showmessage = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","`new_type`='25'","ORDER BY `new_date` DESC,`new_id` DESC",0,20);
	//$smarty->assign('sql_showmessage',$sql_showmessage);

	
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("index.htm");
}
if($option == 'showainment')
{
	$sql_link5 = $GETSQL->fSql("*","`{$ODBC['tablepre']}link`","`link_pass`='5'","ORDER BY `link_sp` DESC,`link_id` DESC");
	$smarty->assign('sql_link5',$sql_link5);
	$sql_link4 = $GETSQL->fSql("*","`{$ODBC['tablepre']}link`","`link_pass`='4'","ORDER BY `link_sp` DESC,`link_id` DESC");
	$smarty->assign('sql_link4',$sql_link4);
	$sql_link3 = $GETSQL->fSql("*","`{$ODBC['tablepre']}link`","`link_pass`='3'","ORDER BY `link_sp` DESC,`link_id` DESC");
	$smarty->assign('sql_link3',$sql_link3);
	$sql_link2 = $GETSQL->fSql("*","`{$ODBC['tablepre']}link`","`link_pass`='2'","ORDER BY `link_sp` DESC,`link_id` DESC");
	$smarty->assign('sql_link2',$sql_link2);
	$smarty->display("showainment.htm");
}
if($option == 'showtravel')
{
	$sql_news = $GETSQL->fSql("*","`{$ODBC['tablepre']}news`","`new_type`='14'","ORDER BY `new_date` DESC,`new_id` DESC",0,5);
	$smarty->assign('sql_news',$sql_news);
	$smarty->display("showtravel.htm");
}
if($option == 'showmessage')
{
	$sql_showmessage = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","`new_type` IN (49,50,51,52,53,54,55)","ORDER BY `new_date` DESC,`new_id` DESC",0,20);
	$smarty->assign('sql_showmessage',$sql_showmessage);
	$smarty->display("showmessage.htm");
}
if($option == 'showguide')
{
	$sql_news = $GETSQL->fSql("*","`{$ODBC['tablepre']}news`","`new_type`='3'","ORDER BY `new_date` DESC,`new_id` DESC",0,5);
	$smarty->assign('sql_news',$sql_news);
	$smarty->display("showguide.htm");
}
if($option == 'showline')
{
	$sql_news = $GETSQL->fSql("*","`{$ODBC['tablepre']}news`","`new_type`='2'","ORDER BY `new_date` DESC,`new_id` DESC",0,5);
	foreach ($sql_news AS $key => $value)
	{
		$sql_news[$key]['new_content'] = fconurt($value['new_content']);
	}
	$smarty->assign('sql_news',$sql_news);
	$smarty->display("showline.htm");
}
if($option == 'showabout')
{
	$smarty->display("about.htm");
}
if($option == 'showfooder')
{
	$sql_about = $GETSQL->fSql("*","`{$ODBC['tablepre']}about`","","ORDER BY `about_id`");
	foreach ($sql_about AS $value)
	{
		echo " <a href='index.php?action=link&option=about&id={$value['about_id']}'>{$value['about_subject']}</a> |";
	}
	echo " <a href='index.php?action=link'>��������</a>";
}
?>