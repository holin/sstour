<?php /* Smarty version 2.6.10, created on 2009-12-12 22:47:22
         compiled from showmessage.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'showmessage.htm', 3, false),)), $this); ?>
<marquee width="100%" height="100" scrollamount=2 direction=up id="showmessage"> 
<?php $_from = $this->_tpl_vars['sql_showmessage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['showmessage']):
?>
<div class="line_bg"><img src="image/lvyou/icon_6.gif" width="4" height="5"> <a href="index.php?action=info&option=single&id=<?php echo $this->_tpl_vars['showmessage']['new_id']; ?>
" title="<?php echo $this->_tpl_vars['showmessage']['new_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['showmessage']['new_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...", true) : smarty_modifier_truncate($_tmp, 25, "...", true)); ?>
</a></div>
<?php endforeach; endif; unset($_from); ?>
</marquee>