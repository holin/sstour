<?php /* Smarty version 2.6.10, created on 2010-09-11 14:00:22
         compiled from basic.htm */ ?>
<form name="formupdate" method="post" action="">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="2" class=head> �� �� �� �� �� ��</td>
    </tr>
	<tr>
      <td class=b>�ر���վ:<BR />
�ر���վ����վ�������޸�ʱ�����ȹر���վ</td>
	  <td class=b>
<?php if ($this->_tpl_vars['webclose'] == '1'): ?>
<input type="radio" name="config[webclose]" value="1" checked="checked" />����
<input type="radio" name="config[webclose]" value="0" />�ر�
<?php else: ?>
<input type="radio" name="config[webclose]" value="1" />����
<input type="radio" name="config[webclose]" value="0" checked="checked" />�ر�
<?php endif; ?>
      </td>
	</tr>
    <tr>
      <td class=b>��վ����:<BR />
��վ���ƣ�����ʾ�ڵ������ͱ�����</td>
      <td class=b><input type="text" size="30" name="config[webname]" value="<?php echo $this->_tpl_vars['webname']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>��վ����:<BR />
��վ���⣬����ʾ��ҳ��ײ�����ϵ��ʽ��</td>
      <td class=b><input type="text" size="30" name="config[title]" value="<?php echo $this->_tpl_vars['title']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>��վ������Ϣ����:<BR />
ҳ��ײ�������ʾ ICP ������Ϣ�������վ�ѱ������ڴ�����������Ȩ�룬������ʾ��ҳ��ײ������û��������</td>
      <td class=b><input type="text" size="30" name="config[icp]" value="<?php echo $this->_tpl_vars['icp']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>����ҳ:<BR />
���������վ��ʱ�Ƚ�������ҳ</td>
      <td class=b>
<?php if ($this->_tpl_vars['main'] == '1'): ?>
	<input type="radio" name="config[main]" value="1" checked="checked" />��
	<input type="radio" name="config[main]" value="0" />��
<?php else: ?>
	<input type="radio" name="config[main]" value="1" />��
	<input type="radio" name="config[main]" value="0" checked="checked" />��
<?php endif; ?>	  
	  </td>
    </tr>
	<tr>
      <td class=b>�ؼ���:<BR />
�ؼ��֣�����������������¼</td>
      <td class=b><input type="text" size="30" name="config[keywords]" value="<?php echo $this->_tpl_vars['keywords']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>��վ����:<BR />
��վ����������������������¼</td>
      <td class=b><input type="text" size="30" name="config[description]" value="<?php echo $this->_tpl_vars['description']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>��ҵ����:</td>
      <td class=b><input type="text" size="30" name="config[mail]" value="<?php echo $this->_tpl_vars['mail']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>ʱ���:<BR />
ʱ���,����ʱ�����������ʱ���(���ּ���)</td>
      <td class=b><input type="text" size="30" name="config[time]" value="<?php echo $this->_tpl_vars['time']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>�ļ��ϴ�·��:<BR />
ʱ���,����ʱ�����������ʱ���(���ּ���)</td>
      <td class=b><input type="text" size="30" name="config[attach]" value="<?php echo $this->_tpl_vars['attach']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>�ļ��ϴ���С:<BR />
��B����1M=1024KB=1024KB*1024B</td>
      <td class=b><input type="text" size="30" name="config[size]" value="<?php echo $this->_tpl_vars['size']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>��̳���:<BR />
��̳���,�����̳���û�ϵͳ�Զ�������̳����Ŀǰֻ���DZ��̳</td>
      <td class=b>
<?php if ($this->_tpl_vars['bbs'] == '1'): ?>
	<input type="radio" name="config[bbs]" value="1" checked="checked" />��
	<input type="radio" name="config[bbs]" value="0" />��
<?php else: ?>
	<input type="radio" name="config[bbs]" value="1" />��
	<input type="radio" name="config[bbs]" value="0" checked="checked" />��
<?php endif; ?></td>
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