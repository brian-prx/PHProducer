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
    
    var $Debugger = null;
    
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
      
      $this->Debugger = new Debugger( DEBUG_LEVEL );
    }
    
    /**
     * 
     * Execute page request
     * 
     */
    function dispatch()
    {
      try
      {
        $this->actions = $this->Router->search( $this->Router->parse( $this->url ) );
        
        $this->Debugger->add_var($this->actions);
        $this->Debugger->debug();
      }
      catch( Exception $e )
      {
        throw $e;
      }
    }
  }
?>