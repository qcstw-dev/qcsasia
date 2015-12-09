<?php

	require_once("../private/checkSession.php");

	require_once("../include/member.inc.php");
	
	$idMember = $_REQUEST['idMember'];

	deleteMember($idMember);

	header("Location:../private/index.php");		
	
	exit();

?>