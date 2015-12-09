<?php

	require_once("sql.inc.php");
	require_once("log.inc.php");
	require_once("utils.inc.php");
	
	function getTabCountry()
	{
																	
		$sqlQuery = "SELECT DISTINCT country FROM qcs_members WHERE status <> '99' ORDER BY country";
	
		$sqlLink = startSQLSession();

		$result = mysql_query($sqlQuery , $sqlLink);
		
		closeSQLSession($sqlLink);

		$tabCountry = array();
	
		while($line = mysql_fetch_array($result))
		{
				$tabCountry[] = utf8_encode($line['country']);
		}
		

		return $tabCountry;
	}

	function getNbMember($rechercheSQL = "")
	{
		$sqlQuery = "SELECT count(id) FROM qcs_members " . $rechercheSQL;
			
		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);
	
		$sqlLink = startSQLSession();
	
		$result = mysql_query($sqlQuery , $sqlLink);
		
		closeSQLSession($sqlLink);
		
		$nbDoc = 0;
	
		if($line = mysql_fetch_array($result))
		{
				$nbDoc = $line[0];
		}
		
		return $nbDoc;
	}
	
	function getTabMember($selectedPage , $rechercheSQL , $nbCompteParPage , $sort)
	{
		
		if(empty($selectedPage))
			$selectedPage = 1;
					
		// Trie par default sur le name
		$orderBy = " ORDER BY id ASC";

		if($sort == "idASC") // ID
			$orderBy = " ORDER BY id ASC";
		else if($sort == "idDESC")
			$orderBy = " ORDER BY id DESC";		
		else if($sort == "companyNameASC") // Company name
			$orderBy = " ORDER BY company_name ASC";
		else if($sort == "companyNameDESC")
			$orderBy = " ORDER BY company_name DESC";
		else if($sort == "typeASC") // Type
			$orderBy = " ORDER BY type ASC";
		else if($sort == "typeDESC")
			$orderBy = " ORDER BY type DESC";
		else if($sort == "countryASC") // Country
			$orderBy = " ORDER BY country ASC";
		else if($sort == "countryDESC")
			$orderBy = " ORDER BY country DESC";
		else if($sort == "country_ipASC") // Country IP
			$orderBy = " ORDER BY country_ip ASC";
		else if($sort == "country_ipDESC")
			$orderBy = " ORDER BY country_ip DESC";
		else if($sort == "emailASC") // Email
			$orderBy = " ORDER BY email ASC";
		else if($sort == "emailDESC")
			$orderBy = " ORDER BY email DESC";
		else if($sort == "statusASC") // Status
			$orderBy = " ORDER BY status ASC";
		else if($sort == "statusDESC")
			$orderBy = " ORDER BY status DESC";
		else
			$orderBy = " ORDER BY id DESC";

																	
		$sqlQuery = "SELECT * FROM qcs_members " . $rechercheSQL . $orderBy;
		
		// echo $sqlQuery . "<br/>";

		if($nbCompteParPage > 0)
			$sqlQuery = $sqlQuery . " LIMIT " . ($selectedPage - 1) * $nbCompteParPage . " , " . $nbCompteParPage;
					
		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);
	
		$sqlLink = startSQLSession();

		$result = mysql_query($sqlQuery , $sqlLink);
		
		closeSQLSession($sqlLink);

		$tabUser = array();
	
		while($line = mysql_fetch_array($result))
		{
				$line['address'] = stripslashes($line['address']);
				$tabUser[] = $line;
				
		}
		
		$_SESSION['sqlQuery'] = $rechercheSQL;
		
		return $tabUser;
	}

	
	function displayListMember($selectedPage , $rechercheSQL , $nbCompteParPage , $action , $idUser , $sort)
	{

		$tabMember = getTabMember($selectedPage , $rechercheSQL , $nbCompteParPage , $sort);
		
		$i = 0;
					
		foreach($tabMember as $member)
		{
			
			if($i % 2 == 0)
				$htmlData = $htmlData . '<tr class="odd">'  . "\n";
			else
				$htmlData = $htmlData . '<tr class="even">'  . "\n";
				
			$htmlData = $htmlData . '<td><input class="checkbox" name = "tabIdMember[]" type = "checkbox" value = "' . $member['id'] . '"/></td>'  . "\n";
			$htmlData = $htmlData . '<td><a target "_BLANK" href = "index.php?page=view-member&idMember=' . $member['id'] . '">'  . $member['id'] . '</a></td>'  . "\n";
			$htmlData = $htmlData . '<td>' . $member['company_name'] . '</td>'  . "\n";
			$htmlData = $htmlData . '<td>' . $member['type'] . '</td>'  . "\n";
			$htmlData = $htmlData . '<td><a href = "mailto:' . $member['email'] . '">' . $member['email'] . '</a></td>'  . "\n";
			$htmlData = $htmlData . '<td>' . $member['country'] . '</td>'  . "\n";
			$htmlData = $htmlData . '<td>' . $member['country_ip'] . '</td>'  . "\n";
			
			$status = $member['status'];
			
			if($status == '0') $status = "Pending";
			if($status == '1') $status = "Email verified";
			if($status == '2') $status = "Member";
			if($status == '99') $status = "Deleted";
			
			$htmlData = $htmlData . '<td>' . $status . '</td>'  . "\n";
			
			if(time() - $member['last_hit'] < 10)
				$htmlData = $htmlData . '<td><img width = "30" height = "30" src = "http://www.qcsasia.com/wp-content/uploads/2014/07/point-vert.jpg" /></td>'  . "\n";
			else
				$htmlData = $htmlData . '<td></td>'  . "\n";
					
				
			$htmlData = $htmlData . '</tr>'  . "\n";
			
			$i++;				
		}
		
		return $htmlData;

	}
	
	function getMemberById($idMember)
	{
															
		$sqlQuery = "SELECT * FROM qcs_members WHERE id = '" . $idMember . "'";
		
	//	echo $sqlQuery . "<br/>";
					
		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);
	
		$sqlLink = startSQLSession();

		$result = mysql_query($sqlQuery , $sqlLink);
		
		closeSQLSession($sqlLink);

		$member = array();
	
		if($line = mysql_fetch_array($result))
		{
				$member = $line;
		}
		
		return $member;
	}
	
	function getIdMemberByEmail($email)
	{
															
		$sqlQuery = "SELECT * FROM qcs_members WHERE email = '" . $email . "'";
		
	//	echo $sqlQuery . "<br/>";
					
		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);
	
		$sqlLink = startSQLSession();

		$result = mysql_query($sqlQuery , $sqlLink);
		
		closeSQLSession($sqlLink);

		$id = "";
	
		if($line = mysql_fetch_array($result))
		{
				$id = $line['id'];
		}
		
		return $id;
	}
	
	function getMemberTypeById($idMember)
	{
			
		$sqlQuery = "SELECT * FROM qcs_members WHERE id = '" . $idMember . "'";
	
		//	echo $sqlQuery . "<br/>";
			
		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);
	
		$sqlLink = startSQLSession();
	
		$result = mysql_query($sqlQuery , $sqlLink);
	
		closeSQLSession($sqlLink);
	
		$type = "";
	
		if($line = mysql_fetch_array($result))
		{
			$type = $line['type'];

		}
	
		return $type;
	}

	
	function deleteMember($id)
	{
		$sqlQuery = "DELETE FROM qcs_members WHERE id = '" . $id . "'";
			
		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);
	
		$sqlLink = startSQLSession();
		
		mysql_query($sqlQuery , $sqlLink);
		
		closeSqlSession($sqlLink);
	}
	
	function updateMember($id , $lastname , $firstname , $companyName , $status , $type , $address , $phone , $email , $email2 , $website , $classification , $linkedin , $comment , $country)
	{
		$sqlQuery = "UPDATE qcs_members SET 
		company_name = '" . $companyName . "' ,
		lastname = '" . $lastname . "' ,
		firstname = '" . $firstname . "' ,
		status = '" . $status . "' ,
		type = '" . $type . "' ,
		address = '" . $address . "' ,
		phone = '" . $phone . "' ,
		email = '" . $email . "' ,
		email2 = '" . $email2 . "' ,
		website = '" . $website . "' ,
		classification = '" . $classification . "' ,
		linkedin = '" . $linkedin . "' ,
		comment = '" . $comment . "' ,
		country = '" . $country . "' 
		WHERE id = '" . $id . "'";
		
		// echo $sqlQuery . "<br/>";
			
		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);
	
		$sqlLink = startSQLSession();
		
		mysql_query($sqlQuery , $sqlLink);
		
		closeSqlSession($sqlLink);
                
                if ($status == 'Member') {
                    $member = getMemberById($id);
                    sendEmailAfterValidation($member);
                }
                
	}
	
        function sendEmailAfterValidation($member) {
            $subject = 'QCS Asia - Registration validated';
            $body = '<div style="font-family: Ubuntu, Helvetica, Arial, sans-serif;">
                            <div style="margin-bottom: 20px;"><img src="http://www.qcsasia.com/wp-content/uploads/2015/10/registration-step-4.jpg" alt="step 4" title="step 4" /></div>
                            <p>Dear Member,</p>
                            <p>Your registration is now validated by our team and you can fully access your member area by logging in <a href="http://www.qcsasia.com/members-area/">here</a></p>
                            <p>In case you didn\'t keep a record of your login details:</p>
                            <p><strong>Your id: </strong>'.$member['email'].'</p>
                            <p>Please devote some time to understand our service offer available only from our member area:</p>
                            <ul>
                            <li><a href="http://www.qcsasia.com/members-area/document-center" ><b>Document download for your marketing:</b></a> High definition pictures, editable pricelists, and digital drawing.</li>
                            <li><a href="http://www.qcsasia.com/sales-program/" ><b>Rush service offer:</b></a> under certain conditions.</li>
                            <li><a href="http://www.qcsasia.com/drop-document/" ><b>Drop document:</b></a> Send oversized documents to us.</li>
                            </ul>

                            <p>Thanks</p>
                            <p>QCS Asia team</p>
                        </div>';
            $nameFrom = 'QCS Asia Website';
            $mailFrom = 'member@qcsasia.com';
            $tabMailTo = [$member['email']];

            envoyerEmail($subject, $body, $nameFrom, $mailFrom, $tabMailTo);
        }
        
	function updateMemberStatus($id , $status)
	{
		$sqlQuery = "UPDATE qcs_members SET status = '" . $status . "' WHERE id = '" . $id . "'";
			
		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);
	
		$sqlLink = startSQLSession();
		
		mysql_query($sqlQuery , $sqlLink);
		
		closeSqlSession($sqlLink);
                
                if ($status == '2') {
                    $member = getMemberById($id);
                    sendEmailAfterValidation($member);
                }
	}
	
	function updateMemberLogo($id , $logo)
	{
		$sqlQuery = "UPDATE qcs_members SET logo = '" . $logo . "' WHERE id = '" . $id . "'";
			
		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);
	
		$sqlLink = startSQLSession();
		
		mysql_query($sqlQuery , $sqlLink);
		
		closeSqlSession($sqlLink);
	}

	function updateUser($id , $login , $password , $lastname , $firstname , $email , $company , $codeEmetteur , $notify , $photo)
	{
		$sqlQuery = "UPDATE users SET login = '" . $login . "' , password = '" . $password . "' , lastname = '" . $lastname . "' , firstname = '" . $firstname . "' , email = '" . $email . "' , company = '" . $company . "' , codeEmetteur = '" . $codeEmetteur . "' , notify = '" . $notify . "' , photo = '" . $photo . "' WHERE id = " . $id;
			
		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);
	
		$sqlLink = startSQLSession();
		
		mysql_query($sqlQuery , $sqlLink);
		
		closeSqlSession($sqlLink);
	}
	

	
?>