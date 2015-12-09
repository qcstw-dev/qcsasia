<?php

	require_once("sql.inc.php");
	require_once("log.inc.php");
	
	function getMD5($username , $password)
	{
		$sqlQuery = "SELECT * FROM qcs_users WHERE username = '" . $username . "'";
		
	//	echo $sqlQuery . "<br/>";

		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);

		$sqlLink = startSQLSession();

		$result = mysql_query($sqlQuery , $sqlLink);

		closeSQLSession($sqlLink);

		$login = '';

		if(mysql_num_rows($result) == 1)
		{
			$line = mysql_fetch_assoc($result);
			
			$date = substr($line['date_creation'], 0, 10);
			
		//	echo "date = " . $date . "<br/>";
			
			$password =  md5(md5($password)  . $date);
		}

		return $password;
	}
	
	// Authenfitie un utilisateur
	function checkLoginAndPassword($username , $password)
	{
		
	//	echo "password = " . $password . "<br/>";
		$password = getMD5($username , $password);
	//	echo "password MD5 = " . $password . "<br/>";
		
		$sqlQuery = "SELECT username FROM qcs_users WHERE username = '" . $username . "' AND password = '" . $password . "'";

		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);

		$sqlLink = startSQLSession();

		$result = mysql_query($sqlQuery , $sqlLink);

		closeSQLSession($sqlLink);

		$login = '';

		if(mysql_num_rows($result) == 1)
		{
			$line = mysql_fetch_assoc($result);
			$login = $line['username'];
		}

		return $login;
	}
	
	/*
	
	// Retourne la liste des comptes utilisateur
	function getTabUser($selectedPage , $rechercheSQL , $nbCompteParPage , $sort)
	{
		
		if(empty($selectedPage))
			$selectedPage = 1;
					
		// Trie par default sur le login
		$orderBy = " ORDER BY login ASC";

		if($sort == "loginASC") // Login
			$orderBy = " ORDER BY login ASC";
		else if($sort == "loginDESC")
			$orderBy = " ORDER BY login DESC";	
		else if($sort == "passwordASC") // Password
			$orderBy = " ORDER BY password ASC";
		else if($sort == "passwordDESC")
			$orderBy = " ORDER BY password DESC";
		else if($sort == "lastnameASC") // Lastname
			$orderBy = " ORDER BY lastname ASC";
		else if($sort == "lastnameDESC")
			$orderBy = " ORDER BY lastname DESC";
		else if($sort == "firstnameASC") // Firstname
			$orderBy = " ORDER BY firstname ASC";
		else if($sort == "firstnameDESC")
			$orderBy = " ORDER BY firstname DESC";
		else if($sort == "emailASC") // Email
			$orderBy = " ORDER BY email ASC";
		else if($sort == "emailDESC")
			$orderBy = " ORDER BY email DESC";
		else if($sort == "companyASC") // Entreprise
			$orderBy = " ORDER BY company ASC";
		else if($sort == "companyDESC")
			$orderBy = " ORDER BY company DESC";
		else if($sort == "codeEmetteurASC") // Code emetteur
			$orderBy = " ORDER BY codeEmetteur ASC";
		else if($sort == "codeEmetteurDESC")
			$orderBy = " ORDER BY codeEmetteur DESC";
		else if($sort == "notifyASC") // Code emetteur
			$orderBy = " ORDER BY notify ASC";
		else if($sort == "notifyDESC")
			$orderBy = " ORDER BY notify DESC";
		else if($sort == "photoASC") // Photo
			$orderBy = " ORDER BY photo ASC";
		else if($sort == "photoDESC")
			$orderBy = " ORDER BY photo DESC";
		else if($sort == "fullnameASC") // Fullname
			$orderBy = " ORDER BY fullname ASC";
		else if($sort == "fullnameDESC")
			$orderBy = " ORDER BY fullname DESC";
																	
		$sqlQuery = "SELECT id , login , password , lastname , fullname , firstname , codeEmetteur , email , company , notify , photo FROM users " . $rechercheSQL . $orderBy;

		if($nbCompteParPage > 0)
			$sqlQuery = $sqlQuery . " LIMIT " . ($selectedPage - 1) * $nbCompteParPage . " , " . $nbCompteParPage;
					
		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);
	
		$sqlLink = startSQLSession();

		$result = mysql_query($sqlQuery , $sqlLink);
		
		closeSQLSession($sqlLink);

		$tabUser = array();
	
		while($line = mysql_fetch_array($result))
		{
				$tabUser[] = $line;
		}
		
		return $tabUser;
	}

	
	// Affiche la liste des comptes utiliateurs (partie administration)
	function displayListCompteAdmin($selectedPage , $rechercheSQL , $nbCompteParPage , $action , $idUser , $sort)
	{

		$tabUser = getTabUser($selectedPage , $rechercheSQL , $nbCompteParPage , $sort);
				
		if($action == 'ajout')
		{
			$htmlData = $htmlData . '		<tr class="even">'  . "\n";
			$htmlData = $htmlData . '						<td><input type="text" name="identifiant" value=""></td>'  . "\n";
			$htmlData = $htmlData . '						<td><input type="text" name="password" value=""></td>'  . "\n";
			$htmlData = $htmlData . '						<td><input type="text" name="lastname" value=""></td>'  . "\n";
			$htmlData = $htmlData . '						<td><input type="text" name="firstname" value=""></td>'  . "\n";
			$htmlData = $htmlData . '						<td><input type="text" name="email" value=""></td>'  . "\n";
			$htmlData = $htmlData . '						<td><input type="text" name="company" value=""></td>'  . "\n";
			$htmlData = $htmlData . '						<td>' . getSelectCodeEmetteur() . '</td>'  . "\n";	 	
			$htmlData = $htmlData . '						<td><input type="checkbox" name="notify" value="1"/></td>'  . "\n";
			$htmlData = $htmlData . '						<td><input type="checkbox" name="photo" value="1"/></td>'  . "\n";
			$htmlData = $htmlData . '						<td><a href = "#" onclick="if(doValidationForm()) doAddAction()">Valider</a><br/><a href="index.php?page=adminCompte">Annuler</a></td>'  . "\n";	 	
			$htmlData = $htmlData . '</tr">'  . "\n";	
		}
						
		$i = 0;
					
		foreach($tabUser as $user)
		{
			
			if($i % 2 == 0)
				$htmlData = $htmlData . '<tr class="odd">'  . "\n";
			else
				$htmlData = $htmlData . '<tr class="even">'  . "\n";
				
				if($idUser == $user['id']) //modification
				{
					$htmlData = $htmlData . '<td><input type="text" name="identifiant" value="' . $user['login'] . '"></td>'  . "\n";
					$htmlData = $htmlData . '<td><input type="text" name="password" value="' . $user['password'] . '"></td>'  . "\n";
					$htmlData = $htmlData . '<td><input type="text" name="lastname" value="' . $user['lastname'] . '"></td>'  . "\n";
					$htmlData = $htmlData . '<td><input type="text" name="firstname" value="' . $user['firstname'] . '"></td>'  . "\n";
					$htmlData = $htmlData . '<td><input type="text" name="email" value="' . $user['email'] . '"></td>'  . "\n";
					$htmlData = $htmlData . '<td><input type="text" name="company" value="' . $user['company'] . '"></td>'  . "\n";
					$htmlData = $htmlData . '<td>' . getSelectCodeEmetteur($user['codeEmetteur']) . '</td>'  . "\n";
					
					if($user['notify'] == '1')
						$htmlData = $htmlData . '<td><input type = "checkbox" name="notify" checked value = "1"></td>'  . "\n";
					else
						$htmlData = $htmlData . '<td><input type = "checkbox" name="notify" value = "1"></td>'  . "\n";
						
					if($user['photo'] == '1')
						$htmlData = $htmlData . '<td><input type = "checkbox" name="photo" checked value = "1"></td>'  . "\n";
					else
						$htmlData = $htmlData . '<td><input type = "checkbox" name="photo" value = "1"></td>'  . "\n";
					
					$htmlData = $htmlData . '<td><input type="hidden" name="idUser" value="' . $user['id'] . '"><a href="#" onclick="if(doValidationForm()) doUpdateAction()">Valider</a><br/><a href="index.php?page=adminCompte">Annuler</a></td>'  . "\n";
				}
				else
				{
					$htmlData = $htmlData . '<td> <a href="index.php?page=adminCompte&selectedPage=' . $selectedPage . '&action=modification&id=' . $user['id'] . '">' . $user['login'] . '</a></td>'  . "\n";
					$htmlData = $htmlData . '<td>' . $user['password'] . '</td>'  . "\n";
					$htmlData = $htmlData . '<td>' . $user['lastname'] . '</td>'  . "\n";
					$htmlData = $htmlData . '<td>' . $user['firstname'] . '</td>'  . "\n";
					$htmlData = $htmlData . '<td><a href ="mailto:' . $user['email'] . '">' . $user['email'] . '</a></td>'  . "\n";
					$htmlData = $htmlData . '<td>' . $user['company'] . '</td>'  . "\n";
					$htmlData = $htmlData . '<td>' . $user['codeEmetteur'] . '</td>'  . "\n";
					
					if($user['notify'] == '1')
						$htmlData = $htmlData . '<td>Oui</td>'  . "\n";
					else
						$htmlData = $htmlData . '<td>Non</td>'  . "\n";
						
					if($user['photo'] == '1')
						$htmlData = $htmlData . '<td>Oui</td>'  . "\n";
					else
						$htmlData = $htmlData . '<td>Non</td>'  . "\n";
					
					$htmlData = $htmlData . '<td><a href="javascript: if (confirm(\'Etes-vous sûr de vouloir supprimer ce compte utilisateur ?\')) window.location=\'../action/supprimerCompte.php?id=' . $user['id'] . '\'; ">Supprimer</a></td>'  . "\n";
				}
			
			$htmlData = $htmlData . '</tr>'  . "\n";
			
			$i++;				
		}
		
		return $htmlData;

	}

	// Ajoute un compte utilisateur (partie administration)
	function addUser($login , $password , $lastname , $firstname , $email , $company , $codeEmetteur , $notify , $photo)
	{

		$fullname = $firstname . " " . $lastname;

		$sqlQuery = "INSERT INTO users (login , password , lastname , firstname , email , company , codeEmetteur , fullname , notify , photo) VALUES('"
					. $login
					. "' , '"
					. $password
					. "' , '"
					. $lastname
					. "' , '"
					. $firstname
					. "' , '"
					. $email
					. "' , '"
					. $company
					. "' , '"
					. $codeEmetteur
					. "' , '"
					. $fullname
					. "' , '"
					. $notify
					. "' , '"
					. $photo
					. "'"
					. ")";
			
		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);
	
		$sqlLink = startSQLSession();
		
		mysql_query($sqlQuery , $sqlLink);
		
		closeSqlSession($sqlLink);
	}
	
	// Supprime un compte utilisateur (partie administration)
	function deleteUser($id)
	{
		$sqlQuery = "DELETE FROM users WHERE id = '" . $id . "'";
			
		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);
	
		$sqlLink = startSQLSession();
		
		mysql_query($sqlQuery , $sqlLink);
		
		closeSqlSession($sqlLink);
	}
	
	// Modifie un compte utilisateur (partie administration)
	function updateUser($id , $login , $password , $lastname , $firstname , $email , $company , $codeEmetteur , $notify , $photo)
	{
		$sqlQuery = "UPDATE users SET login = '" . $login . "' , password = '" . $password . "' , lastname = '" . $lastname . "' , firstname = '" . $firstname . "' , email = '" . $email . "' , company = '" . $company . "' , codeEmetteur = '" . $codeEmetteur . "' , notify = '" . $notify . "' , photo = '" . $photo . "' WHERE id = " . $id;
			
		logMessage(__FUNCTION__ . " - " . $sqlQuery , LOG_LEVEL_DEBUG);
	
		$sqlLink = startSQLSession();
		
		mysql_query($sqlQuery , $sqlLink);
		
		closeSqlSession($sqlLink);
	}
	
	*/
	
?>