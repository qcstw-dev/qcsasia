<?php 	
/**
 * Template Name: Members Area Login
 * The template for displaying products.
 *
 */

ini_set('display_errors' , 1);

if (isset($_SESSION['qcs-isconnect']))
{
 	header('Location:http://www.qcsasia.com/?page_id=679');
    exit();
}

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
  if (check_login($_POST["email-login"], $_POST["password-login"])) {
   
    $_SESSION['qcs-isconnect'] = true;
    header('Location:http://www.qcsasia.com/?page_id=1828');
    exit();
    //$msg = "<p>You are now connected to the QCS Asia Members Area.</p>";
    
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
      $msg = "<p>You are successfuly registered to QCS Asia Members Area.<br />We sent you an email with your password, you have to click on the link in this email to confirm account creation and access the Members Area, check your mailbox now.<br /></p>";
      
      
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
      $message       =  'You are successfuly registered to QCS Asia Members Area.<br /><br />';
      $message      .=  'Your id: ' . $_POST['email'] . '<br />';
      $message      .=  'Your password: ' . $_POST['password'] . '<br /><br />';
      $message      .=  'To start to access QCS Asia Members Area confirm your email address by clicking on the link below.<br /><br />';
      $message      .=  '<a href="' . get_bloginfo('url') . '/confirm.php?email=' . $_POST['email'] . '">' . get_bloginfo('url') . '/confirm.php?email=' . $_POST['email'] . '</a><br /><br />';
      $message      .= 'If it does not works Copy and Paste this link directly into your browser.<br /></br>';
      $message      .=  'Thanks! Regards.<br /><br />---<br />';
      $message      .=  'Please do not delete this email.';
      
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


$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
$mail->isHTML(true);                                  // Set email format to HTML


$mail->Subject = $subject;
$mail->Body    = $message;

if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}

/////////////////////////////////////////////////////////////////////////////////////////////////
      
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
      
      // Build our subject line fo the email
      $subject       =  'Your subscription to QCS Asia Members Area';
      // And our actual message
      $message       =  'You are successfuly registered to QCS Asia Members Area.<br /><br />';
      $message      .=  'Your id: ' . $_POST['email'] . '<br />';
      $message      .=  'Your password: ' . $_POST['password'] . '<br /><br />';
      $message      .=  'To start to access QCS Asia Members Area confirm your email address by clicking on the link below.<br /><br />';
      $message      .=  '<a href="' . get_bloginfo('url') . '/confirm.php?email=' . $_POST['email'] . '">' . get_bloginfo('url') . '/confirm.php?email=' . $_POST['email'] . '</a><br /><br />';
      $message      .= 'If it does not works Copy and Paste this link directly into your browser.<br /></br>';
      $message      .=  'Thanks! Regards.<br /><br />---<br />';
      $message      .=  'Please do not delete this email.';
      
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

$forms1 = '
              <div id="member-frm" class="left">
                <h3>Already a member?</h3>
                <form method="post" action="'.get_permalink().'" name="login">
                  <p><label for="email-login">Email *</label><input type="text" name="email-login" value="'.$_POST["email-login"].'" /></p>
                  <p><label for="password-login">Password *</label><input type="password" name="password-login" value="" /></p>
                  <input type="hidden" name="action-login" value="login" /> 
                  <p><label for="submit">&nbsp;</label><input type="submit" value="Sign in" class="button" /></p>
                </form>
              </div>
              <div id="not-member-frm" class="right">
                <h3>Don\'t have an account?</h3>
                <form method="post" action="'.get_permalink().'" name="register">
                  <p><label for="firstname">Firstname *</label><input type="text" name="firstname" value="'.$_POST["firstname"].'" maxlength="255" /></p>
                  <p><label for="lastname">Lastname *</label><input type="text" name="lastname" value="'.$_POST["lasname"].'" maxlength="255" /></p>
                  <p><label for="company_name">Company name *</label><input type="text" name="company_name" value="'.$_POST["company_name"] .'" maxlength="255" /></p>
                  <p><label for="company_address">Company address</label><input type="text" name="company_address" value="'.$_POST["company_address"] .'" maxlength="255" /></p>
                  <p><label for="company_phone">Company phone</label><input type="text" name="company_phone" value="'.$_POST["company_phone"] .'" maxlength="255" /></p>
                  <p><label for="company_website">Company website</label><input type="text" name="company_website" value="'.$_POST["company_website"] .'" maxlength="255" /></p>
                  <p><label for="company_type">Company type *</label><select name="company_type"><option name = "supplier" value="'.$_POST["company_type_supplier"] .'">Supplier</option><option name = "distributor" value="'.$_POST["company_type_distributor"] .'">Distributor</option><option name = "other" value="'.$_POST["company_type_other"] .'">Other</option></select></p>
                  <p><label for="email">Email address *</label><input type="text" name="email" value="'.$_POST["email"].'" maxlength="255" /></p>
                  <p><label for="country">Country *</label><input type="text" name="country" value="'.$_POST["country"].'" maxlength="255" /></p>
                  <p><label for="password">Password *</label><input type="password" name="password" value="" maxlength="10" /></p>
                  <p><label for="repassword">Retype Password *</label><input type="password" name="repassword" value="" maxlength="10" /></p>
				  <p><label for="checkbox" style = "width:260px">*By registering on the member area, I understand that I might receive monthly newsletter from QCS Asia</label><br/><br/><br/></p>';                                 
     $forms2 =    '<input type="hidden" name="action-register" value="register" />
                  <p><label for="submit">&nbsp;</label><input type="submit" value="Register" class="button" /></p>
                </form>
              </div>
              <div style = "clear:left"><br/><br/>By registering on our member area, you will get a full access to:<br/><br/>
              <ul style = "list-style-type:circle">
				<li>Our document center (High definition pictures, price lists, certification, logo standard, digital drawing …)</li>
<br/>
<li>Our sales/suppliers program offering great advantages for more flexibility and efficiency of the sales process.</li>
<br/>
<li>An online payment solution (Paypal)</li>
<br/>
<li>An easy to use tool to track your delivery around the world</li>
<br/>
<li>A simple button to drop some over-sized documents.</li></ul><p class="information">Required fields are marked *.</p><br /><br/><center><img src = "http://www.qcsasia.com/colors/images/outline-final.jpg" /></center></div>
              ';

// end specifics php code
get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
		
	
		<?php
	
		
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