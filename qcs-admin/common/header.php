<html>
	<head>
		<Title>
			<?php echo $titleHTML; ?>
		</title>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

		<link rel="stylesheet" href="<?php echo $baseURL ?>css/common2.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="<?php echo $baseURL ?>css/help.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="<?php echo $baseURL ?>css/list.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="<?php echo $baseURL ?>css/tab.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="<?php echo $baseURL ?>css/impression.css" type="text/css" media="all"/>
		<link rel="stylesheet" href="<?php echo $baseURL ?>css/nav.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo $baseURL ?>css/login.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo $baseURL ?>css/recherche.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo $baseURL ?>css/calendar-blue.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo $baseURL ?>css/photo.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo $baseURL ?>css/statistics.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo $baseURL ?>css/profil.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo $baseURL ?>css/contact.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo $baseURL ?>css/menu.css" type="text/css"/>
		<link rel="stylesheet" href="<?php echo $baseURL ?>css/slimbox.css" type="text/css"/>

		<script language="javascript" src="<?php echo $baseURL ?>javascript/common.js"></script>
		<script language="javascript" src="<?php echo $baseURL ?>javascript/dateUtil.js"></script>
		<script language="javascript" src="<?php echo $baseURL ?>javascript/help.js"></script>
		<script language="javascript" src="<?php echo $baseURL ?>javascript/leftframe.js"></script>
		
		<script language="javascript" src="<?php echo $baseURL ?>javascript/json.js"></script>
		<script language="javascript" src="<?php echo $baseURL ?>javascript/ajax.js"></script>
		
		<script language="javascript" src="<?php echo $baseURL ?>javascript/slimbox.js"></script>
		<script language="javascript" src="<?php echo $baseURL ?>javascript/mootools.js"></script>

		
		<!-- JQUERY -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
		
		<link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet" />


		<script type="text/javascript">
		
			$(function(){

				//hover states on the static widgets
				$('.ui-button').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				
			});
			
		</script>

	</head>