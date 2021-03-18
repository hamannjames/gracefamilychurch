<?php

namespace WPADR\Core\Hook;

class ActionRegistry extends HookRegistryAbstract {
  use \WPADR\Traits\SingletonTrait;

  public function register_callbacks() {

    foreach($this->registry as $hook=>$cb_array) {

      foreach($cb_array as $cb) {

        add_action($hook, $cb['callback'], $cb['priority']);
      }
    }
  }
}