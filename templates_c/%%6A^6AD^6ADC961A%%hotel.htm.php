<?php /* Smarty version 2.6.10, created on 2009-12-13 01:00:46
         compiled from hotel.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip', 'hotel.htm', 34, false),array('modifier', 'strip_tags', 'hotel.htm', 34, false),)), $this); ?>
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
      <div id="xspace-spacename"> <strong><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_hotel']['hot_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</strong>
        <p> <a href="javascript:;" class="xspace-copyurl" onClick="javascript:setCopy('<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['REQUEST_URI']; ?>
');" title="复制地址">copy</a> <a href="<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['REQUEST_URI']; ?>
" title="加入收藏" class="xspace-add2fav" onClick="javascript:addBookmark('<?php echo $this->_tpl_vars['sql_hotel']['hot_subject']; ?>
','<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['REQUEST_URI']; ?>
');return false;">Bookmark</a>
        <div class="start">
          <ul>
            <li><a id=start1 class=seldea title="一星级"> </a></li>
            <li><a id=start2 title="二星级"> </a></li>
            <li><a id=start3 title="三星级"> </a></li>
            <li><a id=start4 title="四星级"> </a></li>
            <li><a id=start5 title="五星级"> </a></li>
            <li><a id=start6 title="超五星级"> </a></li>
          </ul>
          <script>rateHover(<?php echo $this->_tpl_vars['sql_hotel']['hot_start']; ?>
,6,'start')</script>
        </div>
        </p>
      </div>
    </div>
    <div id="menu">
      <ul id="xspace-menu">
        <li class="xspace-active"><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['configwebname'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=single&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
">首页</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=hotelarticle&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
">资讯</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=hotelyou&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
 ">游记</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=hotelroom&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
">房间</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=hotelphoto&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
">相册</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=hotelword&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
">留言</a></li>
      </ul>
    </div>
  </div>
  <div id="content" class="xspace-layout1">
    <div id="mainarea" class="mainarea-side">
      <div id="xspace-guide"> 您的位置: <a href="<?php echo $this->_tpl_vars['boardurl']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['configwebname'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a> &raquo; <a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=single&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
"><?php echo $this->_tpl_vars['sql_hotel']['hot_subject']; ?>
</a></div>
      <div id="content" class="xspace-layout1">
	  	<div id="newentries">
			<h3 class="xspace-blocktitle">酒店介绍</h3>
			<div id=showhotinfo></div>
		</div>
		<div id="newentries">
			<h3 class="xspace-blocktitle" style="width:100%;margin:5px;">房间介绍</h3>
			<ul class="xspace-list2col">
			<?php $_from = $this->_tpl_vars['sql_hotelroom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelroom']):
?>
			<div style="width:122px; border:1 solid #6AC369; padding:2px; float:left; margin:5px;"><a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=hotelroom&id=<?php echo $this->_tpl_vars['hotelroom']['room_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelroom']['room_id']; ?>
'><img src='<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['hotelroom']['room_image']; ?>
' width=120 height=90 alt="<?php echo $this->_tpl_vars['hotelroom']['room_subject']; ?>
" /></a></div>
			<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
		<div id="newentries">
			<h3 class="xspace-blocktitle">酒店资讯</h3>
			<ul class="xspace-list2col">
			<?php $_from = $this->_tpl_vars['sql_hotelthread']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelthread']):
?>
			<li><a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=hotelthread&id=<?php echo $this->_tpl_vars['hotelthread']['thr_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelthread']['thr_id']; ?>
'><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['hotelthread']['thr_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
		<div id="newentries">
			<h3 class="xspace-blocktitle" style="width:100%;margin:5px;">酒店图片</h3>
			<ul class="xspace-list2col">
			<?php $_from = $this->_tpl_vars['sql_hotelimage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelimage']):
?>
			<div style="width:122px; border:1 solid #6AC369; padding:2px; float:left; margin:5px;"><a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=hotelphoto&id=<?php echo $this->_tpl_vars['hotelimage']['hi_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
'><img src='<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['hotelimage']['hi_src']; ?>
' width=120 height=80 alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['hotelimage']['hi_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" /></a></div>
			<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
		<div id="newentries">
			<h3 class="xspace-blocktitle">酒店游记</h3>
			<ul class="xspace-list2col">
			<?php $_from = $this->_tpl_vars['sql_hotelyou']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelyou']):
?>
			<li><a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=hotelyouthread&id=<?php echo $this->_tpl_vars['hotelyou']['thr_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelyou']['thr_id']; ?>
'><?php echo $this->_tpl_vars['hotelyou']['thr_subject']; ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
	  </div>
    </div>
    <div id="sideleft" class="sidearea">
      <div class="xspace-sideblock">
        <div id="xspace-avatar"></div>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">用户菜单</h3>
        <ul id="xspace-action">
          <script src="<?php echo $this->_tpl_vars['boardurl']; ?>
spaces.php?action=showhotel&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
"></script>
        </ul>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">标题搜索</h3>
        <div style="padding:10px 10px 10px 10px">
          <input type="text" id="searchkey" name="searchkey" style="height:24px;" value="" /><input type="button"  style="background-image:url(image/admin/search_go.gif);height:24px;width:24px;cursor:hand;" onClick="fScreening('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=single&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
&Keyword='+escape($('searchkey').value))" name="submit" id="submit" value="" />
		</div>
        <p id=showhottage></p>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">推荐房间</h3>
        <ul class="xspace-list" id=showhotroom></ul>
      </div>      
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">推荐图片</h3>
        <ul class="xspace-list" id=showhotphoto></ul>
      </div>
	  <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">酒店交通</h3>
        <p id=showhottraffic></p>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">数据统计</h3>
        <ul class="xspace-list" id=showhotlist></ul>
      </div>
    </div>
  </div>
</div>
<script>
getNews('xspace-avatar','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showhotlogo&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
');
getNews('showhottage','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showhottage&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
');
getNews('showhotroom','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showhotroom&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
');
getNews('showhotphoto','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showhotphoto&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
');
getNews('showhotinfo','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showhotinfo&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
');
getNews('showhottraffic','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showhottraffic&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
');
getNews('showhotlist','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showhotlist&id=<?php echo $this->_tpl_vars['sql_hotel']['hot_id']; ?>
');
</script>
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