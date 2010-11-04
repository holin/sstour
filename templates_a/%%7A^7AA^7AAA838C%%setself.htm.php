<?php /* Smarty version 2.6.10, created on 2010-09-11 14:00:09
         compiled from setself.htm */ ?>
<form name="formupdate" method="post" action="">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="2" class=head> 安 全 设 置 管 理</td>
    </tr>
    <tr>
      <td class=b>错误提示:<BR />
错误提示，提示错误方便程序修改但也会出现漏洞让黑客有机可趁</td>
      <td class=b>
<?php if ($this->_tpl_vars['error'] == '1'): ?>
	<input type="radio" name="config[error]" value="1" checked="checked" />是
	<input type="radio" name="config[error]" value="0" />否
<?php else: ?>
	<input type="radio" name="config[error]" value="1" />是
	<input type="radio" name="config[error]" value="0" checked="checked" />否
<?php endif; ?>
	  </td>
    </tr>
	<tr>
      <td class=b>COOKIE有效域名:<BR />
COOKIE有效域名，比如可能会有人使用 http：//ioime.com访问您的论坛这时您可以设置为 .ioime.com 或留空<BR />
注：请物随意更改此项设置，否则将可能导致无法登录论坛等异常现象</td>
      <td class=b><input type="text" size="30" name="config[cookiedomain]" value="<?php echo $this->_tpl_vars['cookiedomain']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>COOKIE有效目录:<BR />
COOKIE有效目录，使一个空间放置多个网站,都能访问! （如果您的网站在web目录下可以设置为/web/ 或为 /）<BR />
注：请物随意更改此项设置，否则将可能导致无法登录网站等异常现象</td>
      <td class=b><input type="text" size="30" name="config[cookiepath]" value="<?php echo $this->_tpl_vars['cookiepath']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>SESSION:<BR />
SESSION，COOKIE禁用时启用SESSION来记录用户信息</td>
      <td class=b>
<?php if ($this->_tpl_vars['session'] == '1'): ?>
	<input type="radio" name="config[session]" value="1" checked="checked" />是
	<input type="radio" name="config[session]" value="0" />否
<?php else: ?>
	<input type="radio" name="config[session]" value="1" />是
	<input type="radio" name="config[session]" value="0" checked="checked" />否
<?php endif; ?>
	  </td>
    </tr>
	<tr>
      <td class=b>SESSION有效目录:<BR />
SESSION有效目录，使一个空间放置多个网站,都能访问! </td>
      <td class=b><input type="text" size="30" name="config[sessionpath]" value="<?php echo $this->_tpl_vars['sessionpath']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>在线时间:<BR />
在线时间，COOKIE存活时间，并刷新在线情况(按秒计算)</td>
      <td class=b><input type="text" size="30" onkeyup="value=value.replace(/[^\d]/g,'')  " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" name="config[online]" value="<?php echo $this->_tpl_vars['online']; ?>
"></td>
    </tr>
	<tr>
      <td class=b>防止CC攻击:<BR />
防止CC攻击，防护大量正常请求造成的拒绝服务攻击</td>
      <td class=b>
<?php if ($this->_tpl_vars['self'] == '1'): ?>
	<input type="radio" name="config[self]" value="1" checked="checked" />是
	<input type="radio" name="config[self]" value="0" />否
<?php else: ?>
	<input type="radio" name="config[self]" value="1" />是
	<input type="radio" name="config[self]" value="0" checked="checked" />否
<?php endif; ?>
	  </td>
    </tr>
	<tr>
      <td class=b>防护站外提交:<BR />
防护站外提交，打开该项目有可能造成用户因为防火墙的缘故不能登陆或者查询数据</td>
      <td class=b>
<?php if ($this->_tpl_vars['getpost'] == '1'): ?>
	<input type="radio" name="config[getpost]" value="1" checked="checked" />是
	<input type="radio" name="config[getpost]" value="0" />否
<?php else: ?>
	<input type="radio" name="config[getpost]" value="1" />是
	<input type="radio" name="config[getpost]" value="0" checked="checked" />否
<?php endif; ?>
	  </td>
    </tr>
	<tr>
      <td class=b>防护提交非法数据:<BR />
防护提交非法数据，打开该项目将过滤用户提交的所有数据中包含的html和script语言，有可能造成用户提交的html文本不能正常显示</td>
      <td class=b>
<?php if ($this->_tpl_vars['html'] == '1'): ?>
	<input type="radio" name="config[html]" value="1" checked="checked" />是
	<input type="radio" name="config[html]" value="0" />否
<?php else: ?>
	<input type="radio" name="config[html]" value="1" />是
	<input type="radio" name="config[html]" value="0" checked="checked" />否
<?php endif; ?>
	  </td>
    </tr>
	<tr>
      <td class=b>安全编码:<BR />
安全编码，请不要随便更改</td>
      <td class=b><input type="text" size="30" name="config[HTMLcode]" value="<?php echo $this->_tpl_vars['HTMLcode']; ?>
"></td>
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