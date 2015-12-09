<?php

	require_once("../include/log.inc.php");

	/* Deconnexion de l'utilisateur */

	session_start();
	
	$login = $_SESSION['login'];
	
	$_SESSION['login'] = '';
	
	logMessage("Deconnexion de l'utilisateur " . $login , LOG_LEVEL_NORMAL);
	
	/* On revient vers la page d'identification */	
	header("Location:../index.php");

?>