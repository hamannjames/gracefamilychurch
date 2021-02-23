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
  <?php wp_head(); ?>
</head>
<body class="home">
  <header>
    <nav class="main-nav_wrapper">
      <section id="main-nav_toolbar_wrapper">
        <div id="main-nav_toolbar_container">
          <ul id="main-nav_toolbar_menu">
            <li></li>
            <li>
              <h2 id="main-nav_toolbar_heading">
                Live in: <span id="live-countdown" class="live-countdown">
                  <span id="live-countdown_days" class="live-countdown"></span> days,&nbsp;
                  <span id="live-countdown_hours" class="live-countdown"></span> hours,&nbsp;
                  <span id="live-countdown_minutes" class="live-countdown"></span> minutes,&nbsp;
                  <span id="live-countdown_seconds" class="live-countdown"></span> seconds
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
      <ul class="main-nav_container">
        <li><a href="#meeting-place">About</a></li>
        <li><a href="#ministries">Ministries</a></li>
        <li><a href="#sermons">Sermons</a></li>
        <li><a href="#sermons">Groups</a></li>
        <li id="main-logo_wrapper" role="banner">
            <figure id="main-logo_container">
              <a href="/"><img src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/GFC-Logo-FINAL-04_crop.png"></a>
            </figure>

            <figure id="main-logo_container--mobile">
              <a href="/"><img src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/02/GFC-Logo-FINAL-05_crop.png"></a>
            </figure>
        </li>
        <li><a href="#prayer">Watch</a></li>
        <li><a href="#dream">Dream Team</a></li>
        <li>
          <a href="#contact">Contact</a>
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
  </header>