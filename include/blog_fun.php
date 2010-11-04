<?php
function fsetsession()
{
	global $GETSQL,$ODBC,$onlineip,$uid,$config,$nowtime,$id;//$config['online']
	$lastactivity = $nowtime - $config['online'];
	$GETSQL->fDelete("`cdb_sessions`","`lastactivity`>'{$lastactivity}'","100");
	$sql_sessions = $GETSQL->fSql("sid","`cdb_sessions`","CONCAT_WS('.',ip1,ip2,ip3,ip4)='$onlineip'","","","","U_B");
	$sql_member = $GETSQL->fSql("username","`cdb_member`","`uid`='$uid'","","","","U_B");
	if($sql_sessions['sid']!='')
	{
		$GETSQL->fUpdate("`cdb_sessions`","`ip1`='{$ips[0]}',`ip2`='{$ips[1]}',`ip3`='{$ips[2]}',`ip4`='{$ips[3]}',`lastactivity`='{$nowtime}'","`uid`='{$id}'");
	}else{
		$ips = explode('.', $onlineip);
		$cQuery = array("`sid`", "`ip1`", "`ip2`", "`ip3`", "`ip4`", "`uid`","`username`","`lastactivity`");
		$cData = array($sid,$ips[0],$ips[1],$ips[2],$ips[3],$uid,$sql_members['username'],$nowtime);
		$GETSQL->fInsert("`cdb_sessions`",$cQuery,$cData);
	}
	
	if($uid != $id && $uid>0)
	{
		$sql_activity = $GETSQL->fSql("aid,toid","`{$ODBC['tablepre']}activity`","`uid`='{$uid}'","ORDER BY `date` DESC,`aid` DESC");
		$n = count($sql_activity);$activity = "no";
		foreach ($sql_activity AS $value)
		{
			if($value['toid'] == $id)
			{
				$GETSQL->fUpdate("`{$ODBC['tablepre']}activity`","`date`='".fgetdate()."'","`uid`='{$id}' AND `toid`='{$id}'");
				$activity = "yes";
			}
		}
		if($n<20 && $activity == "no")
		{
			$cQuery = array("`aid`", "`uid`", "`toid`", "`date`");
			$cData = array($nowtime,$uid,$id,fgetdate());
			$GETSQL->fInsert("`{$ODBC['tablepre']}activity`",$cQuery,$cData);
			$GETSQL->fUpdate("`{$ODBC['tablepre']}member`","`blogsee`=`blogsee`+1","`uid`='{$id}'");
		}elseif($activity == "no"){
			$GETSQL->fUpdate("`{$ODBC['tablepre']}activity`","`date`='".fgetdate()."'","`uid`='{$id}' AND `aid`='{$sql_activity[0]['aid']}'");
		}
	}
}
?>