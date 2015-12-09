		
function doAddAction() 
{	
	document.formAdminLot.action = "../action/addlot.php";
	document.formAdminLot.submit();
}

function doUpdateAction() 
{
	document.formAdminLot.action = "../action/updatelot.php";
	document.formAdminLot.submit();
}

function doValidationForm()
{
	var result = true;
	var msgAlert = "";		
	
	var codeFR = document.formAdminLot.codeFR.value;
	var labelFR = document.formAdminLot.labelFR.value;
	
	var codeEN = document.formAdminLot.codeEN.value;
	var labelEN = document.formAdminLot.labelEN.value;
	

	if(codeFR.length == 0)
	{
		msgAlert +=  "Veuillez saisir le code du lot!\n";
		result = false;
	}
	
	if(!isAlphanumeric(codeFR) || codeFR.length == 0)
	{
		msgAlert += "Le code du lot ne doit contenir que des caractères alphanumériques !\n";
		result = false;
	}
			
	if(!result)
 		alert(msgAlert);
	
	return result;

}