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

		'type' => 'plupload_image',

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

		'name' => __( 'First imaGGge', 'rwmb' ),

		'id' => "{$prefix}first_image",

		'type' => 'thickbox_image',

		),
		
		// LIEN PICASA
		array(

			// Field name - Will be used as label

			'name'  => __( 'sdfsdf gallery', 'rwmb' ),

			'std'   => __( '', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}ysdfsdf",

			'type'  => 'text'

		),
			
                
		// LOGO ¨PROCESS //////////////////////////////////////////////////////////////////////////////////////////////////////

		// IMAGE LOGO PROCESS 1

		array(

		'name' => __( 'Image Logo process 1', 'rwmb' ),

		'id' => "{$prefix}image_logo_process_1",

		'type' => 'plupload_image',

		'max_file_uploads' => 4,

		),

		// TITRE LOGO PROCESS 1

		array(

			// Field name - Will be used as label

			'name'  => __( 'Logo process 1', 'rwmb' ),

			'std'   => __( '', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}titre_logo_process_1",

			'type'  => 'text'

		),

		// IMAGE LOGO PROCESS 2

		array(

		'name' => __( 'Image Logo process 2', 'rwmb' ),

		'id' => "{$prefix}image_logo_process_2",

		'type' => 'plupload_image',

		'max_file_uploads' => 4,

		),

		// TITRE LOGO PROCESS 2

		array(

			// Field name - Will be used as label

			'name'  => __( 'Logo process 2', 'rwmb' ),

			'std'   => __( '', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}titre_logo_process_2",

			'type'  => 'text'

		),

		// IMAGE LOGO PROCESS 3

		array(

		'name' => __( 'Image Logo process 3', 'rwmb' ),

		'id' => "{$prefix}image_logo_process_3",

		'type' => 'plupload_image',

		'max_file_uploads' => 4,

		),

		// TITRE LOGO PROCESS 3

		array(

			// Field name - Will be used as label

			'name'  => __( 'Logo process 3', 'rwmb' ),

			'std'   => __( '', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}titre_logo_process_3",

			'type'  => 'text'

		),

		// IMAGE LOGO PROCESS 4

		array(

		'name' => __( 'Image Logo process 4', 'rwmb' ),

		'id' => "{$prefix}image_logo_process_4",

		'type' => 'plupload_image',

		'max_file_uploads' => 4,

		),

		// TITRE LOGO PROCESS 4

		array(

			// Field name - Will be used as label

			'name'  => __( 'Logo process 4', 'rwmb' ),

			'std'   => __( '', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}titre_logo_process_4",

			'type'  => 'text'

		),
		
			// IMAGE LOGO PROCESS 4

		array(

		'name' => __( 'FFFFFFFFFFFFFFF', 'rwmb' ),

		'id' => "{$prefix}image_logo_process_5",

		'type' => 'plupload_image',

		'max_file_uploads' => 4,

		),
		

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

