<?php 

$extra_classes = 'post-preview tracker';

// Determine whether a fallback is needed for sizing
if ( has_post_thumbnail() && ! post_password_required() ) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'hamilton_preview-image' );
	if ( $image ) {
		$aspect_ratio = $image[2] / $image[1];
		// Guaranteee a mininum aspect ratio of 3/4
		if ( $aspect_ratio <= 0.75 ) {
			$extra_classes .= ' fallback-image';
		}
	}
} else {
	$extra_classes .= ' fallback-image';
}

$image_style_attr = ( has_post_thumbnail() && ! post_password_required() ) ? ' style="background-image: url( ' . get_the_post_thumbnail_url( $post->ID, 'hamilton_preview-image' ) . ' );"' : '';

?>

<a <?php post_class( $extra_classes ); ?> id="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	
	<div class="preview-image"<?php echo $image_style_attr; ?>>
		<?php 
		if ( has_post_thumbnail() && ! post_password_required() ) {
			the_post_thumbnail( 'hamilton_preview-image' );
		}
		?>
	</div>
	
	<header class="preview-header">
	
		<?php if ( is_sticky() ) : ?>
			<span class="sticky-post"><?php _e( 'Sticky', 'hamilton' ); ?></span>
		<?php endif; ?>
		<?php if (get_post_type( get_the_ID() ) == 'stylist'): ?>
			<h2 class="preview-post-type">Styling</h2>
		<?php endif; ?>
		<?php the_title( '<h2 class="preview-title">', '</h2>' ); ?>
		<img src="<?= get_template_directory_uri() ?>/assets/icons/arrow-right.png" alt="right arrow">
	
	</header>

</a>