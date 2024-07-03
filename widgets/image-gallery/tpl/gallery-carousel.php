<?php mascot_core_carpento_wp_enqueue_script_owl_carousel(); ?>
<?php if ( $gallery_images_array ) : ?>
	<div class="tm-sc-gallery tm-sc-gallery-carousel lightgallery-lightbox <?php echo esc_attr(implode(' ', $classes)); ?>">
		<!-- Isotope Gallery Grid -->
		<div id="<?php echo esc_attr( $holder_id ) ?>" class="owl-carousel owl-theme tm-owl-carousel-<?php echo esc_attr( $columns );?>col" <?php echo html_entity_decode( esc_attr( implode(' ', $swiper_slide_data_info) ) ) ?>>
			<!-- the loop -->
			<?php foreach (  $gallery_images_array as $gallery_item ) { $settings['gallery_item'] = $gallery_item;?>
			<!-- Isotope Item Start -->
			<div class="tm-carousel-item">
				<?php mascot_core_carpento_get_shortcode_template_part( 'each-item', $_skin, 'image-gallery/tpl', $settings, false ); ?>
			</div>
			<!-- Isotope Item End -->
			<?php } ?>
			<!-- end of the loop -->
		</div>
		<!-- End Isotope Gallery Grid -->
	</div>
<?php endif; ?>