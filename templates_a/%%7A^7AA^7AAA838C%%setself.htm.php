<?php /* Smarty version 2.6.10, created on 2010-09-11 14:00:09
         compiled from setself.htm */ ?>
<form name="formupdate" method="post" action="">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="2" class=head> �� ȫ �� �� �� ��</td>
    </tr>
    <tr>
      <td class=b>������ʾ:<BR />
������ʾ����ʾ���󷽱�����޸ĵ�Ҳ�����©���úڿ��л��ɳ�</td>
      <td class=b>
<?php if ($this->_tpl_vars['error'] == '1'): ?>
	<input type="radio" name="config[error]" value="1" checked="checked" />��
	<input type="radio" name="config[error]" value="0" />��
<?php else: ?>
	<input type="radio" name="config[error]" value="1" />��
	<input type="radio" name="config[error]" value="0" checked="checked" />��
<?php endif; ?>
	  </td>
    </tr>
	<tr>
      <td class=b>COOKIE��Ч����:<BR />
COOKIE��Ч������������ܻ�����ʹ�� http��//ioime.com����������̳��ʱ����������Ϊ .ioime.com ������<BR />
ע������������Ĵ������ã����򽫿��ܵ����޷���¼��̳���쳣����</td>
      <td class=b><input type="text" size="30" name="config[cookiedomain]" value="<?php echo $this->_tpl_vars['cookiedomain']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>COOKIE��ЧĿ¼:<BR />
COOKIE��ЧĿ¼��ʹһ���ռ���ö����վ,���ܷ���! �����������վ��webĿ¼�¿�������Ϊ/web/ ��Ϊ /��<BR />
ע������������Ĵ������ã����򽫿��ܵ����޷���¼��վ���쳣����</td>
      <td class=b><input type="text" size="30" name="config[cookiepath]" value="<?php echo $this->_tpl_vars['cookiepath']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>SESSION:<BR />
SESSION��COOKIE����ʱ����SESSION����¼�û���Ϣ</td>
      <td class=b>
<?php if ($this->_tpl_vars['session'] == '1'): ?>
	<input type="radio" name="config[session]" value="1" checked="checked" />��
	<input type="radio" name="config[session]" value="0" />��
<?php else: ?>
	<input type="radio" name="config[session]" value="1" />��
	<input type="radio" name="config[session]" value="0" checked="checked" />��
<?php endif; ?>
	  </td>
    </tr>
	<tr>
      <td class=b>SESSION��ЧĿ¼:<BR />
SESSION��ЧĿ¼��ʹһ���ռ���ö����վ,���ܷ���! </td>
      <td class=b><input type="text" size="30" name="config[sessionpath]" value="<?php echo $this->_tpl_vars['sessionpath']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>����ʱ��:<BR />
����ʱ�䣬COOKIE���ʱ�䣬��ˢ���������(�������)</td>
      <td class=b><input type="text" size="30" onkeyup="value=value.replace(/[^\d]/g,'')  " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" name="config[online]" value="<?php echo $this->_tpl_vars['online']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>��ֹCC����:<BR />
��ֹCC������������������������ɵľܾ����񹥻�</td>
      <td class=b>
<?php if ($this->_tpl_vars['self'] == '1'): ?>
	<input type="radio" name="config[self]" value="1" checked="checked" />��
	<input type="radio" name="config[self]" value="0" />��
<?php else: ?>
	<input type="radio" name="config[self]" value="1" />��
	<input type="radio" name="config[self]" value="0" checked="checked" />��
<?php endif; ?>
	  </td>
    </tr>
	<tr>
      <td class=b>����վ���ύ:<BR />
����վ���ύ���򿪸���Ŀ�п�������û���Ϊ����ǽ��Ե�ʲ��ܵ�½���߲�ѯ����</td>
      <td class=b>
<?php if ($this->_tpl_vars['getpost'] == '1'): ?>
	<input type="radio" name="config[getpost]" value="1" checked="checked" />��
	<input type="radio" name="config[getpost]" value="0" />��
<?php else: ?>
	<input type="radio" name="config[getpost]" value="1" />��
	<input type="radio" name="config[getpost]" value="0" checked="checked" />��
<?php endif; ?>
	  </td>
    </tr>
	<tr>
      <td class=b>�����ύ�Ƿ�����:<BR />
�����ύ�Ƿ����ݣ��򿪸���Ŀ�������û��ύ�����������а�����html��script���ԣ��п�������û��ύ��html�ı�����������ʾ</td>
      <td class=b>
<?php if ($this->_tpl_vars['html'] == '1'): ?>
	<input type="radio" name="config[html]" value="1" checked="checked" />��
	<input type="radio" name="config[html]" value="0" />��
<?php else: ?>
	<input type="radio" name="config[html]" value="1" />��
	<input type="radio" name="config[html]" value="0" checked="checked" />��
<?php endif; ?>
	  </td>
    </tr>
	<tr>
      <td class=b>��ȫ����:<BR />
��ȫ���룬�벻Ҫ������</td>
      <td class=b><input type="text" size="30" name="config[HTMLcode]" value="<?php echo $this->_tpl_vars['HTMLcode']; ?>
"></td>
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