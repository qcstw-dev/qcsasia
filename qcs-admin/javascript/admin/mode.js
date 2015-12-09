function doAddAction() 
{	
	document.formAdminMode.action = "../action/addMode.php";
	document.formAdminMode.submit();
}

function doUpdateAction() 
{
	document.formAdminMode.action = "../action/updateMode.php";
	document.formAdminMode.submit();
}

function doValidationForm()
{
	var result = true;
	var message = "";		
	var labelFR = document.formAdminMode.labelFR.value;

	if(labelFR.length == 0)
	{
		msg = "Veuillez saisir le libellé du mode!"
		alert(msg)
		result = false
	}

	return result;
}