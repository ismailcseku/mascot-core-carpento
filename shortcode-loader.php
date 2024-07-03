<?php
namespace MascotCoreCarpento;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;
	public $widgets = array();
	public $widgets_shop = array();
	public $widgets_core = array();
	public $woocommerce_status = false;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		if( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
			wp_enqueue_script( 'swiper' );
			wp_enqueue_style( 'swiper' );
		}
		wp_register_script( 'mascot-core-hellojs', plugins_url( '/assets/js/elementor-mascot.js', __FILE__ ), [ 'jquery' ], false, true );
	}

	public function widget_styles() {
		wp_enqueue_style( 'mascot-core-elementor-css', plugins_url( '/assets/css/elementor-mascot.css', __FILE__ ) );
	}

	public function widget_styles_frontend() {
		$direction_suffix = is_rtl() ? '.rtl' : '';
		wp_enqueue_style( 'tm-header-search', MASCOT_CORE_CARPENTO_ASSETS_URI . '/css/shortcodes/header-search' . $direction_suffix . '.css' );
		wp_enqueue_style( 'mascot-core-widgets-style', MASCOT_CORE_CARPENTO_ASSETS_URI . '/css/widgets-core/mascot-core-widgets-style' . $direction_suffix . '.css' );
	}


	public function woocommerce_status() {

		if ( class_exists( 'WooCommerce' ) ) {
			$this->woocommerce_status = true;
		}

		return $this->woocommerce_status;
	}


	// collected from mascot-core
	public function widgets_core_list() {
		$this->widgets_core = array_merge(
			$this->widgets_core, array(
				'accordion',
				'animated-layers',
				'bg-angle-left-right',
				'blank-box',
				'button',
				'clients-logo',
				'contact-form-7',
				'contact-list',
				'floating-objects',
				'funfact-counter',
				'header-top-info',
				'icon-box',
				'image-background-text-effect',
				'image-with-rotated-text',
				'info-box',
				'list',
				'navigation-menu',
				'newsletter',
				'paroller-animation',
				'pie-chart',
				'progress-bar',
				'rotated-text',
				'section-title',
				'social-links',
				'tabs',
				'text-editor',
				'text-editor-advanced',
				'unordered-list',
				'vertical-bg-img-list',
				'video-popup'
			)
		);
		return $this->widgets_core;
	}
	//widgets core
	private function include_widgets_core_files() {
		foreach( $this->widgets_core_list() as $widget ) {
			require_once( __DIR__ . '/widgets-core/'. $widget .'/widget.php' );

			foreach( glob( __DIR__ . '/widgets-core/'. $widget .'/skins/*.php') as $filepath ) {
				include $filepath;
			}
		}
	}



	public function widgets_list() {
		$this->widgets = array(
			'blog-list',
			'award-block',
			'features-block',
			'pricing-block',
			'working-block',
			'service-block',
			'showcase-block',
			'team-block',
			'testimonial-block',
			'counter-block',
			'countdown-timer',
			'header-primary-nav',
			'header-nav-side-icons',
			'page-title',
			'image-gallery',
			'pricing-plan',
			'pricing-plan-switcher',
			'site-logo',
			'app-button',
			'spin-text-around-logo',
			'moving-text-repeater',
			'interactive-list',
			'interactive-tabs-title',
			'interactive-tabs-content',
			'swiper-carousel-arrow'
		);


		return $this->widgets;
	}


	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		foreach( $this->widgets_list() as $widget ) {
			require_once( __DIR__ . '/widgets/'. $widget .'/widget.php' );

			foreach( glob( __DIR__ . '/widgets/'. $widget .'/skins/*.php') as $filepath ) {
				include $filepath;
			}
		}
	}
	private function include_widgets_files_cpt() {
		//cpt
		require_once( __DIR__ . '/cpt/projects/loader.php' );
		require_once( __DIR__ . '/cpt/blog/widget.php' );

		$cpt_list = array(
			'projects',
			'blog',
		);

		foreach( $cpt_list as $cpt ) {
			foreach( glob( __DIR__ . '/cpt/'. $cpt .'/skins/*.php') as $filepath ) {
				include $filepath;
			}
		}
	}
	private function include_widgets_files_current_theme() {
	}


	//shop
	public function widgets_list_shop() {
		// woocommerce_status.
		if ( $this->woocommerce_status() ) {
			$this->widgets_shop = array_merge(
				$this->widgets_shop, array(
					'header-cart',
					'header-search',
					'info-banner',
					'wc-products',
					'product-category',
					'product-list',
					'vertical-menu',
					'wishlist',
					'product-tabs'
				)
			);
		}
		return $this->widgets_shop;
	}

	private function include_widgets_files_shop() {
		foreach( $this->widgets_list_shop() as $widget ) {
			require_once( __DIR__ . '/widgets-shop/'. $widget .'/widget.php' );

			foreach( glob( __DIR__ . '/widgets-shop/'. $widget .'/skins/*.php') as $filepath ) {
				include $filepath;
			}
		}
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();
		$this->include_widgets_files_cpt();
		$this->include_widgets_files_current_theme();

		// WooCommerce.
		$this->include_widgets_files_shop();

		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Blog_List() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\AwardBlock\TM_Elementor_AwardBlock() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\FeaturesBlock\TM_Elementor_FeaturesBlock() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\ServiceBlock\TM_Elementor_ServiceBlock() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\PricingBlock\TM_Elementor_PricingBlock() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\ShowcaseBlock\TM_Elementor_ShowcaseBlock() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\WorkingBlock\TM_Elementor_WorkingBlock() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\ImageGallery\TM_Elementor_Image_Gallery() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TeamBlock\TM_Elementor_TeamBlock() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TestimonialBlock\TM_Elementor_TestimonialBlock() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\CounterBlock\TM_Elementor_CounterBlock() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\CountdownTimer\TM_Elementor_Countdown_Timer() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Page_Title() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Site_Logo() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Top_Primary_Nav() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Header_Nav_Side_Icons() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_App_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\InteractiveList\TM_Elementor_InteractiveList() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\MovingTextRepeater\TM_Elementor_MovingTextRepeater() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Spin_Text_Around_Logo() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\InteractiveTabs\TM_Elementor_InteractiveTabsTitle() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\InteractiveTabs\TM_Elementor_InteractiveTabsContent() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\PricingPlan\TM_Elementor_Pricing_Plan() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\PricingPlanSwitcher\TM_Elementor_Pricing_Plan_Switcher() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Swiper_Carousel_Arrow() );




		//Collected from mascot-core
		$this->include_widgets_core_files();

		//shortcodes
		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Accordion\TM_Elementor_Accordion() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Animated_Layers() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_BG_Aangle_Left_Right() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Blank_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Button() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Clients_logo() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Contact_Form_7() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Contact_List() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Floating_Objects() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Funfact_Counter() );
		//header shortcodes
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Header_Top_Info() );

		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Iconbox() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Image_Background_Text_Effect() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Image_With_Rotated_Text() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\InfoBox\TM_Elementor_InfoBox() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_List() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Navigation_Menu() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Newsletter() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Paroller_Animation() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Pie_Chart() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Progress_Bar() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Rotated_Text() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Section_Title() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Social_Links() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Tabs\TM_Elementor_Tabs() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_TextEditor() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_TextEditorAdvanced() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Unordered_List() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\VerticalBgImgList\TM_Elementor_Vertical_Bg_Img_List() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\VideoPopup\TM_Elementor_Video_Popup() );


		//cpt
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Projects\TM_Elementor_Projects() );
		\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Blog\TM_Elementor_Blog() );

		//Shop Widgets
		if ( $this->woocommerce_status() ) {
			\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Header_Cart() );
			\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Header_Search() );
			\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Products\TM_Elementor_WC_Products() );
			\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_InfoBanner() );
			\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Products_Category\TM_Elementor_Products_Category() );
			\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\Product_List\TM_Elementor_Product_List() );
			\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Product_Tabs() );
			\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Vertical_Menu() );
			\Elementor\Plugin::instance()->widgets_manager->register( new Widgets\TM_Elementor_Wishlist() );
		}

	}

	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {

		// Register widget scripts
		add_action( 'elementor/frontend/before_register_scripts', [ $this, 'widget_scripts' ] );
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'widget_styles' ] );

		add_action( 'elementor/frontend/before_register_scripts', [ $this, 'widget_styles_frontend' ] );
		add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'widget_styles_frontend' ] );

		// Register widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
	}
}

// Instantiate Plugin Class
Plugin::instance();

//elementor elements
require_once( __DIR__ . '/elementor-elements/loader.php' );