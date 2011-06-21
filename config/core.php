<?php
  /**
   * 
   * Load classes
   * 
   * @param string $class
   */
  function __autoload($class)
  {
    $class = strtolower($class);
    if (file_exists('classes/' . $class . '_class.php')) include_once 'classes/' . $class . '_class.php';
    if (file_exists('controllers/' . $class . '_controller.php')) include_once 'controllers/' . $class . '_controller.php';
    if (file_exists('interfaces/' . $class . '_interface.php')) include_once 'interfaces/' . $class . '_interface.php';
  }
  
  /**
   * App constants
   */
  define('ROOT_DIR', '/PHProducer');
  define('MOD_DIR', '/modules');