<?php
if($config['bbs'] == '1')
$pmsgN = $GETSQL->fNumrows("SELECT pmid FROM `cdb_pms` WHERE `msgtoid`='{$uid}' AND `new`='1'");
else
$pmsgN = $GETSQL->fNumrows("SELECT pmid FROM `{$ODBC['tablepre']}pms` WHERE `msgtoid`='{$uid}' AND `new`='1'");
if($pmsgN > 0)
{	
	$smarty->assign('configbbs',$config['bbs']);
	$smarty->assign('pmsgN',$pmsgN);
	$smarty->display("pmsg.htm");
}
?>