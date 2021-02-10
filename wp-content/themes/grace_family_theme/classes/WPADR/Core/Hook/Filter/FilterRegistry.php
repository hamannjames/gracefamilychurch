<?php

namespace WPADR\Core\Hook\Filter;

class FilterRegistry extends \WPADR\Core\Hook\HookRegistryAbstract {
  use \WPADR\Traits\SingletonTrait;

  public function register_callbacks() {

    foreach($this->registry as $hook=>$cb_array) {

      foreach($cb_array as $cb) {

        add_filter($hook, $cb['callback'], $cb[$priority]);
      }
    }
  }
}