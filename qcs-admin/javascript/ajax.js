var objetXHR;

function createXHR() 
{
    var request = false;
    
        try
        {
            request = new ActiveXObject('Msxml2.XMLHTTP');
        }
        catch (err2)
        {
            try
            {
                request = new ActiveXObject('Microsoft.XMLHTTP');
            }
            catch (err3)
            {
				try
				{
					request = new XMLHttpRequest();
				}
				catch (err1) 
				{
					request = false;
				}
            }
        }
    
    return request;
}

function selectionRepertoire(codeTab)
{
	
	objetXHR = createXHR();

	objetXHR.onreadystatechange  = traitementSelectionRepertoire;
	 
	objetXHR.open("GET", "../action/getSelectRepertoire.php?codeTab=" + codeTab ,  true); 
	  
	objetXHR.send(null); 
	
}

function traitementSelectionRepertoire()
{

	if(objetXHR.readyState  == 4)
	{
		if(objetXHR.status  == 200) 
		{	
			var responseText = objetXHR.responseText;
	
			var objetJSON = JSON.parse(responseText);
	
			cs = document.getElementById('selectRepertoire');
			
			// Vide le select
			while(cs.options.length )
			{
				cs.remove(cs.options[0]);
			}
			
			for(i = 0 ; i < objetJSON.tabRepertoire.length ; i++)
			{
				var elementOption = document.createElement('option');
				
				var idRepertoire = objetJSON.tabRepertoire[i].id;
				var labelRepertoire = objetJSON.tabRepertoire[i].label;
				
				var textOption = document.createTextNode(labelRepertoire);
				elementOption.setAttribute('value' , idRepertoire);
				elementOption.appendChild(textOption);
				
				document.getElementById('selectRepertoire').appendChild(elementOption);
				
			}

		}	
		else 
			window.alert("Error code " + objetXHR.status);
	}
         
}