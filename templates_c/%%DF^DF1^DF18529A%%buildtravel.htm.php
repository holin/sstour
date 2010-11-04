<?php /* Smarty version 2.6.10, created on 2010-02-01 00:40:25
         compiled from buildtravel.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip', 'buildtravel.htm', 52, false),array('modifier', 'strip_tags', 'buildtravel.htm', 52, false),)), $this); ?>
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
function publish_scenic()
{
	if ($('subject').value == ''){
		_error_msg_show('旅行社名不能识别通过:S');
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
index.php?action=update&option=buildtravel&id=<?php echo $this->_tpl_vars['sql_hotel']['sc_id']; ?>
";
}
</script>
</HEAD>
<body>
<div class="subheader" style="margin-left:10px"><?php if ($this->_tpl_vars['sql_hotel']['sc_id']):  echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_hotel']['sc_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp));  else: ?>升级为旅行社管理<?php endif; ?></div>
<div class="left" style="margin-left:20px">
  <form action="" method="post" onSubmit="return publish_scenic();" enctype="multipart/form-data" name="publishgamedate" id="publishgamedate" target="updateFrame">
    <div class="left_articles">
      <h2>旅行社名：
        <input name="subject" type="text" style="width:150px" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_hotel']['sc_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" />
      </h2>
	  <h2>地址：
        <input name="addess" style="width:150px" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_hotel']['sc_addess'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
      </h2>
	  <h2>TAG：
        <input onFocus="showtextcontent('index.php?action=travel&option=showtage');" type="text" name="blog_tags" style="width:150px" value="<?php echo $this->_tpl_vars['sql_hotel']['sc_tages']; ?>
">
      </h2>	
	  <!--<h2>旅行社级别：
        <div class="start">
		  <ul>
		    <li><a id=start1 onMouseOver="rateHover(1,5,'start');" onMouseOut="rateOut('startseld',5,'start');" onClick="setRate('1','startseld');" class=seldea title="A级"> </a></li>
			<li><a id=start2 onMouseOver="rateHover(2,5,'start');" onMouseOut="rateOut('startseld',5,'start');" onClick="setRate('2','startseld');" title="AA级"> </a></li>
			<li><a id=start3 onMouseOver="rateHover(3,5,'start');" onMouseOut="rateOut('startseld',5,'start');" onClick="setRate('3','startseld');" title="AAA级"> </a></li>
			<li><a id=start4 onMouseOver="rateHover(4,5,'start');" onMouseOut="rateOut('startseld',5,'start');" onClick="setRate('4','startseld');" title="AAAA级"> </a></li>
			<li><a id=start5 onMouseOver="rateHover(5,5,'start');" onMouseOut="rateOut('startseld',5,'start');" onClick="setRate('5','startseld');" title="AAAAA级"> </a></li>
		  </ul>
		  <?php if ($this->_tpl_vars['sql_hotel']['sc_start'] > 0): ?>
		  <input type="hidden" name="startseld" value="<?php echo $this->_tpl_vars['sql_hotel']['sc_start']; ?>
" />
		  <script>rateHover(<?php echo $this->_tpl_vars['sql_hotel']['sc_start']; ?>
,5,'start')</script>
		  <?php else: ?>
		  <input type="hidden" name="startseld" value="1" />
		  <?php endif; ?>
		</div>-->
      </h2>
	  <h2>联系人：
        <input name="contact" style="width:150px" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_hotel']['sc_contact'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
      </h2>
	  <h2>电话：
        <input name="phone" style="width:150px" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_hotel']['sc_phone'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
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