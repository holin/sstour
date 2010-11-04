<?php /* Smarty version 2.6.10, created on 2010-02-21 16:53:20
         compiled from hotel.htm */ ?>
<form name="formupdate" method="post" action="">
<table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
  <tr>
    <td colspan="7" class=head> 酒 店 信 息 管 理</td>
  </tr>
  <tr>
    <td class=b>酒店名</td>
    <td class=b>星级</td>
    <td class=b>用户</td>
	<td class=b>联系人</td>
	<td class=b>电话</td>
	<td class=b>顺序</td>
    <td class=b>操作</td>
  </tr>
  <?php $_from = $this->_tpl_vars['sql_hotel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotel']):
?>
  <tr id='list<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
' onclick="onclickclass('list<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
');" class=movclick style='cursor: hand;'>
    <td><a href="index.php?action=hotel&option=single&id=<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
" target="_blank"><?php echo $this->_tpl_vars['hotel']['hot_subject']; ?>
</a></td>
    <td id="showstart<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
"><select onchange="getNews('showstart<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=start&id=<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
&Industry='+this.options[selectedIndex].value);" name="hot_start[<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
]">
	<option value="0" <?php if ($this->_tpl_vars['hotel']['hot_start'] == '0'): ?> selected="selected"<?php endif; ?>>无</option>
	<option value="1" <?php if ($this->_tpl_vars['hotel']['hot_start'] == '1'): ?> selected="selected"<?php endif; ?>>一星级</option>
	<option value="2" <?php if ($this->_tpl_vars['hotel']['hot_start'] == '2'): ?> selected="selected"<?php endif; ?>>二星级</option>
	<option value="3" <?php if ($this->_tpl_vars['hotel']['hot_start'] == '3'): ?> selected="selected"<?php endif; ?>>三星级</option>
	<option value="4" <?php if ($this->_tpl_vars['hotel']['hot_start'] == '4'): ?> selected="selected"<?php endif; ?>>四星级</option>
	<option value="5" <?php if ($this->_tpl_vars['hotel']['hot_start'] == '5'): ?> selected="selected"<?php endif; ?>>五星级</option>
	</select></td>
    <td><?php echo $this->_tpl_vars['hotel']['hot_username']; ?>
</td>
	<td><?php echo $this->_tpl_vars['hotel']['hot_contact']; ?>
</td>
	<td><?php echo $this->_tpl_vars['hotel']['hot_phone']; ?>
</td>
	<td id='showsp<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
'><input size="4" type="text" name="sp['<?php echo $this->_tpl_vars['hotel']['hot_sp']; ?>
']" value="<?php echo $this->_tpl_vars['hotel']['hot_sp']; ?>
" onblur="getNews('showsp<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=actsp&id=<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
&Industry='+this.value);"></td>
    <td id='showfilg<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
'>
	<?php if ($this->_tpl_vars['hotel']['hot_pass'] == '1'): ?>
	<a href="javascript:getNews('showfilg<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=delpass&id=<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
');">取消</a> 
	<?php else: ?>
	<a href="javascript:getNews('showfilg<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=pass&id=<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
');">通过</a> 
	<?php endif; ?>
	<a href="javascript:
	_confirm_msg_show('确定删除酒店','getNews(\'showfilg<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=delhotel&id=<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
\');$(\'list<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
\').parentNode.removeChild($(\'list<?php echo $this->_tpl_vars['hotel']['hot_id']; ?>
\'));','','');">删除</a></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <tr>
    <td colspan="7" class=b><?php echo $this->_tpl_vars['fpageup']; ?>
</td>
  </tr>
  <tr>
    <td colspan="7" class=b><select name="getids" onchange="document.getElementById('getid').value=this.options[selectedIndex].value">
          <?php if ($this->_tpl_vars['type'] == '2'): ?>
          <option value="1">酒店名</option>     
		  <option value="2" selected="selected">用户名</option>     
          <?php else: ?>
		  <option value="1" selected="selected">酒店名</option>
          <option value="2">用户名</option>
          <?php endif; ?>
        </select><input type="hidden" name="getid" value="<?php echo $this->_tpl_vars['type']; ?>
" />
		关键字:<input name="Keyword" id=Keyword type="text" size="20" value="<?php echo $this->_tpl_vars['Keyword']; ?>
"><a href="javascript:getNews('showtable','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&type='+document.getElementById('getid').value+'&Keyword='+escape(document.getElementById('Keyword').value));">查询</a></td>
  </tr>
</table>
</form>