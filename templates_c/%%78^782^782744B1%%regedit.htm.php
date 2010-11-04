<?php /* Smarty version 2.6.10, created on 2009-12-25 05:26:08
         compiled from regedit.htm */ ?>
<table width="500" align="center" cellspacing="5" class="td_login2">
  <form id=regedit name=regedit method=POST>
    <tr>
      <td colspan="3" class="title_blue">当前位置: 用户注册</td>
    </tr>
    <tr>
      <td width="100" height="40" align="right">用 户 名：</td>
      <td width="150"><input type=text tabIndex=10 maxlength=14 name=regname id=regname onBlur="if($('regname').value!='')getNews('checkname','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=login&option=check&type=checkname&id='+$('regname').value);" style="width:120"></td>
      <td><div id=checkname style="background:#DCF2B8;width:200px;border:1px solid #9EC068;">不能有空格，可以是中文，长度控制在 3 - 12 字节以内</div></td>
    </tr>
    <tr>
      <td height="40" align="right"> 密 &nbsp; 码 ：</td>
      <td><input type=password tabIndex=11 maxlength=14 name=userpwd id=userpwd onKeyDown="$('regpwdrepeat').value='';" onBlur="if($('userpwd').value!='')getNews('checkpwd','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=login&option=check&type=checkpwd&id='+$('userpwd').value);" style="width:120"></td>
      <td><div id=checkpwd style="background:#DCF2B8;width:200px;border:1px solid #9EC068;">不能有空格，只可以是英文或者数字，长度控制在 6 - 16 字节以内</div></td>
    </tr>
    <tr>
      <td height="40" align="right">确认密码：</td>
      <td><input type=password tabIndex=12 maxlength=14 name=regpwdrepeat id=regpwdrepeat onBlur="if($('regpwdrepeat').value!='')getNews('checkrepwd','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=login&option=check&type=checkrepwd&id='+$('regpwdrepeat').value+'&Industry='+$('userpwd').value);" onkeydown="if(event.keyCode==13){regedit_article();}" style="width:120"></td>
      <td><div id=checkrepwd style="background:#DCF2B8;width:200px;border:1px solid #9EC068;">再次输入上面的密码</div></td>
    </tr>
    <tr>
      <td height="40" align="right">电子邮件：</td>
      <td><input type=text tabIndex=13 name=regemail id=regemail onBlur="if($('regemail').value!='')getNews('checkemail','<?php echo $this->_tpl_vars['boardurl']; ?>
index.php?action=login&option=check&type=checkemail&id='+$('regemail').value);" onkeydown="if(event.keyCode==13){regedit_article();}" style="width:120"></td>
      <td><div id=checkemail style="background:#DCF2B8;width:200px;border:1px solid #9EC068;">填写正确的电子邮件，在密码丢失时可以通过邮件找回</div></td>
    </tr>
    <tr>
      <td height="40" align="right"> 认 证 码：</td>
      <td><input type='text' maxLength=4 tabIndex=14 name='gdcode' style="ime-mode:disabled" size=10 onkeydown="if(event.keyCode==13){regedit_article();}"></td>
      <td><iframe id=gdcodeiframe src="<?php echo $this->_tpl_vars['boardurl']; ?>
update.php?action=authimg" width="50" height="20" marginheight="0" marginwidth="0" scrolling="no"></iframe></td>
    </tr>
    <tr>
      <td colspan="3" align="center"><input type=button tabIndex=15 style="background:url(image/lvyou/bt_login4.gif);width:240;height:25; border:0;cursor: hand;" name=submit id=submit value=' ' onClick="regedit_article();"></td>
    </tr>
    <tr>
      <td height="20" colspan="3" bgcolor="#EBF9FD" class="txt_green" style="font-size:14px;"><img src="image/lvyou/icon_resume.gif" width="46" height="37"> 阅读嵊泗旅游网服务协议</td>
    </tr>
    <tr>
      <td height="20" colspan="3" align="center" bgcolor="#EBF9FD"><textarea name="textarea2" cols="70" rows="4">   嵊泗旅游网所提供的所有服务，其所有权全部属于嵊泗旅游网。用户必须完全同意所有以下服务条款并完成注册程序，才能享受 嵊泗旅游网提供的各项服务。
					
关于用户个人资料：用户必须提供详尽及准确的个人资料。如个人资料有任何变动，必须及时更新。如果因用户提供的资料不准确造成的用户损失，嵊泗旅游网不负担任何责任。造成侵害第二方以上利益的， 嵊泗旅游网有权终止该用户使用本服务资格。 

关于账户及安全： 用户的个人账号、密码只供用户本人使用。用户对账号、密码的安全负全部责任。用户应避免泄露个人账户信息，无论其是否授权，每个用户都要对用其账号进行的所有活动负全责。如果非免费用户的账户余额为“0”或者不足以进行最后一次最低计费并且时间超过三个月时， 嵊泗旅游网保留注销该用户的权利。 

关于隐私制度：嵊泗旅游网在非法律规定情况下，不会对第三方及以上泄漏用户的任何资料。 

关于承担风险：用户应对使用服务承担个人风险，嵊泗旅游网对此不作任何类型的担保，不论明确的或隐含的。因目前网络产品使用环境相对复杂，嵊泗旅游网无法担保服务一定能满足用户的要求，也无法担保本服务不会受网络环境影响而造成使用中的质量临时下降、中断或出现其它故障。 

关于质量保证：用户在使用嵊泗旅游网所提供的服务前应已经认识到本网站是基于在开放式Internet平台的服务，开放式Internet平台自身是缺乏质量保证体系的（QoS），如果用户发生注册、付费或使用服务任何一项行为即表示用户已经明确同意接受本协议，嵊泗旅游网不保证所提供的服务一定能满足用户的要求，也不保证服务不会受中断，也不保证所提供的服务的及时性、安全性、接通率。对于任何由于服务质量导致的直接或间接损失，嵊泗旅游网不承担任何责任，用户在同意本条款前应已认识到嵊泗旅游网基于Internet平台所提供的服务是一项低成本的服务，而非一项高质量的服务。 


关于通告：所有发给用户的通告都会通过嵊泗旅游网发布，服务条款的修改、服务变更、或其它重要事情都会以此形式进行。通告发布后即已被视为已经送达所有用户，用户单方面承担收知 嵊泗旅游网所有公告的责任。 

关于法律：用户不得利用嵊泗旅游网提供的服务从事任何违反当地法律法规的活动，否则承担由此引发的所有直接和间接的法律和经济责任。本协议的解释、效力及纠纷的解决，适用于中华人民共和国香港特别行政区法律。若用户和悠优国际网路通信有限公司之间发生任何纠纷或争议，首先应友好协商解决，协商不成的，用户在此完全同意将纠纷或争议提交中华人民共和国香港特别行政区法院管辖。

    悠优国际网路通信有限公司版权所有，保留一切解释权利。    

    您明确地承认您已阅读本协议书并且了解本协议书中的权利，义务、条款及条件。如您点击“接受”按钮和/或持续地申请注册嵊泗旅游网帐号或安装嵊泗旅游网软件，则表明您已明确地同意受本协议书的中各条款及条件的约束并给予嵊泗旅游网此中上述的权利。
			</textarea></td>
    </tr>
  </form>
</table>