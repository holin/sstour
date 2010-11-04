<?php
if($option == 'quit')
{
	Cookie("cdb_sid",'');
	Cookie("cdb_auth",'');
	Cookie("cdb_admin",'');
	Showmsg("login_quit",1,"admin.php?action=login");
}
if($uid>0 && $c_auth!='')
Showmsg("login_ok",1,"admin.php");
if($option == 'login')
{	
	$upauth = $_COOKIE['authnum']?$_COOKIE['authnum']:$_SESSION['authnum'];
	Cookie("authnum",'');
	if($_POST['admin_name'] != '' && $_POST['admin_pwd'] != '' && $_POST['lg_num'] != '')
	{
		fgetposttoupdatd($_POST,$ODBC['charset']);
/* 		if($_POST['lg_num'] == $upauth) */
		if(true) //去掉验证码判断，呵呵
		{
			$sql_login = $GETSQL->fSql("a.*,b.group_admin","`{$ODBC['tablepre']}members` a,`{$ODBC['tablepre']}group` b","a.`username`='{$_POST['admin_name']}' AND a.`groupid`=b.`group_id`","","","","U_B");
			if($sql_login['userpwd'] == md5($_POST['admin_pwd']) )
			{
				if($sql_login['group_admin'] == '1')
				{
					$sid = daddslashes(random(4,1));
					Cookie('cdb_sid',$sid);
					Cookie("cdb_auth",authcode("{$sql_login['userpwd']}\t{$sql_login['secques']}\t{$sql_login['uid']}", 'ENCODE'));
					die(gb2utf8('登录成功，“确认”后跳转到控制面板'));
				}
				die(gb2utf8('error <font color=#1F80EF>你不是管理用户，没有管理权限</font>'));
			}
			die(gb2utf8('error <font color=#1F80EF>用户名或密码不正确</font>'));
		}
		die(gb2utf8('error <font color=#1F80EF>验证码不正确</font>'));
	}
	die(gb2utf8('error <font color=#1F80EF>请不要输入空信息</font>'));
}

if($option == 'index')
{
	$smarty->assign('config',array(
	'title' => $config['title']."管理员入口",
	'keywords' =>$config['keywords']."管理员入口",
	'description' => $config['description']."管理员入口"));
	$smarty->assign('regname',$_COOKIE['regname']);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("login.htm");
}

if($option == 'sendpwd')
{
	if($_POST['username']!='' && $_POST['usermail']!='')
	{
		$sql_login = $GETSQL->fSql("uid,userpwd,mail",
		"`{$ODBC['tablepre']}members`",
		"`username`='{$_POST['username']}' AND `mail`='{$_POST['usermail']}'",
		"","","","U_B");
		if($sql_login['uid']!='')
		{
			$newpwd = md5(fHtmlcode());
			$GETSQL->fUpdate("`{$ODBC['tablepre']}members`","`password`='{$newpwd}'","`uid`='{$sql_login['uid']}'");
		}

		include_once Getincludefun("mail");//邮件发送
		$mail = new mail();
		$mail->setTo("trexwb@163.com"); //收件人
		//$mail->setCC("b@b.com,c@c.com"); //抄送
		//$mail->setCC("d@b.com,e@c.com"); //秘密抄送
		$mail->setFrom("trexwb@163.com");//发件人
		$mail->setSubject("主题") ; //主题
		$mail->setText("文本格式") ;//发送文本格式也可以是变量
		$mail->setHTML("html格式") ;//发送html格式也可以是变量
		//$mail->setAttachments("c:a.jpg") ;//添加附件,需表明路径
		$mail->send(); //发送邮件

		$mess = gb2utf8("请查收您的邮箱");
		die($mess);
	}

	include_once Getincludefun("html");
	$smarty->assign('config',array(
	'title' => $config['title']."找回密码",
	'keywords' =>$config['keywords']."找回密码",
	'description' => $config['description']."找回密码"));
	$smarty->assign('regname',$_COOKIE['regname']);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("head.htm");
	$smarty->display("mail.htm");
	$smarty->display('foot.htm');
}
?>