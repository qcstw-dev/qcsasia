<?php

	require_once("../include/member.inc.php");
	require_once("../include/history.inc.php");
	
	$link = $_REQUEST['link'];
	
	session_start();
	
	// echo "email login = " . $_SESSION['email-login'];
	
	$idMember = getIdMemberByEmail($_SESSION['email-login']);
	
	// echo "idMember = " . $idMember;
	
	addHistory($idMember , "download" , $link);
    
    $link = utf8_decode($link);
    
    $filename = getNameFromFile($link);


    header("content-type: application/octet-stream");
 	header('Content-Disposition: attachment; filename="' .  $filename . '"');
	header("Content-Length: ". filesize($link));
	header("Pragma: no-cache");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0, public");
	header("Expires: 0");
	readfile($link);
	
	function getNameFromFile($file)
	{
		$tab = explode("/" , $file);
			
		$name =  str_replace("%20" , " " , $tab[count($tab) - 1]);
			
		$name =  str_replace("?m=" , " " , $name);
	
		return $name;
	}
	
?>