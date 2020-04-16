<?php get_header(); ?>


	<?php if ( is_archive() ) : ?>
		
		<div class="section-inner page" id="page-portfolio">
		
			<h3 class="page-title">Portfólio</h3>
		
		</div>
		
		<div class="section-inner page" id="page-posts">
			
			<h2 class="page-subtitle"><?php the_archive_title(); ?></h2>
			
	<?php elseif ( is_search() && have_posts() ) : ?>
		
		<div class="section-inner">
			
			<header class="page-header fade-block">
				<div>
					<h2 class="title"><?php printf( __( 'Search: %s', 'hamilton' ), '&ldquo;' . get_search_query() . '&rdquo;' ); ?></h2>
					<p><?php global $found_posts; printf( __( 'We found %s results matching your search.', 'hamilton' ), $wp_query->found_posts ); ?></p>
				</div>
			</header>
			
	<?php elseif ( is_search() ) : ?>
				
		<div class="section-inner">

			<header class="page-header fade-block">
				<div>
					<h2 class="title"><?php _e( 'No results found', 'hamilton' ); ?></h2>
					<p><?php global $found_posts; printf( __( 'We could not find any results for the search query "%s".', 'hamilton' ), get_search_query() ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</header>

		<?php endif;
		
		if ( have_posts() ) : ?>

			<div class="posts" id="posts">

				<?php while ( have_posts() ) : the_post();

					get_template_part( 'content' );

				endwhile; ?>

			</div><!-- .posts -->
		
		<?php endif; ?>
	
	</div><!-- .section-inner -->

<?php 

get_template_part( 'pagination' ); 

get_footer(); ?>