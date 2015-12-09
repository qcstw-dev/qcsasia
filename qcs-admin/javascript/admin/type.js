		
function doAddAction() 
{	
	document.formAdminType.action = "../action/addType.php";
	document.formAdminType.submit();
}

function doUpdateAction() 
{
	document.formAdminType.action = "../action/updateType.php";
	document.formAdminType.submit();
}

function doValidationForm()
{
	var result = true;
	var msgAlert = "";		
	
	var codeFR = document.formAdminType.codeFR.value;
	var labelFR = document.formAdminType.labelFR.value;
	
	var codeEN = document.formAdminType.codeEN.value;
	var labelEN = document.formAdminType.labelEN.value;
	

	if(codeFR.length == 0)
	{
		msgAlert +=  "Veuillez saisir le code du type!\n";
		result = false;
	}
	
	if(!isAlphanumeric(codeFR) || codeFR.length == 0)
	{
		msgAlert += "Le code du type ne doit contenir que des caractères alphanumériques !\n";
		result = false;
	}
			
	if(!result)
 		alert(msgAlert);
	
	return result;

}