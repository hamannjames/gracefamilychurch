<?php

$post_type = get_field('post_type');
$num_posts = get_field('number_of_posts');
$posts_per_row = get_field('posts_per_row');

$class_string = (isset($block['className']) ? $block['className'] : '') . ' latest-posts_post-type_wrapper latest-posts_post-type_wrapper--' . $post_type;
$style_string = '';

$posts = new WP_Query([
  'post_type' => $post_type,
  'order' => 'ASC',
  'orderby' => 'menu_order',
  'post_count' => $num_posts
]);

if ($posts->have_posts()) :
  global $post;
  echo "<div class='{$class_string}'>";
  while($posts->have_posts()) : $posts->the_post();
    if ($is_preview) : echo '<h3>' . the_title() . '</h3>';
      else :
?>
  <div class="latest-posts_post-type_post_wrapper per-row-<?php echo $posts_per_row; ?>">
    <div class="latest-posts_post-type_post_container">
      <div class="latest-posts_post-type_post">
        <?php if (has_post_thumbnail()) : ?>
        <figure class="latest-posts_post-type_post_image">

          <?php echo get_the_post_thumbnail($post->id, 'large'); ?>
        </figure>
        <?php endif; ?>
        <h3 class="latest-posts_post-type_post_title text-center"><?php the_title(); ?></h3>
        <p class="latest-posts_post-type_post_title"><?php the_content(); ?>
      </div>
    </div>
  </div>
<?php
endif;
endwhile;
echo '</div>';
wp_reset_postdata();
else : echo '<p>No posts found</p>';
endif;