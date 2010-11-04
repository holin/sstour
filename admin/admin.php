<?php
if($option == 'index')
{
	if($_POST['update'] == 'update')
	{
		fgetposttoupdatd($_POST,$ODBC['charset']);
		if($_POST['addsubject'] != '')
		{
			$cQuery = array("`type_subject`","`type_live`","`type_sp`");
			$cData = array($_POST['addsubject'],$_POST['addlive'],$_POST['addsp']);
			$GETSQL->fInsert("`{$ODBC['tablepre']}admin`",$cQuery,$cData);
		}
		if(is_array($_POST['type_id']))
		{
			foreach ($_POST['type_id'] AS $v)
			{
				$GETSQL->fUpdate("`{$ODBC['tablepre']}admin`","`type_subject`='{$_POST['type_subject'][$v]}',`type_live`='{$_POST['type_live'][$v]}',`type_sp`='{$_POST['type_sp'][$v]}'","`type_id`='{$v}'");
			}
		}
		die(gb2utf8("后台组件操作完成"));
	}
	$sql_about = $GETSQL->fSql("*","`{$ODBC['tablepre']}admin`","","ORDER BY`type_id`");
	$soptions = "<option value='0'>系统根组</option>".flist_option($sql_about);
	$smarty->assign('showtext',flist_top($sql_about,'0',$soptions));
	$smarty->assign('sql_about',$sql_about);
	$smarty->assign('soptions',$soptions);
	$smarty->display("admin.htm");
}
if($option == 'del')
{
	$sql_class = $GETSQL->fSql("*","`{$ODBC['tablepre']}admin`","`type_live`='{$id}'","","","","U_B");
	if($sql_class['type_id']>0)
	{
		die(gb2utf8("请先删除分类下的子类"));
	}else{
		$GETSQL->fDelete("`{$ODBC['tablepre']}admin`","`type_id`='{$id}'","1");
		die(gb2utf8("删除成功"));
	}
}
function flist_top($array,$top='0',$more)
{
	global $action;
	$host .="<ul>";
	foreach ($array AS $key=>$value)
	{
		if($value['type_live'] == $top)
		{
			$moreoption = preg_replace("/value='{$value['type_live']}'/is","value='{$value['type_live']}' selected",$more);
			$host .= "<li><input type=txt value='{$value['type_subject']}' size=10 name='type_subject[{$value['type_id']}]'>
			-关键字:<input type=txt value='{$value['type_sp']}' size=2 name='type_sp[{$value['type_id']}]'>
			-属于组:<select name='type_live[{$value['type_id']}]'>{$moreoption}</select>
			<input type=hidden name='type_id[{$value['type_id']}]' value='{$value['type_id']}'>
			<a href=\"javascript:_confirm_msg_show('确定删除{$value['type_subject']}', 'saveUserlogin(\'admin.php?action={$action}&option=del&id={$value['type_id']}\',\'formupdate\',\'\',\'getNews(\\\\\'showtable\\\\\',\\\\\'admin.php?action={$action}\\\\\')\')', '', '')\">删除</a>
			</li>";
			unset($array[$key]);
			$host .= flist_top($array,$value['type_id'],$more);
		}
	}
	$host .="</ul>";
	return $host;
}
?>