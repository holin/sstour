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
	'title' => "{$cache_config['subject']}",
	'keywords' =>$config['keywords']."_{$cache_config['subject']}",
	'description' => $config['description']."_{$cache_config['subject']}"));

	$sql_37 = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","`new_type`='37'","ORDER BY `new_id`");
	$smarty->assign('sql_37',$sql_37);//国务院行政法规及规范性文件
	
	$sql_38 = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","`new_type`='38'","ORDER BY `new_id`");
	$smarty->assign('sql_38',$sql_38);//地方性法规
	
	$sql_39 = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","`new_type`='39'","ORDER BY `new_id`");
	$smarty->assign('sql_39',$sql_39);//地方政府规章及规范性文件
	
	$sql_40 = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","`new_type`='40'","ORDER BY `new_id`");
	$smarty->assign('sql_40',$sql_40);//国家旅游局规章及规范性文件
	
	$sql_41 = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","`new_type`='41'","ORDER BY `new_id`");
	$smarty->assign('sql_41',$sql_41);//旅游标准

	$smarty->assign('rentime',fmicrotime());
	$smarty->display("gongkai_36.htm");
}
if($option == '42')
{
	$smarty->assign('config',array(
	'title' => "{$cache_config['subject']}",
	'keywords' =>$config['keywords']."_{$cache_config['subject']}",
	'description' => $config['description']."_{$cache_config['subject']}"));

	$sql_42 = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","`new_type`='42'","ORDER BY `new_id`");
	$smarty->assign('sql_42',$sql_42);//规划计划


	$smarty->assign('rentime',fmicrotime());
	$smarty->display("gongkai_42.htm");
}
if($option == '43')
{
	$smarty->assign('config',array(
	'title' => "{$cache_config['subject']}",
	'keywords' =>$config['keywords']."_{$cache_config['subject']}",
	'description' => $config['description']."_{$cache_config['subject']}"));

	$sql_46 = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","`new_type`='46'","ORDER BY `new_id`");
	$smarty->assign('sql_46',$sql_46);//行政许可
	
	$sql_45 = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","`new_type`='45'","ORDER BY `new_id`");
	$smarty->assign('sql_45',$sql_45);//行政处罚
	
	$sql_44 = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","`new_type`='44'","ORDER BY `new_id`");
	$smarty->assign('sql_44',$sql_44);//行政审批


	$smarty->assign('rentime',fmicrotime());
	$smarty->display("gongkai_43.htm");
}
?>