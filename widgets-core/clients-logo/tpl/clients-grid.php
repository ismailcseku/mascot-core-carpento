<?php if ( $clients_logo_array ) : ?>
	<div class="tm-sc-clients-logo clients-grid <?php echo esc_attr(implode(' ', $classes)); ?>">
		<!-- the loop -->
		<?php foreach (  $clients_logo_array as $clients_logo ) { ?>
		<?php include( 'common.php' ); ?>
		<?php } ?>
		<!-- end of the loop -->
	</div>
<?php else : ?>
	<?php mascot_core_carpento_no_posts_match_criteria_text(); ?>
<?php endif; ?>