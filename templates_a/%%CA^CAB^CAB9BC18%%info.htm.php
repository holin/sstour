<?php /* Smarty version 2.6.10, created on 2010-07-08 09:22:41
         compiled from info.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'info.htm', 14, false),)), $this); ?>
<table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
  <tr>
    <td colspan="4" class=head> �� �� �� Ϣ �� ��</td>
  </tr>
  <tr>
    <td class=b>����</td>
    <td class=b>����</td>
    <td class=b>����ʱ��</td>
    <td class=b>����</td>
  </tr>
  <?php $_from = $this->_tpl_vars['sql_news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>
  <tr id='list<?php echo $this->_tpl_vars['news']['new_id']; ?>
' onclick="onclickclass('list<?php echo $this->_tpl_vars['news']['new_id']; ?>
');" class=movclick style='cursor: hand;'>
    <td><?php echo $this->_tpl_vars['news']['type_subject']; ?>
</td>
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['news']['new_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 30, "...", true) : smarty_modifier_truncate($_tmp, 30, "...", true)); ?>
</td>
    <td><?php echo $this->_tpl_vars['news']['new_date']; ?>
</td>
    <td><a href="javascript:fshowwindows('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=newsedit&type=edit&id=<?php echo $this->_tpl_vars['news']['new_id']; ?>
','1','�༭���');">�༭</a> <a href="javascript:_confirm_msg_show('ȷ��ɾ��','Userloginon(\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=del&id=<?php echo $this->_tpl_vars['news']['new_id']; ?>
\',\'\',\'\',\'\');$(\'list<?php echo $this->_tpl_vars['news']['new_id']; ?>
\').parentNode.removeChild($(\'list<?php echo $this->_tpl_vars['news']['new_id']; ?>
\'));','','')">ɾ��</a></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <tr>
    <td colspan="4" class=b><?php echo $this->_tpl_vars['fpageup']; ?>
</td>
  </tr>
</table>
<BR />
<center>
  <input type=hidden name=update value='update'>
  &nbsp; &nbsp;
  <input type="button" name="Submit" id=Submit value=" �� �� �� �� " onClick="javascript:fshowwindows('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=newsedit&type=edit','1','��Ӽ��');">
</center>