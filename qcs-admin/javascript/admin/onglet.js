	function doAddAction() 
	{
		document.formAdminOnglet.submit();
	}
	
	function doUpdateAction()
	{
		document.formAdminOnglet.action = "../action/modifierOnglet.php";
		document.formAdminOnglet.submit();
	}
	
	function doValidationForm()
	{
		var message = "";
		var result = true;
		
		var code = document.formAdminOnglet.code.value;
		var labelFR = document.formAdminOnglet.labelFR.value;
		
		if(code.length == 0)
		{
			msg = "Veuillez saisir le code de l'onglet!\n";
			alert(msg)
			result = false
		}

		if(labelFR.length == 0)
		{
			msg = "Veuillez saisir le libellé de l'onglet!\n";
			alert(msg)
			result = false
		}
		
		return result
	}