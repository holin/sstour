<?php /* Smarty version 2.6.10, created on 2009-12-17 22:22:49
         compiled from scenicthread.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip', 'scenicthread.htm', 34, false),array('modifier', 'strip_tags', 'scenicthread.htm', 34, false),)), $this); ?>
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
      <div id="xspace-spacename"><strong><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_scenic']['sc_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
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
"><?php echo $this->_tpl_vars['sql_scenic']['sc_subject']; ?>
</a> &raquo; <a href="<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=article&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
">��Ѷ</a></div>
	  <div id="show">
        <div>
          <ul class="xspace-itemlist">
            <li class="xspace-loglist">
              <h4 class="xspace-entrytitle"> <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_hotelthread']['thr_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</h4>
              <p class="xspace-smalltxt"> <?php echo $this->_tpl_vars['sql_hotelthread']['thr_date']; ?>
 <a>�鿴(<?php echo $this->_tpl_vars['sql_hotelthread']['thr_views']; ?>
)</a> <a href="javascript:;" onClick="fshowwindows('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=scenicarticle&type=edit&id=<?php echo $this->_tpl_vars['sql_hotelthread']['thr_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['sql_hotelthread']['thr_id']; ?>
',1,'�޸���Ѷ');">�޸�</a> <a href="javascript:;" onClick="_confirm_msg_show('ȷ��ɾ����Ѷ', 'Userloginon(\'<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=scenicarticle&type=del&id=<?php echo $this->_tpl_vars['sql_hotelthread']['thr_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['sql_hotelthread']['thr_id']; ?>
\',\'\',\'\',\'location.href=\\\'<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=scenicarticle&id=<?php echo $this->_tpl_vars['sql_hotelthread']['thr_hid']; ?>
\\\'\');', '', '');">ɾ��</a></p>
              <div class="xspace-itemmessage" id="xspace-item169"><?php echo $this->_tpl_vars['sql_hotelthread']['thr_content']; ?>
</div>
            </li>
          </ul>
        </div>
		<div id="showthreadword"></div>
		<div id="xspace-itemform">
		<fieldset>
          <form id="commentform" name="commentform" method="post">            
            <legend>����˵����</legend>
            <p>
              <label for="xspace-commentmsg">����</label>
              <textarea name="message" style="width:280px;height:8em;vertical-align:text-top;" id="message"></textarea>
            </p>
            <p>
              <label for="xspace-nickname">�ǳ�</label>
              <input type="text" size="20" id="nickname" name="nickname" value="<?php echo $this->_tpl_vars['uname']; ?>
" /></p>
            <p class="xspace-seccodeline">
              <label for="xspace-seccode">��֤</label>
			  <input type='text' maxLength=4 name='gdcode' style="ime-mode:disabled" size=10>
              <label for="xspace-seccode"><iframe id=gdcodeiframe src="<?php echo $this->_tpl_vars['boardurl']; ?>
update.php?action=authimg" width="50" height="20" marginheight="0" marginwidth="0" scrolling="no"></iframe></label>
            </p>
            <p><input type="hidden" name="hid" value="<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
" />
			<input type="hidden" name="tid" value="<?php echo $this->_tpl_vars['sql_hotelthread']['thr_id']; ?>
" />
			  <input type=button name=submit id=submit value='��������' onClick="saveUserlogin('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=word&option=scenicthreadword','commentform','','');">
            </p>            
          </form>
		  </fieldset>
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
        <h3 class="xspace-blocktitle">��������</h3>
        <p id=showscenicinfo></p>
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
getNews('showthreadword','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=scenic&option=showthreadword&id=<?php echo $this->_tpl_vars['sql_scenic']['sc_id']; ?>
&Industry=<?php echo $this->_tpl_vars['sql_hotelthread']['thr_id']; ?>
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