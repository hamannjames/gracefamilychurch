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
      $args = [
        'service_time' => get_field('service_time', 'options'),
        'service_day' => get_field('service_day', 'options'),
        'service_duration' => get_field('service_duration', 'options'),
        'live_link' => get_field('live_link', 'options')
      ];

      get_template_part('template-parts/toolbar', 'countdown', $args);
    endif;
    ?>
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
      </script>
    </div>
  </header>