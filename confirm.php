<?php
/*
name: confirm.php
date: 2009.02.11
author: Jimmy Roy for Netixy
*/

include_once('_sysinc/tools.php');
include_once('_sysinc/sql.php');
require_once("phpmailer/PHPMailerAutoload.php");
$target = '';

if (isset($_GET["email"])) {
  
  // get data from url
  $email = htmlspecialchars($_GET["email"]);
  
  $sql = new sql();
  $query = "select email from qcs_members where email = '".$email."'";
  
  // echo "query= " . $query . "<br/>";
  
  $rs = $sql -> dquery($query);	
  $sql -> dclose();
  
  if ($rs[0] > 0) {
  	
 // 	echo "else";
  	
    $target = '/confirmation';
    
    $update_data[] = "status = 1";
    
    $cc = implode(',',$update_data);
    
    $sql = new sql();
    $query = "update qcs_members set ".$cc." where email = '".$email."'";
    $sql -> dchange($query);	
    $sql -> dclose();
   
    $mail = new PHPMailer;

    $mail->isSMTP(); // Set mailer to use SMTP

    $mail->Host = '127.0.0.1';  // Specify main and backup server
    $mail->SMTPAuth = false;  

    $mail->From = 'member@qcsasia.com';
    $mail->FromName = 'QCS Asia Website';
    $mail->addAddress($email);  // Add a recipient


    $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
    $mail->isHTML(true);                                  // Set email format to HTML
    
    $subj = 'QCS Asia - Your e-mail is confirmed';
    $mess = '<div style="font-family: Ubuntu, Helvetica, Arial, sans-serif;">
             <div style="margin-bottom: 20px;"><img src="http://www.qcsasia.com/wp-content/uploads/2015/10/registration-step-3.jpg" alt="step 3" title="step 3" /></div>
                <p>Your e-mail is now confirmed.</p>
                <p>We will contact you shortly, usually under 24H, to validate your account.</p>
                <p><strong>Your full access to the member area will be granted after validation from our team</strong></p>
                <p>Thanks</p>
                <p>QCS Asia team</p>
            </div>';

    $mail->Subject = $subj;
    $mail->Body    = $mess;
    $mail->send();
  }
  else $target = '/unconfirm';
  
}

// redirection
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

header("Location: http://$host$uri$target");
exit;
?>