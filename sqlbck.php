<?php
$giz = !ereg('gzip',$_SERVER['HTTP_ACCEPT_ENCODING']) || $_GET['read'] == '1'? 0:1;
$giz == 1 ? ob_start("ob_gzhandler"):ob_start();
include_once "./include/config.php";
include_once "./global.php";
include_once R_P."include/sql_config.php";

$action = $_GET['action']?$_GET['action']:'index';
$option = $_GET['option']?$_GET['option']:"index";
$id = $_GET['id']?$_GET['id']:"";
$nPage = $_GET['page']?$_GET['page']:"";
$Industry = $_GET['Industry']?$_GET['Industry']:"";
$type = $_GET['type']?$_GET['type']:"";
$Keyword = $_GET['Keyword']?$_GET['Keyword']:$_POST['Keyword'];
$userop = "action=$action&id=$id&option=$option&Keyword={$Keyword}&type={$_GET['type']}&page=$nPage";

include_once Getincludefun("odbc");//�������ݿ����
$GETSQL = new Codbc();
include_once Getincludefun("all");//���ú���
$c_sid = $_SESSION['cdb_sid'];//�жϻ�Ա��½
$c_auth = $_SESSION['cdb_auth'];//�жϻ�Ա��½
$sql_file = $_SESSION['sql_file'];//�жϻ�Ա��½
list($userpw, $uname, $uid) = isset($c_auth) ? explode("\t", authcode($c_auth, 'DECODE')) : array('', '', 0);
if($uid<'1' || $c_auth=='' || $sql_file=='')
{
	die("��û��Ȩ�޲�������");
}
$sql_file_name = explode("_",$sql_file);
$id = $_GET['id']?$_GET['id']:"0";
$nextfile = explode(".",$sql_file_name[3]);
$next = $nextfile[0] + $id;
$nextsql = "{$sql_file_name[0]}_{$sql_file_name[1]}_{$sql_file_name[2]}_{$next}.{$nextfile[1]}";
if(file_exists(R_P."data/".$nextsql))
{
	bakindatafile(R_P."data/".$nextsql);
	echo "<meta http-equiv='refresh' content='2;url=sqlbck.php?id={$next}'>";
	echo "���ڶ����ݽ��лָ�...<BR>
		�ָ�����$nextsql<BR>
		��Ҫ�رջ��߸������ӣ��������ݽ�����ʧ�ܡ������ĵȴ�<BR>��������������ʱ��û����ת����<a href='sqlbck.php?id={$next}'>��һҳ</a>";
}else{
	echo "�ָ�������˳���½�����¼����վ�Ƿ�����";
}
function bakindatafile($filename) {
	global $GETSQL,$ODBC;
	$sql=file($filename);
	$query='';
	$num=0;
	foreach($sql as $key => $value){
		$value=trim($value);
		if(!$value || $value[0]=='#') continue;
		if(eregi("\;$",$value)){
			$query.=$value;
			if(eregi("^CREATE",$query)){
				$extra = substr(strrchr($query,')'),1);
				$query = str_replace($extra,'',$query);
				if($GETSQL->cinfo > '4.1'){
					$extra = $charset ? "ENGINE=MyISAM DEFAULT CHARSET={$ODBC['charset']};" : "ENGINE=MyISAM;";
				}else{
					$extra = "TYPE=MyISAM;";
				}
				$query .= $extra;
			}elseif(eregi("^INSERT",$query)){
				$query='REPLACE '.substr($query,6);
			}
			$GETSQL->fQuery($query);
			$query='';
		}else{
			$query.=$value;
		}
	}
}
ob_end_flush();
?>