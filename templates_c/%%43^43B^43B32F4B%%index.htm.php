<?php /* Smarty version 2.6.10, created on 2010-07-09 11:41:31
         compiled from index.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'index.htm', 100, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table width="954" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" class="acount_line">
  <tr>
    <td valign="top" class="left_line"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="100%" id=showlogin></td>
        </tr>
        <tr>
          <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#BFE8FE">
              <tr>
                <td ><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td class="txt_title_white">&nbsp;<img src="image/lvyou/ico_white.gif" width="7" height="7"> <a href="index.php?action=info&option=xuexi"><font color="White">深入学习实践科学发展观</font></a></td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td valign="top" id="showmessage"></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td id=showtravel><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'gongkai.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
        </tr>
        <tr>
          <td height="8"></td>
        </tr>
        <tr>
          <td align="center"><a href="index.php?action=info&id=29" target="_blank"><img src="image/lvyou/left_banner.gif" width="193" height="68" border="0"></a></td>
        </tr>
        <tr>
          <td height="8"></td>
        </tr>
        <tr>
          <td id=showabout align="center"></td>
        </tr>
        <tr>
          <td height="5"></td>
        </tr>
        <tr>
          <td align="center"><a href="mailto:sslyj@hotmail.com"><img src="image/lvyou/mail.gif" width="193" height="54" border="0"></a></td>
        </tr>
        <tr>
          <td height="5"></td>
        </tr>
        <tr>
          <td id=showainment></td>
        </tr>
    </table></td>
    <td width="562" valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="1%"><img src="image/lvyou/search_left.gif" width="6" height="45"></td>
                <td width="98%" background="image/lvyou/search_mid.gif"><table width="100%" border="0">
                    <tr>
                      <td width="10%"><img src="image/lvyou/search_ico.gif" width="37" height="38"></td>
                      <td width="16%" class="txt_green" style="font-size:14px;">站内搜索：</td>
                      <td width="22%"><select name="ser_type">
                          <option value="1">酒店</option>
                          <option value="2">景区</option>
                          <option value="3">旅行社</option>
                          <option value="4">酒店游记</option>
                          <option value="5">景区游记</option>
                        </select></td>
                      <td width="33%"><input name="Keyword" type="text" size="20"onkeydown="if(event.keyCode==13)fseachfind()"></td>
                      <td width="19%"><img src="image/lvyou/bt_search.gif" onClick="fseachfind()" width="45" height="18"></td>
                    </tr>
                  </table></td>
                <td width="1%"><img src="image/lvyou/search_right.gif" width="7" height="45"></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="2" height="8"></td>
        </tr>
        <tr>
          <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding:5px;">
              <tr>
                <td valign="top"><table border="0" cellpadding="0" cellspacing="0"  class="border_pic">
                    <tr>
                      <td><iframe frameborder="0" marginheight="0" marginwidth="0" width="205" height="145" src="<?php echo $this->_tpl_vars['boardurl']; ?>
adplay.php"></iframe></td>
                    </tr>
                  </table></td>
                <td width="61%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" background="image/lvyou/td0_m.gif">
                          <tr>
                            <td width="3%"><img src="image/lvyou/td0_l.gif" width="5" height="27"></td>
                            <td width="76%" class="txt_title2"><img src="image/lvyou/icon_1.gif" width="12" height="11"> 最新动态</td>
                            <td width="19%"><a href="index.php?action=news&id=1&read=1"><img src="image/lvyou/td0_m2.gif" width="55" height="27" border="0"></a></td>
                            <td width="2%"><img src="image/lvyou/td0_r.gif" width="6" height="27"></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td><table width="98%" border="0" align="center">
                          <?php $_from = $this->_tpl_vars['sql_news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>
                          <tr class="line_bg">
                            <td><img src="image/lvyou/icon_6.gif" width="4" height="5"> <a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['news']['new_id']; ?>
" title="<?php echo $this->_tpl_vars['news']['new_subject']; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['news']['new_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 41, "...") : smarty_modifier_truncate($_tmp, 41, "...")); ?>
</a> <img src="image/lvyou/bt_new.gif" width="25" height="11"></td>
                          </tr>
                          <?php endforeach; endif; unset($_from); ?>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="8" colspan="2"></td>
        </tr>
        <tr>
          <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td class="td1_bg"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td valign="bottom"><div class="td1_title" style="cursor:hand;width:90px;float:left;" id=tdscenic1 onClick="this.className='td1_title';$('divscenic1').style.display='block';$('tdscenic2').className='txt_title';$('divscenic2').style.display='none'">景 区</div>
                        <div class="txt_title" style="cursor:hand;width:90px;float:left" id=tdscenic2 onClick="this.className='td1_title';$('divscenic2').style.display='block';$('tdscenic1').className='txt_title';$('divscenic1').style.display='none'">景 点</div></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="2" class="td1_border"><div id=divscenic1 style="display:block">
              <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-bottom:5px; margin-top:5px;">
                <tr>
                  <td><div id=demo style='overflow:hidden;height:100;width:100%;'>
                      <table align=left cellpadding=0 cellspace=0 border=0>
                        <tr>
                          <td id=demo1 valign=top><?php $_from = $this->_tpl_vars['sql_scenicimage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['scenic']):
?> <a target="_blank" href="index.php?action=scenic&option=single&id=<?php echo $this->_tpl_vars['scenic']['hi_hid']; ?>
" title="<?php echo $this->_tpl_vars['scenic']['hi_subject']; ?>
"><img src="<?php if ($this->_tpl_vars['scenic']['hi_src'] != ''):  echo $this->_tpl_vars['scenic']['hi_src'];  else: ?>image/lvyou/image.gif<?php endif; ?>" width="129" height="100" alt="<?php echo $this->_tpl_vars['scenic']['hi_subject']; ?>
"></a> <?php endforeach; endif; unset($_from); ?> </td>
                          <td id=demo2 valign=top></td>
                        </tr>
                      </table>
                    </div>
                    <script>
                    var speed=30
                    demo2.innerHTML=demo1.innerHTML
                    demo.scrollLeft=demo.scrollWidth
                    function Marquee(){
                    	if(demo.scrollLeft<=0)
                    	demo.scrollLeft+=demo2.offsetWidth
                    	else{
                    		demo.scrollLeft--
                    	}
                    }
                    var MyMar=setInterval(Marquee,speed)
                    demo.onmouseover=function() {clearInterval(MyMar)}
                    demo.onmouseout=function() {MyMar=setInterval(Marquee,speed)}
 </script>
                  </td>
                </tr>
              </table>
            </div>
            <div id=divscenic2 style="display:none">
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="50%"><table width="98%" border="0" cellpadding="0" cellspacing="2">
                      <tr>
                        <td width="35%"><table border="0" cellpadding="0" cellspacing="0"  class="border_pic">
                            <tr>
                              <td><a href='index.php?action=scenic&option=single&id=<?php echo $this->_tpl_vars['sql_scenic0']['sc_id']; ?>
' target="_blank" title="<?php echo $this->_tpl_vars['sql_scenic0']['sc_subject']; ?>
"><img src="<?php if ($this->_tpl_vars['sql_scenic0']['sc_logo'] != ''):  echo $this->_tpl_vars['sql_scenic0']['sc_logo'];  else: ?>image/lvyou/image.gif<?php endif; ?>" width="80" height="70" alt='<?php echo $this->_tpl_vars['sql_scenic0']['sc_subject']; ?>
'></a></td>
                            </tr>
                          </table></td>
                        <td width="65%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <?php $_from = $this->_tpl_vars['sql_scenicattr0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['scenicattr0']):
?>
                            <tr>
                              <td class="line_bg"><img src="image/lvyou/icon_6.gif" width="4" height="5"> <a href="index.php?action=scenic&option=scenicattr&id=<?php echo $this->_tpl_vars['scenicattr0']['attr_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['scenicattr0']['attr_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['scenicattr0']['attr_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['scenicattr0']['attr_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 27, "...") : smarty_modifier_truncate($_tmp, 27, "...")); ?>
</a></td>
                            </tr>
                            <?php endforeach; endif; unset($_from); ?>
                          </table></td>
                      </tr>
                    </table></td>
                  <td width="1" bgcolor="#cbb17b"></td>
                  <td width="50%" align="right"><table width="98%" border="0" cellpadding="0" cellspacing="2">
                      <tr>
                        <td width="35%"><table border="0" cellpadding="0" cellspacing="0"  class="border_pic">
                            <tr>
                              <td><a href='index.php?action=scenic&option=single&id=<?php echo $this->_tpl_vars['sql_scenic1']['sc_id']; ?>
' target="_blank" title="<?php echo $this->_tpl_vars['sql_scenic1']['sc_subject']; ?>
"><img src="<?php if ($this->_tpl_vars['sql_scenic1']['sc_logo'] != ''):  echo $this->_tpl_vars['sql_scenic1']['sc_logo'];  else: ?>image/lvyou/image.gif<?php endif; ?>" width="80" height="70" alt='<?php echo $this->_tpl_vars['sql_scenic1']['sc_subject']; ?>
'></a></td>
                            </tr>
                          </table></td>
                        <td width="65%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <?php $_from = $this->_tpl_vars['sql_scenicattr1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['scenicattr1']):
?>
                            <tr>
                              <td class="line_bg"><img src="image/lvyou/icon_6.gif" width="4" height="5"> <a href="index.php?action=scenic&option=scenicattr&id=<?php echo $this->_tpl_vars['scenicattr1']['attr_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['scenicattr1']['attr_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['scenicattr1']['attr_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['scenicattr1']['attr_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 27, "...") : smarty_modifier_truncate($_tmp, 27, "...")); ?>
</a></td>
                            </tr>
                            <?php endforeach; endif; unset($_from); ?>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
            </div></td>
        </tr>
        <tr>
          <td height="8" colspan="2"></td>
        </tr>
        <tr>
          <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td class="td2_bg"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td valign="bottom"><div class="td2_title" style="cursor:hand;float:left" id=tdfilg1 onClick="this.className='td2_title';$('divfilg1').style.display='block';$('tdfilg2').className='txt_title';$('divfilg2').style.display='none'">本周推荐</div>
                        <div class="txt_title" style="cursor:hand;float:left" id=tdfilg2 onClick="this.className='td2_title';$('divfilg2').style.display='block';$('tdfilg1').className='txt_title';$('divfilg1').style.display='none'">渔家乐</div></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="2" class="td2_border"><div id=divfilg1 style="display:block">
              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="50%"><table width="98%" border="0" cellpadding="0" cellspacing="2">
                      <tr>
                        <td width="35%"><table border="0" cellpadding="0" cellspacing="0"  class="border_pic">
                            <tr>
                              <td><a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['sql_news111']['new_id']; ?>
"><img src="<?php if ($this->_tpl_vars['sql_news111']['new_image'] != ''):  echo $this->_tpl_vars['sql_news111']['new_image'];  else: ?>image/lvyou/image.gif<?php endif; ?>" width="80" height="70"></a></td>
                            </tr>
                          </table></td>
                        <td width="65%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <?php $_from = $this->_tpl_vars['sql_news113']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news113']):
?>
                            <tr>
                              <td><a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['news113']['new_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['news113']['new_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['news113']['new_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 27, "...") : smarty_modifier_truncate($_tmp, 27, "...")); ?>
</a></td>
                            </tr>
                            <?php endforeach; endif; unset($_from); ?>
                          </table></td>
                      </tr>
                    </table></td>
                  <td width="1" bgcolor="#cbb17b"></td>
                  <td width="50%" align="right"><table width="98%" border="0" cellpadding="0" cellspacing="2">
                      <tr>
                        <td width="35%"><table border="0" cellpadding="0" cellspacing="0"  class="border_pic">
                            <tr>
                              <td><a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['sql_news112']['new_id']; ?>
"><img src="<?php if ($this->_tpl_vars['sql_news112']['new_image'] != ''):  echo $this->_tpl_vars['sql_news112']['new_image'];  else: ?>image/lvyou/image.gif<?php endif; ?>" width="80" height="70"></a></td>
                            </tr>
                          </table></td>
                        <td width="65%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <?php $_from = $this->_tpl_vars['sql_news114']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news114']):
?>
                            <tr>
                              <td><a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['news114']['new_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['news114']['new_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['news114']['new_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 27, "...") : smarty_modifier_truncate($_tmp, 27, "...")); ?>
</a></td>
                            </tr>
                            <?php endforeach; endif; unset($_from); ?>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
            </div>
            <div id=divfilg2 style="display:none">
              <table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td width="50%"><table width="98%" border="0" cellpadding="0" cellspacing="2">
                      <tr>
                        <td width="35%"><table border="0" cellpadding="0" cellspacing="0"  class="border_pic">
                            <tr>
                              <td><a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['sql_news115']['new_id']; ?>
"><img src="<?php if ($this->_tpl_vars['sql_news115']['new_image'] != ''):  echo $this->_tpl_vars['sql_news115']['new_image'];  else: ?>image/lvyou/image.gif<?php endif; ?>" width="80" height="70"></a></td>
                            </tr>
                          </table></td>
                        <td width="65%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr>
                              <td><a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['sql_news115']['new_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['sql_news115']['new_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['sql_news115']['new_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 27, "...") : smarty_modifier_truncate($_tmp, 27, "...")); ?>
</a></td>
                            </tr>
                            <?php $_from = $this->_tpl_vars['sql_news117']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news117']):
?>
                            <tr>
                              <td><a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['news117']['new_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['news117']['new_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['news117']['new_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 27, "...") : smarty_modifier_truncate($_tmp, 27, "...")); ?>
</a></td>
                            </tr>
                            <?php endforeach; endif; unset($_from); ?>
                          </table></td>
                      </tr>
                    </table></td>
                  <td width="1" bgcolor="#cbb17b"></td>
                  <td width="50%" align="right"><table width="98%" border="0" cellpadding="0" cellspacing="2">
                      <tr>
                        <td width="35%"><table border="0" cellpadding="0" cellspacing="0"  class="border_pic">
                            <tr>
                              <td><a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['sql_news116']['new_id']; ?>
"><img src="<?php if ($this->_tpl_vars['sql_news116']['new_image'] != ''):  echo $this->_tpl_vars['sql_news116']['new_image'];  else: ?>image/lvyou/image.gif<?php endif; ?>" width="80" height="70"></a></td>
                            </tr>
                          </table></td>
                        <td width="65%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr>
                              <td><a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['sql_news116']['new_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['sql_news116']['new_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['sql_news116']['new_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 27, "...") : smarty_modifier_truncate($_tmp, 27, "...")); ?>
</a></td>
                            </tr>
                            <?php $_from = $this->_tpl_vars['sql_news118']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news118']):
?>
                            <tr>
                              <td><a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['news118']['new_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['news118']['new_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['news118']['new_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 27, "...") : smarty_modifier_truncate($_tmp, 27, "...")); ?>
</a></td>
                            </tr>
                            <?php endforeach; endif; unset($_from); ?>
                          </table></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
            </div></td>
        </tr>
        <tr>
          <td height="8" colspan="2"></td>
        </tr>
        <tr>
          <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td class="td3_bg"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td valign="bottom">
                        <div class="td3_title" style="cursor:hand;width:90px;float:left" id=tdhotelroom1 onClick="this.className='td3_title';$('divhotelroom1').style.display='block';$('tdhotelroom2').className='txt_title';$('divhotelroom2').style.display='none'">旅行社</div>
						<div class="txt_title" style="cursor:hand;width:90px;float:left;" id=tdhotelroom2 onClick="this.className='td3_title';$('divhotelroom2').style.display='block';$('tdhotelroom1').className='txt_title';$('divhotelroom1').style.display='none'">酒 店</div>
						</td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="2" class="td3_border" height=150 valign=top>
            <div id=divhotelroom1 style="display:block;padding-left:10px;"> <?php $this->assign('foo', '0'); ?>
              <table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin-bottom:5px; margin-top:5px;">
                <?php $_from = $this->_tpl_vars['sql_travelimage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['travelimage']):
?>
                <?php if ($this->_tpl_vars['foo'] == '0'): ?>
                <tr><?php endif; ?>
                  <td class="line_bg"><img src="image/lvyou/icon_6.gif" width="4" height="5"> <a href="index.php?action=travel&option=single&id=<?php echo $this->_tpl_vars['travelimage']['sc_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['travelimage']['sc_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['travelimage']['sc_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 31, "...") : smarty_modifier_truncate($_tmp, 31, "...")); ?>
</a></td>
                  <?php if ($this->_tpl_vars['foo'] == '1'): ?></tr>
                <?php $this->assign('foo', '0');  else:  $this->assign('foo', 1);  endif; ?>
                <?php endforeach; endif; unset($_from); ?>
              </table>
            </div>
			<div id=divhotelroom2 style="display:none;padding-left:10px;">
			<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="50%"><table width="98%" border="0" cellpadding="0" cellspacing="2">
                    <tr>
                      <td width="35%"><table border="0" cellpadding="0" cellspacing="0"  class="border_pic">
                          <tr>
                            <td><a href="index.php?action=hotel&option=single&id=<?php echo $this->_tpl_vars['sql_hotelroom1']['hot_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['sql_hotelroom1']['hot_subject']; ?>
"><img src="<?php if ($this->_tpl_vars['sql_hotelroom1']['hot_logo'] != ''):  echo $this->_tpl_vars['sql_hotelroom1']['hot_logo'];  else: ?>image/lvyou/image.gif<?php endif; ?>" width="80" height="70"></a></td>
                          </tr>
                        </table></td>
                      <td width="65%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
					  	  <tr>
                            <td class="line_bg"><img src="image/lvyou/icon_6.gif" width="4" height="5"> <a href="index.php?action=hotel&option=single&id=<?php echo $this->_tpl_vars['sql_hotelroom1']['hot_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['sql_hotelroom1']['hot_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['sql_hotelroom1']['hot_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...") : smarty_modifier_truncate($_tmp, 25, "...")); ?>
</a></td>
                          </tr>
                          <?php $_from = $this->_tpl_vars['sql_hotelroom3']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelroom3']):
?>
                          <tr>
                            <td class="line_bg"><img src="image/lvyou/icon_6.gif" width="4" height="5"> <a href="index.php?action=hotel&option=single&id=<?php echo $this->_tpl_vars['hotelroom3']['hot_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['hotelroom3']['hot_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['hotelroom3']['hot_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...") : smarty_modifier_truncate($_tmp, 25, "...")); ?>
</a></td>
                          </tr>
                          <?php endforeach; endif; unset($_from); ?>
                        </table></td>
                    </tr>
                  </table></td>
                <td width="1" bgcolor="#cbb17b"></td>
                <td width="50%" align="right"><table width="98%" border="0" cellpadding="0" cellspacing="2">
                    <tr>
                      <td width="35%"><table border="0" cellpadding="0" cellspacing="0"  class="border_pic">
                          <tr>
                            <td><a href="index.php?action=hotel&option=single&id=<?php echo $this->_tpl_vars['sql_hotelroom2']['hot_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['sql_hotelroom2']['hot_subject']; ?>
"><img src="<?php if ($this->_tpl_vars['sql_hotelroom2']['hot_logo'] != ''):  echo $this->_tpl_vars['sql_hotelroom2']['hot_logo'];  else: ?>image/lvyou/image.gif<?php endif; ?>" width="80" height="70"></a></td>
                          </tr>
                        </table></td>
                      <td width="65%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
					  	  <tr>
                            <td class="line_bg"><img src="image/lvyou/icon_6.gif" width="4" height="5"> <a href="index.php?action=hotel&option=single&id=<?php echo $this->_tpl_vars['sql_hotelroom2']['hot_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['sql_hotelroom2']['hot_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['sql_hotelroom2']['hot_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...") : smarty_modifier_truncate($_tmp, 25, "...")); ?>
</a></td>
                          </tr>
                          <?php $_from = $this->_tpl_vars['sql_hotelroom4']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelroom4']):
?>
                          <tr>
                            <td class="line_bg"><img src="image/lvyou/icon_6.gif" width="4" height="5"> <a href="index.php?action=hotel&option=single&id=<?php echo $this->_tpl_vars['hotelroom4']['hot_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['hotelroom4']['hot_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['hotelroom4']['hot_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...") : smarty_modifier_truncate($_tmp, 25, "...")); ?>
</a></td>
                          </tr>
                          <?php endforeach; endif; unset($_from); ?>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
			</div>
			</td>
        </tr>
        <tr>
          <td height="8" colspan="2"></td>
        </tr>
        <tr>
          <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" background="image/lvyou/td4_m.gif">
              <tr>
                <td width="2%"><img src="image/lvyou/td4_l.gif" width="8" height="23"></td>
                <td  class="tdup_title"><img src="image/lvyou/ico_white.gif" width="7" height="7"> 节庆活动</td>
                <td width="1%"><img src="image/lvyou/td4_r.gif" width="7" height="23"></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="2"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="50%"><table width="98%" border="0" cellpadding="0" cellspacing="2">
                    <tr>
                      <td width="35%"><table border="0" cellpadding="0" cellspacing="0"  class="border_pic">
                          <tr>
                            <td><a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['sql_news119']['new_id']; ?>
"><img src="<?php if ($this->_tpl_vars['sql_news119']['new_image'] != ''):  echo $this->_tpl_vars['sql_news119']['new_image'];  else: ?>image/lvyou/image.gif<?php endif; ?>" width="80" height="70"></a></td>
                          </tr>
                        </table></td>
                      <td width="65%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <?php $_from = $this->_tpl_vars['sql_news121']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news121']):
?>
                          <tr>
                            <td class="line_bg"><img src="image/lvyou/icon_6.gif" width="4" height="5"> <a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['news121']['new_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['news121']['new_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['news121']['new_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 27, "...") : smarty_modifier_truncate($_tmp, 27, "...")); ?>
</a></td>
                          </tr>
                          <?php endforeach; endif; unset($_from); ?>
                        </table></td>
                    </tr>
                  </table></td>
                <td width="1" bgcolor="#cbb17b"></td>
                <td width="50%" align="right"><table width="98%" border="0" cellpadding="0" cellspacing="2">
                    <tr>
                      <td width="35%"><table border="0" cellpadding="0" cellspacing="0"  class="border_pic">
                          <tr>
                            <td><a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['sql_news120']['new_id']; ?>
"><img src="<?php if ($this->_tpl_vars['sql_news120']['new_image'] != ''):  echo $this->_tpl_vars['sql_news120']['new_image'];  else: ?>image/lvyou/image.gif<?php endif; ?>" width="80" height="70"></a></td>
                          </tr>
                        </table></td>
                      <td width="65%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <?php $_from = $this->_tpl_vars['sql_news122']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news122']):
?>
                          <tr>
                            <td class="line_bg"><img src="image/lvyou/icon_6.gif" width="4" height="5"> <a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['news122']['new_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['news122']['new_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['news122']['new_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 27, "...") : smarty_modifier_truncate($_tmp, 27, "...")); ?>
</a></td>
                          </tr>
                          <?php endforeach; endif; unset($_from); ?>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="8" colspan="2"></td>
        </tr>
        <tr>
          <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="49%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" background="image/lvyou/td4_m.gif">
                          <tr>
                            <td width="3%"><img src="image/lvyou/td4_l.gif" width="8" height="23"></td>
                            <td  class="tdup_title"><img src="image/lvyou/ico_white.gif" width="7" height="7"> 游记散文</td>
                            <td width="3%"><img src="image/lvyou/td4_r.gif" width="7" height="23"></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td><table width="98%" border="0" cellpadding="0" cellspacing="2">
                          <tr>
                            <td width="35%"><table border="0" cellpadding="0" cellspacing="0"  class="border_pic">
                                <tr>
                                  <td><a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['sql_novel0']['new_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['sql_novel0']['new_subject']; ?>
"><img src="<?php if ($this->_tpl_vars['sql_novel0']['new_quote'] != ''):  echo $this->_tpl_vars['sql_novel0']['new_quote'];  else: ?>image/lvyou/image.gif<?php endif; ?>"  width="80" height="70" alt='<?php echo $this->_tpl_vars['sql_novel0']['new_subject']; ?>
'></a></td>
                                </tr>
                              </table></td>
                            <td width="65%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <?php $_from = $this->_tpl_vars['sql_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
                                <tr>
                                  <td class="line_bg"><img src="image/lvyou/icon_6.gif" width="4" height="5"> <a href="index.php?action=info&option=single&id=<?php echo $this->_tpl_vars['info']['new_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['info']['new_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['new_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 27, "...") : smarty_modifier_truncate($_tmp, 27, "...")); ?>
</a></td>
                                </tr>
                                <?php endforeach; endif; unset($_from); ?>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
                <td>&nbsp;</td>
                <td width="49%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><table width="100%" border="0" cellpadding="0" cellspacing="0" background="image/lvyou/td4_m.gif">
                          <tr>
                            <td width="3%"><img src="image/lvyou/td4_l.gif" width="8" height="23"></td>
                            <td  class="tdup_title"><img src="image/lvyou/ico_white.gif" width="7" height="7"> 游记博客</td>
                            <td width="3%"><img src="image/lvyou/td4_r.gif" width="7" height="23"></td>
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td><table width="98%" border="0" cellpadding="0" cellspacing="2">
                          <tr valign="top">
                            <td width="35%"><table border="0" cellpadding="0" cellspacing="0"  class="border_pic">
                                <tr>
                                  <td><a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['sql_novel1']['new_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['sql_novel1']['new_subject']; ?>
"><img src="<?php if ($this->_tpl_vars['sql_novel1']['new_quote'] != ''):  echo $this->_tpl_vars['sql_novel1']['new_quote'];  else: ?>image/lvyou/image.gif<?php endif; ?>"  width="80" height="70" alt='<?php echo $this->_tpl_vars['sql_novel1']['new_subject']; ?>
'></a></td>
                                </tr>
                              </table></td>
                            <td width="65%"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                                <?php $_from = $this->_tpl_vars['sql_scenicyou']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['scenicyou']):
?>
                                <tr>
                                  <td class="line_bg"><img src="image/lvyou/icon_6.gif" width="4" height="5"> <a href="index.php?action=scenic&option=scenicyouthread&id=<?php echo $this->_tpl_vars['scenicyou']['thr_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['scenicyou']['thr_id']; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['scenicyou']['thr_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['scenicyou']['thr_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 27, "...") : smarty_modifier_truncate($_tmp, 27, "...")); ?>
</a></td>
                                </tr>
                                <?php endforeach; endif; unset($_from); ?>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="3" colspan="2"></td>
        </tr>
      </table></td>
    <td width="194" valign="top" bgcolor="#12a0d0"><table width="100%" border="0" cellpadding="0" cellspacing="0" >
        <!--<tr>
          <td background="image/lvyou/right_tit.gif" class="txt_title_white2">&nbsp;<img src="image/lvyou/ico_2.gif" width="8" height="8"> 天气预报</td>
        </tr>
        <tr>
          <td align="center" bgcolor="#FBFBFB" class="border_right"><iframe width='180' height='200' scrolling='no' frameborder='0' src= 'http://www.sstour.net/?action=weather&option=weather'></iframe></td>
        </tr>-->
        <tr>
          <td><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="79%" class="txt_title_white">&nbsp;<img src="image/lvyou/ico_2.gif" width="8" height="8"> 信息联播</td>
                <td width="21%" class="txt_title_white"><a href="http://news.tourzj.gov.cn" target="_blank"><img src="image/lvyou/more.gif" width="33" height="13" border="0"></a></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td valign="top" bgcolor="#BFE8FE" height=120 style="border-bottom:1px solid #12A0D0;"><div id="icefable1"></div><div id="icefable2" style="display:none;"></div></td>
        </tr>
	    <tr>
          <td align="center" bgcolor="#FFFFFF" class="border_right"><a href="index.php?action=info&id=30" target="_blank"><img src="image/lvyou/index_jiaotong.gif" width="173" height="60" border="0"></a></td>
        </tr>
        <tr>
          <td bgcolor="#FFFFFF" class="border_right"><table width="96%" border="0" align="center" cellpadding="5" cellspacing="0">
              <tr>
                <td align="center"><a href="index.php?action=info&id=26&red=1"><img src="image/lvyou/index_right_01.gif" width="80" height="25" border="0"></a></td>
                <td align="center"><a href="index.php?action=info&id=23&red=1"><img src="image/lvyou/index_right_02.gif" width="80" height="25" border="0"></a></td>
              </tr>
              <tr>
                <td align="center"><a href="index.php?action=info&id=24&red=1"><img src="image/lvyou/index_right_03.gif" width="80" height="25" border="0"></a></td>
                <td align="center"><a href="index.php?action=info&id=28&red=1"><img src="image/lvyou/index_right_04.gif" width="80" height="25" border="0"></a></td>
              </tr>
              <tr>
                <td><a href="index.php?action=info&id=27&red=1"><img src="image/lvyou/index_right_05.gif" width="80" height="25" border="0"></a></td>
                <td><a href="index.php?action=news&id=2&red=1"><img src="image/lvyou/index_right_06.gif" width="80" height="25" border="0"></a></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td ><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="79%" class="txt_title_white">&nbsp;<img src="image/lvyou/ico_2.gif" width="8" height="8"> 旅游小贴士</td>
                <td width="21%" class="txt_title_white"><a href="index.php?action=news&id=3"><img src="image/lvyou/more.gif" width="33" height="13" border="0"></a></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td valign="top" bgcolor="#BFE8FE" id=showguide></td>
        </tr>
        <tr>
          <td ><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="79%" class="txt_title_white">&nbsp;<img src="image/lvyou/ico_2.gif" width="8" height="8"> 旅游线路</td>
                <td width="21%" class="txt_title_white"><a href="index.php?action=news&id=2"><img src="image/lvyou/more.gif" width="33" height="13"></a></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td bgcolor="#BFE8FE" id=showline></td>
        </tr>
      </table></td>
  </tr>
</table>
<script>
getNews('showlogin','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=login&option=indexlogin');
getNews('showmessage','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=index&option=showmessage');
getNews('icefable1','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=rss&option=single');
//getNews('showtravel','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=index&option=showtravel');
getNews('showguide','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=index&option=showguide');
getNews('showainment','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=index&option=showainment');
getNews('showline','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=index&option=showline');
getNews('showabout','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=index&option=showabout');

marqueesHeight=120;
delaytime = 100;
scrollupRadio = 20;
stopscroll=false;

preTop=0;
currentTop=marqueesHeight;
stoptime=0;
scrollup=0;

function init_srolltext(){
	if($('icefable1'))
	{
		$('icefable1').scrollTop=0;
		setInterval("scrollUp()",scrollupRadio);
		with($('icefable1')){
			style.width=188;
			style.height=marqueesHeight;
			style.overflowX="visible";
			style.overflowY="hidden";
			noWrap=true;
			onmouseover=new Function("stopscroll=true");
			onmouseout=new Function("stopscroll=false");
		}
		$('icefable1').innerHTML+=$('icefable1').innerHTML;
		clearInterval(srollID);
	}
}
var srollID = setInterval("init_srolltext()",2000);

function scrollUp(){
	if(stopscroll==true) return;
	currentTop+=1;
	if(currentTop==(marqueesHeight+1))
	{
		stoptime+=1;
		currentTop-=1;
		if(stoptime==delaytime)
		{
			currentTop=0;
			stoptime=0;
		}
	} else {
		if(scrollup == 0)
		{
			preTop=$('icefable1').scrollTop;
			$('icefable1').scrollTop+=1;
			if(preTop==$('icefable1').scrollTop){
				$('icefable2').innerHTML = $('icefable1').innerHTML;
				$('icefable1').innerHTML += $('icefable1').innerHTML;
				//icefable1.scrollTop=marqueesHeight;
				$('icefable1').scrollTop+=1;
				scrollup = 1;
			}
		}else{
			//preTop=icefable1.scrollTop;
			$('icefable1').scrollTop+=1;
			if(preTop== $('icefable1').scrollTop - marqueesHeight){
				$('icefable1').innerHTML = $('icefable2').innerHTML;
				$('icefable1').scrollTop=0;
				$('icefable1').scrollTop+=1;
				scrollup = 0;
			}
		}
	}
}
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "fooder.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>