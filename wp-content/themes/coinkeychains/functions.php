<?php 


	include 'metabox-product.php';
	
	function filter_search($query) {
		if ($query->is_search) {
			$query->set('post_type', array('post', 'page', 'product' , 'attachment'));
		};
		return $query;
	};
	add_filter('pre_get_posts', 'filter_search');
	
	////////////////////////////////////////////////
	
	// ALLOW PSD
	add_filter('upload_mimes', 'custom_upload_mimes');

function custom_upload_mimes ( $existing_mimes = array() ) {
    $existing_mimes['psd'] = 'image/vnd.adobe.photoshop';
    $existing_mimes['cdr'] = 'image/cdr';
    return $existing_mimes;
}

	// PERMET D'UTILISER VARIABLE GET
	///////////////////////////////////////////////
	
	add_filter( 'query_vars', 'addnew_query_vars', 10, 1 );
	function addnew_query_vars($vars)
	{   
	    $vars[] = 'tabIdLogoProcessWhichMatchString';
	    $vars[] = 'quantity';
	        
	    return $vars;
	}

	///////////////////////////////////////////////


	
	function my_connection_types() {
    p2p_register_connection_type( array(
        'name' => 'logo_process_to_product',
        'from' => 'logo-process',
        'to' => 'product'
    ) );
}
add_action( 'p2p_init', 'my_connection_types' );

function my_connection_types_theme() {
	p2p_register_connection_type( array(
	'name' => 'theme_to_gift',
	'from' => 'theme',
	'to' => 'gift'
			) );
}
add_action( 'p2p_init', 'my_connection_types_theme' );

function my_connection_types_display() {
	p2p_register_connection_type( array(
	'name' => 'display_to_gift',
	'from' => 'display',
	'to' => 'gift'
			) );
}
add_action( 'p2p_init', 'my_connection_types_display' );


	
	// function which encrypt a password to store in database
// author: Jimmy Roy
// Date: V1: 2008-01-22
function encrypt_string($_myString) { 
  
  return md5(md5($_myString).date("Y-m-d"));
  
}

// function which check the log in infos
// author: Jimmy Roy
// Date: V1: 2008-01-22
function check_login($_email, $_password) {

  global $wpdb;

  // ADD STATUS in query, the member must be approved, STATUS = 1
  if ( $users = $wpdb->get_results("select * from qcs_members where email = '".$_email."' and status = 2") ) {
  
    foreach ( $users as $user ) {
  
      $out = true;
      $date_creation = substr($user->date_creation, 0, 10);
      $input_password = md5(md5($_password).$date_creation);
      $db_password = $user->password;
      
      $_SESSION['qcs-type'] = $user->type;

      if ($input_password != $db_password) $out = false;
      
    
      if($db_password == md5($_password))
      {
			$out = true;
      }
  
    }
  
  }
  
  else {
  
    $out = false;
  
  }  

  return $out;

}

// EMAIL
function qcs_email_exists($_email) {
  
  global $wpdb;
  
  if ( $users = $wpdb->get_results("select id from qcs_members where email = '".$_email."'") ) return TRUE;
  else return FALSE;
  
}

function getCountryByIP($ip)
{
	
	$url = "http://freegeoip.net/json/" . $_SERVER['REMOTE_ADDR'];
	
        set_time_limit(10);
        
	$data = file_get_contents($url);
		
	$obj = json_decode($data);
		
	$country = "";
		
	foreach ($obj as $key => $value)
	{
		if($key == "country_name")
			$country = $value;
	}
	
	return $country;
	
}

// Add term page
function pippin_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[custom_term_meta_icon1]"><?php _e( 'ID Icon 1', 'pippin' ); ?></label>
		<input type="text" name="term_meta[custom_term_meta_icon1]" id="term_meta[custom_term_meta_icon1]" value="">
		<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>
	</div>
	<div class="form-field">
		<label for="term_meta[custom_term_meta_icon2]"><?php _e( 'ID Icon 2', 'pippin' ); ?></label>
		<input type="text" name="term_meta[custom_term_meta_icon2]" id="term_meta[custom_term_meta_icon2]" value="">
		<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>
	</div>
	<div class="form-field">
		<label for="term_meta[custom_term_meta_icon3]"><?php _e( 'ID Icon 3', 'pippin' ); ?></label>
		<input type="text" name="term_meta[custom_term_meta_icon3]" id="term_meta[custom_term_meta_icon3]" value="">
		<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>
	</div>
	<div class="form-field">
		<label for="term_meta[custom_term_meta_icon4]"><?php _e( 'ID Icon 4', 'pippin' ); ?></label>
		<input type="text" name="term_meta[custom_term_meta_icon4]" id="term_meta[custom_term_meta_icon4]" value="">
		<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>
	</div>
<?php
}
add_action( 'productcat_add_form_fields', 'pippin_taxonomy_add_new_meta_field', 10, 2 );


// Edit term page
function pippin_taxonomy_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[custom_term_meta_icon1]"><?php _e( 'ID Icon 1', 'pippin' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[custom_term_meta_icon1]" id="term_meta[custom_term_meta_icon1]" value="<?php echo esc_attr( $term_meta['custom_term_meta_icon1'] ) ? esc_attr( $term_meta['custom_term_meta_icon1'] ) : ''; ?>">
			<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>
		</td>
	</tr>
	
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[custom_term_meta_icon2]"><?php _e( 'ID Icon 2', 'pippin' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[custom_term_meta_icon2]" id="term_meta[custom_term_meta_icon2]" value="<?php echo esc_attr( $term_meta['custom_term_meta_icon2'] ) ? esc_attr( $term_meta['custom_term_meta_icon2'] ) : ''; ?>">
			<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>
		</td>
	</tr>
	
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[custom_term_meta_icon3]"><?php _e( 'ID Icon 3', 'pippin' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[custom_term_meta_icon3]" id="term_meta[custom_term_meta_icon3]" value="<?php echo esc_attr( $term_meta['custom_term_meta_icon3'] ) ? esc_attr( $term_meta['custom_term_meta_icon3'] ) : ''; ?>">
			<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>
		</td>
	</tr>
	
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[custom_term_meta_icon4]"><?php _e( 'ID Icon 4', 'pippin' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[custom_term_meta_icon4]" id="term_meta[custom_term_meta_icon4]" value="<?php echo esc_attr( $term_meta['custom_term_meta_icon4'] ) ? esc_attr( $term_meta['custom_term_meta_icon4'] ) : ''; ?>">
			<p class="description"><?php _e( 'Enter a value for this field','pippin' ); ?></p>
		</td>
	</tr>
	
<?php
}
add_action( 'productcat_edit_form_fields', 'pippin_taxonomy_edit_meta_field', 10, 2 );

// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_productcat', 'save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_productcat', 'save_taxonomy_custom_meta', 10, 2 );


?>