<?php /* Smarty version 2.6.10, created on 2010-09-11 13:58:17
         compiled from about.htm */ ?>
<form name="formupdate" method="post" action="">
<table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
  <tr>
    <td colspan="2" class=head> �� վ �� Ϣ �� ��</td>
  </tr>
  <tr>
    <td class=b>����</td>
    <td class=b>����</td>
  </tr>
  <?php $_from = $this->_tpl_vars['sql_about']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['about']):
?>
  <tr id='list<?php echo $this->_tpl_vars['about']['about_id']; ?>
' onclick="onclickclass('list<?php echo $this->_tpl_vars['about']['about_id']; ?>
');" class=movclick style='cursor: hand;'>
    <td><?php echo $this->_tpl_vars['about']['about_subject']; ?>
</td>
    <td><a href="javascript:fshowwindows('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=newsedit&type=edit&id=<?php echo $this->_tpl_vars['about']['about_id']; ?>
','1','�༭����');">�༭</a> <a href="javascript:_confirm_msg_show('ȷ��ɾ��','Userloginon(\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=del&id=<?php echo $this->_tpl_vars['about']['about_id']; ?>
\',\'\',\'\',\'\');$(\'list<?php echo $this->_tpl_vars['about']['about_id']; ?>
\').parentNode.removeChild($(\'list<?php echo $this->_tpl_vars['about']['about_id']; ?>
\'));','','')">ɾ��</a></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <tr>
    <td colspan="2" class=b><?php echo $this->_tpl_vars['fpageup']; ?>
</td>
  </tr>
</table>
<BR />
<center>
  <input type=hidden name=update value='update'>
  &nbsp; &nbsp;
  <input type="button" name="Submit" id=Submit value=" �� �� �� վ ˵ �� " onClick="javascript:fshowwindows('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=newsedit&type=edit','1','�����վ˵��');">
</center>
</form>