<?php /* Smarty version 2.6.10, created on 2009-12-13 01:39:42
         compiled from travelattrs.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip', 'travelattrs.htm', 73, false),array('modifier', 'strip_tags', 'travelattrs.htm', 73, false),array('modifier', 'truncate', 'travelattrs.htm', 75, false),)), $this); ?>
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
			<li><a id=start5 title="AAAAA��"> </a></li>
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
">��ҳ</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=article&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
">��Ѷ</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=travelyou&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
 ">·��</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=travelattrs&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
">����</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=travelphoto&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
">���</a></li>
        <li><a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=travelword&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
">����</a></li>
      </ul>
    </div>
  </div>
  <div id="content" class="xspace-layout1">
    <div id="mainarea" class="mainarea-side">
      <div id="xspace-guide"> ����λ��: <a href="<?php echo $this->_tpl_vars['boardurl']; ?>
"><?php echo $this->_tpl_vars['configwebname']; ?>
</a> &raquo; <a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=single&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
"><?php echo $this->_tpl_vars['sql_travel']['sc_subject']; ?>
</a> &raquo; <a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=travelattrs&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
">����</a></div>
	  <div id="show">
        <ul class="xspace-listtab">
          <li class="xspace-sublist xspace-active"><a>���䰸��</a></li>
          <li class=""><a href="javascript:;" onClick="fshowwindows('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=travelattr&type=edit&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
',1,'��Ӱ���');">��Ӱ���</a></li>
        </ul>
        <div>
          <ul class="xspace-itemlist">
            <?php $_from = $this->_tpl_vars['sql_travelattr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['travelattr']):
?>
			<li class="xspace-loglist">
              <h4 class="xspace-entrytitle"> <a href="index.php?action=travel&option=travelattr&id=<?php echo $this->_tpl_vars['travelattr']['attr_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['travelattr']['attr_id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['travelattr']['attr_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></h4>
              <p class="xspace-smalltxt"> <?php echo $this->_tpl_vars['travelattr']['attr_date']; ?>
 <a href="javascript:;" onClick="fshowwindows('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=travelattr&type=edit&id=<?php echo $this->_tpl_vars['travelattr']['attr_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['travelattr']['attr_id']; ?>
',1,'�޸İ���');">�޸�</a> <a href="javascript:;" onClick="_confirm_msg_show('ȷ��ɾ������Ʊ', 'Userloginon(\'<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=travelattr&type=del&id=<?php echo $this->_tpl_vars['travelattr']['attr_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['travelattr']['attr_id']; ?>
\',\'\',\'\',\'location.href=\\\'<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=travelattrs&id=<?php echo $this->_tpl_vars['travelattr']['attr_hid']; ?>
\\\'\');', '', '');">ɾ��</a></p>
              <div class="xspace-itemmessage" id="xspace-item169"> <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['travelattr']['attr_content'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 300, "", true) : smarty_modifier_truncate($_tmp, 300, "", true)); ?>
</div>
            </li>
			<?php endforeach; endif; unset($_from); ?>
          </ul>
        </div>
		<?php if ($this->_tpl_vars['fpageup']): ?><div class="left_links" style="width:100%"><?php echo $this->_tpl_vars['fpageup']; ?>
</div><?php endif; ?>
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
spaces.php?action=showhotel&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
"></script>
        </ul>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">��������</h3>
        <div style="padding:10px 10px 10px 10px">
          <input type="text" id="searchkey" name="searchkey" style="height:24px;" value="" />
          <input type="button"  style="background-image:url(image/admin/search_go.gif);height:24px;width:24px;cursor:hand;" onClick="fScreening('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=travel&option=single&id=<?php echo $this->_tpl_vars['sql_travel']['sc_id']; ?>
&Keyword='+escape($('searchkey').value))" name="submit" id="submit" value="" />
        </div>
        <p id=showtraveltage></p>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">���䰸��</h3>
        <ul class="xspace-list" id=showtravelattr>
        </ul>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">�Ƽ�ͼƬ</h3>
        <ul class="xspace-list" id=showtravelphoto>
        </ul>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">�������</h3>
        <p id=showtravelinfo></p>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">���罻ͨ</h3>
        <p id=showtraveltraffic></p>
      </div>
      <div class="xspace-sideblock">
        <h3 class="xspace-blocktitle">����ͳ��</h3>
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
 ִ��ʱ�䣺<?php echo $this->_tpl_vars['rentime']; ?>
</p>
</div>
<div id=showtage></div>
<iframe frameborder="0" height="0" width="0" scrolling="no" id=iframeupdate name=iframeupdate></iframe>
<div id=showwindow></div>
</body>
</html>