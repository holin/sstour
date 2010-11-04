//phprpc_client.create('rpc');

var cityvf = new Array(); // ���ڻ����Ѽ��صĳ�������
var citytf = new Array(); // ���ڻ����Ѽ��صĳ�������

var classvf = new Array(); // ���ڻ����Ѽ��صĳ�������
var classtf = new Array(); // ���ڻ����Ѽ��صĳ�������

var columnsvf = new Array(); // ���ڻ����Ѽ��صĳ�������
var columnstf = new Array(); // ���ڻ����Ѽ��صĳ�������

var gameclassvf = new Array(); // ���ڻ����Ѽ��صĳ�������
var gameclasstf = new Array(); // ���ڻ����Ѽ��صĳ�������

/*
* ��� select �е�ѡ��÷����ɸ���
*
* so: Ҫ���ѡ��� select ����
*
*/
function clear_select(so) {
	var soo = document.getElementById(so);
	for (var i = soo.options.length - 1; i > -1; i--) {
		// ��Щ�������֧�� options ���Ե� remove ������
		// ��֧�� DOM �� removeChild ���������磺Konqueror��
		if (soo.options.remove) {
			soo.options.remove(i);
		}
		else {
			soo.removeChild(soo.options[i]);
		}
	}
}

/*
* ���� select �е�ѡ��÷����ɸ���
*
* so: Ҫ����ѡ��� select ����
*  d: ѡ����������
* vf: ѡ��ֵ����Ӧ�������е��ֶ���
* tf: ѡ���ı�����Ӧ�������е��ֶ���
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
				opt.text = '��ѡ��';
				opt.value = '';
			}else{
				opt.text = cityvf[i];
				opt.value = i;
			}
			// ��Щ�������֧�� options ���Ե� add ������
			// ��֧�� DOM �� appendChild ���������磺Konqueror��
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
				opt.text = '��ѡ��';
				opt.value = '';
			}else{
				opt.text = classvf[i];
				opt.value = i;
			}
			// ��Щ�������֧�� options ���Ե� add ������
			// ��֧�� DOM �� appendChild ���������磺Konqueror��
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
				opt.text = '��ѡ��';
				opt.value = '';
			}else{
				opt.text = columnsvf[i];
				opt.value = i;
			}
			// ��Щ�������֧�� options ���Ե� add ������
			// ��֧�� DOM �� appendChild ���������磺Konqueror��
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
				opt.text = '��ѡ��';
				opt.value = '';
			}else{
				opt.text = gameclassvf[i];
				opt.value = i;
			}
			// ��Щ�������֧�� options ���Ե� add ������
			// ��֧�� DOM �� appendChild ���������磺Konqueror��
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
// ���ó��е������˵�
function set_city_select(so,d,vf) {
	//var so = document.getElementById('city');
	// ���ԭ��ѡ��
	clear_select(so);
	// ������ѡ��
	set_select(so, d, vf);
}
function set_class_select(so,d,vf) {
	//var so = document.getElementById('city');
	// ���ԭ��ѡ��
	clear_select(so);
	// ������ѡ��
	set_select_class(so, d, vf);
}
function set_columns_select(so,d,vf) {
	//var so = document.getElementById('city');
	// ���ԭ��ѡ��
	clear_select(so);
	// ������ѡ��
	set_select_columns(so, d, vf);
}
function set_gameclass_select(so,d,vf) {
	//var so = document.getElementById('city');
	// ���ԭ��ѡ��
	clear_select(so);
	// ������ѡ��
	set_select_gameclass(so, d, vf);
}