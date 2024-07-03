<!-- Features Block Style1-->
<?php $working_item['settings'] = $settings; ?>
<div class="working-block-style1">
  <div class="inner-box">
    <div class="icon-box">
      <?php mascot_core_carpento_get_shortcode_template_part( 'icon-type', $working_item['icon_type'], 'working-block/tpl', $working_item, false );?>
    </div>
    <div class="content">
      <?php mascot_core_carpento_get_shortcode_template_part( 'part-title', null, 'working-block/tpl', $working_item, false );?>
      <?php mascot_core_carpento_get_shortcode_template_part( 'part-content', null, 'working-block/tpl', $working_item, false );?>
      <?php mascot_core_carpento_get_shortcode_template_part( 'part-count', null, 'working-block/tpl', $working_item, false );?>
      <div class="icon-shapes"></div>
    </div>
  </div>
</div>