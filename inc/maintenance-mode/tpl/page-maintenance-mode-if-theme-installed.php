<?php
/**
 * The template for displaying Maintenance Mode Page
 *
 * This is the template that displays Maintenance Mode0 page by default.
 *
 */
add_filter( 'carpento_filter_show_header', 'carpento_return_false' );
add_filter( 'carpento_filter_show_footer', 'carpento_return_false' );
	
//change the page title
if( carpento_get_redux_option( 'maintenance-mode-settings-title' ) != '' ) {
	add_filter('pre_get_document_title', 'carpento_change_the_title');
	function carpento_change_the_title() {
		return carpento_get_redux_option( 'maintenance-mode-settings-title' );
	}
}

get_header();
?>

<?php
if ( mascot_core_carpento_plugin_installed() ) {
	mascot_core_carpento_get_maintenance_mode_parts();
}
?>

<?php get_footer();
