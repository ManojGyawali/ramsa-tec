<?php
/**
 * Plugin Name: Request Quotes
 * Description: Display request quote data in admin dashboard.
 * Version: 1.0
 * Author: 3bird
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Create a custom admin menu
function custom_request_quote_menu() {
    add_menu_page(
        'Request Quotes',
        'Request Quotes',
        'manage_options',
        'request_quotes',
        'request_quotes_page',
        'dashicons-list-view',
        26
    );
}
add_action('admin_menu', 'custom_request_quote_menu');

// Display the custom form entries page
function request_quotes_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'request_quote';
    
    // Fetch data from the custom table
    $entries = $wpdb->get_results("SELECT * FROM $table_name");

    ?>
    <div class="wrap">
        <h1>Request Quotes</h1>
        <table class="widefat fixed" cellspacing="0">
            <thead>
                <tr>
                    <th id="columnname" class="manage-column column-columnname" scope="col">ID</th>
                    <th id="columnname" class="manage-column column-columnname" scope="col">Name</th>
                    <th id="columnname" class="manage-column column-columnname" scope="col">Email</th>
                    <th id="columnname" class="manage-column column-columnname" scope="col">Message</th>
                    <th id="columnname" class="manage-column column-columnname" scope="col">Submitted At</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($entries) : ?>
                    <?php foreach ($entries as $entry) : ?>
                        <tr>
                            <td><?php echo esc_html($entry->id); ?></td>
                            <td><?php echo esc_html($entry->name); ?></td>
                            <td><?php echo esc_html($entry->email); ?></td>
                            <td><?php echo esc_html($entry->message); ?></td>
                            <td><?php echo esc_html($entry->submitted_at); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">No entries found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}
