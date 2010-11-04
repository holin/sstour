<?php
if($option == 'index')
{
	include_once Getincludefun("page");
	$nCount = 20;
	$cParameter = "action=news&type={$type}&Keyword={$Keyword}";
	$sql_newsclass = $GETSQL->fSql("*","`{$ODBC['tablepre']}columns`","","ORDER BY `type_sp`,`type_id` DESC");
	$soptions = flist_option($sql_newsclass);
	if ($type!="")
	{
		$wheres[] = "a.`new_type`='{$type}'";
		$soptions = preg_replace("/value='{$type}'/is","value='{$type}' selected",$soptions);
	}
	$smarty->assign('soptions',$soptions);
	if($Keyword!='')
	{
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$wheres[] = "a.`new_subject` LIKE '%{$Keyword}%'";
		$smarty->assign('Keyword',$Keyword);
	}
	if(count($wheres)>0)
	{
		$where = implode(" AND ",$wheres);
	}else{
		$where = "1";
	}
	$nNums = $GETSQL->fNumrows("SELECT a.new_id FROM `{$ODBC['tablepre']}news` a where {$where}");
	$sql_news = $GETSQL->fSql("a.new_id,a.new_subject,a.new_date,b.type_subject",
	"`{$ODBC['tablepre']}news` a LEFT JOIN `{$ODBC['tablepre']}columns` b ON a.`new_type`=b.`type_id`",
	"{$where}","ORDER BY `new_date` DESC,`new_id` DESC",
	$nPage*$nCount,$nCount);
	$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showtable",1);
	$smarty->assign('sql_news',$sql_news);
	$smarty->assign('fpageup',$fpageup);
	$smarty->display("news.htm");
}
if($option == 'newsedit')
{
	if($type == 'edit')
	die("<iframe name='releasediframe' width='700' height='600' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='admin.php?action=news&option=newsedit&id={$id}'>您的浏览器不支持iframe</iframe>");
	if($_GET['update'] == 'img' && $_FILES['fileContent']['name'] != '')
	{
		include_once GetLang('image');
		include_once Getincludefun("image");
		$img = fUploadimg_process($_FILES['fileContent'],"{$config['attach']}/news/");
		if($IMG_upment['watermark'] == '1')
		ImgWaterMark("{$config['attach']}/news/{$img}",$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);

		$cQuery = array("`img_picid`","`img_picsrc`","`img_picsize`","`img_uid`");
		$cData = array($nowtime.$_POST['fileKey'],$img,$_FILES['fileContent']['size'],$uid);
		$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);
		header("Location: update.php?action=img&fileKey={$_POST['fileKey']}&img=$img");
		exit;
	}
	if($_POST['update'] == 'addtype' && $_POST['typename'][0] != '')
	{
		if(strlen($_POST['typename'][0]) > 72 || strlen($_POST['typename'][0]) < 1)
		{
			header("Location: update.php?action=error&error=".urlencode('文章标题不能为空并且不能超过72个字符'));
			exit;
		}
		$cQuery = array("`type_subject`","`type_live`","`type_sp`");
		$cData = array($_POST['typename'][0],$_POST['number'][0],0);
		$GETSQL->fInsert("`{$ODBC['tablepre']}columns`",$cQuery,$cData);
		$stime = $GETSQL->insert_id();
		header("Location: update.php?action=type&time={$stime}&typename={$_POST['typename'][0]}");
		exit;
	}
	if($_POST['blog_title']!='' && $_POST['blog_body']!='')
	{
		if($_POST['bid']!=''){
			$GETSQL->fUpdate("`{$ODBC['tablepre']}news`",
			"`new_type`='{$_POST['blog_class']}',
			`new_subject`='{$_POST['blog_title']}',
			`new_writer`='{$_POST['blog_writer']}',
			`new_quote`='{$_POST['blog_quote']}',
			`new_image`='{$_POST['blog_image']}',
			`new_content`='{$_POST['blog_body']}',
			`new_date`='".fgetdate()."'","`new_id`='{$_POST['bid']}'");
			header("Location: update.php?action=add&title=".urlencode("{$_POST['blog_title']}修改成功")."&a={$action}&p={$option}&id={$_POST['bid']}&u=admin");
		}else{
			$cQuery = array("`new_id`","`new_type`","`new_subject`","`new_writer`","`new_quote`","`new_image`","`new_content`","`new_date`");
			$cData = array($nowtime,$_POST['blog_class'],$_POST['blog_title'],$_POST['blog_writer'],$_POST['blog_quote'],$_POST['blog_image'],$_POST['blog_body'],fgetdate());
			$GETSQL->fInsert("`{$ODBC['tablepre']}news`",$cQuery,$cData);
			header("Location: update.php?action=add&title=".urlencode("{$_POST['blog_title']}发表成功")."&a={$action}&p={$option}&id={$nowtime}&u=admin");
		}
		exit;
	}
	$sql_newsclass = $GETSQL->fSql("*","`{$ODBC['tablepre']}columns`","","ORDER BY `type_sp`,`type_id` DESC");
	if($id!='')
	{
		$sql_news = $GETSQL->fSql("*","`{$ODBC['tablepre']}news`","`new_id`='{$id}'","","","","U_B");
		$soptions = flist_option($sql_newsclass);
		$showoption = preg_replace("/value='{$sql_news['new_type']}'/is","value='{$sql_news['new_type']}' selected",$soptions);
		$ncontent = str_replace("\\","\\\\",$sql_news['new_content']);
		$ncontent = str_replace("\n","\\n",$ncontent);
		$ncontent = str_replace("\r","\\r",$ncontent);
		$ncontent = str_replace("\"","\\\"",$ncontent);
		$smarty->assign('sql_news',$sql_news);
		$smarty->assign('ncontent',$ncontent);
	}else{
		$showoption = flist_option($sql_newsclass);
	}
	$smarty->assign('showoption',$showoption);
	$smarty->assign('nowtitle',date("Y")."年".date("m")."月".date("d")."日");
	$smarty->display("newsedit.htm");
}
if($option == 'del')
{
	$GETSQL->fDelete("`{$ODBC['tablepre']}news`","`new_id`='{$id}'","1");
	die(gb2utf8("ok 删除成功"));
}
?>