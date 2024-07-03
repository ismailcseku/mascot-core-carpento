<?php

if(!function_exists('mascot_core_carpento_theme_color_list')) {
	/**
	 * Theme Color list
	 */
	function mascot_core_carpento_theme_color_list() {
		$theme_color_list = array(
			'' => esc_html__( 'No', 'mascot-core-carpento' ),
			'1' => esc_html__( 'Theme Color 1', 'mascot-core-carpento' ),
			'2' => esc_html__( 'Theme Color 2', 'mascot-core-carpento' ),
			'3' => esc_html__( 'Theme Color 3', 'mascot-core-carpento' ),
			'4' => esc_html__( 'Theme Color 4', 'mascot-core-carpento' )
		);
		return $theme_color_list;
	}
}

if(!function_exists('mascot_core_carpento_number_of_theme_colors')) {
	/**
	 * Number of Theme Colors Used in this theme
	 */
	function mascot_core_carpento_number_of_theme_colors() {
		$number_of_theme_colors = 4;
		if( function_exists('carpento_number_of_theme_colors') ) {
			$number_of_theme_colors = carpento_number_of_theme_colors();
		}
		return $number_of_theme_colors;
	}
}

if(!function_exists('mascot_core_carpento_icon_font_packs')) {
	/**
	 * Theme Color list
	 */
	function mascot_core_carpento_icon_font_packs( $icon_type = 'font_awesome' ) {
		$icon_font_packs = array();
		if( function_exists('carpento_icon_font_packs') ) {
			$icon_font_packs = carpento_icon_font_packs()->getIconFontPackByKey($icon_type)->getFileTypeIconList();
		}
		return $icon_font_packs;
	}
}

if(!function_exists('mascot_core_carpento_animate_css_animation_list')) {
	/**
	 * animate.css animation list https://daneden.github.io/animate.css/
	 */
	function mascot_core_carpento_animate_css_animation_list() {
		$animate_css_animation_list = array(
			'' => '',
			'tm-split-text split-in-fade' => 'Slip Text In Fade',
			'tm-split-text split-in-right' => 'Slip Text In Right',
			'tm-split-text split-in-left'  => 'Slip Text In Left',
			'tm-split-text split-in-up'    => 'Slip Text In Up',
			'tm-split-text split-in-down'  => 'Slip Text In Down',
			'tm-split-text split-in-rotate'  => 'Slip Text In Rotate',
			'tm-split-text split-in-scale'  => 'Slip Text In Scale',
			'wow fadeIn' => 'fadeIn',
			'wow fadeInDown' => 'fadeInDown',
			'wow fadeInDownBig' => 'fadeInDownBig',
			'wow fadeInLeft' => 'fadeInLeft',
			'wow fadeInLeftBig' => 'fadeInLeftBig',
			'wow fadeInRight' => 'fadeInRight',
			'wow fadeInRightBig' => 'fadeInRightBig',
			'wow fadeInUp' => 'fadeInUp',
			'wow fadeInUpBig' => 'fadeInUpBig',
			'wow fadeOut' => 'fadeOut',
			'wow fadeOutDown' => 'fadeOutDown',
			'wow fadeOutDownBig' => 'fadeOutDownBig',
			'wow fadeOutLeft' => 'fadeOutLeft',
			'wow fadeOutLeftBig' => 'fadeOutLeftBig',
			'wow fadeOutRight' => 'fadeOutRight',
			'wow fadeOutRightBig' => 'fadeOutRightBig',
			'wow fadeOutUp' => 'fadeOutUp',
			'wow fadeOutUpBig' => 'fadeOutUpBig',
			'wow bounce' => 'bounce',
			'wow flash' => 'flash',
			'wow pulse' => 'pulse',
			'wow rubberBand' => 'rubberBand',
			'wow shake' => 'shake',
			'wow swing' => 'swing',
			'wow tada' => 'tada',
			'wow wobble' => 'wobble',
			'wow jello' => 'jello',
			'wow bounceIn' => 'bounceIn',
			'wow bounceInDown' => 'bounceInDown',
			'wow bounceInLeft' => 'bounceInLeft',
			'wow bounceInRight' => 'bounceInRight',
			'wow bounceInUp' => 'bounceInUp',
			'wow bounceOut' => 'bounceOut',
			'wow bounceOutDown' => 'bounceOutDown',
			'wow bounceOutLeft' => 'bounceOutLeft',
			'wow bounceOutRight' => 'bounceOutRight',
			'wow bounceOutUp' => 'bounceOutUp',
			'wow flip' => 'flip',
			'wow flipInX' => 'flipInX',
			'wow flipInY' => 'flipInY',
			'wow flipOutX' => 'flipOutX',
			'wow flipOutY' => 'flipOutY',
			'wow lightSpeedIn' => 'lightSpeedIn',
			'wow lightSpeedOut' => 'lightSpeedOut',
			'wow rotateIn' => 'rotateIn',
			'wow rotateInDownLeft' => 'rotateInDownLeft',
			'wow rotateInDownRight' => 'rotateInDownRight',
			'wow rotateInUpLeft' => 'rotateInUpLeft',
			'wow rotateInUpRight' => 'rotateInUpRight',
			'wow rotateOut' => 'rotateOut',
			'wow rotateOutDownLeft' => 'rotateOutDownLeft',
			'wow rotateOutDownRight' => 'rotateOutDownRight',
			'wow rotateOutUpLeft' => 'rotateOutUpLeft',
			'wow rotateOutUpRight' => 'rotateOutUpRight',
			'wow slideInUp' => 'slideInUp',
			'wow slideInDown' => 'slideInDown',
			'wow slideInLeft' => 'slideInLeft',
			'wow slideInRight' => 'slideInRight',
			'wow slideOutUp' => 'slideOutUp',
			'wow slideOutDown' => 'slideOutDown',
			'wow slideOutLeft' => 'slideOutLeft',
			'wow slideOutRight' => 'slideOutRight',
			'wow zoomIn' => 'zoomIn',
			'wow zoomInDown' => 'zoomInDown',
			'wow zoomInLeft' => 'zoomInLeft',
			'wow zoomInRight' => 'zoomInRight',
			'wow zoomInUp' => 'zoomInUp',
			'wow zoomOut' => 'zoomOut',
			'wow zoomOutDown' => 'zoomOutDown',
			'wow zoomOutLeft' => 'zoomOutLeft',
			'wow zoomOutRight' => 'zoomOutRight',
			'wow zoomOutUp' => 'zoomOutUp',
			'wow hinge' => 'hinge',
			'wow rollIn' => 'rollIn',
			'wow rollOut' => 'rollOut',
		);
		return $animate_css_animation_list;
	}
}

if(!function_exists('mascot_core_carpento_custom_animation_class_list')) {
	/**
	 * custom made animation list
	 */
	function mascot_core_carpento_custom_animation_class_list() {
		$class_list = array(
			''	=>	esc_html__( "None", 'mascot-core-carpento' ),
			'fade-in'	=>	esc_html__( "fade-in", 'mascot-core-carpento' ),
			'move-up'	=>	esc_html__( "move-up", 'mascot-core-carpento' ),
			'move-down'	=>	esc_html__( "move-down", 'mascot-core-carpento' ),
			'move-left'	=>	esc_html__( "move-left", 'mascot-core-carpento' ),
			'move-right'	=>	esc_html__( "move-right", 'mascot-core-carpento' ),
			'scale-up'	=>	esc_html__( "scale-up", 'mascot-core-carpento' ),
			'fall-perspective'	=>	esc_html__( "fall-perspective", 'mascot-core-carpento' ),
			'fly'	=>	esc_html__( "fly", 'mascot-core-carpento' ),
			'flip'	=>	esc_html__( "flip", 'mascot-core-carpento' ),
			'helix'	=>	esc_html__( "helix", 'mascot-core-carpento' ),
			'pop-up'	=>	esc_html__( "pop-up", 'mascot-core-carpento' )
		);
		return $class_list;
	}
}

if(!function_exists('mascot_core_carpento_jquery_easings_list')) {
	/**
	 * easings list http://api.jqueryui.com/easings/
	 */
	function mascot_core_carpento_jquery_easings_list() {
		$jquery_easings_list = array(
			'linear' => 'linear',
			'swing' => 'swing',
			'_default' => '_default',
			'easeInQuad' => 'easeInQuad',
			'easeOutQuad' => 'easeOutQuad',
			'easeInOutQuad' => 'easeInOutQuad',
			'easeInCubic' => 'easeInCubic',
			'easeOutCubic' => 'easeOutCubic',
			'easeInOutCubic' => 'easeInOutCubic',
			'easeInQuart' => 'easeInQuart',
			'easeOutQuart' => 'easeOutQuart',
			'easeInOutQuart' => 'easeInOutQuart',
			'easeInQuint' => 'easeInQuint',
			'easeOutQuint' => 'easeOutQuint',
			'easeInOutQuint' => 'easeInOutQuint',
			'easeInExpo' => 'easeInExpo',
			'easeOutExpo' => 'easeOutExpo',
			'easeInOutExpo' => 'easeInOutExpo',
			'easeInSine' => 'easeInSine',
			'easeOutSine' => 'easeOutSine',
			'easeInOutSine' => 'easeInOutSine',
			'easeInCirc' => 'easeInCirc',
			'easeOutCirc' => 'easeOutCirc',
			'easeInOutCirc' => 'easeInOutCirc',
			'easeInElastic' => 'easeInElastic',
			'easeOutElastic' => 'easeOutElastic',
			'easeInOutElastic' => 'easeInOutElastic',
			'easeInBack' => 'easeInBack',
			'easeOutBack' => 'easeOutBack',
			'easeInOutBack' => 'easeInOutBack',
			'easeInBounce' => 'easeInBounce',
			'easeOutBounce' => 'easeOutBounce',
			'easeInOutBounce' => 'easeInOutBounce',
		);
		return $jquery_easings_list;
	}
}

if(!function_exists('mascot_core_carpento_orderby_parameters_list')) {
	/**
	 * Orderby Parameters list
	 */
	function mascot_core_carpento_orderby_parameters_list() {
		$orderby_parameters_list = array(
			'date'	=>	esc_html__( 'Date', 'mascot-core-carpento' ),
			'name'	=>	esc_html__( 'Post Name', 'mascot-core-carpento' ),
			'rand'	=>	esc_html__( 'Random Order', 'mascot-core-carpento' ),
			'modified'	=>	esc_html__( 'Last Modified Date', 'mascot-core-carpento' ),
			'author'	=>	esc_html__( 'Author', 'mascot-core-carpento' ),
			'title'	=>	esc_html__( 'Title', 'mascot-core-carpento' ),
			'ID'	=>	esc_html__( 'ID', 'mascot-core-carpento' ),
			'parent'	=>	esc_html__( 'Post/Page Parent ID', 'mascot-core-carpento' ),
			'comment_count'	=>	esc_html__( 'Number of Comments', 'mascot-core-carpento' ),
			'menu_order'	=>	esc_html__( 'Page Order', 'mascot-core-carpento' )
		);
		return $orderby_parameters_list;
	}
}

if(!function_exists('mascot_core_carpento_category_orderby_parameters_list')) {
	/**
	 * Category Orderby Parameters list
	 */
	function mascot_core_carpento_category_orderby_parameters_list() {
		$orderby_parameters_list = array(
			esc_html__( 'name', 'mascot-core-carpento' ) 	=> 'name',
			esc_html__( 'id', 'mascot-core-carpento' ) 		=> 'id',
			esc_html__( 'count', 'mascot-core-carpento' ) 	=> 'count',
			esc_html__( 'slug', 'mascot-core-carpento' ) 	=> 'slug',
		);
		return $orderby_parameters_list;
	}
}

if(!function_exists('mascot_core_carpento_isotope_gutter_list')) {
	/**
	 * Gutter list
	 */
	function mascot_core_carpento_isotope_gutter_list() {
		if( mascot_core_carpento_theme_installed() ) {
			return carpento_isotope_gutter_list();
		} else {
			return array();
		}
	}
}

if(!function_exists('mascot_core_carpento_different_size_list')) {
	/**
	 * Size list
	 */
	function mascot_core_carpento_different_size_list() {
		if( mascot_core_carpento_theme_installed() ) {
			return carpento_different_size_list();
		} else {
			return array();
		}
	}
}

if(!function_exists('mascot_core_carpento_get_post_all_categories_array')) {
	/**
	 * Category List of Blog Posts as an Array
	 */
	function mascot_core_carpento_get_post_all_categories_array() {
		$categories = get_categories( array(
			'orderby' => 'name',
			'order'   => 'ASC'
		) );
		$cats = array();
		$cats[''] = esc_html__( 'All', 'mascot-core-carpento' );
		foreach($categories as $cat){
			$cats[$cat->term_id] = $cat->name;
		}
		return $cats;
	}
}

if(!function_exists('mascot_core_carpento_get_page_list_array')) {
	/**
	 * Category List of Pages as an Array
	 */
	function mascot_core_carpento_get_page_list_array() {
		$all_pages = get_pages();
		$pages = array();
		foreach($all_pages as $each_page){
			$pages[$each_page->ID] = $each_page->post_title;
		}
		return $pages;
	}
}

if ( ! function_exists( 'mascot_core_carpento_metabox_get_list_of_predefined_theme_color_css_files' ) ) {
	/**
	 * Get list of Predefined Theme Color css files
	 */
	function mascot_core_carpento_metabox_get_list_of_predefined_theme_color_css_files() {
		$predefined_theme_colors = array();

		if( $handle = opendir( MASCOT_TEMPLATE_DIR . '/assets/css/colors/' ) ) {
			while( false !== ($entry = readdir($handle)) ) {
				if( $entry != "." && $entry != ".." ) {
					$predefined_theme_colors[$entry] = $entry;
				}
			}
			closedir($handle);
		}
		return $predefined_theme_colors;
	}
}

if ( ! function_exists( 'mascot_core_carpento_category_list_array' ) ) {
	/**
	 * Return category list array
	 */
	function mascot_core_carpento_category_list_array( $taxonomy ) {
		$list_categories = array(
			'' => esc_html__( 'All', 'mascot-core-carpento' )
		);
		$terms = get_terms( $taxonomy );

		if ( $terms && !is_wp_error( $terms ) ) :
			foreach ( $terms as $term ) {
				$list_categories[ $term->slug ] = $term->name;
			}
		endif;

		return $list_categories;
	}
}

if ( ! function_exists( 'mascot_core_carpento_load_styles' ) ) {
	/**
	 * Get style array
	 */
	function mascot_core_carpento_load_styles( $qty = 1, $param_name = 'design_style', $admin_label = false ) {
		$options = array();
		for ($i = 1; $i <= $qty; $i++) {
			$options[sprintf(esc_html__("Style %s", 'mascot-core-carpento'), $i)] = "style{$i}";
		}

		$array = array(
			'type'       => 'dropdown',
			'heading'    => esc_html__('Design Style', 'mascot-core-carpento'),
			'param_name' => $param_name,
			'value'      => $options,
			'std'        => 'style1'
		);

		if ($admin_label) $array['admin_label'] = true;

		return $array;
	}
}

if(!function_exists('mascot_core_carpento_get_btn_design_style')) {
	/**
	 * Return Design Style
	 */
	function mascot_core_carpento_get_btn_design_style() {
		if( mascot_core_carpento_theme_installed() ) {
			return carpento_get_btn_design_style();
		} else {
			return array();
		}
	}
}

if(!function_exists('mascot_core_carpento_get_button_size')) {
	/**
	 * Return Button Size
	 */
	function mascot_core_carpento_get_button_size() {
		if( mascot_core_carpento_theme_installed() ) {
			return carpento_get_button_size();
		} else {
			return array();
		}
	}
}

if(!function_exists('mascot_core_carpento_get_post_list_array_by_post_type_old')) {
	/**
	 * Return Post List Array By Post Type
	 */
	function mascot_core_carpento_get_post_list_array_by_post_type_old( $cpt = '', $for_vc = false ) {
		$post_list = array();
		$args = array(
			'post_type'			=> $cpt,
			'posts_per_page'	=> -1,
			'orderby'			=> 'title',
			'order'				=> 'ASC'
		);

		$the_query = new WP_Query( $args );

		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				if( $for_vc ) {
					$post_list[ get_the_title() ] = get_the_ID();
				} else {
					$post_list[ get_the_ID() ] = get_the_title();
				}
			}
			wp_reset_postdata();
		}

		return $post_list;
	}
}

if(!function_exists('mascot_core_carpento_get_post_list_array_by_post_type')) {
	/**
	 * Return Post List Array By Post Type
	 */
	function mascot_core_carpento_get_post_list_array_by_post_type( $cpt = '', $for_vc = false ) {
		$post_list = array();
		$post_list[''] = esc_html__( "Select Item", 'mascot-core-carpento' );
		$args = array(
			'post_type'			=> $cpt,
			'numberposts'		=> -1,
			'orderby'			=> 'title',
			'order'				=> 'ASC'
		);

		$myposts = get_posts($args);
		if($myposts) {
			foreach ($myposts as $mypost) {
				if( $for_vc ) {
					$post_list[ get_the_title($mypost->ID) ] = $mypost->ID;
				} else {
					$post_list[ $mypost->ID ] = get_the_title($mypost->ID);
				}
			}
			wp_reset_postdata();
		}

		return $post_list;
	}
}

if(!function_exists('mascot_core_carpento_set_admin_ajax_url')){
	/**
	 * Set admin ajax url via javascript
	 * 
	 */
	function mascot_core_carpento_set_admin_ajax_url() {
		echo '<script type="application/javascript">var MascotCoreAjaxUrl = "'.admin_url('admin-ajax.php').'"</script>';
	}
	add_action('wp_enqueue_scripts', 'mascot_core_carpento_set_admin_ajax_url');
}

if(!function_exists('mascot_core_carpento_row_typography')){
	/**
	 * Return Row Typography Array
	 * 
	 */
	function mascot_core_carpento_row_typography() {
		$array = array();
					
		$array = array(
			"type"			=> 'dropdown',
			"heading"		=> esc_html__( "Row Typography", 'mascot-core-carpento' ) ,
			"param_name"	=> "section_typo",
			"description"	=> esc_html__( "Define the color typography of the text of this row.", 'mascot-core-carpento' ) ,
			"value" => array(
				esc_html__( 'Default', 'mascot-core-carpento' ) => '',
				esc_html__( 'Light Typography - on Dark Background', 'mascot-core-carpento' ) => 'section-typo-light',
				esc_html__( 'Dark Typography - on White Background', 'mascot-core-carpento' ) => 'section-typo-dark',
			) ,
			"weight" => "99"
		);

		return $array;
	}
}

if(!function_exists('mascot_core_carpento_base_64_decode')){
	/**
	 * Return urldecode base64_decode
	 * 
	 */
	function mascot_core_carpento_base_64_decode($code) {
		return urldecode(base64_decode($code));
	}
}

if(!function_exists('mascot_core_carpento_base_64_decode_raw_html')){
	/**
	 * Return rawurldecode base64_decode
	 * 
	 */
	function mascot_core_carpento_base_64_decode_raw_html($code) {
		return rawurldecode( base64_decode( wp_strip_all_tags( $code ) ) );
	}
}

if(!function_exists('mascot_core_carpento_get_animation_type')) {
	/**
	 * Return animation type
	 */
	function mascot_core_carpento_get_animation_type() {
		$array = array(
			esc_html__( 'None', 'mascot-core-carpento' )	=>	'',

			esc_html__( 'Floating Animation', 'mascot-core-carpento' )	=>	'tm-animation-floating',
			esc_html__( 'Horizontal Slide Animation', 'mascot-core-carpento' )	=>	'tm-animation-slide-horizontal',

			esc_html__( 'Flicker Animation', 'mascot-core-carpento' )	=>	'tm-animation-flicker',
			esc_html__( 'Spin Animation', 'mascot-core-carpento' )	=>	'tm-animation-spin',


			esc_html__( 'Random Animation 1', 'mascot-core-carpento' )	=>	'tm-animation-random-animation1',
			esc_html__( 'Random Animation 2', 'mascot-core-carpento' )	=>	'tm-animation-random-animation2',
		);
		return $array;
	}
}





if(!function_exists('mascot_core_carpento_masonry_image_sizes')) {
	/**
	 * Masonry Image Size list
	 */
	function mascot_core_carpento_masonry_image_sizes() {
		$masonry_image_sizes = array(
			'mascot_core_square'			=> esc_html__( 'Default', 'mascot-core-carpento' ),
			'mascot_core_wide'			=> esc_html__( 'Width', 'mascot-core-carpento' ),
			'mascot_core_height'			=> esc_html__( 'Height', 'mascot-core-carpento' ),
			'mascot_core_width_height'	=> esc_html__( 'Both Width & Height', 'mascot-core-carpento' ),
		);
		return $masonry_image_sizes;
	}
}


// Return true if Elementor exists and mode is preview
if ( !function_exists( 'mascot_core_carpento_is_edit' ) ) {
	function mascot_core_carpento_is_edit() {
		static $is_edit = -1;
		if ( $is_edit === -1 ) {
			if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
				$is_edit = true;
			} else {
				$is_edit = false;
			}
		}
		return $is_edit;
	}
}
if ( !function_exists( 'mascot_core_carpento_is_preview' ) ) {
	function mascot_core_carpento_is_preview() {
		static $is_preview = -1;
		if ( $is_preview === -1 ) {
			if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
				$is_preview = true;
			} else {
				$is_preview = false;
			}
		}
		return $is_preview;
	}
}

if(!function_exists('mascot_core_carpento_heading_tag_list')) {
	/**
	 * Heading Tag List
	 */
	function mascot_core_carpento_heading_tag_list() {
		$heading_tag_list = array(
			''  	=>  '',
			'h1' => 'h1',
			'h2' => 'h2',
			'h3' => 'h3',
			'h4' => 'h4',
			'h5' => 'h5',
			'h6' => 'h6',
			'p'  => 'p',
			'a'  => 'a',
			'span'  => 'span',
			'div'  => 'div',
		);
		return $heading_tag_list;
	}
}


if(!function_exists('mascot_core_carpento_wp_admin_dashicons_list')) {
	/**
	 * WordPress admin Dashicons https://developer.wordpress.org/resource/dashicons
	 */
	function mascot_core_carpento_wp_admin_dashicons_list() {
		$animate_css_animation_list = array(
			'' => '',
			'dashicons-mascot' => 'dashicons-mascot',
			'dashicons-admin-appearance' => 'dashicons-admin-appearance',
			'dashicons-admin-collapse' => 'dashicons-admin-collapse',
			'dashicons-admin-comments' => 'dashicons-admin-comments',
			'dashicons-admin-customizer' => 'dashicons-admin-customizer',
			'dashicons-admin-generic' => 'dashicons-admin-generic',
			'dashicons-admin-home' => 'dashicons-admin-home',
			'dashicons-admin-links' => 'dashicons-admin-links',
			'dashicons-admin-media' => 'dashicons-admin-media',
			'dashicons-admin-multisite' => 'dashicons-admin-multisite',
			'dashicons-admin-network' => 'dashicons-admin-network',
			'dashicons-admin-page' => 'dashicons-admin-page',
			'dashicons-admin-plugins' => 'dashicons-admin-plugins',
			'dashicons-admin-post' => 'dashicons-admin-post',
			'dashicons-admin-settings' => 'dashicons-admin-settings',
			'dashicons-admin-site' => 'dashicons-admin-site',
			'dashicons-admin-tools' => 'dashicons-admin-tools',
			'dashicons-admin-users' => 'dashicons-admin-users',
			'dashicons-album' => 'dashicons-album',
			'dashicons-align-center' => 'dashicons-align-center',
			'dashicons-align-full-width' => 'dashicons-align-full-width',
			'dashicons-align-left' => 'dashicons-align-left',
			'dashicons-align-none' => 'dashicons-align-none',
			'dashicons-align-right' => 'dashicons-align-right',
			'dashicons-align-wide' => 'dashicons-align-wide',
			'dashicons-analytics' => 'dashicons-analytics',
			'dashicons-archive' => 'dashicons-archive',
			'dashicons-arrow-down-alt' => 'dashicons-arrow-down-alt',
			'dashicons-arrow-down-alt2' => 'dashicons-arrow-down-alt2',
			'dashicons-arrow-down' => 'dashicons-arrow-down',
			'dashicons-arrow-left-alt' => 'dashicons-arrow-left-alt',
			'dashicons-arrow-left-alt2' => 'dashicons-arrow-left-alt2',
			'dashicons-arrow-left' => 'dashicons-arrow-left',
			'dashicons-arrow-right-alt' => 'dashicons-arrow-right-alt',
			'dashicons-arrow-right-alt2' => 'dashicons-arrow-right-alt2',
			'dashicons-arrow-right' => 'dashicons-arrow-right',
			'dashicons-arrow-up-alt' => 'dashicons-arrow-up-alt',
			'dashicons-arrow-up-alt2' => 'dashicons-arrow-up-alt2',
			'dashicons-arrow-up' => 'dashicons-arrow-up',
			'dashicons-art' => 'dashicons-art',
			'dashicons-awards' => 'dashicons-awards',
			'dashicons-backup' => 'dashicons-backup',
			'dashicons-book-alt' => 'dashicons-book-alt',
			'dashicons-book' => 'dashicons-book',
			'dashicons-building' => 'dashicons-building',
			'dashicons-businessman' => 'dashicons-businessman',
			'dashicons-button' => 'dashicons-button',
			'dashicons-calendar-alt' => 'dashicons-calendar-alt',
			'dashicons-calendar' => 'dashicons-calendar',
			'dashicons-camera' => 'dashicons-camera',
			'dashicons-carrot' => 'dashicons-carrot',
			'dashicons-cart' => 'dashicons-cart',
			'dashicons-category' => 'dashicons-category',
			'dashicons-chart-area' => 'dashicons-chart-area',
			'dashicons-chart-bar' => 'dashicons-chart-bar',
			'dashicons-chart-line' => 'dashicons-chart-line',
			'dashicons-chart-pie' => 'dashicons-chart-pie',
			'dashicons-clipboard' => 'dashicons-clipboard',
			'dashicons-clock' => 'dashicons-clock',
			'dashicons-cloud' => 'dashicons-cloud',
			'dashicons-controls-back' => 'dashicons-controls-back',
			'dashicons-controls-forward' => 'dashicons-controls-forward',
			'dashicons-controls-pause' => 'dashicons-controls-pause',
			'dashicons-controls-play' => 'dashicons-controls-play',
			'dashicons-controls-repeat' => 'dashicons-controls-repeat',
			'dashicons-controls-skipback' => 'dashicons-controls-skipback',
			'dashicons-controls-skipforward' => 'dashicons-controls-skipforward',
			'dashicons-controls-volumeoff' => 'dashicons-controls-volumeoff',
			'dashicons-controls-volumeon' => 'dashicons-controls-volumeon',
			'dashicons-dashboard' => 'dashicons-dashboard',
			'dashicons-desktop' => 'dashicons-desktop',
			'dashicons-dismiss' => 'dashicons-dismiss',
			'dashicons-download' => 'dashicons-download',
			'dashicons-edit' => 'dashicons-edit',
			'dashicons-editor-aligncenter' => 'dashicons-editor-aligncenter',
			'dashicons-editor-alignleft' => 'dashicons-editor-alignleft',
			'dashicons-editor-alignright' => 'dashicons-editor-alignright',
			'dashicons-editor-bold' => 'dashicons-editor-bold',
			'dashicons-editor-break' => 'dashicons-editor-break',
			'dashicons-editor-code' => 'dashicons-editor-code',
			'dashicons-editor-contract' => 'dashicons-editor-contract',
			'dashicons-editor-customchar' => 'dashicons-editor-customchar',
			'dashicons-editor-expand' => 'dashicons-editor-expand',
			'dashicons-editor-help' => 'dashicons-editor-help',
			'dashicons-editor-indent' => 'dashicons-editor-indent',
			'dashicons-editor-insertmore' => 'dashicons-editor-insertmore',
			'dashicons-editor-italic' => 'dashicons-editor-italic',
			'dashicons-editor-justify' => 'dashicons-editor-justify',
			'dashicons-editor-kitchensink' => 'dashicons-editor-kitchensink',
			'dashicons-editor-ol' => 'dashicons-editor-ol',
			'dashicons-editor-outdent' => 'dashicons-editor-outdent',
			'dashicons-editor-paragraph' => 'dashicons-editor-paragraph',
			'dashicons-editor-paste-text' => 'dashicons-editor-paste-text',
			'dashicons-editor-paste-word' => 'dashicons-editor-paste-word',
			'dashicons-editor-quote' => 'dashicons-editor-quote',
			'dashicons-editor-removeformatting' => 'dashicons-editor-removeformatting',
			'dashicons-editor-rtl' => 'dashicons-editor-rtl',
			'dashicons-editor-spellcheck' => 'dashicons-editor-spellcheck',
			'dashicons-editor-strikethrough' => 'dashicons-editor-strikethrough',
			'dashicons-editor-table' => 'dashicons-editor-table',
			'dashicons-editor-textcolor' => 'dashicons-editor-textcolor',
			'dashicons-editor-ul' => 'dashicons-editor-ul',
			'dashicons-editor-underline' => 'dashicons-editor-underline',
			'dashicons-editor-unlink' => 'dashicons-editor-unlink',
			'dashicons-editor-video' => 'dashicons-editor-video',
			'dashicons-ellipsis' => 'dashicons-ellipsis',
			'dashicons-email-alt' => 'dashicons-email-alt',
			'dashicons-email-alt2' => 'dashicons-email-alt2',
			'dashicons-email' => 'dashicons-email',
			'dashicons-exerpt-view' => 'dashicons-exerpt-view',
			'dashicons-external' => 'dashicons-external',
			'dashicons-facebook-alt' => 'dashicons-facebook-alt',
			'dashicons-facebook' => 'dashicons-facebook',
			'dashicons-feedback' => 'dashicons-feedback',
			'dashicons-filter' => 'dashicons-filter',
			'dashicons-flag' => 'dashicons-flag',
			'dashicons-format-aside' => 'dashicons-format-aside',
			'dashicons-format-audio' => 'dashicons-format-audio',
			'dashicons-format-chat' => 'dashicons-format-chat',
			'dashicons-format-gallery' => 'dashicons-format-gallery',
			'dashicons-format-image' => 'dashicons-format-image',
			'dashicons-format-quote' => 'dashicons-format-quote',
			'dashicons-format-status' => 'dashicons-format-status',
			'dashicons-format-video' => 'dashicons-format-video',
			'dashicons-forms' => 'dashicons-forms',
			'dashicons-googleplus' => 'dashicons-googleplus',
			'dashicons-grid-view' => 'dashicons-grid-view',
			'dashicons-groups' => 'dashicons-groups',
			'dashicons-hammer' => 'dashicons-hammer',
			'dashicons-heading' => 'dashicons-heading',
			'dashicons-heart' => 'dashicons-heart',
			'dashicons-hidden' => 'dashicons-hidden',
			'dashicons-id-alt' => 'dashicons-id-alt',
			'dashicons-id' => 'dashicons-id',
			'dashicons-image-crop' => 'dashicons-image-crop',
			'dashicons-image-filter' => 'dashicons-image-filter',
			'dashicons-image-flip-horizontal' => 'dashicons-image-flip-horizontal',
			'dashicons-image-flip-vertical' => 'dashicons-image-flip-vertical',
			'dashicons-image-rotate-left' => 'dashicons-image-rotate-left',
			'dashicons-image-rotate-right' => 'dashicons-image-rotate-right',
			'dashicons-image-rotate' => 'dashicons-image-rotate',
			'dashicons-images-alt' => 'dashicons-images-alt',
			'dashicons-images-alt2' => 'dashicons-images-alt2',
			'dashicons-index-card' => 'dashicons-index-card',
			'dashicons-info' => 'dashicons-info',
			'dashicons-insert' => 'dashicons-insert',
			'dashicons-laptop' => 'dashicons-laptop',
			'dashicons-layout' => 'dashicons-layout',
			'dashicons-leftright' => 'dashicons-leftright',
			'dashicons-lightbulb' => 'dashicons-lightbulb',
			'dashicons-list-view' => 'dashicons-list-view',
			'dashicons-location-alt' => 'dashicons-location-alt',
			'dashicons-location' => 'dashicons-location',
			'dashicons-lock' => 'dashicons-lock',
			'dashicons-marker' => 'dashicons-marker',
			'dashicons-media-archive' => 'dashicons-media-archive',
			'dashicons-media-audio' => 'dashicons-media-audio',
			'dashicons-media-code' => 'dashicons-media-code',
			'dashicons-media-default' => 'dashicons-media-default',
			'dashicons-media-document' => 'dashicons-media-document',
			'dashicons-media-interactive' => 'dashicons-media-interactive',
			'dashicons-media-spreadsheet' => 'dashicons-media-spreadsheet',
			'dashicons-media-text' => 'dashicons-media-text',
			'dashicons-media-video' => 'dashicons-media-video',
			'dashicons-megaphone' => 'dashicons-megaphone',
			'dashicons-menu-alt' => 'dashicons-menu-alt',
			'dashicons-menu' => 'dashicons-menu',
			'dashicons-microphone' => 'dashicons-microphone',
			'dashicons-migrate' => 'dashicons-migrate',
			'dashicons-minus' => 'dashicons-minus',
			'dashicons-money' => 'dashicons-money',
			'dashicons-move' => 'dashicons-move',
			'dashicons-nametag' => 'dashicons-nametag',
			'dashicons-networking' => 'dashicons-networking',
			'dashicons-no-alt' => 'dashicons-no-alt',
			'dashicons-no' => 'dashicons-no',
			'dashicons-palmtree' => 'dashicons-palmtree',
			'dashicons-paperclip' => 'dashicons-paperclip',
			'dashicons-performance' => 'dashicons-performance',
			'dashicons-phone' => 'dashicons-phone',
			'dashicons-playlist-audio' => 'dashicons-playlist-audio',
			'dashicons-playlist-video' => 'dashicons-playlist-video',
			'dashicons-plus-alt' => 'dashicons-plus-alt',
			'dashicons-plus-light' => 'dashicons-plus-light',
			'dashicons-plus' => 'dashicons-plus',
			'dashicons-portfolio' => 'dashicons-portfolio',
			'dashicons-post-status' => 'dashicons-post-status',
			'dashicons-pressthis' => 'dashicons-pressthis',
			'dashicons-products' => 'dashicons-products',
			'dashicons-randomize' => 'dashicons-randomize',
			'dashicons-redo' => 'dashicons-redo',
			'dashicons-rss' => 'dashicons-rss',
			'dashicons-saved' => 'dashicons-saved',
			'dashicons-schedule' => 'dashicons-schedule',
			'dashicons-screenoptions' => 'dashicons-screenoptions',
			'dashicons-search' => 'dashicons-search',
			'dashicons-share-alt' => 'dashicons-share-alt',
			'dashicons-share-alt2' => 'dashicons-share-alt2',
			'dashicons-share' => 'dashicons-share',
			'dashicons-shield-alt' => 'dashicons-shield-alt',
			'dashicons-shield' => 'dashicons-shield',
			'dashicons-slides' => 'dashicons-slides',
			'dashicons-smartphone' => 'dashicons-smartphone',
			'dashicons-smiley' => 'dashicons-smiley',
			'dashicons-sort' => 'dashicons-sort',
			'dashicons-sos' => 'dashicons-sos',
			'dashicons-star-empty' => 'dashicons-star-empty',
			'dashicons-star-filled' => 'dashicons-star-filled',
			'dashicons-star-half' => 'dashicons-star-half',
			'dashicons-sticky' => 'dashicons-sticky',
			'dashicons-store' => 'dashicons-store',
			'dashicons-tablet' => 'dashicons-tablet',
			'dashicons-tag' => 'dashicons-tag',
			'dashicons-tagcloud' => 'dashicons-tagcloud',
			'dashicons-testimonial' => 'dashicons-testimonial',
			'dashicons-text' => 'dashicons-text',
			'dashicons-thumbs-down' => 'dashicons-thumbs-down',
			'dashicons-thumbs-up' => 'dashicons-thumbs-up',
			'dashicons-tickets-alt' => 'dashicons-tickets-alt',
			'dashicons-tickets' => 'dashicons-tickets',
			'dashicons-translation' => 'dashicons-translation',
			'dashicons-trash' => 'dashicons-trash',
			'dashicons-twitter' => 'dashicons-twitter',
			'dashicons-undo' => 'dashicons-undo',
			'dashicons-universal-access-alt' => 'dashicons-universal-access-alt',
			'dashicons-universal-access' => 'dashicons-universal-access',
			'dashicons-unlock' => 'dashicons-unlock',
			'dashicons-update' => 'dashicons-update',
			'dashicons-upload' => 'dashicons-upload',
			'dashicons-vault' => 'dashicons-vault',
			'dashicons-video-alt' => 'dashicons-video-alt',
			'dashicons-video-alt2' => 'dashicons-video-alt2',
			'dashicons-video-alt3' => 'dashicons-video-alt3',
			'dashicons-visibility' => 'dashicons-visibility',
			'dashicons-warning' => 'dashicons-warning',
			'dashicons-welcome-add-page' => 'dashicons-welcome-add-page',
			'dashicons-welcome-comments' => 'dashicons-welcome-comments',
			'dashicons-welcome-learn-more' => 'dashicons-welcome-learn-more',
			'dashicons-welcome-view-site' => 'dashicons-welcome-view-site',
			'dashicons-welcome-widgets-menus' => 'dashicons-welcome-widgets-menus',
			'dashicons-welcome-write-blog' => 'dashicons-welcome-write-blog',
			'dashicons-wordpress-alt' => 'dashicons-wordpress-alt',
			'dashicons-wordpress' => 'dashicons-wordpress',
			'dashicons-yes' => 'dashicons-yes'
		);
		return $animate_css_animation_list;
	}
}






if ( ! function_exists( 'mascot_core_carpento_prepare_button_classes_from_params' ) ) {
	/**
	 * Return Button Classes Collecting From Params
	 */
	function mascot_core_carpento_prepare_button_classes_from_params( $params = array(), $prefix = '' ) {
		$btn_classes = array();

		$btn_classes[] = 'btn';
		if( filter_var( $params[$prefix . 'btn_outlined'], FILTER_VALIDATE_BOOLEAN ) == true ) {
			$oldstr = $params[$prefix . 'btn_design_style'];
			$newstr = substr_replace($oldstr, 'outline-', 4, 0);
			$btn_classes[] = $newstr;
			$btn_classes[] = 'btn-outline';
		} else if( filter_var( $params[$prefix . 'btn_gradient_effect'], FILTER_VALIDATE_BOOLEAN ) == true ) {
			$oldstr = $params[$prefix . 'btn_design_style'];
			$newstr = substr_replace($oldstr, 'gradient-', 4, 0);
			$btn_classes[] = $newstr;
			$btn_classes[] = 'btn-outline';
		} else if ( $params[$prefix . 'btn_design_style'] ) {
			$btn_classes[] = $params[$prefix . 'btn_design_style'];
		}

		if( $params[$prefix . 'button_size'] != "" ) {
			$btn_classes[] = $params[$prefix . 'button_size'];
		}
		if( filter_var( $params[$prefix . 'btn_round'], FILTER_VALIDATE_BOOLEAN ) == true ) {
			$btn_classes[] = 'btn-round';
		}
		if( filter_var( $params[$prefix . 'btn_flat'], FILTER_VALIDATE_BOOLEAN ) == true ) {
			$btn_classes[] = 'btn-flat';
		}
		if( isset($params[$prefix . 'btn_block']) && filter_var( $params[$prefix . 'btn_block'], FILTER_VALIDATE_BOOLEAN ) == true ) {
			$btn_classes[] = 'btn-block';
		}
		if( filter_var( $params[$prefix . 'btn_threed_effect'], FILTER_VALIDATE_BOOLEAN ) == true ) {
			$btn_classes[] = 'btn-3d';
		}
		if( $params[$prefix . 'button_hover_animation_effect'] != "" ) {
			$btn_classes[] = $params[$prefix . 'button_hover_animation_effect'];
		}
		if( $params[$prefix . 'btn_class'] != "" ) {
			$btn_classes[] = $params[$prefix . 'btn_class'];
		}

		return $btn_classes;
	}
}


if ( ! function_exists( 'mascot_core_carpento_prepare_header_button_classes_from_params' ) ) {
	/**
	 * Return Header Button Classes Collecting From Params
	 */
	function mascot_core_carpento_prepare_header_button_classes_from_params( $params = array(), $prefix = '' ) {
		$btn_classes = array();

		$btn_classes[] = 'btn';
		if( $params[$prefix . 'custom_button_outlined'] ) {
			$oldstr = $params[$prefix . 'custom_button_design_style'];
			$newstr = substr_replace($oldstr, 'outline-', 4, 0);
			$btn_classes[] = $newstr;
			$btn_classes[] = 'btn-outline';
		} else if ( $params[$prefix . 'custom_button_design_style'] ) {
			$btn_classes[] = $params[$prefix . 'custom_button_design_style'];
		}
		if( $params[$prefix . 'custom_button_size'] ) {
			$btn_classes[] = $params[$prefix . 'custom_button_size'];
		}
		if( $params[$prefix . 'custom_button_flat'] ) {
			$btn_classes[] = 'btn-flat';
		}
		if( $params[$prefix . 'custom_button_round'] ) {
			$btn_classes[] = 'btn-round';
		}
		if( isset( $params[$prefix . 'custom_button_custom_css'] ) ) {
			$btn_classes[] = $params[$prefix . 'custom_button_custom_css'];
		}

		$btn_classes[] = 'custom-button';
		return $btn_classes;
	}
}


if ( ! function_exists( 'mascot_core_carpento_swiper_data_params' ) ) {
	/**
	 * Return Swiper Slider Data Collecting From Params
	 */
	function mascot_core_carpento_swiper_data_params( $params = array(), $prefix = '' ) {
		$swiper_data = array();


		if( $params[$prefix . 'swiper_items'] > -1 ) {
			$swiper_data[] = 'data-items="' . esc_attr( $params[$prefix . 'swiper_items'] ) . '"';
		}
		if( $params[$prefix . 'space']['size'] > -1 ) {
			$swiper_data[] = 'data-space="' . esc_attr( $params[$prefix . 'space']['size'] ) . '"';
		}
		if( filter_var( $params[$prefix . 'autoplay'], FILTER_VALIDATE_BOOLEAN ) == true ) {
			$swiper_data[] = 'data-autoplay="true"';
		} else {
			$swiper_data[] = 'data-autoplay="false"';
		}
		if( filter_var( $params[$prefix . 'loop'], FILTER_VALIDATE_BOOLEAN ) == true ) {
			$swiper_data[] = 'data-loop="true"';
		} else {
			$swiper_data[] = 'data-loop="false"';
		}
		if( filter_var( $params[$prefix . 'centered'], FILTER_VALIDATE_BOOLEAN ) == true ) {
			$swiper_data[] = 'data-centered="true"';
		} else {
			$swiper_data[] = 'data-centered="false"';
		}
		if( filter_var( $params[$prefix . 'arrow'], FILTER_VALIDATE_BOOLEAN ) == true ) {
			$swiper_data[] = 'data-arrow="true"';
		} else {
			$swiper_data[] = 'data-arrow="false"';
		}
		if( filter_var( $params[$prefix . 'bullets'], FILTER_VALIDATE_BOOLEAN ) == true ) {
			$swiper_data[] = 'data-bullets="true"';
		} else {
			$swiper_data[] = 'data-bullets="false"';
		}

		if( $params[$prefix . 'pagination_type'] > -1 ) {
			$swiper_data[] = 'data-pagination-type="' . esc_attr( $params[$prefix . 'pagination_type'] ) . '"';
		}


		if( $params[$prefix . 'xxl_swiper_items'] > -1 ) {
			$swiper_data[] = 'data-xxl-items="' . esc_attr( $params[$prefix . 'xxl_swiper_items'] ) . '"';
		}
		if( $params[$prefix . 'lg_swiper_items'] > -1 ) {
			$swiper_data[] = 'data-lg-items="' . esc_attr( $params[$prefix . 'lg_swiper_items'] ) . '"';
		}
		if( $params[$prefix . 'md_swiper_items'] > -1 ) {
			$swiper_data[] = 'data-md-items="' . esc_attr( $params[$prefix . 'md_swiper_items'] ) . '"';
		}
		if( $params[$prefix . 'sm_swiper_items'] > -1 ) {
			$swiper_data[] = 'data-sm-items="' . esc_attr( $params[$prefix . 'sm_swiper_items'] ) . '"';
		}
		if( $params[$prefix . 'xs_swiper_items'] > -1 ) {
			$swiper_data[] = 'data-xs-items="' . esc_attr( $params[$prefix . 'xs_swiper_items'] ) . '"';
		}


		return $swiper_data;
	}
}



if(!function_exists('mascot_core_carpento_get_swiper_slider_arraylist')) {
	/**
	 * Return Swiper Slider Array List
	 */
	function mascot_core_carpento_get_swiper_slider_arraylist( $control_object, $serial, $prefix = '', $dependency = array() ) {
		$array = array();

		//Swiper Slider Options
		$control_object->start_controls_section(
			'carousel_options', [
				'label' => esc_html__( 'Carousel/Slider Options', 'mascot-core-carpento' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
				'condition' => $dependency
			]
		);

		$control_object->add_control(
			$prefix . "xxl_swiper_items", [
				'label' => esc_html__( "Items Extra Extra Large (Over 1400px)", 'mascot-core-carpento' ),
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
				'condition' => $dependency
			]
		);
		$control_object->add_control(
			$prefix . "swiper_items", [
				'label' => esc_html__( "Items Extra Large(Over 1200px)", 'mascot-core-carpento' ),
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
				'condition' => $dependency
			]
		);
		$control_object->add_control(
			$prefix . "lg_swiper_items", [
				'label' => esc_html__( "Items Large (Between 992px to 1200px)", 'mascot-core-carpento' ),
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
				'condition' => $dependency
			]
		);
		$control_object->add_control(
			$prefix . "md_swiper_items", [
				'label' => esc_html__( "Items Medium (Over 768px)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1'  =>  '1',
					'2'  =>  '2',
					'3'  =>  '3',
					'4'  =>  '4',
					'5'  =>  '5',
					'6'  =>  '6',
				],
				'default' => '2',
				'condition' => $dependency
			]
		);
		$control_object->add_control(
			$prefix . "sm_swiper_items", [
				'label' => esc_html__( "Items Small (Over 576px)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1'  =>  '1',
					'2'  =>  '2',
					'3'  =>  '3',
					'4'  =>  '4',
					'5'  =>  '5',
					'6'  =>  '6',
				],
				'default' => '1',
				'condition' => $dependency
			]
		);
		$control_object->add_control(
			$prefix . "xs_swiper_items", [
				'label' => esc_html__( "Items Extra Small (Below 576px)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'1'  =>  '1',
					'2'  =>  '2',
					'3'  =>  '3',
					'4'  =>  '4',
					'5'  =>  '5',
					'6'  =>  '6',
				],
				'default' => '1',
				'condition' => $dependency
			]
		);


		$control_object->add_control(
			$prefix . "arrow", [
				'label' => esc_html__( "Show Arrow", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => $dependency
			]
		);
		$control_object->add_control(
			$prefix . "bullets", [
				'label' => esc_html__( "Show Pagination/Bullets", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => $dependency
			]
		);
		$control_object->add_control(
			$prefix . 'pagination_type', [
				'label' => esc_html__( "Pagination/Bullets Type", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'bullets' => esc_html__( 'Bullets', 'mascot-core-carpento' ),
					'fraction' => esc_html__( 'Fraction', 'mascot-core-carpento' ),
					'progressbar' => esc_html__( 'Progressbar', 'mascot-core-carpento' ),
				],
				'default' => 'bullets',
				'condition' => [
					$prefix . "bullets" => array('yes')
				]
			]
		);

		$control_object->add_control(
			$prefix . "autoplay", [
				'label' => esc_html__( "Show autoplay", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => $dependency
			]
		);
		$control_object->add_control(
			$prefix . "loop", [
				'label' => esc_html__( "Show loop", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => $dependency
			]
		);
		$control_object->add_control(
			$prefix . "centered", [
				'label' => esc_html__( "Enabled Centered", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'condition' => $dependency
			]
		);
		$control_object->add_control(
			$prefix . 'space',
			[
				'label' => esc_html__( 'Space (px)', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 30,
				],
				'condition' => $dependency
			]
		);
		$control_object->end_controls_section();

		return $array;
	}
}







if(!function_exists('mascot_core_carpento_get_swiper_slider_nav_arraylist')) {
	/**
	 * Return Owl Slider Nav Array List
	 */
	function mascot_core_carpento_get_swiper_slider_nav_arraylist( $control_object, $serial, $prefix = '', $dependency = array() ) {
		$array = array();
		$control_object->start_controls_section(
			'swiper_arrow_styling', [
				'label' => esc_html__( 'Carousel/Slider Arrow Styling', 'mascot-core-carpento' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => $dependency
			]
		);
		$control_object->add_responsive_control(
			"swiper_arrow_display_visibility", [
				'label' => esc_html__( "Visibility (Show/Hide)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'flex' => [
						'title' => __( 'Show', 'mascot-core-carpento' ),
						'icon' => 'eicon-check',
					],
					'none' => [
						'title' => __( 'Hide', 'mascot-core-carpento' ),
						'icon' => 'eicon-ban',
					],
				],
				'default' => 'flex',
				'selectors' => [
					'{{WRAPPER}} .tm-swiper-button-wrap' => 'display: {{VALUE}};'
				],
			]
		);

		$control_object->start_controls_tabs('tabs_swiper_arrow_styling');
		$control_object->start_controls_tab(
			'tabs_swiper_arrow_styling_normal',
			[
				'label' => esc_html__('Normal', 'mascot-core-oitech'),
			]
		);
		$control_object->add_control(
			'swiper_arrow_bg_options',
			[
				'label' => esc_html__( 'Arrow BG Options', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$control_object->add_responsive_control(
			'swiper_arrow_bg_color',
			[
				'label' => esc_html__( "Arrow BG Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow' => 'background-color: {{VALUE}};'
				],
			]
		);

		$control_object->add_responsive_control(
			'swiper_arrow_bg_theme_color',
			[
				'label' => esc_html__( "Arrow BG Theme Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'selectors' => [
					'{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow' => 'background-color: var(--theme-color{{VALUE}});'
				],
			]
		);

		$control_object->add_control(
			'swiper_arrow_text_options',
			[
				'label' => esc_html__( 'Arrow Text Options', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);

		$control_object->add_responsive_control(
			'swiper_arrow_text_color',
			[
				'label' => esc_html__( "Arrow Text Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow i' => 'color: {{VALUE}};'
				],
			]
		);
		$control_object->add_responsive_control(
			'swiper_arrow_text_theme_color',
			[
				'label' => esc_html__( "Arrow Text Theme Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'selectors' => [
					'{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow i' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);


		$control_object->add_control(
			'swiper_arrow_size_options',
			[
				'label' => esc_html__( 'Arrow Size & Border', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$control_object->add_responsive_control(
			'swiper_arrow_widthheight',
			[
				'label' => esc_html__( 'Dimension (Width and Height)', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 20,
						'max' => 120,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$control_object->add_responsive_control(
			'swiper_arrow_border_radius',
			[
				'label' => esc_html__( "Border Radius", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);
		$control_object->add_control(
			'swiper_arrow_border_title',
			[
				'label' => esc_html__( 'Border', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$control_object->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'swiper_arrow_border',
				'label' => esc_html__( 'Border', 'mascot-core-carpento' ),
				'selector' => '{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow',
			]
		);

		$control_object->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'swiper_arrow_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'mascot-core-carpento' ),
				'separator' => 'before',
				'selector' => '{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow',
			]
		);

		$control_object->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'swiper_arrow_typography',
				'label' => esc_html__( 'Typography', 'mascot-core-carpento' ),
				'selector' => '{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow i',
			]
		);

		$control_object->add_control(
			'swiper_arrow_opacity_options',
			[
				'label' => esc_html__( 'Arrow Opacity', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$control_object->add_responsive_control(
			'swiper_arrow_opacity',
			[
				'label' => esc_html__( 'Opacity', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow' => 'opacity: {{SIZE}};'
				]
			]
		);
		$control_object->end_controls_tab();

		$control_object->start_controls_tab(
			'tabs_swiper_arrow_styling_hover',
			[
				'label' => esc_html__('Hover', 'mascot-core-oitech'),
			]
		);
		$control_object->add_responsive_control(
			'swiper_arrow_bg_color_hover',
			[
				'label' => esc_html__( "Arrow BG Color (Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow:hover' => 'background-color: {{VALUE}};'
				],
			]
		);

		$control_object->add_responsive_control(
			'swiper_arrow_bg_theme_color_hover',
			[
				'label' => esc_html__( "Arrow BG Theme Color (Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'selectors' => [
					'{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow:hover' => 'background-color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$control_object->add_responsive_control(
			'swiper_arrow_text_color_hover',
			[
				'label' => esc_html__( "Arrow Text Color (Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow:hover i' => 'color: {{VALUE}};'
				],
			]
		);
		$control_object->add_responsive_control(
			'swiper_arrow_text_theme_color_hover',
			[
				'label' => esc_html__( "Arrow Text Theme Color (Hover)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'selectors' => [
					'{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow:hover i' => 'color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$control_object->add_control(
			'swiper_arrow_border_hover',
			[
				'label' => esc_html__( 'Border (Hover)', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$control_object->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'swiper_arrow_border_hover',
				'label' => esc_html__( 'Border', 'mascot-core-carpento' ),
				'selector' => '{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow:hover',
			]
		);
		$control_object->add_responsive_control(
			'swiper_arrow_opacity_hover',
			[
				'label' => esc_html__( 'Opacity (hover)', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .tm-swiper-button-wrap .tm-swiper-arrow:hover' => 'opacity: {{SIZE}};'
				]
			]
		);
		$control_object->end_controls_tab();
		$control_object->end_controls_tabs();
		$control_object->end_controls_section();
		return $array;
	}
}


if(!function_exists('mascot_core_carpento_get_swiper_slider_dots_arraylist')) {
	/**
	 * Return Owl Slider Bullets/Dots List
	 */
	function mascot_core_carpento_get_swiper_slider_dots_arraylist( $control_object, $serial, $prefix = '', $dependency = array() ) {
		$array = array();

		$control_object->start_controls_section(
			'swiper_dots_options', [
				'label' => esc_html__( 'Carousel/Slider Dots Styling', 'mascot-core-carpento' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => $dependency
			]
		);
		$control_object->add_responsive_control(
			$prefix . "dots_display_visibility", [
				'label' => esc_html__( "Visibility in Responsive (Show/Hide)", 'mascot-core-carpento' ),
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
				'default' => 'block',
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination' => 'display: {{VALUE}};'
				],
			]
		);
		$control_object->add_control(
			$prefix . 'swiper_dots_pos_options',
			[
				'label' => esc_html__( 'Bullets/Dots Position', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$control_object->add_control(
			$prefix . 'swiper_dots_pos_center', [
				'label' => esc_html__( "Dots Position Horizontal Center", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'default' => 'yes',
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination' => 'left: 50%; bottom: -75px; transform: translate(-50%, -50%);'
				],
			]
		);
		$control_object->add_responsive_control(
			'swiper_dots_pos_vertical',
			[
				'label' => __( 'Vertical Orientation', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'top' => [
						'title' => __( 'Top', 'mascot-core-carpento' ),
						'icon' => 'eicon-v-align-top',
					],
					'bottom' => [
						'title' => __( 'Bottom', 'mascot-core-carpento' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'top',
				'toggle' => false,
			]
		);
		$control_object->add_responsive_control(
			$prefix . 'swiper_dots_pos_offset_y',
			[
				'label' => __( 'Offset', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px' ],
				'range' => [
					'px' => [
						'min' => -1300,
						'max' => 1300,
						'step' => 1,
					],
					'%' => [
						'min' => -250,
						'max' => 250,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination' =>
							'{{swiper_dots_pos_vertical.VALUE}}: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$control_object->add_responsive_control(
			$prefix . 'swiper_dots_pos_horizontal',
			[
				'label' => __( 'Horizontal Orientation', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'default' => is_rtl() ? 'right' : 'left',
				'options' => [
					'left' => [
						'title' => __( 'Left', 'mascot-core-carpento' ),
						'icon' => 'eicon-h-align-left',
					],
					'right' => [
						'title' => __( 'Right', 'mascot-core-carpento' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'toggle' => false,
			]
		);
		$control_object->add_responsive_control(
			$prefix . 'swiper_dots_pos_offset_x',
			[
				'label' => __( 'Offset', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px' ],
				'range' => [
					'px' => [
						'min' => -1300,
						'max' => 1300,
						'step' => 1,
					],
					'%' => [
						'min' => -250,
						'max' => 250,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination' =>
							'{{swiper_dots_pos_horizontal.VALUE}}: {{SIZE}}{{UNIT}};',
				],
			]
		);




		$control_object->start_controls_tabs('tabs_swiper_dots_styling');
		$control_object->start_controls_tab(
			'tabs_swiper_dots_styling_normal',
			[
				'label' => esc_html__('Normal', 'mascot-core-oitech'),
			]
		);
		$control_object->add_control(
			$prefix . 'swiper_dots_bg_options',
			[
				'label' => esc_html__( 'Bullets/Dots BG Options', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$control_object->add_responsive_control(
			$prefix . 'swiper_dots_bg_color',
			[
				'label' => esc_html__( "BG Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet' => 'background-color: {{VALUE}};'
				],
			]
		);
		$control_object->add_responsive_control(
			$prefix . 'swiper_dots_bg_theme_color',
			[
				'label' => esc_html__( "BG Theme Color", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet' => 'background-color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$control_object->add_control(
			$prefix . 'swiper_dots_size_options',
			[
				'label' => esc_html__( 'Bullet Size', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		$control_object->add_responsive_control(
			$prefix . 'swiper_dots_width',
			[
				'label' => esc_html__( 'Width', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$control_object->add_responsive_control(
			$prefix . 'swiper_dots_height',
			[
				'label' => esc_html__( 'Height', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$control_object->add_responsive_control(
			'swiper_dots_border_radius',
			[
				'label' => esc_html__( "Border Radius", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'separator' => 'before',
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);
		$control_object->end_controls_tab();

		$control_object->start_controls_tab(
			'tabs_swiper_dots_styling_hover',
			[
				'label' => esc_html__('Active', 'mascot-core-oitech'),
			]
		);
		$control_object->add_responsive_control(
			$prefix . 'swiper_dots_bg_color_hover',
			[
				'label' => esc_html__( "BG Color (Active)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: {{VALUE}};'
				],
			]
		);
		$control_object->add_responsive_control(
			$prefix . 'swiper_dots_bg_theme_color_hover',
			[
				'label' => esc_html__( "BG Theme Color (Active)", 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => mascot_core_carpento_theme_color_list(),
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet:hover' => 'background-color: var(--theme-color{{VALUE}});',
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'background-color: var(--theme-color{{VALUE}});'
				],
			]
		);
		$control_object->add_responsive_control(
			$prefix . 'swiper_dots_width_active',
			[
				'label' => esc_html__( 'Width (Active)', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet:hover' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$control_object->add_responsive_control(
			$prefix . 'swiper_dots_height_active',
			[
				'label' => esc_html__( 'Height (Active)', 'mascot-core-carpento' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 50,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet:hover' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .swiper-pagination .swiper-pagination-bullet.swiper-pagination-bullet-active' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$control_object->end_controls_tab();
		$control_object->end_controls_tabs();

		$control_object->end_controls_section();

		return $array;
	}
}
