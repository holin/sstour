<?php /* Smarty version 2.6.10, created on 2010-01-02 22:09:52
         compiled from showtravel.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'showtravel.htm', 14, false),)), $this); ?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="2" bgcolor="#BFE8FE">
  <tr>
    <td ><table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="79%" class="txt_title_white">&nbsp;<img src="image/lvyou/ico_white.gif" width="7" height="7"> 政务公开</td>
          <td width="21%" class="txt_title_white"><img src="image/lvyou/more.gif" width="33" height="13"></td>
        </tr>
      </table></td>
  </tr>
  
  <tr>
    <td ><marquee width="100%" height="100" scrollamount=2 direction=up id="showmessage"> 
<?php $_from = $this->_tpl_vars['sql_news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>
<div class="line_bg"><img src="image/lvyou/icon_6.gif" width="4" height="5"> <a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['news']['new_id']; ?>
" title="<?php echo $this->_tpl_vars['news']['new_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['news']['new_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...", true) : smarty_modifier_truncate($_tmp, 25, "...", true)); ?>
</a></div>
<?php endforeach; endif; unset($_from); ?>
</marquee></td>
  </tr>
</table>