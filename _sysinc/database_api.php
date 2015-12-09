<?php
// ADMIN DATABASE API
// 2009 02 02
// JIMMY ROY

require_once('cst.php');

// ************************************************
// ************** QCS_MEMBERS
// ************************************************

function get_members($_filter=null) {
	$sql = new sql();
    
    if (is_null($_filter)) $query = "select * from qcs_members where status < 99 order by id DESC";
    else $query = "select * from qcs_members where status = ".$_filter." order by id DESC";
	
    $_arr = $sql -> dquery($query);
	$sql -> dclose();
	return $_arr;
}

function get_member($_member_id) {
	$sql = new sql();
	$query = "select * from qcs_members where id = ".$_member_id;
	$_arr = $sql -> dquery($query);
	$sql -> dclose();
	return $_arr;
}

function getMemberFromByEmail($email)
{
	$sql = new sql();
	$query = "select * from qcs_members where id = " . $email;
	$_arr = $sql -> dquery($query);
	$sql -> dclose();
	return $_arr;
}

// ************************************************
// ************** QCS_TRACKING
// ************************************************

function get_tracking() {
	$sql = new sql();
    
    $query = "select * from qcs_tracking order by id DESC";
	
    $_arr = $sql -> dquery($query);
	$sql -> dclose();
	return $_arr;
}

// ************************************************
// ************** USER
// ************************************************
function get_user_role($_user_id) {
	$sql = new sql();
	$query = "select role from user where id = ".$_user_id;
	$_arr = $sql -> dquery($query);
	$sql -> dclose();
	return $_arr[1]['role'];
}

function get_user_by_name($_name) {
	$sql = new sql();
	$query = "select id from user where username = '".$_name."' and role != 'super'";
	$_arr = $sql -> dquery($query);
	$sql -> dclose();
	return $_arr;
}

function get_user($_id) {
	$sql = new sql();
	$query = "select * from user where id = ".$_id;
	$_arr = $sql -> dquery($query);
	$sql -> dclose();
	return $_arr;
}

function get_users() {
	$sql = new sql();
	$query = "select * from user where role != 'super'";
	$_arr = $sql -> dquery($query);
	$sql -> dclose();
	return $_arr;
}

function delete_user($_id) {
    $sql = new sql();
	$query = 'delete from user where id = '.$_id;
	$sql -> dchange($query);
	$sql -> dclose();
}
?>