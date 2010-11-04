<?
if(!empty($HTTP_SERVER_VARS['REQUEST_URI']) && (strstr($HTTP_SERVER_VARS['REQUEST_URI'], "odbc.php")))
{
	die("您没权限浏览本页<BR>如果您需要查看本页<a href='http://www.oi77.com'>请与管理员联系</a>");
}
class Codbc
{
	var $cLink;
	var $cResult;
	var $cSql;
	var $cRows;
	var $cArray;
	var $Value;
	var $cinfo;
	var $errmsg;

	function fOpen()
	{
		global $ODBC;
		switch ($ODBC['type'])
		{
			default:
			case "mysql":
				if($ODBC['pconnect'] == '1') 
				$this->cLink = mysql_pconnect($ODBC['host'].($ODBC['port']?":".$ODBC['port']:""), $ODBC['user'], $ODBC['pwd']);
				else
				$this->cLink = mysql_connect($ODBC['host'].($ODBC['port']?":".$ODBC['port']:""), $ODBC['user'], $ODBC['pwd']); 				
				$this->cinfo = mysql_get_server_info(); 
				if($this->cinfo > '4.1')
				mysql_query("SET NAMES '{$ODBC['charset']}'", $this->cLink);
				if($this->cinfo > '5.0')
				mysql_query("SET sql_mode=''");

				mysql_query("SET character_set_client='{$ODBC['charset']}'");
				mysql_query("SET character_set_connection='utf8'");
				mysql_query("SET character_set_results='{$ODBC['charset']}'");
				
				if (!mysql_select_db($ODBC['database'])){
					die("<BR>[Warning] 1130 error:\n 数据表{$ODBC['database']}不存在或者连接数据库失败，没有连接数据库的权限".mysql_error());
				}
				break;
		}
		if($ODBC['error'] == '1' && !$this->cLink)
		die ("<BR>[Warning] 1032 error:\n 记录不存在,提交事务失败");
	}

	function fQuery($cQuery,$method='')
	{
		global $ODBC;
		if(!$this->cLink)
		$this->fOpen();

		switch ($ODBC['type'])
		{
			default:
			case ("mysql"):
				if($method=='U_B' && function_exists('mysql_unbuffered_query'))
				$this->cResult = mysql_unbuffered_query($cQuery,$this->cLink);
				else
				$this->cResult = mysql_query($cQuery,$this->cLink);
				break;
		}
		if($ODBC['error'] == '1' && !$this->cResult)
		die ("<BR>[Warning] 1032 error:\n 记录不存在,提交事务失败 \n error in : $cQuery \n $method");
		return $this->cResult;
	}
	/************fCreate************/
	//函数：fCreate()
	//功能：建立数据表
	//日期：2005.9.26
	//更改日期：2005.9.26
	//使用说明：fCreate($cName,$aDate,$aPrimary,$kKey)
	//$array = array("`id` mediumint(8) unsigned NOT NULL auto_increment","`int` mediumint(8) unsigned NOT NULL","`test` varchar(30) NOT NULL");
	//作者：trexwb
	/*****************************/
	function fCreate($cName,$aDate,$aPrimary,$kKey)
	{
		$this->cSql = "CREATE TABLE `{$cName}` (";
		if(is_array($aDate))
		$this->cSql .= implode(", ",$aDate).",";
		else
		$this->cSql .= $aDate .",";
		if($aPrimary)
		$this->cSql .= "PRIMARY KEY ( `{$aPrimary}` )";
		if(is_array($kKey))
		{
			$nKeyNum = count($kKey);
			for ($i=0;$i<$nKeyNum;$i++)
			{
				$this->cSql .= ", KEY `{$kKey[$i]}` (`{$kKey[$i]}`)";
				if($i < ($nKeyNum-1))
				$this->cSql .=",";
			}
		}else{
			$this->cSql .= ", KEY `{$kKey}` (`{$kKey}`)";
		}
		$this->cSql .= ");";
		return $this->fQuery($this->cSql,"U_B");
	}
	/************fDrop************/
	//函数：fDrop()
	//功能：删除数据表
	//日期：2005.9.26
	//更改日期：2005.9.26
	//使用说明：fDrop($cName)
	//$array = array("test");
	//作者：trexwb
	/*****************************/
	function fDrop($cName)
	{
		$this->cSql = '';
		if(is_array($cName))
		{
			$aNameNum = count($cName);
			for($i=0;$i<$aNameNum;$i++)
			{
				$this->cSql .= "`{$cName[$i]}`";
				if($i < ($aNameNum-1))
				$this->cSql .= ",";
			}
			$this->cSql = "DROP TABLE {$this->cSql}";
		}else{
			$this->cSql = "DROP TABLE `{$cName}`";
		}
		$this->cSql .= ";";
		return $this->fQuery($this->cSql,"U_B");
	}
	/************fShowdata************/
	//函数：fShowdata()
	//功能：显示所有表
	//日期：2005.9.26
	//更改日期：2005.9.26
	//使用说明：fShowdata($cName)
	//作者：trexwb
	/*****************************/
	function fShowdata($cName)
	{
		global $ODBC;
		switch ($ODBC['type'])
		{
			default:
			case "mysql":
				switch ($cName)
				{
					default:
					case 0:
						$this->cSql = "SHOW TABLES";
						break;
					case 1:
						$this->cSql = "SHOW DATABASES";
						break;
				}
				break;
		}
		return $this->fQuery($this->cSql,"U_B");
	}
	function fSql($cQuery,$cTable,$cWhere="",$cOrder="",$nPage="",$nCount="",$method="")
	{
		global $ODBC;
		$this->cSql="SELECT ";
		if(is_array($cQuery))
		$this->cSql .= implode(", ",$cQuery);
		else
		$this->cSql .= $cQuery;
		$this->cSql .= " FROM ";
		if(is_array($cTable))
		$this->cSql .= implode(", ",$cTable);
		else
		$this->cSql .= $cTable;
		if($cWhere)
		$this->cSql .= " WHERE ".$cWhere;
		if($cOrder)
		$this->cSql .= " ".$cOrder;
		if($nCount > "0")
		{
			if($nPage > "0")
			$this->cSql .= " limit $nPage,$nCount";
			else
			$this->cSql .= " limit 0,$nCount";
		}
		$this->errmsg = $this->cSql;
		return $this->fArray($this->cSql,$method);
	}
	function fNumrows($sql)
	{
		global $ODBC;
		$this->cRows = 0;
		switch ($ODBC['type'])
		{
			case ("mysql"):
				if($this->fQuery($sql))
				$this->cRows = mysql_num_rows($this->cResult);
				break;
		}
		if(!$this->cRows)
		$this->cRows = 0;
		return $this->cRows;
	}

	function fArray($sql,$method='')
	{
		global $ODBC;
		$this->cArray = array();
		switch ($ODBC['type'])
		{
			case ("mysql");
			if($this->fQuery($sql,$method))
			{
				if($method == 'U_B')
				{
					$this->cArray =& mysql_fetch_array($this->cResult,MYSQL_ASSOC);
				}else {
					$i = 0;
					while ($this->Value = mysql_fetch_array($this->cResult, MYSQL_ASSOC))
					{
						$this->cArray[] = $this->Value;
						$i++;
					}
				}
				return $this->cArray;
			}
			break;
		}
	}

	function fInsert($cTable,$cQuery,$cData,$show='')
	{
		$this->cSql = "INSERT INTO ";
		$this->cSql .= is_array($cTable)?implode(",",$cTable):$cTable;
		$this->cSql .= "(";
		$this->cSql .= is_array($cQuery)?implode(",",$cQuery):$cQuery;
		$this->cSql .= ") VALUES('";
		$this->cSql .= is_array($cData)?implode("','",$cData):$cData;
		$this->cSql .= "')";
		if($show=='1')
		return $this->cSql;
		$this->fQuery($this->cSql);
	}

	function insert_id() {
		global $ODBC;
		switch ($ODBC['type'])
		{
			case ("mysql");
			$id = mysql_insert_id();
			break;
		}
		return $id;
	}

	function fUpdate($cTable,$cData,$cWhere,$show='')
	{
		$this->cSql = "UPDATE ";
		if($cTable)
		{
			$this->cSql .= $cTable." SET ";
			$this->cSql .= is_array($cData)?implode(", ",$cData):$cData;
			$this->cSql .= $cWhere? " WHERE ".$cWhere:"";
		}
		if($show=='1')
		return $this->cSql;
		$this->fQuery($this->cSql);
	}

	function fDelete($cTable,$cWhere,$nLimit)
	{
		$this->cSql = "DELETE FROM ";
		if($cTable)
		{
			$this->cSql .= $cTable;
			$this->cSql .= $cWhere?" WHERE ".$cWhere:"";
			$this->cSql .= $nLimit? " LIMIT ".$nLimit:"";
		}
		$this->fQuery($this->cSql);
	}

	function fClos()
	{
		global $ODBC;
		switch ($ODBC['type'])
		{
			default:
			case ("mysql"):
				if($ODBC['pconnect'] == '0')
				mysql_close($this->cLink);
			break;
		}
	}
}
?>