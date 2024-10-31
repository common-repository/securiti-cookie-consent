<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://securiti.ai
 * @since      1.0.0
 *
 * @package    scc
 * @subpackage scc/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    scc
 * @subpackage scc/admin
 * @author     SECURITI.ai <wordpress-support@securiti.ai>
 */
class scc_Admin {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      scc_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;


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
	 * @param      string    $loader    Class that orchestrates the hooks with the plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->loader = new scc_Loader();

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/scc-admin.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 * @since	 1.0.2 Added script localization
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/scc-admin.js', array( 'jquery' ), $this->version, false );

		// Localize admin script
		wp_localize_script( $this->plugin_name, 'scc_admin', array(
			'nonce' => wp_create_nonce( 'scc_admin' )
		) );
	}

	/**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function add_options_page() {
		add_options_page(
			__('Cookie Consent for GDPR/CCPA | securiti Settings', $this->plugin_name ),
			__( 'Cookie Consent for GDPR/CCPA | securiti', $this->plugin_name ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);
	}


	/**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
		// check user capabilities
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/options-page.php';
	}

	/**
	 * Register settings for plugin
	 *
	 * @since  1.0.0
	 */
	public function register_setting() {
		register_setting( 'cookie-consent-code', 'scc_code', 'trim' );

		// Setup default Cookie installation date
		$scc_notice_update_date = ( $exists = get_option( 'scc_notice_update_date' ) ) ? $exists : '';

		if ( empty( $scc_notice_update_date ) ) {
			update_option( 'scc_notice_update_date', date( 'Y-m-d H:i:s' ) );
		}
	}


    /**
     * Admin notice
	 *
	 * @since  1.0.2
	 */
    function scc_admin_notices() {

        // Bail if current user is not a site administrator
        if( ! current_user_can( 'update_plugins' ) ){
            return;
        }

        // Check if user checked already hide the review notice
		$hide_review_notice = ( $exists = get_option( 'scc_hide_review_notice' ) ) ? $exists : '';


        if( $hide_review_notice !== 'yes' ) {

            // Get the scc installation date
            $scc_notice_update_date = ( $exists = get_option( 'scc_notice_update_date' ) ) ? $exists : date( 'Y-m-d H:i:s' );

            $now = date( 'Y-m-d h:i:s' );
            $datetime1 = new DateTime( $scc_notice_update_date );
            $datetime2 = new DateTime( $now );


            // Difference in days between installation date and now
            $diff_interval = round( ( $datetime2->format( 'U' ) - $datetime1->format( 'U' ) ) / ( 60 * 60 * 24 ) );

            if( $diff_interval >= 5 || $diff_interval < 0) { ?>

                <div class="notice scc-review-notice">
                    <p>
                        <?php _e( 'Hello!', 'scc' ); ?><br>
                        <?php _e( 'We are very pleased that by now you have been using the <strong>Cookie Consent for GDPR/CCPA | Securiti</strong> plugin for a few days. Please rate the plugin. It will help us a lot.', 'scc' ); ?><br>
                    </p>
                    <ul style="display: flex; align-items: center;">
                        <li style="margin-right: 10px;"><a href="https://wordpress.org/support/plugin/securiti-cookie-consent/reviews/?rate=5#new-post" class="button button-primary" target="_blank" title="<?php _e( 'Rate the plugin', 'scc' ); ?>"><?php _e( 'Rate the plugin', 'scc' ); ?></a></li>
                        <li style="margin-right: 10px;"><a href="javascript:void(0);" class="scc-later-review-notice button" title="<?php _e( 'Remind later', 'scc' ); ?>"><?php _e( 'Remind later', 'scc' ); ?></a></li>
                        <li><a href="javascript:void(0);" class="scc-hide-review-notice" title="<?php _e( 'Don’t show again', 'scc' ); ?>"><small><?php _e( 'Don’t show again', 'scc' ); ?></small></a></li>
                    </ul>
					<p>
                        <?php _e( 'Thank you,', 'scc' ); ?><br>
                        <?php _e( 'Team Securiti', 'scc' ); ?><br>
                    </p>
                </div>

                <?php
            }

        }

    }


    /**
     * Ajax handler for hide review notice action
	 *
	 * @since  1.0.2
	 */
    function scc_ajax_hide_review_notice() {
        // Security check, forces to die if not security passed
        check_ajax_referer( 'scc_admin', 'nonce' );

		update_option( 'scc_hide_review_notice', 'yes' );

        wp_send_json_success( array( 'success' ) );
        exit;
    }


    /**
     * Ajax handler for hide review notice action
	 *
	 * @since  1.0.2
	 */
    function scc_ajax_later_review_notice() {
        // Security check, forces to die if not security passed
        check_ajax_referer( 'scc_admin', 'nonce' );

		update_option( 'scc_notice_update_date', date( 'Y-m-d H:i:s' ) );

        wp_send_json_success( array( 'success' ) );
        exit;
    }

	/**
	 * Register settings for plugin
	 *
	 * @since  1.0.0
	 */
	public function render_codes() {
		$this->loader->output('scc_code');
	}
}
