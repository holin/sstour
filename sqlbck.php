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

include_once Getincludefun("odbc");//调用数据库操作
$GETSQL = new Codbc();
include_once Getincludefun("all");//常用函数
$c_sid = $_SESSION['cdb_sid'];//判断会员登陆
$c_auth = $_SESSION['cdb_auth'];//判断会员登陆
$sql_file = $_SESSION['sql_file'];//判断会员登陆
list($userpw, $uname, $uid) = isset($c_auth) ? explode("\t", authcode($c_auth, 'DECODE')) : array('', '', 0);
if($uid<'1' || $c_auth=='' || $sql_file=='')
{
	die("您没有权限操作数据");
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
	echo "正在对数据进行恢复...<BR>
		恢复数据$nextsql<BR>
		不要关闭或者更换连接，否则数据将导入失败。请耐心等待<BR>如果您的浏览器长时间没有跳转请点击<a href='sqlbck.php?id={$next}'>下一页</a>";
}else{
	echo "恢复完毕请退出登陆后重新检查网站是否正常";
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