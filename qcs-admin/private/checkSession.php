<?php

	require_once("../include/log.inc.php");
	
	/* Verifie que le visiteur est un utilisateur authentifie 
	 * A inclure dans tous les .php du repetoire private
	 */

	session_start();

	if(empty($_SESSION['login']) && empty($_COOKIE['login']))
		header("Location:http://projets.atopiq.net/index.php?projet=neptune&erreur=1&sessionExpiree=1");
	
	if(empty($_SESSION['login']))
		$_SESSION['login'] = $_COOKIE['login'];
		
?>