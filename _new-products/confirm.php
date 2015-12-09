<?php
/*
name: confirm.php
date: 2009.02.11
author: Jimmy Roy for Netixy
*/

include_once('_sysinc/tools.php');
include_once('_sysinc/sql.php');

$target = '';

if (isset($_GET["email"])) {
  
  // get data from url
  $email = htmlspecialchars($_GET["email"]);
  
  $sql = new sql();
  $query	= "select email from qcs_members where email = '".$email."'";
  
  // echo "query= " . $query . "<br/>";
  
  $rs = $sql -> dquery($query);	
  $sql -> dclose();
  
  if ($rs[0] > 0) {
  	
 // 	echo "else";
  	
    $target = '/confirm';
    
    $update_data[] = "status = 1";
    
    $cc = implode(',',$update_data);
    
    $sql = new sql();
    $query	= "update qcs_members set ".$cc." where email = '".$email."'";
    $sql -> dchange($query);	
    $sql -> dclose();
   
  }
  else $target = '/unconfirm';
  
}

// redirection
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

header("Location: http://$host$uri$target");
exit;
?>