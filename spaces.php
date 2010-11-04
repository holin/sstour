<?php
include_once "./include/config.php";
include_once "./global.php";
if($config['webclose'] == '0')
Showmsg("为了更好的服务我们的系统正在升级中...<BR>请稍后在访问，期间给您带来不便请原谅",0,'');
include_once R_P."include/sql_config.php";

header("Content-type:text/html; charset={$ODBC['charset']}");

$action = $_GET['action']?$_GET['action']:'index';
$option = $_GET['option']?$_GET['option']:"index";
$id = $_GET['id']?$_GET['id']:"";
$nPage = $_GET['page']?$_GET['page']:"";
$Industry = $_GET['Industry']?$_GET['Industry']:"";
$type = $_GET['type']?$_GET['type']:"";
$Keyword = $_GET['Keyword']?$_GET['Keyword']:$_POST['Keyword'];
$userop = "action={$action}&id={$id}&option={$option}&Keyword={$Keyword}&type={$_GET['type']}&page={$nPage}&Industry={$Industry}";
$PHPSESSID = $_COOKIE['PHPSESSID']?$_COOKIE['PHPSESSID']:$_SESSION['PHPSESSID'];

include_once Getincludefun("all");//常用函数

$discuz_auth_key = md5($config['HTMLcode'].$_SERVER['HTTP_USER_AGENT']);
$c_sid = $_COOKIE['sgX_sid']?$_COOKIE['sgX_sid']:$_SESSION['sgX_sid'];//判断会员登陆
$c_auth = $_COOKIE['sgX_auth']?$_COOKIE['sgX_auth']:$_SESSION['sgX_auth'];//判断会员登陆
list($userpw, $uname, $uid) = isset($c_auth) ? explode("\t", authcode($c_auth, 'DECODE')) : array('', '', 0);

include_once Getincludefun("odbc");//调用数据库操作
$GETSQL = new Codbc();

if($action == 'showmeu')
{
	if(!empty($uid)) {
		//if($config['bbs'] == '1')
		//$pmsgN = $GETSQL->fNumrows("SELECT pmid FROM `sgX_pms` WHERE `msgtoid`='{$uid}' AND `new`='1'");
		//else
		//$pmsgN = $GETSQL->fNumrows("SELECT pmid FROM `{$ODBC['tablepre']}pms` WHERE `msgtoid`='{$uid}' AND `new`='1'");
		$sql_members = $GETSQL->fSql("uid,username,categories,cpid","`{$ODBC['tablepre']}members`","`uid`='{$uid}'","","","","U_B");
		?>
		dw("欢迎 <?php echo $sql_members['username']?> ");
		dw("<a href='javascript:;' onclick=\"_confirm_msg_show('确定退出系统', 'Userloginon(\\\'"+hostpath+"index.php?action=login&option=quit\\\');', '', '');\">退出</a> | ");
		dw("<span onMouseOver=\"$('meuheadmember').className='menu1'\" onMouseOut=\"$('meuheadmember').className='menu2'\"><a>我的功能</a>");
		dw("<span class=menu2 id=meuheadmember align=left><BR>");
		<?php
		if($sql_members['cpid'] == '0')
		{
		?>
			dw("<a href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=buildhotel&type=edit',1,'升级为酒店服务');\" >升级酒店</a><BR><BR>");
			dw("<a href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=buildscenic&type=edit',1,'升级为景区服务');\">升级景区</a><BR><BR>");
			dw("<a href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=buildtravel&type=edit',1,'升级为旅行社');\">升级旅行社</a><BR><BR>");
		<?php
		}elseif($sql_members['categories'] == '1'){
		?>
			dw("<a href='"+hostpath+"index.php?action=hotel&option=single&id=<?php echo $sql_members['cpid']?>'>我的酒店</a><BR><BR>");
		<?php
		}elseif($sql_members['categories'] == '2'){
		?>
			dw("<a href='"+hostpath+"index.php?action=scenic&option=single&&id=<?php echo $sql_members['cpid']?>'>我的景区</a><BR><BR>");
		<?php
		}elseif($sql_members['categories'] == '3'){
		?>
			dw("<a href='"+hostpath+"index.php?action=travel&option=single&&id=<?php echo $sql_members['cpid']?>'>我的旅行社</a><BR><BR>");
		<?php
		}
		?>
		dw("</span></span>");		
		<?php
	} else {
		?>
		dw("<a href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=login',1,'会员登陆');\">登陆</a> | ");
		dw("<a href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=login&option=regedit',1,'注册');\">注册</a>");
		<?php
	}
}
if($action == 'showhotel')
{
	$sql_members = $GETSQL->fSql("uid,username,categories,cpid","`{$ODBC['tablepre']}members`","`uid`='{$uid}'","","","","U_B");
	if(!empty($uid))
	{
		if($sql_members['categories'] == '1' && $id == $sql_members['cpid'])
		{
		?>
		dw("<li><a class='xspace-ctrlpannel' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=buildhotel&type=edit&id=<?php echo $sql_members['cpid'];?>',1,'酒店资料');\">酒店资料</a></li>");
		dw("<li><a class='xspace-profile' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=hotellogo&type=edit&id=<?php echo $sql_members['cpid'];?>',1,'酒店图标');\">酒店图标</a></li>");
		dw("<li><a class='xspace-profile' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=hotelarticle&type=edit&id=<?php echo $sql_members['cpid'];?>',1,'发布资讯');\">发布资讯</a></li>");
		dw("<li><a class='xspace-ctrlpannel' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=member&option=hotelyou&type=edit&id=<?php echo $sql_members['cpid'];?>',1,'发布游记');\">发布游记</a></li>");
		dw("<li><a class='xspace-sendpm' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=hotelroom&type=edit&id=<?php echo $sql_members['cpid'];?>',1,'添加房间');\">添加房间</a></li>");
		dw("<li><a class='xspace-message' href='"+hostpath+"index.php?action=hotel&option=hotelphoto&id=<?php echo $sql_members['cpid'];?>'>相册管理</a></li>");
		dw("<li><a class='xspace-message' href='"+hostpath+"index.php?action=hotel&option=hotelword&id=<?php echo $sql_members['cpid'];?>'>留言管理</a></li>");
		dw("<li><a class='xspace-sendpm' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=hotelinfo&id=<?php echo $sql_members['cpid'];?>',1,'简介管理');\">简介管理</a></li>");
		<?php
		}elseif($sql_members['categories'] == '2' && $id == $sql_members['cpid'])
		{
		?>
		dw("<li><a class='xspace-ctrlpannel' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=buildscenic&type=edit&id=<?php echo $sql_members['cpid'];?>',1,'景区资料');\">景区资料</a></li>");
		dw("<li><a class='xspace-profile' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=sceniclogo&type=edit&id=<?php echo $sql_members['cpid'];?>',1,'景区图标');\">景区图标</a></li>");
		dw("<li><a class='xspace-profile' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=scenicarticle&type=edit&id=<?php echo $sql_members['cpid'];?>',1,'发布资讯');\">发布资讯</a></li>");
		dw("<li><a class='xspace-ctrlpannel' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=member&option=scenicyou&type=edit&id=<?php echo $sql_members['cpid'];?>',1,'发布游记');\">发布游记</a></li>");
		dw("<li><a class='xspace-sendpm' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=scenicattr&type=edit&id=<?php echo $sql_members['cpid'];?>',1,'添加景点');\">添加景点</a></li>");
		dw("<li><a class='xspace-message' href='"+hostpath+"index.php?action=scenic&option=scenicphoto&id=<?php echo $sql_members['cpid'];?>'>相册管理</a></li>");
		dw("<li><a class='xspace-message' href='"+hostpath+"index.php?action=scenic&option=scenicword&id=<?php echo $sql_members['cpid'];?>'>留言管理</a></li>");
		dw("<li><a class='xspace-sendpm' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=scenicinfo&id=<?php echo $sql_members['cpid'];?>',1,'简介管理');\">简介管理</a></li>");
		<?php
		}elseif($sql_members['categories'] == '3' && $id == $sql_members['cpid'])
		{
		?>
		dw("<li><a class='xspace-ctrlpannel' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=buildtravel&type=edit&id=<?php echo $sql_members['cpid'];?>',1,'本社资料');\">本社资料</a></li>");
		dw("<li><a class='xspace-profile' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=travellogo&type=edit&id=<?php echo $sql_members['cpid'];?>',1,'本社图标');\">本社图标</a></li>");
		dw("<li><a class='xspace-profile' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=travelarticle&type=edit&id=<?php echo $sql_members['cpid'];?>',1,'发布资讯');\">发布资讯</a></li>");
		dw("<li><a class='xspace-ctrlpannel' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=member&option=travelyou&type=edit&id=<?php echo $sql_members['cpid'];?>',1,'发布路线');\">发布路线</a></li>");
		dw("<li><a class='xspace-sendpm' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=travelattr&type=edit&id=<?php echo $sql_members['cpid'];?>',1,'添加案例');\">添加案例</a></li>");
		dw("<li><a class='xspace-message' href='"+hostpath+"index.php?action=travel&option=travelphoto&id=<?php echo $sql_members['cpid'];?>'>相册管理</a></li>");
		dw("<li><a class='xspace-message' href='"+hostpath+"index.php?action=travel&option=travelword&id=<?php echo $sql_members['cpid'];?>'>留言管理</a></li>");
		dw("<li><a class='xspace-sendpm' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=update&option=travelinfo&id=<?php echo $sql_members['cpid'];?>',1,'简介管理');\">简介管理</a></li>");
		<?php
		}else{
		?>
		dw("<li><a href='javascript:;'>欢迎 <?php echo $sql_members['username']?></a></li>");
		dw("<li><a href='javascript:;' onclick=\"_confirm_msg_show('确定退出系统', 'Userloginon(\\\'"+hostpath+"index.php?action=login&option=quit\\\');', '', '');\">退出</a></li>");
		dw("<li><a class='xspace-ctrlpannel' href='"+hostpath+"index.php?action=scenic&option=scenicyou&id=<?php echo $sql_members['cpid'];?>'>景区游记</a></li>");
		dw("<li><a class='xspace-ctrlpannel' href='"+hostpath+"index.php?action=hotel&option=hotelyou&id=<?php echo $sql_members['cpid'];?>'>酒店游记</a></li>");
		<?php
		}
	}else{
		?>
		dw("<li><a class='xspace-ctrlpannel' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=login',1,'会员登陆');\">会员登陆</a></li>");
		dw("<li><a class='xspace-ctrlpannel' href='javascript:;' onClick=\"fshowwindows('"+hostpath+"index.php?action=login&option=regedit',1,'免费注册');\">免费注册</a></li>");
		<?php
	}
}
?>