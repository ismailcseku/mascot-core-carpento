<?php
namespace MascotCoreCarpento\Widgets\CountdownTimer\Skins;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Skin_Base as Elementor_Skin_Base;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Skin_Style4 extends Elementor_Skin_Base {

	protected function _register_controls_actions() {
		add_action( 'elementor/element/tm-ele-counter-block/tm_general/after_section_end', [ $this, 'register_layout_controls' ] );
	}

	public function get_id() {
		return 'skin-style4';
	}


	public function get_title() {
		return __( 'Skin Style4', 'mascot-core-carpento' );
	}


	public function register_layout_controls( Widget_Base $widget ) {
		$this->parent = $widget;

	}

	public function render() {
		$settings = $this->parent->get_settings_for_display();
		
		$direction_suffix = is_rtl() ? '.rtl' : '';
		wp_enqueue_style( 'tm-countdown-timer-style4', MASCOT_CORE_CARPENTO_ASSETS_URI . '/css/shortcodes/countdown-timer/countdown-timer-style4' . $direction_suffix . '.css' );
		
		//classes
		$classes = array();
		$settings['classes'] = $classes;

		//Produce HTML version by using the parameters (filename, variation, folder name, parameters, shortcode_ob_start)
		$html = mascot_core_carpento_get_shortcode_template_part( 'tpl-skin-style4', null, 'countdown-timer/tpl', $settings, true );

		echo $html;
	}
}