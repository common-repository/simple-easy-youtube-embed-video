<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.ifourtechnolab.com/
 * @since      1.0.0
 *
 * @package    Simple_Easy_Youtube_Embed_Video
 * @subpackage Simple_Easy_Youtube_Embed_Video/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Simple_Easy_Youtube_Embed_Video
 * @subpackage Simple_Easy_Youtube_Embed_Video/admin
 * @author     ifourtechnolab <info@ifourtechnolab.com>
 */
class Simple_Easy_Youtube_Embed_Video_Admin {


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
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version     = $version;
    }

    public function enqueue_scripts($hook)
    {
        if ($hook != 'toplevel_page_seyev-plugin')
        {
            return;
        }

        wp_register_script('seyev-admin-script',
            plugin_dir_url(__FILE__).'js/simple-easy-youtube-embed-video-admin.js',
            array('jquery'), $this->version, true);
        wp_localize_script('seyev-admin-script', 'seyevObj', $this->get_seyev_obj());
        wp_enqueue_script('seyev-admin-script');
    }

    public function seyev_admin_menu()
    {
        add_menu_page(__('SEYEV', 'simple-easy-youtube-embed-video'),
            __('SEYEV', 'simple-easy-youtube-embed-video'), 'manage_options',
            'seyev-plugin', array($this, 'seyev_admin_wrapper'));
    }

    public function seyev_admin_wrapper()
    {
        require_once plugin_dir_path(__FILE__).'partials/simple-easy-youtube-embed-video-admin-display.php';
    }

}