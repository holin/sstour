<?php
if($option == 'index')
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
function fbakouttable($tablename,&$bakuptable)
{
	global $GETSQL;
	$sql_rs = $GETSQL->fArray("show columns from `{$tablename}`");
	$bakuptable .= "DROP TABLE IF EXISTS `{$tablename}`;\n";
	$sql_mysql = $GETSQL->fArray("SHOW CREATE TABLE `{$tablename}`");
	$bakuptable .= $sql_mysql[0]['Create Table'];
	if(eregi(";$",$bakuptable))
	$bakuptable .= "\n";
	else
	$bakuptable .= ";\n";
}
function fbakoutdata($tablename,&$bakupdata)
{
	global $GETSQL,$start,$sizelimit,$coun;
	$size = $sizelimit - $coun;
	$nNums = $GETSQL->fNumrows("SELECT * FROM `{$tablename}`");
	$intn = intval($nNums/($size+$start));
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
		$bakupdata .= $updatas.";\n";
	}
	if($intn > 0)
	{
		$str[0] = $tsdc + $start;
		$str[1] = $tsdc;
	}else{
		$str[0] = 0;
		$str[1] = $tsdc;
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