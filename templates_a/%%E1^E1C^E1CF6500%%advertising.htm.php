<?php /* Smarty version 2.6.10, created on 2010-09-11 13:05:56
         compiled from advertising.htm */ ?>
<form name="formupdate" method="post" action="">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="3" class=head> �� �� �� �� �� ��</td>
    </tr>
<?php $_from = $this->_tpl_vars['sql_hack']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['config']):
?>
	<tr>
      <td class=head>���</td>
	  <td class=head>������</td>
	  <td class=head>˵��</td>
	</tr>
	<tr>
      <td class=b><?php echo $this->_tpl_vars['config']['hack_subject']; ?>
[<?php echo $this->_tpl_vars['config']['hack_action']; ?>
]<br />ͷ����棨ʹ��html��ʽ��</td>
	  <td class=b><textarea name="hack_adhead[<?php echo $this->_tpl_vars['config']['hack_action']; ?>
]" cols="60" rows="5"><?php echo $this->_tpl_vars['config']['hack_adhead']; ?>
</textarea></td>
	  <td class=b>��Ҫ��ÿ��ǰ̨�����ҳ�������<BR />&lt;-{$cache_config.hack_adhead}-&gt;</td>	    
	</tr>
	<tr>
      <td class=b><?php echo $this->_tpl_vars['config']['hack_subject']; ?>
[<?php echo $this->_tpl_vars['config']['hack_action']; ?>
]<br />�м��棨ʹ��html��ʽ��</td>
	  <td class=b><textarea name="hack_adbody[<?php echo $this->_tpl_vars['config']['hack_action']; ?>
]" cols="60" rows="5"><?php echo $this->_tpl_vars['config']['hack_adbody']; ?>
</textarea></td>
	  <td class=b>��Ҫ��ÿ��ǰ̨�����ҳ�������<BR />&lt;-{$cache_config.hack_adbody}-&gt;</td>	    
	</tr>
	<tr>
      <td class=b><?php echo $this->_tpl_vars['config']['hack_subject']; ?>
[<?php echo $this->_tpl_vars['config']['hack_action']; ?>
]<br />β����棨ʹ��html��ʽ��</td>
	  <td class=b><textarea name="hack_adfoot[<?php echo $this->_tpl_vars['config']['hack_action']; ?>
]" cols="60" rows="5"><?php echo $this->_tpl_vars['config']['hack_adfoot']; ?>
</textarea></td>
	  <td class=b>��Ҫ��ÿ��ǰ̨�����ҳ�������<BR />&lt;-{$cache_config.hack_adfoot}-&gt;</td>	    
	</tr>
<?php endforeach; endif; unset($_from); ?>
  </table>
  <br />
  <center><input type=hidden name=update value='update'> &nbsp; 
    <input type="button" name="Submit" id=Submit value=" �� �� " onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\')')">
  </center>
</form>