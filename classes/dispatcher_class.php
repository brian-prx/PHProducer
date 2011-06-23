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
    
    var $modules = array( 'Router', 'Debugger' );
    
    /**
     * 
     * Constructor
     * 
     * @param string $url
     */
    function __construct( $url )
    {
      $this->url = $url;
      
      $this->load_modules();
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
        /**
         * Get current request actions and search for custom route
         */
        $results = $this->Router->search( $this->url );
        $this->actions = ( !empty( $results ) ) ? $results : $this->Router->parse( $this->url );
        
        $this->Debugger->add_var( $this->actions );
        /**
         * Create the controller
         */
        if ( !empty( $this->actions ) )
          $controller = $this->__getController();
          
        /**
         * Execute the controller's action
         */
		$results = $controller->{$this->actions['method']}( $this->actions['params'] );
        
        /**
         * Load the view file content
         */
        if ( file_exists( 'views/' . $controller->name . '/' . $this->actions['method'] . '.php' ) )
        {
          ob_start();
          include 'views/' . strtolower( $controller->name ) . '/' . $this->actions['method'] . '.php';	
          $layout_content = ob_get_clean();
        }

        /**
         * Include the layout
         */
        if ( file_exists ( 'webroot/layouts/default.php' ) )
          include 'webroot/layouts/default.php';
        else
          throw new Exception( 'Missing layout: ' . $this->layout );
      }
      catch( Exception $e )
      {
        throw $e;
      }
    }
    
  	/**
	 * 
	 * Dynamic controller load
	 * 
	 * @throws Exception
	 */
	private function &__getController()
	{
		if ( class_exists( $this->actions['controller'] ) )
		{
			$controller = new $this->actions['controller']();
			return $controller;
		}
		elseif ( empty( $this->actions['controller'] ) )
		{
			$controller = new AppController(); 
			return $controller;
		}
		else
			throw new Exception( 'Controller ' . $this->actions['controller'] . ' does not exists. Create it in the controllers/ directory.' );
	}
	
	/**
	 * 
	 * Instantiate modules
	 * 
	 */
	private function load_modules()
	{
	  if ( !empty( $this->modules ) )
	  {
	    foreach ( $this->modules as $Module )
	    {
	      if ( class_exists( $Module ) )
	        $this->{$Module} = new $Module();
	    }
	  }
	}
  }
?>