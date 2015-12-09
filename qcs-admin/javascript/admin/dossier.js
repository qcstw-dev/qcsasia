		function doAddAction() 
		{	
			document.formAdminDossier.action = "../action/ajouterDossierAdmin.php";
			document.formAdminDossier.submit();
		}
		
		function doUpdateAction() 
		{
			document.formAdminDossier.action = "../action/modifierDossier.php";
			document.formAdminDossier.submit();
		}
		
		function doValidationForm()
		{
			var result = true;
			var message = "";		
			var label = document.formAdminDossier.label.value;
			
			if(!isAlphanumeric(label) || label.length == 0)
			{
				msg = "Le nom du dossier ne doit contenir que des caractères alphanumériques !";
				alert(msg);
				result = false;
			}

			return result;
		}