<?php
session_start();

$conn = mysqli_connect(
  '35.238.1.230',
  'root',
  'root',
  'php_mysql_crud'
) or die(mysqli_erro($mysqli));

?>
