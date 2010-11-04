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
			die(gb2utf8("{$sql_members['username']}欢迎回来登陆成功梢后跳转"));
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
			die(gb2utf8("{$sql_members['username']}欢迎回来登陆成功梢后跳转"));
		}
	}
	die(gb2utf8('error 登陆失败信息提交错误'));
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
			echo "<font color=red>用户名没有填写</font>";
		}else{
			//$id = fChar($id,"ID");
			if(strlen($id)<3 || strlen($id)>12 || $id=='system')
			echo "<font color=red>对不起！您输入的用户名不合法</font>";
			else{
				$nNums = $GETSQL->fNumrows("SELECT `uid` FROM `{$ODBC['tablepre']}members` WHERE `username`='{$id}'");
				if($nNums > 0)
				echo "<font color=red>对不起！您输入的用户名已经被注册</font>";
				else
				echo "<font color=#1F80EF>用户名“{$id}”可以使用</font><input type=hidden name=checkokname id=checkokname value='ok'>";
			}
		}
	}elseif($type=='checkpwd'){
		if($id==''){
			echo "<font color=red>请填写密码</font>";
		}elseif(fChar($id,"pwd") == false)
		echo "<font color=red>对不起！您输入的密码不符合规格</font>";
		else
		echo "<font color=#1F80EF>密码可以使用</font>";
	}elseif($type=='checkrepwd'){
		if($Industry==''){
			echo "<font color=red>请填写密码</font>";
		}elseif ($id==''){
			echo "<font color=red>请输入确认密码</font>";
		}elseif(fChar($Industry,"pwd") == false || $Industry != $id)
		echo "<font color=red>两次输入的密码不想同，请检查密码</font>";
		else
		echo "<font color=#1F80EF>密码可以使用</font><input type=hidden name=regokpwd id=regokpwd value='ok'>";
	}elseif($type=='checkemail'){
		if(fChar($id,"email") == false){
			echo "<font color=red>邮件地址出错</font>";
		}else{
			$nNums = $GETSQL->fNumrows("SELECT `uid` FROM `{$ODBC['tablepre']}members` WHERE `useremail`='{$id}'");
			if($nNums > 0)
			echo "<font color=red>邮件地址已经被注册，请使用其他邮件</font>";
			else
			echo "<font color=#1F80EF>邮件可以使用</font><input type=hidden name=regokemail id=regokemail value='ok'>";
		}
	}else
	echo "<font color=red>请输入有效信息</font>";
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
					die(gb2utf8("error 对不起！您输入的用户名不合法"));
					else{
						$nNums = $GETSQL->fNumrows("SELECT `uid` FROM `{$ODBC['tablepre']}members` WHERE `username`='{$_POST['regname']}'");
						if($nNums > 0)
						die(gb2utf8("error 对不起！您输入的用户名已经被注册"));
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
							die(gb2utf8("注册成功<BR><a href='javascript:;' onClick=\"fshowwindows('{$boardurl}index.php?action=update&option=buildhotel',1,'升级为酒店服务');\">升级为酒店服务</a> <a href='javascript:;' onClick=\"fshowwindows('{$boardurl}index.php?action=update&option=buildscenic',1,'升级为景区服务');\">升级为景区服务</a> <a href='javascript:;' onClick=\"fshowwindows('{$boardurl}index.php?action=update&option=buildtravel',1,'升级为旅行社服务');\">升级为旅行社服务</a>"));
						}
					}
				}else
				die(gb2utf8("error 对不起您两次输入的密码不匹配"));
			}else
			die(gb2utf8("error 对不起您没有输入密码"));
		}else
		die(gb2utf8("error 对不起您没有输入用户名"));
	}else
	die(gb2utf8("error 对不起您输入的验证码有错误"));
}
if($option == 'sendpwd')
{
	if($_POST['update'] == 'update')
	{
		include_once Getincludefun("mail");//常用函数
		$sql_members = $GETSQL->fSql("uid,username,useremail","`{$ODBC['tablepre']}members`","`username`='{$_POST['username']}'","","","","U_B");
		if($sql_members['useremail'] == $_POST['usermail'])
		{
			$newpwd = fHtmlcode();
			
			$GETSQL->fUpdate("`{$ODBC['tablepre']}members`","`userpwd`='{$newpwd}'","`uid`='{$sql_members['uid']}'");
			
			$mail = new mail();
			$mail->mailTo = $sql_members['useremail'];
			$mail->mailFrom = $config['mail'];
			$mail->mailSubject = $config['webname'];
			$mail->mailText = "您在".$config['webname']."的用户密码更新为:{$newpwd}";

			$mail->setTo($sql_members['useremail']); //收件人
			$mail->setFrom($config['mail']);//发件人
			$mail->setSubject($config['webname']) ; //主题
			$mail->setText("您在".$config['webname']."的用户密码更新为:{$newpwd}") ;//发送文本格式也可以是变量
			$mail->send(); //发送邮件
			die(gb2utf8("发送密码到你的邮箱成功，请到您的邮箱获取密码"));
		}
		die(gb2utf8("error 对不起您的邮箱地址不正确"));
	}
	$smarty->display("sendpwd.htm");
}
?>