<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://www.ifourtechnolab.com/
 * @since      1.0.0
 *
 * @package    Simple_Easy_Youtube_Embed_Video
 * @subpackage Simple_Easy_Youtube_Embed_Video/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Simple_Easy_Youtube_Embed_Video
 * @subpackage Simple_Easy_Youtube_Embed_Video/public
 * @author     ifourtechnolab <info@ifourtechnolab.com>
 */
class Simple_Easy_Youtube_Embed_Video_Public {

    use Simple_Easy_Youtube_Embed_Video_Config;
    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;
        $this->shortcode_atts_init();
    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {
        wp_register_script($this->plugin_name,
            plugin_dir_url(__FILE__).'js/simple-easy-youtube-embed-video-public.js',
            array(), $this->version, true);
    }

    /**
     *
     * @param array $atts
     * @param string $content
     * @return string
     */
    public function seyev_func_callback($atts, $content = null)
    {

        foreach ($atts as $key => $value) {
            if ((method_exists($this, $key)) && !isset($this->shortcode_atts[$key])){
               $this->$key();
            }
        }

        $seyev = shortcode_atts($this->shortcode_atts, $atts);

        wp_localize_script($this->plugin_name, 'seyevObj', $seyev);
        wp_enqueue_script($this->plugin_name);

        ob_start();
        require_once plugin_dir_path(__FILE__).'partials/simple-easy-youtube-embed-video-public-display.php';
        $content = ob_get_clean();
        return $content;
    }
}