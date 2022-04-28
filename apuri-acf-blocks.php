<?php
/**
 * Plugin Name: Custom Blocks for for APURI
 * Description: This plugin creates custom block types for APURI wbesite using ACF Pro framework
 * Version: 1.0.0.
 */

// Some constants 
define( 'APURI_BLOCKS_PATH', plugin_dir_path( __FILE__ ) );
define( 'APURI_BLOCKS_URL',  plugin_dir_url( __FILE__ ) );
define( 'APURI_BLOCKS_VERSION' , '1.0.0.' );

require_once( APURI_BLOCKS_PATH . 'inc/no-direct.php' );
include_once( APURI_BLOCKS_PATH . 'inc/full-width-blocks-fix.php' );

// Depends on ACF
if ( ! class_exists( 'acf')  ) {
	$tp_acf_notice_msg = __( 'This website needs "Advanced Custom Fields Pro" to run. Please download and activate it', 'tp-notice-acf' );
		/*
		*	Admin notice
		*/
		function tp_notice_missing_acf() {
			global $tp_acf_notice_msg;
			echo '<div class="notice notice-error notice-large"><div class="notice-title">'. $tp_acf_notice_msg .'</div></div>';
		}
		add_action( 'admin_notices', 'tp_notice_missing_acf' );


		/*
		*	Frontend notice
		*/
		function tp_notice_frontend_missing_acf() {
			global $tp_acf_notice_msg;
			esc_html( _e( $tp_acf_notice_msg ) );
		}
		add_action( 'template_redirect', 'tp_notice_frontend_missing_acf', 0 );
}

/**
 * For cleaner structure we will onliy require and include in the else block
 */
else {

	include_once( APURI_BLOCKS_PATH . 'inc/registration.php' ); //

}
