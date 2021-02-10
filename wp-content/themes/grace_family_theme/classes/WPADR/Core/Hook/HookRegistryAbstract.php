<?php

namespace WPADR\Core\Hook;

abstract class HookRegistryAbstract implements HookInterface {

  protected Array $registry;
  protected static $instance;

  protected function __construct() {

    $this->registry = [];
    add_action('after_setup_theme', [$this, 'register_callbacks'], 1);
  }

  abstract static function get_instance();
  abstract public function register_callbacks();

  public function add(String $hook, Callable $callback, Int $priority = 10, HookInterface $interface = null) {

    if (!array_key_exists($hook, $this->registry)) {

      $this->registry[$hook] = [['callback' => $callback, 'priority' => $priority]];
    }
    else {

      $this->registry[$hook][] = ['callback' => $callback, 'priority' => $priority];
    }
    return $interface;
  }
}