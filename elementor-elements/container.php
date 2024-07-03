<?php

class Mascot_Core_Carpento_Container_Handler {
    private static $instance;
    public $sections = array();
    
    public function __construct() {
        add_action('elementor/editor/before_enqueue_scripts', array( $this, 'tm_elementor_enqueue_base_scripts' ));
        add_action( 'wp_enqueue_scripts', array( $this, 'tm_elementor_enqueue_front_scripts' ) );
        add_action( 'elementor/controls/controls_registered', array( $this, 'tm_elementor_init_controls' ));
        add_action( 'elementor/element/container/section_layout/after_section_end', array( $this, 'extend_elementor_section_options' ), 10, 2 );
        add_action( 'elementor/element/container/section_layout/after_section_end', array( $this, 'render_core_options' ), 10, 2 );
        add_action( 'elementor/element/common/section_layout/after_section_end', array( $this, 'render_core_options' ), 10, 2 );
        //add_action( 'elementor/element/container/section_layout/after_section_end', array( $this, 'register_controls_section_bg_box' ), 10, 2 );
        add_action( 'elementor/element/container/section_layout/after_section_end', array( $this, 'register_controls_custom_width' ), 10, 2 );
        add_action( 'elementor/element/container/section_layout/after_section_end', array( $this, 'register_controls_equal_height' ), 10, 2 );
        add_action( 'elementor/element/container/section_layout/after_section_end', array( $this, 'other_options' ), 10, 2 );
        add_action( 'elementor/element/container/section_layout/after_section_end', array( $this, 'bg_move_effect_options' ), 10, 2 );
        add_action( 'elementor/frontend/container/before_render', array( $this, 'section_before_render' ) );
        add_action( 'elementor/frontend/before_render', array( $this, 'section_before_render' ) );
        add_action( 'elementor/frontend/container/before_render', [ $this, 'equal_height_before_render' ] );
        add_action( 'elementor/frontend/container/before_render', [ $this, 'other_options_before_render' ] );
        add_action( 'elementor/frontend/container/before_render', [ $this, 'bg_move_effect_options_before_render' ] );
    }
    
    public static function get_instance() {
        if ( self::$instance === null ) {
            return new self();
        }
        
        return self::$instance;
    }

    public function tm_elementor_enqueue_base_scripts(){
        wp_enqueue_script( 'tm-elementor-base', MASCOT_CORE_CARPENTO_ASSETS_URI . '/section-col-stretch/tm-stretch-base.js' );
    }

    public function tm_elementor_enqueue_front_scripts(){
        wp_enqueue_script( 'tm-elementor-script', MASCOT_CORE_CARPENTO_ASSETS_URI . '/section-col-stretch/tm-stretch.js' );
        wp_enqueue_style( 'tm-elementor-style', MASCOT_CORE_CARPENTO_ASSETS_URI . '/section-col-stretch/tm-stretch.css' );
        if ( defined('ELEMENTOR_VERSION') && \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
            wp_enqueue_script(  'tm-elementor-frontview', MASCOT_CORE_CARPENTO_ASSETS_URI . '/section-col-stretch/elementor-frontview.js' );
        }
    }



    //add new control type
    public function tm_elementor_init_controls() {
        require( 'controls/control-tm-imgselect.php' );
        \Elementor\Plugin::$instance->controls_manager->register_control( 'tm_imgselect', new DSVY_imgselect() );
    }

    //for extending elementor sections
    public function extend_elementor_section_options( $element ){

        $element->start_controls_section(
            'tm_element_section_title',
            [
                'label' => TM_ELEMENTOR_WIDGET_BADGE . __('TM BG Stretched Options', 'mascot-core-carpento'),
                'tab' => Elementor\Controls_Manager::TAB_LAYOUT,
            ]
        );

        $element->add_control(
            'tm-extended-column',
            [
                'label'         => esc_attr__( 'Extend Column for background image', 'mascot-core-carpento' ),
                'description'   => esc_attr__( 'Select which column will be extended with background image.', 'mascot-core-carpento' ),
                'type'          => 'tm_imgselect',
                'label_block'   => true,
                'hide_in_inner' => true,
                'thumb_width'   => '110px',
                'default'       => 'none',
                'prefix_class'  => 'tm-col-stretched-',
                'options' => [
                    'none'          => MASCOT_CORE_CARPENTO_ASSETS_URI . '/section-col-stretch/elementor/bg-stretched-none.png',
                    'left'          => MASCOT_CORE_CARPENTO_ASSETS_URI . '/section-col-stretch/elementor/bg-stretched-first.png',
                    'right'         => MASCOT_CORE_CARPENTO_ASSETS_URI . '/section-col-stretch/elementor/bg-stretched-last.png',
                    'both'          => MASCOT_CORE_CARPENTO_ASSETS_URI . '/section-col-stretch/elementor/bg-stretched-both.png',
                ],
            ]
        );

        $element->add_control(
            'tm-strech-content-left',
            [
                'label'         => esc_attr__( 'Also stretch left content too?', 'mascot-core-carpento' ),
                'description'   => esc_attr__( 'Also stretch left content too?', 'mascot-core-carpento' ),
                'type'          => Elementor\Controls_Manager::SWITCHER,
                'prefix_class'  => 'tm-left-col-stretched-content-',
                'hide_in_inner' => true,
                'label_on'      => esc_attr__( 'Yes', 'mascot-core-carpento' ),
                'label_off'     => esc_attr__( 'No', 'mascot-core-carpento' ),
                'return_value'  => 'yes',
                'default'       => '',
                'condition'     => [
                    'tm-extended-column' => array('left', 'both'),
                ]
            ]
        );
        $element->add_control(
            'tm-strech-content-right',
            [
                'label'         => esc_attr__( 'Also stretch right content too?', 'mascot-core-carpento' ),
                'description'   => esc_attr__( 'Also stretch right content too?', 'mascot-core-carpento' ),
                'type'          => Elementor\Controls_Manager::SWITCHER,
                'prefix_class'  => 'tm-right-col-stretched-content-',
                'hide_in_inner' => true,
                'label_on'      => esc_attr__( 'Yes', 'mascot-core-carpento' ),
                'label_off'     => esc_attr__( 'No', 'mascot-core-carpento' ),
                'return_value'  => 'yes',
                'default'       => '',
                'condition'     => [
                    'tm-extended-column' => array('right', 'both'),
                ]
            ]
        );
        $element->add_control(
            'tm-left-margin',
            [
                'label'         => esc_html__( 'Left Content Area Margin', 'mascot-core-carpento' ),
                'description'   => esc_html__( 'This is useful if you like to overlap columns on each other.', 'mascot-core-carpento' ),
                'type'          => Elementor\Controls_Manager::DIMENSIONS,
                'separator'     => 'before',
                'selectors' => [
                    '{{WRAPPER}} .tm-stretched-div.tm-stretched-left' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $element->add_control(
            'tm-right-margin',
            [
                'label'         => esc_html__( 'Right Content Area Margin', 'mascot-core-carpento' ),
                'description'   => esc_html__( 'This is useful if you like to overlap columns on each other.', 'mascot-core-carpento' ),
                'type'          => Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .tm-stretched-div.tm-stretched-right' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $element->add_control(
            'tm_bg_color',
            [
                'label'         => esc_html__( 'Container Background Color', 'mascot-core-carpento' ),
                'description'   => esc_html__( 'Pre-defined Background Color for this Container (ROW)', 'mascot-core-carpento' ),
                'type'          => Elementor\Controls_Manager::SELECT,
                'default'       => '',
                'separator'     => 'before',
                'prefix_class'  => 'tm-bg-color-yes tm-elementor-bg-color-',
                'options'       => [
                    ''              => esc_attr__( 'Transparent', 'mascot-core-carpento' ),
                    'white'         => esc_attr__( 'White', 'mascot-core-carpento' ),
                    'light'         => esc_attr__( 'Light', 'mascot-core-carpento' ),
                    'blackish'      => esc_attr__( 'Blackish', 'mascot-core-carpento' ),
                    'globalcolor'   => esc_attr__( 'Global Color', 'mascot-core-carpento' ),
                    'secondary'     => esc_attr__( 'Secondary Color', 'mascot-core-carpento' ),
                    'gradient'      => esc_attr__( 'Gradient Color', 'mascot-core-carpento' ),
                ],
            ]
        );

        $element->add_control(
            'tm_text_color',
            [
                'label'         => esc_html__( 'Container Text Color', 'mascot-core-carpento' ),
                'description'   => esc_html__( 'Pre-defined Text Color in this Container (ROW)', 'mascot-core-carpento' ),
                'type'          => Elementor\Controls_Manager::SELECT,
                'default'       => '',
                'prefix_class'  => 'tm-text-color-',
                'options' => [
                    ''          => __( 'Default', 'mascot-core-carpento' ),
                    'white'     => __( 'White', 'mascot-core-carpento' ),
                    'blackish'  => __( 'Blackish', 'mascot-core-carpento' ),
                ],
            ]
        );

        $element->add_control(
            'tm-bg-image-color-order',
            [
                'label'         => esc_attr__( 'BG Image - BG Color Order', 'mascot-core-carpento' ),
                'description'   => esc_attr__( 'You can show BG image over BG Color or reverse too.', 'mascot-core-carpento' ),
                'type'          => 'tm_imgselect',
                'label_block'   => true,
                'thumb_width'   => '110px',
                'default'       => 'none',
                'prefix_class'  => 'tm-bg-',
                'default'       => 'color-over-image',
                'options'       => [
                    'image-over-color'  => MASCOT_CORE_CARPENTO_ASSETS_URI . '/section-col-stretch/elementor/img-over-color.png',
                    'color-over-image'  => MASCOT_CORE_CARPENTO_ASSETS_URI . '/section-col-stretch/elementor/color-over-img.png',
                ],
            ]
        );

        $element->end_controls_section();
    }
    
    public function render_core_options( $section, $args ) {
        $section->start_controls_section(
            'tm_core_options',
            [
                'label' => TM_ELEMENTOR_WIDGET_BADGE . esc_html__( 'Mascot - Core Options', 'mascot-core-carpento' ),
                'tab'   => \Elementor\Controls_Manager::TAB_LAYOUT,
            ]
        );
        $section->add_responsive_control(
            'tm_section_bg_theme_colored',
            [
                'label' => esc_html__( "Background Theme Colored", 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => mascot_core_carpento_theme_color_list(),
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}}' => 'background-color: var(--theme-color{{VALUE}});'
                ],
            ]
        );
        $section->add_responsive_control(
            'tm_core_content_width',
            [
                'label' => esc_html__( 'Section Custom Width (px)', 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1700,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} > .elementor-container' => 'max-width: {{SIZE}}{{UNIT}} !important;',
                    '{{WRAPPER}} > .elementor-container .elementor-container' => 'max-width: 100% !important;',
                ],
                'condition' => [
                    'layout' => [ 'boxed' ],
                ],
                'separator' => 'before',
            ]
        );
        $section->add_responsive_control(
            'tm_section_bg_overlay_display_type',
            [
                'label' => esc_html__( "BG Overlay Display Type", 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'block' =>  esc_html__( "Show", 'mascot-core-carpento' ),
                    'none'  =>  esc_html__( "Hide", 'mascot-core-carpento' ),
                ],
                'selectors' => [
                    '{{WRAPPER}} > .elementor-background-overlay' => 'display: {{VALUE}};'
                ],
            ]
        );

        $section->add_control(
            'tm_section_appear_animation_heading',
            [
                'label' => esc_html__( 'Clip Path Animation', 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $section->add_control(
            'tm_section_appear_animation',
            [
                'label' => esc_html__( "Clip Path Appear Animation", 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '' =>  esc_html__( 'No Animation', 'mascot-core-carpento' ),
                    'tm-item-appear-clip-path'  =>  esc_html__( 'Clip Path Animation', 'mascot-core-carpento' ),
                    'tm-item-appear-clip-path-right'  =>  esc_html__( 'Clip Path Animation Right to Left', 'mascot-core-carpento' ),
                    'tm-appear-block-holder'  =>  esc_html__( 'Block Clip Path Animation', 'mascot-core-carpento' ),
                ],
            ]
        );
        $section->add_control(
            'tm_section_appear_animationbg_theme_colored1',
            [
                'label' => esc_html__( "Color1", 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'tm_section_appear_animation' => array('tm-appear-block-holder')
                ],
                'selectors' => [
                    '{{WRAPPER}}.tm-appear-block-holder:before' => 'background-color: {{VALUE}};'
                ],
            ]
        );
        $section->add_control(
            'tm_section_appear_animationbg_theme_colored2',
            [
                'label' => esc_html__( "Color2", 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'condition' => [
                    'tm_section_appear_animation' => array('tm-appear-block-holder')
                ],
                'selectors' => [
                    '{{WRAPPER}}.tm-appear-block-holder:after' => 'background-color: {{VALUE}};'
                ],
            ]
        );
        $section->add_control(
            'tm_section_wow_appear_animation_heading',
            [
                'label' => esc_html__( 'Wow Animation', 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $section->add_control(
            'tm_section_wow_appear_animation',
            [
                'label' => esc_html__( "Wow Appear Animation", 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => mascot_core_carpento_animate_css_animation_list(),
            ]
        );
        $section->add_control(
            'tm_section_wow_animate_delay',
            [
                'label' => esc_html__( "Wow Animate Delay(ms or s)", 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '0',
                'description' => 'Enter number. Default 0ms',
                'condition' => [
                    'tm_section_wow_appear_animation!' => ''
                ],
            ]
        );

        
        $section->add_control(
            'activate_text_gradient_background_fill', [
                'label' => esc_html__( "Activate Gradient BG Fill/Clip?", 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
                'separator' => 'before',
            ]
        );
        $section->add_responsive_control(
            "text_gradient_background_fill", [
                'label' => esc_html__( "Text Gradient Background Fill Effect?", 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'block' => [
                        'title' => __( 'Show', 'mascot-core-carpento' ),
                        'icon' => 'eicon-check',
                    ],
                    'none' => [
                        'title' => __( 'Hide', 'mascot-core-carpento' ),
                        'icon' => 'eicon-ban',
                    ],
                ],
                'condition' => [
                    'activate_text_gradient_background_fill' => array('yes')
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementor-widget-container' => '-webkit-background-clip: text;-webkit-text-fill-color: transparent;'
                ],
            ]
        );
        $section->end_controls_section();
    }

    public function register_controls_custom_width($section, $args) {

        $section->start_controls_section(
            'tm_section_custom_width_controls',
            [
                'label' => TM_ELEMENTOR_WIDGET_BADGE . esc_html__( 'Mascot - Container Custom Width', 'mascot-core-carpento' ),
                'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
            ]
        );
        $section->add_responsive_control(
            'tm_section_custom_width',
            [
                'label' => esc_html__( 'Container Custom Width (px)', 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1600,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}}' => 'max-width: {{SIZE}}{{UNIT}} !important;',
                ],
                'separator' => 'none',
            ]
        );
        $section->add_responsive_control(
            'tm_section_custom_margin_auto',
            [
                'label' => esc_html__('Container Left/Right Margin Auto', 'mascot-core-carpento'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'e-auto' => [
                        'title' => esc_html__('Left Auto', 'mascot-core-carpento'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    's-auto' => [
                        'title' => esc_html__('Right Auto', 'mascot-core-carpento'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'prefix_class' => 'm',
            ]
        );
        $section->add_responsive_control(
            'tm_section_content_width',
            [
                'label' => esc_html__( 'Container Inner Custom Width (px)', 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'separator' => 'before',
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1600,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} > .elementor-container' => 'max-width: {{SIZE}}{{UNIT}} !important;',
                    '{{WRAPPER}} > .elementor-container .elementor-container' => 'margin-left: auto !important; margin-right: auto !important;',
                ],
                'separator' => 'none',
            ]
        );
        $section->end_controls_section();

    }

    public function register_controls_equal_height($section, $args) {

        $section->start_controls_section(
            'tm_section_equal_height_controls',
            [
                'label' => TM_ELEMENTOR_WIDGET_BADGE . esc_html__( 'Mascot - Equal Height', 'mascot-core-carpento' ),
                'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
            ]
        );
        $section->add_control(
            'tm_section_equal_height_on',
            [
                'label'        => esc_html__( 'Enable Equal Height', 'mascot-core-carpento' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'description'  => esc_html__( 'You can equal your column/widgets height equal by enable this option.', 'mascot-core-carpento' ),
            ]
        );
        $section->add_control(
            'tm_section_equal_height_selector',
            [
                'label'     => esc_html__( 'Equal Height For', 'mascot-core-carpento' ),
                'type'      => \Elementor\Controls_Manager::SELECT,
                'options'   => [
                    'column'     => 'Columns',
                    'widgets'    => 'Widgets',
                    'widgets_c1' => 'Widgets > Child',
                    'widgets_c2' => 'Widgets > Child > Child',
                    'widgets_c3' => 'Widgets > Child > Child > Child',
                    'custom'     => 'Custom Selector',
                ],
                'default'   => 'widgets',
                'condition' => [
                    'tm_section_equal_height_on' => 'yes',
                ],
            ]
        );
        $section->add_control(
            'tm_section_equal_height_custom_selector',
            [
                'label'       => esc_html__( 'Custom Selector', 'mascot-core-carpento' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'placeholder' => '.class-name',
                'condition'   => [
                    'tm_section_equal_height_on' => 'yes',
                    'tm_section_equal_height_selector' => 'custom',
                ],
            ]
        );
        $section->add_control(
            'tm_section_equal_height_disable_on_tablet',
            [
                'label'        => esc_html__( 'Disable On Tablet', 'mascot-core-carpento' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'default'      => 'no',
                'condition'   => [
                    'tm_section_equal_height_on' => 'yes',
                ],
            ]
        );
        $section->add_control(
            'tm_section_equal_height_disable_on_mobile',
            [
                'label'        => esc_html__( 'Disable On Mobile', 'mascot-core-carpento' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'default'      => 'yes',
                'condition'   => [
                    'tm_section_equal_height_on' => 'yes',
                ],
            ]
        );
        $section->end_controls_section();

    }
    
    public function other_options( $section, $args ) {
        $section->start_controls_section(
            'tm_other_options',
            [
                'label' => TM_ELEMENTOR_WIDGET_BADGE . esc_html__( 'Mascot - Other Options', 'mascot-core-carpento' ),
                'tab'   => \Elementor\Controls_Manager::TAB_LAYOUT,
            ]
        );
        $section->add_control(
            'tm_four_vertical_line',
            [
                'label' => esc_html__( "Show Four Vertical Lines in Background?", 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );
        $section->add_control(
            'tm_small_vertical_line',
            [
                'label' => esc_html__( "Show Smaill Vertical Lines in Background?", 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );
        $section->end_controls_section();
    }
    
    public function bg_move_effect_options( $section, $args ) {
        $section->start_controls_section(
            'tm_bg_move_effect_options',
            [
                'label' => TM_ELEMENTOR_WIDGET_BADGE . esc_html__( 'Mascot - BG Gsap Clip Path Effect', 'mascot-core-carpento' ),
                'tab'   => \Elementor\Controls_Manager::TAB_LAYOUT,
            ]
        );
        $section->add_control(
            'tm_bg_move_effect_enable',
            [
                'label' => esc_html__( "Enable BG Move Effect?", 'mascot-core-carpento' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'default' => 'no',
            ]
        );
        $section->end_controls_section();
    }
    
    public function section_before_render( $widget ) {
        $data     = $widget->get_data();
        $type     = isset( $data['elType'] ) ? $data['elType'] : 'container';
        $settings = $data['settings'];
        
        if ( 'container' === $type || 'widget' === $type ) {
          if ( isset( $settings['tm_section_appear_animation'] ) && $settings['tm_section_appear_animation'] != '' ) {
            $widget->add_render_attribute( '_wrapper', 'class', $settings['tm_section_appear_animation'] );
          }
          if ( isset( $settings['tm_section_wow_appear_animation'] ) && $settings['tm_section_wow_appear_animation'] != '' ) {
            $widget->add_render_attribute( '_wrapper', 'class', 'wow '.$settings['tm_section_wow_appear_animation'] );
            $widget->add_render_attribute( '_wrapper', 'data-wow-delay', $settings['tm_section_wow_animate_delay'] );
          }
        }
    }


    public function equal_height_before_render($section) {          
        $settings = $section->get_settings_for_display();
        if( $settings[ 'tm_section_equal_height_on' ] == 'yes' ) {
            wp_enqueue_script( 'matchHeight' );
            
            $height_option = '';

            if ( 'column' == $settings['tm_section_equal_height_selector']) {
                $height_option = '.e-con-inner';
            }

            if ( 'widgets' == $settings['tm_section_equal_height_selector']) {
                $height_option = '.e-con-inner .elementor-widget > .elementor-widget-container';
            }

            if ( 'widgets_c1' == $settings['tm_section_equal_height_selector']) {
                $height_option = '.e-con-inner .elementor-widget > .elementor-widget-container > div:nth-of-type(1)';
            }

            if ( 'widgets_c2' == $settings['tm_section_equal_height_selector']) {
                $height_option = '.e-con-inner .elementor-widget > .elementor-widget-container > div > div:nth-of-type(1)';
            }

            if ( 'widgets_c3' == $settings['tm_section_equal_height_selector']) {
                $height_option = '.e-con-inner .elementor-widget > .elementor-widget-container > div > div > div:nth-of-type(1)';
            }

            if ( 'custom' == $settings['tm_section_equal_height_selector'] and $settings['tm_section_equal_height_custom_selector']) {
                $height_option = '' . esc_attr($settings['tm_section_equal_height_custom_selector']) ;
            }
            
            if ($height_option) {
                $section->add_render_attribute( '_wrapper', 'data-tm-equal-height-col', $height_option );

                if (  $settings['tm_section_equal_height_disable_on_tablet'] === 'yes' ) {
                    $section->add_render_attribute( '_wrapper', 'class', 'tm-eqh-disable-on-tablet' );
                }
                if (  $settings['tm_section_equal_height_disable_on_mobile'] === 'yes' ) {
                    $section->add_render_attribute( '_wrapper', 'class', 'tm-eqh-disable-on-mobile' );
                }
            }
        }
    }



    public function other_options_before_render( $section ) {
        $settings = $section->get_settings_for_display();
        if( $settings['tm_four_vertical_line'] == 'yes' ) {
            $section->add_render_attribute( '_wrapper', 'class', 'tm-enable-four-vertical-line' );
        }
        if( $settings['tm_small_vertical_line'] == 'yes' ) {
            $section->add_render_attribute( '_wrapper', 'class', 'tm-one-vertical-line' );
        }
    }
    public function bg_move_effect_options_before_render( $section ) {
        $settings = $section->get_settings_for_display();
        if( $settings['tm_bg_move_effect_enable'] == 'yes' ) {
            $section->add_render_attribute( '_wrapper', 'class', 'tm-enable-bg-move-effect' );
            wp_enqueue_script( 'gsap' );
            wp_enqueue_script( 'tm-scroll-trigger' );
            wp_enqueue_script( 'tm-gsap-bg-animation' );
        }
    }
}

if ( ! function_exists( 'mascot_core_carpento_init_section_handler' ) ) {
    function mascot_core_carpento_init_section_handler() {
        Mascot_Core_Carpento_Container_Handler::get_instance();
    }
    
    add_action( 'init', 'mascot_core_carpento_init_section_handler', 1 );
} 