<?php /* Smarty version 2.6.10, created on 2010-01-07 17:48:36
         compiled from index.htm */ ?>
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
<LINK href="lang/admin.css" type=text/css rel=stylesheet>
<script>var hostpath = '<?php echo $this->_tpl_vars['boardurl']; ?>
';</script>
<SCRIPT language=JavaScript src='lang/ajax.js'></SCRIPT>
<SCRIPT language=JavaScript src='lang/js.js'></SCRIPT>
<SCRIPT language=JavaScript src='lang/tables.js'></SCRIPT>
<script type="text/javascript" src="lang/calendar.js"></script>
<style type="text/css">
<!--
body{margin:0;padding:0;background:url("image/edit/bg0.gif");}
body, td{font-size:12px}
.menu_box_pad{background:#fdf9d5;padding:0 2px 2px 2px}
.menu_box{border-top:1px solid #ababab;border-left:1px solid #ababab;border-right:1px solid #d6d6d6;border-bottom:1px solid #d6d6d6}
.menu_box th{background:url('image/edit/menu_list_icon.gif') no-repeat center;line-height:22px;width:10px}
.menu_box td{background:url('image/edit/menu_list_split.gif') no-repeat left bottom;line-height:20px}
.menu_box a{text-decoration:none;color:#000}
.menu_box a:hover{text-decoration:underline}
.hand{cursor:hand;cursor:pointer}
.ctrl_menu{border-left:1px solid #767676;border-bottom:1px solid #767676;border-right:1px solid #767676;background:#ffcf60}
.ctrl_menu_title{padding-left:15px;font-weight:bold;line-height:25px}
.ctrl_menu_title_bg{background:url('image/edit/menu_title_bg.gif')}
.top_bg{background:url("image/edit/top_bg.gif")}
.logo_bg{background:url("image/edit/logo_bg.gif")}
#top_nav_menu {color:#fff}
#top_nav_menu a{text-decoration:none;color:#fff}
#top_nav_menu a:hover{text-decoration:underline;color:#ff6}
.movclick {background-color:#F1F1F1}
.onclick{background-color:#FF9900;}
-->
</style>
<script>
function upload_setring(fco,url){
	elems=document.getElementById(fco).elements;
	var d = new parent.dialog();d.init();
	d.set('src','3');
	d.set('title','系统提示');
	d.event('正在提交信息请耐心等待', ' ','',' ');
	elems.submit();
}
function mmsfsqlbck(fco)
{
	var elems=document.getElementById(fco).elements;
	var str="";
	for(var i=0;i<elems.length;i++){
		var elem = elems[i];
		if(elem.name!=""){
			if(elem.type.toLowerCase()=="checkbox" && elem.checked){
				str += elem.value + "_sql_";
			}
		}
	}
	var seturl = 'admin.php?action=sqladmin&option=sqlback&update=sqlback&tables='+str+'&table=1&start=0&sizelimit='+document.getElementById('sizelimit').value+'&np=0';
	//document.getElementById('tablename').checked;
	maineditshow('showtable',seturl);
}
function publish_game()
{
	var s = new dialog();s.init();
	s.set('src','3');
	s.set('title','系统提示');
	s.event('正在上传请耐心等待', ' ','',' ');
	document.getElementById('publishgamedate').action = "<?php echo $this->_tpl_vars['boardurl']; ?>
admin.php?action=honor";
	return true;
}
</script>
</head>
<body>
<table width="100%"  border="0" cellpadding="0" cellspacing="0" id="bodyTable">
  <tr>
    <td height="84" align="left" valign="bottom" class="top_bg"><!--页面TOP头-->
      <table width="100%"  border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="252" align="right" valign="bottom"><table width="220" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="50" align="left" class="logo_bg">&nbsp; 用户名:<?php echo $this->_tpl_vars['uname']; ?>
<br>
                  &nbsp; 组级别:<?php echo $this->_tpl_vars['groupname']; ?>
</td>
              </tr>
              <tr>
                <td onClick="switchShow()" class="hand" align="left"><img id="arrow" src="image/edit/control_switch_up.gif" width="205" height="21" /></td>
              </tr>
            </table></td>
          <td align="left" valign="bottom"><table width="720" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="30" width="720" align="right"><!--导航菜单-->
                  <div id="top_nav_menu"> <a target="_top" href="index.php">HOME</a>&nbsp;┆&nbsp;<a target="_top" href="javascript:;" onClick="_confirm_msg_show('确定退出系统', 'location.href=\'admin.php?action=login&option=quit\'', '', '')
				  ">退出</a>&nbsp;&nbsp; </div>
                  <!--/导航菜单-->
                </td>
              </tr>
              <tr>
                <td height="21"><div id=namemsg></div></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <!--/页面TOP头-->
    </td>
  </tr>
</table>
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td id="left" width="252" valign="top"><table align="right" width="220" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="50" align="left" valign="top"><!-- 控制面板菜单 -->
            <table width="205"  border="0" cellspacing="0" cellpadding="0" class="ctrl_menu">
              <!-- 快速通道 -->
              <?php $_from = $this->_tpl_vars['sql_admin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['admin']):
?>
              <!-- 快速通道 -->
              <?php if ($this->_tpl_vars['admin']['type_live'] == '0'): ?>
              <?php $_from = $this->_tpl_vars['actionall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['actionalls']):
?>
              <?php if ($this->_tpl_vars['admin']['type_sp'] == $this->_tpl_vars['actionalls'] || $this->_tpl_vars['allsystem'] == 'all'): ?>
              <tr>
                <td align="center"><table width="195" border="0" cellspacing="0" cellpadding="0" class="ctrl_menu_title_bg">
                    <tr class="hand" onClick="hide('hideMenuFunc<?php echo $this->_tpl_vars['admin']['type_id']; ?>
')">
                      <td width="174" class="ctrl_menu_title"><?php echo $this->_tpl_vars['admin']['type_subject']; ?>
</td>
                      <td width="21"><image id='MenuFunc<?php echo $this->_tpl_vars['admin']['type_id']; ?>
' src="image/edit/menu_title_up.gif"></td>
                    </tr>
                    <tr id="hideMenuFunc<?php echo $this->_tpl_vars['admin']['type_id']; ?>
" style="display:none">
                      <td align="left" colspan="2" class="menu_box_pad" ><table width="100%" border="0" cellspacing="5" cellpadding="0" class="menu_box">
                          <?php $_from = $this->_tpl_vars['sql_admin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['admin_list']):
?>
                          <?php if ($this->_tpl_vars['admin_list']['type_live'] == $this->_tpl_vars['admin']['type_id']): ?>
                          <?php $_from = $this->_tpl_vars['actionall']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['actionalllist']):
?>
                          <?php if ($this->_tpl_vars['admin_list']['type_sp'] == $this->_tpl_vars['actionalllist'] || $this->_tpl_vars['allsystem'] == 'all'): ?>
                          <tr>
                            <th>&nbsp;</th>
                            <td><a href="javascript:getNews('showtable','admin.php?action=<?php echo $this->_tpl_vars['admin_list']['type_sp']; ?>
');"><?php echo $this->_tpl_vars['admin_list']['type_subject']; ?>
</a></td>
                          </tr>
                          <?php endif; ?>
                          <?php endforeach; endif; unset($_from); ?>
                          <?php endif; ?>
                          <?php endforeach; endif; unset($_from); ?>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr height="5">
                <td></td>
              </tr>
              <?php endif; ?>
              <?php endforeach; endif; unset($_from); ?>
              <?php endif; ?>
              <!-- /快速通道 -->
              <?php endforeach; endif; unset($_from); ?>
              <!-- /快速通道 -->
            </table></td>
        </tr>
      </table></td>
    <td align="center" valign="top"><div id=showtable style="overflow: auto;height:450px;width:100%" align="left"></div></td>
  </tr>
</table>
<center>
  <div id="showwindow" style="width:0%;height:0px;table-layout: fixed;word-wrap:break-word;"></div>
  <hr>
  <?php echo $this->_tpl_vars['POPlv']; ?>
 gzTime：<?php echo $this->_tpl_vars['rentime']; ?>

</center>
<script type="text/javascript">getNews('showtable','admin.php?action=main');</script>
<script>
function preview_iconpubgame(){
	if (document.getElementById('uploadicongame').value != ''){
		document.getElementById('icongame').src = document.getElementById('uploadicongame').value;
	}
}
</script>
</body>
</html>