<?php
if($option == 'index')
{
	if($_POST['update'] == 'update')
	{
		fgetposttoupdatd($_POST,$ODBC['charset']);
		if($_POST['addaction'] != '')
		{
			$cQuery = array("`hack_action`","`hack_subject`", "`hack_cache`", "`hack_cachetime`", "`hack_htmlteml`","`hack_numser`");
			$cData = array($_POST['addaction'],$_POST['addsubject'],$_POST['addcache'],$_POST['addcachetime'],$_POST['addhtmlteml'],$_POST['addnumser']);
			$GETSQL->fInsert("`{$ODBC['tablepre']}hack`",$cQuery,$cData);
		}
		foreach ($_POST['action'] AS $k=>$v)
		{
			//$sql_config = $GETSQL->fSql("*","`{$ODBC['tablepre']}main`","`main_subject`='{$k}'","","","","U_B");
			$GETSQL->fUpdate("`{$ODBC['tablepre']}hack`","`hack_action`='{$_POST['hack_action'][$v]}',
			`hack_subject`='{$_POST['hack_subject'][$v]}',
			`hack_cache`='{$_POST['hack_cache'][$v]}',
			`hack_cachetime`='{$_POST['hack_cachetime'][$v]}',
			`hack_htmlteml`='{$_POST['hack_htmlteml'][$v]}',
			`hack_numser`='{$_POST['hack_numser'][$v]}'","`hack_action`='{$v}'");
		}
		$sql_config = $GETSQL->fSql("*","`{$ODBC['tablepre']}hack`","","");
		foreach ($sql_config AS $value)
		{
			$configtxt = "<?php\n\$cache_config['subject'] = \"{$value['hack_subject']}\";\n\$cache_config['cache'] = \"{$value['hack_cache']}\";\n\$cache_config['cachetime'] = \"{$value['hack_cachetime']}\";\n\$cache_config['htmlteml'] = \"{$value['hack_htmlteml']}\";\n\$cache_config['numser'] = \"{$value['hack_numser']}\";\n\$cache_config['hack_adhead'] = stripslashes(\"".addslashes($value['hack_adhead'])."\");\n\$cache_config['hack_adbody'] = stripslashes(\"".addslashes($value['hack_adbody'])."\");\n\$cache_config['hack_adfoot'] = stripslashes(\"".addslashes($value['hack_adfoot'])."\");\n?>";
			ffile(R_P."cache/cache_{$value['hack_action']}.php",$configtxt);
		}
		die(gb2utf8("插件设置修改成功"));
	}
	$sql_config = $GETSQL->fSql("*","`{$ODBC['tablepre']}hack`","","");
	$smarty->assign('sql_config',$sql_config);
	$smarty->display("hack.htm");
}
if($option == 'edit')
{
	if($_POST['edit'] == 'edit')
	{
		fgetposttoupdatd($_POST,$ODBC['charset']);
		$sql_config = $GETSQL->fSql("*","`{$ODBC['tablepre']}hack`","`hack_action`='{$id}'","","","","U_B");
		ffile(R_P."require/{$sql_config['hack_action']}.php",StripSlashes($P['editrequire']),"w");
		die(gb2utf8("插件编辑保存"));
	}
	$sql_config = $GETSQL->fSql("*","`{$ODBC['tablepre']}hack`","`hack_action`='{$id}'","","","","U_B");
	$phptext = file_get_contents(R_P."require/{$sql_config['hack_action']}.php");
	echo "<form name=formedit method=post action=''>
	<input type=hidden name=edit value='edit'>
	require/{$sql_config['hack_action']}.php文件<BR>
	<textarea cols=80 rows=30 name=editrequire onkeydown='editTab()'>{$phptext}</textarea><BR>
	<center>
	<input id=Submit name=Submit type=button style=\"width:62px;height:22px;border:0;background:url('./image/edit/smb_btn_bg.gif');line-height:20px;\" value='确认' onfocus=true onclick=\"saveUserlogin('admin.php?action={$action}&option={$option}&id={$sql_config['hack_action']}','formedit','','fshowwindowsclos(\'showwindow\');')\" /> &nbsp; <input id=Submit name=Submit type=button style=\"width:62px;height:22px;border:0;background:url('./image/edit/smb_btn_bg.gif');line-height:20px;\" value='取消' onclick=\"new dialog().reset();fshowwindowsclos('showwindow');\" /></center></form>";
	/*
	echo "<div align=right class=itemtag><img src='image/msg/edit.gif' alt='保存' onclick=\"saveUserlogin('admin.php?action={$action}&option={$option}&id={$sql_config['hack_action']}','formedit','','getNews(\'showwindow\',\'admin.php?action={$action}&option={$option}&id={$sql_config['hack_action']}\')')\" style='cursor: hand;'> <img src='image/msg/closed.gif' alt='关闭' onclick=\"fshowwindowsclos('showwindow');\" style='cursor: hand;'></div>
	<form name=formedit method=post action=''><input type=hidden name=edit value='edit'>require/{$sql_config['hack_action']}.php文件<BR><textarea cols=150 rows=100 name=editrequire onkeydown='editTab()'>{$phptext}</textarea></form>
	<div align=right class=itemtag><img src='image/msg/edit.gif' alt='保存' onclick=\"saveUserlogin('admin.php?action={$action}&option={$option}&id={$sql_config['hack_action']}','formedit','','getNews(\'showwindow\',\'admin.php?action={$action}&option={$option}&id={$sql_config['hack_action']}\')')\" style='cursor: hand;'> <img src='image/msg/closed.gif' alt='关闭' onclick=\"fshowwindowsclos('showwindow');\" style='cursor: hand;'></div>";
	*/
}
if($option == 'del')
{
	$GETSQL->fDelete("`{$ODBC['tablepre']}hack`","`hack_action`='{$id}'","1");
	P_unlink(R_P."cache/cache_{$id}.php");
	die(gb2utf8("插件删除服务器上仍然保留插件文件，如果要彻底删除请到服务器require目录下删除{$id}"));
}
if($option == 'cleared')
{
	fdelfiledir(R_P."html/");
	fdelfiledir(R_P."templates_a/");
	fdelfiledir(R_P."templates_c/");
	fdelfiletmp(R_P."tmp/");
	die(gb2utf8("清理成功"));
}
function fdelfiledir($base_dir)
{
	//echo "<P><BR><font color=red>$base_dir</font><BR></P>";
	$dir = opendir($base_dir);
	while($flist=readdir($dir))
	{
		if($flist!="." && $flist!="..")
		{
			if(is_dir($base_dir."/".$flist))
			{
				fdelfiledir($base_dir."/".$flist);
				rmdir($base_dir."/".$flist);
			}else{
				//echo "del:$base_dir/$flist<BR>";
				P_unlink($base_dir."/".$flist);
			}
		}
	}
	closedir($dir);
}
function fdelfiletmp($base_dir)
{
	$dir = opendir($base_dir);
	while($flist=readdir($dir))
	{
		if($flist!="." && $flist!="..")
		{
			if(filesize($base_dir."/".$flist)==0)
			P_unlink($base_dir."/".$flist);
			if(eregi("(_g.js)$", $flist))
			P_unlink($base_dir."/".$flist);
			if(filemtime($base_dir."/".$flist) > $mtime[1]+1000)
			P_unlink($base_dir."/".$flist);
		}
	}
}
?>