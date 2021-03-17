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
    <?php if (function_exists('get_field') && get_field('service_day', 'options')) :
      $service_time = get_field('service_time', 'options');
      $service_day = get_field('service_day', 'options');
      $service_duration = get_field('service_duration', 'options');
    ?>
    <section id="main-nav_toolbar_wrapper">
      <div id="main-nav_toolbar_container">
        <ul id="main-nav_toolbar_menu">
          <li></li>
          <li>
            <h2 id="main-nav_toolbar_heading">
              
              Live in: <span id="live-countdown" class="live-countdown">
                <span id="live-countdown_days--container"><span id="live-countdown_days" class="live-countdown"></span> day(s),&nbsp;</span>
                <span id="live-countdown_hours--container"><span id="live-countdown_hours" class="live-countdown"></span> hour(s),&nbsp;</span>
                <span id="live-countdown_minutes--container"><span id="live-countdown_minutes" class="live-countdown"></span> minute(s)<span id="live-countdown_minutes--comma">,&nbsp;</span></span>
                <span id="live-countdown_seconds--container"><span id="live-countdown_seconds" class="live-countdown"></span> <span class="live-countdown_seconds">second(s)</span></span>
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
    <?php endif; ?>
    <div class="header_container">
      <div id="main-logo_wrapper">
        <figure id="main-logo_container">
          <a href="/">  
            <img id="main-logo_image" src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/03/GFC-Logo-FINAL-04_crop.png" alt="Grace Family Church Logo">
          </a>
        </figure>
      </div>
      <div id="main-logo_wrapper--mobile" role="banner">
        <figure id="main-logo_container--mobile">
          <a href="/">  
            <img id="main-logo_image--mobile" src="https://gracefamilychurcheverett.com/wp-content/uploads/2021/03/GFC-Logo-FINAL-05.jpg" alt="Grace Family Church Logo">
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

        <?php if(isset($service_day)) : ?>

        window.addEventListener('load', function(){
          const countdown = document.getElementById('live-countdown');
          const daysOfWeek = ['sunday', 'monday', 'tuesday', 'wendesday', 'thursday', 'friday', 'saturday'];
          const dayOfService = daysOfWeek.indexOf('<?php echo $service_day; ?>');
          const durationOfService = '<?php echo $service_duration; ?>';
          const timeOfServiceArray = '<?php echo $service_time; ?>'.split(':');

          const freshDate = new Date();
          const freshTime = freshDate.setHours(0,0,0,0);
          const timeUntilService = freshDate.setHours(timeOfServiceArray[0], timeOfServiceArray[1], timeOfServiceArray[2]) - freshTime;
          freshDate.setHours(0,0,0,0);

          const daysUntilService = dayOfService - freshDate.getDay() + 7;
          const theDate = new Date(freshDate.getTime() + daysUntilService * (1000 * 60 * 60 * 24) + timeUntilService);
          console.log(theDate);
          const timeTill = theDate - Date.now();
          /*
          if (timeTill < 1) {
            countdown.innerHTML = '<a href="https://gracefamily.online.church/"><strong>We are live!</strong></a>';
            return;
          }
          */
          let daysTill = timeTill / 1000 / 60 / 60 / 24;
          let hoursTill = (daysTill - Math.floor(daysTill)) * 24;
          let minutesTill = (hoursTill - Math.floor(hoursTill)) * 60
          let secondsTill = (minutesTill - Math.floor(minutesTill)) * 60;

          const timeObject = {
            days: {
              time: null,
              display: countdown.querySelector('#live-countdown_days'),
              container: countdown.querySelector('#live-countdown_days--container')
            },
            hours: {
              time: null,
              display: countdown.querySelector('#live-countdown_hours'),
              container: countdown.querySelector('#live-countdown_hours--container')
            },
            minutes: {
              time: null,
              display: countdown.querySelector('#live-countdown_minutes'),
              container: countdown.querySelector('#live-countdown_minutes--container')
            },
            seconds: {
              time: null,
              display: countdown.querySelector('#live-countdown_seconds'),
              container: countdown.querySelector('#live-countdown_seconds--container')
            }
          }

          const changeObject = {
            days: Math.max(Math.floor(daysTill), 0),
            hours: Math.max(Math.floor(hoursTill), 0),
            minutes: Math.max(Math.floor(minutesTill), 0),
            seconds: Math.max(Math.floor(secondsTill), 0)
          }

          if (changeObject.days <= 0) {
            changeObject.days = null;
          }

          if (changeObject.hours <= 0 && changeObject.days === null) {
            changeObject.hours = null;
          }

          if (changeObject.minutes <= 0 && changeObject.hours === null) {
            changeObject.minutes = null;
          }

          if (changeObject.seconds <= 0 && changeObject.minutes === null) {
            changeObject.seconds = null;
          }

          if (changeObject.seconds === null) {
            countdown.innerHTML = '<a href="https://gracefamily.online.church/"><strong>We are live!</strong></a>';
            return;
          }

          function adjustSeconds() {
            if (theDate - Date.now() < 1) {
              removeInterval(adjustSeconds);
              return;
            }

            changeObject.seconds -= 1;
            if (changeObject.seconds == -1) {
              if (changeObject.minutes !== null) {
                changeObject.seconds = 59;
                adjustMinutes();
              }
              else {
                changeObject.seconds = null;
                countdown.innerHTML = '<a href="https://gracefamily.online.church/"><strong>We are live!</strong></a>';
                removeInterval(adjustSeconds);
                return;
              }
            }
            adjustDisplay();
          }

          function adjustMinutes() {
            changeObject.minutes -= 1;
            if (changeObject.minutes === -1) {
              if (changeObject.hours !== null) {
                changeObject.minutes = 59;
                adjustHours();
              }
              else {
                changeObject.minutes = null;
              }
            }
          }

          function adjustHours() {
            changeObject.hours -= 1;
            if (changeObject.hours === -1) {
              if (changeObject.days !== null) {
                changeObject.hours = 23;
                adjustDays();
              }
              else {
                changeObject.hours = null;
              }
            }
          }

          function adjustDays() {
            changeObject.days -= 1;
            if (changeObject.days <= 0) {
              changeObject.days = null;
            }
          }

          function adjustDisplay() {
            Object.keys(changeObject).forEach(key => {
              if (changeObject[key] === null) {
                timeObject[key].container.innerText = '';
              }
              else if (changeObject !== timeObject[key].time){
                timeObject[key].time = changeObject[key];
                timeObject[key].display.innerText = changeObject[key];
              }
            })
          }

          adjustDisplay();

          setInterval(adjustSeconds, 1000);
        });
      <?php endif; ?>
      </script>
    </div>
  </header>