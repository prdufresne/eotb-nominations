<?php
/**
 * Plugin Name:       EOTB Nominations
 * Description:       Used to manage nominations for the EOTB election
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Paul Dufresne
 * License:           MIT
 * License URI:       https://github.com/prdufresne/civi-react-events/blob/main/LICENSE
 * Text Domain:       civi_react_events
 */

namespace EotbNominations;

// add_action( 'admin_menu', __NAMESPACE__ . 'admin_page' );
add_shortcode('eotb-nominations', __NAMESPACE__ . '\render_shortcode');
add_action( 'wp_ajax_eotb_nominations', __NAMESPACE__ . '\user_action' );
add_action( 'wp_ajax_nopriv_eotb_nominations', __NAMESPACE__ . '\non_user_action' );

// Act on plugin activation
register_activation_hook( __FILE__, __NAMESPACE__ . "\activate_myplugin" );

// Act on plugin de-activation
register_deactivation_hook( __FILE__, __NAMESPACE__ . "\deactivate_myplugin" );

function user_action() {

}

function non_user_action() {

}

// Activate Plugin
function activate_myplugin() {
	// Execute tasks on Plugin activation

	// Insert DB Tables
	init_db_myplugin();
}

// De-activate Plugin
function deactivate_myplugin() {
	// Execute tasks on Plugin de-activation
}

// Initialize DB Tables
function init_db_myplugin() {
	// Code to create DB Tables
    global $wpdb;

    $table_positions = $wpdb->prefix . "exec_positions";
    $table_nominations = $wpdb->prefix . "exec_nominations";

    $charset_collate = $wpdb->get_charset_collate();

    $sql_positions = "CREATE TABLE $table_positions (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        position tinytext NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    $sql_nominations = "CREATE TABLE $table_positions (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        position mediumint(9) NOT NULL,
        nominee mediumint(9) NOT NULL,
        nominator mediumint(9) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql_positions );
    dbDelta( $sql_nominations );
}

function render_shortcode() [

]