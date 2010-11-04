<?php /* Smarty version 2.6.10, created on 2010-09-11 13:03:43
         compiled from sqladmin.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'regex_replace', 'sqladmin.htm', 60, false),)), $this); ?>
<?php if ($this->_tpl_vars['option'] == 'index'): ?>
<form name="formupdate" method="post">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="8" class=head> 数 据 备 份 操 作</td>
    </tr>
    <tr>
      <td class=b>表</td>
      <td class=b>记录数</td>
      <td class=b>类型</td>
      <td class=b>整理</td>
      <td class=b>递增</td>
      <td class=b>多余</td>
      <td class=b>操作</td>
      <td class=b>选中</td>
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
      <td class=b><a href="javascript:if(confirm('确定操作吗?'))saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=sqlupdate&table=<?php echo $this->_tpl_vars['sql']['Name']; ?>
&show=truncate','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\')');void(null)">清空</a>&nbsp;
	  <a href="javascript:fshowwindowsopen('showwindow');getNews('showwindow','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=sqlupdate&table=<?php echo $this->_tpl_vars['sql']['Name']; ?>
&show=select');">浏览</a>&nbsp;
	  <a href="javascript:fshowwindowsopen('showwindow');getNews('showwindow','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=columns&table=<?php echo $this->_tpl_vars['sql']['Name']; ?>
');">结构</a>&nbsp;
	  <a href="javascript:if(confirm('确定操作吗?'))saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=sqlupdate&table=<?php echo $this->_tpl_vars['sql']['Name']; ?>
&show=deltable','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\')');void(null)">删除</a></td>
      <td class=b><input type="checkbox" name=tablename[] value="<?php echo $this->_tpl_vars['sql']['Name']; ?>
"></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
  </table>
  <BR />
  <center>
    <input type=hidden name=update value='update'>
    &nbsp;
    <input type='button' name='chkall' value=' 全 选 ' onclick='CheckAll(this.form)'>
    &nbsp;
    <input type=radio value=1 name="radiocheck">
    检查 修复 优化数据表(Optimization) &nbsp;
	<input type="button" name="Optimization" id=Optimization value=" 优化(Optimization) " onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\')');" />
    <br />
	按进制备份(Backup) &nbsp;<input type="text" id="sizelimit" name="sizelimit" value="2048" size="8" /> &nbsp; <input type=button value=" 备份(Backup) " onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=sqlback&sizelimit='+document.getElementById('sizelimit').value,'formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\');');" name="Submit" id=Submit />
  </center>
</form>
<?php elseif ($this->_tpl_vars['option'] == 'sqlupdate'): ?>
<div align=right class=itemtag><img src='image/msg/edit.gif' alt='保存' onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
&table=<?php echo $this->_tpl_vars['sqltable']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\')')" style='cursor: hand;' /> <img src='image/msg/closed.gif' alt='关闭' onclick="getNews('showtable','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
');fshowwindowsclos('showwindow');" style='cursor: hand;'></div>
<form name="formupdate" method="post">
  <table width="98%" align="center" cellpadding="3" cellspacing="1" class="i_table">
	<tbody>
	<tr><td colspan=24 align="center" class="head">数据表查询</td></tr>
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
<div align=right class=itemtag><img src='image/msg/edit.gif' alt='保存' onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
&table=<?php echo $this->_tpl_vars['sqltable']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\')')" style='cursor: hand;' /> <img src='image/msg/closed.gif' alt='关闭' onclick="getNews('showtable','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
');fshowwindowsclos('showwindow');" style='cursor: hand;'></div>
<?php elseif ($this->_tpl_vars['option'] == 'columns'): ?>
<div align=right class=itemtag><img src='image/msg/closed.gif' alt='关闭' onclick="fshowwindowsclos('showwindow');" style='cursor: hand;'></div>
<table width="98%" align="center" cellpadding="3" cellspacing="1" class="i_table">
	<tr><td colspan="7" align="center" class="head">数据表<?php echo $this->_tpl_vars['table']; ?>
结构</td></tr>
	<tr class=b align="center">
		<td>字段</td>
        <td>类型</td>
        <td>整理</td>
        <td>属性</td>
        <td>Null</td>
        <td>额外</td>
	    <td>操作</td>
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
        <td><a href="javascript:if(confirm('确定操作吗?'))saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
&table=<?php echo $this->_tpl_vars['table']; ?>
&del=<?php echo $this->_tpl_vars['sqlfile']['Field']; ?>
','formupdate','','getNews(\'showwindow\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
\')');void(null)">删除</a></td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<div align=right class=itemtag><img src='image/msg/closed.gif' alt='关闭' onclick="fshowwindowsclos('showwindow');" style='cursor: hand;'></div>
<?php endif; ?>