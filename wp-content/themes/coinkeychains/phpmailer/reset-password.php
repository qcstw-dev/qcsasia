<?php 	
/**
 * Template Name: Reset Password
 *
 */

	ini_set('display_errors' , 1);
	
	if (isset($_SESSION['qcs-isconnect']))
	{
	 	header('Location:http://www.qcsasia.com/?page_id=679');
	    exit();
	}

	/////////////////////////////////////////////////////
	
	$submited = $_REQUEST['form-submited'];
	$email = $_REQUEST['email'];
	$key = $_REQUEST['resetkey'];
	
	if($submited == '1')
	{
			$password = $_REQUEST['password'];
			
			$sqlQuery = "UPDATE qcs_members SET password = '" . md5($password)  . "' WHERE email = '" . $email . "' AND resetkey = '" . $key . "'";
			$wpdb->query($sqlQuery);
				
	//		echo $sqlQuery . "<br/>";
		
	}

	/////////////////////////////////////////////////////

// end specifics php code
get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		
		<?php

			if($submited == '1')
			{
				echo '<div class="msg-error"><div>Your password has been changed. Click <a href = "http://www.qcsasia.com/members-area">here</a> to re-login</div></div>';
			}
		?>

 		 <form method="post" action="">
                  
                  <p>
                  	<label for="password-login">Password *</label>
                  	<input type="password" name="password" id = "password" value="" />
                  </p>
                  
                  <p>
                  	<label for="password-login">Confirm password *</label>
                  	<input type="password" name="confirm-password" id = "confirm-password" value="" />
                  </p>
                  
                  <input type="hidden" name="email" value="<?php echo $email; ?>" /> 
                  
                  <input type="hidden" name="key" value="<?php echo $key; ?>" /> 
                  
                  <input type="hidden" name="form-submited" value="1" /> 
                  
                  <p>
                  	<label for="submit">&nbsp;</label><input type="button" value="Reset" class="button" onClick = "var password = document.getElementById(\'password\').value; var confirmPassword = document.getElementById(\'confirmPassword\').value; if(password == '' OR password != confirmPassword) { window.alert('Your password cannot be empty and has to match with the confirmed password.'); return false;} else this.form.submit();"/>
                 </p>
                 
         </form>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>