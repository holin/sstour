<?php /* Smarty version 2.6.10, created on 2010-02-21 16:53:06
         compiled from members.htm */ ?>
<?php if ($this->_tpl_vars['option'] == 'index'): ?>
<form name="formupdate" method="post" action="">
<table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
  <tr>
    <td colspan="4" class=head> �� �� �� Ϣ �� ��</td>
  </tr>
  <tr>
    <td class=b>�û���</td>
    <td class=b>��</td>
    <td class=b>����</td>
    <td class=b>����</td>
  </tr>
  <?php $_from = $this->_tpl_vars['sql_news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>
  <tr id='list<?php echo $this->_tpl_vars['news']['uid']; ?>
' onclick="onclickclass('list<?php echo $this->_tpl_vars['news']['uid']; ?>
');" class=movclick style='cursor: hand;'>
    <td><?php echo $this->_tpl_vars['news']['username']; ?>
</td>
    <td><?php echo $this->_tpl_vars['news']['group_name']; ?>
</td>
    <td><?php echo $this->_tpl_vars['news']['useremail']; ?>
</td>
    <td><a href="javascript:fshowwindowsopen('showwindow');fshowwindows('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=newsedit&id=<?php echo $this->_tpl_vars['news']['uid']; ?>
&page=<?php echo $this->_tpl_vars['nPage']; ?>
',1,'�༭�û�');">�༭</a> 
	<a href="javascript:_confirm_msg_show('ȷ��ɾ���û�<?php echo $this->_tpl_vars['news']['username']; ?>
', 'saveUserlogin(\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=del&id=<?php echo $this->_tpl_vars['news']['uid']; ?>
\',\'formupdate\',\'\',\'getNews(\\\'showtable\\\',\\\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\\\')\')', '', '');">ɾ��</a></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <tr>
    <td colspan="4" class=b><?php echo $this->_tpl_vars['fpageup']; ?>
</td>
  </tr>
  <tr>
    <td colspan="4" class=b>�û���:<input name="Keyword" id=Keyword type="text" size="20" value="<?php echo $this->_tpl_vars['Keyword']; ?>
"><a href="javascript:getNews('showtable','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&Keyword='+escape(document.getElementById('Keyword').value));">��ѯ</a></td>
  </tr>
</table>
</form>
<?php elseif ($this->_tpl_vars['option'] == 'newsedit'): ?>
<form name=formupdatedit method=post action=''><input type=hidden name=edit value='edit'>
<table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
  <tr>
    <td class=head colspan="2"> �� �� �� Ϣ �� ��</td>
  </tr>
  <tr>
    <td class=b>�û�����</td><td><input type=text name='username' value='<?php echo $this->_tpl_vars['sql_news']['username']; ?>
'></td>
  </tr>
  <tr>
    <td class=b>���룺</td><td><input type=text name='userpwd' value=''>(���޸Ŀɲ���)</td>
  </tr>
  <tr>
    <td class=b>�û��飺</td><td><select name='groupid'><?php echo $this->_tpl_vars['showoption']; ?>
</select></td>
  </tr>
  <tr>
    <td class=b>�����ַ��</td><td><input type=text name='useremail' value='<?php echo $this->_tpl_vars['sql_news']['useremail']; ?>
'></td>
  </tr>
</table>
<center>
    <input type=hidden name="uid" value='<?php echo $this->_tpl_vars['sql_news']['uid']; ?>
'>    
    <input type=hidden name=update value='update'>	
	<input id=Submit name=Submit type=button style="width:62px;height:22px;border:0;background:url('./image/edit/smb_btn_bg.gif');line-height:20px;" value='ȷ��' onfocus=true onclick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
','formupdatedit','','getNews(\'showtable\',\'admin.php?action=members&page=<?php echo $this->_tpl_vars['nPage']; ?>
\');fshowwindowsopen(\'showwindow\');fshowwindows(\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=newsedit&id=<?php echo $this->_tpl_vars['sql_news']['uid']; ?>
\',1,\'�༭�û�\');');" /> &nbsp; <input id=Submit name=Submit type=button style="width:62px;height:22px;border:0;background:url('./image/edit/smb_btn_bg.gif');line-height:20px;" value='ȡ��' onclick="new dialog().reset();fshowwindowsclos('showwindow');" />
  </center>
</form>
<?php endif; ?>