<?php
/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

require_once( APURI_BLOCKS_PATH . 'inc/no-direct.php' ); 
// Create id attribute allowing for custom "anchor" value.
$id = 'slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'slider';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}
?>

<figure id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <?php if( have_rows('apuri_image_slides') ): ?>
			<?php while( have_rows('apuri_image_slides') ): the_row(); 
				$image = get_sub_field('apuri_slide_image');
				?>
				<figure class="slider-cell">
					<?php echo wp_get_attachment_image( $image['id'], 'full slider-image' ); ?>
				</figure>
			<?php endwhile; ?>
	<?php else: ?>
		<p class="please-add-some-slides">Please add some slides.</p>
	<?php endif; ?>
</figure>