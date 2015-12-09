		
function doAddAction() 
{	
	document.formAdminZone.action = "../action/addZone.php";
	document.formAdminZone.submit();
}

function doUpdateAction() 
{
	document.formAdminZone.action = "../action/updateZone.php";
	document.formAdminZone.submit();
}

function doValidationForm()
{
	var result = true;
	var msgAlert = "";		
	
	var codeFR = document.formAdminZone.codeFR.value;
	var labelFR = document.formAdminZone.labelFR.value;
	
	var codeEN = document.formAdminZone.codeEN.value;
	var labelEN = document.formAdminZone.labelEN.value;
	

	if(codeFR.length == 0)
	{
		msgAlert +=  "Veuillez saisir le code de la zone!\n";
		result = false;
	}
	
	if(!isAlphanumeric(codeFR) || codeFR.length == 0)
	{
		msgAlert += "Le code de la zone ne doit contenir que des caractères alphanumériques !\n";
		result = false;
	}
			
	if(!result)
 		alert(msgAlert);
	
	return result;

}