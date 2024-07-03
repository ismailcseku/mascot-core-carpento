<?php
namespace MascotCoreCarpento\Widgets\Projects;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

use MASCOTCORECARPENTO\Lib;
use MASCOTCORECARPENTO\CPT\Projects\CPT_Projects;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class TM_Elementor_Projects extends Widget_Base {
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);

		if( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
			$direction_suffix = is_rtl() ? '.rtl' : '';
			wp_enqueue_style( 'tm-projects-style', MASCOT_CORE_CARPENTO_ASSETS_URI . '/css/cpt/projects/projects-loader' . $direction_suffix . '.css' );
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
		return 'tm-ele-cpt-projects';
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
		return esc_html__( 'Projects Grid', 'mascot-core-carpento' );
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
		$this->add_skin( new Skins\Skin_Style_Current_Theme1( $this ) );
		$this->add_skin( new Skins\Skin_Style_Current_Theme2( $this ) );
		$this->add_skin( new Skins\Skin_Style_Current_Theme3( $this ) );
		$this->add_skin( new Skins\Skin_Style_Mouse_Follow_Floating_Info( $this ) );
	}

	protected function get_supported_ids() {
		$new_cpt_class = CPT_Projects::Instance();
		$supported_ids = [];

		$wp_query = new \WP_Query( array(
			'post_type' => $new_cpt_class->ptKey,
			'post_status' => 'publish'
		) );

		if ( $wp_query->have_posts() ) {
			while ( $wp_query->have_posts() ) {
				$wp_query->the_post();
				$supported_ids[get_the_ID()] = get_the_title();
			}
		}

		return $supported_ids;
	}

	public function get_supported_taxonomies() {
		$new_cpt_class = CPT_Projects::Instance();
		$supported_taxonomies = [];

		$categories = get_terms( array(
			'taxonomy' => $new_cpt_class->ptTaxKey,
			'hide_empty' => false,
		) );
		if( ! empty( $categories )  && ! is_wp_error( $categories ) ) {
			foreach ( $categories as $category ) {
			    $supported_taxonomies[$category->term_id] = $category->name;
			}
		}

		return $supported_taxonomies;
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
		$new_cpt_class = CPT_Projects::Instance();
		$posts_array = mascot_core_carpento_get_post_list_array_by_post_type( $new_cpt_class->ptKey );
		$orderby_parameters_list = mascot_core_carpento_orderby_parameters_list();

		$this->start_controls_section(
			'tm_general', [
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
				'default' => '3',
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
			'feature_thumb_image_size', [
				'label' => esc_html__( "Thumbnail Image Size (Common for all)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_get_available_image_sizes(),
			]
		);
		$this->end_controls_section();





		//Query Options
		$this->start_controls_section(
			'query', [
				'label' => esc_html__( 'Query', 'mascot-core-carpento' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'total_items', [
				'label' => esc_html__( "Number of Items to Query from Database", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				"description" => esc_html__( "How many items do you wish to show? Put -1 to show all. Default 3", 'mascot-core-carpento' ),
				'default' => '3'
			]
		);
		$this->add_control(
			'show_only_selected_single_post', [
				'label' => esc_html__( "Show Only Selected Single Item", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no',
			]
		);
		$this->add_control(
			'selected_single_post', [
				'label' => esc_html__( "Choose Single Item", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $posts_array,
				'condition' => [
					'show_only_selected_single_post' => array('yes')
				]
			]
		);
		$this->add_control(
			'ids',
			[
				'label' => __( 'Ids', 'mascot-core-carpento' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->get_supported_ids(),
				'label_block' => true,
				'multiple' => true,
			]
		);
		$this->add_control(
			'category',
			[
				'label' => __( 'Category', 'mascot-core-carpento' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->get_supported_taxonomies(),
				'label_block' => true,
				'multiple' => true,
			]
		);
		$this->add_control(
			'order_by', [
				'label' => esc_html__( "Order By", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $orderby_parameters_list,
			]
		);
		$this->add_control(
			'order', [
				'label' => esc_html__( "Order", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'DESC' => esc_html__( 'Descending', 'mascot-core-carpento' ),
					'ASC' => esc_html__( 'Ascending', 'mascot-core-carpento' ),
				],
			]
		);
		$this->end_controls_section();





		//Swiper Slider Options
		mascot_core_carpento_get_swiper_slider_arraylist( $this, 1, '', array('display_type' => array('carousel') ) );
		mascot_core_carpento_get_swiper_slider_nav_arraylist( $this, 1, '', array('display_type' => array('carousel') ) );
		mascot_core_carpento_get_swiper_slider_dots_arraylist( $this, 1, '', array('display_type' => array('carousel') ) );


		//Link Options
		$this->start_controls_section(
			'project_image_size_options', [
				'label' => esc_html__( 'Image Size Arrangement', 'mascot-core-carpento' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => [
					'display_type' => array('masonry')
				]
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'image_for_project',
			[
				'label' => __( 'For Project', 'mascot-core-carpento' ),
				'type' => Controls_Manager::SELECT2,
				'options' => $this->get_supported_ids(),
				'label_block' => true,
				'multiple' => false,
			]
		);
		$repeater->add_control(
			'image_size', [
				'label' => esc_html__( "Image Size", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_get_available_image_sizes(),
			]
		);
		$this->add_control(
			'project_image_size_array',
			[
				'label' => esc_html__( "Project Image Sizes", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		$this->end_controls_section();





		//Content Options
		$this->start_controls_section(
			'content_section', [
				'label' => esc_html__( 'Content', 'mascot-core-carpento' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'add_border_radius', [
				'label' => esc_html__( "Add Border Radius Around the Box", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'custom_border_radius', [
				'label' => esc_html__( "Custom Border Radius", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				"description" => esc_html__( "Example: 15px 10px 15px 10px", 'mascot-core-carpento' ),
				'condition' => [
					'add_border_radius' => array('yes')
				]
			]
		);
		$this->add_control(
			'show_title', [
				'label' => esc_html__( "Show Title", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'title_tag', [
				'label' => esc_html__( "Title Tag", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_heading_tag_list(),
				'default' => 'h4',
				'condition' => [
					'show_title' => array('yes')
				]
			]
		);
		$this->add_control(
			'show_excerpt', [
				'label' => esc_html__( "Show Excerpt", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);
		$this->add_control(
			'excerpt_length', [
				'label' => esc_html__( "Excerpt Length", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				"description" => esc_html__( "Number of words to display. Example: 25. Default all", 'mascot-core-carpento' ),
				'condition' => [
					'show_excerpt' => array('yes')
				]
			]
		);
		$this->add_control(
			'show_cat', [
				'label' => esc_html__( "Show Category", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'no'
			]
		);
		$this->add_control(
			'year', [
				'label' => esc_html__( "Year", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);
		$this->end_controls_section();






















		//Category Filter
		$this->start_controls_section(
			'cat_filter_section', [
				'label' => esc_html__( 'Category Filter', 'mascot-core-carpento' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		mascot_core_carpento_get_cat_filter_arraylist( $this, 1, array('display_type' => array('grid', 'masonry', 'carousel') ) );
		mascot_core_carpento_get_cat_filter_arraylist( $this, 2 );
		mascot_core_carpento_get_cat_filter_arraylist( $this, 3 );
		mascot_core_carpento_get_cat_filter_arraylist( $this, 4 );

		$this->end_controls_section();





		//Button
		$this->start_controls_section(
			'button_options', [
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









		$this->start_controls_section(
			'title_options_styling',
			[
				'label' => esc_html__( 'Title Styling', 'mascot-core-carpento' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'title_text_color',
			[
				'label' => esc_html__( "Text Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .type-projects .title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .type-projects .title a' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'title_text_color_hover',
			[
				'label' => esc_html__( "Text Color (Title Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .type-projects .title:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .type-projects .title a:hover' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'title_text_color_item_hover',
			[
				'label' => esc_html__( "Text Color (Item Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .type-projects:hover .title' => 'color: {{VALUE}};',
					'{{WRAPPER}} .type-projects:hover .title a' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'title_theme_colored',
			[
				'label' => esc_html__( "Title Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .type-projects .title' => 'color: var(--theme-color{{VALUE}});',
					'{{WRAPPER}} .type-projects .title a' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->add_control(
			'title_theme_colored_hover',
			[
				'label' => esc_html__( "Title Theme Colored (Title Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .type-projects .title:hover' => 'color: var(--theme-color{{VALUE}});',
					'{{WRAPPER}} .type-projects .title a:hover' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->add_control(
			'title_theme_colored_item_hover',
			[
				'label' => esc_html__( "Title Theme Colored (Item Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .type-projects:hover .title' => 'color: var(--theme-color{{VALUE}});',
					'{{WRAPPER}} .type-projects:hover .title a' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Typography', 'mascot-core-carpento' ),
				'selector' => '{{WRAPPER}} .type-projects .title',
				'selector' => '{{WRAPPER}} .type-projects .title a'
			]
		);
		$this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Title Margin', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .type-projects .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .type-projects .title a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		$this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Title Padding', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .type-projects .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .type-projects .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();








		$this->start_controls_section(
			'cat_options_styling',
			[
				'label' => esc_html__( 'Category Styling', 'mascot-core-carpento' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'cat_text_color',
			[
				'label' => esc_html__( "Text Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .type-projects .cat-list a' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'cat_text_color_hover',
			[
				'label' => esc_html__( "Text Color (Cat Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .type-projects .cat-list a:hover' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'cat_text_color_item_hover',
			[
				'label' => esc_html__( "Text Color (Item Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .type-projects:hover .cat-list a' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'cat_theme_colored',
			[
				'label' => esc_html__( "Cat Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .type-projects .cat-list a' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->add_control(
			'cat_theme_colored_hover',
			[
				'label' => esc_html__( "Cat Theme Colored (Cat Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .type-projects .cat-list a:hover' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->add_control(
			'cat_theme_colored_item_hover',
			[
				'label' => esc_html__( "Cat Theme Colored (Item Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .type-projects:hover .cat-list a' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'cat_typography',
				'label' => esc_html__( 'Typography', 'mascot-core-carpento' ),
				'selector' => '{{WRAPPER}} .type-projects .cat-list a',
			]
		);
		$this->add_responsive_control(
			'cat_margin',
			[
				'label' => esc_html__( 'Cat Margin', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .type-projects .cat-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'cat_padding',
			[
				'label' => esc_html__( 'Cat Padding', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .type-projects .cat-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();



		$this->start_controls_section(
			'excerpt_options_styling',
			[
				'label' => esc_html__( 'Excerpt Styling', 'mascot-core-carpento' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'excerpt_text_color',
			[
				'label' => esc_html__( "Text Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .type-projects .excerpt' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_control(
			'excerpt_text_color_hover',
			[
				'label' => esc_html__( "Text Color (Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .type-projects:hover .excerpt' => 'color: {{VALUE}};'
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
					'{{WRAPPER}} .type-projects .excerpt' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->add_control(
			'excerpt_theme_colored_hover',
			[
				'label' => esc_html__( "Text Theme Colored (Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .type-projects:hover .excerpt' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'excerpt_typography',
				'label' => esc_html__( 'Typography', 'mascot-core-carpento' ),
				'selector' => '{{WRAPPER}} .type-projects .excerpt',
			]
		);
		$this->add_responsive_control(
			'excerpt_margin',
			[
				'label' => esc_html__( 'Text Margin', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .type-projects .excerpt' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'excerpt_padding',
			[
				'label' => esc_html__( 'Text Padding', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .type-projects .excerpt' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();

	}



	public function query_posts($class_instance) {
		$settings = $this->get_settings_for_display();
		$paged = isset($settings['paged']) ? $settings['paged'] : '';
		$new_cpt_class = $class_instance;


		if( $settings['display_type'] != 'masonry' ) {
			$settings['use_masonry_tiles_featured_image_size'] = 'false';
		}

		//if single post selected
		if( $settings['show_only_selected_single_post'] == 'yes' && !empty( $settings['selected_single_post'] )) {
			//query args
			$args = array(
				'p' => $settings['selected_single_post'],
				'post_type' => $new_cpt_class['ptKey'],
			);
		} else {
			//query args
			$args = array(
				'post_type' => $new_cpt_class['ptKey'],
				'orderby' => $settings['order_by'],
				'order' => $settings['order'],
				'posts_per_page' => $settings['total_items'],
				'paged' => $paged,
			);


			if( ! empty( $settings['ids'] ) ) {
				$args['post__in'] = $settings['ids'];
			}

			if( ! empty( $settings['category'] ) ) {
				$args['tax_query'] = array(
					array(
						'taxonomy' => $new_cpt_class['ptTaxKey'],
						'field'    => 'term_id',
						'terms'    => $settings['category'],
					),
				);
			}
		}

		return $the_query = new \WP_Query( $args );
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

		$new_cpt_class = CPT_Projects::Instance();
		$class_instance =  (array) $new_cpt_class;
		$settings['holder_id'] = carpento_get_isotope_holder_ID('projects');

		$project_image_size_array_new = array();
		if ( $settings['project_image_size_array'] ) :
			foreach (  $settings['project_image_size_array'] as $each_item ) {
				$project_image_size_array_new[$each_item['image_for_project']] = $each_item['image_size'];
			}
		endif;
		$settings['project_image_size_array_new'] = $project_image_size_array_new;

		$this->render_output( $class_instance, $settings );
	}

	public function render_output( $class_instance, $settings ) {
		$new_cpt_class = $class_instance;

		$settings['the_query'] = $this->query_posts($new_cpt_class);

		//classes
		$classes = array();
		if( $settings['add_border_radius'] ) {
			$classes[] = 'border-radius-around-box';
		}
		$settings['classes'] = $classes;

		//button classes
		$settings['btn_classes'] = mascot_core_carpento_prepare_button_classes_from_params( $settings );

		//ptTaxKey
		$settings['ptTaxKey'] = $new_cpt_class['ptTaxKey'];

		$settings['settings'] = $settings;

		$html = mascot_core_carpento_get_cpt_shortcode_template_part( 'projects', $settings['display_type'], 'projects/tpl', $settings, true );

		echo $html;
	}
}