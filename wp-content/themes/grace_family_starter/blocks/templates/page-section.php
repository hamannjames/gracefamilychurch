<?php

$bg_image = get_field('bg_image');
$bg_overlay = get_field('bg_overlay');
$min = get_field('min');

$class_string = (isset($block['className']) ? $block['className'] : '') . ' page-section_wrapper';
$style_string = '';

if ($bg_image || isset($block['backgroundColor'])) {
  $class_string .= ' has-background';
};

if ($bg_image) {
  $class_string .= ' page-section_wrapper--bgimage';
  $style_string .= "background-image: url({$bg_image});";
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

<section class="<?php echo $class_string ?>" style="<?php echo $style_string; ?>">
<?php if($is_preview){echo '<h3>Page Section</h3>';}?>
<?php if ($bg_overlay) : ?>
  <div class="page-section_overlay" style="<?php if ($bg_overlay){echo 'background-color:' . $bg_overlay;} ?>"></div>
<?php endif; ?>
  <div class="page-section_container<?php if ($min) { echo ' page-section_container--min'; } ?>">
    <InnerBlocks />
  </div>
</section>