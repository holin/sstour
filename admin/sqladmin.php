<?php
if($option == 'index'){
	if($_POST['update'] == 'update')
	{
		fgetposttoupdatd($_POST,$ODBC['charset']);
		$n = count($_POST['tablename']);
		$sql_text = "";
		for ($i=0;$i<$n;$i++)
		{
			$sql_text .= "`{$_POST['tablename'][$i]}`";
			if($i < $n-1)
			$sql_text .= ",";
		}
		if($n > 0)
		{
			$GETSQL->fQuery("ANALYZE TABLE {$sql_text}");
			$GETSQL->fQuery("REPAIR TABLE {$sql_text}");
			$GETSQL->fQuery("OPTIMIZE TABLE {$sql_text}");
			$GETSQL->fQuery("CHECK TABLE {$sql_text}");
		}
		die(gb2utf8("成功操作数据表"));
	}
	$sql_rs = $GETSQL->fArray("SHOW TABLE STATUS",$GETSQL->cLink);
	$smarty->assign('sql_rs',$sql_rs);
	$smarty->display("sqladmin.htm");
}
if($option == 'sqlupdate')
{
	if($_GET['table'] != '')
	{
		include_once Getincludefun("page");
		if($_GET['show'] == 'truncate')
		{
			$GETSQL->fQuery("TRUNCATE TABLE `{$_GET['table']}`");
			die(gb2utf8("数据表{$_GET['table']}清空"));
		}
		if($_GET['show'] == 'deltable')
		{
			$GETSQL->fQuery("DROP TABLE `{$_GET['table']}`");
			die(gb2utf8("数据表{$_GET['table']}删除"));
		}
		if($_POST['update'] == 'update')
		{
			/*
			$GETSQL->fUpdate("`{$ODBC['tablepre']}{$_GET['table']}`",
			"`about_subject`='{$_POST['blog_title']}',`about_content`='{$_POST['blog_body']}'",
			"`about_id`='{$_POST['bid']}'");
			*/
			die(gb2utf8("数据表修改功能暂时没有升级"));
		}

		if($_GET['show'] == 'select')
		{
			$nCount = 20;
			$cParameter = "action=sqladmin&option=sqlupdate&table={$_GET['table']}&show=select&read=1";
			$nNums = $GETSQL->fNumrows("SELECT * FROM `{$_GET['table']}`");
			$sql_user = $GETSQL->fSql("*",
			"`{$_GET['table']}`",
			"",
			"",
			$nPage*$nCount,
			$nCount,
			"");
			$fpageup = fPagesadmin($nNums,$nPage,$nCount,$cParameter,"showwindow",1);
		}
	}
	$smarty->assign('sql_users',$sql_user[0]);
	$smarty->assign('sql_user',$sql_user);
	$smarty->assign('sqltable',$_GET['table']);
	$smarty->assign('fpageup',$fpageup);
	$smarty->display("sqladmin.htm");
}
if($option == 'columns')
{
	if($_GET['del'] != '')
	{
		$GETSQL->fQuery("ALTER TABLE `{$_GET['table']}` DROP `{$_GET['del']}`");
		die(gb2utf8("字段{$_GET['table']}.{$_GET['del']}删除"));
	}
	$sql_rs = $GETSQL->fArray("show columns from `{$_GET['table']}`");
	$smarty->assign('table',$_GET['table']);
	$smarty->assign('sql_rs',$sql_rs);
	$smarty->display("sqladmin.htm");
}
if($option == 'sqlback')
{
	$bak="#\n# IOIme bakfile\n# Version:".$ODBC['live']."\n# Time: ".fgetdate()."\n# Type: \n# IOIme: http://www.ioime.com\n# --------------------------------------------------------\n\n\n";
	$GETSQL->fQuery("SET SQL_QUOTE_SHOW_CREATE = 0");
	$bakupdata = "";
	$sizelimit = $_GET['sizelimit'];
	$coun = 0;
	$url = "admin.php?action={$action}&option={$option}";
	if(@is_array($_POST['tablename']))
	{
		foreach ($_POST['tablename'] AS $key=>$value)
		{
			if($value != '')
			fbakouttable($value,$bakupdata);
			else
			unset($_POST['tablename'][$key]);
			$coun ++ ;
		}
		$fHtmlcode = fHtmlcode();		
		ffile("data/sql_".date("Ymd")."_".$fHtmlcode."_1.sql",$bak.$bakupdata,"w");
		$tabletxt = "<?php\n\$tablename = array('".implode("','",$tablename)."');\n";
		$tabletxt .= "\$table = \"{$_POST['tablename'][0]}\";\n";
		$tabletxt .= "\$start = \"0\";\n";
		$tabletxt .= "\$sizelimit = \"{$sizelimit}\";\n";
		$tabletxt .= "\$np = \"1\";\n";
		$tabletxt .= "\$fHtmlcode = \"{$fHtmlcode}\";\n";
		$tabletxt .= "?>";
		ffile("data/backup.php",$tabletxt,"w");
		die(gb2utf8("数据表整理...<BR>请不要点“确定”<BR><iframe width=200 height=100 frameborder=0 id=sqlFrame name=sqlFrame src='{$boardurl}{$url}'></iframe>"));
	}else{
		include_once("data/backup.php");
		if($table == '')
		{
			P_unlink("data/backup.php");
			die('数据备份完成点击确定');
		}
		$np++;
		$n = count($tablename);
		for($i=0;$i<$n;)
		{
			if($coun <= $sizelimit && $tablename[$i] == $table)
			{
				$successtext .=  "数据{$table}...<BR>";
				$num = fbakoutdata($table,$bakupdata);
				$coun = $coun + $num[1];
				$start = $num[0];
				if($start < 1)
				$i++;
				$table = $tablename[$i];
				if($table == '')
				break;
			}
		}
		$tabletxt = "<?php\n\$tablename = array('".implode("','",$tablename)."');\n";
		$tabletxt .= "\$table = \"{$table}\";\n";
		$tabletxt .= "\$start = \"{$start}\";\n";
		$tabletxt .= "\$sizelimit = \"{$sizelimit}\";\n";
		$tabletxt .= "\$np = \"{$np}\";\n";
		$tabletxt .= "\$fHtmlcode = \"{$fHtmlcode}\";\n";
		$tabletxt .= "?>";
		ffile("data/backup.php",$tabletxt,"w");
		if($bakupdata!='')
		{
			$url = "admin.php?action={$action}&option={$option}";
			ffile("data/sql_".date("Ymd")."_".$fHtmlcode."_$np.sql",$bak.$bakupdata,"w");
			echo "<meta http-equiv='refresh' content='2;url={$boardurl}{$url}'>";
			//echo "<script type='text/javascript' language='javascript'>parent.sqlFrame.location.reload();</script>";
			die("{$successtext}<BR>");
			//$url = "<meta http-equiv='refresh' content='1;url=admin.php?action={$action}&option={$option}&update=sqlback&tables={$tables}&start={$num[0]}&sizelimit={$sizelimit}&np={$np}&fHtmlcode={$fHtmlcode}'>";
			//$textmesg =  "<a href='admin.php?action={$action}&option={$option}&update=sqlbacktables={$tables}&start={$num[0]}&sizelimit={$sizelimit}&np={$np}&fHtmlcode={$fHtmlcode}'>下一页</a>";
		}else{
			P_unlink("data/backup.php");
			die('数据备份完成<BR>');
		}
	}
}
if($option == 'sqlbck')
{
	if($type == 'del')
	{
		P_unlink(R_P."data/{$id}");
		die(gb2utf8("删除备份文件成功"));
	}
	if($type == 'into')
	{
		Cookie("sql_file",$id);
		Showmsg("beingto_page",1,"sqlbck.php");
	}
	$handle = opendir("data");
	$i=0;
	while ($file = readdir($handle)) {
		if($file != "" && $file != '.' && $file != ".."){
			$filers[$i] = $file;
			$code = fHtmlcode();//$ODBC['HTMLcode']
			$mu = fencrypt("data",$config['HTMLcode']);
			$md = md5($code.$config['HTMLcode'].$file.$mu);
			$filetime[$i] = date("Y-m-d h:i:s",filemtime(R_P."data/$file"));
			$down[$i] = "code=$code&mu=$mu&file=$file&md=$md";
			$i++;
		}
	}
	$smarty->assign('sql_rs',$sql_rs);
	$smarty->assign('filers',$filers);
	$smarty->assign('down',$down);
	$smarty->display("sqlbck.htm");
}
function fbakouttable($tablename,&$bakupdata)
{
	global $GETSQL;
	$sql_rs = $GETSQL->fArray("show columns from `{$tablename}`");
	$bakupdata .= "DROP TABLE IF EXISTS `{$tablename}`;\n";
	$sql_mysql = $GETSQL->fArray("SHOW CREATE TABLE `{$tablename}`");
	$bakupdata .= $sql_mysql[0]['Create Table'];
	if(eregi(";$",$bakuptable))
	$bakupdata .= "\n";
	else
	$bakupdata .= ";\n";
}
function fbakoutdata($tablename,&$bakupdata)
{
	global $GETSQL,$start,$sizelimit,$coun;
	$size = $sizelimit - $coun;
	$nNums = $GETSQL->fNumrows("SELECT * FROM `{$tablename}`");
	$intn = @intval($nNums/($size+$start))-1;
	$sql_group = $GETSQL->fSql("*",
	"`{$tablename}`",
	"",
	"",
	$start,
	$size,
	"");
	$updata = array();
	$tsdc = 0;
	foreach ($sql_group AS $k=>$v)
	{
		$filg = array();
		$tdat = array();
		$j = 0;
		foreach ($v AS $kk=>$vv)
		{
			if($tsdc == 0)
			$filg[] = "`".mysql_escape_string($kk)."`";
			$tdat[] = "'".mysql_escape_string($vv)."'";
			$j++;
		}
		if(is_array($filg) && $j > 0)
		{
			$tsf = implode(",",$filg);
			$tsd = implode(",",$tdat);
			if($tsdc === 0)
			$updata[]= "($tsf) VALUES ($tsd)";
			else
			$updata[]= "($tsd)";
		}
		$tsdc++;
	}
	if(is_array($updata) && $tsdc > 0)
	{
		$bakupdata .= "INSERT INTO `{$tablename}`";
		$updatas = implode(",\n",$updata);
		$bakupdata .= "\n".$updatas.";\n";
	}
	if($intn > 0)
	{
		$str[0] = $tsdc + $start;
		$str[1] = $tsdc;
		$str[2] = $nNums;
	}else{
		$str[0] = 0;
		$str[1] = $tsdc;
		$str[2] = $nNums;
	}
	return $str;
}
function bakindata($filename) {
	global $GETSQL,$ODBC;
	$query='';
	$num=0;
	$value=trim($filename);
	if($value && $value[0]!='#')
	{
		if(eregi(";$",$value)){
			$query.=$value;
			if(eregi("^CREATE",$query)){
				$extra = substr(strrchr($query,')'),1);
				$query = str_replace($extra,'',$query);
				if($GETSQL->cinfo > '4.1'){
					$extra = $charset ? "ENGINE=MyISAM DEFAULT CHARSET={$ODBC['charset']};" : "ENGINE=MyISAM;";
				}else{
					$extra = "TYPE=MyISAM;";
				}
				$query .= $extra;
			}elseif(eregi("^INSERT",$query)){
				$query='REPLACE '.substr($query,6);
			}
			$GETSQL->fQuery($query);
			$query='';
		}else{
			$query.=$value;
		}
	}
}
function bakindatafile($filename) {
	global $GETSQL,$ODBC;
	$sql=file($filename);
	$query='';
	$num=0;
	foreach($sql as $key => $value){
		$value=trim($value);
		if(!$value || $value[0]=='#') continue;
		if(eregi(";$",$value)){
			$query.=$value;
			if(eregi("^CREATE",$query)){
				$extra = substr(strrchr($query,')'),1);
				$query = str_replace($extra,'',$query);
				if($GETSQL->cinfo > '4.1'){
					$extra = $charset ? "ENGINE=MyISAM DEFAULT CHARSET={$ODBC['charset']};" : "ENGINE=MyISAM;";
				}else{
					$extra = "TYPE=MyISAM;";
				}
				$query .= $extra;
			}elseif(eregi("^INSERT",$query)){
				$query='REPLACE '.substr($query,6);
			}
			$GETSQL->fQuery($query);
			$query='';
		}else{
			$query.=$value;
		}
	}
}
?>