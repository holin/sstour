<?php
if($option == 'index')
{
	if($_POST['update'] == 'update')
	{
		fgetposttoupdatd($P,$ODBC['charset']);
		foreach ($P['hack_adhead'] AS $k=>$v)
		{
			$GETSQL->fUpdate("`{$ODBC['tablepre']}hack`","`hack_adhead`='{$v}'","`hack_action`='{$k}'");
		}
		foreach ($P['hack_adbody'] AS $k=>$v)
		{
			$GETSQL->fUpdate("`{$ODBC['tablepre']}hack`","`hack_adbody`='{$v}'","`hack_action`='{$k}'");
		}
		foreach ($P['hack_adfoot'] AS $k=>$v)
		{
			$GETSQL->fUpdate("`{$ODBC['tablepre']}hack`","`hack_adfoot`='{$v}'","`hack_action`='{$k}'");
		}
		$sql_config = $GETSQL->fSql("*","`{$ODBC['tablepre']}hack`","","");
		foreach ($sql_config AS $value)
		{
			$configtxt = "<?php\n\$cache_config['subject'] = \"{$value['hack_subject']}\";\n\$cache_config['cache'] = \"{$value['hack_cache']}\";\n\$cache_config['cachetime'] = \"{$value['hack_cachetime']}\";\n\$cache_config['htmlteml'] = \"{$value['hack_htmlteml']}\";\n\$cache_config['numser'] = \"{$value['hack_numser']}\";\n\$cache_config['hack_adhead'] = stripslashes(\"".addslashes($value['hack_adhead'])."\");\n\$cache_config['hack_adbody'] = stripslashes(\"".addslashes($value['hack_adbody'])."\");\n\$cache_config['hack_adfoot'] = stripslashes(\"".addslashes($value['hack_adfoot'])."\");\n?>";
			ffile(R_P."cache/cache_{$value['hack_action']}.php",$configtxt);
		}
		die(gb2utf8("插件设置修改成功"));
	}
	$sql_hack = $GETSQL->fSql("*","`{$ODBC['tablepre']}hack`","","");
	$smarty->assign('sql_hack',$sql_hack);
	$smarty->display("advertising.htm");
}
?>