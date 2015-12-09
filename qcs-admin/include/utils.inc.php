<?php

	require_once("sql.inc.php");
	require_once("log.inc.php");
	
	function convertHumanDateDateSQL($date)
	{

	  $date_year = substr($date , 6,  4);
	  
	  $date_day = substr($date , 3 , 2);
	  
	  $date_month = substr($date , 0 , 2);
	  
	  return  $date_year ."-".  $date_month   . "-" . $date_day ;
	  
	}
	
	
	function envoyerEmail($subject , $body , $nameFrom , $mailFrom , $tabMailTo)
	{
                require_once("../../phpmailer/PHPMailerAutoload.php");
		$mail = new PHPmailer();
					
		$mail->SetLanguage("en" , "../include/lib/phpmailer/language/");
				
		$mail->IsSMTP(true);
		$mail->IsHTML(true);
		$mail->Host=MAILSERVER;
		$mail->CharSet = "UTF-8";
								
		$name = PROJECT;
		$mailFrom = $mailFrom;
					
		$mail->From = $mailFrom;
		$mail->FromName = $nameFrom;
								
		foreach($tabMailTo as $mailTo)
		{
			$mail->AddAddress($mailTo);
		}
		
		// SUJET ET MESSAGE
		$mail->Subject = $subject;
		$mail->Body = $body;

		// ENVOIE
		if(!$mail->Send())
			displayAndLog("ECHEC de l'envoie vers " . $mailTo  . " ERREUR : " .  $mail->ErrorInfo , LOG_LEVEL_ERROR);
		else
			displayAndLog("Envoi reussie vers " . $mailTo , LOG_LEVEL_NORMAL);
				
		$mail->SmtpClose();

				
		unset($mail);
		
		
	}
	
	function getDateFromDayMonthYear($day , $month , $year)
	{
		return $year . "-" . $month . "-" . $day;
	}



	// Affiche et log un message, utilise dans les scripts
	function displayAndLog($message)
	{
		echo $message . "\n";
		logMessage($message);
	}

	



	// Change le format de date depuis SQL vers format humain
	function changeDateFormat($date)
	{
		$tab = split(" " , $date);

		$tab1 = split("-" , $tab[0]);
		$tab2 = split(":" , $tab[1]);

		$year = $tab1[0];
		$mounth = $tab1[1];
		$day = $tab1[2];
		$hour = $tab2[0];
		$minute = $tab2[1];

		$timestamp = mktime($hour , $minute , 0 , $mounth , $day , $year);
		$newDate = date("d/m/Y H:i" , $timestamp);

		return $newDate;
	}

	// Change le format de date depuis SQL vers format humain (sans l'heure)
	function changeDateFormatOnly($date)
	{
		
		if($date == '0000-00-00 00:00:00') return "";
		if($date == '0000-00-00') return "";
		if(empty($date)) return "";
		
		$tab = split(" " , $date);

		$tab1 = split("-" , $tab[0]);
		$tab2 = split(":" , $tab[1]);

		$year = $tab1[0];
		$mounth = $tab1[1];
		$day = $tab1[2];
		$hour = $tab2[0];
		$minute = $tab2[1];

		$timestamp = mktime($hour , $minute , 0 , $mounth , $day , $year);
		$newDate = date("d/m/Y" , $timestamp);

		return $newDate;
	}

	function convertHumanDateToSQL($date)
	{
		if(empty($date)) return "0000-00-00 00:00:00";
		
		$date = split(" " , $date);

		//2007-02-17
		$dateOnly = $date[0];
		$hour = $date[1];

		$tab = split("/" , $dateOnly);

		$day = $tab[0];
		$mounth = $tab[1];
		$year = $tab[2];

		$hour = $hour . ":00";

		$dateOnly = $year . "-" . $mounth . "-" . $day;

		return $dateOnly . " " . $hour;

	}

	// Renvoie la date courante (avec heure et minute)
	function getCurrentDate()
	{
		return date("d/m/Y H:i");
	}
	
	function getCurrentMonth()
	{
		return date("m");
	}
	
	function getCurrentYear()
	{
		return date("Y");
	}

	// Renvoie la date courante
	function getCurrentDateOnly()
	{
		return date("d/m/Y");
	}

	// Renvoie la date courante (avec heure et minute) au format SQL
	function getCurrentDateSQLFormat()
	{
		return date("Y-m-d H:i:s");
	}

	// Renvoie la date courante (avec heure et minute) pour reecrir les noms des fichiers
	function getCurrentDateFileFormat()
	{
		return date("Y-m-d H-i-s");
	}


	// Analyse size (un nombre d'octet) retourne un label avec ko ou mo
	function getStringSize($size)
	{
		$ko = $size / 1024;
		$mo = $size / 1024 / 1024;

		$ko = round($ko , 2);
		$mo = round($mo , 2);

		if($mo < 1)
			return $ko . " Ko";
		else
			return $mo . " Mo";
	}


	// Affiche les liens pour parcourir le tableau si le nombre de ligne est superieur a 10
	function getLiensPageParPage($page , $sort ,  $selectedPage , $nbTotal , $label , $nbParPage)
	{

		$data = "<b>" . $nbTotal . "</b> " . $label;

		if($nbTotal == 0)
			return;
		if($nbTotal <= $nbParPage)
			return $data;

		if(empty($selectedPage))
			$selectedPage = "1";

		// Arrondi a l'entier inferieur
		$nbPage = floor($nbTotal / $nbParPage);
		$nbLastPage = $nbTotal % $nbParPage;

		if($nbLastPage != 0)
			$nbPage++;

		$link = 'index.php?page=' . $page . '&sort=' . $sort . '&selectedPage=';

		$data = $data . "&nbsp; - Pages : &nbsp;&nbsp;&nbsp;";

		if($selectedPage == "1")
			$data = $data . "First&nbsp;&nbsp;|&nbsp;&nbsp;Previous&nbsp;&nbsp;";
		else
			$data = $data . '<a href = "' . $link . '1">First</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href = "' . $link . ($selectedPage - 1) . '">Previous</a>&nbsp;&nbsp; ';

		for($i = 1 ; $i <= $nbPage ; $i++)
		{
			if($i != 1)
				$data = $data . " , ";

			if($i == $selectedPage)
				$data = $data . '<strong>' . $i . '</strong> ';
			else
				$data = $data . '<a href="' . $link . $i . '" title="Go to page ' . $i . '">' . $i . '</a>';
		}

		if($selectedPage == $nbPage)
			$data = $data . '&nbsp;&nbsp;Next&nbsp;&nbsp;|&nbsp;&nbsp;Last';
		else
			$data = $data . '&nbsp;&nbsp;<a href="' . $link . ($selectedPage + 1) . '">Next</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="' . $link . $nbPage . '">Last</a>';

		return $data;
	}
	
	

?>