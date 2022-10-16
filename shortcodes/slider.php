<?php

/**
 * Slider Shortcode Template.
 *
 */

require_once( APURI_BLOCKS_PATH . 'inc/no-direct.php' );




/**
 * Using the slider as shortcode so we can use it in elements
 * If it is empty it generates no html
 */
if ( ! function_exists( 'apuri_slider_shortcode' ) ) {
	function apuri_slider_shortcode() {
		ob_start(); ?>
			<?php if( have_rows('apuri_image_slides') ): ?>
				<section class="gb-container gb-container-4c1f3c30 slider-shortcode-wrap">
					<div class="gb-inside-container">
						<div class="gb-grid-wrapper gb-grid-wrapper-5ae6287d gb-grid-wrapper-default-layout">
							<div class="gb-grid-column gb-grid-column-260b131c gb-grid-column-indent">
								<div class="gb-container gb-container-260b131c gb-container-indent">
									<div class="gb-inside-container">
									</div>
								</div>
							</div>

							<div class="gb-grid-column gb-grid-column-28b12e3e gb-grid-column-default-single-column">
								<div class="gb-container gb-container-28b12e3e gb-container-default-single-column">
									<div class="gb-inside-container">
										<h2 class="gb-headline gb-headline-b07a79e7 gb-headline-text"><?php _e( 'Radovi nastavnika' ); ?></h2>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="gb-container gb-container-9d7cb0bd">
						<div class="gb-inside-container">
						</div>
					</div>
				</section>
				<figure id="<?php echo esc_attr( 'slider-shortcode' ); ?>" class="<?php echo esc_attr( 'slider alignfull' ); ?>">
				<?php while( have_rows('apuri_image_slides') ): the_row(); 
					$image = get_sub_field('apuri_slide_image');
					$caption = wp_get_attachment_caption( $image['id'], 'full slider-image' );
					?>
					<figure class="slider-cell <?php  if ($caption) : _e('has-caption'); endif; ?> ">
						<?php echo wp_get_attachment_image( $image['id'], 'full slider-image' ); ?>
						<?php if ($caption) : ?>
							<figcaption class="slider-caption"><?php echo $caption; ?></figcaption>
						<?php endif; ?>
					</figure>
				<?php endwhile; ?>
			</figure>
			<?php endif; ?>
		<?php return ob_get_clean();
	}
}
add_shortcode( 'apuri_slider', 'apuri_slider_shortcode' );


/**
	* Shortcode slider 
	* We are using the shortcode in a gp elements so we cannot seem to use the has_shortcode() condition to load
	* So we are checking weather the element in present
  */
function apuri_enqueue_slider_shortcode() {
	global $generate_elements;
	if ( $generate_elements ) :
	foreach ( $generate_elements as $generate_element ) {
		if ( $generate_element['id'] === 20014 ) {
			wp_enqueue_style( 'flickity-css',  APURI_BLOCKS_URL . '/assets/lib/flickity.min.css',                APURI_BLOCKS_VERSION );
			wp_enqueue_style( 'apuri-slider',  APURI_BLOCKS_URL . '/assets/slider.css', array( 'flickity-css' ), APURI_BLOCKS_VERSION );
			if ( ! is_admin() ) : 
				wp_enqueue_script( 'flickity-js',  APURI_BLOCKS_URL . '/assets/lib/flickity.pkgd.min.js',            APURI_BLOCKS_VERSION, true );
				wp_enqueue_script( 'apuri-slider', APURI_BLOCKS_URL . '/assets/slider.js',  array( 'flickity-js' ),  APURI_BLOCKS_VERSION, true ); 
			endif;
		}
	}
endif;
}
add_action( 'wp_enqueue_scripts', 'apuri_enqueue_slider_shortcode', 9999 );
