<?php $settings['settings'] = $settings; ?>
<?php 
	wp_enqueue_style( 'swiper' );
	wp_enqueue_script( 'swiper' );
	//Swiper Slider Data
	$swiper_slide_data_info = mascot_core_carpento_swiper_data_params( $settings );
?>
<?php if ( $testimonial_items_array ) : ?>
	<div id="<?php echo esc_attr( $holder_id ) ?>" class="tm-sc-testimonials tm-testimonial-carousel tm-swiper-container" <?php echo html_entity_decode( esc_attr( implode(' ', $swiper_slide_data_info) ) ) ?>>
		<div class="swiper-container-inner">
			<div class="swiper-wrapper">
				<!-- the loop -->
				<?php foreach (  $testimonial_items_array as $testimonial_item ) { ?>
					<?php $settings['testimonial_item'] = $testimonial_item; ?>
					<?php 
						$animation = "";
						$animation_delay = "";
						if(isset($testimonial_item['wow_appear_animation']) && !empty($testimonial_item['wow_appear_animation'])) {
							$animation = $testimonial_item['wow_appear_animation'];
						}
						if(isset($testimonial_item['wow_animation_delay']) && !empty($testimonial_item['wow_animation_delay'])) {
							$animation_delay = $testimonial_item['wow_animation_delay'] . 'ms';
						}
					?>
					<div class="swiper-slide <?php echo esc_attr($animation);?>" data-wow-delay="<?php echo esc_attr($animation_delay);?>">
						<?php mascot_core_carpento_get_shortcode_template_part( 'testimonial-item', $_skin, 'testimonial-block/tpl', $settings, false ); ?>
					</div>
				<?php } ?>
				<!-- end of the loop -->
			</div>
		</div>

		<div class="swiper-pagination <?php if( $bullets !== 'yes' ) echo esc_attr( "d-none" ); ?>"></div>

		<div class="tm-swiper-arrow tm-swiper-button-wrap <?php if( $arrow !== 'yes' ) echo esc_attr( "d-none" ); ?>">
			<div class="tm-swiper-arrow tm-swiper-button-prev"><i class="lnr-icon-arrow-left"></i></div>
			<div class="tm-swiper-arrow tm-swiper-button-next"><i class="lnr-icon-arrow-right"></i></div>
		</div>
	</div>

<?php else : ?>
	<?php mascot_core_carpento_no_posts_match_criteria_text(); ?>
<?php endif; ?>