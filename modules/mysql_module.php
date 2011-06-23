<?php
/**
 * 
 * MySQL Module
 * 
 * @author btl
 *
 */
  class Mysql extends Module
  {
    var $name = 'Mysql';
    
    var $db_host = null;
    
    var $db_name = null;
    
    var $db_user = null;
    
    var $db_pass = null;
    
    var $db_link = null;
    
    /**
     * 
     * Constuctor
     */
    function __construct()
    {
      if ( file_exists( 'config/db.php' ) )
      {
        include_once 'config/db.php';
        
        $this->db_host = $db_host;
        
        $this->db_name = $db_name;
        
        $this->db_user = $db_user;
        
        $this->db_pass = $db_pass;
      }
      
      /**
       * Establish MySQL connection and attempt to select database
       */
      try
      {
        $this->db_link = mysql_connect( $this->db_host, $this->db_user, $this->db_pass );
        
        if ( is_resource( $this->db_link ) && !empty( $this->db_name ) )
        {
          if ( mysql_select_db( $this->db_name, $this->db_link ) ) return true;
          else throw new Exception( 'Could not select database: ' . $this->db_name );
        }
      }
      catch( Exception $e )
      {
        throw $e;
      }
    }
    
    function query( $sql )
    {
      
    }
    
    function insert( $data )
    {
      
    }
    
    function delete( $table, $id )
    {
      
    }
  }
?>