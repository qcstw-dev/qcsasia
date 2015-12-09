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
		
		// FILE PDF

		array(

			'name' => __( 'PDF file', 'rwmb' ),

			'id'   => "{$prefix}pdf_file",

			'type' => 'text',
		
			'size'	=> '70'

		),
		
		// DIRECT //////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

		'name' => __( 'Without category', 'rwmb' ),

		'id' => "{$prefix}without_category",

		'type' => 'checkbox',

		),
		
		// ICON
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

		'name' => __( 'Icon Cartouche', 'rwmb' ),

		'id' => "{$prefix}icon_cartouche",

		'type' => 'plupload_image',

		'max_file_uploads' => 4,

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
		// IMAGE NEW PRODUCT
		array(

		'name' => __( 'Image New product', 'rwmb' ),

		'id' => "{$prefix}image_new_product",

		'type' => 'plupload_image',

		'max_file_uploads' => 1,

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
		
		// DISPLAY IMAGE FINISHES //////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

		'name' => __( 'Display image finishes', 'rwmb' ),

		'id' => "{$prefix}display_image_finishes",

		'type' => 'checkbox',

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
		
		// COLOR LINK
		
		array(

			// Field name - Will be used as label

			'name'  => __( 'Color link', 'rwmb' ),

			'std'   => __( '', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}color_link",

			'type'  => 'text'

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

		

		// IMAGE LOGO ¨PROCESS 1 //////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

		'name' => __( 'Image Logo process 1', 'rwmb' ),

		'id' => "{$prefix}tab_image_process_1",

		'type' => 'plupload_image',

		'max_file_uploads' => 4,

		),
		
		// IMAGE LOGO ¨PROCESS 2 //////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

		'name' => __( 'Image Logo process 2', 'rwmb' ),

		'id' => "{$prefix}tab_image_process_2",

		'type' => 'plupload_image',

		'max_file_uploads' => 4,

		),
		
		// IMAGE LOGO ¨PROCESS 1 //////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

		'name' => __( 'Image Logo process 3', 'rwmb' ),

		'id' => "{$prefix}tab_image_process_3",

		'type' => 'plupload_image',

		'max_file_uploads' => 4,

		),
		
		// IMAGE LOGO ¨PROCESS 4 //////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

		'name' => __( 'Image Logo process 4', 'rwmb' ),

		'id' => "{$prefix}tab_image_process_4",

		'type' => 'plupload_image',

		'max_file_uploads' => 4,

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
		),
		
		// ORDRE NEW PRODUCT

		array(

			// Field name - Will be used as label

			'name'  => __( 'New product order', 'rwmb' ),

			'std'   => __( '', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}new_product_order",

			'type'  => 'text',

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// CHEAP ITEM 
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

		'name' => __( 'Cheap Item', 'rwmb' ),

		'id' => "{$prefix}cheap_item",

		'type' => 'checkbox',

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

				'magnet-stickers' => __( 'Magnet and stickers', 'rwmb' ),

				'label-pins' => __( 'Label pins', 'rwmb' ),

				'bottle-opener' => __( 'Bottle opener / Bar accessories', 'rwmb' ),

				'bag-hanger' => __( 'Bag hanger', 'rwmb' ),

				'container-canister' => __( 'Container and canister', 'rwmb' ),		

				'phone-accessories' => __( 'Phone accessories', 'rwmb' ),

				'office-awards' => __( 'Office and awards', 'rwmb' ),

				'wearable' => __( 'Wearable', 'rwmb' ),

				'led-products' => __( 'LED products', 'rwmb' ),

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

				'2D-PVC-Cloisonne' => __( '2D PVC Cloisonne', 'rwmb' ),

				'3D-PVC-Cloisonne' => __( '3D PVC Cloisonne', 'rwmb' ),

				'Laser-engraving' => __( 'LR: Laser engraving', 'rwmb' ),

				'Silk-screen-printing' => __( 'PP: Silk screen printing', 'rwmb' ),

				'Digitel-printing' => __( 'OD: Digital printing', 'rwmb' ),

				'Doming' => __( 'ODD: Doming', 'rwmb' ),
				
				'Offset-printing' => __( 'OP : Offset printing', 'rwmb' ),
				
				'Epoxy' => __( 'OX: Offset printing label', 'rwmb' ),
				
				'Blind-stamping' => __( 'BS: Blind stamping', 'rwmb' ),
				
				'Soft-enamel' => __( 'Soft enamel', 'rwmb' ),
				
				'Woven-enamel' => __( 'STW: Woven enamel', 'rwmb' ),
				
				'Pvc-label' => __( 'STC: PVC label', 'rwmb' ),
				
				'Zamac' => __( 'Zamac', 'rwmb' ),
				
				'Brass' => __( 'Brass', 'rwmb' ),
				
				'Iron' => __( 'Iron', 'rwmb' ),
		
				'Offset' => __( 'Offset', 'rwmb' ),

			),

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// YOU MIGHT ALSO LIKE
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

		'name' => __( 'You might also like', 'rwmb' ),

		'id' => "{$prefix}also_like",

		'type' => 'plupload_image',

		'max_file_uploads' => 1,

		),
		
		// TTITLE YOU MIGHT ALSO LIKE

		array(

			// Field name - Will be used as label

			'name'  => __( 'Caption For image You Might Also Like', 'rwmb' ),

			'std'   => __( '', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}caption_might_also_like",

			'type'  => 'text'

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
		// CHECKBOX DOCUMENT CENTER
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

		'name' => __( 'Document center', 'rwmb' ),

		'id' => "{$prefix}document_center",

		'type' => 'checkbox',

		),
		

		// DOCUMENT CENTER DISTRIBUTOR
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Pricelist Distributors 1', 'rwmb' ),

			'id'   => "{$prefix}document_center_distributors_file",

			'type'  => 'text' ,
		
			'size'	=> '70'

		),
		
		array(
		
				'name' => __( 'Document center - Pricelist Distributors 2', 'rwmb' ),
		
				'id'   => "{$prefix}document_center_distributors_file_2",
		
				'type'  => 'text' ,
		
				'size'	=> '70'
		
						),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER SUPPLIERS
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Pricelist 1 suppliers', 'rwmb' ),

			'id'   => "{$prefix}document_center_suppliers_file",

			'type'  => 'text' ,
		
			'size'	=> '70'

		),
		
		array(
		
			'name' => __( 'Document center - Pricelist 2 suppliers', 'rwmb' ),
		
			'id'   => "{$prefix}document_center_suppliers_file_2",
		
			'type'  => 'text' ,
		
			'size'	=> '70'
		
		),
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 1
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 1', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_1",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 2
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 2', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_2",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 3
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 3', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_3",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 4
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 4', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_4",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 5
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 5', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_5",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 6
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 6', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_6",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 7
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 7', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_7",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 8
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 8', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_8",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 9
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 9', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_9",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 10
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 10', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_10",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 11
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 11', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_11",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 12
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 12', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_12",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 13
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 13', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_13",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 14
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 14', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_14",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 15
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 15', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_15",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 16
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 16', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_16",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 17
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 17', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_17",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 18
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 18', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_18",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 19
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 19', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_19",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// DOCUMENT CENTER - PICTURE HIGH DEFINITIONS 20
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Picture high definition 20', 'rwmb' ),

			'id'   => "{$prefix}document_center_picture_high_definition_20",

			'type'  => 'text' ,
		
			'size'	=> '70'
 
		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		
		
		
		// DOCUMENT CENTER - DIGITAL DRAWING
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Digital Drawing', 'rwmb' ),

			'id'   => "{$prefix}document_center_digital_drawing",

			'type'  => 'text' ,
		
			'size'	=> '70'

		),
		
		// DOCUMENT CENTER - LOGO STANDARD
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Logo standard', 'rwmb' ),

			'id'   => "{$prefix}document_center_logo_standard",

			'type'  => 'text' ,
		
			'size'	=> '70'

		),
		
		// DOCUMENT CENTER - PATENT
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Patent', 'rwmb' ),

			'id'   => "{$prefix}document_center_patent",

			'type'  => 'text' ,
		
			'size'	=> '70'

		),
		
		// DOCUMENT CENTER - CERTIFICATION
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Certification', 'rwmb' ),

			'id'   => "{$prefix}document_center_certification",

			'type'  => 'text' ,
		
			'size'	=> '70'

		),
		
		// DOCUMENT CENTER - OTHER DOCUMENTS
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Document center - Other documents', 'rwmb' ),

			'id'   => "{$prefix}document_center_other_documents",

			'type'  => 'text' ,
		
			'size'	=> '70'

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// ACTIVZTE SUPPLIER PROGRAM  //////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

		'name' => __( 'Activate supplier program', 'rwmb' ),

		'id' => "{$prefix}activate_supplier_program",

		'type' => 'checkbox',

		),
		
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
		
		// ACTIVZTE SALES PROGRAM  //////////////////////////////////////////////////////////////////////////////////////////////////////

		array(

		'name' => __( 'Activate sales program', 'rwmb' ),

		'id' => "{$prefix}activate_sales_program",

		'type' => 'checkbox',

		),
		
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

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// PROGRAM ITEM
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Program item', 'rwmb' ),

			'id'   => "{$prefix}program_item",

			'type' => 'checkbox_list',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'YES' => __( 'YES', 'rwmb' ),

				'NO' => __( 'NO', 'rwmb' ),

			),

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		// PATENTED ITEM
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Patented item', 'rwmb' ),

			'id'   => "{$prefix}patented_item",

			'type' => 'checkbox_list',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'YES' => __( 'YES', 'rwmb' ),

				'NO' => __( 'NO', 'rwmb' ),

			),

		)
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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
	
		// ORDRE

		array(

			// Field name - Will be used as label

			'name'  => __( 'Sort', 'rwmb' ),

			'std'   => __( '', 'rwmb' ),

			// Field ID, i.e. the meta key

			'id'    => "{$prefix}logo_process_sort",

			'type'  => 'text'

		),

		// COLORS
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Colors', 'rwmb' ),

			'id'   => "{$prefix}colors",

			'type' => 'checkbox_list',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'0' => __( 'No color', 'rwmb' ),

				'1' => __( '1 color', 'rwmb' ),

				'4' => __( '4 colors', 'rwmb' ),

				'5' => __( 'Full colour', 'rwmb' ),

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

				'NA' => __( 'N/A', 'rwmb' ),
		
				'1' => __( '1 week', 'rwmb' ),

				'2' => __( '2 weeks', 'rwmb' ),

				'3' => __( '3 weeks', 'rwmb' ),

				'4' => __( '4 weeks', 'rwmb' ),
		
				'5' => __( '5 weeks', 'rwmb' ),
		
				'6' => __( '6 weeks', 'rwmb' ),

			),

		) ,
		
		array(

			'name' => __( 'Time delivery / Quantity : 5000k', 'rwmb' ),

			'id'   => "{$prefix}time_delivery_5000k",

			'type' => 'select',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(
		
				'NA' => __( 'N/A', 'rwmb' ),

				'1' => __( '1 week', 'rwmb' ),

				'2' => __( '2 weeks', 'rwmb' ),

				'3' => __( '3 weeks', 'rwmb' ),

				'4' => __( '4 weeks', 'rwmb' ),
		
				'5' => __( '5 weeks', 'rwmb' ),
		
				'6' => __( '6 weeks', 'rwmb' ),

			),

		) ,
		
		array(

			'name' => __( 'Time delivery / Quantity : 10000k', 'rwmb' ),

			'id'   => "{$prefix}time_delivery_10000k",

			'type' => 'select',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(
		
				'NA' => __( 'N/A', 'rwmb' ),

				'1' => __( '1 week', 'rwmb' ),

				'2' => __( '2 weeks', 'rwmb' ),

				'3' => __( '3 weeks', 'rwmb' ),

				'4' => __( '4 weeks', 'rwmb' ),
		
				'5' => __( '5 weeks', 'rwmb' ),
		
				'6' => __( '6 weeks', 'rwmb' ),

			),

		) ,
		
		array(

			'name' => __( 'Time delivery / Quantity : 50000k', 'rwmb' ),

			'id'   => "{$prefix}time_delivery_50000k",

			'type' => 'select',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(
		
				'NA' => __( 'N/A', 'rwmb' ),

				'1' => __( '1 week', 'rwmb' ),

				'2' => __( '2 weeks', 'rwmb' ),

				'3' => __( '3 weeks', 'rwmb' ),

				'4' => __( '4 weeks', 'rwmb' ),
		
				'5' => __( '5 weeks', 'rwmb' ),
		
				'6' => __( '6 weeks', 'rwmb' ),

			),

		) ,
		
		array(

			'name' => __( 'Time delivery / Quantity : 100000k', 'rwmb' ),

			'id'   => "{$prefix}time_delivery_100000k",

			'type' => 'select',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(
		
				'NA' => __( 'N/A', 'rwmb' ),

				'1' => __( '1 week', 'rwmb' ),

				'2' => __( '2 weeks', 'rwmb' ),

				'3' => __( '3 weeks', 'rwmb' ),

				'4' => __( '4 weeks', 'rwmb' ),
		
				'5' => __( '5 weeks', 'rwmb' ),
		
				'6' => __( '6 weeks', 'rwmb' ),

			),

		) ,
		
		// LOGO PROCESS
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		
		array(

			'name' => __( 'Logo process', 'rwmb' ),

			'id'   => "{$prefix}_logo_process_logo_process",

			'type' => 'checkbox_list',

			// Options of checkboxes, in format 'value' => 'Label'

			'options' => array(

				'2D-PVC-Cloisonne' => __( '2D PVC Cloisonne', 'rwmb' ),

				'3D-PVC-Cloisonne' => __( '3D PVC Cloisonne', 'rwmb' ),

				'Laser-engraving' => __( 'LR: Laser engraving', 'rwmb' ),

				'Silk-screen-printing' => __( 'PP: Silk screen printing', 'rwmb' ),

				'Digitel-printing' => __( 'OD: Digitel printing', 'rwmb' ),

				'Doming' => __( 'ODD: Doming', 'rwmb' ),
				
				'Offset-printing' => __( 'OP : Offset printing', 'rwmb' ),
				
				'Epoxy' => __( 'OX Epoxy', 'rwmb' ),
				
				'Blind-stamping' => __( 'BS: Blind stamping', 'rwmb' ),
				
				'Soft-enamel' => __( 'Soft enamel', 'rwmb' ),
				
				'Woven-enamel' => __( 'STW: Woven enamel', 'rwmb' ),
				
				'Pvc-label' => __( 'STC: PVC label', 'rwmb' ),
				
				'Zamac' => __( 'Zamac', 'rwmb' ),
				
				'Brass' => __( 'Brass', 'rwmb' ),
				
				'Iron' => __( 'Iron', 'rwmb' ),
		
				'Offset' => __( 'Offset', 'rwmb' ),

			),

		),
		
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		)
		
	
	
		
);
	
	

// METABOX LOGO PROCESS

	$meta_boxes[] = array(

	// Meta box id, UNIQUE per meta box. Optional since 4.1.5

	'id' => 'standard',



	// Meta box title - Will appear at the drag and drop handle bar. Required.

	'title' => __( 'Standard Fields', 'rwmb' ),



	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.

	'pages' => array( 'productcat' ),



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

		)
		
);

	
// GIFT 
////////////////////////////////////////////////////////////////////////////////////////////////////////

	require_once("metabox/gift.php");

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

