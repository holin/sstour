<?php /* Smarty version 2.6.10, created on 2009-12-14 17:12:37
         compiled from scenic.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip', 'scenic.htm', 62, false),array('modifier', 'strip_tags', 'scenic.htm', 62, false),)), $this); ?>
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
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['boardurl']; ?>
image/lvyou/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['boardurl']; ?>
image/lvyou/space.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['boardurl']; ?>
image/lvyou/scenic.css" />
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
</head>
<body>
<div id="wrap">
  <div id="header">
    <div id="spacename">
      <div id="xspace-spacename"><strong><?php echo $this->_tpl_vars['sql_scenic']['sc_subject']; ?>
</strong>
        <p><a href="javascript:;" class="xspace-copyurl" onClick="javascript:setCopy('<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['REQUEST_URI']; ?>
');" title="���Ƶ�ַ">copy</a> <a href="<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['REQUEST_URI']; ?>
" title="�����ղ�" class="xspace-add2fav" onClick="javascript:addBookmark('<?php echo $this->_tpl_vars['sql_hotel']['hot_subject']; ?>
','<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['REQUEST_URI']; ?>
');return false;">Bookmark</a>
        <div class="start">
          <ul>
            <li><a id=start1 class=seldea title="A��"> </a></li>
            <li><a id=start2 title="AA��"> </a></li>
            <li><a id=start3 title="AAA��"> </a></li>
            <li><a id=start4 title="AAAA��"> </a></li>
          </ul>
          <script>rateHover(<?php echo $this->_tpl_vars['sql_scenic']['sc_start']; ?>
,4,'start')</script>
        </div>
        </p>
      </div>
    </div>
    <div id="menu">
      <ul id="xspace-menu">
        <li class="xspace-active"><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
"><?php echo $this->_tpl_vars['configwebname']; ?>
</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=single&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
">��ҳ</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=article&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
">��Ѷ</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=scenicyou&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
 ">�μ�</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=scenicattrs&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
">����</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=scenicphoto&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
">���</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=scenicword&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
">����</a></li>
      </ul>
    </div>
  </div>
  <div id="content" class="xspace-layout1">
    <div id="mainarea" class="mainarea-side">
      <div id="xspace-guide"> ����λ��: <a href="<?php echo $this->_tpl_vars['boardurl']; ?>
"><?php echo $this->_tpl_vars['configwebname']; ?>
</a> &raquo; <a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=single&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_scenic']['sc_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></div>
	  <div id="content" class="xspace-layout1">
	  	<div id="newentries">
			<h3 class="xspace-blocktitle">��������</h3>
			<div id=showscenicinfo></div>
		</div>
		<div id="newentries">
			<h3 class="xspace-blocktitle">�������</h3>
			<ul class="xspace-list2col">
			<?php $_from = $this->_tpl_vars['sql_hotelroom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelroom']):
?>
			<li><a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=scenicattr&id=<?php echo $this->_tpl_vars['hotelroom']['attr_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelroom']['attr_id']; ?>
'><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['hotelroom']['attr_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
		<div id="newentries" style="width:100%;margin:5px;">
			<h3 class="xspace-blocktitle">����ͼƬ</h3>
			<?php $_from = $this->_tpl_vars['sql_hotelimage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelimage']):
?>
			<div style="width:122px; border:1 solid #6AC369; padding:2px; float:left; margin:5px;"><a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=scenicphoto&id=<?php echo $this->_tpl_vars['hotelimage']['hi_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
'><img src='<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['hotelimage']['hi_src']; ?>
' width=120 height=80 alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['hotelimage']['hi_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" /></a></div>
			<?php endforeach; endif; unset($_from); ?>
		</div>
		<div id="newentries">
			<h3 class="xspace-blocktitle">������Ѷ</h3>
			<ul class="xspace-list2col">
			<?php $_from = $this->_tpl_vars['sql_hotelthread']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelthread']):
?>
			<li><a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=thread&id=<?php echo $this->_tpl_vars['hotelthread']['thr_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelthread']['thr_id']; ?>
'><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['hotelthread']['thr_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
		<div id="newentries">
			<h3 class="xspace-blocktitle">�����μ�</h3>
			<ul class="xspace-list2col">
			<?php $_from = $this->_tpl_vars['sql_hotelyou']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelyou']):
?>
			<li><a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=cenicyouthread&id=<?php echo $this->_tpl_vars['hotelyou']['thr_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelyou']['thr_id']; ?>
'><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['hotelyou']['thr_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
	  </div>
    </div>    
    <div id="sideleft" class="sidearea">
      <div id="avatar" class="xspace-sideblock">
        <div id="xspace-avatar"></div>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">�û��˵�</h3>
        <ul id="xspace-action">
          <script src="<?php echo $this->_tpl_vars['boardurl']; ?>
spaces.php?action=showhotel&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
"></script>
        </ul>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">��������</h3>
        <div style="padding:10px 10px 10px 10px">
          <input type="text" id="searchkey" name="searchkey" style="height:24px;" value="" />
          <input type="button"  style="background-image:url(image/admin/search_go.gif);height:24px;width:24px;cursor:hand;" onClick="fScreening('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=single&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
&Keyword='+escape($('searchkey').value))" name="submit" id="submit" value="" />
        </div>
        <p id=showscenictage></p>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">�Ƽ�����</h3>
        <ul class="xspace-list" id=showscenicattr>
        </ul>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">�Ƽ�ͼƬ</h3>
        <ul class="xspace-list" id=showscenicphoto>
        </ul>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">������ͨ</h3>
        <p id=showscenictraffic></p>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">����ͳ��</h3>
        <ul class="xspace-list" id=showsceniclist>
        </ul>
      </div>
    </div>
  </div>
</div>
<script>
getNews('xspace-avatar','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=showhotlogo&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
');
getNews('showscenictage','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=showscenictage&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
');
getNews('showscenicattr','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=showscenicattr&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
');
getNews('showscenicphoto','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=showscenicphoto&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
');
getNews('showscenicinfo','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=showscenicinfo&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
');
getNews('showscenictraffic','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=showscenictraffic&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
');
getNews('showsceniclist','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=showsceniclist&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
');
</script>
<div id="xspace-footer">
  <p id="xspace-footer-ad"><?php echo $this->_tpl_vars['cache_config']['hack_adfoot']; ?>
</p>
  <p id="xspace-copyright"><?php echo $this->_tpl_vars['POPlv']; ?>
 ִ��ʱ�䣺<?php echo $this->_tpl_vars['rentime']; ?>
</p>
</div>
<div id=showtage></div>
<iframe frameborder="0" height="0" width="0" scrolling="no" id=iframeupdate name=iframeupdate></iframe>
<div id=showwindow></div>
</body>
</html>