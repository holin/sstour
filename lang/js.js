function fseachfind()
{
	var keyword = document.getElementById('keyword').value;
	var sertype = document.getElementById('ser_type').value;
	if(keyword == '')
	{
		_error_msg_show('没有输入关键字:S');
		return false;
	}
	if(sertype == 1)
	location.href = hostpath+'index.php?action=hotel&Keyword='+escape(keyword);
	else if(sertype == 2)
	location.href = hostpath+'index.php?action=scenic&Keyword='+escape(keyword);
	else if(sertype == 3)
	location.href = hostpath+'index.php?action=travel&Keyword='+escape(keyword);
	else if(sertype == 4)
	location.href = hostpath+'index.php?action=seach&Keyword='+escape(keyword);	
	else
	location.href = hostpath+'index.php?action=seach&option=scenic&Keyword='+escape(keyword);	
}
function publish_article(){
	document.getElementById('submit').disabled=true;
	var username = document.getElementById('username').value;
	if (username == ''){
		_error_msg_show('用户名不能被系统识别:S');
		document.getElementById('submit').disabled=false;
		return false;
	}
	var password = document.getElementById('password').value;
	if (password == ''){
		_error_msg_show('密码系统不能识别通过:S');
		document.getElementById('submit').disabled=false;
		return false;
	}
	Userloginon(hostpath+'index.php?action=login&option=login','login','','getNews(\'showlogin\',\'index.php?action=login&option=indexlogin\')');
}

function fshowwindowsopen(windows){
	var showwindows=parent.document.getElementById(windows);
	//var showtable=parent.document.getElementById('showtable');
	//var showwindows=document.getElementById(windows);
	//var showtable=document.getElementById('showtable');
	//showtable.style.visibility='hidden';
	showwindows.style.filter='Alpha(Opacity=90, FinishOpacity=100)';
	showwindows.style.background='url('+hostpath+'image/default/bg.jpg)';
	showwindows.style.position='absolute';
	showwindows.style.left='0px';
	showwindows.style.top='0px';
	showwindows.style.width='100%';
	showwindows.style.height=parent.document.body.scrollHeight-1;
	showwindows.style.background='Background';
	showwindows.style.overflow='auto';
	showwindows.className='imgbg';
	showwindows.innerHTML += "<iframe style='position:absolute; visibility:inherit; top:0px; left:0px; width:100%; height:100%; z-index:-1;background-color: #C8DCF4;'></iframe>";
}
function fshowwindowsclos(windows){
	var showwindows=parent.document.getElementById(windows);
	//var showtable=parent.document.getElementById('showtable');
	//var showwindows=document.getElementById(windows);
	//var showtable=document.getElementById('showtable');
	//showtable.style.visibility='';
	showwindows.style.filter='';
	showwindows.style.background='';
	showwindows.style.position='';
	showwindows.style.left='';
	showwindows.style.top='';
	showwindows.style.width='0';
	showwindows.style.height='0';
	showwindows.style.background='';
	showwindows.style.overflow='';
	showwindows.className='';
	showwindows.innerHTML='';
}
function editTab()
{
	var code, sel, tmp, r
	var tabs=""
	event.returnValue = false
	sel =event.srcElement.document.selection.createRange()
	r = event.srcElement.createTextRange()
	switch (event.keyCode)
	{
		case (8)	:
		if (!(sel.getClientRects().length > 1))
		{
			event.returnValue = true
			return
		}
		code = sel.text
		tmp = sel.duplicate()
		tmp.moveToPoint(r.getBoundingClientRect().left, sel.getClientRects()[0].top)
		sel.setEndPoint("startToStart", tmp)
		sel.text = sel.text.replace(/^\t/gm, "")
		code = code.replace(/^\t/gm, "").replace(/\r\n/g, "\r")
		r.findText(code)
		r.select()
		break
		case (9)	:
		if (sel.getClientRects().length > 1)
		{
			code = sel.text
			tmp = sel.duplicate()
			tmp.moveToPoint(r.getBoundingClientRect().left, sel.getClientRects()[0].top)
			sel.setEndPoint("startToStart", tmp)
			sel.text = "\t"+sel.text.replace(/\r\n/g, "\r\t")
			code = code.replace(/\r\n/g, "\r\t")
			r.findText(code)
			r.select()
		}
		else
		{
			sel.text = "\t"
			sel.select()
		}
		break
		case (13)	:
		tmp = sel.duplicate()
		tmp.moveToPoint(r.getBoundingClientRect().left, sel.getClientRects()[0].top)
		tmp.setEndPoint("endToEnd", sel)

		for (var i=0; tmp.text.match(/^[\t]+/g) && i<tmp.text.match(/^[\t]+/g)[0].length; i++)	tabs += "\t"
		sel.text = "\r\n"+tabs
		sel.select()
		break
		default		:
		event.returnValue = true
		break
	}
}
ifcheck = true;
function CheckAll(form)
{
	for (var i=0;i<form.elements.length;i++)
	{
		var e = form.elements[i];
		e.checked = ifcheck;
	}
	ifcheck = ifcheck == true ? false : true;
}
function showtextcontent(namemsg)
{
	getTipDiv(event)
	var show = document.getElementById('showtage');
	show.innerHTML = "<div align=right><img src='"+hostpath+"image/msg/closed.gif' alt='关闭' onclick=\"taghide();\" style='cursor: hand;'></div><div id=showtagelist></div>";
	show.style.display = '';
	getNews('showtagelist',hostpath + namemsg);
}
function ftexttageshtml(tagtxt)
{
	if(document.getElementById("blog_tags").value == '')
	document.getElementById("blog_tags").value = tagtxt;
	else{
		if(document.getElementById("blog_tags").value.indexOf(tagtxt)<0)
		document.getElementById("blog_tags").value += ","+tagtxt;
	}
}
function taghide() {
	document.getElementById("showtage").style.display = 'none';
}
function getTipDiv(e) {
	divElement = document.getElementById("showtage");
	divElement.className = "ajaxdiv";
	divElement.style.cssText = "width:400px;";
	var offX = 4;
	var offY = 4;
	var width = 0;
	var height = 0;
	var scrollX = 0;
	var scrollY = 0;
	var x = 0;
	var y = 0;
	if (window.innerWidth) width = window.innerWidth - 18;
	else if (document.documentElement && document.documentElement.clientWidth)
	width = document.documentElement.clientWidth;
	else if (document.body && document.body.clientWidth)
	width = document.body.clientWidth;
	if (window.innerHeight) height = window.innerHeight - 18;
	else if (document.documentElement && document.documentElement.clientHeight)
	height = document.documentElement.clientHeight;
	else if (document.body && document.body.clientHeight)
	height = document.body.clientHeight;
	if (typeof window.pageXOffset == "number") scrollX = window.pageXOffset;
	else if (document.documentElement && document.documentElement.scrollLeft)
	scrollX = document.documentElement.scrollLeft;
	else if (document.body && document.body.scrollLeft)
	scrollX = document.body.scrollLeft;
	else if (window.scrollX) scrollX = window.scrollX;
	if (typeof window.pageYOffset == "number") scrollY = window.pageYOffset;
	else if (document.documentElement && document.documentElement.scrollTop)
	scrollY = document.documentElement.scrollTop;
	else if (document.body && document.body.scrollTop)
	scrollY = document.body.scrollTop;
	else if (window.scrollY) scrollY = window.scrollY;

	x=e.pageX?e.pageX:e.clientX+scrollX;
	y=e.pageY?e.pageY:e.clientY+scrollY;

	if(x+divElement.offsetWidth+offX>width+scrollX){
		x=x-divElement.offsetWidth-offX;
		if(x<0)x=0;
	}else x=x+offX;
	if(y+divElement.offsetHeight+offY>height+scrollY){
		y=y-divElement.offsetHeight-offY;
		if(y<scrollY)y=height+scrollY-divElement.offsetHeight;
	}else y=y+offY;

	divElement.style.left = x+"px";
	divElement.style.top = y+"px";
}

function maineditshow(namemsg,url,htmclose)
{
	var show = document.getElementById(namemsg);
	if(htmclose == 1)
	show.innerHTML = "<div align=right class=itemtag><img src='"+hostpath+"image/msg/closed.gif' alt='关闭' onclick=\"fshowwindowsclos('showwindow');\" style='cursor: hand;'></div><iframe width=100% height=100% onunload=\"this.height=100%;\" onload=\"iframeResize();\" frameborder=0 id=mainFrame name=mainFrame src='"+url+"'>您的浏览器不支持此功能，请您使用最新的版本。</iframe><div align=right class=itemtag><img src='"+hostpath+"image/msg/closed.gif' alt='关闭' onclick=\"fshowwindowsclos('showwindow');\" style='cursor: hand;'></div>";
	else if(htmclose != '')
	show.innerHTML = "<div align=right class=itemtag><img src='"+hostpath+"image/msg/closed.gif' alt='关闭' onclick=\""+htmclose+"fshowwindowsclos('showwindow');\" style='cursor: hand;'></div><iframe width=100% height=100% onunload=\"this.height=100%;\" onload=\"iframeResize();\" frameborder=0 id=mainFrame name=mainFrame src='"+url+"'>您的浏览器不支持此功能，请您使用最新的版本。</iframe><div align=right class=itemtag><img src='"+hostpath+"image/msg/closed.gif' alt='关闭' onclick=\""+htmclose+"fshowwindowsclos('showwindow');\" style='cursor: hand;'></div>";
	else
	show.innerHTML = "<iframe width=100% height=100% onunload=\"this.height=100%;\" onload=\"iframeResize();\" frameborder=0 id=mainFrame name=mainFrame src='"+url+"'>您的浏览器不支持此功能，请您使用最新的版本。</iframe>";
}

function iframeResize()
{
	var dyniframe   = null;
	var indexwin    = null;

	if (document.getElementById)
	{
		dyniframe       = document.getElementById("mainFrame");
		indexwin        = window;

		if (dyniframe)
		{
			if (dyniframe.contentDocument)
			{
				dyniframe.height = dyniframe.contentDocument.body.scrollHeight + 10;
			}
			else if (dyniframe.document && dyniframe.document.body.scrollHeight)
			{
				iframeheight	= mainFrame.document.body.scrollHeight + 10;
				windowheight = indexwin.document.body.scrollHeight - 128;
				dyniframe.height = (iframeheight < windowheight) ? windowheight : iframeheight;
			}
		}
	}
}
function onclickclass(classid) {
	var xxc = document.getElementById(classid);
	if(xxc.className == 'movclick')
	xxc.className = "onclick";
	else
	xxc.className = "movclick";
}
function fScreening(urltxt)
{
	var stycomclass = "";
	var stycomclasslist = "";
	var stycomclassmore = "";
	var styprovince = "";
	var stytown = "";
	var stytownship = "";
	var s = new dialog();s.init();
	s.set('src','3');s.set('title','系统提示');
	s.event('正在查找请耐心等待', ' ','',' ');
	if(document.getElementById('showcomclass'))
	stycomclass = document.getElementById('showcomclass').options[document.getElementById('showcomclass').options.selectedIndex].value;

	if(document.getElementById('showcomclasslist'))
	stycomclasslist = document.getElementById('showcomclasslist').options[document.getElementById('showcomclasslist').options.selectedIndex].value;

	if(document.getElementById('showcomclassmore'))
	stycomclassmore = document.getElementById('showcomclassmore').options[document.getElementById('showcomclassmore').options.selectedIndex].value;

	if(document.getElementById('showprovince'))
	styprovince = document.getElementById('showprovince').options[document.getElementById('showprovince').options.selectedIndex].value;

	if(document.getElementById('showtown'))
	stytown = document.getElementById('showtown').options[document.getElementById('showtown').options.selectedIndex].value;

	if(document.getElementById('township'))
	stytownship = document.getElementById('township').options[document.getElementById('township').options.selectedIndex].value;

	location.href = urltxt+'&Industry='+stycomclass+','+stycomclasslist+','+stycomclassmore+','+styprovince+','+stytown+','+stytownship;
}
function regedit_article(){
	$('submit').disabled=true;
	var regname = $('regname').value;
	if (regname == ''){
		$('regname').focus();
		$('submit').disabled=false;
		return false;
	}
	var userpwd = $('userpwd').value;
	var regpwdrepeat = $('regpwdrepeat').value;
	if (userpwd == '' || regpwdrepeat == '' || userpwd != regpwdrepeat){
		$('userpwd').focus();
		$('submit').disabled=false;
		return false;
	}
	var regemail = $('regemail').value;
	if (regemail == ''){
		$('regemail').focus();
		$('submit').disabled=false;
		return false;
	}
	var gdcode = $('gdcode').value;
	if (gdcode == ''){
		$('gdcode').focus();
		$('submit').disabled=false;
		return false;
	}
	//saveUserlogin(hostpath+'index.php?action=login&option=regediting','regedit','fshowwindows(\''+hostpath+'index.php?action=login&option=regedit\',1,\'注册会员\');','fshowwindows(\''+hostpath+'index.php?action=login&option=regeditcompany&type=edit\',1,\'补充公司信息\');');
	saveUserlogin(hostpath+'index.php?action=login&option=regediting','regedit','');
}
function rateHover(cid,allnum,allname)
{
	for(var i=1;i<=parseInt(allnum);i++)
	{
		if(i <= parseInt(cid))
		$(allname+i).className = "seldea";
		else
		$(allname+i).className = "";
	}
}
function rateOut(cid,allnum,allname)
{
	for(var i=1;i<=parseInt(allnum);i++)
	{
		if(i <= parseInt($(cid).value))
		$(allname+i).className = "seldea";
		else
		$(allname+i).className = "";
	}
}
function setRate(cid,allnum)
{
	$(allnum).value = cid;
}
function setCopy(_sTxt){
	if(navigator.userAgent.toLowerCase().indexOf('ie') > -1) {
		clipboardData.setData('Text',_sTxt);
		alert ("网址“"+_sTxt+"”\n已经复制到您的剪贴板中\n您可以使用Ctrl+V快捷键粘贴到需要的地方");
	} else {
		prompt("请复制网站地址:",_sTxt); 
	}
}
function addBookmark(site, url){
	if(navigator.userAgent.toLowerCase().indexOf('ie') > -1) {
		window.external.addFavorite(url,site)
	} else if (navigator.userAgent.toLowerCase().indexOf('opera') > -1) {
		alert ("请使用Ctrl+T将本页加入收藏夹");
	} else {
		alert ("请使用Ctrl+D将本页加入收藏夹");
	}
}