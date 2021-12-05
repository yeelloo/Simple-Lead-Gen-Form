<?php

/**
 * Plugin Name:       Simple Lead Gen Form
 * Plugin URI:        https://www.w3CodeMaster.com/Simple-Lead-Gen-Form
 * Description:       Shortcode:<strong>[slgfFrom]</strong> and supported atts: <strong>[title, name, name-max, phone, phone-max, email, email-max, message, message-rows, message-cols]</strong>
 * Version:           1.0.0
 * Author:            Masud Rana
 * Author URI:        https://profiles.wordpress.org/yeelloo/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       slgf
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'SLGF_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-slgf-activator.php
 */
function activate_slgf() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-slgf-activator.php';
	Slgf_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-slgf-deactivator.php
 */
function deactivate_slgf() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-slgf-deactivator.php';
	Slgf_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_slgf' );
register_deactivation_hook( __FILE__, 'deactivate_slgf' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-slgf.php';

function run_slgf() {
	$plugin = new Slgf();
	$plugin->run();
}
run_slgf();
