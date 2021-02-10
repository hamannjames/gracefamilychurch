<?php

namespace WPADR\Core\Hook;

class ActionHandler implements HookInterface {
  
  public function add(String $hook, Callable $callback, Int $priority = 10, HookInterface $interface = null) {

    ActionRegistry::get_instance()->add($hook, $callback, $priority);
  }
}