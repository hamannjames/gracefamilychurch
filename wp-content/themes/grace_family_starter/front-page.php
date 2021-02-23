<?php get_template_part('header'); ?>

  <section class="hero">
    <h1 class="hero-title">We are building a place to belong in Everett</h1>
    <div class="hero-slider_wrapper">
      <div class="hero-slider_container">
        <div class="hero-slider_slide" style="transform: translateX(0)" data-slide='1'>
          <figure class="hero-slider_image">
            <img src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/edwin-andrade-6liebVeAfrY-unsplash.jpg">
          </figure>
          <div class="hero-slider_content">
            <p>
              A place of grace
            </p>
          </div>
        </div>

        <div class="hero-slider_slide" style="transform: translateX(100%)" data-slide='2'>
          <figure class="hero-slider_image">
            <img src="">
          </figure>
          <div class="hero-slider_content">
            <p></p>
          </div>
        </div>

        <div class="hero-slider_slide" style="transform: translateX(200%)" data-slide='3'>
          <figure class="hero-slider_image">
            <img src="">
          </figure>
          <div class="hero-slider_content">
            <p></p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    window.addEventListener('load', function(){
      const data = [
        {
          src: 'https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/GFC-Logo-FINAL-04_crop.png',
          text: 'A place of grace'
        },
        {
          src: 'https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/jack-sharp-OptEsFuZwoQ-unsplash.jpg',
          text: 'A place of prayer'
        },
        {
          src: 'https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/amaury-gutierrez-rzmQOng8h8I-unsplash.jpg',
          text: 'A place of worship',
        }
      ]

      let pointer = 0;

      const slider = document.querySelector('.hero-slider_container');

      function insertData(data, node) {
        node.querySelector('img').src = data.src;
        node.querySelector('.hero-slider_content p').innerText = data.text;
      }

      function changeClass() {
        slider.children[1].style.transform = 'translateX(0)';
        slider.children[0].style.transform = 'translateX(-100%)';

        for (let i = 2; i < slider.children.length; i++) {
          slider.children[i].style.transform = `translateX(${i * 100 - 100}%)`;
        }
      }

      function swapChildren() {
        let node = slider.children[0];
        node.style.transform = `translateX(${(slider.children.length - 1) * 100}%)`;
        slider.insertBefore(node, slider.children[slider.children.length - 1].nextSibling);
      }

      insertData(data[1], slider.children[1]);
      insertData(data[2], slider.children[2]);
      
      // setInterval(function(){
      //   changeClass();
      //   setTimeout(function(){
      //     swapChildren();
      //   }, 1000);
      // }, 4000);
      
    })
  </script>
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