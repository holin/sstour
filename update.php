<?php
include_once "./include/config.php";
include_once "./global.php";
if($_GET['action'] == 'img')
{
	$fileKey = $_GET['fileKey'];
	$img = $_GET['img'];
	echo "<script type='text/javascript' language='javascript' src='lang/edit/dialog.js'></script>
	<script type='text/javascript'>parent.report_upload_ok('{$fileKey}', '$img');</script>";
}

if($_GET['action'] == "edit")
{
	$title = $_GET['title'];
	echo "<script type='text/javascript' language='javascript' src='lang/edit/dialog.js'></script>
	<script type='text/javascript' language='javascript'>
	var d = new parent.dialog();d.init();
	d.set('src','2');
	d.set('title','系统提示信息');
	d.event('$title', 'window.location.reload();','','window.location.reload();');
	</script>";
}

if($_GET['action'] == "add")
{
	$title = $_GET['title'];
	if($_GET['u'] == 'admin'){
	$url = "admin.php?action={$_GET['a']}&option={$_GET['p']}&type={$_GET['t']}&id={$_GET['id']}&Industry={$_GET['in']}&page={$_GET['page']}";
	echo "<script type='text/javascript' language='javascript' src='lang/edit/dialog.js'></script>
	<script type='text/javascript' language='javascript'>
	parent.parent.getNews('showtable','admin.php?action={$_GET['a']}');
	var d = new parent.dialog();d.init();
	d.set('src','2');
	d.set('title','系统提示信息');
	d.event('$title', 'location.href=\"$url\";','','location.href=\"$url\";');
	</script>";
	}else{
	$url = "index.php?action={$_GET['a']}&option={$_GET['p']}&type={$_GET['t']}&id={$_GET['id']}&Industry={$_GET['in']}&page={$_GET['page']}";
	echo "<script type='text/javascript' language='javascript' src='lang/edit/dialog.js'></script>
	<script type='text/javascript' language='javascript'>
	var d = new parent.dialog();d.init();
	d.set('src','2');
	d.set('title','系统提示信息');
	d.event('$title', 'parent.location.href=\"$url\";','','parent.location.href=\"$url\";');
	</script>";
	}
}

if($_GET['action'] == 'type')
{
	$time = $_GET['time'];
	$typename = $_GET['typename'];
	echo "<script type='text/javascript' language='javascript' src='lang/edit/dialog.js'></script>
	<script type='text/javascript' language='javascript'>
	var d = new parent.dialog();d.init();
	d.set('src','2');
	d.set('title','系统提示信息');
	d.event('恭喜您！数据成功保存啦！^_^','savekey(0,\"$time\" , \"{$typename}\");','','savekey(0,\"$time\" , \"{$typename}\");');
	</script>";
}

if($_GET['action'] == 'error')
{
	$error = $_GET['error'];
	echo "<script type='text/javascript' language='javascript' src='lang/edit/dialog.js'></script>
	<script type='text/javascript' language='javascript'>
	var d = new parent.dialog();d.init();
	d.set('src','5');
	d.set('title','系统提示信息');
	d.event('$error', ' ','',' ');
	</script>";
}

if($_GET['action'] == 'ok')
{
	$error = $_GET['error'];
	$url = $_GET['url']?$_GET['url']:" ";
	echo "<script type='text/javascript' language='javascript' src='lang/edit/dialog.js'></script>
	<script type='text/javascript' language='javascript'>
	var d = new parent.dialog();d.init();
	d.set('src','2');
	d.set('title','系统提示信息');
	d.event('$error', '{$url}','','{$url}');
	</script>";
}

if($_GET['action'] == 'upimage')
{
	$typename = $_GET['typename'];
	echo "<script type='text/javascript' language='javascript' src='lang/edit/dialog.js'></script>
	<script type='text/javascript' language='javascript'>
	var d = new parent.dialog();d.init();
	d.set('src','2');
	d.set('title','系统提示信息');
	d.event('恭喜您！图片成功保存啦！^_^','savekeytoup(\"$typename\");','','savekeytoup(\"$typename\");');
	</script>";
}

if($_GET['action'] == 'upload')
{
	$title = $_GET['title'];
	//&m=showmember&a=member&p=dirupload&id={$_POST['id']}
	$url = "getNews(\'{$_GET['m']}\',\'index.php?action={$_GET['a']}&option={$_GET['p']}&id={$_GET['id']}\')";
	echo "<script type='text/javascript' language='javascript' src='lang/edit/dialog.js'></script>
	<script type='text/javascript' language='javascript'>
	var d = new parent.dialog();d.init();
	d.set('src','2');
	d.set('title','系统提示信息');
	d.event('$title', '$url','','$url');
	</script>";
}
if($_GET['action'] == 'authimg')
{
	echo "<img style='cursor:hand;' alt='刷新验证码' src='include/authimg.php' align=absmiddle onclick=\"parent.gdcodeiframe.location.reload();\">";
}
?>