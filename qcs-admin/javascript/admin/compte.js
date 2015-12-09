	function doAddAction() 
	{
		document.formAdminCompte.submit();
	}
	
	function doUpdateAction() 
	{	
		document.formAdminCompte.action = "../action/updateUser.php";
		document.formAdminCompte.submit();
	}
	
	function doValidationForm() 
	{
		var result = true;
		var message = "";	
		var rlogin = document.formAdminCompte.identifiant.value;
		
		if(rlogin.length == 0)
		{
			msg = "Veuillez saisir l'identifiant !\n";
			alert(msg);
			result = false;
		}
		
		return result;
	}