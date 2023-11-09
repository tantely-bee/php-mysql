<?php
session_start();

$conn = mysqli_connect(
  '34.122.98.35',
  'root',
  'root',
  'php_mysql_crud'
) or die(mysqli_erro($mysqli));

?>
