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
          $results['mysql_db'] = ( $this->Mysql->db_exists( $this->Mysql->db_name ) ) ? $this->Mysql->db_name : false;
          $results = array_merge( $results, array( 'db_link' => $this->Mysql->db_link ) );
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