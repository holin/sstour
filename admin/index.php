<?php
if($option == 'index')
{
	$smarty->assign('config',array(
	'title' => $config['title']."_��̨����",
	'keywords' =>$config['keywords']."_��̨����",
	'description' => $config['description']."_��̨����"));
	
	$sql_admin = $GETSQL->fSql("*","`{$ODBC['tablepre']}admin`","","ORDER BY `type_id`");
	$smarty->assign('sql_admin',$sql_admin);
	
	$allsystem = "";
	if($sql_pop['group_system'] == "administrator" && $sql_pop['group_authority'] == "all")
	$allsystem = "all";
	$smarty->assign('allsystem',$allsystem);
	
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("index.htm");
}
?>