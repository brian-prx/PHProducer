<?php
  /**
   * 
   * Load classes
   * 
   * @param string $class
   */
  function __autoload( $class )
  {
    $class = strtolower( $class );
    if ( file_exists( 'classes/' . $class . '_class.php' ) ) include_once 'classes/' . $class . '_class.php';
    if ( file_exists( 'classes/' . $class . '.php' ) ) include_once 'classes/' . $class . '.php';
    if ( file_exists( 'controllers/' . $class . '_controller.php' ) ) include_once 'controllers/' . $class . '_controller.php';
    if ( file_exists( 'controllers/' . $class . '.php' ) ) include_once 'controllers/' . $class . '.php';
    if ( file_exists( 'interfaces/' . $class . '_interface.php' ) ) include_once 'interfaces/' . $class . '_interface.php';
    if ( file_exists( 'interfaces/' . $class . '.php' ) ) include_once 'interfaces/' . $class . '.php';
    if ( file_exists( 'modules/' . $class . '_module.php' ) ) include_once 'modules/' . $class . '_module.php';
    if ( file_exists( 'modules/' . $class . '.php' ) ) include_once 'modules/' . $class . '.php';
  }
  
  /**
   * App constants
   */
  define( 'ROOT_DIR', '/PHProducer/' );
  define( 'MOD_DIR', ROOT_DIR . 'modules' );
  define( 'CNFG_DIR', ROOT_DIR . 'config' );