<?php

	require_once("../private/checkSession.php");

	require_once("../include/member.inc.php");
	require_once("../include/utils.inc.php");
	
	$idMember = $_REQUEST['idMember'];

	$companyName = $_REQUEST['companyName'];
	$firstname = $_REQUEST['firstname'];
	$lastname = $_REQUEST['lastname'];
	
	$type = $_REQUEST['type'];
	$status = $_REQUEST['status'];
	
	$email = $_REQUEST['email'];
	$email2 = $_REQUEST['email2'];
	
	$phone = $_REQUEST['phone'];
	$website = $_REQUEST['website'];
	
	$country = $_REQUEST['country'];
	
	$classification = $_REQUEST['classification'];
	$address = addslashes($_REQUEST['address']);
	$linkedin = $_REQUEST['linkedin'];
	
	$comment = $_REQUEST['comment'];
	
	$logo = $_REQUEST['logo'];
	
	$deleteLogo = $_REQUEST['deleteLogo'];
	
	if(!empty($_FILES['logo']['name']))
	{
		move_uploaded_file($_FILES['logo']['tmp_name'], "../logo/" . $_FILES['logo']['name']);
		updateMemberLogo($idMember , $_FILES['logo']['name']);
	}
	
	if($deleteLogo == '1')
	{
		updateMemberLogo($idMember , "");
	}
	
	updateMember($idMember , $lastname , $firstname , $companyName , $status , $type , $address , $phone , $email , $email2 , $website , $classification , $linkedin , $comment , $country);

	header("Location:../private/index.php?page=view-member&idMember=" . $idMember);		
	
	
	exit();

?>