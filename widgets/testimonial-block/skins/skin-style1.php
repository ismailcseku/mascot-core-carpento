<?php
namespace MascotCoreCarpento\Widgets\TestimonialBlock\Skins;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Skin_Base as Elementor_Skin_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Skin_Style1 extends Elementor_Skin_Base {

	protected function _register_controls_actions() {
		add_action( 'elementor/element/tm-ele-testimonial-block/tm_general/after_section_end', [ $this, 'register_layout_controls' ] );
	}

	public function get_id() {
		return 'skin-style1';
	}


	public function get_title() {
		return __( 'Skin Style1', 'mascot-core-carpento' );
	}


	public function register_layout_controls( Widget_Base $widget ) {
		$this->parent = $widget;

		//Current Skin Styling
		$this->start_controls_section(
			'current_wrapper_styling',
			[
				'label' => esc_html__( 'Current Skin Styling', 'mascot-core-carpento' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
			'content_area_border_radius',
			[
				'label' => esc_html__( "Border Radius", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-block .inner-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);
		$this->add_responsive_control(
			'content_margin',
			[
				'label' => esc_html__( 'Margin', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-block .inner-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .testimonial-block .inner-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->start_controls_tabs('tabs_current_theme_styling');
		$this->start_controls_tab(
			'tabs_current_theme_styling_normal1',
			[
				'label' => esc_html__('Normal', 'mascot-core-carpento'),
			]
		);
		// Background Color
		$this->add_control(
			'content_wrapper_color_options',
			[
				'label' => esc_html__( 'BG Color Options', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_responsive_control(
			'content_wrapper_custom_bg_color',
			[
				'label' => esc_html__( "Custom Background Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-block .inner-box' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .testimonial-block .inner-box:before' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'content_wrapper_theme_colored',
			[
				'label' => esc_html__( "Make BG Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-block .inner-box' => 'background-color: var(--theme-color{{VALUE}});',
					'{{WRAPPER}} .testimonial-block .inner-box:before' => 'background-color: var(--theme-color{{VALUE}});'
				],
			]
		);


		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_area_normal_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'mascot-core-carpento' ),
				'selector' => '{{WRAPPER}} .testimonial-block .inner-box',
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tabs_current_theme_styling_hover1',
			[
				'label' => esc_html__('Hover', 'mascot-core-carpento'),
			]
		);
		//Background Hover Color
		$this->add_control(
			'content_wrapper_color_options_hover',
			[
				'label' => esc_html__( 'BG Color Options (Hover)', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);
		$this->add_responsive_control(
			'content_wrapper_custom_bg_color_hover',
			[
				'label' => esc_html__( "Custom Background Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-block:hover .inner-box' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .testimonial-block:hover .inner-box:before' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'content_wrapper_theme_colored_hover',
			[
				'label' => esc_html__( "Make BG Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-block:hover .inner-box' => 'background-color: var(--theme-color{{VALUE}});',
					'{{WRAPPER}} .testimonial-block:hover .inner-box:before' => 'background-color: var(--theme-color{{VALUE}});'
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_area_hover_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'mascot-core-carpento' ),
				'selector' => '{{WRAPPER}} .testimonial-block:hover .inner-box',
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();


		//Quote Icon Styling
		$this->start_controls_section(
			'content_quote_icon_styling',
			[
				'label' => esc_html__( 'Quote Icon Styling', 'mascot-core-carpento' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->start_controls_tabs('tabs_quote_icon_styling');
		//Normal Color
		$this->start_controls_tab(
			'content_quote_icon_mormal_styling',
			[
				'label' => esc_html__('Normal', 'mascot-core-carpento'),
			]
		);
		$this->add_responsive_control(
			'content_quote_icon_mormal_bg_color',
			[
				'label' => esc_html__( "Quote Icon Bg Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-block .inner-box .quote-icon .icon' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'content_quote_icon_mormal_bg_theme_colored',
			[
				'label' => esc_html__( "Quote Icon Bg Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-block .inner-box .quote-icon .icon' => 'background-color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->add_responsive_control(
			'content_quote_icon_mormal_color',
			[
				'label' => esc_html__( "Quote Icon Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-block .inner-box .quote-icon .icon' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'content_quote_icon_mormal_theme_colored',
			[
				'label' => esc_html__( "Quote Icon Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-block .inner-box .quote-icon .icon' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'content_quote_icon_hover_styling',
			[
				'label' => esc_html__('Hover', 'mascot-core-carpento'),
			]
		);
		//Hover Color
		$this->add_control(
			'content_quote_icon_hover_styling_hover',
			[
				'label' => esc_html__( 'Quote Icon Styling (Hover)', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);
		$this->add_responsive_control(
			'content_quote_icon_bg_hover_color',
			[
				'label' => esc_html__( "Quote Icon Bg Color (Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-block:hover .inner-box .quote-icon .icon' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'content_quote_icon_hover_bg_theme_colored',
			[
				'label' => esc_html__( "Quote Icon Bg Theme Colored (Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-block:hover .inner-box .quote-icon .icon' => 'background-color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->add_responsive_control(
			'content_quote_icon_hover_color',
			[
				'label' => esc_html__( "Quote Icon Color (Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .testimonial-block:hover .inner-box .quote-icon .icon' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'content_quote_icon_hover_theme_colored',
			[
				'label' => esc_html__( "Quote Icon Theme Colored (Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .testimonial-block:hover .inner-box .quote-icon .icon' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

	}

	public function render() {
		$settings = $this->parent->get_settings_for_display();

		$direction_suffix = is_rtl() ? '.rtl' : '';
		wp_enqueue_style( 'tm-testimonial-block-style1', MASCOT_CORE_CARPENTO_ASSETS_URI . '/css/shortcodes/testimonial-block/testimonial-block-style1' . $direction_suffix . '.css' );


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

		$settings['holder_id'] = carpento_get_isotope_holder_ID('testimonial-block');

		$settings['settings'] = $settings;

		//Produce HTML version by using the parameters (filename, variation, folder name, parameters, shortcode_ob_start)
		$html = mascot_core_carpento_get_shortcode_template_part( 'testimonial', $settings['display_type'], 'testimonial-block/tpl', $settings, true );

		echo $html;
	}
}