<?php
/**
 * 
 * Debugged Module
 * 
 * Control debugging levels and output
 * 
 * @author btl
 *
 */
  class Debugger extends Module
  {
    var $vars = array();
    
    var $debug_level = 1;
    
    /**
     * 
     * Debugger constructor
     * 
     * @param int $level
     */
    function __construct( $level = null )
    {
      $this->set_debug_level( $level );
    }
    
    /**
     * 
     * Set debugger level
     * 
     * @param int $level
     */
    function set_debug_level( $level )
    {
      $this->debug_level = $level;
    }
    
    /**
     * 
     * Get debugger level
     * 
     */
    function get_debug_level()
    {
      return $this->debug_level;
    }
    
    /**
     * 
     * Add variable to debug
     * 
     * @param mixed $var
     */
    function add_var( $var )
    {
      $this->vars[] = $var;
      return true;
    }
    
    /**
     * 
     * Output debugging information
     * 
     */
    function debug()
    {
      if ( !empty( $this->vars ) )
      {
        foreach ( $this->vars as $var )
        {
          if ( is_array( $var ) || is_object( $var ) )
          {
            print "<pre>";
            print_r( $var );
            print "</pre>";
          }
          elseif ( is_string( $var ) )
            echo $var;
        }
      }
    }
  }
?>