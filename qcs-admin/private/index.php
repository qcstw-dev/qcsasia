<?php

	require_once("checkSession.php");

	$baseURL = "../";

	require_once("../include/user.inc.php");

	$login = $_SESSION['login']; // login de l'utilisateur courant

	$titleHTML = PROJECT . " - Hello " . $login . " !";

	require_once("../common/header.php");


	$page = $_REQUEST['page']; // vaut 'archivage' ou 'panier'
	$error = $_REQUEST['error'];

	//
	$selectedPage = $_REQUEST['selectedPage'];
	
	$rechercheSQL = $_SESSION['rechercheSQL'];
	
	$sort = $_REQUEST['sort'];
	

?>
	
<body>

	<center>

	<a href = 'http://www.qcsasia.com'><img src="../images/logo-qcs.png" alt="" style = "border:0px;"></a>
	
	<br/><br/>
	
	<br/>
	<a href = '../action/logout.php'>Logout</a>
	<br/><br/>

	<?php

		if(empty($page))
			require_once("member.php"); 
		else if($page == "view-member")
			require_once("view-member.php");
		else if($page == "edit-member")
			require_once("edit-member.php");
			
	?>
	
	</center>
	
</body>

</html>