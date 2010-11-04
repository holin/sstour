var AppClass = Class.create();

AppClass.prototype = 
{
	id: String,
	title: String,
	url: String,
	type: String,
	src: String,

	component: Object,

	lang: 
	{
		edit: "编辑",
		refresh: "刷新",
		close: "关闭",
		refreshing: "正在读取……",
		edit_submit: "确定",
		edit_word1: " 显示 ",
		edit_word2: " 项 "
	},

	style:
	{
		body: "item",
		caption: "handle",
		content: "content",
		title: "title",
		edit: "op",
		refresh: "op",
		close: "op",
		escape_float: "escape_float",
		edits: "edits",
		blank: "opblank",
		button: "button"
	},
	
	action:
	{
		fetch_data: "data",
		close: "close",
		add: "add",
		edit: "edit",
		position: "position"
		
	},

	initialize: function(id, title, url, type, src)
	{
		this.id = id;
		this.title = title;
		this.url = url;
		this.type = type;
		this.src = src;
		this.component = new Component;

		this._build();
		this._bindEvents();
		this.refresh();
	},

	append: function(ele)
	{
		ele.appendChild(this.component.body);
	},

	_build: function()
	{
		this._makeBody();
		this._makeCaption();
		this._makeContent();
	},

	_makeBody: function()
	{
		// body
		this.component.body = document.createElement("li");
		this.component.body.className = this.style.body;
		this.component.body.id = this.id;
	},

	_makeCaption: function()
	{
		// caption
		this.component.caption = document.createElement("div");
		this.component.caption.className = this.style.caption;
		// title		
		this.component.title = document.createElement("div");
		this.component.title.appendChild(document.createTextNode(this.title));
		this.component.title.className = this.style.title;
		this.component.caption.appendChild(this.component.title);
		

		// edit
		// if isset this.type, display the edit. 
		// or hide it
		if (this.type)
		{
			this.component.edit = document.createElement("img");
			this.component.edit.src = 'image/msg/edit.gif';
			this.component.edit.alt = this.lang.edit;
			this.component.edit.style.width = '16';
			this.component.edit.style.height = '16';
			//this.component.edit.appendChild(document.createTextNode(this.lang.edit));
			this.component.edit.className = this.style.edit;		
			this.component.caption.appendChild(this.component.edit);
		}
		else
		{
			this.component.blank = document.createElement("div");
			this.component.blank.appendChild(document.createTextNode("　"));
			this.component.blank.className = this.style.blank;		
			this.component.caption.appendChild(this.component.blank);
		}
		// refresh 
		this.component.refresh = document.createElement("img");
		this.component.refresh.src = 'image/msg/update.gif';
		this.component.refresh.alt = this.lang.refresh;
		this.component.refresh.style.width = '16';
		this.component.refresh.style.height = '16';
		//this.component.refresh.appendChild(document.createTextNode(this.lang.refresh));
		this.component.refresh.className = this.style.refresh;		
		this.component.caption.appendChild(this.component.refresh);


		// close
		this.component.close = document.createElement("img");
		this.component.close.src = 'image/msg/closed.gif';
		this.component.close.alt = this.lang.close;
		this.component.close.style.width = '16';
		this.component.close.style.height = '16';
		//this.component.close.appendChild(document.createTextNode(this.lang.close));
		this.component.close.className = this.style.close;		
		this.component.caption.appendChild(this.component.close);



		// edits
		this.component.edits = document.createElement("div");
		this.component.edits.className = this.style.edits;
		this.component.edits.style.display = "none";
		this.component.edits.appendChild(document.createTextNode(this.lang.edit_word1));
		
		this.component.select = document.createElement("select");
		this.component.select.id = "edit_select";

		for (var n=1; n<=10; n++)
		{
			var option = document.createElement("option");
			option.text = n;
			option.value = n;
			this.component.select.options.add(option);
		}

		this.component.edits.appendChild(this.component.select);
		
		this.component.edits.appendChild(document.createTextNode(this.lang.edit_word2));

		this.component.edit_button = document.createElement("input");
		this.component.edit_button.className = this.style.button;
		this.component.edit_button.type = "button";
		this.component.edit_button.value = this.lang.edit_submit;
		this.component.edit_button.id = "edit_button";
		this.component.edits.appendChild(this.component.edit_button);

		this.component.caption.appendChild(this.component.edits);


		// append caption to body
		this.component.body.appendChild(this.component.caption);
	},

	_makeContent: function()
	{
		this.component.content = document.createElement("div");
		this.component.content.className = this.style.content;
		this.component.body.appendChild(this.component.content);		
	},

	_fetchData: function()
	{	
		var request = new Request(this.id, this.action.fetch_data, this.src, false);
		this._send(request);
	},

	_send: function(request)
	{
//		alert(request);
		new Ajax.Updater(this.component.content, this.url, {method: "get", parameters: request.toString(), evalScripts: true, onComplete: this.refresh_complete});
	},


	_bindEvents: function()
	{
		this.component.edit.onclick = this.edit.bindAsEventListener(this);
		this.component.refresh.onclick = this.refresh.bindAsEventListener(this);
		this.component.close.onclick = this.close.bindAsEventListener(this);
		this.component.edit_button.onclick = this.updateViewNum.bindAsEventListener(this);
		
	},



// events:
	updateViewNum: function()
	{
		var request = new Request(this.id, this.action.edit, this.src + '%26num=' + this.component.select.value);
		this._send(request);
		this.component.edits.style.display = 'none';
	},

	edit: function()
	{
		this.component.edits.style.display = (this.component.edits.style.display == "block") ? "none" : "block";
	},

	refresh: function()
	{
		this.component.content.innerHTML = this.lang.refreshing;
		this._fetchData();
	},

	close: function()
	{
		if (confirm("确定删除?"))
		{
			var request = new Request(this.id, this.action.close);
			this._send(request);
			this.component.body.style.display = "none";		
		}
	}
}



var Request = Class.create();
Request.prototype = {

	initialize: function(uwid, act, src, caching)
	{
		this.url = "uwid=" + uwid + "&act=" + act + "&param=" + src;
		if (caching == false)
		{
			this.url += "&random=" + Math.random();
		}
	},

	toString: function()
	{
		return this.url;
	}
}

var Component = Class.create();
Component.prototype = {
	body: Object,
	caption: Object,
	content: Object,
	edit: Object,
	refresh: Object,
	close: Object,
	thetitle: Object,
	edits: Object,
	edit_button: Object,
	edit_select: Object,

	initialize: function() {}
}

function showResponse(originalRequest)
{
	//put returned XML in the textarea
	alert(originalRequest.responseText);
}

function UrlEncode(str)
{
	var i,c,p,q,ret="",strSpecial="!\"#$%&'()*+,/:;<=>?@[\]^`{|}~%";
	for(i=0;i<str.length;i++){
		if(str.charCodeAt(i)>=0x4e00){
			var p=strGB.indexOf(str.charAt(i));
			if(p>=0){
				q=p%94;
				p=(p-q)/94;
				ret+=("%"+(0xB0+p).toString(16)+"%"+(0xA1+q).toString(16)).toUpperCase();
			}
		}
		else{
			c=str.charAt(i);
			if(c==" ")
				ret+="+";
			else if(strSpecial.indexOf(c)!=-1)
				ret+="%"+str.charCodeAt(i).toString(16);
			else
				ret+=c;
		}
	}
	return ret;
}