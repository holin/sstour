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

	if($Keyword)
	{
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$where = "`thr_subject` LIKE '%{$Keyword}%'";
	}else{
		$where = 1;
	}
	
	$nNums = $GETSQL->fNumrows("SELECT thr_id FROM `{$ODBC['tablepre']}hotelyou` WHERE {$where}");
	if($nNums > 0)
	{
		$sql_hotelyou = $GETSQL->fSql("thr_id,thr_hid,thr_subject","`{$ODBC['tablepre']}hotelyou`","{$where}","ORDER BY `thr_date` DESC,`thr_id` DESC",$nPage*$nCount,$nCount);
		if($nNums > $nCount)
		{
			$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
			$smarty->assign('fpageup',$fpageup);
		}
	}
	$smarty->assign('sql_hotelyou',$sql_hotelyou);

	$smarty->assign('rentime',fmicrotime());
	$smarty->display("hotelseach.htm");
}
if($option == 'scenic')
{
	$smarty->assign('config',array(
	'title' => "{$cache_config['subject']}",
	'keywords' =>$config['keywords']."_{$cache_config['subject']}",
	'description' => $config['description']."_{$cache_config['subject']}"));

	$nCount = $cache_config['numser']?$cache_config['numser']:"20";
	$cParameter = "action=$action&option=$option&id=$id&Industry=$Industry&Keyword={$Keyword}";
	include_once Getincludefun("page");

	if($Keyword)
	{
		fgetposttoupdatd($Keyword,$ODBC['charset']);
		$where = "`thr_subject` LIKE '%{$Keyword}%'";
	}else{
		$where = 1;
	}
	
	$nNums = $GETSQL->fNumrows("SELECT thr_id FROM `{$ODBC['tablepre']}scenicyou` WHERE {$where}");
	if($nNums > 0)
	{
		$sql_hotelyou = $GETSQL->fSql("thr_id,thr_hid,thr_subject","`{$ODBC['tablepre']}scenicyou`","{$where}","ORDER BY `thr_date` DESC,`thr_id` DESC",$nPage*$nCount,$nCount);
		if($nNums > $nCount)
		{
			$fpageup = fPages($nNums,$nPage,$nCount,$cParameter,1);
			$smarty->assign('fpageup',$fpageup);
		}
	}
	$smarty->assign('sql_hotelyou',$sql_hotelyou);

	$smarty->assign('rentime',fmicrotime());
	$smarty->display("scenicseach.htm");
}
?>