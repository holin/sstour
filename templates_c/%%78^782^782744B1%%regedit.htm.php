<?php /* Smarty version 2.6.10, created on 2009-12-25 05:26:08
         compiled from regedit.htm */ ?>
<table width="500" align="center" cellspacing="5" class="td_login2">
  <form id=regedit name=regedit method=POST>
    <tr>
      <td colspan="3" class="title_blue">��ǰλ��: �û�ע��</td>
    </tr>
    <tr>
      <td width="100" height="40" align="right">�� �� ����</td>
      <td width="150"><input type=text tabIndex=10 maxlength=14 name=regname id=regname onBlur="if($('regname').value!='')getNews('checkname','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=login&option=check&type=checkname&id='+$('regname').value);" style="width:120"></td>
      <td><div id=checkname style="background:#DCF2B8;width:200px;border:1px solid #9EC068;">�����пո񣬿��������ģ����ȿ����� 3 - 12 �ֽ�����</div></td>
    </tr>
    <tr>
      <td height="40" align="right"> �� &nbsp; �� ��</td>
      <td><input type=password tabIndex=11 maxlength=14 name=userpwd id=userpwd onKeyDown="$('regpwdrepeat').value='';" onBlur="if($('userpwd').value!='')getNews('checkpwd','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=login&option=check&type=checkpwd&id='+$('userpwd').value);" style="width:120"></td>
      <td><div id=checkpwd style="background:#DCF2B8;width:200px;border:1px solid #9EC068;">�����пո�ֻ������Ӣ�Ļ������֣����ȿ����� 6 - 16 �ֽ�����</div></td>
    </tr>
    <tr>
      <td height="40" align="right">ȷ�����룺</td>
      <td><input type=password tabIndex=12 maxlength=14 name=regpwdrepeat id=regpwdrepeat onBlur="if($('regpwdrepeat').value!='')getNews('checkrepwd','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=login&option=check&type=checkrepwd&id='+$('regpwdrepeat').value+'&Industry='+$('userpwd').value);" onkeydown="if(event.keyCode==13){regedit_article();}" style="width:120"></td>
      <td><div id=checkrepwd style="background:#DCF2B8;width:200px;border:1px solid #9EC068;">�ٴ��������������</div></td>
    </tr>
    <tr>
      <td height="40" align="right">�����ʼ���</td>
      <td><input type=text tabIndex=13 name=regemail id=regemail onBlur="if($('regemail').value!='')getNews('checkemail','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=login&option=check&type=checkemail&id='+$('regemail').value);" onkeydown="if(event.keyCode==13){regedit_article();}" style="width:120"></td>
      <td><div id=checkemail style="background:#DCF2B8;width:200px;border:1px solid #9EC068;">��д��ȷ�ĵ����ʼ��������붪ʧʱ����ͨ���ʼ��һ�</div></td>
    </tr>
    <tr>
      <td height="40" align="right"> �� ֤ �룺</td>
      <td><input type='text' maxLength=4 tabIndex=14 name='gdcode' style="ime-mode:disabled" size=10 onkeydown="if(event.keyCode==13){regedit_article();}"></td>
      <td><iframe id=gdcodeiframe src="<?php echo $this->_tpl_vars['boardurl']; ?>
update.php?action=authimg" width="50" height="20" marginheight="0" marginwidth="0" scrolling="no"></iframe></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type=button tabIndex=15 style="background:url(image/lvyou/bt_login4.gif);width:240;height:25; border:0;cursor: hand;" name=submit id=submit value=' ' onClick="regedit_article();"></td>
    </tr>
    <tr>
      <td height="20" colspan="3" bgcolor="#EBF9FD" class="txt_green" style="font-size:14px;"><img src="image/lvyou/icon_resume.gif" width="46" height="37"> �Ķ���������������Э��</td>
    </tr>
    <tr>
      <td height="20" colspan="3" align="center" bgcolor="#EBF9FD"><textarea name="textarea2" cols="70" rows="4">   �������������ṩ�����з���������Ȩȫ�������������������û�������ȫͬ���������·���������ע����򣬲������� �����������ṩ�ĸ������
					
�����û��������ϣ��û������ṩ�꾡��׼ȷ�ĸ������ϡ�������������κα䶯�����뼰ʱ���¡�������û��ṩ�����ϲ�׼ȷ��ɵ��û���ʧ�������������������κ����Ρ�����ֺ��ڶ�����������ģ� ������������Ȩ��ֹ���û�ʹ�ñ������ʸ� 

�����˻�����ȫ�� �û��ĸ����˺š�����ֻ���û�����ʹ�á��û����˺š�����İ�ȫ��ȫ�����Ρ��û�Ӧ����й¶�����˻���Ϣ���������Ƿ���Ȩ��ÿ���û���Ҫ�������˺Ž��е����л��ȫ�����������û����˻����Ϊ��0�����߲����Խ������һ����ͼƷѲ���ʱ�䳬��������ʱ�� ��������������ע�����û���Ȩ���� 

������˽�ƶȣ������������ڷǷ��ɹ涨����£�����Ե�����������й©�û����κ����ϡ� 

���ڳе����գ��û�Ӧ��ʹ�÷���е����˷��գ������������Դ˲����κ����͵ĵ�����������ȷ�Ļ������ġ���Ŀǰ�����Ʒʹ�û�����Ը��ӣ������������޷���������һ���������û���Ҫ��Ҳ�޷����������񲻻������绷��Ӱ������ʹ���е�������ʱ�½����жϻ�����������ϡ� 

����������֤���û���ʹ���������������ṩ�ķ���ǰӦ�Ѿ���ʶ������վ�ǻ����ڿ���ʽInternetƽ̨�ķ��񣬿���ʽInternetƽ̨������ȱ��������֤��ϵ�ģ�QoS��������û�����ע�ᡢ���ѻ�ʹ�÷����κ�һ����Ϊ����ʾ�û��Ѿ���ȷͬ����ܱ�Э�飬��������������֤���ṩ�ķ���һ���������û���Ҫ��Ҳ����֤���񲻻����жϣ�Ҳ����֤���ṩ�ķ���ļ�ʱ�ԡ���ȫ�ԡ���ͨ�ʡ������κ����ڷ����������µ�ֱ�ӻ�����ʧ���������������е��κ����Σ��û���ͬ�Ȿ����ǰӦ����ʶ����������������Internetƽ̨���ṩ�ķ�����һ��ͳɱ��ķ��񣬶���һ��������ķ��� 


����ͨ�棺���з����û���ͨ�涼��ͨ����������������������������޸ġ�����������������Ҫ���鶼���Դ���ʽ���С�ͨ�淢�����ѱ���Ϊ�Ѿ��ʹ������û����û�������е���֪ �������������й�������Ρ� 

���ڷ��ɣ��û��������������������ṩ�ķ�������κ�Υ�����ط��ɷ���Ļ������е��ɴ�����������ֱ�Ӻͼ�ӵķ��ɺ;������Ρ���Э��Ľ��͡�Ч�������׵Ľ�����������л����񹲺͹�����ر����������ɡ����û������Ź�����·ͨ�����޹�˾֮�䷢���κξ��׻����飬����Ӧ�Ѻ�Э�̽����Э�̲��ɵģ��û��ڴ���ȫͬ�⽫���׻������ύ�л����񹲺͹�����ر���������Ժ��Ͻ��

    ���Ź�����·ͨ�����޹�˾��Ȩ���У�����һ�н���Ȩ����    

    ����ȷ�س��������Ķ���Э���鲢���˽ⱾЭ�����е�Ȩ�����������������������������ܡ���ť��/�����������ע�������������ʺŻ�װ��������������������������ȷ��ͬ���ܱ�Э������и����������Լ����������������������������Ȩ����
			</textarea></td>
    </tr>
  </form>
</table>