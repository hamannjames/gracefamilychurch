<?php

namespace WPADR;

class Router {

  private $instance;

  static function get_instance() {
    if (!isset($instance)) {
      $instance = new self();
    }

    return $instance;
  }

  public function read_request(\WP $request) {
    
    if (empty($request->query_vars) && !$request->did_permalink) {

    }
  }

  public function route_query(\WP_Query $query) {
    if (!$query->is_admin && !$query->is_rest) {
      die(var_dump($query));
    }
  }
}