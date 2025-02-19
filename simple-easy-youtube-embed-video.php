<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.ifourtechnolab.com/
 * @since             1.0.0
 * @package           Simple_Easy_Youtube_Embed_Video
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Easy YouTube Embed Video
 * Plugin URI:        https://wordpress.org/plugins/simple-easy-youtube-embed-video
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            ifourtechnolab
 * Author URI:        http://www.ifourtechnolab.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simple-easy-youtube-embed-video
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-simple-easy-youtube-embed-video-activator.php
 */
function activate_simple_easy_youtube_embed_video() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-easy-youtube-embed-video-activator.php';
	Simple_Easy_Youtube_Embed_Video_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-simple-easy-youtube-embed-video-deactivator.php
 */
function deactivate_simple_easy_youtube_embed_video() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-easy-youtube-embed-video-deactivator.php';
	Simple_Easy_Youtube_Embed_Video_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_simple_easy_youtube_embed_video' );
register_deactivation_hook( __FILE__, 'deactivate_simple_easy_youtube_embed_video' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-simple-easy-youtube-embed-video.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */

function run_simple_easy_youtube_embed_video() {

	$plugin = new Simple_Easy_Youtube_Embed_Video();
	$plugin->run();

}

run_simple_easy_youtube_embed_video();
