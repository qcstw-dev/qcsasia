<?php

	require_once("sql.inc.php");
	require_once("log.inc.php");
	
	function addHistory($idMember , $type , $filename = "")
	{
		
		$createdDate = getCurrentDateSQLFormat();
		
		$sqlQuery = "INSERT INTO qcs_history (idMember, createdDate , type , filename) VALUES('"
					. $idMember
					. "' , '"
					. $createdDate
					. "' , '"
					. $type
					. "' , '"
					. $filename
					. "'"
					. ")";

//	echo 	$sqlQuery . "<br/>";
	
		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);

		$sqlLink = startSQLSession();

		$result = mysql_query($sqlQuery);

		closeSQLSession($sqlLink);
	}
	
	function getTabHistory($idMember , $type)
	{
																	
		$sqlQuery = "SELECT * FROM qcs_history WHERE type = '" . $type . "' AND idMember = '" . $idMember . "' ORDER BY createdDate ASC";
		
	//	echo 	$sqlQuery . "<br/>";
	
		$sqlLink = startSQLSession();

		$result = mysql_query($sqlQuery , $sqlLink);
		
		closeSQLSession($sqlLink);

		$tabHistory = array();
	
		while($line = mysql_fetch_array($result))
		{
				$tabHistory[] = $line;
		}
		
		// echo $sqlQuery . "<br/>";

		return $tabHistory;
	}
	
	function displayListHistoryConnection($idMember , $type)
	{

		$tabHistory = getTabHistory($idMember , $type);
		
		$i = 0;
					
		foreach($tabHistory as $history)
		{
			
			if($i % 2 == 0)
				$htmlData = $htmlData . '<tr class="odd">'  . "\n";
			else
				$htmlData = $htmlData . '<tr class="even">'  . "\n";

			$htmlData = $htmlData . '<td>' . $history['createdDate'] . '</td>'  . "\n";
				
			$htmlData = $htmlData . '</tr>'  . "\n";
			
			$i++;				
		}
		
		return $htmlData;

	}
	
	function displayListHistoryDownload($idMember , $type)
	{

		$tabHistory = getTabHistory($idMember , $type);
		
		$i = 0;
					
		foreach($tabHistory as $history)
		{
			
			if($i % 2 == 0)
				$htmlData = $htmlData . '<tr class="odd">'  . "\n";
			else
				$htmlData = $htmlData . '<tr class="even">'  . "\n";

			$htmlData = $htmlData . '<td>' . $history['createdDate'] . '</td>'  . "\n";
			$htmlData = $htmlData . '<td><a href = "' . $history['filename'] . '">' . $history['filename'] . '</a></td>'  . "\n";
				
			$htmlData = $htmlData . '</tr>'  . "\n";
			
			$i++;				
		}
		
		return $htmlData;

	}

	
?>