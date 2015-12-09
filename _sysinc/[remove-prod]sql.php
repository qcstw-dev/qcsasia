<?php
// SQL FUNCTIONS
// 2007 01 10
// JIMMY ROY

class sql {
	var $conn;
	var $db;
	var $HOST_CFG;

	function sql() {

		// DEV
		/*$db_name	= $this->HOST_CFG['db_name'] = 'tabarly';
		$db_host	= $this->HOST_CFG['db_host'] = 'localhost';
		$db_user	= $this->HOST_CFG['db_user'] = 'root';
		$db_pass	= $this->HOST_CFG['db_pass'] = 'root';	*/	
		
		// PROD
		$db_name	= $this->HOST_CFG['db_name'] = 'jimmyroy';
		$db_host	= $this->HOST_CFG['db_host'] = 'sql10';
		$db_user	= $this->HOST_CFG['db_user'] = 'jimmyroy';
		$db_pass	= $this->HOST_CFG['db_pass'] = '8yYfmmhG';	
		
		$this -> conn = mysql_connect($db_host, $db_user, $db_pass) or die (mysql_error());
		$this -> db = mysql_select_db($db_name, $this -> conn ) or die(mysql_error()); 	
		$this -> db = mysql_query("SET NAMES utf8");
		$this -> db = mysql_query("SET CHARACTER SET 'utf8'");
		$this -> db = mysql_query("SET CHARACTER_SET_CONNECTION=utf8");
		$this -> db = mysql_query("SET CHARACTER_SET_RESULTS=utf8");
		//$this -> db = mysql_query("SET collation_connection 'utf8_bin''utf8'"); 
		$this -> db = mysql_query("SET collation_connection 'utf8_unicode_ci''utf8'"); 
	}
	
	// sql select
	function dquery($query) {
		$result = mysql_query($query);
		if (!$result) return -99;
		$rowcount = mysql_num_rows($result);
		$rr[0] = $rowcount;
		for ($i=0; $i<$rr[0]; $i++) {
			if(isset($tmp)) unset($tmp);
			$tmp = mysql_fetch_array($result, MYSQL_ASSOC);
			while(list($k, $v) = each($tmp)) {
				if(!is_int($k)) $rr[$i+1][$k] = $v;
			}
		}
		if (isset($tmp)) unset($tmp);
		mysql_free_result($result);
		return $rr;
	}
	
	// sql update
	// $ret = TRUE if update success else FALSE
	function dchange($query) {
		$ret = mysql_query($query);
		return $ret;
	}	
	
	// sql insert
	function dinsert($query) {
		$rr = mysql_query($query);
		if (!$rr) {
			return(FALSE);
		}
		$id = mysql_insert_id();
		return $id;
	}	
	
	function dclose() {
		mysql_close($this -> conn);
		return(TRUE);
	}	
}
?>