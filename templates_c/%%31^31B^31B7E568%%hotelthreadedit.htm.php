<?php /* Smarty version 2.6.10, created on 2010-02-21 16:56:24
         compiled from hotelthreadedit.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip', 'hotelthreadedit.htm', 283, false),array('modifier', 'strip_tags', 'hotelthreadedit.htm', 283, false),)), $this); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>控制面板 - 在线编辑</title>
<LINK href="<?php echo $this->_tpl_vars['boardurl']; ?>
lang/style.css" type=text/css rel=stylesheet>
<link rel="StyleSheet" href="lang/edit/base.php">
<script>var hostpath = '<?php echo $this->_tpl_vars['boardurl']; ?>
';</script>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/ajax.js'></SCRIPT>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/js.js'></SCRIPT>
<script src="lang/edit/dialog.js" type="text/javascript"></script>
<script src="lang/edit/base.js" type="text/javascript"></script>
<script src="lang/edit/publish_img.js" type="text/javascript"></script>
<script language="JavaScript" type="text/javascript" src="lang/edit/word.js"></script>
<script language="JavaScript" type="text/javascript" src="lang/edit/word_edit.js"></script>
<link rel="Stylesheet" href="lang/edit/word_edit.php" type="text/css" media="all">
<style type="text/css">
<!--
.input_text1{height:21px;border:1px solid #7f9db9;background:#f7f5e0}
.input_text2{height:21px;border:1px solid #7f9db9;background:#eff0f0}
.img_box a{ text-decoration:none; color:#000000}
.arrow_up{background:url("image/edit/arrow_up.gif") #bdb7b7 no-repeat center;cursor:hand;cursor:pointer;}
.arrow_down{background:url("image/edit/arrow_down.gif") #bdb7b7 no-repeat center;cursor:hand;cursor:pointer;}
.sort_close{background:url('image/edit/publish_add_sort_close.gif');cursor:hand;cursor:pointer;}
.sort_open{background:url('image/edit/publish_add_sort_open.gif');cursor:hand;cursor:pointer;}
body {
	margin: 0px;
	padding: 0px;
}
-->
</style>
<script type="text/javascript">
var sState = "iframe";
var lastFormId = 1;
var checkEdit;
function report_upload_ok(front_id, pic_id)
{
	lastFormId = front_id;
	$('picShow' + front_id).innerHTML = "<span style='color:#ff0000;font-weight:bold'>上传成功</span>";
	replaceStr($('filePath' + front_id).value, "<?php echo $this->_tpl_vars['attach']; ?>
/hotel/"+pic_id);
	$('form' + front_id).reset();
	if ($('album').value == ''){
		var sp_char = '';
	}
	else{
		var sp_char = ',';
	}
	$('album').value = $('album').value + sp_char + pic_id;
	postFile(++front_id);
}

function report_upload_error(error_str, front_id)
{
	_error_msg_show(error_str);
	lastFormId = front_id;
}
function report_upload_error_close(error_str)
{
	_error_msg_show(error_str);
	lastFormId = front_id;
	//window.close();
}
// 添加分类表单检查
function check_sort_form(){
	if ($('sort_txt').value == ''){
		_error_msg_show('分类输入值不能为空:S');
		return;
	}
	$('typename[]').value = $('sort_txt').value;
	if ($('sort_txt').value.length > 28){
		_confirm_msg_show('分类长度不能超过28个字符或14个汉字');
		return;
	}

	$('sortForm').submit();
}

// 添加分类框显示切换
function add_sort_switch(){
	if ($('add_sort_txt').style.display == 'none'){
		$('add_sort_txt').style.display = '';
		$('add_sort_desc').style.display = '';
		$('add_sort_switch').className = "sort_close";
	}
	else{
		$('add_sort_txt').style.display = 'none';
		$('add_sort_desc').style.display = 'none';
		$('add_sort_switch').className = "sort_open";
	}
}

function check_article_form(){
	var bbody  = $('blog_body_area');
	if (bbody && bbody.value == ''){
		_error_msg_show('你忘记输入文章内容了:S');
		return false;
	}
	return true;
}

function postFile(_sId){
	var sId = 'form' + _sId;
	parent.document.getElementById('showwindow').style.filter='';
	if (exist(sId)) {
		if ($(sId).title.length > 0 && seekUse(_sId)) {
			$(sId).submit();
		} else {
			clearSelect(_sId);
			postFile( ++_sId );
		}
	}else{
		et.save();
		$('article').submit();
	}
}
function publish_article(){
	et.save();
	if (check_article_form()){
		save_article();
		if(getSend()<20){
			_error_msg_show('请勿在短时间内多次发送信息 :)<br/> 您需要耐心等待 ' + (20 - getSend()) + ' 秒，就可以发表文章了.');
			return false;
		}
		initSendTime();	_error_msg_show("<center><b>正在发表文章...</b></center><br/>　　提示：文章内容已经暂存至系统剪贴板，如遇网络故障等原因发表失败可点击鼠标右键→选择“粘贴”重新发表。", "　", 3);
		postFile(lastFormId);
	}
}
function save_article(){
	et.save();

	if(exist('blog_body_textarea')){
		setCopy($('blog_body_textarea').value);
	}else if(exist('blog_body_area')){
		setCopy($('blog_body_area').value);
	}
}
function publish_draft()
{
	$('act').value = '3';
	publish_article();
}

function article_preview()
{
	if (check_article_form()){
		$('article').action = "preview.php";
		$('article').target = "_blank";
		et.save();
		$('article').submit();
		$('article').action = "index.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
&id=<?php echo $this->_tpl_vars['id']; ?>
&Industry=<?php echo $this->_tpl_vars['Industry']; ?>
";
		$('article').target = "iframe_data";
	}
}

function initForm(_sId){
	var sFileUpload = '\
<form id="form' + _sId + '" title="" enctype="multipart/form-data" action="index.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
&id=<?php echo $this->_tpl_vars['id']; ?>
&Industry=<?php echo $this->_tpl_vars['Industry']; ?>
&update=img" method="post" target="iframe_data">\
<input name="filePath" type="hidden" id="filePath' + _sId + '">\
<input name="fileKey" type="hidden" value="' + _sId + '">\
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="img_box">\
    <tr>\
      <td style="border:1px solid #000">\
    	<table width="100%"  border="0" cellspacing="0" cellpadding="0">\
          <tr style="background:#669999">\
            <td width="106" height="20">&nbsp;<a href="javascript:addArticle(' + _sId + ');">插入图片</a></td>\
            <td width="2"><img src="image/edit/pic_box_sline.gif" width="2" height="12"></td>\
            <td width="20" align="center"><a href="javascript:clearSelect(' + _sId + ');"><img src="image/edit/del_btn.gif" width="10" height="10" border="0"></a></td>\
          </tr>\
          <tr>\
            <td height="1" colspan="3" bgcolor="#787878"></td>\
          </tr>\
          <tr align="center" valign="middle" bgcolor="#ffffff">\
            <td height="120" colspan="3" id="picShow' + _sId + '" style="background:url(\'image/edit/publish_pic_bg.gif\');"><span style="color:#7f7f7f">图片剪切板</span></td>\
          </tr>\
        </table>\
      </td>\
    </tr>\
    <tr>\
      <td height="1"></td>\
    </tr>\
    <tr>\
      <td><input name="fileContent" type="file" id="file' + _sId + '" type="file"  style="width:140px;border:1px solid #000" onchange="javascript:initUpload(this,' + _sId + ');"></td>\
    </tr>\
</table>\
</form>\
';
	dw(sFileUpload);
}

function top_title_switch()
{
	if($('blog_title').value != ''){
		$('top_title').innerHTML = '<span style="font-weight:bold">文章标题&nbsp;-&nbsp' + $('blog_title').value + '</span>';
	}
	else
	{
		$('top_title').innerHTML = '<span style="font-weight:bold;color:#990000">提示：文章标题空缺</span>';
	}
	ArrowControl('arrow_up','arrow_down','article_title', 'article_title_arrow');
	AreaControl('editerTextArea1','editerTextArea','article_title','blog_body_area');
	try{
		parent.iframeResize();
	}
	catch(e){}
}

function img_pool_switch()
{
	ArrowControl('arrow_up','arrow_down','image_upload', 'img_upload_arrow');
	try{
		parent.iframeResize();
	}
	catch(e){}
}

function add_calendar(cal_str)
{
	if($('blog_title').value == ''){
		$('blog_title').value = '信息 [' + cal_str + ']';
	}
}

function AreaControl(_sCSS, _sCSS_Over, _sNodeName, _tNodeName){
	_this = $(_tNodeName);
	var _o = $(_sNodeName);
	if(_o.style.display == "none") {
		_this.className = _sCSS;
	}
	else {
		_this.className = _sCSS_Over;
	}
}

function ArrowControl(_sCSS, _sCSS_Over, _sNodeName, _tNodeName) {

	if (_tNodeName){
		var _this = $(_tNodeName);
	}
	else{
		var _this = event.srcElement;
	}
	var _o = $(_sNodeName);
	if(_o.style.display == "none") {
		_o.style.display = "";
		_this.className = _sCSS;
	}
	else {
		_o.style.display = "none";
		_this.className = _sCSS_Over;
	}
}
</script>
</head>
<body>
<div align="center">
  <table border="0" cellspacing="0" cellpadding="0" style="border:1px solid #505050;">
    <tr>
      <td onClick="top_title_switch();" style="cursor:hand;"><!-- 分割栏 -->
        <table width="100%"  border="0" cellspacing="0" cellpadding="0" bgcolor="#ececec" style="border-bottom:1px solid #808080;">
          <tr>
            <td width="5">&nbsp;</td>
            <td width="10"><img src="image/edit/publish_title_spline.gif" width="3" height="28"></td>
            <td id="top_title">&nbsp;</td>
            <td width="1" bgcolor="#FFFFFF"></td>
            <td width="1" bgcolor="#ae9e9e"></td>
            <td width="17" class="arrow_up" id="article_title_arrow"></td>
          </tr>
        </table>
        <!-- /分割栏 -->
      </td>
    </tr>
    <tr>
      <td><form id="article" name="article" action="index.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
&id=<?php echo $this->_tpl_vars['id']; ?>
&Industry=<?php echo $this->_tpl_vars['Industry']; ?>
" enctype="multipart/form-data" method="post" target="iframe_data">
          <input id="album" name="album" type="hidden" value="">
          <input id="act" name="act" type="hidden" value="">
          <input id="mode" name="mode" type="hidden" value="0">
          <table width="100%"  border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
            <tr id='article_title'>
              <td>文章标题：</td>
              <td><input type="text" name="blog_title" id="blog_title" class="input_text1" style="width:450px" maxlength="72"  value="<?php echo $this->_tpl_vars['sql_hotelthread']['thr_subject']; ?>
"></td>
            </tr>
			<tr id='article_title'>
              <td>TAG：</td>
              <td><input onFocus="showtextcontent('index.php?action=hotel&option=showthreadtage');" type="text" name="blog_tags" class="input_text1" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_hotelthread']['thr_tages'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" style="width:150px;" /></td>
            </tr>
            <!-- 编辑器 -->
            <tr>
              <td colspan="2"><div id="blog_body"></div></td>
            </tr>
            <!-- /编辑器 -->
          </table>
        </form></td>
    </tr>
    <tr>
      <td onClick="img_pool_switch()" style="cursor:hand;cursor:pointer;"><table width="100%"  border="0" cellspacing="0" cellpadding="0" bgcolor="#ececec" style="border-bottom:1px solid #808080;">
          <tr>
            <td width="5">&nbsp;</td>
            <td width="10"><img src="image/edit/publish_title_spline.gif" width="3" height="28"></td>
            <td>图片剪切板&nbsp;<span style="color:#7f7f7f">(点击标题栏打开图片长宽不能超过463*315)</span></td>
            <td width="1" bgcolor="#FFFFFF"></td>
            <td width="1" bgcolor="#ae9e9e"></td>
            <td width="17" id="img_upload_arrow" class="arrow_up">
          </tr>
        </table></td>
    </tr>
    <tr id="image_upload" style="display:none;">
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:url('image/edit/publish_body_bg.gif');" >
          <tr>
            <td colspan="9" height="2" bgcolor="#a0a0a0"></td>
          </tr>
          <tr>
            <td width="30">&nbsp;</td>
            <td width="140">&nbsp;</td>
            <td>&nbsp;</td>
            <td width="140">&nbsp;</td>
            <td>&nbsp;</td>
            <td width="140">&nbsp;</td>
            <td>&nbsp;</td>
            <td width="140">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td rowspan="3" style="background:url('image/edit/publish_body_padline.gif') repeat-y center"></td>
            <td><script>initForm(1);</script></td>
            <td>&nbsp;</td>
            <td><script>initForm(2);</script></td>
            <td>&nbsp;</td>
            <td><script>initForm(3);</script></td>
            <td>&nbsp;</td>
            <td><script>initForm(4);</script></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="9" height="10"></td>
          </tr>
          <tr>
            <td><script>initForm(5);</script></td>
            <td>&nbsp;</td>
            <td><script>initForm(6);</script></td>
            <td>&nbsp;</td>
            <td><script>initForm(7);</script></td>
            <td>&nbsp;</td>
            <td><script>initForm(8);</script></td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="9" height="10"></td>
          </tr>
          <tr>
            <td height="22" align="center" colspan="9">小提示：点击图片插入文章</td>
          </tr>
        </table></td>
    </tr>
  </table>
  <table border="0" cellspacing="0" cellpadding="0" align="center">
    <tr>
      <td colspan="3"></td>
    </tr>
    <tr>
      <td align="center"><input name="prview" onClick="article_preview();" value=" 预 览 " type="button" class="update_btn1">
        &nbsp;&nbsp;
        <input name="publish" onClick="publish_article();" value=" 发 表 主 题 " type="submit" class="update_btn1">
      </td>
    <tr>
  </table>
</div>
<iframe name="iframe_data" id="iframe_data" style="display:none;"></iframe>
<div id=showtage></div>
</body>
</html>
<script type="text/javascript">
function makeDate(obj)
{
	makeTimeSelect(obj.year,	1971,	2006);
	makeTimeSelect(obj.month, 	01,		12);
	makeTimeSelect(obj.day,		1,		31);
	makeTimeSelect(obj.hours,	0,		23);
	makeTimeSelect(obj.minutes,	0,		59);
	makeTimeSelect(obj.seconds,	0,		59);
}

function makeTimeSelect(objtime, min, max)
{
	objtime.length = max - min + 1;
	for(var i = 0; i< objtime.length; i++)
	{
		objtime.options[i].value	= min;
		objtime.options[i].text		= min;
		min++;
	}
}

//makeDate(document.article);
//setSelect("year",		'<?php echo '<?='; ?>
date("Y")<?php echo '?>'; ?>
');
//setSelect("month",		'<?php echo '<?='; ?>
date("m")<?php echo '?>'; ?>
');
//setSelect("day",		'<?php echo '<?='; ?>
date("d")<?php echo '?>'; ?>
');
//setSelect("hours",		'<?php echo '<?='; ?>
date("H")<?php echo '?>'; ?>
');
//setSelect("minutes",	'<?php echo '<?='; ?>
date("i")<?php echo '?>'; ?>
');
//setSelect("seconds",	'<?php echo '<?='; ?>
date("s")<?php echo '?>'; ?>
');

// "EditerBox" 就是 textarea 的名子
function init() {
	et = new word("blog_body", "<?php echo $this->_tpl_vars['ncontent']; ?>
");
	try{parent.iframeResize();}catch(e){}	try{
		$('blog_body_area').onfocus = function(){
			//checkEdit = setInterval("save_article()", 300000);
		}
		$('blog_body_area').onblur = function(){
			//setTimeout("save_article()", 300000);
			//clearInterval(checkEdit);
		}
	}catch(e){}
}
oDIALOG = new dialog();
oDIALOG.init();
oDIALOG.event("init");
oDIALOG.reset();

if(window.Event)
window.onload = init;
else
setTimeout(init, 100);
</script>