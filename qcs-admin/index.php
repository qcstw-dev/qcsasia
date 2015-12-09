<html>

<?php

	$baseURL = "";
	$titleHTML = "Login";

	require_once("common/header.php");

	$erreur = $_REQUEST['erreur'];
	$loginIncorrect = $_REQUEST['loginIncorrect'];
	$sessionExpiree = $_REQUEST['sessionExpiree'];

?>

<body style = "text-align:center;color:#333;">

<a href = 'http://www.qcsasia.com'><img src="images/logo-qcs.png" alt="" style = "margin-top:25px;border:0px;"></a>

<?php

	if($erreur == '1')
	{
			echo '<p class="error" style = "margin-top:10px;">';
				echo 'Error :<br/><br/>';
						 if($sessionExpiree == '1')
						 {
						 		echo "Your session has expired<br/><br/>";
						 }
						 if($loginIncorrect == '1')
						 {
						 		echo "Login failed<br/><br/>";
						 }
			 echo '</p>';
	}

?>

<div id='contenulogin'>

	<div id='boxlogin'>

		<form name = 'FormLogin' action = 'action/checkLogin.php' method='post'>

			<fieldset style = "margin-bottom:10px;"><legend>Authentification</legend>

			<div class='row'>
				<span class='label'><label>Login :  </label></span>
				<span class='formw'> <input type='text' name='login' id='login_name' size='25' /></span>
			</div>

			<div class='row'>
				<span class='label'><label>Password : </label></span>
				<span class='formw'><input type='password' name='password' id='login_password' size='25' /> </span>
			</div>

			<div class='row'>
				<span class='label'><label>Remind me :</label></span>
				<span class='formw'><input type='checkbox' name='setCookie' style = "border-width:0px;" /> </span>
			</div>

			</fieldset>

			<p>
				<span><input type='reset'  value='Reset' class='button' style = "color :#009966;"/></span>
				<span><input type='submit'  value='Enter' class='button' style = "color :#009966;"/></span>
			</p>

		</form>

	</div>

</div>

</body>

</html>