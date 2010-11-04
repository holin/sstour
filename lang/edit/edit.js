<script type="text/javascript">
var sState = "iframe";
var lastFormId = 1;
var checkEdit;

function report_upload_ok(front_id, pic_id)
{
	lastFormId = front_id;
	$('picShow' + front_id).innerHTML = "<span style='color:#ff0000;font-weight:bold'>上传成功</span>";
	replaceStr($('filePath' + front_id).value, "attach/<?=$mu?>/"+pic_id);
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
	var btitle = $('blog_title');
	if (btitle.value == ''){
		_error_msg_show('你忘记输入文章标题了:S');
		return false;
	}
	else if(btitle.length > 72){
		_error_msg_show('文章标题最多为72个字符或36个汉字');
		return false;
	}
	var bbody  = $('blog_body_area');
	if (bbody && bbody.value == ''){
		_error_msg_show('你忘记输入文章内容了:S');
		return false;
	}
	return true;
}

function postFile(_sId){
	var sId = 'form' + _sId;
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
		$('article').action = "read.php";
		$('article').target = "_blank";
		et.save();
		$('article').submit();
		$('article').action = "<?=$upurl?>";
		$('article').target = "iframe_data";
	}
}

function initForm(_sId){
	var sFileUpload = '\
<form id="form' + _sId + '" title="" enctype="multipart/form-data" action="<?=$upurl."&update=img"?>" method="post" target="iframe_data">\
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