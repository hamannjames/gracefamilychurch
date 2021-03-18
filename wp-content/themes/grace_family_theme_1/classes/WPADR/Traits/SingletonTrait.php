<?php

namespace WPADR\Traits;

trait SingletonTrait {

  protected static $instance;

  static function get_instance() {
    if (!self::$instance) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  protected function __clone() { }
  protected function __sleep() { }
  protected function __wakeup() { }
}