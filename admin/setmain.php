<?php
if($option == 'index')
{
	if($_POST['update'] == 'update')
	{
		fgetposttoupdatd($_POST,$ODBC['charset']);
		foreach ($_POST['config'] AS $k=>$v)
		{
			//$sql_config = $GETSQL->fSql("*","`{$ODBC['tablepre']}main`","`main_subject`='{$k}'","","","","U_B");
			$GETSQL->fUpdate("`{$ODBC['tablepre']}main`","`main_info`='{$v}'","`main_subject`='{$k}'");
		}
		$sql_config = $GETSQL->fSql("*","`{$ODBC['tablepre']}main`","","");
		$closewindow = "javascript:document.getElementById('setmain').innerHTML='';document.getElementById('setmain').style.width='0px';document.getElementById('setmain').style.height='0px';void(null);";
		foreach ($sql_config AS $value)
		{
			if($value['main_subject'] == 'bgcolor')
			$maintxt .= "background-color: {$value['main_info']};";
			if($value['main_subject'] == 'bgimage')
			$maintxt .= "background-image: url({$value['main_info']});";
			if($value['main_subject'] == 'transparent')
			$maintxt .= "filter:Alpha(Opacity={$value['main_info']}, FinishOpacity=100);";
			if($value['main_subject'] == 'info')
			$infotxt = $value['main_info'];
			if($value['main_subject'] == 'nesting'){
				if($value['main_info'] == '0')
				{
					$phptext = "<TITLE>引导页</TITLE>\n<LINK href='lang/css.css' type='text/css' rel=stylesheet>\n<?php\n exit; \n?>";
					$closewindow = "index.php?action=index";
				}
			}
		}
		$configtxt = "<div id=setmain style=\"left:0px;top:0px;right:0px;position:absolute;z-index:1;width:100%;height:100%;{$maintxt};\">{$infotxt}</div>{$phptext}";
		ffile(R_P."cache/main.php",$configtxt);
		die(gb2utf8("引导页设置修改成功"));
	}
	$sql_config = $GETSQL->fSql("*","`{$ODBC['tablepre']}main`","","");
	foreach ($sql_config AS $value)
	{
		$smarty->assign($value['main_subject'],htmlspecialchars($value['main_info']));
	}
	$smarty->display("setmain.htm");
}
?>