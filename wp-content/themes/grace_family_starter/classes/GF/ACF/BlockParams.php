<?php

namespace ACF;

class BlockParams implements ArrayAccess
{
  private $container = array();

  public function __construct(Array $settings)
  {
    if (
      !array_key_exists('name', $settings) ||
      !array_key_exists('title', $settings) ||
      !array_key_exists('category', $settings)
    ) {
      throw new InvalidArgumentException('ACF block parameters instantiated without required settings. Settings must include a name, title, and category');
    }

    foreach($settings as $setting => $value) {
      $this->offsetSet($setting, $value);
    }
  }

  public function offsetSet($offset, $value) {
    if (is_null($offset)) {
        $this->container[] = $value;
    } else {
        $this->container[$offset] = $value;
    }
  }

  public function offsetExists($offset) {
    return isset($this->container[$offset]);
  }

  public function offsetUnset($offset) {
    unset($this->container[$offset]);
  }

  public function offsetGet($offset) {
    return isset($this->container[$offset]) ? $this->container[$offset] : null;
  }
}