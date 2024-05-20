<?php 
	add_action( 'wp_enqueue_scripts', 'astra_child_enqueue_styles', 11);
	function astra_child_enqueue_styles() {
		wp_enqueue_style( 'child-style', get_stylesheet_uri() );
	} 

	function create_request_quote_table() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'request_quote';

		if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			$charset_collate = $wpdb->get_charset_collate();

			$sql = "CREATE TABLE $table_name (
				id mediumint(9) NOT NULL AUTO_INCREMENT,
				name text NOT NULL,
				email text NOT NULL,
				message text NOT NULL,
				submitted_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
				PRIMARY KEY (id)
			) $charset_collate;";

			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	}
	add_action('after_setup_theme', 'create_request_quote_table');

	function save_wpforms_data_to_request_quote_table($fields, $entry, $form_data) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'request_quote';
	
		// Extract form data
		$name = isset($fields[0]['value']) ? sanitize_text_field($fields[0]['value']) : '';
		$email = isset($fields[1]['value']) ? sanitize_email($fields[1]['value']) : '';
		$message = isset($fields[2]['value']) ? sanitize_textarea_field($fields[2]['value']) : '';
		$wpdb->insert(
			$table_name,
			array(
				'name' => $name,
				'email' => $email,
				'message' => $message,
				'submitted_at' => current_time('mysql')
			)
		);
	}
	add_action('wpforms_process_complete', 'save_wpforms_data_to_request_quote_table', 10, 3);
