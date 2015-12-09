		
function doAddAction() 
{	
	document.formAdminNiveau.action = "../action/addNiveau.php";
	document.formAdminNiveau.submit();
}

function doUpdateAction() 
{
	document.formAdminNiveau.action = "../action/updateNiveau.php";
	document.formAdminNiveau.submit();
}

function doValidationForm()
{
	var result = true;
	var msgAlert = "";		
	
	var codeFR = document.formAdminNiveau.codeFR.value;
	var labelFR = document.formAdminNiveau.labelFR.value;
	
	var codeEN = document.formAdminNiveau.codeEN.value;
	var labelEN = document.formAdminNiveau.labelEN.value;
	

	if(codeFR.length == 0)
	{
		msgAlert +=  "Veuillez saisir le code du niveau!\n";
		result = false;
	}
	
	if(!isAlphanumeric(codeFR) || codeFR.length == 0)
	{
		msgAlert += "Le code du niveau ne doit contenir que des caractères alphanumériques !\n";
		result = false;
	}
			
	if(!result)
 		alert(msgAlert);
	
	return result;

}