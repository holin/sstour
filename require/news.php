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

	$nCount = $cache_config['numser']?$cache_config['numser']:"20";
	$cParameter = "action=$action&option=$option&id=$id&Industry=$Industry&Keyword={$Keyword}";
	include_once Getincludefun("page");
	if($id!='')
	{
		$sql_class = $GETSQL->fSql("*","`{$ODBC['tablepre']}columns`","`type_id`='{$id}'","","","","U_B");
		$where = "`new_type`='{$id}'";
	}else{
		$sql_class = $GETSQL->fSql("*","`{$ODBC['tablepre']}columns`","`type_id`='1'","","","","U_B");
		$where = "`new_type`='1'";
	}
	$nNums = $GETSQL->fNumrows("SELECT new_id FROM `{$ODBC['tablepre']}news` WHERE {$where}");
	if($nNums > 0)
	{
		$sql_info = $GETSQL->fSql("*","`{$ODBC['tablepre']}news`","{$where}","ORDER BY `new_date` DESC,`new_id` DESC",$nPage*$nCount,$nCount);
		//if($id == 4 || $id == 5)
		//{
			foreach ($sql_info AS $key => $value)
			{
				$sql_info[$key]['new_content'] = fconurt($value['new_content']);
			}
		//}
		if($nNums > $nCount)
		{
			$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
			$smarty->assign('fpageup',$fpageup);
		}
	}
	$smarty->assign('sql_info',$sql_info);
	$smarty->assign('sql_class',$sql_class);

	$smarty->assign('rentime',fmicrotime());
	$smarty->display("news.htm");
}
if($option == 'single')
{
	$smarty->assign('config',array(
	'title' => "{$cache_config['subject']}",
	'keywords' =>$config['keywords']."_{$cache_config['subject']}",
	'description' => $config['description']."_{$cache_config['subject']}"));

	$sql_info = $GETSQL->fSql("a.*,b.*","`{$ODBC['tablepre']}news` a,`{$ODBC['tablepre']}columns` b","a.`new_id`='{$id}' AND a.`new_type`=b.`type_id`","","","","U_B");
	$smarty->assign('sql_info',$sql_info);

	$smarty->assign('rentime',fmicrotime());
	$smarty->display("newssingle.htm");
}
?>