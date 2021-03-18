<?php

/*
Plugin Name: Grace Family Church Settings
*/

if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title' => 'GFC General Settings',
    'menu_slug' => 'gfc-general-settings'
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'GFC Branding Settings',
    'menu_title' => 'Branding',
    'parent_slug' => 'gfc-general-settings'
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'GFC Social Settings',
    'menu_title' => 'Social',
    'parent_slug' => 'gfc-general-settings'
  ));

  acf_add_options_sub_page(array(
    'page_title' => 'GFC Service Settings',
    'menu_title' => 'Service',
    'parent_slug' => 'gfc-general-settings'
  ));
}
 
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    // return
    return $path;
    
}