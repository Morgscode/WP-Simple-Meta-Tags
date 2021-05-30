<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://luke-morgan.com
 * @since      1.0.0
 *
 * @package    Wp_Simple_Seo_Tags
 * @subpackage Wp_Simple_Seo_Tags/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Simple_Seo_Tags
 * @subpackage Wp_Simple_Seo_Tags/includes
 * @author     Luke Morgan <morgan.luke94@gmail.com>
 */
class Wp_Simple_Seo_Tags_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-simple-seo-tags',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
