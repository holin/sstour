<?php /* Smarty version 2.6.10, created on 2010-09-11 12:56:55
         compiled from images.htm */ ?>
<form name="formupdatedit" method="post" action="">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="2" class=head> ͼ Ƭ �� Ϣ �� ��</td>
    </tr>
    <?php $_from = $this->_tpl_vars['sql_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['images']):
?>
    <tr id='list<?php echo $this->_tpl_vars['images']['img_picid']; ?>
' onclick="onclickclass('list<?php echo $this->_tpl_vars['images']['img_picid']; ?>
');" class=movclick style='cursor: hand;'>
      <td><img width="120" height="120" src="<?php echo $this->_tpl_vars['images']['img_picsrc']; ?>
" /></td>
      <td><pre><input type=hidden name="picid[<?php echo $this->_tpl_vars['images']['img_picid']; ?>
]" value='<?php echo $this->_tpl_vars['images']['img_picid']; ?>
'>  
	��С��  <?php echo $this->_tpl_vars['images']['img_picsize']; ?>
K<BR />
	�û�ID��<?php echo $this->_tpl_vars['images']['img_uid']; ?>

	���֣�  <?php echo $this->_tpl_vars['images']['img_filg']; ?>

	ɾ����  <input type="checkbox" name="del[<?php echo $this->_tpl_vars['images']['img_picid']; ?>
]" value="<?php echo $this->_tpl_vars['images']['img_picid']; ?>
" />
	</pre></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    <tr>
      <td colspan="2" class=b><?php echo $this->_tpl_vars['fpageup']; ?>
</td>
    </tr>
    <tr>
      <td colspan="2" class=b> �û�ID(����):
        <input name="Keyword" id=Keyword type="text" size="20" value="<?php echo $this->_tpl_vars['Keyword']; ?>
">
        <a href="javascript:getNews('showtable','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&Keyword='+escape(document.getElementById('Keyword').value));">��ѯ</a></td>
    </tr>
  </table>
  <center>
    <input type=hidden name=update value='update'>
	<input type='button' style="width:62px;height:22px;border:0;background:url('./image/edit/smb_btn_bg.gif');line-height:20px;" name='chkall' value=' ȫ ѡ ' onclick='CheckAll(this.form)'>
    <input id=Submit name=Submit type=button style="width:62px;height:22px;border:0;background:url('./image/edit/smb_btn_bg.gif');line-height:20px;" value='ɾ��' onfocus=true onclick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=del','formupdatedit','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&Keyword=<?php echo $this->_tpl_vars['Keyword']; ?>
&page=<?php echo $this->_tpl_vars['nPage']; ?>
\');');" />
  </center>
</form>