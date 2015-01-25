<?php

/*
Plugin Name: Advanced Custom Fields: Autocomplete
Plugin URI: https://github.com/cadic/Advanced-Custom-Fields-Autocomplete
Description: Simple field that looks up values previously entered for this field.
Version: 1.0.0
Author: Brian S. Reed, Max Lyuchin
Author URI: http://iambrian.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/


// Load ACF5
load_plugin_textdomain( 'acf-autocomplete', false, dirname( plugin_basename(__FILE__) ) . '/lang/' ); 

function include_field_types_autocomplete( $version ) {
	
	include_once('acf-autocomplete.php');
	
}

add_action('acf/include_field_types', 'include_field_types_autocomplete');	

// Load ACF4
function register_fields_autocomplete() {
	
	include_once('acf-autocomplete-v4.php');
	
}

add_action('acf/register_fields', 'register_fields_autocomplete');

?>