<?php /* Smarty version 2.6.10, created on 2009-12-12 22:47:22
         compiled from indexlogin.htm */ ?>
<?php if ($this->_tpl_vars['uid'] > '0'): ?>
<table border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><img src="image/lvyou/login_tr.gif" width="193" height="32"></td>
  </tr>
  <tr>
    <td><table width="86%" border="0" align="center" cellspacing="3">
        <tr>
          <td>���ã�<?php echo $this->_tpl_vars['sql_members']['username']; ?>
</td>
        </tr>
        <tr>
          <td>��ӭ������ <a onclick="_confirm_msg_show('ȷ���˳�ϵͳ', 'Userloginon(\'<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=login&option=quit\');', '', '');" href="javascript:;" class="link_more">[�˳���¼]</a></td>
        </tr>
		<?php if ($this->_tpl_vars['sql_members']['cpid'] == '0'): ?>
        <tr>
          <td><a href='javascript:;' onClick="fshowwindows('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=buildhotel&type=edit',1,'����Ϊ�Ƶ����');" >����Ϊ�Ƶ�</a> <a href='javascript:;' onClick="fshowwindows('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=buildscenic&type=edit',1,'����Ϊ��������');">����Ϊ����</a> <a href='javascript:;' onClick="fshowwindows('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=buildtravel&type=edit',1,'����Ϊ���������');">����Ϊ������</a></td>
        </tr>
		<?php elseif ($this->_tpl_vars['sql_members']['categories'] == '1'): ?>
		<tr>
          <td><a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=single&id=<?php echo $this->_tpl_vars['sql_members']['cpid']; ?>
'>�ҵľƵ�</a></td>
        </tr>
		<?php elseif ($this->_tpl_vars['sql_members']['categories'] == '2'): ?>
		<tr>
          <td><a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=single&id=<?php echo $this->_tpl_vars['sql_members']['cpid']; ?>
'>�ҵľ���</a></td>
        </tr>
		<?php elseif ($this->_tpl_vars['sql_members']['categories'] == '3'): ?>
		<tr>
          <td><a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=single&id=<?php echo $this->_tpl_vars['sql_members']['cpid']; ?>
'>�ҵ�������</a></td>
        </tr>
		<?php else: ?>
		<tr>
          <td height="6"></td>
        </tr>
		<?php endif; ?>
        <tr align="right">
          <td align="center"><a href='bbs/index.php'><img src="image/lvyou/bt_login3.gif" width="96" height="25"></a></td>
        </tr>
        <tr>
          <td height="6"></td>
        </tr>
      </table></td>
  </tr>
</table>
<?php else: ?>
<table border="0" cellpadding="0" cellspacing="0">
  <form method="post" name="login" id="login">
    <tr>
      <td><img src="image/lvyou/login_tr.gif" width="193" height="32"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="5" bgcolor="#ffffff">
          <tr>
            <td>�û�����</td>
            <td><input type="text" name="username" style="width:80;" maxlength="40" tabindex="1" onkeydown="if(event.keyCode == 13) {publish_article(); return false;}" /></td>
          </tr>
          <tr>
            <td>��&nbsp; �룺</td>
            <td><input type="password" name="password" style="width:80;" tabindex="2" onkeydown="if(event.keyCode == 13){publish_article(); return false;}" /></td>
          </tr>
          <tr >
            <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td><input style="background:url(image/lvyou/bt_login1.gif);width:70;height:25;border:0;cursor: hand;" type="button" name="submit" value=" " tabindex="3" onclick="publish_article();" /></td>
                  <td><img src="image/lvyou/bt_login2.gif" width="83" height="25" onclick="fshowwindows('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=login&option=regedit',1,'ע��');"></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td colspan="2"><img src="image/lvyou/icon_5.gif" width="9" height="10"> <a href="<?php echo $this->_tpl_vars['boardurl']; ?>
bbs/member.php?action=lostpasswd">���������ˣ�</a></td>
          </tr>
        </table></td>
    </tr>
  </form>
</table>
<?php endif; ?>