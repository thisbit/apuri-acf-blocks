<?php
/**
 * Register blocks here
 */
require_once( APURI_BLOCKS_PATH . 'inc/no-direct.php' ); 

function apuri_register_acf_block_types() {
	if ( function_exists( 'acf_register_block_type' ) ) {
		acf_register_block_type( [
				'name'            => 'slider',
				'title'           => __( 'Slider' ),
				'description'     => __( 'Apuri custom slider block.' ),
				'render_template' => APURI_BLOCKS_PATH . 'blocks/slider/slider.php',
				'category'        => 'media',
				'icon'            => 'images-alt2',
				'enqueue_assets'  => function() {
					wp_enqueue_style( 'flickity-css',  APURI_BLOCKS_URL . '/assets/lib/flickity.min.css',                APURI_BLOCKS_VERSION );
					wp_enqueue_style( 'apuri-slider',  APURI_BLOCKS_URL . '/assets/slider.css', array( 'flickity-css' ), APURI_BLOCKS_VERSION );
					if ( ! is_admin() ) : 
						wp_enqueue_script( 'flickity-js',  APURI_BLOCKS_URL . '/assets/lib/flickity.pkgd.min.js',            APURI_BLOCKS_VERSION, true );
						wp_enqueue_script( 'apuri-slider', APURI_BLOCKS_URL . '/assets/slider.js',  array( 'flickity-js' ),  APURI_BLOCKS_VERSION, true ); 
					endif;
				},
		] );
	}
}
add_action( 'acf/init',  'apuri_register_acf_block_types' );

