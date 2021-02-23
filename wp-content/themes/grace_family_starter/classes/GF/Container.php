<?php

namespace GF;

class Container
{
  private $bindings;
  private static $instance;
  private function __construct(){}

  public static function get_instance()
  {
    if (!isset(self::$instance)) {
      $instance = new self();
    }

    return $instance;
  }

  public function bind($key, $value)
  {
    if (!isset($this->bindings[$key])) {
      $this->bindings[$key] = $value;
    }
  }

  public function resolve($key) 
  {
    if (!isset($this->bindings[$key])) {
      throw new Exception("Key: {$key} does not exist or is not set in container");
    }

    return $this->bindings[$key];
  }
}