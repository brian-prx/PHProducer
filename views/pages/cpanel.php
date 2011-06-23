<h1>Control Panel</h1>
<?php if ( $Pages ) { ?>

  <?php $this->Debugger->add_var( $Pages ); ?>
  
  <?php if ( empty( $Pages['mysql_db'] ) ) { ?>
    <p>No database selected</p>
    <form method='post' action=''>
      <label for='dbname'>Create new database</label>
      <input id='dbname' name='dbname' type='text' />
      <input type='submit' value='create' />
    </form>
  <?php } else { ?>
    <p>Using MySQL database: <?php echo $Pages['mysql_db']; ?></p>
  <?php } ?>
<?php } ?>