<?php

function wpadr_autoload ($class_name) {
  if (0 !== strpos($class_name, 'WPADR')) {
    return;
  }

  $file_path = get_template_directory() . '/classes/' . str_replace(['\\', '_'], '/', $class_name) . '.php';

  if (file_exists($file_path)) {
    require($file_path);
  }
}

spl_autoload_register('wpadr_autoload');

$grace_site = WPADR\Site::get_instance();
$grace_site->init();