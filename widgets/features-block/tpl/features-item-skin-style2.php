<?php $features_item['settings'] = $settings; ?>
<?php
$features_item['title_tag'] = $title_tag;
$features_item['subtitle_tag'] = $subtitle_tag;
$first_letter_title = substr($features_item['title'], 0, 1);
?>

<div class="features-block-style2">
  <div class="inner-box">
    <div class="icon-box">
      <div class="icon">
        <?php mascot_core_carpento_get_shortcode_template_part( 'icon-type', $features_item['icon_type'], 'features-block/tpl', $features_item, false );?>
      </div>
      <div class="number">01</div>
    </div>
    <div class="content">
		  <?php mascot_core_carpento_get_shortcode_template_part( 'part-title', null, 'features-block/tpl', $features_item, false );?>
      <?php mascot_core_carpento_get_shortcode_template_part( 'part-content', null, 'features-block/tpl', $features_item, false );?>
    </div>
  </div>
</div>