<?php
if($actionhtml = GetCache($action))
{
	include_once $actionhtml;
	//include_once Getincludefun("html");
	$smarty->assign('cache_config',$cache_config);
}
if($option == 'index')
{
	$rownum = intval($_GET['rownum']) > 0 ? intval($_GET['rownum']) : 20;
	
	
	$smarty->assign('config',array(
	'title' => "{$cache_config['subject']}",
	'keywords' =>$config['keywords']."_{$cache_config['subject']}",
	'description' => $config['description']."_{$cache_config['subject']}"));

	$columnsArray = array();
	$columnsAll = $GETSQL->fSql("*","`{$ODBC['tablepre']}columns`","1","ORDER BY `type_id` DESC");
	foreach ($columnsAll AS $value)
	{
		$columnsArray[$value['type_id']] = $value['type_subject'];
	}
	
	$wheres = array();
	if($_GET['begindate'] != "")
	$wheres[] = "TO_DAYS(`new_date`) >= TO_DAYS('{$_GET['begindate']}')";
	if($_GET['endate'] != "")
	$wheres[] = "TO_DAYS(`new_date`) <= TO_DAYS('{$_GET['endate']}')";
	if(count($wheres)>0)
	$where = implode(" AND ",$wheres);
	else 
	$where = "1";

	$sql_info = $GETSQL->fSql("*","`{$ODBC['tablepre']}news`",$where,"ORDER BY `new_date` DESC,`new_id` DESC",0,$rownum);
	$smarty->assign('sql_info',$sql_info);

	$smarty->assign('rentime',fmicrotime());
	$smarty->display("rss_index.htm");
}
if($option == 'single')
{
	$buff = file_get_contents("http://www.tourzj.gov.cn/infonetNews/rss/rss.aspx");
	$parser = xml_parser_create();
	xml_parser_set_option($parser,XML_OPTION_SKIP_WHITE,1);
	xml_parse_into_struct($parser,$buff,$values,$idx);
	xml_parser_free($parser);
	foreach ($values as $val) {
		$tag = $val["tag"];
		$type = $val["type"];
		$value = $val["value"];
		//标签统一转为小写
		$tag = strtolower($tag);

		if ($tag == "item" && $type == "open"){
			$is_item = 1;
		}else if ($tag == "item" && $type == "close") {
			//构造输出字符串
			echo "<div style=\"height:20px;\"><img src=\"image/lvyou/ico_right.gif\" width=\"4\" height=\"8\"> <a href=\"{$link}\" class=\"link_title_white\" target=_blank>".fCharlen($title,0,30,"")."</a></div>";
			$is_item = 0;
		}
		//仅读取item标签中的内容
		if($is_item==1){
			fgetposttoupdatd($value,'gbk');
			if ($tag == "title") {$title = $value;}
			if ($tag == "link") {$link = $value;}
		}
	}
}
?>