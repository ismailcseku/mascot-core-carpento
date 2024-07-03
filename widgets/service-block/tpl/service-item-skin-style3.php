<!-- Service Block Style1-->
<?php
$service_item['settings'] = $settings;
$service_item['title_tag'] = $title_tag;
$service_item['subtitle_tag'] = $subtitle_tag;
$feature_link = $service_item['feature_link'];
$count = $service_item['count'];
$target = ( $feature_link && $feature_link['is_external'] ) ? ' target="_blank"' : '';
$url = ( $feature_link && $feature_link['url'] ) ? $feature_link['url'] : '';
?>
	<div class="service-block-style3">
		<div class="inner-box">
			<div class="icon-box">
        	<?php mascot_core_carpento_get_shortcode_template_part( 'icon-type', $service_item['icon_type'], 'service-block/tpl', $service_item, false );?>
			</div>
			<?php mascot_core_carpento_get_shortcode_template_part( 'part-count', null, 'service-block/tpl', $service_item, false );?>
      <?php mascot_core_carpento_get_shortcode_template_part( 'part-title', null, 'service-block/tpl', $service_item, false );?>
      <?php mascot_core_carpento_get_shortcode_template_part( 'part-content', null, 'service-block/tpl', $service_item, false );?>
		</div>
	</div>