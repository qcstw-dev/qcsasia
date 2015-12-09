<?php
// TOOLS
// 2007 11 21
// JIMMY ROY

// STRINGS FUNCTIONS

function addslashes2($string) {
	$str=ereg_replace("([^\xA1-\xFE])[\x5c]","\\1\\\\",$string);
	//$str=ereg_replace("'", "\\'", $str);
	//$str=ereg_replace("\"", "\\\"", $str);
	//$str = htmlentities($str, ENT_QUOTES);
	return $str;
}

function unhtmlentities ($string) {
   $trans_tbl =get_html_translation_table (HTML_ENTITIES );
   $trans_tbl =array_flip ($trans_tbl );
   return strtr ($string ,$trans_tbl );
}

function read_from_db($value) {
	$str = stripslashes(htmlspecialchars($value));
	$str = (! get_magic_quotes_gpc ()) ? addslashes($str) : $str;
	return $str;
}

function write_to_db($value) {
	$str =  unhtmlentities(addslashes(trim($value)));
	$str = (! get_magic_quotes_gpc ()) ? addslashes($str) : $str;
	return trim($str);	
}

function filter($in) {
	$search = array ('@[éèêëÊË]@i','@[àâäÂÄ]@i','@[îïÎÏ]@i','@[ûùüÛÜ]@i','@[ôöÔÖ]@i','@[ç]@i','@[ ]@i','@[^a-zA-Z0-9_]@');
	$replace = array ('e','a','i','u','o','c','_','');
	return preg_replace($search, $replace, $in);
}

// function which replace accent in a string
function noAccent($_string) { 
	return ( strtr( $_string, 
	"ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ", 
	"AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn" ) ); 
}   

// 
function is_valid_text($_text, $_maxlenght=-1, $_obligatory=FALSE) {
	if (is_null($_text)) { return FALSE;exit; }
	if ($_text == '') { return FALSE;exit; }
	
	return TRUE;
}

//
function check_not_empty($s, $include_whitespace = false)
{
    if ($include_whitespace) {
        // make it so strings containing white space are treated as empty too
        $s = trim($s);
    }
    return (isset($s) && strlen($s)); // var is set and not an empty string ''
}

// EMAIL
function email_exists($_email) {
  $sql = new sql();
  $query = "select id from member where email = '".$_email."'";
  $rs = $sql -> dquery($query);	
  $sql -> dclose();

  if ($rs[0] > 0) return FALSE;
  else return TRUE;
}

function is_valid_email($address)
{
   $pattern = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#';
   if (preg_match($pattern, $address))
      return true;
   else
     return false;
}


?>