<?php
/* 
Plugin Name: WP HTTP Compression
Plugin URI: http://desalasworks.com/wordpress-compression-plugin/
Version: 1.0
Description: This plugin allows you WordPress blog to output pages compressed in gzip format if a browser supports compression. HTTP compression generally means a 60-80% REDUCTION in the size of your pages (broadband usage) as well as an INCREASE in download speeds of 3x to 4x.
Author: Steven de Salas
Author URI: http://desalasworks.com/
*/
 
/* Copyright 2010 Steven de Salas  (email : steven@desalasworks.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version. */

function wp_http_compression() {
	
	// Dont use on Admin HTML editor
	if (stripos($uri, '/js/tinymce') !== false) 
		return false;
		
	// Check if ob_gzhandler already loaded
	if (ini_get('output_handler') == 'ob_gzhandler')
		return false;
		
	// Load HTTP Compression if correct extension is loaded
	if (extension_loaded('zlib')) 
			if(!ob_start("ob_gzhandler")) ob_start();
}
add_action('init', 'wp_http_compression');
?>
