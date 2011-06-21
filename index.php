<?php
  /**
   * Load configuration files
   */
  include_once 'config/core.php';
  
  /**
   * Dispatch page request
   */
  try {
    $Dispatcher = new Dispatcher($_SERVER['REQUEST_URI']);
    $Dispatcher->render();
  } catch (Exception $e) {
    throw $e;
  }
?>