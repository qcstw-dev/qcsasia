
	function doValidationForm() 
	{
		var result = true;
		var message = "";	
		var title = document.formLivraison.title.value;
		
		if(title.length == 0)
		{
			msg = "Veuillez saisir le titre de la livraison !"
			alert(msg);
			result = false;
		}

		if(result)
			document.formLivraison.submit();
	}