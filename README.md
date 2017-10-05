=== Advanced Custom Fields: Autocomplete Field ===

Contributors: Brian S. Reed, Max Lyuchin, Tiago Neto
Requires at least: 3.5
Tested up to: 3.8.1
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simple field that looks up values previously entered for this field. Or you can add a custom WP action to handle your custom autocomplete suggestions.

== Description ==

This is a simple field that looks up values previously entered for this field. This plugin is great for posts that will have a common set of values for the same field but where taxonomy isn't applicable. Plugin uses WordPress core's jQuery UI Autocomplete.

With minimum knowlegde about WP Actions you can also create a custom function to handle the autocomplete the way you need.

= Compatibility =

This ACF field type is compatible with:
* ACF 5
* ACF 4

== Installation ==

1. Copy the `acf-field-type-autocomplete` folder into your `wp-content/plugins` folder
2. Activate the Advanced Custom Fields: Autocomplete plugin via the plugins admin page
3. Create a new field via ACF and select the Autocomplete type
4. Please refer to the description for more info regarding the field type settings

== Custom WP Action ==

```
    public function custom_ajax_callback() {

        global $wpdb;

        $results = array();

        // $_REQUEST['field_key'] => Field name
        // $_REQUEST['request'] => Text being searched

        // {Your custom code}

        echo json_encode($results);

        wp_die();

    }

    add_action( 'wp_ajax_custom_ajax_callback', array( $this, 'custom_ajax_callback' ) );
```

== Changelog ==

= 1.0.0 =
* Initial Release.
