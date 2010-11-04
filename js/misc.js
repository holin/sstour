function spic(cc) {
		document.getElementById('ssidepic').src = 'http://quote2.cnfol.com/ggqj/stockzs' + cc + '.png';
	
}

function changetdcolor(ele, ocolor, tocolor)
{
	alert(ele.getAttribute('bgcolor'));
	if (ele.getAttribute('bgcolor') == ocolor)
	{
		ele.setAttribute('bgcolor', tocolor, 0)
	}
	else if(ele.getAttribute('bgcolor') == tocolor)
	{
		ele.setAttribute('bgcolor', ocolor, 0)
	}
}
