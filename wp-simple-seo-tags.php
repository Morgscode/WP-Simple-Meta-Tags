<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://luke-morgan.com
 * @since             1.0.0
 * @package           Wp_Simple_Seo_Tags
 *
 * @wordpress-plugin
 * Plugin Name:       WP Simple SEO Tags
 * Plugin URI:        https://luke-morgan.com
 * Description:       Adds a series of metaboxes to all pages and post types so you can easily manage all of the SEO meta tags that are still important.
 * Version:           1.0.0
 * Author:            Luke Morgan
 * Author URI:        https://luke-morgan.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-simple-seo-tags
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
define( 'WP_SIMPLE_SEO_TAGS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-simple-seo-tags-activator.php
 */
function activate_wp_simple_seo_tags() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-simple-seo-tags-activator.php';
	Wp_Simple_Seo_Tags_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-simple-seo-tags-deactivator.php
 */
function deactivate_wp_simple_seo_tags() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-simple-seo-tags-deactivator.php';
	Wp_Simple_Seo_Tags_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_simple_seo_tags' );
register_deactivation_hook( __FILE__, 'deactivate_wp_simple_seo_tags' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-simple-seo-tags.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_simple_seo_tags() {

	$plugin = new Wp_Simple_Seo_Tags();
	$plugin->run();

}
run_wp_simple_seo_tags();
