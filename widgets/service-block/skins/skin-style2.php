<?php
namespace MascotCoreCarpento\Widgets\ServiceBlock\Skins;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Skin_Base as Elementor_Skin_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Skin_Style2 extends Elementor_Skin_Base {

	protected function _register_controls_actions() {
		add_action( 'elementor/element/tm-ele-service-block/tm_general/after_section_end', [ $this, 'register_layout_controls' ] );
	}

	public function get_id() {
		return 'skin-style2';
	}


	public function get_title() {
		return __( 'Skin Style2', 'mascot-core-carpento' );
	}


	public function register_layout_controls( Widget_Base $widget ) {
		$this->parent = $widget;


		$this->start_controls_section(
			'current_skin_bg_styling',
			[
				'label' => esc_html__( 'Current Skin Styling', 'mascot-core-carpento' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'current_skin_bg_color_options',
			[
				'label' => esc_html__( 'BG Color Options', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);
		$this->start_controls_tabs('tabs_current_theme_styling');
		$this->start_controls_tab(
			'tabs_current_theme_styling_normal',
			[
				'label' => esc_html__('Normal', 'mascot-core-carpento'),
			]
		);
		$this->add_responsive_control(
			'current_skin_bg_custom_bg_color',
			[
				'label' => esc_html__( "Custom Background Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-item .inner-box' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'current_skin_bg_theme_colored',
			[
				'label' => esc_html__( "Make BG Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .service-item .inner-box' => 'background-color: var(--theme-color{{VALUE}});'
				],
			]
		);

		$this->add_control(
			'current_skin_icon_bg_color_options',
			[
				'label' => esc_html__( 'Icon Options', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_responsive_control(
			'current_skin_bg_custom_icon_bg_color',
			[
				'label' => esc_html__( "Custom Icon BG Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-item .service-icon' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'current_skin_icon_bg_theme_colored',
			[
				'label' => esc_html__( "Make Icon BG Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .service-item .service-icon' => 'background-color: var(--theme-color{{VALUE}});'
				],
			]
		);

		$this->add_responsive_control(
			'current_skin_bg_custom_icon_text_bg_color',
			[
				'label' => esc_html__( "Custom Icon Color Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-item .service-icon' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'current_skin_icon_text_bg_theme_colored',
			[
				'label' => esc_html__( "Make Icon Color Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .service-item .service-icon' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$this->end_controls_tab();

		$this->start_controls_tab(
			'tabs_current_theme_styling_hover',
			[
				'label' => esc_html__('Hover', 'mascot-core-carpento'),
			]
		);
		$this->add_responsive_control(
			'current_skin_bg_custom_bg_color_hover',
			[
				'label' => esc_html__( "Custom Background Color (Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-item:hover .inner-box' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'current_skin_bg_theme_colored_hover',
			[
				'label' => esc_html__( "Make BG Theme Colored (Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .service-item:hover .inner-box' => 'background-color: var(--theme-color{{VALUE}});'
				],
			]
		);


		$this->add_control(
			'current_skin_hover_icon_bg_color_options',
			[
				'label' => esc_html__( 'Icon Options ( Hover )', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$this->add_responsive_control(
			'current_skin_hover_bg_custom_icon_bg_color',
			[
				'label' => esc_html__( "Custom Icon BG Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-item:hover .service-icon' => 'background-color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'current_skin_hover_icon_bg_theme_colored',
			[
				'label' => esc_html__( "Make Icon BG Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .service-item:hover .service-icon' => 'background-color: var(--theme-color{{VALUE}});'
				],
			]
		);

		$this->add_responsive_control(
			'current_skin_hover_bg_custom_icon_text_bg_color',
			[
				'label' => esc_html__( "Custom Icon Color Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .service-item:hover .service-icon' => 'color: {{VALUE}};'
				]
			]
		);
		$this->add_responsive_control(
			'current_skin_hover_icon_text_bg_theme_colored',
			[
				'label' => esc_html__( "Make Icon Color Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .service-item:hover .service-icon' => 'color: var(--theme-color{{VALUE}});'
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
		wp_enqueue_style( 'service-block-style2', MASCOT_CORE_CARPENTO_ASSETS_URI . '/css/shortcodes/service-block/service-block-style2' . $direction_suffix . '.css' );


		if( $settings['animate_icon_on_hover'] ) {
			$classes[] = 'animate-hover animate-icon-'.$settings['animate_icon_on_hover'];
		}
		
		//classes
		$classes = array();
		$settings['classes'] = $classes;

		//icon classes
		$icon_classes = array();
		$settings['icon_classes'] = $icon_classes;

		//button classes
		$settings['btn_classes'] = mascot_core_carpento_prepare_button_classes_from_params( $settings );


		//icon classes
		$icon_classes = array();
		$settings['icon_classes'] = $icon_classes;

		$settings['holder_id'] = carpento_get_isotope_holder_ID('service-block');

		$settings['settings'] = $settings;

		//Produce HTML version by using the parameters (filename, variation, folder name, parameters, shortcode_ob_start)
		$html = mascot_core_carpento_get_shortcode_template_part( 'service', $settings['display_type'], 'service-block/tpl', $settings, true );

		echo $html;
	}
}