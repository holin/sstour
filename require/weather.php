<?php
if($option == 'index')
{
	if($_POST['update'] == 'update')
	{
		if($_POST['username'] != 'weather')
		die("<script>top._confirm_msg_show('�û�������', ' ');</script>");
		if($_POST['password'] != 'sstourweather')
		die("<script>top._confirm_msg_show('�������', ' ');</script>");
		if($_POST['info'] == '')
		die("<script>top._confirm_msg_show('���ݲ���Ϊ��', ' ');</script>");
		ffile(R_P."html/weather.text",$_POST['info'],"w");
		die("<script>top._confirm_msg_show('�ύ���', ' ');</script>");
	}
	$smarty->display("weather.htm");
}
elseif($option == 'weather'){
	$text = ffile(R_P."html/weather.text",'','rb');
	$smarty->assign('text',$text);
	$smarty->display("weather.htm");
}
?>