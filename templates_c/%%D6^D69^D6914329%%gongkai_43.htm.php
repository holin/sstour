<?php /* Smarty version 2.6.10, created on 2009-12-13 06:28:04
         compiled from gongkai_43.htm */ ?>
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
        <tr>
          <td id=showtravel><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'gongkai.htm', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></td>
        </tr>
      </table></td>
    <td width="562" valign="top"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td class="url">您现在的位置：<a href="index.php">首页</a> > 政府信息公开 > <a href="http://www.sstour.net/index.php?action=gongkai&option=43">行政执法</a></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td height="3" colspan="3"></td>
        </tr>
        <tr>
          <td width="7%"  class="title_green"><img src="image/lvyou/icon_7.gif" width="35" height="24"></td>
          <td width="93%"  class="title_green">1.行政审批</td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#EBF9FD"><table width="96%" border="0" align="center">
		      <?php $_from = $this->_tpl_vars['sql_46']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
              <tr class="line_bg3">
                <td><img src="image/lvyou/ico_new.gif" width="9" height="9"> <a href="http://www.sstour.net/index.php?action=info&option=single&id=<?php echo $this->_tpl_vars['info']['new_id']; ?>
"><?php echo $this->_tpl_vars['info']['new_subject']; ?>
</a></td>
              </tr>
			  <?php endforeach; endif; unset($_from); ?>
          </table></td>
        </tr>
        <tr>
          <td height="5" colspan="2" bgcolor="#EBF9FD"></td>
        </tr>
        <tr>
          <td  class="title_green"><img src="image/lvyou/icon_7.gif" width="35" height="24" /></td>
          <td  class="title_green">2.行政处罚</td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#EBF9FD"><table width="96%" border="0" align="center">
  <?php $_from = $this->_tpl_vars['sql_45']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
  <tr class="line_bg3">
    <td><img src="image/lvyou/ico_new.gif" width="9" height="9" /> <a href="http://www.sstour.net/index.php?action=info&amp;option=single&amp;id=<?php echo $this->_tpl_vars['info']['new_id']; ?>
"><?php echo $this->_tpl_vars['info']['new_subject']; ?>
</a></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
          </table></td>
        </tr>
        <tr>
          <td height="5" colspan="2" bgcolor="#EBF9FD"></td>
        </tr>
        <tr>
          <td  class="title_green"><img src="image/lvyou/icon_7.gif" width="35" height="24" /></td>
          <td  class="title_green">3.行政许可</td>
        </tr>
        <tr>
          <td colspan="2" bgcolor="#EBF9FD"><table width="96%" border="0" align="center">
  <?php $_from = $this->_tpl_vars['sql_44']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
  <tr class="line_bg3">
    <td><img src="image/lvyou/ico_new.gif" width="9" height="9" /> <a href="http://www.sstour.net/index.php?action=info&amp;option=single&amp;id=<?php echo $this->_tpl_vars['info']['new_id']; ?>
"><?php echo $this->_tpl_vars['info']['new_subject']; ?>
</a></td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
          </table></td>
        </tr>
        <tr>
          <td height="5" colspan="2" bgcolor="#EBF9FD"></td>
        </tr>
        <tr>
          <td height="5" colspan="2" bgcolor="#EBF9FD"></td>
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