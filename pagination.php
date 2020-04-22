<?php if ( get_the_posts_pagination() ) : ?>

	<div class="post-pagination section-inner group">
	
		<?php if ( get_previous_posts_link() ) : ?>
			<div class="previous-posts-link">
				<?php previous_posts_link( __( '<div class="arrow-button arrow-left"></div>' ) ); ?>
			</div>
		<?php endif; ?>
		
		<?php if ( get_next_posts_link() ) : ?>
			<div class="next-posts-link">
				<?php next_posts_link( __( '<div class="arrow-button arrow-right"></div>' ) ); ?>
			</div>
		<?php endif; ?>

	</div> <!-- .pagination -->

<?php endif; ?>