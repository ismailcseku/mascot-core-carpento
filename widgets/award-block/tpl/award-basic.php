<?php $settings['settings'] = $settings; ?>
<?php if ( $award_items_array ) : ?>
	<div class="tm-award-grid">
		<!-- Isotope Gallery Grid -->
		<div id="<?php echo esc_attr( $holder_id ) ?>" class="award-layout">
			<!-- the loop -->
			<?php foreach (  $award_items_array as $award_item ) { ?>
			<?php $settings['award_item'] = $award_item; ?>
			<?php mascot_core_carpento_get_shortcode_template_part( 'award-item', $_skin, 'award-block/tpl', $settings, false ); ?>
			<?php } ?>
			<!-- end of the loop -->
		</div>
		<?php wp_reset_postdata(); ?>
	</div>

<?php else : ?>
	<?php mascot_core_carpento_no_posts_match_criteria_text(); ?>
<?php endif; ?>