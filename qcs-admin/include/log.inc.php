<?php
	
	require_once("constantes.inc.php");
	require_once("utils.inc.php");
	
	/* Ecrit un message dans les fichier de logs */

	function logMessage($message , $logLevel = LOG_LEVEL_NORMAL)
	{
		if($logLevel >= LOG_LEVEL_SELECTED)
		{
			$date = str_replace('/' , '-' , getCurrentDateOnly());

			global $login; // Recupere la variable dans les pages qui inclues ce fichier
			
			$logFileName = AFFAIRE_DIRECTORY . '\\' . $login . '-' . $date . '.txt';
			
			$file = fopen($logFileName, "a");
	
			$date = date("d/m/Y");
			$heure = date("H:i:s");
	
			fwrite($file , "[" . $date . " - " . $heure . "] " . $message . "\r\n");
	
			fclose($file);
		}
	}

?>