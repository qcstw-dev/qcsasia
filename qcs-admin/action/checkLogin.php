<?php

	require_once("../include/user.inc.php");

	session_start();
	$_SESSION['login'] = '';
	
	$login = $_POST['login'];
	$password = $_REQUEST['password'];
	$setcookie = $_REQUEST['setCookie'];

	$result = checkLoginAndPassword($login , $password);


	if(!empty($result))
	{
		session_start();
		
		logMessage("Identification reussie pour l'utilisateur : " . $login, LOG_LEVEL_NORMAL);

		$_SESSION['login'] = $result;
		
		if($setcookie == 'on')
			setcookie('login' , $_SESSION['login'] , mktime(0,0,0,12,31,2037) , '/');
		else
			setCookie('login' , '' , 0 , '/');
		
		header("Location:../private/index.php");
		
	}
	else
	{
		logMessage("Identification echouee pour l'utilisateur : " . $login, LOG_LEVEL_NORMAL);
		header("Location:../index.php?erreur=1&loginIncorrect=1");		
	}
	
	exit();

?>