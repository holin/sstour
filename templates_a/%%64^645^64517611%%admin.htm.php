<?php /* Smarty version 2.6.10, created on 2010-09-11 13:05:38
         compiled from admin.htm */ ?>
<form name="formupdate" method="post" action="">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table style="table-layout: fixed;word-wrap:break-word;">
    <tr>
      <td class=head> 后 台 组 件 管 理</td>
    </tr>
	<tr>
      <td class=b><?php echo $this->_tpl_vars['showtext']; ?>
</td>
    </tr>
  </table>
  <br>
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="3" class=head> 添 加 后 台 组 件</td>
    </tr>
	<tr>
      <td class=b>后台组件名</td>
	  <td class=b>关键字</td>
      <td class=b>属于组</td>
	</tr>
	<tr>
      <td class=b><input type="text" size="20" name="addsubject" value=""></td>
	  <td class=b><input type="text" size="10" name="addsp" value=""></td>
      <td class=b><select name="addlive">
	  <?php $_from = $this->_tpl_vars['soptions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['soption']):
?>
	  <?php echo $this->_tpl_vars['soption']; ?>

	  <?php endforeach; endif; unset($_from); ?>
	  </select></td>
	</tr>
  </table>
  <BR />
  <center><input type=hidden name=update value='update'> &nbsp; 
    <input type="button" name="Submit" id=Submit value=" 提 交 " onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\')')">
  </center>
</form>