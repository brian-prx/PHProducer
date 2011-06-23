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
    )
  );