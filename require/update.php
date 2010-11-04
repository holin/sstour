<?php
$optionall = explode(",",$sql_pop['group_option']);
$authority = explode(",",$sql_pop['group_authority']);
if(in_array($option,$optionall) || $sql_pop['group_option']=='all')
{
	include_once GetLang('image');
	include_once Getincludefun("image");

	if($option == 'buildhotel')
	{
		if($type == 'edit')
		die("<iframe name='releasediframe' width='500' height='280' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='{$boardurl}index.php?action=update&option=buildhotel&id={$id}'>您的浏览器不支持iframe</iframe>");
		if($_POST['update'] == 'update')
		{
			//fgetposttoupdatd($_POST,$ODBC['charset']);
			if($id=='')
			{
				if($_POST['blog_tags']!='')
				{
					$blog_tags = explode(",",$_POST['blog_tags']);
					$gametag = array_unique ($blog_tags);
					$gametags = "'".implode("','",$gametag)."'";
					$_POST['blog_tags'] = implode(",",$gametag);
					$sql_gametag = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}hoteltag`","`tag_subject` IN ({$gametags})");
					foreach ($sql_gametag AS $value)
					{
						foreach ($gametag AS $key=>$ver)
						{
							if($ver == $value['tag_subject'])
							unset($gametag[$key]);
						}
					}
					$GETSQL->fUpdate("`{$ODBC['tablepre']}hoteltag`","`tag_num`=`tag_num`+1","`tag_subject` IN ({$gametags})");
					foreach ($gametag AS $value)
					{
						$cQuery = array("`tag_subject`");
						$cData = array($value);
						$GETSQL->fInsert("`{$ODBC['tablepre']}hoteltag`",$cQuery,$cData);
					}
				}
				$cQuery = array("`hot_id`","`hot_uid`", "`hot_username`", "`hot_subject`", "`hot_addess`","`hot_tages`","`hot_start`","`hot_contact`","`hot_phone`","`hot_date`");
				$cData = array($nowtime,$uid,$uname,$_POST['subject'],$_POST['addess'],$_POST['blog_tags'],$_POST['startseld'],$_POST['contact'],$_POST['phone'],fgetdate());
				$GETSQL->fInsert("`{$ODBC['tablepre']}hotel`",$cQuery,$cData);
				$GETSQL->fUpdate("`{$ODBC['tablepre']}members`","`categories`='1',`cpid`='{$nowtime}'","`uid`='{$uid}'");
				echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
				<script type='text/javascript' language='javascript'>
				var s = new parent.parent.dialog();s.init();
				s.set('src', 2);
				s.set('title', '系统提示信息');
				s.event('申请升级酒店成功','parent.parent.location.href=\"{$boardurl}index.php?action=hotel&option=single&id={$nowtime}\"','','parent.parent.location.href=\"{$boardurl}index.php?action=hotel&option=single&id={$nowtime}\"');
				</script>";exit;
				die(gb2utf8("申请升级酒店成功"));
			}else{
				$sql_hotel = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
				if($sql_hotel['hot_id'] != '' AND ($uid == $sql_hotel['hot_uid'] || in_array('hotel',$authority) || $sql_pop['group_authority']=='all'))
				{
					$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_subject`='{$_POST['subject']}',
					`hot_addess`='{$_POST['addess']}',
					`hot_tages`='{$_POST['blog_tags']}',
					`hot_start`='{$_POST['startseld']}',
					`hot_contact`='{$_POST['contact']}',
					`hot_phone`='{$_POST['phone']}'",
					"`hot_id`='{$id}'");
					if($actionhtml = GetCache('hotel'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/hotel/single_I_{$id}.htm");
							ffile("{$boardurl}index.php?action=hotel&option=single&id={$id}",'',"r");
						}
					}
					echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
					<script type='text/javascript' language='javascript'>
					var s = new parent.parent.dialog();s.init();
					s.set('src', 2);
					s.set('title', '系统提示信息');
					s.event('酒店资料修改成功<BR>其他信息页面会在十分钟内更新','parent.parent.window.location.reload();','','parent.parent.window.location.reload();');
					</script>";exit;
					die(gb2utf8("酒店资料修改成功"));
				}else{
					echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
					<script type='text/javascript' language='javascript'>
					var s = new parent.parent.dialog();s.init();
					s.set('src', 2);
					s.set('title', '系统提示信息');
					s.event('酒店资料修改失败','parent.parent.window.location.reload();','','parent.parent.window.location.reload();');
					</script>";exit;
					die(gb2utf8("酒店资料修改失败"));
				}
			}
		}
		if($id != '')
		{
			$sql_hotel = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
			if($sql_hotel['hot_id'] != '' AND ($uid == $sql_hotel['hot_uid'] || in_array('hotel',$authority) || $sql_pop['group_authority']=='all'))
			{
				$smarty->assign('sql_hotel',$sql_hotel);
			}
		}
		$smarty->display("buildhotel.htm");
	}
	if($option == 'hotellogo')
	{
		$sql_hotel = $GETSQL->fSql("hot_id,hot_uid,hot_logo","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
		if($sql_hotel['hot_id'] != '' AND ($uid == $sql_hotel['hot_uid'] || in_array('hotel',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($type == 'edit')
			die("<iframe name='releasediframe' width='350' height='150' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='{$boardurl}index.php?action=update&option=hotellogo&id={$id}'>您的浏览器不支持iframe</iframe>");
			if($_FILES['uploadicongame']['name']!="")
			{
				P_unlink(R_P."{$sql_hotel['hot_logo']}");
				$img = "{$config['attach']}/hotel/".fUploadimg_process($_FILES['uploadicongame'],"{$config['attach']}/hotel/");
				$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_logo`='{$img}'","`hot_id`='{$id}'");
				if($actionhtml = GetCache('hotel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/hotel/single_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=hotel&option=single&id={$id}",'',"r");
					}
				}
				echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
				<script type='text/javascript' language='javascript'>
				parent.window.location.reload();
				</script>";exit;
				die(gb2utf8("LOGO上传成功成功"));
			}
			$smarty->assign('sql_hotel',$sql_hotel);
			$smarty->display("logoimage.htm");
		}
	}
	if($option == 'hotelinfo')
	{
		$sql_hotel = $GETSQL->fSql("hot_id,hot_uid,hot_info,hot_traffic","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
		if($sql_hotel['hot_id'] != '' AND ($uid == $sql_hotel['hot_uid'] || in_array('hotel',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($_POST['update']=="update")
			{
				fgetposttoupdatd($_POST,$ODBC['charset']);
				$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_info`='{$_POST['hot_info']}',`hot_traffic`='{$_POST['hot_traffic']}'","`hot_id`='{$id}'");
				if($actionhtml = GetCache('hotel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/hotel/showhotinfo_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=hotel&option=showhotinfo&id={$id}",'',"r");
						P_unlink(R_P."html/hotel/showhottraffic_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=hotel&option=showhottraffic&id={$id}",'',"r");
					}
				}
				die(gb2utf8("酒店介绍修改成功"));
			}
			$smarty->assign('sql_hotel',$sql_hotel);
			$smarty->display("updatehotel.htm");
		}
	}
	if($option == 'hotelphoto')
	{
		$sql_hotel = $GETSQL->fSql("hot_id,hot_uid,hot_info,hot_traffic","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
		if($sql_hotel['hot_id'] != '' AND ($uid == $sql_hotel['hot_uid'] || in_array('hotel',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($_FILES['uploadphoto']['name']!="" && $_POST['uploadsubject']!='')
			{
				$img = "{$config['attach']}/hotel/".fUploadimg_process($_FILES['uploadphoto'],"{$config['attach']}/hotel/","simll/");
				ImgWaterMark($img,$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);
				$cQuery = array("`hi_id`","`hi_hid`","`hi_src`","`hi_subject`","`hi_date`");
				$cData = array($nowtime,$sql_hotel['hot_id'],$img,$_POST['uploadsubject'],fgetdate());
				$GETSQL->fInsert("`{$ODBC['tablepre']}hotelimage`",$cQuery,$cData);

				$cQuery = array("`img_picid`","`img_cid`","`img_picsrc`","`img_picsize`","`img_uid`");
				$cData = array($nowtime,$nowtime,$img,$_FILES['uploadphoto']['size'],$uid);
				$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);

				$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_album`=`hot_album`+1","`hot_id`='{$id}'");
				if($actionhtml = GetCache('hotel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/hotel/hotelphoto_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=hotel&option=hotelphoto&id={$id}",'',"r");
					}
				}
				echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
				<script type='text/javascript' language='javascript'>
				var s = new parent.dialog();s.init();
				s.set('src', 2);
				s.set('title', '系统提示信息');
				s.event('图片上传成功','parent.window.location.reload();','','parent.window.location.reload();');
				</script>";exit;
				die(gb2utf8("图片上传成功"));
			}
			if($type == 'pass')
			{
				$GETSQL->fUpdate("`{$ODBC['tablepre']}hotelimage`","`hi_pass`='1'","`hi_id`='{$Industry}' AND `hi_hid`='{$id}'");
				$mesg = "<img src='image/msg/error.gif' onclick=\"getNews('showimgdel_{$Industry}','{$boardurl}index.php?action=update&option=hotelphoto&id={$id}&Industry={$Industry}&type=delpass')\" alt='取消推荐' /><img src='image/msg/closed.gif' onclick=\"_confirm_msg_show('确定删除图片', 'getNews(\\\\\'showimg_{$Industry}\\\\\',\\\\\'{$boardurl}index.php?action=update&option=hotelphoto&id={$id}&Industry={$Industry}&type=del\\\\\');$(\\\\\'showimg_{$Industry}\\\\\').parentNode.removeChild($(\\\\\'showimg_{$Industry}\\\\\'))', '', '')\" alt='删除图片' /></div>";
				die(gb2utf8($mesg));
			}
			if($type == 'delpass')
			{
				$GETSQL->fUpdate("`{$ODBC['tablepre']}hotelimage`","`hi_pass`='0'","`hi_id`='{$Industry}' AND `hi_hid`='{$id}'");
				$mesg = "<img src='image/msg/pin_1.gif' onclick=\"getNews('showimgdel_{$Industry}','{$boardurl}index.php?action=update&option=hotelphoto&id={$id}&Industry={$Industry}&type=pass')\" alt='推荐图片' /><img src='image/msg/closed.gif' onclick=\"_confirm_msg_show('确定删除图片', 'getNews(\\\\\'showimg_{$Industry}\\\\\',\\\\\'{$boardurl}index.php?action=update&option=hotelphoto&id={$id}&Industry={$Industry}&type=del\\\\\');$(\\\\\'showimg_{$Industry}\\\\\').parentNode.removeChild($(\\\\\'showimg_{$Industry}\\\\\'))', '', '')\" alt='删除图片' /></div>";
				die(gb2utf8($mesg));
			}
			if($type == 'del')
			{
				$sql_hotelimage = $GETSQL->fSql("hi_src","`{$ODBC['tablepre']}hotelimage`","`hi_id`='{$Industry}' AND `hi_hid`='{$id}'","","","","U_B");
				P_unlink(R_P."{$sql_hotelimage['hi_src']}");
				P_unlink(R_P.fimgsrc($sql_hotelimage['hi_src'],$simp='simll/'));
				$GETSQL->fDelete("`{$ODBC['tablepre']}hotelimage`","`hi_id`='{$Industry}' AND `hi_hid`='{$id}'","1");
				$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_album`=`hot_album`-1","`hot_id`='{$id}'");
				if($actionhtml = GetCache('hotel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					P_unlink(R_P."html/hotel/hotelphoto_I_{$id}_Y_{$Industry}.htm");
				}
			}
		}
	}
	if($option == 'hotelroom')
	{
		$sql_hotel = $GETSQL->fSql("hot_id,hot_uid,hot_info,hot_traffic","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
		if($sql_hotel['hot_id'] != '' AND ($uid == $sql_hotel['hot_uid'] || in_array('hotel',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($type == 'edit')
			die("<iframe name='releasediframe' width='500' height='350' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='{$boardurl}index.php?action=update&option=hotelroom&id={$id}&Industry={$Industry}'>您的浏览器不支持iframe</iframe>");
			if($type == 'pass')
			{
				$GETSQL->fUpdate("`{$ODBC['tablepre']}hotelroom`","`room_pass`='1'","`room_hid`='{$id}' AND `room_id`='{$Industry}'");
				die(gb2utf8("推荐成功"));
			}
			if($type == 'delpass')
			{
				$GETSQL->fUpdate("`{$ODBC['tablepre']}hotelroom`","`room_pass`='0'","`room_hid`='{$id}' AND `room_id`='{$Industry}'");
				die(gb2utf8("取消推荐成功"));
			}
			if($type == 'del')
			{
				$sql_hotelimage = $GETSQL->fSql("room_image","`{$ODBC['tablepre']}hotelroom`","`room_hid`='{$id}' AND `room_id`='{$Industry}'","","","","U_B");
				P_unlink(R_P."{$sql_hotelimage['room_image']}");
				$GETSQL->fDelete("`{$ODBC['tablepre']}hotelroom`","`room_hid`='{$id}' AND `room_id`='{$Industry}'","1");
				$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_room`=`hot_room`-1","`hot_id`='{$id}'");
			}
			if($_POST['update'] == 'update')
			{
				if($Industry=='')
				{
					if($_POST['blog_tags']!='')
					{
						$blog_tags = explode(",",$_POST['blog_tags']);
						$gametag = array_unique ($blog_tags);
						$gametags = "'".implode("','",$gametag)."'";
						$_POST['blog_tags'] = implode(",",$gametag);
						$sql_gametag = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}roomtag`","`tag_subject` IN ({$gametags})");
						foreach ($sql_gametag AS $value)
						{
							foreach ($gametag AS $key=>$ver)
							{
								if($ver == $value['tag_subject'])
								unset($gametag[$key]);
							}
						}
						$GETSQL->fUpdate("`{$ODBC['tablepre']}roomtag`","`tag_num`=`tag_num`+1","`tag_subject` IN ({$gametags})");
						foreach ($gametag AS $value)
						{
							$cQuery = array("`tag_subject`");
							$cData = array($value);
							$GETSQL->fInsert("`{$ODBC['tablepre']}roomtag`",$cQuery,$cData);
						}
					}
					if($_FILES['uploadicongame']['name']!="")
					{
						$img = "{$config['attach']}/hotel/".fUploadimg_process($_FILES['uploadicongame'],"{$config['attach']}/hotel/");
						//ImgWaterMark($img,$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);

						$cQuery = array("`img_picid`","`img_cid`","`img_picsrc`","`img_picsize`","`img_uid`");
						$cData = array($nowtime,$sql_hotel['hot_id'],$img,$_FILES['uploadicongame']['size'],$uid);
						$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);
					}else{
						$img = "";
					}
					$cQuery = array("`room_id`","`room_hid`", "`room_subject`", "`room_tages`", "`room_price`","`room_image`","`room_info`","`room_date`");
					$cData = array($nowtime,$sql_hotel['hot_id'],$_POST['roomsubject'],$_POST['blog_tags'],$_POST['roomprice'],$img,$_POST['roominfo'],fgetdate());
					$GETSQL->fInsert("`{$ODBC['tablepre']}hotelroom`",$cQuery,$cData);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_room`=`hot_room`+1","`hot_id`='{$id}'");
					if($actionhtml = GetCache('hotel'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/hotel/hotelroom_I_{$sql_hotel['hot_id']}.htm");
							ffile("{$boardurl}index.php?action=hotel&option=hotelroom&id={$sql_hotel['hot_id']}",'',"r");
						}
					}
					echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
					<script type='text/javascript' language='javascript'>
					var s = new parent.parent.dialog();s.init();
					s.set('src', 2);
					s.set('title', '系统提示信息');
					s.event('房间添加成功','parent.parent.location.href=\"{$boardurl}index.php?action=hotel&option=hotelroom&id={$sql_hotel['hot_id']}\"','','parent.parent.location.href=\"{$boardurl}index.php?action=hotel&option=hotelroom&id={$sql_hotel['hot_id']}\"');
					</script>";exit;
					die(gb2utf8("房间添加成功"));
				}else{
					if($_FILES['uploadicongame']['name']!="")
					{
						$sql_hotelroom = $GETSQL->fSql("room_image","`{$ODBC['tablepre']}hotelroom`","`room_hid`='{$id}' AND `room_id`='{$Industry}'","","","","U_B");
						P_unlink(R_P."{$sql_hotelroom['room_image']}");
						$img = "'{$config['attach']}/hotel/".fUploadimg_process($_FILES['uploadicongame'],"{$config['attach']}/hotel/")."'";
						//ImgWaterMark($img,$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);

						$cQuery = array("`img_picid`","`img_cid`","`img_picsrc`","`img_picsize`","`img_uid`");
						$cData = array($nowtime,$sql_hotel['hot_id'],$img,$_FILES['uploadicongame']['size'],$uid);
						$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);
					}else{
						$img = "`room_image`";
					}
					$GETSQL->fUpdate("`{$ODBC['tablepre']}hotelroom`","`room_subject`='{$_POST['roomsubject']}',
					`room_tages`='{$_POST['blog_tags']}',
					`room_price`='{$_POST['roomprice']}',
					`room_image`={$img},
					`room_info`='{$_POST['roominfo']}',
					`room_date`='".fgetdate()."'",
					"`room_hid`='{$id}' AND `room_id`='{$Industry}'");
					if($actionhtml = GetCache('hotel'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/hotel/hotelroom_I_{$sql_hotel['hot_id']}.htm");
							ffile("{$boardurl}index.php?action=hotel&option=hotelroom&id={$sql_hotel['hot_id']}",'',"r");
						}
					}
					echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
					<script type='text/javascript' language='javascript'>
					var s = new parent.parent.dialog();s.init();
					s.set('src', 2);
					s.set('title', '系统提示信息');
					s.event('房间资料修改成功<BR>其他信息页面会在十分钟内更新','parent.parent.window.location.reload();','','parent.parent.window.location.reload();');
					</script>";exit;
					die(gb2utf8("房间资料修改成功"));
				}
			}
			if($Industry!='')
			{
				$sql_hotelroom = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelroom`","`room_hid`='{$id}' AND `room_id`='{$Industry}'","","","","U_B");
				$smarty->assign('sql_hotelroom',$sql_hotelroom);
			}
			$smarty->assign('sql_hotel',$sql_hotel);
			$smarty->display("updateroom.htm");
		}
	}
	if($option == 'hotelword')
	{
		$sql_hotel = $GETSQL->fSql("hot_id,hot_uid,hot_info,hot_traffic","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
		if($sql_hotel['hot_id'] != '' AND ($uid == $sql_hotel['hot_uid'] || in_array('hotel',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($type == 'post')
			{
				if($_POST['update'] == 'update')
				{
					fgetposttoupdatd($_POST,$ODBC['charset']);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}hotelword`","`word_post`='{$_POST['wordpost']}',`word_redate`='".fgetdate()."'","`word_hid`='{$id}' AND `word_id`='{$Industry}'");
					if($actionhtml = GetCache('hotel'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/hotel/hotelword_I_{$sql_hotel['hot_id']}.htm");
							ffile("{$boardurl}index.php?action=hotel&option=hotelword&id={$sql_hotel['hot_id']}",'',"r");
						}
					}
					die(gb2utf8("回复成功"));
				}
				$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelword`","`word_hid`='{$id}' AND `word_id`='{$Industry}'","","","","U_B");
				$smarty->assign('sql_hotelword',$sql_hotelword);
				$smarty->display("postword.htm");
			}
			if($type == 'postthread')
			{
				if($_POST['update'] == 'update')
				{
					fgetposttoupdatd($_POST,$ODBC['charset']);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}hotelthreadword`","`word_post`='{$_POST['wordpost']}',`word_redate`='".fgetdate()."'","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'");
					if($actionhtml = GetCache('hotel'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/hotel/showthreadword_I_{$sql_hotel['hot_id']}_Y_{$Industry}.htm");
							ffile("{$boardurl}index.php?action=hotel&option=showthreadword&id={$sql_hotel['hot_id']}&Industry={$Industry}",'',"r");
						}
					}
					die(gb2utf8("回复成功"));
				}
				$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelthreadword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","","","","U_B");
				$smarty->assign('sql_hotelword',$sql_hotelword);
				$smarty->display("postword.htm");
			}
			if($type == 'postyou')
			{
				if($_POST['update'] == 'update')
				{
					fgetposttoupdatd($_POST,$ODBC['charset']);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}hotelyouword`","`word_post`='{$_POST['wordpost']}',`word_redate`='".fgetdate()."'","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'");
					if($actionhtml = GetCache('hotel'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/hotel/showyouword_I_{$sql_hotel['hot_id']}_Y_{$Industry}.htm");
							ffile("{$boardurl}index.php?action=hotel&option=showyouword&id={$sql_hotel['hot_id']}&Industry={$Industry}",'',"r");
						}
					}
					die(gb2utf8("回复成功"));
				}
				$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelyouword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","","","","U_B");
				$smarty->assign('sql_hotelword',$sql_hotelword);
				$smarty->display("postword.htm");
			}
			if($type == 'del')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}hotelword`","`word_hid`='{$id}' AND `word_id`='{$Industry}'","1");
				if($actionhtml = GetCache('hotel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/hotel/hotelword_I_{$sql_hotel['hot_id']}.htm");
						ffile("{$boardurl}index.php?action=hotel&option=hotelword&id={$sql_hotel['hot_id']}",'',"r");
					}
				}
				die(gb2utf8("删除成功"));
			}
			if($type == 'delthread')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}hotelthreadword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","1");
				if($actionhtml = GetCache('hotel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/hotel/showthreadword_I_{$sql_hotel['hot_id']}_Y_{$Industry}.htm");
						ffile("{$boardurl}index.php?action=hotel&option=showthreadword&id={$sql_hotel['hot_id']}&Industry={$Industry}",'',"r");
					}
				}
				die(gb2utf8("删除成功"));
			}
			if($type == 'delyou')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}hotelyouword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","1");
				if($actionhtml = GetCache('hotel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/hotel/showyouword_I_{$sql_hotel['hot_id']}_Y_{$Industry}.htm");
						ffile("{$boardurl}index.php?action=hotel&option=showyouword&id={$sql_hotel['hot_id']}&Industry={$Industry}",'',"r");
					}
				}
				die(gb2utf8("删除成功"));
			}
		}
	}
	if($option == 'hotelarticle')
	{
		$sql_hotel = $GETSQL->fSql("hot_id,hot_uid,hot_info,hot_traffic","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
		if($sql_hotel['hot_id'] != '' AND ($uid == $sql_hotel['hot_uid'] || in_array('hotel',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($type == 'del')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}hotelthread`","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'","1");
				$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_article`=`hot_article`-1","`hot_id`='{$id}'");
				if($actionhtml = GetCache('hotel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/hotel/hotelthread_I_{$id}_Y_{$Industry}.htm");
						//ffile("{$boardurl}index.php?action=hotel&option=hotelthread&id={$id}&Industry={$Industry}",'',"r");
						P_unlink(R_P."html/hotel/hotelarticle_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=hotel&option=hotelarticle&id={$id}",'',"r");
					}
				}
				die(gb2utf8("ok 删除成功"));
			}
			if($type == 'edit')
			die("<iframe name='releasediframe' width='700' height='600' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='{$boardurl}index.php?action=update&option=hotelarticle&id={$id}&Industry={$Industry}'>您的浏览器不支持iframe</iframe>");
			if($_GET['update'] == 'img' && $_FILES['fileContent']['name'] != '')
			{
				include_once GetLang('image');
				include_once Getincludefun("image");
				$img = fUploadimg_process($_FILES['fileContent'],"{$config['attach']}/hotel/");
				ImgWaterMark("{$config['attach']}/hotel/{$img}",$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);
				$cQuery = array("`img_picid`","`img_picsrc`","`img_picsize`","`img_uid`");
				$cData = array($nowtime.$_POST['fileKey'],"{$config['attach']}/hotel/{$img}",$_FILES['fileContent']['size'],$uid);
				$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);
				header("Location: update.php?action=img&fileKey={$_POST['fileKey']}&img=$img");
				exit;
			}
			if($_POST['blog_title']!='' && $_POST['blog_body']!='')
			{
				if($Industry == '')
				{
					if($_POST['blog_tags']!='')
					{
						$blog_tags = explode(",",$_POST['blog_tags']);
						$gametag = array_unique ($blog_tags);
						$gametags = "'".implode("','",$gametag)."'";
						$_POST['blog_tags'] = implode(",",$gametag);
						$sql_gametag = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}hotelthreadtag`","`tag_subject` IN ({$gametags})");
						foreach ($sql_gametag AS $value)
						{
							foreach ($gametag AS $key=>$ver)
							{
								if($ver == $value['tag_subject'])
								unset($gametag[$key]);
							}
						}
						$GETSQL->fUpdate("`{$ODBC['tablepre']}hotelthreadtag`","`tag_num`=`tag_num`+1","`tag_subject` IN ({$gametags})");
						foreach ($gametag AS $value)
						{
							$cQuery = array("`tag_subject`");
							$cData = array($value);
							$GETSQL->fInsert("`{$ODBC['tablepre']}hotelthreadtag`",$cQuery,$cData);
						}
					}

					$cQuery = array("`thr_id`","`thr_hid`","`thr_subject`","`thr_tages`","`thr_content`","`thr_date`");
					$cData = array($nowtime,$id,$_POST['blog_title'],$_POST['blog_tags'],$_POST['blog_body'],fgetdate());
					$GETSQL->fInsert("`{$ODBC['tablepre']}hotelthread`",$cQuery,$cData);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}hotel`","`hot_article`=`hot_article`+1","`hot_id`='{$id}'");

					if($actionhtml = GetCache('hotel'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/hotel/hotelarticle_I_{$id}.htm");
							ffile("{$boardurl}index.php?action=hotel&option=hotelarticle&id={$id}",'',"r");
						}
					}
					header("Location: update.php?action=add&title=".urlencode("发表成功")."&a=hotel&p=hotelthread&id={$id}&in={$nowtime}");
					exit;
				}else{
					$GETSQL->fUpdate("`{$ODBC['tablepre']}hotelthread`","`thr_subject`='{$_POST['blog_title']}',
					`thr_tages`='{$_POST['blog_tags']}',
					`thr_content`='{$_POST['blog_body']}'","`thr_hid`='{$id}' AND `thr_id`='$Industry'");
					header("Location: update.php?action=add&title=".urlencode("修改成功")."&a=hotel&p=hotelthread&id={$id}&in={$Industry}");
					exit;
				}
			}
			if($Industry!='')
			{
				$sql_hotelthread = $GETSQL->fSql("*","`{$ODBC['tablepre']}hotelthread`","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'","","","","U_B");
				$ncontent = str_replace("\\","\\\\",$sql_hotelthread['thr_content']);
				$ncontent = str_replace("\n","\\n",$ncontent);
				$ncontent = str_replace("\r","\\r",$ncontent);
				$ncontent = str_replace("\"","\\\"",$ncontent);
				$smarty->assign('ncontent',$ncontent);
				$smarty->assign('sql_hotelthread',$sql_hotelthread);
			}
			$smarty->display("hotelthreadedit.htm");
		}
	}
	if($option == 'hotelyou')
	{
		$sql_hotel = $GETSQL->fSql("hot_id,hot_uid,hot_info,hot_traffic","`{$ODBC['tablepre']}hotel`","`hot_id`='{$id}'","","","","U_B");
		if($sql_hotel['hot_id'] != '' AND ($uid == $sql_hotel['hot_uid'] || in_array('hotel',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($type == 'del')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}hotelyou`","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'","1");
				if($actionhtml = GetCache('hotel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/hotel/hotelyouthread_I_{$id}_Y_{$Industry}.htm");
						//ffile("{$boardurl}index.php?action=hotel&option=hotelyouthread&id={$id}&Industry={$Industry}",'',"r");
						P_unlink(R_P."html/hotel/hotelyou_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=hotel&option=hotelyou&id={$id}",'',"r");
					}
				}
				die(gb2utf8("ok 删除成功"));
			}
		}
	}

	if($option == 'buildscenic')
	{
		if($type == 'edit')
		die("<iframe name='releasediframe' width='500' height='280' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='{$boardurl}index.php?action=update&option=buildscenic&id={$id}'>您的浏览器不支持iframe</iframe>");
		if($_POST['update'] == 'update')
		{
			//fgetposttoupdatd($_POST,$ODBC['charset']);
			if($id=='')
			{
				if($_POST['blog_tags']!='')
				{
					$blog_tags = explode(",",$_POST['blog_tags']);
					$gametag = array_unique ($blog_tags);
					$gametags = "'".implode("','",$gametag)."'";
					$_POST['blog_tags'] = implode(",",$gametag);
					$sql_gametag = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}scenictag`","`tag_subject` IN ({$gametags})");
					foreach ($sql_gametag AS $value)
					{
						foreach ($gametag AS $key=>$ver)
						{
							if($ver == $value['tag_subject'])
							unset($gametag[$key]);
						}
					}
					$GETSQL->fUpdate("`{$ODBC['tablepre']}scenictag`","`tag_num`=`tag_num`+1","`tag_subject` IN ({$gametags})");
					foreach ($gametag AS $value)
					{
						$cQuery = array("`tag_subject`");
						$cData = array($value);
						$GETSQL->fInsert("`{$ODBC['tablepre']}scenictag`",$cQuery,$cData);
					}
				}
				$cQuery = array("`sc_id`","`sc_uid`", "`sc_username`", "`sc_subject`", "`sc_addess`","`sc_tages`","`sc_start`","`sc_contact`","`sc_phone`","`sc_date`");
				$cData = array($nowtime,$uid,$uname,$_POST['subject'],$_POST['addess'],$_POST['blog_tags'],$_POST['startseld'],$_POST['contact'],$_POST['phone'],fgetdate());
				$GETSQL->fInsert("`{$ODBC['tablepre']}scenic`",$cQuery,$cData);
				$GETSQL->fUpdate("`{$ODBC['tablepre']}members`","`categories`='2',`cpid`='{$nowtime}'","`uid`='{$uid}'");
				echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
				<script type='text/javascript' language='javascript'>
				var s = new parent.parent.dialog();s.init();
				s.set('src', 2);
				s.set('title', '系统提示信息');
				s.event('申请升级景区成功','parent.parent.location.href=\"{$boardurl}index.php?action=scenic&option=single&id={$nowtime}\"','','parent.parent.location.href=\"{$boardurl}index.php?action=scenic&option=single&id={$nowtime}\"');
				</script>";exit;
				die(gb2utf8("申请升级景区成功"));
			}else{
				$sql_hotel = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
				if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('scenic',$authority) || $sql_pop['group_authority']=='all'))
				{
					$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_subject`='{$_POST['subject']}',
					`sc_addess`='{$_POST['addess']}',
					`sc_tages`='{$_POST['blog_tags']}',
					`sc_start`='{$_POST['startseld']}',
					`sc_contact`='{$_POST['contact']}',
					`sc_phone`='{$_POST['phone']}'",
					"`sc_id`='{$id}'");
					if($actionhtml = GetCache('scenic'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/scenic/single_I_{$id}.htm");
							ffile("{$boardurl}index.php?action=scenic&option=single&id={$id}",'',"r");
						}
					}
					echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
					<script type='text/javascript' language='javascript'>
					var s = new parent.parent.dialog();s.init();
					s.set('src', 2);
					s.set('title', '系统提示信息');
					s.event('景区资料修改成功<BR>其他信息页面会在十分钟内更新','parent.parent.window.location.reload();','','parent.parent.window.location.reload();');
					</script>";exit;
					die(gb2utf8("景区资料修改成功"));
				}else{
					echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
					<script type='text/javascript' language='javascript'>
					var s = new parent.parent.dialog();s.init();
					s.set('src', 2);
					s.set('title', '系统提示信息');
					s.event('景区资料修改失败','parent.parent.window.location.reload();','','parent.parent.window.location.reload();');
					</script>";exit;
					die(gb2utf8("景区资料修改失败"));
				}
			}
		}
		if($id != '')
		{
			$sql_hotel = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
			if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('scenic',$authority) || $sql_pop['group_authority']=='all'))
			{
				$smarty->assign('sql_hotel',$sql_hotel);
			}
		}
		$smarty->display("buildscenic.htm");
	}
	if($option == 'sceniclogo')
	{

		$sql_hotel = $GETSQL->fSql("sc_id,sc_uid,sc_logo","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
		if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('scenic',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($type == 'edit')
			die("<iframe name='releasediframe' width='350' height='150' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='{$boardurl}index.php?action=update&option=sceniclogo&id={$id}'>您的浏览器不支持iframe</iframe>");
			if($_FILES['uploadicongame']['name']!="")
			{
				P_unlink(R_P."{$sql_hotel['sc_logo']}");
				$img = "{$config['attach']}/scenic/".fUploadimg_process($_FILES['uploadicongame'],"{$config['attach']}/scenic/");
				$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_logo`='{$img}'","`sc_id`='{$id}'");
				if($actionhtml = GetCache('scenic'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/scenic/single_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=hotel&option=single&id={$id}",'',"r");
					}
				}
				echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
				<script type='text/javascript' language='javascript'>
				parent.window.location.reload();
				</script>";exit;
				die(gb2utf8("LOGO上传成功成功"));
			}
			$smarty->assign('sql_hotel',$sql_hotel);
			$smarty->display("sceniclogo.htm");
		}
	}
	if($option == 'scenicattr')
	{
		$sql_hotel = $GETSQL->fSql("sc_id,sc_uid,sc_logo","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
		if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('scenic',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($type == 'edit')
			die("<iframe name='releasediframe' width='700' height='600' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='{$boardurl}index.php?action=update&option=scenicattr&id={$id}&Industry={$Industry}'>您的浏览器不支持iframe</iframe>");
			if($type == 'del')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}scenicattr`","`attr_hid`='{$id}' AND `attr_id`='{$Industry}'","1");
				$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_room`=`sc_room`-1","`sc_id`='{$id}'");
				die(gb2utf8("OK 删除成功"));
			}
			if($_GET['update'] == 'img' && $_FILES['fileContent']['name'] != '')
			{
				include_once GetLang('image');
				include_once Getincludefun("image");
				$img = fUploadimg_process($_FILES['fileContent'],"{$config['attach']}/scenic/");
				ImgWaterMark("{$config['attach']}/scenic/{$img}",$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);
				$cQuery = array("`img_picid`","`img_picsrc`","`img_picsize`","`img_uid`");
				$cData = array($nowtime.$_POST['fileKey'],"{$config['attach']}/scenic/{$img}",$_FILES['fileContent']['size'],$uid);
				$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);
				header("Location: update.php?action=img&fileKey={$_POST['fileKey']}&img=$img");
				exit;
			}
			if($_POST['blog_title']!='' && $_POST['blog_body']!='')
			{
				if($Industry == '')
				{
					if($_POST['blog_tags']!='')
					{
						$blog_tags = explode(",",$_POST['blog_tags']);
						$gametag = array_unique ($blog_tags);
						$gametags = "'".implode("','",$gametag)."'";
						$_POST['blog_tags'] = implode(",",$gametag);
						$sql_gametag = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}scenicattrtag`","`tag_subject` IN ({$gametags})");
						foreach ($sql_gametag AS $value)
						{
							foreach ($gametag AS $key=>$ver)
							{
								if($ver == $value['tag_subject'])
								unset($gametag[$key]);
							}
						}
						$GETSQL->fUpdate("`{$ODBC['tablepre']}scenicattrtag`","`tag_num`=`tag_num`+1","`tag_subject` IN ({$gametags})");
						foreach ($gametag AS $value)
						{
							$cQuery = array("`tag_subject`");
							$cData = array($value);
							$GETSQL->fInsert("`{$ODBC['tablepre']}scenicattrtag`",$cQuery,$cData);
						}
					}

					$cQuery = array("`attr_id`","`attr_hid`","`attr_subject`","`attr_tages`","`attr_price`","`attr_content`","`attr_date`");
					$cData = array($nowtime,$id,$_POST['blog_title'],$_POST['blog_tags'],$_POST['blog_price'],$_POST['blog_body'],fgetdate());
					$GETSQL->fInsert("`{$ODBC['tablepre']}scenicattr`",$cQuery,$cData);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_room`=`sc_room`+1","`sc_id`='{$id}'");

					if($actionhtml = GetCache('scenic'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/scenic/scenicattr_I_{$id}.htm");
							ffile("{$boardurl}index.php?action=scenic&option=scenicattr&id={$id}",'',"r");
						}
					}
					header("Location: update.php?action=add&title=".urlencode("发表成功")."&a=scenic&p=scenicattr&id={$id}&in={$nowtime}");
					exit;
				}else{
					$GETSQL->fUpdate("`{$ODBC['tablepre']}scenicattr`","`attr_subject`='{$_POST['blog_title']}',
					`attr_tages`='{$_POST['blog_tags']}',
					`attr_price`='{$_POST['blog_price']}',
					`attr_content`='{$_POST['blog_body']}'","`attr_hid`='{$id}' AND `attr_id`='{$Industry}'");
					header("Location: update.php?action=add&title=".urlencode("修改成功")."&a=scenic&p=scenicattr&id={$id}&in={$Industry}");
					exit;
				}
			}
			if($Industry!='')
			{
				$sql_hotelthread = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicattr`","`attr_hid`='{$id}' AND `attr_id`='{$Industry}'","","","","U_B");
				$ncontent = str_replace("\\","\\\\",$sql_hotelthread['attr_content']);
				$ncontent = str_replace("\n","\\n",$ncontent);
				$ncontent = str_replace("\r","\\r",$ncontent);
				$ncontent = str_replace("\"","\\\"",$ncontent);
				$smarty->assign('ncontent',$ncontent);
				$smarty->assign('sql_hotelthread',$sql_hotelthread);
			}
			$smarty->assign('sql_hotel',$sql_hotel);
			$smarty->display("scenicattredit.htm");
		}
	}
	if($option == 'scenicword')
	{
		$sql_hotel = $GETSQL->fSql("sc_id,sc_uid,sc_logo","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
		if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('scenic',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($type == 'post')
			{
				if($_POST['update'] == 'update')
				{
					fgetposttoupdatd($_POST,$ODBC['charset']);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}scenicword`","`word_post`='{$_POST['wordpost']}',`word_redate`='".fgetdate()."'","`word_hid`='{$id}' AND `word_id`='{$Industry}'");
					if($actionhtml = GetCache('scenic'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/scenic/scenicword_I_{$sql_hotel['hot_id']}.htm");
							ffile("{$boardurl}index.php?action=scenic&option=scenicword&id={$sql_hotel['sc_id']}",'',"r");
						}
					}
					die(gb2utf8("回复成功"));
				}
				$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicword`","`word_hid`='{$id}' AND `word_id`='{$Industry}'","","","","U_B");
				$smarty->assign('sql_hotelword',$sql_hotelword);
				$smarty->display("postword.htm");
			}
			if($type == 'postthread')
			{
				if($_POST['update'] == 'update')
				{
					fgetposttoupdatd($_POST,$ODBC['charset']);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}scenicthreadword`","`word_post`='{$_POST['wordpost']}',`word_redate`='".fgetdate()."'","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'");
					if($actionhtml = GetCache('scenic'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/scenic/showthreadword_I_{$sql_hotel['sc_id']}_Y_{$Industry}.htm");
							ffile("{$boardurl}index.php?action=scenic&option=showthreadword&id={$sql_hotel['hot_id']}&Industry={$Industry}",'',"r");
						}
					}
					die(gb2utf8("回复成功"));
				}
				$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicthreadword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","","","","U_B");
				$smarty->assign('sql_hotelword',$sql_hotelword);
				$smarty->display("postword.htm");
			}
			if($type == 'postyou')
			{
				if($_POST['update'] == 'update')
				{
					fgetposttoupdatd($_POST,$ODBC['charset']);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}scenicyouword`","`word_post`='{$_POST['wordpost']}',`word_redate`='".fgetdate()."'","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'");
					if($actionhtml = GetCache('scenic'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/scenic/showyouword_I_{$sql_hotel['sc_id']}_Y_{$Industry}.htm");
							ffile("{$boardurl}index.php?action=scenic&option=showyouword&id={$sql_hotel['hot_id']}&Industry={$Industry}",'',"r");
						}
					}
					die(gb2utf8("回复成功"));
				}
				$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicyouword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","","","","U_B");
				$smarty->assign('sql_hotelword',$sql_hotelword);
				$smarty->display("postword.htm");
			}
			if($type == 'postattr')
			{
				if($_POST['update'] == 'update')
				{
					fgetposttoupdatd($_POST,$ODBC['charset']);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}scenicattrword`","`word_post`='{$_POST['wordpost']}',`word_redate`='".fgetdate()."'","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'");
					if($actionhtml = GetCache('scenic'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/scenic/scenicattrword_I_{$sql_hotel['sc_id']}_Y_{$Industry}.htm");
							ffile("{$boardurl}index.php?action=scenic&option=scenicattrword&id={$sql_hotel['sc_id']}&Industry={$Industry}",'',"r");
						}
					}
					die(gb2utf8("回复成功"));
				}
				$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicattrword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","","","","U_B");
				$smarty->assign('sql_hotelword',$sql_hotelword);
				$smarty->display("postword.htm");
			}
			if($type == 'del')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}scenicword`","`word_hid`='{$id}' AND `word_id`='{$Industry}'","1");
				if($actionhtml = GetCache('scenic'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/scenic/scenicword_I_{$sql_hotel['sc_id']}.htm");
						ffile("{$boardurl}index.php?action=scenic&option=scenicword&id={$sql_hotel['sc_id']}",'',"r");
					}
				}
				die(gb2utf8("删除成功"));
			}
			if($type == 'delthread')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}scenicthreadword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","1");
				if($actionhtml = GetCache('scenic'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/scenic/showthreadword_I_{$sql_hotel['sc_id']}_Y_{$Industry}.htm");
						ffile("{$boardurl}index.php?action=scenic&option=showthreadword&id={$sql_hotel['sc_id']}&Industry={$Industry}",'',"r");
					}
				}
				die(gb2utf8("删除成功"));
			}
			if($type == 'delyou')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}scenicyouword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","1");
				if($actionhtml = GetCache('scenic'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/scenic/showyouword_I_{$sql_hotel['sc_id']}_Y_{$Industry}.htm");
						ffile("{$boardurl}index.php?action=scenic&option=showyouword&id={$sql_hotel['sc_id']}&Industry={$Industry}",'',"r");
					}
				}
				die(gb2utf8("删除成功"));
			}
			if($type == 'delattr')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}scenicattrword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","1");
				if($actionhtml = GetCache('scenic'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/scenic/showscenicattrword_I_{$sql_hotel['sc_id']}_Y_{$Industry}.htm");
						ffile("{$boardurl}index.php?action=scenic&option=showscenicattrword&id={$sql_hotel['hot_id']}&Industry={$Industry}",'',"r");
					}
				}
				die(gb2utf8("删除成功"));
			}
		}
	}
	if($option == 'scenicarticle')
	{
		$sql_hotel = $GETSQL->fSql("sc_id,sc_uid,sc_info,sc_traffic","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
		if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('scenic',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($type == 'del')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}scenicthread`","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'","1");
				$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_article`=`sc_article`-1","`sc_id`='{$id}'");
				if($actionhtml = GetCache('scenic'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/scenic/thread_I_{$id}_Y_{$Industry}.htm");
						//ffile("{$boardurl}index.php?action=hotel&option=hotelthread&id={$id}&Industry={$Industry}",'',"r");
						P_unlink(R_P."html/scenic/article_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=scenic&option=article&id={$id}",'',"r");
					}
				}
				die(gb2utf8("ok 删除成功"));
			}
			if($type == 'edit')
			die("<iframe name='releasediframe' width='700' height='600' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='{$boardurl}index.php?action=update&option=scenicarticle&id={$id}&Industry={$Industry}'>您的浏览器不支持iframe</iframe>");
			if($_GET['update'] == 'img' && $_FILES['fileContent']['name'] != '')
			{
				include_once GetLang('image');
				include_once Getincludefun("image");
				$img = fUploadimg_process($_FILES['fileContent'],"{$config['attach']}/scenic/");
				ImgWaterMark("{$config['attach']}/scenic/{$img}",$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);
				$cQuery = array("`img_picid`","`img_picsrc`","`img_picsize`","`img_uid`");
				$cData = array($nowtime.$_POST['fileKey'],"{$config['attach']}/scenic/{$img}",$_FILES['fileContent']['size'],$uid);
				$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);
				header("Location: update.php?action=img&fileKey={$_POST['fileKey']}&img=$img");
				exit;
			}
			if($_POST['blog_title']!='' && $_POST['blog_body']!='')
			{
				if($Industry == '')
				{
					if($_POST['blog_tags']!='')
					{
						$blog_tags = explode(",",$_POST['blog_tags']);
						$gametag = array_unique ($blog_tags);
						$gametags = "'".implode("','",$gametag)."'";
						$_POST['blog_tags'] = implode(",",$gametag);
						$sql_gametag = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}scenicthreadtag`","`tag_subject` IN ({$gametags})");
						foreach ($sql_gametag AS $value)
						{
							foreach ($gametag AS $key=>$ver)
							{
								if($ver == $value['tag_subject'])
								unset($gametag[$key]);
							}
						}
						$GETSQL->fUpdate("`{$ODBC['tablepre']}scenicthreadtag`","`tag_num`=`tag_num`+1","`tag_subject` IN ({$gametags})");
						foreach ($gametag AS $value)
						{
							$cQuery = array("`tag_subject`");
							$cData = array($value);
							$GETSQL->fInsert("`{$ODBC['tablepre']}scenicthreadtag`",$cQuery,$cData);
						}
					}

					$cQuery = array("`thr_id`","`thr_hid`","`thr_subject`","`thr_tages`","`thr_content`","`thr_date`");
					$cData = array($nowtime,$id,$_POST['blog_title'],$_POST['blog_tags'],$_POST['blog_body'],fgetdate());
					$GETSQL->fInsert("`{$ODBC['tablepre']}scenicthread`",$cQuery,$cData);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_article`=`sc_article`+1","`sc_id`='{$id}'");

					if($actionhtml = GetCache('scenic'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/scenic/article_I_{$id}.htm");
							ffile("{$boardurl}index.php?action=scenic&option=article&id={$id}",'',"r");
						}
					}
					header("Location: update.php?action=add&title=".urlencode("发表成功")."&a=scenic&p=thread&id={$id}&in={$nowtime}");
					exit;
				}else{
					$GETSQL->fUpdate("`{$ODBC['tablepre']}scenicthread`","`thr_subject`='{$_POST['blog_title']}',
					`thr_tages`='{$_POST['blog_tags']}',
					`thr_content`='{$_POST['blog_body']}'","`thr_hid`='{$id}' AND `thr_id`='$Industry'");
					header("Location: update.php?action=add&title=".urlencode("修改成功")."&a=scenic&p=thread&id={$id}&in={$Industry}");
					exit;
				}
			}
			if($Industry!='')
			{
				$sql_hotelthread = $GETSQL->fSql("*","`{$ODBC['tablepre']}scenicthread`","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'","","","","U_B");
				$ncontent = str_replace("\\","\\\\",$sql_hotelthread['thr_content']);
				$ncontent = str_replace("\n","\\n",$ncontent);
				$ncontent = str_replace("\r","\\r",$ncontent);
				$ncontent = str_replace("\"","\\\"",$ncontent);
				$smarty->assign('ncontent',$ncontent);
				$smarty->assign('sql_hotelthread',$sql_hotelthread);
			}
			$smarty->display("scenicthreadedit.htm");
		}
	}
	if($option == 'scenicyou')
	{
		$sql_hotel = $GETSQL->fSql("sc_id,sc_uid","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
		if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('scenic',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($type == 'del')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}scenicyou`","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'","1");
				if($actionhtml = GetCache('scenic'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/scenic/scenicyouthread_I_{$id}_Y_{$Industry}.htm");
						//ffile("{$boardurl}index.php?action=hotel&option=hotelyouthread&id={$id}&Industry={$Industry}",'',"r");
						P_unlink(R_P."html/scenic/scenicyou_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=scenic&option=scenicyou&id={$id}",'',"r");
					}
				}
				die(gb2utf8("ok 删除成功"));
			}
		}
	}
	if($option == 'scenicphoto')
	{
		$sql_hotel = $GETSQL->fSql("sc_id,sc_uid,sc_info,sc_traffic","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
		if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('scenic',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($_FILES['uploadphoto']['name']!="" && $_POST['uploadsubject']!='')
			{
				$img = "{$config['attach']}/scenic/".fUploadimg_process($_FILES['uploadphoto'],"{$config['attach']}/scenic/","simll/");
				ImgWaterMark($img,$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);
				$cQuery = array("`hi_id`","`hi_hid`","`hi_src`","`hi_subject`","`hi_date`");
				$cData = array($nowtime,$sql_hotel['sc_id'],$img,$_POST['uploadsubject'],fgetdate());
				$GETSQL->fInsert("`{$ODBC['tablepre']}scenicimage`",$cQuery,$cData);

				$cQuery = array("`img_picid`","`img_did`","`img_picsrc`","`img_picsize`","`img_uid`");
				$cData = array($nowtime,$nowtime,$img,$_FILES['uploadphoto']['size'],$uid);
				$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);

				$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_album`=`sc_album`+1","`sc_id`='{$id}'");
				if($actionhtml = GetCache('scenic'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/scenic/scenicphoto_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=scenic&option=scenicphoto&id={$id}",'',"r");
					}
				}
				echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
				<script type='text/javascript' language='javascript'>
				var s = new parent.dialog();s.init();
				s.set('src', 2);
				s.set('title', '系统提示信息');
				s.event('图片上传成功','parent.window.location.reload();','','parent.window.location.reload();');
				</script>";exit;
				die(gb2utf8("图片上传成功"));
			}
			if($type == 'pass')
			{
				$GETSQL->fUpdate("`{$ODBC['tablepre']}scenicimage`","`hi_pass`='1'","`hi_id`='{$Industry}' AND `hi_hid`='{$id}'");
				$mesg = "<img src='image/msg/error.gif' onclick=\"getNews('showimgdel_{$Industry}','{$boardurl}index.php?action=update&option=hotelphoto&id={$id}&Industry={$Industry}&type=delpass')\" alt='取消推荐' /><img src='image/msg/closed.gif' onclick=\"_confirm_msg_show('确定删除图片', 'getNews(\\\\\'showimg_{$Industry}\\\\\',\\\\\'{$boardurl}index.php?action=update&option=hotelphoto&id={$id}&Industry={$Industry}&type=del\\\\\');$(\\\\\'showimg_{$Industry}\\\\\').parentNode.removeChild($(\\\\\'showimg_{$Industry}\\\\\'))', '', '')\" alt='删除图片' /></div>";
				die(gb2utf8($mesg));
			}
			if($type == 'delpass')
			{
				$GETSQL->fUpdate("`{$ODBC['tablepre']}scenicimage`","`hi_pass`='0'","`hi_id`='{$Industry}' AND `hi_hid`='{$id}'");
				$mesg = "<img src='image/msg/pin_1.gif' onclick=\"getNews('showimgdel_{$Industry}','{$boardurl}index.php?action=update&option=hotelphoto&id={$id}&Industry={$Industry}&type=pass')\" alt='推荐图片' /><img src='image/msg/closed.gif' onclick=\"_confirm_msg_show('确定删除图片', 'getNews(\\\\\'showimg_{$Industry}\\\\\',\\\\\'{$boardurl}index.php?action=update&option=hotelphoto&id={$id}&Industry={$Industry}&type=del\\\\\');$(\\\\\'showimg_{$Industry}\\\\\').parentNode.removeChild($(\\\\\'showimg_{$Industry}\\\\\'))', '', '')\" alt='删除图片' /></div>";
				die(gb2utf8($mesg));
			}
			if($type == 'del')
			{
				$sql_hotelimage = $GETSQL->fSql("hi_src","`{$ODBC['tablepre']}scenicimage`","`hi_id`='{$Industry}' AND `hi_hid`='{$id}'","","","","U_B");
				P_unlink(R_P."{$sql_hotelimage['hi_src']}");
				P_unlink(R_P.fimgsrc($sql_hotelimage['hi_src'],$simp='simll/'));
				$GETSQL->fDelete("`{$ODBC['tablepre']}scenicimage`","`hi_id`='{$Industry}' AND `hi_hid`='{$id}'","1");
				$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_album`=`hot_album`-1","`sc_id`='{$id}'");
				if($actionhtml = GetCache('scenic'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					P_unlink(R_P."html/scenic/scenicphoto_I_{$id}_Y_{$Industry}.htm");
				}
			}
		}
	}
	if($option == 'scenicinfo')
	{
		$sql_hotel = $GETSQL->fSql("sc_id,sc_uid,sc_info,sc_traffic","`{$ODBC['tablepre']}scenic`","`sc_id`='{$id}'","","","","U_B");
		if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('scenic',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($_POST['update']=="update")
			{
				fgetposttoupdatd($_POST,$ODBC['charset']);
				$GETSQL->fUpdate("`{$ODBC['tablepre']}scenic`","`sc_info`='{$_POST['hot_info']}',`sc_traffic`='{$_POST['hot_traffic']}'","`sc_id`='{$id}'");
				if($actionhtml = GetCache('scenic'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/scenic/showscenicinfo_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=hotel&option=showhotinfo&id={$id}",'',"r");
						P_unlink(R_P."html/scenic/showscenictraffic_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=scenic&option=showscenictraffic&id={$id}",'',"r");
					}
				}
				die(gb2utf8("景区介绍修改成功"));
			}
			$smarty->assign('sql_hotel',$sql_hotel);
			$smarty->display("updatescenic.htm");
		}
	}
	if($option == 'buildtravel')
	{
		if($type == 'edit')
		die("<iframe name='releasediframe' width='500' height='280' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='{$boardurl}index.php?action=update&option=buildtravel&id={$id}'>您的浏览器不支持iframe</iframe>");
		if($_POST['update'] == 'update')
		{
			//fgetposttoupdatd($_POST,$ODBC['charset']);
			if($id=='')
			{
				if($_POST['blog_tags']!='')
				{
					$blog_tags = explode(",",$_POST['blog_tags']);
					$gametag = array_unique ($blog_tags);
					$gametags = "'".implode("','",$gametag)."'";
					$_POST['blog_tags'] = implode(",",$gametag);
					$sql_gametag = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}traveltag`","`tag_subject` IN ({$gametags})");
					foreach ($sql_gametag AS $value)
					{
						foreach ($gametag AS $key=>$ver)
						{
							if($ver == $value['tag_subject'])
							unset($gametag[$key]);
						}
					}
					$GETSQL->fUpdate("`{$ODBC['tablepre']}traveltag`","`tag_num`=`tag_num`+1","`tag_subject` IN ({$gametags})");
					foreach ($gametag AS $value)
					{
						$cQuery = array("`tag_subject`");
						$cData = array($value);
						$GETSQL->fInsert("`{$ODBC['tablepre']}traveltag`",$cQuery,$cData);
					}
				}
				$cQuery = array("`sc_id`","`sc_uid`", "`sc_username`", "`sc_subject`", "`sc_addess`","`sc_tages`","`sc_start`","`sc_contact`","`sc_phone`","`sc_date`");
				$cData = array($nowtime,$uid,$uname,$_POST['subject'],$_POST['addess'],$_POST['blog_tags'],$_POST['startseld'],$_POST['contact'],$_POST['phone'],fgetdate());
				$GETSQL->fInsert("`{$ODBC['tablepre']}travel`",$cQuery,$cData);
				$GETSQL->fUpdate("`{$ODBC['tablepre']}members`","`categories`='3',`cpid`='{$nowtime}'","`uid`='{$uid}'");
				echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
				<script type='text/javascript' language='javascript'>
				var s = new parent.parent.dialog();s.init();
				s.set('src', 2);
				s.set('title', '系统提示信息');
				s.event('申请升级旅行社成功','parent.parent.location.href=\"{$boardurl}index.php?action=travel&option=single&id={$nowtime}\"','','parent.parent.location.href=\"{$boardurl}index.php?action=travel&option=single&id={$nowtime}\"');
				</script>";exit;
				die(gb2utf8("申请升级旅行社成功"));
			}else{
				$sql_hotel = $GETSQL->fSql("*","`{$ODBC['tablepre']}travel`","`sc_id`='{$id}'","","","","U_B");
				if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('travel',$authority) || $sql_pop['group_authority']=='all'))
				{
					$GETSQL->fUpdate("`{$ODBC['tablepre']}travel`","`sc_subject`='{$_POST['subject']}',
					`sc_addess`='{$_POST['addess']}',
					`sc_tages`='{$_POST['blog_tags']}',
					`sc_start`='{$_POST['startseld']}',
					`sc_contact`='{$_POST['contact']}',
					`sc_phone`='{$_POST['phone']}'",
					"`sc_id`='{$id}'");
					if($actionhtml = GetCache('travel'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/travel/single_I_{$id}.htm");
							ffile("{$boardurl}index.php?action=travel&option=single&id={$id}",'',"r");
						}
					}
					echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
					<script type='text/javascript' language='javascript'>
					var s = new parent.parent.dialog();s.init();
					s.set('src', 2);
					s.set('title', '系统提示信息');
					s.event('旅行社资料修改成功<BR>其他信息页面会在十分钟内更新','parent.parent.window.location.reload();','','parent.parent.window.location.reload();');
					</script>";exit;
					die(gb2utf8("旅行社资料修改成功"));
				}else{
					echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
					<script type='text/javascript' language='javascript'>
					var s = new parent.parent.dialog();s.init();
					s.set('src', 2);
					s.set('title', '系统提示信息');
					s.event('旅行社资料修改失败','parent.parent.window.location.reload();','','parent.parent.window.location.reload();');
					</script>";exit;
					die(gb2utf8("旅行社资料修改失败"));
				}
			}
		}
		if($id != '')
		{
			$sql_hotel = $GETSQL->fSql("*","`{$ODBC['tablepre']}travel`","`sc_id`='{$id}'","","","","U_B");
			if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('travel',$authority) || $sql_pop['group_authority']=='all'))
			{
				$smarty->assign('sql_hotel',$sql_hotel);
			}
		}
		$smarty->display("buildtravel.htm");
	}
	if($option == 'travellogo')
	{

		$sql_hotel = $GETSQL->fSql("sc_id,sc_uid,sc_logo","`{$ODBC['tablepre']}travel`","`sc_id`='{$id}'","","","","U_B");
		if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('travel',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($type == 'edit')
			die("<iframe name='releasediframe' width='350' height='150' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='{$boardurl}index.php?action=update&option=travellogo&id={$id}'>您的浏览器不支持iframe</iframe>");
			if($_FILES['uploadicongame']['name']!="")
			{
				P_unlink(R_P."{$sql_hotel['sc_logo']}");
				$img = "{$config['attach']}/travel/".fUploadimg_process($_FILES['uploadicongame'],"{$config['attach']}/travel/");
				$GETSQL->fUpdate("`{$ODBC['tablepre']}travel`","`sc_logo`='{$img}'","`sc_id`='{$id}'");
				if($actionhtml = GetCache('travel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/travel/single_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=hotel&option=single&id={$id}",'',"r");
					}
				}
				echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
				<script type='text/javascript' language='javascript'>
				parent.window.location.reload();
				</script>";exit;
				die(gb2utf8("LOGO上传成功成功"));
			}
			$smarty->assign('sql_hotel',$sql_hotel);
			$smarty->display("travellogo.htm");
		}
	}
	if($option == 'travelinfo')
	{
		$sql_hotel = $GETSQL->fSql("sc_id,sc_uid,sc_info,sc_traffic","`{$ODBC['tablepre']}travel`","`sc_id`='{$id}'","","","","U_B");
		if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('travel',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($_POST['update']=="update")
			{
				fgetposttoupdatd($_POST,$ODBC['charset']);
				$GETSQL->fUpdate("`{$ODBC['tablepre']}travel`","`sc_info`='{$_POST['hot_info']}',`sc_traffic`='{$_POST['hot_traffic']}'","`sc_id`='{$id}'");
				if($actionhtml = GetCache('travel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/travel/showtravelinfo_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=hotel&option=showhotinfo&id={$id}",'',"r");
						P_unlink(R_P."html/travel/showtraveltraffic_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=travel&option=showtraveltraffic&id={$id}",'',"r");
					}
				}
				die(gb2utf8("旅行社介绍修改成功"));
			}
			$smarty->assign('sql_hotel',$sql_hotel);
			$smarty->display("updatetravel.htm");
		}
	}
	if($option == 'travelarticle')
	{
		$sql_hotel = $GETSQL->fSql("sc_id,sc_uid,sc_info,sc_traffic","`{$ODBC['tablepre']}travel`","`sc_id`='{$id}'","","","","U_B");
		if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('travel',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($type == 'del')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}travelthread`","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'","1");
				$GETSQL->fUpdate("`{$ODBC['tablepre']}travel`","`sc_article`=`sc_article`-1","`sc_id`='{$id}'");
				if($actionhtml = GetCache('travel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/travel/thread_I_{$id}_Y_{$Industry}.htm");
						//ffile("{$boardurl}index.php?action=hotel&option=hotelthread&id={$id}&Industry={$Industry}",'',"r");
						P_unlink(R_P."html/travel/article_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=travel&option=article&id={$id}",'',"r");
					}
				}
				die(gb2utf8("ok 删除成功"));
			}
			if($type == 'edit')
			die("<iframe name='releasediframe' width='700' height='600' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='{$boardurl}index.php?action=update&option=travelarticle&id={$id}&Industry={$Industry}'>您的浏览器不支持iframe</iframe>");
			if($_GET['update'] == 'img' && $_FILES['fileContent']['name'] != '')
			{
				include_once GetLang('image');
				include_once Getincludefun("image");
				$img = fUploadimg_process($_FILES['fileContent'],"{$config['attach']}/travel/");
				ImgWaterMark("{$config['attach']}/travel/{$img}",$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);
				$cQuery = array("`img_picid`","`img_picsrc`","`img_picsize`","`img_uid`");
				$cData = array($nowtime.$_POST['fileKey'],"{$config['attach']}/travel/{$img}",$_FILES['fileContent']['size'],$uid);
				$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);
				header("Location: update.php?action=img&fileKey={$_POST['fileKey']}&img=$img");
				exit;
			}
			if($_POST['blog_title']!='' && $_POST['blog_body']!='')
			{
				if($Industry == '')
				{
					if($_POST['blog_tags']!='')
					{
						$blog_tags = explode(",",$_POST['blog_tags']);
						$gametag = array_unique ($blog_tags);
						$gametags = "'".implode("','",$gametag)."'";
						$_POST['blog_tags'] = implode(",",$gametag);
						$sql_gametag = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}travelthreadtag`","`tag_subject` IN ({$gametags})");
						foreach ($sql_gametag AS $value)
						{
							foreach ($gametag AS $key=>$ver)
							{
								if($ver == $value['tag_subject'])
								unset($gametag[$key]);
							}
						}
						$GETSQL->fUpdate("`{$ODBC['tablepre']}travelthreadtag`","`tag_num`=`tag_num`+1","`tag_subject` IN ({$gametags})");
						foreach ($gametag AS $value)
						{
							$cQuery = array("`tag_subject`");
							$cData = array($value);
							$GETSQL->fInsert("`{$ODBC['tablepre']}travelthreadtag`",$cQuery,$cData);
						}
					}

					$cQuery = array("`thr_id`","`thr_hid`","`thr_subject`","`thr_tages`","`thr_content`","`thr_date`");
					$cData = array($nowtime,$id,$_POST['blog_title'],$_POST['blog_tags'],$_POST['blog_body'],fgetdate());
					$GETSQL->fInsert("`{$ODBC['tablepre']}travelthread`",$cQuery,$cData);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}travel`","`sc_article`=`sc_article`+1","`sc_id`='{$id}'");

					if($actionhtml = GetCache('travel'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/travel/article_I_{$id}.htm");
							ffile("{$boardurl}index.php?action=travel&option=article&id={$id}",'',"r");
						}
					}
					header("Location: update.php?action=add&title=".urlencode("发表成功")."&a=travel&p=thread&id={$id}&in={$nowtime}");
					exit;
				}else{
					$GETSQL->fUpdate("`{$ODBC['tablepre']}travelthread`","`thr_subject`='{$_POST['blog_title']}',
					`thr_tages`='{$_POST['blog_tags']}',
					`thr_content`='{$_POST['blog_body']}'","`thr_hid`='{$id}' AND `thr_id`='$Industry'");
					header("Location: update.php?action=add&title=".urlencode("修改成功")."&a=travel&p=thread&id={$id}&in={$Industry}");
					exit;
				}
			}
			if($Industry!='')
			{
				$sql_hotelthread = $GETSQL->fSql("*","`{$ODBC['tablepre']}travelthread`","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'","","","","U_B");
				$ncontent = str_replace("\\","\\\\",$sql_hotelthread['thr_content']);
				$ncontent = str_replace("\n","\\n",$ncontent);
				$ncontent = str_replace("\r","\\r",$ncontent);
				$ncontent = str_replace("\"","\\\"",$ncontent);
				$smarty->assign('ncontent',$ncontent);
				$smarty->assign('sql_hotelthread',$sql_hotelthread);
			}
			$smarty->display("travelthreadedit.htm");
		}
	}
	if($option == 'travelword')
	{
		$sql_hotel = $GETSQL->fSql("sc_id,sc_uid,sc_logo","`{$ODBC['tablepre']}travel`","`sc_id`='{$id}'","","","","U_B");
		if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('travel',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($type == 'post')
			{
				if($_POST['update'] == 'update')
				{
					fgetposttoupdatd($_POST,$ODBC['charset']);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}travelword`","`word_post`='{$_POST['wordpost']}',`word_redate`='".fgetdate()."'","`word_hid`='{$id}' AND `word_id`='{$Industry}'");
					if($actionhtml = GetCache('travel'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/travel/travelword_I_{$sql_hotel['hot_id']}.htm");
							ffile("{$boardurl}index.php?action=travel&option=travelword&id={$sql_hotel['sc_id']}",'',"r");
						}
					}
					die(gb2utf8("回复成功"));
				}
				$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}travelword`","`word_hid`='{$id}' AND `word_id`='{$Industry}'","","","","U_B");
				$smarty->assign('sql_hotelword',$sql_hotelword);
				$smarty->display("postword.htm");
			}
			if($type == 'postthread')
			{
				if($_POST['update'] == 'update')
				{
					fgetposttoupdatd($_POST,$ODBC['charset']);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}travelthreadword`","`word_post`='{$_POST['wordpost']}',`word_redate`='".fgetdate()."'","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'");
					if($actionhtml = GetCache('travel'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/travel/showthreadword_I_{$sql_hotel['sc_id']}_Y_{$Industry}.htm");
							ffile("{$boardurl}index.php?action=travel&option=showthreadword&id={$sql_hotel['hot_id']}&Industry={$Industry}",'',"r");
						}
					}
					die(gb2utf8("回复成功"));
				}
				$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}travelthreadword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","","","","U_B");
				$smarty->assign('sql_hotelword',$sql_hotelword);
				$smarty->display("postword.htm");
			}
			if($type == 'postyou')
			{
				if($_POST['update'] == 'update')
				{
					fgetposttoupdatd($_POST,$ODBC['charset']);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}travelyouword`","`word_post`='{$_POST['wordpost']}',`word_redate`='".fgetdate()."'","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'");
					if($actionhtml = GetCache('travel'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/travel/showyouword_I_{$sql_hotel['sc_id']}_Y_{$Industry}.htm");
							ffile("{$boardurl}index.php?action=travel&option=showyouword&id={$sql_hotel['hot_id']}&Industry={$Industry}",'',"r");
						}
					}
					die(gb2utf8("回复成功"));
				}
				$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}travelyouword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","","","","U_B");
				$smarty->assign('sql_hotelword',$sql_hotelword);
				$smarty->display("postword.htm");
			}
			if($type == 'postattr')
			{
				if($_POST['update'] == 'update')
				{
					fgetposttoupdatd($_POST,$ODBC['charset']);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}travelattrword`","`word_post`='{$_POST['wordpost']}',`word_redate`='".fgetdate()."'","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'");
					if($actionhtml = GetCache('travel'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/travel/travelattrword_I_{$sql_hotel['sc_id']}_Y_{$Industry}.htm");
							ffile("{$boardurl}index.php?action=travel&option=travelattrword&id={$sql_hotel['sc_id']}&Industry={$Industry}",'',"r");
						}
					}
					die(gb2utf8("回复成功"));
				}
				$sql_hotelword = $GETSQL->fSql("*","`{$ODBC['tablepre']}travelattrword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","","","","U_B");
				$smarty->assign('sql_hotelword',$sql_hotelword);
				$smarty->display("postword.htm");
			}
			if($type == 'del')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}travelword`","`word_hid`='{$id}' AND `word_id`='{$Industry}'","1");
				if($actionhtml = GetCache('travel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/travel/travelword_I_{$sql_hotel['sc_id']}.htm");
						ffile("{$boardurl}index.php?action=travel&option=travelword&id={$sql_hotel['sc_id']}",'',"r");
					}
				}
				die(gb2utf8("删除成功"));
			}
			if($type == 'delthread')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}travelthreadword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","1");
				if($actionhtml = GetCache('travel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/travel/showthreadword_I_{$sql_hotel['sc_id']}_Y_{$Industry}.htm");
						ffile("{$boardurl}index.php?action=travel&option=showthreadword&id={$sql_hotel['sc_id']}&Industry={$Industry}",'',"r");
					}
				}
				die(gb2utf8("删除成功"));
			}
			if($type == 'delyou')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}travelyouword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","1");
				if($actionhtml = GetCache('travel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/travel/showyouword_I_{$sql_hotel['sc_id']}_Y_{$Industry}.htm");
						ffile("{$boardurl}index.php?action=travel&option=showyouword&id={$sql_hotel['sc_id']}&Industry={$Industry}",'',"r");
					}
				}
				die(gb2utf8("删除成功"));
			}
			if($type == 'delattr')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}travelattrword`","`word_hid`='{$id}' AND `word_id`='{$Industry}' AND `word_tid`='{$Keyword}'","1");
				if($actionhtml = GetCache('travel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/travel/showtravelattrword_I_{$sql_hotel['sc_id']}_Y_{$Industry}.htm");
						ffile("{$boardurl}index.php?action=travel&option=showtravelattrword&id={$sql_hotel['hot_id']}&Industry={$Industry}",'',"r");
					}
				}
				die(gb2utf8("删除成功"));
			}
		}
	}
	if($option == 'travelattr')
	{
		$sql_hotel = $GETSQL->fSql("sc_id,sc_uid,sc_logo","`{$ODBC['tablepre']}travel`","`sc_id`='{$id}'","","","","U_B");
		if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('travel',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($type == 'edit')
			die("<iframe name='releasediframe' width='700' height='600' frameborder=0 marginheight=0 marginwidth=0 scrolling=auto src='{$boardurl}index.php?action=update&option=travelattr&id={$id}&Industry={$Industry}'>您的浏览器不支持iframe</iframe>");
			if($type == 'del')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}travelattr`","`attr_hid`='{$id}' AND `attr_id`='{$Industry}'","1");
				$GETSQL->fUpdate("`{$ODBC['tablepre']}travel`","`sc_room`=`sc_room`-1","`sc_id`='{$id}'");
				die(gb2utf8("OK 删除成功"));
			}
			if($_GET['update'] == 'img' && $_FILES['fileContent']['name'] != '')
			{
				include_once GetLang('image');
				include_once Getincludefun("image");
				$img = fUploadimg_process($_FILES['fileContent'],"{$config['attach']}/travel/");
				ImgWaterMark("{$config['attach']}/travel/{$img}",$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);
				$cQuery = array("`img_picid`","`img_picsrc`","`img_picsize`","`img_uid`");
				$cData = array($nowtime.$_POST['fileKey'],"{$config['attach']}/travel/{$img}",$_FILES['fileContent']['size'],$uid);
				$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);
				header("Location: update.php?action=img&fileKey={$_POST['fileKey']}&img=$img");
				exit;
			}
			if($_POST['blog_title']!='' && $_POST['blog_body']!='')
			{
				if($Industry == '')
				{
					if($_POST['blog_tags']!='')
					{
						$blog_tags = explode(",",$_POST['blog_tags']);
						$gametag = array_unique ($blog_tags);
						$gametags = "'".implode("','",$gametag)."'";
						$_POST['blog_tags'] = implode(",",$gametag);
						$sql_gametag = $GETSQL->fSql("tag_id,tag_subject","`{$ODBC['tablepre']}travelattrtag`","`tag_subject` IN ({$gametags})");
						foreach ($sql_gametag AS $value)
						{
							foreach ($gametag AS $key=>$ver)
							{
								if($ver == $value['tag_subject'])
								unset($gametag[$key]);
							}
						}
						$GETSQL->fUpdate("`{$ODBC['tablepre']}travelattrtag`","`tag_num`=`tag_num`+1","`tag_subject` IN ({$gametags})");
						foreach ($gametag AS $value)
						{
							$cQuery = array("`tag_subject`");
							$cData = array($value);
							$GETSQL->fInsert("`{$ODBC['tablepre']}travelattrtag`",$cQuery,$cData);
						}
					}

					$cQuery = array("`attr_id`","`attr_hid`","`attr_subject`","`attr_tages`","`attr_price`","`attr_content`","`attr_date`");
					$cData = array($nowtime,$id,$_POST['blog_title'],$_POST['blog_tags'],$_POST['blog_price'],$_POST['blog_body'],fgetdate());
					$GETSQL->fInsert("`{$ODBC['tablepre']}travelattr`",$cQuery,$cData);
					$GETSQL->fUpdate("`{$ODBC['tablepre']}travel`","`sc_room`=`sc_room`+1","`sc_id`='{$id}'");

					if($actionhtml = GetCache('travel'))
					{
						include_once $actionhtml;
						if($cache_config['cache'] == '1')
						{
							P_unlink(R_P."html/travel/travelattr_I_{$id}.htm");
							ffile("{$boardurl}index.php?action=travel&option=travelattr&id={$id}",'',"r");
						}
					}
					header("Location: update.php?action=add&title=".urlencode("发表成功")."&a=travel&p=travelattr&id={$id}&in={$nowtime}");
					exit;
				}else{
					$GETSQL->fUpdate("`{$ODBC['tablepre']}travelattr`","`attr_subject`='{$_POST['blog_title']}',
					`attr_tages`='{$_POST['blog_tags']}',
					`attr_price`='{$_POST['blog_price']}',
					`attr_content`='{$_POST['blog_body']}'","`attr_hid`='{$id}' AND `attr_id`='{$Industry}'");
					header("Location: update.php?action=add&title=".urlencode("修改成功")."&a=travel&p=travelattr&id={$id}&in={$Industry}");
					exit;
				}
			}
			if($Industry!='')
			{
				$sql_hotelthread = $GETSQL->fSql("*","`{$ODBC['tablepre']}travelattr`","`attr_hid`='{$id}' AND `attr_id`='{$Industry}'","","","","U_B");
				$ncontent = str_replace("\\","\\\\",$sql_hotelthread['attr_content']);
				$ncontent = str_replace("\n","\\n",$ncontent);
				$ncontent = str_replace("\r","\\r",$ncontent);
				$ncontent = str_replace("\"","\\\"",$ncontent);
				$smarty->assign('ncontent',$ncontent);
				$smarty->assign('sql_hotelthread',$sql_hotelthread);
			}
			$smarty->assign('sql_hotel',$sql_hotel);
			$smarty->display("travelattredit.htm");
		}
	}
	if($option == 'travelphoto')
	{
		$sql_hotel = $GETSQL->fSql("sc_id,sc_uid,sc_info,sc_traffic","`{$ODBC['tablepre']}travel`","`sc_id`='{$id}'","","","","U_B");
		if($sql_hotel['sc_id'] != '' AND ($uid == $sql_hotel['sc_uid'] || in_array('travel',$authority) || $sql_pop['group_authority']=='all'))
		{
			if($_FILES['uploadphoto']['name']!="" && $_POST['uploadsubject']!='')
			{
				$img = "{$config['attach']}/travel/".fUploadimg_process($_FILES['uploadphoto'],"{$config['attach']}/travel/","simll/");
				ImgWaterMark($img,$IMG_upment['waterpos'],$IMG_upment['waterimg'],$IMG_upment['watertext'],$IMG_upment['waterfont'],$IMG_upment['watercolor'],$IMG_upment['waterpct']);
				$cQuery = array("`hi_id`","`hi_hid`","`hi_src`","`hi_subject`","`hi_date`");
				$cData = array($nowtime,$sql_hotel['sc_id'],$img,$_POST['uploadsubject'],fgetdate());
				$GETSQL->fInsert("`{$ODBC['tablepre']}travelimage`",$cQuery,$cData);

				$cQuery = array("`img_picid`","`img_did`","`img_picsrc`","`img_picsize`","`img_uid`");
				$cData = array($nowtime,$nowtime,$img,$_FILES['uploadphoto']['size'],$uid);
				$GETSQL->fInsert("`{$ODBC['tablepre']}images`",$cQuery,$cData);

				$GETSQL->fUpdate("`{$ODBC['tablepre']}travel`","`sc_album`=`sc_album`+1","`sc_id`='{$id}'");
				if($actionhtml = GetCache('travel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					{
						P_unlink(R_P."html/travel/travelphoto_I_{$id}.htm");
						ffile("{$boardurl}index.php?action=travel&option=travelphoto&id={$id}",'',"r");
					}
				}
				echo "<script type='text/javascript' language='javascript' src='lang/ajax.js'></script>
				<script type='text/javascript' language='javascript'>
				var s = new parent.dialog();s.init();
				s.set('src', 2);
				s.set('title', '系统提示信息');
				s.event('图片上传成功','parent.window.location.reload();','','parent.window.location.reload();');
				</script>";exit;
				die(gb2utf8("图片上传成功"));
			}
			if($type == 'pass')
			{
				$GETSQL->fUpdate("`{$ODBC['tablepre']}travelimage`","`hi_pass`='1'","`hi_id`='{$Industry}' AND `hi_hid`='{$id}'");
				$mesg = "<img src='image/msg/error.gif' onclick=\"getNews('showimgdel_{$Industry}','{$boardurl}index.php?action=update&option=hotelphoto&id={$id}&Industry={$Industry}&type=delpass')\" alt='取消推荐' /><img src='image/msg/closed.gif' onclick=\"_confirm_msg_show('确定删除图片', 'getNews(\\\\\'showimg_{$Industry}\\\\\',\\\\\'{$boardurl}index.php?action=update&option=hotelphoto&id={$id}&Industry={$Industry}&type=del\\\\\');$(\\\\\'showimg_{$Industry}\\\\\').parentNode.removeChild($(\\\\\'showimg_{$Industry}\\\\\'))', '', '')\" alt='删除图片' /></div>";
				die(gb2utf8($mesg));
			}
			if($type == 'delpass')
			{
				$GETSQL->fUpdate("`{$ODBC['tablepre']}travelimage`","`hi_pass`='0'","`hi_id`='{$Industry}' AND `hi_hid`='{$id}'");
				$mesg = "<img src='image/msg/pin_1.gif' onclick=\"getNews('showimgdel_{$Industry}','{$boardurl}index.php?action=update&option=hotelphoto&id={$id}&Industry={$Industry}&type=pass')\" alt='推荐图片' /><img src='image/msg/closed.gif' onclick=\"_confirm_msg_show('确定删除图片', 'getNews(\\\\\'showimg_{$Industry}\\\\\',\\\\\'{$boardurl}index.php?action=update&option=hotelphoto&id={$id}&Industry={$Industry}&type=del\\\\\');$(\\\\\'showimg_{$Industry}\\\\\').parentNode.removeChild($(\\\\\'showimg_{$Industry}\\\\\'))', '', '')\" alt='删除图片' /></div>";
				die(gb2utf8($mesg));
			}
			if($type == 'del')
			{
				$sql_hotelimage = $GETSQL->fSql("hi_src","`{$ODBC['tablepre']}travelimage`","`hi_id`='{$Industry}' AND `hi_hid`='{$id}'","","","","U_B");
				P_unlink(R_P."{$sql_hotelimage['hi_src']}");
				P_unlink(R_P.fimgsrc($sql_hotelimage['hi_src'],$simp='simll/'));
				$GETSQL->fDelete("`{$ODBC['tablepre']}travelimage`","`hi_id`='{$Industry}' AND `hi_hid`='{$id}'","1");
				$GETSQL->fUpdate("`{$ODBC['tablepre']}travel`","`sc_album`=`hot_album`-1","`sc_id`='{$id}'");
				if($actionhtml = GetCache('travel'))
				{
					include_once $actionhtml;
					if($cache_config['cache'] == '1')
					P_unlink(R_P."html/travel/travelphoto_I_{$id}_Y_{$Industry}.htm");
				}
			}
		}
	}
	if($option == 'travelyou')
	{
		$sql_lyou = $GETSQL->fSql("thr_id,thr_hid,thr_tages","`{$ODBC['tablepre']}travelyou`","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'","","","","U_B");
		if($sql_lyou['thr_id'] != '' || $sql_pop['group_authority']=='all')
		{
			if($type == 'del')
			{
				$GETSQL->fDelete("`{$ODBC['tablepre']}travelyou`","`thr_hid`='{$id}' AND `thr_id`='{$Industry}'","1");
				die(gb2utf8("OK 删除成功"));
			}
		}
	}
}else
die(gb2utf8("您没有权限进行本操作<BR>请联系网站管理员<a href='mailto:{$config['mail']}'>{$config['mail']}</a>"));
?>