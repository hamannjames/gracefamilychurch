<?php

namespace WPADR\Core\Hook;

interface HookInterface {

  public function add(String $hook, Callable $callback, Int $priority = 10, HookInterface $interface = null);
}