<?php
  class Message extends Module
  {
    var $messages = array();
    
    /**
     * 
     * Constructor
     * 
     */
    function __construct()
    {
      
    }
    
    /**
     * 
     * Add a message
     * 
     * @param string $message
     */
    function add( $message )
    {
      if ( !empty( $message ) ) $this->messages[] = $message;
    }
    
    /**
     * 
     * Show messages
     * 
     */
    function show()
    {
      return $this->messages;
    }
  }
?>