<?php if ( !file_exists( CNFG_DIR . 'db.php' ) ) { ?>
<div class="error rounded">
  <p><?php echo 'Database configuration file does not exist.'; ?></p>
</div>
<?php } ?>

<?php if ( file_exists( CNFG_DIR . 'db.php' ) && !$controller->Mysql->db_select ) { ?>
<div class="warning rounded">
  <p><?php echo 'Could not select database: ' . $controller->Mysql->db_name . '.'; ?></p>
  <p>Check that database exists or create it <a href='<?php ROOT_DIR; ?>create_db'>here</a></p>
  <img src="webroot/images/close_button.gif" />
</div>
<?php } ?>

<?php if ( file_exists( CNFG_DIR . 'db.php' ) && $controller->Mysql->db_select ) { ?>
<div class="pass rounded">
  <p><?php echo 'Database connection successful. Using database: ' . $controller->Mysql->db_name . '.'; ?></p>
</div>
<?php } ?>