<?php 	
/**
 * Template Name: Members Area Login
 * The template for displaying products.
 *
 */

ini_set('display_errors' , 1);

// LOST PASSWORD
/////////////////////////////////////////////////////

	// require_once('/home/qcsasiac/public_html/_sysinc/database_api.php');

	require_once("phpmailer/class.phpmailer.php");
	
	

	if($_REQUEST['lostPassword'] == '1')
	{
	//	echo "dans if _POST[email] = " . $_GET["email"];
		
		$mail = new PHPmailer();

		$mail->IsSMTP(true);
		$mail->IsHTML(true);
		$mail->Host = "127.0.0.1";
		
		global $wpdb;
		// $sqlQuery = "select * from qcs_members where email = 'veptune@gmail.com'";
		// $tab = $wpdb->get_row($sqlQuery);
		
		$resetKey = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
		
		$sqlQuery = "UPDATE qcs_members SET resetkey = '" . $resetKey  . "' WHERE email = '" . $_GET["email"] . "'";
		$wpdb->query($sqlQuery);
		
		$link = "http://www.qcsasia.com/reset?email=" . $_GET["email"] . "&resetkey=" . $resetKey;
		

		$body = "To reset your password, click on this link <a href = '" . $link . "'>" . $link . "</a>" ;
		$subject = "Reset your password";

		// FROM
		$mail->From = 'member@qcsasia.com';
		$mail->FromName = 'QCS Asia Website';

		// TO
		$mail->AddAddress($_GET['email']);

		// SUJET ET MESSAGE
		$mail->Subject = $subject;
		$mail->Body = $body;

		$mail->SetLanguage("en" , "phpmailer/language/");

		// ENVOIE
		if(!$mail->Send())
			echo $mail->ErrorInfo;

		$mail->SmtpClose();
		
	
		unset($mail);
		
		// header('Location:http://www.qcsasia.com/members-area/?lostPassword=sent');

	}
	
/////////////////////////////////////////////////////


//unset($_SESSION['qcs-isconnect']);
// begin specifics php code
// by Jimmy Roy for Netixy
$msg = "";
$proceed_form = false;

$available_services = '
<ul>
<!--li><a href="'.get_bloginfo('url').'/new-products" title="Price List">Price List</a></li-->
<li><a href="'.get_bloginfo('url').'/members/sales-program" title="Sales Program">Sales Program</a></li>
<li><a href="'.get_bloginfo('url').'/members/payment" title="Online Payment">Online Payment</a></li>
<li><a href="'.get_bloginfo('url').'/members/document-center" title="Document Center">Document Center</a></li>
</ul>';

// Process input from the form
if (isset($_POST["action-login"])) {
  
  $proceed_form = true;
  $proceed = true;
  
  // Keep our form data clean
  $_POST["email-login"] =  stripslashes(trim($_POST["email-login"]));
  $_POST["password-login"] =  stripslashes(trim($_POST["password-login"]));
  
  // test if the password is correct
 if (check_login($_POST["email-login"], $_POST["password-login"]))
 {
    $_SESSION['qcs-isconnect'] = true;
    
    // HISTORY
    //////////////////////////////////////////////////////////////////////////
    
    require_once("qcs-admin/include/member.inc.php");
    require_once("qcs-admin/include/history.inc.php");
    
    $idMember = getIdMemberByEmail($_POST["email-login"]);
    
    addHistory($idMember , "connection");
    
    //////////////////////////////////////////////////////////////////////////
    
    // COOKIE
    $_SESSION['email-login'] = $_POST["email-login"];
    setcookie('loginQCS' , $_POST["email-login"] , mktime(0,0,0,12,31,2037) , '/');
    
    $qcsType = getMemberTypeById($idMember);
    setcookie('qcs-type' , $qcsType , mktime(0,0,0,12,31,2037) , '/');
    
   	header('Location:http://'.$_SERVER['HTTP_HOST'].'/member-area-index/');
    exit();
    
  } else {
    
    $msg = '<div class="msg-error"><div>Identification failed.<br />Please try again.</div></div>';
    $proceed = false;
    
  }
  // if yes set the connected session to true
    
} // end process input from login form

if (isset($_POST["action-register"])) {
  
  $proceed_form = true;
  $proceed = true;
  
  // Keep our form data clean
  $_POST["firstname"] =  stripslashes(trim($_POST["firstname"]));
  $_POST["lastname"] =  stripslashes(trim($_POST["lastname"]));
  $_POST["company_name"] =  stripslashes(trim($_POST["company_name"]));
 $_POST["address"] =  stripslashes(trim($_POST["address"]));
  $_POST["phone"] =  stripslashes(trim($_POST["phone"]));
  $_POST["company_type"] =  stripslashes(trim($_POST["company_type"]));
  $_POST["country"] =  stripslashes(trim($_POST["country"]));
   $_POST["email"] =  stripslashes(trim($_POST["email"]));
  $_POST["password"] =  stripslashes(trim($_POST["password"]));
  $_POST["repassword"] =  stripslashes(trim($_POST["repassword"]));
  
  // Clear any prior errors
  // Do not proceed reasons
  // 1: empty field
  // 2: invalid email
  // 3: passwords are different
  // 4: email already in database
   if( function_exists( 'cptch_check_custom_form' ) && cptch_check_custom_form() !== true ) {    $proceed = false;    $reason = 5;  }
  // test if email is already registered
  if (qcs_email_exists($_POST["email"])) {
    $proceed = false;
    $reason = 4;      
  }

  // Check the name input for problems.
  if ( !is_email($_POST["email"])) { 
    $proceed = false;
    $reason = 2;  
  }

  if (empty($_POST["firstname"])) {
    $proceed = false;
    $reason = 1;
  }
  
if (empty($_POST["lastname"])) {
    $proceed = false;
    $reason = 1;
  }
  
  if (empty($_POST["company_name"])) {
    $proceed = false;
    $reason = 1;
  }

  if (empty($_POST["company_address"])) {
    $proceed = false;
    $reason = 1;
  }

  if (empty($_POST["company_phone"])) {
    $proceed = false;
    $reason = 1;
  }

  if (empty($_POST["company_website"])) {
    $proceed = false;
    $reason = 1;
  }


  if (empty($_POST["country"])) {
    $proceed = false;
    $reason = 1;
  }
  
  if (empty($_POST["password"])) {
    $proceed = false;
    $reason = 1;
  }
  
  if (empty($_POST["repassword"])) {
    $proceed = false;
    $reason = 1;
  }
  
  if ($_POST["password"] != $_POST["repassword"]) {
    $proceed = false;
    $reason = 3;
  }      



  



  // Now we see if we have a problem
  if ($proceed == true) {
      // No problem? Show a welcome message.
      $msg = '<p style="font-size: 20px;">Application form is completed.</p><p style="font-size: 17px;">You will receive shortly an e-mail with a link to click to confirm your e-mail address.</p>';
		
	
      
      $country_ip = getCountryByIP($_SERVER['REMOTE_ADDR']);
      
      $sqlQuery = "INSERT INTO qcs_members (firstname, lastname , company_name, country, email, password, date_creation , address , website , type , country_ip)
                   VALUES (
        '" . addslashes($_POST["firstname"]) . "'
      , '" . addslashes($_POST["lastname"]) . "'
      , '" . addslashes($_POST["company_name"]) . "'
      , '" . addslashes($_POST["country"]) . "'
      , '" . $_POST["email"] . "'
      , '" . encrypt_string($_POST["password"]) . "'
      , '" . date('Y-m-d H:i:s') . "'
      , '" . $_POST["company_address"] . "'
      , '" . $_POST["company_website"] . "'
      , '" . $_POST["company_type"] . "'
      , '" . $country_ip . "'
      )";
      
 //     echo "sqlQuery = " . $sqlQuery;
 
      // insert in database
      $wpdb->query($sqlQuery);
      
/////////////////////////////////////////////////////////////////////////////////////////////////

            // Build our subject line fo the email
      $subject       =  'Your subscription to QCS Asia Members Area';
      
       
      // And our actual message
      $message       =  '<div style="font-family: Ubuntu, Helvetica, Arial, sans-serif;">';
      $message      .=  '<div style="margin-bottom: 20px;"><img src="http://www.qcsasia.com/wp-content/uploads/2015/10/registration-step-2.jpg" alt="step 2" title="step 2" /></div>';
      $message      .=  'Thank you for your application to QCS Asia Member Area.<br /><br />';
      
      $message      .=  'To validate your email address, please click on the link below :<br /><br />';
      $message      .=  '<a href="' . get_bloginfo('url') . '/confirm.php?email=' . $_POST['email'] . '">' . get_bloginfo('url') . '/confirm.php?email=' . $_POST['email'] . '</a><br /><br />';
      $message      .= 'If it does not works Copy and Paste this link directly into your browser.<br/><br/>';
      $message      .=  '<b>Once your email address is confirmed, we will contact you shortly, usually under 24H, to validate your account.</b><br/><br />';
      $message      .=  'Please keep this as a record for your login details :<br/><br/>';
      $message      .=  'Your id: ' . $_POST['email'] . '<br />';
      $message      .=  'Your password: ' . $_POST['password'] . '<br /><br />';
      $message      .=  'Thanks<br/>';
      $message      .=  'QCS Asia Team <br/><br/>';
      $message      .=  '</div>';
      $user       =  $_POST['email'];
      
  require_once("phpmailer/PHPMailerAutoload.php");

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP

$mail->Host = '127.0.0.1';  // Specify main and backup server
$mail->SMTPAuth = false;       
/*                        // Enable SMTP authentication
$mail->Username = 'jswan';                           // SMTP username
$mail->Password = 'secret';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
*/

$mail->From = 'member@qcsasia.com';
$mail->FromName = 'QCS Asia Website';
$mail->addAddress($user);  // Add a recipient
//$mail->AddCC('n.fournaux@netixy.com' , 'aa');

$mail->AddBCC('julien@qcsasia.com');
$mail->AddBCC('member@qcsasia.com');
$mail->AddBCC('maxime@qcsasia.com');


$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->isHTML(true);                                  // Set email format to HTML


$mail->Subject = $subject;
$mail->Body    = $message;

if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

$mail_to_admin = new PHPMailer;

$mail_to_admin->isSMTP();                                      // Set mailer to use SMTP

$mail_to_admin->Host = '127.0.0.1';  // Specify main and backup server
$mail_to_admin->SMTPAuth = false;  

$mail_to_admin->From = 'member@qcsasia.com';
$mail_to_admin->FromName = 'QCS Asia Website';
$mail_to_admin->addAddress('julien@qcsasia.com');  // Add a recipient
$mail_to_admin->addAddress('member@qcsasia.com');  // Add a recipient
$mail_to_admin->addAddress('maxime@qcsasia.com');  // Add a recipient


$mail_to_admin->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail_to_admin->isHTML(true);                                  // Set email format to HTML

$subject_admin = "New member area subscription request received";
$message_admin = '<div style="font-family: Ubuntu, Helvetica, Arial, sans-serif;"><p>New member area subscription request received</p>'
        . "<p><u>Information:</u></p>"
        . "<ul>"
        . "<li>First name: ".$_POST["firstname"]."</li>"
        . "<li>Last name: ".$_POST["lastname"]."</li>"
        . "<li>Company name: ".$_POST["company_name"]."</li>"
        . "<li>Company type: ".$_POST["company_type"]."</li>"
        . "<li>Email address: ".$_POST["email"]."</li>"
        . "<li>Password: ".$_POST["password"]."</li>"
        . "<li>Country: ".$_POST["country"]."</li>"
        . "<li>Address: ".$_POST["company_address"]."</li>"
        . "<li>Phone: ".$_POST["company_phone"]."</li>"
        . "<li>Website: ".$_POST["company_website"]."</li>"
        . "<li>IP address: ".$_SERVER['REMOTE_ADDR']."</li>"
        . "</ul>"
        . "</div>";

$mail_to_admin->Subject = $subject_admin;
$mail_to_admin->Body    = $message_admin;
$mail_to_admin->send();
/////////////////////////////////////////////////////////////////////////////////////////////////

/*start by Aminul*/ 
///////////////////////////////////
/*
      // send email to the member

      $user       =  attribute_escape($_POST['username']) . ' <' . attribute_escape($_POST['email']) . '>';
      $recipient  =  'AA <veptune@gmail.com>';
      
      // Start our email with its headers
      $headers       =  "MIME-Version: 1.0\r\n";
      // Our form has to match the encoding the user is typing it in, i.e., your blog charset
      $headers      .=  'Content-Type: text/html; charset="' . get_option('blog_charset') . "\"\r\n";
      // Our generic mailer-daemon is just going to be WordPress@EXAMPLE.COM, where EXAMPLE.COM is your domain in lowercase
      $sitename      =  strtolower($_SERVER['SERVER_NAME']);
      // If we have the www., let's drop it safely
      if ( substr( $sitename, 0, 4 ) == 'www.' ) {
          $sitename  =  substr( $sitename, 4 );
      }
      // Our from email address
      //$from_email    =  "member@$sitename" ;
      $from_email    =  "member@qcsasia.com" ;
      // Our from email name
      $from_name     =  apply_filters( 'wp_mail_from_name', 'QCS Asia Website' );
      // And we begin the headers
      $headers      .=  "From: $from_name <$from_email>\r\n";
      $headers      .=  "Reply-To: $user\r\n";
      
      $to        =  $user;
      $headers  .=  "Bcc: $recipient\r\n";
      
      // We should include X data for the mailer version
      $headers      .=  'X-Mailer: PHP/' . phpversion() . '\r\n';
     // $headers      .= 'Bcc: info@qcsasia.com , julien@qcsasia.com , monica@qcsasia.com , n.fournaux@netixy.com' . "\r\n";
      
      // Build our subject line for the email
      $subject       =  'Your e-mail is now confirmed.';
      // And our actual message
      $message       =  'We will contact you shortly, usually under 24H, to validate your account.
<br/><br />';

      $message      .= 'Your full access to the member area will be granted after validation from our team. <br /></br>';
      $message      .=  'Thanks! Regards.<br /><br />---<br />';
      $message      .=  'QCS Asia Team.';
      
      // Let's build our email and send it
      mail( $to, $subject, $message, $headers );
      
      /////////////////////////////////////////////////////////////////////////////////////////////////
      
      // info@qcsasia.com , julien@qcsasia.com , monica@qcsasia.com

      */
      // end send email



/*end by Aminul*/
//////////////////////////////////////////////
     
/*
      // send email to the member

      $user       =  attribute_escape($_POST['username']) . ' <' . attribute_escape($_POST['email']) . '>';
      $recipient  =  'AA <veptune@gmail.com>';
      
      // Start our email with its headers
      $headers       =  "MIME-Version: 1.0\r\n";
      // Our form has to match the encoding the user is typing it in, i.e., your blog charset
      $headers      .=  'Content-Type: text/html; charset="' . get_option('blog_charset') . "\"\r\n";
      // Our generic mailer-daemon is just going to be WordPress@EXAMPLE.COM, where EXAMPLE.COM is your domain in lowercase
      $sitename      =  strtolower($_SERVER['SERVER_NAME']);
      // If we have the www., let's drop it safely
      if ( substr( $sitename, 0, 4 ) == 'www.' ) {
          $sitename  =  substr( $sitename, 4 );
      }
      // Our from email address
      //$from_email    =  "member@$sitename" ;
      $from_email    =  "member@qcsasia.com" ;
      // Our from email name
      $from_name     =  apply_filters( 'wp_mail_from_name', 'QCS Asia Website' );
      // And we begin the headers
      $headers      .=  "From: $from_name <$from_email>\r\n";
      $headers      .=  "Reply-To: $user\r\n";
      
      $to        =  $user;
      $headers  .=  "Bcc: $recipient\r\n";
      
      // We should include X data for the mailer version
      $headers      .=  'X-Mailer: PHP/' . phpversion() . '\r\n';
     // $headers      .= 'Bcc: info@qcsasia.com , julien@qcsasia.com , monica@qcsasia.com , n.fournaux@netixy.com' . "\r\n";
      
      // Build our subject line for the email
      $subject       =  'You can now access to your member area';
      // And our actual message
      $message       =  'Dear Member,<br /><br />';
      $message       =  'Your registration is now validated by our team and you can fully access your member area by logging in <a href="http://www.qcsasia.com/members-area/">here</a>.<br /><br />';
      $message       =  'In case you didn’t keep a record of your login details:<br /><br />';
      $message      .=  'Your id: ' . $_POST['email'] . '<br />';
      $message      .=  'Your password: ' . $_POST['password'] . '<br /><br />';
      $message       =  'Please devote some time to understand our service offer available only from our member area:<br /><br />';
      $message       =  '-<a href="http://www.qcsasia.com/document-center/">Documentsdownload for your marketing:</a>High definition pictures, editable pricelists, and digital drawing. <br /><br />';
      $message       =  '-<a href="http://www.qcsasia.com/sales-program/">Rush service offer</a>under certain conditions.<br /><br />';
      $message       =  '-<a href="http://www.qcsasia.com/drop-document/">Drop document:</a>Send oversized documents to us.<br /><br />';
      $message       =  'Hope we can collaborate on several of your projects.<br /><br />';
      $message      .=  'Thanks! Regards.<br /><br />---<br />';
      $message      .=  'QCS Asia Team.';
      
      // Let's build our email and send it
      mail( $to, $subject, $message, $headers );
      
      /////////////////////////////////////////////////////////////////////////////////////////////////
      
      // info@qcsasia.com , julien@qcsasia.com , monica@qcsasia.com

      */
      // end send email
      
      // clean value
      unset($_POST["username"], $_POST["company_name"], $_POST["country"], $_POST["phone"], $_POST["email"], $_POST["password"], $_POST["repassword"]);
  } else {
    // A problem? Give an appropriate response message.  	
    if ($reason == 1) {
      $msg = '<div class="msg-error"><div>Please complete all required fields.</div></div>';
    } else if ($reason == 2) {
      $msg = '<div class="msg-error"><div>You must supply a valid email address.</div></div>';
    } else if ($reason == 3) {
      $msg = '<div class="msg-error"><div>Passwords do not match, please try again.</div></div>';
    } else if ($reason == 4) {
      $msg = '<div class="msg-error"><div>This email address is already registered, please log in.</div></div>';
      // re-init all fields
      $_POST["email-login"] =  $_POST["email"];
      $_POST["username"] =  '';
      $_POST["company_name"] =  '';
      $_POST["email"] =  '';
      $_POST["country"] =  '';      
    } else if ($reason == 5) {      $msg = '<div class="msg-error"><div>Please complete the CAPTCHA.</div></div>';          }
  }  
  

} // end process input from the register form

/*
$users = $wpdb->get_results("SELECT username, email FROM qcs_users");

foreach ( $users as $user ) {

  // Access data using object syntax
  echo $user->username.' - ';
  echo $user->email.'<br>';
}

$wpdb->query("INSERT INTO qcs_users (username, email) VALUES ('justin','jv@foo.com')");

$users = $wpdb->get_results("SELECT username, email FROM qcs_users");

foreach ( $users as $user ) {

  // Access data using object syntax
  echo $user->username.' - ';
  echo $user->email.'<br>';
}
*/

	$selectedSupplier = "";
	$selectedDistributor = "";
	$selectedOther = "";

	if($_POST['company_type'] == 'supplier')
	$selectedSupplier = "selected";
	
	if($_POST['company_type'] == 'distributor')
	$selectedDistributor = "selected";
	
	if($_POST['company_type'] == 'other')
	$selectedOther = "selected";



$forms1 = '
              <div id="member-frm" class="left">
                <button class="login-form-button">LOGIN</button>
                <form method="post" action="'.get_permalink().'" name="login">
                  <p><label for="email-login">Email *</label><input type="text" name="email-login" id = "email-login" value="'.$_POST["email-login"].'" /></p>
                  <p><label for="password-login">Password *</label><input type="password" name="password-login" value="" /></p>
                  <input type="hidden" name="action-login" value="login" /> 
                  <p><label for="submit">&nbsp;</label><input type="submit" value="Sign in" class="button" />&nbsp;&nbsp;<a href = "#" onClick = "var email = document.getElementById(\'email-login\').value; if(email == \'\') { window.alert(\'At least, the email field must be filled\'); return false; } else { location.href = \'http://www.qcsasia.com/members-area/?lostPassword=1&email=\' + email ; return false;}">Lost password ?</a></p>
                </form>
              </div>
              <div id="not-member-frm" class="right">
                <button class="register-form-button2">REGISTER</button>
                <form method="post" action="'.get_permalink().'" name="register">
                  <p><label for="firstname">Firstname *</label><input type="text" name="firstname" value="'.$_POST["firstname"].'" maxlength="255" /></p>
                  <p><label for="lastname">Lastname *</label><input type="text" name="lastname" value="'.$_POST["lastname"].'" maxlength="255" /></p>
                  <p><label for="company_name">Company name *</label><input type="text" name="company_name" value="'.$_POST["company_name"] .'" maxlength="255" /></p>
                  <p><label for="company_address">Company address *</label><input type="text" name="company_address" value="'.$_POST["company_address"] .'" maxlength="255" /></p>
                  <p><label for="company_phone">Company phone *</label><input type="text" name="company_phone" value="'.$_POST["company_phone"] .'" maxlength="255" /></p>
                  <p><label for="company_website">Company website *</label><input type="text" name="company_website" value="'.$_POST["company_website"] .'" maxlength="255" /></p>
                  <p><label for="company_type">Company type *</label><select name="company_type"><option ' . $selectedSupplier . ' value="supplier">Supplier</option><option ' . $selectedDistributor . ' value="distributor">Distributor</option><option ' . $selectedOther . '  value="other">Other</option></select></p>
                  <p><label for="email">Email address *</label><input type="text" name="email" value="'.$_POST["email"].'" maxlength="255" /></p>
                  <p><label for="country">Country *</label><input type="text" name="country" value="'.$_POST["country"].'" maxlength="255" /></p>
                  <p><label for="password">Password *</label><input type="password" name="password" value="" maxlength="10" /></p>
                  <p><label for="repassword">Retype Password *</label><input type="password" name="repassword" value="" maxlength="10" /></p>
				  <p><label for="checkbox" style = "width:260px">*By registering on the member area, I understand that I might receive monthly newsletter from QCS Asia</label><br/><br/><br/></p>';                                 
     $forms2 =    '<input type="hidden" name="action-register" value="register" />
                  <p><label for="submit">&nbsp;</label><input type="submit" value="Register" class="button" /></p>
                </form>
              </div>
              <div style = "clear:left" id = "text-login-member-area"><br/><br/>By registering on our member area, you will get a full access to:<br/><br/>
              <ul style = "list-style-type:circle">
				<li>Our document center (High definition pictures, price lists, certification, logo standard, digital drawing...)</li>
<br/>
<li>Our Rush Service offering great advantages for more flexibility and efficiency of the sales process.</li>
<br/>
<li>An online payment solution (Paypal)</li>
<br/>
<li>An easy to use tool to track your delivery around the world</li>
<br/>
<li>A simple button to drop some over-sized documents.</li></ul><p class="information">Required fields are marked *.</p><br /><br/><center><img src = "http://www.qcsasia.com/colors/images/outline-final.jpg" /></center></div>
              ';

// end specifics php code
get_header(); ?>


<div class="step-boxes" style="position:relative; padding-top:20px;">
	<div class="step-boxes-1" style="float:left;overflow:hidden;height:200px;width:17%;margin-left:4%;margin-right:8%;">
<?php 
if ($proceed == true){
	echo '<div class="step-button-1" style="background-color:#9BBB58;margin-bottom:8px;color:#ffffff;			font-weight:bold; font-family:arial; text-align:center; width:35%; margin-left:auto; margin-right:auto;padding:8px 10px;border:5px solid #ffffff;border-radius: 5px;box-shadow:2px 2px 2px 2px #DCD9D9;">STEP 1</div>';
	echo '<div class="step-box-1" style="border:3px solid #9BBB58;height:120px;"><h2 style="padding:5px;text-align:center;line-height:32px;font-family:arial;">Fill up the application form to register</h2></div>';
}
else {
	echo '<div class="step-button-1" style="background-color:#C0504E;margin-bottom:8px;color:#ffffff;			font-weight:bold; font-family:arial; text-align:center; width:35%; margin-left:auto; margin-right:auto;padding:8px 10px;border:5px solid #ffffff;border-radius: 5px;box-shadow:2px 2px 2px 2px #DCD9D9;">STEP 1</div>';
	echo '<div class="step-box-1" style="border:3px solid #C0504E;height:120px;"><h2 style="padding:5px;text-align:center;line-height:32px;font-family:arial;">Fill up the application form to register</h2></div>';
}
?>
	</div> 
	<img src="http://www.qcsasia.com/wp-content/uploads/2015/05/arrow.gif" alt="" style="position:absolute;left:22%;top:125px; width:5%"/>

<div class="step-boxes-2" style="float:left;overflow:hidden;height:200px;width:17%;margin-right:8%;">
<?php
if ($proceed == true){
	echo '<div class="step-button-2" style="background-color:#C0504E;margin-bottom:8px;color:#ffffff;font-weight:bold;font-family:arial;text-align:center;width:35%;margin-left:auto;margin-right:auto;padding:8px 10px;border:5px solid #ffffff;border-radius: 5px;box-shadow:2px 2px 2px 2px #DCD9D9;">STEP 2</div>';
 	echo '<div class="step-box-2" style="border:3px solid #C0504E;height:120px;"><h2 style="padding:5px;text-align:center;line-height:32px;font-family:arial;">Click the link in the e-mail to confirm your address</h2></div>';
}
else{
	echo '<div class="step-button-2" style="background-color:#9BBB58;margin-bottom:8px;color:#ffffff;font-weight:bold;font-family:arial;text-align:center;width:35%;margin-left:auto;margin-right:auto;padding:8px 10px;border:5px solid #ffffff;border-radius: 5px;box-shadow:2px 2px 2px 2px #DCD9D9;">STEP 2</div>';
	echo '<div class="step-box-2" style="border:3px solid #9BBB58;height:120px;"><h2 style="padding:5px;text-align:center;line-height:32px;font-family:arial;">Click the link in the e-mail to confirm your address</h2></div>';
}
?>
	</div>

	<img src="http://www.qcsasia.com/wp-content/uploads/2015/05/arrow.gif" alt="" style="position:absolute;left:47%;top:125px; width:5%"/>

	<div class="step-boxes-3" style="float:left;overflow:hidden;height:200px;width:17%;margin-right:8%;">

<?php 
if ($subject   ==  'Your e-mail is now confirmed.'){
	echo '<div class="step-button-3" style="background-color:#C0504E;margin-bottom:8px;color:#ffffff;font-weight:bold;font-family:arial;text-align:center;width:35%;margin-left:auto;margin-right:auto;padding:8px 10px;border:5px solid #ffffff;border-radius: 5px;box-shadow:2px 2px 2px 2px #DCD9D9;">STEP 3</div>';
	echo '<div class="step-box-3" style="border:3px solid #C0504E;height:120px;"><h2 style="padding:5px;text-align:center;line-height:32px;font-family:arial;">We contact you within 24 hours to validate your registration</h2></div>';
}
else {
	echo '<div class="step-button-3" style="background-color:#9BBB58;margin-bottom:8px;color:#ffffff;font-weight:bold;font-family:arial;text-align:center;width:35%;margin-left:auto;margin-right:auto;padding:8px 10px;border:5px solid #ffffff;border-radius: 5px;box-shadow:2px 2px 2px 2px #DCD9D9;">STEP 3</div>';
	echo '<div class="step-box-3" style="border:3px solid #9BBB58;height:120px;"><h2 style="padding:5px;text-align:center;line-height:32px;font-family:arial;">We contact you within 24 hours to validate your registration</h2></div>';
}
?>		
		
	</div>
	<img src="http://www.qcsasia.com/wp-content/uploads/2015/05/arrow.gif" alt="" style="position:absolute;left:72%;top:125px; width:5%"/>
	<div class="step-boxes-4" style="overflow:hidden;height:200px;width:17%;margin-right:4%;">

<?php 
if ($subject  ==  'You can now access to your member area'){
	echo '<div class="step-button-4" style="background-color:#C0504E;margin-bottom:8px;color:#ffffff;font-weight:bold;font-family:arial;text-align:center;width:35%;margin-left:auto;margin-right:auto;padding:8px 10px;border:5px solid #ffffff;border-radius: 5px;box-shadow:2px 2px 2px 2px #DCD9D9;">STEP 4</div>';
	echo '<div class="step-box-4" style="border:3px solid #C0504E;height:120px;"><h2 style="padding:5px;text-align:center;line-height:32px;font-family:arial;">You can now access to your member area</h2></div>';
}
else {
	echo '<div class="step-button-4" style="background-color:#9BBB58;margin-bottom:8px;color:#ffffff;font-weight:bold;font-family:arial;text-align:center;width:35%;margin-left:auto;margin-right:auto;padding:8px 10px;border:5px solid #ffffff;border-radius: 5px;box-shadow:2px 2px 2px 2px #DCD9D9;">STEP 4</div>';
	echo '<div class="step-box-4" style="border:3px solid #9BBB58;height:120px;"><h2 style="padding:5px;text-align:center;line-height:32px;font-family:arial;">You can now access to your member area</h2></div>';
}
?>
		
		
	</div>
</div>




	<div id="primary" class="site-content">
		<div id="content" role="main">
		
	
		<?php
		
			if($_REQUEST['lostPassword'] == '1')
			{
				echo "<span style = 'font-weight:bold;color:red;'>An email has been sent to your mail box with a link to reset your password.<br/></span>";
			}
	
		
              if ($proceed_form) 
              { // show message if we process a form
           
                if ($proceed == true) 
                {
                  //
                  
                  echo $msg;
                  
                  if (isset($_POST["action-login"]))  
                  {
                    //echo $available_services;
       
                  }
                  
                }
                else 
                {
                  echo $msg;
                  echo $forms1; 
                                   
                  if( function_exists( 'cptch_display_captcha_custom' ) )                   
                  {                  	
                  	echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />";                   	
                  	echo "<p><label>Antispam : </label>" . cptch_display_captcha_custom() . "</label>" ;                  
                  }                   
                  
                  echo $forms2;
                  
                }
                
              }
              else 
              {

                if (isset($_SESSION['qcs-isconnect']))
                {
                 //  echo $available_services;
                }
                 else 
                 {
                  echo $forms1;      
                              
                  if( function_exists( 'cptch_display_captcha_custom' ) )                   
                  {                  	
                  	echo "<input type='hidden' name='cntctfrm_contact_action' value='true' />";                   	
                  	echo "<p><label>Antispam : </label>" . cptch_display_captcha_custom() . "</label>" ;                  
                  }                                     
                  
                  echo $forms2;
                 }
                  
              }
              ?>
 

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_sidebar(); ?>
<?php get_footer(); ?>