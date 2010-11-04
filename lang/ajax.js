function dialog(){
	var titile = '';
	var width = 300;
	var height = 180;
	var src = "";
	var path = hostpath+"image/face/";
	var impath = hostpath+"image/edit/";
	var sFunc = '<input id="dialogOk" type="button" style="{width:62px;height:22px;border:0;background:url(\''+impath+'smb_btn_bg.gif\');line-height:20px;" value="确认" onclick="new dialog().reset();if(parent.document.getElementById(\'showwindow\'))fshowwindowsclos(\'showwindow\')" /> <input id="dialogCancel" type="button" style="{width:62px;height:22px;border:0;background:url(\''+impath+'smb_btn_bg.gif\');line-height:20px;" value="取消" onclick="new dialog().reset();if(parent.document.getElementById(\'showwindow\'))fshowwindowsclos(\'showwindow\')" />';
	var sClose = '<input type="image" id="dialogBoxClose" onclick="new dialog().reset();if(parent.document.getElementById(\'showwindow\'))fshowwindowsclos(\'showwindow\')" src="' + path + 'dialogClose0.gif" border="0" width="17" height="17" onmouseover="this.src=\'' + path + 'dialogCloseF.gif\';" onmouseout="this.src=\'' + path + 'dialogClose0.gif\';" align="absmiddle" />';
	var sBody = '\
		<table id="dialogBodyBox" border="0" align="center" cellpadding="0" cellspacing="0">\
			<tr height="10"><td colspan="4"></td></tr>\
			<tr>\
				<td width="10"></td>\
				<td width="80" align="center" valign="absmiddle"><img id="dialogBoxFace" src="' + path + '3.gif" /></td>\
				<td id="dialogMsg" style="font-size:12px;"></td>\
				<td width="10"></td>\
			</tr>\
			<tr height="10"><td colspan="4" align="center"></td></tr>\
			<tr><td id="dialogFunc" colspan="4" align="center">' + sFunc + '</td></tr>\
			<tr height="10"><td colspan="4" align="center"></td></tr>\
		</table>\
	';
	var sBox = '\
		<table id="dialogBox" width="' + width + '" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #000;display:none;z-index:10;" alt="dialog">\
			<tr height="1" bgcolor="#D6E3EB"><td></td></tr>\
			<tr height="25" bgcolor="#6795B4">\
				<td>\
					<table onselectstart="return false;" style="-moz-user-select:none;" width="100%" border="0" cellpadding="0" cellspacing="0">\
						<tr>\
							<td width="6"></td>\
							<td id="dialogBoxTitle" onmousedown="new dialog().moveStart(event, \'dialogBox\')" style="color:#fff;cursor:move;font-size:12px;font-weight:bold;">&nbsp;</td>\
							<td id="dialogClose" width="27" align="right" valign="middle">\
								' + sClose + '\
							</td>\
							<td width="6"></td>\
						</tr>\
					</table>\
				</td>\
			</tr>\
			<tr height="2" bgcolor="#EDEDED"><td></td></tr>\
			<tr id="dialogHeight" style="height:' + height + '">\
				<td id="dialogBody" bgcolor="#ffffff">' + sBody + '</td>\
			</tr>\
		</table>\
		<iframe id="dialogBoxIframe" width="300px" style="position:absolute;display:none;" frameborder="0"></iframe>\
		<div id="dialogBoxShadow" style="display:none;z-index:9;"></div>\
	';
	var sBG = '\
		<div id="dialogBoxBG" style="position:absolute;top:0px;left:0px;width:100%;height:200px;background:url('+impath+'blank.gif);"></div>\
	';
	function $(_sId){return document.getElementById(_sId)}
	this.show = function(){
		this.middle('dialogBox');
		this.shadow();
		//$("dialogBoxBG").style.width = document.body.scrollWidth;
		//$("dialogBoxBG").style.height = document.body.scrollHeight;
	}
	this.reset = function(){
		if(parent.document.getElementById('showwindow'))
		fshowwindowsclos('showwindow');
		$('dialogBox').style.display='none';
		$('dialogBoxBG').style.display='none';
		$('dialogBoxShadow').style.display = "none";
		$('dialogBoxIframe').style.display = "none";
		$('dialogBody').innerHTML = sBody;}
		this.html = function(_sHtml){$("dialogBody").innerHTML = _sHtml;this.show();}
		this.init = function(){
			if(parent.document.getElementById('showwindow'))
			fshowwindowsopen('showwindow');
			$('dialogCase') ? $('dialogCase').parentNode.removeChild($('dialogCase')) : function(){};
			var oDiv = document.createElement('span');
			oDiv.id = "dialogCase";
			oDiv.innerHTML = sBG + sBox;
			document.body.appendChild(oDiv);
			//$('dialogBoxBG').style.height = document.body.scrollHeight;
		}
		this.button = function(_sId, _sFuc){
			if($(_sId)){
				$(_sId).style.display = '';
				if($(_sId).addEventListener){
					if($(_sId).act){$(_sId).removeEventListener('click', function(){eval($(_sId).act)}, false);}
					$(_sId).act = _sFuc;
					$(_sId).addEventListener('click', function(){eval(_sFuc)}, false);
				}else{
					if($(_sId).act){$(_sId).detachEvent('onclick', function(){eval($(_sId).act)});}
					$(_sId).act = _sFuc;
					$(_sId).attachEvent('onclick', function(){eval(_sFuc)});
				}
			}
		}
		this.shadow = function(){
			var oShadow = $('dialogBoxShadow');
			var oDialog = $('dialogBox');
			var oIframe = $('dialogBoxIframe');
			oShadow['style']['position'] = "absolute";
			oShadow['style']['background']	= "#000";
			oShadow['style']['display']	= "";
			oIframe['style']['display']	= "";
			oShadow['style']['opacity']	= "0.2";
			oShadow['style']['filter'] = "alpha(opacity=20)";
			oShadow['style']['top'] = oDialog.offsetTop + 6;
			oShadow['style']['left'] = oDialog.offsetLeft + 6;
			oShadow['style']['width'] = oDialog.offsetWidth;
			oShadow['style']['height'] = oDialog.offsetHeight;
		}
		this.open = function(_sUrl, _sMode){
			this.show();
			if(!_sMode || _sMode == "no" || _sMode == "yes"){
				$("dialogBody").innerHTML = "<iframe width='100%' height='100%' src='" + _sUrl + "' frameborder='0' scrolling='" + _sMode + "'></iframe>";
			}
		}
		this.showWindow = function(_sUrl, _iWidth, _iHeight, _sMode, _sTitle){
			var oWindow;
			var sLeft = (screen.width) ? (screen.width - _iWidth)/2 : 0;
			var iTop = -80 + (screen.height - _iHeight)/2;
			iTop = iTop > 0 ? iTop : (screen.height - _iHeight)/2;
			var sTop = (screen.height) ? iTop : 0;
			if(window.showModalDialog && _sMode == "m"){
				oWindow = window.showModalDialog(_sUrl,_sTitle,"dialogWidth:" + _iWidth + "px;dialogheight:" + _iHeight + "px");
			} else {
				oWindow = window.open(_sUrl, _sTitle, 'height=' + _iHeight + ', width=' + _iWidth + ', top=' + sTop + ', left=' + sLeft + ', toolbar=no, menubar=no, scrollbars=' + _sMode + ', resizable=no,location=no, status=no');
				this.reset();
			}
		}
		this.event = function(_sMsg, _sOk, _sCancel, _sClose){
			$('dialogFunc').innerHTML = sFunc;
			$('dialogClose').innerHTML = sClose;
			$('dialogBodyBox') == null ? $('dialogBody').innerHTML = sBody : function(){};
			$('dialogMsg') ? $('dialogMsg').innerHTML = _sMsg  : function(){};
			_sOk && _sOk != "" ? this.button('dialogOk', _sOk)| $('dialogOk').focus() : $('dialogOk').style.display = 'none';
			_sCancel && _sCancel != "" ? this.button('dialogCancel', _sCancel) : $('dialogCancel').style.display = 'none';
			//_sOk ? this.button('dialogOk', _sOk) : _sOk == "" ? function(){} : $('dialogCancel').style.display = 'none';
			//_sCancel ? this.button('dialogCancel', _sCancel) : _sCancel == "" ? function(){} : $('dialogCancel').style.display = 'none';
			_sClose ? this.button('dialogBoxClose', _sClose) : function(){};
			this.show();
		}
		this.set = function(_oAttr, _sVal){
			var oShadow = $('dialogBoxShadow');
			var oDialog = $('dialogBox');
			var oHeight = $('dialogHeight');
			var oIframe = $('dialogBoxIframe');
			if(_sVal != ''){
				switch(_oAttr){
					case 'title':
					$('dialogBoxTitle').innerHTML = _sVal;
					title = _sVal;
					break;
					case 'width':
					oDialog['style']['width'] = _sVal;
					width = _sVal;
					break;
					case 'height':
					oHeight['style']['height'] = _sVal;
					height = _sVal;
					break;
					case 'src':
					if(parseInt(_sVal) > 0){
						$('dialogBoxFace') ? $('dialogBoxFace').src = path + _sVal + '.gif' : function(){};
					}else{
						$('dialogBoxFace') ? $('dialogBoxFace').src = _sVal : function(){};
					}
					src = _sVal;
					break;
				}
			}
			this.middle('dialogBox');
			oShadow['style']['top'] = oDialog.offsetTop + 6;
			oShadow['style']['left'] = oDialog.offsetLeft + 6;
			oShadow['style']['width'] = oDialog.offsetWidth;
			oShadow['style']['height'] = oDialog.offsetHeight;
			oIframe['style']['top'] = oDialog.offsetTop;
			oIframe['style']['left'] = oDialog.offsetLeft;
			oIframe['style']['width'] = oDialog.offsetWidth;
			oIframe['style']['height'] = oDialog.offsetHeight;
		}
		this.moveStart = function (e, _sId){
			function fixE(e) {
				if (typeof e == 'undefined') e = window.event;
				if (typeof e.layerX == 'undefined') e.layerX = e.offsetX;
				if (typeof e.layerY == 'undefined') e.layerY = e.offsetY;
				return e;
			}
			function getX(e){ return fixE(e).clientX; };
			function getY(e){	return fixE(e).clientY; };
			function drag(e){
				v = document.getElementById(_sId);
				var nX = getX(e);
				var nY = getY(e);
				var ll = v.rL + nX - v.oX;
				var tt = v.rT + nY - v.oY;
				v.style.left = ll + 'px';
				v.style.top  = tt + 'px';
				$('dialogBoxShadow').style.left = ll + 6 +'px';
				$('dialogBoxShadow').style.top = tt + 6 + 'px';
				$('dialogBoxIframe').style.left = ll + 'px';
				$('dialogBoxIframe').style.top = tt + 'px';
				return false;
			}
			function end() {
				document.onmousemove	= null;
				document.onmouseup		= null;
			}
			v = $(_sId);
			v.oX = getX(e);
			v.oY = getY(e);
			v.rL = parseInt(v.style.left ? v.style.left : 0);
			v.rT = parseInt(v.style.top  ? v.style.top  : 0);
			document.onmousemove = drag;
			document.onmouseup	 = end;
			return false;
		}
		this.hideModule = function(_sType, _sDisplay){
			var aIframe = parent.document.getElementsByTagName("iframe");aIframe=0;
			var aType = document.getElementsByTagName(_sType);
			var iChildObj, iChildLen;
			for (var i = 0; i < aType.length; i++){
				aType[i].style.display	= _sDisplay;
			}
			for (var j = 0; j < aIframe.length; j++){
				iChildObj = document.frames ? document.frames[j] : aIframe[j].contentWindow;
				iChildLen = iChildObj.document.body.getElementsByTagName(_sType).length;
				for (var k = 0; k < iChildLen; k++){
					iChildObj.document.body.getElementsByTagName(_sType)[k].style.display = _sDisplay;
				}
			}
		}
		this.middle = function(_sId){
			var obj = document.getElementById(_sId);
			var sClientWidth = getWinSize().width;
			var sClientHeight = parent ? getWinSize(parent).height - 80 : getWinSize().height ;
			var sScrollTop = parent ? parent.document.body.scrollTop : document.body.scrollTop;
			obj.style.display = "";
			obj.style.position = "absolute";
			obj.style.left = (sClientWidth - obj.offsetWidth)/2;
			var styletop = (sClientHeight - obj.offsetHeight)/2 + sScrollTop
			obj.style.top = styletop<0?0:styletop;
		}
}
function getWinSize(_target) {
	var windowWidth, windowHeight;
	if(_target) target = _target.document;
	else	target = document;
	if (self.innerHeight) { // all except Explorer
		if(_target) target = _target.self;
		else	target = self;
		windowWidth = target.innerWidth;
		windowHeight = target.innerHeight;
	} else if (target.documentElement && target.documentElement.clientHeight) { // Explorer 6 Strict Mode
		windowWidth = target.documentElement.clientWidth;
		windowHeight = target.documentElement.clientHeight;
	} else if (target.body) { // other Explorers
		windowWidth = target.body.clientWidth;
		windowHeight = target.body.clientHeight;
	}
	return {width:parseInt(windowWidth),height:parseInt(windowHeight)};
}
function _error_msg_show(msg, click, icon, title)
{
	click = click ? click : ' ';
	icon = icon ? icon : '';
	title = title ? title : '系统提示信息';

	switch (icon)
	{
		case 'forbid':
		icon = 1;
		break;

		case 'succ':
		icon = 2;
		break;

		case 'smile':
		icon = 3;
		break;

		case 'forget':
		icon = 4;
		break;

		case 'sorry':
		icon = 5;
		break;

		case 'care':
		icon = 6;
		break;

		case '':
		icon = 5;
		break;
	}

	dg=new dialog();
	dg.init();
	dg.set('src', icon);
	dg.set('title', title);
	dg.event(msg, click, '', click);
}

function _win_error_msg_show(msg, click, icon, top, left, width, height)
{
	click = click ? click : ' ';
	icon = icon ? icon : '';
	title = '系统提示信息';
	top = top ? top : 80;
	switch (icon)
	{
		case 'forbid':
		icon = 1;
		break;

		case 'succ':
		icon = 2;
		break;

		case 'smile':
		icon = 3;
		break;

		case 'forget':
		icon = 4;
		break;

		case 'sorry':
		icon = 5;
		break;

		case 'care':
		icon = 6;
		break;

		case '':
		icon = 5;
		break;
	}
	dg=new dialog();
	dg.init();

	dg.set('src', icon);

	dg.set('title', title);

	if (width)
	{
		dg.set('width', width);
	}
	if (height)
	{
		dg.set('height', height);
	}

	dg.event(msg, click, '', click);


	if (left)
	{
		document.getElementById('dialogBox')['style']['left'] = left;
		document.getElementById('dialogBoxShadow')['style']['left'] = left;
	}
	if (top)
	{
		document.getElementById('dialogBox')['style']['top'] = top;
		document.getElementById('dialogBoxShadow')['style']['top'] = top;
	}

}

function _confirm_msg_show(msg, click_ok, click_no, title)
{
	click_ok = click_ok ? click_ok : ' ';
	click_no = click_no ? click_no : ' ';
	title = title ? title : '系统提示信息';

	dg=new dialog();
	dg.init();
	dg.set('src', 3);	// smile
	dg.set('title', title);
	dg.event(msg, click_ok, click_no, click_no);
}

function _win_confirm_msg_show(msg, click_ok, click_no, top, left, width, height)
{
	click_ok = click_ok ? click_ok : ' ';
	click_no = click_no ? click_no : ' ';
	title = '系统提示信息';
	top = top ? top : 80;

	dg=new dialog();
	dg.init();
	dg.set('src', 3);   // smile
	dg.set('title', title);

	if (width)
	{
		dg.set('width', width);
	}
	if (height)
	{
		dg.set('height', height);
	}

	dg.event(msg, click_ok, click_no, click_no);

	if (left)
	{
		document.getElementById('dialogBox')['style']['left'] = left;
		document.getElementById('dialogBoxShadow')['style']['left'] = left;
	}
	if (top)
	{
		document.getElementById('dialogBox')['style']['top'] = top;
		document.getElementById('dialogBoxShadow')['style']['top'] = top;
	}
}


var http_request = false;

function send_request(url) {
	//初始化、指定处理函数、发送请求的函数
	http_request = false;
	//开始初始化XMLHttpRequest对象
	if(window.XMLHttpRequest) {
		//Mozilla 浏览器
		http_request = new XMLHttpRequest();
		if (http_request.overrideMimeType) {
			//设置MiME类别
			http_request.overrideMimeType("text/xml");
		}
	}else if (window.ActiveXObject) {
		// IE浏览器
		try {
			http_request = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				http_request = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {}
		}
	}
	if (!http_request) {
		// 异常，创建对象实例失败
		window.alert("不能创建XMLHttpRequest对象实例.");
		return false;
	}
	http_request.onreadystatechange = processRequest;
	// 确定发送请求的方式和URL以及是否同步执行下段代码
	http_request.open("GET", url, true);
	http_request.send(null);
}

// 处理返回信息的函数

function processRequest() {
	if (http_request.readyState == 4) {
		// 判断对象状态
		if (http_request.status == 200) {
			// 信息已经成功返回，开始处理信息
			alert(http_request.responseText);
		} else {
			//页面不正常
			alert("您所请求的页面有异常。");
		}
	}
}
function InitAjax()
{
	var ajax=false;
	try {
		ajax = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			ajax = false;
		}
	}
	if (!ajax && typeof XMLHttpRequest!='undefined') {
		ajax = new XMLHttpRequest();
	}
	return ajax;
}

function getFormValue(fco){
	var formsid = 0;
	if(document.getElementById(fco)){
		var elems=document.getElementById(fco).elements;
		formsid = 1;
	}else if(parent.document.getElementById(fco)){
		var elems=parent.document.getElementById(fco).elements;
		formsid = 1;
	}else if(document.forms[0])
	{
		for(var le=0;le<document.forms.length;le++)
		{
			if(document.forms[le].name == fco)
			{
				var elems=document.forms[le];
				formsid = 1;
			}
		}
	}else{
		for(var le=0;le<parent.document.forms.length;le++)
		{
			if(parent.document.forms[le].name == fco)
			{
				var elems=parent.document.forms[le];
				formsid = 1;
			}
		}
	}
	if(formsid == 0)
	{
		for(var le=0;le<parent.document.forms.length;le++)
		{
			if(parent.document.forms[le].name == fco)
			{
				var elems=parent.document.forms[le];
				formsid = 1;
			}
		}
	}

	if(elems.Submit)
	elems.Submit.disabled=true;

	var str="";
	for(var i=0;i<elems.length;i++){
		var elem = elems[i];
		if(elem.name!=""){
			if((elem.type.toLowerCase()!="checkbox")&&(elem.type.toLowerCase()!="radio")&&(elem.type.toLowerCase()!="select-multiple")){
				str+=elem.name+"="+escape(elem.value)+"&";
			}else if(elem.type.toLowerCase()=="select-multiple"){
				for(var j=0;j<elem.length;j++)
				{
					var eleq = elem[j];
					if(eleq.selected)
					str+=elem.name+"="+escape(eleq.value)+"&";
				}
			}else if(elem.type.toLowerCase()=="file"){
				str+=elem.name+"_upfile"+"="+escape(elem.value)+"&";
			}else if(elem.checked){
				str+=elem.name+"="+escape(elem.value)+"&";
			}
		}
	}
	return str;
}

function icon_article()
{
	var d = new dialog();d.init();
	d.set('src','3');
	d.set('title','系统提示');
	d.event('信息正在更新请稍候', '','','');
	return true
	//elems.action = url;
	//elems.submit();
}

function getNews(namemsg,urlID)
{
	var url = urlID+"&read=1";
	//获取新闻显示层的位置
	if(document.getElementById(namemsg))
	var show = document.getElementById(namemsg);
	else
	var show = parent.document.getElementById(namemsg);
	//实例化Ajax对象
	show.innerHTML = "<img src=image/water/jiazai.gif>";
	//实例化Ajax对象
	var ajax = InitAjax();
	//使用Get方式进行请求
	ajax.open("GET", url, true);
	ajax.setRequestHeader("Content-Length",url.length);
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//获取执行状态
	ajax.onreadystatechange = function() {
		//如果执行是状态正常，那么就把返回的内容赋值给上面指定的层
		if (ajax.readyState == 4 && ajax.status == 200) {
			show.innerHTML = ajax.responseText;
			//parent.document.getElementById('namemsg').innerHTML = "";
		}
	}
	//发送空
	ajax.send(null);
}

function saveUserlogin(seturl,fco,serturl,lasturl)
{
	if(!serturl)
	serturl = '';
	//接收表单的URL地址
	var url = seturl+"&read=1";
	//需要POST的值，把每个变量都通过&来联接
	var eee = getFormValue(fco);
	var postStr = eee.replace(/(\+)/ig,"%2B");
	_win_error_msg_show("数据提交中<BR>请稍后...<BR>如果长时间停止请点击\"确认\"重新提交", serturl, 3, (document.body.clientHeight/2 + document.body.scrollTop), (document.body.clientWidth/2+document.body.scrollLeft), '30%', '150');
	//实例化Ajax
	var ajax = InitAjax();
	//通过Post方式打开连接
	ajax.open("POST", url, true);
	ajax.setRequestHeader("Content-Length",seturl.length);
	//定义传输的文件HTTP头信息
	ajax.setRequestHeader("accept", "*/*");
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//发送POST数据
	ajax.send(postStr);
	//获取执行状态
	ajax.onreadystatechange = function() {
		//如果执行状态成功，那么就把返回信息写到指定的层里
		if (ajax.readyState == 4 && ajax.status == 200) {
			var showresptxt = ajax.responseText;
			if(showresptxt.indexOf("error")==0){
				lasturl = serturl;
			}else{
				if(!lasturl)
				lasturl = 'window.location.reload();'
				else if(lasturl==1)
				lasturl = '';
			}
			_win_error_msg_show(showresptxt,lasturl, 2, (document.body.clientHeight/2 + document.body.scrollTop), (document.body.clientWidth/2+document.body.scrollLeft), '30%', '150');
			//location.href=
		}
	}
	if(document.getElementById('Submit'))
	document.getElementById('Submit').disabled=false;
}

function Userloginon(seturl,fco,serturl,lasturl)
{
	if(!serturl)
	serturl = '';
	var url = seturl+"&read=1";
	//需要POST的值，把每个变量都通过&来联接
	//var postStr = getFormValue(fco);
	//接收表单的URL地址
	if(fco)
	{
		var eee = getFormValue(fco);
		var postStr = eee.replace(/(\+)/ig,"%2B");
	}

	_win_error_msg_show("数据提交中<BR>请稍后...<BR>如果长时间停止请点击\"确认\"重新提交", serturl, 3, (document.body.clientHeight/2 + document.body.scrollTop), (document.body.clientWidth/2+document.body.scrollLeft), '30%', '150');
	//实例化Ajax
	var ajax = InitAjax();
	//通过Post方式打开连接
	ajax.open("POST", url, true);
	//定义传输的文件HTTP头信息
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	//发送POST数据
	if(fco)
	ajax.send(postStr);
	else
	ajax.send('');
	//获取执行状态
	ajax.onreadystatechange = function() {
		//如果执行状态成功，那么就把返回信息写到指定的层里
		if (ajax.readyState == 4 && ajax.status == 200) {
			var showresptxt = ajax.responseText;
			if(showresptxt.indexOf("error")==0){
				//lasturl = '';
				if(document.getElementById('Submit'))
				document.getElementById('Submit').disabled=false;
				_win_error_msg_show(showresptxt,serturl, 4, (document.body.clientHeight/2 + document.body.scrollTop), (document.body.clientWidth/2+document.body.scrollLeft), '30%', '150');
			}else if(showresptxt.indexOf("ok")==0){
				_win_error_msg_show(showresptxt,lasturl, 2, (document.body.clientHeight/2 + document.body.scrollTop), (document.body.clientWidth/2+document.body.scrollLeft), '30%', '150');
			}else{
				window.location.reload();
			}
			//location.href=
		}
	}
}

function geturladds(namemsg,seturl,lasturl)
{
	if(namemsg)
	_win_error_msg_show("数据处理中...<BR>请耐心等待", seturl, 3, (document.body.clientHeight/2 + document.body.scrollTop), (document.body.clientWidth/2+document.body.scrollLeft), '30%', '150');
	var url = seturl+"&read=1";
	var ajax = InitAjax();
	//使用Get方式进行请求
	ajax.open("GET", url, true);
	//获取执行状态
	ajax.onreadystatechange = function() {
		//如果执行是状态正常，那么就把返回的内容赋值给上面指定的层
		if (ajax.readyState == 4 && ajax.status == 200) {
			if(namemsg)
			_win_error_msg_show(ajax.responseText,lasturl, 2, (document.body.clientHeight/2 + document.body.scrollTop), (document.body.clientWidth/2+document.body.scrollLeft), '30%', '150');
			else
			eval(lasturl);
		}
	}
	//发送空
	ajax.send(null);
}

function $(_sId){
	return document.getElementById(_sId);
}
function exist(_sId){
	var oObj = $(_sId);
	return oObj != null ? oObj : false;
}
function dw(_sTxt){
	document.write(_sTxt);
}
function hide(_sId){
	var IdStr = _sId.replace(/(\d+)$/ig,"");
	for(var i=0;i<200;i++)
	{
		var oObj = $(IdStr+i);
		if(oObj != null)
		{
			if(IdStr+i !== _sId)
			oObj.style.display = "none" ;
		}
	}
	$(_sId).style.display = $(_sId).style.display == "none" ? "" : "none";
}
function onlyShow(_sId, _iNum, _sPic, _sTxt1, _sTxt2){
	var i = 0;
	var oCurr = exist(_sId + i);
	while(oCurr){
		oCurr.style.display = "none";
		$(_sPic + i).src = _sTxt2;
		i++;
		oCurr = exist(_sId + i)
	}
	$(_sId + _iNum).style.display = "";
	$(_sPic + _iNum).src = _sTxt1;
}
function swapShow(_sId){
	var i = 0;
	var oCurr = exist(_sId + i);
	while(oCurr){
		hide(_sId + i);
		i++;
		oCurr = exist(_sId + i)
	}
}
function seekKey(_sKey){
	var i = 0;
	while(exist(_sKey + i)){
		i++;
	}
	return i;
}
function swapPic(_sId,_sAttr,_sTxt1, _sTxt2) {
	$(_sId)[_sAttr] = $(_sId)[_sAttr].indexOf(_sTxt1) > -1 ? _sTxt2 : _sTxt1;
}
function swap(_sId,_sAttr,_sTxt1, _sTxt2) {
	$(_sId)[_sAttr] = $(_sId)[_sAttr] == _sTxt1 ? _sTxt2 : _sTxt1;
}
function moveGif(_sId){
	swap(_sId,'className','marginLeft2','');
}
function moveStart(_sId){
	__tmp__time = setInterval("moveGif('" + _sId + "')",200);
}
function moveStop(_sId){
	clearInterval(__tmp__time);
	$(_sId).className = "marginLeft2";
}
function switchShow(){
	hide('left');
	swapPic('arrow','src','image/edit/control_switch_up.gif','image/edit/control_switch_down.gif');
	swapShow('hideLeft');
	swapShow('hideBody');
}
function scroll_to_top()
{
	document.body.scrollTop=0;
}
function mainFrameRedirect(url)
{
	oo = document.getElementById("mainFrame");
	oo.url = url;
}
function fshowwindows(urlID,showtype,ftitle)
{
	dialogs = new dialog();
	dialogs.init();
	dialogs.set('src','2');
	dialogs.html('<div align=center><img src="'+hostpath+'image/water/jiazai.gif"></div>');
	dialogs.set('width', '');
	dialogs.set('height', '');
	dialogs.set('title',ftitle);
	if(showtype == 1)
	{
		var url = urlID+"&read=1";
		//获取新闻显示层的位置
		var ajax = InitAjax();
		//使用Get方式进行请求
		ajax.open("GET", url, true);
		ajax.setRequestHeader("Content-Length",urlID.length);
		ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		//获取执行状态
		ajax.onreadystatechange = function() {
			//如果执行是状态正常，那么就把返回的内容赋值给上面指定的层
			if (ajax.readyState == 4 && ajax.status == 200) {
				dialogs.html(ajax.responseText);
			}
		}
		//发送空
		ajax.send(null);
	}else
	dialogs.html(urlID);
	//if(confirm('你确定注销用户？:S'))location.href='index.php?action=login&option=quit';
}