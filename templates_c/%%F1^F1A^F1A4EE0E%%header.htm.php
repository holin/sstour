<?php /* Smarty version 2.6.10, created on 2009-12-12 22:47:21
         compiled from header.htm */ ?>
<HTML>
<HEAD>
<Base href="<?php echo $this->_tpl_vars['boardurl']; ?>
">
<TITLE><?php echo $this->_tpl_vars['configwebname']; ?>
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
<LINK href="<?php echo $this->_tpl_vars['boardurl']; ?>
image/lvyou/style.css" type=text/css rel=stylesheet>
<script>var hostpath = '<?php echo $this->_tpl_vars['boardurl']; ?>
';</script>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/ajax.js'></SCRIPT>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/js.js'></SCRIPT>
<script>
var myimages=new Array();
function preloadimages()
{
	for (i=0;i<preloadimages.arguments.length;i++)
	{
		myimages[i]=new Image();
		myimages[i].src=preloadimages.arguments[i];
	}
}
preloadimages("<?php echo $this->_tpl_vars['boardurl']; ?>
image/face/dialogClose0.gif","<?php echo $this->_tpl_vars['boardurl']; ?>
image/face/dialogCloseF.gif","<?php echo $this->_tpl_vars['boardurl']; ?>
image/msg/closed.gif");
</script>
</HEAD>
<body>
<!--header-->
<?php if ($this->_tpl_vars['action'] == 'index'): ?>
<table width="954" border="0" align="center" cellpadding="0" cellspacing="0" class="acount_line">
  <tr>
    <td><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="954" height="274">
      <param name="movie" value="image/lvyou/top.swf">
      <param name="quality" value="high">
      <embed src="image/lvyou/top.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="954" height="274"></embed>
    </object></td>
  </tr>
</table>
<?php else: ?>
<table width="954" border="0" align="center" cellpadding="0" cellspacing="0" class="acount_line">
  <tr>
    <td><img src="image/lvyou/jingqu_2.gif" width=192 height=45 alt=""></td>
    <td><img src="image/lvyou/jingqu_3.gif" width=200 height=45 alt=""></td>
    <td><img src="image/lvyou/jingqu_4.gif" width=224 height=45 alt=""></td>
    <td><img src="image/lvyou/jingqu_5.gif" width=338 height=45 alt=""></td>
  </tr>
  <tr>
    <td><img src="image/lvyou/jingqu_7.gif" width=192 height=80 alt=""></td>
    <td colspan="4" background="image/lvyou/jingqu_8.gif"><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" width="761" height="80">
      <param name="movie" value="image/lvyou/menu.swf">
      <param name="quality" value="high">
      <param name="wmode" value="transparent">
      <embed src="image/lvyou/menu.swf" width="761" height="80" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent"></embed>
    </object></td>
  </tr>
  <tr>
    <td><img src="image/lvyou/jingqu_9.gif" width=192 height=100 alt=""></td>
    <td><img src="image/lvyou/jingqu_10.gif" width=200 height=100 alt=""></td>
    <td><img src="image/lvyou/jingqu_11.gif" width=224 height=100 alt=""></td>
    <td><img src="image/lvyou/jingqu_12.gif" width=338 height=100 alt=""></td>
  </tr>  
</table>
<?php endif; ?>