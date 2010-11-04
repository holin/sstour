<?php /* Smarty version 2.6.10, created on 2009-12-25 23:38:14
         compiled from travels.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip', 'travels.htm', 40, false),array('modifier', 'strip_tags', 'travels.htm', 40, false),array('modifier', 'truncate', 'travels.htm', 43, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table width="954" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" class="acount_line">
  <tr>
    <td width="194" valign="top" background="image/lvyou/bg_left.gif" class="left_line"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="100%" id=showlogin></td>
        </tr>
        <tr>
          <td id=showabout></td>
        </tr>
      </table></td>
    <td width="562" valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td class="url">您现在的位置：<a href="index.php">首页</a> &gt; <a href="index.php?action=travel">旅行社</a></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="3" colspan="3"></td>
        </tr>
        <tr>
          <td width="7%"  class="title_green"><img src="image/lvyou/icon_7.gif" width="35" height="24"></td>
          <td width="93%"  class="title_green">旅行社</td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#EBF9FD"><table width="96%" border="0" align="center">
              <?php $_from = $this->_tpl_vars['sql_travel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['travel']):
?>
              <tr>
                <td bgcolor="#EBF9FD"><table width="100%" border="0" cellspacing="4">
                    <tr>
                      <td width="27%" valign="top"><table border="0">
                          <tr>
                            <td class="border_pic"><?php if ($this->_tpl_vars['travel']['sc_logo'] != ''): ?><a href="index.php?action=travel&option=single&id=<?php echo $this->_tpl_vars['travel']['sc_id']; ?>
"><img src="<?php echo $this->_tpl_vars['travel']['sc_logo']; ?>
" width="137" height="100"></a><?php else: ?><a href="index.php?action=travel&option=single&id=<?php echo $this->_tpl_vars['travel']['sc_id']; ?>
"><img src="image/lvyou/jingqu_22.gif" width="137" height="100"></a><?php endif; ?></td>
                          </tr>
                        </table></td>
                      <td width="73%" valign="top"><table width="100%" border="0">
                          <tr>
                            <td class="txt_green"><a href="index.php?action=travel&option=single&id=<?php echo $this->_tpl_vars['travel']['sc_id']; ?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['travel']['sc_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</a></td>
                          </tr>
                          <tr>
                            <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['travel']['sc_info'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 200, "...", true) : smarty_modifier_truncate($_tmp, 200, "...", true)); ?>
</td>
                          </tr>
                          <tr>
                            <td align="right" ><a href="index.php?action=travel&option=single&id=<?php echo $this->_tpl_vars['travel']['sc_id']; ?>
" class="link_more">详细进入&gt;&gt;</a></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td height="1" background="image/lvyou/line.gif"></td>
              </tr>
              <?php endforeach; endif; unset($_from); ?>
            </table></td>
        </tr>
        <tr>
          <td height="50" colspan="2" bgcolor="#EBF9FD"><table width="94%" border="0" align="center" cellpadding="0" cellspacing="0">
              <tr>
                <td width="2%"><img src="image/lvyou/no_left.gif" width="10" height="20"></td>
                <td width="95%" align="center" background="image/lvyou/no_mid.gif"><?php echo $this->_tpl_vars['fpageup']; ?>
</td>
                <td width="3%"><img src="image/lvyou/no_right.gif" width="16" height="20"></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    <td width="194" valign="top" bgcolor="#12a0d0"><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="30" class="txt_title_white">&nbsp;<img src="image/lvyou/ico_2.gif" width="8" height="8"> 天气预报</td>
        </tr>
        <tr>
          <td height="130" align="center" bgcolor="#C1E9FF"><iframe width='180' height='260' scrolling='no' frameborder='0' src= 'http://www.sstour.net/?action=weather&option=weather'></iframe></td>
        </tr>
        <tr>
          <td><img src="image/lvyou/index_61.gif" width="194" height="65"></td>
        </tr>
        <tr>
          <td height="151" valign="top" background="image/lvyou/index_69.gif" id=showguide></td>
        </tr>
        <tr>
          <td><img src="image/lvyou/index_84.gif" width="194" height="52"></td>
        </tr>
        <tr>
          <td id=showline></td>
        </tr>
      </table></td>
  </tr>
</table>
<script>
getNews('showlogin','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=login&option=indexlogin');
getNews('showabout','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=index&option=showabout');
getNews('showguide','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=index&option=showguide');
getNews('showline','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=index&option=showline');
</script>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "fooder.htm", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>