<?php
session_start();

$conn = mysqli_connect(
  '35.231.119.232',
  'root',
  'root',
  'php_mysql_crud'
) or die(mysqli_erro($mysqli));

?>
