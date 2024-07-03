<?php
namespace MascotCoreCarpento\Widgets\ShowcaseBlock;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TM_Elementor_ShowcaseBlock extends Widget_Base {
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		$direction_suffix = is_rtl() ? '.rtl' : '';
		wp_register_style( 'tm-showcase-block', MASCOT_CORE_CARPENTO_ASSETS_URI . '/css/shortcodes/showcase-block' . $direction_suffix . '.css' );
	}

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'tm-ele-showcase-block';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Showcase Block', 'mascot-core-carpento' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'tm-elementor-widget-icon';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'tm' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'mascot-core-hellojs' ];
	}

	public function get_style_depends() {
		return [ 'tm-showcase-block' ];
	}


	/**
	 * Skins
	 */
	protected function register_skins() {
		$this->add_skin( new Skins\Skin_Style1( $this ) );
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
		//Link Options
		$this->start_controls_section(
			'service_icons_options', [
				'label' => esc_html__( 'Showcase Items', 'mascot-core-carpento' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'title',
			[
				'label' => esc_html__( "Title", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( "This is a section title", 'mascot-core-carpento' ),
			]
		);
		$repeater->add_control(
			'title_tag',
			[
				'label' => esc_html__( "Title Tag", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_heading_tag_list(),
				'default' => 'h4'
			]
		);
		$repeater->add_control(
			'btn1_text',
			[
				'label' => esc_html__( "Button 1 Text", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( "View Demo", 'mascot-core-carpento' ),
			]
		);
		$repeater->add_control(
			'btn1_link',
			[
				'label' => esc_html__( "Button 1 Link URL", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::URL,
				'show_external' => true,
				'default' => [
					'url' => '',
				]
			]
		);
		$repeater->add_control(
			'btn2_text',
			[
				'label' => esc_html__( "Button 2 Text", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( "View Demo", 'mascot-core-carpento' ),
			]
		);
		$repeater->add_control(
			'btn2_link',
			[
				'label' => esc_html__( "Button 2 Link URL", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::URL,
				'show_external' => true,
				'default' => [
					'url' => '',
				]
			]
		);
		$repeater->add_control(
			'featured_image',
			[
				'label' => __('Featured Images', 'mascot-core-carpento'),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'featured_image_size', [
				'label' => esc_html__( "Featured Image Size", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_get_available_image_sizes(),
				'default' => 'thumbnail',
			]
		);
		$this->add_control(
			'showcase_items_array',
			[
				'label' => esc_html__( "Showcase Items", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => esc_html__( 'Title #1', 'mascot-core-carpento' ),
						'featured_image' => Utils::get_placeholder_image_src(),
						'btn1_text' => esc_html__( 'View Demo', 'mascot-core-carpento' ),
						'btn2_text' => esc_html__( 'One Page', 'mascot-core-carpento' ),
					],
					[
						'title' => esc_html__( 'Title #2', 'mascot-core-carpento' ),
						'featured_image' => Utils::get_placeholder_image_src(),
						'btn1_text' => esc_html__( 'View Demo', 'mascot-core-carpento' ),
						'btn2_text' => esc_html__( 'One Page', 'mascot-core-carpento' ),
					],
					[
						'title' => esc_html__( 'Title #3', 'mascot-core-carpento' ),
						'featured_image' => Utils::get_placeholder_image_src(),
						'btn1_text' => esc_html__( 'View Demo', 'mascot-core-carpento' ),
						'btn2_text' => esc_html__( 'One Page', 'mascot-core-carpento' ),
					],
				],
			]
		);
		$this->end_controls_section();







		$this->start_controls_section(
			'tm_general',
			[
				'label' => esc_html__( 'General', 'mascot-core-carpento' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'display_type', [
				'label' => esc_html__( "Display Type", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'grid'  =>  esc_html__( 'Grid', 'mascot-core-carpento' ),
					'masonry' =>  esc_html__( 'Masonry', 'mascot-core-carpento' ),
					'carousel'  =>  esc_html__( 'Carousel/Slider', 'mascot-core-carpento' ),
					'basic'  =>  esc_html__( 'Basic', 'mascot-core-carpento' )
				],
				'default' => 'grid'
			]
		);
		$this->add_control(
			'columns', [
				'label' => esc_html__( "Columns Layout", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1'  =>  '1',
					'2'  =>  '2',
					'3'  =>  '3',
					'4'  =>  '4',
					'5'  =>  '5',
					'6'  =>  '6',
				],
				'default' => '4',
				'condition' => [
					'display_type!' => array('carousel')
				]
			]
		);

		//responsive grid layout
		mascot_core_carpento_elementor_grid_responsive_columns($this);

		$this->add_control(
			'gutter',
			[
				'label' => esc_html__( "Gutter", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_isotope_gutter_list_elementor(),
				'default' => 'gutter-10',
				'condition' => [
					'display_type' => array('grid', 'masonry', 'masonry-tiles')
				]
			]
		);
		$this->end_controls_section();





		//Swiper Slider Options
		mascot_core_carpento_get_swiper_slider_arraylist( $this, 1, '', array('display_type' => array('carousel') ) );
		mascot_core_carpento_get_swiper_slider_nav_arraylist( $this, 1, '', array('display_type' => array('carousel') ) );
		mascot_core_carpento_get_swiper_slider_dots_arraylist( $this, 1, '', array('display_type' => array('carousel') ) );











		$this->start_controls_section(
			'title_section',
			[
				'label' => esc_html__( 'Title Options', 'mascot-core-carpento' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_text_color',
			[
				'label' => esc_html__( "Text Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .showcase-title', '{{WRAPPER}} .showcase-title a' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'title_text_color_hover',
			[
				'label' => esc_html__( "Text Color (Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .showcase-title:hover', '{{WRAPPER}} .showcase-title a:hover' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Typography', 'mascot-core-carpento' ),
				'selector' => '{{WRAPPER}} .showcase-title',
			]
		);
		$this->end_controls_section();







		//other settings
		$this->start_controls_section(
			'other_options',
			[
				'label' => esc_html__( 'Other Options', 'mascot-core-carpento' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'box_animation',
			[
				'label' => esc_html__( "Box Animation Style", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					''  =>  esc_html__( 'No Animation', 'mascot-core-carpento' ),
					'iconbox-style1-current-theme-animation'  =>  esc_html__( 'Style 1 - Current Theme Animation', 'mascot-core-carpento' ),
					'iconbox-style2-border-bottom'  =>  esc_html__( 'Style 2 - Border Bottom', 'mascot-core-carpento' ),
					'iconbox-style3-moving-border-bottom' =>  esc_html__( 'Style 3 - Moving Border Bottom', 'mascot-core-carpento' ),
					'iconbox-style4-bgcolor'  =>  esc_html__( 'Style 4 - Hover BG Color', 'mascot-core-carpento' ),
					'iconbox-style5-moving-bgcolor' =>  esc_html__( 'Style 5 - Hover Moving BG Color', 'mascot-core-carpento' ),
					'iconbox-style6-moving-double-bgcolor'  =>  esc_html__( 'Style 6 - Hover Moving Double BG Color', 'mascot-core-carpento' ),
					'iconbox-style7-hover-moving-border'  =>  esc_html__( 'Style 7 - Hover Moving Border Around Box', 'mascot-core-carpento' ),
				],
				'default' => '',
			]
		);
		$this->add_control(
			'box_shadow',
			[
				'label' => esc_html__( "Box Shadow?", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
			]
		);
		$this->add_control(
			'box_shadow_on_hover',
			[
				'label' => esc_html__( "Box Shadow only on Hover?", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
			]
		);
		$this->end_controls_section();



		$this->start_controls_section(
			'button_options',
			[
				'label' => esc_html__( 'Button Options', 'mascot-core-carpento' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		mascot_core_carpento_get_viewdetails_button_arraylist($this, 1);
		mascot_core_carpento_get_viewdetails_button_arraylist($this, 2);
		mascot_core_carpento_get_button_arraylist($this, 1);
		$this->end_controls_section();



		$this->start_controls_section(
			'button_color_typo_options', [
				'label' => esc_html__( 'Button Color/Typography', 'mascot-core-carpento' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		mascot_core_carpento_get_button_text_color_typo_arraylist($this, 1);
		$this->end_controls_section();
















	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();


		//button classes
		$settings['btn_classes'] = mascot_core_carpento_prepare_button_classes_from_params( $settings );



		$settings['holder_id'] = carpento_get_isotope_holder_ID('showcase-block');

		$settings['settings'] = $settings;


		//Produce HTML version by using the parameters (filename, variation, folder name, parameters, shortcode_ob_start)
		$html = mascot_core_carpento_get_shortcode_template_part( 'showcase', $settings['display_type'], 'showcase-block/tpl', $settings, true );

		echo $html;
	}
}
