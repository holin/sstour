<?php /* Smarty version 2.6.10, created on 2009-12-12 22:59:51
         compiled from rss_index.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'rss_index.htm', 11, false),array('modifier', 'count', 'rss_index.htm', 12, false),array('modifier', 'strip', 'rss_index.htm', 21, false),array('modifier', 'strip_tags', 'rss_index.htm', 21, false),array('modifier', 'escape', 'rss_index.htm', 21, false),array('modifier', 'default', 'rss_index.htm', 21, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="<?php echo $this->_tpl_vars['charset']; ?>
"<?php echo '?>'; ?>

<rss version="2.0">
  <channel>
    <title>最新动态,嵊泗旅游网－东海旅游</title>
    <link>http://www.sstour.net/</link>
    <description>东海旅游,海钓 海 旅游_资讯信息</description>
    <copyright>Copyright(C) sstour - Web2.0 最新动态--嵊泗旅游网</copyright>
    <generator>嵊泗旅游网! Board by sstour Inc.</generator>
    <lastBuildDate><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%a, %d %b %Y %H:%M:%S %T') : smarty_modifier_date_format($_tmp, '%a, %d %b %Y %H:%M:%S %T')); ?>
</lastBuildDate>
    <ttl><?php echo count($this->_tpl_vars['sql_info']); ?>
</ttl>
    <image>
      <url>http://www.sstour.net/image/lvyou/jingqu_7.gif</url>
      <title>最新动态,嵊泗旅游网－东海旅游</title>
      <link>http://www.sstour.net/</link>
    </image>    
    <?php $_from = $this->_tpl_vars['sql_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
    <?php $this->assign('columns', $this->_tpl_vars['list']['new_type']); ?>
    <item>
    <title><![CDATA[<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list']['new_subject'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('default', true, $_tmp, '标题') : smarty_modifier_default($_tmp, '标题')); ?>
]]></title>
    <link>http://www.sstour.net/index.php?action=news&amp;option=single&amp;id=<?php echo $this->_tpl_vars['list']['new_id']; ?>
</link>
    <guid>http://www.sstour.net/index.php?action=news&amp;option=single&amp;id=<?php echo $this->_tpl_vars['list']['new_id']; ?>
</guid>
    <description>
      <![CDATA[<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list']['new_content'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')))) ? $this->_run_mod_handler('default', true, $_tmp, '简介') : smarty_modifier_default($_tmp, '简介')); ?>
]]>
    </description>
    <category><?php echo ((is_array($_tmp=@$this->_tpl_vars['columnsArray'][$this->_tpl_vars['columns']])) ? $this->_run_mod_handler('default', true, $_tmp, '最新动态') : smarty_modifier_default($_tmp, '最新动态')); ?>
</category>
    <author><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list']['new_writer'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('default', true, $_tmp, '嵊泗') : smarty_modifier_default($_tmp, '嵊泗')); ?>
</author>
    <pubDate><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['new_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, '%a, %d %b %Y %T') : smarty_modifier_date_format($_tmp, '%a, %d %b %Y %T')); ?>
</pubDate>
    </item>
    <?php endforeach; endif; unset($_from); ?>
  </channel>
</rss>