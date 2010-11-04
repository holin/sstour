<?php
/**
*
*  Copyright (c) 2003-06  oi77.com All rights reserved.
*  trexwb : http://www.oi77.com
*  This software is the proprietary information of oi77.com.
*
* if(!empty($HTTP_SERVER_VARS['REQUEST_URI']) && (strstr($HTTP_SERVER_VARS['REQUEST_URI'], "all_fun.php")))
{
	die("您没权限浏览本页<BR>如果您需要查看本页<a href='http://www.oi77.com'>请与管理员联系</a>");
}
*/


function P_unlink($filename){
	strpos($filename,'..')!==false && exit('Forbidden');
	unlink($filename);
}

function ffile($file,$txt,$read="w")
{
	if($read == 'w' || $read == 'wb')
	{
		//P_unlink($file);
		$fp = fopen($file,$read);
		//flock($fp,LOCK_SH);
		fwrite ($fp,$txt);
		fclose ($fp); //关闭指针
		chmod($file,0777);
	}elseif($read == 'rb'){
		$fp = fopen($file,$read);
		$txt = fread($fp,filesize($file));
		fclose ($fp); //关闭指针
	}elseif($read == 'r')
	$txt = file_get_contents($file);
	return $txt;
}

function fdeldir($dir)
{
	global $config;
	$mu = R_P."{$config['attach']}/{$dir}";
	$hand = opendir($mu);
	while ($file = readdir($hand))
	{
		if($file!="." && $file!='..' && $file!='')
		{
			if(is_dir($mu."/".$file))
			{
				$hand1 = opendir($mu."/".$file);
				while ($file1 = readdir($hand1))
				{
					if($file1!="." && $file1!='..' && $file1!='')
					unlink($mu."/".$file."/".$file1);
				}
				closedir($hand1);
				rmdir($mu."/".$file);
			}else
			unlink($mu."/".$file);
		}
	}
	closedir($hand);
	rmdir($mu);
}
function fChar($str,$type)
{
	$str = trim(ltrim($str));
	switch ($type)
	{
		case "email":
			if(strlen($str) > 5 and strlen($str) < 40)
			{
				if(!eregi("^[0-9a-z~'!#$%&_-]([.]?[0-9a-z~!#$%&_-])*" . "@[0-9a-z~!#$%&_-]([.]?[0-9a-z~!#$%&_-])*$", $str))
				return false;
			}else
			return false;
			break;
		case "ID":
			if(strlen($str) > 3 and strlen($str) < 17)
			{
				if(!eregi("^[0-9a-z_-]([.]?[0-9a-z_-])*" . "[0-9a-z_-]([.]?[0-9a-z_-])*$", $str))
				return false;
			}else
			return false;
			break;
		case "TEL":
			if(strlen($str) > 6 and strlen($str) < 18)
			{
				if(!eregi("^[0-9]*$", $str))
				return false;
			}else
			return false;
			break;
		default:
		case "pwd":
			if(strlen($str) > 6 and strlen($str) < 16)
			{
				if(!eregi("^[0-9a-zA-Z_-]([.]?[0-9a-zA-z_-])*" . "[0-9a-zA-Z_-]([.]?[0-9a-zA-Z_-])*$", $str))
				return false;
			}elseif (strlen($str) < 6)
			return false;
			elseif (strlen($str) > 16)
			return false;
			break;
	}
	return fCharchr($str);
}
function fmicrotime()
{
	global $m_time;
	$mtime_end = explode(' ', microtime());
	$m_time_end = $mtime_end[1] + $mtime_end[0];
	$micro = abs($m_time - $m_time_end);
	return $micro;
}
function fencrypt($date,$pwd)
{
	//$date = base64_decode($date);
	for ($i=0,$j=0;$i<strlen($date);$i++,$j++)
	{
		$middle = ord(substr($date,$i,1)) + ord(substr($pwd,$j,1));
		if($j> strlen($pwd)){$j=0;}
		$setr .= chr($middle);
	}
	$setr = base64_encode($setr);
	return $setr;
}
function fdecrypt($date,$pwd)
{
	$date = base64_decode($date);
	for($i=0,$j=0;$i<strlen($date);$i++,$j++)
	{
		$middle = ord(substr($date,$i,1)) - ord(substr($pwd,$j,1));
		$setr .= chr($middle);
	}
	//$setr = base64_encode($setr);
	return $setr;
}
function quescrypt($questionid, $answer) {
	return $questionid > 0 && $answer != '' ? substr(md5($answer.md5($questionid)), 16, 8) : '';
}

function daddslashes($string, $force = 0) {
	if(!$GLOBALS['magic_quotes_gpc'] || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = daddslashes($val, $force);
			}
		} else {
			$string = addslashes($string);
		}
	}
	return $string;
}

function authcode ($string, $operation, $key = '') {

	$key = md5($key ? $key : $GLOBALS['discuz_auth_key']);
	$key_length = strlen($key);

	$string = $operation == 'DECODE' ? base64_decode($string) : substr(md5($string.$key), 0, 8).$string;
	$string_length = strlen($string);

	$rndkey = $box = array();
	$result = '';

	for($i = 0; $i <= 255; $i++) {
		$rndkey[$i] = ord($key[$i % $key_length]);
		$box[$i] = $i;
	}

	for($j = $i = 0; $i < 256; $i++) {
		$j = ($j + $box[$i] + $rndkey[$i]) % 256;
		$tmp = $box[$i];
		$box[$i] = $box[$j];
		$box[$j] = $tmp;
	}

	for($a = $j = $i = 0; $i < $string_length; $i++) {
		$a = ($a + 1) % 256;
		$j = ($j + $box[$a]) % 256;
		$tmp = $box[$a];
		$box[$a] = $box[$j];
		$box[$j] = $tmp;
		$result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
	}

	if($operation == 'DECODE') {
		if(substr($result, 0, 8) == substr(md5(substr($result, 8).$key), 0, 8)) {
			return substr($result, 8);
		} else {
			return '';
		}
	} else {
		return str_replace('=', '', base64_encode($result));
	}

}
function dhtmlspecialchars($string) {
	if(is_array($string)) {
		foreach($string as $key => $val) {
			$string[$key] = dhtmlspecialchars($val);
		}
	} else {
		$string = preg_replace('/&amp;((#(\d{3,5}|x[a-fA-F0-9]{4})|[a-zA-Z][a-z0-9]{2,5});)/', '&\\1',
		str_replace(array('&', '"', '<', '>'), array('&amp;', '&quot;', '&lt;', '&gt;'), $string));
	}
	return $string;
}
function random($length, $numeric = 0) {
	mt_srand((double)microtime() * 1000000);
	if($numeric) {
		$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
	} else {
		$hash = '';
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
		$max = strlen($chars) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $chars[mt_rand(0, $max)];
		}
	}
	return $hash;
}

function get_date($timestamp,$timeformat='',$HYT='8'){
	$date_show=$timeformat ? $timeformat : "";
	$offset = $HYT=='111' ? 0 : $HYT;
	return gmdate($date_show,$timestamp+$offset*3600);
}
function fgetposttoupdatd(&$array,$check='gbk')
{
	if(is_array($array))
	{
		foreach($array as $key=>$value){
			if(!is_array($value)){
				$array[$key] = uniDecode($value,$check);
			}else{
				fgetposttoupdatd($array[$key]);
			}
		}
	}else{
		$array = uniDecode($array,$check);
	}
}
function uniDecode($str,$charcode){
	$text = preg_replace_callback("/%u[0-9A-Za-z]{4}/",toUtf8,$str);
	if(M_B == true)
	return mb_convert_encoding($text, $charcode, 'utf-8');
	else if(ICONV == true)
	return iconv("UTF-8",$charcode,$text);
	else{
		include_once R_P."chinese/class.Chinese.php";
		$codeTablesDir =  R_P."chinese/config/";
		$chs = new Chinese("UTF8","GB2312",$text,$codeTablesDir);
		return $chs->ConvertIT();
	}
}
function toUtf8($ar){
	foreach($ar as $val){
		$val = intval(substr($val,2),16);
		if($val < 0x7F){        // 0000-007F
			$c .= chr($val);
		}elseif($val < 0x800) { // 0080-0800
			$c .= chr(0xC0 | ($val / 64));
			$c .= chr(0x80 | ($val % 64));
		}else{                // 0800-FFFF
			$c .= chr(0xE0 | (($val / 64) / 64));
			$c .= chr(0x80 | (($val / 64) % 64));
			$c .= chr(0x80 | ($val % 64));
		}
	}
	return $c;
}
/************fCharlen************/
//函数：fCharlen()
//功能：验证合法行
//日期：2005.9.13
//更改日期：2005.10.10 trexwb改
//使用说明：fCharlen(要取的字符串,从什么位置开始取,取多长)
//作者：trexwb
/*****************************/
function fCharlen($str,$start,$len,$dot=" ...")
{
	$str = trim(ltrim($str));
	$strlennum = strlen($str);
	if($len > $strlennum){$len = $strlennum;}
	$endsub = substr($str,$len-1,$len);
	$endstr = array("`","~","@","#","^",".","&","*","(","<","《","-","_","+","=","|","{","“","[","/","\\"," ","，",";","—");
	if(in_array($endsub,$endstr))
	{
		$len = $len-1;
	}
	if($start > $strlennum){$start = 0;}
	if($start >= 0)
	{
		for ($i=0;$i<$len;$i++)
		{
			if(ord(substr($str,$start+$i,1)) >= 0xa0 OR ord(substr($str,$i,1)) >= 0x81 OR ord(substr($str,$i,1)) >= 0xa1)
			{
				$str_chr .= substr($str,$start+$i,2);
				$i++;
			}else{
				$str_chr .= substr($str,$start+$i,1);
			}
		}
	}else{
		if($start < -$strlennum){$start = 0;}else{$len=$len+$start;}
		for ($i=1;$i<=$len;$i++)
		{
			if(ord(substr($str,$start-$i,1)) >= 0xa0 OR ord(substr($str,$start-$i,1)) >= 0x81 OR ord(substr($str,$start-$i,1)) >= 0xa1)
			{
				$str_chr .= substr($str,$start-$i,2);
				$i++;
			}else{
				$str_chr .= substr($str,$start-$i,1);
			}
		}
	}
	$str_chr = fCharchr($str_chr);
	return $str_chr.$dot;
}
function fgetdate()
{
	global $cache_config;
	$y = date("Y");
	$m = date("m");
	$d = date("d");
	$h = date("h");
	$i = date("i") + $config['time'];
	$s = date("s");
	return date("Y-m-d H:i:s",mktime($h,$i,$s,$m,$d,$y));
}
function fHtmlcode()
{
	mt_srand(doubleval(microtime()*1000000));
	$char = array("q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c",
	"v","b","n","m","1","2","3","4","5","6","7","8","9","0","Q","W","E","R","T","Y","U","I","O","P","A","S",
	"D","F","G","H","J","K","L","Z","X","C","V","B","N","M");
	$n = count($char);
	$str = "";
	for ($i=0;$i<12;$i++)
	{
		$m = mt_rand(0,$n);
		$str .= $char[$m];
	}
	return $str;
}
function fconurt($str)
{
	$search = array ("/<script[^>]*?>.*?<\/script>/si",  // 去掉 javascript
	"/<\?xml.*?>/si",  				// 去掉 xml
	"/<[\/\!]*?[^<>]*?>/si",           // 去掉 HTML 标记
	"/([\r\n])[\s]+/i",                 // 去掉空白字符
	"/&(quot|#34);/i",                 // 替换 HTML 实体
	"/&(amp|#38);/i",
	"/&(lt|#60);/i",
	"/&(gt|#62);/i",
	"/&(nbsp|#160);/i",
	"/&(iexcl|#161);/i",
	"/&(cent|#162);/i",
	"/&(pound|#163);/i",
	"/&(copy|#169);/i",
	"/&#(\d+);/e",
	"/<\?/si",
	"/\?>/si");                    // 作为 PHP 代码运行
	$replace = array ("","","","","","","","","","","","","","","","");
	$str = preg_replace($search,$replace,$str);
	return $str;
}
function gb2utf8($gbstr) {
	global $CODETABLE,$ODBC;
	if(function_exists('header'))
	{
		header("Content-Type:text/html;charset={$ODBC['charset']}");
		return $gbstr;
	}else if(M_B == true)
	$ret = mb_convert_encoding($gbstr, 'utf-8', $ODBC['charset']);
	else if(ICONV == true)
	$ret = iconv($ODBC['charset'],"UTF-8",$gbstr);
	else{
		if(trim($gbstr)=="") return $gbstr;
		if(empty($CODETABLE)){
			//$filename = dirname(__FILE__)."/gb2312-utf8.table";
			$filename = R_P."gb2312-utf8.table";
			$fp = fopen($filename,"r");
			while ($l = fgets($fp,15))
			{ $CODETABLE[hexdec(substr($l, 0, 6))] = substr($l, 7, 6); }
			fclose($fp);
		}
		$ret = "";
		$utf8 = "";
		while ($gbstr) {
			if (ord(substr($gbstr, 0, 1)) > 127) {
				$thisW = substr($gbstr, 0, 2);
				$gbstr = substr($gbstr, 2, strlen($gbstr));
				$utf8 = "";
				$utf8 = u2utf8(hexdec($CODETABLE[hexdec(bin2hex($thisW)) - 0x8080]));
				if($utf8!=""){
					for ($i = 0;$i < strlen($utf8);$i += 3)
					$ret .= chr(substr($utf8, $i, 3));
				}
			}
			else
			{
				$ret .= substr($gbstr, 0, 1);
				$gbstr = substr($gbstr, 1, strlen($gbstr));
			}
		}
	}
	return $ret;
}
//Unicode转utf8
function u2utf8($c) {
	for ($i = 0;$i < count($c);$i++)
	$str = "";
	if ($c < 0x80) {
		$str .= $c;
	} else if ($c < 0x800) {
		$str .= (0xC0 | $c >> 6);
		$str .= (0x80 | $c & 0x3F);
	} else if ($c < 0x10000) {
		$str .= (0xE0 | $c >> 12);
		$str .= (0x80 | $c >> 6 & 0x3F);
		$str .= (0x80 | $c & 0x3F);
	} else if ($c < 0x200000) {
		$str .= (0xF0 | $c >> 18);
		$str .= (0x80 | $c >> 12 & 0x3F);
		$str .= (0x80 | $c >> 6 & 0x3F);
		$str .= (0x80 | $c & 0x3F);
	}
	return $str;
}

function flist_option($array,$top='0',$mu='',$optgroup="0")
{
	if($optgroup == "1")
	$mu = "";
	foreach ($array AS $key=>$value)
	{
		if($value['type_live'] == $top)
		{
			if($mu!='')
			$muu = $mu."├";
			if($value['type_live'] == '0' && $optgroup=='1')
			$host .= "<optgroup label='{$value['type_subject']}'>";
			else
			$host .= "<option value='{$value['type_id']}'>{$muu}{$value['type_subject']}</option>";
			unset($array[$key]);
			$host .= flist_option($array,$value['type_id'],$mu." &nbsp; &nbsp; ");
			if($value['type_live'] == '0' && $optgroup=='1')
			$host .= "</optgroup>";
		}
	}
	return $host;
}
?>