<?php get_template_part('header'); ?>

  <section class="hero" style="background-image: url('<?php echo get_field("hero_background"); ?>')">
    <h1 class="hero-title">At Grace Family Church we believe that we are outrageously loved by God</h1>
  </section>
  <article class="page-content_wrapper">
    <?php
      if(have_posts()) {
        while(have_posts()) {
          the_post();
          the_content();
        }
      }
    ?>
  </article>

  <?php get_template_part('footer'); ?>