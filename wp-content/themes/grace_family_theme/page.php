<?php 
get_template_part('header'); 

if (have_posts()) :
  while (have_posts()) : the_post();
?>

<section class="page-hero" style="background-image: url('<?php echo get_field("hero_background"); ?>')">
  <div class="page-hero-title"><h1><?php the_title(); ?></h1></div>
</section>
  
<article class="page-content_wrapper">
  <?php
   
        the_content();
    
  ?>
</article>

<?php
endwhile;
endif;
get_template_part('footer'); 
?>