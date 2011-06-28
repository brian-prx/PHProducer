<html>
  <head>
  	<title>Default Layout</title>
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT_DIR; ?>webroot/css/default.css" />
    <script type="text/javascript" src="<?php echo ROOT_DIR; ?>webroot/js/jquery-1.6.1.min.js" ></script>
  </head>
  <body>
    <div id="wrapper">
    
      <div id="header" class="rounded gradient">
        <h2>PHProducer: Rapid PHP applications</h2>
      </div><!-- End header -->
      
      <div id="left">
        <div id="left_bar" class="rounded gradient">
          <a href='<?php echo ROOT_DIR; ?>overview'>Overview</a><br />
          <a href='<?php echo ROOT_DIR; ?>cpanel'>Control Panel</a><br />
        </div><!-- End left bar -->
      </div>

      <div id="right">
        <div id="content" class="rounded gradient">
          <?php 
            if ( !empty( $controller->View->bread_crumbs ) )
            {
              $bread_crumb_list = null;
              foreach ( $controller->View->bread_crumbs as $link_text => $path )
              {
                $bread_crumb_list .= "<a href='{$path}'>" . $link_text . "</a>" . '&nbsp;&middot;&nbsp;';
              }
              echo substr( $bread_crumb_list, 0, -20 );
            }
            echo $layout_content;
          ?>
        </div><!-- End content -->
      </div>
      
      <div id="footer" class="rounded gradient">
      	<h2>PHProducer footer</h2>
      </div>
      
      <?php if ( is_object( $controller->Debugger ) ) { ?>
        <div id="debugger" class="rounded gradient">
          <h2>Debugger</h2>
          <?php echo $controller->Debugger->debug(); ?>
        </div><!-- End debugger -->
      <?php } ?>
    </div><!-- End wrapper -->
  </body>
</html>