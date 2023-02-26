<?php
/**
 * Plugin Name:       EOTB Nominations
 * Description:       Used to manage nominations for the EOTB election
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Paul dufresne
 * License:           MIT
 * License URI:       https://github.com/prdufresne/civi-react-events/blob/main/LICENSE
 * Text Domain:       civi_react_events
 */

namespace EotbNominations;

// add_action( 'admin_menu', __NAMESPACE__ . 'admin_page' );
add_shortcode('eotb-nominations', __NAMESPACE__ . '\render_shortcode');
add_action( 'wp_ajax_eotb_nominations', __NAMESPACE__ . '\user_action' );
add_action( 'wp_ajax_nopriv_eotb_nominations', __NAMESPACE__ . '\non_user_action' );

function user_action() {

}

function non_user_action() {
    
}