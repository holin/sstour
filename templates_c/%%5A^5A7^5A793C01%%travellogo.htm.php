<?php /* Smarty version 2.6.10, created on 2010-02-01 00:53:38
         compiled from travellogo.htm */ ?>
<HTML>
<HEAD>
<Base href="<?php echo $this->_tpl_vars['boardurl']; ?>
">
<TITLE><?php echo $this->_tpl_vars['config']['title']; ?>
_<?php echo $this->_tpl_vars['configwebname']; ?>
</TITLE>
<meta name=robots content='index,follow'>
<Meta http-equiv="Widow-target" Content="_top">
<meta name=keywords content='<?php echo $this->_tpl_vars['config']['keywords']; ?>
'>
<meta name=description content='<?php echo $this->_tpl_vars['config']['description']; ?>
'>
<META http-equiv=Content-Type content="text/html; charset=<?php echo $this->_tpl_vars['charset']; ?>
">
<LINK href="<?php echo $this->_tpl_vars['boardurl']; ?>
lang/style.css" type=text/css rel=stylesheet>
<script>var hostpath = '<?php echo $this->_tpl_vars['boardurl']; ?>
';</script>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/ajax.js'></SCRIPT>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/js.js'></SCRIPT>
<script>
function preview_iconpubgame(){
	if (document.getElementById('uploadicongame').value != ''){
		document.getElementById('icongame').src = document.getElementById('uploadicongame').value;
	}
}
function preview_update()
{
	$('previewu').style.display='block';
	$('previewf').style.display='none';
	return true;
}
</script>
</HEAD>
<body>
<div id=previewu style="position:absolute;padding-top:50px;padding-lift:10px;display:none">正在上传图片请等待...</div>
<table id=previewf border="0" align="center" cellpadding="0" cellspacing="0" style="display:block">
  <form onSubmit="preview_update()" action="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
&id=<?php echo $this->_tpl_vars['id']; ?>
" method="post" enctype="multipart/form-data" name="publishgamedate" id="publishgamedate">
    <tr>
      <td rowspan="2"><?php if ($this->_tpl_vars['sql_hotel']['sc_logo'] != ''): ?><img src="<?php echo $this->_tpl_vars['sql_hotel']['sc_logo']; ?>
" name="icongame" width=100 height=100 id='icongame'/><?php else: ?><img src="image/lvyou/image.gif" name="icongame" width=100 height=100 id='icongame'/><?php endif; ?></td>
      <td>上传LOGO图片<br>
        <input type="file" name="uploadicongame" onChange="preview_iconpubgame();" /></td>
    </tr>
	<tr>
      <td colspan="2" align="center" valign="top"><input type="hidden" name="update" value="update" />
      <input type="submit" style="{width:62px;height:22px;border:0;background:url('image/edit/smb_btn_bg.gif');line-height:20px;" name="submit" value=" 上 传 " /></td>
    </tr>
  </form>
</table>
</body>
</HTML>