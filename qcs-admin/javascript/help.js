function displayHelp(id)
{

	if(document.getElementById('helpDocument'))
	{
		document.getElementById('helpDocument').className = "help";
		document.getElementById('helpAdmin').className = "help";
		document.getElementById('helpRecherche').className = "help";
		document.getElementById('helpSupport').className = "help";
		document.getElementById('helpContact').className = "help";
		document.getElementById('helpDocTmp').className = "help";
		document.getElementById('helpPhotos').className = "help";
	}
	
	if(document.getElementById) 
	{
		var el = document.getElementById(id);
		el.className = "helpActive";

	}
	
}


