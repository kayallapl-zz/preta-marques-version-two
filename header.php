<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>
		
		<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>" charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
        
        <link rel="profile" href="http://gmpg.org/xfn/11">
		 
		<?php wp_head(); ?>
	
	</head>
	
	<body <?php body_class(); ?>>

		<?php 
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open(); 
		}
		?>

		<a class="skip-link button" href="#site-content"><?php _e( 'Skip to the content', 'hamilton' ); ?></a>
    
        <header class="section-inner site-header">
			
			<div class="nav-toggle">
				<div class="bar"></div>
				<div class="bar"></div>
				<div class="bar"></div>
			</div>

			<div class="alt-nav-wrapper">
			
				<ul class="alt-nav">
					<?php 
					if ( has_nav_menu( 'primary-menu' ) ) : 
						wp_nav_menu( array( 
							'container' 		=> '',
							'items_wrap' 		=> '%3$s',
							'theme_location' 	=> 'primary-menu',
						) ); 
					else :
						wp_list_pages( array(
							'container' => '',
							'title_li' 	=> ''
						) );
					endif;
					?>
				</ul><!-- .alt-nav -->

			</div><!-- .alt-nav-wrapper -->

        </header> <!-- header -->
		
		<?php 
		$bg_declaration = "";
		if ( get_background_color() && get_background_color() != 'ffffff' ) {
			$bg_declaration = ' style="background-color: #' . get_background_color() . ';"';
		}
		?>
		
		<nav class="site-nav"<?php echo $bg_declaration; ?>>
		
			<div class="section-inner menus group">
		
				<?php 
				if ( has_nav_menu( 'primary-menu' ) ) :
					wp_nav_menu( array( 
						'container' 		=> '',
						'theme_location' 	=> 'primary-menu'
					) ); 
				else : ?>
					<ul>
						<?php
						wp_list_pages( array(
							'container' => '',
							'title_li' 	=> ''
						) );
						?>
					</ul>
					<?php 
				endif;
				
				if ( has_nav_menu( 'secondary-menu' ) ) {
					wp_nav_menu( array( 
						'container' 		=> '',
						'theme_location' 	=> 'secondary-menu'
					) ); 
				}
				?>
			
			</div>
			
		</nav>

		<main id="site-content">