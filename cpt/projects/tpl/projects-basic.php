<?php $settings['settings'] = $settings; ?>
<?php if ( $the_query->have_posts() ) : ?>
	<div class="tm-sc-projects tm-sc-projects-grid <?php echo esc_attr(implode(' ', $classes)); ?>">
		<?php include('filter.php'); ?>

		<!-- Isotope Gallery Grid -->
		<div id="<?php echo esc_attr( $holder_id ) ?>" class="project-layout">
				<!-- the loop -->
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<?php mascot_core_carpento_get_cpt_shortcode_template_part( 'each-item', $_skin, 'projects/tpl', $settings, false ); ?>
				<?php endwhile; ?>
				<!-- end of the loop -->
		</div>
		<?php wp_reset_postdata(); ?>
	</div>


<?php else : ?>
	<?php mascot_core_carpento_no_posts_match_criteria_text(); ?>
<?php endif; ?>