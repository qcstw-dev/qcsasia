<?php

	require_once("constantes.inc.php");
	require_once("log.inc.php");
	
	$globalLink;

	// Ouvre une session avec le serveur SQL
	function startSQLSession()
	{
		
		global $globalLink;
		
		if(!empty($globalLink))
			return $globalLink;
		
		$link = mysql_connect(HOST , USER , PASSWORD);
	
		if($link)
		{
			$db_selected = mysql_select_db(DATABASE, $link);
	
			if(!$db_selected)
			{
				logMessage(__FUNCTION__ . " - IMPOSSIBLE DE SE CONNECTER A LA DATABASE" , LOG_LEVEL_ERROR);
			}
		}
		else
		{
			logMessage(__FUNCTION__ . " - IMPOSSIBLE DE SE CONNECTER AU SERVEUR SQL : " . mysql_error()  , LOG_LEVEL_ERROR);

			////////////////////////////////////////////////////////////////
			
			sleep(10);
			
			$link = mysql_connect(HOST , USER , PASSWORD);
		
			if($link)
			{
				$db_selected = mysql_select_db(DATABASE, $link);
		
				if(!$db_selected)
				{
					logMessage(__FUNCTION__ . " - IMPOSSIBLE DE SE CONNECTER A LA DATABASE" , LOG_LEVEL_ERROR);
				}
			}
			
			////////////////////////////////////////////////////////////////
			

		}
	
		$globalLink = $link;
	
		return $link;
	
	}
	
	// Ferme une session avec le serveur SQL
	function closeSQLSession()
	{
		//@mysql_close();
	}


?>