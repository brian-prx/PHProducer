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
          $results = true;
          break;
          
        case 'create_db':
          if ( !empty( $this->data ) )
          {
            try
            {
              $results = $this->Mysql->create_db( $this->data['db_name'] );
            }
            catch( Exception $e )
            {
              throw $e;
            }
          }
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