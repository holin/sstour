<?php /* Smarty version 2.6.10, created on 2010-09-11 13:06:26
         compiled from scenic.htm */ ?>
<form name="formupdate" method="post" action="">
<table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
  <tr>
    <td colspan="7" class=head> �� �� �� Ϣ �� ��</td>
  </tr>
  <tr>
    <td class=b>������</td>
    <td class=b>�Ǽ�</td>
    <td class=b>�û�</td>
	<td class=b>��ϵ��</td>
	<td class=b>�绰</td>
	<td class=b>˳��</td>
    <td class=b>����</td>
  </tr>
  <?php $_from = $this->_tpl_vars['sql_hotel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotel']):
?>
  <tr id='list<?php echo $this->_tpl_vars['hotel']['sc_id']; ?>
' onclick="onclickclass('list<?php echo $this->_tpl_vars['hotel']['sc_id']; ?>
');" class=movclick style='cursor: hand;'>
    <td><a href="index.php?action=scenic&option=single&id=<?php echo $this->_tpl_vars['hotel']['sc_id']; ?>
" target="_blank"><?php echo $this->_tpl_vars['hotel']['sc_subject']; ?>
</a></td>
    <td><?php echo $this->_tpl_vars['hotel']['sc_start']; ?>
</td>
    <td><?php echo $this->_tpl_vars['hotel']['sc_username']; ?>
</td>
	<td><?php echo $this->_tpl_vars['hotel']['sc_contact']; ?>
</td>
	<td><?php echo $this->_tpl_vars['hotel']['sc_phone']; ?>
</td>
	<td id='showsp<?php echo $this->_tpl_vars['hotel']['sc_id']; ?>
'><input size="4" type="text" name="sp['<?php echo $this->_tpl_vars['hotel']['sc_sp']; ?>
']" value="<?php echo $this->_tpl_vars['hotel']['sc_sp']; ?>
" onblur="getNews('showsp<?php echo $this->_tpl_vars['hotel']['sc_id']; ?>
','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=actsp&id=<?php echo $this->_tpl_vars['hotel']['sc_id']; ?>
&Industry='+this.value);"></td>
    <td id='showfilg<?php echo $this->_tpl_vars['hotel']['sc_id']; ?>
'>
	<?php if ($this->_tpl_vars['hotel']['sc_pass'] == '1'): ?>
	<a href="javascript:getNews('showfilg<?php echo $this->_tpl_vars['hotel']['sc_id']; ?>
','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=delpass&id=<?php echo $this->_tpl_vars['hotel']['sc_id']; ?>
');">ȡ��</a> 
	<?php else: ?>
	<a href="javascript:getNews('showfilg<?php echo $this->_tpl_vars['hotel']['sc_id']; ?>
','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=pass&id=<?php echo $this->_tpl_vars['hotel']['sc_id']; ?>
');">ͨ��</a> 
	<?php endif; ?>
	<a href="javascript:_confirm_msg_show('ȷ��ɾ������','getNews(\'showfilg<?php echo $this->_tpl_vars['hotel']['sc_id']; ?>
\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=delhotel&id=<?php echo $this->_tpl_vars['hotel']['sc_id']; ?>
\');$(\'list<?php echo $this->_tpl_vars['hotel']['sc_id']; ?>
\').parentNode.removeChild($(\'list<?php echo $this->_tpl_vars['hotel']['sc_id']; ?>
\'))','','');">ɾ��</a></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <tr>
    <td colspan="7" class=b><?php echo $this->_tpl_vars['fpageup']; ?>
</td>
  </tr>
  <tr>
    <td colspan="7" class=b><select name="getids" onchange="document.getElementById('getid').value=this.options[selectedIndex].value">
          <?php if ($this->_tpl_vars['type'] == '2'): ?>
          <option value="1">������</option>     
		  <option value="2" selected="selected">�û���</option>     
          <?php else: ?>
		  <option value="1" selected="selected">�Ƶ���</option>
          <option value="2">�û���</option>
          <?php endif; ?>
        </select><input type="hidden" name="getid" value="<?php echo $this->_tpl_vars['type']; ?>
" />
		�ؼ���:<input name="Keyword" id=Keyword type="text" size="20" value="<?php echo $this->_tpl_vars['Keyword']; ?>
"><input type="button" onclick="getNews('showtable','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&type='+document.getElementById('getid').value+'&Keyword='+escape(document.getElementById('Keyword').value));" value="��ѯ"></td>
  </tr>
</table>
</form>