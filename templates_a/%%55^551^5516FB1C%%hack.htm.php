<?php /* Smarty version 2.6.10, created on 2010-11-04 21:45:58
         compiled from hack.htm */ ?>
<form name="formupdate" method="post" action="">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="7" class=head> �� �� �� �� �� ��</td>
    </tr>
	<tr>
      <td class=b>���</td>
	  <td class=b>��ʶ</td>
      <td class=b>���濪��</td>
      <td class=b>����ʱ��</td>
      <td class=b>��̬��</td>
	  <td class=b>��ʾ����</td>
	  <td class=b>�༭</td>
	</tr>
<?php $_from = $this->_tpl_vars['sql_config']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['config']):
?>
	<tr>
      <td class=b>
	  <input type="text" size="10" name="hack_subject[<?php echo $this->_tpl_vars['config']['hack_action']; ?>
]" value="<?php echo $this->_tpl_vars['config']['hack_subject']; ?>
">
	  </td>
	  <td class=b>
	  <input type="text" size="10" name="hack_action[<?php echo $this->_tpl_vars['config']['hack_action']; ?>
]" value="<?php echo $this->_tpl_vars['config']['hack_action']; ?>
">
	  </td>
      <td class=b>
<?php if ($this->_tpl_vars['config']['hack_cache'] == '1'): ?>
	<select name="hack_cache[<?php echo $this->_tpl_vars['config']['hack_action']; ?>
]">
	<option value="0" />��</option>
	<option value="1" selected="selected" />��</option>
	</select>	
<?php else: ?>
	<select name="hack_cache[<?php echo $this->_tpl_vars['config']['hack_action']; ?>
]">
	<option value="0" selected="selected" />��</option>
	<option value="1" />��</option>
	</select>
<?php endif; ?>
	  </td>
      <td class=b>
	  <input type="text" size="10" name="hack_cachetime[<?php echo $this->_tpl_vars['config']['hack_action']; ?>
]" value="<?php echo $this->_tpl_vars['config']['hack_cachetime']; ?>
">
	  </td>
      <td class=b>
<?php if ($this->_tpl_vars['config']['hack_htmlteml'] == '1'): ?>
	<select name="hack_htmlteml[<?php echo $this->_tpl_vars['config']['hack_action']; ?>
]">
	<option value="0" />��</option>
	<option value="1" selected="selected" />��</option>
	</select>
<?php else: ?>
	<select name="hack_htmlteml[<?php echo $this->_tpl_vars['config']['hack_action']; ?>
]">
	<option value="0" selected="selected" />��</option>
	<option value="1" />��</option>
	</select>
<?php endif; ?>
	  </td>
	  <td class=b><input type="text" name="hack_numser[<?php echo $this->_tpl_vars['config']['hack_action']; ?>
]" size=4 value='<?php echo $this->_tpl_vars['config']['hack_numser']; ?>
' /></td>
	  <td class=b><input type=hidden name="action[<?php echo $this->_tpl_vars['config']['hack_action']; ?>
]" value='<?php echo $this->_tpl_vars['config']['hack_action']; ?>
'><a href="javascript:fshowwindowsopen('showwindow');fshowwindows('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=edit&id=<?php echo $this->_tpl_vars['config']['hack_action']; ?>
',1,'�༭���');">�༭</a> <a href="javascript:_confirm_msg_show('ȷ��ɾ��<?php echo $this->_tpl_vars['config']['hack_action']; ?>
', 'saveUserlogin(\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=del&id=<?php echo $this->_tpl_vars['config']['hack_action']; ?>
\',\'formupdate\',\'\',\'getNews(\\\'showtable\\\',\\\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\\\')\')', '', '')">ɾ��</a></td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
  </table>
  <BR />
  <center><input type="button" name="cleared" id=Submit value=" ����̬ҳ�� " onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=cleared','formupdate','','getNews(\'showtable\',\'admin.php?action=hack\')')">
  </center>
  <BR />
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="6" class=head> �� �� �� �� ģ ��</td>
    </tr>
	<tr>
      <td class=b>���</td>
	  <td class=b>��ʶ</td>
      <td class=b>���濪��</td>
      <td class=b>����ʱ��</td>
	  <td class=b>��ʾ����</td>
      <td class=b>��̬��</td>
	</tr>
	<tr>
      <td class=b><input type="text" size="10" name="addsubject" value=""></td>
	  <td class=b><input type="text" size="10" name="addaction" value=""></td>
      <td class=b><select name="addcache">
	  <option value="0" selected="selected" />��</option>
	  <option value="1" />��</option></select></td>
      <td class=b><input type="text" size="10" name="addcachetime" value=""></td>
	  <td class=b><input type="text" name="addnumser" size=4 value='10' /></td>
      <td class=b><select name="addhtmlteml">
	  <option value="0" selected="selected" />��</option>
	  <option value="1" />��</option></select></td>
	</tr>
  </table>
  <BR />
  <center><input type=hidden name=update value='update'> &nbsp; 
    <input type="button" name="Submit" id=Submit value=" �� �� " onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=hack\')')">
  </center>
</form>