<?php

namespace WPADR;

class Site
{

  private static Site $instance;
  private Core\Hook\HookInterface $hook_action_handler;
  private Action\ActionInterface $action;

  static function get_instance() {

    if (!isset(self::$instance)) {
      self::$instance = new self(new Core\Hook\ActionHandler());
    }

    return self::$instance;
  }

  private function __construct(Core\Hook\HookInterface $hook_action_handler) {
    $this->hook_action_handler = $hook_action_handler;
  }

  public function die_context($context) {
    die(var_dump($context));
  }

  public function init() {
    
    $this->hook_action_handler->add('parse_query', '\\WPADR\\Router\\RouterService::route');
  }

  public function set_action($action) {

    $this->action = $action;
  }

  public function get_action() {

    return $this->action;
  }
}