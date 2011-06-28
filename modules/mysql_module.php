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
    
    var $db_select = null;
    
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
          $this->db_select = mysql_select_db( $this->db_name, $this->db_link );
            
      }
      catch( Exception $e )
      {
        throw $e;
      }
    }
    
    /**
     * 
     * Check that a database exists
     * 
     * @param string $name
     */
    function db_exists( $name )
    {
      try
      {
        return mysql_select_db( $name, $this->db_link );
      }
      catch( Exception $e )
      {
        throw $e;
      }
    }
    
    /**
     * 
     * Create a new database
     * 
     * @param string $name
     * @param boolean $override
     * @param string $collation
     */
    function create_db( $name, $override = false, $collation = 'latin1_swedish_ci'  )
    {
      try
      {
        if ( $this->db_exists( $name ) )
          return 'Database ' . $name . ' exists!';
        
        $sql = 'CREATE DATABASE ';
        if ( !$override )
          $sql .= 'IF NOT EXISTS ';
        $sql .= $name;// . ' COLLATION=' . $collation;

        if ( $this->query( $sql ) )
          $result = 'Database ' . $name . ' successfully created.';
        else
          $result = 'Unable to create database ' . $name;
      }
      catch( Exception $e )
      {
        throw $e;
      }
      
      return $result;
    }
    
    /**
     * 
     * Execute a MySQL statement
     * 
     * @param string $sql
     */
    function query( $sql )
    {
      try
      {
        $result = mysql_query( $sql, $this->db_link );
      }
      catch( Exception $e )
      {
        throw $e;
      }
      
      return $result;
    }
    
    function insert( $data )
    {
      
    }
    
    function delete( $table, $id )
    {
      
    }
  }
?>