<?php

	//LOCAL
	
	define(HOST , "127.0.0.1");
	define(DATABASE , "qcsasiac_qcsasia");
	define(USER , "qcsasiac_qcsasia");
	define(PASSWORD , "E}5,NsiGCsxc");
	define(MAILSERVER , "127.0.0.1");

	//Mettre des '' au lieu des "" pour eviter que \n ne soit interprete
	
	define(AFFAIRE_DIRECTORY , '/home/qcsasiac/public_html/');
	
	define(BASE_URL , "http://www.qcsasia.com/");

	
	define(PROJECT , "QCS");
	define(VERSION , "0.1");
	define(PREFIX_AFFAIRE , "QCS");

	// Niveau de log selectionne
	define(LOG_LEVEL_SELECTED , 1);

	define(LOG_LEVEL_DEBUG , 1);
	define(LOG_LEVEL_NORMAL , 2);
	define(LOG_LEVEL_ERROR , 3);

	date_default_timezone_set('Europe/Paris');
?>