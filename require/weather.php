<?php
if($option == 'index')
{
	if($_POST['update'] == 'update')
	{
		if($_POST['username'] != 'weather')
		die("<script>top._confirm_msg_show('用户名出错', ' ');</script>");
		if($_POST['password'] != 'sstourweather')
		die("<script>top._confirm_msg_show('密码出错', ' ');</script>");
		if($_POST['info'] == '')
		die("<script>top._confirm_msg_show('内容不能为空', ' ');</script>");
		ffile(R_P."html/weather.text",$_POST['info'],"w");
		die("<script>top._confirm_msg_show('提交完成', ' ');</script>");
	}
	$smarty->display("weather.htm");
}
elseif($option == 'weather'){
	$text = ffile(R_P."html/weather.text",'','rb');
	$smarty->assign('text',$text);
	$smarty->display("weather.htm");
}
?>