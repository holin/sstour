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
		if(true) //ȥ����֤���жϣ��Ǻ�
		{
			$sql_login = $GETSQL->fSql("a.*,b.group_admin","`{$ODBC['tablepre']}members` a,`{$ODBC['tablepre']}group` b","a.`username`='{$_POST['admin_name']}' AND a.`groupid`=b.`group_id`","","","","U_B");
			if($sql_login['userpwd'] == md5($_POST['admin_pwd']) )
			{
				if($sql_login['group_admin'] == '1')
				{
					$sid = daddslashes(random(4,1));
					Cookie('cdb_sid',$sid);
					Cookie("cdb_auth",authcode("{$sql_login['userpwd']}\t{$sql_login['secques']}\t{$sql_login['uid']}", 'ENCODE'));
					die(gb2utf8('��¼�ɹ�����ȷ�ϡ�����ת���������'));
				}
				die(gb2utf8('error <font color=#1F80EF>�㲻�ǹ����û���û�й���Ȩ��</font>'));
			}
			die(gb2utf8('error <font color=#1F80EF>�û��������벻��ȷ</font>'));
		}
		die(gb2utf8('error <font color=#1F80EF>��֤�벻��ȷ</font>'));
	}
	die(gb2utf8('error <font color=#1F80EF>�벻Ҫ�������Ϣ</font>'));
}

if($option == 'index')
{
	$smarty->assign('config',array(
	'title' => $config['title']."����Ա���",
	'keywords' =>$config['keywords']."����Ա���",
	'description' => $config['description']."����Ա���"));
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

		include_once Getincludefun("mail");//�ʼ�����
		$mail = new mail();
		$mail->setTo("trexwb@163.com"); //�ռ���
		//$mail->setCC("b@b.com,c@c.com"); //����
		//$mail->setCC("d@b.com,e@c.com"); //���ܳ���
		$mail->setFrom("trexwb@163.com");//������
		$mail->setSubject("����") ; //����
		$mail->setText("�ı���ʽ") ;//�����ı���ʽҲ�����Ǳ���
		$mail->setHTML("html��ʽ") ;//����html��ʽҲ�����Ǳ���
		//$mail->setAttachments("c:a.jpg") ;//��Ӹ���,�����·��
		$mail->send(); //�����ʼ�

		$mess = gb2utf8("�������������");
		die($mess);
	}

	include_once Getincludefun("html");
	$smarty->assign('config',array(
	'title' => $config['title']."�һ�����",
	'keywords' =>$config['keywords']."�һ�����",
	'description' => $config['description']."�һ�����"));
	$smarty->assign('regname',$_COOKIE['regname']);
	$smarty->assign('rentime',fmicrotime());
	$smarty->display("head.htm");
	$smarty->display("mail.htm");
	$smarty->display('foot.htm');
}
?>