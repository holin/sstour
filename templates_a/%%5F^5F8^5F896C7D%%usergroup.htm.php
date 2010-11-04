<?php /* Smarty version 2.6.10, created on 2010-11-04 21:45:50
         compiled from usergroup.htm */ ?>
<form name="formupdate" method="post" action="admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
" enctype="multipart/form-data">
  <table align="center" cellpadding="3" cellspacing="1" class="i_table">
    <tbody>
      <tr class=b>
        <td>原始密码:</td>
		<td><input name="oldpwd" type="text" id="oldpwd" /></td>
      </tr>
	  <tr class=b>
        <td>新密码:</td>
		<td><input name="newpwd" type="text" id="newpwd" /></td>
      </tr>
	  <tr class=b>
        <td>重复确认密码:</td>
		<td><input name="repwd" type="text" id="repwd" /></td>
      </tr>
    </tbody>
  </table>
  <BR />
  <center><input type=hidden name=update value='update'> &nbsp; 
    <input type="button" name="Submit" id=Submit value=" 提 交 " onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\')')">
  </center>
</form>