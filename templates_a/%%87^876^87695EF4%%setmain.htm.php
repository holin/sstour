<?php /* Smarty version 2.6.10, created on 2010-09-11 14:00:21
         compiled from setmain.htm */ ?>
<form name="formupdate" method="post" action="">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="2" class=head> 引 导 页 设 置 管 理</td>
    </tr>
	<tr>
      <td class=b>引导页标题:<BR />
背景颜色，开启后将在首页显示</td>
      <td class=b><input type="text" size="30" name="config[title]" value="<?php echo $this->_tpl_vars['title']; ?>
"></td>
    </tr>
    <tr>
      <td class=b>背景颜色:<BR />
背景颜色，开启后将在首页显示</td>
      <td class=b><input type="text" size="30" name="config[bgcolor]" value="<?php echo $this->_tpl_vars['bgcolor']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>背景图片:<BR />
背景图片，开启后将在首页显示</td>
      <td class=b><input type="text" size="30" name="config[bgimage]" value="<?php echo $this->_tpl_vars['bgimage']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>背景透明度:<BR />
背景透明度，引导页背景在首页的透明度</td>
      <td class=b><input onkeyup="value=value.replace(/[^\d]/g,'')  " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" name="config[transparent]" value="<?php echo $this->_tpl_vars['transparent']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>播放代码:<BR />
播放代码,使用播放代码控制引导页出现的信息<br />
(使用非嵌套模式时外部连接为<font color=red>&lt;a href='javascript:document.getElementById('setmain').innerHTML='';document.getElementById('setmain').style.width='0';document.getElementById('setmain').style.height='0';'&gt;进入首页&lt;/a&gt;</font>)</td>
      <td class=b><textarea name="config[info]" cols="40" rows="5"><?php echo $this->_tpl_vars['info']; ?>
</textarea></td>
    </tr>
	<tr>
      <td class=b>嵌套方式:<BR />
嵌套方式,选择是嵌套在首页，否则新开页面显示引导页</td>
      <td class=b>
<?php if ($this->_tpl_vars['nesting'] == '1'): ?>
	<input type="radio" name="config[nesting]" value="1" checked="checked" />是
	<input type="radio" name="config[nesting]" value="0" />否
<?php else: ?>
	<input type="radio" name="config[nesting]" value="1" />是
	<input type="radio" name="config[nesting]" value="0" checked="checked" />否
<?php endif; ?>
	  
	  </td>
    </tr>
  </table>
  <br>
  <center><input type=hidden name=update value='update'> &nbsp; 
    <input type="button" name="Submit" id=Submit value=" 提 交 " onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\');')">
  </center>
</form>