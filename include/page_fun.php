<?php
/**
*
*  Copyright (c) 2003-06  oi77.com All rights reserved.
*  trexwb : http://www.oi77.com
*  This software is the proprietary information of oi77.com.
*
*/
if(!empty($HTTP_SERVER_VARS['REQUEST_URI']) && (strstr($HTTP_SERVER_VARS['REQUEST_URI'], "oage_fun.php")))
{
	die("您没权限浏览本页<BR>如果您需要查看本页<a href='http://www.oi77.com'>请与管理员联系</a>");
}
/************fPages************/
//函数：fPages()
//功能：页数
//日期：2005.9.13
//更改日期：2005.9.13
//使用说明：fPages(总数据量,每页显示的数据数)
//作者：trexwb
/*****************************/
function fPages($nNums,$nPage,$nCount,$cParameter,$showmo="")
{
	global $PHP_SELF;
	if($nNums < $nCount)
	$nPage_count = 1;
	elseif ($nNums > 0){
		if( $nNums % $nCount )
		{
			$nPage_count = intval(($nNums / $nCount)) + 1;
		}else{
			$nPage_count = (int)($nNums / $nCount);
		}
	}else
	$nPage_count = 0;
	$nUppage = $nPage;
	$nDownpage = $nPage;
	if($nUppage > 0)
	$nUppage = $nPage-1;
	elseif($nUppage < 0)
	$nUppage = 0;
	if($nDownpage < $nPage_count)
	$nDownpage = $nPage+1;
	elseif($nDownpage >= $nPage_count)
	$nDownpage = (int)($nPage_count-1);
	$text = "<div class=pages>";
	if($showmo == '')
	{
		$text = "<script language=JavaScript type=text/JavaScript>
		<!--
		function MM_jumpMenuconn(targ,selObj,restore){ //v3.0
		eval(targ+\".location='\"+selObj.options[selObj.selectedIndex].value+\"'\");
		if (restore) selObj.selectedIndex=0;
		}
		//-->
		</script>";
		if($nPage > 0)
		$text .= "<a class=nextprev href=$PHP_SELF?page=0&$cParameter>|&lt;</a> ";
		else
		$text .= "<span class=nextprev>|&lt;</span> ";
		if($nPage != 0)
		$text .= "<a href=$PHP_SELF?page=$nUppage&$cParameter class=nextprev>&lt;&lt;</a> ";
		else
		$text .= "<span class=nextprev>&lt;&lt;</span> ";
		if($nPage < $nPage_count-1)
		$text .= "<a class=nextprev href=$PHP_SELF?page=$nDownpage&$cParameter>&gt;&gt;</a> ";
		else
		$text .= "<span class=nextprev>&gt;&gt;</span> ";
		if($nPage < $nPage_count-1)
		$text .= "<a class=nextprev href=$PHP_SELF?page=".(int)($nPage_count-1)."&$cParameter>&gt;|</a> ";
		else
		$text .= "<span class=nextprev>&gt;|</span> ";
		$text .= "<span class=nextprev>go<select name=menu1 onChange=\"MM_jumpMenuconn('self',this,0)\">";
		for($nNumpage=1;$nNumpage<=$nPage_count;$nNumpage++)
		{
			if($nNumpage == ($nPage + 1)){$cSelect = " SELECTED";}else{$cSelect = "";}
			$Numpage = $nNumpage - 1;
			$text .= "<option value='$PHP_SELF?page=$Numpage&$cParameter'$cSelect>".$nNumpage."</option>";
		}
		$text .= "</select></span> ";
	}else{
		$listpage = $nPage;
		for ($s=0;$s<5;$s++)
		{
			$listpage = $nPage - (5 - $s);
			if($listpage>=0)
			{
				$text .= " <a class=nextprev href='$PHP_SELF?page=$listpage&$cParameter'>".($listpage+1)."</a> ";
				$m ++;
			}
		}
		$k = 9-$m;
		$listpage = $nPage;
		$text .= " <span class=nextprev><B>".($nPage+1)."</B></span> ";
		for ($s=0;$s<$k;$s++)
		{
			$listpage = $listpage + 1;
			if($listpage<$nPage_count)
			$text .= " <a class=nextprev href='$PHP_SELF?page=$listpage&$cParameter'>".($listpage+1)."</a> ";
		}
	}
	$text .= "<span class=nextprev>".$nPage_count."/".$nNums."</span></div>";
	return $text;
}
function fPagesadmin($nNums,$nPage,$nCount,$cParameter,$table='showtable',$showmo="")
{
	global $PHP_SELF;
	if($nNums < $nCount)
	$nPage_count = 1;
	elseif ($nNums > 0){
		if( $nNums % $nCount )
		{
			$nPage_count = intval(($nNums / $nCount)) + 1;
		}else{
			$nPage_count = (int)($nNums / $nCount);
		}
	}else
	$nPage_count = 0;
	$nUppage = $nPage;
	$nDownpage = $nPage;
	if($nUppage > 0)
	$nUppage = $nPage-1;
	elseif($nUppage < 0)
	$nUppage = 0;
	if($nDownpage < $nPage_count)
	$nDownpage = $nPage+1;
	elseif($nDownpage >= $nPage_count)
	$nDownpage = (int)($nPage_count-1);
	$text = "<div class=pages>";
	if($showmo == '')
	{
		if($nPage > 0)
		$text .= "<a class=nextprev onclick=\"getNews('$table','$PHP_SELF?page=0&$cParameter')\">|&lt;</a> ";
		else
		$text .= "<span class=nextprev>|&lt;</span> ";
		if($nPage != 0)
		$text .= "<a class=nextprev onclick=\"getNews('$table','$PHP_SELF?page=$nUppage&$cParameter')\">&lt;&lt;</a> ";
		else
		$text .= "<span class=nextprev>&lt;&lt;</span> ";
		if($nPage < $nPage_count-1)
		$text .= "<a class=nextprev onclick=\"getNews('$table','$PHP_SELF?page=$nDownpage&$cParameter')\">&gt;&gt;</a> ";
		else
		$text .= "<span class=nextprev>&gt;&gt;</span> ";
		if($nPage < $nPage_count-1)
		$text .= "<a class=nextprev onclick=\"getNews('$table','$PHP_SELF?page=".(int)($nPage_count-1)."&$cParameter')\">&gt;|</a> ";
		else
		$text .= "<span class=nextprev>&gt;|</span> ";
		$text .= "<span class=nextprev>go<select name=menu1 onChange=\"getNews('$table',this.options[this.selectedIndex].value)\">";
		for($nNumpage=1;$nNumpage<=$nPage_count;$nNumpage++)
		{
			if($nNumpage == ($nPage + 1)){$cSelect = " SELECTED";}else{$cSelect = "";}
			$Numpage = $nNumpage - 1;
			$text .= "<option value='$PHP_SELF?page=$Numpage&$cParameter'$cSelect>".$nNumpage."</option>";
		}
		$text .= "</select></span> ";
	}else{
		$listpage = $nPage;
		for ($s=0;$s<5;$s++)
		{
			$listpage = $nPage - (5 - $s);
			if($listpage>=0)
			{
				$text .= " <a class=nextprev onclick=\"getNews('$table','$PHP_SELF?page=$listpage&$cParameter')\">".($listpage+1)."</a> ";
				$m ++;
			}
		}
		$k = 9-$m;
		$listpage = $nPage;
		$text .= " <span class=nextprev><B>".($nPage+1)."</B></span> ";
		//$text .= " <a class=nextprev onclick=\"getNews('$table','$PHP_SELF?page=$nPage&$cParameter')\"><B>".($nPage+1)."</B></a> ";
		for ($s=0;$s<$k;$s++)
		{
			$listpage = $listpage + 1;
			if($listpage<$nPage_count)
			$text .= " <a class=nextprev onclick=\"getNews('$table','$PHP_SELF?page=$listpage&$cParameter')\">".($listpage+1)."</a> ";
		}
	}
	$text .= "<span class=nextprev>".$nPage_count."/".$nNums."</span></div>";
	return $text;
}
?>