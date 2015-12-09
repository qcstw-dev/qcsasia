		
function doAddAction() 
{	
	document.formAdminPhase.action = "../action/addPhase.php";
	document.formAdminPhase.submit();
}

function doUpdateAction() 
{
	document.formAdminPhase.action = "../action/updatePhase.php";
	document.formAdminPhase.submit();
}

function doValidationForm()
{
	var result = true;
	var msgAlert = "";		
	
	var codeFR = document.formAdminPhase.codeFR.value;
	var labelFR = document.formAdminPhase.labelFR.value;
	
	var codeEN = document.formAdminPhase.codeEN.value;
	var labelEN = document.formAdminPhase.labelEN.value;
	

	if(codeFR.length == 0)
	{
		msgAlert +=  "Veuillez saisir le code de la phase!\n";
		result = false;
	}
	
	if(!isAlphanumeric(codeFR) || codeFR.length == 0)
	{
		msgAlert += "Le code de la phase ne doit contenir que des caractères alphanumériques !\n";
		result = false;
	}
			
	if(!result)
 		alert(msgAlert);
	
	return result;

}