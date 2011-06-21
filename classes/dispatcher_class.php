<?php
/**
 * 
 * Dispatcher 
 * 
 * Handle page requests
 * 
 * @author btl
 *
 */
  class Dispatcher
  {
    var $url = null;
    
    var $actions = array();
    
    var $Router = null;
    
    /**
     * 
     * Dispatcher constructor
     * 
     * @param string $url
     */
    function __construct( $url )
    {
      $this->url = $url;
      
      $this->Router = new Router();
    }
    
    /**
     * 
     * Execute page request
     * 
     */
    function dispatch()
    {
      if ( file_exists( ROOT_DIR . CNFG_DIR . '/routes.php' ) )
        include_once ROOT_DIR . CNFG_DIR . '/routes.php';
      try
      {
        $this->actions = $this->Router->parse( $this->url );
        
        $Debugger = new Debugger();
        $Debugger->add_var($this->actions);
        $Debugger->debug();
      }
      catch( Exception $e )
      {
        throw $e;
      }
    }
  }
?>