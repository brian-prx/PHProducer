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
    
    var $data = null;
    
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
        
      $this->add_data();
      
      $this->View->bread_crumbs = array( 'Home' => ROOT_DIR, 'Control Panel' => ROOT_DIR . 'cpanel' );
    }
    
    /**
     * 
     * Populate controller's form data
     * 
     */
    function add_data()
    {
      if ( !empty( $_POST ) ) $this->data = $_POST;
      if ( !empty( $_GET ) ) $this->data = $_GET;
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