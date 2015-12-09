<?php 
	
	require_once("../include/member.inc.php");
	require_once("../include/history.inc.php");
	
	$idMember = $_REQUEST['idMember'];
	
	$member = getMemberById($idMember);
	
?>

<center><a href = "index.php" style = "font-size:16px;">Back to member's list</a></center>

<br/>

<form method = "GET" action = "edit-member.php" style = "border-style:solid;border-width:1px;border-color:green;width:900px;padding:10px;font-weight:bold;">

<center><u><?php echo $member['company_name']; ?></u></center>

<div style = "text-align:left">

	<img src = "../logo/<?php echo $member['logo']; ?>" style = "float:right;height:100px;"/>

	<br/>
	
	<?php 
	
	$tabHistory = getTabHistory($idMember , "connection");
	
	?>
	
	Last connection : <?php echo $tabHistory[count($tabHistory) - 1]['createdDate']; ?>
	
	<br/><br/>
	
	Registration date : <?php echo $member['date_creation']; ?>
	
	<br/><br/>
	
	Current status : 
	<?php 
	
		if($member['status'] == '0')
			echo "Pending"; 
		else if($member['status'] == '1')
			echo "Email verified"; 
		else if($member['status'] == '2')
			echo "Member"; 
			
	?>
	
	<br/><br/>
	
	First name : <?php echo $member['firstname']; ?>
	
	<br/><br/>
	
	Last name : <?php echo $member['lastname']; ?>
	
	<br/><br/>
	
	Company type : <?php echo $member['type']; ?>
	
	<br/><br/>
	
	Email : <a href = "mailto:<?php echo $member['email']; ?>"><?php echo $member['email']; ?></a>
	
	<br/><br/>
	
	Address : <?php echo $member['address']; ?>
	
	<br/><br/>
	
	Phone : <?php echo $member['phone']; ?>
	
	<br/><br/>
	
	Website : <a href = "<?php echo $member['website']; ?>"><?php echo $member['website']; ?></a>
	
	<br/><br/>
	
	Country : <?php echo $member['country']; ?>
	
	<br/><br/>
	
	IP country : <?php echo $member['country_ip']; ?>
	
	<br/><br/>
	
	Classification : <?php echo $member['classification']; ?>
	
	<br/><br/>
	
	Other email address : <a href = "mailto:<?php echo $member['email2']; ?>"><?php echo $member['email2']; ?></a>
	
	<br/><br/>
	
	Linkedin : <a href = "<?php echo $member['linkedin']; ?>"><?php echo $member['linkedin']; ?></a>
	
	<br/><br/>
	
	Comment : <?php echo nl2br($member['comment']); ?>
	
	<br/><br/>
	
	<u>Connection history</u>
	<br/><br/>
	
	<table class="list" style = "margin:0;">
		<thead>
			<tr>
				<th style = "width:40px">Date</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		
			echo displayListHistoryConnection($idMember , "connection");
		
		?>
		</tbody>
	</table>
	
	<br/><br/>
	
	<u>Download history</u>
	<br/><br/>
	
	<table class="list" style = "margin:0;">
		<thead>
			<tr>
				<th style = "width:40px">Date</th>
				<th style = "width:40px">File</th>
			</tr>
		</thead>
		<tbody>
		<?php 
		
			echo displayListHistoryDownload($idMember , "download");
		
		?>
		</tbody>
	</table>
	
	
</div>

</form>

<br/><br/>

<a href = "index.php?page=edit-member&idMember=<?php echo $idMember; ?>"><input type="submit" class = "ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all boutton-vert" name="submit" value="Edit" style="width:100px"></a>	
&nbsp;&nbsp;
<a target = "_BLANK" href = "print.php?idMember=<?php echo $idMember; ?>"><input type="submit" class = "ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all boutton-vert" name="submit" value="Print" style="width:100px"></a>	
&nbsp;&nbsp;
<a href = "../action/deleteMember.php?idMember=<?php echo $idMember; ?>"><input type="submit" class = "ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all boutton-vert" name="submit" value="Delete" style="width:100px"></a>	
