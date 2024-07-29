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
<div class="service-item service-block-style1">
  <div class="inner-box">
    <div class="image-box">
      <div class="image">
        <?php mascot_core_carpento_get_shortcode_template_part( 'part-featured-image', null, 'service-block/tpl', $service_item, false );?>
      </div>
      <?php if ( $show_view_details_button == 'yes' ) : ?>
        <a href="<?php echo esc_url( $feature_link['url'] );?>" class="theme-btn read-more"><?php echo esc_html( $settings['view_details_button_text']  ); ?> <i class="fa fa-arrow-up"></i></a>
      <?php endif; ?>
    </div>
    <div class="content-box">
      <div class="info-box">
        <div class="icon">
          <?php mascot_core_carpento_get_shortcode_template_part( 'icon-type', $service_item['icon_type'], 'service-block/tpl', $service_item, false );?>
        </div>
        <?php mascot_core_carpento_get_shortcode_template_part( 'part-title', null, 'service-block/tpl', $service_item, false );?>
      </div>
      <div class="inner">
        <?php mascot_core_carpento_get_shortcode_template_part( 'part-content', null, 'service-block/tpl', $service_item, false );?>
      </div>
    </div>
  </div>
</div>