<?php /* Smarty version 2.6.10, created on 2009-12-12 22:47:22
         compiled from weather.htm */ ?>
<html>
<head>
<title>����Ԥ��</title>
<META http-equiv=Content-Type content="text/html; charset=<?php echo $this->_tpl_vars['charset']; ?>
">
<script>var hostpath = '<?php echo $this->_tpl_vars['boardurl']; ?>
';</script>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/ajax.js'></SCRIPT>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/js.js'></SCRIPT>
<script>
function fweather()
{
	_confirm_msg_show('�����ύ�����Ժ�...', ' ');
	//return false
}
</script>
<style>
body {color:#FFFFFF;}
.font9pt {
	font-family: "����";
	font-size: 9pt;
}
a:link {
	color: #000033;
	text-decoration: none;
}
a:hover {
	color: #FF6600;
	text-decoration: underline;
}
a:visited {
	color: #FF6600;
	text-decoration: underline;
}
</style>
</head>
<body topmargin="0" leftmargin="0">
<?php if ($this->_tpl_vars['option'] == 'weather'): ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="font9pt">
  <tr>
    <td style="font-size:14px;line-height:180%;padding:5px;color:#000099;font-weight:bold;"><?php echo $this->_tpl_vars['text']; ?>
</td>
  </tr>
</table>
<?php else: ?>
<table border="1">
  <form name="form1" onSubmit="fweather()" method="post" action="" target="weatheriframe">
    <tr>
      <td colspan="2">����Ԥ���޸ģ�֧��html��</td>
    </tr>
    <tr>
      <td>�û���</td>
      <td><input type="text" style="width:240px;" name="username"></td>
    </tr>
    <tr>
      <td>���룺</td>
      <td><input type="password" style="width:240px;" name="password"></td>
    </tr>
    <tr>
      <td>���ݣ�</td>
      <td><textarea name="info" style="width:240px;height:120px;"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="hidden" name="update" value="update" />
        <input type="submit" name="Submit" value="�ύ"></td>
    </tr>
  </form>
</table>
<iframe src="" frameborder="0" height="0" width="0" marginheight="0" marginwidth="0" scrolling="no" name="weatheriframe" id="weatheriframe"></iframe>
<?php endif; ?>
</body>
</html>