<?php $settings['settings'] = $settings; ?>
<?php if ( $working_block_items_array ) : ?>
	<div class="tm-sc-working tm-working-basic">
		<!-- Isotope Gallery Grid -->
		<div id="<?php echo esc_attr( $holder_id ) ?>" class="working-layout">
			<!-- the loop -->
			<?php foreach (  $working_block_items_array as $working_item ) { ?>
			<?php $settings['working_item'] = $working_item; ?>
			<?php 
				$animation = "";
				$animation_delay = "";
				if(isset($working_item['wow_appear_animation']) && !empty($working_item['wow_appear_animation'])) {
					$animation = $working_item['wow_appear_animation'];
				}
				if(isset($working_item['wow_animation_delay']) && !empty($working_item['wow_animation_delay'])) {
					$animation_delay = $working_item['wow_animation_delay'] . 'ms';
				}
			?>
			<?php mascot_core_carpento_get_shortcode_template_part( 'working-block-item', $_skin, 'working-block/tpl', $settings, false ); ?>
			<?php } ?>
			<!-- end of the loop -->
		</div>
		<?php wp_reset_postdata(); ?>
	</div>

<?php else : ?>
	<?php mascot_core_carpento_no_posts_match_criteria_text(); ?>
<?php endif; ?>