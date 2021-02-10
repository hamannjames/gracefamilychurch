<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Grace Family Church of Everett</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo(get_template_directory_uri() . '/assets/css/style.css'); ?>">
  <script>
    const throttle = (func, limit, immediate) => {
      let inThrottle
      return function() {
        const args = arguments
        const context = this
        if (immediate) {
          func.apply(context, args);
        }
        immediate = false;
        if (!inThrottle) {
          func.apply(context, args)
          inThrottle = true
          setTimeout(() => inThrottle = false, limit)
        }
      }
    }

    const debounce = (func, delay, immediate = false) => {
      let inDebounce
      let wantsImmediate = immediate;
      return function() {
        const context = this
        const args = arguments
        if (immediate) {
          func.apply(context, args);
        }
        immediate = false;
        clearTimeout(inDebounce)
        inDebounce = setTimeout(() => {
          func.apply(context, args);
          if (wantsImmediate) {
            immediate = true;
          }
        }, delay)
      }
    }
  </script>
</head>
<body class="home">
  <header>
    <nav class="main-nav_wrapper">
      <ul class="main-nav_container">
        <li><a href="#meeting-place">Meeting Place</a></li>
        <li><a href="#sermons">Sermons</a></li>
        <li id="main-logo_wrapper" role="banner">
          <figure id="main-logo_container">
            <img src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/GFC-Logo-FINAL-04_crop.png">
          </figure>

          <figure id="main-logo_container--mobile">
            <img src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/GFC-Logo-FINAL-05_crop.png">
          </figure>
        </li>
        <li>
          <a href="#contact">Contact Us</a>
        </li>
        <li id="nav-email">
          <a href="#give">Give</a>
        </li>
      </ul>
    </nav>
    <script>
      window.addEventListener('scroll', debounce(function(){
        if (window.pageYOffset > 0) {
          document.body.classList.add('scrolled')
        }
        else {  
          document.body.classList.remove('scrolled');
        }
      }, 100, true));
    </script>
  </header>

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
              A place of worship
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
          text: 'A place of worship'
        },
        {
          src: 'https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/jack-sharp-OptEsFuZwoQ-unsplash.jpg',
          text: 'A place of prayer'
        },
        {
          src: 'https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/amaury-gutierrez-rzmQOng8h8I-unsplash.jpg',
          text: 'A place of grace',
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

      /*
      setInterval(function(){
        changeClass();
        setTimeout(function(){
          swapChildren();
        }, 1000);
      }, 4000);
      */
      
    })
  </script>
  <article class="page-content_wrapper">
    <section class="page-section_wrapper">
      <div class="page-section_container page-section_container--min">
        <h2 class="page-section_title" id="meeting-place">New building and meeting time!</h2>
        <p>
          We are so excited for this next season. Starting on March 7th, we will be meeting on Sundays at 4:00 PM:
        </p>
        <p class="text-center">
          Foursquare Lowell<br>
          5218 S 2nd Ave.<br>
          Everett, WA 98203 
        </p>
        <div>
          <a href="https://www.google.com/maps/place/5218+S+2nd+Ave,+Everett,+WA+98203/@47.9494214,-122.1953383,18.23z/data=!4m13!1m7!3m6!1s0x5490009c0c8bffff:0x2cf1b800cf1dacf5!2s5218+S+2nd+Ave,+Everett,+WA+98203!3b1!8m2!3d47.9495403!4d-122.1949011!3m4!1s0x5490009c0c8bffff:0x2cf1b800cf1dacf5!8m2!3d47.9495403!4d-122.1949011" target="_blank">
            <figure class="text-center">
              <img src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/Screen-Shot-2021-02-09-at-3.06.28-PM-2.png" alt="Google map showing Fourswuare Lowell">
            </figure>
          </a>
        </div>
      </div>
    </section>

    <section class="page-section_wrapper page-section_wrapper--bgcolor background-color--darkgrey">
      <div class="page-section_container">
        <h2 class="page-section_title" id="sermons">Sermons</h2>
        <p>
          New sermons posted every week. Check back for ongoing series and subscribe to be alerted about new postings.
        </p>
        <div class="button_wrapper text-center">
          <div class="button_container button_container--color-primary">
            <a href="#">Sign up for alerts</a>
          </div>
        </div>
        <div class="columns_container columns_container--2--equal">
          <div class="column">
            <h3 class="text-center">
              2/7/21 - Seeds
            </h3>
            <div class="iframe_container iframe_container--16-9">
              <iframe src="https://www.youtube.com/embed/wu8-K8Bts-Q" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
          <div class="column">
            <h3 class="text-center">
              1/31/21 - Finding Hope
            </h3>
            <div class="iframe_container iframe_container--16-9">
              <iframe src="https://www.youtube.com/embed/3DcZcJsfwTk" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="page-section_wrapper">
      <div class="page-section_container">
        <h2 class="page-section_title" id="leadership">Leadership</h2>
        <div class="columns_container columns_container--2--equal">
          <div class="column">
            <div class="text-center">
              <figure class="circle-image width-160--px">
                <img src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/131986637_10158574831569303_4922865310002609159_o.jpg" alt="Dan Hamann">
              </figure>
            </div>
            <h3 class="text-center">Dan Hamann</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer cursus felis a elementum tincidunt. Phasellus odio ligula, tempor eu sodales at, auctor in est.
            </p>
          </div>
          <div class="column">
            <div class="text-center">
              <figure class="circle-image width-160--px">
                <img src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/38703209_10156823961402018_2000693730385854464_n.jpg" alt="Yvonne Grant">
              </figure>
            </div>
            <h3 class="text-center">Yvonne Grant</h3>
            <p>
              In 1998, Yvonne Grant established Christ the King Ministries, a local/international evangelistic ministry that carries the message of deliverance through Jesus Christ.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="page-section_wrapper page-section_wrapper--bgcolor background-color--tertiary">
      <div class="page-section_container page-section_container--min">
        <h2 class="page-section_title" id="contact">Contact Us</h2>
        
      </div>
    </section>

    <section class="page-section_wrapper">
      <div class="page-section_container page-section_container--min">
        <h2 class="page-section_title" id="give">Give</h2>
        <p>
          Thank you so much for supporting our mission! You can give via the button below.
        </p>
        <p>
          <strong>Please leave a note that this donation is for Grace Family Church of Everett.</strong>
        </p>
        <div style="width: 120px; height: 60px; margin-left: auto; margin-right: auto;">
          <iframe style="border: none;" class="_3HLqS" title="htmlComp-iframe" name="htmlComp-iframe" width="100%" height="100%" data-src="" src="https://www-christthekingministries-org.filesusr.com/html/23c817_c789969bee08c615b53a67568e7aa587.html"></iframe>
        </div>
      </div>
    </section>
  </article>

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
  </footer>
  <script>
    window.addEventListener('load', function(){
      document.querySelectorAll('.main-nav_container a').forEach(function(el){
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
      })
    })
  </script>
</body>
</html>