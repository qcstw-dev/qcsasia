<?php
// LOGIN FUNCTIONS
// return user id if login is ok else return -1
// version
// 2008 - 08 - 08
function check_login_info($_username, $_password) {
	$sql = new sql();
	$query = "select id, password, date_creation from qcs_users where username = '".$_username."'";
	$rs = $sql -> dquery($query);	
	
	if ($rs[0] > 0) {
		
		
		
		$date_creation = substr($rs[1]['date_creation'], 0, 10);
		$input_password = md5(md5($_password).$date_creation);
		$db_password = $rs[1]['password'];
		$user_id = $rs[1]['id'];
		
		
		if ($input_password != $db_password)
			$user_id = -1;
			
		//	echo "password = " . $_password;
		//	echo "rs[1]['password'] = " . $rs[1]['password'];
		//	exit();
			
		if($rs[1]['password'] == md5($_password))
			$user_id = $rs[1]['id'];
	}
	
	else $user_id = -1;
	$sql -> dclose();
	return $user_id;
}

function is_connected() {
	if (!isset($_SESSION['isconnect'])) {
		$home = '../index.php';
		header("Location: $home");
		exit;
	} 	
}
?>