<!--
var IE=false,FF=false,W=window,D=document,H,B,GET="getElementsByTagName",GEI="getElementById",qq=0;

function fold(){
	var e;
	e=fixE(e);
	if(e)element=fixElement(e);
	element=element.parentNode.parentNode;
	element.className=element.className.indexOf("hide")>0?"module":"module hide";
}

var Drag={
	draging : false,
	x : 0,
	y : 0,
	element : null,
	fDiv : null,
	ghost : null,
	addEvent : function(){var a=D[GET]("li");for(var i=a.length-1;i>-1;i--)if(a[i].className=="module")a[i].onmousedown=Drag.dragStart;},
	ix:2,iy:7,
	ox:6,oy:7,
	fx:6,fy:6,

	dragStart : function (e){
		if(Drag.draging)return;
		var e;
		e=fixE(e);
		if(e)element=fixElement(e);

		/*********
		var k,s="";
		for(k in element)s+=k+" : "+element[k]+"<br/>";
		D.getElementById("bbb").innerHTML=s;
		**********/
		//D.getElementById("aaa").innerHTML=element.parentNode.offsetTop+ ","+element.parentNode.offsetHeight;
		//测试

		if(element.className!="title")return;
		element=element.parentNode;
		Drag.element=element;
		//以上获得当前移动的模块

		Drag.x=e.layerX?e.layerX+Drag.fx:(IE?e.x+Drag.ix:e.offsetX+Drag.ox);
		Drag.y=e.layerY?e.layerY+Drag.fy:(IE?e.y+Drag.iy:e.offsetY+Drag.oy);
		//鼠标相对于模块的位置

		Drop.measure();
		if(e.layerX){Drag.floatIt(e);Drag.drag(e);}//fix FF
		B.style.cursor="move";
		D.onmousemove=Drag.drag;
		D.ondragstart=function(){window.event.returnValue = false;}
		D.onselectstart=function(){window.event.returnValue = false;};
		D.onselect=function(){return false};
		D.onmouseup=element.onmouseup=Drag.dragEnd;
		element.onmousedown=null;
	},
	drag : function (e){
		var e;
		e=fixE(e);
		if(!Drag.fDiv)Drag.floatIt(e);//for IE & Opera
		var x=e.clientX,y=e.clientY;
		Drag.fDiv.style.top=y+H.scrollTop-Drag.y+"px";
		Drag.fDiv.style.left=x+H.scrollLeft-Drag.x+"px";
		Drop.drop(x,y);
		//statu(e);
	},
	dragEnd : function (e){
		B.style.cursor="";
		D.ondragstart=D.onmousemove=D.onselectstart=D.onselect=D.onmouseup=null;
		Drag.element.onmousedown=Drag.dragStart;
		if(!Drag.draging)return;
		Drag.ghost.parentNode.insertBefore(Drag.element,Drag.ghost);
		Drag.ghost.parentNode.removeChild(Drag.ghost);
		B.removeChild(Drag.fDiv);
		Drag.fDiv=null;
		Drag.draging=false;
		Drop.init(D[GEI]("container"));
	},
	floatIt : function(e){
		var e,element=Drag.element;
		var ghost=D.createElement("LI");
		Drag.ghost=ghost;
		ghost.className="module ghost";
		ghost.style.height=element.offsetHeight-2+"px";
		element.parentNode.insertBefore(ghost,element);
		//创建模块占位框

		var fDiv=D.createElement("UL");
		Drag.fDiv=fDiv;
		fDiv.className="float";
		B.appendChild(fDiv);
		fDiv.style.width=ghost.parentNode.offsetWidth+"px";
		fDiv.appendChild(element);
		//创建容纳模块的浮动层

		Drag.draging=true;
	}
}

var Drop={
	root : null,
	index : null,
	column : null,
	init : function(it){
		if(!it)return;
		Drop.root=it;

		it.firstItem=it.lastItem=null;
		var a=it[GET]("ul");
		for(var i=0;i<a.length;i++){
			if(a[i].className!="column")continue;
			if(it.firstItem==null){
				it.firstItem=a[i];
				a[i].previousItem=null;
			}else{
				a[i].previousItem=a[i-1];
				a[i-1].nextItem=a[i];
			}
			a[i].nextItem=null;
			it.lastItem=a[i];
			a[i].index=i;

			a[i].firstItem=a[i].lastItem=null;
			var b=a[i][GET]("li");
			for(var j=0;j<b.length;j++){
				if(b[j].className.indexOf("module")==-1)continue;
				if(a[i].firstItem==null){
					a[i].firstItem=b[j];
					b[j].previousItem=null;
				}else{
					b[j].previousItem=b[j-1];
					b[j-1].nextItem=b[j];
				}
				b[j].nextItem=null;
				a[i].lastItem=b[j];
				b[j].index=i+","+j;
			}
		}
	},
	measure : function(){
		if(!Drop.root)return;
		var currentColumn=Drop.root.firstItem;
		while(currentColumn){
			var currentModule=currentColumn.firstItem;
			while(currentModule){
				currentModule.minY=currentModule.offsetTop;
				currentModule.maxY=currentModule.minY+currentModule.offsetHeight;
				currentModule=currentModule.nextItem;
			}
			currentColumn.minX=currentColumn.offsetLeft;
			currentColumn.maxX=currentColumn.minX+currentColumn.offsetWidth;
			currentColumn=currentColumn.nextItem;
		}
		Drop.index=Drag.element.index;
	},
	drop : function(x,y){
		if(!Drop.root)return;
		var x,y,currentColumn=Drop.root.firstItem;
		while(x>currentColumn.maxX)if(currentColumn.nextItem)currentColumn=currentColumn.nextItem;else break;
		var currentModule=currentColumn.lastItem;
		if(currentModule)while(y<currentModule.maxY){
			if(y>currentModule.minY-12){
				if(Drop.index==currentModule.index)return;
				Drop.index=currentModule.index;
				if(currentModule.index==Drag.element.index){if(currentModule.nextItem)currentModule=currentModule.nextItem;else break;}
				currentColumn.insertBefore(Drag.ghost,currentModule);
				Drop.column=null;
				window.status=qq++;
				return;
			}else if(currentModule.previousItem)currentModule=currentModule.previousItem;else return;
		}
		if(Drop.column==currentColumn.index)return;
		currentColumn.appendChild(Drag.ghost);
		Drop.index=0;
		Drop.column=currentColumn.index;
		window.status=qq++;
	}
}

var webNote={
	obj : null,
	canEdit : function(e){
		var e,element;
		e=fixE(e);
		element=fixElement(e);
		if(element.className!='webNote')return;
		if(typeof element.contentEditable!="undefined"){
			element.contentEditable=true;
			element.style.borderColor='red';
			element.focus();
			webNote.obj=element;
		}
	},
	cannotEdit : function(){
		if(!webNote.obj)return;
		if(typeof webNote.obj.contentEditable!="undefined"){
			webNote.obj.style.borderColor='#ffffe0';
			webNote.obj.contentEditable=false;
			webNote.obj=null;
		}
	}
}

function fixE(e){var e;e=e?e:(window.event?window.event:null);return e}

function fixElement(e){var e;return e.target?(e.target.nodeType==3?e.target.parentNode:e.target):e.srcElement;}


onload=function(){
	B=D[GET]("body")[0];
	H=D[GET]("html")[0];
	Drop.init(D[GEI]("container"));
	Drag.addEvent();
}

function statu(e){
	var e,element;
	element=fixElement(e);
	//document.getElementById('container').innerHTML += '<div id=xwindowbody></div>';
	//var aa=D.getElementById("aaa");
	//var text = document.getElementById('container').innerHTML.replace(/</gi,'&lt;');
	//aa.innerHTML = text.replace(/>/gi,'&gt;');
	//aa.innerHTML="e.xy:("+e.x+","+e.y+")<br/>e.offsetXY:("+e.offsetX+","+e.offsetY+")<br/>e.clientXY:("+e.clientX+","+e.clientY+")<br/>element.offsetLeftTop:("+element.offsetLeft+","+element.offsetTop+")<br/>e.layerXY:("+e.layerX+","+e.layerY+")";
}
//-->
var columntxtvalue = '';
var xwindowtxtvalue = '';
function fcookiedivshow()
{
	document.getElementById('hiddencontainer').value = document.getElementById('container').innerHTML;
	document.getElementById('hiddenxwindow').value = document.getElementById('showtable').innerHTML;
	//writecookie('column',escape(document.getElementById('container').innerHTML));
	//writecookie('xwindow',escape(document.getElementById('xwindowbody').innerHTML));
	//writecookie('column',readcookie('PHPSESSID'));
	fshowwindowsopen('showwindow');
	saveUserlogin(hostpath+'index.php?action=cookie','fcookiedivmove','','window.location.reload();');	
}
function fcookiedivdefault()
{
	//writecookie('column','');
	fshowwindowsopen('showwindow');
	saveUserlogin(hostpath+'index.php?action=cookie&option=removal','fcookiedivmove','','window.location.reload();');
	//window.location.reload();
}
function fcookiedivmove()
{
	//var columntxt = readcookie('column');
	if(columntxtvalue)
	document.getElementById('container').innerHTML = columntxtvalue;
	if(xwindowtxtvalue)
	document.getElementById('showtable').innerHTML = xwindowtxtvalue;
	//else
	//writecookie('column','');
}
function readcookie(cname)
{
	var dc=document.cookie;
	dc=unescape(dc);
	dcarr=dc.split(";");
	requestcookie="";
	for(ci=0;ci<dcarr.length;ci++)
	{
		dcarrs=dcarr[ci].split("=");
		if(dcarrs[0]==cname)
		return dcarrs[1];
	}
	if(requestcookie==""){return false}
}
function writecookie(cookiename,cookievalue)
{
	var newcookie=cookiename+"="+escape(cookievalue);
	document.cookie=newcookie;
}
