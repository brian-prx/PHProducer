<?php
/**
 * 
 * Application controller
 * 
 * @author btl
 *
 */
  class Controller implements IController
  {
    var $name = 'Controller';
    
    var $modules = array( 'Router', 'Debugger', 'Mysql' );
    
    var $View = null;
    
    /**
     * 
     * Controller constructor
     * 
     */
    function __construct()
    {
      $this->View = new View();
      
      if ( !empty( $this->modules ) )
        foreach ( $this->modules as $Module)
        {
          if ( class_exists( $Module ) )
            $this->{$Module} = Module::load( $Module );
        }
    }
    
    /**
     * 
     * Custom __toString method
     * 
     */
    function __toString()
    {
      return $this->name;
    }
    
    /**
     * 
     * Index 
     * 
     */
    function index()
    {
      $this->View->set_view_file( 'views/' . strtolower( $this->name ) . '/index.php' );
    }
  }
?>