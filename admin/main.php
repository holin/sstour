<?php
$sql_rs = $GETSQL->fArray("SHOW TABLE STATUS");
foreach ($sql_rs AS $value)
{
	if (ereg("^{$ODBC['tablepre']}",$value['Name'])){
		$pw_size = $pw_size + $value['Data_length'] + $value['Index_length'];
	} else{
		$o_size = $o_size + $value['Data_length'] + $value['Index_length'];
	}
}
$max_upload = ini_get('file_uploads') ? ini_get('upload_max_filesize') : 'Disabled';
$sys_mail   = ini_get('sendmail_path') ? 'Unix Sendmail ( Path: '.ini_get('sendmail_path').')' :( ini_get('SMTP') ? 'SMTP ( Server: '.ini_get('SMTP').')': 'Disabled' );
$ifcookie   = isset($_COOKIE) ? "SUCCESS" : "FAIL";
$smarty->assign('o_size',number_format($o_size/(1024*1024),2));
$smarty->assign('pw_size',number_format($pw_size/(1024*1024),2));
$smarty->assign('dbversion',$GETSQL->cinfo);
$smarty->assign('altertime',get_date(time(),'Y-m-d H:i'));
$smarty->assign('sysversion',PHP_VERSION);
$smarty->assign('sysos',$_SERVER['SERVER_SOFTWARE']);
$smarty->assign('max_upload',$max_upload);
$smarty->assign('max_ex_time',ini_get('max_execution_time').' seconds');
$smarty->assign('sys_mail',$sys_mail);
$smarty->assign('ifcookie',$ifcookie);
$smarty->display("main.htm");
?>