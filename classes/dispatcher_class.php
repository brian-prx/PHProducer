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
        
        if ( !empty( $this->actions ) )
          $controller = $this->__getController();
          
        // Execute the controller's function
		$results = $controller->{$this->actions['method']}( $this->actions['params'] );
          
        $this->Debugger->add_var( $controller );
        $this->Debugger->add_var( $this->actions );

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
  }
?>