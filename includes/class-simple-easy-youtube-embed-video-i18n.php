<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://www.ifourtechnolab.com/
 * @since      1.0.0
 *
 * @package    Simple_Easy_Youtube_Embed_Video
 * @subpackage Simple_Easy_Youtube_Embed_Video/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Simple_Easy_Youtube_Embed_Video
 * @subpackage Simple_Easy_Youtube_Embed_Video/includes
 * @author     ifourtechnolab <info@ifourtechnolab.com>
 */
class Simple_Easy_Youtube_Embed_Video_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'simple-easy-youtube-embed-video',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
