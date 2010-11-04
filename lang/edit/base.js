String.prototype.trim = function(){return this.replace(/(^[ |�?]*)|([ |�?]*$)/g, "");}
function $(s){return document.getElementById(s);}
function $$(s){return document.frames?document.frames[s]:$(s).contentWindow;}
function $c(s){return document.createElement(s);}
function swap(s,a,b,c){$(s)[a]=$(s)[a]==b?c:b;}
function exist(s){return $(s)!=null;}
function dw(s){document.write(s);}
function hide(s){$(s).style.display=$(s).style.display=="none"?"":"none";}
function isNull(_sVal){return (_sVal == "" || _sVal == null || _sVal == "undefined");}
function removeNode(s){if(exist(s)){$(s).innerHTML = '';$(s).removeNode?$(s).removeNode():$(s).parentNode.removeChild($(s));}}
function rsstry(_sUrl){try {new ActiveXObject("SinaRss.RssObject");window.open(_sUrl, "_self");}catch(e){window.open("http://rss.sina.com.cn/rss_noreader.html");}}
function getStyleCss(_sId, _sCss){var oObj = document.getElementById(_sId);return oObj.currentStyle ? oObj.currentStyle[_sCss] : window.getComputedStyle(oObj, "")[_sCss];}
function setHome(){try{window.external.AddFavorite(window.document.location,window.document.title)}catch(e){};}
function hideList(_sId,_sStr,_iBegin,_iEnd,_sShow){for(var i = _iBegin; i <= _iEnd; i++)if(exist(_sId + i)){$(_sId + i).style.display = _sStr;_sStr == 'none' ? $(_sShow + i).className = 'down' : $(_sShow + i).className = 'up'}}
function getAnchor(_sStr){_sStr = _sStr ? _sStr : '#' ;var sUrl=document.location.href;return sUrl.indexOf(_sStr) != -1 ? sUrl.substr(sUrl.lastIndexOf(_sStr) + 1) : null;}
function read(_sUid,_sDate){get('/sns/service.php?m=aListByDate&uid=' + _sUid + '&date=' + _sDate,'/xsl/feeds.xsl','feeds','output','box_2');}
function commentSubmit(_sVid){$("src_title" + _sVid).value = $("commentText" + _sVid).innerHTML;$("src_uname" + _sVid).value = AUTHOR;$('form' + _sVid).submit();}
function output(_sHtml, _box){var oOutput = typeof(_box) == "object" ? _box : $(_box);oOutput.innerHTML = _sHtml;}
function setCopy(_sTxt){try{clipboardData.setData('Text',_sTxt)}catch(e){}}
function isIE(){return BROWSER.indexOf('ie') > -1;}
function openWindow(_sUrl, _sWidth, _sHeight, _sTitle, _sScroll){var oEdit = new dialog();oEdit.init();oEdit.set('title', _sTitle ? _sTitle : "系统提示信息" );oEdit.set('width', _sWidth);oEdit.set('height', _sHeight);oEdit.open(_sUrl, _sScroll ? 'no' : 'yes');}
function initLoad(){if(BONLOADMARK){for(key in AONLOAD){eval(AONLOAD[key]);}}}
function vbbcode_winshow(c, p){	var i = p.style.display;c.innerHTML	= c.innerHTML == "&lt;&lt;&nbsp;" ? "&gt;&gt;&nbsp;" : "&lt;&lt;&nbsp;"; p.style.display = (i == "") ? "none" : "";}
function onfocus(s){var _sStr; if(exist(s)){_sStr=$(s).value;}else{return;}$(s).focus();if(_sStr!=""){$(s).select();}}
function dwSwf(_sName, _sSrc, _sWidth, _sHeight, _sMode, _aValue){
	var sValue = '';
	var aFlashVars = [];
	if(_aValue){
		for(key in _aValue){
			aFlashVars[aFlashVars.length] = key + "=" + _aValue[key];
		}
		sValue = aFlashVars.join('&');
	}
	_sMode = _sMode ? 'wmode="transparent"' : '';
	return '<embed id="' + _sName + '" name="' + _sName + '" src="' + _sSrc + '" ' + _sMode + ' quality="high" align="top" salign="lt" allowScriptAccess="always" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="' + _sWidth + '" height="' + _sHeight + '" flashVars="' + sValue + '"></embed>';
}
function addClass(objname,classname){
	var obj = $(objname);
	var arr = obj.className.split(' ');
	if(obj.className.indexOf('A_font_change') == -1){
		arr[length] = classname;
	}else{
		for(var i=0;i<arr.length;i++){
			if(arr[i].indexOf('A_font_change') != -1){
				arr[i] = classname;
				break;
			}
		}
	}
	obj.className = arr.join(' ');
	$(objname+"_tag").className = obj.className;
	if(classname.indexOf('big') != -1) setFontSize(16,27);	
	if(classname.indexOf('mid') != -1) setFontSize(14,24);	
	if(classname.indexOf('sml') != -1) setFontSize(12,21);	
	function setFontSize(font_size,line_height){
		$(objname).style.fontSize = font_size+'px';
		$(objname).style.lineHeight = line_height+'px';
		$(objname+'_tag').style.fontSize = font_size+'px';
		$(objname+'_tag').style.lineHeight = line_height+'px';
		$('labeltag').style.fontSize = font_size+'px';
		$('labeltag').style.lineHeight = line_height+'px';
	}
}
function initSendTime(){
	SENDTIME = new Date();
}
function getSend(){
	var sCurrTime = Math.floor((new Date() - SENDTIME)/1000);
	return sCurrTime < 0 ? 60 : sCurrTime;
}
function sns_resize(_oObj){
	var tMark = true;var iWidth = 0;var sOuterHtml;var aNode = _oObj.attributes;
	for(var i = 0; i < aNode.length; i++){if(aNode[i].specified){if(aNode[i].name == "width" || aNode[i].name == "height"){tMark = false;}}}
	if(tMark){setTimeout("resize()",500);}
	this.resize = function(){if(!_oObj.attributes['RESIZEWIDTH']){return}if(_oObj.width > _oObj.attributes['RESIZEWIDTH'].value){_oObj.width = _oObj.attributes['RESIZEWIDTH'].value;}}
}
function resizeImg(_oObj, _iWidth){
	var tMark = true;var iWidth = 0;var sOuterHtml;var aNode = _oObj.attributes;
	for(var i = 0; i < aNode.length; i++){if(aNode[i].specified){if(aNode[i].name == "width" || aNode[i].name == "height"){tMark = false;}}}
	if(tMark){if(_iWidth){setTimeout("resize()",500);}}
	this.resize = function(){if(_oObj.width > _iWidth){_oObj.width = _iWidth;}}
}
function showCount(){
	try{
		show=count;
		if(Math.abs(show) > 0){
			for(i = show.length; i < 5; i++){show = "0" + show;}
			for(i = 0; i < show.length; i++){
				document.write("<img alt='" + show.substr(i,1) + "' title='" + show.substr(i,1) + "' src='http://image2.sina.com.cn/blog/tmpl/v3/images/counter/" + COUNTTHEME + "/" + show.substr(i,1) + ".gif'/>");
			}
		}
	}
	catch(e){}
}
function handleKeyDown(eEvent){
	var oParent = eEvent.target ? eEvent.target : event.srcElement;
	if(eEvent.keyCode == 9){
		if(eEvent.target){
			var oStart = oParent.selectionStart;
			var oPos = oParent.selectionEnd;
			var sStart = oParent.value.slice(0, oStart);
			var sEnd = oParent.value.slice(oPos);
			oParent.value = sStart + String.fromCharCode(9) + sEnd;
			setTimeout(function(){oParent.focus()}, 200);
			oParent.selectionEnd = oPos + 1;
		}else{
			oParent.selection = document.selection.createRange();
			oParent.selection.text = String.fromCharCode(9);
			eEvent.returnValue = false;
		}
	}
}
function browserDetect(){
	var sUA = navigator.userAgent.toLowerCase();
	var sIE = sUA.indexOf("msie");
	var sOpera = sUA.indexOf("opera");
	var sMoz = sUA.indexOf("gecko");
	if (sOpera != -1) return "opera";
	if (sIE != -1){
		nIeVer = parseFloat(sUA.substr(sIE + 5));
		if (nIeVer >= 6) return "ie6";
		else if (nIeVer >= 5.5) return "ie55";
		else if (nIeVer >= 5 ) return "ie5";
	}
	if (sMoz != -1)	return "moz";
	return "other";
}
var BROWSER = browserDetect();
document.write("<script type='text/javascript' src='/js/" + BROWSER + ".js'></script>");
var CACHE = {"outline":[]};
var CONFIG = {"readfile":""};
var AONLOAD = [];
var SENDTIME = new Date("2005","9","8","10","0","0");
var BONLOADMARK = true; 
function commentSubmit(_sVid){
	var sHomePage = $('form' + _sVid)['homepage'].value;
	var sLoginName = $('form' + _sVid)['loginname'].value;
	var sCheckWd = $('form' + _sVid)['checkwd'].value;
	var sContent = $('form' + _sVid)['content'].value;
	var sDialog = new dialog();
	sDialog.init();
	if(getSend()<60){
		sDialog.event('请不要在短时间内多次提交评论 :)<br/> 您需要�?�心等待 ' + (60 - getSend()) + ' 秒后，才能再次发表评�?','');
		sDialog.button('dialogOk','void 0');
		$('dialogOk').focus();
		return false;
	}
	if(sLoginName == ''){
		sDialog.event('请输入您的昵�?','');
		sDialog.button('dialogOk','void 0');
		$('dialogOk').focus();
		return false;
	}
	
	if(sHomePage != '' && sHomePage.substr(0, 7) != 'http://' && sHomePage.length < 8){
		sDialog.event('请输入URL地址!','');
		sDialog.button('dialogOk','void 0');
		$('dialogOk').focus();
		return false;
	}
	
	if(sCheckWd == ''){
		sDialog.event('请输入验证码!','');
		sDialog.button('dialogOk','void 0');
		$('dialogOk').focus();
		return false;
	}
	
	if(sContent == ''){
		sDialog.event('请输入评论内�?','');
		sDialog.button('dialogOk','void 0');
		$('dialogOk').focus();
		return false;
	}
	initSendTime();
	$("src_title" + _sVid).value = $("commentText" + _sVid).innerHTML;
	$("src_uname" + _sVid).value = AUTHOR;$('form' + _sVid).submit();
}
function gbookSubmit(_sVid){
	var sCheckWd = $('form' + _sVid)['checkwd'].value;
	var sContent = $('form' + _sVid)['content'].value;
	var sDialog = new dialog();
	sDialog.init();
	if(getSend()<60){
		sDialog.event('请不要在短时间内多次提交留言 :)<br/> 您需要�?�心等待 ' + (60 - getSend()) + ' 秒后，才能再次发表留�?.','');
		sDialog.button('dialogOk','void 0');
		$('dialogOk').focus();
		return false;
	}
	if(sCheckWd == ''){
		sDialog.event('请输入验证码!','');
		sDialog.button('dialogOk','void 0');
		$('dialogOk').focus();
		return false;
	}
	
	if(sContent == ''){
		sDialog.event('请输入留�?内容!','');
		sDialog.button('dialogOk','void 0');
		$('dialogOk').focus();
		return false;
	}
	initSendTime();
	return true;
}
function getFrameNode(sNode){
	return document.frames ? document.frames[sNode] : document.getElementById(sNode).contentWindow;
}
function checkwd_reload(){
		if (document.getElementById("user_login_info")) {
			ob = getFrameNode("user_login_info").document.getElementById("chk_img");
		}
		else {
       		 ob = document.getElementById("chk_img");
		 }
		SENDTIME = new Date("2005","9","8","10","0","0");
		var chk_img_time =new Date().getTime();
		ob.src = '/myblog/checkwd_image.php?' + chk_img_time;
}

function login_button_reload(){
		if (document.getElementById("user_login_info")) {
			if (getFrameNode("user_login_info").document.getElementById("login_button"))
			{
				lb = getFrameNode("user_login_info").document.getElementById("login_button");
				lb.disabled = false;
			}
		}
		else if(document.getElementById("login_button")){
       		 lb = document.getElementById("login_button");
			 lb.disabled = false;
		 }
}

function load_chk_img(s) { 
	var chk_img_time =new Date().getTime();
	$(s).src='/myblog/checkwd_image.php?'+chk_img_time;
	}

function ResizeSWF(nWidth, nHeight) {
	var swf = $("music");
	var obj = $("musicFlash");
	swf.style.width = nWidth;
	swf.style.height = nHeight;
	obj.width = nWidth;
	obj.height = nHeight;
}
function ResizeFlash(flashId, layerId, nWidth, nHeight) {
	var swf = $(layerId);
	var obj = $(flashId);
	swf.style.width = nWidth;
	swf.style.height = nHeight;
	obj.width = nWidth;
	obj.height = nHeight;
}
function SearchIASK(sString) {
	var _form = document.createElement("form");
	_form.style.display = "none";
	_form.action = "http://m.iask.com/g";
	_form.target = "_blank";
	var _input = document.createElement("input");
	_input.value = "yes";
	_input.name = "utf";
	_form.appendChild(_input);
	var _input = document.createElement("input");
	_input.value = sString;
	_input.name = "k";
	_form.appendChild(_input);
	document.body.appendChild(_form);
	_form.submit();
	_form.parentNode.removeChild(_form);
}
function LocalPlay(sString) {
	window.open(sString);
}
function openPic(sString) {
	window.open(sString);
}
if (top.location != self.location) {
	document.write("<img src='" + "http://counter.blog.sina.com.cn/i.php?url=" + escape(self.location) + "' style='display:none;'/>");
}
var SwfView = {
swfList: new Array(),
Add: function (sURL, sID, sPID, nWidth, nHeight, nVersion, sBGColor, oVar, oParam) {
	if(sURL && sPID) {
		this.swfList[this.swfList.length] = {
			sURL: sURL,
			sID: sID,
			sPID: sPID,
			nWidth: nWidth,
			nHeight: nHeight,
			nVersion: nVersion,
			sBGColor: sBGColor,
			oVar: oVar,
			oParam: oParam
		}
	}
},
Init: function () {
	var so;
	var list = this.swfList;
	for(var i = 0; i < list.length; i ++) {
		so = new SWFObject(list[i]["sURL"], list[i]["sID"], list[i]["nWidth"], list[i]["nHeight"], list[i]["nVersion"], list[i]["sBGColor"]);
		if(list[i]["oVar"]) {
			for(var key in list[i]["oVar"]) {
				so.addVariable(key, list[i]["oVar"][key]);
			}
		}
		if(list[i]["oParam"]) {
			for(var key in list[i]["oParam"]) {
				so.addParam(key, list[i]["oParam"][key]);
			}
		}
		so.write(list[i]["sPID"]);
	}
	list = new Array();
}
};
function callFlash(){$('play_img').src='http://image2.sina.com.cn/blog/tmpl/v3/images/play_img.gif';  window.document.mp3_player.SetVariable("isPlay", "1");$('checkwd').value='';$('checkwd').focus();}
