<div class="wrap about-wrap" xmlns="http://www.w3.org/1999/html">
    <h1><?php _e( 'Redux Framework - Support', 'redux-framework' ); ?></h1>

    <div
        class="about-text"><?php printf( __( 'We are an open source project used by developers to make powerful control panels.', 'redux-framework' ), $this->display_version ); ?></div>
    <div
        class="redux-badge"><i
            class="el el-redux"></i><span><?php printf( __( 'Version %s', 'redux-framework' ), ReduxFramework::$_version ); ?></span>
    </div>

    <?php $this->actions(); ?>
    <?php $this->tabs(); ?>

    <div id="support_div" class="support">

        <!-- multistep form -->
        <form id="supportform">

            <ul id="progressbar" class=" breadcrumb">
                <li class="active"><?php _e( 'Generate a Support Hash', 'redux-framework' ); ?></li>
                <li href="#"><?php _e( 'Select Support Type', 'redux-framework' ); ?></li>
                <li href="#"><?php _e( 'How to Get Support', 'redux-framework' ); ?></li>
            </ul>

            <!-- fieldsets -->
            <fieldset>
                <h2><?php _e( 'Submit a Support Request', 'redux-framework' ); ?></h2>

                <h3>To get started, we will need to generate a support hash.</h3>

                <p> This will provide to
                    your developer all the information they may need to remedy your issue. This action WILL send
                    information securely to a remote server. To learn the information sent, you may inspect the <a
                        href="<?php echo admin_url( 'tools.php?page=redux-status' ); ?>">Status tab</a>.</p>

                <p><a href="#" class="docs button button-primary button-large redux_support_hash">Generate
                        a Support Hash</a></p>
                <input type="button" name="next" class="next hide action-button"
                       value="Next"/>
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Select Your Support Type</h2>

                <h3 class="fs-subtitle" style="text-align: center;">
                    Let us know what type of user you are.
                </h3>

                <table id="user_type">
                    <tr>
                        <td id="is_user"><i class="el el-user"></i><br/>User<br /><small>I am a user using a pre-built product.</small></td>
                        <td id="is_developer"><i class="el el-github"></i><br/>Developer<br /><small>I am a developer building a product using Redux.</small></td>
                    </tr>
                </table>

                <input type="button" name="next" class="next action-button hide" value="Next" />
            </fieldset>
            <fieldset id="final_support">
                <h2>How to Get Support</h2>

                <div class="is_developer">
                    <p>Please proceed to the Redux Framework issue tracker and supply us with your the support URL
                        below. Please also provide any information that will help us to reproduce your issue.</p>
                    <a href="https://github.com/reduxframework/redux-framework/issues" target="_blank"><h4>
                            https://github.com/reduxframework/redux-framework/issues</h4></a>

                </div>
                <div class="is_user">

                    <ul id="toDebug">
                        <?php
                            $active_plugins = (array) get_option( 'active_plugins', array() );

                            if ( is_multisite() ) {
                                $active_plugins = array_merge( $active_plugins, get_site_option( 'active_sitewide_plugins', array() ) );
                            }


                            foreach ( $active_plugins as $plugin ) :
                                $plugin_data           = @get_plugin_data( WP_PLUGIN_DIR . '/' . $plugin );
                                $dirname               = dirname( $plugin );
                                $plugin_data['folder'] = dirname( $plugin );

                                ?>
                                <li><input class="checkbox plugins" name="type[]" id="p<?php echo $dirname; ?>"
                                           type="checkbox"
                                           value="<?php echo urlencode( json_encode( $plugin_data ) ); ?>"><label
                                        for="p<?php echo $dirname; ?>"><strong><?php _e( 'Plugin', 'redux-framework' );?>
                                            : </strong> <?php echo $plugin_data['Name']; ?>
                                        <small>v<?php echo $plugin_data['Version']; ?></small>
                                    </label>
                                </li>

                            <?php
                            endforeach;

                            $active_theme = wp_get_theme()
                        ?>
                        <li><input class="checkbox theme" name="type[]"
                                   id="<?php echo sanitize_html_class( $active_theme->Name ); ?>"
                                   type="checkbox" data='<?php echo json_encode( $active_theme ); ?>'
                                   value="<?php echo urlencode( json_encode( $active_theme ) ); ?>"><label
                                for="<?php echo sanitize_html_class( $active_theme->Name ); ?>"><strong><?php _e( 'Theme', 'redux-framework' ); ?>
                                    : </strong> <?php echo $active_theme->Name; ?>
                                <small>v<?php echo $active_theme->Version; ?></small>
                            </label>
                        </li>
                    </ul>
                    <p>
                        <a href="https://github.com/reduxframework/redux-framework/issues">https://github.com/reduxframework/redux-framework/issues</a><br/>
                        Provide us with details about your issue as well as the following support hash code:
                    </p>


                </div>
                <textarea type="text" id="support_hash" name="hash" placeholder="Support Hash" readonly="readonly"
                          class="hash" value="http://support.redux.io/"></textarea>
                <input type="button" name="previous" class="previous action-button" value="Go Back"/>
            </fieldset>
        </form>


        <div class="clear" style="clear:both;"></div>
    </div>

</div>