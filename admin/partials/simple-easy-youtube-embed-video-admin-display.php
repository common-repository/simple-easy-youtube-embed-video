<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.ifourtechnolab.com/
 * @since      1.0.0
 *
 * @package    Simple_Easy_Youtube_Embed_Video
 * @subpackage Simple_Easy_Youtube_Embed_Video/admin/partials
 */
?>

<div class="wrap">

    <div id="icon-options-general" class="icon32"></div>
    <h1><?php
        esc_attr_e('Simple Easy Youtube Embed Video',
            'simple-easy-youtube-embed-video');
        ?></h1>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->
            <div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">

                    <div class="postbox">

                        <h2><span>
                                <?php
                                esc_attr_e('Shortcode Generate',
                                    'simple-easy-youtube-embed-video');
                                ?>
                            </span>
                        </h2>

                        <div class="inside" id="seyev-insider">
                            <form method="post"  action="admin.php" >
                                <input type="hidden" name="action" value="submit_seyev_playlist" />
                                <?php wp_nonce_field('submit_seyev_playlist_action'); ?>
                                <table class="form-table">
                                    <tr valign="top">
                                        <td scope="row">
                                            <select name="seyev_type_selection" id="seyev_type_selection">
                                                <option value="id" selected="selected">Load YouTube video by video ID:</option>
                                                <option value="ids">Load list of YouTube videos by video IDs:</option>
                                                <option value="playlist">Load YouTube playlist by playlist ID:</option>
                                                <option value="user_uploads">Load YouTube uploaded videos for channel:</option>
                                            </select>
                                        </td>

                                        <td>
                                            <input type="text" value="" placeholder="<?php
                                            esc_attr_e('Add your id',
                                                'simple-easy-youtube-embed-video');
                                            ?>" name="seyev_id" id="seyev_id" class="regular-text" />
                                            <br>
                                        </td>
                                    </tr>

                                    <tr valign="top">
                                        <td scope="row">
                                            <label for="tablecell">
                                                <?php
                                                esc_attr_e(
                                                    'Player start from (in seconds)',
                                                    'simple-easy-youtube-embed-video'
                                                );
                                                ?>
                                            </label>
                                        </td>

                                        <td>
                                            <input type="text" placeholder="<?php
                                            esc_attr_e('seconds',
                                                'simple-easy-youtube-embed-video');
                                            ?>" name="start_seconds" id="start_seconds" class="regular-text" />
                                            <br>
                                        </td>
                                    </tr>

                                    <tr valign="top">

                                        <td scope="row">
                                            <label for="tablecell">
                                                <?php
                                                esc_attr_e(
                                                    'Suggested Video quality',
                                                    'simple-easy-youtube-embed-video'
                                                );
                                                ?>
                                            </label>
                                        </td>
                                        <td>
                                            <select name="seyev_type_quality" id="seyev_type_quality">
                                                <option value="default" selected="">default</option>
                                                <option value="highres">highres</option>
                                                <option value="hd1080">hd1080</option>
                                                <option value="hd720">hd720</option>
                                                <option value="large">large</option>
                                                <option value="medium">medium</option>
                                                <option value="small">small</option>
                                            </select>
                                        </td>
                                    </tr>

                                </table>
                                <p class="submit">
                                    <input type="button" name="submit" id="seyev-generator" class="button button-primary" value=<?php
                                    esc_attr_e('Shortcode',
                                        'simple-easy-youtube-embed-video');
                                    ?>>
                                </p>
                            </form>
                            <br class="clear" />
                        </div>
                        <!-- .inside -->

                    </div>
                    <!-- .postbox -->

                </div>
                <!-- .meta-box-sortables .ui-sortable -->

            </div>
            <!-- post-body-content -->

            <!-- sidebar -->
            <div id="postbox-container-1" class="postbox-container">

                <div class="meta-box-sortables">

                    <div class="postbox">

                        <h2>
                            <span>
                                <?php
                                esc_attr_e(
                                    'Shortcode description',
                                    'simple-easy-youtube-embed-video'
                                );
                                ?>
                            </span>
                        </h2>

                        <div class="inside">
                            <p> <?php
                                esc_html_e('Add',
                                    'simple-easy-youtube-embed-video')
                                ?> <code>[seyev-youtube]</code> <?php
                                esc_html_e('shortcode for use.',
                                    'simple-easy-youtube-embed-video')
                                ?>
                            </p>
                            <p> <?php
                                esc_html_e('Use',
                                    'simple-easy-youtube-embed-video')
                                ?> <code> id </code> <?php
                                esc_html_e("for add YouTube Video Id. Like",
                                    'simple-easy-youtube-embed-video')
                                ?><br/> <code> id=XXXXXXXXXX</code>
                            </p>
                            <p> <?php
                                esc_html_e('Use',
                                    'simple-easy-youtube-embed-video')
                                ?> <code> ids </code> <?php
                                esc_html_e("for add Multiple YouTube Videos.Like ",
                                    'simple-easy-youtube-embed-video')
                                ?> <code> ids=XXXXXXXXXX,XXXXXXXXXX </code><?php
                                esc_html_e("and seprate them using comma",
                                    'simple-easy-youtube-embed-video')
                                ?>(<code>,</code>)
                            </p>
                            <p> <?php
                                esc_html_e('Use',
                                    'simple-easy-youtube-embed-video')
                                ?> <code> playlist </code> <?php
                                esc_html_e("for add YouTube Playlist. Like",
                                    'simple-easy-youtube-embed-video')
                                ?> <code> playlist=XXXXXXXXXX </code>
                            </p>
                            <p> <?php
                                esc_html_e('Use',
                                    'simple-easy-youtube-embed-video')
                                ?> <code> user_uploads </code> <?php
                                esc_html_e("for add YouTube User Uploded video. Like",
                                    'simple-easy-youtube-embed-video')
                                ?> <code> user_uploads=XXXXXXXXXX </code>
                            </p>
                            <p> <?php
                                esc_html_e('Final shortcode look like this',
                                    'simple-easy-youtube-embed-video')
                                ?> <code> [seyev-youtube id=XXXXXXXXXX] </code>
                            </p>
                            <p><a href="https://developers.google.com/youtube/youtube_player_demo">Youtube player demo</a></p>
                        </div>
                        <!-- .inside -->

                    </div>
                    <!-- .postbox -->

                </div>
                <!-- .meta-box-sortables -->

            </div>
            <!-- #postbox-container-1 .postbox-container -->

        </div>
        <!-- #post-body .metabox-holder .columns-2 -->

        <br class="clear">
    </div>
    <!-- #poststuff -->

</div> <!-- .wrap -->