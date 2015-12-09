<?php
/*
name: tracking.php
date: 2009.02.11
author: Jimmy Roy for Netixy
*/

include_once('_sysinc/tools.php');
include_once('_sysinc/sql.php');

if (isset($_GET["email"])) {
  
  $email = '';
  $company = '';
  $country = '';
  $version = '';
  $target = '';
  
  // get data from url
  $email = htmlspecialchars($_GET["email"]);
  if (isset($_GET["company"])) $company = htmlspecialchars($_GET["company"]);
  if (isset($_GET["country"])) $country = htmlspecialchars($_GET["country"]);
  if (isset($_GET["version"])) $version = htmlspecialchars($_GET["version"]);
  if (isset($_GET["target"])) $target = htmlspecialchars($_GET["target"]);
  
  // insert in database
  $field_str[]	= "email";
  $data_str[]	= "'".write_to_db($email)."'";
  
  $field_str[]	= "name";
  $data_str[]	= "'".write_to_db($company)."'";
  
  $field_str[]	= "country";
  $data_str[]	= "'".write_to_db($country)."'";
  
  $field_str[]	= "newsletter";
  $data_str[]	= "'".write_to_db($version)."'";   

  $field_str[]	= "date_login";
  $data_str[]	= Date("'Y-m-d H:i:s'");		
  
  $cc		= implode(',',$field_str);
  $dd		= implode(',',$data_str);		
  
  $sql = new sql();
  $query	= "insert into qcs_tracking ($cc) values ($dd)";
  $sql -> dinsert($query);	
  $sql -> dclose();  
  
}

// redirection
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

if ($target != '') header("Location: http://$host$uri/$target");
else header("Location: http://$host$uri/new-products");
exit;
?>