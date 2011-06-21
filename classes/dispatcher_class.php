<?php
  class Dispatcher
  {
    var $url = null;
    
    var $actions = array();
    
    function __construct( $url )
    {
      $this->url = $url;
    }
    
    function render()
    {
      if ( file_exists( ROOT_DIR . CNFG_DIR . '/routes.php' ) )
        include_once ROOT_DIR . CNFG_DIR . '/routes.php';
      try
      {
        $this->actions = Router::parse_url( $this->url );
      }
      catch( Exception $e )
      {
        
      }
    }
  }
?>