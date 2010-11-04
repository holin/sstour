<?php
include_once GetLang('image');
include_once Getincludefun("image");

if($option == 'hotelyou')
{
	$sql_hotel = $GETSQL->fSql("hot_id,hot_pass","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
	if($sql_hotel['hot_pass'] != '1')
	die(gb2utf8("酒店还没通过管理员审核"));
	if($type == 'edit')
	die("<iframe name='releasediframe' width='700' height='600' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='{$boardurl}index.php?action=member&option=hotelyou&id={$id}'>您的浏览器不支持iframe</iframe>");
	if($_GET['update'] == 'img' && $_FILES['fileContent']['name'] != '')
	{
		include_once GetLang('image');
		include_once Getincludefun("image");
		$img = fUploadimg_process($_FILES['fileContent'],"{$config['attach']}/hotel/");
		ImgWaterMark("{$config['attach']}/hotel/{$img}",$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);
		$cQuery = array("`img_picid`","`img_picsrc`","`img_picsize`","`img_uid`");
		$cData = array($nowtime.$_POST['fileKey'],"{$config['attach']}/hotel/{$img}",$_FILES['fileContent']['size'],$uid);
		$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);
		header("Location: update.php?action=img&fileKey={$_POST['fileKey']}&img=$img");
		exit;
	}
	if($_POST['blog_title']!='' && $_POST['blog_body']!='')
	{
		if($_POST['blog_tags']!='')
		{
			$blog_tags = explode(",",$_POST['blog_tags']);
			$gametag = array_unique ($blog_tags);
			$gametags = "'".implode("','",$gametag)."'";
			$_POST['blog_tags'] = implode(",",$gametag);
			$sql_gametag = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}hotelyoutag`","`tag_subject` IN ({$gametags})");
			foreach ($sql_gametag AS $value)
			{
				foreach ($gametag AS $key=>$ver)
				{
					if($ver == $value['tag_subject'])
					unset($gametag[$key]);
				}
			}
			$GETSQL->fUpdate("`{$ODBC['tablepre']}hotelyoutag`","`tag_num`=`tag_num`+1","`tag_subject` IN ({$gametags})");
			foreach ($gametag AS $value)
			{
				$cQuery = array("`tag_subject`");
				$cData = array($value);
				$GETSQL->fInsert("`{$ODBC['tablepre']}hotelyoutag`",$cQuery,$cData);
			}
		}

		$cQuery = array("`thr_id`","`thr_hid`","`thr_subject`","`thr_tages`","`thr_content`","`thr_date`");
		$cData = array($nowtime,$id,$_POST['blog_title'],$_POST['blog_tags'],$_POST['blog_body'],fgetdate());
		$GETSQL->fInsert("`{$ODBC['tablepre']}hotelyou`",$cQuery,$cData);

		if($actionhtml = GetCache('hotel'))
		{
			include_once $actionhtml;
			if($cache_config['cache'] == '1')
			{
				P_unlink(R_P."html/hotel/hotelyou_I_{$id}.htm");
				ffile("{$boardurl}index.php?action=hotel&option=hotelyou&id={$id}",'',"r");
			}
		}
		header("Location: update.php?action=add&title=".urlencode("发表成功")."&a=hotel&p=hotelyouthread&id={$id}&in={$nowtime}");
		exit;
	}
	$smarty->display("hotelyouedit.htm");
}

if($option == 'scenicyou')
{
	$sql_hotel = $GETSQL->fSql("sc_id,sc_pass","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
	if($sql_hotel['sc_pass'] != '1')
	die(gb2utf8("景区还没通过管理员审核"));
	if($type == 'edit')
	die("<iframe name='releasediframe' width='700' height='600' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='{$boardurl}index.php?action=member&option=scenicyou&id={$id}'>您的浏览器不支持iframe</iframe>");
	if($_GET['update'] == 'img' && $_FILES['fileContent']['name'] != '')
	{
		include_once GetLang('image');
		include_once Getincludefun("image");
		$img = fUploadimg_process($_FILES['fileContent'],"{$config['attach']}/scenic/");
		ImgWaterMark("{$config['attach']}/scenic/{$img}",$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);
		$cQuery = array("`img_picid`","`img_picsrc`","`img_picsize`","`img_uid`");
		$cData = array($nowtime.$_POST['fileKey'],"{$config['attach']}/scenic/{$img}",$_FILES['fileContent']['size'],$uid);
		$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);
		header("Location: update.php?action=img&fileKey={$_POST['fileKey']}&img=$img");
		exit;
	}
	if($_POST['blog_title']!='' && $_POST['blog_body']!='')
	{
		if($_POST['blog_tags']!='')
		{
			$blog_tags = explode(",",$_POST['blog_tags']);
			$gametag = array_unique ($blog_tags);
			$gametags = "'".implode("','",$gametag)."'";
			$_POST['blog_tags'] = implode(",",$gametag);
			$sql_gametag = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}scenicyoutag`","`tag_subject` IN ({$gametags})");
			foreach ($sql_gametag AS $value)
			{
				foreach ($gametag AS $key=>$ver)
				{
					if($ver == $value['tag_subject'])
					unset($gametag[$key]);
				}
			}
			$GETSQL->fUpdate("`{$ODBC['tablepre']}scenicyoutag`","`tag_num`=`tag_num`+1","`tag_subject` IN ({$gametags})");
			foreach ($gametag AS $value)
			{
				$cQuery = array("`tag_subject`");
				$cData = array($value);
				$GETSQL->fInsert("`{$ODBC['tablepre']}scenicyoutag`",$cQuery,$cData);
			}
		}

		$cQuery = array("`thr_id`","`thr_hid`","`thr_subject`","`thr_tages`","`thr_content`","`thr_date`");
		$cData = array($nowtime,$id,$_POST['blog_title'],$_POST['blog_tags'],$_POST['blog_body'],fgetdate());
		$GETSQL->fInsert("`{$ODBC['tablepre']}scenicyou`",$cQuery,$cData);

		if($actionhtml = GetCache('scenic'))
		{
			include_once $actionhtml;
			if($cache_config['cache'] == '1')
			{
				P_unlink(R_P."html/scenic/scenicyou_I_{$id}.htm");
				ffile("{$boardurl}index.php?action=scenic&option=scenicyou&id={$id}",'',"r");
			}
		}
		header("Location: update.php?action=add&title=".urlencode("发表成功")."&a=scenic&p=scenicyouthread&id={$id}&in={$nowtime}");
		exit;
	}
	$smarty->display("scenicyouedit.htm");
}
if($option == 'travelyou')
{
	$sql_hotel = $GETSQL->fSql("sc_id,sc_pass","`{$ODBC['tablepre']}travel`","`sc_id`='{$id}'","","","","U_B");
	if($sql_hotel['sc_pass'] != '1')
	die(gb2utf8("旅行社还没通过管理员审核"));
	if($type == 'edit')
	die("<iframe name='releasediframe' width='700' height='600' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='{$boardurl}index.php?action=member&option=travelyou&id={$id}'>您的浏览器不支持iframe</iframe>");
	if($_GET['update'] == 'img' && $_FILES['fileContent']['name'] != '')
	{
		include_once GetLang('image');
		include_once Getincludefun("image");
		$img = fUploadimg_process($_FILES['fileContent'],"{$config['attach']}/travel/");
		ImgWaterMark("{$config['attach']}/travel/{$img}",$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);
		$cQuery = array("`img_picid`","`img_picsrc`","`img_picsize`","`img_uid`");
		$cData = array($nowtime.$_POST['fileKey'],"{$config['attach']}/travel/{$img}",$_FILES['fileContent']['size'],$uid);
		$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);
		header("Location: update.php?action=img&fileKey={$_POST['fileKey']}&img=$img");
		exit;
	}
	if($_POST['blog_title']!='' && $_POST['blog_body']!='')
	{
		if($_POST['blog_tags']!='')
		{
			$blog_tags = explode(",",$_POST['blog_tags']);
			$gametag = array_unique ($blog_tags);
			$gametags = "'".implode("','",$gametag)."'";
			$_POST['blog_tags'] = implode(",",$gametag);
			$sql_gametag = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}travelyoutag`","`tag_subject` IN ({$gametags})");
			foreach ($sql_gametag AS $value)
			{
				foreach ($gametag AS $key=>$ver)
				{
					if($ver == $value['tag_subject'])
					unset($gametag[$key]);
				}
			}
			$GETSQL->fUpdate("`{$ODBC['tablepre']}travelyoutag`","`tag_num`=`tag_num`+1","`tag_subject` IN ({$gametags})");
			foreach ($gametag AS $value)
			{
				$cQuery = array("`tag_subject`");
				$cData = array($value);
				$GETSQL->fInsert("`{$ODBC['tablepre']}travelyoutag`",$cQuery,$cData);
			}
		}

		$cQuery = array("`thr_id`","`thr_hid`","`thr_subject`","`thr_tages`","`thr_content`","`thr_date`");
		$cData = array($nowtime,$id,$_POST['blog_title'],$_POST['blog_tags'],$_POST['blog_body'],fgetdate());
		$GETSQL->fInsert("`{$ODBC['tablepre']}travelyou`",$cQuery,$cData);

		if($actionhtml = GetCache('travel'))
		{
			include_once $actionhtml;
			if($cache_config['cache'] == '1')
			{
				P_unlink(R_P."html/travel/travelyou_I_{$id}.htm");
				ffile("{$boardurl}index.php?action=travel&option=travelyou&id={$id}",'',"r");
			}
		}
		header("Location: update.php?action=add&title=".urlencode("发表成功")."&a=travel&p=travelyouthread&id={$id}&in={$nowtime}");
		exit;
	}
	$smarty->display("travelyouedit.htm");
}
?>