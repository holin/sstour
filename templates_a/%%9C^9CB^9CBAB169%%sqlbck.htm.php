<?php /* Smarty version 2.6.10, created on 2010-09-11 13:03:38
         compiled from sqlbck.htm */ ?>
<form name="formupdate" method="post" action="admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
" enctype="multipart/form-data" target='iframeform'>
  <table width="98%" align="center" cellpadding="3" cellspacing="1" class="i_table">
    <tbody>
      <tr>
        <td class="head">数据更新（直接执行sql语句就可以执行）</td>
      </tr>
      <tr class=b>
        <td><textarea name="sqlupdattext" cols="100" rows="10"></textarea>
          只接受单条完整的语句 </td>
      </tr>
      <tr class=b>
        <td><input name="sqlfile" type="file" size="40">
          可以用本地数据操作数据库
          <input type=button value=" 恢 复 数 据 " name=Submit onClick="upload_setring('formupdate');">
        </td>
      </tr>
      <tr class=b align="center">
        <td><table width="98%" align="center" cellpadding="3" cellspacing="1" class="i_table">
            <?php $_from = $this->_tpl_vars['filers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['sqlfile']):
?>
            <tr>
              <td><?php echo $this->_tpl_vars['sqlfile']; ?>
</td>
              <td><?php echo $this->_tpl_vars['filetime'][$this->_tpl_vars['key']]; ?>
</td>
              <td><a href='down.php?<?php echo $this->_tpl_vars['down'][$this->_tpl_vars['key']]; ?>
'>下载</a></td>
              <td><a href="javascript:if(confirm('确定操作吗?'))saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
&id=<?php echo $this->_tpl_vars['sqlfile']; ?>
&type=del','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
\')');void(null)">删除</a></td>
              <td><a href="javascript:if(confirm('确定操作吗?'))maineditshow('showtable','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
&id=<?php echo $this->_tpl_vars['sqlfile']; ?>
&type=into');void(null)">导入</a></td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
          </table></td>
      </tr>
    </tbody>
  </table>
</form>
<iframe hspace="0" height="0" width="0" frameborder="0" name="iframeform"></iframe>