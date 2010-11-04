<?php /* Smarty version 2.6.10, created on 2010-02-21 16:46:17
         compiled from buildhotel.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip', 'buildhotel.htm', 52, false),array('modifier', 'strip_tags', 'buildhotel.htm', 52, false),)), $this); ?>
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
<LINK href="<?php echo $this->_tpl_vars['boardurl']; ?>
image/lvyou/style.css" type=text/css rel=stylesheet>
<script>var hostpath = '<?php echo $this->_tpl_vars['boardurl']; ?>
';</script>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/ajax.js'></SCRIPT>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/js.js'></SCRIPT>
<script>
function publish_hotel()
{
	if ($('subject').value == ''){
		_error_msg_show('酒店名不能识别通过:S');
		$('subject').focus();
		$('submit').disabled=false;
		return false;
	}
	if ($('addess').value == ''){
		_error_msg_show('地址不能识别通过:S');
		$('addess').focus();
		$('submit').disabled=false;
		return false;
	}
	if ($('contact').value == ''){
		_error_msg_show('联系人不能识别通过:S');
		$('contact').focus();
		$('submit').disabled=false;
		return false;
	}
	if ($('phone').value == ''){
		_error_msg_show('电话不能识别通过:S');
		$('phone').focus();
		$('submit').disabled=false;
		return false;
	}
	
	var s = new dialog();s.init();
	s.set('src','3');
	s.set('title','系统提示');
	s.event('正在上传请耐心等待', ' ','',' ');
	document.getElementById('publishgamedate').action = "<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=buildhotel&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
";
}
</script>
</HEAD>
<body>
<div class="subheader" style="margin-left:10px"><?php if ($this->_tpl_vars['sql_hotel']['hot_id']):  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_hotel']['hot_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp));  else: ?>升级为酒店管理<?php endif; ?></div>
<div class="left" style="margin-left:20px">
  <form action="" method="post" onSubmit="return publish_hotel();" enctype="multipart/form-data" name="publishgamedate" id="publishgamedate" target="updateFrame">
    <div class="left_articles">
      <h2>酒店名：
        <input name="subject" type="text" style="width:150px" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_hotel']['hot_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" />
      </h2>
	  <h2>地址：
        <input name="addess" style="width:150px" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_hotel']['hot_addess'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
      </h2>
	  <h2>TAG：
        <input onFocus="showtextcontent('index.php?action=hotel&option=showtage');" type="text" name="blog_tags" style="width:150px" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_hotel']['hot_tages'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
      </h2>	
	  <h2>星级：
        <div class="start">
		  <ul>
<li><a onMouseOver="rateHover(0,6,'start');" onMouseOut="rateOut('startseld',6,'start');" onClick="setRate('0','startseld');" title="无"> </a></li>
		    <li><a id=start1 onMouseOver="rateHover(1,6,'start');" onMouseOut="rateOut('startseld',6,'start');" onClick="setRate('1','startseld');" class=seldea title="一星级"> </a></li>
			<li><a id=start2 onMouseOver="rateHover(2,6,'start');" onMouseOut="rateOut('startseld',6,'start');" onClick="setRate('2','startseld');" title="二星级"> </a></li>
			<li><a id=start3 onMouseOver="rateHover(3,6,'start');" onMouseOut="rateOut('startseld',6,'start');" onClick="setRate('3','startseld');" title="三星级"> </a></li>
			<li><a id=start4 onMouseOver="rateHover(4,6,'start');" onMouseOut="rateOut('startseld',6,'start');" onClick="setRate('4','startseld');" title="四星级"> </a></li>
			<li><a id=start5 onMouseOver="rateHover(5,6,'start');" onMouseOut="rateOut('startseld',6,'start');" onClick="setRate('5','startseld');" title="五星级"> </a></li>
			<li><a id=start6 onMouseOver="rateHover(6,6,'start');" onMouseOut="rateOut('startseld',6,'start');" onClick="setRate('6','startseld');" title="超五星级"> </a></li>
		  </ul>
		  <?php if ($this->_tpl_vars['sql_hotel']['hot_start'] > 0): ?>
		  <input type="hidden" name="startseld" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_hotel']['hot_start'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" />
		  <script>rateHover(<?php echo $this->_tpl_vars['sql_hotel']['hot_start']; ?>
,6,'start')</script>
		  <?php else: ?>
		  <input type="hidden" name="startseld" value="1" />
		  <?php endif; ?>
		</div>
      </h2>
	  <h2>联系人：
        <input name="contact" style="width:150px" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_hotel']['hot_contact'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
      </h2>
	  <h2>电话：
        <input name="phone" style="width:150px" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_hotel']['hot_phone'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
      </h2>  
    </div>
	<div class="left_articles">
	<input type="hidden" name="update" value="update">
	<input type=submit style="background:url(<?php echo $this->_tpl_vars['boardurl']; ?>
image/edit/smb_btn_bg.gif);width:62;height:23; border:0;cursor: hand;" name=submit id=submit value=' 提 交 '>	
	</div>
  </form>
</div>
<div id=showtage></div>
<iframe width=0 height=0  frameborder=0 id=updateFrame name=updateFrame src='ioime.php'>您的浏览器不支持此功能，请您使用最新的版本。</iframe>
</body>
</HTML>