<?php 
	
	require_once("../include/member.inc.php");
	
	//////////////////////////////////////////////////////////////////////////////
	
	$formulaire = $_REQUEST['formulaire'];
	
	$fromDate = $_REQUEST['fromDate'];
	$toDate = $_REQUEST['toDate'];
	$type = $_REQUEST['type'];
	
	$type_distributor = $_REQUEST['type_distributor'];
	$type_supplier = $_REQUEST['type_supplier'];
	$type_other = $_REQUEST['type_other'];
	
	$country = $_REQUEST['country'];
	
	$status_pending = $_REQUEST['status_pending'];
	$status_email_verified = $_REQUEST['status_email_verified'];
	$status_member = $_REQUEST['status_member'];
	$status_deleted = $_REQUEST['status_deleted'];
	
	$search = $_REQUEST['search'];
	
	//////////////////////////////////////////////////////////////////////////////
	
	// FORMULAIRE
	if(strpos($_SERVER['HTTP_REFERER'] , "page") === FALSE) // SI MEME PAGE
	{
		$formulaire = $_REQUEST['formulaire'];
		$_SESSION['formulaire'] = $_REQUEST['formulaire'];
	}
	else
		$formulaire = $_SESSION['formulaire'] ;
	
	// FROM DATE
	if(strpos($_SERVER['HTTP_REFERER'] , "page") === FALSE) // SI MEME PAGE
	{
		$fromDate = $_REQUEST['fromDate'];
		$_SESSION['fromDate'] = $_REQUEST['fromDate'];
	}
	else
		$fromDate = $_SESSION['fromDate'] ;
	
	// TO DATE
	if(strpos($_SERVER['HTTP_REFERER'] , "page") === FALSE) // SI MEME PAGE
	{
		$toDate = $_REQUEST['toDate'];
		$_SESSION['toDate'] = $_REQUEST['toDate'];
	}
	else
		$toDate = $_SESSION['toDate'] ;
	
	// TYPE
	if(strpos($_SERVER['HTTP_REFERER'] , "page") === FALSE) // SI MEME PAGE
	{
		$type = $_REQUEST['type'];
		$_SESSION['type'] = $_REQUEST['type'];
	}
	else
		$type = $_SESSION['type'];
	
	// DISTRIBUTOR
	if(strpos($_SERVER['HTTP_REFERER'] , "page") === FALSE) // SI MEME PAGE
	{
		$type_distributor = $_REQUEST['type_distributor'];
		$_SESSION['type_distributor'] = $_REQUEST['type_distributor'];
	}
	else
		$type_distributor = $_SESSION['type_distributor'] ;

	
	// SUPPLIER
	if(strpos($_SERVER['HTTP_REFERER'] , "page") === FALSE) // SI MEME PAGE
	{
		$type_supplier = $_REQUEST['type_supplier'];
		$_SESSION['type_supplier'] = $_REQUEST['type_supplier'];
	}
	else
		$type_supplier = $_SESSION['type_supplier'] ;
	
	// OTHER
	if(strpos($_SERVER['HTTP_REFERER'] , "page") === FALSE) // SI MEME PAGE
	{
		$type_other = $_REQUEST['type_other'];
		$_SESSION['type_other'] = $_REQUEST['type_other'];
	}
	else
		$type_other = $_SESSION['type_other'] ;
	
	// COUNTRY
	if(strpos($_SERVER['HTTP_REFERER'] , "page") === FALSE) // SI MEME PAGE
	{
		$country = $_REQUEST['country'];
		$_SESSION['country'] = $_REQUEST['country'];
	}
	else
		$country = $_SESSION['country'] ;
	

	
	// STATUS PENDING
	if(strpos($_SERVER['HTTP_REFERER'] , "page") === FALSE) // SI MEME PAGE
	{
		$status_pending = $_REQUEST['status_pending'];
		$_SESSION['status_pending'] = $_REQUEST['status_pending'];
	}
	else 
		$status_pending = $_SESSION['status_pending'] ;


	// STATUS EMAIL VERIFIED
	if(strpos($_SERVER['HTTP_REFERER'] , "page") === FALSE) // SI MEME PAGE
	{
		$status_email_verified = $_REQUEST['status_email_verified'];
		$_SESSION['status_email_verified'] = $_REQUEST['status_email_verified'];
	}
	else
		$status_email_verified = $_SESSION['status_email_verified'] ;

	
	// STATUS EMAIL VERIFIED
	if(strpos($_SERVER['HTTP_REFERER'] , "page") === FALSE) // SI MEME PAGE
	{
		$status_member = $_REQUEST['status_member'];
		$_SESSION['status_member'] = $_REQUEST['status_member'];
	}
	else
		$status_member = $_SESSION['status_member'] ;

	
	// STATUS DELETED
	if(strpos($_SERVER['HTTP_REFERER'] , "page") === FALSE) // SI MEME PAGE
	{
		$status_deleted = $_REQUEST['status_deleted'];
		$_SESSION['status_deleted'] = $_REQUEST['status_deleted'];
	}
	else
		$status_deleted = $_SESSION['status_deleted'] ;
	
	// SEARCH
	if(strpos($_SERVER['HTTP_REFERER'] , "page") === FALSE) // SI MEME PAGE
	{
		$search = $_REQUEST['search'];
		$_SESSION['search'] = $_REQUEST['search'];
	}
	else
		$search = $_SESSION['search'] ;
	
	
	
	// echo "session search = " . $_SESSION['search'];
	
	// ACTION
	//////////////////////////////////////////////////////////////////////////////
	
	if($formulaire == 'action')
	{
		$action = $_REQUEST['action'];
		$tabIdMember = $_REQUEST['tabIdMember'];
		
		if(!empty($tabIdMember))
		{
			foreach($tabIdMember as $idMember)
			{
				if($action == 'delete')
				{
					deleteMember($idMember);
				}
				else if($action == 'pending')
				{
					updateMemberStatus($idMember , '0');
				}
				else if($action == 'email_verified')
				{
					updateMemberStatus($idMember , '1');
				}
				else if($action == 'member')
				{
					updateMemberStatus($idMember , '2');
				}
			}
		}
		
	}
	
	//////////////////////////////////////////////////////////////////////////////
	
	$rechercheSQL = "WHERE 1 = 1 ";
	
	// DATE
	//////////////////////////////////////////////////////////////////////////////
	
	if(!empty($fromDate))
	{
		$debut = convertHumanDateDateSQL($fromDate);
		$rechercheSQL = $rechercheSQL . " AND date_creation >= '" . $debut . "'";
	}
	
	//////////////////////////////////////////////////////////////////////////////

	if(!empty($toDate))
	{
		$fin = convertHumanDateDateSQL($toDate);
		$rechercheSQL = $rechercheSQL . " AND date_creation <= '" . $fin . "'";
	}
	
	// TYPE
	//////////////////////////////////////////////////////////////////////////////
	
	$rechercheSQL = $rechercheSQL . " AND (1 = 0 ";
	
	if(empty($type_distributor) && empty($type_supplier) && empty($type_other))
		$rechercheSQL = $rechercheSQL . " OR 1 = 1)";
		
	if($type_distributor == '1')
	{
		$rechercheSQL = $rechercheSQL . " OR type = 'distributor'";
	}
	
	if($type_supplier == '1')
	{
		$rechercheSQL = $rechercheSQL . " OR type = 'supplier'";
	}
	
	if($type_other == '1')
	{
		$rechercheSQL = $rechercheSQL . " OR type = 'other'";
	}
	
	if(!empty($type_distributor) || !empty($type_supplier) || !empty($type_other))
		$rechercheSQL = $rechercheSQL . " )";
	
	// COUNTRY
	//////////////////////////////////////////////////////////////////////////////
	
	if(!empty($country) && $country != "all")
	{
		$rechercheSQL = $rechercheSQL . " AND country = '" . $country . "'";
	}
	
	// STATUS
	//////////////////////////////////////////////////////////////////////////////
	
	$rechercheSQL = $rechercheSQL . " AND (1 = 0 ";
	
	if(empty($status_pending) && empty($status_email_verified) && empty($status_member) && empty($status_deleted))
		$rechercheSQL = $rechercheSQL . " OR 1 = 1)";
	
	if($status_pending == '1')
	{
		$rechercheSQL = $rechercheSQL . " OR status = '0' ";
	}
	
	if($status_email_verified == '1')
	{
		$rechercheSQL = $rechercheSQL . " OR status= '1' ";
	}
	
	if($status_member == '1')
	{
		$rechercheSQL = $rechercheSQL . " OR status= '2' ";
	}
	
	if($status_deleted == '1')
	{
		$rechercheSQL = $rechercheSQL . " OR status= '99' ";
	}
	
	if(!empty($status_pending) || !empty($status_email_verified) || !empty($status_member) || !empty($status_deleted))
		$rechercheSQL = $rechercheSQL . " )";
	
	// SEARCH
	//////////////////////////////////////////////////////////////////////////////
	
	if(!empty($search))
	{
		$rechercheSQL = $rechercheSQL . " AND 
		(email LIKE '%" . $search . "%' OR
		email2 LIKE '%" . $search . "%' OR 
		lastname LIKE '%" . $search . "%' OR 
		firstname LIKE '%" . $search . "%' OR 
		website LIKE '%" . $search . "%' OR 
		address LIKE '%" . $search . "%' OR 
		comment LIKE '%" . $search . "%' OR 
		company_name LIKE  '%" . $search . 
		"%')";
	}
	
	
	if(empty($_REQUEST['status_deleted']))
	{
		$rechercheSQL = $rechercheSQL . " AND status <> '99' ";
	}
			
	
?>

	<script type="text/javascript">
		$(function() { $("#fromDateID").datepicker(); });
		$(function() { $("#toDateID").datepicker(); });
	</script>
	
	<?php echo $_SERVER['HTTP_REFERER'] ; ?>


	<form method = "POST" action = "<?php echo $_SERVER['PHP_SELF']; ?>" style = "border-style:solid;border-width:1px;border-color:green;width:600px;padding:10px;font-weight:bold;">

		<input type = "hidden" name = "formulaire" value = "search"/>
		
		From : &nbsp;&nbsp;<input type="text" name="fromDate"id="fromDateID" size = "10" value = "<?php echo $fromDate; ?>">&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbspto : &nbsp;&nbsp;<input type="text" name="toDate" value="<?php echo $toDate; ?>" id="toDateID" size = "10">
		<br/><br/>
		Type : 
		<input type = "checkbox" name = "type_distributor" value = "1" <?php if($type_distributor == '1') echo "checked"; ?>/>Distributor&nbsp;&nbsp;&nbsp;&nbsp;
		<input type = "checkbox" name = "type_supplier" value = "1" <?php if($type_supplier == '1') echo "checked"; ?>/>Supplier&nbsp;&nbsp;&nbsp;&nbsp;
		<input type = "checkbox" name = "type_other" value = "1" <?php if($type_other == '1') echo "checked"; ?>/>Other
		<br/><br/>
		Country :
		<select name = "country">
			<option value = "all">All</option>
			<?php 
			
				$tabCountry = getTabCountry();
				
				foreach($tabCountry as $countryA)
				{
					if($countryA == $country)
						echo "<option selected value = '" . $countryA . "'>" . $countryA . "</option>";
					else
						echo "<option value = '" . $countryA . "'>" . $countryA . "</option>";
				}
			
			?>
		</select>
		<br/><br/>
		Status :
		<input type = "checkbox" name = "status_pending" value = "1" <?php if($status_pending == '1') echo "checked"; ?>/>Pending&nbsp;&nbsp;&nbsp;&nbsp;
		<input type = "checkbox" name = "status_email_verified" value = "1" <?php if($status_email_verified == '1') echo "checked"; ?>/>Email verified&nbsp;&nbsp;&nbsp;&nbsp;
		<input type = "checkbox" name = "status_member" value = "1" <?php if($status_member == '1') echo "checked"; ?>/>Member&nbsp;&nbsp;&nbsp;&nbsp;
		<input type = "checkbox" name = "status_deleted" value = "1" <?php if($status_deleted == '1') echo "checked"; ?>/>Deleted
		<br/><br/>
		Search : <input name = "search" type = "text" size = 50 value = "<?php echo $search ?>" />
		<br/><br/>
		<input type="submit" class = "ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all boutton-vert" name="submit" value="Search" style="width:100px">	

	</form>
	
	<br/>
	
	<form method = "GET" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
	
		<div style = "border-style:solid;border-width:1px;border-color:red;width:600px;padding:10px;font-weight:bold;">
		
		<input type = "hidden" name = "formulaire" value = "action" />
	
		Action :
		<select name = "action">
			<option value = "">Select</option>
			<option value = "pending">Pending</option>
			<option value = "email_verified">Email verified</option>
			<option value = "member">Member</option>
			<option value = "delete">Delete</option>
		</select>
		&nbsp;&nbsp;&nbsp;
		<input type="submit" class = "ui-button ui-button-text-only ui-widget ui-state-default ui-corner-all boutton-vert" name="submit" value="OK" style="width:100px">	
	
		</div>
	
	<br/><br/>
	
	<a href = "exportXLS.php" style = "font-size:16">Export excel</a>
	
	<br/><br/><br/>
	
	<?php
	
		echo "<p id = 'count' style = 'text-align:center'></p>\n";
			
	 ?>

	
	<br/><br/>
	
	<table width="70%" class="list" style = "margin:0;">
		<thead>
			<tr>
				<?php 
					
					$link = "index.php?page=" . $page . "&id=" . $_REQUEST['id'] . "&action=" . $_REQUEST['ajout'];
					
					echo '<th><input class="check-all" type="checkbox"/></th>';
					
					// ID
					if($sort == "idASC")
						echo '<th class = "sortable sorted order1"><a href = "' . $link . '&sort=idDESC">ID</a></th>';
					else if($sort == "idDESC")
                                            echo '<th class = "sortable sorted order2"><a href = "' . $link . '&sort=idASC">ID</a></th>';
					else
                                            echo '<th class = "sortable"><a href = "' . $link . '&sort=idASC">ID</a></th>';
						
					// COMPANY NAME
					if($sort == "companyNameASC")
						echo '<th class = "sortable sorted order1"><a href = "' . $link . '&sort=companyNameDESC">Company name</a></th>';
					else if($sort == "companyNameDESC")
						echo '<th class = "sortable sorted order2"><a href = "' . $link . '&sort=companyNameASC">Company name</a></th>';
					else
						echo '<th class = "sortable"><a href = "' . $link . '&sort=companyNameASC">Company name</a></th>';
									
					// TYPE
					if($sort == "typeASC")
						echo '<th class = "sortable sorted order1"><a href = "' . $link . '&sort=typeDESC">Type</a></th>';
					else if($sort == "typeDESC")
						echo '<th class = "sortable sorted order2"><a href = "' . $link . '&sort=typeASC">Type</a></th>';
					else
						echo '<th class = "sortable"><a href = "' . $link . '&sort=typeASC">Type</a></th>';
										
					// Email
					if($sort == "emailASC")
						echo '<th class = "sortable sorted order1"><a href = "' . $link . '&sort=emailDESC">Email</a></th>';
					else if($sort == "emailDESC")
						echo '<th class = "sortable sorted order2"><a href = "' . $link . '&sort=emailASC">Email</a></th>';
					else
						echo '<th class = "sortable"><a href = "' . $link . '&sort=emailASC">Email</a></th>';
						
					// COUNTRY
					if($sort == "countryASC")
						echo '<th class = "sortable sorted order1"><a href = "' . $link . '&sort=countryDESC">Country</a></th>';
					else if($sort == "countryDESC")
						echo '<th class = "sortable sorted order2"><a href = "' . $link . '&sort=countryASC">Country</a></th>';
					else
						echo '<th class = "sortable"><a href = "' . $link . '&sort=countryASC">Country</a></th>';
						
					// COUNTRY IP
					if($sort == "country_ipASC")
						echo '<th class = "sortable sorted order1"><a href = "' . $link . '&sort=country_ipDESC">Country IP</a></th>';
					else if($sort == "country_ipDESC")
						echo '<th class = "sortable sorted order2"><a href = "' . $link . '&sort=country_ipASC">Country IP</a></th>';
					else
						echo '<th class = "sortable"><a href = "' . $link . '&sort=country_ipASC">Country IP</a></th>';
						
					// STATUS
					if($sort == "statusASC")
						echo '<th class = "sortable sorted order1"><a href = "' . $link . '&sort=statusDESC">Status</a></th>';
					else if($sort == "statusDESC")
						echo '<th class = "sortable sorted order2"><a href = "' . $link . '&sort=statusASC">Status</a></th>';
					else
						echo '<th class = "sortable"><a href = "' . $link . '&sort=statusASC">Status</a></th>';
					
					// ONLINE
					echo '<th class = "sortable"><a href = ""></a></th>';
						
				?>
			</tr>
		</thead>

		<tbody>
			<?php 
					$nbMemberPerPage = 100;
					echo displayListMember($selectedPage , $rechercheSQL , $nbMemberPerPage , $_REQUEST['action'] , $_REQUEST['id'] , $sort);
			?>
		</tbody>
		
	</table>
	
	</form>

<?php
	
	$nbMember = getNbMember($rechercheSQL);
	
	echo '<div style = "margin:0;padding:0;text-align:center;"><br/><br/>' . "\n";
	
	echo getLiensPageParPage($page , $sort , $selectedPage , $nbMember , "members" , $nbMemberPerPage); 		
	
	echo '</div>' . "\n";
?>	
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#count').html('<?php echo $nbMember; ?> member(s) found');
        $('.check-all').on('click', function (){
            var bool = $(this).is(':checked');
            if ($(this).is(':checked')) {
                bool = true;
            }
            $('.checkbox').each(function () {
                $(this).prop('checked', bool); 
            });
        });
   });
</script>

