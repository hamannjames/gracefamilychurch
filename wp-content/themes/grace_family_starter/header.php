<?php ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Grace Family Church of Everett</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
  <?php wp_head(); ?>
</head>
<body class="home">
  <header class="header_wrapper" role="banner">
    <section id="main-nav_toolbar_wrapper">
      <div id="main-nav_toolbar_container">
        <ul id="main-nav_toolbar_menu">
          <li></li>
          <li>
            <h2 id="main-nav_toolbar_heading">
              Live in: <span id="live-countdown" class="live-countdown">
                <span id="live-countdown_days" class="live-countdown"></span> days,&nbsp;
                <span id="live-countdown_hours" class="live-countdown"></span> hours,&nbsp;
                <span id="live-countdown_minutes" class="live-countdown"></span> minutes<span id="live-countdown_minutes--comma">,&nbsp;</span>
                <span id="live-countdown_seconds" class="live-countdown"></span> <span class="live-countdown_seconds">seconds</span>
              </span>
            </h2>
          </li>
          <li id="main-nav_toobar_social">
            <figure id="main-nav_toolbar_social_icon--facebook">
              <a href="https://www.facebook.com/gracefamilychurcheverett/">
                <img src="">
              </a>
            </figure>
          </li>
        </ul>
      </div>
    </section>
    <div class="header_container">
      <div id="main-logo_wrapper">
        <figure id="main-logo_container">
          <a href="/">  
            <img id="main-logo_image" src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/GFC-Logo-FINAL-04_crop.png" alt="Grace Family Church Logo">
          </a>
        </figure>
      </div>
      <div id="main-logo_wrapper--mobile" role="banner">
        <figure id="main-logo_container--mobile">
          <a href="/">  
            <img id="main-logo_image--mobile" src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/GFC-Logo-FINAL-05-1.jpg" alt="Grace Family Church Logo">
          </a>
        </figure>
      </div>

      <?php wp_nav_menu(array(
        'menu' => 'Main Menu',
        'menu_class' => 'main-nav_container',
        'container' => 'nav',
        'container_class' => 'main-nav_wrapper'
      )); ?>

      <div id="main-nav_aux--mobile">
        <div id="main-nav_give--wrapper">
          <a id="main-nav_give" href="/give">Give</a>
        </div>
        <button id="main-nav_toggle">Menu</button>
      </div>

      <div class="main-nav_wrapper--mobile">
        <button id="main-nav_toggle--mobile">Close</button>
        <?php wp_nav_menu(array(
        'menu' => 'Main Menu',
        'menu_class' => 'main-nav_container--mobile',
        'container' => 'nav'
      )); ?>
      </div>

      <script>
        window.addEventListener('scroll', debounce(function(){
          if (window.pageYOffset > 0) {
            document.body.classList.add('scrolled')
          }
          else {  
            document.body.classList.remove('scrolled');
          }
        }, 100, true));

        window.addEventListener('load', function(){
          const countdown = document.getElementById('live-countdown');
          const theDate = new Date("March 7, 2021 16:30:00");
          const timeTill = theDate - Date.now();
          if (timeTill < 1) {
            return;
          }
          let daysTill = timeTill / 1000 / 60 / 60 / 24;
          let hoursTill = (daysTill - Math.floor(daysTill)) * 24;
          let minutesTill = (hoursTill - Math.floor(hoursTill)) * 60
          let secondsTill = (minutesTill - Math.floor(minutesTill)) * 60;

          const timeObject = {
            days: {
              time: null,
              display:countdown.querySelector('#live-countdown_days')
            },
            hours: {
              time: null,
              display:countdown.querySelector('#live-countdown_hours')
            },
            minutes: {
              time: null,
              display:countdown.querySelector('#live-countdown_minutes')
            },
            seconds: {
              time: null,
              display: countdown.querySelector('#live-countdown_seconds')
            }
          }

          const changeObject = {
            days: Math.floor(daysTill),
            hours: Math.floor(hoursTill),
            minutes: Math.floor(minutesTill),
            seconds: Math.floor(secondsTill)
          }

          function adjustSeconds() {
            if (theDate - Date.now() < 1) {
              removeInterval(adjustSeconds);
              return;
            }

            changeObject.seconds -= 1;

            if (changeObject.seconds == -1) {
              changeObject.seconds = 59;
              adjustMinutes();
            }
            adjustDisplay();
          }

          function adjustMinutes() {
            changeObject.minutes -= 1;
            if (changeObject.minutes === -1) {
              changeObject.minutes = 59;
              adjustHours();
            }
          }

          function adjustHours() {
            changeObject.hours -= 1;
            if (changeObject.hours === -1) {
              changeObject.hours = 23;
              adjustDays();
            }
          }

          function adjustDays() {
            changeObject.days = Math.max(0, changeObject.days - 1);
          }

          function adjustDisplay() {
            Object.keys(changeObject).forEach(key => {
              if (changeObject[key] !== timeObject[key].time) {
                timeObject[key].time = changeObject[key];
                timeObject[key].display.innerText = changeObject[key];
              }
            })
          }

          adjustDisplay();

          setInterval(adjustSeconds, 1000);
        });
      </script>
    </div>
  </header>