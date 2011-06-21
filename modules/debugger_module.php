<?php
  class Debugger extends Module
  {
    var $vars = array();
    
    function add_var( $var )
    {
      $this->vars[] = $var;
      return true;
    }
    
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
        }
      }
    }
  }
?>