<?php

namespace ACF;

class BlockService
{
  private $registry = [];

  public function register($params)
  {
    try {
      $block = new BlockParams($params);
    }
    catch(Exception $e) {
      trigger_error($e->getMessage());
      return;
    }

    if ($params->offsetGet('override_wp')) {

      if ($params->offsetGet('render_callback')) {
        $this->wrap_render_callback($params);
      }
      else {
        $this->wrap_render_template($params);
      }
    }

    $this->registry[] = $params;
  }

  private function wrap_render_callback($params) {

    $callback = $params->offsetGet('render_callback');

    $params->offsetSet('render_callback', function($block, $content = '', $is_preview = false, $post_id = 0) use ($callback){

      // Create id attribute allowing for custom "anchor" value.
    $id = 'testimonial-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" and "align" values.
    $className = 'testimonial';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    if( !empty($block['align']) ) {
        $className .= ' align' . $block['align'];
    }
    });
  }
}