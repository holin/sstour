<?php /* Smarty version 2.6.10, created on 2010-09-11 14:00:21
         compiled from setmain.htm */ ?>
<form name="formupdate" method="post" action="">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="2" class=head> �� �� ҳ �� �� �� ��</td>
    </tr>
	<tr>
      <td class=b>����ҳ����:<BR />
������ɫ������������ҳ��ʾ</td>
      <td class=b><input type="text" size="30" name="config[title]" value="<?php echo $this->_tpl_vars['title']; ?>
"></td>
    </tr>
    <tr>
      <td class=b>������ɫ:<BR />
������ɫ������������ҳ��ʾ</td>
      <td class=b><input type="text" size="30" name="config[bgcolor]" value="<?php echo $this->_tpl_vars['bgcolor']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>����ͼƬ:<BR />
����ͼƬ������������ҳ��ʾ</td>
      <td class=b><input type="text" size="30" name="config[bgimage]" value="<?php echo $this->_tpl_vars['bgimage']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>����͸����:<BR />
����͸���ȣ�����ҳ��������ҳ��͸����</td>
      <td class=b><input onkeyup="value=value.replace(/[^\d]/g,'')  " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" name="config[transparent]" value="<?php echo $this->_tpl_vars['transparent']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>���Ŵ���:<BR />
���Ŵ���,ʹ�ò��Ŵ����������ҳ���ֵ���Ϣ<br />
(ʹ�÷�Ƕ��ģʽʱ�ⲿ����Ϊ<font color=red>&lt;a href='javascript:document.getElementById('setmain').innerHTML='';document.getElementById('setmain').style.width='0';document.getElementById('setmain').style.height='0';'&gt;������ҳ&lt;/a&gt;</font>)</td>
      <td class=b><textarea name="config[info]" cols="40" rows="5"><?php echo $this->_tpl_vars['info']; ?>
</textarea></td>
    </tr>
	<tr>
      <td class=b>Ƕ�׷�ʽ:<BR />
Ƕ�׷�ʽ,ѡ����Ƕ������ҳ�������¿�ҳ����ʾ����ҳ</td>
      <td class=b>
<?php if ($this->_tpl_vars['nesting'] == '1'): ?>
	<input type="radio" name="config[nesting]" value="1" checked="checked" />��
	<input type="radio" name="config[nesting]" value="0" />��
<?php else: ?>
	<input type="radio" name="config[nesting]" value="1" />��
	<input type="radio" name="config[nesting]" value="0" checked="checked" />��
<?php endif; ?>
	  
	  </td>
    </tr>
  </table>
  <br>
  <center><input type=hidden name=update value='update'> &nbsp; 
    <input type="button" name="Submit" id=Submit value=" �� �� " onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\');')">
  </center>
</form>