<?php /* Smarty version 2.6.10, created on 2010-02-21 16:54:47
         compiled from updateroom.htm */ ?>
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
<LINK href="../../image/lvyou/style.css" type=text/css rel=stylesheet>
<script>var hostpath = '<?php echo $this->_tpl_vars['boardurl']; ?>
';</script>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/ajax.js'></SCRIPT>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/js.js'></SCRIPT>
<script>var hostpath = '<?php echo $this->_tpl_vars['boardurl']; ?>
';</script>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/ajax.js'></SCRIPT>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/js.js'></SCRIPT>
<script>
function publish_ring()
{
	if ($('roomsubject').value == ''){
		_error_msg_show('房间名称不能识别通过:S');
		$('submit').disabled=false;
		return false;
	}
	
	var s = new dialog();s.init();
	s.set('src','3');
	s.set('title','系统提示');
	s.event('正在上传请耐心等待', ' ','',' ');
	$('publishgamedate').action = "<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=hotelroom&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
&Industry=<?php echo $this->_tpl_vars['sql_hotelroom']['room_id']; ?>
";
}
</script>
</HEAD>
<body>
<div class="left" style="margin-left:20px">
  <form action="" method="post" onSubmit="return publish_ring();" enctype="multipart/form-data" name="publishgamedate" id="publishgamedate" target="updateFrame">
    <div class="left_articles">
      <h5>房间管理</h5>
      <div align="center"><?php if ($this->_tpl_vars['sql_hotelroom']['room_image'] != ''): ?><img src="<?php echo $this->_tpl_vars['sql_hotelroom']['room_image']; ?>
" name="icongame" width="60" height="60" /><?php else: ?><img src="image/lvyou/questionmark.gif" name="icongame" width="60" height="60" /><?php endif; ?>
      </div>
      <ul class="xspace-list">
        <li>上传房间图片:
          <input type="file" name="uploadicongame" onChange="preview_iconpubgame();" />
        </li>
      </ul>
    </div>
    <div class="left_articles">
      <ul class="xspace-list">
        <li>名称:
          <input type="text" name="roomsubject" value="<?php echo $this->_tpl_vars['sql_hotelroom']['room_subject']; ?>
" style="width:150px;" />
          <br />
          <span style="padding-left: 4.5em; color: #999;">房间系列</span></li>
        <li>价格:
          <input type="text" name="roomprice" value="<?php echo $this->_tpl_vars['sql_hotelroom']['room_price']; ?>
" style="width:150px;" />
        </li>
        <li>TAG:
          <input onFocus="showtextcontent('index.php?action=hotel&option=showroomtage');" type="text" name="blog_tags" class="input_text1" value="<?php echo $this->_tpl_vars['sql_hotelroom']['room_tages']; ?>
" style="width:150px;" />
          <br />
          <span style="padding-left: 4.5em; color: #999;">多个TAG请用“,”分开</span></li>
        <li>说明:
          <textarea name="roominfo" cols="30" rows="6"><?php echo $this->_tpl_vars['sql_hotelroom']['room_info']; ?>
</textarea>
        </li>
        <li>
          <input type="hidden" name="update" value="update" />
          <input type="submit" style="{width:62px;height:22px;border:0;background:url('image/edit/smb_btn_bg.gif');line-height:20px;" name="submit" value="确认提交" />
        </li>
      </ul>
    </div>
  </form>
</div>
<iframe width=0 height=0  frameborder=0 id=updateFrame name=updateFrame src=''>您的浏览器不支持此功能，请您使用最新的版本。</iframe>
<script>
function preview_iconpubgame(){
	if (document.getElementById('uploadicongame').value != ''){
		document.getElementById('icongame').src = document.getElementById('uploadicongame').value;
	}
}
</script>
<div id=showtage></div>
</body>
</HTML>