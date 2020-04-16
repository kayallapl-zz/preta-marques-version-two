<?php get_header(); ?>

	<div class="section-inner page" id="page-portfolio">
		<h3 class="page-title">Portfólio</h3>
		<ul class="job-types">
			<li><a href="<?= get_post_type_archive_link('audiovisual') ?>">Audiovisual</a></li>
			<li><a href="<?= get_post_type_archive_link('stylist') ?>">Stylist</a></li>
			<li><a href="<?= get_post_type_archive_link('teatro') ?>">Teatro</a></li>
		</ul>
	</div>
	
	<div class="section-inner page" id="page-latest">
		<p class="latest">trabalhos recentes</p>
		<div class="posts" id="posts">
			<?php
				$audiovisual_last_post = new WP_Query( array(
					'post_type' => 'audiovisual',
					'posts_per_page' => 1
				) );
				$stylist_last_post = new WP_Query( array(
					'post_type' => 'stylist',
					'posts_per_page' => 1
				) );
				$teatro_last_post = new WP_Query( array(
					'post_type' => 'teatro',
					'posts_per_page' => 1
				) );
			?>

			<?php if ( $audiovisual_last_post->have_posts() ) : ?>
				<?php while ( $audiovisual_last_post->have_posts() ) : $audiovisual_last_post->the_post();

					get_template_part( 'content' );
				
				endwhile;?>
			<?php endif; ?>
			<?php if ( $stylist_last_post->have_posts() ) : ?>
				<?php while ( $stylist_last_post->have_posts() ) : $stylist_last_post->the_post();

					get_template_part( 'content' );
				
				endwhile;?>
			<?php endif; ?>
			<?php if ( $teatro_last_post->have_posts() ) : ?>
				<?php while ( $teatro_last_post->have_posts() ) : $teatro_last_post->the_post();

					get_template_part( 'content' );
				
				endwhile;?>
			<?php endif; ?>
			<?php wp_reset_query(); ?>
		</div>
		
	</div><!-- .section-inner -->

<?php 

get_template_part( 'pagination' ); 

get_footer(); ?>