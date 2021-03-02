<?php

$button_style = get_field('button_style');
$button_text = get_field('button_text');

$class_string = (isset($block['className']) ? $block['className'] . ' ' : '') . 'basic-modal_container';
$style_string = '';

if( !empty($block['align']) ) {
  $class_string .= ' align' . $block['align'];
}

if (isset($block['backgroundColor'])) {
  $class_string .= " has-{$block['backgroundColor']}-color has-{$block['backgroundColor']}-background-color";
};

if (isset($block['textColor'])) {
  $class_string .= " has-text-color has-{$block['textColor']}-text-color";
};

if (isset($block['style']) && isset($block['style']['color'])) {
  
  if (isset($block['style']['color']['background'])) {
    $style_string .= " background-color: {$block['style']['color']['background']}";
  }

  if (isset($block['style']['color']['text'])) {
    $style_string .= " color: {$block['style']['color']['text']}";
  }
}

?>

<section class="basic-modal_wrapper <?php echo !$is_preview ? 'save' : 'edit'; ?>" id="<?php echo $block['id'] . '--modal'; ?>">
  <div class="<?php echo $class_string ?>" style="<?php echo $style_string; ?>">
    <button class="basic-modal_close" id="<?php echo $block['id'] . '--close'; ?>">Close</button>
    <InnerBlocks />
  </div>
</section>

<div class="wp-block-buttons" id="<?php echo $block['id'] . '--button'; ?>">
  <div class="wp-block-button is-style-<?php echo $button_style; ?>"><a class="wp-block-button__link"><?php echo $button_text; ?></a></div>
</div>

<?php if (!$is_preview) : ?>
<script>
  document.getElementById('<?php echo $block['id'] . '--button'; ?>').addEventListener('click', function(){
    document.getElementById('<?php echo $block['id'] . '--modal'; ?>').classList.add('show');
  });

  document.getElementById('<?php echo $block['id'] . '--close'; ?>').addEventListener('click', function(){
    document.getElementById('<?php echo $block['id'] . '--modal'; ?>').classList.remove('show');
  });
</script>
<?php endif; ?>
