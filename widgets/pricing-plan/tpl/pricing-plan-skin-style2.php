<!-- Pricing Block Style1-->
<?php $settings['settings'] = $settings;?>
<div class="tm-sc-pricing-plan <?php echo esc_attr(implode(' ', $classes)); ?> pricing-plan-skin-style2">
	<div class="pricing-plan-inner-wrapper">
		<div class="pricing-plan-inner">
			<div class="title-box">
				<?php mascot_core_carpento_get_shortcode_template_part( 'thumb', $icon_type, 'pricing-plan/tpl', $settings, false );?>
				<span class="pricing-plan-label"><?php echo $label_text ?></span>
				<?php mascot_core_carpento_get_shortcode_template_part( 'title', null, 'pricing-plan/tpl', $settings, false );?>
				<?php if( in_array('has-label', $classes) ) { ?>
				<div class="discoun-box">
					<span class="icon-arrow"></span>
				</div>
				<?php } ?>
			</div>
			<?php mascot_core_carpento_get_shortcode_template_part( 'pricing', null, 'pricing-plan/tpl', $settings, false );?>
			<?php if ( $sub_title ) { ?>
				<?php mascot_core_carpento_get_shortcode_template_part( 'subtitle', null, 'pricing-plan/tpl', $settings, false );?>
			<?php } ?>
			<?php mascot_core_carpento_get_shortcode_template_part( 'content', null, 'pricing-plan/tpl', $settings, false );?>
			<?php if ( $show_view_details_button == 'yes' ) : ?>
				<?php mascot_core_carpento_get_shortcode_template_part( 'button', null, 'pricing-plan/tpl', $settings, false );?>
			<?php endif; ?>
		</div>
	</div>
</div>