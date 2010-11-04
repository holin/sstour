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
	$cParameter = "action=$action&option=$option&id=$id";
	include_once Getincludefun("page");
	if($id!='')
	{
		$sql_class = $GETSQL->fSql("*","`{$ODBC['tablepre']}class`","`type_id`='{$id}'","","","","U_B");
		$where = "`new_type`='{$id}'";
	}else{
		$sql_class = $GETSQL->fSql("*","`{$ODBC['tablepre']}class`","`type_live`='1'","ORDER BY `type_sp` DESC,`type_id` DESC");
		foreach ($sql_class AS $value)
		{
			$sqlclass[] = $value['type_id'];
		}
		$whereclass = implode("','",$sqlclass);
		$where = "`new_type` IN ('{$whereclass}')";
	}
	$nNums = $GETSQL->fNumrows("SELECT new_id FROM `{$ODBC['tablepre']}info` WHERE {$where}");
	if($nNums > 0)
	{
		$sql_info = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","{$where}","ORDER BY `new_date` DESC,`new_id` DESC",$nPage*$nCount,$nCount);
		foreach ($sql_info AS $key => $value)
		{
			$sql_info[$key]['new_content'] = fconurt($value['new_content']);
		}
		if($nNums > $nCount)
		{
			$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
			$smarty->assign('fpageup',$fpageup);
		}
	}
	$smarty->assign('sql_info',$sql_info);
	$smarty->assign('sql_class',$sql_class);

	$smarty->assign('rentime',fmicrotime());
	$smarty->display("info.htm");
}
if($option == 'merchants')
{
	$smarty->assign('config',array(
	'title' => "{$cache_config['subject']}_招商",
	'keywords' =>$config['keywords']."_招商_{$cache_config['subject']}",
	'description' => $config['description']."_招商_{$cache_config['subject']}"));

	$nCount = $cache_config['numser']?$cache_config['numser']:"20";
	$cParameter = "action=$action&option=$option&id=$id";
	include_once Getincludefun("page");
	if($id!='')
	{
		$sql_class = $GETSQL->fSql("*","`{$ODBC['tablepre']}class`","`type_id`='{$id}'","","","","U_B");
		$where = "`new_type`='{$id}'";
	}else{
		$sql_class = $GETSQL->fSql("*","`{$ODBC['tablepre']}class`","`type_live`='9'","ORDER BY `type_sp` DESC,`type_id` DESC");
		foreach ($sql_class AS $value)
		{
			$sqlclass[] = $value['type_id'];
		}
		$whereclass = implode("','",$sqlclass);
		$where = "`new_type` IN ('{$whereclass}')";
	}
	$nNums = $GETSQL->fNumrows("SELECT new_id FROM `{$ODBC['tablepre']}info` WHERE {$where}");
	if($nNums > 0)
	{
		$sql_info = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","{$where}","ORDER BY `new_date` DESC,`new_id` DESC",$nPage*$nCount,$nCount);
		if($nNums > $nCount)
		{
			$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
			$smarty->assign('fpageup',$fpageup);
		}
	}
	$smarty->assign('sql_info',$sql_info);
	$smarty->assign('sql_class',$sql_class);

	$smarty->assign('rentime',fmicrotime());
	$smarty->display("merchants.htm");
}
if($option == 'xuexi')
{
	$smarty->assign('config',array(
	'title' => "{$cache_config['subject']}_学习",
	'keywords' =>$config['keywords']."_学习_{$cache_config['subject']}",
	'description' => $config['description']."_学习_{$cache_config['subject']}"));

	$nCount = $cache_config['numser']?$cache_config['numser']:"20";
	$cParameter = "action=$action&option=$option&id=$id";
	include_once Getincludefun("page");
	if($id!='')
	{
		$sql_class = $GETSQL->fSql("*","`{$ODBC['tablepre']}class`","`type_id`='{$id}'","","","","U_B");
		$where = "`new_type`='{$id}'";		

		$nNums = $GETSQL->fNumrows("SELECT new_id FROM `{$ODBC['tablepre']}info` WHERE {$where}");
		if($nNums > 0)
		{
			$sql_info = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","{$where}","ORDER BY `new_date` DESC,`new_id` DESC",$nPage*$nCount,$nCount);
			if($nNums > $nCount)
			{
				$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
				$smarty->assign('fpageup',$fpageup);
			}
		}
		$smarty->assign('sql_info',$sql_info);
	}else{
		$sql_class = $GETSQL->fSql("*","`{$ODBC['tablepre']}class`","`type_live`='49'","ORDER BY `type_sp` DESC,`type_id` DESC");
		foreach ($sql_class AS $value)
		{
			$list[$value['type_id']] = $GETSQL->fSql("*","`{$ODBC['tablepre']}info`","`new_type`='{$value['type_id']}'","ORDER BY `new_date` DESC,`new_id` DESC",0,5);
		}
		$smarty->assign('list',$list);
	}
	$smarty->assign('sql_class',$sql_class);
	
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("xuexi.htm");
}
if($option == 'single')
{
	$smarty->assign('config',array(
	'title' => "{$cache_config['subject']}",
	'keywords' =>$config['keywords']."_{$cache_config['subject']}",
	'description' => $config['description']."_{$cache_config['subject']}"));

	$sql_info = $GETSQL->fSql("a.*,b.*","`{$ODBC['tablepre']}info` a,`{$ODBC['tablepre']}class` b","a.`new_id`='{$id}' AND a.`new_type`=b.`type_id`","","","","U_B");
	$smarty->assign('sql_info',$sql_info);

	$smarty->assign('rentime',fmicrotime());
	$smarty->display("infosingle.htm");
}
if($option == 'merchantssingle')
{
	$smarty->assign('config',array(
	'title' => "{$cache_config['subject']}",
	'keywords' =>$config['keywords']."_{$cache_config['subject']}",
	'description' => $config['description']."_{$cache_config['subject']}"));

	$sql_info = $GETSQL->fSql("a.*,b.*","`{$ODBC['tablepre']}info` a,`{$ODBC['tablepre']}class` b","a.`new_id`='{$id}' AND a.`new_type`=b.`type_id`","","","","U_B");
	$smarty->assign('sql_info',$sql_info);

	$smarty->assign('rentime',fmicrotime());
	$smarty->display("merchantssingle.htm");
}
if($option == 'xuexisingle')
{
	$smarty->assign('config',array(
	'title' => "{$cache_config['subject']}",
	'keywords' =>$config['keywords']."_{$cache_config['subject']}",
	'description' => $config['description']."_{$cache_config['subject']}"));

	$sql_info = $GETSQL->fSql("a.*,b.*","`{$ODBC['tablepre']}info` a,`{$ODBC['tablepre']}class` b","a.`new_id`='{$id}' AND a.`new_type`=b.`type_id`","","","","U_B");
	$smarty->assign('sql_info',$sql_info);

	$smarty->assign('rentime',fmicrotime());
	$smarty->display("xuexisingle.htm");
}
?>