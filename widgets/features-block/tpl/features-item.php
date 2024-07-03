<?php $features_item['settings'] = $settings; ?>
<?php
$features_item['title_tag'] = $title_tag;
$features_item['subtitle_tag'] = $subtitle_tag;
?>
<div class="features-block-style1">
  <div class="inner-box">
    <?php mascot_core_carpento_get_shortcode_template_part( 'part-count', null, 'features-block/tpl', $features_item, false );?>
    <div class="icon-box">
      <?php mascot_core_carpento_get_shortcode_template_part( 'icon-type', $features_item['icon_type'], 'features-block/tpl', $features_item, false );?>
    </div>
    <div class="content-box">
      <?php mascot_core_carpento_get_shortcode_template_part( 'part-title', null, 'features-block/tpl', $features_item, false );?>
      <?php if ( $show_view_details_button == 'yes' ) : ?>
        <?php mascot_core_carpento_get_shortcode_template_part( 'button', null, 'features-block/tpl', $features_item, false );?>
      <?php endif; ?>
      <?php mascot_core_carpento_get_shortcode_template_part( 'part-featured-image', null, 'features-block/tpl', $features_item, false );?>
    </div>
  </div>
</div>