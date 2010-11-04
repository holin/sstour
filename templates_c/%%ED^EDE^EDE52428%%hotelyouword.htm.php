<?php /* Smarty version 2.6.10, created on 2009-12-15 00:07:07
         compiled from hotelyouword.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strip', 'hotelyouword.htm', 5, false),array('modifier', 'strip_tags', 'hotelyouword.htm', 5, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['sql_hotelword']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hotelword']):
?>
<div id="xspace-itemreply">
  <dl id="xspace-comment17">
    <dt> <img src="image/water/none.gif"class="xspace-signavatar xspace-imgstyle" /> <a href="javascript:;" class="xspace-quote" onClick="fshowwindows('<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=hotelword&type=postyou&id=<?php echo $this->_tpl_vars['hotelword']['word_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelword']['word_id']; ?>
&Keyword=<?php echo $this->_tpl_vars['hotelword']['word_tid']; ?>
',1,'»Ø¸´ÁôÑÔ');">»Ø¸´</a> <a href="javascript:;" onClick="_confirm_msg_show('È·¶¨É¾³ýÁôÑÔ', 'Userloginon(\'<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=update&option=hotelword&type=delyou&id=<?php echo $this->_tpl_vars['hotelword']['word_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelword']['word_id']; ?>
&Keyword=<?php echo $this->_tpl_vars['hotelword']['word_tid']; ?>
\',\'\',\'getNews(\\\'showthreadword\\\',\\\'<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showyouword&id=<?php echo $this->_tpl_vars['hotelword']['word_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelword']['word_tid']; ?>
\\\');\',\'getNews(\\\'showthreadword\\\',\\\'<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=hotel&option=showyouword&id=<?php echo $this->_tpl_vars['hotelword']['word_hid']; ?>
&Industry=<?php echo $this->_tpl_vars['hotelword']['word_tid']; ?>
\\\');\');', '', '');" class="xspace-del">É¾³ý</a> <?php echo $this->_tpl_vars['hotelword']['word_username']; ?>
 <span class="xspace-smalltxt">ÁôÑÔÓÚ<?php echo $this->_tpl_vars['hotelword']['word_date']; ?>
&nbsp;&nbsp; IP: <?php echo $this->_tpl_vars['hotelword']['word_ip']; ?>
</span> </dt>
    <dd><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['hotelword']['word_content'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp));  if ($this->_tpl_vars['hotelword']['word_post'] != ''): ?>
      <div class="xspace-guestbookreply">
        <p><?php echo $this->_tpl_vars['hotelword']['word_redate']; ?>
</p>
        <?php echo $this->_tpl_vars['hotelword']['word_post']; ?>
</div>
      <?php endif; ?></dd>
  </dl>
</div>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['fpageup']): ?>
<div class="left_links" style="width:100%"><?php echo $this->_tpl_vars['fpageup']; ?>
</div>
<?php endif; ?>