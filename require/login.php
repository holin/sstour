<?php
if($option == 'quit')
{
	include_once GetLang('msg');
	if($config['bbs'] == '1')
	$GETSQL->fDelete("`cdb_sessions`","`username`='' OR `uid`='{$uid}'","100");
	Cookie('sgX_sid','');
	Cookie('sgX_auth','');
	$sgX_sid = '';
	$sgX_auth = '';
	$I0s_auth = '';
	$I0s_sid = '';
	if($_GET['read']=='1')
	die(gb2utf8("{$lang['login_quit']}"));
	Showmsg($lang['login_quit']);
}
if($option == 'index')
{
	$smarty->display("login.htm");
}
if($option == 'indexlogin')
{
	if($uid > 0)
	{
		$sql_members = $GETSQL->fSql("uid,username,categories,cpid","`{$ODBC['tablepre']}members`","`uid`='{$uid}'","","","","U_B");
		$smarty->assign('sql_members',$sql_members);
	}
	$smarty->display("indexlogin.htm");
}
if($option == 'login')
{
	fgetposttoupdatd($_POST,$ODBC['charset']);
	$sql_members = $GETSQL->fSql("uid,username,userpwd,secques,groupid","`{$ODBC['tablepre']}members`","`username`='{$_POST['username']}'","","","","U_B");
	if(md5($_POST['password']) == $sql_members['userpwd'])
	{
		if($sql_members['secques']!='')
		{
			if($config['bbs'] == '1')
			$GETSQL->fDelete("`cdb_sessions`","`username`='' OR `username`='{$sql_members['username']}' OR `uid`='{$sql_members['uid']}'","100");
			$ips = explode('.', $onlineip);
			$sid = daddslashes(random(4,1));
			$cQuery = array("`sid`", "`ip1`", "`ip2`", "`ip3`", "`ip4`", "`uid`","`username`");
			$cData = array($sid,$ips[0],$ips[1],$ips[2],$ips[3],$sql_members['uid'],$sql_members['username']);
			if($config['bbs'] == '1')
			$GETSQL->fInsert("`cdb_sessions`",$cQuery,$cData);
			Cookie('sgX_sid',$sid);
			//Cookie('I0s_sid',$sid);
			$sgX_auth = authcode("{$sql_members['userpwd']}\t{$sql_members['secques']}\t{$sql_members['uid']}", 'ENCODE');
			Cookie('sgX_auth', $sgX_auth);
			//Cookie('I0s_auth',$sgX_auth);
			$GETSQL->fUpdate("`{$ODBC['tablepre']}members`","`score`=`score`+1","`uid`='{$sql_members['uid']}'");
			die(gb2utf8("{$sql_members['username']}��ӭ������½�ɹ��Һ���ת"));
		}else{
			if($config['bbs'] == '1')
			$GETSQL->fDelete("`cdb_sessions`","`username`='' OR `username`='{$sql_members['username']}' OR `uid`='{$sql_members['uid']}'","1");
			$ips = explode('.', $onlineip);
			$sid = daddslashes(random(6));
			$cQuery = array("`sid`", "`ip1`", "`ip2`", "`ip3`", "`ip4`", "`uid`","`username`");
			$cData = array($sid,$ips[0],$ips[1],$ips[2],$ips[3],$sql_members['uid'],$sql_members['username']);
			if($config['bbs'] == '1')
			$GETSQL->fInsert("`cdb_sessions`",$cQuery,$cData);
			Cookie('sgX_sid',$sid);
			//Cookie('I0s_sid',$sid);
			$sgX_auth = authcode("{$sql_members['userpwd']}\t\t{$sql_members['uid']}", 'ENCODE');
			Cookie('sgX_auth',$sgX_auth);
			//Cookie('I0s_auth',$sgX_auth);
			$GETSQL->fUpdate("`{$ODBC['tablepre']}members`","`score`=`score`+1","`uid`='{$sql_members['uid']}'");
			die(gb2utf8("{$sql_members['username']}��ӭ������½�ɹ��Һ���ת"));
		}
	}
	die(gb2utf8('error ��½ʧ����Ϣ�ύ����'));
}

if($option == 'regedit')
{
	$smarty->display("regedit.htm");
}
if($option == 'check')
{
	fgetposttoupdatd($_GET,$ODBC['charset']);
	if($type == 'checkname')
	{
		if($id==''){
			echo "<font color=red>�û���û����д</font>";
		}else{
			//$id = fChar($id,"ID");
			if(strlen($id)<3 || strlen($id)>12 || $id=='system')
			echo "<font color=red>�Բ�����������û������Ϸ�</font>";
			else{
				$nNums = $GETSQL->fNumrows("SELECT `uid` FROM `{$ODBC['tablepre']}members` WHERE `username`='{$id}'");
				if($nNums > 0)
				echo "<font color=red>�Բ�����������û����Ѿ���ע��</font>";
				else
				echo "<font color=#1F80EF>�û�����{$id}������ʹ��</font><input type=hidden name=checkokname id=checkokname value='ok'>";
			}
		}
	}elseif($type=='checkpwd'){
		if($id==''){
			echo "<font color=red>����д����</font>";
		}elseif(fChar($id,"pwd") == false)
		echo "<font color=red>�Բ�������������벻���Ϲ��</font>";
		else
		echo "<font color=#1F80EF>�������ʹ��</font>";
	}elseif($type=='checkrepwd'){
		if($Industry==''){
			echo "<font color=red>����д����</font>";
		}elseif ($id==''){
			echo "<font color=red>������ȷ������</font>";
		}elseif(fChar($Industry,"pwd") == false || $Industry != $id)
		echo "<font color=red>������������벻��ͬ����������</font>";
		else
		echo "<font color=#1F80EF>�������ʹ��</font><input type=hidden name=regokpwd id=regokpwd value='ok'>";
	}elseif($type=='checkemail'){
		if(fChar($id,"email") == false){
			echo "<font color=red>�ʼ���ַ����</font>";
		}else{
			$nNums = $GETSQL->fNumrows("SELECT `uid` FROM `{$ODBC['tablepre']}members` WHERE `useremail`='{$id}'");
			if($nNums > 0)
			echo "<font color=red>�ʼ���ַ�Ѿ���ע�ᣬ��ʹ�������ʼ�</font>";
			else
			echo "<font color=#1F80EF>�ʼ�����ʹ��</font><input type=hidden name=regokemail id=regokemail value='ok'>";
		}
	}else
	echo "<font color=red>��������Ч��Ϣ</font>";
}
if($option == 'regediting')
{
	$upauth = $_COOKIE['authnum']?$_COOKIE['authnum']:$_SESSION['authnum'];
	Cookie("authnum",'');
	fgetposttoupdatd($_POST,$ODBC['charset']);
	if($_POST['gdcode'] == $upauth)
	{
		if($_POST['regname']!='')
		{
			if($_POST['userpwd']!='')
			{
				if($_POST['userpwd']==$_POST['regpwdrepeat'])
				{
					if(strlen($_POST['regname'])<3 || strlen($_POST['regname'])>12 || $_POST['regname']=='system')
					die(gb2utf8("error �Բ�����������û������Ϸ�"));
					else{
						$nNums = $GETSQL->fNumrows("SELECT `uid` FROM `{$ODBC['tablepre']}members` WHERE `username`='{$_POST['regname']}'");
						if($nNums > 0)
						die(gb2utf8("error �Բ�����������û����Ѿ���ע��"));
						else{
							if($config['bbs'] == '1')
							$GETSQL->fDelete("`cdb_sessions`","`username`='' OR `username`='{$_POST['regname']}'","1");
							//$gettime = fgetdate();
							$regpwd = md5($_POST['userpwd']);
							$regname = $_POST['regname'];
							//$reguid = md5($_POST['regname']);
							if($_POST['questionid']!='')
							$secques = "";
							else
							$secques = quescrypt($_POST['questionid'], $_POST['answer']);
							if($config['bbs'] == '1')
							{
								$cQuery = array("`username`","`password`","`secques`","`groupid`","`regip`","`regdate`","`lastvisit`","`lastactivity`","`email`");
								$cData = array($regname,$regpwd,$secques,10,$onlineip,$nowtime,$nowtime,$nowtime,$_POST['regemail']);
								$GETSQL->fInsert("`cdb_members`",$cQuery,$cData);
								$reguid = $GETSQL->insert_id();

								$cQuery = array("`uid`");
								$cData = array($reguid);
								$GETSQL->fInsert("`cdb_memberfields`",$cQuery,$cData);
							}else {
								$reguid = $nowtime;
							}
							$cQuery = array("`uid`","`username`","`userpwd`","`groupid`","`useremail`","`regdate`");
							$cData = array($reguid,$regname,$regpwd,3,$_POST['regemail'],$nowtime);
							$GETSQL->fInsert("`{$ODBC['tablepre']}members`",$cQuery,$cData);
							$ips = explode('.', $onlineip);
							$sid = daddslashes(random(4,1));
							$cQuery = array("`sid`", "`ip1`", "`ip2`", "`ip3`", "`ip4`", "`uid`","`username`");
							$cData = array($sid,$ips[0],$ips[1],$ips[2],$ips[3],$reguid,$regname);
							if($config['bbs'] == '1')
							$GETSQL->fInsert("`cdb_sessions`",$cQuery,$cData);
							Cookie('sgX_sid',$sid);
							//Cookie('I0s_sid',$sid);
							$sgX_auth = authcode("$regpwd\t\t$reguid", 'ENCODE');
							Cookie('sgX_auth',$sgX_auth);
							//Cookie('I0s_auth',$sgX_auth);
							die(gb2utf8("ע��ɹ�<BR><a href='javascript:;' onClick=\"fshowwindows('{$boardurl}index.php?action=update&option=buildhotel',1,'����Ϊ�Ƶ����');\">����Ϊ�Ƶ����</a> <a href='javascript:;' onClick=\"fshowwindows('{$boardurl}index.php?action=update&option=buildscenic',1,'����Ϊ��������');\">����Ϊ��������</a> <a href='javascript:;' onClick=\"fshowwindows('{$boardurl}index.php?action=update&option=buildtravel',1,'����Ϊ���������');\">����Ϊ���������</a>"));
						}
					}
				}else
				die(gb2utf8("error �Բ�����������������벻ƥ��"));
			}else
			die(gb2utf8("error �Բ�����û����������"));
		}else
		die(gb2utf8("error �Բ�����û�������û���"));
	}else
	die(gb2utf8("error �Բ������������֤���д���"));
}
if($option == 'sendpwd')
{
	if($_POST['update'] == 'update')
	{
		include_once Getincludefun("mail");//���ú���
		$sql_members = $GETSQL->fSql("uid,username,useremail","`{$ODBC['tablepre']}members`","`username`='{$_POST['username']}'","","","","U_B");
		if($sql_members['useremail'] == $_POST['usermail'])
		{
			$newpwd = fHtmlcode();
			
			$GETSQL->fUpdate("`{$ODBC['tablepre']}members`","`userpwd`='{$newpwd}'","`uid`='{$sql_members['uid']}'");
			
			$mail = new mail();
			$mail->mailTo = $sql_members['useremail'];
			$mail->mailFrom = $config['mail'];
			$mail->mailSubject = $config['webname'];
			$mail->mailText = "����".$config['webname']."���û��������Ϊ:{$newpwd}";

			$mail->setTo($sql_members['useremail']); //�ռ���
			$mail->setFrom($config['mail']);//������
			$mail->setSubject($config['webname']) ; //����
			$mail->setText("����".$config['webname']."���û��������Ϊ:{$newpwd}") ;//�����ı���ʽҲ�����Ǳ���
			$mail->send(); //�����ʼ�
			die(gb2utf8("�������뵽�������ɹ����뵽���������ȡ����"));
		}
		die(gb2utf8("error �Բ������������ַ����ȷ"));
	}
	$smarty->display("sendpwd.htm");
}
?>