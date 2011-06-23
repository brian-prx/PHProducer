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
      switch ( $page )
      {
        case 'cpanel':
          $results = array( 'db_link' => $this->Mysql->db_link, 'bar' => 'test' );
          break;
          
        default:
          $results = array();
      }
      
      if ( file_exists( 'views/pages/' . $page . '.php' ) )
        $this->View->set_view_file( 'views/pages/' . $page . '.php' );
        
      return $results;
    }
    
  }
?>