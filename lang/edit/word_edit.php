<?php
$PHP_SELF = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : getenv("SCRIPT_NAME");
$path = 'http://'.$_SERVER['HTTP_HOST'].preg_replace("/\/+(api|archiver|wap)?\/*$/i", '', substr($PHP_SELF, 0, strrpos($PHP_SELF, '/'))).'/';
$path = "http://www.sstour.net/";
echo "
.editerToolsBox{
	border-top: 1px solid #808080;
}
.editerToolsBG{
	width:616px;
	height:20px;
	background:url('{$path}image/edit/bg.gif');
	padding-left:4px;
}
.editerArrowUp{
	width:18px;
	border-left:1px solid #ffffff;
	background:url('{$path}image/edit/arrow_up.gif');
	#bdb7b7 no-repeat center;
}
.editerArrowDown{
	width:18px;
	border-left:1px solid #ffffff;
	background:url('{$path}image/edit/arrow_down.gif');
	#bdb7b7 no-repeat center;
}
.editerToolsIMG{
	background:url('{$path}image/edit/tools.gif');
	height:20px;
}
.editerTextBox{
}
.editerTextTopBG{
	background:url('{$path}image/edit/bodyTop.gif');
	height:16px;
}
.editerTextBottomBG{
	background:url('{$path}image/edit/bodyBottom.gif');
	height:27px;
}
.editerTextBG{
	width:558px;
	background-image:url('{$path}image/edit/bodyBg.gif');
	background-color:#ffffff;
	padding-left:80px;
}
.editerTextArea{
	background:#fff;
	border:0px;
	padding-top:10px;
	width:500px;
	height:343px;
	overflow:auto;
}
.editerTextArea1{
	background:#fff;
	border:0px;
	padding-top:10px;
	width:500px;
	height:443px;
	overflow:auto;
}
a {CURSOR: hand;}";
?>