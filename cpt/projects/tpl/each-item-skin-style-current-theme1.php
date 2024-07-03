<!-- Project Block -->
<div class="project-item projects-current-theme1">
	<div class="inner-box">
		<div class="image-box">
			<div class="image">
				<?php echo get_the_post_thumbnail( get_the_ID(), $feature_thumb_image_size, array( 'class' => 'img-fullwidth' ) );?>
			</div>
		</div>
		<div class="content-box">
			<?php if ( $show_view_details_button == 'yes' ) : ?>
				<a href="<?php the_permalink();?>" aria-label="<?php the_title();?>" class="theme-btn read-more"><i class="lnr-icon-arrow-right1"></i></a>
			<?php endif; ?>
			<?php if ( $show_title == 'yes' ) : ?>
				<<?php echo esc_attr( $title_tag );?> class="title"><a href="<?php the_permalink();?>" ><?php the_title();?></a></<?php echo esc_attr( $title_tag );?>>
			<?php endif; ?>
			<?php if ( $show_cat == 'yes' ) : ?>
				<ul class="cat">
					<?php include('term-list-each-post.php'); ?>
				</ul>
			<?php endif; ?>
		</div>
		<div class="overlay-1"></div>
	</div>
</div>