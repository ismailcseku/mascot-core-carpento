<?php
namespace MascotCoreCarpento\Widgets\MovingTextRepeater;

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
class TM_Elementor_MovingTextRepeater extends Widget_Base {
	public function __construct($data = [], $args = null) {
		parent::__construct($data, $args);
		$direction_suffix = is_rtl() ? '.rtl' : '';
		wp_register_style( 'tm-moving-text-repeater', MASCOT_CORE_CARPENTO_ASSETS_URI . '/css/shortcodes/moving-text-repeater/moving-text-repeater' . $direction_suffix . '.css' );
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
		return 'tm-ele-moving-text-repeater';
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
		return esc_html__( 'Moving Text Repeater', 'mascot-core-carpento' );
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
		return [ 'tm-moving-text-repeater' ];
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
			'moving_text_options', [
				'label' => esc_html__( 'Moving Text Items', 'mascot-core-carpento' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$repeater = new \Elementor\Repeater();
		$repeater->add_control(
			'text',
			[
				'label' => esc_html__( "Moving Text", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);
		$repeater->add_control(
			'divider_text',
			[
				'label' => esc_html__( "Divider Symbol/Text", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '●', 'mascot-core-carpento' ),
			]
		);
		$repeater->add_control(
			'divider_icon',
			[
				'label' => __('Or Divider Icon', 'mascot-core-carpento'),
				'type' => \Elementor\Controls_Manager::ICONS,
			]
		);
		$this->add_control(
			'moving_texts_array',
			[
				'label' => esc_html__( "Moving Texts", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'text' => esc_html__( 'Text #1', 'mascot-core-carpento' ),
					],
					[
						'text' => esc_html__( 'Text #2', 'mascot-core-carpento' ),
					],
					[
						'text' => esc_html__( 'Text #3', 'mascot-core-carpento' ),
					],
				],
			]
		);
		$this->add_control(
			'moving_direction_options',
			[
				'label' => esc_html__( 'Other Settings', 'mascot-core-carpento' ),
				'type' => Controls_Manager::HEADING,
                'separator'     => 'before',
			]
		);
		$this->add_control(
			'moving_direction', [
				'label' => esc_html__( "Moving Direction", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'left'  =>  esc_html__( 'Left', 'mascot-core-carpento' ),
					'right' =>  esc_html__( 'Right', 'mascot-core-carpento' ),
				],
				'default' => 'left'
			]
		);
		$this->add_control(
			'text_rotate',
			[
				'label' => esc_html__( 'Rotate Text', 'mascot-core-carpento' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -360,
						'max' => 360,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-parent' => 'transform: rotate({{SIZE}}deg); -ms-transform: rotate({{SIZE}}deg); -webkit-transform: rotate({{SIZE}}deg);',
				],
			]
		);
		$this->add_control(
			'animation_speed',
			[
				'label' => esc_html__( 'Animation Duration', 'mascot-core-carpento' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 150,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater' => '--tm-marquee-animation-duration: {{SIZE}}s;',
				],
			]
		);
		$this->end_controls_section();









		$this->start_controls_section(
			'section_mouseover_animation',
			[
				'label' => esc_html__( 'Mouseover Text Fill Animation', 'mascot-core-carpento' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'mouseover_text_fill_animation', [
				'label' => esc_html__( "Mouseover Text Fill Animation", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'yes'  =>  esc_html__( 'Yes', 'mascot-core-carpento' ),
					'no' =>  esc_html__( 'No', 'mascot-core-carpento' ),
				],
				'default' => 'no'
			]
		);
		$this->add_control(
			'mouseover_text_fill_color',
			[
				'label' => esc_html__( 'Text Fill Color', 'mascot-core-carpento' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .tm-marquee-group .text:before' => '-webkit-text-fill-color: {{VALUE}};',
				],
				'condition' => [
					'mouseover_text_fill_animation' => array('yes')
				]
			]
		);
		$this->add_control(
			'mouseover_text_fill_theme_color',
			[
				'label' => esc_html__( "Text Fill Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .tm-marquee-group .text:before' => '-webkit-text-fill-color: var(--theme-color{{VALUE}});',
				],
				'condition' => [
					'mouseover_text_fill_animation' => array('yes')
				]
			]
		);
		$this->end_controls_section();










		/**
		 * Text styling section.
		 */
		$this->start_controls_section(
			'section_bg_style',
			[
				'label' => esc_html__( 'Background Styling', 'mascot-core-carpento' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
            'bg_color',
            [
                'label' => esc_html__('Background Color', 'mascot-core-carpento'),
                'type' => Controls_Manager::COLOR,
                'dynamic' => ['active' => true],
                'selectors' => [
                    '{{WRAPPER}} .tm-marquee-repeater' => 'background-color: {{VALUE}};',
                ],
            ]
        );
		$this->add_control(
			'bg_color_theme_colored',
			[
				'label' => esc_html__( "Background Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater' => 'background-color: var(--theme-color{{VALUE}});',
				],
			]
		);
		$this->add_responsive_control(
			'bg_padding',
			[
				'label' => esc_html__( 'Padding', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_section();


















		/**
		 * Text styling section.
		 */
		$this->start_controls_section(
			'section_style_text',
			[
				'label' => esc_html__( 'Text Styling', 'mascot-core-carpento' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'selector' => '{{WRAPPER}} .tm-marquee-repeater .text',
				'fields_options' => [
					'font_size' => [
						'default' => [
							'size' => '40',
							'unit' => 'px',
						],
					],
				],
			]
		);
		$this->start_controls_tabs( 'text_style' );

		/**
		 * Normal tab.
		 */
		$this->start_controls_tab(
			'text_normal',
			[
				'label' => esc_html__( 'Normal', 'mascot-core-carpento' ),
			]
		);

		$this->add_control(
			'text_color_normal',
			[
				'label' => esc_html__( 'Fill Color', 'mascot-core-carpento' ),
				'type' => Controls_Manager::COLOR,
				//'default' => WGL_Globals::get_h_font_color(),
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .text' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'text_theme_colored',
			[
				'label' => esc_html__( "Fill Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .text' => 'color: var(--theme-color{{VALUE}});',
				],
			]
		);

		$this->add_responsive_control(
            'stroke_text_width_normal',
            [
                'label' => esc_html__( 'Stroke Width', 'mascot-core-carpento' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'vw' ],
                'range' => [
                    'px' => [ 'min' => 0.1, 'max' => 10 ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tm-marquee-repeater .text' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
			'stroke_text_color_normal',
			[
				'label' => esc_html__( 'Stroke Color', 'mascot-core-carpento' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .text' => '-webkit-text-stroke-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'stroke_text_theme_colored',
			[
				'label' => esc_html__( "Stroke Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .text' => '-webkit-text-stroke-color: var(--theme-color{{VALUE}});',
				],
			]
		);

		$this->end_controls_tab();


		/**
		 * Even tab.
		 */
		$this->start_controls_tab(
			'text_even_item',
			[
				'label' => esc_html__( 'Even Item', 'mascot-core-carpento' ),
			]
		);

		$this->add_control(
			'text_color_even_item',
			[
				'label' => esc_html__( 'Fill Color', 'mascot-core-carpento' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .tm-marquee-group div:nth-of-type(even)' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'text_theme_colored_even_item',
			[
				'label' => esc_html__( "Fill Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .tm-marquee-group div:nth-of-type(even)' => 'color: var(--theme-color{{VALUE}});',
				],
			]
		);

		$this->add_responsive_control(
            'stroke_text_width_even_item',
            [
                'label' => esc_html__( 'Stroke Width', 'mascot-core-carpento' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'vw' ],
                'range' => [
                    'px' => [ 'min' => 0.1, 'max' => 10 ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tm-marquee-repeater .tm-marquee-group div:nth-of-type(even)' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

		$this->add_control(
			'stroke_text_color_even_item',
			[
				'label' => esc_html__( 'Stroke Color', 'mascot-core-carpento' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .tm-marquee-group div:nth-of-type(even)' => '-webkit-text-stroke-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'stroke_text_theme_colored_even_item',
			[
				'label' => esc_html__( "Stroke Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .tm-marquee-group div:nth-of-type(even)' => '-webkit-text-stroke-color: var(--theme-color{{VALUE}});',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();










		/**
		 * Divider styling section.
		 */
		$this->start_controls_section(
			'section_style_divider',
			[
				'label' => esc_html__( 'Divider Styling', 'mascot-core-carpento' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'divider_animation_type', [
				'label' => esc_html__( "Floating Animation Type", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_get_animation_type(),
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'divider_typography',
				'selector' => '{{WRAPPER}} .tm-marquee-repeater .divider',
				'fields_options' => [
					'font_size' => [
						'default' => [
							'size' => '40',
							'unit' => 'px',
						],
					],
				],
			]
		);
		$this->start_controls_tabs( 'divider_style' );
		/**
		 * Normal tab.
		 */
		$this->start_controls_tab(
			'divider_normal',
			[
				'label' => esc_html__( 'Normal', 'mascot-core-carpento' ),
			]
		);
		$this->add_control(
			'divider_fill_normal',
			[
				'label' => esc_html__( 'Color', 'mascot-core-carpento' ),
				'type' => Controls_Manager::COLOR,
				//'default' => WGL_Globals::get_primary_color(),
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .divider' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'divider_fill_theme_colored_normal',
			[
				'label' => esc_html__( "Fill Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .divider' => 'color: var(--theme-color{{VALUE}});',
				],
			]
		);
		$this->add_control(
			'stroke_divider_heading_normal',
			[
				'label' => esc_html__( 'Stroke', 'mascot-core-carpento' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'stroke_divider_width_normal',
			[
				'label' => esc_html__( 'Stroke Width', 'mascot-core-carpento' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .divider' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'stroke_divider_color_normal',
			[
				'label' => esc_html__( 'Stroke Color', 'mascot-core-carpento' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .divider' => '-webkit-text-stroke-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'stroke_divider_theme_colored_normal',
			[
				'label' => esc_html__( "Stroke Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .divider' => '-webkit-text-stroke-color: var(--theme-color{{VALUE}});',
				],
			]
		);
		$this->add_responsive_control(
			'divider_margin',
			[
				'label' => esc_html__( 'Margin', 'mascot-core-carpento' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .divider' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		$this->end_controls_tab();


		/**
		 * Even tab.
		 */
		$this->start_controls_tab(
			'divider_even',
			[
				'label' => esc_html__( 'Even', 'mascot-core-carpento' ),
			]
		);
		$this->add_control(
			'divider_fill_even',
			[
				'label' => esc_html__( 'Color', 'mascot-core-carpento' ),
				'type' => Controls_Manager::COLOR,
				//'default' => WGL_Globals::get_primary_color(),
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .divider:nth-of-type(even)' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'divider_fill_theme_colored_even',
			[
				'label' => esc_html__( "Fill Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .divider:nth-of-type(even)' => 'color: var(--theme-color{{VALUE}});',
				],
			]
		);
		$this->add_control(
			'stroke_divider_heading_even',
			[
				'label' => esc_html__( 'Stroke', 'mascot-core-carpento' ),
				'type' => Controls_Manager::HEADING,
			]
		);
		$this->add_control(
			'stroke_divider_width_even',
			[
				'label' => esc_html__( 'Stroke Width', 'mascot-core-carpento' ),
				'type' => Controls_Manager::SLIDER,
				'default' => [
					'size' => 1,
					'unit' => 'px',
				],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .divider:nth-of-type(even)' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}}',
				],
			]
		);
		$this->add_control(
			'stroke_divider_color_even',
			[
				'label' => esc_html__( 'Stroke Color', 'mascot-core-carpento' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .divider:nth-of-type(even)' => '-webkit-text-stroke-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'stroke_divider_theme_colored_even',
			[
				'label' => esc_html__( "Stroke Theme Colored", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .tm-marquee-repeater .divider:nth-of-type(even)' => '-webkit-text-stroke-color: var(--theme-color{{VALUE}});',
				],
			]
		);
		$this->end_controls_tab();
		$this->end_controls_tabs();
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
		$moving_direction = esc_html($settings['moving_direction']);
		$moving_direction_class = '';
		$mouseover_text_fill_animation = '';
		if( isset($moving_direction) && !empty($moving_direction) && $moving_direction === "right" ) {
			$moving_direction_class = "slide-right";
		}
		$divider_animation_type = '';
		if(isset($settings['divider_animation_type']) && !empty($settings['divider_animation_type'])) {
			$divider_animation_type = $settings['divider_animation_type']; 
		}
		if( isset($settings['mouseover_text_fill_animation']) && !empty($settings['mouseover_text_fill_animation']) && $settings['mouseover_text_fill_animation'] === "yes" ) {
			$mouseover_text_fill_animation = "hover-fill-animation";
		}
		?>
        <div class="tm-marquee-parent">
			<div class="tm-marquee-repeater <?php echo esc_attr($moving_direction_class);?> <?php echo esc_attr($mouseover_text_fill_animation);?>">
				<div class="tm-marquee-group">
					<?php foreach (  $settings['moving_texts_array'] as $each_item ) {  ?>
					<div class="text" data-text="<?php echo esc_attr($each_item['text']);?>"><?php echo esc_html($each_item['text']);?></div>
					<span class="text divider <?php echo esc_attr($divider_animation_type);?>">
						<?php echo esc_html($each_item['divider_text']);?>
						<?php \Elementor\Icons_Manager::render_icon( $each_item['divider_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</span>
					<?php } ?>
				</div>
									
				<div aria-hidden="true" class="tm-marquee-group">
					<?php foreach (  $settings['moving_texts_array'] as $each_item ) {  ?>
					<div class="text" data-text="<?php echo esc_attr($each_item['text']);?>"><?php echo esc_html($each_item['text']);?></div>
					<span class="text divider">
						<?php echo esc_html($each_item['divider_text']);?>
						<?php \Elementor\Icons_Manager::render_icon( $each_item['divider_icon'], [ 'aria-hidden' => 'true' ] ); ?>
					</span>
					<?php } ?>
				</div>
			</div>
        </div>
		<?php
	}
}
