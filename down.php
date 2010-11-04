<?
set_time_limit(0);
ob_start();
include_once "./include/config.php";
include_once "./include/sql_config.php";
include_once "./global.php";
include_once Getincludefun("all");

header("Content-type:text/html; charset={$ODBC['charset']}");

$_GET['mu'] = str_replace(" ","",$_GET['mu']);
echo md5($_GET['code'].$config['HTMLcode'].$_GET['file'].$_GET['mu'])." = 8ebea78e9f5279fb434b3a1e8eef24e5";exit;
//$md ."==". md5($_GET['code'].$config['HTMLcode'].$_GET['file'].$_GET['mu']);exit;
if($_GET['md'] == md5($_GET['code'].$config['HTMLcode'].$_GET['file'].$_GET['mu']))
{
	$file_name = $_GET['file'];
	$file_dir = fdecrypt($_GET['mu'],$config['HTMLcode']);
}
if (!file_exists($file_dir."/".$file_name) && $file_name!='') { //检查文件是否存在
	if(!file_exists("attach/down/".$file_name))
	{
		echo "文件找不到";
		exit;
	}
	$file_dir = "attach/down/";
}

$file_dir_file = chop($file_dir."/".$file_name);//去掉路径中多余的空格
$fp = fopen($file_dir_file,"r"); //打开文件
$file_size = filesize($file_dir_file);
$file_extension = strtolower(substr(strrchr($file_dir_file,"."),1));
//输入文件标签
switch ($file_extension) {
	case "pdf": $ctype="application/pdf"; break;
	case "exe": $ctype="application/octet-stream"; break;
	case "zip": $ctype="application/zip"; break;
	case "doc": $ctype="application/msword"; break;
	case "xls": $ctype="application/vnd.ms-excel"; break;
	case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
	case "gif": $ctype="image/gif"; break;
	case "png": $ctype="image/png"; break;
	case "jpe": case "jpeg":
	case "jpg": $ctype="image/jpg"; break;
	default: $ctype="application/force-download";
}
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
header("Content-Type: $ctype");
header("Content-Disposition: attachment; filename=".$file_name);
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".$file_size);
set_time_limit(0);
$buffer_size = 1024;
$cur_pos = 0;
while(!feof($fp)&&$file_size-$cur_pos>$buffer_size)
{
	$buffer = fread($fp,$buffer_size);
	echo $buffer;
	$cur_pos += $buffer_size;
}
$buffer = fread($fp,$file_size-$cur_pos);
echo $buffer;
fclose($fp);
return true;
ob_end_flush();
?>