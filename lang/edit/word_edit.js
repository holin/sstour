var sRTE;
var FacePath = "image/face/";
function word(sNodeBox, sHTML){
	var oHead = new Object;
	var oBody = new Object;
	var oArea = document.createElement("textarea");
	var posArr = [
	{w: 3, x: -2},
	{w: 20, x: -5, t: "����", func: "Undo", id: "a1"},
	{w: 20, x: -25, t: "����", func: "Redo", id: "a2"},
	{w: 2, x: 0, id: "a3"},
	{w: 20, x: -45, t: "����", func: "Cut", id: "b1"},
	{w: 20, x: -65, t: "����", func: "Copy", id: "b2"},
	{w: 20, x: -85, t: "ճ��", func: "Paste", id: "b3"},
	{w: 2, x: 0, id: "b4"},
	{w: 20, x: -225, t: "����", func: "Bold", id: "c1"},
	{w: 20, x: -245, t: "б��", func: "Italic", id: "c2"},
	{w: 20, x: -265, t: "�»���", func: "Underline", id: "c3"},
	{w: 2, x: 0, id: "c4"},
	{w: 20, x: -285, t: "�����", func: "justifyleft", id: "d1"},
	{w: 20, x: -305, t: "����", func: "justifycenter", id: "d2"},
	{w: 20, x: -325, t: "�Ҷ���", func: "justifyright", id: "d3"},
	{w: 20, x: -345, t: "���˶���", func: "justifyfull", id: "d4"},
	{w: 2, x: 0, id: "d5"},
	{w: 20, x: -145, t: "���ͼƬ", func: "img", id: "e1"},
	{w: 20, x: -105, t: "��������", func: "link", id: "e2"},
	{w: 20, x: -125, t: "������", func: "table", id: "e3"},
	{w: 20, x: -465, t: "����UBB����", func: "face", id: "e4"},
	{w: 20, x: -485, t: "�������ֿ�", func: "textarea", id: "e5"},
	{w: 20, x: -759, t: "��������", func: "cclink", id: "e6"},
	{w: 2, x: 0, id: "e4"},
	{w: 20, x: -165, t: "����", func: "inserthorizontalrule", id: "f1"},
	{w: 20, x: -185, t: "�ı���ɫ", func: "forecolor", id: "f2"},
	{w: 20, x: -205, t: "����ɫ", func: "hilitecolor", id: "f3"},
	{w: 2, x: 0, id: "f4"},
	{w: 40, x: -505, t: "������ʽ", func: "formatblock", id: "g1"},
	{w: 40, x: -545, t: "����", func: "fontname", id: "g2"},
	{w: 60, x: -585, t: "�����С", func: "fontsize", id: "g3"},
	{w: 2, x: 0, id: "g4"},
	{w: 20, x: -365, t: "����б�", func: "insertorderedlist", id: "h1"},
	{w: 20, x: -385, t: "��Ŀ�����б�", func: "insertunorderedlist", id: "h2"},
	{w: 20, x: -405, t: "��������", func: "outdent", id: "h3"},
	{w: 20, x: -425, t: "��������", func: "indent", id: "h4"},
	{w: 2, x: 0, id: "h5"},
	{w: 20, x: -445, t: "����", func: "editmenu"}
	];
	oHead["table"] = document.createElement("table");
	oHead["table"].cellSpacing = "0px";
	oHead["table"].cellPadding = "0px";
	oHead["table"].border = "0px";
	oHead["table"].id = sNodeBox + "Table";
	oHead["table"].className = "editerToolsBox";
	oHead["tbody"] = document.createElement("tbody");
	oHead["tr"] = document.createElement("tr");
	oHead["td"] = document.createElement("td");
	oHead["td"].className = "editerToolsBG";
	for(var i = 0; i < posArr.length; i ++) {
		oHead["items"] = document.createElement("img");
		posArr[i]["id"] ? oHead["items"].id = posArr[i]["id"] : function(){};
		oHead["items"].src = "image/edit/blank.gif";
		oHead["items"].style.margin = "1px";
		oHead["items"].className = "editerToolsIMG";
		oHead["items"].style.width = posArr[i]["w"];
		oHead["items"].style.backgroundPosition = posArr[i]["x"] + "px 0px";
		if(posArr[i]["func"] != null) {
			oHead["items"].title = posArr[i]["t"];
			oHead["items"]["func"] = posArr[i]["func"];
			oHead["items"].onmouseover = function () {
				var bp = this.style.backgroundPosition;
				this.style.backgroundPosition = bp.split(" ")[0] + " -20px";
			}
			oHead["items"].onmouseout = function () {
				var bp = this.style.backgroundPosition;
				this.style.backgroundPosition = bp.split(" ")[0] + " 0px";
			}
			/*
			oHead["items"].onmousedown = function () {
				var bp = this.style.backgroundPosition;
				this.style.backgroundPosition = bp.split(" ")[0] + " -25px";
			}
			oHead["items"].onmouseup = function () {
				var bp = this.style.backgroundPosition;
				this.style.backgroundPosition = bp.split(" ")[0] + " -20px";
			}
			*/
			oHead["items"].onclick = function () {
				wordChiCommand(this["func"]);
			}
		}
		oHead["td"].appendChild(oHead["items"]);
	}
	oHead["tr"].appendChild(oHead["td"]);
	oHead["td"] = document.createElement("td");
	oHead["td"].id = "editerArrow";
	oHead["td"].className = "editerArrowUp";
	oHead["td"].innerHTML = "<img width='18' border='0' src='image/edit/blank.gif' />";
	oHead["tr"].appendChild(oHead["td"]);
	oHead["tbody"].appendChild(oHead["tr"]);
	oHead["table"].appendChild(oHead["tbody"]);
	document.getElementById(sNodeBox).appendChild(oHead["table"]);

	oBody["table"] = document.createElement("table");
	oBody["table"].cellSpacing = "0px";
	oBody["table"].cellPadding = "0px";
	oBody["table"].border = "0px";
	oBody["table"].className = "editerTextBox";
	oBody["table"].id = "editerTextBox";
	oBody["tbody"] = document.createElement("tbody");
	oBody["tr"] = document.createElement("tr");
	oBody["td"] = document.createElement("td");
	oBody["td"].className = "editerTextTopBG";
	oBody["tr"].appendChild(oBody["td"]);
	
	oBody["tbody"].appendChild(oBody["tr"]);
	oBody["tr"] = document.createElement("tr");
	oBody["td"] = document.createElement("td");
	oBody["td"].className = "editerTextBG";
	oBody["td"].id = sNodeBox + "Iframes";
	oBody["tr"].appendChild(oBody["td"]);
	oBody["tbody"].appendChild(oBody["tr"]);

	oBody["tr"] = document.createElement("tr");
	oBody["td"] = document.createElement("td");
	oBody["td"].className = "editerTextBottomBG";
	oBody["input"] = document.createElement("input");
	oBody["input"].type = "checkbox";
	oBody["input"].id = "EditerCMD";
	function oInputFunc(){
		var oRTE = getFrameNode(sRTE);
		oRTE.focus();
		var sEditBox = document.getElementById(sNodeBox + "Table");
		var sEditMode = sEditBox.style.display == "none" ? true : false;
		if(sEditMode){
			sEditBox.style.display = "";
			if(! window.Event){
				var sOutText = escape(oRTE.document.body.innerText);
				sOutText = sOutText.replace("%3CP%3E%0D%0A%3CHR%3E", "%3CHR%3E");
				sOutText = sOutText.replace("%3CHR%3E%0D%0A%3C/P%3E", "%3CHR%3E");
				oRTE.document.body.innerHTML = unescape(sOutText);
			}else{
				var oMozText = oRTE.document.body.ownerDocument.createRange();
				oMozText.selectNodeContents(oRTE.document.body);
				oRTE.document.body.innerHTML = oMozText.toString();
			}
		}else{
			sEditBox.style.display = "none";
			if(! window.Event){
				oRTE.document.body.innerText = oRTE.document.body.innerHTML;
			}else{
				var oMozText = oRTE.document.createTextNode(oRTE.document.body.innerHTML);
				oRTE.document.body.innerHTML = "";
				oRTE.document.body.appendChild(oMozText);
			}
		}
	}
	oBody["input"].onclick = oInputFunc;
	oBody["label"] = document.createElement("label");
	oBody["label"].style.fontSize = '12px';
	oBody["label"].htmlFor = "EditerCMD"
	oBody["label"].innerHTML = "��ʾԴ����";
	oBody["td"].appendChild(oBody["input"]);
	oBody["td"].appendChild(oBody["label"]);
	oBody["tr"].appendChild(oBody["td"]);
	oBody["tbody"].appendChild(oBody["tr"]);

	oBody["table"].appendChild(oBody["tbody"]);
	document.getElementById(sNodeBox).appendChild(oBody["table"]);

	sRTE = sNodeBox + "_area";
	document.getElementById(sNodeBox + "Iframes").innerHTML = "<iframe frameborder='0' scrolling='yes' id=" + sRTE + " class='editerTextArea'></iframe>";

	oArea.name = sNodeBox;
	oArea.id = sNodeBox + "_textarea";
	oArea.style.display = "none";
	oArea.value = sHTML;
	document.getElementById(sNodeBox).appendChild(oArea);
	this.save	= function(){
		if(oBody["input"].checked == true) {
			oInputFunc();
			oBody["input"].checked = false;
		}
		var oRTE = getFrameNode(sRTE);
		oRTE.focus();
		var sEditBox = document.getElementById(sNodeBox + "Table");
		var sEditMode = sEditBox.style.display == "none" ? true : false;
		if(sEditMode){
			if(!indow.Event){	
				oArea.value = oRTE.document.body.innerText;
			}else{
				var oMozText = oRTE.document.body.ownerDocument.createRange();
				oMozText.selectNodeContents(oRTE.document.body);
				oArea.value = oMozText.toString();
			}
		}else{
			oArea.value = oRTE.document.body.innerHTML;
		}
	}
	
	function writeDesignMode(sNodeBox, sHTML) {
		enableDesignMode(sNodeBox, "on");
		var sFix = window.Event ? "" : "<div></div>";
		var frameHTML = "\
		<html>\n\
		<head>\n\
		<style>\n\
		body {\n\
			background: #ffffff;\n\
			margin:0px;\n\
			padding:0px;\n\
			font-size:12px;\n\
			overflow:auto;\n\
			scrollbar-face-color:#fff;\n\
			scrollbar-highlight-color:#c1c1bb;\n\
			scrollbar-shadow-color:#c1c1bb;\n\
			scrollbar-3dlight-color:#ebebe4;\n\
			scrollbar-arrow-color:#cacab7;\n\
			scrollbar-track-color:#f4f4f0;\n\
			scrollbar-darkshadow-color:#ebebe4;\n\
			word-wrap: break-word;\n\
			font-family: 'Courier New', Courier, '����';\n\
		}\n\
		</style>\n\
		</head>\n\
		<body>\n\
		" + sHTML + "\n\
		" + sFix + "\n\
		</body>\n\
		</html>";
	
		var oRTE = getFrameNode(sNodeBox).document;
		oRTE.open();
		oRTE.write(frameHTML);
		oRTE.close();
	}
	
	writeDesignMode(sRTE, sHTML);
	
	saveWordStatus();
}

function getFrameNode(sNode){
	return document.frames ? document.frames[sNode] : document.getElementById(sNode).contentWindow;
}
	
function enableDesignMode(sNodeBox, sMode){
	document.frames ? document.frames[sNodeBox].document.designMode = sMode : document.getElementById(sNodeBox).contentDocument.designMode = sMode;
}

function wordChiCommand(_sCmd) {
	var oRTE = document.frames ? document.frames[sRTE] : document.getElementById(sRTE).contentWindow;
	function oPenWin(_sTitle, _sWidth, _sHeight, _sUrl, _bDialog){
		if(window.Event) {
			window.open(_sUrl,"win","menubar=no,location=no,resizable=no,scrollbars=no,status=no,innerWidth="+(_sWidth+0)+",innerHeight="+(_sHeight + 0));
		}
		else {
			if(_bDialog == true) {
				showModelessDialog(_sUrl, window, "dialogHeight:"+(_sHeight+20)+"px;dialogWidth:"+_sWidth+"px;status:no;help:no;tustatus:no;");
			}else {
				showModalDialog(_sUrl, window, "dialogHeight:"+(_sHeight+20)+"px;dialogWidth:"+_sWidth+"px;status:no;help:no;tustatus:no;");
			}
			
		}
	}
	switch(_sCmd){
		
		case "":
			break;
		case "face":
			oPenWin("�������ͼ��", 280, 156, "/js/word_edit/Face.html");
			break;
		case "link":
			oPenWin("��������ҳ��ַ", 300, 140, "/js/word_edit/InsertLink.html");
			break;
		case "table":
			oPenWin("��ѡ��������", 300, 240, "/js/word_edit/InsertTable.html");
			break;
		case "img":
			oPenWin("������ͼƬ��ַ", 300, 140, "/js/word_edit/InsertImg.html");
			break;
		case "forecolor":
			oPenWin("��ѡ���ı���ɫ", 140, 162, "/js/word_edit/ForeColor.html", true);
			break;
		case "hilitecolor":
			oPenWin("��ѡ�񱳾���ɫ", 140, 162, "/js/word_edit/BackColor.html", true);
			break;
		case "formatblock":
			oPenWin("��ѡ�������", 160, 242, "/js/word_edit/FormatBlock.html", true);
			break;
		case "fontsize":
			oPenWin("��ѡ�������С", 160, 186, "/js/word_edit/FontSize.html", true);
			break;
		case "fontname":
			oPenWin("��ѡ��������ʽ", 160, 280, "/js/word_edit/FontName.html", true);
			break;
		case "editmenu":
			oPenWin("���������б�", 156, 250, "/js/word_edit/menu.html");
			break;
		case "textarea":
			insetQUER();
			break;
		case "cclink":
			insetCCLink();
			break;
		default:
			oRTE.focus();
			oRTE.document.execCommand(_sCmd, false, null);
			oRTE.focus();
			break;
	}
}
function insetQUER() {
	var _sVal;
	var rng = {};
	var oRTE = getFrameNode(sRTE);
	if (document.all) {
		var selection = oRTE.document.selection; 
		if (selection != null) {
			rng = selection.createRange();
		}
	} else {
		var selection = oRTE.getSelection();
		
		rng = selection.getRangeAt(selection.rangeCount - 1).cloneRange();
		rng.text = rng.toString();
	}
	_sVal = rng.text == "" ? "�����ı�����������" : rng.text;
	var html = "<table style='border:1px solid #999;width:80%;font-size:12px;' align='center'><tr><td>"+ _sVal +"</td></tr></table>";
	if(window.Event){
		oRTE.document.execCommand('insertHTML', false, html);
	}
	else {
		oRTE.focus();
		var oRng = oRTE.document.selection.createRange();
		oRng.pasteHTML(html);
		oRng.collapse(false);
		oRng.select();
	}
}
function insetCCLink() {
	var _sVal;
	var rng = {};
	var oRTE = getFrameNode(sRTE);
	if (document.all) {
		var selection = oRTE.document.selection; 
		if (selection != null) {
			rng = selection.createRange();
		}
	} else {
		var selection = oRTE.getSelection();
		
		rng = selection.getRangeAt(selection.rangeCount - 1).cloneRange();
		rng.text = rng.toString();
	}
	_sVal = rng.text == "" ? "��������Ҫ���ٵ�����" : rng.text;
	var html = "<a href=\"http://iask.com/s?k="+ (_sVal)+"\" target='_blank'>"+ _sVal +"</a>";
	if(window.Event){
		oRTE.document.execCommand('insertHTML', false, html);
	}
	else {
		oRTE.focus();
		var oRng = oRTE.document.selection.createRange();
		oRng.pasteHTML(html);
		oRng.collapse(false);
		oRng.select();
	}
}
function getStatus(){
	var sFunc = getCookie("sinaBlogWordFunc") ? getCookie("sinaBlogWordFunc").split("_") : [];
	for(var i = 0; i < sFunc.length; i++){
		hideList(sFunc[i]);
	}
}
function getCookie(name){
	var result = null; 
	var myCookie = document.cookie + ";"; 
	var searchName = name + "="; 
	var startOfCookie = myCookie.indexOf(searchName); 
	var endOfCookie; 
	if (startOfCookie != -1)
	{ 
		startOfCookie += searchName.length; 
		endOfCookie = myCookie.indexOf(";", startOfCookie); 
		result = unescape(myCookie.substring(startOfCookie, endOfCookie)); 
	} 
	return result; 
}
function setCookie(name, value, expires, path, domain, secure){
	var expDays = expires * 24 * 60 * 60 * 1000;
	var expDate = new Date(); 
	expDate.setTime(expDate.getTime() + expDays); 
	var expString = ((expires == null) ? "" : (";expires=" + expDate.toGMTString())) 
	var pathString = ((path == null) ? "" : (";path=" + path)) 
	var domainString = ((domain == null) ? "" : (";domain=" + domain)) 
	var secureString = ((secure == true) ? ";secure" : "" )
	document.cookie = name + "=" + escape(value) + expString + pathString + domainString + secureString;
}
function hide(_sId){
	document.getElementById(_sId).style.display = document.getElementById(_sId).style.display == "none" ? "" : "none" ;
}
function swap(s,a,b,c){document.getElementById(s)[a]=document.getElementById(s)[a]==b?c:b;}
function saveWordStatus(_sFunc){
	var i = 1;
	var sFuncId = [];

	if(!_sFunc){
		_sFunc = getCookie("sinaBlogWordFunc") != null ? getCookie("sinaBlogWordFunc").split("_") : [];
	}

	for(var j = 0;j < _sFunc.length; j++){
		i = 1;
		sFuncId = _sFunc[j].split("@");
		while(document.getElementById(sFuncId[0] + i)){
			document.getElementById(sFuncId[0] + i).style.display = sFuncId[1] == "true" ? "none" : "";
			i++;
		}
		sFuncId = [];
	}

	setCookie("sinaBlogWordFunc", _sFunc.join("_"), 7);
}
