<?php /* Smarty version 2.6.10, created on 2009-12-12 22:47:22
         compiled from showguide.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'showguide.htm', 4, false),)), $this); ?>
<table width="86%" border="0" align="center" cellspacing="0">
  <?php $_from = $this->_tpl_vars['sql_news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>
  <tr>
    <td><img src="image/lvyou/ico_right.gif" width="4" height="8" > <a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['news']['new_id']; ?>
" class="link_title_white" title="<?php echo $this->_tpl_vars['news']['new_subject']; ?>
"> <?php echo ((is_array($_tmp=$this->_tpl_vars['news']['new_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...", true) : smarty_modifier_truncate($_tmp, 25, "...", true)); ?>
</a></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
  <tr>
    <td align="right"><a href="index.php?action=news&id=3">查看更多&gt;&gt;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
  </tr>
</table>