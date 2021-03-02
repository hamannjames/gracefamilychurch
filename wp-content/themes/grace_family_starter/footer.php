<?php ?>
<footer id="footer_wrapper" style="background-image: url('https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/gift-habeshaw-QDP10NbwcyE-unsplash-scaled.jpg');">
  <?php
  $footer_post = get_post(142);
  echo apply_filters('the_content', $footer_post->post_content);
  ?>
<!--
  <div id="footer_container">
    <div id="footer-social_wrapper">
      <figure id="footer-social_facebook">
        <a id="footer-social_fb" href="https://www.facebook.com/gracefamilychurcheverett/">
          <img src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/f_logo_RGB-White_1024.png" alt="facebook icon">
        </a>
      </figure>
      <figure id="footer-social_instagram">
        <a id="footer-social_fb" href="">
          <img src="" alt="instagram icon">
        </a>
      </figure>
      <figure id="footer-social_youtube">
        <a id="footer-social_fb" href="https://www.youtube.com/channel/UC9YrTQSSWMOiN1tGMjD3i5A">
          <img src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/yt_icon_mono_dark.png" alt="YouTube icon">
        </a>
      </figure>
    </div>
  </div>
-->
</footer>
<button id="back-to-top">&#8593;</button>
<script>
  window.addEventListener('load', function(){
    // document.querySelectorAll('.main-nav_container a').forEach(function(el){
    //   if (el.getAttribute('href').charAt(0) === '#') {
    //     let node = document.querySelector(el.getAttribute('href'));
    //     let offset = (node.getBoundingClientRect().top  + window.pageYOffset - 60).toFixed();

    //     function changeFocusAfterScroll() {
    //       if (window.pageYOffset == offset || window.innerHeight + window.scrollY >= document.body.offsetHeight) {
    //         node.focus();
    //         window.removeEventListener('scroll', changeFocusAfterScroll);
    //       }
    //     }

    //     if (!node.getAttribute('tabindex')) {
    //       node.setAttribute('tabindex', -1);
    //     }

    //     el.addEventListener('click', function(e){
    //       e.preventDefault();
    //       if (offset >= document.body.offsetHeight - window.innerHeight && window.innerHeight + window.scrollY >= document.body.offsetHeight) {
    //         node.focus();
    //         return;
    //       }
    //       window.addEventListener('scroll', changeFocusAfterScroll);
    //       window.scroll({
    //         top: offset,
    //         behavior: 'smooth'
    //       });
    //     })
    //   }
    // });

    document.getElementById('back-to-top').addEventListener('click', function(){
      window.scroll({
        top: 0,
        behavior: 'smooth'
      })
    })
  });

  document.getElementById('main-nav_toggle').addEventListener('click', function(){
    document.querySelector('.main-nav_wrapper--mobile').classList.add('show');
  });

  document.getElementById('main-nav_toggle--mobile').addEventListener('click', function(){
    document.querySelector('.main-nav_wrapper--mobile').classList.remove('show');
  });
</script>
<?php wp_footer(); ?>
</body>
</html>