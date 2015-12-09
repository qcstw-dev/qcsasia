		function doAddAction() 
		{	
			document.formAdminPlanzones.action = "../action/addPlanzones.php";
			document.formAdminPlanzones.submit();
		}
		
		function doUpdateAction() 
		{
			document.formAdminPlanzones.action = "../action/updatePlanzones.php";
			document.formAdminPlanzones.submit();
		}
		
		function doValidationForm()
		{
			var result = true;
			var message = "";		
			var label = document.formAdminPlanzones.label.value;
	
			if(label.length == 0)
			{
				msg = "Veuillez saisir le nom du plan!"
				alert(msg)
				result = false
			}
				
			return result;
		}