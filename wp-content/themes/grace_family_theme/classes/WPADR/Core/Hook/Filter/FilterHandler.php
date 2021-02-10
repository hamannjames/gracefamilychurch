<?php

namespace WPADR\Core\Hook\Filter;

class FilterHandler implements \WPADR\Core\Hook\HookInterface {
  
  public function add(String $hook, Callable $callback, Int $priority = 10, HookInterface $interface = null) {

    FilterRegistry::get_instance()->add($hook, $callback, $priority);
  }
}