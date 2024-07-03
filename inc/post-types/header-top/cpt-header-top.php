<?php
namespace MASCOTCORECARPENTO\CPT\HeaderTop;

use MASCOTCORECARPENTO\Lib;

/**
 * Singleton class
 * class CPT_HeaderTop
 * @package MASCOTCORECARPENTO\CPT\HeaderTop;
 */
final class CPT_HeaderTop implements Lib\Mascot_Core_Carpento_Interface_PostType {
	
	/**
	 * @var string
	 */
	public 	$ptKey;
	public 	$ptKeyRewriteBase;
	private $ptMenuIcon;
	private $ptSingularName;
	private $ptPluralName;

	/**
	 * Call this method to get singleton
	 *
	 * @return CPT_HeaderTop
	 */
	public static function Instance() {
		static $inst = null;
		if ($inst === null) {
			$inst = new CPT_HeaderTop();
		}
		return $inst;
	}
	
	/**
	 * Private ctor so nobody else can instance it
	 *
	 */
	private function __construct() {
		$this->ptSingularName = esc_html__( 'Parts - Header Top', 'mascot-core-carpento' );
		$this->ptPluralName = esc_html__( 'Parts - Header Top', 'mascot-core-carpento' );
		$this->ptKey = 'header-top';
		$this->ptKeyRewriteBase = $this->ptKey;
		$this->ptMenuIcon = 'dashicons-mascot';
		add_filter( 'manage_edit-'.$this->ptKey.'_columns', array($this, 'customColumnsSettings') ) ;
		add_filter( 'manage_'.$this->ptKey.'_posts_custom_column', array($this, 'customColumnsContent') ) ;
	}

	/**
	 * @return string
	 */
	public function getPTKey() {
		return $this->ptKey;
	}

	/**
	 * registers custom post type & Tax
	 */
	public function register() {
		$this->registerCustomPostType();
	}
	
	/**
	 * Regsiters custom post type
	 */
	private function registerCustomPostType() {

		$labels = array(
			'name'					=> $this->ptPluralName,
			'singular_name'			=> $this->ptPluralName . ' ' . esc_html__( 'Item', 'mascot-core-carpento' ),
			'menu_name'				=> $this->ptPluralName,
			'name_admin_bar'		=> $this->ptPluralName,
			'archives'				=> esc_html__( 'Item Archives', 'mascot-core-carpento' ),
			'attributes'			=> esc_html__( 'Item Attributes', 'mascot-core-carpento' ),
			'parent_item_colon'		=> esc_html__( 'Parent Item:', 'mascot-core-carpento' ),
			'all_items'				=> esc_html__( 'All Items', 'mascot-core-carpento' ),
			'add_new_item'			=> esc_html__( 'Add New Item', 'mascot-core-carpento' ),
			'add_new'				=> esc_html__( 'Add New', 'mascot-core-carpento' ),
			'new_item'				=> esc_html__( 'New Item', 'mascot-core-carpento' ),
			'edit_item'				=> esc_html__( 'Edit Item', 'mascot-core-carpento' ),
			'update_item'			=> esc_html__( 'Update Item', 'mascot-core-carpento' ),
			'view_item'				=> esc_html__( 'View Item', 'mascot-core-carpento' ),
			'view_items'			=> esc_html__( 'View Items', 'mascot-core-carpento' ),
			'search_items'			=> esc_html__( 'Search Item', 'mascot-core-carpento' ),
			'not_found'				=> esc_html__( 'Not found', 'mascot-core-carpento' ),
			'not_found_in_trash'	=> esc_html__( 'Not found in Trash', 'mascot-core-carpento' ),
			'featured_image'		=> esc_html__( 'Featured Image', 'mascot-core-carpento' ),
			'set_featured_image'	=> esc_html__( 'Set featured image', 'mascot-core-carpento' ),
			'remove_featured_image'	=> esc_html__( 'Remove featured image', 'mascot-core-carpento' ),
			'use_featured_image'	=> esc_html__( 'Use as featured image', 'mascot-core-carpento' ),
			'insert_into_item'		=> esc_html__( 'Insert into item', 'mascot-core-carpento' ),
			'uploaded_to_this_item'	=> esc_html__( 'Uploaded to this item', 'mascot-core-carpento' ),
			'items_list'			=> esc_html__( 'Items list', 'mascot-core-carpento' ),
			'items_list_navigation'	=> esc_html__( 'Items list navigation', 'mascot-core-carpento' ),
			'filter_items_list'		=> esc_html__( 'Filter items list', 'mascot-core-carpento' ),
		);

		$args = array(
			'label'						=> $this->ptSingularName,
			'description'				=> esc_html__( 'Post Type Description', 'mascot-core-carpento' ),
			'labels'					=> $labels,
			'supports'					=> array( 'title', 'editor', ),
			'hierarchical'				=> false,
			'public'					=> true,
			'show_ui'					=> true,
			'show_in_menu'				=> true,
			'menu_position'				=> 31,
			'menu_icon'					=> $this->ptMenuIcon,
			'show_in_admin_bar'			=> true,
			'show_in_nav_menus'			=> true,
			'can_export'				=> true,
			'has_archive'				=> false,
			'exclude_from_search'		=> true,
			'publicly_queryable'		=> true,
			'capability_type'			=> 'page',
			'rewrite'					=> array( 'slug' => $this->ptKeyRewriteBase, 'with_front' => false ),
		);
		register_post_type( $this->ptKey, $args );

	}
	
	/**
	 * Custom Columns Settings
	 */
	public function customColumnsSettings( $columns ) {

		$columns = array(
			'cb'			=> '<input type="checkbox" />',
			'title'			=> esc_html__( 'Title', 'mascot-core-carpento' ),
			'active-headertop'	=> esc_html__( 'Currently Active Header Top', 'mascot-core-carpento' ),
			'date'			=> esc_html__( 'Date', 'mascot-core-carpento' ),
		);
		return $columns;
	}

	/**
	 * Custom Columns Content
	 */
	public function customColumnsContent( $columns ) {
		global $post;
		switch( $columns ) {
			case 'active-headertop' :
				if( mascot_core_carpento_theme_installed() ) {
					//default
					$active_headertop_id = carpento_get_redux_option( 'header-settings-choose-header-top-cpt-elementor', 'default' );
					if( $post->ID == $active_headertop_id ) {
						echo '<a class="tm-btn tm-btn-danger tm-btn-sm disabled">Active Header</a>';
					}

					//transparent
					$active_headertop_id = carpento_get_redux_option( 'header-settings-choose-header-top-cpt-elementor-transparent', 'default' );
					if( $post->ID == $active_headertop_id ) {
						echo '<a class="tm-btn tm-btn-danger tm-btn-sm disabled">Active Header Transparent</a>';
					}

					//transparent
					$active_headertop_id = carpento_get_redux_option( 'header-settings-choose-header-top-cpt-elementor-sticky', 'default' );
					if( $post->ID == $active_headertop_id ) {
						echo '<a class="tm-btn tm-btn-danger tm-btn-sm disabled">Active Header Sticky</a>';
					}

					//transparent
					$active_headertop_id = carpento_get_redux_option( 'header-settings-choose-header-top-cpt-elementor-mobile', 'default' );
					if( $post->ID == $active_headertop_id ) {
						echo '<a class="tm-btn tm-btn-danger tm-btn-sm disabled">Active Header Mobile</a>';
					}
				}
			break;

			default :
			break;
		}
	}

}