<?php

class acf_field_autocomplete extends acf_field {

	// vars
	var $settings, // will hold info such as dir / path
		$defaults; // will hold default field options


	function __construct()
	{

		// vars
		$this->name = 'autocomplete';
		$this->label = __('Autocomplete');
		$this->category = __("Basic",'acf'); // Basic, Content, Choice, etc
		$this->defaults = array();

		// do not delete!
    	parent::__construct();

 		add_action( 'wp_ajax_autocomplete_ajax', array( $this, 'autocomplete_ajax_callback' ) );

	}


	public function autocomplete_ajax_callback() {

		global $wpdb;

		$results = array();

		$results = $wpdb->get_col( $wpdb->prepare( "
	        SELECT DISTINCT meta_value FROM {$wpdb->postmeta}
	        WHERE meta_key = '%s'
	        AND meta_value LIKE %s
			", $_REQUEST['field_key'], '%'.$_REQUEST['request'].'%' ) );

		echo json_encode($results);

		wp_die();

	}

    function create_options( $field )
    	{
    		// defaults?
    		/*
    		$field = array_merge($this->defaults, $field);
    		*/

    		// key is needed in the field names to correctly save the data
    		$key = $field['name'];


    		// Create Field Options HTML
    		?>
    <tr class="field_option field_option_<?php echo $this->name; ?>">
    	<td class="label">
    		<label><?php _e("WP Action",'acf'); ?></label>
    		<p class="description"><?php _e("WP Action that will handle and deliver the autocomplete suggestions",'acf'); ?></p>
    	</td>
    	<td>
    		<?php

    		do_action('acf/create_field', array(
    			'type'		=>	'text',
    			'name'		=>	'fields['.$key.'][wp_action]',
    			'value'		=>	$field['wp_action']
    		));

    		?>
    	</td>
    </tr>
    		<?php

    	}

	function create_field( $field )
	{

		?>
		<input type="text" name="<?php echo esc_attr($field['name']) ?>" value="<?php echo esc_attr($field['value']) ?>" data-action="<?php echo esc_attr($field['wp_action']) ?>" />
		<?php

	}


	function input_admin_enqueue_scripts()
	{

		$dir = plugin_dir_url( __FILE__ );

		wp_register_script( 'acf-input-autocomplete', "{$dir}js/input.js", array( "jquery-ui-autocomplete" ) );
		wp_enqueue_script('acf-input-autocomplete');

		wp_register_style( 'acf-input-autocomplete', "{$dir}css/input.css", array('acf-input') );
		wp_enqueue_style('acf-input-autocomplete');

	}


	function update_value( $value, $post_id, $field )
	{
		// Trim to remove duplicity
		return trim($value);
	}

}


// create field
new acf_field_autocomplete();

?>
