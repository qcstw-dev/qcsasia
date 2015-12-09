<?php

/**

 * Registering meta boxes

 *

 * All the definitions of meta boxes are listed below with comments.

 * Please read them CAREFULLY.

 *

 * You also should read the changelog to know what has been changed before updating.

 *

 * For more information, please visit:

 * @link http://www.deluxeblogtips.com/meta-box/

 */



/********************* META BOX DEFINITIONS ***********************/



/**

 * Prefix of meta keys (optional)

 * Use underscore (_) at the beginning to make keys hidden

 * Alt.: You also can make prefix empty to disable it

 */

// Better has an underscore as last sign

$prefix = 'PRODUCT_';



global $meta_boxes;



$meta_boxes = array();



// 1st meta box

$meta_boxes[] = array(

	// Meta box id, UNIQUE per meta box. Optional since 4.1.5

	'id' => 'standard',



	// Meta box title - Will appear at the drag and drop handle bar. Required.

	'title' => __( 'Standard Fields', 'rwmb' ),



	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.

	'pages' => array( 'product' ),



	// Where the meta box appear: normal (default), advanced, side. Optional.

	'context' => 'normal',



	// Order of meta box: high (default), low. Optional.

	'priority' => 'high',



	// Auto save: true, false (default). Optional.

	'autosave' => true,



	// List of meta fields

	'fields' => array(

		// TEMPLATE //////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

		'name' => __( 'Complicated', 'rwmb' ),

		'id' => "{$prefix}template",

		'type' => 'checkbox',

		'max_file_uploads' => 6,

		),

		// LOGO SIZE

		array(

			// Field name - Will be used as label

			'name'  => __( 'Logo size', 'rwmb' ),

			'std'   => __( '40*18 mm', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}logo_size",

			'type'  => 'text'

		),

		// ITEM SIZE

		array(

			// Field name - Will be used as label

			'name'  => __( 'Item size', 'rwmb' ),

			'std'   => __( '135*20 mm', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}item_size",

			'type'  => 'text'

		),

		// PACKAGING

		array(

			// Field name - Will be used as label

			'name'  => __( 'Packaging', 'rwmb' ),

			'std'   => __( '1000 pcs/0.023cbm/19.3kg/19.9kg', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}packaging",

			'type'  => 'text',

			'size'	=> '50'

		),

		// PATENT

		array(

			// Field name - Will be used as label

			'name'  => __( 'Patent', 'rwmb' ),

			'std'   => __( '0236698', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}patent",

			'type'  => 'text'

		),

		// LIEN PICASA

		array(

			// Field name - Will be used as label

			'name'  => __( 'Picasa gallery', 'rwmb' ),

			'std'   => __( '', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}picasa_gallery",

			'type'  => 'text'

		),

		// FILE UPLOAD DATASHEET

		array(

			'name' => __( 'Datasheet file', 'rwmb' ),

			'id'   => "{$prefix}datasheet_file",

			'type' => 'file',

		),

		// IMAGE SITUATION

		array(

		'name' => __( 'Image Situation', 'rwmb' ),

		'id' => "{$prefix}image_situation",

		'type' => 'thickbox_image',

		'max_file_uploads' => 4,

		),

		// COULEURS

		array(

			'name' => __( 'Colors', 'rwmb' ),

			'id'   => "{$prefix}colors",

			'type' => 'checkbox_list',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'01-pms021c' => __( '01-pms021c', 'rwmb' ),

				'02-pms200c' => __( '02-pms200c', 'rwmb' ),

				'03-pms287c' => __( '03-pms287c', 'rwmb' ),

				'04-pms2602' => __( '04-pms2602', 'rwmb' ),

				'05-pmsblack' => __( '05-pmsblack', 'rwmb' ),

				'06-pmsgreenc' => __( '06-pmsgreenc', 'rwmb' ),

				'07-pms1' => __( '07-pms1', 'rwmb' ),

				'08-pms312c' => __( '08-pms312c', 'rwmb' ),

				'09-pms237c' => __( '09-pms237c', 'rwmb' ),

				'10-pms116c' => __( '10-pms116c', 'rwmb' ),

				'11-pms032c' => __( '11-pms032c', 'rwmb' ),

				'12-pms367c' => __( '12-pms367c', 'rwmb' ),

				'10-pms116c' => __( '10-pms116c', 'rwmb' ),

				'13-pms349c' => __( '13-pms349c', 'rwmb' ),

			),

		),

		// FIRST IMAGE

		array(

		'name' => __( 'First image', 'rwmb' ),

		'id' => "{$prefix}first_image",

		'type' => 'thickbox_image',

		),
		
		// LINK FIRST IMAGE

		array(

		'name' => __( 'Link First image', 'rwmb' ),

		'id' => "{$prefix}link_first_image",

		'type' => 'thickbox_image',

		),

		// OPTIONS  //////////////////////////////////////////////////////////////////////////////////////////////////////

		// IMAGE OPTION

		array(

		'name' => __( 'Image Option', 'rwmb' ),

		'id' => "{$prefix}tab_image_option",

		'type' => 'thickbox_image',

		'max_file_uploads' => 6,

		),

		

		// LOGO ¨PROCESS //////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

		'name' => __( 'Image Logo process', 'rwmb' ),

		'id' => "{$prefix}tab_image_process",

		'type' => 'plupload_image',

		'max_file_uploads' => 6,

		),
		
		
		// ID SLIDESHOW

		array(

			// Field name - Will be used as label

			'name'  => __( 'ID Slideshow', 'rwmb' ),

			'std'   => __( '', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}id_slideshow",

			'type'  => 'text'

		),

		// NAME

		array(

			// Field name - Will be used as label

			'name'  => __( 'Name', 'rwmb' ),

			'std'   => __( '', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}name",

			'type'  => 'text'

		),
		
		// DESCRIPTION

		array(

			// Field name - Will be used as label

			'name'  => __( 'Description', 'rwmb' ),

			'std'   => __( '', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}description",

			'type'  => 'text',
		
			'size'	=> '180'

		),

		// CHECKBOX NEW PRODUCT
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

		'name' => __( 'New product', 'rwmb' ),

		'id' => "{$prefix}new",

		'type' => 'checkbox',

		'max_file_uploads' => 6,

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// PRICE
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Price', 'rwmb' ),

			'id'   => "{$prefix}price",

			'type' => 'checkbox_list',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'ODD' => __( 'ODD', 'rwmb' ),

				'OD' => __( 'OD', 'rwmb' ),

				'LR' => __( 'LR' ),
		
				'PP' => __( 'PP' ),

			),

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		
		// FUNCTIONS
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Functions', 'rwmb' ),

			'id'   => "{$prefix}functions",

			'type' => 'checkbox_list',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'keychain' => __( 'Keychain', 'rwmb' ),

				'coin-keychain' => __( 'Coin keychain', 'rwmb' ),

				'bottle-opener' => __( 'Bottle opener / Bar accessories', 'rwmb' ),

				'bag-hanger' => __( 'Bag hanger', 'rwmb' ),

				'pillbox' => __( 'Pillbox', 'rwmb' ),

				'stickers' => __( 'Stickers', 'rwmb' ),

				'magnet' => __( 'Magnet', 'rwmb' ),

				'phone-accessories' => __( 'Phone accessories', 'rwmb' ),

				'office-accessories' => __( 'Office accessories', 'rwmb' ),

				'wearable' => __( 'Wearable', 'rwmb' ),

			),

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// LOGO PROCESS
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Logo process', 'rwmb' ),

			'id'   => "{$prefix}logo_process",

			'type' => 'checkbox_list',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'ODD' => __( 'ODD', 'rwmb' ),

				'OP' => __( 'OP', 'rwmb' ),

				'PP' => __( 'PP', 'rwmb' ),

				'LR' => __( 'LR', 'rwmb' ),

				'OD' => __( 'OD', 'rwmb' ),

				'BS' => __( 'BS', 'rwmb' ),

				'OX' => __( 'OX', 'rwmb' ),

				'soft_pvc' => __( 'Soft PVC', 'rwmb' ),
		
				'offset-aluminium' => __( 'Offset aluminium', 'rwmb' ),
				'offset-brass' => __( 'Offset brass', 'rwmb' ),
				'offset-steel' => __( 'Offset steel', 'rwmb' ),
				'brass-blind-stamping' => __( 'Brass blind stamping', 'rwmb' ),
				'brass-stamping-soft-enamel' => __( 'Brass stamping soft enamel', 'rwmb' ),
				'brass-photo-etching-soft-enamel' => __( 'Brass photo etching soft enamel', 'rwmb' ),
				'brass-stamping-soft-enamel' => __( 'Brass stamping soft enamel', 'rwmb' ),
				'iron-blind-stamping' => __( 'Iron blind stamping', 'rwmb' ),
				'iron-hard-enamel' => __( 'Iron hard enamel', 'rwmb' ),
				'Iron-soft-enamel' => __( 'Iron soft enamel', 'rwmb' ),
				'Iron-digital-printing' => __( 'Iron digital printing', 'rwmb' ),
				'zanac-3D' => __( 'Zanac 3D', 'rwmb' ),
				'zamac-hard-enamel' => __( 'Zamac Hard enamel', 'rwmb' ),
				'zanac-soft-enamel' => __( 'Zanac soft enamel', 'rwmb' ),
				'zamac-doming' => __( 'Zamac doming', 'rwmb' )


			),

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// YOU MIGHT ALSO LIKE
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

		'name' => __( 'You might also like', 'rwmb' ),

		'id' => "{$prefix}alos_like",

		'type' => 'plupload_image',

		'max_file_uploads' => 1,

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER COMMON
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Common', 'rwmb' ),

			'id'   => "{$prefix}document_center_common_file",

			'type' => 'file',

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER DISTRIBUTOR
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Distributors', 'rwmb' ),

			'id'   => "{$prefix}document_center_distributors_file",

			'type' => 'file',

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER SUPPLIERS
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Suppliers', 'rwmb' ),

			'id'   => "{$prefix}document_center_suppliers_file",

			'type' => 'file',

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// SUPPLIERS PROGRAM
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Supplier program', 'rwmb' ),

			'id'   => "{$prefix}supplier_program",

			'type' => 'checkbox_list',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'ODD' => __( 'ODD', 'rwmb' ),

				'OD' => __( 'OD', 'rwmb' ),

				'LR' => __( 'LR', 'rwmb' ),

				'PP' => __( 'PP', 'rwmb' ),

			),

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// SALES PROGRAM
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Sales program', 'rwmb' ),

			'id'   => "{$prefix}sales_program",

			'type' => 'checkbox_list',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'ODD' => __( 'ODD', 'rwmb' ),

				'OD' => __( 'OD', 'rwmb' ),

				'LR' => __( 'LR', 'rwmb' ),

				'PP' => __( 'PP', 'rwmb' ),

			),

		)
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		
		
		//////////////////////////////////////////////////////////////////////////////////////////////////////

	));



	// METABOX LOGO PROCESS

	$meta_boxes[] = array(

	// Meta box id, UNIQUE per meta box. Optional since 4.1.5

	'id' => 'standard',



	// Meta box title - Will appear at the drag and drop handle bar. Required.

	'title' => __( 'Standard Fields', 'rwmb' ),



	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.

	'pages' => array( 'logo-process' ),



	// Where the meta box appear: normal (default), advanced, side. Optional.

	'context' => 'normal',



	// Order of meta box: high (default), low. Optional.

	'priority' => 'high',



	// Auto save: true, false (default). Optional.

	'autosave' => true,



	// List of meta fields

	'fields' => array(

		// COLORS
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Colors', 'rwmb' ),

			'id'   => "{$prefix}colors",

			'type' => 'checkbox_list',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'no-color' => __( 'No color', 'rwmb' ),

				'1-color' => __( '1 color', 'rwmb' ),

				'4-colors' => __( '4 colors', 'rwmb' ),

				'quadrichrome' => __( 'Quadrichrome', 'rwmb' ),

			),

		),
		
		// TIME DELIVERY / QUANTITY 1000k
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Time delivery / Quantity : 1000k', 'rwmb' ),

			'id'   => "{$prefix}time_delivery_1000k",

			'type' => 'select',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'1-week' => __( '1 week', 'rwmb' ),

				'2-week' => __( '2 weeks', 'rwmb' ),

				'3-week' => __( '3 weeks', 'rwmb' ),

				'4-week' => __( '4 weeks', 'rwmb' ),
		
				'5-week' => __( '5 weeks', 'rwmb' ),
		
				'6-week' => __( '6 weeks', 'rwmb' ),

			),

		) ,
		
		array(

			'name' => __( 'Time delivery / Quantity : 5000k', 'rwmb' ),

			'id'   => "{$prefix}time_delivery_5000k",

			'type' => 'select',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'1-week' => __( '1 week', 'rwmb' ),

				'2-week' => __( '2 weeks', 'rwmb' ),

				'3-week' => __( '3 weeks', 'rwmb' ),

				'4-week' => __( '4 weeks', 'rwmb' ),
		
				'5-week' => __( '5 weeks', 'rwmb' ),
		
				'6-week' => __( '6 weeks', 'rwmb' ),

			),

		) ,
		
		array(

			'name' => __( 'Time delivery / Quantity : 10000k', 'rwmb' ),

			'id'   => "{$prefix}time_delivery_10000k",

			'type' => 'select',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'1-week' => __( '1 week', 'rwmb' ),

				'2-week' => __( '2 weeks', 'rwmb' ),

				'3-week' => __( '3 weeks', 'rwmb' ),

				'4-week' => __( '4 weeks', 'rwmb' ),
		
				'5-week' => __( '5 weeks', 'rwmb' ),
		
				'6-week' => __( '6 weeks', 'rwmb' ),

			),

		) ,
		
		array(

			'name' => __( 'Time delivery / Quantity : 50000k', 'rwmb' ),

			'id'   => "{$prefix}time_delivery_50000k",

			'type' => 'select',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'1-week' => __( '1 week', 'rwmb' ),

				'2-week' => __( '2 weeks', 'rwmb' ),

				'3-week' => __( '3 weeks', 'rwmb' ),

				'4-week' => __( '4 weeks', 'rwmb' ),
		
				'5-week' => __( '5 weeks', 'rwmb' ),
		
				'6-week' => __( '6 weeks', 'rwmb' ),

			),

		) ,
		
		array(

			'name' => __( 'Time delivery / Quantity : 100000k', 'rwmb' ),

			'id'   => "{$prefix}time_delivery_100000k",

			'type' => 'select',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'1-week' => __( '1 week', 'rwmb' ),

				'2-week' => __( '2 weeks', 'rwmb' ),

				'3-week' => __( '3 weeks', 'rwmb' ),

				'4-week' => __( '4 weeks', 'rwmb' ),
		
				'5-week' => __( '5 weeks', 'rwmb' ),
		
				'6-week' => __( '6 weeks', 'rwmb' ),

			),

		) ,
		
		)
		
);
	
	






/********************* META BOX REGISTERING ***********************/



/**

 * Register meta boxes

 *

 * @return void

 */

function PRODUCT_register_meta_boxes()

{

	// Make sure there's no errors when the plugin is deactivated or during upgrade

	if ( !class_exists( 'RW_Meta_Box' ) )

		return;



	global $meta_boxes;

	foreach ( $meta_boxes as $meta_box )

	{

		new RW_Meta_Box( $meta_box );

	}

}

// Hook to 'admin_init' to make sure the meta box class is loaded before

// (in case using the meta box class in another plugin)

// This is also helpful for some conditionals like checking page template, categories, etc.

add_action( 'admin_init', 'PRODUCT_register_meta_boxes' );

