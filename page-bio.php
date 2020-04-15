<?php get_header(); ?>

	<div class="section-inner page" id="page-bio">

		<div class="bio-id">
			<?php $image = get_field('bio_image'); ?>
			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
			<h2 class="site-name">Preta <span>Marques</span></h2>
		</div>
		<div class="bio-content">

			<?php if( get_field('bio_title') ): ?>
				<h2 class="title"><?php the_field('bio_title'); ?></h2>
			<?php endif; ?>

			<?php  while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; 
			wp_reset_query(); ?>
			
		</div>

	</div><!-- .section-inner -->

<?php 

get_template_part( 'pagination' ); 

get_footer(); ?>