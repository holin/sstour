<?php
if($option == 'index')
{
	if($_POST['update'] == 'update')
	{
		fgetposttoupdatd($_POST,$ODBC['charset']);
		foreach ($_POST['config'] AS $k=>$v)
		{
			//$sql_config = $GETSQL->fSql("*","`{$ODBC['tablepre']}config`","`config_subject`='{$k}'","","","","U_B");
			$GETSQL->fUpdate("`{$ODBC['tablepre']}config`","`config_content`='{$v}'","`config_subject`='{$k}'");
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
		die(gb2utf8("信息设置修改成功"));
	}
	$sql_config = $GETSQL->fSql("*","`{$ODBC['tablepre']}config`","`config_subject` IN ('webclose','webname','title','icp','main','keywords','description','mail','time','attach','size','bbs')","");
	foreach ($sql_config AS $value)
	{
		$smarty->assign($value['config_subject'],htmlspecialchars($value['config_content']));
	}
	$smarty->display("basic.htm");
}
?>