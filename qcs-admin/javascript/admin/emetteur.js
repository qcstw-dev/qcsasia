	function doAddAction() 
	{
		document.formAdminEmetteur.submit();
	}
	
	function doUpdateAction()
	{
		document.formAdminEmetteur.action = "../action/modifierEmetteur.php";
		document.formAdminEmetteur.submit();
	}
	
	function doValidationForm()
	{
		var message = "";
		var result = true;
		var code = document.formAdminEmetteur.code.value;
		var label = document.formAdminEmetteur.label.value;
		
		if(code.length == 0)
		{
			msg = "Veuillez saisir le code de l'emetteur!"
			alert(msg)
			result = false
		}

		if(label.length == 0)
		{
			msg = "Veuillez saisir le libellé de l'emetteur!"
			alert(msg)
			result = false
		}
		
		return result
	}