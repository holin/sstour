<?php /* Smarty version 2.6.10, created on 2010-09-11 13:03:28
         compiled from actionadmin.htm */ ?>
<form name="formupdate" method="post" action="">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="3" class=head> 插 件 修 改 管 理</td>
    </tr>
	<tr>
      <td class=b>插件</td>
	  <td class=b>标识</td>
	  <td class=b>操作</td>
	</tr>
<?php $_from = $this->_tpl_vars['sql_config']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['config']):
?>
	<tr>
      <td class=b>
	  <input type="text" size="10" name="action_subject[<?php echo $this->_tpl_vars['config']['action_action']; ?>
]" value="<?php echo $this->_tpl_vars['config']['action_subject']; ?>
">
	  </td>
	  <td class=b>
	  <input type="text" size="10" name="action_action[<?php echo $this->_tpl_vars['config']['action_action']; ?>
]" value="<?php echo $this->_tpl_vars['config']['action_action']; ?>
">
	  </td>
	  <td class=b><input type=hidden name="action[<?php echo $this->_tpl_vars['config']['action_action']; ?>
]" value='<?php echo $this->_tpl_vars['config']['action_action']; ?>
'><a href="javascript:_confirm_msg_show('确定删除<?php echo $this->_tpl_vars['config']['action_action']; ?>
', 'saveUserlogin(\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=del&id=<?php echo $this->_tpl_vars['config']['action_action']; ?>
\',\'formupdate\',\'\',\'getNews(\\\'showtable\\\',\\\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\\\')\')', '', '')">删除</a></td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
  </table>
  <BR />
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="3" class=head> 添 加 修 改 模 块</td>
    </tr>
	<tr>
      <td class=b>插件</td>
	  <td class=b>标识</td>
	</tr>
	<tr>
      <td class=b><input type="text" size="10" name="addsubject" value=""></td>
	  <td class=b><input type="text" size="10" name="addaction" value=""></td>
	</tr>
  </table>
  <BR />
  <center><input type=hidden name=update value='update'> &nbsp; 
    <input type="button" name="Submit" id=Submit value=" 提 交 " onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\')')">
  </center>
</form>