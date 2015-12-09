<?php 
	
	require_once("../include/member.inc.php");
	
	$idMember = $_REQUEST['idMember'];
	
	$member = getMemberById($idMember);
	
	$firstname = $_REQUEST;
	
?>

<center><a href = "index.php" style = "font-size:16px;">Back to member's list</a></center>

<br/>

<form method = "POST" action = "../action/updateMember.php" enctype="multipart/form-data" style = "border-style:solid;border-width:1px;border-color:green;width:600px;padding:10px;font-weight:bold;">


<input type = "hidden" name = "idMember" value = "<?php echo $member['id']; ?>" />

<center><u><?php echo $member['company_name']; ?></u></center>

<div style = "text-align:left">

	<div style = "float:right;">
		<img src = "../logo/<?php echo $member['logo']; ?>" style = "height:100px;"/>
		<br/>
		Delete logo : <input type = "checkbox" name = "deleteLogo" value = "1" />
		<br/>
		<input type = "file" name = "logo" />
	</div>
	
	<br/>
	
	Last connection : <?php echo $member['last_connection']; ?>
	
	<br/><br/>
	
	Registration date : <?php echo $member['date_creation']; ?>
	
	<br/><br/>
	
	Current status :
	<select name = "status">
	<?php 
	
		if($member['status'] == '0')
			echo "<option value = '0' selected>Pending</option>"; 
		else
			echo "<option value = '0'>Pending</option>"; 
			
		if($member['status'] == '1')
			echo "<option value = '1' selected>Email verified</option>"; 
		else
			echo "<option value = '1'>Email verified</option>"; 
			
		if($member['status'] == '2')
			echo "<option value = '2' selected>Member</option>"; 
		else
			echo "<option value = '2'>Member</option>"; 
			
	?>
	</select>
	
	<br/><br/>
	
	Company name : <input type = "text" name = "companyName" value = "<?php echo $member['company_name']; ?>" />
	
	<br/><br/>
	
	First name : <input type = "text" name = "firstname" value = "<?php echo $member['firstname']; ?>" />
	
	<br/><br/>
	
	Last name : <input type = "text" name = "lastname" value = "<?php echo $member['lastname']; ?>" />
	
	<br/><br/>
	
	Company type :
	<select name = "type">
	<?php 
	
		if($member['type'] == 'distributor')
			echo "<option value = 'distributor' selected>Distributor</option>"; 
		else
			echo "<option value = 'distributor'>Distributor</option>"; 
			
		if($member['type'] == 'supplier')
			echo "<option value = 'supplier' selected>Supplier</option>"; 
		else
			echo "<option value = 'supplier'>Supplier</option>"; 
			
		if($member['type'] == 'other')
			echo "<option value = 'other' selected>Other</option>"; 
		else
			echo "<option value = 'other'>Other</option>"; 
			
	?>
	</select>
	
	<br/><br/>
	
	Email : <input type = "text" name = "email" value = "<?php echo $member['email']; ?>" size = "60" />
	
	<br/><br/>
	
	Address : <input type = "text" name = "address" value = "<?php echo $member['address']; ?>" size = "60" />
	
	<br/><br/>
	
	Phone : <input type = "text" name = "phone" value = "<?php echo $member['phone']; ?>" />
	
	<br/><br/>
	
	Website : <input type = "text" name = "website" value = "<?php echo $member['website']; ?>" size = "60" />
	
	<br/><br/>
	
	Country : <input type = "text" name = "country" value = "<?php echo $member['country']; ?>" />
	
	<br/><br/>
	
	IP country : <?php echo $member['country_ip']; ?>
	
	<br/><br/>
	
	Classification : <input type = "text" name = "classification" value = "<?php echo $member['classification']; ?>" size = "60" />
	
	<br/><br/>
	
	Other email address : <input type = "text" name = "email2" value = "<?php echo $member['email2']; ?>" size = "60" />
	
	<br/><br/>
	
	Linkedin : <input type = "text" name = "linkedin" value = "<?php echo $member['linkedin']; ?>" size = "60" />
	
	<br/><br/>
	
	Comment :
	<textarea name = "comment" cols = "60" rows = "10">
		<?php echo nl2br($member['comment']); ?>
	</textarea>
	
</div>

<input type="submit" class = "ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all boutton-vert" name="submit" value="Save" style="width:100px">	


</form>

<br/><br/>