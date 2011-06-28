<form action='' method='post'>
  <fieldset>
    <legend>MySQL database setup</legend>
    <label for='db_name'>Name</label>
    <input type='text' name='db_name' id='db_name' />
    <label for='db_collation'>Collation</label>
    <input type='text' name='db_collation' id='db_collation' />
    <input type='submit' value='Create' />
  </fieldset>
</form>

<?php print_r( $Pages ); ?>