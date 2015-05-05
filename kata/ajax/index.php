<?php include 'database.php' ?>

<h1>Ajax</h1>
<pre>
<?php
  dropDatabase();
  setupDatabase();
  saveTask('New Thing', date('Y-m-d'),0);
  // deleteTask(2);
  var_dump( getTasks() );
?>
