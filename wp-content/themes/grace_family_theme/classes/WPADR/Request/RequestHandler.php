<?php

namespace WPADR\Request;

class RequestHandler
{

  private \WPADR\Core\Hook\HookInterface $wp_action_handler;

  public function __construct(\WPADR\Core\Hook\HookInterface $wp_action_handler) {

    $this->wp_action_handler = $wp_action_handler;
  }

  public function fetch_action(String $request_type) {

    if($request_type === 'GET') {

      $this->wp_action_handler->add();
    }
  }
}