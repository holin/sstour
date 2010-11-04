//phprpc_client.create('rpc');

var cityvf = new Array(); // 用于缓存已加载的城市数据
var citytf = new Array(); // 用于缓存已加载的城市数据

var classvf = new Array(); // 用于缓存已加载的城市数据
var classtf = new Array(); // 用于缓存已加载的城市数据

var columnsvf = new Array(); // 用于缓存已加载的城市数据
var columnstf = new Array(); // 用于缓存已加载的城市数据

var gameclassvf = new Array(); // 用于缓存已加载的城市数据
var gameclasstf = new Array(); // 用于缓存已加载的城市数据

/*
* 清除 select 中的选项，该方法可复用
*
* so: 要清除选项的 select 对象
*
*/
function clear_select(so) {
	var soo = document.getElementById(so);
	for (var i = soo.options.length - 1; i > -1; i--) {
		// 有些浏览器不支持 options 属性的 remove 方法，
		// 但支持 DOM 的 removeChild 方法（比如：Konqueror）
		if (soo.options.remove) {
			soo.options.remove(i);
		}
		else {
			soo.removeChild(soo.options[i]);
		}
	}
}

/*
* 设置 select 中的选项，该方法可复用
*
* so: 要设置选项的 select 对象
*  d: 选项数据数组
* vf: 选项值所对应的数组中的字段名
* tf: 选项文本所对应的数组中的字段名
*/
function set_select(so, d, vf) {
	var soo = document.getElementById(so);
	var n = cityvf.length;
	for (var i = 0, j=0; i < n; i++) {
		var opt = document.createElement('option');		
		if(citytf[i] == d || i == 0)
		{
			if(i==0)
			{
				opt.text = '请选择';
				opt.value = '';
			}else{
				opt.text = cityvf[i];
				opt.value = i;
			}
			// 有些浏览器不支持 options 属性的 add 方法，
			// 但支持 DOM 的 appendChild 方法（比如：Konqueror）
			if (soo.options.add) {
				soo.options.add(opt);
			}
			else {
				soo.appendChild(opt);
			}
			if(i == vf)
			soo.selectedIndex = j;
			j++;	
		}
	}
}
function set_select_class(so, d, vf) {
	var soo = document.getElementById(so);
	var n = classvf.length;
	for (var i = 0,j=0; i < n; i++) {
		var opt = document.createElement('option');
		if(classtf[i] == d || i == 0)
		{
			if(i==0)
			{
				opt.text = '请选择';
				opt.value = '';
			}else{
				opt.text = classvf[i];
				opt.value = i;
			}
			// 有些浏览器不支持 options 属性的 add 方法，
			// 但支持 DOM 的 appendChild 方法（比如：Konqueror）
			if (soo.options.add) {
				soo.options.add(opt);
			}
			else {
				soo.appendChild(opt);
			}			
			if(i == vf)
			soo.selectedIndex = j;
			j++;
		}
	}
}
function set_select_columns(so, d, vf) {
	var soo = document.getElementById(so);
	var n = columnsvf.length;
	for (var i = 0,j=0; i < n; i++) {
		var opt = document.createElement('option');
		if(columnstf[i] == d || i == 0)
		{
			if(i==0)
			{
				opt.text = '请选择';
				opt.value = '';
			}else{
				opt.text = columnsvf[i];
				opt.value = i;
			}
			// 有些浏览器不支持 options 属性的 add 方法，
			// 但支持 DOM 的 appendChild 方法（比如：Konqueror）
			if (soo.options.add) {
				soo.options.add(opt);
			}
			else {
				soo.appendChild(opt);
			}			
			if(i == vf)
			soo.selectedIndex = j;
			j++;
		}
	}
}
function set_select_gameclass(so, d, vf) {
	var soo = document.getElementById(so);
	var n = gameclassvf.length;
	for (var i = 0,j=0; i < n; i++) {
		var opt = document.createElement('option');
		if(gameclasstf[i] == d || i == 0)
		{
			if(i==0)
			{
				opt.text = '请选择';
				opt.value = '';
			}else{
				opt.text = gameclassvf[i];
				opt.value = i;
			}
			// 有些浏览器不支持 options 属性的 add 方法，
			// 但支持 DOM 的 appendChild 方法（比如：Konqueror）
			if (soo.options.add) {
				soo.options.add(opt);
			}
			else {
				soo.appendChild(opt);
			}			
			if(i == vf)
			soo.selectedIndex = j;
			j++;
		}
	}
}
// 设置城市的下拉菜单
function set_city_select(so,d,vf) {
	//var so = document.getElementById('city');
	// 清空原有选项
	clear_select(so);
	// 设置新选项
	set_select(so, d, vf);
}
function set_class_select(so,d,vf) {
	//var so = document.getElementById('city');
	// 清空原有选项
	clear_select(so);
	// 设置新选项
	set_select_class(so, d, vf);
}
function set_columns_select(so,d,vf) {
	//var so = document.getElementById('city');
	// 清空原有选项
	clear_select(so);
	// 设置新选项
	set_select_columns(so, d, vf);
}
function set_gameclass_select(so,d,vf) {
	//var so = document.getElementById('city');
	// 清空原有选项
	clear_select(so);
	// 设置新选项
	set_select_gameclass(so, d, vf);
}