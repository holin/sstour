<?php /* Smarty version 2.6.10, created on 2010-06-27 20:03:39
         compiled from tages.htm */ ?>
<form name="formupdatedit" method="post" action="">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="3" class=head> 图 片 信 息 管 理</td>
    </tr>
	<tr>
      <td>TAG</td>
	  <td>使用量</td>
	  <td>操作</td>
    </tr>
    <?php $_from = $this->_tpl_vars['sql_comtag']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['comtag']):
?>
    <tr id='list<?php echo $this->_tpl_vars['comtag']['tag_id']; ?>
' onclick="onclickclass('list<?php echo $this->_tpl_vars['comtag']['tag_id']; ?>
');" class=movclick style='cursor: hand;'>
      <td><?php echo $this->_tpl_vars['comtag']['tag_subject']; ?>
</td>
	  <td><?php echo $this->_tpl_vars['comtag']['tag_num']; ?>
</td>
      <td><input type=hidden name="tagid[<?php echo $this->_tpl_vars['comtag']['tag_id']; ?>
]" value='<?php echo $this->_tpl_vars['comtag']['tag_id']; ?>
'>  
	  <input type="checkbox" name="del[<?php echo $this->_tpl_vars['comtag']['tag_id']; ?>
]" value="<?php echo $this->_tpl_vars['comtag']['tag_id']; ?>
" /></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    <tr>
      <td colspan="3" class=b><?php echo $this->_tpl_vars['fpageup']; ?>
</td>
    </tr>
    <tr>
      <td colspan="3" class=b> 关键字:
        <input name="Keyword" id=Keyword type="text" size="20" value="<?php echo $this->_tpl_vars['Keyword']; ?>
">
        <a href="javascript:getNews('showtable','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&Keyword='+escape(document.getElementById('Keyword').value));">查询</a></td>
    </tr>
  </table>
  <center>
    <input type=hidden name=update value='update'>
	<input type='button' style="width:62px;height:22px;border:0;background:url('./image/edit/smb_btn_bg.gif');line-height:20px;" name='chkall' value=' 全 选 ' onclick='CheckAll(this.form)'>
    <input id=Submit name=Submit type=button style="width:62px;height:22px;border:0;background:url('./image/edit/smb_btn_bg.gif');line-height:20px;" value='删除' onfocus=true onclick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=del','formupdatedit','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&Keyword=<?php echo $this->_tpl_vars['Keyword']; ?>
&page=<?php echo $this->_tpl_vars['nPage']; ?>
\');');" />
  </center>
</form>