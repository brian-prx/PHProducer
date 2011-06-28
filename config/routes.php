<?php
  $routes = array(
    "/" => array(
      'controller' => 'Pages',
      'method' => 'display',
      'params' => 'home'
    ),
    "/cpanel" => array(
      'controller' => 'Pages',
      'method' => 'display',
      'params' => 'cpanel'
    ),
    "/about" => array(
      'controller' => 'Pages',
      'method' => 'display',
      'params' => 'about'
    ),
    "/contact" => array(
      'controller' => 'Pages',
      'method' => 'display',
      'params' => 'contact'
    ),
    "/overview" => array(
      'controller' => 'Pages',
      'method' => 'display',
      'params' => 'overview'
    ),
    "/create_db" => array(
      'controller' => 'Pages',
      'method' => 'display',
      'params' => 'create_db'
    )
  );