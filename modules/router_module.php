<?php
/**
 * 
 * Router Module
 * 
 * Process application navigation
 * 
 * @author btl
 *
 */
  class Router extends Module
  {
    var $name = 'Router Module';
    
    var $routes = array();
    
    /**
     * 
     * Router constructor
     * 
     */
    function __construct()
    {
      if ( file_exists( ROOT_DIR . CNFG_DIR . '/routes.php' ) )
        include_once ROOT_DIR . CNFG_DIR . '/routes.php';
        
      if ( !empty( $routes ) )
      {
        foreach ( $routes as $route )
          $this->routes[] = $route;
      }
    }
    
    /**
     * 
     * Parse URL for controller, method and parameters
     * 
     * @param string $url
     */
    function parse( $url )
    {
      try
      {
        if ( strlen( ROOT_DIR ) > 1 )
          $url = str_replace( ROOT_DIR , '', $url );
        
        if ( strlen( $url ) )
          $components = explode( '/', $url );
        else
          $components = array();
        
        if ( !empty( $components ) )
        {
          $actions = array(
            'controller' => ( !empty( $components[0] ) ) ? $components[0] : null,
            'method' => ( !empty( $components[1] ) ) ? $components[1] : 'index',
            'params' => ( !empty( $components[2] ) ) ? $components[2] : null
          );
        }
        else
          $actions = array();
      }
      catch( Exception $e )
      {
        throw $e;
      }
            
      return $actions;
    }
    
    /**
     * 
     * Search for matching route
     * 
     * @param array $actions
     */
    function search( $actions )
    {
      try
      {
        if ( !empty( $actions ) )
        {
          return $actions;
        }
      }
      catch( Exception $e )
      {
        throw $e;
      }
    }
    
    /**
     * 
     * Redirect page request
     * 
     * @param mixed $url
     */
    function redirect( $url )
    {
      
    }
  }
?>