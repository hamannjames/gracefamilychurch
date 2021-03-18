<?php

namespace WPADR\Router;

interface RouterInterface
{
  static public function add_route();
  static public function route(\WP_Query $query);
}