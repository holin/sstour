<?php /* Smarty version 2.6.10, created on 2010-02-21 16:54:39
         compiled from updatehotel.htm */ ?>
<table width="432" border="0" align="center" cellpadding="0" cellspacing="0">
  <form action="" method="post" enctype="multipart/form-data" name="publishgamedate" id="publishgamedate">
	<tr>
      <td width="65" align="right" valign="top">酒店介绍：</td>
      <td width="367"><textarea name="hot_info" cols="50" rows="10"><?php echo $this->_tpl_vars['sql_hotel']['hot_info']; ?>
</textarea></td>
    </tr>
	<tr>
      <td align="right" valign="top">酒店交通：</td>
      <td><textarea name="hot_traffic" cols="50" rows="10"><?php echo $this->_tpl_vars['sql_hotel']['hot_traffic']; ?>
</textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center" valign="top"><input type="hidden" name="update" value="update" />
        <input type=button style="background:url(<?php echo $this->_tpl_vars['boardurl']; ?>
image/edit/smb_btn_bg.gif);width:62;height:23; border:0;cursor: hand;" name=submit id=submit value='修改提交' onClick="saveUserlogin('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=hotelinfo&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
','publishgamedate','','');">
      </td>
    </tr>
  </form>
</table>