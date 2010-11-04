<?php /* Smarty version 2.6.10, created on 2009-12-14 01:39:57
         compiled from aboutifo.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip', 'aboutifo.htm', 16, false),array('modifier', 'strip_tags', 'aboutifo.htm', 16, false),array('modifier', 'truncate', 'aboutifo.htm', 16, false),)), $this); ?>
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
                <td class="url">您现在的位置：<a href="index.php">首页</a> &gt; <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_about']['about_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 40, "...", true) : smarty_modifier_truncate($_tmp, 40, "...", true)); ?>
</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="3" colspan="3"></td>
        </tr>
        <tr>
          <td width="7%"  class="title_green"><img src="image/lvyou/icon_7.gif" width="35" height="24"></td>
          <td width="93%" colspan="2" class="title_green"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sql_about']['about_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
</td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#EBF9FD"><table width="94%" border="0" align="center" cellpadding="0" cellspacing="4">
              <tr>
                <td align="center"><table border="0">
                    <tr>
                      <td class="title_border"><?php echo $this->_tpl_vars['sql_about']['about_subject']; ?>
</td>
                    </tr>					
                  </table></td>
              </tr>
              <tr>
                <td class="td_content"><?php echo $this->_tpl_vars['sql_about']['about_content']; ?>
</td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td colspan="3" bgcolor="#EBF9FD">&nbsp;</td>
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