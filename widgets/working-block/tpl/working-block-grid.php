<?php $settings['settings'] = $settings; ?>
<?php if ( $working_block_items_array ) : ?>
	<div class="tm-sc-working tm-working-grid">
		<!-- Isotope Gallery Grid -->
		<div id="<?php echo esc_attr( $holder_id ) ?>" class="isotope-layout grid-<?php echo esc_attr( $columns ); ?> <?php echo esc_attr( $gutter );?> clearfix">
			<div class="isotope-layout-inner">
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
				<div class="isotope-item working-block <?php echo esc_attr($animation);?>" data-wow-delay="<?php echo esc_attr($animation_delay);?>">
					<?php mascot_core_carpento_get_shortcode_template_part( 'working-block-item', $_skin, 'working-block/tpl', $settings, false ); ?>
				</div>
				<?php } ?>
				<!-- end of the loop -->
			</div>
		</div>
		<?php wp_reset_postdata(); ?>
	</div>

<?php else : ?>
	<?php mascot_core_carpento_no_posts_match_criteria_text(); ?>
<?php endif; ?>