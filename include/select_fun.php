<?php
/**
*
*  Copyright (c) 2003-06  oi77.com All rights reserved.
*  trexwb : http://www.oi77.com
*  This software is the proprietary information of oi77.com.
*
*/
if(!empty($HTTP_SERVER_VARS['REQUEST_URI']) && (strstr($HTTP_SERVER_VARS['REQUEST_URI'], "select_fun.php")))
{
	die("您没权限浏览本页<BR>如果您需要查看本页<a href='http://www.oi77.com'>请与管理员联系</a>");
}
function fKeyword($Keyword,$type="0")
{
	/*
	gb2312 0xa1-0xf7 0xa1-0xfe
	gbk 0x81-0xfe 0x81-0xfe 0x40-0x7e
	big5 0xa1-0xf7 0x81-0xfe 0x40-0x7e

	preg_match("/([0-9a-zA-z]+)(.*?)/si",$Keyword, $matches);
	foreach ($matches AS $k=>$value)
	{
	echo $k." = ".$value."<BR>";
	}
	*/
	//preg_match("/([0-9a-zA-z]*)/si",$Keyword, $matches);

	if($type=='0')
	{
		if(trim(ltrim($Keyword))=='')return $Keyword;
		$k = 0;
		$Key = preg_replace("/([".chr(0xa1)."-".chr(0xff)."]+)/","\\br\\1\\br",$Keyword);
		$Keywordarray = explode("\\br",$Key);
		if(is_array($Keywordarray))
		{
			foreach ($Keywordarray AS $value)
			{
				if(preg_match("/^[".chr(0xa1)."-".chr(0xff)."]+$/", $value))
				$leng = "4";//中文
				else
				$leng = "2";//英文

				$value = str_replace(",","\\br",$value);
				$value = str_replace(".","\\br",$value);
				$value = str_replace("\"","\\br",$value);
				$value = str_replace("\"","\\br",$value);
				$value = str_replace(" ","\\br",$value);
				$value = str_replace("&nbsp;","\\br",$value);

				$Keywords = explode("\\br",$value);
				foreach ($Keywords AS $key)
				{
					$j = 0;
					if(strlen($key) > $leng)
					{
						$n = intval(strlen($key) / $leng)+1;
						for ($i=0;$i<$n;$i++)
						{
							$cst = fCharlen($key,$j,$leng,"");
							if($cst != $key)
							$str[$k] = $cst;
							$j += 2;
							$k++;
						}
					}elseif($key!=''){
						$str[$k] = $key;
						$j += 2;
						$k++;
					}
				}
			}
			return $str;
		}
	}
	if(trim(ltrim($Keyword))=='')return $type;

	if(preg_match("/^[".chr(0xa1)."-".chr(0xff)."]+$/", $Keyword))
	$leng = "4";//中文
	else
	$leng = "2";//英文

	$Keyword = str_replace(",","\\br",$Keyword);
	$Keyword = str_replace(".","\\br",$Keyword);
	$Keyword = str_replace("\"","\\br",$Keyword);
	$Keyword = str_replace("\"","\\br",$Keyword);
	$Keyword = str_replace(" ","\\br",$Keyword);
	$Keyword = str_replace("&nbsp;","\\br",$Keyword);

	$Keywords = explode("\\br",$Keyword);

	$k=0;
	if($type=='0')
	{
		foreach ($Keywords AS $key)
		{
			$j = 0;
			if(strlen($key) > $leng)
			{
				$n = intval(strlen($key) / $leng)+1;
				for ($i=0;$i<$n;$i++)
				{
					$cst = fCharlen($key,$j,$leng,"");
					if($cst != $key)
					$str[$k] = $cst;
					$j += 2;
					$k++;
				}
			}elseif($key!=''){
				$str[$k] = $key;
				$k++;
			}
		}
		//$str[$n] = $Keyword;
	}else{
		foreach ($Keywords AS $key)
		{
			$j = 0;
			$n = intval(strlen($key) / $leng);
			if($leng == '4')
			$n += 1;
			$type = preg_replace("/$key/si","<font color=red>$key</font>",$type);
			for ($i=0;$i<$n;$i++)
			{
				$keys = fCharlen($key,$j,$leng,"");
				if($keys != $key)
				$type = preg_replace("/$keys/si","<font color=red>$keys</font>",$type);
				$j += 2;
			}
		}
		$str = $type;
	}
	return $str;
}

function fTagword($Keyword,$content="",$lasttxt="")
{
	foreach ($Keyword AS $key)
	{
		$lasttxts = str_replace("\$key",$key,$lasttxt);
		$content = preg_replace("/$key/si","{$lasttxts}",$content);
	}
	return $content;
}
?>