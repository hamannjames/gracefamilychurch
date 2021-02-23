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
    <section class="page-section_wrapper page-section_wrapper--bgcolor background-color--darkgrey page-section_wrapper--bgimage" style="background-image: url('https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/spacex-uj3hvdfQujI-unsplash-1-1.jpg');">
      <div class="page-section_overlay background-color--mediumgreytlight"></div>
      <div class="page-section_container">
        <div class="columns_container columns_container--2--equal align-center">
          <div class="column">
            <h2 class="page-section_title text-left" id="meeting-place">Launching March 7th<br>Sundays at 4:00pm</h2>
            <p>
              Meeting at
              Everett Lowell Foursquare
            </p>
            <p>
              5218 S 2nd Ave, Everett, WA 98203
            </p>
          </div>
          <div class="column">
            <figure class="text-center">
              <img src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/GFC-Logo-FINAL-02_crop.png" style="max-width: 350px;">
            </figure>
          </div>
        </div>

        <h3 class="text-center">Stay Connected</h3>

        <p class="text-center">
          Stay connected with Grace Family News by following us on Facebook
        </p>

        <div class="button_wrapper text-center">
          <div class="button_container button_container--color-primary">
            <a href="https://www.facebook.com/gracefamilychurcheverett/">Grace Family Facebook</a>
          </div>
        </div>
      </div>
    </section>

    <section class="page-section_wrapper">
      <div class="page-section_container page-section_container--min">
        <h2 class="page-section_title" id="ministries">Ministries</h2>
        <div class="columns_container columns_container--2--equal align-center">
          <div class="column">
            <p>
              Meeting at<br>
              Everett Lowell Foursquare
            </p>
            <p>
              5218 S 2nd Ave, Everett, WA 98203
            </p>
          </div>
          <div class="column">
            <figure>
              <img src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/GFC-Logo-FINAL-02_crop.png">
            </figure>
          </div>
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

  <?php get_template_part('footer'); ?>