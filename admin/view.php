<?php
if($option == 'index')
{
	$modle = array("index"=>"首页","news"=>"最新动态","info"=>"简介","scenic"=>"景区","hotel"=>"酒店","hotel"=>"酒店");
	$roads = array("single"=>"详细");
	$smarty->assign('modle',$modle);
	$smarty->assign('roads',$roads);
	
	$nCount = $cache_config['numser']?$cache_config['numser']:"10";
	$cParameter = "action={$action}&option={$option}";
	include_once Getincludefun("page");
	$nNums = $GETSQL->fNumrows("SELECT view_id FROM `{$ODBC['tablepre']}view`");
	$sql_link = $GETSQL->fSql("*","`{$ODBC['tablepre']}view`","","ORDER BY `view_id` DESC",$nPage*$nCount,$nCount);
	if($nNums > 0)
	{
		$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showtable",1);
		$smarty->assign('sql_link',$sql_link);
		$smarty->assign('fpageup',$fpageup);
	}
	$smarty->display("view.htm");
}
//UPDATE `eb_view` SET `view_time` = FROM_UNIXTIME( UNIX_TIMESTAMP( `view_time` ) - rand()*86400*365*2 , '%Y-%m-%d %H:%i:%s' ) WHERE YEAR(`view_time`) = '2008'
?>