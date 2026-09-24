<?php 
/**
 * @Packge 	   : Hipstyle
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	// Final Class
	final class Hipstyle{

		
		// Theme Version
		private $hipstyle_version = '1.0';

		// Minimum WordPress Version required
		private $min_wp = '4.0';

		// Minimum PHP version required 
		private $min_php = '5.6.25';

		function __construct(){
			// Theme Support
			add_action( 'after_setup_theme', array( $this, 'support' ) );
			// 
			$this->init();
		}

		// Theme init
		public function init(){
			//
			$this->setup();

			// customizer init Instantiate
			$this->customizer_init();
			
		}

		// Theme setup
		private function setup(){
			
			// Create enqueue class instance
			$enqueu = new hipstyle_Enqueue();
			$enqueu->scripts = $this->enqueue() ;
			$enqueu->hipstyle_scripts_enqueue_init() ;

		}
		// Theme Support
		public function support(){
			// content width
	        $GLOBALS['content_width'] = apply_filters( 'hipstyle_content_width', 751 );

	        
	        // text domain for translation.
	        load_theme_textdomain( 'hipstyle', HIPSTYLE_DIR_PATH . '/languages' );
	        
	        // support title tage
	        add_theme_support( 'title-tag' );
	        
	        // support logo
			add_theme_support( 'custom-logo', array(
				'height'      => 32,
				'width'       => 117,
				'flex-height' => true,
				'flex-width'  => true,
				'header-text' => array( 'site-title', 'site-description' ),
			) );

			//Custom Hreader
			add_theme_support( 'custom-header', array(
				'flex-width'    => true,
				'width'         => 1920,
				'flex-height'   => true,
				'height'        => 450,
				'default-image' => get_template_directory_uri() . '/assets/img/banner.jpg'
			) );

			//Custom background
			add_theme_support( 'custom-background', array(
				'default-color' => 'ffffff'
			) );

	        //  support post format
	        add_theme_support( 'post-formats', array( 'video','audio' ) );
	        
	        // support post-thumbnails
	        add_theme_support( 'post-thumbnails', array( 'post' ) );
			
			// Site logo size
			add_image_size( 'hipstyle_logo_117x32', 117, 32, true );
					
			// About section image size
			add_image_size( 'hipstyle_about_section_353x383', 353, 383, true );
			add_image_size( 'hipstyle_about_section_339x397', 339, 397, true );
			add_image_size( 'hipstyle_about_section_529x601', 529, 601, true );

			// Service & Blog image size
			add_image_size( 'hipstyle_section_img_29x53', 29, 53, true );
			add_image_size( 'hipstyle_service_img_324x267', 324, 267, true );

			// Feature image size
			add_image_size( 'hipstyle_feature_img_icon_39x58', 39, 58, true );
			add_image_size( 'hipstyle_feature_img_476x570', 476, 570, true );

			// Pricing Item Thumb & Testimonial client img & Latest post thumbnail Widget thumbnail size
			add_image_size( 'hipstyle_widget_post_thumb_80x80', 80, 80, true );
			add_image_size( 'hipstyle_quote_thumb_59x51', 59, 51, true );

			// Artist thumbnail size
			add_image_size( 'hipstyle_artist_thumb_360x434', 360, 434, true );

			// Single blog post image size
			add_image_size( 'hipstyle_single_blog_750x375', 750, 375, true );
			add_image_size( 'hipstyle_np_thumb', 60, 60, true );
	        	        
	        // support automatic feed links
	        add_theme_support( 'automatic-feed-links' );
	        
	        // support html5
	        add_theme_support( 'html5' );
			
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );
						    
	        // register nav menu
	        register_nav_menus( array(
	            'primary-menu'   => esc_html__( 'Primary Menu', 'hipstyle' ),
				'social-menu'    => esc_html__( 'Social Menu', 'hipstyle' ),
	        ) );

	        // editor style
	        add_editor_style('assets/css/editor-style.css');

		} // end support method

		// enqueue theme style and script
		private function enqueue(){

			$cssPath = HIPSTYLE_DIR_CSS_URI;
			$jsPath  = HIPSTYLE_DIR_JS_URI;

			$scripts = array(
				'style' => array(
					array(
						'handler'		=> 'hipstyle_theme-google-font',
						'file' 			=> $this->google_font(),
					),
					array(
						'handler'		=> 'hipstyle_theme-bootstrap',
						'file' 			=> $cssPath.'bootstrap.min.css',
						'dependency' 	=> array(),
						'version' 		=> '5.3.8-5',
					),
					array(
						'handler'		=> 'hipstyle_theme-animate',
						'file' 			=> $cssPath.'animate.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'hipstyle_theme-owl-carousel',
						'file' 			=> $cssPath.'owl.carousel.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'hipstyle_theme-font-awesome',
						'file' 			=> $cssPath.'font-awesome.min.css',
						'dependency' 	=> array(),
						'version' 		=> '7.3.1-1',
					),
					array(
						'handler'		=> 'hipstyle_theme-themify',
						'file' 			=> $cssPath.'themify-icons.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'hipstyle_theme-flaticon',
						'file' 			=> $cssPath.'flaticon.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'hipstyle_theme-magnific-popup-css',
						'file' 			=> $cssPath.'magnific-popup.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'hipstyle_theme-slick-css',
						'file' 			=> $cssPath.'slick.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'hipstyle_theme-gijgo-min-css',
						'file' 			=> $cssPath.'gijgo.min.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'hipstyle_theme-nice-select-css',
						'file' 			=> $cssPath.'nice-select.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'hipstyle_theme-default-css',
						'file' 			=> $cssPath.'default.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					array(
						'handler'		=> 'hipstyle_theme-style-css',
						'file' 			=> $cssPath.'style.css',
						'dependency' 	=> array(),
						'version' 		=> '1.0',
					),
					
					array(
						'handler'		=> 'hipstyle_theme-hipstyle-style',
						'file' 			=> get_stylesheet_uri(),
					),
				),
				
				'scripts' => array(
					array(
						'handler'		=> 'hipstyle_theme-bootstrap',
						'file' 			=> $jsPath.'bootstrap.min.js',
						'dependency' 	=> array(),
						'version' 		=> '5.3.8-4',
						'in_footer' 	=> true
					),
					
					array(
						'handler'		=> 'hipstyle-ui-js',
						'file' 			=> $jsPath . ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? 'colorlib-ui.js' : 'colorlib-ui.min.js' ),
						'dependency' 	=> array(),
						'version' 		=> '3.0.0',
						'in_footer' 	=> true
					),
					array(
						'handler'		=> 'hipstyle_theme-hipstyle-custom',
						'file' 			=> $jsPath.'custom.js',
						'dependency' 	=> array( 'hipstyle-ui-js' ),
						'version' 		=> $this->hipstyle_version . '-s2',
						'in_footer' 	=> true
					),

				)
			);

			return $scripts;

		} // end enqueu method 

		// Google Font  
		private function google_font(){
			$font_url = '';

			/*
			 * The families this theme uses are bundled under
			 * assets/fonts/google, so nothing is fetched from Google and
			 * no request leaves the visitor's browser for a third party.
			 *
			 * Translators can still turn the fonts off for scripts these
			 * families do not cover.
			 */
			if ( 'off' !== _x( 'on', 'Google font: on or off', 'hipstyle' ) ) {
				$font_url = get_template_directory_uri() . '/assets/css/google-fonts.css';
			}

			return esc_url_raw( $font_url );
		} //End google_font method

		private function customizer_init(){

		
			

			
			// Instantiate hipstyle theme customizer
			$hipstyle_theme_customizer = new hipstyle_theme_customizer();
		}
	} // End Hipstyle Class

?>