<div class="btn-view-details <?php echo esc_attr( $settings['button_alignment'] );?>">
    <a
      <?php echo $target = $feature_link['is_external'] ? ' target="_blank"' : '';?>
      href="<?php echo esc_url( $feature_link['url'] );?>" aria-label="Read More"
      class="<?php echo esc_attr(implode(' ', $settings['btn_classes'])); ?>">
        
    </a>
</div>