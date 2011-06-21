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
            'method' => ( !empty( $components[1] ) ) ? $components[1] : null,
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
     * Redirect page request
     * 
     * @param mixed $url
     */
    function redirect( $url )
    {
      
    }
  }
?>