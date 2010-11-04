<?php
if($option == 'index')
{
	include_once Getincludefun("page");
	$nCount = 20;
	$cParameter = "action=info";
	$nNums = $GETSQL->fNumrows("SELECT new_id FROM `{$ODBC['tablepre']}info`");
	$sql_news = $GETSQL->fSql("a.new_id,a.new_subject,a.new_date,b.type_subject",
	"`{$ODBC['tablepre']}info` a LEFT JOIN `{$ODBC['tablepre']}class` b ON a.`new_type`=b.`type_id`",
	"","ORDER BY `new_date` DESC,`new_id` DESC",
	$nPage*$nCount,$nCount);
	$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showtable",1);
	$smarty->assign('sql_news',$sql_news);
	$smarty->assign('fpageup',$fpageup);
	$smarty->display("info.htm");
}
if($option == 'newsedit')
{
	if($type == 'edit')
	die("<iframe name='releasediframe' width='700' height='600' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='admin.php?action=info&option=newsedit&id={$id}'>您的浏览器不支持iframe</iframe>");
	if($_GET['update'] == 'img' && $_FILES['fileContent']['name'] != '')
	{
		include_once GetLang('image');
		include_once Getincludefun("image");
		$img = fUploadimg_process($_FILES['fileContent'],"{$config['attach']}/info/");
		if($IMG_upment['watermark'] == '1')
		ImgWaterMark("{$config['attach']}/info/{$img}",$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);
		
		$cQuery = array("`img_picid`","`img_picsrc`","`img_picsize`","`img_uid`");
		$cData = array($nowtime,$img,$_FILES['fileContent']['size'],$uid);
		$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);
		header("Location: update.php?action=img&fileKey={$_POST['fileKey']}&img=$img");
		exit;
	}
	if($_POST['blog_title']!='' && $_POST['blog_body']!='')
	{
		if($_POST['bid']!=''){
			$GETSQL->fUpdate("`{$ODBC['tablepre']}info`",
			"`new_type`='{$_POST['blog_class']}',
			`new_subject`='{$_POST['blog_title']}',
			`new_quote`='{$_POST['blog_quote']}',
			`new_content`='{$_POST['blog_body']}',
			`new_date`='".fgetdate()."'","`new_id`='{$_POST['bid']}'");
			header("Location: update.php?action=edit&title=".urlencode("{$_POST['blog_title']}修改成功"));
		}else{
			$cQuery = array("`new_id`","`new_type`","`new_subject`","`new_quote`","`new_content`","`new_date`");
			$cData = array($nowtime,$_POST['blog_class'],$_POST['blog_title'],$_POST['blog_quote'],$_POST['blog_body'],fgetdate());
			$GETSQL->fInsert("`{$ODBC['tablepre']}info`",$cQuery,$cData);
			header("Location: update.php?action=add&title=".urlencode("{$_POST['blog_title']}发表成功")."&a={$action}&p={$option}&id={$nowtime}&u=admin");
		}
		exit;
	}
	$sql_newsclass = $GETSQL->fSql("*","`{$ODBC['tablepre']}class`","","ORDER BY `type_sp`,`type_id` DESC");
	if($id!='')
	{
		$sql_news = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","`new_id`='{$id}'","","","","U_B");
		$soptions = flist_option($sql_newsclass,0,'',1);
		$showoption = preg_replace("/value='{$sql_news['new_type']}'/is","value='{$sql_news['new_type']}' selected",$soptions);
		$ncontent = str_replace("\\","\\\\",$sql_news['new_content']);
		$ncontent = str_replace("\n","\\n",$ncontent);
		$ncontent = str_replace("\r","\\r",$ncontent);
		$ncontent = str_replace("\"","\\\"",$ncontent);
		$smarty->assign('sql_news',$sql_news);
		$smarty->assign('ncontent',$ncontent);
	}else{
		$showoption = flist_option($sql_newsclass,0,'',1);
	}
	$smarty->assign('showoption',$showoption);
	$smarty->assign('nowtitle',date("Y")."年".date("m")."月".date("d")."日");
	$smarty->display("infoedit.htm");
}
if($option == 'del')
{
	$GETSQL->fDelete("`{$ODBC['tablepre']}info`","`new_id`='{$id}'","1");
	die(gb2utf8("ok 删除成功"));
}
?>