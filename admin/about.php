<?php
if($option == 'index')
{
	include_once Getincludefun("page");
	$nCount = 20;
	$cParameter = "action=news";	
	$nNums = $GETSQL->fNumrows("SELECT about_id FROM `{$ODBC['tablepre']}about`");
	$sql_about = $GETSQL->fSql("*","`{$ODBC['tablepre']}about`","","ORDER BY `about_id`",$nPage*$nCount,$nCount);	
	$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showtable",1);
	$smarty->assign('sql_about',$sql_about);
	$smarty->assign('fpageup',$fpageup);	
	$smarty->display("about.htm");
}
if($option == 'newsedit')
{
	if($type == 'edit')
	die("<iframe name='releasediframe' width='700' height='600' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='admin.php?action=about&option=newsedit&id={$id}'>您的浏览器不支持iframe</iframe>");
	if($_GET['update'] == 'img' && $_FILES['fileContent']['name'] != '')
	{
		include_once GetLang('image');
		include_once Getincludefun("image");
		$img = fUploadimg_process($_FILES['fileContent'],"{$config['attach']}/system/");
		if($IMG_upment['watermark'] == '1')
		ImgWaterMark("{$config['attach']}/system/{$img}",$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);
		
		$cQuery = array("`img_picid`","`img_picsrc`","`img_picsize`","`img_uid`");
		$cData = array($nowtime.$_POST['fileKey'],$img,$_FILES['fileContent']['size'],$uid);
		$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);
		header("Location: update.php?action=img&fileKey={$_POST['fileKey']}&img=$img");
		exit;
	}
	if($_POST['blog_title']!='' && $_POST['blog_body']!='')
	{
		if($_POST['bid']!=''){
			$GETSQL->fUpdate("`{$ODBC['tablepre']}about`",
			"`about_subject`='{$_POST['blog_title']}',
			`about_content`='{$_POST['blog_body']}'","`about_id`='{$_POST['bid']}'");
			header("Location: update.php?action=add&title=".urlencode("{$_POST['blog_title']}修改成功")."&a={$action}&p={$option}&id={$_POST['bid']}&u=admin");
		}else{
			$cQuery = array("`about_id`","`about_subject`","`about_content`");
			$cData = array($nowtime,$_POST['blog_title'],$_POST['blog_body']);
			$GETSQL->fInsert("`{$ODBC['tablepre']}about`",$cQuery,$cData);
			header("Location: update.php?action=add&title=".urlencode("{$_POST['blog_title']}发表成功")."&a={$action}&p={$option}&id={$nowtime}&u=admin");
		}
		exit;
	}
	if($id!='')
	{
		$sql_about = $GETSQL->fSql("*","`{$ODBC['tablepre']}about`","`about_id`='{$id}'","","","","U_B");
		$ncontent = str_replace("\\","\\\\",$sql_about['about_content']);
		$ncontent = str_replace("\n","\\n",$ncontent);
		$ncontent = str_replace("\r","\\r",$ncontent);
		$ncontent = str_replace("\"","\\\"",$ncontent);
		$smarty->assign('sql_about',$sql_about);
		$smarty->assign('ncontent',$ncontent);
	}else{
		$showoption = flist_option($sql_newsclass);
	}
	$smarty->assign('showoption',$showoption);
	$smarty->assign('nowtitle',date("Y")."年".date("m")."月".date("d")."日");
	$smarty->display("aboutedit.htm");
}
if($option == 'del')
{
	$GETSQL->fDelete("`{$ODBC['tablepre']}about`","`about_id`='{$id}'","1");
	die(gb2utf8("ok 删除成功"));
}
?>