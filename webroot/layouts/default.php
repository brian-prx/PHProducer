<html>
  <head>
  	<title>Default Layout</title>
    <link rel="stylesheet" type="text/css" href="webroot/css/default.css" />
  </head>
  <body>
    <div id="wrapper">
      <div id="header" class="rounded gradient">
        <h2>PHProducer: Rapid PHP</h2>
      </div><!-- End header -->
      <div id="left_bar" class="rounded gradient">
        <a href=''>home</a><br />
        <a href=''>account</a><br />
        <a href=''>account</a><br />
        <a href=''>account</a><br />
        <a href=''>account</a><br />
        <a href=''>account</a><br />
        <a href=''>account</a><br />
        <a href=''>account</a><br />
        <a href=''>account</a><br />
        <a href=''>account</a><br />
        <a href=''>account</a><br />
      </div><!-- End left bar -->
      <div id="content" class="rounded gradient">
        <?php echo $layout_content; ?>
      </div><!-- End content -->
      <div id="debugger">
      </div>
    </div><!-- End wrapper -->
  </body>
</html>