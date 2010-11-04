<?php /* Smarty version 2.6.10, created on 2010-09-11 14:00:22
         compiled from basic.htm */ ?>
<form name="formupdate" method="post" action="">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="2" class=head> 基 本 设 置 管 理</td>
    </tr>
	<tr>
      <td class=b>关闭网站:<BR />
关闭网站，网站升级或修改时候请先关闭网站</td>
	  <td class=b>
<?php if ($this->_tpl_vars['webclose'] == '1'): ?>
<input type="radio" name="config[webclose]" value="1" checked="checked" />开启
<input type="radio" name="config[webclose]" value="0" />关闭
<?php else: ?>
<input type="radio" name="config[webclose]" value="1" />开启
<input type="radio" name="config[webclose]" value="0" checked="checked" />关闭
<?php endif; ?>
      </td>
	</tr>
    <tr>
      <td class=b>网站名称:<BR />
网站名称，将显示在导航条和标题中</td>
      <td class=b><input type="text" size="30" name="config[webname]" value="<?php echo $this->_tpl_vars['webname']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>网站标题:<BR />
网站标题，将显示在页面底部的联系方式处</td>
      <td class=b><input type="text" size="30" name="config[title]" value="<?php echo $this->_tpl_vars['title']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>网站备案信息代码:<BR />
页面底部可以显示 ICP 备案信息，如果网站已备案，在此输入您的授权码，它将显示在页面底部，如果没有请留空</td>
      <td class=b><input type="text" size="30" name="config[icp]" value="<?php echo $this->_tpl_vars['icp']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>引导页:<BR />
开启后进入站点时先进入引导页</td>
      <td class=b>
<?php if ($this->_tpl_vars['main'] == '1'): ?>
	<input type="radio" name="config[main]" value="1" checked="checked" />是
	<input type="radio" name="config[main]" value="0" />否
<?php else: ?>
	<input type="radio" name="config[main]" value="1" />是
	<input type="radio" name="config[main]" value="0" checked="checked" />否
<?php endif; ?>	  
	  </td>
    </tr>
	<tr>
      <td class=b>关键字:<BR />
关键字，有利于搜索引擎搜录</td>
      <td class=b><input type="text" size="30" name="config[keywords]" value="<?php echo $this->_tpl_vars['keywords']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>网站描述:<BR />
网站描述，有利于搜索引擎搜录</td>
      <td class=b><input type="text" size="30" name="config[description]" value="<?php echo $this->_tpl_vars['description']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>企业邮箱:</td>
      <td class=b><input type="text" size="30" name="config[mail]" value="<?php echo $this->_tpl_vars['mail']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>时间差:<BR />
时间差,本地时间与服务器的时间差(按分计算)</td>
      <td class=b><input type="text" size="30" name="config[time]" value="<?php echo $this->_tpl_vars['time']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>文件上传路径:<BR />
时间差,本地时间与服务器的时间差(按分计算)</td>
      <td class=b><input type="text" size="30" name="config[attach]" value="<?php echo $this->_tpl_vars['attach']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>文件上传大小:<BR />
按B计算1M=1024KB=1024KB*1024B</td>
      <td class=b><input type="text" size="30" name="config[size]" value="<?php echo $this->_tpl_vars['size']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>论坛结合:<BR />
论坛结合,结合论坛后用户系统自动启动论坛数据目前只结合DZ论坛</td>
      <td class=b>
<?php if ($this->_tpl_vars['bbs'] == '1'): ?>
	<input type="radio" name="config[bbs]" value="1" checked="checked" />是
	<input type="radio" name="config[bbs]" value="0" />否
<?php else: ?>
	<input type="radio" name="config[bbs]" value="1" />是
	<input type="radio" name="config[bbs]" value="0" checked="checked" />否
<?php endif; ?></td>
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