<?php /* Smarty version 2.6.10, created on 2010-09-11 13:05:46
         compiled from popgroup.htm */ ?>
<?php if ($this->_tpl_vars['option'] == 'index'): ?>
<form name="formupdate" method="post" action="">
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="4" class=head> 管 理 分 组</td>
    </tr>
    <tr>
      <td class=b>用户组</td>
      <td class=b>标识</td>
      <td class=b>后台</td>
      <td class=b>操作</td>
    </tr>
    <?php $_from = $this->_tpl_vars['sql_about']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['about']):
?>
    <?php if ($this->_tpl_vars['about']['group_system'] == 'administrator' || $this->_tpl_vars['about']['group_system'] == 'system'): ?>
    <tr id='list<?php echo $this->_tpl_vars['about']['group_id']; ?>
' onclick="onclickclass('list<?php echo $this->_tpl_vars['about']['group_id']; ?>
');" class=movclick style='cursor: hand;'>
      <td><?php echo $this->_tpl_vars['about']['group_name']; ?>
</td>
      <td><?php echo $this->_tpl_vars['about']['group_system']; ?>
</td>
      <td><?php if ($this->_tpl_vars['about']['group_admin'] == '1'): ?><font color="#FF0000">有</font><?php else: ?><font color="#3300FF">无</font><?php endif; ?></td>
      <td><?php if ($this->_tpl_vars['about']['group_system'] != 'administrator'): ?>
	  <a href="javascript:fshowwindowsopen('showwindow');fshowwindows('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=edit&id=<?php echo $this->_tpl_vars['about']['group_id']; ?>
',1,'修改<?php echo $this->_tpl_vars['about']['group_name']; ?>
组');">查看详细</a>
	  <a href="javascript:_confirm_msg_show('确定删除<?php echo $this->_tpl_vars['about']['group_name']; ?>
组', 'saveUserlogin(\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=del&id=<?php echo $this->_tpl_vars['about']['group_id']; ?>
\',\'formupdate\',\'\',\'getNews(\\\'showtable\\\',\\\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\\\')\')', '', '');">删除</a>
	  <?php endif; ?></td>
    </tr>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
  </table>
  <BR />
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="4" class=head> 会 员 分 组</td>
    </tr>
    <tr>
      <td class=b>用户组</td>
      <td class=b>标识</td>
      <td class=b>后台</td>
      <td class=b>操作</td>
    </tr>
    <?php $_from = $this->_tpl_vars['sql_about']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['about']):
?>
    <?php if ($this->_tpl_vars['about']['group_system'] == 'member'): ?>
    <tr id='list<?php echo $this->_tpl_vars['about']['group_id']; ?>
' onclick="onclickclass('list<?php echo $this->_tpl_vars['about']['group_id']; ?>
');" class=movclick style='cursor: hand;'>
      <td><?php echo $this->_tpl_vars['about']['group_name']; ?>
</td>
      <td><?php echo $this->_tpl_vars['about']['group_system']; ?>
</td>
      <td><?php if ($this->_tpl_vars['about']['group_admin'] == '1'): ?><font color="#FF0000">有</font><?php else: ?><font color="#3300FF">无</font><?php endif; ?></td>
      <td><a href="javascript:fshowwindowsopen('showwindow');fshowwindows('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=edit&id=<?php echo $this->_tpl_vars['about']['group_id']; ?>
',1,'修改<?php echo $this->_tpl_vars['about']['group_name']; ?>
组');">查看详细</a> <a href="javascript:_confirm_msg_show('确定删除<?php echo $this->_tpl_vars['about']['group_name']; ?>
组', 'saveUserlogin(\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=del&id=<?php echo $this->_tpl_vars['about']['group_id']; ?>
\',\'formupdate\',\'\',\'getNews(\\\'showtable\\\',\\\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\\\')\')', '', '');">删除</a></td>
    </tr>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
  </table>
  <BR />
  <table width=98% align=center cellspacing=1 cellpadding=3 class=i_table>
    <tr>
      <td colspan="4" class=head> 默 认 分 组</td>
    </tr>
    <tr>
      <td class=b>用户组</td>
      <td class=b>标识</td>
      <td class=b>后台</td>
      <td class=b>操作</td>
    </tr>
    <?php $_from = $this->_tpl_vars['sql_about']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['about']):
?>
    <?php if ($this->_tpl_vars['about']['group_system'] == 'private'): ?>
    <tr id='list<?php echo $this->_tpl_vars['about']['group_id']; ?>
' onclick="onclickclass('list<?php echo $this->_tpl_vars['about']['group_id']; ?>
');" class=movclick style='cursor: hand;'>
      <td><?php echo $this->_tpl_vars['about']['group_name']; ?>
</td>
      <td><?php echo $this->_tpl_vars['about']['group_system']; ?>
</td>
      <td><?php if ($this->_tpl_vars['about']['group_admin'] == '1'): ?><font color="#FF0000">有</font><?php else: ?><font color="#3300FF">无</font><?php endif; ?></td>
      <td><a href="javascript:fshowwindowsopen('showwindow');fshowwindows('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=edit&id=<?php echo $this->_tpl_vars['about']['group_id']; ?>
',1,'修改<?php echo $this->_tpl_vars['about']['group_name']; ?>
组');">查看详细</a> <a href="javascript:_confirm_msg_show('确定删除<?php echo $this->_tpl_vars['about']['group_name']; ?>
组', 'saveUserlogin(\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=del&id=<?php echo $this->_tpl_vars['about']['group_id']; ?>
\',\'formupdate\',\'\',\'getNews(\\\'showtable\\\',\\\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\\\')\')', '', '');">删除</a></td>
    </tr>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
  </table>
  <BR />
  <center>
    <input type=hidden name=update value='update'>
    &nbsp; &nbsp;
    <input type="button" name="Submit" id=addnews value=" 添 加 新 组 " onClick="javascript:fshowwindowsopen('showwindow');fshowwindows('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=edit',1,'添加新组');">
  </center>
</form>
<?php elseif ($this->_tpl_vars['option'] == 'edit'): ?>
<form name="formupdatedit" method="post">
  <table width="600" align="center" cellpadding="3" cellspacing="1" class="i_table">
    <tbody>
      <tr>
        <td colspan="2" class="head">用户组管理</td>
      </tr>
      <tr>
        <td class="b">用户组</td>
        <td class="b"><input type="text" name="group_name" value="<?php echo $this->_tpl_vars['sql_group']['group_name']; ?>
"></td>
      </tr>
      <tr>
        <td class="b">标识</td>
        <td class="b">
          <select name="group_system">
		  <?php if ($this->_tpl_vars['sql_group']['group_system'] == 'private'): ?>
		  <option value="private" selected="selected">默认组(private)</option>
		  <?php else: ?>
		  <option value="private">默认组(private)</option>
		  <?php endif; ?>
		  <?php if ($this->_tpl_vars['sql_group']['group_system'] == 'member'): ?>
		  <option value="member" selected="selected">会员组(member)</option>
		  <?php else: ?>
		  <option value="member">会员组(member)</option>
		  <?php endif; ?>
		  <?php if ($this->_tpl_vars['sql_group']['group_system'] == 'system'): ?>
		  <option value="system" selected="selected">管理组(system)</option>
		  <?php else: ?>
		  <option value="system">管理组(system)</option>
		  <?php endif; ?>
          </select>
        </td>
      </tr>
    </tbody>
  </table>
  <table width="600" align="center" cellpadding="3" cellspacing="1" class="i_table">
    <tr>
      <td class="head">前台权限</td>
    </tr>
  </table>
  <table width="600" align="center" cellpadding="3" cellspacing="1" class="i_table">
    <tbody>
    <?php $this->assign('doo', 0); ?>
    <?php $_from = $this->_tpl_vars['sql_hack']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hack']):
?>		
    <?php if ($this->_tpl_vars['doo'] == '0'): ?><tr><?php endif; ?>
      <td class="b">
	  <?php $this->assign('foo', 0); ?>
	  <?php $_from = $this->_tpl_vars['groupaction']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['groupactions']):
?>
        <?php if ($this->_tpl_vars['hack']['hack_action'] == $this->_tpl_vars['groupactions']): ?>
		<?php $this->assign('foo', 1); ?>
		<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
        <?php if ($this->_tpl_vars['foo'] == '1'): ?> &nbsp;
        <input type="checkbox" name=act[] value="<?php echo $this->_tpl_vars['hack']['hack_action']; ?>
" checked="checked">
        <?php echo $this->_tpl_vars['hack']['hack_subject']; ?>
 &nbsp;
        <?php else: ?>
        &nbsp;
        <input type="checkbox" name=act[] value="<?php echo $this->_tpl_vars['hack']['hack_action']; ?>
">
        <?php echo $this->_tpl_vars['hack']['hack_subject']; ?>
 &nbsp; 
        <?php endif; ?></td>
      <?php if ($this->_tpl_vars['doo'] == '4'): ?></tr><?php $this->assign('doo', 0);  else:  $this->assign('doo', $this->_tpl_vars['doo']+1);  endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    </tr>    
    </tbody>    
  </table>
  <BR />
    <table width="600" align="center" cellpadding="3" cellspacing="1" class="i_table">
    <tr>
      <td class="head">修改权限</td>
    </tr>	
  </table>
  <table width="600" align="center" cellpadding="3" cellspacing="1" class="i_table">
  <tbody>
    <?php $this->assign('doo', 0); ?>
	<?php $_from = $this->_tpl_vars['sql_action']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['actiontts']):
?>    
	<?php if ($this->_tpl_vars['doo'] == '0'): ?><tr><?php endif; ?>
	<td class="b">	
	<?php $this->assign('foo', 0); ?>
	<?php $_from = $this->_tpl_vars['groupactionadmin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['groupactionadmins']):
?>
	<?php if ($this->_tpl_vars['actiontts']['action_action'] == $this->_tpl_vars['groupactionadmins']): ?>
	<?php $this->assign('foo', '1'); ?>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php if ($this->_tpl_vars['foo'] == '1'): ?> &nbsp; 
	<input type="checkbox" name=atts[] value="<?php echo $this->_tpl_vars['actiontts']['action_action']; ?>
" checked="checked">
	<?php echo $this->_tpl_vars['actiontts']['action_subject']; ?>
 &nbsp; 
	<?php else: ?> &nbsp; 
	<input type="checkbox" name=atts[] value="<?php echo $this->_tpl_vars['actiontts']['action_action']; ?>
">
	<?php echo $this->_tpl_vars['actiontts']['action_subject']; ?>
 &nbsp; 
	<?php endif; ?>	
	</td>
	<?php if ($this->_tpl_vars['doo'] == '4'): ?></tr><?php $this->assign('doo', 0);  else:  $this->assign('doo', $this->_tpl_vars['doo']+1);  endif; ?>
	<?php endforeach; endif; unset($_from); ?>     
	</tbody>
  </table>
  <BR />
  <table width="600" align="center" cellpadding="3" cellspacing="1" class="i_table">
    <tr>
      <td class="head">后台权限</td>
	  <td class="head"><?php if ($this->_tpl_vars['sql_group']['group_admin'] == '1'): ?>
          <input name="group_admin" type="radio" value="1" checked>是
          <input name="group_admin" type="radio" value="0">否
          <?php else: ?>
          <input name="group_admin" type="radio" value="1">是
          <input name="group_admin" type="radio" value="0" checked>否
          <?php endif; ?></td>
	  <td class="head"><input type='checkbox' name='chkall' onclick='CheckAll(this.form)'>全选</td>
    </tr>	
  </table>
  <?php $_from = $this->_tpl_vars['sql_admin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['admin']):
?>
  <?php if ($this->_tpl_vars['admin']['type_live'] == '0'): ?>
  <table width="600" align="center" cellpadding="3" cellspacing="1" class="i_table">
  <tbody>
    <tr>
      <td class="head" colspan="5"><?php echo $this->_tpl_vars['admin']['type_subject']; ?>
 &nbsp; 
        <?php $this->assign('foo', 0); ?>
        <?php $_from = $this->_tpl_vars['authority']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['authoritys']):
?>
        <?php if ($this->_tpl_vars['admin']['type_sp'] == $this->_tpl_vars['authoritys']): ?>
        <?php $this->assign('foo', '1'); ?>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
        <?php if ($this->_tpl_vars['foo'] == '1'): ?>
        <input type="checkbox" name=pop[] value="<?php echo $this->_tpl_vars['admin']['type_sp']; ?>
" checked="checked">
        <?php else: ?>
        <input type="checkbox" name=pop[] value="<?php echo $this->_tpl_vars['admin']['type_sp']; ?>
">
        <?php endif; ?> </td>
    </tr>
	<?php $this->assign('doo', 0); ?>
	<?php $_from = $this->_tpl_vars['sql_admin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['admin_list']):
?>    
	<?php if ($this->_tpl_vars['admin_list']['type_live'] == $this->_tpl_vars['admin']['type_id']): ?>
	<?php if ($this->_tpl_vars['doo'] == '0'): ?><tr><?php endif; ?>
	<td class="b">	
	<?php $this->assign('foo', 0); ?>
	<?php $_from = $this->_tpl_vars['authority']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['authoritylist']):
?>
	<?php if ($this->_tpl_vars['admin_list']['type_sp'] == $this->_tpl_vars['authoritylist']): ?>
	<?php $this->assign('foo', '1'); ?>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php if ($this->_tpl_vars['foo'] == '1'): ?> &nbsp; 
	<input type="checkbox" name=pop[] value="<?php echo $this->_tpl_vars['admin_list']['type_sp']; ?>
" checked="checked">
	<?php echo $this->_tpl_vars['admin_list']['type_subject']; ?>
 &nbsp; 
	<?php else: ?> &nbsp; 
	<input type="checkbox" name=pop[] value="<?php echo $this->_tpl_vars['admin_list']['type_sp']; ?>
">
	<?php echo $this->_tpl_vars['admin_list']['type_subject']; ?>
 &nbsp; 
	<?php endif; ?>	
	</td>
	<?php if ($this->_tpl_vars['doo'] == '4'): ?></tr><?php $this->assign('doo', 0);  else:  $this->assign('doo', $this->_tpl_vars['doo']+1);  endif; ?>
	<?php endif; ?>	
	<?php endforeach; endif; unset($_from); ?>     
	</tbody>
  </table>
  <?php endif; ?>
  <?php endforeach; endif; unset($_from); ?>
  <BR />
  <center>
    <input type=hidden name="group_id" value='<?php echo $this->_tpl_vars['sql_group']['group_id']; ?>
'>    
    <input type=hidden name=update value='update'>	
	<input id=Submit name=Submit type=button style="width:62px;height:22px;border:0;background:url('./image/edit/smb_btn_bg.gif');line-height:20px;" value='确认' onfocus=true onclick="saveUserlogin('admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
&option=<?php echo $this->_tpl_vars['option']; ?>
&id=<?php echo $this->_tpl_vars['id']; ?>
','formupdatedit','','fshowwindowsclos(\'showwindow\');getNews(\'showtable\',\'admin.php?action=<?php echo $this->_tpl_vars['action']; ?>
\');');" /> &nbsp; <input id=Submit name=Submit type=button style="width:62px;height:22px;border:0;background:url('./image/edit/smb_btn_bg.gif');line-height:20px;" value='取消' onclick="new dialog().reset();fshowwindowsclos('showwindow');" />
  </center>
</form>
<?php endif; ?> 