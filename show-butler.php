<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/shapon-pal/
 * @since             1.0.0
 * @package           Show_Butler
 *
 * @wordpress-plugin
 * Plugin Name:       ShowButler
 * Plugin URI:        https://mrassistant.tech/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           2.0.0
 * Author:            Shapon pal
 * Author URI:        https://www.linkedin.com/in/shapon-pal/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       show-butler
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SHOW_BUTLER_VERSION', '2.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-show-butler-activator.php
 */
function activate_show_butler() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-show-butler-activator.php';
	Show_Butler_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-show-butler-deactivator.php
 */
function deactivate_show_butler() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-show-butler-deactivator.php';
	Show_Butler_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_show_butler' );
register_deactivation_hook( __FILE__, 'deactivate_show_butler' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-show-butler.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_show_butler() {

	$plugin = new Show_Butler();
	$plugin->run();

}
run_show_butler();