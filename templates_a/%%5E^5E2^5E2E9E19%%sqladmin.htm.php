<?php /* Smarty version 2.6.10, created on 2010-09-11 13:03:43
         compiled from sqladmin.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'regex_replace', 'sqladmin.htm', 60, false),)), $this); ?>
<?php if ($this->_tpl_vars['option'] == 'index'): ?>
<form name="formupdate" method="post">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="8" class=head> �� �� �� �� �� ��</td>
    </tr>
    <tr>
      <td class=b>��</td>
      <td class=b>��¼��</td>
      <td class=b>����</td>
      <td class=b>����</td>
      <td class=b>����</td>
      <td class=b>����</td>
      <td class=b>����</td>
      <td class=b>ѡ��</td>
    </tr>
    <?php $_from = $this->_tpl_vars['sql_rs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sql']):
?>
    <tr>
      <td class=b><?php echo $this->_tpl_vars['sql']['Name']; ?>
</td>
      <td class=b><?php echo $this->_tpl_vars['sql']['Rows']; ?>
</td>
      <td class=b><?php echo $this->_tpl_vars['sql']['Engine']; ?>
</td>
      <td class=b><?php echo $this->_tpl_vars['sql']['Collation']; ?>
</td>
      <td class=b><?php echo $this->_tpl_vars['sql']['Auto_increment']; ?>
</td>
      <td class=b><?php echo $this->_tpl_vars['sql']['Data_free']; ?>
</td>
      <td class=b><a href="javascript:if(confirm('ȷ��������?'))saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=sqlupdate&table=<?php echo $this->_tpl_vars['sql']['Name']; ?>
&show=truncate','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\')');void(null)">���</a>&nbsp;
	  <a href="javascript:fshowwindowsopen('showwindow');getNews('showwindow','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=sqlupdate&table=<?php echo $this->_tpl_vars['sql']['Name']; ?>
&show=select');">���</a>&nbsp;
	  <a href="javascript:fshowwindowsopen('showwindow');getNews('showwindow','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=columns&table=<?php echo $this->_tpl_vars['sql']['Name']; ?>
');">�ṹ</a>&nbsp;
	  <a href="javascript:if(confirm('ȷ��������?'))saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=sqlupdate&table=<?php echo $this->_tpl_vars['sql']['Name']; ?>
&show=deltable','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\')');void(null)">ɾ��</a></td>
      <td class=b><input type="checkbox" name=tablename[] value="<?php echo $this->_tpl_vars['sql']['Name']; ?>
"></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
  </table>
  <BR />
  <center>
    <input type=hidden name=update value='update'>
    &nbsp;
    <input type='button' name='chkall' value=' ȫ ѡ ' onclick='CheckAll(this.form)'>
    &nbsp;
    <input type=radio value=1 name="radiocheck">
    ��� �޸� �Ż����ݱ�(Optimization) &nbsp;
	<input type="button" name="Optimization" id=Optimization value=" �Ż�(Optimization) " onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\')');" />
    <br />
	�����Ʊ���(Backup) &nbsp;<input type="text" id="sizelimit" name="sizelimit" value="2048" size="8" /> &nbsp; <input type=button value=" ����(Backup) " onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=sqlback&sizelimit='+document.getElementById('sizelimit').value,'formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\');');" name="Submit" id=Submit />
  </center>
</form>
<?php elseif ($this->_tpl_vars['option'] == 'sqlupdate'): ?>
<div align=right class=itemtag><img src='image/msg/edit.gif' alt='����' onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
&table=<?php echo $this->_tpl_vars['sqltable']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\')')" style='cursor: hand;' /> <img src='image/msg/closed.gif' alt='�ر�' onclick="getNews('showtable','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
');fshowwindowsclos('showwindow');" style='cursor: hand;'></div>
<form name="formupdate" method="post">
  <table width="98%" align="center" cellpadding="3" cellspacing="1" class="i_table">
	<tbody>
	<tr><td colspan=24 align="center" class="head">���ݱ��ѯ</td></tr>
	<tr class=b align="center">
	<?php $_from = $this->_tpl_vars['sql_users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['sqlfile']):
?>
		<td><?php echo $this->_tpl_vars['key']; ?>
</td>
	<?php endforeach; endif; unset($_from); ?>
	</tr>
	<?php $_from = $this->_tpl_vars['sql_user']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sqlkey'] => $this->_tpl_vars['showtable']):
?>
		<tr class=b align="center">
		<?php $_from = $this->_tpl_vars['showtable']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
		<td><textarea name="sqltext[<?php echo $this->_tpl_vars['sqlkey']; ?>
]"><?php echo ((is_array($_tmp=$this->_tpl_vars['file'])) ? $this->_run_mod_handler('regex_replace', true, $_tmp, "/[\r\t\n]/", '') : smarty_modifier_regex_replace($_tmp, "/[\r\t\n]/", '')); ?>
</textarea></td>
		<?php endforeach; endif; unset($_from); ?>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	<tr><td colspan=24 align="center"><?php echo $this->_tpl_vars['fpageup']; ?>
</td></tr>
	</tbody>
</table>
  <center>
    <input type=hidden name=update value='update'>
	<input type="hidden" name="Submit" id=Submit value="" >    
  </center>
</form>
<div align=right class=itemtag><img src='image/msg/edit.gif' alt='����' onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
&table=<?php echo $this->_tpl_vars['sqltable']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\')')" style='cursor: hand;' /> <img src='image/msg/closed.gif' alt='�ر�' onclick="getNews('showtable','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
');fshowwindowsclos('showwindow');" style='cursor: hand;'></div>
<?php elseif ($this->_tpl_vars['option'] == 'columns'): ?>
<div align=right class=itemtag><img src='image/msg/closed.gif' alt='�ر�' onclick="fshowwindowsclos('showwindow');" style='cursor: hand;'></div>
<table width="98%" align="center" cellpadding="3" cellspacing="1" class="i_table">
	<tr><td colspan="7" align="center" class="head">���ݱ�<?php echo $this->_tpl_vars['table']; ?>
�ṹ</td></tr>
	<tr class=b align="center">
		<td>�ֶ�</td>
        <td>����</td>
        <td>����</td>
        <td>����</td>
        <td>Null</td>
        <td>����</td>
	    <td>����</td>
	</tr>
	<?php $_from = $this->_tpl_vars['sql_rs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sqlfile']):
?>
	<tr class=b align="center">
		<td><?php echo $this->_tpl_vars['sqlfile']['Field']; ?>
</td>
        <td><?php echo $this->_tpl_vars['sqlfile']['Type']; ?>
</td>
        <td><?php echo $this->_tpl_vars['sqlfile']['Null']; ?>
</td>
        <td><?php echo $this->_tpl_vars['sqlfile']['Key']; ?>
</td>
        <td><?php echo $this->_tpl_vars['sqlfile']['Default']; ?>
</td>
        <td><?php echo $this->_tpl_vars['sqlfile']['Extra']; ?>
</td>
        <td><a href="javascript:if(confirm('ȷ��������?'))saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
&table=<?php echo $this->_tpl_vars['table']; ?>
&del=<?php echo $this->_tpl_vars['sqlfile']['Field']; ?>
','formupdate','','getNews(\'showwindow\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
\')');void(null)">ɾ��</a></td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<div align=right class=itemtag><img src='image/msg/closed.gif' alt='�ر�' onclick="fshowwindowsclos('showwindow');" style='cursor: hand;'></div>
<?php endif; ?>