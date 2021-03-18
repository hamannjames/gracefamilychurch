<?php ?>
<section id="main-nav_toolbar_wrapper">
  <div id="main-nav_toolbar_container">
    <ul id="main-nav_toolbar_menu">
      <li></li>
      <li>
        <h2 id="main-nav_toolbar_heading">
          
          <span id="live-countdown" class="live-countdown">Live in: 
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

<script>
window.addEventListener('load', function(){
          const countdown = document.getElementById('live-countdown');
          const daysOfWeek = ['sunday', 'monday', 'tuesday', 'wendesday', 'thursday', 'friday', 'saturday'];
          const dayOfService = daysOfWeek.indexOf('<?php echo $args['service_day']; ?>');
          const durationOfService = '<?php echo $args['service_duration']; ?>' * 60 * 60 * 1000;
          const timeOfServiceArray = '<?php echo $args['service_time']; ?>'.split(':');

          const freshDate = new Date();
          const freshTime = freshDate.setHours(0,0,0,0);
          const timeUntilService = freshDate.setHours(timeOfServiceArray[0], timeOfServiceArray[1], timeOfServiceArray[2]) - freshTime;
          freshDate.setHours(0,0,0,0);

          let daysUntilService = dayOfService - freshDate.getDay();
          daysUntilService = daysUntilService < 0 ? daysUntilService + 7 : daysUntilService;

          let theDate = new Date(freshDate.getTime() + daysUntilService * (1000 * 60 * 60 * 24) + timeUntilService);
          console.log(theDate);
          let timeTill = theDate - Date.now();
          
          function displayMessage() {
            if (timeTill < 1) {
            if ((Math.abs(timeTill) < durationOfService)) {
              <?php if (isset($args['live_link'])) : ?>
              countdown.innerHTML = 'We are Live! <a style="font-size: inherit;" href="<?php echo $args['live_link']; ?>"><strong>Watch Here</strong></a>';
              <?php else : ?>
                countdown.innerHTML = '<strong>We are live!</strong>';
              <?php endif; ?>
              return true;
            }
            else {
              theDate = new Date(theDate.getTime() + (1000 * 60 * 60 * 24 * 7));
              timeTill = theDate - Date.now();
            }
            }
          }

          if (displayMessage()) {
            return;
          };
          
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
            displayMessage();
            return;
          }

          function adjustSeconds() {

            changeObject.seconds -= 1;
            if (changeObject.seconds == -1) {
              if (changeObject.minutes !== null) {
                changeObject.seconds = 59;
                adjustMinutes();
              }
              else {
                changeObject.seconds = null;
                timeTill = theDate - Date.now();
                clearInterval(adjustSeconds);
                displayMessage();
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
</script>