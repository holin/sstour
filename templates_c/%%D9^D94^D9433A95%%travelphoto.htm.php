<?php /* Smarty version 2.6.10, created on 2009-12-12 22:54:43
         compiled from travelphoto.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'travelphoto.htm', 104, false),)), $this); ?>
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
image/lvyou/hotel.css" />
<script>var hostpath = '<?php echo $this->_tpl_vars['boardurl']; ?>
';</script>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/ajax.js'></SCRIPT>
<SCRIPT language=JavaScript src='<?php echo $this->_tpl_vars['boardurl']; ?>
lang/js.js'></SCRIPT>
<script>
function publish_uploadphoto()
{
	if($('uploadsubject').value=='')
	{
		_error_msg_show('图片主题错误:S');
		$('submit').disabled=false;
		return false;
	}
	if($('uploadphoto').value=='')
	{
		_error_msg_show('图片错误:S');
		$('submit').disabled=false;
		return false;
	}
	
	var s = new dialog();s.init();
	s.set('src','3');
	s.set('title','系统提示');
	s.event('正在上传请耐心等待', ' ','',' ');
	$('publishuploadphoto').action = "<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=travelphoto&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
";
}
function preview_uploadphoto(){
	if ($('uploadphoto').value != ''){
		$('iconphoto').src = $('uploadphoto').value;
	}
}
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
<div id="wrap">
  <div id="header">
    <div id="spacename">
      <div id="xspace-spacename"><strong><?php echo $this->_tpl_vars['sql_travel']['sc_subject']; ?>
</strong>
        <p><a href="javascript:;" class="xspace-copyurl" onClick="javascript:setCopy('<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['REQUEST_URI']; ?>
');" title="复制地址">copy</a> <a href="<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['REQUEST_URI']; ?>
" title="加入收藏" class="xspace-add2fav" onClick="javascript:addBookmark('<?php echo $this->_tpl_vars['sql_hotel']['hot_subject']; ?>
','<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['REQUEST_URI']; ?>
');return false;">Bookmark</a>
        <div class="start">
          <ul>
            <li><a id=start1 class=seldea title="A级"> </a></li>
            <li><a id=start2 title="AA级"> </a></li>
            <li><a id=start3 title="AAA级"> </a></li>
            <li><a id=start4 title="AAAA级"> </a></li>
			<li><a id=start5 title="AAAAA级"> </a></li>
          </ul>
          <script>rateHover(<?php echo $this->_tpl_vars['sql_travel']['sc_start']; ?>
,5,'start')</script>
        </div>
        </p>
      </div>
    </div>
    <div id="menu">
      <ul id="xspace-menu">
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
"><?php echo $this->_tpl_vars['configwebname']; ?>
</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=single&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
">首页</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=article&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
">资讯</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=travelyou&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
 ">路线</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=travelattrs&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
">案例</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=travelphoto&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
">相册</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=travelword&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
">留言</a></li>
      </ul>
    </div>
  </div>
  <div id="content" class="xspace-layout1">
    <div id="mainarea" class="mainarea-side">
      <div id="xspace-guide"> 您的位置: <a href="<?php echo $this->_tpl_vars['boardurl']; ?>
"><?php echo $this->_tpl_vars['configwebname']; ?>
</a> &raquo; <a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=single&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
"><?php echo $this->_tpl_vars['sql_travel']['sc_subject']; ?>
</a> &raquo; <a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=travelphoto&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
">相册</a></div>
    </div>
  </div>
  <?php if ($this->_tpl_vars['Industry'] != ''): ?>
  <div class="xspace-imagebox">
    <div style="width:120px" onMouseMove="$('showimgdel_<?php echo $this->_tpl_vars['sql_hotelimage']['hi_id']; ?>
').style.display='block'" onMouseOut="$('showimgdel_<?php echo $this->_tpl_vars['sql_hotelimage']['hi_id']; ?>
').style.display='none'" id='showimg_<?php echo $this->_tpl_vars['sql_hotelimage']['hi_id']; ?>
'>
      <div class="image" style="float:right;position:absolute;display:none;" id='showimgdel_<?php echo $this->_tpl_vars['sql_hotelimage']['hi_id']; ?>
'> <?php if ($this->_tpl_vars['sql_hotelimage']['hi_pass'] == '0'): ?> <img src="image/msg/pin_1.gif" onClick="getNews('showimgdel_<?php echo $this->_tpl_vars['sql_hotelimage']['hi_id']; ?>
','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=travelphoto&id=<?php echo $this->_tpl_vars['sql_hotelimage']['hi_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['sql_hotelimage']['hi_id']; ?>
&type=pass')" alt="推荐图片" /> <?php else: ?> <img src="image/msg/error.gif" onClick="getNews('showimgdel_<?php echo $this->_tpl_vars['sql_hotelimage']['hi_id']; ?>
','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=travelphoto&id=<?php echo $this->_tpl_vars['sql_hotelimage']['hi_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['sql_hotelimage']['hi_id']; ?>
&type=delpass')" alt="取消推荐" /> <?php endif; ?> <img src="image/msg/closed.gif" onClick="_confirm_msg_show('确定删除图片', 'getNews(\'showimg_<?php echo $this->_tpl_vars['sql_hotelimage']['hi_id']; ?>
\',\'<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=travelphoto&id=<?php echo $this->_tpl_vars['sql_hotelimage']['hi_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['sql_hotelimage']['hi_id']; ?>
&type=del\');$(\'showimg_<?php echo $this->_tpl_vars['sql_hotelimage']['hi_id']; ?>
\').parentNode.removeChild($(\'showimg_<?php echo $this->_tpl_vars['sql_hotelimage']['hi_id']; ?>
\'))', '', '')" alt="删除图片" /></div>
      <img src='<?php echo $this->_tpl_vars['sql_hotelimage']['hi_src']; ?>
' alt='<?php echo $this->_tpl_vars['sql_hotelimage']['hi_subject']; ?>
' /><BR />
      <?php echo $this->_tpl_vars['sql_hotelimage']['hi_subject']; ?>
</a></div>
  </div>
  <?php else: ?>
  <div class="left_links" style="width:100%" align="center"> <?php $_from = $this->_tpl_vars['sql_hotelimage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelimage']):
?>
    <div class="image" style="width:120px" onMouseMove="$('showimgdel_<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
').style.display='block'" onMouseOut="$('showimgdel_<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
').style.display='none'" id='showimg_<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
'>
      <div class="image" style="float:right;position:absolute;display:none;" id='showimgdel_<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
'> <?php if ($this->_tpl_vars['hotelimage']['hi_pass'] == '0'): ?> <img src="image/msg/pin_1.gif" onClick="getNews('showimgdel_<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=travelphoto&id=<?php echo $this->_tpl_vars['hotelimage']['hi_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
&type=pass')" alt="推荐图片" /> <?php else: ?> <img src="image/msg/error.gif" onClick="getNews('showimgdel_<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=travelphoto&id=<?php echo $this->_tpl_vars['hotelimage']['hi_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
&type=delpass')" alt="取消推荐" /> <?php endif; ?> <img src="image/msg/closed.gif" onClick="_confirm_msg_show('确定删除图片', 'getNews(\'showimg_<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
\',\'<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=travelphoto&id=<?php echo $this->_tpl_vars['hotelimage']['hi_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
&type=del\');$(\'showimg_<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
\').parentNode.removeChild($(\'showimg_<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
\'))', '', '')" alt="删除图片" /></div>
      <a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=travelphoto&id=<?php echo $this->_tpl_vars['hotelimage']['hi_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
' target='_blank' title='<?php echo $this->_tpl_vars['hotelimage']['hi_subject']; ?>
'><img width="100" height="100" src='<?php echo $this->_tpl_vars['hotelimage']['hi_src']; ?>
' alt='<?php echo $this->_tpl_vars['hotelimage']['hi_subject']; ?>
' /><BR />
      <?php echo ((is_array($_tmp=$this->_tpl_vars['hotelimage']['hi_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 10, "", true) : smarty_modifier_truncate($_tmp, 10, "", true)); ?>
</a></div>
    <?php endforeach; endif; unset($_from); ?> </div>
  <?php if ($this->_tpl_vars['fpageup']): ?>
  <div class="left_links" style="width:100%"><?php echo $this->_tpl_vars['fpageup']; ?>
</div>
  <?php endif; ?>
  <?php endif; ?>
  <?php if ($this->_tpl_vars['Industry'] == ''): ?>
  <div class="xspace-msgmodule">
    <form onSubmit="publish_uploadphoto()" action="" method="post" enctype="multipart/form-data" name="publishuploadphoto" id="publishuploadphoto" target="updateFrame">
      <h5>上传图片</h5>
      <ul class="xspace-list">
        <li>主题:
          <input type="text" name="uploadsubject" size="40" />
        </li>
        <li>图片:
          <input type="file" name="uploadphoto" size="40" onChange="preview_uploadphoto();" />
          &nbsp;

          <input type="submit" style="{width:62px;height:22px;border:0;background:url('image/edit/smb_btn_bg.gif');line-height:20px;" name="submit" value=" 上 传 " />
        </li>
      </ul>
      <div align="center"><img src="image/lvyou/questionmark.gif" name="iconphoto" width="60" height="60" />
        <iframe width=0 height=0  frameborder=0 id=updateFrame name=updateFrame src=''></iframe>
      </div>
    </form>
  </div>
  <?php else: ?>
  <div class="xspace-msgmodule">
    <h5>图片分享</h5>
    <ul class="xspace-list">
      <li>主题地址:
        <input type="text" value="<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['REQUEST_URI']; ?>
" size="80" onMouseOver="this.select();" />
        <br />
        <span style="padding-left: 4.5em; color: #999;">通过E-mail / MSN / QQ，把图片地址告诉你的好友</span></li>
      <li>图片地址:
        <input type="text" value="<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['sql_hotelimage']['hi_src']; ?>
" size="80" onMouseOver="this.select();" />
        <br />
        <span style="padding-left: 4.5em; color: #999;">在各类论坛、Blog的文章编辑器中选择“插入图片”，直接复制就可以了</span></li>
    </ul>
  </div>
  <?php endif; ?> </div>
<div id="xspace-footer">
  <p id="xspace-footer-ad"><?php echo $this->_tpl_vars['cache_config']['hack_adfoot']; ?>
</p>
  <p id="xspace-copyright"><?php echo $this->_tpl_vars['POPlv']; ?>
 执行时间：<?php echo $this->_tpl_vars['rentime']; ?>
</p>
</div>
<div id=showtage></div>
<iframe frameborder="0" height="0" width="0" scrolling="no" id=iframeupdate name=iframeupdate></iframe>
<div id=showwindow></div>
</body>
</HTML>