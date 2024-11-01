<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://www.ifourtechnolab.com/
 * @since      1.0.0
 *
 * @package    Simple_Easy_Youtube_Embed_Video
 * @subpackage Simple_Easy_Youtube_Embed_Video/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Simple_Easy_Youtube_Embed_Video_Config
 * @subpackage Simple_Easy_Youtube_Embed_Video_Config/includes
 * @author     ifourtechnolab <info@ifourtechnolab.com>
 */
trait Simple_Easy_Youtube_Embed_Video_Config {

    /**
     * Simple Easy YouTube Embed Video ShortCode Attributes.
     * @var type 
     */
    protected $shortcode_atts;

    /**
     * Simple Easy YouTube Embed Video ShortCode name
     * @var string
     */
    public $shortcode_name;

    /**
     *
     * @var type 
     */
    protected $seyev_options;

    /**
     *
     * @var string
     */
    protected $seyev_prefix = 'seyev_';

    /**
     * 
     */
    public function __construct()
    {
        $this->shortcode_atts = array();
        $this->seyev_options  = array();
    }

    /**
     * Default Shortcode Initialize Attributes.
     */
    protected function shortcode_atts_init()
    {
        $this->selector();
        $this->height();
        $this->width();
        $this->quality();
    }

    /**
     * Load YouTube Video With VideoID.
     */
    protected function id()
    {
        $this->shortcode_atts['id']       = 'M7lc1UVf-VE';
        return $this->shortcode_atts['callback'] = 'onPlayerReadyByVideoId';
    }

    /**
     * Load YouTube multiple Videos using multiple video ids.
     * @return array
     */
    protected function ids()
    {
        $this->shortcode_atts['ids']      = '';
        $this->start_after();
        return $this->shortcode_atts['callback'] = 'onPlayerReadyByVideoIds';
    }

    /**
     * Load YouTube Video by User Uploads Initialize.
     * @return array
     */
    protected function user_uploads()
    {
        $this->list_type();
        //$this->list_by();
        $this->start_after();
        $this->shortcode_atts['user_uploads'] = 'MARVEL';
        return $this->shortcode_atts['callback']     = 'onPlayerReadyByUserUploadList';
    }

    /**
     * YouTube Playlist ID.
     */
    protected function list_by($list = 'MARVEL')
    {
        return $this->shortcode_atts['list'] = $list;
    }

    /**
     * YouTube List Type.
     */
    protected function list_type($type = 'user_uploads')
    {
        return $this->shortcode_atts['listType'] = $type;
    }

    /**
     * Load YouTube Video by PlayList ID Initialize.
     * @param string $playlist
     * @return array
     */
    protected function playlist($playlist = 'LLpEhnqL0y41EpW2TvWAHD7Q')
    {
        $this->list_type('playlist');
        $this->start_after();
        $this->shortcode_atts['playlist'] = $playlist;
        return $this->shortcode_atts['callback'] = 'onPlayerReadyByList';
    }

    /**
     * Dom element Selector.
     * @return string
     */
    protected function selector()
    {
        return $this->shortcode_atts['selector'] = 'seyev-ytplayer';
    }

    /**
     * Get All Shortcode Attributes.
     * @return array
     */
    public function get_shortcode_atts()
    {
        return $this->shortcode_atts;
    }

    /**
     * Set YouTube Player height
     * @return string
     */
    public function height()
    {
        return $this->shortcode_atts['height'] = '360';
    }

    /**
     * Set YouTube Player Width.
     * @return string
     */
    public function width()
    {
        return $this->shortcode_atts['width'] = '640';
    }

    /**
     * Set YouTube Video Quality.
     * @return string
     */
    public function quality()
    {
        return $this->shortcode_atts['quality'] = 'default';
    }

    /**
     * Simple Easy YouTube Embed Video Shortcode Name.
     * @return string
     */
    public function get_shortcode_name()
    {
        return 'seyev-youtube';
    }

    /**
     * Playlist Video Index.
     * @return int
     */
    public function start_after()
    {
        return $this->shortcode_atts['start_after'] = 1;
    }

    /**
     * Video Start Seconds.
     * @return int
     */
    public function start_from()
    {
        return $this->shortcode_atts['start_from'] = 0;
    }

    /**
     * YouTube Player Mute Control.
     * @return array
     */
    public function mute()
    {
        return $this->shortcode_atts['mute'] = 'true';
    }

    /**
     * YouTube Player Volume Control.
     * @param integer $vl
     * @return array
     */
    public function volume($vl = 75)
    {
        return $this->shortcode_atts['volume'] = $vl;
    }

    /**
     * Simple Easy YouTube Embed Video Admin Page Shortcode Configuration.
     * @return array
     */
    protected function get_seyev_obj()
    {
        return array(
            'shortcode' => $this->get_shortcode_name(),
            'copyMsg'   => __('Copy this shortcode and add into your post.',
                'simple-easy-youtube-embed-video'),
            'errorMsg'  => __('Sorry, Please Enter YouTube Id',
                'simple-easy-youtube-embed-video')
        );
    }
    
}