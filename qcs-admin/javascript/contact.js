
	function doValidationForm() 
	{
		var result = true;
		var message = "";	
		var lastname = document.forms[0].lastname.value;
		var company = document.forms[0].company.value;
		
		if(lastname.length == 0)
		{
			msg = "Veuillez saisir le nom de votre contact !"
			alert(msg);
			result = false;
		}
		
		if(company.length == 0)
		{
			msg = "Veuillez saisir le nom de la société !"
			alert(msg);
			result = false;
		}		
		
		if(result)
			document.forms[0].submit();
	}