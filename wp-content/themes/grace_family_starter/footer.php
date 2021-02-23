<?php ?>
<footer id="footer_wrapper">
    <div id="footer_container">
      <ul id="footer_menu">
        <li>
          <a href="mailto:info@gracefamilychurcheverett.com">info@gracefamilychurcheverett.com</a>
        </li>
        <li>
          <a href="https://www.facebook.com/gracefamilychurcheverett/">
            <figure>
              <img src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/f_logo_RGB-Blue_58.png" alt="Facebook logo">
            </figure>
          </a>
        </li>
      </ul>
    </div>
    <button id="back-to-top">
      &#9652;<br>
    </button>
  </footer>
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
  </script>
  <?php wp_footer(); ?>
</body>
</html>