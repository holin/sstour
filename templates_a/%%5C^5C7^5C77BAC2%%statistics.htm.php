<?php /* Smarty version 2.6.10, created on 2010-09-11 13:03:36
         compiled from statistics.htm */ ?>
<form name="formupdate" method="post" action="">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td class=head> 流 量 统 计</td>
    </tr>
    <tr>
      <td class=b><table cellspacing="0" border="0" onClick="sortColumn(event)" class="tablemule">
          <thead class="theadmule tdmule">
            <tr class="trmule">
              <td style="width: 60px;" class="tdmule">时间</td>
              <td style="width: 60px;" class="tdmule">功能</td>
              <td style="width: 60px;" class="tdmule">控制</td>
              <td style="width: 60px;" class="tdmule">地址</td>
              <td style="width: 60px;" class="tdmule">IP</td>
              <td style="width: 60px;" class="tdmule">用户名</td>
            </tr>
          </thead>
          <tbody>
          <?php $_from = $this->_tpl_vars['sql_statistics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['statistics']):
?>
          <tr id='list<?php echo $this->_tpl_vars['statistics']['st_date']; ?>
' onclick="onclickclass('list<?php echo $this->_tpl_vars['statistics']['st_date']; ?>
');" class=movclick style='cursor: hand;'>
            <td><?php echo $this->_tpl_vars['statistics']['st_date']; ?>
</td>
            <td><?php echo $this->_tpl_vars['statistics']['st_action']; ?>
</td>
            <td><?php echo $this->_tpl_vars['statistics']['st_option']; ?>
</td>
            <td><?php echo $this->_tpl_vars['statistics']['st_url']; ?>
</td>
            <td><?php echo $this->_tpl_vars['statistics']['st_ip']; ?>
</td>
            <td><?php echo $this->_tpl_vars['statistics']['st_username']; ?>
</td>
          </tr>
          <?php endforeach; endif; unset($_from); ?>
          </tbody>          
        </table></td>
    </tr>
	<tr><td><?php echo $this->_tpl_vars['fpageup']; ?>
</td></tr>
	<tr>
      <td><input type="text" size="12" name="type" id="type" onMouseDown="showCalendar('type',true,'type',null,'setCheckInDate');" value="<?php echo $this->_tpl_vars['type']; ?>
">
        -
        <input type="text" size="12" name="Industry" id="Industry" onMouseDown="showCalendar('Industry',true,'Industry',null,'setCheckInDate');" value="<?php echo $this->_tpl_vars['Industry']; ?>
">
        <select name="getids" onchange="document.getElementById('getid').value=this.options[selectedIndex].value">
          <option value="">所有</option>
          <?php if ($this->_tpl_vars['id'] == '1'): ?>
          <option value="1" selected="selected">操作</option>
          <?php else: ?>
          <option value="1">操作</option>
          <?php endif; ?> <?php if ($this->_tpl_vars['id'] == '2'): ?>
          <option value="2" selected="selected">功能</option>
          <?php else: ?>
          <option value="2">功能</option>
          <?php endif; ?> <?php if ($this->_tpl_vars['id'] == '3'): ?>
          <option value="3" selected="selected">控制</option>
          <?php else: ?>
          <option value="3">控制</option>
          <?php endif; ?> <?php if ($this->_tpl_vars['id'] == '4'): ?>
          <option value="4" selected="selected">地址</option>
          <?php else: ?>
          <option value="4">地址</option>
          <?php endif; ?> <?php if ($this->_tpl_vars['id'] == '5'): ?>
          <option value="5" selected="selected">IP</option>
          <?php else: ?>
          <option value="5">IP</option>
          <?php endif; ?> <?php if ($this->_tpl_vars['id'] == '6'): ?>
          <option value="6" selected="selected">用户名</option>
          <?php else: ?>
          <option value="6">用户名</option>
          <?php endif; ?>
        </select>
        <input type="hidden" name="getid" value="<?php echo $this->_tpl_vars['id']; ?>
" />
        <input name="Keyword" id=Keyword type="text" size="20" value="<?php echo $this->_tpl_vars['Keyword']; ?>
">
        <a href="javascript:getNews('showtable','admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&Keyword='+escape(document.getElementById('Keyword').value)+'&type='+document.getElementById('type').value+'&Industry='+document.getElementById('Industry').value+'&id='+document.getElementById('getid').value);">查询</a></td>
    </tr>
  </table>
  <br>
  <center>
    <input type=hidden name=update value='update'>
    &nbsp;
    <input type="button" name="Submit" id=Submit value=" 清除一周前的记录 " onClick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
','formupdate','','getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\');')">
  </center>
</form>