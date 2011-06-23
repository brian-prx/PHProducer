<?php
  class Module implements IModule
  {
    var $name = 'Module';
    
    static function load( $Module )
    {
      return new $Module();
    }
  }
?>