<?php /* Smarty version 2.6.10, created on 2010-09-11 13:58:15
         compiled from link.htm */ ?>
<form name="formupdate" method="post" action="">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="8" class=head> �� �� �� �� �� �� �� ��</td>
    </tr>
	<tr>
      <td class=b>��վ</td>
	  <td class=b>����</td>
      <td class=b>����</td>
      <td class=b>logo ��ַ(��ѡ)</td>
      <td class=b>��ʾ˳��</td>
	  <td class=b>���</td>
	  <td class=b>�༭</td>
	</tr>
<?php $_from = $this->_tpl_vars['sql_link']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
	<tr>
      <td class=b>
	  <input type="text" size="10" name="link_subject[<?php echo $this->_tpl_vars['link']['link_id']; ?>
]" value="<?php echo $this->_tpl_vars['link']['link_subject']; ?>
">
	  </td>
	  <td class=b>
	  <input type="text" size="15" name="link_url[<?php echo $this->_tpl_vars['link']['link_id']; ?>
]" value="<?php echo $this->_tpl_vars['link']['link_url']; ?>
">
	  </td>
      <td class=b>
	  <input type="text" size="20" name="link_info[<?php echo $this->_tpl_vars['link']['link_id']; ?>
]" value="<?php echo $this->_tpl_vars['link']['link_info']; ?>
">
	  </td>
      <td class=b>
	  <input type="text" size="20" name="link_logo[<?php echo $this->_tpl_vars['link']['link_id']; ?>
]" value="<?php echo $this->_tpl_vars['link']['link_logo']; ?>
">
	  </td>
      <td class=b>
	  <input type="text" size="4" name="link_sp[<?php echo $this->_tpl_vars['link']['link_id']; ?>
]" value="<?php echo $this->_tpl_vars['link']['link_sp']; ?>
">
	  </td>
	  <td class=b>
	  <select name="link_pass[<?php echo $this->_tpl_vars['link']['link_id']; ?>
]">
	  <?php if ($this->_tpl_vars['link']['link_pass'] == '0'): ?><option value="0" selected>����</option><?php else: ?><option value="0">����</option><?php endif; ?>
	  <?php if ($this->_tpl_vars['link']['link_pass'] == '1'): ?><option value="1" selected>��������</option><?php else: ?><option value="1">��������</option><?php endif; ?>
	  <?php if ($this->_tpl_vars['link']['link_pass'] == '2'): ?><option value="2" selected>������վ</option><?php else: ?><option value="2">������վ</option><?php endif; ?>
	  <?php if ($this->_tpl_vars['link']['link_pass'] == '3'): ?><option value="3" selected>������վ</option><?php else: ?><option value="3">������վ</option><?php endif; ?>
	  <?php if ($this->_tpl_vars['link']['link_pass'] == '4'): ?><option value="4" selected>���ξ�</option><?php else: ?><option value="4">���ξ�</option><?php endif; ?>
	  <?php if ($this->_tpl_vars['link']['link_pass'] == '5'): ?><option value="5" selected>������</option><?php else: ?><option value="5">������</option><?php endif; ?>
	  </select>
	  </td>
	  <td class=b><input type=hidden name="link_id[<?php echo $this->_tpl_vars['link']['link_id']; ?>
]" value='<?php echo $this->_tpl_vars['link']['link_id']; ?>
'><a href="javascript:saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=del&id=<?php echo $this->_tpl_vars['link']['link_id']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&page=<?php echo $this->_tpl_vars['nPage']; ?>
\')')">ɾ��</a></td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
	<tr>
      <td colspan="8" class=b><?php echo $this->_tpl_vars['fpageup']; ?>
</td>
    </tr>
  </table>
  <br>
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="6" class=head> �� �� �� �� �� �� </td>
    </tr>
	<tr>
      <td class=b>��վ</td>
	  <td class=b>����</td>
      <td class=b>����</td>
      <td class=b>logo ��ַ(��ѡ)</td>
      <td class=b>��ʾ˳��</td>
	  <td class=b>���</td>
	</tr>
	<tr>
      <td class=b><input type="text" size="15" name="addsubject" value=""></td>
	  <td class=b><input type="text" size="20" name="addurl" value=""></td>
      <td class=b><input type="text" size="20" name="addinfo" value=""></td>
	  <td class=b><input type="text" size="20" name="addlogo" value="" /></td>
      <td class=b><input type="text" size="4" name="addsp" value="0"></td>
	  <td class=b><select name="addpass"><option value="0">����</option><option value="1">��������</option>
	  <option value="2">������վ</option><option value="3">������վ</option>
	  <option value="4">���ξ�</option><option value="5">������</option></select></td>
	</tr>
  </table>
  <BR />
  <center><input type=hidden name=update value='update'> &nbsp; 
    <input type="button" name="Submit" id=Submit value=" �� �� " onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&page=<?php echo $this->_tpl_vars['nPage']; ?>
\')')">
  </center>
</form>