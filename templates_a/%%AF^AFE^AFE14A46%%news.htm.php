<?php /* Smarty version 2.6.10, created on 2010-01-07 17:48:56
         compiled from news.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'news.htm', 15, false),array('modifier', 'date_format', 'news.htm', 16, false),)), $this); ?>
<form name="formupdate" method="post" action="">
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
    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['news']['new_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d") : smarty_modifier_date_format($_tmp, "%Y-%m-%d")); ?>
</td>
    <td><a href="javascript:fshowwindows('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=newsedit&type=edit&id=<?php echo $this->_tpl_vars['news']['new_id']; ?>
','1','�༭����');">�༭</a> <a href="javascript:_confirm_msg_show('ȷ��ɾ��','Userloginon(\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
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
  <tr>
    <td colspan="4" class=b><select name="getids" onchange="document.getElementById('getid').value=this.options[selectedIndex].value">
		<option value="">������Ϣ</option>
          <?php echo $this->_tpl_vars['soptions']; ?>

        </select><input type="hidden" name="getid" value="<?php echo $this->_tpl_vars['type']; ?>
" />
		�ؼ���:<input name="Keyword" id=Keyword type="text" size="20" value="<?php echo $this->_tpl_vars['Keyword']; ?>
"><input type="button" onclick="getNews('showtable','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&type='+document.getElementById('getid').value+'&Keyword='+escape(document.getElementById('Keyword').value));" value="��ѯ"></td>
  </tr>
</table>
<BR />
<center>
  <input type=hidden name=update value='update'>
  &nbsp; &nbsp;
  <input type="button" name="Submit" id=Submit value=" �� �� �� �� " onClick="javascript:fshowwindows('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=newsedit&type=edit','1','�������');">
</center>
</form>