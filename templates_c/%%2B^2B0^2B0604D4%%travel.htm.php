<?php /* Smarty version 2.6.10, created on 2009-12-12 22:47:47
         compiled from travel.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip', 'travel.htm', 73, false),array('modifier', 'strip_tags', 'travel.htm', 73, false),)), $this); ?>
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
</head>
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
        <div class="start" style="display:none;">
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
</a></div>
	  <div id="content" class="xspace-layout1">
	  	<div id="newentries">
			<h3 class="xspace-blocktitle">旅行社介绍</h3>
			<div id=showtravelinfo></div>
		</div>
		<div id="newentries">
			<h3 class="xspace-blocktitle" style="width:100%;margin:5px;">成功案例</h3>
			<ul class="xspace-list2col">
			<?php $_from = $this->_tpl_vars['sql_hotelroom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelroom']):
?>
            <li><a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=travelattr&id=<?php echo $this->_tpl_vars['hotelroom']['attr_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelroom']['attr_id']; ?>
'><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['hotelroom']['attr_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
		<div id="newentries">
			<h3 class="xspace-blocktitle">旅行社资讯</h3>
			<ul class="xspace-list2col">
			<?php $_from = $this->_tpl_vars['sql_hotelthread']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelthread']):
?>
			<li><a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=thread&id=<?php echo $this->_tpl_vars['hotelthread']['thr_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelthread']['thr_id']; ?>
'><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['hotelthread']['thr_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></li>
			<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
		<div id="newentries">
			<h3 class="xspace-blocktitle" style="width:100%;margin:5px;">旅行社图片</h3>
			<ul class="xspace-list2col">
			<?php $_from = $this->_tpl_vars['sql_hotelimage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelimage']):
?>
			<div style="width:122px; border:1 solid #6AC369; padding:2px; float:left; margin:5px;"><a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=travelphoto&id=<?php echo $this->_tpl_vars['hotelimage']['hi_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelimage']['hi_id']; ?>
'><img src='<?php echo $this->_tpl_vars['boardurl'];  echo $this->_tpl_vars['hotelimage']['hi_src']; ?>
' width=120 height=80 alt="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['hotelimage']['hi_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
" /></a></div>
			<?php endforeach; endif; unset($_from); ?>
			</ul>
		</div>
		<div id="newentries">
			<h3 class="xspace-blocktitle">路线推荐</h3>
			<ul class="xspace-list2col">
			<?php $_from = $this->_tpl_vars['sql_hotelyou']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelyou']):
?>
			<li><a href='<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=travelyouthread&id=<?php echo $this->_tpl_vars['hotelyou']['thr_hid']; ?>
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
        <h3 class="xspace-blocktitle">用户菜单</h3>
        <ul id="xspace-action">
          <script src="<?php echo $this->_tpl_vars['boardurl']; ?>
spaces.php?action=showhotel&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
"></script>
        </ul>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">标题搜索</h3>
        <div style="padding:10px 10px 10px 10px">
          <input type="text" id="searchkey" name="searchkey" style="height:24px;" value="" />
          <input type="button"  style="background-image:url(image/admin/search_go.gif);height:24px;width:24px;cursor:hand;" onClick="fScreening('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=single&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
&Keyword='+escape($('searchkey').value))" name="submit" id="submit" value="" />
        </div>
        <p id=showtraveltage></p>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">经典案例</h3>
        <ul class="xspace-list" id=showtravelattr>
        </ul>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">推荐图片</h3>
        <ul class="xspace-list" id=showtravelphoto>
        </ul>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">本社交通</h3>
        <p id=showtraveltraffic></p>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">数据统计</h3>
        <ul class="xspace-list" id=showtravellist>
        </ul>
      </div>
    </div>
  </div>
</div>
<script>
getNews('xspace-avatar','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=showhotlogo&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
');
getNews('showtraveltage','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=showtraveltage&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
');
getNews('showtravelattr','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=showtravelattr&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
');
getNews('showtravelphoto','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=showtravelphoto&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
');
getNews('showtravelinfo','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=showtravelinfo&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
');
getNews('showtraveltraffic','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=showtraveltraffic&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
');
getNews('showtravellist','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=showtravellist&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
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
</html>