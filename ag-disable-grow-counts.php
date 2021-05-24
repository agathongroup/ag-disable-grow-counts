<?php
/**
 * Plugin Name: Disable Grow Social Pro Counts
 * Plugin URI: https://agathongroup.com/
 * Description: Disables tallying counts for social networks in the Grow Social Pro plugin.
 * Author: Agathon
 * Author URI: https://www.agathongroup.com/
 * Version: 1.0.0
 * License: GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// remove the actions that refresh share counts on viewing and editing on the frontend as well as
// admin. Use priority 5 so that the actions are removed before they are queued to be fired. They
// will have been enqueued by an earlier action, when the plugin initializes.
add_action( 'wp_head', 'ag_remove_head_shares', 5 );
function ag_remove_head_shares() {
    remove_action( 'wp_head', 'dpsp_refresh_post_share_counts', 10 );
}
add_action( 'admin_head', 'ag_remove_admin_head_shares', 5 );
function ag_remove_admin_head_shares() {
    remove_action( 'admin_head', 'dpsp_refresh_post_share_counts_edit', 10 );
}