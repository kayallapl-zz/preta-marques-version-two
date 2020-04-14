<?php

/* THEME SETUP
------------------------------------------------ */

if ( ! function_exists( 'pretatheme_setup' ) ) {

	function pretatheme_setup() {
		
		// Automatic feed
		add_theme_support( 'automatic-feed-links' );
		
		// Set content-width
		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 560;
		
		// Post thumbnails
		add_theme_support( 'post-thumbnails' );
		
		// Custom Image Sizes
		add_image_size( 'pretatheme_preview-image', 1200, 9999 );
		add_image_size( 'pretatheme_fullscreen-image', 1860, 9999 );
		
		// Background color
		add_theme_support( 'custom-background', array(
			'default-color' => 'ffffff',
		) );
		
		// Custom logo
		add_theme_support( 'custom-logo', array(
			'height'      => 400,
			'width'       => 600,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );
		
		// Title tag
		add_theme_support( 'title-tag' );
		
		// Add nav menu
		register_nav_menu( 'primary-menu', __( 'Primary Menu', 'pretatheme' ) );
		register_nav_menu( 'secondary-menu', __( 'Secondary Menu', 'pretatheme' ) );
		
		// Add excerpts to pages
		add_post_type_support( 'page', array( 'excerpt' ) );
		
		// HTML5 semantic markup
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		
		// Add Jetpack Infinite Scroll support
		add_theme_support( 'infinite-scroll', array(
			'type'           => 'click',
			'footer'		 => false,
			'footer_widgets' => false,
			'container'      => 'posts',
			'render'         => false,
			'posts_per_page' => false,
		) );
		
		// Make the theme translation ready
		load_theme_textdomain( 'pretatheme', get_template_directory() . '/languages' );
		
		$locale_file = get_template_directory() . "/languages/" . get_locale();
		
		if ( is_readable( $locale_file ) ) {
			require_once( $locale_file );
		}
		
	}
	add_action( 'after_setup_theme', 'pretatheme_setup' );

}


/* ENQUEUE STYLES
------------------------------------------------ */

if ( ! function_exists( 'pretatheme_load_style' ) ) {

	function pretatheme_load_style() {
		if ( ! is_admin() ) {

			$dependencies = array();

			/**
			 * Translators: If there are characters in your language that are not
			 * supported by the theme fonts, translate this to 'off'. Do not translate
			 * into your own language.
			 */
			$google_fonts = _x( 'on', 'Google Fonts: on or off', 'pretatheme' );

			if ( 'off' !== $google_fonts ) {

				// Register Google Fonts
				wp_register_style( 'pretatheme-fonts', '//fonts.googleapis.com/css?family=Libre+Franklin:300,400,400i,500,700,700i&amp;subset=latin-ext', false, 1.0, 'all' );
				$dependencies[] = 'pretatheme-fonts';

			}

			wp_enqueue_style( 'pretatheme-style', get_stylesheet_uri(), $dependencies );
		} 
	}
	add_action( 'wp_enqueue_scripts', 'pretatheme_load_style' );

}


/* ADD EDITOR STYLES
------------------------------------------------ */

if ( ! function_exists( 'pretatheme_add_editor_styles' ) ) {

	function pretatheme_add_editor_styles() {

		$editor_styles = array( 'pretatheme-editor-styles.css' );

		/**
		 * Translators: If there are characters in your language that are not
		 * supported by the theme fonts, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$google_fonts = _x( 'on', 'Google Fonts: on or off', 'pretatheme' );

		if ( 'off' !== $google_fonts ) {
			$editor_styles[] = '//fonts.googleapis.com/css?family=Libre+Franklin:300,400,400i,500,700,700i&amp;subset=latin-ext';
		}

		add_editor_style( $editor_styles );
	}
	add_action( 'init', 'pretatheme_add_editor_styles' );

}


/* DEACTIVATE DEFAULT WP GALLERY STYLES
------------------------------------------------ */

add_filter( 'use_default_gallery_style', '__return_false' );



/* ENQUEUE SCRIPTS
------------------------------------------------ */

if ( ! function_exists( 'pretatheme_enqueue_scripts' ) ) {

	function pretatheme_enqueue_scripts() {

		wp_enqueue_script( 'pretatheme_global', get_template_directory_uri() . '/assets/js/global.js', array( 'jquery', 'imagesloaded', 'masonry' ), '', true );

		if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
	add_action( 'wp_enqueue_scripts', 'pretatheme_enqueue_scripts' );

}


/* POST CLASSES
------------------------------------------------ */

if ( ! function_exists( 'pretatheme_post_classes' ) ) {

	function pretatheme_post_classes( $classes ) {

		// Class indicating presence/lack of post thumbnail
		$classes[] = ( has_post_thumbnail() ? 'has-thumbnail' : 'missing-thumbnail' );
		
		return $classes;
	}
	add_action( 'post_class', 'pretatheme_post_classes' );

}


/* BODY CLASSES
------------------------------------------------ */

if ( ! function_exists( 'pretatheme_body_classes' ) ) {

	function pretatheme_body_classes( $classes ) {

		// Check whether we're in the customizer preview
		if ( is_customize_preview() ) {
			$classes[] = 'customizer-preview';
		}

		// Check whether we want it darker
		if ( get_theme_mod( 'pretatheme_dark_mode' ) ) {
			$classes[] = 'dark-mode';
		}
		
		// Check whether we want the alt nav
		if ( get_theme_mod( 'pretatheme_alt_nav' ) ) {
			$classes[] = 'show-alt-nav';
		}
		
		// Check whether we're doing three preview columns
		if ( get_theme_mod( 'pretatheme_max_columns' ) ) {
			$classes[] = 'three-columns-grid';
		}
		
		// Check whether we're doing three preview columns
		if ( get_theme_mod( 'pretatheme_show_titles' ) ) {
			$classes[] = 'show-preview-titles';
		}
		
		// Add short class to body if resumé page template
		if ( is_page_template( 'resume-page-template.php' ) ) {
			$classes[] = 'resume-template';
		}
		
		return $classes;
	}
	add_action( 'body_class', 'pretatheme_body_classes' );

}


/* MODIFY HTML CLASS TO INDICATE JS
------------------------------------------------ */

if ( ! function_exists( 'pretatheme_has_js' ) ) {

	function pretatheme_has_js() { 
		?>
		<script>jQuery( 'html' ).removeClass( 'no-js' ).addClass( 'js' );</script>
		<?php
	}
	add_action( 'wp_head', 'pretatheme_has_js' );

}


/* REMOVE PREFIX BEFORE ARCHIVE TITLES
------------------------------------------------ */

if ( ! function_exists( 'pretatheme_remove_archive_title_prefix' ) ) {

	function pretatheme_remove_archive_title_prefix( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '#', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_year() ) {
			$title = get_the_date( 'Y' );
		} elseif ( is_month() ) {
			$title = get_the_date( 'F Y' );
		} elseif ( is_day() ) {
			$title = get_the_date( get_option( 'date_format' ) );
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = _x( 'Asides', 'post format archive title', 'pretatheme' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = _x( 'Galleries', 'post format archive title', 'pretatheme' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = _x( 'Images', 'post format archive title', 'pretatheme' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = _x( 'Videos', 'post format archive title', 'pretatheme' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = _x( 'Quotes', 'post format archive title', 'pretatheme' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = _x( 'Links', 'post format archive title', 'pretatheme' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = _x( 'Statuses', 'post format archive title', 'pretatheme' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = _x( 'Audio', 'post format archive title', 'pretatheme' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = _x( 'Chats', 'post format archive title', 'pretatheme' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		} else {
			$title = __( 'Archives', 'pretatheme' );
		}
		return $title;
	}
	add_filter( 'get_the_archive_title', 'pretatheme_remove_archive_title_prefix' );

}


/* CUSTOMIZER SETTINGS
------------------------------------------------ */

class pretatheme_customize {

	public static function pretatheme_register ( $wp_customize ) {

		// Add our Customizer section
		$wp_customize->add_section( 'pretatheme_options', array(
			'title' 		=> __( 'Theme Options', 'pretatheme' ),
			'priority' 		=> 35,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> __( 'Customize the theme settings for Preta Theme.', 'pretatheme' ),
		) );


		// Dark Mode
		$wp_customize->add_setting( 'pretatheme_dark_mode', array(
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'pretatheme_sanitize_checkbox',
			'transport'			=> 'postMessage'
		) );

		$wp_customize->add_control( 'pretatheme_dark_mode', array(
			'type' 			=> 'checkbox',
			'section' 		=> 'colors', // Default WP section added by background_color
			'label' 		=> __( 'Dark Mode', 'pretatheme' ),
			'description' 	=> __( 'Displays the site with white text and black background. If Background Color is set, only the text color will change.', 'pretatheme' ),
		) );
		
		
		// Always show preview titles
		$wp_customize->add_setting( 'pretatheme_alt_nav', array(
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'pretatheme_sanitize_checkbox',
			'transport'			=> 'postMessage'
		) );

		$wp_customize->add_control( 'pretatheme_alt_nav', array(
			'type' 			=> 'checkbox',
			'section' 		=> 'pretatheme_options', // Add a default or your own section
			'label' 		=> __( 'Show Primary Menu in the Header', 'pretatheme' ),
			'description' 	=> __( 'Replace the navigation toggle in the header with the Primary Menu on desktop.', 'pretatheme' ),
		) );
		
		
		// Maximum number of columns
		$wp_customize->add_setting( 'pretatheme_max_columns', array(
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'pretatheme_sanitize_checkbox',
			'transport'			=> 'postMessage'
		) );

		$wp_customize->add_control( 'pretatheme_max_columns', array(
			'type' 			=> 'checkbox',
			'section' 		=> 'pretatheme_options',
			'label' 		=> __( 'Three Columns', 'pretatheme' ),
			'description' 	=> __( 'Check to use three columns in the post grid on desktop.', 'pretatheme' ),
		) );
		
		
		// Always show preview titles
		$wp_customize->add_setting( 'pretatheme_show_titles', array(
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'pretatheme_sanitize_checkbox',
			'transport'			=> 'postMessage'
		) );

		$wp_customize->add_control( 'pretatheme_show_titles', array(
			'type' 			=> 'checkbox',
			'section' 		=> 'pretatheme_options', // Add a default or your own section
			'label' 		=> __( 'Show Preview Titles', 'pretatheme' ),
			'description' 	=> __( 'Check to always show the titles in the post previews.', 'pretatheme' ),
		) );
		
		
		// Set the home page title
		$wp_customize->add_setting( 'pretatheme_home_title', array(
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'			=> 'postMessage'
		) );

		$wp_customize->add_control( 'pretatheme_home_title', array(
			'type' 			=> 'textarea',
			'section' 		=> 'pretatheme_options', // Add a default or your own section
			'label' 		=> __( 'Front Page Title', 'pretatheme' ),
			'description' 	=> __( 'The title you want shown on the front page when the "Front page displays" setting is set to "Your latest posts" in Settings > Reading.', 'pretatheme' ),
		) );
		

		// Make built-in controls use live JS preview
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
		
		
		// SANITATION

		// Sanitize boolean for checkbox
		function pretatheme_sanitize_checkbox( $checked ) {
			return ( ( isset( $checked ) && true == $checked ) ? true : false );
		}
		
	}

	// Initiate the live preview JS
	public static function pretatheme_live_preview() {
		wp_enqueue_script( 'pretatheme-themecustomizer', get_template_directory_uri() . '/assets/js/theme-customizer.js', array(  'jquery', 'customize-preview', 'masonry' ), '', true );
	}

}

// Setup the Theme Customizer settings and controls
add_action( 'customize_register', array( 'pretatheme_customize', 'pretatheme_register' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init', array( 'pretatheme_customize' , 'pretatheme_live_preview' ) );


/* ---------------------------------------------------------------------------------------------
   SPECIFY GUTENBERG SUPPORT
------------------------------------------------------------------------------------------------ */


if ( ! function_exists( 'pretatheme_add_gutenberg_features' ) ) :

	function pretatheme_add_gutenberg_features() {

		/* Gutenberg Features --------------------------------------- */

		add_theme_support( 'align-wide' );

		/* Gutenberg Palette --------------------------------------- */

		add_theme_support( 'editor-color-palette', array(
			array(
				'name' 	=> _x( 'Black', 'Name of the black color in the Gutenberg palette', 'pretatheme' ),
				'slug' 	=> 'black',
				'color' => '#000',
			),
			array(
				'name' 	=> _x( 'Dark Gray', 'Name of the dark gray color in the Gutenberg palette', 'pretatheme' ),
				'slug' 	=> 'dark-gray',
				'color' => '#333',
			),
			array(
				'name' 	=> _x( 'Medium Gray', 'Name of the medium gray color in the Gutenberg palette', 'pretatheme' ),
				'slug' 	=> 'medium-gray',
				'color' => '#555',
			),
			array(
				'name' 	=> _x( 'Light Gray', 'Name of the light gray color in the Gutenberg palette', 'pretatheme' ),
				'slug' 	=> 'light-gray',
				'color' => '#777',
			),
			array(
				'name' 	=> _x( 'White', 'Name of the white color in the Gutenberg palette', 'pretatheme' ),
				'slug' 	=> 'white',
				'color' => '#fff',
			),
		) );

		/* Gutenberg Font Sizes --------------------------------------- */

		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' 		=> _x( 'Small', 'Name of the small font size in Gutenberg', 'pretatheme' ),
				'shortName' => _x( 'S', 'Short name of the small font size in the Gutenberg editor.', 'pretatheme' ),
				'size' 		=> 17,
				'slug' 		=> 'small',
			),
			array(
				'name' 		=> _x( 'Regular', 'Name of the regular font size in Gutenberg', 'pretatheme' ),
				'shortName' => _x( 'M', 'Short name of the regular font size in the Gutenberg editor.', 'pretatheme' ),
				'size' 		=> 20,
				'slug' 		=> 'regular',
			),
			array(
				'name' 		=> _x( 'Large', 'Name of the large font size in Gutenberg', 'pretatheme' ),
				'shortName' => _x( 'L', 'Short name of the large font size in the Gutenberg editor.', 'pretatheme' ),
				'size' 		=> 24,
				'slug' 		=> 'large',
			),
			array(
				'name' 		=> _x( 'Larger', 'Name of the larger font size in Gutenberg', 'pretatheme' ),
				'shortName' => _x( 'XL', 'Short name of the larger font size in the Gutenberg editor.', 'pretatheme' ),
				'size' 		=> 28,
				'slug' 		=> 'larger',
			),
		) );

	}
	add_action( 'after_setup_theme', 'pretatheme_add_gutenberg_features' );

endif;


/* ---------------------------------------------------------------------------------------------
   GUTENBERG EDITOR STYLES
   --------------------------------------------------------------------------------------------- */


if ( ! function_exists( 'pretatheme_block_editor_styles' ) ) :

	function pretatheme_block_editor_styles() {

		$dependencies = array();

		/**
		 * Translators: If there are characters in your language that are not
		 * supported by the theme fonts, translate this to 'off'. Do not translate
		 * into your own language.
		 */
		$google_fonts = _x( 'on', 'Google Fonts: on or off', 'pretatheme' );

		if ( 'off' !== $google_fonts ) {

			// Register Google Fonts
			wp_register_style( 'pretatheme-block-editor-styles-font', '//fonts.googleapis.com/css?family=Libre+Franklin:300,400,400i,500,700,700i&amp;subset=latin-ext', false, 1.0, 'all' );
			$dependencies[] = 'pretatheme-block-editor-styles-font';

		}

		// Enqueue the editor styles
		wp_enqueue_style( 'pretatheme-block-editor-styles', get_theme_file_uri( '/pretatheme-gutenberg-editor-style.css' ), $dependencies, '1.0', 'all' );

	}
	add_action( 'enqueue_block_editor_assets', 'pretatheme_block_editor_styles', 1 );

endif;


?>