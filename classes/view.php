<?php
  class View
  {
    var $name = 'View';
    
    var $view_file = null;
    
    var $bread_crumbs = array();
    
    function __construct()
    {
      
    }
    
    function set_view_file( $file )
    {
      $this->view_file = $file;
    }
    
    function render()
    {
      ob_start();
      include $this->view_file;	
      return ob_get_clean();
    }
  }
?>