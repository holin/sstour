<?php
if($option == 'index')
{
	if($_POST['update'] == 'update')
	{
		fgetposttoupdatd($_POST,$ODBC['charset']);
		foreach ($_POST['action'] AS $k=>$v)
		{
			if($_POST['file'][$v] == '1')
			$GETSQL->fUpdate("`{$ODBC['tablepre']}config`","`config_content`='{$_POST['action'][$v]}'","`config_subject`='dir'");
		}
		$sql_config = $GETSQL->fSql("*","`{$ODBC['tablepre']}config`","","");
		$configtxt = "<?php\n";
		foreach ($sql_config AS $value)
		{
			$value['config_content'] = addslashes($value['config_content']);
			if(@eregi("\\'",$value['config_content']))
			$configtxt .= "\$config['{$value['config_subject']}']=stripslashes(\"{$value['config_content']}\");\n";
			else
			$configtxt .= "\$config['{$value['config_subject']}']=\"{$value['config_content']}\";\n";
		}
		$configtxt .= "?>";
		ffile(R_P."include/config.php",$configtxt);
		die(gb2utf8("模板设置修改成功"));
	}
	$opendir = opendir(R_P."template");
	while ($file = readdir($opendir))
	{
		if($file != '.' && $file != '..' && $file != '')
		$filers[] = $file;
	}

	$smarty->assign('configdir',$config['dir']);
	$smarty->assign('filers',$filers);
	$smarty->display("template.htm");
}
if($option == 'file')
{
	$opendir = opendir(R_P."template/{$id}");
	//echo "<img src='image/msg/back.gif' alt='返回' onclick=\"javascript:fshowwindowsclos('showwindow');getNews('showtable','admin.php?action=template')\" style='cursor: hand;'><BR>";
	while ($file = readdir($opendir))
	{
		if($file != '.' && $file != '..' && $file != '')
		{
			$mofile .= "<tr><td class=b>{$id}</td>
			<td class=b>{$file}</td>
			<td class=b>
			<a href=\"javascript:fshowwindowsopen('showwindow');maineditshow('showwindow','{$boardurl}admin.php?action={$action}&option=edit&id={$id}&type={$file}','getNews(\'showtable\',\'admin.php?action={$action}&option={$option}&id={$id}\');');\">编辑</a></td></tr>";
			//echo " | {$file} <a href=\"javascript:fshowwindowsopen('showwindow');getNews('showwindow','admin.php?action={$action}&option=edit&id={$id}&type={$file}');\">编辑</a><BR>";
		}
	}
	//echo "<img src='image/msg/back.gif' alt='返回' onclick=\"javascript:fshowwindowsclos('showwindow');getNews('showtable','admin.php?action=template')\" style='cursor: hand;'><BR>";
	$smarty->assign('mofile',$mofile);
	closedir($opendir);
	$smarty->display("template.htm");
}
if($option == 'edit')
{
	if($_GET['update'] == 'img' && $_FILES['fileContent']['name'] != '')
	{
		include_once GetLang('image');
		include_once Getincludefun("image");
		$img = fUploadimg_process($_FILES['fileContent'],"{$config['attach']}/template/");
		if($IMG_upment['watermark'] == '1')
		ImgWaterMark("{$config['attach']}/template/{$img}",$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);
		header("Location: update.php?action=img&fileKey={$_POST['fileKey']}&img=$img");
		exit;
	}
	if($_POST['blog_body']!='')
	{
		//fgetposttoupdatd($_POST,$ODBC['charset']);
		ffile(R_P."template/{$id}/{$type}",StripSlashes($_POST['blog_body']),"w");
		header("Location: update.php?action=add&title=".urlencode("模板编辑保存")."&a={$action}&p={$option}&id={$nowtime}&u=admin");
		exit;
		//die(gb2utf8("模板编辑保存"));
	}
	$ncontent = file_get_contents(R_P."template/{$id}/{$type}");
	//echo "<div align=right class=itemtag><img src='image/msg/edit.gif' alt='保存' onclick=\"saveUserlogin('admin.php?action={$action}&option={$option}&id={$id}&type={$type}','formedit','','getNews(\'showwindow\',\'admin.php?action={$action}&option={$option}&id={$id}&type={$type}\')');\" style='cursor: hand;'> <img src='image/msg/closed.gif' alt='关闭' onclick=\"fshowwindowsclos('showwindow');\" style='cursor: hand;'></div>
	//<form name=formedit method=post action=''><input type=hidden name=edit value='edit'>template/{$id}/{$type}文件<BR><textarea cols=150 rows=100 name=editrequire onkeydown='editTab()'>{$phptext}</textarea></form>
	//<div align=right class=itemtag><img src='image/msg/edit.gif' alt='保存' onclick=\"saveUserlogin('admin.php?action={$action}&option={$option}&id={$id}&type={$type}','formedit','','getNews(\'showwindow\',\'admin.php?action={$action}&option={$option}&id={$id}&type={$type}\')');\" style='cursor: hand;'> <img src='image/msg/closed.gif' alt='关闭' onclick=\"fshowwindowsclos('showwindow');\" style='cursor: hand;'></div>";
	$ncontent = str_replace("\\","\\\\",$ncontent);
	$ncontent = str_replace("\n","\\n",$ncontent);
	$ncontent = str_replace("\r","\\r",$ncontent);
	$ncontent = str_replace("\"","\\\"",$ncontent);
	$smarty->assign('ncontent',$ncontent);
	$smarty->display("template.htm");
}
?>