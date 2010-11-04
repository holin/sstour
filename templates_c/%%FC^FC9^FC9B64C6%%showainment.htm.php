<?php /* Smarty version 2.6.10, created on 2009-12-12 22:47:22
         compiled from showainment.htm */ ?>
<table width="100%" border="0" align="center" cellpadding="3" cellspacing="2" bgcolor="#FFFFFF">
  <tr>
    <td class="txt_title_white">&nbsp;<img src="image/lvyou/ico_white.gif" width="7" height="7"> 友情链接</td>
  </tr>
  <tr>
    <td><select name="select2" style="width:186px;" onChange="window.open('<?php echo $this->_tpl_vars['boardurl']; ?>
goto.php?'+this.options[this.options.selectedIndex].value)">
        <option>=====县政府各网站=====</option>
		<?php $_from = $this->_tpl_vars['sql_link5']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link5']):
?>
		<option value="<?php echo $this->_tpl_vars['link5']['link_url']; ?>
"><?php echo $this->_tpl_vars['link5']['link_subject']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
      </select></td>
  </tr>
  <tr>
    <td><select name="select3" style="width:186px;" onChange="window.open('<?php echo $this->_tpl_vars['boardurl']; ?>
goto.php?'+this.options[this.options.selectedIndex].value)">
        <option>==其它区县(市)旅游网站==</option>
		<?php $_from = $this->_tpl_vars['sql_link4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link4']):
?>
		<option value="<?php echo $this->_tpl_vars['link4']['link_url']; ?>
"><?php echo $this->_tpl_vars['link4']['link_subject']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
      </select></td>
  </tr>
  <tr>
    <td><select name="select4" style="width:186px;" onChange="window.open('<?php echo $this->_tpl_vars['boardurl']; ?>
goto.php?'+this.options[this.options.selectedIndex].value)">
        <option>===县相关旅游企业网站===</option>
		<?php $_from = $this->_tpl_vars['sql_link3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link3']):
?>
		<option value="<?php echo $this->_tpl_vars['link3']['link_url']; ?>
"><?php echo $this->_tpl_vars['link3']['link_subject']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
      </select></td>
  </tr>
  <tr>
    <td><select name="select5" style="width:186px;" onChange="window.open('<?php echo $this->_tpl_vars['boardurl']; ?>
goto.php?'+this.options[this.options.selectedIndex].value)">
        <option>=======合作网站=======</option>
		<?php $_from = $this->_tpl_vars['sql_link2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link2']):
?>
		<option value="<?php echo $this->_tpl_vars['link2']['link_url']; ?>
"><?php echo $this->_tpl_vars['link2']['link_subject']; ?>
</option>
		<?php endforeach; endif; unset($_from); ?>
      </select></td>
  </tr>
</table>