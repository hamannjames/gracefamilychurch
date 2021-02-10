<?php

namespace WPADR\Core\Query;

class QueryHandler {

  static function add_rest_check(\WP_Query $query_obj) {

    if (!isset($query_obj->is_rest)) {
      $query_obj->is_rest = self::is_rest();
    }

    return $query_obj;
  }

  static function is_rest() {

    $prefix = rest_get_url_prefix();

    if (defined('REST_REQUEST') 
      && REST_REQUEST 
      || isset($_GET['rest_route']) 
      && strpos( trim( $_GET['rest_route'], '\\/' ), $prefix , 0 ) === 0) {
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