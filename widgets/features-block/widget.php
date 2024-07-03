<?php
namespace MascotCoreCarpento\Widgets\FeaturesBlock;

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
class TM_Elementor_FeaturesBlock extends Widget_Base {
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		if( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
			$direction_suffix = is_rtl() ? '.rtl' : '';
			wp_enqueue_style( 'tm-features-block-loader', MASCOT_CORE_CARPENTO_ASSETS_URI . '/css/shortcodes/features-block/features-block-loader' . $direction_suffix . '.css' );
		}
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
		return 'tm-ele-features-block';
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
		return esc_html__( 'Features Block', 'mascot-core-carpento' );
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


	/**
	 * Skins
	 */
	protected function register_skins() {
		$this->add_skin( new Skins\Skin_Style1( $this ) );
		$this->add_skin( new Skins\Skin_Style2( $this ) );
		$this->add_skin( new Skins\Skin_Style3( $this ) );
		$this->add_skin( new Skins\Skin_Style4( $this ) );
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
		$this->start_controls_section(
			'features_icons_options', [
				'label' => esc_html__( 'Features Items', 'mascot-core-carpento' ),
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
			'subtitle',
			[
				'label' => esc_html__( "Subtitle", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( "This is a section subtitle", 'mascot-core-carpento' ),
			]
		);
		$repeater->add_control(
			'count',
			[
				'label' => esc_html__( "Count", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( "01", 'mascot-core-carpento' ),
			]
		);
		$repeater->add_control(
			'features_link',
			[
				'label' => esc_html__( "Link URL", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::URL,
				'show_external' => true,
				'default' => [
					'url' => '',
				]
			]
		);
		$repeater->add_control(
			'featured_image_section',
			[
				'label' => esc_html__( 'Featured Image Section', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$repeater->add_control(
			'featured_image',
			[
				'label' => esc_html__( "Featured Image", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
		$repeater->add_control(
			'featured_image_size',
			[
				'label' => esc_html__( "Featured Image Size", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_get_available_image_sizes(),
				'default' => 'medium',
			]
		);
		$repeater->add_control(
			'icon_type',
			[
				'label' => esc_html__( "Thumb Type", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'font-icon' => esc_html__( 'Font/Flat Icon', 'mascot-core-carpento' ),
					'image' => esc_html__( 'JPG/PNG Image', 'mascot-core-carpento' ),
				],
				'default' => 'font-icon'
			]
		);
		$repeater->add_control(
			'features_image',
			[
				'label' => esc_html__( "Thumbnail Image", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( "This image will be shown on the top of the pricing table", 'mascot-core-carpento' ),
				'condition' => [
					'icon_type' => array('image')
				]
			]
		);
		$repeater->add_control(
			'features_image_hover',
			[
				'label' => esc_html__( "Thumbnail Image (Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( "This image will be shown on the top of the pricing table", 'mascot-core-carpento' ),
				'condition' => [
					'icon_type' => array('image')
				]
			]
		);
		$repeater->add_control(
			'features_image_size',
			[
				'label' => esc_html__( "Choose Image Size", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_get_available_image_sizes(),
				'default' => 'full',
				'condition' => [
					'icon_type' => array('image')
				]
			]
		);
		$repeater->add_responsive_control(
			'features_image_width',
			[
				'label' => esc_html__( "Image Custom Width", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'separator' => 'before',
				'size_units' => [ 'px', '%' ],
				'default' => [
					'unit' => '%',
				],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 400,
						'step' => 1,
					],
					'%' => [
						'min' => 5,
						'max' => 100,
						'step' => 1,
					],
				],
				'condition' => [
					'icon_type' => array('image')
				],
				'selectors' => [
					'{{WRAPPER}} .icon img' => 'width: {{SIZE}}{{UNIT}};'
				]
			]
		);
		$repeater->add_control(
			'icon',
			[
				'label' => __('Icon', 'mascot-core-carpento'),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'far fa-chart-bar',
					'library' => 'font-awesome',
				],
				'condition' => [
					'icon_type' => array('font-icon')
				]
			]
		);
		$repeater->add_control(
			'content',
			[
				'label' => esc_html__( "Paragraph", 'mascot-core-carpento' ),
				"description" => esc_html__( "It will be displayed above/under title", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( "Write a short description, that will describe the title or something informational and useful.", 'mascot-core-carpento' ),
			]
		);
		$repeater->add_control(
			'section_effects',
			[
				'label' => esc_html__( 'Motion Effects', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$repeater->add_control(
			'wow_appear_animation',
			[
				'label' => esc_html__( "Wow Appear Animation", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_animate_css_animation_list(),
			]
		);
		$repeater->add_control(
			'wow_animation_delay',
			[
				'label' => esc_html__( 'Animation Delay', 'mascot-core-carpento' ) . ' (ms)',
				'type' => Controls_Manager::NUMBER,
				'default' => '',
				'min' => 0,
				'step' => 100,
				'condition' => [
					'wow_appear_animation!' => '',
				],
				'render_type' => 'none',
				'frontend_available' => true,
			]
		);
		$this->add_control(
			'features_items_array',
			[
				'label' => esc_html__( "Features Items", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'title' => esc_html__( 'Title #1', 'mascot-core-carpento' ),
						'subtitle' => esc_html__( 'subtitle #1', 'mascot-core-carpento' ),
						'featuresd_image' => Utils::get_placeholder_image_src(),
						'content' => esc_html__( 'Item content. Click the edit button to change this text.', 'mascot-core-carpento' ),
						'count' => esc_html__( '01', 'mascot-core-carpento' ),
					],
					[
						'title' => esc_html__( 'Title #2', 'mascot-core-carpento' ),
						'subtitle' => esc_html__( 'Title #2', 'mascot-core-carpento' ),
						'featuresd_image' => Utils::get_placeholder_image_src(),
						'content' => esc_html__( 'Item content. Click the edit button to change this text.', 'mascot-core-carpento' ),
						'count' => esc_html__( '02', 'mascot-core-carpento' ),
					],
					[
						'title' => esc_html__( 'Title #3', 'mascot-core-carpento' ),
						'subtitle' => esc_html__( 'Title #3', 'mascot-core-carpento' ),
						'featuresd_image' => Utils::get_placeholder_image_src(),
						'content' => esc_html__( 'Item content. Click the edit button to change this text.', 'mascot-core-carpento' ),
						'count' => esc_html__( '03', 'mascot-core-carpento' ),
					],
				],
			]
		);
		$this->end_controls_section();





		$this->start_controls_section(
			'tm_general',
			[
				'label' => esc_html__( 'General Settings', 'mascot-core-carpento' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_responsive_control(
			'text_alignment',
			[
				'label' => esc_html__( "Text Alignment", 'mascot-core-carpento' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => mascot_core_carpento_text_align_choose(),
				'selectors' => [
					'{{WRAPPER}}' => 'text-align: {{VALUE}};'
				]
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
		$this->add_control(
			'show_paragraph', [
				'label' => esc_html__( "Show Paragraph", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label' => esc_html__( "Title Tag", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_heading_tag_list(),
				'default' => 'h4'
			]
		);
		$this->add_control(
			'subtitle_tag',
			[
				'label' => esc_html__( "Subtitle Tag", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_heading_tag_list(),
				'default' => 'h5'
			]
		);
		$this->end_controls_section();






		//Swiper Slider Options
		mascot_core_carpento_get_swiper_slider_arraylist( $this, 1, '', array('display_type' => array('carousel') ) );
		mascot_core_carpento_get_swiper_slider_nav_arraylist( $this, 1, '', array('display_type' => array('carousel') ) );
		mascot_core_carpento_get_swiper_slider_dots_arraylist( $this, 1, '', array('display_type' => array('carousel') ) );










		$this->start_controls_section(
			'icon_styling',
			[
				'label' => esc_html__( 'Icon Styling', 'mascot-core-carpento' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'animate_icon_on_hover',
			[
				'label' => esc_html__( "Animate Icon on Hover", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'None', 'mascot-core-carpento' ),
					'rotate' => esc_html__( 'Rotate', 'mascot-core-carpento' ),
					'rotate-x' => esc_html__( 'Rotate X', 'mascot-core-carpento' ),
					'rotate-y' => esc_html__( 'Rotate Y', 'mascot-core-carpento' ),
					'translate'  => esc_html__( 'Translate', 'mascot-core-carpento' ),
					'translate-x'  => esc_html__( 'Translate X', 'mascot-core-carpento' ),
					'translate-y'  => esc_html__( 'Translate Y', 'mascot-core-carpento' ),
					'scale'  => esc_html__( 'Scale', 'mascot-core-carpento' ),
				],
				'default' => '',
			]
		);

		$this->end_controls_section();






		$this->start_controls_section(
			'title_options_styling',
			[
				'label' => esc_html__( 'Title Styling', 'mascot-core-carpento' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs('tabs_title_styling');
		$this->start_controls_tab(
			'tabs_title_styling_normal',
			[
				'label' => esc_html__('Normal', 'mascot-core-carpento'),
			]
		);
		$this->add_control(
			'title_text_color',
			[
				'label' => esc_html__( "Text Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .features-item .features-title' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'title_theme_colored',
			[
				'label' => esc_html__( "Text Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .features-item .features-title' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Typography', 'mascot-core-carpento' ),
				'selector' => '{{WRAPPER}} .features-item .features-title',
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .features-item .features-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .features-item .features-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tabs_title_styling_wrapper_hover',
			[
				'label' => esc_html__('Wrapper Hover', 'mascot-core-carpento'),
			]
		);
		$this->add_control(
			'title_text_color_item_wrapper_hover',
			[
				'label' => esc_html__( "Text Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .features-item:hover .features-title' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'title_theme_colored_item_wrapper_hover',
			[
				'label' => esc_html__( "Text Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .features-item:hover .features-title' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tabs_title_styling_hover',
			[
				'label' => esc_html__('Hover', 'mascot-core-carpento'),
			]
		);
		$this->add_control(
			'title_text_color_hover',
			[
				'label' => esc_html__( "Text Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .features-item .features-title:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .features-item .features-title a:hover' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'title_theme_colored_hover',
			[
				'label' => esc_html__( "Text Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .features-item .features-title:hover' => 'color: var(--theme-color{{VALUE}});',
					'{{WRAPPER}} .features-item .features-title a:hover' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();






		$this->start_controls_section(
			'excerpt_options_styling',
			[
				'label' => esc_html__( 'Excerpt Styling', 'mascot-core-carpento' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs('tabs_excerpt_styling');
		$this->start_controls_tab(
			'tabs_excerpt_styling_normal',
			[
				'label' => esc_html__('Normal', 'mascot-core-carpento'),
			]
		);
		$this->add_control(
			'excerpt_text_color',
			[
				'label' => esc_html__( "Text Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .features-item .features-details' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'excerpt_theme_colored',
			[
				'label' => esc_html__( "Text Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .features-item .features-details' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'label' => esc_html__( 'Typography', 'mascot-core-carpento' ),
				'selector' => '{{WRAPPER}} .features-item .features-details',
			]
		);
		$this->add_responsive_control(
			'excerpt_margin',
			[
				'label' => esc_html__( 'Margin', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .features-item .features-details' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'excerpt_padding',
			[
				'label' => esc_html__( 'Padding', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .features-item .features-details' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tabs_excerpt_styling_wrapper_hover',
			[
				'label' => esc_html__('Wrapper Hover', 'mascot-core-carpento'),
			]
		);
		$this->add_control(
			'excerpt_text_color_item_wrapper_hover',
			[
				'label' => esc_html__( "Text Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .features-item:hover .features-details' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'excerpt_theme_colored_item_wrapper_hover',
			[
				'label' => esc_html__( "Text Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .features-item:hover .features-details' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();













		$this->start_controls_section(
			'icon_custom_styling',
			[
				'label' => esc_html__( 'Icon Custom Styling', 'mascot-core-carpento' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs('tabs_current_theme_styling');
		$this->start_controls_tab(
			'tabs_current_theme_styling_normal',
			[
				'label' => esc_html__('Normal', 'mascot-core-carpento'),
			]
		);

		$this->add_control(
			'hr01-pos',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'icon_color_options',
			[
				'label' => esc_html__( 'Icon Color Options', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'icon_theme_colored',
			[
				'label' => esc_html__( "Make Icon Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon' => 'color: var(--theme-color{{VALUE}});',
					'{{WRAPPER}} .icon svg' => 'fill: var(--theme-color{{VALUE}});',
				],
			]
		);
		$this->add_control(
			'icon_custom_color',
			[
				'label' => esc_html__( "Icon Custom Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .icon svg' => 'fill: {{VALUE}};',
				]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'icon_typography',
				'label' => esc_html__( 'Typography', 'mascot-core-carpento' ),
				'selector' => '{{WRAPPER}} .icon i, {{WRAPPER}} .icon svg',
			]
		);
		$this->add_control(
			'hr1-funfact',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'icon_bgcolor_options',
			[
				'label' => esc_html__( 'Icon Background Color Options', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'icon_area_bg_theme_colored',
			[
				'label' => esc_html__( "Icon Area BG Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .icon' => 'background-color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->add_control(
			'icon_area_custom_bg_color',
			[
				'label' => esc_html__( "Icon Area Custom BG Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .icon' => 'background-color: {{VALUE}};',
				]
			]
		);
		$this->add_responsive_control(
			'icon-line-height',
			[
				'label' => esc_html__( "Icon Line Height", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon' => 'line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .icon i' => 'line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .icon svg' => 'line-height: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$this->add_responsive_control(
			'icon_margin',
			[
				'label' => esc_html__( 'Icon Margin', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'separator' => 'before',
				'selectors' => [
					'{{WRAPPER}} .icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Icon Padding', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_control(
			'icon_area_border_options',
			[
				'label' => esc_html__( 'Border Options', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'icon_area_border',
				'label' => esc_html__( 'Border', 'mascot-core-carpento' ),
				'selector' => '{{WRAPPER}} .icon',
			]
		);
		$this->add_responsive_control(
			'icon_area_border_radius',
			[
				'label' => esc_html__( "Border Radius", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_area_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'mascot-core-carpento' ),
				'selector' => '{{WRAPPER}} .icon',
			]
		);
		$this->add_control(
			'icon_area_dimension_options',
			[
				'label' => esc_html__( 'Dimension Options', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);
		$this->add_responsive_control(
			'icon_area_width',
			[
				'label' => esc_html__( "Width", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon' => 'width: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$this->add_control(
			'icon_area_width_auto',
			[
				'label' => esc_html__( "Make Icon Width to Auto?", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'selectors' => [
					'{{WRAPPER}} .icon' => 'width: auto;',
				]
			]
		);
		$this->add_responsive_control(
			'icon_area_height',
			[
				'label' => esc_html__( "Height", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', 'em', '%'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .icon' => 'height: {{SIZE}}{{UNIT}};',
				]
			]
		);
		$this->add_control(
			'icon_area_height_auto',
			[
				'label' => esc_html__( "Make Icon Height to Auto?", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'selectors' => [
					'{{WRAPPER}} .icon' => 'height: auto;',
				]
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tabs_current_theme_styling_hover',
			[
				'label' => esc_html__('Hover', 'mascot-core-carpento'),
			]
		);
		$this->add_control(
			'icon_color_options_hover',
			[
				'label' => esc_html__( 'Icon Color Options', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'icon_theme_colored_hover',
			[
				'label' => esc_html__( "Make Icon Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}:hover .icon' => 'color: var(--theme-color{{VALUE}});',
					'{{WRAPPER}}:hover .icon svg' => 'fill: var(--theme-color{{VALUE}});',
				],
			]
		);
		$this->add_control(
			'icon_custom_color_hover',
			[
				'label' => esc_html__( "Icon Custom Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}}:hover .icon svg' => 'fill: {{VALUE}};',
				]
			]
		);
		$this->add_control(
			'hr1-funfact_hover',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		$this->add_control(
			'icon_bgcolor_options_hover',
			[
				'label' => esc_html__( 'Icon Background Color Options', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'icon_area_bg_theme_colored_hover',
			[
				'label' => esc_html__( "Icon Area BG Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}}:hover .icon' => 'background-color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->add_control(
			'icon_area_custom_bg_color_hover',
			[
				'label' => esc_html__( "Icon Area Custom BG Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}}:hover .icon' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();

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

		if( $settings['animate_icon_on_hover'] ) {
			$classes[] = 'animate-hover animate-icon-'.$settings['animate_icon_on_hover'];
		}

		//icon classes
		$icon_classes = array();
		$settings['icon_classes'] = $icon_classes;

		//button classes
		$settings['btn_classes'] = mascot_core_carpento_prepare_button_classes_from_params( $settings );


		//icon classes
		$icon_classes = array();
		$settings['icon_classes'] = $icon_classes;

		$settings['holder_id'] = carpento_get_isotope_holder_ID('features-block');

		$settings['settings'] = $settings;


		//Produce HTML version by using the parameters (filename, variation, folder name, parameters, shortcode_ob_start)
		$html = mascot_core_carpento_get_shortcode_template_part( 'features', $settings['display_type'], 'features-block/tpl', $settings, true );

		echo $html;
	}
}
