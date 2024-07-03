<?php if ( $gallery_images_array ) : ?>
	<div class="tm-sc-clients-logo clients-grid <?php echo esc_attr(implode(' ', $classes)); ?>">
		<!-- the loop -->
		<?php foreach (  $gallery_images_array as $gallery_item ) { ?>
		<?php include( 'common.php' ); ?>
		<?php } ?>
		<!-- end of the loop -->
	</div>
<?php else : ?>
	<?php mascot_core_carpento_no_posts_match_criteria_text(); ?>
<?php endif; ?>