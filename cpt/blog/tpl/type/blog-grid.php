<?php $settings['post_format'] = get_post_format(get_the_ID()) ? : 'standard'; $settings['settings'] = $settings; ?>
<?php if ( $the_query->have_posts() ) : ?>
	<div class="tm-sc-blog tm-sc-blog-grid <?php echo esc_attr(implode(' ', $classes)); ?>">
		<?php include('filter.php'); ?>

		<!-- Isotope Gallery Grid -->
		<div id="<?php echo esc_attr( $holder_id ) ?>" class="isotope-layout grid-<?php echo esc_attr( $columns ); ?> <?php echo esc_attr( $gutter );?> clearfix">
			<div class="isotope-layout-inner">

				<!-- the loop -->
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<?php include('filter-term-list-each-post.php'); ?>
				<?php 
					$animation = "";
					$animation_delay = "";
					if(isset($wow_appear_animation) && !empty($wow_appear_animation)) {
						$animation = $wow_appear_animation;
					}
					if(isset($wow_animation_delay) && !empty($wow_animation_delay)) {
						$animation_delay = $wow_animation_delay . 'ms';
					}
				?>
				<div class="isotope-item <?php echo esc_attr( $term_slugs_list_string );?>">
					<div class="isotope-item-inner <?php echo esc_attr($animation);?>" data-wow-delay="<?php echo esc_attr($animation_delay);?>">
						<?php echo mascot_core_carpento_shortcode_get_blog_post_format( get_post_format(), $settings ); ?>
					</div>
				</div>
				<?php endwhile; ?>
				<!-- end of the loop -->
			</div>
		</div>
		<?php wp_reset_postdata(); ?>
	</div>
		

<?php else : ?>
	<?php mascot_core_carpento_no_posts_match_criteria_text(); ?>
<?php endif; ?>