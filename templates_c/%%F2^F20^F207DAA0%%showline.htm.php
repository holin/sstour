<?php /* Smarty version 2.6.10, created on 2009-12-12 22:47:22
         compiled from showline.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'showline.htm', 6, false),array('modifier', 'escape', 'showline.htm', 11, false),)), $this); ?>
<table width="100%" border="0" bgcolor="#ACD3E1" style="padding-left:3px;">
  <?php $_from = $this->_tpl_vars['sql_news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>
  <tr>
    <td><table width="70%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td class="title_xianlu"><a href="index.php?action=news&option=single&id=<?php echo $this->_tpl_vars['news']['new_id']; ?>
" title="<?php echo $this->_tpl_vars['news']['new_subject']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['news']['new_subject'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 19, "...", true) : smarty_modifier_truncate($_tmp, 19, "...", true)); ?>
</a></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['news']['new_content'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 51, "...", true) : smarty_modifier_truncate($_tmp, 51, "...", true)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
</table>
