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
      if ( file_exists( 'config/routes.php' ) )
        include_once 'config/routes.php';
        
      if ( !empty( $routes ) )
        $this->routes = $routes;
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
        /**
         * Is this root '/'?
         */
        if ( strlen( ROOT_DIR ) > 1 )
          $url = str_replace( ROOT_DIR , '', $url );

        $components = explode( '/', $url );

        if ( !empty( $components ) )
        {
          $actions = array(
            'controller' => ( !empty( $components[0] ) ) ? $components[0] : null,
            'method' => ( !empty( $components[1] ) ) ? $components[1] : 'index',
            'params' => ( !empty( $components[2] ) ) ? $components[2] : null
          );
        }
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
    function search( $url )
    {
      $url = str_replace( ROOT_DIR, '/', $url);

      try
      {
        if ( !empty( $url ) )
        {
          foreach ( $this->routes as $route => $values )
          {
            if ( $route === $url ) {
              $actions['controller'] = $values['controller'];
              $actions['method'] = $values['method'];
              $actions['params'] = $values['params'];
            }
          }
        }
      }
      catch( Exception $e )
      {
        throw $e;
      }
      
      return ( empty( $actions ) ) ? false : $actions;
    }
    
    /**
     * 
     * Redirect page request
     * 
     * @param mixed $url
     */
    function redirect( $url )
    {
      try
      {
        if ( false === strstr( $url, ROOT_DIR ) ) $url = ROOT_DIR . $url;
        
        if ( $url !== null )
          header( 'Location: ' . $url, 302 );
      }
      catch( Exception $e )
      {
        throw $e;
      }
    }
  }
?>