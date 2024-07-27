<?php $features_item['settings'] = $settings; ?>
<?php
$features_item['title_tag'] = $title_tag;
$features_item['subtitle_tag'] = $subtitle_tag;

$features_link = $features_item['features_link'];
$target = ( $features_link && $features_link['is_external'] ) ? ' target="_blank"' : '';
$url = ( $features_link && $features_link['url'] ) ? $features_link['url'] : '';
?>

<div class="features-block-style5">
  <div class="inner-box">
    <div class="image-box">
      <div class="inner">
        <div class="image">
          <?php mascot_core_carpento_get_shortcode_template_part( 'part-featured-image', null, 'features-block/tpl', $features_item, false );?>
        </div>
        <?php if ( $show_view_details_button == 'yes' ) : ?>
          <a href="<?php echo esc_url( $features_link['url'] );?>"><i class="icon fa fa-arrow-right"></i></a>
        <?php endif; ?>
      </div>
    </div>
    <div class="content-box">
      <div class="inner">
        <?php mascot_core_carpento_get_shortcode_template_part( 'part-title', null, 'features-block/tpl', $features_item, false );?>
        <?php mascot_core_carpento_get_shortcode_template_part( 'part-content', null, 'features-block/tpl', $features_item, false );?>
      </div>
    </div>
  </div>
</div>