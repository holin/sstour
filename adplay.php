<?php
$giz = !ereg('gzip',$_SERVER['HTTP_ACCEPT_ENCODING']) || $_GET['read'] == '1'? 0:1;
$giz == 1 ? ob_start("ob_gzhandler"):ob_start();
include_once "./include/config.php";
include_once "./global.php";
if($config['webclose'] == '0')
Showmsg("为了更好的服务我们的系统正在升级中...<BR>请稍后在访问，期间给您带来不便请原谅",0,'');
include_once R_P."include/sql_config.php";
include_once GetLang('cache');//调用缓存

header("Content-type:text/html; charset={$ODBC['charset']}");

include_once Getincludefun("all");//常用函数
include_once Getincludefun("odbc");//调用数据库操作
$GETSQL = new Codbc();

$sql_newsfilg = $GETSQL->fSql("new_id,new_subject,new_image","`{$ODBC['tablepre']}news`","`new_image`!='' AND `new_type`='1'","ORDER BY `new_date` DESC,`new_id` DESC",0,5);
?>
<HTML>
<HEAD>
<TITLE>广告</TITLE>
<meta name=robots content='index,follow'>
<Meta http-equiv="Widow-target" Content="_top">
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<LINK href="lang/style.css" type=text/css rel=stylesheet>
</HEAD>
<body>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<STYLE type=text/css>TABLE {
	FONT-SIZE: 12px
}
TD {
	FONT-SIZE: 12px
}
Select {
	FONT-SIZE: 12px
}
INPUT {
	FONT-SIZE: 12px
}
DIV {
	FONT-SIZE: 12px
}
BODY {
	background-color:#f8f4da;PADDING-RIGHT: 0px; PADDING-LEFT: 0px; FONT-SIZE: 12px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px; HEIGHT: auto
}
A IMG {
	BORDER-RIGHT: 0px; BORDER-TOP: 0px; BORDER-LEFT: 0px; BORDER-BOTTOM: 0px
}
FORM {
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px
}
INPUT {
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px
}
Select {
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px
}
UL {
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px
}
LI {
	PADDING-RIGHT: 0px; PADDING-LEFT: 0px; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-TOP: 0px
}
</STYLE>

<META content="MSHTML 6.00.2900.2963" name=GENERATOR></HEAD>
<BODY>
<STYLE type=text/css>#imgTitle {
	FILTER: ALPHA(opacity=70); LEFT: 0px; OVERFLOW: hidden; POSITION: relative; TEXT-ALIGN: left
}
#imgTitle_up {
	LEFT: 0px; HEIGHT: 1px; TEXT-ALIGN: left
}
#imgTitle_down {
	LEFT: 0px; TEXT-ALIGN: right
}
.imgClass {
	BORDER-RIGHT: #000 0px solid; BORDER-TOP: #000 0px solid; BORDER-LEFT: #000 0px solid; BORDER-BOTTOM: #000 0px solid
}
#txtFrom {
	VERTICAL-ALIGN: middle; TEXT-ALIGN: center
}
.button {
	PADDING-RIGHT: 7px; PADDING-LEFT: 7px; BACKGROUND: #7b7b63; PADDING-BOTTOM: 2px; MARGIN: 0px; FONT: bold 9px sans-serif; BORDER-LEFT: #fff 1px solid; PADDING-TOP: 2px; TEXT-DECORATION: none
}
A.button {
	COLOR: #ffffff; FONT-FAMILY: sans-serif; BACKGROUND-COLOR: #000000; TEXT-DECORATION: none
}
A.button:link {
	COLOR: #ffffff; FONT-FAMILY: sans-serif; BACKGROUND-COLOR: #000000; TEXT-DECORATION: none
}
A.button:visited {
	COLOR: #ffffff; FONT-FAMILY: sans-serif; BACKGROUND-COLOR: #000000; TEXT-DECORATION: none
}
A.button:hover {
	BACKGROUND: #fff; COLOR: #fff; FONT-FAMILY: sans-serif; TEXT-DECORATION: none
}
.buttonDiv {
	BACKGROUND: #000000; FLOAT: left; VERTICAL-ALIGN: middle; WIDTH: 21px; HEIGHT: 1px; TEXT-ALIGN: center
}
.trans {
	FILTER: progid:DXImageTransform.Microsoft.Alpha(startX=0, startY=0, finishX=100, finishY=100,style=1,opacity=0,finishOpacity=40); WIDTH: 90px; BACKGROUND-COLOR: #000
}
</STYLE>

<SCRIPT language=javascript type=text/javascript>
var imgWidth=200;              //图片宽
var imgHeight=140;             //图片高
var textFromHeight=0;         //焦点字框高度 (单位为px)
var textStyle="f12";           //焦点字class style (不是连接class)
var textLinkStyle="p1"; //焦点字连接class style
var buttonLineOn="#f60";           //button下划线on的颜色
var buttonLineOff="#000";          //button下划线off的颜色
var TimeOut=5000;              //每张图切换时间 (单位毫秒);
var imgUrl=new Array(); 
var imgLink=new Array();
var imgtext=new Array();
var imgAlt=new Array();
var adNum=0;
//焦点字框高度样式表 开始
document.write('<style type="text/css">');
document.write('#focuseFrom{width:'+(imgWidth+2)+';margin: 0px; padding:0px;height:'+(imgHeight+textFromHeight)+'px; overflow:hidden;}');
document.write('#txtFrom{height:'+textFromHeight+'px;line-height:'+textFromHeight+'px;width:'+imgWidth+'px;overflow:hidden;}');
document.write('#imgTitle{width:'+imgWidth+';top:-'+(textFromHeight+16)+'px;height:18px}');
document.write('</style>');
document.write('<div id="focuseFrom">');
//焦点字框高度样式表 结束
<?php
if ($sql_newsfilg[0]['new_id']!='')
{
	$i=1;
	foreach ($sql_newsfilg AS $value)
	{
		echo "imgUrl[{$i}]='{$value['new_image']}';imgtext[{$i}]='{$value['new_subject']}';imgLink[{$i}]='index.php?action=news&option=single&id={$value['new_id']}';imgAlt[{$i}]='{$value['new_subject']}';";
		$i++;
	}
}else{
?>
imgUrl[1]='';
imgtext[1]='';
imgLink[1]='';
imgAlt[1]='';
<?php
}
?>

function changeimg(n)
{
	adNum=n;
	window.clearInterval(theTimer);
	adNum=adNum-1;
	nextAd();
}
function goUrl(){
window.open(imgLink[adNum],'_blank');
}
//NetScape开始
if (navigator.appName == "Netscape")
{
document.write('<style type="text/css">');
document.write('.buttonDiv{height:4px;width:21px;}');
document.write('</style>');
function nextAd(){
	if(adNum<(imgUrl.length-1))adNum++;
	else adNum=1;
	theTimer=setTimeout("nextAd()", TimeOut);
	document.images.imgInit.src=imgUrl[adNum];
	document.images.imgInit.alt=imgAlt[adNum];	
    document.getElementById('focustext').innerHTML=imgtext[adNum];
	document.getElementById('imgLink').href=imgLink[adNum];

}
	document.write('<a id="imgLink" href="'+imgLink[1]+'" target=_blank class="p1"><img src="'+imgUrl[1]+'" name="imgInit" width='+imgWidth+' height='+imgHeight+' border=1 alt="'+imgAlt[1]+'" class="imgClass"></a><div id="txtFrom"><span id="focustext" class="'+textStyle+'">'+imgtext[1]+'</span></div>')
	document.write('<div id="imgTitle">');
	document.write('<div id="imgTitle_down">');
//数字按钮代码结束
	document.write('</div>');
	document.write('</div>');
	document.write('</div>');
	nextAd();
}
//NetScape结束
//IE开始
else
{
var count=0;
for (i=1;i<imgUrl.length;i++) {
	if( (imgUrl[i]!="") && (imgLink[i]!="")&&(imgtext[i]!="")&&(imgAlt[i]!="") ) {
		count++;
	} else {
		break;
	}
}
function playTran(){
	if (document.all)
		imgInit.filters.revealTrans.play();		
}
var key=0;
function nextAd(){
	if(adNum<count)adNum++ ;
	else adNum=1;
	
	if( key==0 ){
		key=1;
	} else if (document.all){
		imgInit.filters.revealTrans.Transition=6;
		imgInit.filters.revealTrans.apply();
                   playTran();
    }
	document.images.imgInit.src=imgUrl[adNum];
	document.images.imgInit.alt=imgAlt[adNum];	
	document.getElementById('link'+adNum).style.background=buttonLineOn;
	for (var i=1;i<=count;i++)
	{
	   if (i!=adNum){document.getElementById('link'+i).style.background=buttonLineOff;}
	}	
    focustext.innerHTML=imgtext[adNum];
	theTimer=setTimeout("nextAd()", TimeOut);
}
document.write('<a target=_self href="javascript:goUrl()"><img style="FILTER: revealTrans(duration=1,transition=5);" src="javascript:nextAd()" width='+imgWidth+' height='+imgHeight+' border=0 vspace="0" name=imgInit class="imgClass"></a>');
document.write('<div id="txtFrom"><span id="focustext" class="'+textStyle+'"></span></div>');
document.write('<div id="imgTitle">');
document.write(' <div id="imgTitle_down"> <a class="trans"></a>');
//数字按钮代码开始
for(var i=1;i<imgUrl.length;i++){document.write('<a id="link'+i+'"  href="javascript:changeimg('+i+')" class="button" style="cursor:hand" title="'+imgAlt[i]+'" onFocus="this.blur()">'+i+'</a>');}
//数字按钮代码结束
document.write('</div>');
document.write('</div>');
document.write('</div>');
}
//IE结束
</SCRIPT>
</body>
</HTML>