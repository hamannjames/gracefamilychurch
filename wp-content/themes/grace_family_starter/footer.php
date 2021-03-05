<?php ?>
<footer id="footer_wrapper" style="background-image: url('https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/gift-habeshaw-QDP10NbwcyE-unsplash-scaled.jpg');">
  <?php
  $footer_post = get_post(47);
  echo apply_filters('the_content', $footer_post->post_content);
  ?>
</footer>
<button id="back-to-top">&#8593;</button>
<script>
  window.addEventListener('load', function(){

    document.querySelectorAll('a[href*="#"]').forEach(function(el){
      console.log(el.getAttribute('href'));
      if (el.getAttribute('href').charAt(0) === '#') {
        if (el.getAttribute('href') === '#contact') {
          el.AddEventListener('click', function(e){
            e.preventDefault();
            document.getElementById('block_603ed575d7b16--modal').classList.add('show');
          })
          return;
        }
        let node = document.querySelector(el.getAttribute('href'));
        let offset = (node.getBoundingClientRect().top  + window.pageYOffset - 60).toFixed();

        function changeFocusAfterScroll() {
          if (window.pageYOffset == offset || window.innerHeight + window.scrollY >= document.body.offsetHeight) {
            node.focus();
            window.removeEventListener('scroll', changeFocusAfterScroll);
          }
        }

        if (!node.getAttribute('tabindex')) {
          node.setAttribute('tabindex', -1);
        }

        el.addEventListener('click', function(e){
          e.preventDefault();
          if (offset >= document.body.offsetHeight - window.innerHeight && window.innerHeight + window.scrollY >= document.body.offsetHeight) {
            node.focus();
            return;
          }
          window.addEventListener('scroll', changeFocusAfterScroll);
          window.scroll({
            top: offset,
            behavior: 'smooth'
          });
        })
      }
    });

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