<?php
/**
 * 
 * Pages controller
 * 
 * @author btl
 *
 */
  class Pages extends Controller
  {
    var $name = 'Pages';
    
    /**
     * 
     * Display a page
     * 
     * @param string $page
     */
    function display( $page )
    {
      if ( file_exists( 'views/pages/' . $page . '.php' ) )
        return file_get_contents( 'views/pages/' . $page . '.php' );
    }
  }
?>