<?php 

// 1st meta box

$prefix_gift = "GIFT_";

$meta_boxes[] = array(

		// Meta box id, UNIQUE per meta box. Optional since 4.1.5

		'id' => 'standard',



		// Meta box title - Will appear at the drag and drop handle bar. Required.

		'title' => __( 'Standard Fields', 'rwmb' ),



		// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.

		'pages' => array( 'gift' ),



		// Where the meta box appear: normal (default), advanced, side. Optional.

		'context' => 'normal',



		// Order of meta box: high (default), low. Optional.

		'priority' => 'high',



		// Auto save: true, false (default). Optional.

		'autosave' => true,



		// List of meta fields

		'fields' => array(
				
	
	
		// IMAGE NEW GIFT
		array(
		
				'name' => __( 'Image New gift', 'rwmb' ),
		
				'id' => "{$prefix_gift}image_new_gift",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 1,
		
		),

			

		// FILE PDF
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

				'name' => __( 'PDF file', 'rwmb' ),

				'id'   => "{$prefix_gift}pdf_file",

				'type' => 'text',

				'size'	=> '70'

						),

		// DIRECT
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

				'name' => __( 'Without category', 'rwmb' ),

				'id' => "{$prefix_gift}without_category",

				'type' => 'checkbox',

		),

		// ICON
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

				'name' => __( 'Icon Cartouche', 'rwmb' ),

				'id' => "{$prefix_gift}icon_cartouche",

				'type' => 'plupload_image',

				'max_file_uploads' => 4,

		),

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		// LOGO SIZE
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

				// Field name - Will be used as label

				'name'  => __( 'Logo size', 'rwmb' ),

				'std'   => __( '40*18 mm', 'rwmb' ),

				// Field ID, i.e. the meta key

				'id'    => "{$prefix_gift}logo_size",

				'type'  => 'text'

						),

		// ITEM SIZE
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

				// Field name - Will be used as label

				'name'  => __( 'Item size', 'rwmb' ),

				'std'   => __( '135*20 mm', 'rwmb' ),

				// Field ID, i.e. the meta key

				'id'    => "{$prefix_gift}item_size",

				'type'  => 'text'

						),

		// PACKAGING
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

				// Field name - Will be used as label

				'name'  => __( 'Packaging', 'rwmb' ),

				'std'   => __( '1000 pcs/0.023cbm/19.3kg/19.9kg', 'rwmb' ),

				// Field ID, i.e. the meta key

				'id'    => "{$prefix_gift}packaging",

				'type'  => 'text',

				'size'	=> '50'

						),

		// PATENT
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

				// Field name - Will be used as label

				'name'  => __( 'Patent', 'rwmb' ),

				'std'   => __( '0236698', 'rwmb' ),

				// Field ID, i.e. the meta key

				'id'    => "{$prefix_gift}patent",

				'type'  => 'text'

						),


		// IMAGE SITUATION
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

				'name' => __( 'Image Situation', 'rwmb' ),

				'id' => "{$prefix_gift}image_situation",

				'type' => 'thickbox_image',

				'max_file_uploads' => 4,

		),

		// DISPLAY IMAGE FINISHES 
		//////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

				'name' => __( 'Display image finishes', 'rwmb' ),

				'id' => "{$prefix_gift}display_image_finishes",

				'type' => 'checkbox',

		),

		// COULEURS
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

				'name' => __( 'Colors', 'rwmb' ),

				'id'   => "{$prefix_gift}colors",

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

		// COLOR LINK
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

				// Field name - Will be used as label

				'name'  => __( 'Color link', 'rwmb' ),

				'std'   => __( '', 'rwmb' ),

				// Field ID, i.e. the meta key

				'id'    => "{$prefix_gift}color_link",

				'type'  => 'text'

						),

		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		// YOU MIGHT ALSO LIKE
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

				'name' => __( 'You might also like', 'rwmb' ),

				'id' => "{$prefix_gift}also_like",

				'type' => 'plupload_image',

				'max_file_uploads' => 1,

		),

		// TTITLE YOU MIGHT ALSO LIKE
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

				// Field name - Will be used as label

				'name'  => __( 'Caption For image You Might Also Like', 'rwmb' ),

				'std'   => __( '', 'rwmb' ),

				// Field ID, i.e. the meta key

				'id'    => "{$prefix_gift}caption_might_also_like",

				'type'  => 'text'

						),

						
		// LIEN THEME 1
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name'  => __( 'Lien theme 1', 'rwmb' ),
		
				'id'    => "{$prefix_gift}theme_link_1",
		
				'type'  => 'text',
		
				'size'	=> '50'
		
		),
										
		// Main image THEME 1
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Main image theme 1', 'rwmb' ),
		
				'id' => "{$prefix_gift}theme_image_principale_1",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 1,
		
		),
						

		// IMAGE THEME 1
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

				'name' => __( 'Image theme 1', 'rwmb' ),

				'id' => "{$prefix_gift}theme_image_1",

				'type' => 'plupload_image',

				'max_file_uploads' => 50,

		),

		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// LIEN THEME 2
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name'  => __( 'Lien theme 2', 'rwmb' ),
		
				'id'    => "{$prefix_gift}theme_link_2",
		
				'type'  => 'text',
		
				'size'	=> '50'
		
						),
						
		// Main image THEME 2
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Main image theme 2', 'rwmb' ),
		
				'id' => "{$prefix_gift}theme_image_principale_2",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 1,
		
		),
			
		// IMAGE THEME 2
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

				'name' => __( 'Image theme 2', 'rwmb' ),

				'id' => "{$prefix_gift}theme_image_2",

				'type' => 'plupload_image',

				'max_file_uploads' => 50,

		),

		//////////////////////////////////////////////////////////////////////////////////////////////////////

		// LIEN THEME 3
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name'  => __( 'Lien theme 3', 'rwmb' ),
		
				'id'    => "{$prefix_gift}theme_link_3",
		
				'type'  => 'text',
		
				'size'	=> '50'
		
						),
						
		// Main image THEME 3
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Main image theme 3', 'rwmb' ),
		
				'id' => "{$prefix_gift}theme_image_principale_3",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 1,
		
		),
		
		// IMAGE THEME 3
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

				'name' => __( 'Image theme 3', 'rwmb' ),

				'id' => "{$prefix_gift}theme_image_3",

				'type' => 'plupload_image',

				'max_file_uploads' => 50,

		),
		
		// LIEN THEME 4
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name'  => __( 'Lien theme 4', 'rwmb' ),
		
				'id'    => "{$prefix_gift}theme_link_4",
		
				'type'  => 'text',
		
				'size'	=> '50'
		
						),
		
		// Main image THEME 4
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Main image theme 4', 'rwmb' ),
		
				'id' => "{$prefix_gift}theme_image_principale_4",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 1,
		
		),

		// IMAGE THEME 4
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

				'name' => __( 'Image theme 4', 'rwmb' ),

				'id' => "{$prefix_gift}theme_image_4",

				'type' => 'plupload_image',

				'max_file_uploads' => 50,

		),
		
		// LIEN THEME 5
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name'  => __( 'Lien theme 5', 'rwmb' ),
		
				'id'    => "{$prefix_gift}theme_link_5",
		
				'type'  => 'text',
		
				'size'	=> '50'
		
						),
						
		// Main image THEME 5
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Main image theme 5', 'rwmb' ),
		
				'id' => "{$prefix_gift}theme_image_principale_5",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 1,
		
		),

		// IMAGE THEME 5
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

				'name' => __( 'Image theme 5', 'rwmb' ),

				'id' => "{$prefix_gift}theme_image_5",

				'type' => 'plupload_image',

				'max_file_uploads' => 50,

		),
		
		// LIEN THEME 6
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name'  => __( 'Lien theme 6', 'rwmb' ),
		
				'id'    => "{$prefix_gift}theme_link_6",
		
				'type'  => 'text',
		
				'size'	=> '50'
		
						),
		
		// Main image THEME 6
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Main image theme 6', 'rwmb' ),
		
				'id' => "{$prefix_gift}theme_image_principale_6",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 1,
		
		),
		
		// IMAGE THEME 6
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Image theme 6', 'rwmb' ),
		
				'id' => "{$prefix_gift}theme_image_6",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 50,
		
		),
		
		// LIEN THEME 7
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name'  => __( 'Lien theme 7', 'rwmb' ),
		
				'id'    => "{$prefix_gift}theme_link_7",
		
				'type'  => 'text',
		
				'size'	=> '50'
		
						),
		
		// Main image THEME 7
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Main image theme 7', 'rwmb' ),
		
				'id' => "{$prefix_gift}theme_image_principale_7",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 1,
		
		),
		
		// IMAGE THEME 7
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Image theme 7', 'rwmb' ),
		
				'id' => "{$prefix_gift}theme_image_7",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 50,
		
		),
		
		// LIEN THEME 8
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name'  => __( 'Lien theme 8', 'rwmb' ),
		
				'id'    => "{$prefix_gift}theme_link_8",
		
				'type'  => 'text',
		
				'size'	=> '50'
		
						),
		
		// Main image THEME 8
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Main image theme 8', 'rwmb' ),
		
				'id' => "{$prefix_gift}theme_image_principale_8",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 1,
		
		),
		
		// IMAGE THEME 8
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Image theme 8', 'rwmb' ),
		
				'id' => "{$prefix_gift}theme_image_8",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 50,
		
		),
		
		// LIEN THEME 9
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name'  => __( 'Lien theme 9', 'rwmb' ),
		
				'id'    => "{$prefix_gift}theme_link_9",
		
				'type'  => 'text',
		
				'size'	=> '50'
		
						),
		
		// Main image THEME 9
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Main image theme 9', 'rwmb' ),
		
				'id' => "{$prefix_gift}theme_image_principale_9",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 1,
		
		),
		
		// IMAGE THEME 9
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Image theme 9', 'rwmb' ),
		
				'id' => "{$prefix_gift}theme_image_9",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 50,
		
		),

		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// IMAGE DISPLAY 1 //////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Image display 1', 'rwmb' ),
		
				'id' => "{$prefix_gift}image_display_1",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 10,
		
		),
		
		// IMAGE DISPLAY 2 //////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Image display 2', 'rwmb' ),
		
				'id' => "{$prefix_gift}image_display_2",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 10,
		
		),
		
		// IMAGE DISPLAY 3 //////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Image display 3', 'rwmb' ),
		
				'id' => "{$prefix_gift}image_display_3",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 10,
		
		),
		
		// IMAGE DISPLAY 4 //////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				'name' => __( 'Image display 4', 'rwmb' ),
		
				'id' => "{$prefix_gift}image_display_4",
		
				'type' => 'plupload_image',
		
				'max_file_uploads' => 10,
		
		),
		

		// ID SLIDESHOW
		//////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(
		
				// Field name - Will be used as label
		
				'name'  => __( 'ID Slideshow', 'rwmb' ),
		
				'std'   => __( '', 'rwmb' ),
		
				// Field ID, i.e. the meta key
		
				'id'    => "{$prefix_gift}id_slideshow",
		
				'type'  => 'text'
		
		),
						

		));

?>