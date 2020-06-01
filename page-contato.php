<?php get_header(); ?>

	<div class="section-inner page" id="page-contato">
		<div class="contact-column contact-column-image">
			<div class="image-box">
				<img src="<?= get_template_directory_uri() ?>/assets/images/image-contact.JPG" alt="">
			</div>
		</div>
		<div class="contact-column">
			<div class="contact-box">
				<div class="contact-option">
					<img src="<?= get_template_directory_uri() ?>/assets/icons/icon-instagram.svg" alt="">
					<a href="<?php the_field('instagram'); ?>" target="_blank"><?php the_field('instagram_user')?></a>
				</div>
				<div class="contact-option">
					<img src="<?= get_template_directory_uri() ?>/assets/icons/icon-email.svg" alt="">
					<a href="mailto:<?php the_field('email'); ?>"><?php the_field('email')?></a>
				</div>
				<div class="contact-option">
					<img src="<?= get_template_directory_uri() ?>/assets/icons/icon-whatsapp.svg" alt="">
					<a href="https://wa.me/<?php the_field('whatsapp'); ?>" target="_blank">Whatsapp</a>
				</div>
			</div>
		</div>
	</div><!-- .section-inner -->

<?php 

get_template_part( 'pagination' ); 

get_footer(); ?>