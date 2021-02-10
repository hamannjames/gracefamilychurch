<?php

namespace WPADR\Core\Hook\Action;

class ActionHandler implements \WPADR\Core\Hook\HookInterface {
  
  public function add(String $hook, Callable $callback, Int $priority = 10, HookInterface $interface = null) {

    ActionRegistry::get_instance()->add($hook, $callback, $priority, $interface);
  }
}