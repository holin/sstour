<?php
include_once "./include/config.php";
include_once "./global.php";
if($config['webclose'] == '0')
Showmsg("Ϊ�˸��õķ������ǵ�ϵͳ����������...<BR>���Ժ��ڷ��ʣ��ڼ��������������ԭ��",0,'');
include_once R_P."include/sql_config.php";

header("Content-type:text/html; charset={$ODBC['charset']}");

$action = $_GET['action']?$_GET['action']:'index';
$option = $_GET['option']?$_GET['option']:"index";
$id = $_GET['id']?$_GET['id']:"";
$nPage = $_GET['page']?$_GET['page']:"";
$Industry = $_GET['Industry']?$_GET['Industry']:"";
$type = $_GET['type']?$_GET['type']:"";
$Keyword = $_GET['Keyword']?$_GET['Keyword']:$_POST['Keyword'];
$userop = "action={$action}&id={$id}&option={$option}&Keyword={$Keyword}&type={$_GET['type']}&page={$nPage}&Industry={$Industry}";
$PHPSESSID = $_COOKIE['PHPSESSID']?$_COOKIE['PHPSESSID']:$_SESSION['PHPSESSID'];

include_once Getincludefun("all");//���ú���
if($config['bbs'] == '1')
include_once R_P."bbs/forumdata/cache/cache_settings.php";//���ú���
$discuz_auth_key = md5($_DCACHE['settings']['authkey'].$_SERVER['HTTP_USER_AGENT']);
$c_sid = $_COOKIE['cdb_sid']?$_COOKIE['cdb_sid']:$_SESSION['cdb_sid'];//�жϻ�Ա��½
$c_auth = $_COOKIE['cdb_auth']?$_COOKIE['cdb_auth']:$_SESSION['cdb_auth'];//�жϻ�Ա��½
list($userpw, $uname, $uid) = isset($c_auth) ? explode("\t", authcode($c_auth, 'DECODE')) : array('', '', 0);

include_once Getincludefun("odbc");//�������ݿ����
$GETSQL = new Codbc();
if($action == 'index')
{
	//echo "<script>parent.getNews('showindex','{$boardurl}index.php?action=index&option=all');</script>";
}
?>