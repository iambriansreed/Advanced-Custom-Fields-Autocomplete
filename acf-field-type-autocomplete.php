<?php

/*
Plugin Name: Advanced Custom Fields: Autocomplete
Plugin URI: http://iambrian.com/#/acf-autocomplete
Description: Simple field that looks up values previously entered for this field.
Version: 1.0.0
Author: Brian S. Reed
Author URI: http://iambrian.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

load_plugin_textdomain( 'acf-autocomplete', false, dirname( plugin_basename(__FILE__) ) . '/lang/' ); 

function include_field_types_autocomplete( $version ) {
	
	include_once('acf-autocomplete.php');
	
}

add_action('acf/include_field_types', 'include_field_types_autocomplete');	

	
?>