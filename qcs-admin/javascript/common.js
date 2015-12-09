	
function resetKeywordFormField() {
	
	document.searchByKeywordForm.keyword.value = "";
	document.searchByKeywordForm.partialKeyword.value = "";
	document.searchByKeywordForm.exactKeyword.value = "";	
	document.searchByKeywordForm.debut.value = ""	;
	document.searchByKeywordForm.fin.value = "";
}

function resetCriteriaFormField() {

	document.searchByCriteriaForm.auteur.value = "";    
	document.searchByCriteriaForm.title.value = "";
	document.searchByCriteriaForm.description.value = "";  
	document.searchByCriteriaForm.phase.value = ""; 		
	document.searchByCriteriaForm.typeDocument.value = ""; 		
	document.searchByCriteriaForm.lot.value = ""; 
	document.searchByCriteriaForm.emetteur.value = "";  
	document.searchByCriteriaForm.number.value = ""; 
	document.searchByCriteriaForm.zone.value = ""; 		
	document.searchByCriteriaForm.niveau.value = ""; 			
	
//	document.searchByCriteriaForm.chantier.value = "";  
//	document.searchByCriteriaForm.serialNumber.value = ""; 
//	document.searchByCriteriaForm.suffixe.value = "";	
//	document.searchByCriteriaForm.date.value = ""; 
//	document.searchByCriteriaForm.message.value = "";  
//	document.searchByCriteriaForm.indiceClient.value = "";  
//	document.searchByCriteriaForm.indice.value = "";
//	document.searchByCriteriaForm.indice2.value = "";	
}



	function IsNumeric(strString)
   {
	  //  check for valid numeric strings	
	   var strValidChars = "0123456789";
	   var strChar;
	   var blnResult = true;
	
	   if (strString.length == 0) return true;
	
	   //  test strString consists of valid characters listed above
	   for (i = 0; i < strString.length && blnResult == true; i++)
	      {
	      strChar = strString.charAt(i);
	      if (strValidChars.indexOf(strChar) == -1)
	         {
	         blnResult = false;
	         }
	      }
	   return blnResult;
   }
   
   // NICOLAS
   function isAlphanumeric(label)
	{	
		var invalidChars = "\\/'.,;:`~#$%}{><_";
		
		for(var i = 0 ; i < label.length ; i++)
		{
			var car = label.charAt(i);
			
			if(invalidChars.indexOf(car) != -1)
			{
				return false;
			}

		}
		
		return true;
	}	
	
   // NICOLAS
   function isAlpha(label)
	{	
		var validChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		
		for(var i = 0 ; i < label.length ; i++)
		{
			var car = label.charAt(i);
			
			if(validChars.indexOf(car) == -1)
			{
				return false;
			}

		}
		
		return true;
	}	
	
   // NICOLAS
   function isValidIndice(indice)
	{	
		var lettres = "-abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
		var nombres = "0123456789";
		
		if(indice == '0')
			return true;
			
		var lettre = indice.charAt(0);
		
		if(lettres.indexOf(lettre) == -1)
			return false; //le premiere caractere n'est pas une lettre
			
		if(indice.length == 2) // si il y a 2 caractere
		{
			
			var nombre = indice.charAt(1);
			
			if(nombres.indexOf(nombre) == -1)
				return false; //le deuxieme caractere n'est pas un chiffre
		}	
		
		return true;
	}

   
 
