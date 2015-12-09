		function doAddAction() 
		{	
			document.formAdminAire.action = "../action/addAire.php";
			document.formAdminAire.submit();
		}
		
		function doUpdateAction() 
		{
			document.formAdminAire.action = "../action/updateAire.php";
			document.formAdminAire.submit();
		}
		
		function doValidationForm()
		{
			var result = true;
			var message = "";		
			var code = document.formAdminAire.code.value;
	
			if(code.length == 0)
			{
				msg = "Veuillez saisir le code de l'aire !"
				alert(msg)
				result = false
			}
				
			return result;
		}