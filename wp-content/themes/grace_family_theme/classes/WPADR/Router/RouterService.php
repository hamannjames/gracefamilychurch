<?php

namespace WPADR\Router;

class RouterService implements RouterInterface
{

  static public function add_route(){}

  static public function route(\WP_Query $query) {

    $action_profile = '\\WPADR\\Action\\';
  
    if (!is_admin() && !self::is_rest()) {

      $action_profile .= $_SERVER['REQUEST_METHOD'] === 'GET' ? 'Read\\' : 'Write\\';
      
      if ($query->is_page) {

        $action_profile .= $query->query_vars['page_id'] === get_option('page_on_front') ? 'Home' : 'Page';
      }

      \WPADR\Site::get_instance()->set_action(new $action_profile);
    }
  }

  static public function is_rest() {

    $prefix = rest_get_url_prefix( );
    if (defined('REST_REQUEST') && REST_REQUEST || 
      isset($_GET['rest_route']) && strpos( trim( $_GET['rest_route'], '\\/' ), $prefix , 0 ) === 0) {

      return true;
    }

    global $wp_rewrite;
    if ($wp_rewrite === null) {
      $wp_rewrite = new WP_Rewrite();
    }

    $rest_url = wp_parse_url( trailingslashit( rest_url( ) ) );
    $current_url = wp_parse_url( add_query_arg( array( ) ) );
    return strpos( $current_url['path'], $rest_url['path'], 0 ) === 0;
  }
}